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

        //store unique categories into $categories
		$category = $this->Purchase->Logistic->find(
            'list',
            array(
                'fields' => 'category',
                'group' => 'category'
            )
        );
		$this->set('categories', $category);

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
        $logistics = $this->Purchase->Logistic->find('list');
        $this->set(compact('logistics'));

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

	public function delete($id = NULL, $username = NULL){

		$this->Purchase->delete($id);
		$this->Session->setFlash('The purchase has been deleted');
		$this->redirect(array('action' => 'view', $username));
	}
}

