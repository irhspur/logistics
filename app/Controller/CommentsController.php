<?php
class CommentsController extends AppController{

    var $name = 'Comments';

    var $components = array('Session', 'Paginator');
    public function index(){
        $this->Comment->recursive = 0;
        $this->set('comments', $this->Paginator->paginate());
//		$this->set('Comments', $this->Comment->find('all'));
    }

    public function view ($id = NULL){
        $this->set('Comment', $this->Comment->read(NULL, $id)); //set method sends the resuts to the view
    }

    public function add($id = NULL, $username = NULL){

        $this->set('posts', $this->Comment->Post->read(NULL, $id)); //set method sends the resuts to the view

        $options = array('conditions' => array(
            'Comment.post_id' => $id,
        ));
        $this->set('comments', $this->Comment->find('all', $options));

        if(!empty($this->data)){//kind of like $_POST but in formattted way in array

            //set the user
            $this->request->data['Comment']['post_id'] = $id;
            $this->request->data['Comment']['name'] = $username;

            if($this->Comment->save($this->data)){ //saves the data and checks if the save was sucessful..
                $this->Session->setFlash('The Comment was sucessfully added');
                $this->redirect(array('action' => 'add', $id, $username));
            }else{
                $this->Session->setFlash('The Comment was not saved');
            }

        }
    }

    public function edit ($id = NULL){

        if(empty($this->data)){ //if empty prepopulate the data
            $this->data = $this->Comment->read(NULL, $id); //NULL represents to return all the fields
        }else{ //someone is updating the Comment and we need to save the data
            if($this->Comment->save($this->data)){
                $this->Session->setFlash('The Comment was saved');
                $this->redirect(array('action' =>'index', $id));
            }
        }

    }

    public function delete ($id = NULL) {
        $this->Comment->delete($id);
        $this->Session->setFlash('The Comment has been deleted');
        $this->redirect(array('action' => 'index'));
    }
}

?>