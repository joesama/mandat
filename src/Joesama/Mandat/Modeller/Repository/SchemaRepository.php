<?php  namespace Joesama\Mandat\Modeller\Repository;

use Joesama\Mandat\Modeller\Model\Migrator;
use \Exception;
use DB;

/**
 * Repository for Migration Script Process
 *
 * @package joesama/mandat
 * @author joesama
 **/
class SchemaRepository 
{

	/**
	 * list all schema field has been registered
	 *
	 * @return void
	 * @author 
	 **/
	public function schemaList($lookupID)
	{
		return Migrator::where('dataId','=',$lookupID)->get();
	}


	/**
	 * Retrieve schema info from database 
	 *
	 * @param $schemaId schemaId
	 * @return void
	 **/
	public function schemaInfo($schemaId)
	{
		try{
		
			return Migrator::where('schemaId','=',$schemaId)->first();

		}catch(Exception $e){

			return $e->getMessage();
		}
	}

	/**
	 * Create and update migration script field data 
	 *
	 * @param $input Input::all()
	 * @return Response
	 **/
	public function manageField($input)
	{

		$validator = \Validator::make(
		    $input,
			array(
                'schemaName'  => 'required|unique:sys_data_schema|max:20',
                'schemaType'   => 'required',
                'schemaDesc' => 'required'
            ),
            \Lang::get('DataManager::validate')
		);

		if ($validator->fails())
		{
			return $validator->messages();
		}

		DB::beginTransaction();

		try{
			
			if(array_key_exists('schemaId', $input)){
				
				$id = $input['schemaId'];

				unset($input['schemaId']);

				Migrator::where('schemaId', '=', $id)->update($input);

			}else{

				Migrator::create($input);

			}

		}catch(Exception $e){

			DB::rollback();
			return $e->getMessage();
		}

		DB::commit();

		return 'success';
	}

} // END class SchemaRepository 