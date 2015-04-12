<?php
App::uses('AppModel', 'Model');
/**
 * Branch Model
 *
 * @property BranchManager $BranchManager
 */
class Branch extends AppModel {

/**
 * Display field
 *
 * @var string
 */
	public $displayField = 'name';

/**
 * Validation rules
 *
 * @var array
 */
	public $validate = array(
		'name' => array(
			'notEmpty' => array(
				'rule' => array('notEmpty'),
				'message' => 'Branch name cannot be empty',
			)
		),
		'location' => array(
			'notEmpty' => array(
				'rule' => array('notEmpty'),
				'message' => 'Location cannot be empty',
			)
		),
		'contact' => array(
			'numeric' => array(
				'rule' => array('numeric'),
				'message' => 'Must be numeric',
		    )
        )
    );

	//The Associations below have been created with all possible keys, those that are not needed can be removed

/**
 * hasOne associations
 *
 * @var array
 */
	public $hasOne = array(
		'User' => array(
			'className' => 'User',
			'foreignKey' => 'branch_id',
			'conditions' => '',
			'fields' => '',
			'order' => ''
		)
	);
}
