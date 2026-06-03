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
        Schema::create('ninjas', function (Blueprint $table) {
            $table->id();
            $table->timestamps();
            $table->string('name');
            $table->integer('skill');
            $table->text('bio');
            /*Now we are goona try to do the migrations, freshing all the tables, deleting the data, and making another new tables 
            plus the Foreing key inside the table, to conect to another table as Dojo*/
            $table->foreignId('dojo_id')->constrained()->onDelete('cascade');
            //onDelete('cascade') it will delete all the id-data relationship with the foreingkey and the parent key of each table,
            // if u ddelete this pk the fk it will follow for recriprocate.
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('ninjas');
    }
};
