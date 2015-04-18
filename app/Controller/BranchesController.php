<?php
App::uses('AppController', 'Controller');
/**
 * Branches Controller
 *
 * @property Branch $Branch
 * @property PaginatorComponent $Paginator
 * @property SessionComponent $Session
 */
class BranchesController extends AppController {

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
    public function index() {
        $this->Branch->recursive = -1;
        $this->set('branches', $this->Paginator->paginate());
    }

    /**
     * view method
     *
     * @throws NotFoundException
     * @param string $id
     * @return void
     */
    public function view($id = null) {
        if (!$this->Branch->exists($id)) {
            throw new NotFoundException(__('Invalid branch'));
        }
        $options = array('conditions' => array('Branch.' . $this->Branch->primaryKey => $id));
        $this->set('branch', $this->Branch->find('first', $options));

        $userSelect = array('conditions' => array('User.roles' => 'branch_manager', 'User.branch_id' => $id));
        $user = $this->Branch->User->find('first', $userSelect);
        $this->set(compact('user'));

    }

    /**
     * add method
     *
     * @return void
     */
    public function add() {
        if ($this->request->is('post')) {
            $this->Branch->create();
            if ($this->Branch->save($this->request->data)) {
                $this->Session->setFlash(__('The branch has been saved.'));
                return $this->redirect(array('action' => 'index'));
            } else {
                $this->Session->setFlash(__('The branch could not be saved. Please, try again.'));
            }
        }
        /*$branchManager = $this->Branch->User->find(
            'list',
            array(
                'fields' => 'username',
                'conditions' => array('User.roles' => 'branch_manager')
            )
        );
        $this->set('branchManagers', $branchManager);*/
    }

    /**
     * edit method
     *
     * @throws NotFoundException
     * @param string $id
     * @return void
     */
    public function edit($id = null) {
        if (!$this->Branch->exists($id)) {
            throw new NotFoundException(__('Invalid branch'));
        }
        if ($this->request->is(array('post', 'put'))) {
            if ($this->Branch->save($this->request->data)) {
                $this->Session->setFlash(__('The branch has been saved.'));
                return $this->redirect(array('action' => 'index'));
            } else {
                $this->Session->setFlash(__('The branch could not be saved. Please, try again.'));
            }
        } else {
            $options = array('conditions' => array('Branch.' . $this->Branch->primaryKey => $id));
            $this->request->data = $this->Branch->find('first', $options);
        }
        $users = $this->Branch->User->find('list');
        $this->set(compact('users'));

    }

    /**
     * delete method
     *
     * @throws NotFoundException
     * @param string $id
     * @return void
     */
    public function delete($id = null) {
        $this->Branch->id = $id;
        if (!$this->Branch->exists()) {
            throw new NotFoundException(__('Invalid branch'));
        }
        $this->request->allowMethod('post', 'delete');
        if ($this->Branch->delete()) {
            $this->Session->setFlash(__('The branch has been deleted.'));
        } else {
            $this->Session->setFlash(__('The branch could not be deleted. Please, try again.'));
        }
        return $this->redirect(array('action' => 'index'));
    }
}
