<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

/**
 * Class CreateUsersTable.
 */
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
			$table->increments('id');

			//dados para user
			$table->char('cpf', 11)->unique()->nullable();
			$table->string('name', 50);
			$table->string('phone')->nullable();
			$table->date('birth')->nullable();

			//dados de autenticação
			$table->string('email', 80)->unique();
			$table->string('password', 254)->nullable();

			//Campos de permissão
			$table->enum('user_type', ['client', 'admin'])->default('client');

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
		Schema::table('users', function (Blueprint $table) {
		});
		Schema::drop('users');
	}
}
