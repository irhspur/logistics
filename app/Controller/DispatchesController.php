<?php

class DispatchesController extends AppController{

    function beforeFilter(){
        parent::beforeFilter();

        $this->Auth->allow('index', 'view', 'add', 'delete');
    }

    /**
     * Components
     *
     * @var array
     */
    public $components = array('Paginator', 'Session');


    /**
     * index method
     *
     * @return void
     */
    public function index(){

        $this->Dispatch->recursive = 0;
        $this->set('dispatches', $this->Paginator->paginate());
    }

    public function add($purchaseId = NULL){

        if(!empty($this->data)){

            $this->request->data['Dispatch']['purchase_id'] = $purchaseId;
            $this->request->data['Dispatch']['purchase_id'] = $purchaseId;

            $values = $this->Dispatch->Purchase->find(
                'first',
                array(
                    'fields' => array('vendor_id', 'user_id', 'branch_id', 'logistic_id', 'requestee'),
                    'conditions' => array('Purchase.id' => $purchaseId)
                )
            );
            debug($values);
            $this->request->data['Dispatch']['vendor_id'] = $values['Purchase']['vendor_id'];
            $this->request->data['Dispatch']['logistic_id'] = $values['Purchase']['logistic_id'];
            $this->request->data['Dispatch']['branch_id'] = $values['Purchase']['branch_id'];
            $this->request->data['Dispatch']['user_id'] = $values['Purchase']['user_id'];

            if($this->Dispatch->save($this->data)){
                $this->Session->setFlash('The item dispatch information was added sucessfully');
                $this->redirect(array('controller' => 'purchases', 'action' => 'dispatch', $purchaseId,$values['Purchase']['requestee']));
            }else{
                $this->Session->setFlash('The item dispatch was not saved. Please try again');
            }
        }
    }
}

