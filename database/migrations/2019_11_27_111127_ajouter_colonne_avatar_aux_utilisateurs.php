<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class AjouterColonneAvatarAuxUtilisateurs extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        //
        Schema::table('utilisateurs', function (Blueprint $table) {
            //nullable : peut etre nulle
            $table->string('avatar')->nullable;
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        //
        Schema::table('utilisateurs', function (Blueprint $table) {
            //dropColumn : supprimer la colonne
            $table->dropColumn('avatar');
        });
    }
}
