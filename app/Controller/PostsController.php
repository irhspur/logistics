<?php
class PostsController extends AppController{

	var $name = 'Posts';

	var $components = array('Session', 'Paginator');

	public function index($userId = NULL){
        $this->Post->recursive = 0;

        $this->set('posts', $this->Paginator->paginate());
        $this->set('posts', $this->Post->find('all', array('conditions' => array('Post.user_id' => $userId))));
    }

    public function index_overall($branchId = NULL) {
        $this->Post->recursive = 0;
        $this->set('posts', $this->Paginator->paginate());
        $this->set('posts', $this->Post->find('all', array('conditions' => array('User.branch_id' => $branchId))));

    }

	public function view ($id = NULL){
		$this->set('post', $this->Post->read(NULL, $id)); //set method sends the resuts to the view
	}

	public function add($id = NULL, $role = NULL, $branchId = NULL){

		if(!empty($this->data)){//kind of like $_POST but in formattted way in array

            //set the user
            $this->request->data['Post']['user_id'] = $id;

			if($this->Post->save($this->data)){ //saves the data and checks if the save was sucessful..
				$this->Session->setFlash('The post was sucessfully added');
                if($role == 'branch_manager'){
                    $this->redirect(array('action' => 'index_overall', $branchId));
                } else {
                    $this->redirect(array('action' => 'index', $id));
                }
			}else{
				$this->Session->setFlash('The Post was not saved');
			}

		} 
	}

	public function edit ($id = NULL, $userId = NULL, $role = NULL, $branchId = NULL){

		if(empty($this->data)){ //if empty prepopulate the data
			$this->data = $this->Post->read(NULL, $id); //NULL represents to return all the fields
		}else{ //someone is updating the post and we need to save the data
			if($this->Post->save($this->data)){
				$this->Session->setFlash('The post was saved');
                if($role == 'branch_manager'){
                    $this->redirect(array('action' => 'index_overall', $branchId));
                } else {
                    $this->redirect(array('action' => 'index', $userId));
                }
			}
		} 

	}

	public function delete ($id = NULL, $userId = NULL, $role = NULL, $branchId = NULL) {
		$this->Post->delete($id);
		$this->Session->setFlash('The post has been deleted');

        if($role == 'branch_manager'){
            $this->redirect(array('action' => 'index_overall', $branchId));
        } else {
            $this->redirect(array('action' => 'index', $userId));
        }
	}
}

?>