<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('partner_option', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('partner_id')->nullable();
            $table->string('contract_code')->nullable(); // Mã hợp đồng
            $table->string('contract_type')->nullable(); // Loại hợp đồng
            $table->string('id_tdv')->nullable();//Mã TDV
            $table->string('rep_name')->nullable(); //Tên người đại diện trên ĐKKD
            $table->string('biz_local_id')->nullable(); //Địa chỉ ĐKKD
            $table->string('biz_address')->nullable(); //Địa chỉ chi tiết ĐKKD
            $table->string('delivery_local_id')->nullable(); //Địa chỉ giao hàng
            $table->string('delivery_address')->nullable(); //Địa chỉ chi tiết giao hàng
            $table->string('contact_name')->nullable(); //Tên người liên hệ
            $table->string('contact_phone')->nullable(); //Số điện thoại liên hệ
            $table->string('contact_position')->nullable(); //Chức vụ liên hệ
            $table->string('sale_type')->nullable(); //phạm vi bán hàng
            $table->string('start_date')->nullable(); //ngày bắt đầu hợp đồng
            $table->string('end_date')->nullable(); //ngày kết thúc hợp đồng
            $table->string('doppelherz_id')->nullable(); //id giám đốc vùng
            $table->string('budget_n1')->nullable(); //ĐKDT N1
            $table->string('budget_n2')->nullable(); //ĐKDT N2
            $table->boolean('signed')->default('0'); //Đã ký hợp đồng chưa?
            $table->string('sign_image')->nullable(); //Ảnh chữ ký
            $table->string('bank_holder')->nullable();
            $table->string('bank_name')->nullable(); //Tên ngân hàng
            $table->string('bank_account')->nullable(); //Số tài khoản
            $table->string('appointment')->nullable();//Lịch hẹn
            $table->string('agent_website')->nullable();//Trang web đại lý
            $table->string('token_email')->nullable(); // Mã xác nhận email
            $table->string('token_sms')->nullable(); // Mã xác nhận sms
            $table->string('status')->nullable(); //Trạng thái hợp đồng
            $table->timestamps();
        });
    }


    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('partner_option');
    }
};
