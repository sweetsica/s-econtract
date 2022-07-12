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
            $table->string('store_name')->nullable();
            $table->string('store_addDKKD')->nullable();
            $table->string('store_localDKKD')->nullable();
            $table->string('store_addGH')->nullable();
            $table->string('store_localGH')->nullable();
            $table->string('store_phone')->nullable();
            $table->string('store_website')->nullable();
            $table->string('store_GPDKKD')->nullable();
            $table->string('store_idNumbGPDKKD')->nullable();
            $table->string('store_bank')->nullable();
            $table->string('store_bankHolder')->nullable();
            $table->string('store_bankNumb')->nullable();
            $table->string('store_contactName')->nullable();
            $table->string('store_contactPhone')->nullable();
            $table->string('store_contactPosition')->nullable();
            $table->string('store_effect')->nullable();
            $table->string('store_started')->nullable();
            $table->string('store_end')->nullable();
            $table->string('store_signed')->nullable();
            $table->string('store_signImg')->nullable();
            $table->string('store_signImgDoppelherz')->nullable();
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
