<h2> Add a post</h2>
<?php
	echo "hello";
	echo $this->Form->create('Post', array('action'=>'add'));
	echo $this->Form->input('title');
	echo $this->Form->input('body');
	echo $this->Form->end('Create a post');
?>