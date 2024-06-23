<?php

namespace App\Http\Controllers;

use App\Mail\SenMail;
use App\Models\chitietdonhang;
use App\Models\donhang;
use App\Models\ThanhToan;
use Carbon\Carbon;
use GuzzleHttp\Client;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Mail;

class ThanhToanController extends Controller
{
    public function index()
    {
        $id_khach_hang = Auth::guard('client')->user();
        $client = new Client();
        $payload = [
            "USERNAME"  =>  "THANHTRUONG2311",
            "PASSWORD"  =>  "Lethanhtruong2311@@",
            "DAY_BEGIN" =>  Carbon::now()->format('d/m/Y'),
            "DAY_END"   =>  Carbon::now()->format('d/m/Y'),
            "NUMBER_MB" =>  "1910061030119",
        ];
        try {
            $response = $client->post('http://osm.dzfullstack.com:3000/mb', [
                'json' => $payload
            ]);
            $data = json_decode($response->getBody(), true);
            if (isset($data['transactionHistoryList'])) {
                foreach ($data['transactionHistoryList'] as $k => $v) {
                    $check  =   ThanhToan::where('code', $v['refNo'])->first();
                    if (!$check) {
                        ThanhToan::create([
                            'so_tien'       =>  $v['creditAmount'],
                            'noi_dung'      =>  $v['description'],
                            'code'          =>  $v['refNo'],
                        ]);

                        $pattern = '/TTVXP(\d+)/';
                        $text    = $v['description'];
                        if (preg_match($pattern, $text, $matches)) {
                            $result     = $matches[1];
                            $so_tien    = $v['creditAmount'];
                            $kiem_tra   = donhang::where('ma_don_hang', $result)
                                ->where('tong_tien', '<=', $so_tien)
                                ->first();
                            if ($kiem_tra) {
                                $kiem_tra->is_thanh_toan = 1;
                                $kiem_tra->save();

                                chitietdonhang::where('id_don_hang', $result)
                                    ->update([
                                        'trang_thai'    => 1
                                    ]);
                                $ds_don_hang        = chitietdonhang::where('id_don_hang',$result )
                                    ->join('san_phams', 'chitietdonhangs.id_san_pham', 'san_phams.id')
                                    ->select('san_phams.ten_san_pham', 'chitietdonhangs.*')
                                    ->get();

                                $xxx['ho_va_ten']       =  $id_khach_hang->ho_va_ten;
                                $xxx['ds_donhang']      =  $ds_don_hang;
                                $xxx['tong_tien']       = $so_tien ;
                                $xxx['noi_dung_ck']     =  'Bạn đã thanh toán thành công MDH' . $result;

                                Mail::to($id_khach_hang->email)->send(new SenMail('Thông báo thanh toán thành công', 'mail.thanh_toan', $xxx));
                            }
                        }
                    }
                }
            }
        } catch (\Exception $e) {
            echo $e;
            // Xử lý khi có lỗi xảy ra
        }
    }
}
