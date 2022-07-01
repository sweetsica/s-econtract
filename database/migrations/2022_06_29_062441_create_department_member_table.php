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
        Schema::create('department_member', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('member_id');
            $table->unsignedBigInteger('department_id');
            $table->timestamps();
            $table->foreign('member_id')->references('id')->on('members')->onDelete("NO ACTION")->onUpdate("NO ACTION");
            $table->foreign('department_id')->references('id')->on('departments')->onDelete("NO ACTION")->onUpdate("NO ACTION");
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('members_departments');
    }
};
