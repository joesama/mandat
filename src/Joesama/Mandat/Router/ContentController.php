<?php namespace Joesama\Mandat\Router;

use \Exception;
use Illuminate\Support\Facades\View;
use Illuminate\Support\Facades\Input;
use Joesama\Mandat\Processor\ContentProcessor;
/**
 * Class to manage all data content
 *
 * @package default
 * @author 
 **/
class ContentController extends \BaseController  
{

	protected $content;

	public function __construct(ContentProcessor $content) {
		$this->content = $content;
	}

	/**
	 * retrieve all requested data content
	 *
	 *
	 * @return Response
	 * @author 
	 **/
	public function listData()
	{

		return $this->content->index($this);
	}


	/**
	 * Form to add new lookup data
	 *
	 * @return void
	 * @author 
	 **/
	public function newData()
	{
		return $this->content->create($this);
	}


	/**
	 * View all lookup content in list
	 *
	 * @return void
	 * @author 
	 **/
	public function showAllData($data)
	{
		return View::make('DataManager::content.lookup',$data);
	}


	/**
	 * undocumented function
	 *
	 * @return void
	 * @author 
	 **/
	public function showForm($data)
	{
		return View::make('DataManager::content.add',$data);
	}


} // END class DataController extends \BaseController  
