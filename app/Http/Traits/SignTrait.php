<?php
namespace App\Http\Traits;
use App\Models\Partner;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;

trait SignTrait {
    public function open_sign($id_partner) {
        return view('back-end.signature.signature');
    }

    public function save_sign($request)
    {
        $folderPath = public_path('uploads/signature/');
        $image_parts = explode(";base64,", $request->signed);
        $image_type_aux = explode("image/", $image_parts[0]);
        $image_type = $image_type_aux[1];
        $image_base64 = base64_decode($image_parts[1]);
        $file = $folderPath . uniqid() . '.'.$image_type;
        file_put_contents($file, $image_base64);
        Session::flash('notice','Đã lưu chữ ký');
        return $file;
//        return back()->with('success', 'Đã lưu chữ ký');
    }
}
