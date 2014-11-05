<?php namespace Joesama\Mandat\Router;

use Illuminate\Support\Facades\View;
use Illuminate\Support\Facades\Input;
use Joesama\Mandat\Processor\SchemaProcessor;


/**
 * Schema Controller create migration schema for lookup data
 *
 * @package default
 * @author 
 **/
class SchemaController extends \BaseController  
{

	protected $schema;

	function __construct(SchemaProcessor $schema) {
		$this->schema = $schema;
	}

	/**
	 * Managing all migration schema for lookup data
	 *
	 * @return void
	 * @author 
	 **/
	public function manageSchema()
	{

		return $this->schema->verify($this);
	}


	/**
	 * undocumented function
	 *
	 * @return void
	 * @author 
	 **/
	public function addSchema()
	{

		return $this->schema->verify($this);
	}


	/**
	 * undocumented function
	 *
	 * @return void
	 * @author 
	 **/
	public function createScript()
	{
		return $this->schema->create();
	}

	/**
	 * undocumented function
	 *
	 * @return void
	 * @author 
	 **/
	public function showSchema($data)
	{
		// return \View::make('DataManager::schema.add',$data);
	}

	/**
	 * undocumented function
	 *
	 * @return void
	 * @author 
	 **/
	public function showSchemaForm($data)
	{
		return View::make('DataManager::schema.add',$data);
	}


} // END class SchemaController extends \BaseController  