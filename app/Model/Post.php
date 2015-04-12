<?php
class Post extends AppModel{

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