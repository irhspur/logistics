<div class="logistics view">
<h2><?php echo __('Logistic'); ?></h2>
	<dl>
		<dt><?php echo __('Id'); ?></dt>
		<dd>
			<?php echo h($logistic['Logistic']['id']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Category'); ?></dt>
		<dd>
			<?php echo h($logistic['Logistic']['category']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Name'); ?></dt>
		<dd>
			<?php echo h($logistic['Logistic']['name']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Price'); ?></dt>
		<dd>
			<?php echo h($logistic['Logistic']['price']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Vendor Id'); ?></dt>
		<dd>
			<?php echo h($logistic['Vendor']['company']); ?>
			&nbsp;
		</dd>
	</dl>
</div>
<div class="actions">
	<h3><?php echo __('Actions'); ?></h3>
	<ul>
		<li><?php echo $this->Html->link(__('Edit Logistic'), array('action' => 'edit', $logistic['Logistic']['id'])); ?> </li>
		<li><?php echo $this->Form->postLink(__('Delete Logistic'), array('action' => 'delete', $logistic['Logistic']['id']), array(), __('Are you sure you want to delete # %s?', $logistic['Logistic']['id'])); ?> </li>
		<li><?php echo $this->Html->link(__('List Logistics'), array('action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Logistic'), array('action' => 'add')); ?> </li>
		<li><?php echo $this->Html->link(__('List Purchases'), array('controller' => 'purchases', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Purchase'), array('controller' => 'purchases', 'action' => 'add')); ?> </li>
	</ul>
</div>
