<?php namespace Joesama\Mandat\Modeller\Contracts;
/**
 * undocumented class
 *
 * @package default
 * @author 
 **/
interface ContentInterface
{
	/**
	 * Retrieve all data for requested lookup
	 *
	 * @param $dataId Lookup Id
	 * @return void
	 * @author 
	 **/
	public function listAllData($dataId);

	/**
	 * Retrieve all data for requested lookup as two columns array
	 *
	 * @param $dataId Lookup Id
	 * @return void
	 * @author 
	 **/
	public function listToArray($dataId);

	/**
	 * Retrieve specific data for requested lookup
	 *
	 * @param $dataId Lookup Id
	 * @param $contentId Content Id
	 * @return void
	 * @author 
	 **/
	public function requestData($dataId,$contentId);


} // END interface ContentInterface