<?php
/**
 * Users Controller
 *
 * @property User $User
 * @property PaginatorComponent $Paginator
 * @property SessionComponent $Session
 */
class UsersController extends AppController {

	public function beforeFilter(){
		parent::beforeFilter();

		if($this->action == 'add' || $this->action == 'edit'){
			$this->Auth->authenticate = $this->User;
		}

		$this->Auth->allow('index', 'login');
	}

/**
 * Components
 *
 * @var array
 */
	public $components = array('Paginator', 'Session');

	function login(){
		if ($this->request->is('post')) {
            if ($this->Auth->login()) {
                return $this->redirect($this->Auth->redirect());
            }
            $this->Session->setFlash(
                __('Username or password is incorrect'),
                'default',
                array(),
                'auth'
            );
        }
	}

	function logout(){
		$this->redirect($this->Auth->logout());
	}
/**
 * index method
 *
 * @return void
 */
	public function index() {
		$this->User->recursive = 0;
		$this->set('users', $this->Paginator->paginate());

        $options = array('conditions' => array('User.roles !=' => 'admin'));
        $this->set('users', $this->User->find('all', $options));
	}

/**
 * view method
 *
 * @throws NotFoundException
 * @param string $id
 * @return void
 */
	public function view($id = null) {
		if (!$this->User->exists($id)) {
			throw new NotFoundException(__('Invalid User'));
		}
		$options = array('conditions' => array('User.' . $this->User->primaryKey => $id));
		$this->set('user', $this->User->find('first', $options));
	}

/**
 * add method
 *
 * @return void
 */
	public function add() {
		if ($this->request->is('post')) {
			$this->User->create();
			if ($this->User->save($this->request->data)) {
				$this->Session->setFlash(__('The User has been saved.'));
				return $this->redirect(array('action' => 'index'));
			} else {
				$this->Session->setFlash(__('The User could not be saved. Please, try again.'));
			}
		}
		$branches = $this->User->Branch->find('list');
		$this->set(compact('branches'));
	}

/**
 * edit method
 *
 * @throws NotFoundException
 * @param string $id
 * @return void
 */
	public function edit($id = null) {
		if (!$this->User->exists($id)) {
			throw new NotFoundException(__('Invalid User'));
		}
        if(empty($this->data)){ //if empty prepopulate the data
            $this->data = $this->User->read(NULL, $id); //NULL represents to return all the fields
        }else{ //someone is updating the post and we need to save the data
            if($this->User->save($this->data)){
                $this->Session->setFlash('The post was saved');
                $this->redirect(array('action' => 'index'));
            } else {
                $this->Session->setFlash('The post was not saved. Please try again');
            }
        }

        $branches = $this->User->Branch->find('list');
        $this->set(compact('branches'));
	}

/**
 * delete method
 *
 * @throws NotFoundException
 * @param string $id
 * @return void
 */
	public function delete($id = null) {
		$this->User->id = $id;
		if (!$this->User->exists()) {
			throw new NotFoundException(__('Invalid User'));
		}
		$this->request->allowMethod('post', 'delete');
		if ($this->User->delete()) {
			$this->Session->setFlash(__('The User has been deleted.'));
		} else {
			$this->Session->setFlash(__('The User could not be deleted. Please, try again.'));
		}
		return $this->redirect(array('action' => 'index'));
	}

    /**
     * requests method
     *
     * @throws NotFoundException
     * @param string $id
     * @return void
     */
    public function requests() {

        $options = array('conditions' => array('User.roles' =>'branch_manager'));
        $this->set('users', $this->User->find('all', $options));

        $branches = $this->User->Branch->find('list');
        $this->set(compact('branches'));
//        $this->set('users', $this->Paginator->paginate());
    }





}
