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
        Schema::table('partners', function (Blueprint $table) {
            $table->text('doppelherz_image')->nullable()->after('image');
            $table->string('name_doppelherz')->nullable()->after('doppelherz_image');
            $table->string('posistion_doppelherz')->nullable()->after('name_doppelherz');
            $table->string('account_doppelherz')->nullable()->after('posistion_doppelherz');
            $table->string('number_doppelherz')->nullable()->after('account_doppelherz');
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
