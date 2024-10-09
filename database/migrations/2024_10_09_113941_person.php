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
        Schema::create('person', function (Blueprint $table) {
            $table->id();

            $table->string('hash');
            $table->string('userType')->nullable();
            $table->string('referer')->nullable();
            $table->string('nick')->nullable();
            $table->string('fullName');
            $table->string('phone');
            $table->string('alternatePhone')->nullable();
            $table->string('email');
            $table->string('gender')->nullable();
            $table->smallInteger('age')->nullable();
            $table->string('occupation')->nullable();
            $table->string('designation')->nullable();
            $table->string('address')->nullable();
            $table->string('city')->nullable();
            $table->string('state')->nullable();
            $table->string('zip')->nullable();
            $table->string('country');
            $table->string('currentLocation')->nullable();
            $table->string('image')->nullable();
            $table->string('socialLinks')->nullable();
            $table->text('shortDescription')->nullable();
            $table->text('longDescription')->nullable();
            $table->string('lastUsed')->nullable();
            $table->string('expiringOn')->nullable();
            $table->smallInteger('status')->nullable();
            $table->enum('flag', [1,0])->default(1);

            $table->timestamps();
        });

        Schema::create('personStatus', function (Blueprint $table) {
            $table->id();
            $table->string('name');
            $table->string('title');
            $table->timestamps();
        });

    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('person');
        Schema::dropIfExists('personStatus');
    }
};
