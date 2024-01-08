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
        Schema::create('calculations', function (Blueprint $table) {
            $table->id();
            $table->string('fileID') ->nullable();
            $table->string('chatID') -> nullable();
            $table->string('fileName');
            $table->string('sender');
            $table -> string('typeCalc');
            $table -> string('commandLine') -> nullable();
            $table -> string('messageID') ->nullable();
            $table -> string('kiaePath') -> nullable();
            $table -> string('kiaeStatus') ->default('Not started');
            $table -> string('kiaeSlurmID') ->nullable();
            $table -> boolean('isClosed') -> default(false);
            $table -> text('result') -> nullable();
            $table->timestamps();


            $table -> softDeletes();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('calculations');
    }
};
