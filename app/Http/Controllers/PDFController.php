<?php

namespace App\Http\Controllers;

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
