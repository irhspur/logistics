<?php
class Comment extends AppModel{

    /**
     * belongsTo association
     * @var array
     */
    public $belongsTo = array(
        'Post' => array(
            'className' => 'Post',
            'foreignKey' => 'post_id'
        )
    );
}