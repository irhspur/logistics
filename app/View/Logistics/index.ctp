<div class="logistics index">
	<h2><?php echo __('Logistics'); ?></h2>
	<table cellpadding="0" cellspacing="0">
	<thead>
	<tr>
			<th><?php echo $this->Paginator->sort('id'); ?></th>
			<th><?php echo $this->Paginator->sort('category'); ?></th>
			<th><?php echo $this->Paginator->sort('name'); ?></th>
			<th><?php echo $this->Paginator->sort('price'); ?></th>
			<th><?php echo $this->Paginator->sort('vendor_id'); ?></th>
            <?php if($admin):?>
			<th class="actions"><?php echo __('Actions'); ?></th>
            <?php endif;?>
	</tr>
	</thead>
	<tbody>
	<?php foreach ($logistics as $logistic): ?>
	<tr>
		<td><?php echo h($logistic['Logistic']['id']); ?>&nbsp;</td>
		<td><?php echo h($logistic['Logistic']['category']); ?>&nbsp;</td>
		<td><?php echo h($logistic['Logistic']['name']); ?>&nbsp;</td>
		<td><?php echo h($logistic['Logistic']['price']); ?>&nbsp;</td>
		<td><?php echo h($logistic['Vendor']['company']); ?>&nbsp;</td>
		<td class="actions">
            <?php if($admin):?>
			<?php echo $this->Html->link(__('View'), array('action' => 'view', $logistic['Logistic']['id'])); ?>
			<?php echo $this->Html->link(__('Edit'), array('action' => 'edit', $logistic['Logistic']['id'])); ?>
			<?php echo $this->Form->postLink(__('Delete'), array('action' => 'delete', $logistic['Logistic']['id']), array(), __('Are you sure you want to delete # %s?', $logistic['Logistic']['id'])); ?>
            <?php endif;?>
		</td>
	</tr>
<?php endforeach; ?>
	</tbody>
	</table>
	<p>
	<?php
	echo $this->Paginator->counter(array(
	'format' => __('Page {:page} of {:pages}, showing {:current} records out of {:count} total, starting on record {:start}, ending on {:end}')
	));
	?>	</p>
	<div class="paging">
	<?php
		echo $this->Paginator->prev('< ' . __('previous'), array(), null, array('class' => 'prev disabled'));
		echo $this->Paginator->numbers(array('separator' => ''));
		echo $this->Paginator->next(__('next') . ' >', array(), null, array('class' => 'next disabled'));
	?>
	</div>
</div>
<div class="actions">
	<h3><?php echo __('Actions'); ?></h3>
    <?php if($admin):?>
    <ul>
		<li><?php echo $this->Html->link(__('New Logistic'), array('action' => 'add')); ?></li>
		<li><?php echo $this->Html->link(__('List Purchases'), array('controller' => 'purchases', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Purchase'), array('controller' => 'purchases', 'action' => 'add')); ?> </li>
    </ul>
    <?php else:?>
    <ul>
        <li><?php echo $this->Html->link(__('My Profile'), array('action' => 'view', $current_user['id'])); ?></li>
        <li><?php echo $this->Html->link(__('Edit Profile'), array('action' => 'edit', $current_user['id'])); ?></li>
        <li><?php echo $this->Html->link(__('Request Item'), array('controller' => 'purchases', 'action' => 'add', $current_user['username'])); ?></li>
        <li><?php echo $this->Html->link(__('My Purchases'), array('controller' => 'purchases', 'action' => 'view', $current_user['username'])); ?> </li>
    </ul>
    <?php endif;?>
</div>
