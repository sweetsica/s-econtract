<?php

namespace App\Http\Traits;

use Illuminate\Support\Facades\Session;

trait SignTrait
{
    public function open_sign($id_partner)
    {
        return view('back-end.signature.signature');
    }

    public function save_sign($request, $file_name)
    {
        $folderPath = public_path('uploads/signature/');
        $image_parts = explode(";base64,", $request->signed);
        $image_type_aux = explode("image/", $image_parts[0]);
        $image_type = $image_type_aux[1];
        $image_base64 = base64_decode($image_parts[1]);
        $file = $folderPath . $file_name . '.' . $image_type;
        $url_true = url('uploads/signature/'. $file_name . '.png');
        $result = file_put_contents($file, $image_base64);
//        dd($file, $result,$code_contract);
        Session::flash('notice', 'Đã lưu chữ ký');
        Session::put('url_true', $url_true);
        return $file;

//        return [
//          'file' => $file,
//          'url_true' => $url_true
//        ];
//        return back()->with('success', 'Đã lưu chữ ký');
    }
}
