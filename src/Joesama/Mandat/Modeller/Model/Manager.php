<?php namespace Joesama\Mandat\Modeller\Model;

use \Validator;

class Manager extends \Eloquent {
	protected $fillable = ['dataName','dataTable','dataClass','dataDesc','isMigrated'];
	protected $table = 'sys_data_manager';

	// public static function isValid($input)
 //    {
 //        return Validator::make(
 //            $input,
	// 		array(
 //                'data_name'  => 'required|max:20',
 //                'data_table'   => 'required|unique:sys_data_manager,dataTable|max:20',
 //                'data_class' => 'required|unique:sys_data_manager,dataClass|max:20',
 //                'data_desc' => 'required'
 //            )
 //        );
 //    }

	// public static function boot()
 //    {
 //        parent::boot();

 //        static::creating(function($post)
 //        {
 //        	if ( ! $post->isValid()) return false;
 //            // $post->created_by = Auth::user()->id;
 //            // $post->updated_by = Auth::user()->id;
 //        });

 //        static::updating(function($post)
 //        {
 //        	if ( ! $post->isValid()) return false;
 //            // $post->updated_by = Auth::user()->id;
 //        });
 //    }

}