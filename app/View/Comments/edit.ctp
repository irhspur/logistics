<h2>Edit Post</h2>

<?php
	echo $this->Form->create('Comment', array('action' => 'edit'));
	echo $this->Form->input('name');
	echo $this->Form->input('content');
	echo $this->Form->input('id', array('type' => 'hidden'));
	echo $this->Form->end('Edit');
?>