<?php
use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateUsersTable extends Migration{
    public function up(){
		Schema::create('users_positions', function (Blueprint $table) {
			$table->engine = 'InnoDB';
            $table->bigIncrements('pos_id');
			$table->string('pos_name', 64);
			$table->timestamps();
			$table->index(['pos_name']);
        });
		
		Schema::create('users_roles', function (Blueprint $table) {
			$table->engine = 'InnoDB';
            $table->bigIncrements('role_id');
			$table->string('role_name', 64)->default('');
			$table->timestamps();
			$table->index(['role_name']);
        });
		
		Schema::create('usr_tasks', function (Blueprint $table) {
			$table->engine = 'InnoDB';
            $table->bigIncrements('task_id');
			$table->string('task_name', 64)->default('');
			$table->timestamps();
			$table->index(['task_name']);
        });
		
		Schema::create('option', function (Blueprint $table) {
			$table->engine = 'InnoDB';
            $table->bigIncrements('o_id');
			$table->string('o_name', 64)->default('');
			$table->string('o_val', 64)->default('');
			$table->timestamps();
			$table->index(['o_name']);
        });
		
		Schema::create('users', function (Blueprint $table) {
			$table->engine = 'InnoDB';
            $table->bigIncrements('usr_id');
			$table->bigInteger('usr_role_id')->nullable(true);
			//$table->foreign('usr_role_id')->references('role_id')->on('users_roles')->onDelete('restrict');
			$table->bigInteger('usr_pos_id')->nullable(true);
			//$table->foreign('usr_pos_id')->references('pos_id')->on('users_positions')->onDelete('restrict');
			$table->Integer('usr_order')->default(0);
			$table->string('usr_email', 64)->default('');
			$table->string('usr_password',  64)->default('');
			$table->string('usr_first_name', 64)->default('');
			$table->string('usr_last_name',  64)->default('');
			$table->string('usr_fromto',  64)->default('');
			$table->mediumText('usr_work')->default('');
			$table->timestamps();
			$table->index(['usr_first_name', 'usr_last_name', 'usr_email']);
        });
    }

    public function down(){
        Schema::dropIfExists('users_positions');
		Schema::dropIfExists('users_roles');
		Schema::dropIfExists('usr_tasks');
		Schema::dropIfExists('option');
		Schema::dropIfExists('users');
    }
}