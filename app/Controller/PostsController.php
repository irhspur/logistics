<?php
class PostsController extends AppController{

	var $name = 'Posts';

	var $components = array('Session');
	public function index(){
		$this->set('posts', $this->Post->find('all'));
	}

	public function view ($id = NULL){
		$this->set('post', $this->Post->read(NULL, $id)); //set method sends the resuts to the view
	}

	public function add(){

		if(!empty($this->data)){//kind of like $_POST but in formattted way in array
			if($this->Post->save($this->data)){ //saves the data and checks if the save was sucessful..
				$this->Session->setFlash('The post was sucessfully added');
				$this->redirect(array('action' => 'index'));
			}else{
				$this->Session->setFlash('The Post was not saved');
			}

		} 
	}

	public function edit ($id = NULL){

		if(empty($this->data)){ //if empty prepopulate the data
			$this->data = $this->Post->read(NULL, $id); //NULL represents to return all the fields
		}else{ //someone is updating the post and we need to save the data
			if($this->Post->save($this->data)){
				$this->Session->setFlash('The post was saved');
				$this->redirect(array('action' =>'index', $id));
			}
		} 

	}

	public function delete ($id = NULL) {
		$this->Post->delete($id);
		$this->Session->setFlash('The post has been deleted');
		$this->redirect(array('action' => 'index'));
	}
}

?>