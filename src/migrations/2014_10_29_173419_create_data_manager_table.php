<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateDataManagerTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		if(!Schema::hasTable('sys_data_manager')){

			Schema::create('sys_data_manager', function($table)
			{
				$table->engine = 'InnoDB';

			    $table->increments('dataId');
			    $table->longText('dataName');
			    $table->longText('dataTable');
			    $table->longText('dataClass');
			    $table->longText('dataDesc');
			    $table->integer('isMigrated')->default(0);
			    $table->timestamps();

			});	
		
		}else{

			Schema::table('sys_data_manager', function($table)
			{
				$table->engine = 'InnoDB';

				if (!Schema::hasColumn('dataId', 'dataName', 'dataClass', 'dataDesc','isMigrated'))
				{
				    $table->increments('dataId');
			    	$table->longText('dataName');
			    	$table->longText('dataTable');
			    	$table->longText('dataClass');
			    	$table->longText('dataDesc');
			    	$table->integer('isMigrated')->default(0);
			    	$table->timestamps();
				}
			});

		}
	}

	/**
	 * Reverse the migrations.
	 *
	 * @return void
	 */
	public function down()
	{
		Schema::dropIfExists('sys_data_manager');
	}

}
