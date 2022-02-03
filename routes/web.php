<?php

use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

/* Route::get('/', function () {
    return view('welcome');
});
 */

Route::get('/dynamic_pdf',[\App\Http\Controllers\PDFController::class, 'index'])->name('demo.pdf');
Route::get('/dynamic_pdf_true',[\App\Http\Controllers\PDFController::class, 'export_pdf'])->name('export.pdf');

Route::get('/', 'App\Http\Controllers\PageController@index')->name('index');
Route::get('/signup-partner', 'App\Http\Controllers\PageController@signup_partner')->name('signup.partner');
Route::get('/dashboard', 'App\Http\Controllers\PageController@dashboard')->name('dashboard');
Route::get('/page-login', 'App\Http\Controllers\PageController@page_login')->name('login');

//Route::get('/', 'App\Http\Controllers\OmahadminController@dashboard_1');
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


