<div class="users view">
<h2><?php echo __('My Profile'); ?></h2>
	<dl>
		<dt><?php echo __('Id'); ?></dt>
		<dd>
			<?php echo h($user['User']['id']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Username'); ?></dt>
		<dd>
			<?php echo h($user['User']['username']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Password'); ?></dt>
		<dd>
			<?php echo h($user['User']['password']); ?>
			&nbsp;
		</dd>
	</dl>
</div>
<div class="actions">
	<h3><?php echo __('Actions'); ?></h3>
	<?php if($admin):?>
	<ul>
		<li><?php echo $this->Html->link(__('Edit User'), array('action' => 'edit', $user['User']['id'])); ?> </li>
		<li><?php echo $this->Form->postLink(__('Delete User'), array('action' => 'delete', $user['User']['id']), array(), __('Are you sure you want to delete # %s?', $user['User']['id'])); ?> </li>
		<li><?php echo $this->Html->link(__('List Users'), array('action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New User'), array('action' => 'add')); ?> </li>
	</ul>
	<?php else:?>
	<ul>
	    <li><?php echo $this->Html->link(__('Edit Profile'), array('action' => 'edit', $user['User']['id'])); ?> </li>
        <li><?php echo $this->Html->link(__('Request Item'), array('controller' =>'purchases', 'action' => 'add', $user['User']['username'])); ?> </li>
        <li><?php echo $this->Html->link(__('My Purchases'), array('controller' =>'purchases', 'action' => 'view', $user['User']['username'])); ?> </li>
        <li><?php echo $this->Html->link(__('List Items'), array('controller' => 'logistics', 'action' => 'index')); ?> </li>
    </ul>
	<?php endif;?>
</div>
