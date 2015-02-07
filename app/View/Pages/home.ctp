<?php 
if(isset($_SESSION['username'])){ 
    echo $this->Html->link('Log Out', array('controller' => 'users','action' => 'logout'));
}

if(!isset($_SESSION['username'])){ 
    echo $this->Html->link('Log In', array('controller' => 'users','action' => 'login'));
}
?> 