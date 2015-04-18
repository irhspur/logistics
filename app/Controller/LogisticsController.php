<?php
App::uses('AppController', 'Controller');
/**
 * Logistics Controller
 *
 * @property Logistic $Logistic
 * @property PaginatorComponent $Paginator
 * @property SessionComponent $Session
 */
class LogisticsController extends AppController {

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
        $this->Logistic->recursive = 0;
        $this->set('logistics', $this->Paginator->paginate());
    }

    /**
     * view method
     *
     * @throws NotFoundException
     * @param string $id
     * @return void
     */
    public function view($id = null) {
        if (!$this->Logistic->exists($id)) {
            throw new NotFoundException(__('Invalid logistic'));
        }
        $options = array('conditions' => array('Logistic.' . $this->Logistic->primaryKey => $id));
        $this->set('logistic', $this->Logistic->find('first', $options));
    }

    /**
     * add method
     *
     * @return void
     */
    public function add() {
        if ($this->request->is('post')) {
            $this->Logistic->create();
            if ($this->Logistic->save($this->request->data)) {
                $this->Session->setFlash(__('The logistic has been saved.'));
                return $this->redirect(array('action' => 'index'));
            } else {
                $this->Session->setFlash(__('The logistic could not be saved. Please, try again.'));
            }
        }
        $vendors = $this->Logistic->Vendor->find('list');
        $this->set(compact('vendors'));
    }

    /**
     * edit method
     *
     * @throws NotFoundException
     * @param string $id
     * @return void
     */
    public function edit($id = null) {
        if (!$this->Logistic->exists($id)) {
            throw new NotFoundException(__('Invalid logistic'));
        }
        if ($this->request->is(array('post', 'put'))) {
            if ($this->Logistic->save($this->request->data)) {
                $this->Session->setFlash(__('The logistic has been saved.'));
                return $this->redirect(array('action' => 'index'));
            } else {
                $this->Session->setFlash(__('The logistic could not be saved. Please, try again.'));
            }
        } else {
            $options = array('conditions' => array('Logistic.' . $this->Logistic->primaryKey => $id));
            $this->request->data = $this->Logistic->find('first', $options);
        }
        $vendors = $this->Logistic->Vendor->find('list');
        $this->set(compact('vendors'));
    }

    /**
     * delete method
     *
     * @throws NotFoundException
     * @param string $id
     * @return void
     */
    public function delete($id = null) {
        $this->Logistic->id = $id;
        if (!$this->Logistic->exists()) {
            throw new NotFoundException(__('Invalid logistic'));
        }
        $this->request->allowMethod('post', 'delete');
        if ($this->Logistic->delete()) {
            $this->Session->setFlash(__('The logistic has been deleted.'));
        } else {
            $this->Session->setFlash(__('The logistic could not be deleted. Please, try again.'));
        }
        return $this->redirect(array('action' => 'index'));
    }
}
