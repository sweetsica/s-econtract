<?php


use App\Http\Controllers\DepartmentController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\PageController;
use Illuminate\Support\Facades\Session;

use App\Http\Controllers\AuthController;
use App\Http\Controllers\PartnerController;
use App\Http\Controllers\PDFController;
use App\Http\Controllers\SignatureController;
use App\Http\Controllers\DoppelherzSignController;
use App\Http\Controllers\ContractController;
use App\Http\Controllers\MemberController;


/*
|--------------------------------------------------------------------------

|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

//Trang index nền
Route::get('/', [PageController::class, 'index'])->name('index');
//Auth module
Route::get('logout', [AuthController::class, 'logout'])->name('logout');
Route::prefix('dang-ky')->group(function (){
    Route::get('/', [AuthController::class, 'registerIndex'])->name('signup');
    Route::post('/check', [AuthController::class, 'registerProcess']);
});
Route::prefix('dang-nhap')->group(function () {
    Route::get('/', [AuthController::class, 'index'])->name('login.index');
    Route::post('/check', [AuthController::class, 'login'])->name('login.check');
});
Route::middleware(['auth'])->group(function () {
    Route::get('/trang-chu', [PageController::class,'dashboard'])->name('dashboard');
    Route::prefix('quan-tri')->group(function (){
        Route::get('/danh-sach-nguoi-dung', [AuthController::class, 'listUsers'])->name('admin.users');
    });
});

//Partner module
Route::prefix('doi-tac')->group(function (){
    Route::get('/doi-tac-moi', [PartnerController::class, 'new_partner'])->name('partner.new');
    Route::get('/dang-nhap', [PartnerController::class, 'partner_login'])->name('partner.login');
    Route::post('/dang-nhap/gui-du-lieu', [PartnerController::class, 'partner_login_submit'])->name('partner.login.submit');
    Route::get('/danh-sach-hop-dong',[PartnerController::class,'dashboard'])->name('partner.dashboard');
    Route::post('/sua-thong-tin/{id}',[PartnerController::class,'update'])->name('partner.update');
});



//Contract module
Route::prefix('hop-dong')->group(function (){
    Route::get('/tim-kiem', [ContractController::class, 'search_export'])->name('contract.seach');

    Route::get('/hop-dong-nhanh', [ContractController::class, 'contract_0'])->name('contract_0');
    Route::get('/hop-dong-chi-tiet', [ContractController::class, 'contract_1'])->name('contract_1');

    Route::post('/xuat-hop-dong', [ContractController::class, 'search_export_data'])->name('contract.return.export');
    Route::get('/bo-sung/xuat-hop-dong', [ContractController::class, 'return_export_after_sign'])->name('contract.return.export.signed');

    Route::get('/danh-sach',[ContractController::class, 'contract_list'])->name('contract.list');
    Route::get('/xem-chi-tiet/{contract_id}', [PartnerController::class, 'edit'])->name('contract.show');
//    Route::get('/xem-chi-tiet/{contract_id}', [ContractController::class, 'edit'])->name('contract.show');
    Route::post('/chinh-sua/cap-nhat/{id}',[ContractController::class, 'update'])->name('contract.update');
    Route::post('/tao-hop-dong/{id}', [ContractController::class, 'store'])->name('contract.create');
    Route::get('/pdf/{id}',[ContractController::class, 'show_contract_pdf'])->name('contract.show.pdf');

//    Route::get('/xuat-hop-dong-da-ky', [PartnerController::class, 'return_export_after_sign'])->name('contract.return.export-sign');
//    Route::post('/xuat-hop-dong', [PartnerController::class, 'search_export_with_data'])->name('contract.return.export');
});
//PDF module
Route::prefix('pdf')->group(function (){
    Route::get('/dynamic-pdf', [PDFController::class, 'index'])->name('demo.pdf');
    Route::get('/pre_dynamic_pdf', [PDFController::class, 'pre_pdf'])->name('pre.pdf');
    Route::get('/hop-dong-pdf/{id}', [ContractController::class, 'show_partner_pdf']);

//    Route::get('/dynamic_pdf_true', [PDFController::class, 'export_pdf'])->name('export.pdf');
//    Route::get('/filldata', [PDFController::class, 'export_pdf_true'])->name('export.pdf');
//    Route::get('/upload_pdf', [PDFController::class, 'upload_pdf'])->name('upload_pdf');
//    Route::post('/save_upload_pdf', [PDFController::class, 'save_upload_pdf'])->name('save_upload_pdf');
});
//Sign module
Route::prefix('chuky')->group(function(){
    Route::post('/hop-dong', [SignatureController::class, 'store'])->name('signaturepad.upload');
    Route::get('/giam-doc', [DoppelherzSignController::class, 'index'])->name('chuky.giamdoc');//name('signature.manager')
});

//phòng ban
Route::prefix('phong-ban')->group(function (){
    Route::get('/danh-sach',[DepartmentController::class,'department_list'])->name('department.list');//name('department.list')
    Route::get('/them-moi',[DepartmentController::class,'department_create'])->name('department.add');//name('department.add')
    Route::post('/gui-du-lieu',[DepartmentController::class,'department_store'])->name('department.post');//name('department.post')
    Route::get('/chinh-sua/{id}',[DepartmentController::class,'department_edit'])->name('department.edit');//name('department.edit')
    Route::get('/cap-nhat/{id}',[DepartmentController::class,'department_update'])->name('department.update');//name('department.update')
    Route::get('/xoa/{id}',[DepartmentController::class,'department_delete'])->name('department.delete');//name('department.delete')
    Route::get('/he-thong',[DepartmentController::class,'department_system'])->name('department.system.list');//name('department.system.list')
});

//thành viên
Route::prefix('thanh-vien')->group(function(){
    Route::get('danh-sach', [MemberController::class,'member_list'])->name('member.list');
    Route::get('them-moi', [MemberController::class,'member_create'])->name('member.create');
    Route::post('them-moi/post', [MemberController::class,'member_store'])->name('member.create.post');
    Route::get('chinh-sua/{id}', [MemberController::class,'member_edit'])->name('member.edit');
    Route::get('xoa/{id}', [MemberController::class,'member_delete'])->name('member.delete');
    Route::post('cap-nhat/{id}', [MemberController::class,'member_update'])->name('member.update');
    Route::get('/vai-tro-quan-ly', [MemberController::class,'get_manager'])->name('member.manage.get');
    Route::prefix('hop-dong')->group(function(){
        Route::get('/danh-sach',[MemberController::class,'member_contract_list'])->name('member.contract.list');
        Route::get('/doi-cua-ban',[MemberController::class,'team_contract_list'])->name('member.team.contract.list');
    });
    Route::get('/dang-nhap',[AuthController::class,'member_login_form'])->name('member.login');
    Route::post('/dang-nhap/check',[AuthController::class,'member_login'])->name('member.login.post');
});


Route::post('/contract/dopellherzsignature', [DoppelherzSignController::class, 'store'])->name('doppelhersignzpad.upload');










//Route::post('/lockpage', 'App\Http\Controllers\PageController@lockpage')->name('lockpage');
//Route::get('/contract/search/', [PartnerController::class, 'search_export'])->name('contract.seach');

//Xuất hợp đồng
//Route::post('/contract/return_export/',[\App\Http\Controllers\PartnerController::class, 'return_export'])->name('contract.return.export');
//Route::post('/contract/return_export/', [PartnerController::class, 'search_export_with_data'])->name('contract.return.export');
//Tìm và check hợp đồng
//Route::get('/contract/return_export_after_sign/', [PartnerController::class, 'return_export_after_sign'])->name('contract.return.export-sign');
//Route::get('/partner/reset-password', [PartnerController::class, 'reset_password']);
//Route::post('/partner/reset-password/save', [PartnerController::class, 'reset_password_save']);
//Route::post('/partner/checkinfo', [PartnerController::class, 'checkinfo']);

//Partner login


//Member Login

//Route::get('/table-bootstrap-basic', 'App\Http\Controllers\OmahadminController@table_bootstrap_basic');
//Document
//Route::get('/index_document',[PageController::class,'index_document'])->name('index_document');

//Các mục về PDF
//Route::get('/dynamic_pdf', [\App\Http\Controllers\PDFController::class, 'index'])->name('demo.pdf');
//Route::get('/pre_dynamic_pdf', [\App\Http\Controllers\PDFController::class, 'pre_pdf'])->name('pre.pdf');
//Route::get('/dynamic_pdf_true', [\App\Http\Controllers\PDFController::class, 'export_pdf'])->name('export.pdf');
//Route::get('/filldata', [\App\Http\Controllers\PDFController::class, 'export_pdf_true'])->name('export.pdf');
//Route::get('/upload_pdf', [\App\Http\Controllers\PDFController::class, 'upload_pdf'])->name('upload_pdf');
//Route::post('/save_upload_pdf', [\App\Http\Controllers\PDFController::class, 'save_upload_pdf'])->name('save_upload_pdf');

//Trang login
//Route::get('/page-login', 'App\Http\Controllers\PageController@page_login')->name('page.login');
//Route::get('/login', [AuthController::class, 'loginIndex'])->name('login');
//Route::post('/login', [AuthController::class, 'loginProcess']);

//Trang register
//Route::get('/register', [AuthController::class, 'registerIndex'])->name('signup');
//Route::post('/register', [AuthController::class, 'registerProcess']);

// router nào cần đăng nhập mới vô được thì ghi trong đây
//Route::middleware(['auth'])->group(function () {
//Trang quản trị sau khi đăng nhập
//Route::get('/dashboard', 'App\Http\Controllers\PageController@dashboard')->name('dashboard');
// Group super-admin
//    Route::prefix('admin')->group(function () {
//Trang danh sách các users
//        Route::get('/users', [AuthController::class, 'listUsers'])->name('admin.users');
//Chi tiết role permission của 1 user
//        Route::get('/users/{id}', [AuthController::class, 'editRoleUser']);
//Update role permission của 1 user
//        Route::post('/users/{id}', [AuthController::class, 'updateRoleUser']);
//    });
//});


//Route::get('/shortcut', function () {
//    Session::put('code','sweetsica');
//});


//Route::middleware('auth_dph')->group(function () {
//    Route::get('/logout',[\App\Http\Controllers\AuthController::class, 'logoutMember']);
//    Route::get('/dynamic_pdf', [\App\Http\Controllers\PDFController::class, 'index'])->name('demo.pdf');
//    Route::get('/pre_dynamic_pdf', [\App\Http\Controllers\PDFController::class, 'pre_pdf'])->name('pre.pdf');
//    Route::get('/dynamic_pdf_true', [\App\Http\Controllers\PDFController::class, 'export_pdf'])->name('export.pdf');
//    Route::get('/filldata', [\App\Http\Controllers\PDFController::class, 'export_pdf_true'])->name('export.pdf');
//    Route::get('/upload_pdf', [\App\Http\Controllers\PDFController::class, 'upload_pdf'])->name('upload_pdf');
//    Route::post('/save_upload_pdf', [\App\Http\Controllers\PDFController::class, 'save_upload_pdf'])->name('save_upload_pdf');
    //Các mục về hợp đồng
//    Route::get('/dashboard', [\App\Http\Controllers\PageController::class, 'dashboard'])->name('dashboard');

//Trang dashboard hợp đồng
//    Route::get('/contract/dashboard', [\App\Http\Controllers\PartnerController::class, 'dashboard'])->name('contract.dashboard');
//    Route::get('/contract/dashboard1', [\App\Http\Controllers\PartnerController::class, 'dashboard1'])->name('contract.dashboard1');
//    Route::get('/contract/dashboard2', [\App\Http\Controllers\PartnerController::class, 'dashboard2'])->name('contract.dashboard2');
//    Route::get('/contract/dashboard3', [\App\Http\Controllers\PartnerController::class, 'dashboard3'])->name('contract.dashboard3');
//Trang sửa level hợp đồng
//    Route::get('/contract/list', [\App\Http\Controllers\PartnerController::class, 'list'])->name('contract.list');
//    Route::get('/contract/list_done', [\App\Http\Controllers\PartnerController::class, 'list_type10'])->name('contract.list.done');
//    Route::get('/contract/list_pending', [\App\Http\Controllers\PartnerController::class, 'list_typeall'])->name('contract.list.pending');
//Chi tiết hợp đồng
//    Route::get('/contract/show/{id}/', 'App\Http\Controllers\PartnerController@show')->name('contract.show');
//    Route::get('/contract/show-with-pdf/{id}', [\App\Http\Controllers\PartnerController::class, 'show_partner_pdf']);
//Sửa chi tiết hợp đồng
//    Route::get('/contract/edit/{id}/', 'App\Http\Controllers\PartnerController@edit')->name('contract.edit');
//Giao diện tìm hợp đồng

//Các mục về chữ ký
//    Route::get('/contract/signature', [\App\Http\Controllers\SignatureController::class, 'index'])->name('contract.signature');
//    Route::post('signaturepad', [\App\Http\Controllers\SignatureController::class, 'store'])->name('signaturepad.upload');
//    Route::get('/contract/doppelherzsignature', [\App\Http\Controllers\DoppelherzSignController::class, 'index'])->name('contract.doppelherzsign');
//    Route::post('/contract/dopellherzsignature', [\App\Http\Controllers\DoppelherzSignController::class, 'store'])->name('doppelhersignzpad.upload');
//    Route::get('/contract/signature/test', [\App\Http\Controllers\DoppelherzSignController::class, 'index_test']);
//    Route::post('signature/test', [\App\Http\Controllers\DoppelherzSignController::class, 'store_test'])->name('doppelhersignzpad.test');
    //Form điền thông tin
//    Route::get('/signup-partner', 'App\Httpdatabase\Controllers\PageController@signup_partner')->name('signup.partner');

//Lưu thông tin đối tác
//    Route::post('/store-partner', 'App\Http\Controllers\PartnerController@store')->name('store.partner');

//Cập nhật phiên bản
//    Route::get('/version', 'App\Http\Controllers\VersionController@index')->name('version');
//    Route::post('/version/store', 'App\Http\Controllers\VersionController@index')->name('version.post');


//department route
//    Route::get('/department','\App\Http\Controllers\DepartmentController@department_list');
//    Route::get('/department-system','\App\Http\Controllers\DepartmentController@department_system');
//    Route::get('/department/create', '\App\Http\Controllers\DepartmentController@department_create');
//    Route::get('/department/edit/{id}', '\App\Http\Controllers\DepartmentController@department_edit');
//    Route::get('/department/delete/{id}', '\App\Http\Controllers\DepartmentController@department_delete');
//    Route::post('/department/create/submit', '\App\Http\Controllers\DepartmentController@department_store');
//    Route::post('/department/update/{id}', '\App\Http\Controllers\DepartmentController@department_update');
//end department route

//role route
//    Route::get('/role','\App\Http\Controllers\RoleController@role_index');
//    Route::post('/role/create', '\App\Http\Controllers\RoleController@role_create');
//    Route::get('/role/edit/{id}', '\App\Http\Controllers\RoleController@role_edit');
//    Route::get('/role/delete/{id}', '\App\Http\Controllers\RoleController@role_delete');
//    Route::post('/role/update/{id}', '\App\Http\Controllers\RoleController@role_update');
//end role route

//member route
//    Route::get('/member','\App\Http\Controllers\MemberController@member_list');
//    Route::get('/member/create', '\App\Http\Controllers\MemberController@member_create');
//    Route::get('/member/edit/{id}', '\App\Http\Controllers\MemberController@member_edit');
//    Route::get('/member/delete/{id}', '\App\Http\Controllers\MemberController@member_delete');
//    Route::post('/member/create/submit', '\App\Http\Controllers\MemberController@member_store');
//    Route::post('/member/update/{id}', '\App\Http\Controllers\MemberController@member_update');
//    Route::get('/member/get-manager', '\App\Http\Controllers\MemberController@get_manager');
//end member route
//});







// Route::get('/dashboard_1', 'App\Http\Controllers\OmahadminController@dashboard_1');
//Route::get('/index', 'App\Http\Controllers\OmahadminController@dashboard_1');
//Route::get('/analytics', 'App\Http\Controllers\OmahadminController@analytics');
//Route::get('/customer-list', 'App\Http\Controllers\OmahadminController@customer_list');
//Route::get('/property-details', 'App\Http\Controllers\OmahadminController@property_details');
//Route::get('/order-list', 'App\Http\Controllers\OmahadminController@order_list');
//Route::get('/review', 'App\Http\Controllers\OmahadminController@review');
//Route::get('/app-calender', 'App\Http\Controllers\OmahadminController@app_calender');
//Route::get('/app-profile', 'App\Http\Controllers\OmahadminController@app_profile');
//Route::get('/post-details', 'App\Http\Controllers\OmahadminController@post_details');
//Route::get('/chart-chartist', 'App\Http\Controllers\OmahadminController@chart_chartist');
//Route::get('/chart-chartjs', 'App\Http\Controllers\OmahadminController@chart_chartjs');
//Route::get('/chart-flot', 'App\Http\Controllers\OmahadminController@chart_flot');
//Route::get('/chart-morris', 'App\Http\Controllers\OmahadminController@chart_morris');
//Route::get('/chart-peity', 'App\Http\Controllers\OmahadminController@chart_peity');
//Route::get('/chart-sparkline', 'App\Http\Controllers\OmahadminController@chart_sparkline');
//Route::get('/ecom-checkout', 'App\Http\Controllers\OmahadminController@ecom_checkout');
//Route::get('/ecom-customers', 'App\Http\Controllers\OmahadminController@ecom_customers');
//Route::get('/ecom-invoice', 'App\Http\Controllers\OmahadminController@ecom_invoice');
//Route::get('/ecom-product-detail', 'App\Http\Controllers\OmahadminController@ecom_product_detail');
//Route::get('/ecom-product-grid', 'App\Http\Controllers\OmahadminController@ecom_product_grid');
//Route::get('/ecom-product-list', 'App\Http\Controllers\OmahadminController@ecom_product_list');
//Route::get('/ecom-product-order', 'App\Http\Controllers\OmahadminController@ecom_product_order');
//Route::get('/email-compose', 'App\Http\Controllers\OmahadminController@email_compose');
//Route::get('/email-inbox', 'App\Http\Controllers\OmahadminController@email_inbox');
//Route::get('/email-read', 'App\Http\Controllers\OmahadminController@email_read');

//Route::get('/form-editor-summernote', 'App\Http\Controllers\OmahadminController@form_editor_summernote');
//Route::get('/form-element', 'App\Http\Controllers\OmahadminController@form_element');
//Route::get('/form-pickers', 'App\Http\Controllers\OmahadminController@form_pickers');
//Route::get('/form-validation-jquery', 'App\Http\Controllers\OmahadminController@form_validation_jquery');
//Route::get('/form-wizard', 'App\Http\Controllers\OmahadminController@form_wizard');

//Route::get('/map-jqvmap', 'App\Http\Controllers\OmahadminController@map_jqvmap');
//Route::get('/page-error-400', 'App\Http\Controllers\OmahadminController@page_error_400');
//Route::get('/page-error-403', 'App\Http\Controllers\OmahadminController@page_error_403');
//Route::get('/page-error-404', 'App\Http\Controllers\OmahadminController@page_error_404');
//Route::get('/page-error-500', 'App\Http\Controllers\OmahadminController@page_error_500');
//Route::get('/page-error-503', 'App\Http\Controllers\OmahadminController@page_error_503');
//Route::get('/page-forgot-password', 'App\Http\Controllers\OmahadminController@page_forgot_password');
//Route::get('/page-lock-screen', 'App\Http\Controllers\OmahadminController@page_lock_screen');
//Route::get('/page-login', 'App\Http\Controllers\OmahadminController@page_login');
//Route::get('/page-register', 'App\Http\Controllers\OmahadminController@page_register');
//Route::get('/table-bootstrap-basic', 'App\Http\Controllers\OmahadminController@table_bootstrap_basic');
//Route::get('/table-datatable-basic', 'App\Http\Controllers\OmahadminController@table_datatable_basic');
//Route::get('/uc-lightgallery', 'App\Http\Controllers\OmahadminController@uc_lightgallery');
//Route::get('/uc-nestable', 'App\Http\Controllers\OmahadminController@uc_nestable');
//Route::get('/uc-noui-slider', 'App\Http\Controllers\OmahadminController@uc_noui_slider');
//Route::get('/uc-select2', 'App\Http\Controllers\OmahadminController@uc_select2');
//Route::get('/uc-sweetalert', 'App\Http\Controllers\OmahadminController@uc_sweetalert');
//Route::get('/uc-toastr', 'App\Http\Controllers\OmahadminController@uc_toastr');
//Route::get('/ui-accordion', 'App\Http\Controllers\OmahadminController@ui_accordion');
//Route::get('/ui-alert', 'App\Http\Controllers\OmahadminController@ui_alert');
//Route::get('/ui-badge', 'App\Http\Controllers\OmahadminController@ui_badge');
//Route::get('/ui-button', 'App\Http\Controllers\OmahadminController@ui_button');
//Route::get('/ui-button-group', 'App\Http\Controllers\OmahadminController@ui_button_group');
//Route::get('/ui-card', 'App\Http\Controllers\OmahadminController@ui_card');
//Route::get('/ui-carousel', 'App\Http\Controllers\OmahadminController@ui_carousel');
//Route::get('/ui-dropdown', 'App\Http\Controllers\OmahadminController@ui_dropdown');
//Route::get('/ui-grid', 'App\Http\Controllers\OmahadminController@ui_grid');
//Route::get('/ui-list-group', 'App\Http\Controllers\OmahadminController@ui_list_group');
//Route::get('/ui-media-object', 'App\Http\Controllers\OmahadminController@ui_media_object');
//Route::get('/ui-modal', 'App\Http\Controllers\OmahadminController@ui_modal');
//Route::get('/ui-pagination', 'App\Http\Controllers\OmahadminController@ui_pagination');
//Route::get('/ui-popover', 'App\Http\Controllers\OmahadminController@ui_popover');
//Route::get('/ui-progressbar', 'App\Http\Controllers\OmahadminController@ui_progressbar');
//Route::get('/ui-tab', 'App\Http\Controllers\OmahadminController@ui_tab');
//Route::get('/ui-typography', 'App\Http\Controllers\OmahadminController@ui_typography');
//Route::get('/widget-basic', 'App\Http\Controllers\OmahadminController@widget_basic');


