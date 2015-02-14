<div class="branches view">
<h2><?php echo __('Branch'); ?></h2>
	<dl>
		<dt><?php echo __('Id'); ?></dt>
		<dd>
			<?php echo h($branch['Branch']['id']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Name'); ?></dt>
		<dd>
			<?php echo h($branch['Branch']['name']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Location'); ?></dt>
		<dd>
			<?php echo h($branch['Branch']['location']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Contact'); ?></dt>
		<dd>
			<?php echo h($branch['Branch']['contact']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Branch Manager Id'); ?></dt>
		<dd>
			<?php echo h($branch['Branch']['branch_manager_id']); ?>
			&nbsp;
		</dd>
	</dl>
</div>
<div class="actions">
	<h3><?php echo __('Actions'); ?></h3>
	<ul>
		<li><?php echo $this->Html->link(__('Edit Branch'), array('action' => 'edit', $branch['Branch']['id'])); ?> </li>
		<li><?php echo $this->Form->postLink(__('Delete Branch'), array('action' => 'delete', $branch['Branch']['id']), array(), __('Are you sure you want to delete # %s?', $branch['Branch']['id'])); ?> </li>
		<li><?php echo $this->Html->link(__('List Branches'), array('action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Branch'), array('action' => 'add')); ?> </li>
		<li><?php echo $this->Html->link(__('List Branch Managers'), array('controller' => 'branch_managers', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Branch Manager'), array('controller' => 'branch_managers', 'action' => 'add')); ?> </li>
	</ul>
</div>
	<div class="related">
		<h3><?php echo __('Related Branch Managers'); ?></h3>
	<?php if (!empty($branch['BranchManager'])): ?>
		<dl>
			<dt><?php echo __('Id'); ?></dt>
		<dd>
	<?php echo $branch['BranchManager']['id']; ?>
&nbsp;</dd>
		<dt><?php echo __('Firstname'); ?></dt>
		<dd>
	<?php echo $branch['BranchManager']['firstname']; ?>
&nbsp;</dd>
		<dt><?php echo __('Lastname'); ?></dt>
		<dd>
	<?php echo $branch['BranchManager']['lastname']; ?>
&nbsp;</dd>
		<dt><?php echo __('Username'); ?></dt>
		<dd>
	<?php echo $branch['BranchManager']['username']; ?>
&nbsp;</dd>
		<dt><?php echo __('Password'); ?></dt>
		<dd>
	<?php echo $branch['BranchManager']['password']; ?>
&nbsp;</dd>
		<dt><?php echo __('Branch Id'); ?></dt>
		<dd>
	<?php echo $branch['BranchManager']['branch_id']; ?>
&nbsp;</dd>
		<dt><?php echo __('Contact'); ?></dt>
		<dd>
	<?php echo $branch['BranchManager']['contact']; ?>
&nbsp;</dd>
		</dl>
	<?php endif; ?>
		<div class="actions">
			<ul>
				<li><?php echo $this->Html->link(__('Edit Branch Manager'), array('controller' => 'branch_managers', 'action' => 'edit', $branch['BranchManager']['id'])); ?></li>
			</ul>
		</div>
	</div>
	