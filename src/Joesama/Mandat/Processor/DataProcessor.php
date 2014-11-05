<?php namespace Joesama\Mandat\Processor;

use Joesama\Mandat\Modeller\Repository\ManagerRepository;
use Joesama\Mandat\Modeller\Entity\SchemaField;
use Illuminate\Support\Facades\Input;

class DataProcessor{

	use SchemaField;
	protected $repo;

	function __construct(ManagerRepository $manager) {

		$this->repo = $manager;
	}

	/**
	 * Display a listing of the resource.
	 *
	 * @return Response
	 */
	public function index($app)
	{
		$data['list'] = $this->repo->listAvailData();

		return $app->showMain($data);
	}


	/**
	 * Show the form for creating a new resource.
	 *
	 * @return Response
	 */
	public function create($app)
	{
		$data = array();

		return $app->showAddForm($data);
	}


	/**
	 * Store a newly created resource in storage.
	 *
	 * @return Response
	 */
	public function store()
	{
		if(Input::except('_token')){
			
			$input = $this->prepInputData(Input::except('_token'));
			$input['isMigrated'] = 0;
			$response = $this->repo->addDataArray($input);

			if($response == 'success'){

				return \Redirect::to('data')
							->with('message', trans('DataManager::form.'.$response));

			}else{

				return \Redirect::to('data/new')
							->withErrors($response)
							->withInput();
			}

		}
	}


	/**
	 * Display the specified resource.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function show($id)
	{
		//
	}


	/**
	 * Show the form for editing the specified resource.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function edit($app)
	{
		$id = \Request::segment(3);

		$data['lookup'] = $this->repo->lookupInfo($id);

		return $app->showAddForm($data);
	}


	/**
	 * Update the specified resource in storage.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function update()
	{
		$id = \Request::segment(3);

		if(Input::except('_token')){
			
			$input = $this->prepInputData(Input::except('_token'));
			$input['isMigrated'] = 0;
			$response = $this->repo->editLookup($input,$id);

			if($response == 'success'){

				return \Redirect::to('data')
					->with('message', trans('DataManager::form.edit.'.$response));

			}else{

				return \Redirect::to('data/edit/'.$id)
					->withErrors($response)
					->withInput();
			}
		}
	}


	/**
	 * Remove the specified resource from storage.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function destroy($id)
	{
		//
	}


}
