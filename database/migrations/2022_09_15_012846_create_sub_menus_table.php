<?php
use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;
return new class extends Migration {
    public function up() {
        Schema::create('sub_menus', function (Blueprint $table) {
            $table->id();
            $table->string('name');
            $table->string('link')->unique();
            $table->foreignId('menu_id')->constrained();
            $table->text('username')->nullable();
            $table->enum('sorting', [1, 2, 3, 4, 5, 6, 7, 8, 9, 10])->default(1);
            $table->boolean('status')->default(false);
            $table->softDeletes();
            $table->timestamps();
        });
    }

    public function down() {
        Schema::dropIfExists('sub_menus');
    }
};
