<?php

class Purchase extends AppModel{

/**
* hasOne association
* @var array
*/
	public $belongsTo = array(
		'Logistic' => array(
			'className' => 'Logistic',
			'foreignKey' => 'logistic_id',
			),

        'Vendor' => array(
            'className' => 'Vendor',
            'foreignKey' => 'vendor_id',
        ),

        'User' => array(
            'className' => 'User',
            'foreignKey' => 'user_id'
        ),

        'Branch' => array(
            'className' => 'Branch',
            'foreignKey' => 'branch_id'
        )
    );


}