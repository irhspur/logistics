<h2><?php echo $comment['Comment']['name']; ?></h2>

	<p><?php echo $comment['Comment']['content']; ?></p>
	<p><small>Created on: <?php echo $comment['Comment']['created']; ?></small></p>
	<p><small>Modified on: <?php echo $comment['Comment']['modified']; ?></small></p>

	<br />
	<p><?php echo $this->Html->link('Back', array('controller' => 'Posts', 'action' =>'index')); ?></p>