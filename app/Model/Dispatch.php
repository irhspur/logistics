<?php

class Dispatch extends AppModel
{
    /**
     * belongsTo associations
     *
     * @var array
     */
    public $belongsTo = array(
        'Purchase' => array(
            'className' => 'Purchase',
            'foreignKey' => 'purchase_id',
            'conditions' => '',
            'fields' => '',
            'order' => ''
        )
    );
}