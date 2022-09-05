<?php
use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;
return new class extends Migration {
    public function up() {
        Schema::create('media', function (Blueprint $table) {
            $table->id();
            $table->string('file_name');
            $table->string('file_type');
            $table->string('file_size');
            $table->string('file_status');
            $table->unsignedBigInteger('file_sort')->default(0);
            $table->unsignedBigInteger('mediable_id');
            $table->string('mediable_type');
            $table->softDeletes();
            $table->timestamps();
        });
    }

    public function down() {
        Schema::dropIfExists('media');
    }
};
