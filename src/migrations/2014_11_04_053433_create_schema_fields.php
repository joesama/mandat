<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateSchemaFields extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('sys_data_schema', function($table)
		{
			$table->engine = 'InnoDB';

		    $table->increments('schemaId');
		    $table->integer('dataId')->unsigned();
		    $table->foreign('dataId')->references('dataId')->on('sys_data_manager');
		    $table->longText('schemaName');
		    $table->longText('schemaType');
		    $table->longText('schemaDesc');
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
		Schema::dropIfExists('sys_data_schema');
	}

}
