<div class="branches form">
<?php echo $this->Form->create('Branch'); ?>
	<fieldset>
		<legend><?php echo __('Y Edit Branch'); ?></legend>
	<?php
		echo $this->Form->input('id');
		echo $this->Form->input('name');
		echo $this->Form->input('location');
		echo $this->Form->input('contact');
		echo $this->Form->input('branch_manager_id');
	?>
	</fieldset>
<?php echo $this->Form->end(__('Submit')); ?>
</div>
<div class="actions">
	<h3><?php echo __('Actions'); ?></h3>
	<ul>

		<li><?php echo $this->Form->postLink(__('Delete'), array('action' => 'delete', $this->Form->value('Branch.id')), array(), __('Are you sure you want to delete # %s?', $this->Form->value('Branch.id'))); ?></li>
		<li><?php echo $this->Html->link(__('List Branches'), array('action' => 'index')); ?></li>
		<li><?php echo $this->Html->link(__('List Branch Managers'), array('controller' => 'branch_managers', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Branch Manager'), array('controller' => 'branch_managers', 'action' => 'add')); ?> </li>
	</ul>
</div>
