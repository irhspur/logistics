<?php 

class PurchasesController extends AppController{

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
	public function index($username = NULL){

		/*if(!$this->Logistic->exists($username)) {
			throw new NotFoundException(__('You havent made any purchases'));
		}*/
		$options = array('conditions' => array('Purchase.requestee' => $username));
		$this->set('purchases', $this->Purchase->find('all', $options));
	}

	public function view($username = NULL){
		$this->Purchase->recursive = 0;
		$this->set('purchases', $this->Paginator->paginate());

		$options = array('conditions' => array('Purchase.requestee' => $username));
		$this->set('purchases', $this->Purchase->find('all', $options));
	}

	public function add($username){

		$optionsItem = $this->Purchase->Logistic->find('list', array('fields' => 'Logistic.name'));
		$this->set('optionsItems', $optionsItem);

		/*$optionsItemId = $this->Purchase->Logistic->find('all', array('fields' => 'Logistic.id'));
		$this->set('optionsItemId', $optionsItemId);*/

		if(!empty($this->data)){

			$log = $this->Purchase->getDataSource()->getLog(false, false);
			debug($log);
			$this->request->data['Purchase']['requestee'] = $username;
			$this->request->data['Purchase']['purchase_status'] = 'pending';
			echo $this->request->data;
			/*$this->request->data['Purchase']['logistic_id'] = $this->Purchase->Logistic->find('first', 
				array('conditions' => array('Logistic.name' => $this->data['Purchase']['logistic_id'])), 
				array('fields' => 'Logistic.id'));*/

 			if($this->Purchase->save($this->data)){
				$this->Session->setFlash('The purchase was added sucessfully');
				$this->redirect(array('action' => 'index', $username));
			}else{
				$this->Session->setFlash('The purchase was not saved. Please try again');
			}
		}

	}

	public function edit($id = NULL){

		if(empty($this->data)){
			$this->data = $this->Purchase->read(NULL, $id);
		}else {
			if($this->Purchase->save($this->data)){
				$this->Session->setFlash('The purchase was edited');
				$this->redirect(array('action' => 'view', $id));
			}
		}

	}

	public function delete($id = NULL){

		$this->Purchase->delete($id);
		$this->Session->setFlash('The purchase has been deleted');
		$this->redirect(array('action' => 'view'));
	}
}

