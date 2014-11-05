<?php  namespace Joesama\Mandat\Modeller\Repository;

use Joesama\Mandat\Modeller\Model\Manager;
use \Exception;
use DB;
/**
 * undocumented class
 *
 * @package default
 * @author 
 **/
class ManagerRepository
{

	protected $message;

	/**
	 * List All Available Data
	 *
	 * @return Response
	 **/
	public function listAvailData()
	{
		return Manager::all();
	}


	/**
	 * undocumented function
	 *
	 * @return void
	 * @author 
	 **/
	public function lookupInfo($id)
	{
		return Manager::where('dataId','=',$id)->first();
	}

	/**
	 * Add New Lookup Data
	 *
	 * @return void
	 **/
	public function addDataArray($input)
	{

		$validator = \Validator::make(
		    $input,
			array(
                'dataName'  => 'required|max:20',
                'dataTable'   => 'required|unique:sys_data_manager,dataTable|max:20',
                'dataClass' => 'required|unique:sys_data_manager,dataClass|max:20',
                'dataDesc' => 'required'
            ),
            \Lang::get('DataManager::validate')
		);

		if ($validator->fails())
		{
			return $validator->messages();
		}


		DB::beginTransaction();

		try{
		
			Manager::firstOrCreate($input);

		}catch(Exception $e){

			DB::rollback();
			return $e->getMessage();
		}

		DB::commit();

		return 'success';

	}

	/**
	 * undocumented function
	 *
	 * @return void
	 * @author 
	 **/
	public function editLookup($input,$id)
	{
		$validator = \Validator::make(
		    $input,
			array(
                'dataName'  => 'required|max:20',
                'dataTable'   => 'required|unique:sys_data_manager,dataTable,'.$id.',dataId|max:20',
                'dataClass' => 'required|unique:sys_data_manager,dataClass,'.$id.',dataId|max:20',
                'dataDesc' => 'required'
            ),
            \Lang::get('DataManager::validate')
		);

		if ($validator->fails())
		{
			return $validator->messages();
		}

		DB::beginTransaction();

		try{

			Manager::where('dataId', '=', $id)->update($input);

		}catch(Exception $e){

			DB::rollback();
			return $e->getMessage();
		}

		DB::commit();

		return 'success';
	}

	/**
	 * Prepare Input Data For Insertion
	 *
	 * @return void
	 * @author 
	 **/
	protected function prepInputData($array)
	{
		unset($array['_token']);

		foreach ($array as $field => $value) {

			$space = strstr($field, '_',TRUE).ucfirst(str_replace('_','',strstr($field, '_')));
			unset($array[$field]);
			$array[$space] = $value;
		}

		return (array)$array;
	}

} // END class ManagerRepository 