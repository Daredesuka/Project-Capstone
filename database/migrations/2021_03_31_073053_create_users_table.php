<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;

class CreateUsersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('users', function (Blueprint $table) {
            $table->id();
            $table->string('officer_name');
            $table->string('email');
            $table->string('username');
            $table->string('password');
            $table->string('phone_number');
            $table->string('photo')->nullable();
            $table->unsignedBigInteger('level_id')->nullable();
            $table->foreign('level_id')->references('id')->on('level')->onDelete('cascade');
            $table->rememberToken();
            $table->timestamps();
        });
        // Tambahkan data dummy
        DB::table('users')->insert([
            'officer_name' => 'Admin',
            'email' => 'admin@example.com',
            'username' => 'admin123',
            'password' => Hash::make('admin123456'),
            'phone_number' => '123456789',
            'photo' => null,
            'level_id' => 1,
            'created_at' => now(),
            'updated_at' => now(),
        ]);
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('users');
    }
}