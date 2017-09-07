<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddSlugTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('types', function (Blueprint $table) {
            $table->string('slug', 255)->nullable()->after('title');
        });
        Schema::table('statuses', function (Blueprint $table) {
            $table->string('slug', 255)->nullable()->after('title');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('types', function (Blueprint $table) {
            $table->dropColumn('slug');
        });
        Schema::table('statuses', function (Blueprint $table) {
            $table->dropColumn('slug');
        });
    }
}
