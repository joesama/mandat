<?php namespace Joesama\Mandat\Processor;

use Joesama\Mandat\Modeller\Repository\ManagerRepository;
use Joesama\Mandat\Modeller\Repository\SchemaRepository;
use Joesama\Mandat\Modeller\Entity\SchemaField;
use Illuminate\Support\Facades\Schema;
use Illuminate\Support\Facades\Input;
use Illuminate\Support\Facades\Request;
use Symfony\Component\Console\Output\BufferedOutput;
use \Artisan;
use \Exception;

/**
 * Processing Creating Migration Script For Data Manager
 *
 * @package joesama/mandat
 * @author joesama
 **/
class SchemaProcessor
{
	use SchemaField;
	protected $manager;
	protected $repo;

	function __construct(ManagerRepository $manager, SchemaRepository $repo) {
		$this->manager = $manager;
		$this->repo = $repo;
	}

	/**
	 * verify and add the existance of a table in database
	 *
	 * @param $control SchemaController Instance
	 *
	 * @return void
	 **/
	public function verify($control)
	{
		$lookupID = Request::segment(3);
		$schemaID = Request::segment(4);

		$data['lookup'] = $lookup =  $this->manager->lookupInfo($lookupID);
		$data['listType'] = $this->listType();


		if($schemaID != NULL){
			$data['schema'] = $this->repo->schemaInfo($schemaID);
		}

		if(Input::except('_token')){
			$input = $this->prepInputData(Input::except('_token'));
			$input['dataId'] = $lookupID;
			$this->repo->manageField($input);

		}

		$data['list'] = $this->repo->schemaList($lookupID);

		if(!Schema::hasTable($lookup->dataTable)){

			return $control->showSchemaForm($data);
		}else{

			return $control->showSchema($data);
		}


	}


	/**
	 * create schema file
	 *
	 * @return Response
	 **/
	public function create()
	{
		$lookupID = Request::segment(3);

		$lookup =  $this->manager->lookupInfo($lookupID);
		$schema = $this->repo->schemaList($lookupID);


		$table = 'create_' . $lookup->dataTable . '_table';
		$generator = 'generate:migration';
		$path = realpath(__DIR__.'/../../../') . '/migrations';

		$fields = '"';
		foreach ($schema as $bil => $field) {
			$fields .= $field['schemaName'] . ':' . $field['schemaType'];
			$fields .= ($bil < count($schema)-1)?', ':'"';
		}

		// $output = new BufferedOutput;
		// echo 
		// Artisan::call($generator, array('--path' => $path , '--fields' => $fields), $output);
		// @exec('php artisan ' . $generator . ' ' .$table. ' --path=' . $path . ' --fields=' .$fields );
		exec('php artisan migrate:make ' .$table. ' --bench=joesama/mandat --force=true' );

		// \Artisan::call('migrate',  array('--bench' => 'joesama/mandat' ) , $output);

		return 'php artisan ' . $generator . ' ' .$table.  ' --path=' . $path . ' --fields=' .$fields;
	}


} // END class SchemaProcessor