<?php

use Illuminate\Database\Migrations\Migration;
use Qlcorp\VextFramework\VextBlueprint;

class CreatePermissionRoleTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		VextSchema::create('permission_role', function(VextBlueprint $table) {
            $table->increments('id')
                  ->gridConfig(array(
                    'text' => 'Id',
                    'width' => 100
                  ))->fieldConfig(array(
                    'fieldLabel' => 'Id',
                    'disabled' => true
                  ));

            $table->integer('permission_id')
                   ->gridConfig(array(
                    'text' => 'Permission',
                    'width' => 100
                  ))->fieldConfig(array(
                    'fieldLabel' => 'Permission',
                  ))->lookup('Permission');

            $table->foreign('permission_id')
                  ->references('id')->on('permission')
                  ->onDelete('cascade');

            $table->integer('role_id')
                  ->gridConfig(array(
                    'text' => 'Role',
                    'width' => 100
                  ))->fieldConfig(array(
                    'fieldLabel' => 'Role',
                  ))->lookup('Role');

            $table->foreign('role_id')
                  ->references('id')->on('role')
                  ->onDelete('cascade');
        });
	}

	/**
	 * Reverse the migrations.
	 *
	 * @return void
	 */
	public function down()
	{
		Schema::dropIfExists('permission_role');
	}

}