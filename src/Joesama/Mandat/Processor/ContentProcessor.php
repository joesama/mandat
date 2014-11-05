<?php namespace Joesama\Mandat\Processor;

use Joesama\Mandat\Modeller\Repository\ManagerRepository;
use Joesama\Mandat\Modeller\Repository\ContentRepository;

/**
 * Processor Unit to manage all lookup data content
 *
 * @package default
 * @author 
 **/
class ContentProcessor 
{
	protected $manager;
	protected $repo;

	function __construct(ManagerRepository $manager, ContentRepository $repository) {
		$this->manager = $manager;
		$this->repo = $repository;
	}

	/**
	 * undocumented function
	 *
	 * @return void
	 * @author 
	 **/
	public function index($control)
	{		
		$lookupID = \Request::segment(3);

		$data['lookup'] = $this->manager->lookupInfo($lookupID);
		$data['list'] = array();

		return $control->showAllData($data);
	}


	/**
	 * undocumented function
	 *
	 * @return void
	 * @author 
	 **/
	public function create($control)
	{
		$lookupID = \Request::segment(3);

		// $data['content'] = array();
		$data['lookup'] = $this->manager->lookupInfo($lookupID);

		return $control->showForm($data);
	}

} // END class ContentProcessor 