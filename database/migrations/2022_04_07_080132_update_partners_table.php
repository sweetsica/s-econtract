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
            $table->text('image')->nullable()->after('appointment');
            $table->boolean('signed')->default('0')->after('image');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        if (Schema::hasColumn('partners', 'image'))
        {
            Schema::table('partners', function (Blueprint $table)
            {
                $table->dropColumn('image');
                $table->dropColumn('signed');
            });
        }
    }
};
