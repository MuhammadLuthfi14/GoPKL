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
        Schema::create('pembimbings', function (Blueprint $table) {
            $table->id();
            $table->foreignId('permohonan_id')->constrained('permohonans', 'id')->onDelete('cascade')->onUpdate('cascade')->nullable();
            $table->foreignId('guru_id')->constrained('gurus', 'id')->onDelete('cascade')->onUpdate('cascade')->nullable();
            $table->foreignId('perusahaan_id')->constrained('perusahaans', 'id')->onDelete('cascade')->onUpdate('cascade')->nullable();
            $table->boolean('status')->nullable();
            $table->boolean('status_penerimaan')->default(false);
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
        Schema::dropIfExists('pembimbings');
    }
};
