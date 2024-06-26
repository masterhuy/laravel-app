<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;
use App\Models\Product;


return new class extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('product_details', function (Blueprint $table) {
            $table->id();
            $table->string('size');
            $table->string('color');
            $table->smallInteger('quanlity');
            $table->foreignIdFor(Product::class)->constrained()->cascaseOnDelete();
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
        Schema::dropIfExists('product_details');
    }
};

