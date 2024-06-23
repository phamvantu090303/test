<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use App\Models\chucnang;
use App\Models\PhanQuyen;
use App\Models\QuyenChucNang;
use Exception;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Log;

class APIQuyenController extends Controller
{
    public function dataQuyen(Request $request) {
        $data = PhanQuyen::get();
        return response()->json([
            'status'    => 1,
            'data'      => $data,
        ]);
    }

    public function dataChucNang(Request $request)
    {
        //hàm này dùng để lấy tất cả các chức năng ra
        $data       = chucnang::get();
        $chucNang   = QuyenChucNang::where('id_quyen', $request->id)->get();// lọc ra các bản ghi mà có trường id_quyen bằng giá trị được truyền qua $request->id (có thể là ID của một quyền cụ thể). Biến $chucNang chứa danh sách các chức năng liên quan đến quyền đó.
//nếu không có id_quyèn trong bảng QuyenChucNang thì nó ko vào vong lặp và sẽ nhảy xuống  return response()->json
//ngược lại nếu có thì nó sẽ vào vòng lặp bên dưới
        foreach($data as $k_1 => $v_1) {
            foreach($chucNang as $k_2 => $v_2) {
                if($v_1->id == $v_2->id_chuc_nang) { //nếu có id trùng với id_chuc_nang thì đánh dấu chọn vào chức năng đó trong bảng chức năng
                    $v_1->check = true;
                    break;
                }

            }
        }
         //if($v_1->id == $v_2->id_chuc_nang) kiểm tra nếu ID của đối tượng chức năng ($v_1->id) khớp với ID chức năng của quyền ($v_2->id_chuc_nang), nghĩa là chức năng này có trong danh sách quyền của người dùng.
//Nếu khớp, check được thiết lập là true cho đối tượng chức năng đó, biểu thị rằng chức năng này đã được (chọn tích vào) quyền.
//break được dùng để ngừng vòng lặp nội bộ ngay sau khi tìm thấy khớp, không cần kiểm tra thêm nữa, và lặp lại vòng lặp mới
        return response()->json([
            'status'    => 1,
            'data'      => $data,
        ]);
    }

    public function store(Request $request)
    {
        DB::beginTransaction();
        try {
            $data = $request->all();
            PhanQuyen::create($data);

            DB::commit();
            return response()->json([
                'status'    => 1,
                'message'   => 'Đã thêm mới quyền thành công!',
            ]);
        } catch (Exception $e) {
            Log::error("Ê, nó có lỗi đó tề: " . $e);
            DB::rollBack();
        }
    }

    public function destroy(Request $request)
    {
        DB::beginTransaction();
        try {

            $phanQuyen     =   PhanQuyen::find($request->id);

            if($phanQuyen) {
                $phanQuyen->delete();
                DB::commit();

                return response()->json([
                    'status'    => 1,
                    'message'   => 'Đã xóa quyền thành công!',
                ]);
            } else {
                return response()->json([
                    'status'    => 0,
                    'message'   => 'Quyền không tồn tại!',
                ]);
            }
        } catch(Exception $e) {
            Log::error($e);
            DB::rollBack();
        }
    }

    public function update(Request $request)
    {
        DB::beginTransaction();
        try {

            $phanQuyen     =   PhanQuyen::find($request->id);
            if($phanQuyen) {
                $data   = $request->all();
                $phanQuyen->update($data);
                DB::commit();

                return response()->json([
                    'status'    => 1,
                    'message'   => 'Đã cập nhật quyền thành công!',
                ]);
            } else {
                return response()->json([
                    'status'    => 0,
                    'message'   => 'Quyền không tồn tại!',
                ]);
            }
        } catch(Exception $e) {
            Log::error($e);
            DB::rollBack();
        }
    }

    public function status(Request $request)
    {
        DB::beginTransaction();
        try {
            $phanQuyen     =   PhanQuyen::find($request->id);
            if($phanQuyen) {
                $phanQuyen->tinh_trang     =   $phanQuyen->tinh_trang == 1 ? 0 : 1;
                $phanQuyen->save();
                DB::commit();

                return response()->json([
                    'status'    => 1,
                    'message'   => 'Đã cập nhật quyền thành công!',
                ]);
            } else {
                return response()->json([
                    'status'    => 0,
                    'message'   => 'Quyền không tồn tại!',
                ]);
            }
        } catch(Exception $e) {
            Log::error($e);
            DB::rollBack();
        }
    }

    public function phanQuyen(Request $request)
    {
        DB::beginTransaction();
        try {
            QuyenChucNang::where('id_quyen', $request->quyen['id'])->delete();
            foreach($request->chuc_nang as $key => $value) {
                if(isset($value['check']) && $value['check'] == true) {
                   // Tóm lại, đoạn mã trên kiểm tra xem biến $value['check'] (là bảng các chức năng có chức năng nào đc đánh dấu chọn(True) hay ko )
                   // Nếu có, nó tạo một bản ghi mới trong bảng QuyenChucNang với các giá trị chức năng  tương ứng.
                    QuyenChucNang::create([
                        'id_quyen'          =>  $request->quyen['id'],
                        'id_chuc_nang'      =>  $value['id'],
                    ]);
                }
            }
            DB::commit();
            return response()->json([
                'status'    => 1,
                'message'   => 'Đã cập nhật quyền thành công!',
            ]);

        } catch(Exception $e) {
            Log::error($e);
            DB::rollBack();
        }
    }
}
