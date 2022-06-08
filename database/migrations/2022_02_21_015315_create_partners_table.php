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
        Schema::create('partners', function (Blueprint $table) {
            $table->id();
            $table->string('code_contract')->nullable();//Mã hồ sơ
            $table->string('id_tdv')->nullable();//Tên trình dược viên
            $table->string('name');//Tên Đại Lý (agency_name)
            $table->string('address')->nullable();//Địa chỉ ĐKKD (address)
            $table->string('district')->nullable();//Quận/Huyện (district)
            $table->string('city')->nullable();//Tỉnh/TP (city)
            $table->string('delivery_address')->nullable();//Địa chỉ giao hàng (delivery_address)
            $table->string('delivery_district')->nullable();//Quận/Huyện nhận hàng (delivery_district)
            $table->string('delivery_city')->nullable();//Tỉnh/TP (delivery_city)
            $table->string('account_name')->nullable();//Tên người đại diện (name)
            $table->string('account_title')->nullable();//Chức danh người đại diện (account_title)
            $table->string('account_birth')->nullable();//Ngày sinh (birthdate)
            $table->string('account_gender')->nullable();//Giới tính (gender)
            $table->string('account_phone')->nullable();//SĐT (phone)
            $table->string('account_tax')->nullable();//MST (tax_number)
            $table->string('account_email')->nullable();//Email (email)
            $table->string('account_website')->nullable();//Website (website)
            $table->string('account_bank_number')->nullable();//TKNH (bank_account)
            $table->string('account_bank_name')->nullable();
            $table->string('account_bank_holder')->nullable();
            $table->string('account_type')->nullable();//Phạm vi BH (agency_type)
            $table->string('account_startdate')->nullable();//Ngày bắt đầu (start_date)
            $table->string('account_enddate')->nullable();//Ngày kết thúc (end_date)
            $table->string('account_budget1')->nullable();//ĐKDT N1 (plans_N1)
            $table->string('account_budget2')->nullable();//ĐKDT N2 (plans_N2)
            $table->string('appointment')->nullable();//Lịch hẹn
            $table->text('image')->nullable();
            $table->boolean('signed')->default('0');
            $table->text('doppelherz_image')->nullable();
            $table->string('name_doppelherz')->nullable();
            $table->string('position_doppelherz')->nullable();
            $table->string('account_doppelherz')->nullable();
            $table->string('number_doppelherz')->nullable();
            $table->boolean('type_contract')->nullable()->default('1');//Loại hợp đồng: nhanh (0) - chậm(1)
            $table->string('access_type')->nullable()->default('10');//Mức độ truy cập
            $table->boolean('status')->nullable()->default('1');//Trạng thái
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
        Schema::dropIfExists('partners');
    }
};
