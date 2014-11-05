<?php

return array(
	'listavail' => 'List All Available Lookup',
	'schema' => array(
		'name' => "Lookup Name",
		'table' => "Lookup Table",
		'class' => "Lookup Class",
		'desc' => "Description",
		'content' => array(
			'name' => 'Content Name',
			'desc' => 'Content Description'
			)
		),
	'action' => "Action",
	'form' => array(
		'title' => 'Add New Lookup',
		'action' => "Submit New Lookup",
		'success' => "New Lookup Successfully Created!!!",
		'edit' => array(
			'action' => 'Update Lookup',
			'success' => 'Lookup Successfully Updated',
			),
		),
	'content' => array(
		'title' =>'List All Available Lookup Content',
		'form' => array(
			'title' => 'Add New Lookup Content',
			'action' => "Submit New Lookup Content",
			'success' => "New Lookup Content Successfully Created!!!",
			'add' => array(
				'holder' => array(
					'name' => 'Enter Lookup Content Name',
					'desc' => 'Enter Lookup Content Description',
					),
				)
			),
		'schema' => array(
			'name' => 'Content Name',
			'desc' => 'Content Description'
			)
		),

	'migration' => array(
		'title' => 'Migration Schema',
		'action' => 'Create Schema',
		'schema' => array(
			'field' => 'Field Name',
			'type' => 'Field Type',
			'desc' => 'Field Descriptions',
			'add' => array(
				'holder' => array(
					'name' => 'Enter Field Name',
					'desc' => 'Enter Field Descriptions',
					),
				),
			),
		'form' => array(
			'title' => 'Add Schema Fields',
			'action' => "Add Field",
			'edit' => "Update Field",
			'success' => "New Schema Migrationt Successfully Created!!!",
			)
		)
	);