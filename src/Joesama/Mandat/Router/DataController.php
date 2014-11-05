<?php namespace Joesama\Mandat\Router;

use Joesama\Mandat\Processor\DataProcessor;
use Joesama\Mandat\Processor\SetupProcessor;
use \Exception;
use \Schema;
use Illuminate\Support\Facades\View;
use Illuminate\Support\Facades\Input;

class DataController extends \BaseController {


	protected $data;
	protected $setup;

	public function __construct(DataProcessor $data, SetupProcessor $setup) {

		$this->data = $data;
		$this->setup = $setup;
	}

	/**
	 * Display a listing of the resource.
	 * GET /data
	 *
	 * @return Response
	 */
	public function index()
	{

		if(!Schema::hasTable('sys_data_manager')){

			return $this->setup->index($this);
		}else{

			return $this->data->index($this);
		}
	}

	/**
	 * Setup New Data Manager
	 *
	 * @return void
	 * @author 
	 **/
	public function setup()
	{
		return $this->setup->process($this,Input::all());
	}

	/**
	 * Show the form for creating a new resource.
	 * GET /data/create
	 *
	 * @return Response
	 */
	public function create()
	{
		return $this->data->create($this);
	}

	/**
	 * Store a newly created resource in storage.
	 *
	 * @return Response
	 */
	public function store()
	{
		return $this->data->store();
	}


	/**
	 * undocumented function
	 *
	 * @return void
	 * @author 
	 **/
	public function edit()
	{
		return $this->data->edit($this);
	}


	/**
	 * undocumented function
	 *
	 * @return void
	 * @author 
	 **/
	public function update()
	{
		return $this->data->update();
	}


	/**
	 * Show Setup Page
	 *
	 * @return Response
	 **/
	public function showSetup($data)
	{
		return View::make('DataManager::setup.setup',$data);
	}

	/**
	 * Show All Available Lookup And Create New
	 *
	 * @return Response
	 **/
	public function showMain($data)
	{
		return View::make('DataManager::data.welcome',$data);
	}

	/**
	 * Create New Lookup Data
	 *
	 * @return void
	 **/
	public function showAddForm($data)
	{
		return View::make('DataManager::data.add',$data);
	}

}