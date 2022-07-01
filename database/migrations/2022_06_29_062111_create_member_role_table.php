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
        Schema::create('member_role', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('role_id');
            $table->unsignedBigInteger('member_id');
            $table->timestamps();
            $table->foreign('role_id')->references('id')->on('roles')->onDelete("NO ACTION")->onUpdate("NO ACTION");
            $table->foreign('member_id')->references('id')->on('members')->onDelete("NO ACTION")->onUpdate("NO ACTION");
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('members_roles');
    }
};
