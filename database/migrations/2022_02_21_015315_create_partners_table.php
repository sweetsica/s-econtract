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
            $table->string('owner_name', 100)->nullable();//Họ và tên
            $table->string('owner_id_numb')->nullable();//CCCD/CMND
            $table->string('owner_id_numb_created_at')->nullable();//Ngày cấp
            $table->string('owner_id_numb_created_locate')->nullable();//Nơi cấp
            $table->string('owner_sex')->nullable();//Giới tính
            $table->string('owner_dob')->nullable();//Ngày sinh
            $table->string('owner_age')->nullable();//Tuổi
            $table->string('owner_token')->nullable();//pass chủ nhà thuốc (opt)
            $table->string('owner_phone')->nullable();//SDT chủ nhà thuốc (opt)
            $table->string('owner_email')->nullable();//Email chủ nhà thuốc (opt)
            $table->string('owner_mst')->nullable();//MST chủ nhà thuốc (opt)
            $table->string('contract_mode')->default('1'); //Loại đăng ký đối tác (0) - hợp đồng (1)
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
