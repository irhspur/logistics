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
		/*'id' => array(
			'n' => array(
				'rule' => array('n'),
				//'message' => 'Your custom message here',
				//'allowEmpty' => false,
				//'required' => false,
				//'last' => false, // Stop validation after this rule
				//'on' => 'create', // Limit validation to 'create' or 'update' operations
			),
		),*/
		'firstname' => array(
			'notEmpty' => array(
				'rule' => array('notEmpty'),
				'message' => 'Firstname cannot be empty.'
			),
            'nonNumeric' => array(
                'rule' => '/^[a-zA-Z]*$/',
                'message' => 'Firstname must not contain numbers'
            )
		),
		'lastname' => array(
			'notEmpty' => array(
				'rule' => array('notEmpty'),
				'message' => 'Lastname cannot be empty.'
			),
            'nonNumeric' => array(
                'rule' => '/^[a-zA-Z]*$/',
                'message' => 'Lastname must not contain numbers'
            )
		),
		'username' => array(
            'notEmpty' => array(
                'rule' => array('notEmpty'),
                'message' => 'Username cannot be empty.'
            ),
			'Username Taken' => array(
				'rule' => 'isUnique',
				'message' => 'That username has already been taken. Please try another one'
			),
			'The username must be between 5 and 15 characters' => array(
				'rule' => array('between', 5 ,15),
				'message' => 'The username must be between 5 and 15 characters'
			),
            'alphanumeric' => array(
                'rule' => 'alphanumeric',
                'message' => 'Username must be alphanumeric'
            )
		),
		'password' => array(
            'notEmpty' => array(
                'rule' => array('notEmpty'),
                'message' => 'Password cannot be empty'
            ),
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
				'message' => 'Please fill a contact number',
				'allowEmpty' => false,
				'required' => true,
				//'last' => false, // Stop validation after this rule
				//'on' => 'create', // Limit validation to 'create' or 'update' operations
			)
		),*/
        'roles' => array(
            'notEmpty' => array(
                'rule' => array('notEmpty'),
                'message' => 'Please pick a role'
            )
        )
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

        if($this->data['User']['roles'] == 'branch_manager') {
            $existingPromoCount = $this->find('count', array(
                'conditions' => array($check, array('User.roles' => 'branch_manager')),
                'recursive' => -1
            ));
            return $existingPromoCount == 0;
        } else {
            return TRUE;
        }
    }
}


