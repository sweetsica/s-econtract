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
        Schema::create('contracts', function (Blueprint $table) {
            $table->id();
            $table->string('partnerId')->nullable();
            $table->string('store_mode')->default('1'); //Loại đăng ký nhanh (0) - chậm (1)
            $table->string('store_contract_type')->default('1'); // Chọn mẫu hợp đồng
            $table->string('contract_code')->nullable(); //Mã hợp đồng - tự động tạo
            $table->string('store_name')->nullable(); //Tên cửa hàng
            $table->string('store_add_DKKD')->nullable(); // Địa chỉ cửa hàng
            $table->string('store_local_DKKD')->nullable(); // Khu vực cửa hàng
            $table->string('store_add_GH')->nullable(); // Địa chỉ nhận hàng
            $table->string('store_local_GH')->nullable(); // Khu vực nhận hàng
            $table->string('store_headman')->nullable(); // Tên người đại diện
            $table->string('store_mst')->nullable(); // Mã số thuế
            $table->string('store_phone')->nullable(); // SĐT cửa hàng
            $table->string('store_website')->nullable(); // Website cửa hàng
            $table->string('store_GPDKKD')->nullable(); // Ngày cấp GPĐKKD
            $table->string('store_id_Numb_GPDKKD')->nullable(); // Số GPĐKKD
            $table->string('store_bank')->nullable(); // Loại tài khoản ngân hàng cửa hàng
            $table->string('store_bank_holder')->nullable(); // Tên chủ sở hữu ngân hàng cửa hàng
            $table->string('store_bank_numb')->nullable(); // Số tài khoản ngân hàng cửa hàng
            $table->string('store_contact_name')->nullable(); // Tên người liên hệ tại cửa hàng
            $table->string('store_contact_phone')->nullable(); // Số liên hệ tại cửa hàng
            $table->string('store_contact_position')->nullable(); // Chức vụ người liên hệ tại cửa hàng
            $table->string('store_effect')->nullable(); // Phạm vi bán hàng tại cửa hàng
            $table->string('store_started')->nullable(); // Ngày bắt đầu hợp đồng
            $table->string('store_end')->nullable(); // Ngày kết thúc
            $table->string('member_id')->nullable(); // Cấp độ hợp đồng - mặc định 10
            $table->integer('contract_level')->nullable(); // Cấp độ hợp đồng - mặc định 10
            $table->string('store_signed')->nullable(); // Tình trạng chữ ký
            $table->string('store_sign_img')->nullable(); // Link ảnh chữ ký
            $table->string('store_bank_name_doppelherz')->nullable(); // Tên ngân hàng Doppelherz
            $table->string('store_bank_number_doppelherz')->nullable(); // Số ngân hàng Doppelherz
            $table->string('store_sign_img_doppelherz')->nullable(); // Link ảnh giám đốc vùng
            $table->string('store_token')->nullable(); // Mật khẩu hợp đồng
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
        Schema::dropIfExists('contracts');
    }
};
