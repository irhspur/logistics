<?php
class Post extends AppModel{

    /**
     * Validation rules
     *
     * @var array
     */
    public $validate = array(
        'title' => array(
            'notEmpty' => array(
                'rule' => array('notEmpty'),
                'message' => 'title cannot be empty.'
            )
        ),
        'body' => array(
            'notEmpty' => array(
                'rule' => array('notEmpty'),
                'message' => 'body cannot be empty.'
            )
        )
    );

    /**
     * belongsTo association
     * @var array
     */
    public $belongsTo = array(
        'User' => array(
            'className' => 'User',
            'foreignKey' => 'user_id'
        )
    );
}