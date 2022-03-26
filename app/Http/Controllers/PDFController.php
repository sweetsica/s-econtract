<?php

namespace App\Http\Controllers;

use App\Models\Partner;
use Carbon\Carbon;
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

    /**
     * Test đổ data ra file PDF dữ liệu thật
     * @return mixed
     */
    public function export_pdf_true()
    {
//        $info = Session::get('info');
//        $data['info'] = $info;
        $data['info'] = Partner::Where('id','=',2)->first();
        $pdf = PDF::loadView('pdf_true_export', $data);

        return $pdf->stream('hop-dong-do-data.pdf');
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

    /**
     * Lưu file pdf
     */
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

    public function pre_pdf(Request $request)
    {
//        $info = $request->all();
//        Session::put('info',$info);
        $output = '
                <html xmlns:v="urn:schemas-microsoft-com:vml"
xmlns:o="urn:schemas-microsoft-com:office:office"
xmlns:w="urn:schemas-microsoft-com:office:word"
xmlns:m="http://schemas.microsoft.com/office/2004/12/omml"
xmlns="http://www.w3.org/TR/REC-html40">

<head>
<meta http-equiv=Content-Type content="text/html; charset=windows-1258">
<meta name=ProgId content=Word.Document>
<meta name=Generator content="Microsoft Word 15">
<meta name=Originator content="Microsoft Word 15">
<link rel=File-List
href="New%20HÐ%20Ð&#7840;I%20L&Yacute;%202022%20-%20OTC%20f1.files/filelist.xml">
<link rel=Edit-Time-Data
href="New%20HÐ%20Ð&#7840;I%20L&Yacute;%202022%20-%20OTC%20f1.files/editdata.mso">
<!--[if !mso]>
<style>
v\:* {behavior:url(#default#VML);}
o\:* {behavior:url(#default#VML);}
w\:* {behavior:url(#default#VML);}
.shape {behavior:url(#default#VML);}
</style>
<![endif]-->
<title>CÔNG TY TNHH TU&#7878; LINH</title>
<!--[if gte mso 9]><xml>
 <o:DocumentProperties>
  <o:Author>LP</o:Author>
  <o:LastAuthor>Starrynight1926</o:LastAuthor>
  <o:Revision>2</o:Revision>
  <o:TotalTime>1</o:TotalTime>
  <o:LastPrinted>2021-01-08T09:27:00Z</o:LastPrinted>
  <o:Created>2022-03-25T09:46:00Z</o:Created>
  <o:LastSaved>2022-03-25T09:46:00Z</o:LastSaved>
  <o:Pages>4</o:Pages>
  <o:Words>1831</o:Words>
  <o:Characters>10439</o:Characters>
  <o:Company>Microsoft</o:Company>
  <o:Lines>86</o:Lines>
  <o:Paragraphs>24</o:Paragraphs>
  <o:CharactersWithSpaces>12246</o:CharactersWithSpaces>
  <o:Version>16.00</o:Version>
 </o:DocumentProperties>
 <o:OfficeDocumentSettings>
  <o:RelyOnVML/>
  <o:AllowPNG/>
 </o:OfficeDocumentSettings>
</xml><![endif]-->
<link rel=dataStoreItem
href="New%20HÐ%20Ð&#7840;I%20L&Yacute;%202022%20-%20OTC%20f1.files/item0001.xml"
target="New%20HÐ%20Ð&#7840;I%20L&Yacute;%202022%20-%20OTC%20f1.files/props002.xml">
<link rel=dataStoreItem
href="New%20HÐ%20Ð&#7840;I%20L&Yacute;%202022%20-%20OTC%20f1.files/item0003.xml"
target="New%20HÐ%20Ð&#7840;I%20L&Yacute;%202022%20-%20OTC%20f1.files/props004.xml">
<link rel=themeData
href="New%20HÐ%20Ð&#7840;I%20L&Yacute;%202022%20-%20OTC%20f1.files/themedata.thmx">
<link rel=colorSchemeMapping
href="New%20HÐ%20Ð&#7840;I%20L&Yacute;%202022%20-%20OTC%20f1.files/colorschememapping.xml">
<!--[if gte mso 9]><xml>
 <w:WordDocument>
  <w:HideSpellingErrors/>
  <w:GrammarState>Clean</w:GrammarState>
  <w:DocumentProtectionNotEnforced>ReadOnly</w:DocumentProtectionNotEnforced>
  <w:TrackMoves>false</w:TrackMoves>
  <w:TrackFormatting/>
  <w:PunctuationKerning/>
  <w:DrawingGridHorizontalSpacing>6.5 pt</w:DrawingGridHorizontalSpacing>
  <w:DisplayHorizontalDrawingGridEvery>2</w:DisplayHorizontalDrawingGridEvery>
  <w:DisplayVerticalDrawingGridEvery>2</w:DisplayVerticalDrawingGridEvery>
  <w:ValidateAgainstSchemas/>
  <w:SaveIfXMLInvalid>false</w:SaveIfXMLInvalid>
  <w:IgnoreMixedContent>false</w:IgnoreMixedContent>
  <w:AlwaysShowPlaceholderText>false</w:AlwaysShowPlaceholderText>
  <w:StyleLock/>
  <w:DoNotPromoteQF/>
  <w:LidThemeOther>EN-US</w:LidThemeOther>
  <w:LidThemeAsian>JA</w:LidThemeAsian>
  <w:LidThemeComplexScript>X-NONE</w:LidThemeComplexScript>
  <w:Compatibility>
   <w:BreakWrappedTables/>
   <w:SnapToGridInCell/>
   <w:WrapTextWithPunct/>
   <w:UseAsianBreakRules/>
   <w:DontGrowAutofit/>
   <w:SplitPgBreakAndParaMark/>
   <w:EnableOpenTypeKerning/>
   <w:DontFlipMirrorIndents/>
   <w:OverrideTableStyleHps/>
  </w:Compatibility>
  <m:mathPr>
   <m:mathFont m:val="Cambria Math"/>
   <m:brkBin m:val="before"/>
   <m:brkBinSub m:val="&#45;-"/>
   <m:smallFrac/>
   <m:dispDef/>
   <m:lMargin m:val="0"/>
   <m:rMargin m:val="0"/>
   <m:defJc m:val="centerGroup"/>
   <m:wrapIndent m:val="1440"/>
   <m:intLim m:val="subSup"/>
   <m:naryLim m:val="undOvr"/>
  </m:mathPr></w:WordDocument>
</xml><![endif]--><!--[if gte mso 9]><xml>
 <w:LatentStyles DefLockedState="false" DefUnhideWhenUsed="false"
  DefSemiHidden="false" DefQFormat="false" DefPriority="99"
  LatentStyleCount="376">
  <w:LsdException Locked="false" Priority="0" QFormat="true" Name="Normal"/>
  <w:LsdException Locked="false" Priority="9" QFormat="true" Name="heading 1"/>
  <w:LsdException Locked="false" Priority="9" SemiHidden="true"
   UnhideWhenUsed="true" QFormat="true" Name="heading 2"/>
  <w:LsdException Locked="false" Priority="9" SemiHidden="true"
   UnhideWhenUsed="true" QFormat="true" Name="heading 3"/>
  <w:LsdException Locked="false" Priority="9" SemiHidden="true"
   UnhideWhenUsed="true" QFormat="true" Name="heading 4"/>
  <w:LsdException Locked="false" Priority="9" SemiHidden="true"
   UnhideWhenUsed="true" QFormat="true" Name="heading 5"/>
  <w:LsdException Locked="false" Priority="9" SemiHidden="true"
   UnhideWhenUsed="true" QFormat="true" Name="heading 6"/>
  <w:LsdException Locked="false" Priority="9" SemiHidden="true"
   UnhideWhenUsed="true" QFormat="true" Name="heading 7"/>
  <w:LsdException Locked="false" Priority="9" SemiHidden="true"
   UnhideWhenUsed="true" QFormat="true" Name="heading 8"/>
  <w:LsdException Locked="false" Priority="9" SemiHidden="true"
   UnhideWhenUsed="true" QFormat="true" Name="heading 9"/>
  <w:LsdException Locked="false" SemiHidden="true" UnhideWhenUsed="true"
   Name="index 1"/>
  <w:LsdException Locked="false" SemiHidden="true" UnhideWhenUsed="true"
   Name="index 2"/>
  <w:LsdException Locked="false" SemiHidden="true" UnhideWhenUsed="true"
   Name="index 3"/>
  <w:LsdException Locked="false" SemiHidden="true" UnhideWhenUsed="true"
   Name="index 4"/>
  <w:LsdException Locked="false" SemiHidden="true" UnhideWhenUsed="true"
   Name="index 5"/>
  <w:LsdException Locked="false" SemiHidden="true" UnhideWhenUsed="true"
   Name="index 6"/>
  <w:LsdException Locked="false" SemiHidden="true" UnhideWhenUsed="true"
   Name="index 7"/>
  <w:LsdException Locked="false" SemiHidden="true" UnhideWhenUsed="true"
   Name="index 8"/>
  <w:LsdException Locked="false" SemiHidden="true" UnhideWhenUsed="true"
   Name="index 9"/>
  <w:LsdException Locked="false" Priority="39" SemiHidden="true"
   UnhideWhenUsed="true" Name="toc 1"/>
  <w:LsdException Locked="false" Priority="39" SemiHidden="true"
   UnhideWhenUsed="true" Name="toc 2"/>
  <w:LsdException Locked="false" Priority="39" SemiHidden="true"
   UnhideWhenUsed="true" Name="toc 3"/>
  <w:LsdException Locked="false" Priority="39" SemiHidden="true"
   UnhideWhenUsed="true" Name="toc 4"/>
  <w:LsdException Locked="false" Priority="39" SemiHidden="true"
   UnhideWhenUsed="true" Name="toc 5"/>
  <w:LsdException Locked="false" Priority="39" SemiHidden="true"
   UnhideWhenUsed="true" Name="toc 6"/>
  <w:LsdException Locked="false" Priority="39" SemiHidden="true"
   UnhideWhenUsed="true" Name="toc 7"/>
  <w:LsdException Locked="false" Priority="39" SemiHidden="true"
   UnhideWhenUsed="true" Name="toc 8"/>
  <w:LsdException Locked="false" Priority="39" SemiHidden="true"
   UnhideWhenUsed="true" Name="toc 9"/>
  <w:LsdException Locked="false" SemiHidden="true" UnhideWhenUsed="true"
   Name="Normal Indent"/>
  <w:LsdException Locked="false" Priority="0" SemiHidden="true"
   UnhideWhenUsed="true" Name="footnote text"/>
  <w:LsdException Locked="false" SemiHidden="true" UnhideWhenUsed="true"
   Name="annotation text"/>
  <w:LsdException Locked="false" SemiHidden="true" UnhideWhenUsed="true"
   Name="header"/>
  <w:LsdException Locked="false" SemiHidden="true" UnhideWhenUsed="true"
   Name="footer"/>
  <w:LsdException Locked="false" SemiHidden="true" UnhideWhenUsed="true"
   Name="index heading"/>
  <w:LsdException Locked="false" Priority="35" SemiHidden="true"
   UnhideWhenUsed="true" QFormat="true" Name="caption"/>
  <w:LsdException Locked="false" SemiHidden="true" UnhideWhenUsed="true"
   Name="table of figures"/>
  <w:LsdException Locked="false" SemiHidden="true" UnhideWhenUsed="true"
   Name="envelope address"/>
  <w:LsdException Locked="false" SemiHidden="true" UnhideWhenUsed="true"
   Name="envelope return"/>
  <w:LsdException Locked="false" Priority="0" SemiHidden="true"
   UnhideWhenUsed="true" Name="footnote reference"/>
  <w:LsdException Locked="false" SemiHidden="true" UnhideWhenUsed="true"
   Name="annotation reference"/>
  <w:LsdException Locked="false" SemiHidden="true" UnhideWhenUsed="true"
   Name="line number"/>
  <w:LsdException Locked="false" SemiHidden="true" UnhideWhenUsed="true"
   Name="page number"/>
  <w:LsdException Locked="false" SemiHidden="true" UnhideWhenUsed="true"
   Name="endnote reference"/>
  <w:LsdException Locked="false" SemiHidden="true" UnhideWhenUsed="true"
   Name="endnote text"/>
  <w:LsdException Locked="false" SemiHidden="true" UnhideWhenUsed="true"
   Name="table of authorities"/>
  <w:LsdException Locked="false" SemiHidden="true" UnhideWhenUsed="true"
   Name="macro"/>
  <w:LsdException Locked="false" SemiHidden="true" UnhideWhenUsed="true"
   Name="toa heading"/>
  <w:LsdException Locked="false" SemiHidden="true" UnhideWhenUsed="true"
   Name="List"/>
  <w:LsdException Locked="false" SemiHidden="true" UnhideWhenUsed="true"
   Name="List Bullet"/>
  <w:LsdException Locked="false" SemiHidden="true" UnhideWhenUsed="true"
   Name="List Number"/>
  <w:LsdException Locked="false" SemiHidden="true" UnhideWhenUsed="true"
   Name="List 2"/>
  <w:LsdException Locked="false" SemiHidden="true" UnhideWhenUsed="true"
   Name="List 3"/>
  <w:LsdException Locked="false" SemiHidden="true" UnhideWhenUsed="true"
   Name="List 4"/>
  <w:LsdException Locked="false" SemiHidden="true" UnhideWhenUsed="true"
   Name="List 5"/>
  <w:LsdException Locked="false" SemiHidden="true" UnhideWhenUsed="true"
   Name="List Bullet 2"/>
  <w:LsdException Locked="false" SemiHidden="true" UnhideWhenUsed="true"
   Name="List Bullet 3"/>
  <w:LsdException Locked="false" SemiHidden="true" UnhideWhenUsed="true"
   Name="List Bullet 4"/>
  <w:LsdException Locked="false" SemiHidden="true" UnhideWhenUsed="true"
   Name="List Bullet 5"/>
  <w:LsdException Locked="false" SemiHidden="true" UnhideWhenUsed="true"
   Name="List Number 2"/>
  <w:LsdException Locked="false" SemiHidden="true" UnhideWhenUsed="true"
   Name="List Number 3"/>
  <w:LsdException Locked="false" SemiHidden="true" UnhideWhenUsed="true"
   Name="List Number 4"/>
  <w:LsdException Locked="false" SemiHidden="true" UnhideWhenUsed="true"
   Name="List Number 5"/>
  <w:LsdException Locked="false" Priority="10" QFormat="true" Name="Title"/>
  <w:LsdException Locked="false" SemiHidden="true" UnhideWhenUsed="true"
   Name="Closing"/>
  <w:LsdException Locked="false" SemiHidden="true" UnhideWhenUsed="true"
   Name="Signature"/>
  <w:LsdException Locked="false" Priority="1" SemiHidden="true"
   UnhideWhenUsed="true" Name="Default Paragraph Font"/>
  <w:LsdException Locked="false" SemiHidden="true" UnhideWhenUsed="true"
   Name="Body Text"/>
  <w:LsdException Locked="false" SemiHidden="true" UnhideWhenUsed="true"
   Name="Body Text Indent"/>
  <w:LsdException Locked="false" SemiHidden="true" UnhideWhenUsed="true"
   Name="List Continue"/>
  <w:LsdException Locked="false" SemiHidden="true" UnhideWhenUsed="true"
   Name="List Continue 2"/>
  <w:LsdException Locked="false" SemiHidden="true" UnhideWhenUsed="true"
   Name="List Continue 3"/>
  <w:LsdException Locked="false" SemiHidden="true" UnhideWhenUsed="true"
   Name="List Continue 4"/>
  <w:LsdException Locked="false" SemiHidden="true" UnhideWhenUsed="true"
   Name="List Continue 5"/>
  <w:LsdException Locked="false" SemiHidden="true" UnhideWhenUsed="true"
   Name="Message Header"/>
  <w:LsdException Locked="false" Priority="11" QFormat="true" Name="Subtitle"/>
  <w:LsdException Locked="false" SemiHidden="true" UnhideWhenUsed="true"
   Name="Salutation"/>
  <w:LsdException Locked="false" SemiHidden="true" UnhideWhenUsed="true"
   Name="Date"/>
  <w:LsdException Locked="false" SemiHidden="true" UnhideWhenUsed="true"
   Name="Body Text First Indent"/>
  <w:LsdException Locked="false" SemiHidden="true" UnhideWhenUsed="true"
   Name="Body Text First Indent 2"/>
  <w:LsdException Locked="false" SemiHidden="true" UnhideWhenUsed="true"
   Name="Note Heading"/>
  <w:LsdException Locked="false" SemiHidden="true" UnhideWhenUsed="true"
   Name="Body Text 2"/>
  <w:LsdException Locked="false" SemiHidden="true" UnhideWhenUsed="true"
   Name="Body Text 3"/>
  <w:LsdException Locked="false" SemiHidden="true" UnhideWhenUsed="true"
   Name="Body Text Indent 2"/>
  <w:LsdException Locked="false" SemiHidden="true" UnhideWhenUsed="true"
   Name="Body Text Indent 3"/>
  <w:LsdException Locked="false" SemiHidden="true" UnhideWhenUsed="true"
   Name="Block Text"/>
  <w:LsdException Locked="false" SemiHidden="true" UnhideWhenUsed="true"
   Name="Hyperlink"/>
  <w:LsdException Locked="false" SemiHidden="true" UnhideWhenUsed="true"
   Name="FollowedHyperlink"/>
  <w:LsdException Locked="false" Priority="22" QFormat="true" Name="Strong"/>
  <w:LsdException Locked="false" Priority="20" QFormat="true" Name="Emphasis"/>
  <w:LsdException Locked="false" SemiHidden="true" UnhideWhenUsed="true"
   Name="Document Map"/>
  <w:LsdException Locked="false" SemiHidden="true" UnhideWhenUsed="true"
   Name="Plain Text"/>
  <w:LsdException Locked="false" SemiHidden="true" UnhideWhenUsed="true"
   Name="E-mail Signature"/>
  <w:LsdException Locked="false" SemiHidden="true" UnhideWhenUsed="true"
   Name="HTML Top of Form"/>
  <w:LsdException Locked="false" SemiHidden="true" UnhideWhenUsed="true"
   Name="HTML Bottom of Form"/>
  <w:LsdException Locked="false" SemiHidden="true" UnhideWhenUsed="true"
   Name="Normal (Web)"/>
  <w:LsdException Locked="false" SemiHidden="true" UnhideWhenUsed="true"
   Name="HTML Acronym"/>
  <w:LsdException Locked="false" SemiHidden="true" UnhideWhenUsed="true"
   Name="HTML Address"/>
  <w:LsdException Locked="false" SemiHidden="true" UnhideWhenUsed="true"
   Name="HTML Cite"/>
  <w:LsdException Locked="false" SemiHidden="true" UnhideWhenUsed="true"
   Name="HTML Code"/>
  <w:LsdException Locked="false" SemiHidden="true" UnhideWhenUsed="true"
   Name="HTML Definition"/>
  <w:LsdException Locked="false" SemiHidden="true" UnhideWhenUsed="true"
   Name="HTML Keyboard"/>
  <w:LsdException Locked="false" SemiHidden="true" UnhideWhenUsed="true"
   Name="HTML Preformatted"/>
  <w:LsdException Locked="false" SemiHidden="true" UnhideWhenUsed="true"
   Name="HTML Sample"/>
  <w:LsdException Locked="false" SemiHidden="true" UnhideWhenUsed="true"
   Name="HTML Typewriter"/>
  <w:LsdException Locked="false" SemiHidden="true" UnhideWhenUsed="true"
   Name="HTML Variable"/>
  <w:LsdException Locked="false" SemiHidden="true" UnhideWhenUsed="true"
   Name="Normal Table"/>
  <w:LsdException Locked="false" SemiHidden="true" UnhideWhenUsed="true"
   Name="annotation subject"/>
  <w:LsdException Locked="false" SemiHidden="true" UnhideWhenUsed="true"
   Name="No List"/>
  <w:LsdException Locked="false" SemiHidden="true" UnhideWhenUsed="true"
   Name="Outline List 1"/>
  <w:LsdException Locked="false" SemiHidden="true" UnhideWhenUsed="true"
   Name="Outline List 2"/>
  <w:LsdException Locked="false" SemiHidden="true" UnhideWhenUsed="true"
   Name="Outline List 3"/>
  <w:LsdException Locked="false" SemiHidden="true" UnhideWhenUsed="true"
   Name="Table Simple 1"/>
  <w:LsdException Locked="false" SemiHidden="true" UnhideWhenUsed="true"
   Name="Table Simple 2"/>
  <w:LsdException Locked="false" SemiHidden="true" UnhideWhenUsed="true"
   Name="Table Simple 3"/>
  <w:LsdException Locked="false" SemiHidden="true" UnhideWhenUsed="true"
   Name="Table Classic 1"/>
  <w:LsdException Locked="false" SemiHidden="true" UnhideWhenUsed="true"
   Name="Table Classic 2"/>
  <w:LsdException Locked="false" SemiHidden="true" UnhideWhenUsed="true"
   Name="Table Classic 3"/>
  <w:LsdException Locked="false" SemiHidden="true" UnhideWhenUsed="true"
   Name="Table Classic 4"/>
  <w:LsdException Locked="false" SemiHidden="true" UnhideWhenUsed="true"
   Name="Table Colorful 1"/>
  <w:LsdException Locked="false" SemiHidden="true" UnhideWhenUsed="true"
   Name="Table Colorful 2"/>
  <w:LsdException Locked="false" SemiHidden="true" UnhideWhenUsed="true"
   Name="Table Colorful 3"/>
  <w:LsdException Locked="false" SemiHidden="true" UnhideWhenUsed="true"
   Name="Table Columns 1"/>
  <w:LsdException Locked="false" SemiHidden="true" UnhideWhenUsed="true"
   Name="Table Columns 2"/>
  <w:LsdException Locked="false" SemiHidden="true" UnhideWhenUsed="true"
   Name="Table Columns 3"/>
  <w:LsdException Locked="false" SemiHidden="true" UnhideWhenUsed="true"
   Name="Table Columns 4"/>
  <w:LsdException Locked="false" SemiHidden="true" UnhideWhenUsed="true"
   Name="Table Columns 5"/>
  <w:LsdException Locked="false" SemiHidden="true" UnhideWhenUsed="true"
   Name="Table Grid 1"/>
  <w:LsdException Locked="false" SemiHidden="true" UnhideWhenUsed="true"
   Name="Table Grid 2"/>
  <w:LsdException Locked="false" SemiHidden="true" UnhideWhenUsed="true"
   Name="Table Grid 3"/>
  <w:LsdException Locked="false" SemiHidden="true" UnhideWhenUsed="true"
   Name="Table Grid 4"/>
  <w:LsdException Locked="false" SemiHidden="true" UnhideWhenUsed="true"
   Name="Table Grid 5"/>
  <w:LsdException Locked="false" SemiHidden="true" UnhideWhenUsed="true"
   Name="Table Grid 6"/>
  <w:LsdException Locked="false" SemiHidden="true" UnhideWhenUsed="true"
   Name="Table Grid 7"/>
  <w:LsdException Locked="false" SemiHidden="true" UnhideWhenUsed="true"
   Name="Table Grid 8"/>
  <w:LsdException Locked="false" SemiHidden="true" UnhideWhenUsed="true"
   Name="Table List 1"/>
  <w:LsdException Locked="false" SemiHidden="true" UnhideWhenUsed="true"
   Name="Table List 2"/>
  <w:LsdException Locked="false" SemiHidden="true" UnhideWhenUsed="true"
   Name="Table List 3"/>
  <w:LsdException Locked="false" SemiHidden="true" UnhideWhenUsed="true"
   Name="Table List 4"/>
  <w:LsdException Locked="false" SemiHidden="true" UnhideWhenUsed="true"
   Name="Table List 5"/>
  <w:LsdException Locked="false" SemiHidden="true" UnhideWhenUsed="true"
   Name="Table List 6"/>
  <w:LsdException Locked="false" SemiHidden="true" UnhideWhenUsed="true"
   Name="Table List 7"/>
  <w:LsdException Locked="false" SemiHidden="true" UnhideWhenUsed="true"
   Name="Table List 8"/>
  <w:LsdException Locked="false" SemiHidden="true" UnhideWhenUsed="true"
   Name="Table 3D effects 1"/>
  <w:LsdException Locked="false" SemiHidden="true" UnhideWhenUsed="true"
   Name="Table 3D effects 2"/>
  <w:LsdException Locked="false" SemiHidden="true" UnhideWhenUsed="true"
   Name="Table 3D effects 3"/>
  <w:LsdException Locked="false" SemiHidden="true" UnhideWhenUsed="true"
   Name="Table Contemporary"/>
  <w:LsdException Locked="false" SemiHidden="true" UnhideWhenUsed="true"
   Name="Table Elegant"/>
  <w:LsdException Locked="false" SemiHidden="true" UnhideWhenUsed="true"
   Name="Table Professional"/>
  <w:LsdException Locked="false" SemiHidden="true" UnhideWhenUsed="true"
   Name="Table Subtle 1"/>
  <w:LsdException Locked="false" SemiHidden="true" UnhideWhenUsed="true"
   Name="Table Subtle 2"/>
  <w:LsdException Locked="false" SemiHidden="true" UnhideWhenUsed="true"
   Name="Table Web 1"/>
  <w:LsdException Locked="false" SemiHidden="true" UnhideWhenUsed="true"
   Name="Table Web 2"/>
  <w:LsdException Locked="false" SemiHidden="true" UnhideWhenUsed="true"
   Name="Table Web 3"/>
  <w:LsdException Locked="false" SemiHidden="true" UnhideWhenUsed="true"
   Name="Balloon Text"/>
  <w:LsdException Locked="false" Priority="59" Name="Table Grid"/>
  <w:LsdException Locked="false" SemiHidden="true" UnhideWhenUsed="true"
   Name="Table Theme"/>
  <w:LsdException Locked="false" SemiHidden="true" Name="Placeholder Text"/>
  <w:LsdException Locked="false" Priority="1" QFormat="true" Name="No Spacing"/>
  <w:LsdException Locked="false" Priority="60" Name="Light Shading"/>
  <w:LsdException Locked="false" Priority="61" Name="Light List"/>
  <w:LsdException Locked="false" Priority="62" Name="Light Grid"/>
  <w:LsdException Locked="false" Priority="63" Name="Medium Shading 1"/>
  <w:LsdException Locked="false" Priority="64" Name="Medium Shading 2"/>
  <w:LsdException Locked="false" Priority="65" Name="Medium List 1"/>
  <w:LsdException Locked="false" Priority="66" Name="Medium List 2"/>
  <w:LsdException Locked="false" Priority="67" Name="Medium Grid 1"/>
  <w:LsdException Locked="false" Priority="68" Name="Medium Grid 2"/>
  <w:LsdException Locked="false" Priority="69" Name="Medium Grid 3"/>
  <w:LsdException Locked="false" Priority="70" Name="Dark List"/>
  <w:LsdException Locked="false" Priority="71" Name="Colorful Shading"/>
  <w:LsdException Locked="false" Priority="72" Name="Colorful List"/>
  <w:LsdException Locked="false" Priority="73" Name="Colorful Grid"/>
  <w:LsdException Locked="false" Priority="60" Name="Light Shading Accent 1"/>
  <w:LsdException Locked="false" Priority="61" Name="Light List Accent 1"/>
  <w:LsdException Locked="false" Priority="62" Name="Light Grid Accent 1"/>
  <w:LsdException Locked="false" Priority="63" Name="Medium Shading 1 Accent 1"/>
  <w:LsdException Locked="false" Priority="64" Name="Medium Shading 2 Accent 1"/>
  <w:LsdException Locked="false" Priority="65" Name="Medium List 1 Accent 1"/>
  <w:LsdException Locked="false" SemiHidden="true" Name="Revision"/>
  <w:LsdException Locked="false" Priority="34" QFormat="true"
   Name="List Paragraph"/>
  <w:LsdException Locked="false" Priority="29" QFormat="true" Name="Quote"/>
  <w:LsdException Locked="false" Priority="30" QFormat="true"
   Name="Intense Quote"/>
  <w:LsdException Locked="false" Priority="66" Name="Medium List 2 Accent 1"/>
  <w:LsdException Locked="false" Priority="67" Name="Medium Grid 1 Accent 1"/>
  <w:LsdException Locked="false" Priority="68" Name="Medium Grid 2 Accent 1"/>
  <w:LsdException Locked="false" Priority="69" Name="Medium Grid 3 Accent 1"/>
  <w:LsdException Locked="false" Priority="70" Name="Dark List Accent 1"/>
  <w:LsdException Locked="false" Priority="71" Name="Colorful Shading Accent 1"/>
  <w:LsdException Locked="false" Priority="72" Name="Colorful List Accent 1"/>
  <w:LsdException Locked="false" Priority="73" Name="Colorful Grid Accent 1"/>
  <w:LsdException Locked="false" Priority="60" Name="Light Shading Accent 2"/>
  <w:LsdException Locked="false" Priority="61" Name="Light List Accent 2"/>
  <w:LsdException Locked="false" Priority="62" Name="Light Grid Accent 2"/>
  <w:LsdException Locked="false" Priority="63" Name="Medium Shading 1 Accent 2"/>
  <w:LsdException Locked="false" Priority="64" Name="Medium Shading 2 Accent 2"/>
  <w:LsdException Locked="false" Priority="65" Name="Medium List 1 Accent 2"/>
  <w:LsdException Locked="false" Priority="66" Name="Medium List 2 Accent 2"/>
  <w:LsdException Locked="false" Priority="67" Name="Medium Grid 1 Accent 2"/>
  <w:LsdException Locked="false" Priority="68" Name="Medium Grid 2 Accent 2"/>
  <w:LsdException Locked="false" Priority="69" Name="Medium Grid 3 Accent 2"/>
  <w:LsdException Locked="false" Priority="70" Name="Dark List Accent 2"/>
  <w:LsdException Locked="false" Priority="71" Name="Colorful Shading Accent 2"/>
  <w:LsdException Locked="false" Priority="72" Name="Colorful List Accent 2"/>
  <w:LsdException Locked="false" Priority="73" Name="Colorful Grid Accent 2"/>
  <w:LsdException Locked="false" Priority="60" Name="Light Shading Accent 3"/>
  <w:LsdException Locked="false" Priority="61" Name="Light List Accent 3"/>
  <w:LsdException Locked="false" Priority="62" Name="Light Grid Accent 3"/>
  <w:LsdException Locked="false" Priority="63" Name="Medium Shading 1 Accent 3"/>
  <w:LsdException Locked="false" Priority="64" Name="Medium Shading 2 Accent 3"/>
  <w:LsdException Locked="false" Priority="65" Name="Medium List 1 Accent 3"/>
  <w:LsdException Locked="false" Priority="66" Name="Medium List 2 Accent 3"/>
  <w:LsdException Locked="false" Priority="67" Name="Medium Grid 1 Accent 3"/>
  <w:LsdException Locked="false" Priority="68" Name="Medium Grid 2 Accent 3"/>
  <w:LsdException Locked="false" Priority="69" Name="Medium Grid 3 Accent 3"/>
  <w:LsdException Locked="false" Priority="70" Name="Dark List Accent 3"/>
  <w:LsdException Locked="false" Priority="71" Name="Colorful Shading Accent 3"/>
  <w:LsdException Locked="false" Priority="72" Name="Colorful List Accent 3"/>
  <w:LsdException Locked="false" Priority="73" Name="Colorful Grid Accent 3"/>
  <w:LsdException Locked="false" Priority="60" Name="Light Shading Accent 4"/>
  <w:LsdException Locked="false" Priority="61" Name="Light List Accent 4"/>
  <w:LsdException Locked="false" Priority="62" Name="Light Grid Accent 4"/>
  <w:LsdException Locked="false" Priority="63" Name="Medium Shading 1 Accent 4"/>
  <w:LsdException Locked="false" Priority="64" Name="Medium Shading 2 Accent 4"/>
  <w:LsdException Locked="false" Priority="65" Name="Medium List 1 Accent 4"/>
  <w:LsdException Locked="false" Priority="66" Name="Medium List 2 Accent 4"/>
  <w:LsdException Locked="false" Priority="67" Name="Medium Grid 1 Accent 4"/>
  <w:LsdException Locked="false" Priority="68" Name="Medium Grid 2 Accent 4"/>
  <w:LsdException Locked="false" Priority="69" Name="Medium Grid 3 Accent 4"/>
  <w:LsdException Locked="false" Priority="70" Name="Dark List Accent 4"/>
  <w:LsdException Locked="false" Priority="71" Name="Colorful Shading Accent 4"/>
  <w:LsdException Locked="false" Priority="72" Name="Colorful List Accent 4"/>
  <w:LsdException Locked="false" Priority="73" Name="Colorful Grid Accent 4"/>
  <w:LsdException Locked="false" Priority="60" Name="Light Shading Accent 5"/>
  <w:LsdException Locked="false" Priority="61" Name="Light List Accent 5"/>
  <w:LsdException Locked="false" Priority="62" Name="Light Grid Accent 5"/>
  <w:LsdException Locked="false" Priority="63" Name="Medium Shading 1 Accent 5"/>
  <w:LsdException Locked="false" Priority="64" Name="Medium Shading 2 Accent 5"/>
  <w:LsdException Locked="false" Priority="65" Name="Medium List 1 Accent 5"/>
  <w:LsdException Locked="false" Priority="66" Name="Medium List 2 Accent 5"/>
  <w:LsdException Locked="false" Priority="67" Name="Medium Grid 1 Accent 5"/>
  <w:LsdException Locked="false" Priority="68" Name="Medium Grid 2 Accent 5"/>
  <w:LsdException Locked="false" Priority="69" Name="Medium Grid 3 Accent 5"/>
  <w:LsdException Locked="false" Priority="70" Name="Dark List Accent 5"/>
  <w:LsdException Locked="false" Priority="71" Name="Colorful Shading Accent 5"/>
  <w:LsdException Locked="false" Priority="72" Name="Colorful List Accent 5"/>
  <w:LsdException Locked="false" Priority="73" Name="Colorful Grid Accent 5"/>
  <w:LsdException Locked="false" Priority="60" Name="Light Shading Accent 6"/>
  <w:LsdException Locked="false" Priority="61" Name="Light List Accent 6"/>
  <w:LsdException Locked="false" Priority="62" Name="Light Grid Accent 6"/>
  <w:LsdException Locked="false" Priority="63" Name="Medium Shading 1 Accent 6"/>
  <w:LsdException Locked="false" Priority="64" Name="Medium Shading 2 Accent 6"/>
  <w:LsdException Locked="false" Priority="65" Name="Medium List 1 Accent 6"/>
  <w:LsdException Locked="false" Priority="66" Name="Medium List 2 Accent 6"/>
  <w:LsdException Locked="false" Priority="67" Name="Medium Grid 1 Accent 6"/>
  <w:LsdException Locked="false" Priority="68" Name="Medium Grid 2 Accent 6"/>
  <w:LsdException Locked="false" Priority="69" Name="Medium Grid 3 Accent 6"/>
  <w:LsdException Locked="false" Priority="70" Name="Dark List Accent 6"/>
  <w:LsdException Locked="false" Priority="71" Name="Colorful Shading Accent 6"/>
  <w:LsdException Locked="false" Priority="72" Name="Colorful List Accent 6"/>
  <w:LsdException Locked="false" Priority="73" Name="Colorful Grid Accent 6"/>
  <w:LsdException Locked="false" Priority="19" QFormat="true"
   Name="Subtle Emphasis"/>
  <w:LsdException Locked="false" Priority="21" QFormat="true"
   Name="Intense Emphasis"/>
  <w:LsdException Locked="false" Priority="31" QFormat="true"
   Name="Subtle Reference"/>
  <w:LsdException Locked="false" Priority="32" QFormat="true"
   Name="Intense Reference"/>
  <w:LsdException Locked="false" Priority="33" QFormat="true" Name="Book Title"/>
  <w:LsdException Locked="false" Priority="37" SemiHidden="true"
   UnhideWhenUsed="true" Name="Bibliography"/>
  <w:LsdException Locked="false" Priority="39" SemiHidden="true"
   UnhideWhenUsed="true" QFormat="true" Name="TOC Heading"/>
  <w:LsdException Locked="false" Priority="41" Name="Plain Table 1"/>
  <w:LsdException Locked="false" Priority="42" Name="Plain Table 2"/>
  <w:LsdException Locked="false" Priority="43" Name="Plain Table 3"/>
  <w:LsdException Locked="false" Priority="44" Name="Plain Table 4"/>
  <w:LsdException Locked="false" Priority="45" Name="Plain Table 5"/>
  <w:LsdException Locked="false" Priority="40" Name="Grid Table Light"/>
  <w:LsdException Locked="false" Priority="46" Name="Grid Table 1 Light"/>
  <w:LsdException Locked="false" Priority="47" Name="Grid Table 2"/>
  <w:LsdException Locked="false" Priority="48" Name="Grid Table 3"/>
  <w:LsdException Locked="false" Priority="49" Name="Grid Table 4"/>
  <w:LsdException Locked="false" Priority="50" Name="Grid Table 5 Dark"/>
  <w:LsdException Locked="false" Priority="51" Name="Grid Table 6 Colorful"/>
  <w:LsdException Locked="false" Priority="52" Name="Grid Table 7 Colorful"/>
  <w:LsdException Locked="false" Priority="46"
   Name="Grid Table 1 Light Accent 1"/>
  <w:LsdException Locked="false" Priority="47" Name="Grid Table 2 Accent 1"/>
  <w:LsdException Locked="false" Priority="48" Name="Grid Table 3 Accent 1"/>
  <w:LsdException Locked="false" Priority="49" Name="Grid Table 4 Accent 1"/>
  <w:LsdException Locked="false" Priority="50" Name="Grid Table 5 Dark Accent 1"/>
  <w:LsdException Locked="false" Priority="51"
   Name="Grid Table 6 Colorful Accent 1"/>
  <w:LsdException Locked="false" Priority="52"
   Name="Grid Table 7 Colorful Accent 1"/>
  <w:LsdException Locked="false" Priority="46"
   Name="Grid Table 1 Light Accent 2"/>
  <w:LsdException Locked="false" Priority="47" Name="Grid Table 2 Accent 2"/>
  <w:LsdException Locked="false" Priority="48" Name="Grid Table 3 Accent 2"/>
  <w:LsdException Locked="false" Priority="49" Name="Grid Table 4 Accent 2"/>
  <w:LsdException Locked="false" Priority="50" Name="Grid Table 5 Dark Accent 2"/>
  <w:LsdException Locked="false" Priority="51"
   Name="Grid Table 6 Colorful Accent 2"/>
  <w:LsdException Locked="false" Priority="52"
   Name="Grid Table 7 Colorful Accent 2"/>
  <w:LsdException Locked="false" Priority="46"
   Name="Grid Table 1 Light Accent 3"/>
  <w:LsdException Locked="false" Priority="47" Name="Grid Table 2 Accent 3"/>
  <w:LsdException Locked="false" Priority="48" Name="Grid Table 3 Accent 3"/>
  <w:LsdException Locked="false" Priority="49" Name="Grid Table 4 Accent 3"/>
  <w:LsdException Locked="false" Priority="50" Name="Grid Table 5 Dark Accent 3"/>
  <w:LsdException Locked="false" Priority="51"
   Name="Grid Table 6 Colorful Accent 3"/>
  <w:LsdException Locked="false" Priority="52"
   Name="Grid Table 7 Colorful Accent 3"/>
  <w:LsdException Locked="false" Priority="46"
   Name="Grid Table 1 Light Accent 4"/>
  <w:LsdException Locked="false" Priority="47" Name="Grid Table 2 Accent 4"/>
  <w:LsdException Locked="false" Priority="48" Name="Grid Table 3 Accent 4"/>
  <w:LsdException Locked="false" Priority="49" Name="Grid Table 4 Accent 4"/>
  <w:LsdException Locked="false" Priority="50" Name="Grid Table 5 Dark Accent 4"/>
  <w:LsdException Locked="false" Priority="51"
   Name="Grid Table 6 Colorful Accent 4"/>
  <w:LsdException Locked="false" Priority="52"
   Name="Grid Table 7 Colorful Accent 4"/>
  <w:LsdException Locked="false" Priority="46"
   Name="Grid Table 1 Light Accent 5"/>
  <w:LsdException Locked="false" Priority="47" Name="Grid Table 2 Accent 5"/>
  <w:LsdException Locked="false" Priority="48" Name="Grid Table 3 Accent 5"/>
  <w:LsdException Locked="false" Priority="49" Name="Grid Table 4 Accent 5"/>
  <w:LsdException Locked="false" Priority="50" Name="Grid Table 5 Dark Accent 5"/>
  <w:LsdException Locked="false" Priority="51"
   Name="Grid Table 6 Colorful Accent 5"/>
  <w:LsdException Locked="false" Priority="52"
   Name="Grid Table 7 Colorful Accent 5"/>
  <w:LsdException Locked="false" Priority="46"
   Name="Grid Table 1 Light Accent 6"/>
  <w:LsdException Locked="false" Priority="47" Name="Grid Table 2 Accent 6"/>
  <w:LsdException Locked="false" Priority="48" Name="Grid Table 3 Accent 6"/>
  <w:LsdException Locked="false" Priority="49" Name="Grid Table 4 Accent 6"/>
  <w:LsdException Locked="false" Priority="50" Name="Grid Table 5 Dark Accent 6"/>
  <w:LsdException Locked="false" Priority="51"
   Name="Grid Table 6 Colorful Accent 6"/>
  <w:LsdException Locked="false" Priority="52"
   Name="Grid Table 7 Colorful Accent 6"/>
  <w:LsdException Locked="false" Priority="46" Name="List Table 1 Light"/>
  <w:LsdException Locked="false" Priority="47" Name="List Table 2"/>
  <w:LsdException Locked="false" Priority="48" Name="List Table 3"/>
  <w:LsdException Locked="false" Priority="49" Name="List Table 4"/>
  <w:LsdException Locked="false" Priority="50" Name="List Table 5 Dark"/>
  <w:LsdException Locked="false" Priority="51" Name="List Table 6 Colorful"/>
  <w:LsdException Locked="false" Priority="52" Name="List Table 7 Colorful"/>
  <w:LsdException Locked="false" Priority="46"
   Name="List Table 1 Light Accent 1"/>
  <w:LsdException Locked="false" Priority="47" Name="List Table 2 Accent 1"/>
  <w:LsdException Locked="false" Priority="48" Name="List Table 3 Accent 1"/>
  <w:LsdException Locked="false" Priority="49" Name="List Table 4 Accent 1"/>
  <w:LsdException Locked="false" Priority="50" Name="List Table 5 Dark Accent 1"/>
  <w:LsdException Locked="false" Priority="51"
   Name="List Table 6 Colorful Accent 1"/>
  <w:LsdException Locked="false" Priority="52"
   Name="List Table 7 Colorful Accent 1"/>
  <w:LsdException Locked="false" Priority="46"
   Name="List Table 1 Light Accent 2"/>
  <w:LsdException Locked="false" Priority="47" Name="List Table 2 Accent 2"/>
  <w:LsdException Locked="false" Priority="48" Name="List Table 3 Accent 2"/>
  <w:LsdException Locked="false" Priority="49" Name="List Table 4 Accent 2"/>
  <w:LsdException Locked="false" Priority="50" Name="List Table 5 Dark Accent 2"/>
  <w:LsdException Locked="false" Priority="51"
   Name="List Table 6 Colorful Accent 2"/>
  <w:LsdException Locked="false" Priority="52"
   Name="List Table 7 Colorful Accent 2"/>
  <w:LsdException Locked="false" Priority="46"
   Name="List Table 1 Light Accent 3"/>
  <w:LsdException Locked="false" Priority="47" Name="List Table 2 Accent 3"/>
  <w:LsdException Locked="false" Priority="48" Name="List Table 3 Accent 3"/>
  <w:LsdException Locked="false" Priority="49" Name="List Table 4 Accent 3"/>
  <w:LsdException Locked="false" Priority="50" Name="List Table 5 Dark Accent 3"/>
  <w:LsdException Locked="false" Priority="51"
   Name="List Table 6 Colorful Accent 3"/>
  <w:LsdException Locked="false" Priority="52"
   Name="List Table 7 Colorful Accent 3"/>
  <w:LsdException Locked="false" Priority="46"
   Name="List Table 1 Light Accent 4"/>
  <w:LsdException Locked="false" Priority="47" Name="List Table 2 Accent 4"/>
  <w:LsdException Locked="false" Priority="48" Name="List Table 3 Accent 4"/>
  <w:LsdException Locked="false" Priority="49" Name="List Table 4 Accent 4"/>
  <w:LsdException Locked="false" Priority="50" Name="List Table 5 Dark Accent 4"/>
  <w:LsdException Locked="false" Priority="51"
   Name="List Table 6 Colorful Accent 4"/>
  <w:LsdException Locked="false" Priority="52"
   Name="List Table 7 Colorful Accent 4"/>
  <w:LsdException Locked="false" Priority="46"
   Name="List Table 1 Light Accent 5"/>
  <w:LsdException Locked="false" Priority="47" Name="List Table 2 Accent 5"/>
  <w:LsdException Locked="false" Priority="48" Name="List Table 3 Accent 5"/>
  <w:LsdException Locked="false" Priority="49" Name="List Table 4 Accent 5"/>
  <w:LsdException Locked="false" Priority="50" Name="List Table 5 Dark Accent 5"/>
  <w:LsdException Locked="false" Priority="51"
   Name="List Table 6 Colorful Accent 5"/>
  <w:LsdException Locked="false" Priority="52"
   Name="List Table 7 Colorful Accent 5"/>
  <w:LsdException Locked="false" Priority="46"
   Name="List Table 1 Light Accent 6"/>
  <w:LsdException Locked="false" Priority="47" Name="List Table 2 Accent 6"/>
  <w:LsdException Locked="false" Priority="48" Name="List Table 3 Accent 6"/>
  <w:LsdException Locked="false" Priority="49" Name="List Table 4 Accent 6"/>
  <w:LsdException Locked="false" Priority="50" Name="List Table 5 Dark Accent 6"/>
  <w:LsdException Locked="false" Priority="51"
   Name="List Table 6 Colorful Accent 6"/>
  <w:LsdException Locked="false" Priority="52"
   Name="List Table 7 Colorful Accent 6"/>
  <w:LsdException Locked="false" SemiHidden="true" UnhideWhenUsed="true"
   Name="Mention"/>
  <w:LsdException Locked="false" SemiHidden="true" UnhideWhenUsed="true"
   Name="Smart Hyperlink"/>
  <w:LsdException Locked="false" SemiHidden="true" UnhideWhenUsed="true"
   Name="Hashtag"/>
  <w:LsdException Locked="false" SemiHidden="true" UnhideWhenUsed="true"
   Name="Unresolved Mention"/>
  <w:LsdException Locked="false" SemiHidden="true" UnhideWhenUsed="true"
   Name="Smart Link"/>
 </w:LatentStyles>
</xml><![endif]-->
<link rel=plchdr
href="New%20HÐ%20Ð&#7840;I%20L&Yacute;%202022%20-%20OTC%20f1.files/plchdr.htm">
<style>
<!--
 /* Font Definitions */
 @font-face
	{font-family:Wingdings;
	panose-1:5 0 0 0 0 0 0 0 0 0;
	mso-font-charset:2;
	mso-generic-font-family:auto;
	mso-font-pitch:variable;
	mso-font-signature:0 268435456 0 0 -2147483648 0;}
@font-face
	{font-family:"Cambria Math";
	panose-1:2 4 5 3 5 4 6 3 2 4;
	mso-font-charset:0;
	mso-generic-font-family:roman;
	mso-font-pitch:variable;
	mso-font-signature:3 0 0 0 1 0;}
@font-face
	{font-family:Calibri;
	panose-1:2 15 5 2 2 2 4 3 2 4;
	mso-font-charset:163;
	mso-generic-font-family:swiss;
	mso-font-pitch:variable;
	mso-font-signature:-469750017 -1073732485 9 0 511 0;}
@font-face
	{font-family:"Segoe UI";
	panose-1:2 11 5 2 4 2 4 2 2 3;
	mso-font-charset:163;
	mso-generic-font-family:swiss;
	mso-font-pitch:variable;
	mso-font-signature:-469750017 -1073683329 9 0 511 0;}
 /* Style Definitions */
 p.MsoNormal, li.MsoNormal, div.MsoNormal
	{mso-style-unhide:no;
	mso-style-qformat:yes;
	mso-style-parent:"";
	margin-top:0in;
	margin-right:0in;
	margin-bottom:10.0pt;
	margin-left:0in;
	line-height:115%;
	mso-pagination:widow-orphan;
	font-size:11.0pt;
	font-family:"Calibri",sans-serif;
	mso-fareast-font-family:Calibri;
	mso-bidi-font-family:"Times New Roman";
	mso-ansi-language:EN-US;
	mso-fareast-language:EN-US;}
h1
	{mso-style-priority:9;
	mso-style-unhide:no;
	mso-style-qformat:yes;
	mso-style-link:"Ð\1EA7u ð\1EC1 1 Char";
	mso-style-next:"BiÌnh thýõÌng";
	margin-top:12.0pt;
	margin-right:0in;
	margin-bottom:0in;
	margin-left:0in;
	line-height:115%;
	mso-pagination:widow-orphan lines-together;
	page-break-after:avoid;
	mso-outline-level:1;
	font-size:16.0pt;
	font-family:"Calibri Light",sans-serif;
	mso-ascii-font-family:"Calibri Light";
	mso-ascii-theme-font:major-latin;
	mso-fareast-font-family:"MS Gothic";
	mso-fareast-theme-font:major-fareast;
	mso-hansi-font-family:"Calibri Light";
	mso-hansi-theme-font:major-latin;
	mso-bidi-font-family:"Times New Roman";
	mso-bidi-theme-font:major-bidi;
	color:#2E74B5;
	mso-themecolor:accent1;
	mso-themeshade:191;
	mso-font-kerning:0pt;
	mso-ansi-language:EN-US;
	mso-fareast-language:EN-US;
	font-weight:normal;}
h2
	{mso-style-priority:9;
	mso-style-qformat:yes;
	mso-style-link:"Ð\1EA7u ð\1EC1 2 Char";
	mso-style-next:"BiÌnh thýõÌng";
	margin-top:10.0pt;
	margin-right:0in;
	margin-bottom:0in;
	margin-left:0in;
	line-height:115%;
	mso-pagination:widow-orphan lines-together;
	page-break-after:avoid;
	mso-outline-level:2;
	font-size:13.0pt;
	font-family:"Calibri Light",sans-serif;
	mso-ascii-font-family:"Calibri Light";
	mso-ascii-theme-font:major-latin;
	mso-fareast-font-family:"MS Gothic";
	mso-fareast-theme-font:major-fareast;
	mso-hansi-font-family:"Calibri Light";
	mso-hansi-theme-font:major-latin;
	mso-bidi-font-family:"Times New Roman";
	mso-bidi-theme-font:major-bidi;
	color:#5B9BD5;
	mso-themecolor:accent1;
	mso-ansi-language:EN-US;
	mso-fareast-language:EN-US;}
p.MsoFootnoteText, li.MsoFootnoteText, div.MsoFootnoteText
	{mso-style-noshow:yes;
	mso-style-link:"Vãn baÒn Cýõìc chuì Char";
	margin:0in;
	text-align:justify;
	mso-pagination:widow-orphan;
	font-size:10.0pt;
	font-family:"Times New Roman",serif;
	mso-fareast-font-family:"Times New Roman";
	mso-ansi-language:EN-US;
	mso-fareast-language:EN-US;}
p.MsoCommentText, li.MsoCommentText, div.MsoCommentText
	{mso-style-priority:99;
	mso-style-link:"Vãn baÒn Chuì thiìch Char";
	margin-top:0in;
	margin-right:0in;
	margin-bottom:10.0pt;
	margin-left:0in;
	line-height:115%;
	mso-pagination:widow-orphan;
	font-size:10.0pt;
	font-family:"Calibri",sans-serif;
	mso-fareast-font-family:Calibri;
	mso-bidi-font-family:"Times New Roman";
	mso-ansi-language:EN-US;
	mso-fareast-language:EN-US;}
p.MsoHeader, li.MsoHeader, div.MsoHeader
	{mso-style-priority:99;
	mso-style-link:"ÐâÌu trang Char";
	margin-top:0in;
	margin-right:0in;
	margin-bottom:10.0pt;
	margin-left:0in;
	line-height:115%;
	mso-pagination:widow-orphan;
	tab-stops:center 3.25in right 6.5in;
	font-size:11.0pt;
	font-family:"Calibri",sans-serif;
	mso-fareast-font-family:Calibri;
	mso-bidi-font-family:"Times New Roman";
	mso-ansi-language:EN-US;
	mso-fareast-language:EN-US;}
p.MsoFooter, li.MsoFooter, div.MsoFooter
	{mso-style-priority:99;
	mso-style-link:"Chân trang Char";
	margin-top:0in;
	margin-right:0in;
	margin-bottom:10.0pt;
	margin-left:0in;
	line-height:115%;
	mso-pagination:widow-orphan;
	tab-stops:center 3.25in right 6.5in;
	font-size:11.0pt;
	font-family:"Calibri",sans-serif;
	mso-fareast-font-family:Calibri;
	mso-bidi-font-family:"Times New Roman";
	mso-ansi-language:EN-US;
	mso-fareast-language:EN-US;}
span.MsoFootnoteReference
	{mso-style-noshow:yes;
	mso-style-parent:"";
	vertical-align:super;}
span.MsoCommentReference
	{mso-style-priority:99;
	mso-style-parent:"";
	mso-ansi-font-size:8.0pt;
	mso-bidi-font-size:8.0pt;}
p.MsoSubtitle, li.MsoSubtitle, div.MsoSubtitle
	{mso-style-priority:11;
	mso-style-unhide:no;
	mso-style-qformat:yes;
	mso-style-link:"Tiêu ðêÌ phuò Char";
	mso-style-next:"BiÌnh thýõÌng";
	margin-top:0in;
	margin-right:0in;
	margin-bottom:8.0pt;
	margin-left:0in;
	line-height:115%;
	mso-pagination:widow-orphan;
	font-size:11.0pt;
	font-family:"Calibri",sans-serif;
	mso-ascii-font-family:Calibri;
	mso-ascii-theme-font:minor-latin;
	mso-fareast-font-family:"MS Mincho";
	mso-fareast-theme-font:minor-fareast;
	mso-hansi-font-family:Calibri;
	mso-hansi-theme-font:minor-latin;
	mso-bidi-font-family:"Times New Roman";
	mso-bidi-theme-font:minor-bidi;
	color:#5A5A5A;
	mso-themecolor:text1;
	mso-themetint:165;
	letter-spacing:.75pt;
	mso-ansi-language:EN-US;
	mso-fareast-language:EN-US;}
a:link, span.MsoHyperlink
	{mso-style-priority:99;
	mso-style-parent:"";
	color:blue;
	text-decoration:underline;
	text-underline:single;}
a:visited, span.MsoHyperlinkFollowed
	{mso-style-noshow:yes;
	mso-style-priority:99;
	color:#954F72;
	mso-themecolor:followedhyperlink;
	text-decoration:underline;
	text-underline:single;}
p.MsoCommentSubject, li.MsoCommentSubject, div.MsoCommentSubject
	{mso-style-noshow:yes;
	mso-style-priority:99;
	mso-style-parent:"Vãn baÒn Chuì thiìch";
	mso-style-link:"ChuÒ ðêÌ Chuì thiìch Char";
	mso-style-next:"Vãn baÒn Chuì thiìch";
	margin-top:0in;
	margin-right:0in;
	margin-bottom:10.0pt;
	margin-left:0in;
	line-height:115%;
	mso-pagination:widow-orphan;
	font-size:10.0pt;
	font-family:"Calibri",sans-serif;
	mso-fareast-font-family:Calibri;
	mso-bidi-font-family:"Times New Roman";
	mso-ansi-language:EN-US;
	mso-fareast-language:EN-US;
	font-weight:bold;}
p.MsoAcetate, li.MsoAcetate, div.MsoAcetate
	{mso-style-noshow:yes;
	mso-style-priority:99;
	mso-style-link:"Boìng chuì thiìch Char";
	margin:0in;
	mso-pagination:widow-orphan;
	font-size:9.0pt;
	font-family:"Segoe UI",sans-serif;
	mso-fareast-font-family:Calibri;
	mso-ansi-language:EN-US;
	mso-fareast-language:EN-US;}
p.MsoNoSpacing, li.MsoNoSpacing, div.MsoNoSpacing
	{mso-style-priority:1;
	mso-style-unhide:no;
	mso-style-qformat:yes;
	mso-style-parent:"";
	margin:0in;
	mso-pagination:widow-orphan;
	font-size:11.0pt;
	font-family:"Calibri",sans-serif;
	mso-fareast-font-family:Calibri;
	mso-bidi-font-family:"Times New Roman";
	mso-ansi-language:EN-US;
	mso-fareast-language:EN-US;}
p.MsoRMPane, li.MsoRMPane, div.MsoRMPane
	{mso-style-noshow:yes;
	mso-style-priority:99;
	mso-style-unhide:no;
	mso-style-parent:"";
	margin:0in;
	mso-pagination:widow-orphan;
	font-size:11.0pt;
	font-family:"Calibri",sans-serif;
	mso-fareast-font-family:Calibri;
	mso-bidi-font-family:"Times New Roman";
	mso-ansi-language:EN-US;
	mso-fareast-language:EN-US;}
p.MsoListParagraph, li.MsoListParagraph, div.MsoListParagraph
	{mso-style-priority:34;
	mso-style-unhide:no;
	mso-style-qformat:yes;
	margin-top:0in;
	margin-right:0in;
	margin-bottom:10.0pt;
	margin-left:.5in;
	mso-add-space:auto;
	line-height:115%;
	mso-pagination:widow-orphan;
	font-size:11.0pt;
	font-family:"Calibri",sans-serif;
	mso-fareast-font-family:Calibri;
	mso-bidi-font-family:"Times New Roman";
	mso-ansi-language:EN-US;
	mso-fareast-language:EN-US;}
p.MsoListParagraphCxSpFirst, li.MsoListParagraphCxSpFirst, div.MsoListParagraphCxSpFirst
	{mso-style-priority:34;
	mso-style-unhide:no;
	mso-style-qformat:yes;
	mso-style-type:export-only;
	margin-top:0in;
	margin-right:0in;
	margin-bottom:0in;
	margin-left:.5in;
	mso-add-space:auto;
	line-height:115%;
	mso-pagination:widow-orphan;
	font-size:11.0pt;
	font-family:"Calibri",sans-serif;
	mso-fareast-font-family:Calibri;
	mso-bidi-font-family:"Times New Roman";
	mso-ansi-language:EN-US;
	mso-fareast-language:EN-US;}
p.MsoListParagraphCxSpMiddle, li.MsoListParagraphCxSpMiddle, div.MsoListParagraphCxSpMiddle
	{mso-style-priority:34;
	mso-style-unhide:no;
	mso-style-qformat:yes;
	mso-style-type:export-only;
	margin-top:0in;
	margin-right:0in;
	margin-bottom:0in;
	margin-left:.5in;
	mso-add-space:auto;
	line-height:115%;
	mso-pagination:widow-orphan;
	font-size:11.0pt;
	font-family:"Calibri",sans-serif;
	mso-fareast-font-family:Calibri;
	mso-bidi-font-family:"Times New Roman";
	mso-ansi-language:EN-US;
	mso-fareast-language:EN-US;}
p.MsoListParagraphCxSpLast, li.MsoListParagraphCxSpLast, div.MsoListParagraphCxSpLast
	{mso-style-priority:34;
	mso-style-unhide:no;
	mso-style-qformat:yes;
	mso-style-type:export-only;
	margin-top:0in;
	margin-right:0in;
	margin-bottom:10.0pt;
	margin-left:.5in;
	mso-add-space:auto;
	line-height:115%;
	mso-pagination:widow-orphan;
	font-size:11.0pt;
	font-family:"Calibri",sans-serif;
	mso-fareast-font-family:Calibri;
	mso-bidi-font-family:"Times New Roman";
	mso-ansi-language:EN-US;
	mso-fareast-language:EN-US;}
span.utrangChar
	{mso-style-name:"ÐâÌu trang Char";
	mso-style-priority:99;
	mso-style-unhide:no;
	mso-style-locked:yes;
	mso-style-parent:"";
	mso-style-link:"ÐâÌu trang";
	mso-ansi-font-size:11.0pt;
	mso-bidi-font-size:11.0pt;}
span.ChntrangChar
	{mso-style-name:"Chân trang Char";
	mso-style-priority:99;
	mso-style-unhide:no;
	mso-style-locked:yes;
	mso-style-parent:"";
	mso-style-link:"Chân trang";
	mso-ansi-font-size:11.0pt;
	mso-bidi-font-size:11.0pt;}
span.BongchuthichChar
	{mso-style-name:"Boìng chuì thiìch Char";
	mso-style-noshow:yes;
	mso-style-priority:99;
	mso-style-unhide:no;
	mso-style-locked:yes;
	mso-style-parent:"";
	mso-style-link:"Boìng chuì thiìch";
	mso-ansi-font-size:9.0pt;
	mso-bidi-font-size:9.0pt;
	font-family:"Segoe UI",sans-serif;
	mso-ascii-font-family:"Segoe UI";
	mso-hansi-font-family:"Segoe UI";
	mso-bidi-font-family:"Segoe UI";}
span.VnbanCcchuChar
	{mso-style-name:"Vãn baÒn Cýõìc chuì Char";
	mso-style-noshow:yes;
	mso-style-unhide:no;
	mso-style-locked:yes;
	mso-style-parent:"";
	mso-style-link:"Vãn baÒn Cýõìc chuì";
	font-family:"Times New Roman",serif;
	mso-ascii-font-family:"Times New Roman";
	mso-fareast-font-family:"Times New Roman";
	mso-hansi-font-family:"Times New Roman";}
span.VnbanChuthichChar
	{mso-style-name:"Vãn baÒn Chuì thiìch Char";
	mso-style-priority:99;
	mso-style-unhide:no;
	mso-style-locked:yes;
	mso-style-link:"Vãn baÒn Chuì thiìch";}
span.ChuChuthichChar
	{mso-style-name:"ChuÒ ðêÌ Chuì thiìch Char";
	mso-style-noshow:yes;
	mso-style-priority:99;
	mso-style-unhide:no;
	mso-style-locked:yes;
	mso-style-parent:"";
	mso-style-link:"ChuÒ ðêÌ Chuì thiìch";
	font-weight:bold;}
span.u2Char
	{mso-style-name:"Ð\1EA7u ð\1EC1 2 Char";
	mso-style-priority:9;
	mso-style-unhide:no;
	mso-style-locked:yes;
	mso-style-link:"Ð\1EA7u ð\1EC1 2";
	mso-ansi-font-size:13.0pt;
	mso-bidi-font-size:13.0pt;
	font-family:"Calibri Light",sans-serif;
	mso-ascii-font-family:"Calibri Light";
	mso-ascii-theme-font:major-latin;
	mso-fareast-font-family:"MS Gothic";
	mso-fareast-theme-font:major-fareast;
	mso-hansi-font-family:"Calibri Light";
	mso-hansi-theme-font:major-latin;
	mso-bidi-font-family:"Times New Roman";
	mso-bidi-theme-font:major-bidi;
	color:#5B9BD5;
	mso-themecolor:accent1;
	font-weight:bold;}
span.f
	{mso-style-name:f;
	mso-style-unhide:no;}
span.UnresolvedMention1
	{mso-style-name:"Unresolved Mention1";
	mso-style-noshow:yes;
	mso-style-priority:99;
	color:gray;
	background:#E6E6E6;}
span.u1Char
	{mso-style-name:"Ð\1EA7u ð\1EC1 1 Char";
	mso-style-priority:9;
	mso-style-unhide:no;
	mso-style-locked:yes;
	mso-style-link:"Ð\1EA7u ð\1EC1 1";
	mso-ansi-font-size:16.0pt;
	mso-bidi-font-size:16.0pt;
	font-family:"Calibri Light",sans-serif;
	mso-ascii-font-family:"Calibri Light";
	mso-ascii-theme-font:major-latin;
	mso-fareast-font-family:"MS Gothic";
	mso-fareast-theme-font:major-fareast;
	mso-hansi-font-family:"Calibri Light";
	mso-hansi-theme-font:major-latin;
	mso-bidi-font-family:"Times New Roman";
	mso-bidi-theme-font:major-bidi;
	color:#2E74B5;
	mso-themecolor:accent1;
	mso-themeshade:191;}
span.TiuphuChar
	{mso-style-name:"Tiêu ðêÌ phuò Char";
	mso-style-priority:11;
	mso-style-unhide:no;
	mso-style-locked:yes;
	mso-style-link:"Tiêu ðêÌ phuò";
	mso-ansi-font-size:11.0pt;
	mso-bidi-font-size:11.0pt;
	font-family:"Calibri",sans-serif;
	mso-ascii-font-family:Calibri;
	mso-ascii-theme-font:minor-latin;
	mso-fareast-font-family:"MS Mincho";
	mso-fareast-theme-font:minor-fareast;
	mso-hansi-font-family:Calibri;
	mso-hansi-theme-font:minor-latin;
	mso-bidi-font-family:"Times New Roman";
	mso-bidi-theme-font:minor-bidi;
	color:#5A5A5A;
	mso-themecolor:text1;
	mso-themetint:165;
	letter-spacing:.75pt;}
span.GramE
	{mso-style-name:"";
	mso-gram-e:yes;}
.MsoChpDefault
	{mso-style-type:export-only;
	mso-default-props:yes;
	font-size:10.0pt;
	mso-ansi-font-size:10.0pt;
	mso-bidi-font-size:10.0pt;
	font-family:"Calibri",sans-serif;
	mso-ascii-font-family:Calibri;
	mso-fareast-font-family:Calibri;
	mso-hansi-font-family:Calibri;
	mso-ansi-language:EN-US;
	mso-fareast-language:EN-US;}
 /* Page Definitions */
 @page
	{mso-footnote-separator:url("New%20HÐ%20Ð\1EA0I%20L\00DD%202022%20-%20OTC%20f1.files/header.htm") fs;
	mso-footnote-continuation-separator:url("New%20HÐ%20Ð\1EA0I%20L\00DD%202022%20-%20OTC%20f1.files/header.htm") fcs;
	mso-footnote-continuation-notice:url("New%20HÐ%20Ð\1EA0I%20L\00DD%202022%20-%20OTC%20f1.files/header.htm") fcn;
	mso-endnote-separator:url("New%20HÐ%20Ð\1EA0I%20L\00DD%202022%20-%20OTC%20f1.files/header.htm") es;
	mso-endnote-continuation-separator:url("New%20HÐ%20Ð\1EA0I%20L\00DD%202022%20-%20OTC%20f1.files/header.htm") ecs;
	mso-endnote-continuation-notice:url("New%20HÐ%20Ð\1EA0I%20L\00DD%202022%20-%20OTC%20f1.files/header.htm") ecn;}
@page WordSection1
	{size:595.3pt 841.9pt;
	margin:21.3pt 42.55pt 42.55pt 56.7pt;
	mso-header-margin:0in;
	mso-footer-margin:0in;
	mso-header:url("New%20HÐ%20Ð\1EA0I%20L\00DD%202022%20-%20OTC%20f1.files/header.htm") h1;
	mso-footer:url("New%20HÐ%20Ð\1EA0I%20L\00DD%202022%20-%20OTC%20f1.files/header.htm") f1;
	mso-paper-source:15 0;}
div.WordSection1
	{page:WordSection1;}
 /* List Definitions */
 @list l0
	{mso-list-id:75518908;
	mso-list-type:hybrid;
	mso-list-template-ids:1453212534 -781316836 67698713 67698715 67698703 67698713 67698715 67698703 67698713 67698715;}
@list l0:level1
	{mso-level-text:"12\.%1";
	mso-level-tab-stop:none;
	mso-level-number-position:left;
	margin-left:64.5pt;
	text-indent:-.25in;
	mso-ansi-font-weight:normal;}
@list l0:level2
	{mso-level-number-format:alpha-lower;
	mso-level-tab-stop:none;
	mso-level-number-position:left;
	margin-left:100.5pt;
	text-indent:-.25in;}
@list l0:level3
	{mso-level-number-format:roman-lower;
	mso-level-tab-stop:none;
	mso-level-number-position:right;
	margin-left:136.5pt;
	text-indent:-9.0pt;}
@list l0:level4
	{mso-level-tab-stop:none;
	mso-level-number-position:left;
	margin-left:172.5pt;
	text-indent:-.25in;}
@list l0:level5
	{mso-level-number-format:alpha-lower;
	mso-level-tab-stop:none;
	mso-level-number-position:left;
	margin-left:208.5pt;
	text-indent:-.25in;}
@list l0:level6
	{mso-level-number-format:roman-lower;
	mso-level-tab-stop:none;
	mso-level-number-position:right;
	margin-left:244.5pt;
	text-indent:-9.0pt;}
@list l0:level7
	{mso-level-tab-stop:none;
	mso-level-number-position:left;
	margin-left:280.5pt;
	text-indent:-.25in;}
@list l0:level8
	{mso-level-number-format:alpha-lower;
	mso-level-tab-stop:none;
	mso-level-number-position:left;
	margin-left:316.5pt;
	text-indent:-.25in;}
@list l0:level9
	{mso-level-number-format:roman-lower;
	mso-level-tab-stop:none;
	mso-level-number-position:right;
	margin-left:352.5pt;
	text-indent:-9.0pt;}
@list l1
	{mso-list-id:132140073;
	mso-list-template-ids:-1265751440;}
@list l1:level1
	{mso-level-start-at:10;
	mso-level-tab-stop:none;
	mso-level-number-position:left;
	margin-left:21.75pt;
	text-indent:-21.75pt;}
@list l1:level2
	{mso-level-text:"%1\.%2\.";
	mso-level-tab-stop:none;
	mso-level-number-position:left;
	margin-left:156.45pt;
	text-indent:-21.75pt;
	mso-ansi-font-weight:normal;}
@list l1:level3
	{mso-level-text:"%1\.%2\.%3\.";
	mso-level-tab-stop:none;
	mso-level-number-position:left;
	margin-left:305.4pt;
	text-indent:-.5in;}
@list l1:level4
	{mso-level-text:"%1\.%2\.%3\.%4\.";
	mso-level-tab-stop:none;
	mso-level-number-position:left;
	margin-left:440.1pt;
	text-indent:-.5in;}
@list l1:level5
	{mso-level-text:"%1\.%2\.%3\.%4\.%5\.";
	mso-level-tab-stop:none;
	mso-level-number-position:left;
	margin-left:592.8pt;
	text-indent:-.75in;}
@list l1:level6
	{mso-level-text:"%1\.%2\.%3\.%4\.%5\.%6\.";
	mso-level-tab-stop:none;
	mso-level-number-position:left;
	margin-left:727.5pt;
	text-indent:-.75in;}
@list l1:level7
	{mso-level-text:"%1\.%2\.%3\.%4\.%5\.%6\.%7\.";
	mso-level-tab-stop:none;
	mso-level-number-position:left;
	margin-left:880.2pt;
	text-indent:-1.0in;}
@list l1:level8
	{mso-level-text:"%1\.%2\.%3\.%4\.%5\.%6\.%7\.%8\.";
	mso-level-tab-stop:none;
	mso-level-number-position:left;
	margin-left:1014.9pt;
	text-indent:-1.0in;}
@list l1:level9
	{mso-level-text:"%1\.%2\.%3\.%4\.%5\.%6\.%7\.%8\.%9\.";
	mso-level-tab-stop:none;
	mso-level-number-position:left;
	margin-left:1167.6pt;
	text-indent:-1.25in;}
@list l2
	{mso-list-id:169873486;
	mso-list-template-ids:-2006032384;
	mso-list-style-priority:99;
	mso-list-style-name:Style1;}
@list l2:level1
	{mso-level-tab-stop:none;
	mso-level-number-position:left;
	margin-left:.25in;
	text-indent:-.25in;}
@list l2:level2
	{mso-level-text:"1\.%2\.";
	mso-level-tab-stop:none;
	mso-level-number-position:left;
	margin-left:28.7pt;
	text-indent:-.3in;
	mso-ansi-font-weight:normal;}
@list l2:level3
	{mso-level-text:"%1\.%2\.%3\.";
	mso-level-tab-stop:none;
	mso-level-number-position:left;
	margin-left:.85in;
	text-indent:-.35in;
	color:windowtext;}
@list l2:level4
	{mso-level-text:"%1\.%2\.%3\.%4\.";
	mso-level-tab-stop:none;
	mso-level-number-position:left;
	margin-left:1.2in;
	text-indent:-.45in;}
@list l2:level5
	{mso-level-text:"%1\.%2\.%3\.%4\.%5\.";
	mso-level-tab-stop:none;
	mso-level-number-position:left;
	margin-left:1.55in;
	text-indent:-.55in;}
@list l2:level6
	{mso-level-text:"%1\.%2\.%3\.%4\.%5\.%6\.";
	mso-level-tab-stop:none;
	mso-level-number-position:left;
	margin-left:1.9in;
	text-indent:-.65in;}
@list l2:level7
	{mso-level-text:"%1\.%2\.%3\.%4\.%5\.%6\.%7\.";
	mso-level-tab-stop:none;
	mso-level-number-position:left;
	margin-left:2.25in;
	text-indent:-.75in;}
@list l2:level8
	{mso-level-text:"%1\.%2\.%3\.%4\.%5\.%6\.%7\.%8\.";
	mso-level-tab-stop:none;
	mso-level-number-position:left;
	margin-left:2.6in;
	text-indent:-.85in;}
@list l2:level9
	{mso-level-text:"%1\.%2\.%3\.%4\.%5\.%6\.%7\.%8\.%9\.";
	mso-level-tab-stop:none;
	mso-level-number-position:left;
	margin-left:3.0in;
	text-indent:-1.0in;}
@list l3
	{mso-list-id:201525422;
	mso-list-type:hybrid;
	mso-list-template-ids:1328331462 1744224158 67698691 67698693 67698689 67698691 67698693 67698689 67698691 67698693;}
@list l3:level1
	{mso-level-number-format:bullet;
	mso-level-text:\F02D;
	mso-level-tab-stop:none;
	mso-level-number-position:left;
	text-indent:-.25in;
	font-family:Symbol;}
@list l3:level2
	{mso-level-number-format:bullet;
	mso-level-text:o;
	mso-level-tab-stop:none;
	mso-level-number-position:left;
	text-indent:-.25in;
	font-family:"Courier New";}
@list l3:level3
	{mso-level-number-format:bullet;
	mso-level-text:\F0A7;
	mso-level-tab-stop:none;
	mso-level-number-position:left;
	text-indent:-.25in;
	font-family:Wingdings;}
@list l3:level4
	{mso-level-number-format:bullet;
	mso-level-text:\F0B7;
	mso-level-tab-stop:none;
	mso-level-number-position:left;
	text-indent:-.25in;
	font-family:Symbol;}
@list l3:level5
	{mso-level-number-format:bullet;
	mso-level-text:o;
	mso-level-tab-stop:none;
	mso-level-number-position:left;
	text-indent:-.25in;
	font-family:"Courier New";}
@list l3:level6
	{mso-level-number-format:bullet;
	mso-level-text:\F0A7;
	mso-level-tab-stop:none;
	mso-level-number-position:left;
	text-indent:-.25in;
	font-family:Wingdings;}
@list l3:level7
	{mso-level-number-format:bullet;
	mso-level-text:\F0B7;
	mso-level-tab-stop:none;
	mso-level-number-position:left;
	text-indent:-.25in;
	font-family:Symbol;}
@list l3:level8
	{mso-level-number-format:bullet;
	mso-level-text:o;
	mso-level-tab-stop:none;
	mso-level-number-position:left;
	text-indent:-.25in;
	font-family:"Courier New";}
@list l3:level9
	{mso-level-number-format:bullet;
	mso-level-text:\F0A7;
	mso-level-tab-stop:none;
	mso-level-number-position:left;
	text-indent:-.25in;
	font-family:Wingdings;}
@list l4
	{mso-list-id:265776262;
	mso-list-template-ids:838269796;}
@list l4:level1
	{mso-level-start-at:9;
	mso-level-text:%1;
	mso-level-tab-stop:none;
	mso-level-number-position:left;
	margin-left:.25in;
	text-indent:-.25in;
	mso-ansi-font-weight:normal;}
@list l4:level2
	{mso-level-text:"%1\.%2";
	mso-level-tab-stop:none;
	mso-level-number-position:left;
	margin-left:22.5pt;
	text-indent:-.25in;
	mso-ansi-font-weight:normal;}
@list l4:level3
	{mso-level-text:"%1\.%2\.%3";
	mso-level-tab-stop:none;
	mso-level-number-position:left;
	margin-left:45.0pt;
	text-indent:-.5in;
	mso-ansi-font-weight:normal;}
@list l4:level4
	{mso-level-text:"%1\.%2\.%3\.%4";
	mso-level-tab-stop:none;
	mso-level-number-position:left;
	margin-left:49.5pt;
	text-indent:-.5in;
	mso-ansi-font-weight:normal;}
@list l4:level5
	{mso-level-text:"%1\.%2\.%3\.%4\.%5";
	mso-level-tab-stop:none;
	mso-level-number-position:left;
	margin-left:.75in;
	text-indent:-.5in;
	mso-ansi-font-weight:normal;}
@list l4:level6
	{mso-level-text:"%1\.%2\.%3\.%4\.%5\.%6";
	mso-level-tab-stop:none;
	mso-level-number-position:left;
	margin-left:76.5pt;
	text-indent:-.75in;
	mso-ansi-font-weight:normal;}
@list l4:level7
	{mso-level-text:"%1\.%2\.%3\.%4\.%5\.%6\.%7";
	mso-level-tab-stop:none;
	mso-level-number-position:left;
	margin-left:81.0pt;
	text-indent:-.75in;
	mso-ansi-font-weight:normal;}
@list l4:level8
	{mso-level-text:"%1\.%2\.%3\.%4\.%5\.%6\.%7\.%8";
	mso-level-tab-stop:none;
	mso-level-number-position:left;
	margin-left:103.5pt;
	text-indent:-1.0in;
	mso-ansi-font-weight:normal;}
@list l4:level9
	{mso-level-text:"%1\.%2\.%3\.%4\.%5\.%6\.%7\.%8\.%9";
	mso-level-tab-stop:none;
	mso-level-number-position:left;
	margin-left:1.5in;
	text-indent:-1.0in;
	mso-ansi-font-weight:normal;}
@list l5
	{mso-list-id:272589517;
	mso-list-template-ids:-920850296;}
@list l5:level1
	{mso-level-start-at:5;
	mso-level-tab-stop:none;
	mso-level-number-position:left;
	margin-left:.25in;
	text-indent:-.25in;
	mso-ansi-font-weight:normal;}
@list l5:level2
	{mso-level-start-at:2;
	mso-level-text:"%1\.%2\.";
	mso-level-tab-stop:none;
	mso-level-number-position:left;
	margin-left:22.5pt;
	text-indent:-.25in;
	mso-ansi-font-weight:bold;}
@list l5:level3
	{mso-level-text:"%1\.%2\.%3\.";
	mso-level-tab-stop:none;
	mso-level-number-position:left;
	margin-left:45.0pt;
	text-indent:-.5in;
	mso-ansi-font-weight:normal;}
@list l5:level4
	{mso-level-text:"%1\.%2\.%3\.%4\.";
	mso-level-tab-stop:none;
	mso-level-number-position:left;
	margin-left:49.5pt;
	text-indent:-.5in;
	mso-ansi-font-weight:normal;}
@list l5:level5
	{mso-level-text:"%1\.%2\.%3\.%4\.%5\.";
	mso-level-tab-stop:none;
	mso-level-number-position:left;
	margin-left:1.0in;
	text-indent:-.75in;
	mso-ansi-font-weight:normal;}
@list l5:level6
	{mso-level-text:"%1\.%2\.%3\.%4\.%5\.%6\.";
	mso-level-tab-stop:none;
	mso-level-number-position:left;
	margin-left:76.5pt;
	text-indent:-.75in;
	mso-ansi-font-weight:normal;}
@list l5:level7
	{mso-level-text:"%1\.%2\.%3\.%4\.%5\.%6\.%7\.";
	mso-level-tab-stop:none;
	mso-level-number-position:left;
	margin-left:81.0pt;
	text-indent:-.75in;
	mso-ansi-font-weight:normal;}
@list l5:level8
	{mso-level-text:"%1\.%2\.%3\.%4\.%5\.%6\.%7\.%8\.";
	mso-level-tab-stop:none;
	mso-level-number-position:left;
	margin-left:103.5pt;
	text-indent:-1.0in;
	mso-ansi-font-weight:normal;}
@list l5:level9
	{mso-level-text:"%1\.%2\.%3\.%4\.%5\.%6\.%7\.%8\.%9\.";
	mso-level-tab-stop:none;
	mso-level-number-position:left;
	margin-left:1.5in;
	text-indent:-1.0in;
	mso-ansi-font-weight:normal;}
@list l6
	{mso-list-id:304815900;
	mso-list-template-ids:1889940090;}
@list l6:level1
	{mso-level-start-at:8;
	mso-level-text:%1;
	mso-level-tab-stop:none;
	mso-level-number-position:left;
	margin-left:.25in;
	text-indent:-.25in;}
@list l6:level2
	{mso-level-start-at:2;
	mso-level-text:"%1\.%2";
	mso-level-tab-stop:none;
	mso-level-number-position:left;
	margin-left:.25in;
	text-indent:-.25in;}
@list l6:level3
	{mso-level-text:"%1\.%2\.%3";
	mso-level-tab-stop:none;
	mso-level-number-position:left;
	margin-left:.5in;
	text-indent:-.5in;}
@list l6:level4
	{mso-level-text:"%1\.%2\.%3\.%4";
	mso-level-tab-stop:none;
	mso-level-number-position:left;
	margin-left:.5in;
	text-indent:-.5in;}
@list l6:level5
	{mso-level-text:"%1\.%2\.%3\.%4\.%5";
	mso-level-tab-stop:none;
	mso-level-number-position:left;
	margin-left:.5in;
	text-indent:-.5in;}
@list l6:level6
	{mso-level-text:"%1\.%2\.%3\.%4\.%5\.%6";
	mso-level-tab-stop:none;
	mso-level-number-position:left;
	margin-left:.75in;
	text-indent:-.75in;}
@list l6:level7
	{mso-level-text:"%1\.%2\.%3\.%4\.%5\.%6\.%7";
	mso-level-tab-stop:none;
	mso-level-number-position:left;
	margin-left:.75in;
	text-indent:-.75in;}
@list l6:level8
	{mso-level-text:"%1\.%2\.%3\.%4\.%5\.%6\.%7\.%8";
	mso-level-tab-stop:none;
	mso-level-number-position:left;
	margin-left:1.0in;
	text-indent:-1.0in;}
@list l6:level9
	{mso-level-text:"%1\.%2\.%3\.%4\.%5\.%6\.%7\.%8\.%9";
	mso-level-tab-stop:none;
	mso-level-number-position:left;
	margin-left:1.0in;
	text-indent:-1.0in;}
@list l7
	{mso-list-id:382021122;
	mso-list-type:hybrid;
	mso-list-template-ids:-2075098714 67698699 67698691 67698693 67698689 67698691 67698693 67698689 67698691 67698693;}
@list l7:level1
	{mso-level-number-format:bullet;
	mso-level-text:\F0D8;
	mso-level-tab-stop:none;
	mso-level-number-position:left;
	margin-left:57.3pt;
	text-indent:-.25in;
	font-family:Wingdings;}
@list l7:level2
	{mso-level-number-format:bullet;
	mso-level-text:o;
	mso-level-tab-stop:none;
	mso-level-number-position:left;
	margin-left:93.3pt;
	text-indent:-.25in;
	font-family:"Courier New";}
@list l7:level3
	{mso-level-number-format:bullet;
	mso-level-text:\F0A7;
	mso-level-tab-stop:none;
	mso-level-number-position:left;
	margin-left:129.3pt;
	text-indent:-.25in;
	font-family:Wingdings;}
@list l7:level4
	{mso-level-number-format:bullet;
	mso-level-text:\F0B7;
	mso-level-tab-stop:none;
	mso-level-number-position:left;
	margin-left:165.3pt;
	text-indent:-.25in;
	font-family:Symbol;}
@list l7:level5
	{mso-level-number-format:bullet;
	mso-level-text:o;
	mso-level-tab-stop:none;
	mso-level-number-position:left;
	margin-left:201.3pt;
	text-indent:-.25in;
	font-family:"Courier New";}
@list l7:level6
	{mso-level-number-format:bullet;
	mso-level-text:\F0A7;
	mso-level-tab-stop:none;
	mso-level-number-position:left;
	margin-left:237.3pt;
	text-indent:-.25in;
	font-family:Wingdings;}
@list l7:level7
	{mso-level-number-format:bullet;
	mso-level-text:\F0B7;
	mso-level-tab-stop:none;
	mso-level-number-position:left;
	margin-left:273.3pt;
	text-indent:-.25in;
	font-family:Symbol;}
@list l7:level8
	{mso-level-number-format:bullet;
	mso-level-text:o;
	mso-level-tab-stop:none;
	mso-level-number-position:left;
	margin-left:309.3pt;
	text-indent:-.25in;
	font-family:"Courier New";}
@list l7:level9
	{mso-level-number-format:bullet;
	mso-level-text:\F0A7;
	mso-level-tab-stop:none;
	mso-level-number-position:left;
	margin-left:345.3pt;
	text-indent:-.25in;
	font-family:Wingdings;}
@list l8
	{mso-list-id:437676614;
	mso-list-template-ids:-2071025684;}
@list l8:level1
	{mso-level-start-at:10;
	mso-level-text:%1;
	mso-level-tab-stop:none;
	mso-level-number-position:left;
	margin-left:.25in;
	text-indent:-.25in;}
@list l8:level2
	{mso-level-text:"%1\.%2";
	mso-level-tab-stop:none;
	mso-level-number-position:left;
	margin-left:.5in;
	text-indent:-.25in;}
@list l8:level3
	{mso-level-text:"%1\.%2\.%3";
	mso-level-tab-stop:none;
	mso-level-number-position:left;
	margin-left:1.0in;
	text-indent:-.5in;}
@list l8:level4
	{mso-level-text:"%1\.%2\.%3\.%4";
	mso-level-tab-stop:none;
	mso-level-number-position:left;
	margin-left:1.25in;
	text-indent:-.5in;}
@list l8:level5
	{mso-level-text:"%1\.%2\.%3\.%4\.%5";
	mso-level-tab-stop:none;
	mso-level-number-position:left;
	margin-left:1.5in;
	text-indent:-.5in;}
@list l8:level6
	{mso-level-text:"%1\.%2\.%3\.%4\.%5\.%6";
	mso-level-tab-stop:none;
	mso-level-number-position:left;
	margin-left:2.0in;
	text-indent:-.75in;}
@list l8:level7
	{mso-level-text:"%1\.%2\.%3\.%4\.%5\.%6\.%7";
	mso-level-tab-stop:none;
	mso-level-number-position:left;
	margin-left:2.25in;
	text-indent:-.75in;}
@list l8:level8
	{mso-level-text:"%1\.%2\.%3\.%4\.%5\.%6\.%7\.%8";
	mso-level-tab-stop:none;
	mso-level-number-position:left;
	margin-left:2.75in;
	text-indent:-1.0in;}
@list l8:level9
	{mso-level-text:"%1\.%2\.%3\.%4\.%5\.%6\.%7\.%8\.%9";
	mso-level-tab-stop:none;
	mso-level-number-position:left;
	margin-left:3.0in;
	text-indent:-1.0in;}
@list l9
	{mso-list-id:476337990;
	mso-list-type:hybrid;
	mso-list-template-ids:1972401376 1248080092 67698713 67698715 67698703 67698713 67698715 67698703 67698713 67698715;}
@list l9:level1
	{mso-level-text:"7\.%1";
	mso-level-tab-stop:none;
	mso-level-number-position:left;
	margin-left:.25in;
	text-indent:-.25in;
	mso-ansi-font-weight:normal;}
@list l9:level2
	{mso-level-number-format:alpha-lower;
	mso-level-tab-stop:none;
	mso-level-number-position:left;
	margin-left:16.5pt;
	text-indent:-.25in;}
@list l9:level3
	{mso-level-number-format:roman-lower;
	mso-level-tab-stop:none;
	mso-level-number-position:right;
	margin-left:52.5pt;
	text-indent:-9.0pt;}
@list l9:level4
	{mso-level-tab-stop:none;
	mso-level-number-position:left;
	margin-left:88.5pt;
	text-indent:-.25in;}
@list l9:level5
	{mso-level-number-format:alpha-lower;
	mso-level-tab-stop:none;
	mso-level-number-position:left;
	margin-left:124.5pt;
	text-indent:-.25in;}
@list l9:level6
	{mso-level-number-format:roman-lower;
	mso-level-tab-stop:none;
	mso-level-number-position:right;
	margin-left:160.5pt;
	text-indent:-9.0pt;}
@list l9:level7
	{mso-level-tab-stop:none;
	mso-level-number-position:left;
	margin-left:196.5pt;
	text-indent:-.25in;}
@list l9:level8
	{mso-level-number-format:alpha-lower;
	mso-level-tab-stop:none;
	mso-level-number-position:left;
	margin-left:232.5pt;
	text-indent:-.25in;}
@list l9:level9
	{mso-level-number-format:roman-lower;
	mso-level-tab-stop:none;
	mso-level-number-position:right;
	margin-left:268.5pt;
	text-indent:-9.0pt;}
@list l10
	{mso-list-id:487405141;
	mso-list-type:hybrid;
	mso-list-template-ids:-292512520 -1537946632 1757328314 134807579 134807567 134807577 134807579 134807567 134807577 134807579;}
@list l10:level1
	{mso-level-text:"1\.%1";
	mso-level-tab-stop:none;
	mso-level-number-position:left;
	margin-left:64.35pt;
	text-indent:-.25in;}
@list l10:level2
	{mso-level-text:"1\.%2";
	mso-level-tab-stop:none;
	mso-level-number-position:left;
	margin-left:100.35pt;
	text-indent:-.25in;
	mso-ansi-font-weight:bold;}
@list l10:level3
	{mso-level-number-format:roman-lower;
	mso-level-tab-stop:none;
	mso-level-number-position:right;
	margin-left:136.35pt;
	text-indent:-9.0pt;}
@list l10:level4
	{mso-level-tab-stop:none;
	mso-level-number-position:left;
	margin-left:172.35pt;
	text-indent:-.25in;}
@list l10:level5
	{mso-level-number-format:alpha-lower;
	mso-level-tab-stop:none;
	mso-level-number-position:left;
	margin-left:208.35pt;
	text-indent:-.25in;}
@list l10:level6
	{mso-level-number-format:roman-lower;
	mso-level-tab-stop:none;
	mso-level-number-position:right;
	margin-left:244.35pt;
	text-indent:-9.0pt;}
@list l10:level7
	{mso-level-tab-stop:none;
	mso-level-number-position:left;
	margin-left:280.35pt;
	text-indent:-.25in;}
@list l10:level8
	{mso-level-number-format:alpha-lower;
	mso-level-tab-stop:none;
	mso-level-number-position:left;
	margin-left:316.35pt;
	text-indent:-.25in;}
@list l10:level9
	{mso-level-number-format:roman-lower;
	mso-level-tab-stop:none;
	mso-level-number-position:right;
	margin-left:352.35pt;
	text-indent:-9.0pt;}
@list l11
	{mso-list-id:551498393;
	mso-list-type:hybrid;
	mso-list-template-ids:-2018843378 -781316836 134807577 134807579 134807567 134807577 134807579 134807567 134807577 134807579;}
@list l11:level1
	{mso-level-text:"12\.%1";
	mso-level-tab-stop:none;
	mso-level-number-position:left;
	text-indent:-.25in;
	mso-ansi-font-weight:normal;}
@list l11:level2
	{mso-level-number-format:alpha-lower;
	mso-level-tab-stop:none;
	mso-level-number-position:left;
	text-indent:-.25in;}
@list l11:level3
	{mso-level-number-format:roman-lower;
	mso-level-tab-stop:none;
	mso-level-number-position:right;
	text-indent:-9.0pt;}
@list l11:level4
	{mso-level-tab-stop:none;
	mso-level-number-position:left;
	text-indent:-.25in;}
@list l11:level5
	{mso-level-number-format:alpha-lower;
	mso-level-tab-stop:none;
	mso-level-number-position:left;
	text-indent:-.25in;}
@list l11:level6
	{mso-level-number-format:roman-lower;
	mso-level-tab-stop:none;
	mso-level-number-position:right;
	text-indent:-9.0pt;}
@list l11:level7
	{mso-level-tab-stop:none;
	mso-level-number-position:left;
	text-indent:-.25in;}
@list l11:level8
	{mso-level-number-format:alpha-lower;
	mso-level-tab-stop:none;
	mso-level-number-position:left;
	text-indent:-.25in;}
@list l11:level9
	{mso-level-number-format:roman-lower;
	mso-level-tab-stop:none;
	mso-level-number-position:right;
	text-indent:-9.0pt;}
@list l12
	{mso-list-id:579098676;
	mso-list-template-ids:-1638480160;}
@list l12:level1
	{mso-level-start-at:11;
	mso-level-tab-stop:none;
	mso-level-number-position:left;
	margin-left:21.75pt;
	text-indent:-21.75pt;
	mso-ansi-font-weight:normal;}
@list l12:level2
	{mso-level-text:"%1\.%2\.";
	mso-level-tab-stop:none;
	mso-level-number-position:left;
	margin-left:26.25pt;
	text-indent:-21.75pt;
	color:black;
	mso-themecolor:text1;
	mso-ansi-font-weight:normal;
	mso-ansi-font-style:normal;}
@list l12:level3
	{mso-level-text:"%1\.%2\.%3\.";
	mso-level-tab-stop:none;
	mso-level-number-position:left;
	margin-left:45.0pt;
	text-indent:-.5in;
	mso-ansi-font-weight:normal;}
@list l12:level4
	{mso-level-text:"%1\.%2\.%3\.%4\.";
	mso-level-tab-stop:none;
	mso-level-number-position:left;
	margin-left:49.5pt;
	text-indent:-.5in;
	mso-ansi-font-weight:normal;}
@list l12:level5
	{mso-level-text:"%1\.%2\.%3\.%4\.%5\.";
	mso-level-tab-stop:none;
	mso-level-number-position:left;
	margin-left:1.0in;
	text-indent:-.75in;
	mso-ansi-font-weight:normal;}
@list l12:level6
	{mso-level-text:"%1\.%2\.%3\.%4\.%5\.%6\.";
	mso-level-tab-stop:none;
	mso-level-number-position:left;
	margin-left:76.5pt;
	text-indent:-.75in;
	mso-ansi-font-weight:normal;}
@list l12:level7
	{mso-level-text:"%1\.%2\.%3\.%4\.%5\.%6\.%7\.";
	mso-level-tab-stop:none;
	mso-level-number-position:left;
	margin-left:99.0pt;
	text-indent:-1.0in;
	mso-ansi-font-weight:normal;}
@list l12:level8
	{mso-level-text:"%1\.%2\.%3\.%4\.%5\.%6\.%7\.%8\.";
	mso-level-tab-stop:none;
	mso-level-number-position:left;
	margin-left:103.5pt;
	text-indent:-1.0in;
	mso-ansi-font-weight:normal;}
@list l12:level9
	{mso-level-text:"%1\.%2\.%3\.%4\.%5\.%6\.%7\.%8\.%9\.";
	mso-level-tab-stop:none;
	mso-level-number-position:left;
	margin-left:1.75in;
	text-indent:-1.25in;
	mso-ansi-font-weight:normal;}
@list l13
	{mso-list-id:590817954;
	mso-list-type:hybrid;
	mso-list-template-ids:-2092919782 314324194 134807577 134807579 134807567 134807577 134807579 134807567 134807577 134807579;}
@list l13:level1
	{mso-level-start-at:3;
	mso-level-text:"%1\.2\.1\.";
	mso-level-tab-stop:none;
	mso-level-number-position:left;
	margin-left:74.65pt;
	text-indent:-.25in;}
@list l13:level2
	{mso-level-number-format:alpha-lower;
	mso-level-tab-stop:none;
	mso-level-number-position:left;
	text-indent:-.25in;}
@list l13:level3
	{mso-level-number-format:roman-lower;
	mso-level-tab-stop:none;
	mso-level-number-position:right;
	text-indent:-9.0pt;}
@list l13:level4
	{mso-level-tab-stop:none;
	mso-level-number-position:left;
	text-indent:-.25in;}
@list l13:level5
	{mso-level-number-format:alpha-lower;
	mso-level-tab-stop:none;
	mso-level-number-position:left;
	text-indent:-.25in;}
@list l13:level6
	{mso-level-number-format:roman-lower;
	mso-level-tab-stop:none;
	mso-level-number-position:right;
	text-indent:-9.0pt;}
@list l13:level7
	{mso-level-tab-stop:none;
	mso-level-number-position:left;
	text-indent:-.25in;}
@list l13:level8
	{mso-level-number-format:alpha-lower;
	mso-level-tab-stop:none;
	mso-level-number-position:left;
	text-indent:-.25in;}
@list l13:level9
	{mso-level-number-format:roman-lower;
	mso-level-tab-stop:none;
	mso-level-number-position:right;
	text-indent:-9.0pt;}
@list l14
	{mso-list-id:604968736;
	mso-list-type:hybrid;
	mso-list-template-ids:-852622074 2014493972 67698713 67698715 67698703 67698713 67698715 67698703 67698713 67698715;}
@list l14:level1
	{mso-level-text:"3\.2%1\.";
	mso-level-tab-stop:none;
	mso-level-number-position:left;
	text-indent:-.25in;}
@list l14:level2
	{mso-level-number-format:alpha-lower;
	mso-level-tab-stop:none;
	mso-level-number-position:left;
	text-indent:-.25in;}
@list l14:level3
	{mso-level-number-format:roman-lower;
	mso-level-tab-stop:none;
	mso-level-number-position:right;
	text-indent:-9.0pt;}
@list l14:level4
	{mso-level-tab-stop:none;
	mso-level-number-position:left;
	text-indent:-.25in;}
@list l14:level5
	{mso-level-number-format:alpha-lower;
	mso-level-tab-stop:none;
	mso-level-number-position:left;
	text-indent:-.25in;}
@list l14:level6
	{mso-level-number-format:roman-lower;
	mso-level-tab-stop:none;
	mso-level-number-position:right;
	text-indent:-9.0pt;}
@list l14:level7
	{mso-level-tab-stop:none;
	mso-level-number-position:left;
	text-indent:-.25in;}
@list l14:level8
	{mso-level-number-format:alpha-lower;
	mso-level-tab-stop:none;
	mso-level-number-position:left;
	text-indent:-.25in;}
@list l14:level9
	{mso-level-number-format:roman-lower;
	mso-level-tab-stop:none;
	mso-level-number-position:right;
	text-indent:-9.0pt;}
@list l15
	{mso-list-id:658075519;
	mso-list-template-ids:1167378348;}
@list l15:level1
	{mso-level-start-at:6;
	mso-level-tab-stop:none;
	mso-level-number-position:left;
	margin-left:.25in;
	text-indent:-.25in;}
@list l15:level2
	{mso-level-text:"%1\.%2\.";
	mso-level-tab-stop:none;
	mso-level-number-position:left;
	margin-left:.5in;
	text-indent:-.25in;
	mso-ansi-font-weight:bold;}
@list l15:level3
	{mso-level-text:"%1\.%2\.%3\.";
	mso-level-tab-stop:none;
	mso-level-number-position:left;
	margin-left:1.0in;
	text-indent:-.5in;}
@list l15:level4
	{mso-level-text:"%1\.%2\.%3\.%4\.";
	mso-level-tab-stop:none;
	mso-level-number-position:left;
	margin-left:1.25in;
	text-indent:-.5in;}
@list l15:level5
	{mso-level-text:"%1\.%2\.%3\.%4\.%5\.";
	mso-level-tab-stop:none;
	mso-level-number-position:left;
	margin-left:1.75in;
	text-indent:-.75in;}
@list l15:level6
	{mso-level-text:"%1\.%2\.%3\.%4\.%5\.%6\.";
	mso-level-tab-stop:none;
	mso-level-number-position:left;
	margin-left:2.0in;
	text-indent:-.75in;}
@list l15:level7
	{mso-level-text:"%1\.%2\.%3\.%4\.%5\.%6\.%7\.";
	mso-level-tab-stop:none;
	mso-level-number-position:left;
	margin-left:2.25in;
	text-indent:-.75in;}
@list l15:level8
	{mso-level-text:"%1\.%2\.%3\.%4\.%5\.%6\.%7\.%8\.";
	mso-level-tab-stop:none;
	mso-level-number-position:left;
	margin-left:2.75in;
	text-indent:-1.0in;}
@list l15:level9
	{mso-level-text:"%1\.%2\.%3\.%4\.%5\.%6\.%7\.%8\.%9\.";
	mso-level-tab-stop:none;
	mso-level-number-position:left;
	margin-left:3.0in;
	text-indent:-1.0in;}
@list l16
	{mso-list-id:699939980;
	mso-list-template-ids:786711928;}
@list l16:level1
	{mso-level-start-at:8;
	mso-level-text:%1;
	mso-level-tab-stop:none;
	mso-level-number-position:left;
	margin-left:.25in;
	text-indent:-.25in;}
@list l16:level2
	{mso-level-start-at:2;
	mso-level-text:"%1\.%2";
	mso-level-tab-stop:none;
	mso-level-number-position:left;
	margin-left:.25in;
	text-indent:-.25in;
	mso-ansi-font-weight:normal;
	mso-bidi-font-weight:bold;}
@list l16:level3
	{mso-level-text:"%1\.%2\.%3";
	mso-level-tab-stop:none;
	mso-level-number-position:left;
	margin-left:.5in;
	text-indent:-.5in;}
@list l16:level4
	{mso-level-text:"%1\.%2\.%3\.%4";
	mso-level-tab-stop:none;
	mso-level-number-position:left;
	margin-left:.5in;
	text-indent:-.5in;}
@list l16:level5
	{mso-level-text:"%1\.%2\.%3\.%4\.%5";
	mso-level-tab-stop:none;
	mso-level-number-position:left;
	margin-left:.5in;
	text-indent:-.5in;}
@list l16:level6
	{mso-level-text:"%1\.%2\.%3\.%4\.%5\.%6";
	mso-level-tab-stop:none;
	mso-level-number-position:left;
	margin-left:.75in;
	text-indent:-.75in;}
@list l16:level7
	{mso-level-text:"%1\.%2\.%3\.%4\.%5\.%6\.%7";
	mso-level-tab-stop:none;
	mso-level-number-position:left;
	margin-left:.75in;
	text-indent:-.75in;}
@list l16:level8
	{mso-level-text:"%1\.%2\.%3\.%4\.%5\.%6\.%7\.%8";
	mso-level-tab-stop:none;
	mso-level-number-position:left;
	margin-left:1.0in;
	text-indent:-1.0in;}
@list l16:level9
	{mso-level-text:"%1\.%2\.%3\.%4\.%5\.%6\.%7\.%8\.%9";
	mso-level-tab-stop:none;
	mso-level-number-position:left;
	margin-left:1.0in;
	text-indent:-1.0in;}
@list l17
	{mso-list-id:795834547;
	mso-list-template-ids:-2109859828;}
@list l17:level1
	{mso-level-start-at:2;
	mso-level-tab-stop:none;
	mso-level-number-position:left;
	margin-left:21.0pt;
	text-indent:-21.0pt;
	mso-ansi-font-weight:normal;}
@list l17:level2
	{mso-level-text:"%1\.%2\.";
	mso-level-tab-stop:none;
	mso-level-number-position:left;
	margin-left:.5in;
	text-indent:-.5in;
	mso-ansi-font-weight:bold;
	mso-bidi-font-weight:bold;}
@list l17:level3
	{mso-level-text:"%1\.%2\.%3\.";
	mso-level-tab-stop:none;
	mso-level-number-position:left;
	margin-left:.5in;
	text-indent:-.5in;
	mso-ansi-font-weight:normal;}
@list l17:level4
	{mso-level-text:"%1\.%2\.%3\.%4\.";
	mso-level-tab-stop:none;
	mso-level-number-position:left;
	margin-left:.75in;
	text-indent:-.75in;
	mso-ansi-font-weight:normal;}
@list l17:level5
	{mso-level-text:"%1\.%2\.%3\.%4\.%5\.";
	mso-level-tab-stop:none;
	mso-level-number-position:left;
	margin-left:1.0in;
	text-indent:-1.0in;
	mso-ansi-font-weight:normal;}
@list l17:level6
	{mso-level-text:"%1\.%2\.%3\.%4\.%5\.%6\.";
	mso-level-tab-stop:none;
	mso-level-number-position:left;
	margin-left:1.0in;
	text-indent:-1.0in;
	mso-ansi-font-weight:normal;}
@list l17:level7
	{mso-level-text:"%1\.%2\.%3\.%4\.%5\.%6\.%7\.";
	mso-level-tab-stop:none;
	mso-level-number-position:left;
	margin-left:1.25in;
	text-indent:-1.25in;
	mso-ansi-font-weight:normal;}
@list l17:level8
	{mso-level-text:"%1\.%2\.%3\.%4\.%5\.%6\.%7\.%8\.";
	mso-level-tab-stop:none;
	mso-level-number-position:left;
	margin-left:1.25in;
	text-indent:-1.25in;
	mso-ansi-font-weight:normal;}
@list l17:level9
	{mso-level-text:"%1\.%2\.%3\.%4\.%5\.%6\.%7\.%8\.%9\.";
	mso-level-tab-stop:none;
	mso-level-number-position:left;
	margin-left:1.5in;
	text-indent:-1.5in;
	mso-ansi-font-weight:normal;}
@list l18
	{mso-list-id:927426145;
	mso-list-template-ids:-1013275668;}
@list l18:level1
	{mso-level-start-at:3;
	mso-level-text:"%1\.3";
	mso-level-tab-stop:none;
	mso-level-number-position:left;
	margin-left:.25in;
	text-indent:-.25in;}
@list l18:level2
	{mso-level-start-at:2;
	mso-level-text:"%1\.3";
	mso-level-tab-stop:none;
	mso-level-number-position:left;
	margin-left:.5in;
	text-indent:-.25in;}
@list l18:level3
	{mso-level-number-format:none;
	mso-level-text:"3\.3";
	mso-level-tab-stop:none;
	mso-level-number-position:left;
	margin-left:1.0in;
	text-indent:-.5in;}
@list l18:level4
	{mso-level-text:"%1\.%2\.%3\.%4";
	mso-level-tab-stop:none;
	mso-level-number-position:left;
	margin-left:1.25in;
	text-indent:-.5in;}
@list l18:level5
	{mso-level-text:"%1\.%2\.%3\.%4\.%5";
	mso-level-tab-stop:none;
	mso-level-number-position:left;
	margin-left:1.75in;
	text-indent:-.75in;}
@list l18:level6
	{mso-level-text:"%1\.%2\.%3\.%4\.%5\.%6";
	mso-level-tab-stop:none;
	mso-level-number-position:left;
	margin-left:2.0in;
	text-indent:-.75in;}
@list l18:level7
	{mso-level-text:"%1\.%2\.%3\.%4\.%5\.%6\.%7";
	mso-level-tab-stop:none;
	mso-level-number-position:left;
	margin-left:2.5in;
	text-indent:-1.0in;}
@list l18:level8
	{mso-level-text:"%1\.%2\.%3\.%4\.%5\.%6\.%7\.%8";
	mso-level-tab-stop:none;
	mso-level-number-position:left;
	margin-left:2.75in;
	text-indent:-1.0in;}
@list l18:level9
	{mso-level-text:"%1\.%2\.%3\.%4\.%5\.%6\.%7\.%8\.%9";
	mso-level-tab-stop:none;
	mso-level-number-position:left;
	margin-left:3.25in;
	text-indent:-1.25in;}
@list l19
	{mso-list-id:949819122;
	mso-list-template-ids:-2006032384;
	mso-list-style-id:169873486;}
@list l19:level1
	{mso-level-tab-stop:none;
	mso-level-number-position:left;
	margin-left:.25in;
	text-indent:-.25in;}
@list l19:level2
	{mso-level-text:"1\.%2\.";
	mso-level-tab-stop:none;
	mso-level-number-position:left;
	margin-left:28.7pt;
	text-indent:-.3in;
	mso-ansi-font-weight:normal;}
@list l19:level3
	{mso-level-text:"%1\.%2\.%3\.";
	mso-level-tab-stop:none;
	mso-level-number-position:left;
	margin-left:.85in;
	text-indent:-.35in;
	color:windowtext;}
@list l19:level4
	{mso-level-text:"%1\.%2\.%3\.%4\.";
	mso-level-tab-stop:none;
	mso-level-number-position:left;
	margin-left:1.2in;
	text-indent:-.45in;}
@list l19:level5
	{mso-level-text:"%1\.%2\.%3\.%4\.%5\.";
	mso-level-tab-stop:none;
	mso-level-number-position:left;
	margin-left:1.55in;
	text-indent:-.55in;}
@list l19:level6
	{mso-level-text:"%1\.%2\.%3\.%4\.%5\.%6\.";
	mso-level-tab-stop:none;
	mso-level-number-position:left;
	margin-left:1.9in;
	text-indent:-.65in;}
@list l19:level7
	{mso-level-text:"%1\.%2\.%3\.%4\.%5\.%6\.%7\.";
	mso-level-tab-stop:none;
	mso-level-number-position:left;
	margin-left:2.25in;
	text-indent:-.75in;}
@list l19:level8
	{mso-level-text:"%1\.%2\.%3\.%4\.%5\.%6\.%7\.%8\.";
	mso-level-tab-stop:none;
	mso-level-number-position:left;
	margin-left:2.6in;
	text-indent:-.85in;}
@list l19:level9
	{mso-level-text:"%1\.%2\.%3\.%4\.%5\.%6\.%7\.%8\.%9\.";
	mso-level-tab-stop:none;
	mso-level-number-position:left;
	margin-left:3.0in;
	text-indent:-1.0in;}
@list l20
	{mso-list-id:1054549886;
	mso-list-type:hybrid;
	mso-list-template-ids:-1553822646 1744224158 67698691 67698693 67698689 67698691 67698693 67698689 67698691 67698693;}
@list l20:level1
	{mso-level-number-format:bullet;
	mso-level-text:\F02D;
	mso-level-tab-stop:none;
	mso-level-number-position:left;
	text-indent:-.25in;
	font-family:Symbol;}
@list l20:level2
	{mso-level-number-format:bullet;
	mso-level-text:o;
	mso-level-tab-stop:none;
	mso-level-number-position:left;
	text-indent:-.25in;
	font-family:"Courier New";}
@list l20:level3
	{mso-level-number-format:bullet;
	mso-level-text:\F0A7;
	mso-level-tab-stop:none;
	mso-level-number-position:left;
	text-indent:-.25in;
	font-family:Wingdings;}
@list l20:level4
	{mso-level-number-format:bullet;
	mso-level-text:\F0B7;
	mso-level-tab-stop:none;
	mso-level-number-position:left;
	text-indent:-.25in;
	font-family:Symbol;}
@list l20:level5
	{mso-level-number-format:bullet;
	mso-level-text:o;
	mso-level-tab-stop:none;
	mso-level-number-position:left;
	text-indent:-.25in;
	font-family:"Courier New";}
@list l20:level6
	{mso-level-number-format:bullet;
	mso-level-text:\F0A7;
	mso-level-tab-stop:none;
	mso-level-number-position:left;
	text-indent:-.25in;
	font-family:Wingdings;}
@list l20:level7
	{mso-level-number-format:bullet;
	mso-level-text:\F0B7;
	mso-level-tab-stop:none;
	mso-level-number-position:left;
	text-indent:-.25in;
	font-family:Symbol;}
@list l20:level8
	{mso-level-number-format:bullet;
	mso-level-text:o;
	mso-level-tab-stop:none;
	mso-level-number-position:left;
	text-indent:-.25in;
	font-family:"Courier New";}
@list l20:level9
	{mso-level-number-format:bullet;
	mso-level-text:\F0A7;
	mso-level-tab-stop:none;
	mso-level-number-position:left;
	text-indent:-.25in;
	font-family:Wingdings;}
@list l21
	{mso-list-id:1070613319;
	mso-list-template-ids:612252842;}
@list l21:level1
	{mso-level-start-at:5;
	mso-level-text:%1;
	mso-level-tab-stop:none;
	mso-level-number-position:left;
	margin-left:.25in;
	text-indent:-.25in;
	mso-ansi-font-weight:normal;}
@list l21:level2
	{mso-level-text:"%1\.%2";
	mso-level-tab-stop:none;
	mso-level-number-position:left;
	margin-left:22.5pt;
	text-indent:-.25in;
	mso-ansi-font-weight:bold;}
@list l21:level3
	{mso-level-text:"%1\.%2\.%3";
	mso-level-tab-stop:none;
	mso-level-number-position:left;
	margin-left:45.0pt;
	text-indent:-.5in;
	mso-ansi-font-weight:normal;}
@list l21:level4
	{mso-level-text:"%1\.%2\.%3\.%4";
	mso-level-tab-stop:none;
	mso-level-number-position:left;
	margin-left:49.5pt;
	text-indent:-.5in;
	mso-ansi-font-weight:normal;}
@list l21:level5
	{mso-level-text:"%1\.%2\.%3\.%4\.%5";
	mso-level-tab-stop:none;
	mso-level-number-position:left;
	margin-left:.75in;
	text-indent:-.5in;
	mso-ansi-font-weight:normal;}
@list l21:level6
	{mso-level-text:"%1\.%2\.%3\.%4\.%5\.%6";
	mso-level-tab-stop:none;
	mso-level-number-position:left;
	margin-left:76.5pt;
	text-indent:-.75in;
	mso-ansi-font-weight:normal;}
@list l21:level7
	{mso-level-text:"%1\.%2\.%3\.%4\.%5\.%6\.%7";
	mso-level-tab-stop:none;
	mso-level-number-position:left;
	margin-left:81.0pt;
	text-indent:-.75in;
	mso-ansi-font-weight:normal;}
@list l21:level8
	{mso-level-text:"%1\.%2\.%3\.%4\.%5\.%6\.%7\.%8";
	mso-level-tab-stop:none;
	mso-level-number-position:left;
	margin-left:103.5pt;
	text-indent:-1.0in;
	mso-ansi-font-weight:normal;}
@list l21:level9
	{mso-level-text:"%1\.%2\.%3\.%4\.%5\.%6\.%7\.%8\.%9";
	mso-level-tab-stop:none;
	mso-level-number-position:left;
	margin-left:1.5in;
	text-indent:-1.0in;
	mso-ansi-font-weight:normal;}
@list l22
	{mso-list-id:1082724174;
	mso-list-type:hybrid;
	mso-list-template-ids:1748930312 -814076974 67698713 67698715 67698703 67698713 67698715 67698703 67698713 67698715;}
@list l22:level1
	{mso-level-text:"6\.%1\.";
	mso-level-tab-stop:none;
	mso-level-number-position:left;
	margin-left:.25in;
	text-indent:-.25in;
	mso-ansi-font-size:12.0pt;
	mso-bidi-font-size:12.0pt;
	mso-ansi-font-weight:normal;
	mso-bidi-font-weight:bold;
	mso-ansi-font-style:normal;}
@list l22:level2
	{mso-level-number-format:alpha-lower;
	mso-level-tab-stop:none;
	mso-level-number-position:left;
	text-indent:-.25in;}
@list l22:level3
	{mso-level-number-format:roman-lower;
	mso-level-tab-stop:none;
	mso-level-number-position:right;
	text-indent:-9.0pt;}
@list l22:level4
	{mso-level-tab-stop:none;
	mso-level-number-position:left;
	text-indent:-.25in;}
@list l22:level5
	{mso-level-number-format:alpha-lower;
	mso-level-tab-stop:none;
	mso-level-number-position:left;
	text-indent:-.25in;}
@list l22:level6
	{mso-level-number-format:roman-lower;
	mso-level-tab-stop:none;
	mso-level-number-position:right;
	text-indent:-9.0pt;}
@list l22:level7
	{mso-level-tab-stop:none;
	mso-level-number-position:left;
	text-indent:-.25in;}
@list l22:level8
	{mso-level-number-format:alpha-lower;
	mso-level-tab-stop:none;
	mso-level-number-position:left;
	text-indent:-.25in;}
@list l22:level9
	{mso-level-number-format:roman-lower;
	mso-level-tab-stop:none;
	mso-level-number-position:right;
	text-indent:-9.0pt;}
@list l23
	{mso-list-id:1093361229;
	mso-list-type:hybrid;
	mso-list-template-ids:-584827240 -213639064 67698713 67698715 67698703 67698713 67698715 67698703 67698713 67698715;}
@list l23:level1
	{mso-level-text:"3\.2\.%1\.";
	mso-level-tab-stop:none;
	mso-level-number-position:left;
	margin-left:1.0in;
	text-indent:-.25in;}
@list l23:level2
	{mso-level-number-format:alpha-lower;
	mso-level-tab-stop:none;
	mso-level-number-position:left;
	margin-left:1.5in;
	text-indent:-.25in;}
@list l23:level3
	{mso-level-number-format:roman-lower;
	mso-level-tab-stop:none;
	mso-level-number-position:right;
	margin-left:2.0in;
	text-indent:-9.0pt;}
@list l23:level4
	{mso-level-tab-stop:none;
	mso-level-number-position:left;
	margin-left:2.5in;
	text-indent:-.25in;}
@list l23:level5
	{mso-level-number-format:alpha-lower;
	mso-level-tab-stop:none;
	mso-level-number-position:left;
	margin-left:3.0in;
	text-indent:-.25in;}
@list l23:level6
	{mso-level-number-format:roman-lower;
	mso-level-tab-stop:none;
	mso-level-number-position:right;
	margin-left:3.5in;
	text-indent:-9.0pt;}
@list l23:level7
	{mso-level-tab-stop:none;
	mso-level-number-position:left;
	margin-left:4.0in;
	text-indent:-.25in;}
@list l23:level8
	{mso-level-number-format:alpha-lower;
	mso-level-tab-stop:none;
	mso-level-number-position:left;
	margin-left:4.5in;
	text-indent:-.25in;}
@list l23:level9
	{mso-level-number-format:roman-lower;
	mso-level-tab-stop:none;
	mso-level-number-position:right;
	margin-left:5.0in;
	text-indent:-9.0pt;}
@list l24
	{mso-list-id:1102385331;
	mso-list-type:hybrid;
	mso-list-template-ids:-1703539258 1710142616 69861401 69861403 69861391 69861401 69861403 69861391 69861401 69861403;}
@list l24:level1
	{mso-level-number-format:roman-lower;
	mso-level-text:"\(%1\)";
	mso-level-tab-stop:none;
	mso-level-number-position:left;
	margin-left:.75in;
	text-indent:-.5in;}
@list l24:level2
	{mso-level-number-format:alpha-lower;
	mso-level-tab-stop:none;
	mso-level-number-position:left;
	text-indent:-.25in;}
@list l24:level3
	{mso-level-number-format:roman-lower;
	mso-level-tab-stop:none;
	mso-level-number-position:right;
	text-indent:-9.0pt;}
@list l24:level4
	{mso-level-tab-stop:none;
	mso-level-number-position:left;
	text-indent:-.25in;}
@list l24:level5
	{mso-level-number-format:alpha-lower;
	mso-level-tab-stop:none;
	mso-level-number-position:left;
	text-indent:-.25in;}
@list l24:level6
	{mso-level-number-format:roman-lower;
	mso-level-tab-stop:none;
	mso-level-number-position:right;
	text-indent:-9.0pt;}
@list l24:level7
	{mso-level-tab-stop:none;
	mso-level-number-position:left;
	text-indent:-.25in;}
@list l24:level8
	{mso-level-number-format:alpha-lower;
	mso-level-tab-stop:none;
	mso-level-number-position:left;
	text-indent:-.25in;}
@list l24:level9
	{mso-level-number-format:roman-lower;
	mso-level-tab-stop:none;
	mso-level-number-position:right;
	text-indent:-9.0pt;}
@list l25
	{mso-list-id:1158883186;
	mso-list-template-ids:1549038144;}
@list l25:level1
	{mso-level-start-at:2;
	mso-level-tab-stop:none;
	mso-level-number-position:left;
	margin-left:21.0pt;
	text-indent:-21.0pt;}
@list l25:level2
	{mso-level-text:"8\.%2";
	mso-level-tab-stop:none;
	mso-level-number-position:left;
	margin-left:.5in;
	text-indent:-.5in;
	mso-ansi-font-weight:normal;
	mso-ansi-font-style:normal;}
@list l25:level3
	{mso-level-text:"%1\.%2\.%3\.";
	mso-level-tab-stop:none;
	mso-level-number-position:left;
	margin-left:.5in;
	text-indent:-.5in;}
@list l25:level4
	{mso-level-text:"%1\.%2\.%3\.%4\.";
	mso-level-tab-stop:none;
	mso-level-number-position:left;
	margin-left:.75in;
	text-indent:-.75in;}
@list l25:level5
	{mso-level-text:"%1\.%2\.%3\.%4\.%5\.";
	mso-level-tab-stop:none;
	mso-level-number-position:left;
	margin-left:1.0in;
	text-indent:-1.0in;}
@list l25:level6
	{mso-level-text:"%1\.%2\.%3\.%4\.%5\.%6\.";
	mso-level-tab-stop:none;
	mso-level-number-position:left;
	margin-left:1.0in;
	text-indent:-1.0in;}
@list l25:level7
	{mso-level-text:"%1\.%2\.%3\.%4\.%5\.%6\.%7\.";
	mso-level-tab-stop:none;
	mso-level-number-position:left;
	margin-left:1.25in;
	text-indent:-1.25in;}
@list l25:level8
	{mso-level-text:"%1\.%2\.%3\.%4\.%5\.%6\.%7\.%8\.";
	mso-level-tab-stop:none;
	mso-level-number-position:left;
	margin-left:1.25in;
	text-indent:-1.25in;}
@list l25:level9
	{mso-level-text:"%1\.%2\.%3\.%4\.%5\.%6\.%7\.%8\.%9\.";
	mso-level-tab-stop:none;
	mso-level-number-position:left;
	margin-left:1.5in;
	text-indent:-1.5in;}
@list l26
	{mso-list-id:1188057185;
	mso-list-template-ids:-1193511966;}
@list l26:level1
	{mso-level-start-at:7;
	mso-level-text:%1;
	mso-level-tab-stop:none;
	mso-level-number-position:left;
	margin-left:.25in;
	text-indent:-.25in;}
@list l26:level2
	{mso-level-text:"%1\.%2";
	mso-level-tab-stop:none;
	mso-level-number-position:left;
	margin-left:64.35pt;
	text-indent:-.25in;}
@list l26:level3
	{mso-level-text:"%1\.%2\.%3";
	mso-level-tab-stop:none;
	mso-level-number-position:left;
	margin-left:128.7pt;
	text-indent:-.5in;}
@list l26:level4
	{mso-level-text:"%1\.%2\.%3\.%4";
	mso-level-tab-stop:none;
	mso-level-number-position:left;
	margin-left:175.05pt;
	text-indent:-.5in;}
@list l26:level5
	{mso-level-text:"%1\.%2\.%3\.%4\.%5";
	mso-level-tab-stop:none;
	mso-level-number-position:left;
	margin-left:221.4pt;
	text-indent:-.5in;}
@list l26:level6
	{mso-level-text:"%1\.%2\.%3\.%4\.%5\.%6";
	mso-level-tab-stop:none;
	mso-level-number-position:left;
	margin-left:285.75pt;
	text-indent:-.75in;}
@list l26:level7
	{mso-level-text:"%1\.%2\.%3\.%4\.%5\.%6\.%7";
	mso-level-tab-stop:none;
	mso-level-number-position:left;
	margin-left:332.1pt;
	text-indent:-.75in;}
@list l26:level8
	{mso-level-text:"%1\.%2\.%3\.%4\.%5\.%6\.%7\.%8";
	mso-level-tab-stop:none;
	mso-level-number-position:left;
	margin-left:396.45pt;
	text-indent:-1.0in;}
@list l26:level9
	{mso-level-text:"%1\.%2\.%3\.%4\.%5\.%6\.%7\.%8\.%9";
	mso-level-tab-stop:none;
	mso-level-number-position:left;
	margin-left:6.15in;
	text-indent:-1.0in;}
@list l27
	{mso-list-id:1192500512;
	mso-list-template-ids:-439292076;}
@list l27:level1
	{mso-level-start-at:4;
	mso-level-tab-stop:none;
	mso-level-number-position:left;
	margin-left:.25in;
	text-indent:-.25in;}
@list l27:level2
	{mso-level-text:"%1\.%2\.";
	mso-level-tab-stop:none;
	mso-level-number-position:left;
	margin-left:82.5pt;
	text-indent:-.25in;
	mso-ansi-font-weight:bold;}
@list l27:level3
	{mso-level-text:"%1\.%2\.%3\.";
	mso-level-tab-stop:none;
	mso-level-number-position:left;
	margin-left:165.0pt;
	text-indent:-.5in;}
@list l27:level4
	{mso-level-text:"%1\.%2\.%3\.%4\.";
	mso-level-tab-stop:none;
	mso-level-number-position:left;
	margin-left:229.5pt;
	text-indent:-.5in;}
@list l27:level5
	{mso-level-text:"%1\.%2\.%3\.%4\.%5\.";
	mso-level-tab-stop:none;
	mso-level-number-position:left;
	margin-left:312.0pt;
	text-indent:-.75in;}
@list l27:level6
	{mso-level-text:"%1\.%2\.%3\.%4\.%5\.%6\.";
	mso-level-tab-stop:none;
	mso-level-number-position:left;
	margin-left:376.5pt;
	text-indent:-.75in;}
@list l27:level7
	{mso-level-text:"%1\.%2\.%3\.%4\.%5\.%6\.%7\.";
	mso-level-tab-stop:none;
	mso-level-number-position:left;
	margin-left:441.0pt;
	text-indent:-.75in;}
@list l27:level8
	{mso-level-text:"%1\.%2\.%3\.%4\.%5\.%6\.%7\.%8\.";
	mso-level-tab-stop:none;
	mso-level-number-position:left;
	margin-left:523.5pt;
	text-indent:-1.0in;}
@list l27:level9
	{mso-level-text:"%1\.%2\.%3\.%4\.%5\.%6\.%7\.%8\.%9\.";
	mso-level-tab-stop:none;
	mso-level-number-position:left;
	margin-left:588.0pt;
	text-indent:-1.0in;}
@list l28
	{mso-list-id:1216895176;
	mso-list-type:hybrid;
	mso-list-template-ids:-1905358460 377900956 134807577 134807579 134807567 134807577 134807579 134807567 134807577 134807579;}
@list l28:level1
	{mso-level-text:"8\.%1\.";
	mso-level-tab-stop:none;
	mso-level-number-position:left;
	margin-left:64.35pt;
	text-indent:-.25in;}
@list l28:level2
	{mso-level-number-format:alpha-lower;
	mso-level-tab-stop:none;
	mso-level-number-position:left;
	text-indent:-.25in;}
@list l28:level3
	{mso-level-number-format:roman-lower;
	mso-level-tab-stop:none;
	mso-level-number-position:right;
	text-indent:-9.0pt;}
@list l28:level4
	{mso-level-tab-stop:none;
	mso-level-number-position:left;
	text-indent:-.25in;}
@list l28:level5
	{mso-level-number-format:alpha-lower;
	mso-level-tab-stop:none;
	mso-level-number-position:left;
	text-indent:-.25in;}
@list l28:level6
	{mso-level-number-format:roman-lower;
	mso-level-tab-stop:none;
	mso-level-number-position:right;
	text-indent:-9.0pt;}
@list l28:level7
	{mso-level-tab-stop:none;
	mso-level-number-position:left;
	text-indent:-.25in;}
@list l28:level8
	{mso-level-number-format:alpha-lower;
	mso-level-tab-stop:none;
	mso-level-number-position:left;
	text-indent:-.25in;}
@list l28:level9
	{mso-level-number-format:roman-lower;
	mso-level-tab-stop:none;
	mso-level-number-position:right;
	text-indent:-9.0pt;}
@list l29
	{mso-list-id:1219977549;
	mso-list-type:hybrid;
	mso-list-template-ids:97689858 134807573 134807577 134807579 134807567 134807577 134807579 134807567 134807577 134807579;}
@list l29:level1
	{mso-level-number-format:alpha-upper;
	mso-level-tab-stop:none;
	mso-level-number-position:left;
	text-indent:-.25in;}
@list l29:level2
	{mso-level-number-format:alpha-lower;
	mso-level-tab-stop:none;
	mso-level-number-position:left;
	text-indent:-.25in;}
@list l29:level3
	{mso-level-number-format:roman-lower;
	mso-level-tab-stop:none;
	mso-level-number-position:right;
	text-indent:-9.0pt;}
@list l29:level4
	{mso-level-tab-stop:none;
	mso-level-number-position:left;
	text-indent:-.25in;}
@list l29:level5
	{mso-level-number-format:alpha-lower;
	mso-level-tab-stop:none;
	mso-level-number-position:left;
	text-indent:-.25in;}
@list l29:level6
	{mso-level-number-format:roman-lower;
	mso-level-tab-stop:none;
	mso-level-number-position:right;
	text-indent:-9.0pt;}
@list l29:level7
	{mso-level-tab-stop:none;
	mso-level-number-position:left;
	text-indent:-.25in;}
@list l29:level8
	{mso-level-number-format:alpha-lower;
	mso-level-tab-stop:none;
	mso-level-number-position:left;
	text-indent:-.25in;}
@list l29:level9
	{mso-level-number-format:roman-lower;
	mso-level-tab-stop:none;
	mso-level-number-position:right;
	text-indent:-9.0pt;}
@list l30
	{mso-list-id:1245647681;
	mso-list-template-ids:-1396032066;}
@list l30:level1
	{mso-level-start-at:2;
	mso-level-tab-stop:none;
	mso-level-number-position:left;
	margin-left:21.0pt;
	text-indent:-21.0pt;}
@list l30:level2
	{mso-level-text:"5\.%2\.";
	mso-level-tab-stop:none;
	mso-level-number-position:left;
	margin-left:.5in;
	text-indent:-.5in;
	mso-ansi-font-weight:normal;}
@list l30:level3
	{mso-level-text:"%1\.%2\.%3\.";
	mso-level-tab-stop:none;
	mso-level-number-position:left;
	margin-left:.5in;
	text-indent:-.5in;
	color:windowtext;}
@list l30:level4
	{mso-level-text:"%1\.%2\.%3\.%4\.";
	mso-level-tab-stop:none;
	mso-level-number-position:left;
	margin-left:.75in;
	text-indent:-.75in;}
@list l30:level5
	{mso-level-text:"%1\.%2\.%3\.%4\.%5\.";
	mso-level-tab-stop:none;
	mso-level-number-position:left;
	margin-left:1.0in;
	text-indent:-1.0in;}
@list l30:level6
	{mso-level-text:"%1\.%2\.%3\.%4\.%5\.%6\.";
	mso-level-tab-stop:none;
	mso-level-number-position:left;
	margin-left:1.0in;
	text-indent:-1.0in;}
@list l30:level7
	{mso-level-text:"%1\.%2\.%3\.%4\.%5\.%6\.%7\.";
	mso-level-tab-stop:none;
	mso-level-number-position:left;
	margin-left:1.25in;
	text-indent:-1.25in;}
@list l30:level8
	{mso-level-text:"%1\.%2\.%3\.%4\.%5\.%6\.%7\.%8\.";
	mso-level-tab-stop:none;
	mso-level-number-position:left;
	margin-left:1.25in;
	text-indent:-1.25in;}
@list l30:level9
	{mso-level-text:"%1\.%2\.%3\.%4\.%5\.%6\.%7\.%8\.%9\.";
	mso-level-tab-stop:none;
	mso-level-number-position:left;
	margin-left:1.5in;
	text-indent:-1.5in;}
@list l31
	{mso-list-id:1396471507;
	mso-list-type:hybrid;
	mso-list-template-ids:-2076945472 1085675962 69861401 69861403 69861391 69861401 69861403 69861391 69861401 69861403;}
@list l31:level1
	{mso-level-text:"4\.%1";
	mso-level-tab-stop:none;
	mso-level-number-position:left;
	text-indent:-.25in;
	mso-ansi-font-weight:normal;}
@list l31:level2
	{mso-level-number-format:alpha-lower;
	mso-level-tab-stop:none;
	mso-level-number-position:left;
	text-indent:-.25in;}
@list l31:level3
	{mso-level-number-format:roman-lower;
	mso-level-tab-stop:none;
	mso-level-number-position:right;
	text-indent:-9.0pt;}
@list l31:level4
	{mso-level-tab-stop:none;
	mso-level-number-position:left;
	text-indent:-.25in;}
@list l31:level5
	{mso-level-number-format:alpha-lower;
	mso-level-tab-stop:none;
	mso-level-number-position:left;
	text-indent:-.25in;}
@list l31:level6
	{mso-level-number-format:roman-lower;
	mso-level-tab-stop:none;
	mso-level-number-position:right;
	text-indent:-9.0pt;}
@list l31:level7
	{mso-level-tab-stop:none;
	mso-level-number-position:left;
	text-indent:-.25in;}
@list l31:level8
	{mso-level-number-format:alpha-lower;
	mso-level-tab-stop:none;
	mso-level-number-position:left;
	text-indent:-.25in;}
@list l31:level9
	{mso-level-number-format:roman-lower;
	mso-level-tab-stop:none;
	mso-level-number-position:right;
	text-indent:-9.0pt;}
@list l32
	{mso-list-id:1413773759;
	mso-list-type:hybrid;
	mso-list-template-ids:1699758376 448295008 134807577 134807579 134807567 134807577 134807579 134807567 134807577 134807579;}
@list l32:level1
	{mso-level-text:"13\.%1";
	mso-level-tab-stop:none;
	mso-level-number-position:left;
	text-indent:-.25in;
	mso-ansi-font-weight:normal;}
@list l32:level2
	{mso-level-number-format:alpha-lower;
	mso-level-tab-stop:none;
	mso-level-number-position:left;
	text-indent:-.25in;}
@list l32:level3
	{mso-level-number-format:roman-lower;
	mso-level-tab-stop:none;
	mso-level-number-position:right;
	text-indent:-9.0pt;}
@list l32:level4
	{mso-level-tab-stop:none;
	mso-level-number-position:left;
	text-indent:-.25in;}
@list l32:level5
	{mso-level-number-format:alpha-lower;
	mso-level-tab-stop:none;
	mso-level-number-position:left;
	text-indent:-.25in;}
@list l32:level6
	{mso-level-number-format:roman-lower;
	mso-level-tab-stop:none;
	mso-level-number-position:right;
	text-indent:-9.0pt;}
@list l32:level7
	{mso-level-tab-stop:none;
	mso-level-number-position:left;
	text-indent:-.25in;}
@list l32:level8
	{mso-level-number-format:alpha-lower;
	mso-level-tab-stop:none;
	mso-level-number-position:left;
	text-indent:-.25in;}
@list l32:level9
	{mso-level-number-format:roman-lower;
	mso-level-tab-stop:none;
	mso-level-number-position:right;
	text-indent:-9.0pt;}
@list l33
	{mso-list-id:1483623030;
	mso-list-template-ids:1164067290;}
@list l33:level1
	{mso-level-tab-stop:none;
	mso-level-number-position:left;
	text-indent:-.25in;}
@list l33:level2
	{mso-level-legal-format:yes;
	mso-level-text:"%1\.%2\.";
	mso-level-tab-stop:none;
	mso-level-number-position:left;
	margin-left:49.5pt;
	text-indent:-.25in;}
@list l33:level3
	{mso-level-legal-format:yes;
	mso-level-text:"%1\.%2\.%3\.";
	mso-level-tab-stop:none;
	mso-level-number-position:left;
	margin-left:81.0pt;
	text-indent:-.5in;}
@list l33:level4
	{mso-level-legal-format:yes;
	mso-level-text:"%1\.%2\.%3\.%4\.";
	mso-level-tab-stop:none;
	mso-level-number-position:left;
	margin-left:94.5pt;
	text-indent:-.5in;}
@list l33:level5
	{mso-level-legal-format:yes;
	mso-level-text:"%1\.%2\.%3\.%4\.%5\.";
	mso-level-tab-stop:none;
	mso-level-number-position:left;
	margin-left:1.75in;
	text-indent:-.75in;}
@list l33:level6
	{mso-level-legal-format:yes;
	mso-level-text:"%1\.%2\.%3\.%4\.%5\.%6\.";
	mso-level-tab-stop:none;
	mso-level-number-position:left;
	margin-left:139.5pt;
	text-indent:-.75in;}
@list l33:level7
	{mso-level-legal-format:yes;
	mso-level-text:"%1\.%2\.%3\.%4\.%5\.%6\.%7\.";
	mso-level-tab-stop:none;
	mso-level-number-position:left;
	margin-left:171.0pt;
	text-indent:-1.0in;}
@list l33:level8
	{mso-level-legal-format:yes;
	mso-level-text:"%1\.%2\.%3\.%4\.%5\.%6\.%7\.%8\.";
	mso-level-tab-stop:none;
	mso-level-number-position:left;
	margin-left:184.5pt;
	text-indent:-1.0in;}
@list l33:level9
	{mso-level-legal-format:yes;
	mso-level-text:"%1\.%2\.%3\.%4\.%5\.%6\.%7\.%8\.%9\.";
	mso-level-tab-stop:none;
	mso-level-number-position:left;
	margin-left:3.0in;
	text-indent:-1.25in;}
@list l34
	{mso-list-id:1559702612;
	mso-list-template-ids:-2008496102;}
@list l34:level1
	{mso-level-start-at:4;
	mso-level-tab-stop:none;
	mso-level-number-position:left;
	margin-left:.25in;
	text-indent:-.25in;}
@list l34:level2
	{mso-level-number-format:alpha-lower;
	mso-level-tab-stop:none;
	mso-level-number-position:left;
	margin-left:46.5pt;
	text-indent:-.25in;
	mso-ansi-font-weight:normal;}
@list l34:level3
	{mso-level-text:"%1\.%2\.%3\.";
	mso-level-tab-stop:none;
	mso-level-number-position:left;
	margin-left:93.0pt;
	text-indent:-.5in;}
@list l34:level4
	{mso-level-text:"%1\.%2\.%3\.%4\.";
	mso-level-tab-stop:none;
	mso-level-number-position:left;
	margin-left:121.5pt;
	text-indent:-.5in;}
@list l34:level5
	{mso-level-text:"%1\.%2\.%3\.%4\.%5\.";
	mso-level-tab-stop:none;
	mso-level-number-position:left;
	margin-left:168.0pt;
	text-indent:-.75in;}
@list l34:level6
	{mso-level-text:"%1\.%2\.%3\.%4\.%5\.%6\.";
	mso-level-tab-stop:none;
	mso-level-number-position:left;
	margin-left:196.5pt;
	text-indent:-.75in;}
@list l34:level7
	{mso-level-text:"%1\.%2\.%3\.%4\.%5\.%6\.%7\.";
	mso-level-tab-stop:none;
	mso-level-number-position:left;
	margin-left:243.0pt;
	text-indent:-1.0in;}
@list l34:level8
	{mso-level-text:"%1\.%2\.%3\.%4\.%5\.%6\.%7\.%8\.";
	mso-level-tab-stop:none;
	mso-level-number-position:left;
	margin-left:271.5pt;
	text-indent:-1.0in;}
@list l34:level9
	{mso-level-text:"%1\.%2\.%3\.%4\.%5\.%6\.%7\.%8\.%9\.";
	mso-level-tab-stop:none;
	mso-level-number-position:left;
	margin-left:318.0pt;
	text-indent:-1.25in;}
@list l35
	{mso-list-id:1583368226;
	mso-list-template-ids:5958740;}
@list l35:level1
	{mso-level-tab-stop:none;
	mso-level-number-position:left;
	margin-left:.25in;
	text-indent:-.25in;}
@list l35:level2
	{mso-level-text:"3\.%2\.";
	mso-level-tab-stop:none;
	mso-level-number-position:left;
	margin-left:.3in;
	text-indent:-.3in;
	mso-ansi-font-weight:normal;}
@list l35:level3
	{mso-level-text:"%1\.%2\.%3\.";
	mso-level-tab-stop:none;
	mso-level-number-position:left;
	margin-left:.85in;
	text-indent:-.35in;
	color:windowtext;}
@list l35:level4
	{mso-level-text:"%1\.%2\.%3\.%4\.";
	mso-level-tab-stop:none;
	mso-level-number-position:left;
	margin-left:1.2in;
	text-indent:-.45in;}
@list l35:level5
	{mso-level-text:"%1\.%2\.%3\.%4\.%5\.";
	mso-level-tab-stop:none;
	mso-level-number-position:left;
	margin-left:1.55in;
	text-indent:-.55in;}
@list l35:level6
	{mso-level-text:"%1\.%2\.%3\.%4\.%5\.%6\.";
	mso-level-tab-stop:none;
	mso-level-number-position:left;
	margin-left:1.9in;
	text-indent:-.65in;}
@list l35:level7
	{mso-level-text:"%1\.%2\.%3\.%4\.%5\.%6\.%7\.";
	mso-level-tab-stop:none;
	mso-level-number-position:left;
	margin-left:2.25in;
	text-indent:-.75in;}
@list l35:level8
	{mso-level-text:"%1\.%2\.%3\.%4\.%5\.%6\.%7\.%8\.";
	mso-level-tab-stop:none;
	mso-level-number-position:left;
	margin-left:2.6in;
	text-indent:-.85in;}
@list l35:level9
	{mso-level-text:"%1\.%2\.%3\.%4\.%5\.%6\.%7\.%8\.%9\.";
	mso-level-tab-stop:none;
	mso-level-number-position:left;
	margin-left:3.0in;
	text-indent:-1.0in;}
@list l36
	{mso-list-id:1591356233;
	mso-list-template-ids:-214956954;}
@list l36:level1
	{mso-level-start-at:12;
	mso-level-tab-stop:none;
	mso-level-number-position:left;
	margin-left:21.75pt;
	text-indent:-21.75pt;}
@list l36:level2
	{mso-level-text:"14\.%2";
	mso-level-tab-stop:none;
	mso-level-number-position:left;
	margin-left:39.75pt;
	text-indent:-21.75pt;
	mso-ansi-font-weight:normal;
	mso-ansi-font-style:normal;}
@list l36:level3
	{mso-level-text:"%1\.%2\.%3\.";
	mso-level-tab-stop:none;
	mso-level-number-position:left;
	margin-left:1.0in;
	text-indent:-.5in;}
@list l36:level4
	{mso-level-text:"%1\.%2\.%3\.%4\.";
	mso-level-tab-stop:none;
	mso-level-number-position:left;
	margin-left:1.25in;
	text-indent:-.5in;}
@list l36:level5
	{mso-level-text:"%1\.%2\.%3\.%4\.%5\.";
	mso-level-tab-stop:none;
	mso-level-number-position:left;
	margin-left:1.75in;
	text-indent:-.75in;}
@list l36:level6
	{mso-level-text:"%1\.%2\.%3\.%4\.%5\.%6\.";
	mso-level-tab-stop:none;
	mso-level-number-position:left;
	margin-left:2.0in;
	text-indent:-.75in;}
@list l36:level7
	{mso-level-text:"%1\.%2\.%3\.%4\.%5\.%6\.%7\.";
	mso-level-tab-stop:none;
	mso-level-number-position:left;
	margin-left:2.5in;
	text-indent:-1.0in;}
@list l36:level8
	{mso-level-text:"%1\.%2\.%3\.%4\.%5\.%6\.%7\.%8\.";
	mso-level-tab-stop:none;
	mso-level-number-position:left;
	margin-left:2.75in;
	text-indent:-1.0in;}
@list l36:level9
	{mso-level-text:"%1\.%2\.%3\.%4\.%5\.%6\.%7\.%8\.%9\.";
	mso-level-tab-stop:none;
	mso-level-number-position:left;
	margin-left:3.25in;
	text-indent:-1.25in;}
@list l37
	{mso-list-id:1654719867;
	mso-list-template-ids:1628754492;}
@list l37:level1
	{mso-level-start-at:3;
	mso-level-text:%1;
	mso-level-tab-stop:none;
	mso-level-number-position:left;
	margin-left:.25in;
	text-indent:-.25in;}
@list l37:level2
	{mso-level-text:"%1\.%2";
	mso-level-tab-stop:none;
	mso-level-number-position:left;
	margin-left:.5in;
	text-indent:-.25in;
	mso-ansi-font-weight:bold;}
@list l37:level3
	{mso-level-text:"%1\.%2\.%3";
	mso-level-tab-stop:none;
	mso-level-number-position:left;
	margin-left:1.0in;
	text-indent:-.5in;}
@list l37:level4
	{mso-level-text:"%1\.%2\.%3\.%4";
	mso-level-tab-stop:none;
	mso-level-number-position:left;
	margin-left:1.25in;
	text-indent:-.5in;}
@list l37:level5
	{mso-level-text:"%1\.%2\.%3\.%4\.%5";
	mso-level-tab-stop:none;
	mso-level-number-position:left;
	margin-left:1.75in;
	text-indent:-.75in;}
@list l37:level6
	{mso-level-text:"%1\.%2\.%3\.%4\.%5\.%6";
	mso-level-tab-stop:none;
	mso-level-number-position:left;
	margin-left:2.0in;
	text-indent:-.75in;}
@list l37:level7
	{mso-level-text:"%1\.%2\.%3\.%4\.%5\.%6\.%7";
	mso-level-tab-stop:none;
	mso-level-number-position:left;
	margin-left:2.5in;
	text-indent:-1.0in;}
@list l37:level8
	{mso-level-text:"%1\.%2\.%3\.%4\.%5\.%6\.%7\.%8";
	mso-level-tab-stop:none;
	mso-level-number-position:left;
	margin-left:2.75in;
	text-indent:-1.0in;}
@list l37:level9
	{mso-level-text:"%1\.%2\.%3\.%4\.%5\.%6\.%7\.%8\.%9";
	mso-level-tab-stop:none;
	mso-level-number-position:left;
	margin-left:3.25in;
	text-indent:-1.25in;}
@list l38
	{mso-list-id:1769958997;
	mso-list-type:hybrid;
	mso-list-template-ids:-1728125894 198461092 67698691 67698693 67698689 67698691 67698693 67698689 67698691 67698693;}
@list l38:level1
	{mso-level-number-format:alpha-lower;
	mso-level-tab-stop:none;
	mso-level-number-position:left;
	margin-left:45.0pt;
	text-indent:-.25in;
	mso-ascii-font-family:Arial;
	mso-fareast-font-family:Calibri;
	mso-hansi-font-family:Arial;
	mso-bidi-font-family:Arial;
	mso-ansi-font-weight:normal;}
@list l38:level2
	{mso-level-number-format:bullet;
	mso-level-text:o;
	mso-level-tab-stop:none;
	mso-level-number-position:left;
	margin-left:81.0pt;
	text-indent:-.25in;
	font-family:"Courier New";}
@list l38:level3
	{mso-level-number-format:bullet;
	mso-level-text:\F0A7;
	mso-level-tab-stop:none;
	mso-level-number-position:left;
	margin-left:117.0pt;
	text-indent:-.25in;
	font-family:Wingdings;}
@list l38:level4
	{mso-level-number-format:bullet;
	mso-level-text:\F0B7;
	mso-level-tab-stop:none;
	mso-level-number-position:left;
	margin-left:153.0pt;
	text-indent:-.25in;
	font-family:Symbol;}
@list l38:level5
	{mso-level-number-format:bullet;
	mso-level-text:o;
	mso-level-tab-stop:none;
	mso-level-number-position:left;
	margin-left:189.0pt;
	text-indent:-.25in;
	font-family:"Courier New";}
@list l38:level6
	{mso-level-number-format:bullet;
	mso-level-text:\F0A7;
	mso-level-tab-stop:none;
	mso-level-number-position:left;
	margin-left:225.0pt;
	text-indent:-.25in;
	font-family:Wingdings;}
@list l38:level7
	{mso-level-number-format:bullet;
	mso-level-text:\F0B7;
	mso-level-tab-stop:none;
	mso-level-number-position:left;
	margin-left:261.0pt;
	text-indent:-.25in;
	font-family:Symbol;}
@list l38:level8
	{mso-level-number-format:bullet;
	mso-level-text:o;
	mso-level-tab-stop:none;
	mso-level-number-position:left;
	margin-left:297.0pt;
	text-indent:-.25in;
	font-family:"Courier New";}
@list l38:level9
	{mso-level-number-format:bullet;
	mso-level-text:\F0A7;
	mso-level-tab-stop:none;
	mso-level-number-position:left;
	margin-left:333.0pt;
	text-indent:-.25in;
	font-family:Wingdings;}
@list l39
	{mso-list-id:1851408433;
	mso-list-type:hybrid;
	mso-list-template-ids:1512102428 67698709 67698713 67698715 67698703 67698713 67698715 67698703 67698713 67698715;}
@list l39:level1
	{mso-level-number-format:alpha-upper;
	mso-level-tab-stop:none;
	mso-level-number-position:left;
	text-indent:-.25in;}
@list l39:level2
	{mso-level-number-format:alpha-lower;
	mso-level-tab-stop:none;
	mso-level-number-position:left;
	text-indent:-.25in;}
@list l39:level3
	{mso-level-number-format:roman-lower;
	mso-level-tab-stop:none;
	mso-level-number-position:right;
	text-indent:-9.0pt;}
@list l39:level4
	{mso-level-tab-stop:none;
	mso-level-number-position:left;
	text-indent:-.25in;}
@list l39:level5
	{mso-level-number-format:alpha-lower;
	mso-level-tab-stop:none;
	mso-level-number-position:left;
	text-indent:-.25in;}
@list l39:level6
	{mso-level-number-format:roman-lower;
	mso-level-tab-stop:none;
	mso-level-number-position:right;
	text-indent:-9.0pt;}
@list l39:level7
	{mso-level-tab-stop:none;
	mso-level-number-position:left;
	text-indent:-.25in;}
@list l39:level8
	{mso-level-number-format:alpha-lower;
	mso-level-tab-stop:none;
	mso-level-number-position:left;
	text-indent:-.25in;}
@list l39:level9
	{mso-level-number-format:roman-lower;
	mso-level-tab-stop:none;
	mso-level-number-position:right;
	text-indent:-9.0pt;}
@list l40
	{mso-list-id:2006855915;
	mso-list-type:hybrid;
	mso-list-template-ids:2050656230 -14378502 67698691 67698693 67698689 67698691 67698693 67698689 67698691 67698693;}
@list l40:level1
	{mso-level-start-at:2;
	mso-level-number-format:bullet;
	mso-level-text:\F0E8;
	mso-level-tab-stop:none;
	mso-level-number-position:left;
	margin-left:46.35pt;
	text-indent:-.25in;
	font-family:Wingdings;
	mso-fareast-font-family:Calibri;
	mso-bidi-font-family:Arial;}
@list l40:level2
	{mso-level-number-format:bullet;
	mso-level-text:o;
	mso-level-tab-stop:none;
	mso-level-number-position:left;
	margin-left:82.35pt;
	text-indent:-.25in;
	font-family:"Courier New";}
@list l40:level3
	{mso-level-number-format:bullet;
	mso-level-text:\F0A7;
	mso-level-tab-stop:none;
	mso-level-number-position:left;
	margin-left:118.35pt;
	text-indent:-.25in;
	font-family:Wingdings;}
@list l40:level4
	{mso-level-number-format:bullet;
	mso-level-text:\F0B7;
	mso-level-tab-stop:none;
	mso-level-number-position:left;
	margin-left:154.35pt;
	text-indent:-.25in;
	font-family:Symbol;}
@list l40:level5
	{mso-level-number-format:bullet;
	mso-level-text:o;
	mso-level-tab-stop:none;
	mso-level-number-position:left;
	margin-left:190.35pt;
	text-indent:-.25in;
	font-family:"Courier New";}
@list l40:level6
	{mso-level-number-format:bullet;
	mso-level-text:\F0A7;
	mso-level-tab-stop:none;
	mso-level-number-position:left;
	margin-left:226.35pt;
	text-indent:-.25in;
	font-family:Wingdings;}
@list l40:level7
	{mso-level-number-format:bullet;
	mso-level-text:\F0B7;
	mso-level-tab-stop:none;
	mso-level-number-position:left;
	margin-left:262.35pt;
	text-indent:-.25in;
	font-family:Symbol;}
@list l40:level8
	{mso-level-number-format:bullet;
	mso-level-text:o;
	mso-level-tab-stop:none;
	mso-level-number-position:left;
	margin-left:298.35pt;
	text-indent:-.25in;
	font-family:"Courier New";}
@list l40:level9
	{mso-level-number-format:bullet;
	mso-level-text:\F0A7;
	mso-level-tab-stop:none;
	mso-level-number-position:left;
	margin-left:334.35pt;
	text-indent:-.25in;
	font-family:Wingdings;}
@list l41
	{mso-list-id:2072652226;
	mso-list-template-ids:1139992812;}
@list l41:level1
	{mso-level-start-at:7;
	mso-level-text:%1;
	mso-level-tab-stop:none;
	mso-level-number-position:left;
	margin-left:24.0pt;
	text-indent:-24.0pt;}
@list l41:level2
	{mso-level-text:"%1\.%2";
	mso-level-tab-stop:none;
	mso-level-number-position:left;
	margin-left:33.0pt;
	text-indent:-24.0pt;}
@list l41:level3
	{mso-level-text:"%1\.%2\.%3";
	mso-level-tab-stop:none;
	mso-level-number-position:left;
	margin-left:.75in;
	text-indent:-.5in;}
@list l41:level4
	{mso-level-text:"%1\.%2\.%3\.%4";
	mso-level-tab-stop:none;
	mso-level-number-position:left;
	margin-left:63.0pt;
	text-indent:-.5in;}
@list l41:level5
	{mso-level-text:"%1\.%2\.%3\.%4\.%5";
	mso-level-tab-stop:none;
	mso-level-number-position:left;
	margin-left:1.25in;
	text-indent:-.75in;}
@list l41:level6
	{mso-level-text:"%1\.%2\.%3\.%4\.%5\.%6";
	mso-level-tab-stop:none;
	mso-level-number-position:left;
	margin-left:99.0pt;
	text-indent:-.75in;}
@list l41:level7
	{mso-level-text:"%1\.%2\.%3\.%4\.%5\.%6\.%7";
	mso-level-tab-stop:none;
	mso-level-number-position:left;
	margin-left:1.75in;
	text-indent:-1.0in;}
@list l41:level8
	{mso-level-text:"%1\.%2\.%3\.%4\.%5\.%6\.%7\.%8";
	mso-level-tab-stop:none;
	mso-level-number-position:left;
	margin-left:135.0pt;
	text-indent:-1.0in;}
@list l41:level9
	{mso-level-text:"%1\.%2\.%3\.%4\.%5\.%6\.%7\.%8\.%9";
	mso-level-tab-stop:none;
	mso-level-number-position:left;
	margin-left:2.25in;
	text-indent:-1.25in;}
@list l42
	{mso-list-id:2074813442;
	mso-list-template-ids:986606358;}
@list l42:level1
	{mso-level-text:%1;
	mso-level-tab-stop:none;
	mso-level-number-position:left;
	margin-left:.25in;
	text-indent:-.25in;
	color:red;}
@list l42:level2
	{mso-level-text:"%1\.%2";
	mso-level-tab-stop:none;
	mso-level-number-position:left;
	margin-left:46.35pt;
	text-indent:-.25in;
	color:red;}
@list l42:level3
	{mso-level-text:"%1\.%2\.%3";
	mso-level-tab-stop:none;
	mso-level-number-position:left;
	margin-left:92.7pt;
	text-indent:-.5in;
	color:red;}
@list l42:level4
	{mso-level-text:"%1\.%2\.%3\.%4";
	mso-level-tab-stop:none;
	mso-level-number-position:left;
	margin-left:121.05pt;
	text-indent:-.5in;
	color:red;}
@list l42:level5
	{mso-level-text:"%1\.%2\.%3\.%4\.%5";
	mso-level-tab-stop:none;
	mso-level-number-position:left;
	margin-left:167.4pt;
	text-indent:-.75in;
	color:red;}
@list l42:level6
	{mso-level-text:"%1\.%2\.%3\.%4\.%5\.%6";
	mso-level-tab-stop:none;
	mso-level-number-position:left;
	margin-left:195.75pt;
	text-indent:-.75in;
	color:red;}
@list l42:level7
	{mso-level-text:"%1\.%2\.%3\.%4\.%5\.%6\.%7";
	mso-level-tab-stop:none;
	mso-level-number-position:left;
	margin-left:242.1pt;
	text-indent:-1.0in;
	color:red;}
@list l42:level8
	{mso-level-text:"%1\.%2\.%3\.%4\.%5\.%6\.%7\.%8";
	mso-level-tab-stop:none;
	mso-level-number-position:left;
	margin-left:270.45pt;
	text-indent:-1.0in;
	color:red;}
@list l42:level9
	{mso-level-text:"%1\.%2\.%3\.%4\.%5\.%6\.%7\.%8\.%9";
	mso-level-tab-stop:none;
	mso-level-number-position:left;
	margin-left:4.4in;
	text-indent:-1.25in;
	color:red;}
@list l43
	{mso-list-id:2088456441;
	mso-list-template-ids:-675783698;}
@list l43:level1
	{mso-level-start-at:3;
	mso-level-text:%1;
	mso-level-tab-stop:none;
	mso-level-number-position:left;
	margin-left:24.0pt;
	text-indent:-24.0pt;}
@list l43:level2
	{mso-level-start-at:2;
	mso-level-text:"%1\.%2";
	mso-level-tab-stop:none;
	mso-level-number-position:left;
	margin-left:38.15pt;
	text-indent:-24.0pt;}
@list l43:level3
	{mso-level-start-at:3;
	mso-level-text:"%3\.2\.2\.";
	mso-level-tab-stop:none;
	mso-level-number-position:left;
	margin-left:64.3pt;
	text-indent:-.5in;}
@list l43:level4
	{mso-level-text:"%1\.%2\.%3\.%4";
	mso-level-tab-stop:none;
	mso-level-number-position:left;
	margin-left:78.45pt;
	text-indent:-.5in;}
@list l43:level5
	{mso-level-text:"%1\.%2\.%3\.%4\.%5";
	mso-level-tab-stop:none;
	mso-level-number-position:left;
	margin-left:110.6pt;
	text-indent:-.75in;}
@list l43:level6
	{mso-level-text:"%1\.%2\.%3\.%4\.%5\.%6";
	mso-level-tab-stop:none;
	mso-level-number-position:left;
	margin-left:124.75pt;
	text-indent:-.75in;}
@list l43:level7
	{mso-level-text:"%1\.%2\.%3\.%4\.%5\.%6\.%7";
	mso-level-tab-stop:none;
	mso-level-number-position:left;
	margin-left:156.9pt;
	text-indent:-1.0in;}
@list l43:level8
	{mso-level-text:"%1\.%2\.%3\.%4\.%5\.%6\.%7\.%8";
	mso-level-tab-stop:none;
	mso-level-number-position:left;
	margin-left:171.05pt;
	text-indent:-1.0in;}
@list l43:level9
	{mso-level-text:"%1\.%2\.%3\.%4\.%5\.%6\.%7\.%8\.%9";
	mso-level-tab-stop:none;
	mso-level-number-position:left;
	margin-left:203.2pt;
	text-indent:-1.25in;}
@list l44
	{mso-list-id:2117096594;
	mso-list-template-ids:-1811090108;}
@list l44:level1
	{mso-level-tab-stop:none;
	mso-level-number-position:left;
	margin-left:.25in;
	text-indent:-.25in;}
@list l44:level2
	{mso-level-text:"9\.%2";
	mso-level-tab-stop:none;
	mso-level-number-position:left;
	margin-left:156.3pt;
	text-indent:-.3in;
	mso-ansi-font-weight:normal;}
@list l44:level3
	{mso-level-text:"%1\.%2\.%3\.";
	mso-level-tab-stop:none;
	mso-level-number-position:left;
	margin-left:.85in;
	text-indent:-.35in;
	color:windowtext;}
@list l44:level4
	{mso-level-text:"%1\.%2\.%3\.%4\.";
	mso-level-tab-stop:none;
	mso-level-number-position:left;
	margin-left:1.2in;
	text-indent:-.45in;}
@list l44:level5
	{mso-level-text:"%1\.%2\.%3\.%4\.%5\.";
	mso-level-tab-stop:none;
	mso-level-number-position:left;
	margin-left:1.55in;
	text-indent:-.55in;}
@list l44:level6
	{mso-level-text:"%1\.%2\.%3\.%4\.%5\.%6\.";
	mso-level-tab-stop:none;
	mso-level-number-position:left;
	margin-left:1.9in;
	text-indent:-.65in;}
@list l44:level7
	{mso-level-text:"%1\.%2\.%3\.%4\.%5\.%6\.%7\.";
	mso-level-tab-stop:none;
	mso-level-number-position:left;
	margin-left:2.25in;
	text-indent:-.75in;}
@list l44:level8
	{mso-level-text:"%1\.%2\.%3\.%4\.%5\.%6\.%7\.%8\.";
	mso-level-tab-stop:none;
	mso-level-number-position:left;
	margin-left:2.6in;
	text-indent:-.85in;}
@list l44:level9
	{mso-level-text:"%1\.%2\.%3\.%4\.%5\.%6\.%7\.%8\.%9\.";
	mso-level-tab-stop:none;
	mso-level-number-position:left;
	margin-left:3.0in;
	text-indent:-1.0in;}
@list l45
	{mso-list-id:2131509784;
	mso-list-template-ids:-857558742;}
@list l45:level1
	{mso-level-start-at:486;
	mso-level-text:"%1\.0";
	mso-level-tab-stop:none;
	mso-level-number-position:left;
	margin-left:39.0pt;
	text-indent:-39.0pt;}
@list l45:level2
	{mso-level-number-format:arabic-leading-zero;
	mso-level-text:"%1\.%2";
	mso-level-tab-stop:none;
	mso-level-number-position:left;
	margin-left:75.0pt;
	text-indent:-39.0pt;}
@list l45:level3
	{mso-level-text:"%1\.%2\.%3";
	mso-level-tab-stop:none;
	mso-level-number-position:left;
	margin-left:111.0pt;
	text-indent:-39.0pt;}
@list l45:level4
	{mso-level-text:"%1\.%2\.%3\.%4";
	mso-level-tab-stop:none;
	mso-level-number-position:left;
	margin-left:147.0pt;
	text-indent:-39.0pt;}
@list l45:level5
	{mso-level-text:"%1\.%2\.%3\.%4\.%5";
	mso-level-tab-stop:none;
	mso-level-number-position:left;
	margin-left:2.75in;
	text-indent:-.75in;}
@list l45:level6
	{mso-level-text:"%1\.%2\.%3\.%4\.%5\.%6";
	mso-level-tab-stop:none;
	mso-level-number-position:left;
	margin-left:3.25in;
	text-indent:-.75in;}
@list l45:level7
	{mso-level-text:"%1\.%2\.%3\.%4\.%5\.%6\.%7";
	mso-level-tab-stop:none;
	mso-level-number-position:left;
	margin-left:4.0in;
	text-indent:-1.0in;}
@list l45:level8
	{mso-level-text:"%1\.%2\.%3\.%4\.%5\.%6\.%7\.%8";
	mso-level-tab-stop:none;
	mso-level-number-position:left;
	margin-left:4.5in;
	text-indent:-1.0in;}
@list l45:level9
	{mso-level-text:"%1\.%2\.%3\.%4\.%5\.%6\.%7\.%8\.%9";
	mso-level-tab-stop:none;
	mso-level-number-position:left;
	margin-left:5.25in;
	text-indent:-1.25in;}
ol
	{margin-bottom:0in;}
ul
	{margin-bottom:0in;}
-->
</style>
<!--[if gte mso 10]>
<style>
 /* Style Definitions */
 table.MsoNormalTable
	{mso-style-name:"BaÒng Thông thýõÌng";
	mso-tstyle-rowband-size:0;
	mso-tstyle-colband-size:0;
	mso-style-noshow:yes;
	mso-style-priority:99;
	mso-style-parent:"";
	mso-padding-alt:0in 5.4pt 0in 5.4pt;
	mso-para-margin:0in;
	mso-pagination:widow-orphan;
	font-size:10.0pt;
	font-family:"Calibri",sans-serif;
	mso-bidi-font-family:"Times New Roman";
	mso-ansi-language:EN-US;
	mso-fareast-language:EN-US;}
table.MsoTableGrid
	{mso-style-name:"Lýõìi BaÒng";
	mso-tstyle-rowband-size:0;
	mso-tstyle-colband-size:0;
	mso-style-priority:59;
	mso-style-unhide:no;
	border:solid windowtext 1.0pt;
	mso-border-alt:solid windowtext .5pt;
	mso-padding-alt:0in 5.4pt 0in 5.4pt;
	mso-border-insideh:.5pt solid windowtext;
	mso-border-insidev:.5pt solid windowtext;
	mso-para-margin:0in;
	mso-pagination:widow-orphan;
	font-size:10.0pt;
	font-family:"Calibri",sans-serif;
	mso-bidi-font-family:"Times New Roman";
	mso-ansi-language:EN-US;
	mso-fareast-language:EN-US;}
table.GridTable1Light-Accent51
	{mso-style-name:"Grid Table 1 Light - Accent 51";
	mso-tstyle-rowband-size:1;
	mso-tstyle-colband-size:1;
	mso-style-priority:46;
	mso-style-unhide:no;
	border:solid #B4C6E7 1.0pt;
	mso-border-themecolor:accent5;
	mso-border-themetint:102;
	mso-border-alt:solid #B4C6E7 .5pt;
	mso-border-themecolor:accent5;
	mso-border-themetint:102;
	mso-padding-alt:0in 5.4pt 0in 5.4pt;
	mso-border-insideh:.5pt solid #B4C6E7;
	mso-border-insideh-themecolor:accent5;
	mso-border-insideh-themetint:102;
	mso-border-insidev:.5pt solid #B4C6E7;
	mso-border-insidev-themecolor:accent5;
	mso-border-insidev-themetint:102;
	mso-para-margin:0in;
	mso-pagination:widow-orphan;
	font-size:10.0pt;
	font-family:"Calibri",sans-serif;
	mso-bidi-font-family:"Times New Roman";
	mso-ansi-language:EN-US;
	mso-fareast-language:EN-US;}
table.GridTable1Light-Accent51FirstRow
	{mso-style-name:"Grid Table 1 Light - Accent 51";
	mso-table-condition:first-row;
	mso-style-priority:46;
	mso-style-unhide:no;
	mso-tstyle-border-bottom:1.5pt solid #8EAADB;
	mso-tstyle-border-bottom-themecolor:accent5;
	mso-tstyle-border-bottom-themetint:153;
	mso-ansi-font-weight:bold;
	mso-bidi-font-weight:bold;}
table.GridTable1Light-Accent51LastRow
	{mso-style-name:"Grid Table 1 Light - Accent 51";
	mso-table-condition:last-row;
	mso-style-priority:46;
	mso-style-unhide:no;
	mso-tstyle-border-top:.75pt double #8EAADB;
	mso-tstyle-border-top-themecolor:accent5;
	mso-tstyle-border-top-themetint:153;
	mso-ansi-font-weight:bold;
	mso-bidi-font-weight:bold;}
table.GridTable1Light-Accent51FirstCol
	{mso-style-name:"Grid Table 1 Light - Accent 51";
	mso-table-condition:first-column;
	mso-style-priority:46;
	mso-style-unhide:no;
	mso-ansi-font-weight:bold;
	mso-bidi-font-weight:bold;}
table.GridTable1Light-Accent51LastCol
	{mso-style-name:"Grid Table 1 Light - Accent 51";
	mso-table-condition:last-column;
	mso-style-priority:46;
	mso-style-unhide:no;
	mso-ansi-font-weight:bold;
	mso-bidi-font-weight:bold;}
</style>
<![endif]--><!--[if gte mso 9]><xml>
 <o:shapedefaults v:ext="edit" spidmax="2051"/>
</xml><![endif]--><!--[if gte mso 9]><xml>
 <o:shapelayout v:ext="edit">
  <o:idmap v:ext="edit" data="2"/>
 </o:shapelayout></xml><![endif]-->
</head>

<body lang=VI link=blue vlink="#954F72" style='tab-interval:.5in;word-wrap:
break-word'>

<div class=WordSection1>

<p class=MsoNormal><span lang=EN-US style='font-size:1.0pt;mso-bidi-font-size:
11.0pt;line-height:115%'><o:p>&nbsp;</o:p></span></p>

<table class=MsoNormalTable border=0 cellspacing=0 cellpadding=0 width=668
 style='width:501.35pt;margin-left:-7.1pt;border-collapse:collapse;mso-yfti-tbllook:
 1184;mso-padding-alt:0in 5.4pt 0in 5.4pt'>
 <tr style='mso-yfti-irow:0;mso-yfti-firstrow:yes;mso-yfti-lastrow:yes;
  height:58.15pt'>
  <td width=222 valign=top style='width:166.85pt;padding:0in 5.4pt 0in 5.4pt;
  height:58.15pt'>
  <p class=MsoNormal style='margin-bottom:0in;line-height:120%'><v:shapetype
   id="_x0000_t75" coordsize="21600,21600" o:spt="75" o:preferrelative="t"
   path="m@4@5l@4@11@9@11@9@5xe" filled="f" stroked="f">
   <v:stroke joinstyle="miter"/>
   <v:formulas>
    <v:f eqn="if lineDrawn pixelLineWidth 0"/>
    <v:f eqn="sum @0 1 0"/>
    <v:f eqn="sum 0 0 @1"/>
    <v:f eqn="prod @2 1 2"/>
    <v:f eqn="prod @3 21600 pixelWidth"/>
    <v:f eqn="prod @3 21600 pixelHeight"/>
    <v:f eqn="sum @0 0 1"/>
    <v:f eqn="prod @6 1 2"/>
    <v:f eqn="prod @7 21600 pixelWidth"/>
    <v:f eqn="sum @8 21600 0"/>
    <v:f eqn="prod @7 21600 pixelHeight"/>
    <v:f eqn="sum @10 21600 0"/>
   </v:formulas>
   <v:path o:extrusionok="f" gradientshapeok="t" o:connecttype="rect"/>
   <o:lock v:ext="edit" aspectratio="t"/>
  </v:shapetype><v:shape id="Picture_x0020_1" o:spid="_x0000_s2050" type="#_x0000_t75"
   alt="DH" style='position:absolute;margin-left:51.7pt;margin-top:0;width:55.25pt;
   height:45.75pt;z-index:251696128;visibility:visible;mso-wrap-style:square;
   mso-wrap-distance-left:9pt;mso-wrap-distance-top:0;
   mso-wrap-distance-right:9pt;mso-wrap-distance-bottom:0;
   mso-position-horizontal:absolute;mso-position-horizontal-relative:text;
   mso-position-vertical:absolute;mso-position-vertical-relative:text'>
   <v:imagedata src="New%20HÐ%20Ð&#7840;I%20L&Yacute;%202022%20-%20OTC%20f1.files/image001.jpg"
    o:title="DH"/>
   <w:wrap type="through"/>
  </v:shape><b style='mso-bidi-font-weight:normal'><span lang=EN-US
  style='font-family:"Arial",sans-serif'><o:p></o:p></span></b></p>
  <p class=MsoNormal style='margin-bottom:0in;line-height:120%'><b
  style='mso-bidi-font-weight:normal'><span lang=EN-US style='font-family:"Arial",sans-serif'><o:p>&nbsp;</o:p></span></b></p>
  <p class=MsoNormal style='margin-bottom:0in;line-height:120%'><b
  style='mso-bidi-font-weight:normal'><span lang=EN-US style='font-family:"Arial",sans-serif'><o:p>&nbsp;</o:p></span></b></p>
  <p class=MsoNormal align=center style='margin-bottom:0in;text-align:center;
  line-height:120%'><b style='mso-bidi-font-weight:normal'><span lang=EN-US
  style='font-family:"Arial",sans-serif'>MASTERTRAN</span></b><span lang=EN-US
  style='font-family:"Arial",sans-serif'><o:p></o:p></span></p>
  <p class=MsoNormal align=center style='margin-bottom:0in;text-align:center;
  line-height:120%'><span class=GramE><i style='mso-bidi-font-style:normal'><span
  lang=EN-US style='font-size:10.0pt;line-height:120%;font-family:"Arial",sans-serif'>S&#7889;:…</span></i></span><i
  style='mso-bidi-font-style:normal'><span lang=EN-US style='font-size:10.0pt;
  line-height:120%;font-family:"Arial",sans-serif'>.……..…..../2022/HÐÐL<o:p></o:p></span></i></p>
  </td>
  <td width=446 valign=top style='width:334.5pt;padding:0in 5.4pt 0in 5.4pt;
  height:58.15pt'>
  <p class=MsoNormal align=center style='margin-bottom:0in;text-align:center;
  line-height:120%'><b style='mso-bidi-font-weight:normal'><span lang=EN-US
  style='font-family:"Arial",sans-serif'>C&#7896;NG H&Ograve;A X&Atilde; H&#7896;I
  CH&#7910; NGH&#296;A VI&#7878;T NAM<o:p></o:p></span></b></p>
  <p class=MsoNormal align=center style='margin-bottom:0in;text-align:center;
  line-height:120%'><span lang=EN-US style='font-family:"Arial",sans-serif'><span
  style='mso-spacerun:yes'>   </span><b style='mso-bidi-font-weight:normal'>Ð&#7897;c
  l&#7853;p – T&#7921; do – H&#7841;nh phúc<o:p></o:p></b></span></p>
  <p class=MsoNormal align=center style='margin-bottom:0in;text-align:center;
  line-height:120%'><span lang=EN-US style='font-family:"Arial",sans-serif'>--------------o0o------------<o:p></o:p></span></p>
  </td>
 </tr>
</table>

<p class=MsoNormal align=center style='margin-bottom:0in;text-align:center;
line-height:40%'><b style='mso-bidi-font-weight:normal'><span lang=EN-US
style='font-family:"Arial",sans-serif'><o:p>&nbsp;</o:p></span></b></p>

<p class=MsoNormal align=center style='margin-bottom:0in;text-align:center;
line-height:120%'><b style='mso-bidi-font-weight:normal'><span lang=EN-US
style='font-size:12.0pt;mso-bidi-font-size:14.0pt;line-height:120%;font-family:
"Arial",sans-serif'>H&#7906;P Ð&#7890;NG Ð&#7840;I L&Yacute;<o:p></o:p></span></b></p>

<p class=MsoNormal style='margin-bottom:0in;line-height:8.0pt;mso-line-height-rule:
exactly'><i style='mso-bidi-font-style:normal'><span lang=EN-US
style='font-size:8.0pt;mso-bidi-font-size:11.0pt;font-family:"Arial",sans-serif'><o:p>&nbsp;</o:p></span></i></p>

<p class=MsoListParagraphCxSpFirst style='margin-top:4.0pt;margin-right:0in;
margin-bottom:4.0pt;margin-left:28.35pt;mso-add-space:auto;text-align:justify;
text-indent:-21.8pt;line-height:120%;mso-list:l3 level1 lfo40'><![if !supportLists]><span
lang=EN-US style='font-size:10.0pt;line-height:120%;font-family:Symbol;
mso-fareast-font-family:Symbol;mso-bidi-font-family:Symbol'><span
style='mso-list:Ignore'>-<span style='font:7.0pt "Times New Roman"'>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
</span></span></span><![endif]><i style='mso-bidi-font-style:normal'><span
lang=EN-US style='font-size:10.0pt;line-height:120%;font-family:"Arial",sans-serif'>Cãn
c&#7913; vào B&#7897; lu&#7853;t dân s&#7921; s&#7889;: 91/2015/QH13, ngày
24/11/2015 Qu&#7889;c h&#7897;i Ný&#7899;c CHXHCN Vi&#7879;t <span class=GramE>Nam;</span><o:p></o:p></span></i></p>

<p class=MsoListParagraphCxSpMiddle style='margin-top:4.0pt;margin-right:0in;
margin-bottom:4.0pt;margin-left:28.35pt;mso-add-space:auto;text-align:justify;
text-indent:-21.8pt;line-height:120%;mso-list:l3 level1 lfo40'><![if !supportLists]><span
lang=EN-US style='font-size:10.0pt;line-height:120%;font-family:Symbol;
mso-fareast-font-family:Symbol;mso-bidi-font-family:Symbol'><span
style='mso-list:Ignore'>-<span style='font:7.0pt "Times New Roman"'>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
</span></span></span><![endif]><i style='mso-bidi-font-style:normal'><span
lang=EN-US style='font-size:10.0pt;line-height:120%;font-family:"Arial",sans-serif'>Cãn
c&#7913; Lu&#7853;t Thýõng m&#7841;i s&#7889;: 36/2005/QH11, ngày 14/06/2005 Qu&#7889;c
h&#7897;i Ný&#7899;c CHXHCN Vi&#7879;t <span class=GramE>Nam;</span><o:p></o:p></span></i></p>

<p class=MsoListParagraphCxSpLast style='margin-top:4.0pt;margin-right:0in;
margin-bottom:4.0pt;margin-left:28.35pt;mso-add-space:auto;text-align:justify;
text-indent:-21.8pt;line-height:120%;mso-list:l3 level1 lfo40'><![if !supportLists]><span
lang=EN-US style='font-size:10.0pt;line-height:120%;font-family:Symbol;
mso-fareast-font-family:Symbol;mso-bidi-font-family:Symbol'><span
style='mso-list:Ignore'>-<span style='font:7.0pt "Times New Roman"'>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
</span></span></span><![endif]><i style='mso-bidi-font-style:normal'><span
lang=EN-US style='font-size:10.0pt;line-height:120%;font-family:"Arial",sans-serif'>Cãn
c&#7913; vào nhu c&#7847;u và th&#7887;a thu&#7853;n c&#7911;a hai bên.<o:p></o:p></span></i></p>

<p class=MsoNormal style='margin-top:0in;margin-right:0in;margin-bottom:4.0pt;
margin-left:28.35pt;mso-add-space:auto;text-align:justify;text-indent:-21.8pt;
line-height:120%;tab-stops:right dotted 510.3pt'><i style='mso-bidi-font-style:
normal'><span lang=EN-US style='font-size:10.0pt;line-height:120%;font-family:
"Arial",sans-serif'><span style='mso-spacerun:yes'>        </span>Hôm nay, ngày…<span
class=GramE>…..</span>/….…./2022, t&#7841;i Vãn ph&ograve;ng Công ty CP
Mastertran chúng tôi g&#7891;m:<o:p></o:p></span></i></p>

<p class=MsoNormal style='margin-top:0in;margin-right:0in;margin-bottom:0in;
margin-left:28.35pt;text-align:justify;line-height:8.0pt;mso-line-height-rule:
exactly;tab-stops:113.4pt 283.5pt'><b style='mso-bidi-font-weight:normal'><u><span
lang=EN-US style='font-size:10.0pt;font-family:"Arial",sans-serif'><o:p><span
 style='text-decoration:none'>&nbsp;</span></o:p></span></u></b></p>

<p class=MsoNormal style='margin-top:0in;margin-right:0in;margin-bottom:0in;
margin-left:28.35pt;text-align:justify;line-height:14.0pt;mso-line-height-rule:
exactly;tab-stops:113.4pt 283.5pt'><b style='mso-bidi-font-weight:normal'><u><span
lang=EN-US style='font-size:10.0pt;font-family:"Arial",sans-serif'>BÊN A</span></u></b><i
style='mso-bidi-font-style:normal'><span lang=EN-US style='font-size:10.0pt;
font-family:"Arial",sans-serif'><span style='mso-tab-count:1'>                  </span></span></i><b
style='mso-bidi-font-weight:normal'><span lang=EN-US style='font-size:10.0pt;
font-family:"Arial",sans-serif'>: CÔNG TY C&#7892; PH&#7846;N MASTERTRAN </span></b><i
style='mso-bidi-font-style:normal'><span lang=EN-US style='font-size:10.0pt;
font-family:"Arial",sans-serif'><o:p></o:p></span></i></p>

<p class=MsoNormal style='margin-top:0in;margin-right:0in;margin-bottom:0in;
margin-left:28.35pt;text-align:justify;line-height:14.0pt;mso-line-height-rule:
exactly;tab-stops:113.4pt 283.5pt'><span lang=EN-US style='font-size:10.0pt;
font-family:"Arial",sans-serif'>Ð&#7883;a ch&#7881;<i style='mso-bidi-font-style:
normal'><span style='mso-tab-count:1'>                  </span></i>: NV4.13 Khu
ch&#7913;c nãng ðô th&#7883; Tây M&#7895;, P. Tây M&#7895;, Q. Nam T&#7915;
Liêm, Hà N&#7897;i<o:p></o:p></span></p>

<p class=MsoNormal style='margin-top:0in;margin-right:0in;margin-bottom:0in;
margin-left:28.35pt;text-align:justify;line-height:14.0pt;mso-line-height-rule:
exactly;tab-stops:28.35pt 113.4pt'><span lang=EN-US style='font-size:10.0pt;
font-family:"Arial",sans-serif'>Ði&#7879;n tho&#7841;i<span style='mso-tab-count:
1'>             </span>: </span><span lang=EN-US style='font-size:10.0pt;
font-family:"Arial",sans-serif;mso-fareast-font-family:"Times New Roman";
mso-no-proof:yes'>024.37878408<span style='mso-tab-count:2'>                        </span></span><span
lang=EN-US style='font-size:10.0pt;font-family:"Arial",sans-serif'>M&atilde; s&#7889;
thu&#7871;: <span style='mso-tab-count:1'>      </span>0105381169<o:p></o:p></span></p>

<p class=MsoNormal style='margin-top:0in;margin-right:0in;margin-bottom:0in;
margin-left:28.35pt;text-align:justify;line-height:16.0pt;mso-line-height-rule:
exactly;tab-stops:113.4pt 283.5pt'><span lang=EN-US style='font-size:10.0pt;
font-family:"Arial",sans-serif'>Tài kho&#7843;n<span class=GramE><span
style='mso-tab-count:1'>              </span>:…</span>……………………………………….……………..…………………………………………<o:p></o:p></span></p>

<p class=MsoNormal style='margin-top:0in;margin-right:0in;margin-bottom:0in;
margin-left:28.35pt;text-align:justify;line-height:16.0pt;mso-line-height-rule:
exactly;tab-stops:113.4pt 283.5pt'><span lang=EN-US style='font-size:10.0pt;
font-family:"Arial",sans-serif'>Ngân hàng<span class=GramE><span
style='mso-tab-count:1'>            </span>:…</span>…...……………………………………….….………………………………………………..<i
style='mso-bidi-font-style:normal'><o:p></o:p></i></span></p>

<p class=MsoNormal style='margin-top:0in;margin-right:0in;margin-bottom:0in;
margin-left:28.35pt;text-align:justify;line-height:16.0pt;mso-line-height-rule:
exactly;tab-stops:113.4pt 283.5pt'><span lang=EN-US style='font-size:10.0pt;
font-family:"Arial",sans-serif'>Ð&#7841;i di&#7879;n<i style='mso-bidi-font-style:
normal'><span style='mso-tab-count:1'>                </span></i>: Ông……………………………………
<span style='mso-spacerun:yes'> </span><span style='mso-tab-count:1'>  </span>Ch&#7913;c
danh: Giám ð&#7889;c bán hàng vùng…………...<b style='mso-bidi-font-weight:normal'><o:p></o:p></b></span></p>

<p class=MsoNormal style='margin-top:0in;margin-right:0in;margin-bottom:0in;
margin-left:28.35pt;text-align:justify;tab-stops:113.4pt dotted 510.3pt'><span
lang=EN-US style='font-size:10.0pt;line-height:115%;font-family:"Arial",sans-serif;
mso-bidi-font-weight:bold'>Theo gi&#7845;y &#7911;y quy&#7873;n s&#7889;:
……………………………………………………………………………………………….<o:p></o:p></span></p>

<p class=MsoNormal style='margin-top:0in;margin-right:0in;margin-bottom:0in;
margin-left:28.35pt;text-align:justify;line-height:8.0pt;mso-line-height-rule:
exactly;tab-stops:113.4pt dotted 510.3pt'><b style='mso-bidi-font-weight:normal'><u><span
lang=EN-US style='font-size:10.0pt;font-family:"Arial",sans-serif'><o:p><span
 style='text-decoration:none'>&nbsp;</span></o:p></span></u></b></p>

<p class=MsoNormal style='margin-top:0in;margin-right:0in;margin-bottom:0in;
margin-left:28.35pt;text-align:justify;line-height:16.0pt;mso-line-height-rule:
exactly;tab-stops:113.4pt dotted 510.3pt'><b style='mso-bidi-font-weight:normal'><u><span
lang=EN-US style='font-size:10.0pt;font-family:"Arial",sans-serif'>BÊN B</span></u></b><span
class=GramE><b style='mso-bidi-font-weight:normal'><span lang=EN-US
style='font-size:10.0pt;font-family:"Arial",sans-serif'><span style='mso-tab-count:
1'>                  </span></span></b><span lang=EN-US style='font-size:10.0pt;
font-family:"Arial",sans-serif'>:…</span></span><span lang=EN-US
style='font-size:10.0pt;font-family:"Arial",sans-serif'>………………………………………………………………………….……………………..
<o:p></o:p></span></p>

<p class=MsoNormal style='margin-top:0in;margin-right:0in;margin-bottom:0in;
margin-left:28.35pt;text-align:justify;line-height:16.0pt;mso-line-height-rule:
exactly;tab-stops:113.4pt dotted 510.3pt'><span lang=EN-US style='font-size:
10.0pt;font-family:"Arial",sans-serif'>Ð&#7883;a ch&#7881;<span class=GramE><span
style='mso-tab-count:1'>                  </span>:...</span>…………………………………………………………………………………………………<o:p></o:p></span></p>

<p class=MsoNormal style='margin-top:0in;margin-right:0in;margin-bottom:0in;
margin-left:28.35pt;text-align:justify;line-height:16.0pt;mso-line-height-rule:
exactly;tab-stops:113.4pt dotted 283.5pt 510.3pt'><span lang=EN-US
style='font-size:10.0pt;font-family:"Arial",sans-serif'>Ði&#7879;n tho&#7841;i<span
class=GramE><span style='mso-tab-count:1'>             </span>:…</span>…………………………….…..M&atilde;
s&#7889; thu&#7871;: …………………..…………..………….........<o:p></o:p></span></p>

<p class=MsoNormal style='margin-top:0in;margin-right:0in;margin-bottom:0in;
margin-left:28.35pt;text-align:justify;line-height:16.0pt;mso-line-height-rule:
exactly;tab-stops:113.4pt 283.5pt'><span lang=EN-US style='font-size:10.0pt;
font-family:"Arial",sans-serif'>Ð&#7883;a ch&#7881; email<span class=GramE><span
style='mso-tab-count:1'>          </span>:…</span>……………………………………….……………..…………………………………………<o:p></o:p></span></p>

<p class=MsoNormal style='margin-top:0in;margin-right:0in;margin-bottom:0in;
margin-left:28.35pt;text-align:justify;line-height:16.0pt;mso-line-height-rule:
exactly;tab-stops:113.4pt dotted 283.5pt 510.3pt'><span lang=EN-US
style='font-size:10.0pt;font-family:"Arial",sans-serif'>Ð&#7841;i ði&#7879;n<span
class=GramE><span style='mso-tab-count:1'>                </span>:…</span>…………………………………..…….Ch&#7913;c
danh:. ……………………………….………<o:p></o:p></span></p>

<p class=MsoNormal style='margin-top:0in;margin-right:0in;margin-bottom:0in;
margin-left:28.35pt;text-align:justify;line-height:10.0pt;mso-line-height-rule:
exactly;tab-stops:113.4pt dotted 283.5pt 510.3pt'><span lang=EN-US
style='font-size:10.0pt;font-family:"Arial",sans-serif'><span style='mso-tab-count:
1'>                            </span><o:p></o:p></span></p>

<p class=MsoNormal style='margin-top:6.0pt;margin-right:-.05pt;margin-bottom:
4.0pt;margin-left:28.35pt;text-align:justify'><span lang=EN-US
style='font-size:10.0pt;line-height:115%;font-family:"Arial",sans-serif'>Bên A
và Bên B </span><span style='font-size:10.0pt;line-height:115%;font-family:
"Arial",sans-serif;mso-ansi-language:VI'>ð&#7891;ng &yacute; k&yacute; </span><span
lang=EN-US style='font-size:10.0pt;line-height:115%;font-family:"Arial",sans-serif'>H</span><span
style='font-size:10.0pt;line-height:115%;font-family:"Arial",sans-serif;
mso-ansi-language:VI'>&#7907;p ð&#7891;ng </span><span lang=EN-US
style='font-size:10.0pt;line-height:115%;font-family:"Arial",sans-serif'>ð&#7841;i
l&yacute;</span><span style='font-size:10.0pt;line-height:115%;font-family:
"Arial",sans-serif;mso-ansi-language:VI'> v&#7873; vi&#7879;c mua bán s&#7843;n
ph&#7849;m v&#7899;i các</span><span style='font-size:10.0pt;line-height:115%;
font-family:"Arial",sans-serif'> </span><span style='font-size:10.0pt;
line-height:115%;font-family:"Arial",sans-serif;mso-ansi-language:VI'>ði&#7873;u</span><span
style='font-size:10.0pt;line-height:115%;font-family:"Arial",sans-serif'> </span><span
style='font-size:10.0pt;line-height:115%;font-family:"Arial",sans-serif;
mso-ansi-language:VI'>kho&#7843;n sau:</span><span style='font-size:10.0pt;
line-height:115%;font-family:"Arial",sans-serif'> </span><b style='mso-bidi-font-weight:
normal'><span style='font-size:10.0pt;line-height:115%;font-family:"Arial",sans-serif;
mso-ansi-language:VI'><o:p></o:p></span></b></p>

<p class=MsoNormal style='margin-top:6.0pt;margin-right:0in;margin-bottom:4.0pt;
margin-left:28.35pt;text-indent:-28.35pt'><b style='mso-bidi-font-weight:normal'><span
style='font-size:10.0pt;line-height:115%;font-family:"Arial",sans-serif;
mso-ansi-language:VI'>Ði&#7873;u 1</span></b><b style='mso-bidi-font-weight:
normal'><span lang=EN-US style='font-size:10.0pt;line-height:115%;font-family:
"Arial",sans-serif'>:</span></b><b style='mso-bidi-font-weight:normal'><span
style='font-size:10.0pt;line-height:115%;font-family:"Arial",sans-serif;
mso-ansi-language:VI'> PH&#7840;M VI, Ð&#7888;I TÝ&#7906;NG C&#7910;A H&#7906;P
Ð&#7890;NG</span></b><b style='mso-bidi-font-weight:normal'><span lang=EN-US
style='font-size:10.0pt;line-height:115%;font-family:"Arial",sans-serif'>.<o:p></o:p></span></b></p>

<p class=MsoListParagraphCxSpFirst style='margin-top:6.0pt;margin-right:0in;
margin-bottom:4.0pt;margin-left:28.35pt;mso-add-space:auto;text-align:justify;
text-indent:-28.35pt;mso-list:l10 level2 lfo45'><a name="_Hlk60305664"><![if !supportLists]><b
style='mso-bidi-font-weight:normal'><span lang=EN-US style='font-size:10.0pt;
line-height:115%;font-family:"Arial",sans-serif;mso-fareast-font-family:Arial'><span
style='mso-list:Ignore'>1.1<span style='font:7.0pt "Times New Roman"'>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
</span></span></span></b><![endif]><span lang=EN-US style='font-size:10.0pt;
line-height:115%;font-family:"Arial",sans-serif;color:red'>Bên B ð&#7891;ng
&yacute; v&#7899;i Bên A k&yacute; h&#7907;p ð&#7891;ng làm Ð&#7841;i l&yacute;
bán l&#7867; </span></a><span style='mso-bookmark:_Hlk60305664'><span
lang=EN-US style='font-size:10.0pt;line-height:115%;font-family:"Arial",sans-serif'>S&#7843;n
ph&#7849;m “<i style='mso-bidi-font-style:normal'>ch&#7881; bán t&#7899;i các
khách hàng là Ngý&#7901;i tiêu dùng cu&#7889;i cùng” </i>theo các ði&#7873;u ki&#7879;n
nêu t&#7841;i H&#7907;p ð&#7891;ng này, Bên B cam k&#7871;t ch&#7881; bán t&#7841;i
ð&#7883;a <span class=GramE>bàn:…</span>………………………...…………………...…...………………………………............................................
và trên Website/Fanpage thu&#7897;c qu&#7843;n l&yacute; riêng c&#7911;a Bên B,
không bao g&#7891;m các gian hàng trên các Trang thýõng m&#7841;i ði&#7879;n t&#7917;
trung gian ho&#7863;c ð&#7883;a bàn khác.</span></span><span lang=EN-US
style='font-size:10.0pt;line-height:115%;font-family:"Arial",sans-serif'><o:p></o:p></span></p>

<p class=MsoListParagraphCxSpLast style='margin-top:6.0pt;margin-right:0in;
margin-bottom:4.0pt;margin-left:28.35pt;mso-add-space:auto;text-align:justify;
text-indent:-28.35pt;mso-list:l10 level2 lfo45'><![if !supportLists]><b
style='mso-bidi-font-weight:normal'><span lang=EN-US style='font-size:10.0pt;
line-height:115%;font-family:"Arial",sans-serif;mso-fareast-font-family:Arial'><span
style='mso-list:Ignore'>1.2<span style='font:7.0pt "Times New Roman"'>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
</span></span></span></b><![endif]><span lang=EN-US style='font-size:10.0pt;
line-height:115%;font-family:"Arial",sans-serif'>Chi ti&#7871;t danh m&#7909;c
s&#7843;n ph&#7849;m, giá và chính sách bán hàng <b style='mso-bidi-font-weight:
normal'>Ph&#7909; l&#7909;c I</b><i style='mso-bidi-font-style:normal'>.</i><o:p></o:p></span></p>

<p class=MsoNormal style='margin-top:6.0pt;margin-right:0in;margin-bottom:4.0pt;
margin-left:0in;text-align:justify'><b style='mso-bidi-font-weight:normal'><span
lang=EN-US style='font-size:10.0pt;line-height:115%;font-family:"Arial",sans-serif'>Ði&#7873;u
2: Ð&#7862;T HÀNG, GIAO HÀNG VÀ THANH TOÁN<o:p></o:p></span></b></p>

<p class=MsoListParagraph style='margin-top:6.0pt;margin-right:0in;margin-bottom:
4.0pt;margin-left:28.35pt;text-align:justify;text-indent:-28.35pt;mso-list:
l17 level2 lfo11'><![if !supportLists]><b><span lang=EN-US style='font-size:
10.0pt;line-height:115%;font-family:"Arial",sans-serif;mso-fareast-font-family:
Arial'><span style='mso-list:Ignore'>2.1.<span style='font:7.0pt "Times New Roman"'>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
</span></span></span></b><![endif]><b style='mso-bidi-font-weight:normal'><span
lang=EN-US style='font-size:10.0pt;line-height:115%;font-family:"Arial",sans-serif'>Ð&#7863;t
hàng</span></b><span lang=EN-US style='font-size:10.0pt;line-height:115%;
font-family:"Arial",sans-serif'>: Khi có nhu c&#7847;u ð&#7863;t hàng, Bên B liên
h&#7879; v&#7899;i TDV t&#7841;i ð&#7883;a bàn ho&#7863;c t&#7893;ng ðài <b
style='mso-bidi-font-weight:normal'>0243 7878408</b> (máy l&#7867; 08). Trong th&#7901;i
h&#7841;n 24 gi&#7901; làm vi&#7879;c k&#7875; t&#7915; th&#7901;i ði&#7875;m
ti&#7871;p nh&#7853;n yêu c&#7847;u c&#7911;a Bên B, Bên A s&#7869; xác nh&#7853;n
l&#7841;i Ðõn hàng b&#7857;ng h&igrave;nh th&#7913;c tin nh&#7855;n/email thông
qua s&#7889; ði&#7879;n tho&#7841;i/email Bên B dùng ð&#7875; liên h&#7879;.<b
style='mso-bidi-font-weight:normal'><o:p></o:p></b></span></p>

<p class=MsoListParagraph style='margin-top:6.0pt;margin-right:0in;margin-bottom:
4.0pt;margin-left:28.35pt;text-align:justify;text-indent:-28.35pt;mso-list:
l17 level2 lfo11'><![if !supportLists]><b><span lang=EN-US style='font-size:
10.0pt;line-height:115%;font-family:"Arial",sans-serif;mso-fareast-font-family:
Arial'><span style='mso-list:Ignore'>2.2.<span style='font:7.0pt "Times New Roman"'>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
</span></span></span></b><![endif]><b style='mso-bidi-font-weight:normal'><span
lang=EN-US style='font-size:10.0pt;line-height:115%;font-family:"Arial",sans-serif'>Giao
hàng</span></b><span lang=EN-US style='font-size:10.0pt;line-height:115%;
font-family:"Arial",sans-serif'>: Trý&#7899;c khi giao hàng, Bên A s&#7869;
thông báo ð&#7871;n Bên B th&#7901;i gian d&#7921; ki&#7871;n giao hàng. Khi nh&#7853;n
hàng Bên B c&#7847;n ki&#7875;m tra: S&#7889; lý&#7907;ng, ch&#7911;ng lo&#7841;i,
tr&#7883; giá, quy&#7873;n l&#7907;i (n&#7871;u có), ba</span><span lang=NL
style='font-size:10.0pt;line-height:115%;font-family:"Arial",sans-serif;
mso-ansi-language:NL'>o b&igrave; nguyên v&#7865;n, không b&#7883; móp méo, &#7849;m
ý&#7899;t.... Trý&#7901;ng h&#7907;p n&#7871;u phát hi&#7879;n b&#7845;t k&#7923;
thi&#7871;u sót nào ph&#7843;i xác nh&#7853;n v&#7899;i bên Giao v&#7853;n và
thông báo ngay cho Bên A ð&#7875; ph&#7889;i h&#7907;p x&#7917; l&yacute;, quá
24 gi&#7901; k&#7875; t&#7915; khi nh&#7853;n hàng Bên A không ch&#7845;p nh&#7853;n
các khi&#7871;u n&#7841;i liên quan</span><span lang=SV style='font-size:10.0pt;
line-height:115%;font-family:"Arial",sans-serif;mso-ansi-language:SV'>.</span><span
lang=SV style='font-size:10.0pt;line-height:115%;font-family:"Arial",sans-serif'>
</span><span lang=EN-US style='font-size:10.0pt;line-height:115%;font-family:
"Arial",sans-serif'>N&#7871;u Bên B t&#7915; ch&#7889;i nh&#7853;n ðõn hàng mà
không ch&#7913;ng minh ðý&#7907;c nguyên nhân do Bên A vi ph&#7841;m ðý&#7907;c
xem nhý h&#7911;y ngang ðõn hàng và m&#7885;i chi phí giao hàng Bên B ch&#7883;u
trách nhi&#7879;m. <b style='mso-bidi-font-weight:normal'><o:p></o:p></b></span></p>

<p class=MsoListParagraph style='margin-top:6.0pt;margin-right:0in;margin-bottom:
4.0pt;margin-left:28.35pt;text-align:justify;text-indent:-28.35pt;mso-list:
l17 level2 lfo11'><![if !supportLists]><b><span lang=EN-US style='font-size:
10.0pt;line-height:115%;font-family:"Arial",sans-serif;mso-fareast-font-family:
Arial'><span style='mso-list:Ignore'>2.3.<span style='font:7.0pt "Times New Roman"'>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
</span></span></span></b><![endif]><b style='mso-bidi-font-weight:normal'><span
lang=EN-US style='font-size:10.0pt;line-height:115%;font-family:"Arial",sans-serif'>Thanh
Toán: </span></b><span lang=EN-US style='font-size:10.0pt;line-height:115%;
font-family:"Arial",sans-serif'>Bên B ph&#7843;i thanh toán ngay cho Bên A 100%
giá tr&#7883; ðõn hàng ho&#7863;c thanh toán chuy&#7875;n kho&#7843;n trý&#7899;c
cho Bên A.<b style='mso-bidi-font-weight:normal'><o:p></o:p></b></span></p>

<p class=MsoNormal style='margin-top:6.0pt;margin-right:0in;margin-bottom:4.0pt;
margin-left:0in;text-align:justify'><b style='mso-bidi-font-weight:normal'><span
lang=EN-US style='font-size:10.0pt;line-height:115%;font-family:"Arial",sans-serif'>Ði&#7873;u
3: Ð&#7892;I TR&#7842; HÀNG HÓA<o:p></o:p></span></b></p>

<p class=MsoListParagraphCxSpFirst style='margin-top:6.0pt;margin-right:0in;
margin-bottom:4.0pt;margin-left:28.35pt;mso-add-space:auto;text-align:justify;
text-indent:-28.35pt;mso-list:l37 level2 lfo34'><![if !supportLists]><b
style='mso-bidi-font-weight:normal'><span lang=EN-US style='font-size:10.0pt;
line-height:115%;font-family:"Arial",sans-serif;mso-fareast-font-family:Arial'><span
style='mso-list:Ignore'>3.1<span style='font:7.0pt "Times New Roman"'>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
</span></span></span></b><![endif]><span lang=EN-US style='font-size:10.0pt;
line-height:115%;font-family:"Arial",sans-serif'>Khi có v&#7845;n ð&#7873; liên
quan ð&#7871;n ð&#7893;i tr&#7843; hàng hay các v&#7845;n ð&#7873; th&#7855;c m&#7855;c,
Bên B liên h&#7879; v&#7899;i TDV ð&#7883;a bàn ho&#7863;c Công ty qua s&#7889;
ði&#7879;n tho&#7841;i <b style='mso-bidi-font-weight:normal'>0243 7878408</b>
(máy l&#7867; 08).<o:p></o:p></span></p>

<p class=MsoListParagraph style='margin-top:6.0pt;margin-right:0in;margin-bottom:
4.0pt;margin-left:28.35pt;text-align:justify;text-indent:-28.35pt;mso-list:
l37 level2 lfo34'><![if !supportLists]><b style='mso-bidi-font-weight:normal'><span
style='font-size:10.0pt;line-height:115%;font-family:"Arial",sans-serif;
mso-fareast-font-family:Arial;mso-ansi-language:VI'><span style='mso-list:Ignore'>3.2<span
style='font:7.0pt "Times New Roman"'>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; </span></span></span></b><![endif]><span
style='font-size:10.0pt;line-height:115%;font-family:"Arial",sans-serif;
mso-ansi-language:VI'>Bên </span><span lang=EN-US style='font-size:10.0pt;
line-height:115%;font-family:"Arial",sans-serif'>B</span><span
style='font-size:10.0pt;line-height:115%;font-family:"Arial",sans-serif;
mso-ansi-language:VI'> ðý&#7907;c quy&#7873;n ð&#7893;i, tr&#7843; S&#7843;n Ph&#7849;m
L&#7895;i trong các trý&#7901;ng h&#7907;p sau: <o:p></o:p></span></p>

<p class=MsoListParagraph style='margin-top:6.0pt;margin-right:0in;margin-bottom:
4.0pt;margin-left:28.35pt;text-align:justify'><span lang=SV style='font-size:
10.0pt;line-height:115%;font-family:"Arial",sans-serif;mso-ansi-language:SV;
mso-bidi-font-style:italic'>Bên B phát hi&#7879;n nh&#7919;ng l&#7895;i và/ho&#7863;c
nh&#7919;ng sai sót c&#7911;a S&#7843;n Ph&#7849;m (do l&#7895;i c&#7911;a Bên
A ho&#7863;c nhà s&#7843;n xu&#7845;t). Trong trý&#7901;ng h&#7907;p l&#7895;i
do nhà s&#7843;n xu&#7845;t, b&#7857;ng chi phí c&#7911;a m&igrave;nh </span><span
style='font-size:10.0pt;line-height:115%;font-family:"Arial",sans-serif;
mso-ansi-language:VI;mso-bidi-font-style:italic'>Bên </span><span lang=EN-US
style='font-size:10.0pt;line-height:115%;font-family:"Arial",sans-serif;
mso-bidi-font-style:italic'>A</span><span lang=SV style='font-size:10.0pt;
line-height:115%;font-family:"Arial",sans-serif;mso-ansi-language:SV;
mso-bidi-font-style:italic'> s&#7869; thay th&#7871; ho&#7863;c thu h&#7891;i s&#7889;
s&#7843;n ph&#7849;m l&#7895;i cho </span><span style='font-size:10.0pt;
line-height:115%;font-family:"Arial",sans-serif;mso-ansi-language:VI;
mso-bidi-font-style:italic'>B</span><span lang=SV style='font-size:10.0pt;
line-height:115%;font-family:"Arial",sans-serif;mso-ansi-language:SV;
mso-bidi-font-style:italic'>ên </span><span lang=EN-US style='font-size:10.0pt;
line-height:115%;font-family:"Arial",sans-serif;mso-bidi-font-style:italic'>B</span><span
lang=SV style='font-size:10.0pt;line-height:115%;font-family:"Arial",sans-serif;
mso-ansi-language:SV;mso-bidi-font-style:italic'>. Trý&#7901;ng h&#7907;p do b&#7843;o
qu&#7843;n không ðúng khuy&#7871;n cáo c&#7911;a </span><span style='font-size:
10.0pt;line-height:115%;font-family:"Arial",sans-serif;mso-ansi-language:VI;
mso-bidi-font-style:italic'>nhà s&#7843;n xu&#7845;t</span><span
style='font-size:10.0pt;line-height:115%;font-family:"Arial",sans-serif;
mso-ansi-language:SV;mso-bidi-font-style:italic'> </span><b style='mso-bidi-font-weight:
normal'><span lang=PT-BR style='font-size:10.0pt;line-height:115%;font-family:
"Arial",sans-serif;mso-ansi-language:PT-BR'>Doppelherz </span></b><span
lang=PT-BR style='font-size:10.0pt;line-height:115%;font-family:"Arial",sans-serif;
mso-ansi-language:PT-BR'>ho&#7863;c</span><span lang=PT-BR style='font-size:
10.0pt;line-height:115%;font-family:"Arial",sans-serif;mso-ansi-language:SV;
mso-bidi-font-style:italic'> </span><span style='font-size:10.0pt;line-height:
115%;font-family:"Arial",sans-serif;mso-ansi-language:VI;mso-bidi-font-style:
italic'>theo <b style='mso-bidi-font-weight:normal'>kho&#7843;n 4.2</b> c&#7911;a</span><span
lang=SV style='font-size:10.0pt;line-height:115%;font-family:"Arial",sans-serif;
mso-ansi-language:SV;mso-bidi-font-style:italic'> H&#7907;p ð&#7891;ng</span><span
style='font-size:10.0pt;line-height:115%;font-family:"Arial",sans-serif;
mso-ansi-language:VI;mso-bidi-font-style:italic'> B</span><span lang=SV
style='font-size:10.0pt;line-height:115%;font-family:"Arial",sans-serif;
mso-ansi-language:SV;mso-bidi-font-style:italic'>ên B ph&#7843;i t&#7921; ch&#7883;u
trách nhi&#7879;m.</span><span style='font-size:10.0pt;line-height:115%;
font-family:"Arial",sans-serif;mso-ansi-language:VI'><o:p></o:p></span></p>

<p class=MsoListParagraph style='margin-top:6.0pt;margin-right:0in;margin-bottom:
4.0pt;margin-left:28.35pt;text-align:justify'><span style='font-size:10.0pt;
line-height:115%;font-family:"Arial",sans-serif;mso-ansi-language:VI'>Trong trý&#7901;ng
h&#7907;p Bên </span><span lang=EN-US style='font-size:10.0pt;line-height:115%;
font-family:"Arial",sans-serif'>B</span><span style='font-size:10.0pt;
line-height:115%;font-family:"Arial",sans-serif;mso-ansi-language:VI'> ð&#7893;i,
tr&#7843; S&#7843;n Ph&#7849;m L&#7895;i Bên </span><span lang=EN-US
style='font-size:10.0pt;line-height:115%;font-family:"Arial",sans-serif'>A</span><span
style='font-size:10.0pt;line-height:115%;font-family:"Arial",sans-serif;
mso-ansi-language:VI'> s&#7869;: </span><span lang=EN-US style='font-size:10.0pt;
line-height:115%;font-family:"Arial",sans-serif'>N</span><span
style='font-size:10.0pt;line-height:115%;font-family:"Arial",sans-serif;
mso-ansi-language:VI'>h&#7853;n l&#7841;i S&#7843;n Ph&#7849;m L&#7895;i theo
[giá Bên </span><span lang=EN-US style='font-size:10.0pt;line-height:115%;
font-family:"Arial",sans-serif'>B</span><span style='font-size:10.0pt;
line-height:115%;font-family:"Arial",sans-serif;mso-ansi-language:VI'>
ð&atilde; mua t&#7915; Bên </span><span lang=EN-US style='font-size:10.0pt;
line-height:115%;font-family:"Arial",sans-serif'>A</span><span
style='font-size:10.0pt;line-height:115%;font-family:"Arial",sans-serif;
mso-ansi-language:VI'>];&nbsp;và ð&#7893;i&nbsp;S&#7843;n Ph&#7849;m L&#7895;i
t&#7841;i ð&#7883;a ði&#7875;m kinh doanh c&#7911;a Bên </span><span
lang=EN-US style='font-size:10.0pt;line-height:115%;font-family:"Arial",sans-serif'>B</span><span
style='font-size:10.0pt;line-height:115%;font-family:"Arial",sans-serif;
mso-ansi-language:VI'> trong v&ograve;n</span><span lang=EN-US
style='font-size:10.0pt;line-height:115%;font-family:"Arial",sans-serif'><w:Sdt
 DocPart="A71B23717170954CB44D030B82EA2A59" ID="-2113426977"><span lang=VI
 style='mso-ansi-language:VI'>g 15</span></w:Sdt></span><span style='font-size:
10.0pt;line-height:115%;font-family:"Arial",sans-serif;mso-ansi-language:VI'>
ngày k&#7875; t&#7915; khi Bên </span><span lang=EN-US style='font-size:10.0pt;
line-height:115%;font-family:"Arial",sans-serif'>A</span><span
style='font-size:10.0pt;line-height:115%;font-family:"Arial",sans-serif;
mso-ansi-language:VI'> nh&#7853;n ðý&#7907;c s&#7843;n ph&#7849;m tr&#7843; l&#7841;i
c&#7911;a </span><span lang=EN-US style='font-size:10.0pt;line-height:115%;
font-family:"Arial",sans-serif'>B</span><span style='font-size:10.0pt;
line-height:115%;font-family:"Arial",sans-serif;mso-ansi-language:VI'>ên </span><span
lang=EN-US style='font-size:10.0pt;line-height:115%;font-family:"Arial",sans-serif'>B</span><span
style='font-size:10.0pt;line-height:115%;font-family:"Arial",sans-serif;
mso-ansi-language:VI'>.<o:p></o:p></span></p>

<p class=MsoListParagraph style='margin-top:6.0pt;margin-right:0in;margin-bottom:
4.0pt;margin-left:28.35pt;text-align:justify'><span style='font-size:10.0pt;
line-height:115%;font-family:"Arial",sans-serif;mso-ansi-language:VI'>Bên </span><span
lang=EN-US style='font-size:10.0pt;line-height:115%;font-family:"Arial",sans-serif'>A</span><span
style='font-size:10.0pt;line-height:115%;font-family:"Arial",sans-serif;
mso-ansi-language:VI'> ð&#7891;ng &yacute; nh&#7853;n ð&#7893;i tr&#7843;</span><span
lang=EN-US style='font-size:10.0pt;line-height:115%;font-family:"Arial",sans-serif'>
ho&#7863;c thu h&#7891;i s&#7843;n ph&#7849;m thu&#7897;c chýõng tr&igrave;nh
bán hàng riêng bi&#7879;t trong ph&#7841;m vi th&#7887;a thu&#7853;n gi&#7919;a
Bên A và Bên B.<o:p></o:p></span></p>

<p class=MsoListParagraphCxSpMiddle style='margin-top:6.0pt;margin-right:0in;
margin-bottom:4.0pt;margin-left:28.35pt;mso-add-space:auto;text-align:justify;
text-indent:-28.35pt;mso-list:l37 level2 lfo34;tab-stops:28.35pt'><![if !supportLists]><b
style='mso-bidi-font-weight:normal'><span lang=PT-BR style='font-size:10.0pt;
line-height:115%;font-family:"Arial",sans-serif;mso-fareast-font-family:Arial;
mso-ansi-language:PT-BR'><span style='mso-list:Ignore'>3.3<span
style='font:7.0pt "Times New Roman"'>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; </span></span></span></b><![endif]><span
lang=PT-BR style='font-size:10.0pt;line-height:115%;font-family:"Arial",sans-serif;
mso-ansi-language:PT-BR'>Th&#7901;i gian ð&#7893;i hàng trong v&ograve;ng 30
ngày k&#7875; t&#7915; ngày Bên B nh&#7853;p hàng (chi phí ð&#7893;i Bên B ch&#7883;u)
<o:p></o:p></span></p>

<p class=MsoListParagraph style='margin-top:6.0pt;margin-right:0in;margin-bottom:
4.0pt;margin-left:28.35pt;text-align:justify;tab-stops:28.35pt'><span
lang=PT-BR style='font-size:10.0pt;line-height:115%;font-family:"Arial",sans-serif;
mso-ansi-language:PT-BR'>Ngoài các trý&#7901;ng h&#7907;p trên Bên B không ðý&#7907;c
ð&#7893;i tr&#7843;.<o:p></o:p></span></p>

<p class=MsoNormal style='margin-top:6.0pt;margin-right:0in;margin-bottom:4.0pt;
margin-left:0in;text-align:justify'><b style='mso-bidi-font-weight:normal'><span
lang=EN-US style='font-size:10.0pt;line-height:115%;font-family:"Arial",sans-serif'>Ði&#7873;u
4: TRÁCH NHI&#7878;M C&#7910;A CÁC BÊN.<o:p></o:p></span></b></p>

<p class=MsoListParagraph style='margin-top:6.0pt;margin-right:0in;margin-bottom:
4.0pt;margin-left:82.5pt;text-align:justify;text-indent:-82.5pt;mso-list:l27 level2 lfo29;
tab-stops:28.35pt'><![if !supportLists]><b style='mso-bidi-font-weight:normal'><span
lang=PT-BR style='font-size:10.0pt;line-height:115%;font-family:"Arial",sans-serif;
mso-fareast-font-family:Arial;mso-ansi-language:PT-BR'><span style='mso-list:
Ignore'>4.1.<span style='font:7.0pt "Times New Roman"'>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
</span></span></span></b><![endif]><b style='mso-bidi-font-weight:normal'><span
lang=PT-BR style='font-size:10.0pt;line-height:115%;font-family:"Arial",sans-serif;
mso-ansi-language:PT-BR'>Quy&#7873;n và trách nhi&#7879;m c&#7911;a Bên A<o:p></o:p></span></b></p>

<p class=MsoListParagraph style='margin-top:6.0pt;margin-right:0in;margin-bottom:
4.0pt;margin-left:28.35pt;text-align:justify;tab-stops:28.35pt'><span
lang=PT-BR style='font-size:10.0pt;line-height:115%;font-family:"Arial",sans-serif;
mso-ansi-language:PT-BR'>Giao hàng ð&#7847;y ð&#7911;, ðúng th&#7901;i h&#7841;n,
ð&#7883;a ði&#7875;m và cam k&#7871;t ch&#7845;t lý&#7907;ng s&#7843;n ph&#7849;m<o:p></o:p></span></p>

<p class=MsoListParagraph style='margin-top:6.0pt;margin-right:0in;margin-bottom:
4.0pt;margin-left:28.35pt;text-align:justify;tab-stops:28.35pt'><span
lang=PT-BR style='font-size:10.0pt;line-height:115%;font-family:"Arial",sans-serif;
mso-ansi-language:PT-BR'>Tr&#7843; l&#7901;i các th&#7855;c m&#7855;c v&#7873; s&#7843;n
ph&#7849;m, x&#7917; l&yacute; các khi&#7871;u n&#7841;i v&#7873; s&#7843;n ph&#7849;m
(n&#7871;u có).<o:p></o:p></span></p>

<p class=MsoListParagraph style='margin-top:6.0pt;margin-right:0in;margin-bottom:
4.0pt;margin-left:28.35pt;text-align:justify;tab-stops:28.35pt'><span
lang=PT-BR style='font-size:10.0pt;line-height:115%;font-family:"Arial",sans-serif;
mso-ansi-language:PT-BR'>Khi có chýõng tr&igrave;nh khuy&#7871;n m&#7841;i, Bên
A s&#7869; thông báo t&#7899;i Bên B trý&#7899;c 10 ngày. Ð&#7891;ng th&#7901;i
Bên A không có trách nhi&#7879;m b&#7893; sung quy&#7873;n l&#7907;i cho Bên B
ð&#7889;i v&#7899;i nh&#7919;ng ðõn hàng phát sinh trý&#7899;c th&#7901;i ði&#7875;m
thông báo.<o:p></o:p></span></p>

<p class=MsoListParagraph style='margin-top:6.0pt;margin-right:0in;margin-bottom:
4.0pt;margin-left:82.5pt;text-align:justify;text-indent:-82.5pt;mso-list:l27 level2 lfo29;
tab-stops:28.35pt'><![if !supportLists]><b style='mso-bidi-font-weight:normal'><span
lang=PT-BR style='font-size:10.0pt;line-height:115%;font-family:"Arial",sans-serif;
mso-fareast-font-family:Arial;mso-ansi-language:PT-BR'><span style='mso-list:
Ignore'>4.2.<span style='font:7.0pt "Times New Roman"'>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
</span></span></span></b><![endif]><b style='mso-bidi-font-weight:normal'><span
lang=PT-BR style='font-size:10.0pt;line-height:115%;font-family:"Arial",sans-serif;
mso-ansi-language:PT-BR'>Quy&#7873;n và trách nhi&#7879;m c&#7911;a Bên B<o:p></o:p></span></b></p>

<p class=MsoNormal style='margin-top:6.0pt;margin-right:0in;margin-bottom:4.0pt;
margin-left:0in;text-align:justify;tab-stops:28.35pt'><b style='mso-bidi-font-weight:
normal'><span lang=PT-BR style='font-size:10.0pt;line-height:115%;font-family:
"Arial",sans-serif;mso-ansi-language:PT-BR'><span style='mso-tab-count:1'>          </span>-
</span></b><span lang=PT-BR style='font-size:10.0pt;line-height:115%;
font-family:"Arial",sans-serif;mso-ansi-language:PT-BR;mso-bidi-font-weight:
bold'>Bên B có trách nhi&#7879;m cung c&#7845;p gi&#7845;y ðãng k&yacute; kinh
doanh, m&atilde; s&#7889; thu&#7871;, email ðãng k&yacute; v&#7899;i c&#7909;c
thu&#7871; ð&#7847;y ð&#7911;.<o:p></o:p></span></p>

<p class=MsoListParagraph style='margin-top:6.0pt;margin-right:0in;margin-bottom:
4.0pt;margin-left:28.35pt;text-align:justify;tab-stops:28.35pt'><span
lang=PT-BR style='font-size:10.0pt;line-height:115%;font-family:"Arial",sans-serif;
mso-ansi-language:PT-BR'>S&#7843;n ph&#7849;m ðý&#7907;c b&#7843;o qu&#7843;n &#7903;
nhi&#7879;t ð&#7897; dý&#7899;i <b style='mso-bidi-font-weight:normal'>25 ð&#7897;
C</b> trong su&#7889;t quá tr&igrave;nh t&#7915; khi nh&#7853;p ð&#7871;n khi
xu&#7845;t hàng; <o:p></o:p></span></p>

<p class=MsoListParagraph style='margin-top:6.0pt;margin-right:0in;margin-bottom:
4.0pt;margin-left:28.35pt;text-align:justify;tab-stops:28.35pt'><span
lang=PT-BR style='font-size:10.0pt;line-height:115%;font-family:"Arial",sans-serif;
mso-ansi-language:PT-BR'>Bên B cam k&#7871;t ch&#7881; bán hàng chính
h&atilde;ng <b style='mso-bidi-font-weight:normal'>Doppelherz</b>, ðý&#7907;c
phân ph&#7889;i tr&#7921;c ti&#7871;p t&#7915; bên A.<o:p></o:p></span></p>

<p class=MsoListParagraph style='margin-top:6.0pt;margin-right:0in;margin-bottom:
4.0pt;margin-left:28.35pt;text-align:justify;tab-stops:28.35pt'><span
lang=PT-BR style='font-size:10.0pt;line-height:115%;font-family:"Arial",sans-serif;
mso-ansi-language:PT-BR'>- Bên B có quy&#7873;n ðý&#7907;c s&#7917; d&#7909;ng
thýõng hi&#7879;u ð&#7875; qu&#7843;ng bá, tý v&#7845;n các s&#7843;n ph&#7849;m
<b style='mso-bidi-font-weight:normal'>Doppelherz</b> trên ph&#7841;m vi<b
style='mso-bidi-font-weight:normal'> Ði&#7873;u 1</b>. Bên B không ðý&#7907;c
quy&#7873;n &#7911;y l&#7841;i cho bên th&#7913; 3 ðý&#7907;c s&#7917; d&#7909;ng
thýõng hi&#7879;u <b style='mso-bidi-font-weight:normal'>Doppelherz</b>.<o:p></o:p></span></p>

<p class=MsoListParagraph style='margin-top:6.0pt;margin-right:0in;margin-bottom:
4.0pt;margin-left:28.35pt;text-align:justify;tab-stops:28.35pt'><span
lang=PT-BR style='font-size:10.0pt;line-height:115%;font-family:"Arial",sans-serif;
mso-ansi-language:PT-BR'>- M&#7885;i ngh&#297;a v&#7909; phát sinh liên quan ð&#7871;n
quy ð&#7883;nh v&#7873; thu&#7871; do Bên B ch&#7883;u trách nhi&#7879;m.<o:p></o:p></span></p>

<p class=MsoNormal style='margin-top:6.0pt;margin-right:0in;margin-bottom:4.0pt;
margin-left:0in;text-align:justify'><b style='mso-bidi-font-weight:normal'><span
lang=PT-BR style='font-size:10.0pt;line-height:115%;font-family:"Arial",sans-serif;
mso-ansi-language:PT-BR'>Ði&#7873;u 5: X&#7916; L&Yacute; TRÝ&#7900;NG H&#7906;P
VI PH&#7840;M H&#7906;P Ð&#7890;NG VÀ CH&#7844;M D&#7912;T H&#7906;P Ð&#7890;NG.<o:p></o:p></span></b></p>

<p class=MsoListParagraph style='margin-top:6.0pt;margin-right:0in;margin-bottom:
4.0pt;margin-left:28.35pt;text-align:justify;text-indent:-28.35pt;mso-list:
l21 level2 lfo30'><![if !supportLists]><b style='mso-bidi-font-weight:normal'><span
lang=EN-US style='font-size:10.0pt;line-height:115%;font-family:"Arial",sans-serif;
mso-fareast-font-family:Arial'><span style='mso-list:Ignore'>5.1<span
style='font:7.0pt "Times New Roman"'>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; </span></span></span></b><![endif]><span
lang=EN-US style='font-size:10.0pt;line-height:115%;font-family:"Arial",sans-serif'>Bên
A có quy&#7873;n ðõn phýõng ch&#7845;m d&#7913;t H&#7907;p ð&#7891;ng trong trý&#7901;ng
h&#7907;p </span><span lang=PT-BR style='font-size:10.0pt;line-height:115%;
font-family:"Arial",sans-serif;mso-ansi-language:PT-BR'>Bên B </span><span
lang=EN-US style='font-size:10.0pt;line-height:115%;font-family:"Arial",sans-serif'>vi
ph&#7841;m b&#7845;t c&#7913; ði&#7873;u kho&#7843;n nào c&#7911;a H&#7907;p ð&#7891;ng,
bao g&#7891;m nhýng không gi&#7899;i h&#7841;n các trý&#7901;ng h&#7907;p sau:<b
style='mso-bidi-font-weight:normal'><o:p></o:p></b></span></p>

<p class=MsoListParagraphCxSpMiddle style='margin-top:6.0pt;margin-right:0in;
margin-bottom:4.0pt;margin-left:42.55pt;mso-add-space:auto;text-align:justify;
text-indent:-14.2pt;mso-list:l20 level1 lfo41'><![if !supportLists]><span
lang=PT style='font-size:10.0pt;line-height:115%;font-family:Symbol;mso-fareast-font-family:
Symbol;mso-bidi-font-family:Symbol;color:red;mso-ansi-language:PT'><span
style='mso-list:Ignore'>-<span style='font:7.0pt "Times New Roman"'>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
</span></span></span><![endif]><span lang=EN-US style='font-size:10.0pt;
line-height:115%;font-family:"Arial",sans-serif;color:red'>Bên B </span><span
lang=PT style='font-size:10.0pt;line-height:115%;font-family:"Arial",sans-serif;
color:red;mso-ansi-language:PT'>bán buôn S&#7843;n ph&#7849;m cho khách hàng
khác s&#7917; d&#7909;ng vào m&#7909;c ðích thýõng m&#7841;i bán l&#7841;i ho&#7863;c
bán ra ngoài ð&#7883;a bàn vi ph&#7841;m </span><b style='mso-bidi-font-weight:
normal'><span lang=PT-BR style='font-size:10.0pt;line-height:115%;font-family:
"Arial",sans-serif;color:red;mso-ansi-language:PT-BR'>kho&#7843;n 1.1</span></b><span
lang=PT-BR style='font-size:10.0pt;line-height:115%;font-family:"Arial",sans-serif;
color:red;mso-ansi-language:PT-BR'> <b style='mso-bidi-font-weight:normal'>Ði&#7873;u
1 </b>c&#7911;a H&#7907;p ð&#7891;ng</span><span lang=PT style='font-size:10.0pt;
line-height:115%;font-family:"Arial",sans-serif;color:red;mso-ansi-language:
PT'>.<o:p></o:p></span></p>

<p class=MsoListParagraphCxSpMiddle style='margin-top:6.0pt;margin-right:0in;
margin-bottom:4.0pt;margin-left:42.55pt;mso-add-space:auto;text-align:justify;
text-indent:-14.2pt;mso-list:l20 level1 lfo41'><![if !supportLists]><span
lang=PT style='font-size:10.0pt;line-height:115%;font-family:Symbol;mso-fareast-font-family:
Symbol;mso-bidi-font-family:Symbol;mso-ansi-language:PT'><span
style='mso-list:Ignore'>-<span style='font:7.0pt "Times New Roman"'>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
</span></span></span><![endif]><span lang=PT style='font-size:10.0pt;
line-height:115%;font-family:"Arial",sans-serif;color:red;mso-ansi-language:
PT'>Bên B bán s&#7843;n ph&#7849;m t&#7899;i khách hàng th&#7845;p hõn giá bán
l&#7867; t&#7889;i thi&#7875;u mà Bên A quy ð&#7883;nh t&#7841;i Ph&#7909; L&#7909;c
I</span><span lang=PT style='font-size:10.0pt;line-height:115%;font-family:
"Arial",sans-serif;mso-ansi-language:PT'>;<o:p></o:p></span></p>

<p class=MsoListParagraph style='margin-top:6.0pt;margin-right:0in;margin-bottom:
4.0pt;margin-left:28.35pt;text-align:justify;text-indent:-28.35pt;mso-list:
l5 level2 lfo31'><![if !supportLists]><b style='mso-bidi-font-weight:normal'><span
lang=PT style='font-size:10.0pt;line-height:115%;font-family:"Arial",sans-serif;
mso-fareast-font-family:Arial;mso-ansi-language:PT'><span style='mso-list:Ignore'>5.2.<span
style='font:7.0pt "Times New Roman"'>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; </span></span></span></b><![endif]><span
lang=PT style='font-size:10.0pt;line-height:115%;font-family:"Arial",sans-serif;
mso-ansi-language:PT'>Bên B ch&#7845;m d&#7913;t H&#7907;p ð&#7891;ng, m&#7885;i
quy&#7873;n l&#7907;i c&#7911;a </span><span lang=EN-US style='font-size:10.0pt;
line-height:115%;font-family:"Arial",sans-serif'>Bên B</span><span lang=PT
style='font-size:10.0pt;line-height:115%;font-family:"Arial",sans-serif;
mso-ansi-language:PT'>, k&#7875; c&#7843; các quy&#7873;n l&#7907;i chýa thanh
toán b&#7883; h&#7911;y b&#7887;. <b style='mso-bidi-font-weight:normal'><o:p></o:p></b></span></p>

<p class=MsoListParagraph style='margin-top:6.0pt;margin-right:0in;margin-bottom:
4.0pt;margin-left:22.5pt;text-align:justify;text-indent:-22.5pt'><b
style='mso-bidi-font-weight:normal'><span lang=EN-US style='font-size:10.0pt;
line-height:115%;font-family:"Arial",sans-serif'>Ði&#7873;u 6: </span></b><b
style='mso-bidi-font-weight:normal'><span lang=PT style='font-size:10.0pt;
line-height:115%;font-family:"Arial",sans-serif;mso-ansi-language:PT'>ÐI&#7872;U
KHO&#7842;N CHUNG.<o:p></o:p></span></b></p>

<p class=MsoListParagraph style='margin-top:6.0pt;margin-right:0in;margin-bottom:
4.0pt;margin-left:28.35pt;text-align:justify;text-indent:-28.35pt;mso-list:
l15 level2 lfo32'><![if !supportLists]><b style='mso-bidi-font-weight:normal'><span
lang=EN-US style='font-size:10.0pt;line-height:115%;font-family:"Arial",sans-serif;
mso-fareast-font-family:Arial'><span style='mso-list:Ignore'>6.1.<span
style='font:7.0pt "Times New Roman"'>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; </span></span></span></b><![endif]><span
lang=EN-US style='font-size:10.0pt;line-height:115%;font-family:"Arial",sans-serif'>Hai
bên cam k&#7871;t n&#7895; l&#7921;c th&#7921;c hi&#7879;n các ði&#7873;u kho&#7843;n
trong h&#7907;p ð&#7891;ng này. N&#7871;u có b&#7845;t c&#7913; tranh ch&#7845;p
nào phát sinh mà không th&#7875; gi&#7843;i quy&#7871;t thông qua h&ograve;a gi&#7843;i,
thýõng lý&#7907;ng gi&#7919;a các bên trong v&ograve;ng 30 ngày k&#7875; t&#7915;
khi b&#7855;t ð&#7847;u th&#7843;o lu&#7853;n, th&igrave; tranh ch&#7845;p ðó
có th&#7875; ðý&#7907;c m&#7897;t trong các bên tr&igrave;nh lên các T&ograve;a
án có th&#7849;m quy&#7873;n c&#7911;a Vi&#7879;t Nam ð&#7875; gi&#7843;i quy&#7871;t.
Bên thua ki&#7879;n s&#7869; ch&#7883;u toàn b&#7897; các chi phí liên quan.<o:p></o:p></span></p>

<p class=MsoListParagraph style='margin-top:6.0pt;margin-right:0in;margin-bottom:
4.0pt;margin-left:28.35pt;text-align:justify;text-indent:-28.35pt;mso-list:
l15 level2 lfo32'><![if !supportLists]><b style='mso-bidi-font-weight:normal'><span
lang=EN-US style='font-size:10.0pt;line-height:115%;font-family:"Arial",sans-serif;
mso-fareast-font-family:Arial'><span style='mso-list:Ignore'>6.2.<span
style='font:7.0pt "Times New Roman"'>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; </span></span></span></b><![endif]><span
style='font-size:10.0pt;line-height:115%;font-family:"Arial",sans-serif;
mso-ansi-language:VI'>H&#7907;p Ð&#7891;ng này có hi&#7879;u l&#7921;c k&#7875;
t&#7915; ngày k&yacute; ð&#7871;n h&#7871;t ngày </span><span lang=EN-US
style='font-size:10.0pt;line-height:115%;font-family:"Arial",sans-serif'><w:Sdt
 DocPart="8C3F1D8D023D450F9AA27F843ABCA569" ID="-233250668"><w:Sdt
  DocPart="2B2C4A076D364177850ED605391D2D2A" ID="-228395965"><span lang=VI
  style='mso-ansi-language:VI'>.......</span>..<span lang=VI style='mso-ansi-language:
  VI'>./......</span>..<span lang=VI style='mso-ansi-language:VI'>./202</span>2</w:Sdt></w:Sdt>.
<b style='mso-bidi-font-weight:normal'><i style='mso-bidi-font-style:normal'>Khi
k&#7871;t th&#7913;c h&#7907;p ð&#7891;ng n&#7871;u hai bên không thông báo
thay ð&#7893;i hi&#7879;u l&#7921;c h&#7907;p ð&#7891;ng th&igrave; H&#7907;p ð&#7891;ng
s&#7869; t&#7921; ð&#7897;ng ðý&#7907;c gia h&#7841;n</i></b>. <o:p></o:p></span></p>

<p class=MsoListParagraph style='margin-top:6.0pt;margin-right:0in;margin-bottom:
4.0pt;margin-left:28.35pt;text-align:justify;text-indent:-28.35pt;mso-list:
l15 level2 lfo32'><![if !supportLists]><b style='mso-bidi-font-weight:normal'><span
lang=EN-US style='font-size:10.0pt;line-height:115%;font-family:"Arial",sans-serif;
mso-fareast-font-family:Arial'><span style='mso-list:Ignore'>6.3.<span
style='font:7.0pt "Times New Roman"'>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; </span></span></span></b><![endif]><span
lang=EN-US style='font-size:10.0pt;line-height:115%;font-family:"Arial",sans-serif'>H&#7907;p
ð&#7891;ng ðý&#7907;c l&#7853;p thành 02 b&#7843;n có giá tr&#7883; pháp
l&yacute; nhý nhau, m&#7895;i bên gi&#7919; 01 b&#7843;n làm cãn c&#7913; th&#7921;c
hi&#7879;n<o:p></o:p></span></p>

<div align=center>

<table class=MsoNormalTable border=0 cellspacing=0 cellpadding=0
 style='border-collapse:collapse;mso-yfti-tbllook:1184;mso-padding-alt:0in 5.4pt 0in 5.4pt'>
 <tr style='mso-yfti-irow:0;mso-yfti-firstrow:yes;mso-yfti-lastrow:yes'>
  <td width=321 valign=top style='width:240.6pt;padding:0in 5.4pt 0in 5.4pt'>
  <p class=MsoNormal align=center style='margin-bottom:0in;text-align:center;
  line-height:120%'><b style='mso-bidi-font-weight:normal'><span lang=EN-US
  style='font-size:8.0pt;mso-bidi-font-size:10.0pt;line-height:120%;font-family:
  "Arial",sans-serif'><o:p>&nbsp;</o:p></span></b></p>
  <p class=MsoNormal align=center style='margin-bottom:0in;text-align:center;
  line-height:120%'><b style='mso-bidi-font-weight:normal'><span lang=EN-US
  style='font-size:10.0pt;line-height:120%;font-family:"Arial",sans-serif'>Ð&#7840;I
  DI&#7878;N BÊN A<o:p></o:p></span></b></p>
  </td>
  <td width=321 valign=top style='width:240.45pt;padding:0in 5.4pt 0in 5.4pt'>
  <p class=MsoNormal align=center style='margin-bottom:0in;text-align:center;
  line-height:120%'><b style='mso-bidi-font-weight:normal'><span lang=EN-US
  style='font-size:8.0pt;mso-bidi-font-size:10.0pt;line-height:120%;font-family:
  "Arial",sans-serif'><o:p>&nbsp;</o:p></span></b></p>
  <p class=MsoNormal align=center style='margin-bottom:0in;text-align:center;
  line-height:120%'><b style='mso-bidi-font-weight:normal'><span lang=EN-US
  style='font-size:10.0pt;line-height:120%;font-family:"Arial",sans-serif'>Ð&#7840;I
  DI&#7878;N BÊN B<o:p></o:p></span></b></p>
  </td>
 </tr>
</table>

</div>

<p class=MsoNormal align=center style='margin-bottom:0in;text-align:center;
line-height:16.0pt;mso-line-height-rule:exactly;tab-stops:354.4pt'><b
style='mso-bidi-font-weight:normal'><span lang=EN-US style='font-family:"Arial",sans-serif'><o:p>&nbsp;</o:p></span></b></p>

<p class=MsoNormal align=center style='margin-bottom:0in;text-align:center;
line-height:16.0pt;mso-line-height-rule:exactly;tab-stops:354.4pt'><b
style='mso-bidi-font-weight:normal'><span lang=EN-US style='font-family:"Arial",sans-serif'><o:p>&nbsp;</o:p></span></b></p>

<p class=MsoNormal style='margin-bottom:0in;line-height:16.0pt;mso-line-height-rule:
exactly;tab-stops:354.4pt'><b style='mso-bidi-font-weight:normal'><span
lang=EN-US style='font-family:"Arial",sans-serif'><o:p>&nbsp;</o:p></span></b></p>

<p class=MsoNormal style='margin-bottom:0in;line-height:16.0pt;mso-line-height-rule:
exactly;tab-stops:354.4pt'><b style='mso-bidi-font-weight:normal'><span
lang=EN-US style='font-size:12.0pt;font-family:"Arial",sans-serif'><span
style='mso-spacerun:yes'>                                                             
</span>PH&#7908; L&#7908;C I.<o:p></o:p></span></b></p>

<p class=MsoNormal align=center style='margin-bottom:0in;text-align:center;
line-height:120%'><b style='mso-bidi-font-weight:normal'><span lang=EN-US
style='font-family:"Arial",sans-serif'>DANH M&#7908;C S&#7842;N PH&#7848;M <span
style='color:black;mso-themecolor:text1'>VÀ CHÍNH SÁCH BÁN HÀNG<o:p></o:p></span></span></b></p>

<table class=MsoNormalTable border=0 cellspacing=0 cellpadding=0 width=700
 style='width:525.2pt;border-collapse:collapse;mso-yfti-tbllook:1184;
 mso-padding-alt:0in 5.4pt 0in 5.4pt'>
 <tr style='mso-yfti-irow:0;mso-yfti-firstrow:yes;height:43.8pt'>
  <td width=38 style='width:28.45pt;border:solid windowtext 1.0pt;padding:0in 5.4pt 0in 5.4pt;
  height:43.8pt'>
  <p class=MsoNormal align=center style='margin-bottom:0in;text-align:center;
  line-height:normal'><b><span lang=EN-US style='font-size:10.0pt;font-family:
  "Arial",sans-serif;mso-fareast-font-family:"Times New Roman";color:black'>S&#7889;<br>
  TT<o:p></o:p></span></b></p>
  </td>
  <td width=54 style='width:40.65pt;border:solid windowtext 1.0pt;border-left:
  none;padding:0in 5.4pt 0in 5.4pt;height:43.8pt'>
  <p class=MsoNormal align=center style='margin-bottom:0in;text-align:center;
  line-height:normal'><b><span lang=EN-US style='font-size:10.0pt;font-family:
  "Arial",sans-serif;mso-fareast-font-family:"Times New Roman";color:black'>Nhóm
  s&#7843;n ph&#7849;m<o:p></o:p></span></b></p>
  </td>
  <td width=452 style='width:338.8pt;border:solid windowtext 1.0pt;border-left:
  none;padding:0in 5.4pt 0in 5.4pt;height:43.8pt'>
  <p class=MsoNormal align=center style='margin-bottom:0in;text-align:center;
  line-height:normal'><b><span lang=EN-US style='font-size:10.0pt;font-family:
  "Arial",sans-serif;mso-fareast-font-family:"Times New Roman";color:black'>Tên
  s&#7843;n ph&#7849;m<o:p></o:p></span></b></p>
  </td>
  <td width=78 style='width:58.65pt;border:solid windowtext 1.0pt;border-left:
  none;padding:0in 5.4pt 0in 5.4pt;height:43.8pt'>
  <p class=MsoNormal align=center style='margin-bottom:0in;text-align:center;
  line-height:normal'><b><span lang=EN-US style='font-size:10.0pt;font-family:
  "Arial",sans-serif;mso-fareast-font-family:"Times New Roman";color:black'><span
  style='mso-spacerun:yes'> </span>Giá trý&#7899;c VAT<br>
  (VNÐ/h&#7897;p) <o:p></o:p></span></b></p>
  </td>
  <td width=78 style='width:58.65pt;border:solid windowtext 1.0pt;border-left:
  none;padding:0in 5.4pt 0in 5.4pt;height:43.8pt'>
  <p class=MsoNormal align=center style='margin-bottom:0in;text-align:center;
  line-height:normal'><b><span lang=EN-US style='font-size:10.0pt;font-family:
  "Arial",sans-serif;mso-fareast-font-family:"Times New Roman";color:black'><span
  style='mso-spacerun:yes'> </span>Giá niêm y&#7871;t <br>
  (VNÐ/h&#7897;p) <o:p></o:p></span></b></p>
  </td>
 </tr>
 <tr style='mso-yfti-irow:1;page-break-inside:avoid;height:15.8pt'>
  <td width=38 style='width:28.45pt;border:solid windowtext 1.0pt;border-top:
  none;padding:0in 5.4pt 0in 5.4pt;height:15.8pt'>
  <p class=MsoNormal align=center style='margin-bottom:0in;text-align:center;
  line-height:normal'><span lang=EN-US style='font-size:10.0pt;font-family:
  "Arial",sans-serif;mso-fareast-font-family:"Times New Roman";color:black'>1<o:p></o:p></span></p>
  </td>
  <td width=54 rowspan=4 style='width:40.65pt;border-top:none;border-left:none;
  border-bottom:solid black 1.0pt;border-right:solid windowtext 1.0pt;
  mso-border-left-alt:solid windowtext 1.0pt;padding:0in 5.4pt 0in 5.4pt;
  height:15.8pt'>
  <p class=MsoNormal align=center style='margin-bottom:0in;text-align:center;
  line-height:normal'><b><span lang=EN-US style='font-size:10.0pt;font-family:
  "Arial",sans-serif;mso-fareast-font-family:"Times New Roman";color:black'>S&#7843;n
  ph&#7849;m truy&#7873;n thông<o:p></o:p></span></b></p>
  </td>
  <td width=452 style='width:338.8pt;border-top:none;border-left:none;
  border-bottom:solid windowtext 1.0pt;border-right:solid windowtext 1.0pt;
  padding:0in 5.4pt 0in 5.4pt;height:15.8pt'>
  <p class=MsoNormal style='margin-bottom:0in;text-align:justify;line-height:
  normal'><b><span lang=EN-US style='font-size:10.0pt;font-family:"Arial",sans-serif;
  mso-fareast-font-family:"Times New Roman";color:black'>Vital Pregna</span></b><span
  lang=EN-US style='font-size:10.0pt;font-family:"Arial",sans-serif;mso-fareast-font-family:
  "Times New Roman";color:black'>: B&#7893; bà b&#7847;u (H&#7897;p 3 v&#7881;
  * 10 viên)<b><o:p></o:p></b></span></p>
  </td>
  <td width=78 nowrap style='width:58.65pt;border-top:none;border-left:none;
  border-bottom:solid windowtext 1.0pt;border-right:solid windowtext 1.0pt;
  padding:0in 5.4pt 0in 5.4pt;height:15.8pt'>
  <p class=MsoNormal align=right style='margin-bottom:0in;text-align:right;
  line-height:normal'><span lang=EN-US style='font-size:10.0pt;font-family:
  "Arial",sans-serif;mso-fareast-font-family:"Times New Roman";color:black'><span
  style='mso-spacerun:yes'>      </span>300.000 <o:p></o:p></span></p>
  </td>
  <td width=78 style='width:58.65pt;border-top:none;border-left:none;
  border-bottom:solid windowtext 1.0pt;border-right:solid windowtext 1.0pt;
  padding:0in 5.4pt 0in 5.4pt;height:15.8pt'>
  <p class=MsoNormal align=right style='margin-bottom:0in;text-align:right;
  line-height:normal'><span lang=EN-US style='font-size:10.0pt;font-family:
  "Arial",sans-serif;mso-fareast-font-family:"Times New Roman";color:black'><span
  style='mso-spacerun:yes'>      </span>330.000 <o:p></o:p></span></p>
  </td>
 </tr>
 <tr style='mso-yfti-irow:2;page-break-inside:avoid;height:15.8pt'>
  <td width=38 style='width:28.45pt;border:solid windowtext 1.0pt;border-top:
  none;padding:0in 5.4pt 0in 5.4pt;height:15.8pt'>
  <p class=MsoNormal align=center style='margin-bottom:0in;text-align:center;
  line-height:normal'><span lang=EN-US style='font-size:10.0pt;font-family:
  "Arial",sans-serif;mso-fareast-font-family:"Times New Roman";color:black'>2<o:p></o:p></span></p>
  </td>
  <td width=452 style='width:338.8pt;border-top:none;border-left:none;
  border-bottom:solid windowtext 1.0pt;border-right:solid windowtext 1.0pt;
  padding:0in 5.4pt 0in 5.4pt;height:15.8pt'>
  <p class=MsoNormal style='margin-bottom:0in;text-align:justify;line-height:
  normal'><b><span lang=EN-US style='font-size:10.0pt;font-family:"Arial",sans-serif;
  mso-fareast-font-family:"Times New Roman";color:black'>Kinder Optima</span></b><span
  lang=EN-US style='font-size:10.0pt;font-family:"Arial",sans-serif;mso-fareast-font-family:
  "Times New Roman";color:black'>: Giúp kích thích tiêu hóa, nâng cao h&#7879;
  mi&#7877;n d&#7883;ch. (H&#7897;p 1 chai 100ml) <b><o:p></o:p></b></span></p>
  </td>
  <td width=78 nowrap style='width:58.65pt;border-top:none;border-left:none;
  border-bottom:solid windowtext 1.0pt;border-right:solid windowtext 1.0pt;
  padding:0in 5.4pt 0in 5.4pt;height:15.8pt'>
  <p class=MsoNormal align=right style='margin-bottom:0in;text-align:right;
  line-height:normal'><span lang=EN-US style='font-size:10.0pt;font-family:
  "Arial",sans-serif;mso-fareast-font-family:"Times New Roman";color:black'><span
  style='mso-spacerun:yes'>      </span>281.818 <o:p></o:p></span></p>
  </td>
  <td width=78 style='width:58.65pt;border-top:none;border-left:none;
  border-bottom:solid windowtext 1.0pt;border-right:solid windowtext 1.0pt;
  padding:0in 5.4pt 0in 5.4pt;height:15.8pt'>
  <p class=MsoNormal align=right style='margin-bottom:0in;text-align:right;
  line-height:normal'><span lang=EN-US style='font-size:10.0pt;font-family:
  "Arial",sans-serif;mso-fareast-font-family:"Times New Roman";color:black'><span
  style='mso-spacerun:yes'>      </span>310.000 <o:p></o:p></span></p>
  </td>
 </tr>
 <tr style='mso-yfti-irow:3;height:15.55pt'>
  <td width=38 style='width:28.45pt;border:solid windowtext 1.0pt;border-top:
  none;padding:0in 5.4pt 0in 5.4pt;height:15.55pt'>
  <p class=MsoNormal align=center style='margin-bottom:0in;text-align:center;
  line-height:normal'><span lang=EN-US style='font-size:10.0pt;font-family:
  "Arial",sans-serif;mso-fareast-font-family:"Times New Roman";color:black'>3<o:p></o:p></span></p>
  </td>
  <td width=452 style='width:338.8pt;border-top:none;border-left:none;
  border-bottom:solid windowtext 1.0pt;border-right:solid windowtext 1.0pt;
  padding:0in 5.4pt 0in 5.4pt;height:15.55pt'>
  <p class=MsoNormal style='margin-bottom:0in;text-align:justify;line-height:
  normal'><b><span lang=EN-US style='font-size:10.0pt;font-family:"Arial",sans-serif;
  mso-fareast-font-family:"Times New Roman";color:black'>A-Z Fizz</span></b><span
  lang=EN-US style='font-size:10.0pt;font-family:"Arial",sans-serif;mso-fareast-font-family:
  "Times New Roman";color:black'>: B&#7893; sung 21 vi ch&#7845;t giúp tãng
  cý&#7901;ng s&#7913;c kh&#7887;e (tu&yacute;p 13 viên)<b><o:p></o:p></b></span></p>
  </td>
  <td width=78 nowrap style='width:58.65pt;border-top:none;border-left:none;
  border-bottom:solid windowtext 1.0pt;border-right:solid windowtext 1.0pt;
  padding:0in 5.4pt 0in 5.4pt;height:15.55pt'>
  <p class=MsoNormal align=right style='margin-bottom:0in;text-align:right;
  line-height:normal'><span lang=EN-US style='font-size:10.0pt;font-family:
  "Arial",sans-serif;mso-fareast-font-family:"Times New Roman";color:black'><span
  style='mso-spacerun:yes'>        </span>70.909 <o:p></o:p></span></p>
  </td>
  <td width=78 style='width:58.65pt;border-top:none;border-left:none;
  border-bottom:solid windowtext 1.0pt;border-right:solid windowtext 1.0pt;
  padding:0in 5.4pt 0in 5.4pt;height:15.55pt'>
  <p class=MsoNormal align=right style='margin-bottom:0in;text-align:right;
  line-height:normal'><span lang=EN-US style='font-size:10.0pt;font-family:
  "Arial",sans-serif;mso-fareast-font-family:"Times New Roman";color:black'><span
  style='mso-spacerun:yes'>        </span>78.000 <o:p></o:p></span></p>
  </td>
 </tr>
 <tr style='mso-yfti-irow:4;height:26.4pt'>
  <td width=38 style='width:28.45pt;border:solid windowtext 1.0pt;border-top:
  none;padding:0in 5.4pt 0in 5.4pt;height:26.4pt'>
  <p class=MsoNormal align=center style='margin-bottom:0in;text-align:center;
  line-height:normal'><span lang=EN-US style='font-size:10.0pt;font-family:
  "Arial",sans-serif;mso-fareast-font-family:"Times New Roman";color:black'>4<o:p></o:p></span></p>
  </td>
  <td width=452 style='width:338.8pt;border-top:none;border-left:none;
  border-bottom:solid windowtext 1.0pt;border-right:solid windowtext 1.0pt;
  padding:0in 5.4pt 0in 5.4pt;height:26.4pt'>
  <p class=MsoNormal style='margin-bottom:0in;text-align:justify;line-height:
  normal'><b><span lang=EN-US style='font-size:10.0pt;font-family:"Arial",sans-serif;
  mso-fareast-font-family:"Times New Roman";color:black'>Aktiv Meno</span></b><span
  lang=EN-US style='font-size:10.0pt;font-family:"Arial",sans-serif;mso-fareast-font-family:
  "Times New Roman";color:black'>: S&#7843;n ph&#7849;m cho ph&#7909; n&#7919;
  ti&#7873;n m&atilde;n kinh, m&atilde;n kinh; b&#7893; sung estrogen t&#7921;
  nhiên, ch&#7889;ng lo&atilde;ng xýõng (H&#7897;p 2 v&#7881; * 10 viên)<b><o:p></o:p></b></span></p>
  </td>
  <td width=78 nowrap style='width:58.65pt;border-top:none;border-left:none;
  border-bottom:solid windowtext 1.0pt;border-right:solid windowtext 1.0pt;
  padding:0in 5.4pt 0in 5.4pt;height:26.4pt'>
  <p class=MsoNormal align=right style='margin-bottom:0in;text-align:right;
  line-height:normal'><span lang=EN-US style='font-size:10.0pt;font-family:
  "Arial",sans-serif;mso-fareast-font-family:"Times New Roman";color:black'><span
  style='mso-spacerun:yes'>      </span>245.455 <o:p></o:p></span></p>
  </td>
  <td width=78 style='width:58.65pt;border-top:none;border-left:none;
  border-bottom:solid windowtext 1.0pt;border-right:solid windowtext 1.0pt;
  padding:0in 5.4pt 0in 5.4pt;height:26.4pt'>
  <p class=MsoNormal align=right style='margin-bottom:0in;text-align:right;
  line-height:normal'><span lang=EN-US style='font-size:10.0pt;font-family:
  "Arial",sans-serif;mso-fareast-font-family:"Times New Roman";color:black'><span
  style='mso-spacerun:yes'>      </span>270.000 <o:p></o:p></span></p>
  </td>
 </tr>
 <tr style='mso-yfti-irow:5;height:26.4pt'>
  <td width=38 style='width:28.45pt;border:solid windowtext 1.0pt;border-top:
  none;padding:0in 5.4pt 0in 5.4pt;height:26.4pt'>
  <p class=MsoNormal align=center style='margin-bottom:0in;text-align:center;
  line-height:normal'><span lang=EN-US style='font-size:10.0pt;font-family:
  "Arial",sans-serif;mso-fareast-font-family:"Times New Roman";color:black'>5<o:p></o:p></span></p>
  </td>
  <td width=54 rowspan=21 style='width:40.65pt;border-top:none;border-left:
  none;border-bottom:solid black 1.0pt;border-right:solid windowtext 1.0pt;
  mso-border-left-alt:solid windowtext 1.0pt;padding:0in 5.4pt 0in 5.4pt;
  height:26.4pt'>
  <p class=MsoNormal align=center style='margin-bottom:0in;text-align:center;
  line-height:normal'><b><span lang=EN-US style='font-size:10.0pt;font-family:
  "Arial",sans-serif;mso-fareast-font-family:"Times New Roman";color:black'>S&#7843;n
  ph&#7849;m tý v&#7845;n<o:p></o:p></span></b></p>
  </td>
  <td width=452 style='width:338.8pt;border-top:none;border-left:none;
  border-bottom:solid windowtext 1.0pt;border-right:solid windowtext 1.0pt;
  padding:0in 5.4pt 0in 5.4pt;height:26.4pt'>
  <p class=MsoNormal style='margin-bottom:0in;text-align:justify;line-height:
  normal'><b><span lang=EN-US style='font-size:10.0pt;font-family:"Arial",sans-serif;
  mso-fareast-font-family:"Times New Roman";color:black'>Kinder Active D3 Drops</span></b><span
  lang=EN-US style='font-size:10.0pt;font-family:"Arial",sans-serif;mso-fareast-font-family:
  "Times New Roman";color:black'>: Giúp xýõng ch&#7855;c kh&#7887;e, h&#7895;
  tr&#7907; chuy&#7875;n hóa và h&#7845;p thu Calci (H&#7897;p 1 chai 30ml)<b><o:p></o:p></b></span></p>
  </td>
  <td width=78 nowrap style='width:58.65pt;border-top:none;border-left:none;
  border-bottom:solid windowtext 1.0pt;border-right:solid windowtext 1.0pt;
  padding:0in 5.4pt 0in 5.4pt;height:26.4pt'>
  <p class=MsoNormal align=right style='margin-bottom:0in;text-align:right;
  line-height:normal'><span lang=EN-US style='font-size:10.0pt;font-family:
  "Arial",sans-serif;mso-fareast-font-family:"Times New Roman";color:black'><span
  style='mso-spacerun:yes'>      </span>209.091 <o:p></o:p></span></p>
  </td>
  <td width=78 style='width:58.65pt;border-top:none;border-left:none;
  border-bottom:solid windowtext 1.0pt;border-right:solid windowtext 1.0pt;
  padding:0in 5.4pt 0in 5.4pt;height:26.4pt'>
  <p class=MsoNormal align=right style='margin-bottom:0in;text-align:right;
  line-height:normal'><span lang=EN-US style='font-size:10.0pt;font-family:
  "Arial",sans-serif;mso-fareast-font-family:"Times New Roman";color:black'><span
  style='mso-spacerun:yes'>      </span>230.000 <o:p></o:p></span></p>
  </td>
 </tr>
 <tr style='mso-yfti-irow:6;height:26.4pt'>
  <td width=38 style='width:28.45pt;border:solid windowtext 1.0pt;border-top:
  none;padding:0in 5.4pt 0in 5.4pt;height:26.4pt'>
  <p class=MsoNormal align=center style='margin-bottom:0in;text-align:center;
  line-height:normal'><span lang=EN-US style='font-size:10.0pt;font-family:
  "Arial",sans-serif;mso-fareast-font-family:"Times New Roman";color:black'>6<o:p></o:p></span></p>
  </td>
  <td width=452 style='width:338.8pt;border-top:none;border-left:none;
  border-bottom:solid windowtext 1.0pt;border-right:solid windowtext 1.0pt;
  padding:0in 5.4pt 0in 5.4pt;height:26.4pt'>
  <p class=MsoNormal style='margin-bottom:0in;text-align:justify;line-height:
  normal'><b><span lang=EN-US style='font-size:10.0pt;font-family:"Arial",sans-serif;
  mso-fareast-font-family:"Times New Roman";color:black'>Magnesium + Calcium +
  D3</span></b><span lang=EN-US style='font-size:10.0pt;font-family:"Arial",sans-serif;
  mso-fareast-font-family:"Times New Roman";color:black'>: Giúp b&#7893; xung
  Calci, Magie và D3 c&#7847;n thi&#7871;t cho s&#7921; phát tri&#7875;n
  c&#7911;a cõ và xýõng cõ th&#7875; (H&#7897;p 3 v&#7881; *10 viên)<b><o:p></o:p></b></span></p>
  </td>
  <td width=78 nowrap style='width:58.65pt;border-top:none;border-left:none;
  border-bottom:solid windowtext 1.0pt;border-right:solid windowtext 1.0pt;
  padding:0in 5.4pt 0in 5.4pt;height:26.4pt'>
  <p class=MsoNormal align=right style='margin-bottom:0in;text-align:right;
  line-height:normal'><span lang=EN-US style='font-size:10.0pt;font-family:
  "Arial",sans-serif;mso-fareast-font-family:"Times New Roman";color:black'><span
  style='mso-spacerun:yes'>      </span>300.000 <o:p></o:p></span></p>
  </td>
  <td width=78 style='width:58.65pt;border-top:none;border-left:none;
  border-bottom:solid windowtext 1.0pt;border-right:solid windowtext 1.0pt;
  padding:0in 5.4pt 0in 5.4pt;height:26.4pt'>
  <p class=MsoNormal align=right style='margin-bottom:0in;text-align:right;
  line-height:normal'><span lang=EN-US style='font-size:10.0pt;font-family:
  "Arial",sans-serif;mso-fareast-font-family:"Times New Roman";color:black'><span
  style='mso-spacerun:yes'>      </span>330.000 <o:p></o:p></span></p>
  </td>
 </tr>
 <tr style='mso-yfti-irow:7;height:26.4pt'>
  <td width=38 style='width:28.45pt;border:solid windowtext 1.0pt;border-top:
  none;padding:0in 5.4pt 0in 5.4pt;height:26.4pt'>
  <p class=MsoNormal align=center style='margin-bottom:0in;text-align:center;
  line-height:normal'><span lang=EN-US style='font-size:10.0pt;font-family:
  "Arial",sans-serif;mso-fareast-font-family:"Times New Roman";color:black'>7<o:p></o:p></span></p>
  </td>
  <td width=452 style='width:338.8pt;border-top:none;border-left:none;
  border-bottom:solid windowtext 1.0pt;border-right:solid windowtext 1.0pt;
  padding:0in 5.4pt 0in 5.4pt;height:26.4pt'>
  <p class=MsoNormal style='margin-bottom:0in;text-align:justify;line-height:
  normal'><b><span lang=EN-US style='font-size:10.0pt;font-family:"Arial",sans-serif;
  mso-fareast-font-family:"Times New Roman";color:black'>A-Z Depot: </span></b><span
  lang=EN-US style='font-size:10.0pt;font-family:"Arial",sans-serif;mso-fareast-font-family:
  "Times New Roman";color:black'>B&#7893; sung Vitamin &amp; khoáng ch&#7845;t
  giúp tãng cý&#7901;ng s&#7913;c kh&#7887;e, tãng cý&#7901;ng s&#7913;c
  ð&#7873; kháng (H&#7897;p 30 viên)<b><o:p></o:p></b></span></p>
  </td>
  <td width=78 nowrap style='width:58.65pt;border-top:none;border-left:none;
  border-bottom:solid windowtext 1.0pt;border-right:solid windowtext 1.0pt;
  padding:0in 5.4pt 0in 5.4pt;height:26.4pt'>
  <p class=MsoNormal align=right style='margin-bottom:0in;text-align:right;
  line-height:normal'><span lang=EN-US style='font-size:10.0pt;font-family:
  "Arial",sans-serif;mso-fareast-font-family:"Times New Roman";color:black'><span
  style='mso-spacerun:yes'>      </span>313.636 <o:p></o:p></span></p>
  </td>
  <td width=78 style='width:58.65pt;border-top:none;border-left:none;
  border-bottom:solid windowtext 1.0pt;border-right:solid windowtext 1.0pt;
  padding:0in 5.4pt 0in 5.4pt;height:26.4pt'>
  <p class=MsoNormal align=right style='margin-bottom:0in;text-align:right;
  line-height:normal'><span lang=EN-US style='font-size:10.0pt;font-family:
  "Arial",sans-serif;mso-fareast-font-family:"Times New Roman";color:black'><span
  style='mso-spacerun:yes'>      </span>345.000 <o:p></o:p></span></p>
  </td>
 </tr>
 <tr style='mso-yfti-irow:8;height:26.4pt'>
  <td width=38 style='width:28.45pt;border:solid windowtext 1.0pt;border-top:
  none;padding:0in 5.4pt 0in 5.4pt;height:26.4pt'>
  <p class=MsoNormal align=center style='margin-bottom:0in;text-align:center;
  line-height:normal'><span lang=EN-US style='font-size:10.0pt;font-family:
  "Arial",sans-serif;mso-fareast-font-family:"Times New Roman";color:black'>8<o:p></o:p></span></p>
  </td>
  <td width=452 style='width:338.8pt;border-top:none;border-left:none;
  border-bottom:solid windowtext 1.0pt;border-right:solid windowtext 1.0pt;
  padding:0in 5.4pt 0in 5.4pt;height:26.4pt'>
  <p class=MsoNormal style='margin-bottom:0in;text-align:justify;line-height:
  normal'><b><span lang=EN-US style='font-size:10.0pt;font-family:"Arial",sans-serif;
  mso-fareast-font-family:"Times New Roman";color:black'>Haemo Vital</span></b><span
  lang=EN-US style='font-size:10.0pt;font-family:"Arial",sans-serif;mso-fareast-font-family:
  "Times New Roman";color:black'>: Cung c&#7845;p s&#7855;t và các vitamin cho
  quá tr&igrave;nh t&#7841;o máu giúp ph&ograve;ng ng&#7915;a và h&#7895;
  tr&#7907; thi&#7871;u máu do thi&#7871;u s&#7855;t (H&#7897;p 2 v&#7881; * 15
  viên)<b><o:p></o:p></b></span></p>
  </td>
  <td width=78 nowrap style='width:58.65pt;border-top:none;border-left:none;
  border-bottom:solid windowtext 1.0pt;border-right:solid windowtext 1.0pt;
  padding:0in 5.4pt 0in 5.4pt;height:26.4pt'>
  <p class=MsoNormal align=right style='margin-bottom:0in;text-align:right;
  line-height:normal'><span lang=EN-US style='font-size:10.0pt;font-family:
  "Arial",sans-serif;mso-fareast-font-family:"Times New Roman";color:black'><span
  style='mso-spacerun:yes'>      </span>322.727 <o:p></o:p></span></p>
  </td>
  <td width=78 style='width:58.65pt;border-top:none;border-left:none;
  border-bottom:solid windowtext 1.0pt;border-right:solid windowtext 1.0pt;
  padding:0in 5.4pt 0in 5.4pt;height:26.4pt'>
  <p class=MsoNormal align=right style='margin-bottom:0in;text-align:right;
  line-height:normal'><span lang=EN-US style='font-size:10.0pt;font-family:
  "Arial",sans-serif;mso-fareast-font-family:"Times New Roman";color:black'><span
  style='mso-spacerun:yes'>      </span>355.000 <o:p></o:p></span></p>
  </td>
 </tr>
 <tr style='mso-yfti-irow:9;height:15.8pt'>
  <td width=38 style='width:28.45pt;border:solid windowtext 1.0pt;border-top:
  none;padding:0in 5.4pt 0in 5.4pt;height:15.8pt'>
  <p class=MsoNormal align=center style='margin-bottom:0in;text-align:center;
  line-height:normal'><span lang=EN-US style='font-size:10.0pt;font-family:
  "Arial",sans-serif;mso-fareast-font-family:"Times New Roman";color:black'>9<o:p></o:p></span></p>
  </td>
  <td width=452 style='width:338.8pt;border-top:none;border-left:none;
  border-bottom:solid windowtext 1.0pt;border-right:solid windowtext 1.0pt;
  padding:0in 5.4pt 0in 5.4pt;height:15.8pt'>
  <p class=MsoNormal style='margin-bottom:0in;text-align:justify;line-height:
  normal'><b><span lang=EN-US style='font-size:10.0pt;font-family:"Arial",sans-serif;
  mso-fareast-font-family:"Times New Roman";color:black'>Coenzym Q10</span></b><span
  lang=EN-US style='font-size:10.0pt;font-family:"Arial",sans-serif;mso-fareast-font-family:
  "Times New Roman";color:black'>: H&#7895; tr&#7907; ði&#7873;u tr&#7883; suy
  tim, các b&#7879;nh tim m&#7841;ch (H&#7897;p 30 viên)<b><o:p></o:p></b></span></p>
  </td>
  <td width=78 nowrap style='width:58.65pt;border-top:none;border-left:none;
  border-bottom:solid windowtext 1.0pt;border-right:solid windowtext 1.0pt;
  padding:0in 5.4pt 0in 5.4pt;height:15.8pt'>
  <p class=MsoNormal align=right style='margin-bottom:0in;text-align:right;
  line-height:normal'><span lang=EN-US style='font-size:10.0pt;font-family:
  "Arial",sans-serif;mso-fareast-font-family:"Times New Roman";color:black'><span
  style='mso-spacerun:yes'>      </span>300.000 <o:p></o:p></span></p>
  </td>
  <td width=78 style='width:58.65pt;border-top:none;border-left:none;
  border-bottom:solid windowtext 1.0pt;border-right:solid windowtext 1.0pt;
  padding:0in 5.4pt 0in 5.4pt;height:15.8pt'>
  <p class=MsoNormal align=right style='margin-bottom:0in;text-align:right;
  line-height:normal'><span lang=EN-US style='font-size:10.0pt;font-family:
  "Arial",sans-serif;mso-fareast-font-family:"Times New Roman";color:black'><span
  style='mso-spacerun:yes'>      </span>330.000 <o:p></o:p></span></p>
  </td>
 </tr>
 <tr style='mso-yfti-irow:10;height:15.8pt'>
  <td width=38 style='width:28.45pt;border:solid windowtext 1.0pt;border-top:
  none;padding:0in 5.4pt 0in 5.4pt;height:15.8pt'>
  <p class=MsoNormal align=center style='margin-bottom:0in;text-align:center;
  line-height:normal'><span lang=EN-US style='font-size:10.0pt;font-family:
  "Arial",sans-serif;mso-fareast-font-family:"Times New Roman";color:black'>10<o:p></o:p></span></p>
  </td>
  <td width=452 style='width:338.8pt;border-top:none;border-left:none;
  border-bottom:solid windowtext 1.0pt;border-right:solid windowtext 1.0pt;
  padding:0in 5.4pt 0in 5.4pt;height:15.8pt'>
  <p class=MsoNormal style='margin-bottom:0in;text-align:justify;line-height:
  normal'><b><span lang=EN-US style='font-size:10.0pt;font-family:"Arial",sans-serif;
  mso-fareast-font-family:"Times New Roman";color:black'>Eye Vital:</span></b><span
  lang=EN-US style='font-size:10.0pt;font-family:"Arial",sans-serif;mso-fareast-font-family:
  "Times New Roman";color:black'> B&#7893; m&#7855;t, tãng cý&#7901;ng
  th&#7883; l&#7921;c (H&#7897;p 30 viên)<b><o:p></o:p></b></span></p>
  </td>
  <td width=78 nowrap style='width:58.65pt;border-top:none;border-left:none;
  border-bottom:solid windowtext 1.0pt;border-right:solid windowtext 1.0pt;
  padding:0in 5.4pt 0in 5.4pt;height:15.8pt'>
  <p class=MsoNormal align=right style='margin-bottom:0in;text-align:right;
  line-height:normal'><span lang=EN-US style='font-size:10.0pt;font-family:
  "Arial",sans-serif;mso-fareast-font-family:"Times New Roman";color:black'><span
  style='mso-spacerun:yes'>      </span>313.636 <o:p></o:p></span></p>
  </td>
  <td width=78 style='width:58.65pt;border-top:none;border-left:none;
  border-bottom:solid windowtext 1.0pt;border-right:solid windowtext 1.0pt;
  padding:0in 5.4pt 0in 5.4pt;height:15.8pt'>
  <p class=MsoNormal align=right style='margin-bottom:0in;text-align:right;
  line-height:normal'><span lang=EN-US style='font-size:10.0pt;font-family:
  "Arial",sans-serif;mso-fareast-font-family:"Times New Roman";color:black'><span
  style='mso-spacerun:yes'>      </span>345.000 <o:p></o:p></span></p>
  </td>
 </tr>
 <tr style='mso-yfti-irow:11;height:26.4pt'>
  <td width=38 style='width:28.45pt;border:solid windowtext 1.0pt;border-top:
  none;padding:0in 5.4pt 0in 5.4pt;height:26.4pt'>
  <p class=MsoNormal align=center style='margin-bottom:0in;text-align:center;
  line-height:normal'><span lang=EN-US style='font-size:10.0pt;font-family:
  "Arial",sans-serif;mso-fareast-font-family:"Times New Roman";color:black'>11<o:p></o:p></span></p>
  </td>
  <td width=452 style='width:338.8pt;border-top:none;border-left:none;
  border-bottom:solid windowtext 1.0pt;border-right:solid windowtext 1.0pt;
  padding:0in 5.4pt 0in 5.4pt;height:26.4pt'>
  <p class=MsoNormal style='margin-bottom:0in;text-align:justify;line-height:
  normal'><b><span lang=EN-US style='font-size:10.0pt;font-family:"Arial",sans-serif;
  mso-fareast-font-family:"Times New Roman";color:black'>Prostacalm:</span></b><span
  lang=EN-US style='font-size:10.0pt;font-family:"Arial",sans-serif;mso-fareast-font-family:
  "Times New Roman";color:black'> Giúp ngãn ng&#7915;a và h&#7841;n ch&#7871;
  s&#7921; phát tri&#7875;n c&#7911;a u xõ; gi&#7843;m các tri&#7879;u
  ch&#7913;ng ti&#7875;u ti&#7879;n do b&#7879;nh ph&igrave; ð&#7841;i
  ti&#7873;n li&#7879;t tuy&#7871;n lành tính (H&#7897;p 3 v&#7881; * 10 viên)<b><o:p></o:p></b></span></p>
  </td>
  <td width=78 nowrap style='width:58.65pt;border-top:none;border-left:none;
  border-bottom:solid windowtext 1.0pt;border-right:solid windowtext 1.0pt;
  padding:0in 5.4pt 0in 5.4pt;height:26.4pt'>
  <p class=MsoNormal align=right style='margin-bottom:0in;text-align:right;
  line-height:normal'><span lang=EN-US style='font-size:10.0pt;font-family:
  "Arial",sans-serif;mso-fareast-font-family:"Times New Roman";color:black'><span
  style='mso-spacerun:yes'>      </span>322.727 <o:p></o:p></span></p>
  </td>
  <td width=78 style='width:58.65pt;border-top:none;border-left:none;
  border-bottom:solid windowtext 1.0pt;border-right:solid windowtext 1.0pt;
  padding:0in 5.4pt 0in 5.4pt;height:26.4pt'>
  <p class=MsoNormal align=right style='margin-bottom:0in;text-align:right;
  line-height:normal'><span lang=EN-US style='font-size:10.0pt;font-family:
  "Arial",sans-serif;mso-fareast-font-family:"Times New Roman";color:black'><span
  style='mso-spacerun:yes'>      </span>355.000 <o:p></o:p></span></p>
  </td>
 </tr>
 <tr style='mso-yfti-irow:12;height:26.4pt'>
  <td width=38 style='width:28.45pt;border:solid windowtext 1.0pt;border-top:
  none;padding:0in 5.4pt 0in 5.4pt;height:26.4pt'>
  <p class=MsoNormal align=center style='margin-bottom:0in;text-align:center;
  line-height:normal'><span lang=EN-US style='font-size:10.0pt;font-family:
  "Arial",sans-serif;mso-fareast-font-family:"Times New Roman";color:black'>12<o:p></o:p></span></p>
  </td>
  <td width=452 style='width:338.8pt;border-top:none;border-left:none;
  border-bottom:solid windowtext 1.0pt;border-right:solid windowtext 1.0pt;
  padding:0in 5.4pt 0in 5.4pt;height:26.4pt'>
  <p class=MsoNormal style='margin-bottom:0in;text-align:justify;line-height:
  normal'><b><span lang=EN-US style='font-size:10.0pt;font-family:"Arial",sans-serif;
  mso-fareast-font-family:"Times New Roman";color:black'>Joints ULTRA:</span></b><span
  lang=EN-US style='font-size:10.0pt;font-family:"Arial",sans-serif;mso-fareast-font-family:
  "Times New Roman";color:black'> Gi&#7843;m các tri&#7879;u ch&#7913;ng thoái
  hóa kh&#7899;p, b&#7843;o v&#7879; s&#7909;n kh&#7899;p, bôi trõn <span
  class=GramE>kh&#7899;p(</span>H&#7897;p 30 viên)<b><o:p></o:p></b></span></p>
  </td>
  <td width=78 nowrap style='width:58.65pt;border-top:none;border-left:none;
  border-bottom:solid windowtext 1.0pt;border-right:solid windowtext 1.0pt;
  padding:0in 5.4pt 0in 5.4pt;height:26.4pt'>
  <p class=MsoNormal align=right style='margin-bottom:0in;text-align:right;
  line-height:normal'><span lang=EN-US style='font-size:10.0pt;font-family:
  "Arial",sans-serif;mso-fareast-font-family:"Times New Roman";color:black'><span
  style='mso-spacerun:yes'>      </span>436.364 <o:p></o:p></span></p>
  </td>
  <td width=78 style='width:58.65pt;border-top:none;border-left:none;
  border-bottom:solid windowtext 1.0pt;border-right:solid windowtext 1.0pt;
  padding:0in 5.4pt 0in 5.4pt;height:26.4pt'>
  <p class=MsoNormal align=right style='margin-bottom:0in;text-align:right;
  line-height:normal'><span lang=EN-US style='font-size:10.0pt;font-family:
  "Arial",sans-serif;mso-fareast-font-family:"Times New Roman";color:black'><span
  style='mso-spacerun:yes'>      </span>480.000 <o:p></o:p></span></p>
  </td>
 </tr>
 <tr style='mso-yfti-irow:13;height:15.8pt'>
  <td width=38 style='width:28.45pt;border:solid windowtext 1.0pt;border-top:
  none;padding:0in 5.4pt 0in 5.4pt;height:15.8pt'>
  <p class=MsoNormal align=center style='margin-bottom:0in;text-align:center;
  line-height:normal'><span lang=EN-US style='font-size:10.0pt;font-family:
  "Arial",sans-serif;mso-fareast-font-family:"Times New Roman";color:black'>13<o:p></o:p></span></p>
  </td>
  <td width=452 style='width:338.8pt;border-top:none;border-left:none;
  border-bottom:solid windowtext 1.0pt;border-right:solid windowtext 1.0pt;
  padding:0in 5.4pt 0in 5.4pt;height:15.8pt'>
  <p class=MsoNormal style='margin-bottom:0in;text-align:justify;line-height:
  normal'><b><span lang=EN-US style='font-size:10.0pt;font-family:"Arial",sans-serif;
  mso-fareast-font-family:"Times New Roman";color:black'>Omgea 3 + Acid Folic +
  B6 +B12</span></b><span lang=EN-US style='font-size:10.0pt;font-family:"Arial",sans-serif;
  mso-fareast-font-family:"Times New Roman";color:black'> (H&#7897;p 30 viên)<b><o:p></o:p></b></span></p>
  </td>
  <td width=78 nowrap style='width:58.65pt;border-top:none;border-left:none;
  border-bottom:solid windowtext 1.0pt;border-right:solid windowtext 1.0pt;
  padding:0in 5.4pt 0in 5.4pt;height:15.8pt'>
  <p class=MsoNormal align=right style='margin-bottom:0in;text-align:right;
  line-height:normal'><span lang=EN-US style='font-size:10.0pt;font-family:
  "Arial",sans-serif;mso-fareast-font-family:"Times New Roman";color:black'><span
  style='mso-spacerun:yes'>      </span>250.000 <o:p></o:p></span></p>
  </td>
  <td width=78 style='width:58.65pt;border-top:none;border-left:none;
  border-bottom:solid windowtext 1.0pt;border-right:solid windowtext 1.0pt;
  padding:0in 5.4pt 0in 5.4pt;height:15.8pt'>
  <p class=MsoNormal align=right style='margin-bottom:0in;text-align:right;
  line-height:normal'><span lang=EN-US style='font-size:10.0pt;font-family:
  "Arial",sans-serif;mso-fareast-font-family:"Times New Roman";color:black'><span
  style='mso-spacerun:yes'>      </span>275.000 <o:p></o:p></span></p>
  </td>
 </tr>
 <tr style='mso-yfti-irow:14;height:15.8pt'>
  <td width=38 style='width:28.45pt;border:solid windowtext 1.0pt;border-top:
  none;padding:0in 5.4pt 0in 5.4pt;height:15.8pt'>
  <p class=MsoNormal align=center style='margin-bottom:0in;text-align:center;
  line-height:normal'><span lang=EN-US style='font-size:10.0pt;font-family:
  "Arial",sans-serif;mso-fareast-font-family:"Times New Roman";color:black'>14<o:p></o:p></span></p>
  </td>
  <td width=452 style='width:338.8pt;border-top:none;border-left:none;
  border-bottom:solid windowtext 1.0pt;border-right:solid windowtext 1.0pt;
  padding:0in 5.4pt 0in 5.4pt;height:15.8pt'>
  <p class=MsoNormal style='margin-bottom:0in;text-align:justify;line-height:
  normal'><b><span lang=EN-US style='font-size:10.0pt;font-family:"Arial",sans-serif;
  mso-fareast-font-family:"Times New Roman";color:black'>Belle Anti Aging:</span></b><span
  lang=EN-US style='font-size:10.0pt;font-family:"Arial",sans-serif;mso-fareast-font-family:
  "Times New Roman";color:black'> Ch&#7889;ng l&atilde;o hóa (H&#7897;p 30
  viên)<b><o:p></o:p></b></span></p>
  </td>
  <td width=78 nowrap style='width:58.65pt;border-top:none;border-left:none;
  border-bottom:solid windowtext 1.0pt;border-right:solid windowtext 1.0pt;
  padding:0in 5.4pt 0in 5.4pt;height:15.8pt'>
  <p class=MsoNormal align=right style='margin-bottom:0in;text-align:right;
  line-height:normal'><span lang=EN-US style='font-size:10.0pt;font-family:
  "Arial",sans-serif;mso-fareast-font-family:"Times New Roman";color:black'><span
  style='mso-spacerun:yes'>      </span>300.000 <o:p></o:p></span></p>
  </td>
  <td width=78 style='width:58.65pt;border-top:none;border-left:none;
  border-bottom:solid windowtext 1.0pt;border-right:solid windowtext 1.0pt;
  padding:0in 5.4pt 0in 5.4pt;height:15.8pt'>
  <p class=MsoNormal align=right style='margin-bottom:0in;text-align:right;
  line-height:normal'><span lang=EN-US style='font-size:10.0pt;font-family:
  "Arial",sans-serif;mso-fareast-font-family:"Times New Roman";color:black'><span
  style='mso-spacerun:yes'>      </span>330.000 <o:p></o:p></span></p>
  </td>
 </tr>
 <tr style='mso-yfti-irow:15;height:26.4pt'>
  <td width=38 style='width:28.45pt;border:solid windowtext 1.0pt;border-top:
  none;padding:0in 5.4pt 0in 5.4pt;height:26.4pt'>
  <p class=MsoNormal align=center style='margin-bottom:0in;text-align:center;
  line-height:normal'><span lang=EN-US style='font-size:10.0pt;font-family:
  "Arial",sans-serif;mso-fareast-font-family:"Times New Roman";color:black'>15<o:p></o:p></span></p>
  </td>
  <td width=452 style='width:338.8pt;border-top:none;border-left:none;
  border-bottom:solid windowtext 1.0pt;border-right:solid windowtext 1.0pt;
  padding:0in 5.4pt 0in 5.4pt;height:26.4pt'>
  <p class=MsoNormal style='margin-bottom:0in;text-align:justify;line-height:
  normal'><b><span lang=EN-US style='font-size:10.0pt;font-family:"Arial",sans-serif;
  mso-fareast-font-family:"Times New Roman";color:black'>Kinder Immune Syrup:</span></b><span
  lang=EN-US style='font-size:10.0pt;font-family:"Arial",sans-serif;mso-fareast-font-family:
  "Times New Roman";color:black'> Tãng cý&#7901;ng mi&#7877;n d&#7883;ch, tãng
  s&#7913;c ð&#7873; kháng. (H&#7897;p 1 chai 150ml)<b><o:p></o:p></b></span></p>
  </td>
  <td width=78 nowrap style='width:58.65pt;border-top:none;border-left:none;
  border-bottom:solid windowtext 1.0pt;border-right:solid windowtext 1.0pt;
  padding:0in 5.4pt 0in 5.4pt;height:26.4pt'>
  <p class=MsoNormal align=right style='margin-bottom:0in;text-align:right;
  line-height:normal'><span lang=EN-US style='font-size:10.0pt;font-family:
  "Arial",sans-serif;mso-fareast-font-family:"Times New Roman";color:black'><span
  style='mso-spacerun:yes'>      </span>360.000 <o:p></o:p></span></p>
  </td>
  <td width=78 style='width:58.65pt;border-top:none;border-left:none;
  border-bottom:solid windowtext 1.0pt;border-right:solid windowtext 1.0pt;
  padding:0in 5.4pt 0in 5.4pt;height:26.4pt'>
  <p class=MsoNormal align=right style='margin-bottom:0in;text-align:right;
  line-height:normal'><span lang=EN-US style='font-size:10.0pt;font-family:
  "Arial",sans-serif;mso-fareast-font-family:"Times New Roman";color:black'><span
  style='mso-spacerun:yes'>      </span>396.000 <o:p></o:p></span></p>
  </td>
 </tr>
 <tr style='mso-yfti-irow:16;height:39.25pt'>
  <td width=38 style='width:28.45pt;border:solid windowtext 1.0pt;border-top:
  none;padding:0in 5.4pt 0in 5.4pt;height:39.25pt'>
  <p class=MsoNormal align=center style='margin-bottom:0in;text-align:center;
  line-height:normal'><span lang=EN-US style='font-size:10.0pt;font-family:
  "Arial",sans-serif;mso-fareast-font-family:"Times New Roman";color:black'>16<o:p></o:p></span></p>
  </td>
  <td width=452 style='width:338.8pt;border-top:none;border-left:none;
  border-bottom:solid windowtext 1.0pt;border-right:solid windowtext 1.0pt;
  padding:0in 5.4pt 0in 5.4pt;height:39.25pt'>
  <p class=MsoNormal style='margin-bottom:0in;text-align:justify;line-height:
  normal'><b><span lang=EN-US style='font-size:10.0pt;font-family:"Arial",sans-serif;
  mso-fareast-font-family:"Times New Roman";color:black'>Liver Complex:</span></b><span
  lang=EN-US style='font-size:10.0pt;font-family:"Arial",sans-serif;mso-fareast-font-family:
  "Times New Roman";color:black'> H&#7895; tr&#7907; thanh nhi&#7879;t, tãng
  gi&#7843;i ð&#7897;c gan và duy tr&igrave; ch&#7913;c nãng gan, giúp
  b&#7843;o v&#7879; gan kh&#7887;i t&#7893;n thýõng do s&#7917; d&#7909;ng bia
  và các hóa ch&#7845;t ð&#7897;c h&#7841;i cho gan (H&#7897;p 3 v&#7881; * 10
  viên)<b><o:p></o:p></b></span></p>
  </td>
  <td width=78 nowrap style='width:58.65pt;border-top:none;border-left:none;
  border-bottom:solid windowtext 1.0pt;border-right:solid windowtext 1.0pt;
  padding:0in 5.4pt 0in 5.4pt;height:39.25pt'>
  <p class=MsoNormal align=right style='margin-bottom:0in;text-align:right;
  line-height:normal'><span lang=EN-US style='font-size:10.0pt;font-family:
  "Arial",sans-serif;mso-fareast-font-family:"Times New Roman";color:black'><span
  style='mso-spacerun:yes'>      </span>322.727 <o:p></o:p></span></p>
  </td>
  <td width=78 style='width:58.65pt;border-top:none;border-left:none;
  border-bottom:solid windowtext 1.0pt;border-right:solid windowtext 1.0pt;
  padding:0in 5.4pt 0in 5.4pt;height:39.25pt'>
  <p class=MsoNormal align=right style='margin-bottom:0in;text-align:right;
  line-height:normal'><span lang=EN-US style='font-size:10.0pt;font-family:
  "Arial",sans-serif;mso-fareast-font-family:"Times New Roman";color:black'><span
  style='mso-spacerun:yes'>      </span>355.000 <o:p></o:p></span></p>
  </td>
 </tr>
 <tr style='mso-yfti-irow:17;height:15.8pt'>
  <td width=38 style='width:28.45pt;border:solid windowtext 1.0pt;border-top:
  none;padding:0in 5.4pt 0in 5.4pt;height:15.8pt'>
  <p class=MsoNormal align=center style='margin-bottom:0in;text-align:center;
  line-height:normal'><span lang=EN-US style='font-size:10.0pt;font-family:
  "Arial",sans-serif;mso-fareast-font-family:"Times New Roman";color:black'>17<o:p></o:p></span></p>
  </td>
  <td width=452 style='width:338.8pt;border-top:none;border-left:none;
  border-bottom:solid windowtext 1.0pt;border-right:solid windowtext 1.0pt;
  padding:0in 5.4pt 0in 5.4pt;height:15.8pt'>
  <p class=MsoNormal style='margin-bottom:0in;text-align:justify;line-height:
  normal'><b><span lang=EN-US style='font-size:10.0pt;font-family:"Arial",sans-serif;
  mso-fareast-font-family:"Times New Roman";color:black'>Active Men Plus: </span></b><span
  lang=EN-US style='font-size:10.0pt;font-family:"Arial",sans-serif;mso-fareast-font-family:
  "Times New Roman";color:black'>S&#7843;n ph&#7849;m h&#7895; tr&#7907; tãng
  sinh l&yacute; nam gi&#7899;i (H&#7897;p 30 viên)<b><o:p></o:p></b></span></p>
  </td>
  <td width=78 nowrap style='width:58.65pt;border-top:none;border-left:none;
  border-bottom:solid windowtext 1.0pt;border-right:solid windowtext 1.0pt;
  padding:0in 5.4pt 0in 5.4pt;height:15.8pt'>
  <p class=MsoNormal align=right style='margin-bottom:0in;text-align:right;
  line-height:normal'><span lang=EN-US style='font-size:10.0pt;font-family:
  "Arial",sans-serif;mso-fareast-font-family:"Times New Roman";color:black'><span
  style='mso-spacerun:yes'>      </span>454.545 <o:p></o:p></span></p>
  </td>
  <td width=78 style='width:58.65pt;border-top:none;border-left:none;
  border-bottom:solid windowtext 1.0pt;border-right:solid windowtext 1.0pt;
  padding:0in 5.4pt 0in 5.4pt;height:15.8pt'>
  <p class=MsoNormal align=right style='margin-bottom:0in;text-align:right;
  line-height:normal'><span lang=EN-US style='font-size:10.0pt;font-family:
  "Arial",sans-serif;mso-fareast-font-family:"Times New Roman";color:black'><span
  style='mso-spacerun:yes'>      </span>500.000 <o:p></o:p></span></p>
  </td>
 </tr>
 <tr style='mso-yfti-irow:18;height:15.8pt'>
  <td width=38 style='width:28.45pt;border:solid windowtext 1.0pt;border-top:
  none;padding:0in 5.4pt 0in 5.4pt;height:15.8pt'>
  <p class=MsoNormal align=center style='margin-bottom:0in;text-align:center;
  line-height:normal'><span lang=EN-US style='font-size:10.0pt;font-family:
  "Arial",sans-serif;mso-fareast-font-family:"Times New Roman";color:black'>18<o:p></o:p></span></p>
  </td>
  <td width=452 style='width:338.8pt;border-top:none;border-left:none;
  border-bottom:solid windowtext 1.0pt;border-right:solid windowtext 1.0pt;
  padding:0in 5.4pt 0in 5.4pt;height:15.8pt'>
  <p class=MsoNormal style='margin-bottom:0in;text-align:justify;line-height:
  normal'><b><span lang=EN-US style='font-size:10.0pt;font-family:"Arial",sans-serif;
  mso-fareast-font-family:"Times New Roman";color:black'>Thymepect for kids:</span></b><span
  lang=EN-US style='font-size:10.0pt;font-family:"Arial",sans-serif;mso-fareast-font-family:
  "Times New Roman";color:black'> Long ð&#7901;m, di&#7879;t khu&#7849;n,
  gi&#7843;m ho (H&#7897;p 1 chai 100ml)<b><o:p></o:p></b></span></p>
  </td>
  <td width=78 nowrap style='width:58.65pt;border-top:none;border-left:none;
  border-bottom:solid windowtext 1.0pt;border-right:solid windowtext 1.0pt;
  padding:0in 5.4pt 0in 5.4pt;height:15.8pt'>
  <p class=MsoNormal align=right style='margin-bottom:0in;text-align:right;
  line-height:normal'><span lang=EN-US style='font-size:10.0pt;font-family:
  "Arial",sans-serif;mso-fareast-font-family:"Times New Roman";color:black'><span
  style='mso-spacerun:yes'>      </span>200.000 <o:p></o:p></span></p>
  </td>
  <td width=78 style='width:58.65pt;border-top:none;border-left:none;
  border-bottom:solid windowtext 1.0pt;border-right:solid windowtext 1.0pt;
  padding:0in 5.4pt 0in 5.4pt;height:15.8pt'>
  <p class=MsoNormal align=right style='margin-bottom:0in;text-align:right;
  line-height:normal'><span lang=EN-US style='font-size:10.0pt;font-family:
  "Arial",sans-serif;mso-fareast-font-family:"Times New Roman";color:black'><span
  style='mso-spacerun:yes'>      </span>220.000 <o:p></o:p></span></p>
  </td>
 </tr>
 <tr style='mso-yfti-irow:19;height:26.4pt'>
  <td width=38 style='width:28.45pt;border:solid windowtext 1.0pt;border-top:
  none;padding:0in 5.4pt 0in 5.4pt;height:26.4pt'>
  <p class=MsoNormal align=center style='margin-bottom:0in;text-align:center;
  line-height:normal'><span lang=EN-US style='font-size:10.0pt;font-family:
  "Arial",sans-serif;mso-fareast-font-family:"Times New Roman";color:black'>19<o:p></o:p></span></p>
  </td>
  <td width=452 style='width:338.8pt;border-top:none;border-left:none;
  border-bottom:solid windowtext 1.0pt;border-right:solid windowtext 1.0pt;
  padding:0in 5.4pt 0in 5.4pt;height:26.4pt'>
  <p class=MsoNormal style='margin-bottom:0in;text-align:justify;line-height:
  normal'><b><span lang=EN-US style='font-size:10.0pt;font-family:"Arial",sans-serif;
  mso-fareast-font-family:"Times New Roman";color:black'>Calciovin Liquid:</span></b><span
  lang=EN-US style='font-size:10.0pt;font-family:"Arial",sans-serif;mso-fareast-font-family:
  "Times New Roman";color:black'> H&#7895; tr&#7907; h&#7879; rãng, xýõng
  h&igrave;nh thành và phát tri&#7875;n v&#7919;ng ch&#7855;c, kh&#7887;e
  m&#7841;nh. (H&#7897;p 1 chai 200ml)<b><o:p></o:p></b></span></p>
  </td>
  <td width=78 nowrap style='width:58.65pt;border-top:none;border-left:none;
  border-bottom:solid windowtext 1.0pt;border-right:solid windowtext 1.0pt;
  padding:0in 5.4pt 0in 5.4pt;height:26.4pt'>
  <p class=MsoNormal align=right style='margin-bottom:0in;text-align:right;
  line-height:normal'><span lang=EN-US style='font-size:10.0pt;font-family:
  "Arial",sans-serif;mso-fareast-font-family:"Times New Roman";color:black'><span
  style='mso-spacerun:yes'>      </span>416.364 <o:p></o:p></span></p>
  </td>
  <td width=78 style='width:58.65pt;border-top:none;border-left:none;
  border-bottom:solid windowtext 1.0pt;border-right:solid windowtext 1.0pt;
  padding:0in 5.4pt 0in 5.4pt;height:26.4pt'>
  <p class=MsoNormal align=right style='margin-bottom:0in;text-align:right;
  line-height:normal'><span lang=EN-US style='font-size:10.0pt;font-family:
  "Arial",sans-serif;mso-fareast-font-family:"Times New Roman";color:black'><span
  style='mso-spacerun:yes'>      </span>458.000 <o:p></o:p></span></p>
  </td>
 </tr>
 <tr style='mso-yfti-irow:20;height:26.4pt'>
  <td width=38 style='width:28.45pt;border:solid windowtext 1.0pt;border-top:
  none;padding:0in 5.4pt 0in 5.4pt;height:26.4pt'>
  <p class=MsoNormal align=center style='margin-bottom:0in;text-align:center;
  line-height:normal'><span lang=EN-US style='font-size:10.0pt;font-family:
  "Arial",sans-serif;mso-fareast-font-family:"Times New Roman";color:black'>20<o:p></o:p></span></p>
  </td>
  <td width=452 style='width:338.8pt;border-top:none;border-left:none;
  border-bottom:solid windowtext 1.0pt;border-right:solid windowtext 1.0pt;
  padding:0in 5.4pt 0in 5.4pt;height:26.4pt'>
  <p class=MsoNormal style='margin-bottom:0in;text-align:justify;line-height:
  normal'><b><span lang=EN-US style='font-size:10.0pt;font-family:"Arial",sans-serif;
  mso-fareast-font-family:"Times New Roman";color:black'>Kinder Omega-3 Syrup:</span></b><span
  lang=EN-US style='font-size:10.0pt;font-family:"Arial",sans-serif;mso-fareast-font-family:
  "Times New Roman";color:black'> H&#7895; tr&#7907; s&#7921; phát tri&#7875;n
  n&atilde;o b&#7897; và kh&#7843; nãng nh&#7853;n th&#7913;c, h&#7895;
  tr&#7907; tr&#7883; tãng ð&#7897;ng và gi&#7843;m chú &yacute; (H&#7897;p 1
  chai 250ml)<b><o:p></o:p></b></span></p>
  </td>
  <td width=78 nowrap style='width:58.65pt;border-top:none;border-left:none;
  border-bottom:solid windowtext 1.0pt;border-right:solid windowtext 1.0pt;
  padding:0in 5.4pt 0in 5.4pt;height:26.4pt'>
  <p class=MsoNormal align=right style='margin-bottom:0in;text-align:right;
  line-height:normal'><span lang=EN-US style='font-size:10.0pt;font-family:
  "Arial",sans-serif;mso-fareast-font-family:"Times New Roman";color:black'><span
  style='mso-spacerun:yes'>      </span>441.818 <o:p></o:p></span></p>
  </td>
  <td width=78 style='width:58.65pt;border-top:none;border-left:none;
  border-bottom:solid windowtext 1.0pt;border-right:solid windowtext 1.0pt;
  padding:0in 5.4pt 0in 5.4pt;height:26.4pt'>
  <p class=MsoNormal align=right style='margin-bottom:0in;text-align:right;
  line-height:normal'><span lang=EN-US style='font-size:10.0pt;font-family:
  "Arial",sans-serif;mso-fareast-font-family:"Times New Roman";color:black'><span
  style='mso-spacerun:yes'>      </span>486.000 <o:p></o:p></span></p>
  </td>
 </tr>
 <tr style='mso-yfti-irow:21;height:26.4pt'>
  <td width=38 style='width:28.45pt;border:solid windowtext 1.0pt;border-top:
  none;padding:0in 5.4pt 0in 5.4pt;height:26.4pt'>
  <p class=MsoNormal align=center style='margin-bottom:0in;text-align:center;
  line-height:normal'><span lang=EN-US style='font-size:10.0pt;font-family:
  "Arial",sans-serif;mso-fareast-font-family:"Times New Roman";color:black'>21<o:p></o:p></span></p>
  </td>
  <td width=452 style='width:338.8pt;border-top:none;border-left:none;
  border-bottom:solid windowtext 1.0pt;border-right:solid windowtext 1.0pt;
  padding:0in 5.4pt 0in 5.4pt;height:26.4pt'>
  <p class=MsoNormal style='margin-bottom:0in;text-align:justify;line-height:
  normal'><b><span lang=EN-US style='font-size:10.0pt;font-family:"Arial",sans-serif;
  mso-fareast-font-family:"Times New Roman";color:black'>Iron drops: </span></b><span
  lang=EN-US style='font-size:10.0pt;font-family:"Arial",sans-serif;mso-fareast-font-family:
  "Times New Roman";color:black'>B&#7893; sung mu&#7889;i s&#7855;t giúp
  gi&#7843;m nguy cõ thi&#7871;u máu do thi&#7871;u s&#7855;t &#7903; tr&#7867;
  em ho&#7863;c ngý&#7901;i l&#7899;n. (H&#7897;p 1 chai 30ml)<b><o:p></o:p></b></span></p>
  </td>
  <td width=78 nowrap style='width:58.65pt;border-top:none;border-left:none;
  border-bottom:solid windowtext 1.0pt;border-right:solid windowtext 1.0pt;
  padding:0in 5.4pt 0in 5.4pt;height:26.4pt'>
  <p class=MsoNormal align=right style='margin-bottom:0in;text-align:right;
  line-height:normal'><span lang=EN-US style='font-size:10.0pt;font-family:
  "Arial",sans-serif;mso-fareast-font-family:"Times New Roman";color:black'><span
  style='mso-spacerun:yes'>      </span>270.909 <o:p></o:p></span></p>
  </td>
  <td width=78 style='width:58.65pt;border-top:none;border-left:none;
  border-bottom:solid windowtext 1.0pt;border-right:solid windowtext 1.0pt;
  padding:0in 5.4pt 0in 5.4pt;height:26.4pt'>
  <p class=MsoNormal align=right style='margin-bottom:0in;text-align:right;
  line-height:normal'><span lang=EN-US style='font-size:10.0pt;font-family:
  "Arial",sans-serif;mso-fareast-font-family:"Times New Roman";color:black'><span
  style='mso-spacerun:yes'>      </span>298.000 <o:p></o:p></span></p>
  </td>
 </tr>
 <tr style='mso-yfti-irow:22;height:26.4pt'>
  <td width=38 style='width:28.45pt;border:solid windowtext 1.0pt;border-top:
  none;padding:0in 5.4pt 0in 5.4pt;height:26.4pt'>
  <p class=MsoNormal align=center style='margin-bottom:0in;text-align:center;
  line-height:normal'><span lang=EN-US style='font-size:10.0pt;font-family:
  "Arial",sans-serif;mso-fareast-font-family:"Times New Roman";color:black'>22<o:p></o:p></span></p>
  </td>
  <td width=452 style='width:338.8pt;border-top:none;border-left:none;
  border-bottom:solid windowtext 1.0pt;border-right:solid windowtext 1.0pt;
  padding:0in 5.4pt 0in 5.4pt;height:26.4pt'>
  <p class=MsoNormal style='margin-bottom:0in;text-align:justify;line-height:
  normal'><b><span lang=EN-US style='font-size:10.0pt;font-family:"Arial",sans-serif;
  mso-fareast-font-family:"Times New Roman";color:black'>Cinnamon Vitamins:</span></b><span
  lang=EN-US style='font-size:10.0pt;font-family:"Arial",sans-serif;mso-fareast-font-family:
  "Times New Roman";color:black'> &#7892;n ð&#7883;nh ðý&#7901;ng huy&#7871;t,
  ph&ograve;ng b&#7879;nh ti&#7875;u ðý&#7901;ng, gi&#7843;m bi&#7871;n
  ch&#7913;ng ti&#7875;u ðý&#7901;ng <span class=GramE>( H&#7897;p</span> 2
  v&#7881; * 15 viên)<b><o:p></o:p></b></span></p>
  </td>
  <td width=78 nowrap style='width:58.65pt;border-top:none;border-left:none;
  border-bottom:solid windowtext 1.0pt;border-right:solid windowtext 1.0pt;
  padding:0in 5.4pt 0in 5.4pt;height:26.4pt'>
  <p class=MsoNormal align=right style='margin-bottom:0in;text-align:right;
  line-height:normal'><span lang=EN-US style='font-size:10.0pt;font-family:
  "Arial",sans-serif;mso-fareast-font-family:"Times New Roman";color:black'><span
  style='mso-spacerun:yes'>      </span>313.636 <o:p></o:p></span></p>
  </td>
  <td width=78 style='width:58.65pt;border-top:none;border-left:none;
  border-bottom:solid windowtext 1.0pt;border-right:solid windowtext 1.0pt;
  padding:0in 5.4pt 0in 5.4pt;height:26.4pt'>
  <p class=MsoNormal align=right style='margin-bottom:0in;text-align:right;
  line-height:normal'><span lang=EN-US style='font-size:10.0pt;font-family:
  "Arial",sans-serif;mso-fareast-font-family:"Times New Roman";color:black'><span
  style='mso-spacerun:yes'>      </span>345.000 <o:p></o:p></span></p>
  </td>
 </tr>
 <tr style='mso-yfti-irow:23;height:15.8pt'>
  <td width=38 style='width:28.45pt;border:solid windowtext 1.0pt;border-top:
  none;padding:0in 5.4pt 0in 5.4pt;height:15.8pt'>
  <p class=MsoNormal align=center style='margin-bottom:0in;text-align:center;
  line-height:normal'><span lang=EN-US style='font-size:10.0pt;font-family:
  "Arial",sans-serif;mso-fareast-font-family:"Times New Roman";color:black'>23<o:p></o:p></span></p>
  </td>
  <td width=452 style='width:338.8pt;border-top:none;border-left:none;
  border-bottom:solid windowtext 1.0pt;border-right:solid windowtext 1.0pt;
  padding:0in 5.4pt 0in 5.4pt;height:15.8pt'>
  <p class=MsoNormal style='margin-bottom:0in;text-align:justify;line-height:
  normal'><b><span lang=EN-US style='font-size:10.0pt;font-family:"Arial",sans-serif;
  mso-fareast-font-family:"Times New Roman";color:black'>Belle Hairnakin:</span></b><span
  lang=EN-US style='font-size:10.0pt;font-family:"Arial",sans-serif;mso-fareast-font-family:
  "Times New Roman";color:black'> Làm ð&#7865;p da, tóc, móng (H&#7897;p 30 <span
  class=GramE>viên )</span><b><o:p></o:p></b></span></p>
  </td>
  <td width=78 nowrap style='width:58.65pt;border-top:none;border-left:none;
  border-bottom:solid windowtext 1.0pt;border-right:solid windowtext 1.0pt;
  padding:0in 5.4pt 0in 5.4pt;height:15.8pt'>
  <p class=MsoNormal align=right style='margin-bottom:0in;text-align:right;
  line-height:normal'><span lang=EN-US style='font-size:10.0pt;font-family:
  "Arial",sans-serif;mso-fareast-font-family:"Times New Roman";color:black'><span
  style='mso-spacerun:yes'>      </span>360.000 <o:p></o:p></span></p>
  </td>
  <td width=78 style='width:58.65pt;border-top:none;border-left:none;
  border-bottom:solid windowtext 1.0pt;border-right:solid windowtext 1.0pt;
  padding:0in 5.4pt 0in 5.4pt;height:15.8pt'>
  <p class=MsoNormal align=right style='margin-bottom:0in;text-align:right;
  line-height:normal'><span lang=EN-US style='font-size:10.0pt;font-family:
  "Arial",sans-serif;mso-fareast-font-family:"Times New Roman";color:black'><span
  style='mso-spacerun:yes'>      </span>396.000 <o:p></o:p></span></p>
  </td>
 </tr>
 <tr style='mso-yfti-irow:24;height:26.4pt'>
  <td width=38 style='width:28.45pt;border:solid windowtext 1.0pt;border-top:
  none;padding:0in 5.4pt 0in 5.4pt;height:26.4pt'>
  <p class=MsoNormal align=center style='margin-bottom:0in;text-align:center;
  line-height:normal'><span lang=EN-US style='font-size:10.0pt;font-family:
  "Arial",sans-serif;mso-fareast-font-family:"Times New Roman";color:black'>24<o:p></o:p></span></p>
  </td>
  <td width=452 style='width:338.8pt;border-top:none;border-left:none;
  border-bottom:solid windowtext 1.0pt;border-right:solid windowtext 1.0pt;
  padding:0in 5.4pt 0in 5.4pt;height:26.4pt'>
  <p class=MsoNormal style='margin-bottom:0in;text-align:justify;line-height:
  normal'><b><span lang=EN-US style='font-size:10.0pt;font-family:"Arial",sans-serif;
  mso-fareast-font-family:"Times New Roman";color:black'>Hair plus:</span></b><span
  lang=EN-US style='font-size:10.0pt;font-family:"Arial",sans-serif;mso-fareast-font-family:
  "Times New Roman";color:black'> B&#7893; sung dý&#7905;ng ch&#7845;t: giúp
  dý&#7905;ng tóc, tóc m&#7885;c ch&#7855;c kh&#7887;e, ngãn ng&#7915;a
  r&#7909;ng tóc (H&#7897;p 3 v&#7881; * 10 viên)<b><o:p></o:p></b></span></p>
  </td>
  <td width=78 nowrap style='width:58.65pt;border-top:none;border-left:none;
  border-bottom:solid windowtext 1.0pt;border-right:solid windowtext 1.0pt;
  padding:0in 5.4pt 0in 5.4pt;height:26.4pt'>
  <p class=MsoNormal align=right style='margin-bottom:0in;text-align:right;
  line-height:normal'><span lang=EN-US style='font-size:10.0pt;font-family:
  "Arial",sans-serif;mso-fareast-font-family:"Times New Roman";color:black'><span
  style='mso-spacerun:yes'>      </span>495.455 <o:p></o:p></span></p>
  </td>
  <td width=78 style='width:58.65pt;border-top:none;border-left:none;
  border-bottom:solid windowtext 1.0pt;border-right:solid windowtext 1.0pt;
  padding:0in 5.4pt 0in 5.4pt;height:26.4pt'>
  <p class=MsoNormal align=right style='margin-bottom:0in;text-align:right;
  line-height:normal'><span lang=EN-US style='font-size:10.0pt;font-family:
  "Arial",sans-serif;mso-fareast-font-family:"Times New Roman";color:black'><span
  style='mso-spacerun:yes'>      </span>545.000 <o:p></o:p></span></p>
  </td>
 </tr>
 <tr style='mso-yfti-irow:25;mso-yfti-lastrow:yes;height:26.4pt'>
  <td width=38 style='width:28.45pt;border:solid windowtext 1.0pt;border-top:
  none;padding:0in 5.4pt 0in 5.4pt;height:26.4pt'>
  <p class=MsoNormal align=center style='margin-bottom:0in;text-align:center;
  line-height:normal'><span lang=EN-US style='font-size:10.0pt;font-family:
  "Arial",sans-serif;mso-fareast-font-family:"Times New Roman";color:black'>25<o:p></o:p></span></p>
  </td>
  <td width=452 style='width:338.8pt;border-top:none;border-left:none;
  border-bottom:solid windowtext 1.0pt;border-right:solid windowtext 1.0pt;
  padding:0in 5.4pt 0in 5.4pt;height:26.4pt'>
  <p class=MsoNormal style='margin-bottom:0in;text-align:justify;line-height:
  normal'><b><span lang=EN-US style='font-size:10.0pt;font-family:"Arial",sans-serif;
  mso-fareast-font-family:"Times New Roman";color:black'>Anti stress:</span></b><span
  lang=EN-US style='font-size:10.0pt;font-family:"Arial",sans-serif;mso-fareast-font-family:
  "Times New Roman";color:black'> Gi&#7843;m cãng th&#7859;ng, gi&#7843;m ðau
  ð&#7847;u, Tãng trí nh&#7899;, tãng tu&#7847;n hoàn, ng&#7915;a ð&#7897;t
  qu&#7925;, giúp d&#7877; ng&#7911;, ng&#7911; ngon (H&#7897;p 2 v&#7881; * 15
  viên)<b><o:p></o:p></b></span></p>
  </td>
  <td width=78 nowrap style='width:58.65pt;border-top:none;border-left:none;
  border-bottom:solid windowtext 1.0pt;border-right:solid windowtext 1.0pt;
  padding:0in 5.4pt 0in 5.4pt;height:26.4pt'>
  <p class=MsoNormal align=right style='margin-bottom:0in;text-align:right;
  line-height:normal'><span lang=EN-US style='font-size:10.0pt;font-family:
  "Arial",sans-serif;mso-fareast-font-family:"Times New Roman";color:black'><span
  style='mso-spacerun:yes'>      </span>304.545 <o:p></o:p></span></p>
  </td>
  <td width=78 style='width:58.65pt;border-top:none;border-left:none;
  border-bottom:solid windowtext 1.0pt;border-right:solid windowtext 1.0pt;
  padding:0in 5.4pt 0in 5.4pt;height:26.4pt'>
  <p class=MsoNormal align=right style='margin-bottom:0in;text-align:right;
  line-height:normal'><span lang=EN-US style='font-size:10.0pt;font-family:
  "Arial",sans-serif;mso-fareast-font-family:"Times New Roman";color:black'><span
  style='mso-spacerun:yes'>      </span>335.000 <o:p></o:p></span></p>
  </td>
 </tr>
</table>

<p class=MsoNormal style='margin-bottom:0in;line-height:120%'><b
style='mso-bidi-font-weight:normal'><span lang=EN-US style='font-size:10.0pt;
line-height:120%;font-family:"Arial",sans-serif;color:black;mso-themecolor:
text1'>CHÍNH SÁCH BÁN HÀNG</span></b><b style='mso-bidi-font-weight:normal'><span
style='font-size:10.0pt;line-height:120%;font-family:"Arial",sans-serif;
color:black;mso-themecolor:text1;mso-ansi-language:VI'> NHÓM S&#7842;N PH&#7848;M
TRUY&#7872;N THÔNG</span></b><b style='mso-bidi-font-weight:normal'><span
lang=EN-US style='font-size:10.0pt;line-height:120%;font-family:"Arial",sans-serif;
color:black;mso-themecolor:text1'>.<i style='mso-bidi-font-style:normal'><o:p></o:p></i></span></b></p>

<p class=MsoNormal style='margin-top:0in;margin-right:0in;margin-bottom:0in;
margin-left:21.3pt;text-align:justify;text-indent:-21.3pt;line-height:16.0pt;
mso-line-height-rule:exactly'><b style='mso-bidi-font-weight:normal'><span
lang=EN-US style='font-size:10.0pt;font-family:"Arial",sans-serif'>I. Doanh s&#7889;
cam k&#7871;t tháng</span></b><span lang=EN-US style='font-size:10.0pt;
font-family:"Arial",sans-serif'>: ……………………………</span><span style='font-size:
10.0pt;font-family:"Arial",sans-serif;mso-ansi-language:VI'>....................</span><span
lang=EN-US style='font-size:10.0pt;font-family:"Arial",sans-serif'>ð&#7891;ng
(không bao g&#7891;m thu&#7871; VAT)<o:p></o:p></span></p>

<p class=MsoNormal style='margin-top:0in;margin-right:0in;margin-bottom:0in;
margin-left:21.3pt;text-align:justify;text-indent:-21.3pt;line-height:16.0pt;
mso-line-height-rule:exactly'><b style='mso-bidi-font-weight:normal'><span
lang=EN-US style='font-size:10.0pt;font-family:"Arial",sans-serif'>II. Chính
sách bán hàng:<o:p></o:p></span></b></p>

<p class=MsoNormal style='margin-bottom:0in;text-align:justify;line-height:
16.0pt;mso-line-height-rule:exactly'><b style='mso-bidi-font-weight:normal'><span
lang=EN-US style='font-size:10.0pt;font-family:"Arial",sans-serif'>2.1. Bên B
ðý&#7907;c hý&#7903;ng chi&#7871;t kh&#7845;u </span></b><b style='mso-bidi-font-weight:
normal'><span style='font-size:10.0pt;font-family:"Arial",sans-serif;
mso-ansi-language:VI'>thýõng m&#7841;i </span></b><b style='mso-bidi-font-weight:
normal'><span lang=EN-US style='font-size:10.0pt;font-family:"Arial",sans-serif'>ngay
trên ðõn hàng:</span></b><span lang=EN-US style='font-size:10.0pt;font-family:
"Arial",sans-serif'> Mua 5 h&#7897;p t&#7863;ng 1 h&#7897;p</span><span
lang=EN-US style='font-size:10.0pt;font-family:"Arial",sans-serif;mso-ansi-language:
VI'> </span><span lang=EN-US style='font-size:10.0pt;font-family:"Arial",sans-serif'>ð&#7889;i
v&#7899;i m&#7897;t lo&#7841;i s&#7843;n ph&#7849;m. </span><span
style='font-size:10.0pt;font-family:"Arial",sans-serif;mso-ansi-language:VI'><o:p></o:p></span></p>

<p class=MsoNormal style='margin-top:0in;margin-right:0in;margin-bottom:0in;
margin-left:21.25pt;text-align:justify;text-indent:-21.25pt;line-height:16.0pt;
mso-line-height-rule:exactly'><b style='mso-bidi-font-weight:normal'><span
lang=EN-US style='font-size:10.0pt;font-family:"Arial",sans-serif'>2.2. <span
style='color:black;mso-themecolor:text1;mso-bidi-font-weight:bold'>Ð&#7891;ng
th&#7901;i bên B ðý&#7907;c hý&#7903;ng chi&#7871;t kh&#7845;u</span></span></b><b><span
style='font-size:10.0pt;font-family:"Arial",sans-serif;color:black;mso-themecolor:
text1;mso-ansi-language:VI'> thýõng m&#7841;i b&#7857;ng ti&#7873;n</span></b><b><span
lang=EN-US style='font-size:10.0pt;font-family:"Arial",sans-serif;color:black;
mso-themecolor:text1'> ngay trên ðõn</span></b><span lang=EN-US
style='font-size:10.0pt;font-family:"Arial",sans-serif;color:black;mso-themecolor:
text1;mso-bidi-font-weight:bold'>:<o:p></o:p></span></p>

<p class=MsoNormal style='margin-top:0in;margin-right:0in;margin-bottom:0in;
margin-left:21.25pt;text-align:justify;text-indent:-21.25pt;line-height:16.0pt;
mso-line-height-rule:exactly'><span lang=EN-US style='font-size:10.0pt;
font-family:"Arial",sans-serif;color:black;mso-themecolor:text1'>+ Q1: Các ðõn
hàng trong qu&yacute; 1 s&#7869; ðý&#7907;c h&#7895; tr&#7907; thêm phí tý v&#7845;n
3% tr&#7915; ngay trên ðõn hàng<o:p></o:p></span></p>

<p class=MsoNormal style='margin-top:0in;margin-right:0in;margin-bottom:0in;
margin-left:21.25pt;text-align:justify;text-indent:-21.25pt;line-height:16.0pt;
mso-line-height-rule:exactly'><span lang=EN-US style='font-size:10.0pt;
font-family:"Arial",sans-serif;color:black;mso-themecolor:text1'>+ Q2: Các s&#7843;n
ph&#7849;m l&#7845;y thêm (active sau), thý&#7903;ng CK thêm 3% ngay trên ðõn
cho sp Active sau.<o:p></o:p></span></p>

<p class=MsoListParagraph style='margin-top:6.0pt;margin-right:0in;margin-bottom:
6.0pt;margin-left:21.3pt;mso-add-space:auto;text-align:justify;text-indent:
-21.3pt;line-height:120%;mso-list:l17 level2 lfo11'><![if !supportLists]><b><span
style='font-size:10.0pt;line-height:120%;font-family:"Arial",sans-serif;
mso-fareast-font-family:Arial;mso-ansi-language:VI'><span style='mso-list:Ignore'>2.4.<span
style='font:7.0pt "Times New Roman"'>&nbsp; </span></span></span></b><![endif]><b
style='mso-bidi-font-weight:normal'><span style='font-size:10.0pt;line-height:
120%;font-family:"Arial",sans-serif;mso-ansi-language:VI'>Bên B</span></b><b
style='mso-bidi-font-weight:normal'><span style='font-size:10.0pt;line-height:
120%;font-family:"Arial",sans-serif'> <span lang=EN-US>ðý&#7907;c hý&#7903;ng
chi&#7871;t kh&#7845;u </span></span></b><b style='mso-bidi-font-weight:normal'><span
style='font-size:10.0pt;line-height:120%;font-family:"Arial",sans-serif;
mso-ansi-language:VI'>thýõng m&#7841;i b&#7893; sung theo </span></b><b
style='mso-bidi-font-weight:normal'><span lang=EN-US style='font-size:10.0pt;
line-height:120%;font-family:"Arial",sans-serif'>Qu&yacute; </span></b><b
style='mso-bidi-font-weight:normal'><span style='font-size:10.0pt;line-height:
120%;font-family:"Arial",sans-serif;mso-ansi-language:VI'>khi ð&#7841;t<o:p></o:p></span></b></p>

<table class=MsoNormalTable border=0 cellspacing=0 cellpadding=0 width=643
 style='width:481.95pt;margin-left:13.95pt;border-collapse:collapse;mso-yfti-tbllook:
 1184;mso-padding-alt:0in 5.4pt 0in 5.4pt'>
 <tr style='mso-yfti-irow:0;mso-yfti-firstrow:yes;height:52.3pt'>
  <td width=231 style='width:173.0pt;border:solid windowtext 1.0pt;mso-border-alt:
  solid windowtext .5pt;background:#F2F2F2;padding:0in 5.4pt 0in 5.4pt;
  height:52.3pt'>
  <p class=MsoNormal align=center style='margin-bottom:0in;text-align:center;
  line-height:normal'><span lang=EN-US style='font-family:"Arial",sans-serif;
  mso-fareast-font-family:"Times New Roman";color:black'>Doanh s&#7889;
  Qu&yacute; ð&#7841;t m&#7913;c<o:p></o:p></span></p>
  </td>
  <td width=109 style='width:81.95pt;border:solid windowtext 1.0pt;border-left:
  none;mso-border-top-alt:solid windowtext .5pt;mso-border-bottom-alt:solid windowtext .5pt;
  mso-border-right-alt:solid windowtext .5pt;background:#F2F2F2;padding:0in 5.4pt 0in 5.4pt;
  height:52.3pt'>
  <p class=MsoNormal align=center style='margin-bottom:0in;text-align:center;
  line-height:normal'><span lang=EN-US style='font-size:10.0pt;font-family:
  "Arial",sans-serif;mso-fareast-font-family:"Times New Roman";color:black'><span
  style='mso-spacerun:yes'>             </span>4.500.000 <o:p></o:p></span></p>
  </td>
  <td width=104 style='width:78.15pt;border:solid windowtext 1.0pt;border-left:
  none;mso-border-top-alt:solid windowtext .5pt;mso-border-bottom-alt:solid windowtext .5pt;
  mso-border-right-alt:solid windowtext .5pt;background:#F2F2F2;padding:0in 5.4pt 0in 5.4pt;
  height:52.3pt'>
  <p class=MsoNormal align=center style='margin-bottom:0in;text-align:center;
  line-height:normal'><span lang=EN-US style='font-size:10.0pt;font-family:
  "Arial",sans-serif;mso-fareast-font-family:"Times New Roman";color:black'><span
  style='mso-spacerun:yes'>             </span>9.000.000 <o:p></o:p></span></p>
  </td>
  <td width=104 style='width:77.95pt;border:solid windowtext 1.0pt;border-left:
  none;mso-border-top-alt:solid windowtext .5pt;mso-border-bottom-alt:solid windowtext .5pt;
  mso-border-right-alt:solid windowtext .5pt;background:#F2F2F2;padding:0in 5.4pt 0in 5.4pt;
  height:52.3pt'>
  <p class=MsoNormal align=center style='margin-bottom:0in;text-align:center;
  line-height:normal'><span lang=EN-US style='font-size:10.0pt;font-family:
  "Arial",sans-serif;mso-fareast-font-family:"Times New Roman";color:black'><span
  style='mso-spacerun:yes'>           </span>15.000.000 <o:p></o:p></span></p>
  </td>
  <td width=95 style='width:70.9pt;border:solid windowtext 1.0pt;border-left:
  none;mso-border-top-alt:solid windowtext .5pt;mso-border-bottom-alt:solid windowtext .5pt;
  mso-border-right-alt:solid windowtext .5pt;background:#F2F2F2;padding:0in 5.4pt 0in 5.4pt;
  height:52.3pt'>
  <p class=MsoNormal align=center style='margin-bottom:0in;text-align:center;
  line-height:normal'><span lang=EN-US style='font-size:10.0pt;font-family:
  "Arial",sans-serif;mso-fareast-font-family:"Times New Roman";color:black'><span
  style='mso-spacerun:yes'>           </span>27.000.000 <o:p></o:p></span></p>
  </td>
 </tr>
 <tr style='mso-yfti-irow:1;mso-yfti-lastrow:yes;height:28.3pt'>
  <td width=231 style='width:173.0pt;border:solid windowtext 1.0pt;border-top:
  none;mso-border-left-alt:solid windowtext .5pt;mso-border-bottom-alt:solid windowtext .5pt;
  mso-border-right-alt:solid windowtext .5pt;background:#F2F2F2;padding:0in 5.4pt 0in 5.4pt;
  height:28.3pt'>
  <p class=MsoNormal align=center style='margin-bottom:0in;text-align:center;
  line-height:normal'><span lang=EN-US style='font-family:"Arial",sans-serif;
  mso-fareast-font-family:"Times New Roman";color:black'>% Chi&#7871;t
  kh&#7845;u ðý&#7907;c hý&#7903;ng<o:p></o:p></span></p>
  </td>
  <td width=109 style='width:81.95pt;border-top:none;border-left:none;
  border-bottom:solid windowtext 1.0pt;border-right:solid windowtext 1.0pt;
  mso-border-bottom-alt:solid windowtext .5pt;mso-border-right-alt:solid windowtext .5pt;
  padding:0in 5.4pt 0in 5.4pt;height:28.3pt'>
  <p class=MsoNormal align=center style='margin-bottom:0in;text-align:center;
  line-height:normal'><span lang=EN-US style='font-family:"Arial",sans-serif;
  mso-fareast-font-family:"Times New Roman";color:black'>2%<o:p></o:p></span></p>
  </td>
  <td width=104 style='width:78.15pt;border-top:none;border-left:none;
  border-bottom:solid windowtext 1.0pt;border-right:solid windowtext 1.0pt;
  mso-border-bottom-alt:solid windowtext .5pt;mso-border-right-alt:solid windowtext .5pt;
  padding:0in 5.4pt 0in 5.4pt;height:28.3pt'>
  <p class=MsoNormal align=center style='margin-bottom:0in;text-align:center;
  line-height:normal'><span lang=EN-US style='font-family:"Arial",sans-serif;
  mso-fareast-font-family:"Times New Roman";color:black'>3%<o:p></o:p></span></p>
  </td>
  <td width=104 style='width:77.95pt;border-top:none;border-left:none;
  border-bottom:solid windowtext 1.0pt;border-right:solid windowtext 1.0pt;
  mso-border-bottom-alt:solid windowtext .5pt;mso-border-right-alt:solid windowtext .5pt;
  padding:0in 5.4pt 0in 5.4pt;height:28.3pt'>
  <p class=MsoNormal align=center style='margin-bottom:0in;text-align:center;
  line-height:normal'><span lang=EN-US style='font-family:"Arial",sans-serif;
  mso-fareast-font-family:"Times New Roman";color:black'>4%<o:p></o:p></span></p>
  </td>
  <td width=95 style='width:70.9pt;border-top:none;border-left:none;border-bottom:
  solid windowtext 1.0pt;border-right:solid windowtext 1.0pt;mso-border-bottom-alt:
  solid windowtext .5pt;mso-border-right-alt:solid windowtext .5pt;padding:
  0in 5.4pt 0in 5.4pt;height:28.3pt'>
  <p class=MsoNormal align=center style='margin-bottom:0in;text-align:center;
  line-height:normal'><span lang=EN-US style='font-family:"Arial",sans-serif;
  mso-fareast-font-family:"Times New Roman";color:black'>5%<o:p></o:p></span></p>
  </td>
 </tr>
</table>

<p class=MsoNormal style='margin-bottom:0in;line-height:120%'><b
style='mso-bidi-font-weight:normal'><span lang=EN-US style='font-size:10.0pt;
line-height:120%;font-family:"Arial",sans-serif;color:black;mso-themecolor:
text1'><o:p>&nbsp;</o:p></span></b></p>

<p class=MsoNormal style='margin-bottom:0in;line-height:120%'><b
style='mso-bidi-font-weight:normal'><span lang=EN-US style='font-size:10.0pt;
line-height:120%;font-family:"Arial",sans-serif;color:black;mso-themecolor:
text1'>CHÍNH SÁCH BÁN HÀNG</span></b><b style='mso-bidi-font-weight:normal'><span
style='font-size:10.0pt;line-height:120%;font-family:"Arial",sans-serif;
color:black;mso-themecolor:text1;mso-ansi-language:VI'> NHÓM S&#7842;N PH&#7848;M
TÝ V&#7844;N</span></b><b style='mso-bidi-font-weight:normal'><span lang=EN-US
style='font-size:10.0pt;line-height:120%;font-family:"Arial",sans-serif;
color:black;mso-themecolor:text1'>.<i style='mso-bidi-font-style:normal'><o:p></o:p></i></span></b></p>

<p class=MsoNormal style='margin-top:0in;margin-right:0in;margin-bottom:0in;
margin-left:21.3pt;text-align:justify;text-indent:-21.3pt;line-height:16.0pt;
mso-line-height-rule:exactly'><b style='mso-bidi-font-weight:normal'><span
lang=EN-US style='font-size:10.0pt;font-family:"Arial",sans-serif'>I. Doanh s&#7889;
cam k&#7871;t tháng</span></b><span lang=EN-US style='font-size:10.0pt;
font-family:"Arial",sans-serif'>: ……………………………</span><span style='font-size:
10.0pt;font-family:"Arial",sans-serif;mso-ansi-language:VI'>....................</span><span
lang=EN-US style='font-size:10.0pt;font-family:"Arial",sans-serif'>ð&#7891;ng
(không bao g&#7891;m thu&#7871; VAT)<o:p></o:p></span></p>

<p class=MsoNormal style='margin-top:0in;margin-right:0in;margin-bottom:0in;
margin-left:21.3pt;text-align:justify;text-indent:-21.3pt;line-height:16.0pt;
mso-line-height-rule:exactly'><b style='mso-bidi-font-weight:normal'><span
lang=EN-US style='font-size:10.0pt;font-family:"Arial",sans-serif'>II. Chính
sách bán hàng:<o:p></o:p></span></b></p>

<p class=MsoNormal style='margin-bottom:0in;text-align:justify;line-height:
16.0pt;mso-line-height-rule:exactly'><b style='mso-bidi-font-weight:normal'><span
lang=EN-US style='font-size:10.0pt;font-family:"Arial",sans-serif'>2.1. Bên B
ðý&#7907;c hý&#7903;ng chi&#7871;t kh&#7845;u </span></b><b style='mso-bidi-font-weight:
normal'><span style='font-size:10.0pt;font-family:"Arial",sans-serif;
mso-ansi-language:VI'>thýõng m&#7841;i </span></b><b style='mso-bidi-font-weight:
normal'><span lang=EN-US style='font-size:10.0pt;font-family:"Arial",sans-serif'>ngay
trên ðõn hàng:</span></b><span lang=EN-US style='font-size:10.0pt;font-family:
"Arial",sans-serif'> Mua 5 h&#7897;p t&#7863;ng 1 h&#7897;p</span><span
lang=EN-US style='font-size:10.0pt;font-family:"Arial",sans-serif;mso-ansi-language:
VI'> </span><span lang=EN-US style='font-size:10.0pt;font-family:"Arial",sans-serif'>ð&#7889;i
v&#7899;i m&#7897;t lo&#7841;i s&#7843;n ph&#7849;m. </span><span
style='font-size:10.0pt;font-family:"Arial",sans-serif;mso-ansi-language:VI'><o:p></o:p></span></p>

<p class=MsoNormal style='margin-bottom:0in;text-align:justify;line-height:
16.0pt;mso-line-height-rule:exactly'><b style='mso-bidi-font-weight:normal'><span
lang=EN-US style='font-size:10.0pt;font-family:"Arial",sans-serif'>2.2. <span
style='color:black;mso-themecolor:text1;mso-bidi-font-weight:bold'>Ð&#7891;ng
th&#7901;i bên B ðý&#7907;c hý&#7903;ng chi&#7871;t kh&#7845;u</span></span></b><b><span
style='font-size:10.0pt;font-family:"Arial",sans-serif;color:black;mso-themecolor:
text1;mso-ansi-language:VI'> thýõng m&#7841;i b&#7857;ng ti&#7873;n</span></b><b><span
lang=EN-US style='font-size:10.0pt;font-family:"Arial",sans-serif;color:black;
mso-themecolor:text1'> ngay trên ðõn</span></b><span lang=EN-US
style='font-size:10.0pt;font-family:"Arial",sans-serif;color:black;mso-themecolor:
text1;mso-bidi-font-weight:bold'>:</span><span style='font-size:10.0pt;
font-family:"Arial",sans-serif;color:black;mso-themecolor:text1;mso-ansi-language:
VI;mso-bidi-font-weight:bold'> Chi&#7871;t kh&#7845;u thýõng m&#7841;i thêm 3%
ngay trên ðõn hàng<o:p></o:p></span></p>

<p class=MsoListParagraph style='margin-top:6.0pt;margin-right:0in;margin-bottom:
6.0pt;margin-left:21.3pt;mso-add-space:auto;text-align:justify;text-indent:
-21.3pt;line-height:120%;mso-list:l17 level2 lfo11'><![if !supportLists]><b><span
style='font-size:10.0pt;line-height:120%;font-family:"Arial",sans-serif;
mso-fareast-font-family:Arial;mso-ansi-language:VI'><span style='mso-list:Ignore'>2.5.<span
style='font:7.0pt "Times New Roman"'>&nbsp; </span></span></span></b><![endif]><b
style='mso-bidi-font-weight:normal'><span style='font-size:10.0pt;line-height:
120%;font-family:"Arial",sans-serif;mso-ansi-language:VI'>Bên B</span></b><b
style='mso-bidi-font-weight:normal'><span lang=EN-US style='font-size:10.0pt;
line-height:120%;font-family:"Arial",sans-serif'> ðý&#7907;c hý&#7903;ng chi&#7871;t
kh&#7845;u </span></b><b style='mso-bidi-font-weight:normal'><span
style='font-size:10.0pt;line-height:120%;font-family:"Arial",sans-serif;
mso-ansi-language:VI'>thýõng m&#7841;i b&#7893; sung theo </span></b><b
style='mso-bidi-font-weight:normal'><span lang=EN-US style='font-size:10.0pt;
line-height:120%;font-family:"Arial",sans-serif'>Qu&yacute; </span></b><b
style='mso-bidi-font-weight:normal'><span style='font-size:10.0pt;line-height:
120%;font-family:"Arial",sans-serif;mso-ansi-language:VI'>khi ð&#7841;t<o:p></o:p></span></b></p>

<table class=MsoNormalTable border=0 cellspacing=0 cellpadding=0 width=643
 style='width:481.95pt;margin-left:13.95pt;border-collapse:collapse;mso-yfti-tbllook:
 1184;mso-padding-alt:0in 5.4pt 0in 5.4pt'>
 <tr style='mso-yfti-irow:0;mso-yfti-firstrow:yes;height:52.7pt'>
  <td width=236 style='width:177.2pt;border:solid windowtext 1.0pt;mso-border-alt:
  solid windowtext .5pt;background:#F2F2F2;padding:0in 5.4pt 0in 5.4pt;
  height:52.7pt'>
  <p class=MsoNormal align=center style='margin-bottom:0in;text-align:center;
  line-height:normal'><span lang=EN-US style='font-family:"Arial",sans-serif;
  mso-fareast-font-family:"Times New Roman";color:black'>Doanh s&#7889;
  Qu&yacute; ð&#7841;t m&#7913;c<o:p></o:p></span></p>
  </td>
  <td width=406 style='width:304.75pt;border:solid windowtext 1.0pt;border-left:
  none;mso-border-top-alt:solid windowtext .5pt;mso-border-bottom-alt:solid windowtext .5pt;
  mso-border-right-alt:solid windowtext .5pt;background:#F2F2F2;padding:0in 5.4pt 0in 5.4pt;
  height:52.7pt'>
  <p class=MsoNormal align=center style='margin-bottom:0in;text-align:center;
  line-height:normal'><span lang=EN-US style='font-size:10.0pt;font-family:
  "Arial",sans-serif;mso-fareast-font-family:"Times New Roman";color:black'>……………………………………………………………..<o:p></o:p></span></p>
  </td>
 </tr>
 <tr style='mso-yfti-irow:1;mso-yfti-lastrow:yes;height:28.5pt'>
  <td width=236 style='width:177.2pt;border:solid windowtext 1.0pt;border-top:
  none;mso-border-left-alt:solid windowtext .5pt;mso-border-bottom-alt:solid windowtext .5pt;
  mso-border-right-alt:solid windowtext .5pt;background:#F2F2F2;padding:0in 5.4pt 0in 5.4pt;
  height:28.5pt'>
  <p class=MsoNormal align=center style='margin-bottom:0in;text-align:center;
  line-height:normal'><span lang=EN-US style='font-family:"Arial",sans-serif;
  mso-fareast-font-family:"Times New Roman";color:black'>% Chi&#7871;t
  kh&#7845;u ðý&#7907;c hý&#7903;ng<o:p></o:p></span></p>
  </td>
  <td width=406 style='width:304.75pt;border-top:none;border-left:none;
  border-bottom:solid windowtext 1.0pt;border-right:solid windowtext 1.0pt;
  mso-border-bottom-alt:solid windowtext .5pt;mso-border-right-alt:solid windowtext .5pt;
  padding:0in 5.4pt 0in 5.4pt;height:28.5pt'>
  <p class=MsoNormal align=center style='margin-bottom:0in;text-align:center;
  line-height:normal'><span lang=EN-US style='font-family:"Arial",sans-serif;
  mso-fareast-font-family:"Times New Roman";color:black'>………………………………………………………<o:p></o:p></span></p>
  </td>
 </tr>
</table>

<p class=MsoNormal style='margin-top:6.0pt;margin-right:0in;margin-bottom:6.0pt;
margin-left:0in;text-align:justify;line-height:120%'><span lang=EN-US
style='font-size:10.0pt;line-height:120%;font-family:"Arial",sans-serif'><o:p>&nbsp;</o:p></span></p>

<p class=MsoNormal style='margin-top:6.0pt;margin-right:0in;margin-bottom:6.0pt;
margin-left:0in;text-align:justify;line-height:120%'><b style='mso-bidi-font-weight:
normal'><span lang=EN-US style='font-size:10.0pt;line-height:120%;font-family:
"Arial",sans-serif'>2.</span></b><b style='mso-bidi-font-weight:normal'><span
style='font-size:10.0pt;line-height:120%;font-family:"Arial",sans-serif;
mso-ansi-language:VI'>4</span></b><b style='mso-bidi-font-weight:normal'><span
lang=EN-US style='font-size:10.0pt;line-height:120%;font-family:"Arial",sans-serif'>.</span></b><span
lang=EN-US style='font-size:10.0pt;line-height:120%;font-family:"Arial",sans-serif'>
<b style='mso-bidi-font-weight:normal'>Di&#7877;n gi&#7843;i n&#7897;i dung
chính sách:</b><o:p></o:p></span></p>

<p class=MsoListParagraphCxSpFirst style='margin-top:0in;margin-right:0in;
margin-bottom:0in;margin-left:57.3pt;mso-add-space:auto;text-align:justify;
text-indent:-.25in;line-height:16.0pt;mso-line-height-rule:exactly;mso-list:
l7 level1 lfo33'><![if !supportLists]><span lang=EN-US style='font-size:10.0pt;
font-family:Wingdings;mso-fareast-font-family:Wingdings;mso-bidi-font-family:
Wingdings'><span style='mso-list:Ignore'>Ø<span style='font:7.0pt "Times New Roman"'>&nbsp;
</span></span></span><![endif]><span lang=EN-US style='font-size:10.0pt;
font-family:"Arial",sans-serif'>Doanh s&#7889; (DS) tính theo [giá chýa bao g&#7891;m
GTGT (VAT) và ð&atilde; tr&#7915; ði các kho&#7843;n chi&#7871;t kh&#7845;u
trên ðõn] Công ty bán cho Ð&#7841;i l&yacute; (không bao g&#7891;m tr&#7883;
giá c&#7911;a ph&#7847;n hàng t&#7863;ng), ðý&#7907;c ghi nh&#7853;n theo ðõn ð&#7863;t
hàng trý&#7899;c 12h00 ngày làm vi&#7879;c cu&#7889;i cùng c&#7911;a tháng.<o:p></o:p></span></p>

<p class=MsoListParagraphCxSpMiddle style='margin-top:0in;margin-right:0in;
margin-bottom:0in;margin-left:57.3pt;mso-add-space:auto;text-align:justify;
text-indent:-.25in;line-height:16.0pt;mso-line-height-rule:exactly;mso-list:
l7 level1 lfo33'><![if !supportLists]><span lang=EN-US style='font-size:10.0pt;
font-family:Wingdings;mso-fareast-font-family:Wingdings;mso-bidi-font-family:
Wingdings'><span style='mso-list:Ignore'>Ø<span style='font:7.0pt "Times New Roman"'>&nbsp;
</span></span></span><![endif]><span lang=EN-US style='font-size:10.0pt;
font-family:"Arial",sans-serif'>Thý&#7903;ng doanh s&#7889; Qu&yacute; là kho&#7843;n
chi&#7871;t kh&#7845;u</span><span style='font-size:10.0pt;font-family:"Arial",sans-serif;
mso-ansi-language:VI'> thýõng m&#7841;i</span><span lang=EN-US
style='font-size:10.0pt;font-family:"Arial",sans-serif'> b&#7893; sung dành cho
các Ð&#7841;i l&yacute; có h&#7907;p tác t&#7915; 2 tháng m&#7895;i Qu&yacute;
và ð&atilde; hoàn thành doanh s&#7889; Qu&yacute;, ðý&#7907;c h&#7841;ch toán
và chi tr&#7843; (c&#7845;n tr&#7915;) vào l&#7847;n ð&#7863;t hàng c&#7911;a
ðõn hàng ð&#7847;u tiên c&#7911;a tháng k&#7871; ti&#7871;p. V&#7899;i khách
hàng sang Qu&yacute; sau d&#7915;ng h&#7907;p tác (ho&#7863;c x&#7843;y ra các
d&#7845;u hi&#7879;u ng&#7915;ng h&#7907;p tác (không active), thý&#7903;ng
doanh s&#7889; qu&yacute; s&#7869; ðý&#7907;c t&#7893;ng h&#7907;p và chi tr&#7843;
sau 01 tu&#7847;n.<o:p></o:p></span></p>

<p class=MsoListParagraphCxSpMiddle style='margin-top:0in;margin-right:0in;
margin-bottom:0in;margin-left:57.3pt;mso-add-space:auto;text-align:justify;
text-indent:-.25in;line-height:16.0pt;mso-line-height-rule:exactly;mso-list:
l7 level1 lfo33'><![if !supportLists]><span lang=EN-US style='font-size:10.0pt;
font-family:Wingdings;mso-fareast-font-family:Wingdings;mso-bidi-font-family:
Wingdings'><span style='mso-list:Ignore'>Ø<span style='font:7.0pt "Times New Roman"'>&nbsp;
</span></span></span><![endif]><span lang=EN-US style='font-size:10.0pt;
font-family:"Arial",sans-serif'>Các ÐL l&#7845;y hàng l&#7847;n ð&#7847;u tiên
trong nãm 2022 vào tháng th&#7913; 3 c&#7911;a Qu&yacute; n&#7871;u hoàn thành
luôn DS cam Qu&yacute; th&igrave; ðý&#7907;c nh&#7853;n thý&#7903;ng ngay trên
ðõn hàng ti&#7871;p theo c&#7911;a Qu&yacute; sau.<o:p></o:p></span></p>

<p class=MsoListParagraphCxSpMiddle style='margin-top:0in;margin-right:0in;
margin-bottom:0in;margin-left:57.3pt;mso-add-space:auto;text-align:justify;
text-indent:-.25in;line-height:16.0pt;mso-line-height-rule:exactly;mso-list:
l7 level1 lfo33'><![if !supportLists]><span lang=EN-US style='font-size:10.0pt;
font-family:Wingdings;mso-fareast-font-family:Wingdings;mso-bidi-font-family:
Wingdings'><span style='mso-list:Ignore'>Ø<span style='font:7.0pt "Times New Roman"'>&nbsp;
</span></span></span><![endif]><span lang=EN-US style='font-size:10.0pt;
font-family:"Arial",sans-serif'><span style='mso-spacerun:yes'> </span>Các kho&#7843;n
&quot;H&#7895; tr&#7907; thýõng m&#7841;i&quot; ðý&#7907;c th&#7921;c hi&#7879;n
theo B&#7843;n ðãng k&yacute; (ði&#7879;n t&#7917;) mà Ð&#7841;i l&yacute; (ho&#7863;c
TDV h&#7895; tr&#7907;) ðãng k&yacute; và g&#7917;i v&#7873; công ty<o:p></o:p></span></p>

<p class=MsoListParagraphCxSpMiddle style='margin-top:0in;margin-right:0in;
margin-bottom:0in;margin-left:57.3pt;mso-add-space:auto;text-align:justify;
text-indent:-.25in;line-height:16.0pt;mso-line-height-rule:exactly;mso-list:
l7 level1 lfo33'><![if !supportLists]><span lang=EN-US style='font-size:10.0pt;
font-family:Wingdings;mso-fareast-font-family:Wingdings;mso-bidi-font-family:
Wingdings'><span style='mso-list:Ignore'>Ø<span style='font:7.0pt "Times New Roman"'>&nbsp;
</span></span></span><![endif]><span lang=EN-US style='font-size:10.0pt;
font-family:"Arial",sans-serif'>Toàn b&#7897; các kho&#7843;n chi&#7871;t kh&#7845;u
và quy&#7873;n l&#7907;i thýõng m&#7841;i (3), (4), (5) ð&#7873;u ðý&#7907;c
công ty xu&#7845;t hóa ðõn GTGT h&#7841;ch toán thu&#7871; ð&#7847;y ð&#7911;
theo quy ð&#7883;nh c&#7911;a nhà ný&#7899;c.<o:p></o:p></span></p>

<p class=MsoListParagraph style='margin-top:0in;margin-right:0in;margin-bottom:
0in;margin-left:57.3pt;text-align:justify;text-indent:-.25in;line-height:16.0pt;
mso-line-height-rule:exactly;mso-list:l7 level1 lfo33'><![if !supportLists]><span
lang=EN-US style='font-size:10.0pt;font-family:Wingdings;mso-fareast-font-family:
Wingdings;mso-bidi-font-family:Wingdings'><span style='mso-list:Ignore'>Ø<span
style='font:7.0pt "Times New Roman"'>&nbsp; </span></span></span><![endif]><span
lang=EN-US style='font-size:10.0pt;font-family:"Arial",sans-serif'>Ðõn hàng nào
phát sinh th&igrave; Hóa ðõn, ch&#7913;ng t&#7915; s&#7869; ði kèm v&#7899;i
Ðõn hàng ðó.<o:p></o:p></span></p>

</div>

</body>

</html>

        ';
        return $output;
    }


//    public function search_export()
//    {
//        return view('back-end.contract.search_export');
//    }
//
//    public function return_export(Request $request)
//    {
//        $data['info'] = Partner::Where('account_phone','=',$request)->first();
//        $pdf = PDF::loadView('pdf_true_export', $data);
//        $time = Carbon::now()->format('d-m-Y');
//        $name = 'hop-dong-dien-tu'.$time;
//        return $pdf->stream($name.'.pdf');
//    }


}
