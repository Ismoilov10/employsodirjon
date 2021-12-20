<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Schema;

class CreateEmployeesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('employees', function (Blueprint $table) {
            $table->uuid('id')->default(DB::raw(' gen_random_uuid()'));
            $table->string('name');
            $table->string('email')->unique();
            $table->string('phone');
            $table->date('date_of_birth');
            $table->string('password');
            $table->enum('sex',['male','female']);
            $table->string('image');
            $table->rememberToken();
            $table->string('referred_by')->nullable();
            $table->string('referral_link')->nullable();
            $table->boolean('conditions_accepted')->default(0);
            $table->boolean('is_synthetic')->default(0);
            $table->string('verification_code');
            $table->boolean('role_id');
            $table->boolean('verified')->default(0);
            $table->string('new_email')->nullable();
            $table->timestamps();
            $table->softDeletes();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('employees');
    }
}
