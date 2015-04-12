<?php
App::uses('AppModel', 'Model');
/**
 * Logistic Model
 *
 * @property Purchase $Purchase
 */
class Logistic extends AppModel {

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
        'category' => array(
            'notEmpty' => array(
                'rule' => array('notEmpty'),
                'message' => 'Category cannot be empty.'
            )
        ),
        'name' => array(
            'notEmpty' => array(
                'rule' => array('notEmpty'),
                'message' => 'Name cannot be empty.'
            ),
            'alphanumeric' => array(
                'rule' => 'alphanumeric',
                'message' => 'Name must be alphanumeric'
            )
        ),
        'price' => array(
            'notEmpty' => array(
                'rule' => array('notEmpty'),
                'message' => 'Username cannot be empty.'
            ),
        )
    );

    //The Associations below have been created with all possible keys, those that are not needed can be removed

    /**
     * belongsTo associations
     *
     * @var array
     */
    public $belongsTo = array(
        'Vendor' => array(
            'className' => 'Vendor',
            'foreignKey' => 'vendor_id',
            'conditions' => '',
            'fields' => '',
            'order' => ''
        )
    );
}
