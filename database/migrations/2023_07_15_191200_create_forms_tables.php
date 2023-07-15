<?php
use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateFormsTables extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('form_sub__forms', function (Blueprint $table) {
            $table->id();
            $table->uuid('uuid')->unique();
            $table->morphs('owner');
            $table->string('status')->default('draft');
            $table->string('redirect')->nullable();
            $table->string('forward_to_email')->nullable();
            $table->boolean('wildcard_submission')->default(false);
            $table->boolean('force_validation')->default(false);
            $table->json('validation_rules')->nullable();
            $table->json('rules')->nullable();
            $table->json('submission_rules')->nullable();
            $table->json('pages')->nullable();
            $table->json('closed_page')->nullable();
            $table->json('thank_you_page')->nullable();
            $table->timestamps();
        });

        Schema::create('form_sub__submissions', function (Blueprint $table) {
            $table->id();
            $table->uuid('uuid')->unique();
            $table->morphs('submissable');
            $table->json('data')->nullable();
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
        Schema::dropIfExists('form_sub__forms');
        Schema::dropIfExists('form_sub__submissions');
    }
}
