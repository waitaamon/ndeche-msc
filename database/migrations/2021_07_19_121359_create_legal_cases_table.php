<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateLegalCasesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('legal_cases', function (Blueprint $table) {
            $table->id();
            $table->foreignId('institution_id')->constrained();
            $table->foreignId('user_id')->constrained();
            $table->foreignId('investigation_officer_id')->nullable()->constrained('users');
            $table->foreignId('judicial_officer_id')->nullable()->constrained('users');
            $table->text('description');
            $table->string('status')->default('new');
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
        Schema::dropIfExists('legal_cases');
    }
}
