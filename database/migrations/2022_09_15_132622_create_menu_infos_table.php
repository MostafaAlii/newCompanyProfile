<?php
use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;
return new class extends Migration{
    public function up() {
        Schema::create('menu_infos', function (Blueprint $table) {
            $table->primary('menu_id');
            $table->string('primary_title')->nullable();
            $table->string('secondry_title')->nullable();
            $table->text('description')->nullable();
            $table->string('primary_cover')->nullable();
            $table->string('secondry_cover')->nullable();
            $table->text('content')->nullable();
            $table->foreignId('menu_id')->unique()->constrained('menus');
            $table->timestamps();
        });
    }

    public function down() {
        Schema::dropIfExists('menu_infos');
    }
};
