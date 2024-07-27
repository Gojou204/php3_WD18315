<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::table('products', function(Blueprint $table){
            // Thêm mới
            $table->string('image', 500)->nullable();
            // Sửa
            $table->string('name', 250)->change();
            // // Xóa
            // $table->dropColumn(['view']);
            // Rename
            $table->renameColumn('product_price', 'price');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        //
    }
};
