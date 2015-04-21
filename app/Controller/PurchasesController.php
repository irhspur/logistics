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

		$options = array('conditions' => array('Purchase.branch_id' => $username/*, 'Purchase.purchase_status !=' => 'dispatched'*/));
		$this->set('purchases', $this->Purchase->find('all', $options));
	}

    public function view_approved() {
        $this->Purchase->recursive = 0;
        $this->set('purchases', $this->Paginator->paginate());

        $options = array('conditions' => array('Purchase.purchase_status' => 'approved'));
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

//			$log = $this->Purchase->getDataSource()->getLog(false, false);
//			debug($log);
			$this->request->data['Purchase']['requestee'] = $username;
			$this->request->data['Purchase']['purchase_status'] = 'pending';

            $vendorId = $this->Purchase->Logistic->find(
                'first',
                array(
                    'fields' => array('vendor_id', 'price'),
                    'conditions' => array('Logistic.id' => $this->request->data['Purchase']['logistic_id'])
                )
            );
            $this->request->data['Purchase']['vendor_id'] = $vendorId['Logistic']['vendor_id'];
            $this->request->data['Purchase']['amount'] = $this->request->data['Purchase']['quantity'] * $vendorId['Logistic']['price'] ;

            $userId = $this->Purchase->User->find(
                'first',
                array(
                    'fields' => array('id', 'branch_id'),
                    'conditions' => array('User.username' => $this->request->data['Purchase']['requestee'])
                )
            );
            $this->request->data['Purchase']['user_id'] = $userId['User']['id'];
            $this->request->data['Purchase']['branch_id'] = $userId['User']['branch_id'];



            debug($vendorId);
			/*$this->request->data['Purchase']['vendor_id'] = $this->Purchase->Logistic->find('first',
				array('conditions' => array('Logistic.id' => $this->data['Purchase']['logistic_id'])),
				array('fields' => 'Logistic.vendor_id'));*/

 			if($this->Purchase->save($this->data)){
				$this->Session->setFlash('The purchase was added sucessfully');
				$this->redirect(array('action' => 'view', $username));
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

    /**
     * View to display pre-filled poaf form
     * @param null $id
     * @param null $username
     */
    public function poaf_form($id = NULL, $username = NULL) {

        if (!$this->Purchase->exists($id)) {
            throw new NotFoundException(__('Invalid User'));
        }
        $options = array('conditions' => array('Purchase.' . $this->Purchase->primaryKey => $id));
        $this->set('purchase', $this->Purchase->find('first', $options));

        //todo branch information
        $userOptions = array('conditions' => array('User.username' => $username));
        $this->set('user', $this->Purchase->find('first', $userOptions));
    }

    /**
     * View to display pre-filled egr form
     * @param null $id
     * @param null $username
     */
    public function egr_form($id = NULL, $username = NULL) {

        if (!$this->Purchase->exists($id)) {
            throw new NotFoundException(__('Invalid User'));
        }
        $options = array('conditions' => array('Purchase.' . $this->Purchase->primaryKey => $id));
        $this->set('purchase', $this->Purchase->find('first', $options));

        $userOptions = array('conditions' => array('User.username' => $username));
        $this->set('user', $this->Purchase->find('first', $userOptions));
    }

    /**
     * @param null $id
     * @param null $username
     */
    public function dispatch($id = NULL, $username = NULL){

        $this->Purchase->read(NULL, $id);
        $this->Purchase->set('purchase_status',  'dispatched');
        $this->Purchase->save();
        $this->Session->setFlash('The purchase has been dispatched');
        $this->redirect(array('action' => 'view_approved'));
    }

    /**
     * @param null $id
     * @param null $username
     */
    public function approve($id = NULL, $username = NULL){

        $this->Purchase->read(NULL, $id);
        $this->Purchase->set('purchase_status',  'approved');
        $this->Purchase->save();


        $vendor = $this->Purchase->find('first', array('fields' => 'vendor_id'));

        $this->Session->setFlash('The purchase has been approved. An email has been sent to the respective vendor regarding the order.');
        $this->redirect(array('action' => 'view', $username));
    }

    public function disapprove($id = NULL, $username = NULL){

        $this->Purchase->read(NULL, $id);
        $this->Purchase->set('purchase_status',  'pending');
        $this->Purchase->save();
        $this->Session->setFlash('The purchase has been disapproved');
        $this->redirect(array('action' => 'view', $username));
    }

    public function delivered($id = NULL, $userId = NULL){

        $this->Purchase->read(NULL, $id);
        $this->Purchase->set('purchase_status',  'delivered');
        $this->Purchase->save();
        $this->Session->setFlash('The purchase deliverance has been confirmed');
        $this->redirect(array('action' => 'view_dispatched', $userId));
    }

    public function view_dispatched($userId = NULL){
        $this->Purchase->recursive = 0;
        $this->set('purchases', $this->Paginator->paginate());

        $options = array('conditions' => array(
            'Purchase.purchase_status' => 'dispatched',
            'Purchase.branch_id' => $userId
        ));
        $this->set('purchases', $this->Purchase->find('all', $options));
    }

    public function view_delivered($userId = NULL){
        $this->Purchase->recursive = 0;
        $this->set('purchases', $this->Paginator->paginate());

        $options = array('conditions' => array(
            'Purchase.purchase_status' => 'delivered',
            'Purchase.branch_id' => $userId
        ));
        $this->set('purchases', $this->Purchase->find('all', $options));
    }

    /**
     * select report method
     */

    public function select_report() {
        App::uses('CakeTime', 'Utility');

        //first extract the created datetime
        $created = $this->Purchase->find('list',array('fields' => 'created'));
        $users = $this->Purchase->find('list', array('fields' => 'requestee'));

        //for each date separate by index number and populate into the respective month and year arrays by the same index
        foreach($created as $key => $val){
            $month[$key] = CakeTime::format($val, '%m');
            $year[$key] = CakeTime::format($val, '%Y');
        }
        $this->set('months', array_filter(array_unique($month)));
        $this->set('years', array_filter(array_unique($year)));

        foreach($users as $key => $val) {
            $user[$key] = $val;
        }
        //default value
        $user['Overall'] = 'Overall';
        $this->set('users', array_filter(array_unique($user)));

        if(!empty($this->data)){
            if($this->data){
//                $this->Session->setFlash('The purchase was added sucessfully'.$month[$this->request->data['Purchase']['month']]);
                $this->redirect(array('action' =>
                    'report',
                    $month[$this->request->data['Purchase']['month']],
                    $year[$this->request->data['Purchase']['year']],
                    $user[$this->request->data['Purchase']['user']]
                ));
            }else{
                $this->Session->setFlash('No purchase was not found. Please try again');
            }
        }
    }

    /**
     * report method
     */

    public function report($month = NULL, $year = NULL, $requestee = 'Overall') {

        $this->Purchase->recursive = 0;
        $this->set('purchases', $this->Paginator->paginate());

        if($requestee == 'Overall') {
            $condition = array('conditions' => array(
                'MONTH(Purchase.created)' => $month,
                'YEAR(Purchase.created)' => $year)
            );
        } else {
            $condition = array('conditions' => array(
                'MONTH(Purchase.created)' => $month,
                'YEAR(Purchase.created)' => $year,
                'Purchase.requestee' => $requestee)
            );
        }
        $this->set('purchases', $this->Purchase->find('all', $condition));
        $this->set('month', $month);
        $this->set('year', $year);
        $this->set('requestee', $requestee);
    }

    public function cancel_request($id = NULL)
    {
        if(empty($this->data)){
            $this->data = $this->Purchase->read(NULL, $id);
        }else {
            if($this->Purchase->save($this->data)){
                $this->Session->setFlash('The purchase was rejected');
                $this->redirect(array('controller' => 'users', 'action' => 'requests'));
            }
        }
    }

}

