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
        Schema::create('zoos', function (Blueprint $table) {
            $table->id();
            $table->foreignId('admin_id')->nullable()->constrained('admins');
            $table->foreignId('prefecture_id')->nullable()->constrained('prefectures');
            $table->string('zoo_name');
            $table->text('caption');
            $table->string('adress');
            $table->string('hp_url');
            $table->integer('adults_price')->nullable();
            $table->integer('middle_price')->nullable();
            $table->integer('children_price')->nullable();
            $table->softDeletes();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('zoos');
    }
};
