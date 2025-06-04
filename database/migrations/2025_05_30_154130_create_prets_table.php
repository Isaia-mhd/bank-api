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
        Schema::create('prets', function (Blueprint $table) {
            $table->id();
            $table->string("numeroCompte");
            $table->string("nomClient");
            $table->string("nomBanque");
            $table->decimal("montant", 15,2)->default(0);
            $table->integer("taux_de_pret")->default(1);
            $table->date("date_de_pret");
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('prets');
    }
};
