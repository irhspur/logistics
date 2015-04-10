<?php
App::uses('AppModel', 'Model');
/**
 * User Model
 *
 * @property Branch $Branch
 */
class User extends AppModel {

    public $diaplayField = 'username';
/**
 * Validation rules
 *
 * @var array
 */
	public $validate = array(
		'id' => array(
			'n' => array(
				'rule' => array('n'),
				//'message' => 'Your custom message here',
				//'allowEmpty' => false,
				//'required' => false,
				//'last' => false, // Stop validation after this rule
				//'on' => 'create', // Limit validation to 'create' or 'update' operations
			),
		),
		'firstname' => array(
			'notEmpty' => array(
				'rule' => array('notEmpty'),
				'message' => 'Firstname cannot be empty.'
			)
		),
		'lastname' => array(
			'notEmpty' => array(
				'rule' => array('notEmpty'),
				'message' => 'Lastname cannot be empty.'
			)
		),
		'username' => array(
			'Username Taken' => array(
				'rule' => 'isUnique',
				'message' => 'That username has already been taken. Please try another one'
			),
			'The username must be between 5 and 15 characters' => array(
				'rule' => array('between', 5 ,15),
				'message' => 'The username must be between 5 and 15 characters'
			)
		),
		'password' => array(
			'The password must be between 5 and 15 characters' => array(
				'rule' => array('between', 5 ,15),
				'message' => 'The password must be between 5 and 15 characters'
			),
			'Passwords donot match' => array(
				'rule' => 'matchPasswords',
				'message' => 'The passwords donot match'
			)	
		),
		'branch_id' => array(
            'Branch Taken' => array(
                'rule' => array('hasDuplicates'),
                'message' => 'That branch already has a branch manager'
            ),
		),
		/*'contact' => array(
			'25_24' => array(
				'rule' => array('25,24'),
				//'message' => 'Your custom message here',
				'allowEmpty' => false
				//'required' => false,
				//'last' => false, // Stop validation after this rule
				//'on' => 'create', // Limit validation to 'create' or 'update' operations
			)
		),*/
	);

	//The Associations below have been created with all possible keys, those that are not needed can be removed

/**
 * belongsTo associations
 *
 * @var array
 */
	public $belongsTo = array(
		'Branch' => array(
			'className' => 'Branch',
			'foreignKey' => 'branch_id',
			'conditions' => '',
			'fields' => '',
			'order' => ''
		)
	);

	function matchPasswords($data){
		if($data['password'] == $this->data['User']['password_confirmation']){
			return TRUE;
		}
		$this->invaliate('password_confirmation', 'The passwords donot match');
		return FALSE;
	}


	function hashPasswords($data){
		if(isset($this->data['User']['password'])){
			$this->data['User']['password'] = Security::hash($this->data['User']['password'], NULL, TRUE);
			return $data;
		}
		return $data;
	}

	function beforeSave(){
		$this->hashPasswords(NULL, TRUE);
		return TRUE;
	}

    public function hasDuplicates($check) {
        // $check will have value: array('Branch Taken' => 'some-value')
        // $limit will have value: 25

        if($this->data['User']['roles'] == 'branch_manager') {
            $existingPromoCount = $this->find('count', array(
                'conditions' => $check,
                'recursive' => -1
            ));
            return $existingPromoCount == 0;
        } else {
            return TRUE;
        }
    }
}


