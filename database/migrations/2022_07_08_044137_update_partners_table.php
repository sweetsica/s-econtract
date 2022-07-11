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
        //
        Schema::table('partners', function (Blueprint $table) {
            $table->string('id_number')->nullable(); // Số chứng minh nhân dân, Căn cước công dân
            $table->string('token_email')->nullable(); // Mã xác nhận email
            $table->string('token_sms')->nullable(); // Mã xác nhận sms
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        //
    }
};
