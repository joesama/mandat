<?php namespace Joesama\Mandat\Modeller\Entity;

use Illuminate\Support\Facades\Input; 

trait SchemaField
{
	/**
	 * traits for list of fields type prohibited
	 *
	 * @return void
	 * @author 
	 **/
	public function listType()
	{
		return array(
			'char' => 'char',
			'date' => 'date',
			'dateTime' => 'dateTime',
			'decimal' => 'decimal',
			'double' => 'double',
			'float' => 'float',
			'integer' => 'integer',
			'text' => 'text',			);
	}

	/**
	 * undocumented function
	 *
	 * @return void
	 * @author 
	 **/
	public function prepInputData(array $array)
	{

		foreach ($array as $field => $value) {

			$space = strstr($field, '_',TRUE).ucfirst(str_replace('_','',strstr($field, '_')));
			unset($array[$field]);
			$array[$space] = $value;
		}

		return (array)$array;

	}
}