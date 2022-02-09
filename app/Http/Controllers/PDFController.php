<?php

namespace App\Http\Controllers;

use App\Models\Partner;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\Storage;
use niklasravnsborg\LaravelPdf\Facades\Pdf;
use Illuminate\Support\Facades\File;

class PDFController extends Controller
{
    public function login()
    {
        return view('form');
    }

    /**
     * Lưu file pdf theo ngày / tháng
     * @return mixed
     */
    public function index()
    {
        $data = [
            'foo' => 'bar'
        ];
//        $pdf = PDF::loadView('demo_pdf', $data)->save($pdfFilePath);
        $pdf = PDF::loadView('demo_pdf', $data);
        $path = public_path('pdf_storage/');
        $day= date('d_m_Y');
        $month= date('m_Y');
        if (! File::exists($path.'/'.$month)) {
            File::makeDirectory($path.'/'.$month);
        }
        $pdf->save($path.'/'.$month.'/'.$day.'_dynamic_save.pdf');
        return $pdf->stream('dynamic.pdf');
    }

    public function export_pdf()
    {
        $info = Session::get('info');
        $data['info'] = $info;
        $pdf = PDF::loadView('pdf', $data);

        return $pdf->stream('hop-dong.pdf');
    }

    public function export_pdf_true()
    {
//        $info = Session::get('info');
//        $data['info'] = $info;
        $data['info'] = Partner::get(1);
        $pdf = PDF::loadView('pdf', $data);

        return $pdf->stream('hop-dong.pdf');
    }

    /**
     * Tải mẫu pdf
     */
    public function upload_pdf()
    {
        $page_title = 'Upload Contract';
        $page_description = 'Thêm mẫu hợp đồng';
        $logo = "images/logo.png";
        $logoText = "images/logo-text.png";
        $action = __FUNCTION__;
        return view('back-end.pdf.upload_pdf', compact('page_title', 'page_description', 'action', 'logo', 'logoText'));
    }

    public function save_upload_pdf(Request $request)
    {
        //Kiểm tra file
        if ($request->hasFile('fileupload')) {
//            $file = $request->filesTest;
//            //Lấy Tên files
//            echo 'Tên Files: ' . $file->getClientOriginalName();
//            echo '<br/>';
//            //Lấy Đuôi File
//            echo 'Đuôi file: ' . $file->getClientOriginalExtension();
//            echo '<br/>';
//            //Lấy đường dẫn tạm thời của file
//            echo 'Đường dẫn tạm: ' . $file->getRealPath();
//            echo '<br/>';
//            //Lấy kích cỡ của file đơn vị tính theo bytes
//            echo 'Kích cỡ file: ' . $file->getSize();
//            echo '<br/>';
//            //Lấy kiểu file
//            echo 'Kiểu files: ' . $file->getMimeType();
            $file = $request->fileupload;
//            $path = resource_path().'\views\back-end';
            $destinationPath = 'uploads/pdf_form';
            $file->move($destinationPath, $file->getClientOriginalName());
        }
        $page_title = 'Upload Contract';
        $page_description = 'Thêm mẫu hợp đồng';
        $logo = "images/logo.png";
        $logoText = "images/logo-text.png";
        $action = __FUNCTION__;
        return view('back-end.pdf.upload_pdf', compact('page_title', 'page_description', 'action', 'logo', 'logoText'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
