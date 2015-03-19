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
    );


}