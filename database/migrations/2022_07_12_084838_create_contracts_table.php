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
            $table->string('store_contract_type')->default('0');  // Loại hợp đồng nhanh (0) - chậm (1)
            $table->string('store_name')->nullable();
            $table->string('store_add_DKKD')->nullable(); // Địa chỉ
            $table->string('store_local_DKKD')->nullable(); // Id khu vực
            $table->string('store_add_GH')->nullable(); // Địa chỉ
            $table->string('store_local_GH')->nullable(); // Id khu vực
            $table->string('store_phone')->nullable();
            $table->string('store_website')->nullable();
            $table->string('store_GPDKKD')->nullable();
            $table->string('store_id_Numb_GPDKKD')->nullable();
            $table->string('store_bank')->nullable();
            $table->string('store_bank_holder')->nullable();
            $table->string('store_bank_numb')->nullable();
            $table->string('store_contact_name')->nullable();
            $table->string('store_contact_phone')->nullable();
            $table->string('store_contact_position')->nullable();
            $table->string('store_effect')->nullable();
            $table->string('store_started')->nullable();
            $table->string('store_end')->nullable();
            $table->string('store_signed')->nullable();
            $table->string('store_sign_img')->nullable();
            $table->string('store_sign_img_doppelherz')->nullable();
            $table->string('contract_level')->default('10'); // 10 là chưa phân loại, cấp ưu tiên 1 - 4 ~
            $table->string('store_token')->nullable();
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
