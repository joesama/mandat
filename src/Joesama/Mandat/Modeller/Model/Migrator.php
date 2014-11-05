<?php namespace Joesama\Mandat\Modeller\Model;



class Migrator extends \Eloquent {

	protected $fillable = ['dataId','schemaName','schemaType','schemaDesc'];
	protected $table = 'sys_data_schema';
	protected $primaryKey = 'schemaId';


}