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

		if(isAdmin()){
			$this->Auth->allow('add'); 
		}
		
		$this->Auth->allow('index');
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
            return $this->redirect($this->Auth->redirectUrl());
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
		$this->set('User', $this->User->find('first', $options));
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
		if ($this->request->is(array('post', 'put'))) {
			if ($this->User->save($this->request->data)) {
				$this->Session->setFlash(__('The User has been saved.'));
				return $this->redirect(array('action' => 'index'));
			} else {
				$this->Session->setFlash(__('The User could not be saved. Please, try again.'));
			}
		} else {
			$options = array('conditions' => array('User.' . $this->User->primaryKey => $id));
			$this->request->data = $this->User->find('first', $options);
		}
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
}
