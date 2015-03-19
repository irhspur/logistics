<div class="Users index">

	<h2><?php echo __('Purchases'); ?></h2>
	<table cellpadding="0" cellspacing="0">
	<thead>
	<tr>
			<th><?php echo $this->Paginator->sort('id'); ?></th>
			<th><?php echo $this->Paginator->sort('logistic_id'); ?></th>
			<th><?php echo $this->Paginator->sort('requestee'); ?></th>
			<th><?php echo $this->Paginator->sort('vendor_id'); ?></th>
			<th><?php echo $this->Paginator->sort('quantity'); ?></th>
			<th><?php echo $this->Paginator->sort('amount'); ?></th>
			<th><?php echo $this->Paginator->sort('purchase_status'); ?></th>
			<th class="actions"><?php echo __('Actions'); ?></th>
	</tr>
	</thead>
	<tbody>
	<?php foreach ($purchases as $purchase): ?>
	<tr>
		<td><?php echo $purchase['Purchase']['id']; ?></td>
		<td><?php echo $purchase['Logistic']['name']; ?></td>
		<td><?php echo $purchase['Purchase']['requestee']; ?></td>
		<td><?php echo $purchase['Vendor']['company']; ?></td>
		<td><?php echo $purchase['Purchase']['quantity']; ?></td>
		<td><?php echo $purchase['Purchase']['amount']; ?></td>
		<td><?php echo $purchase['Purchase']['purchase_status']; ?></td>
		<td class="actions">
			<?php echo $this->Form->postLink(__('Cancel'), array('action' => 'delete', $purchase['Purchase']['id'], $current_user['username']), array(), __('Are you sure you want to cancel purchase # %s?', $purchase['Purchase']['id'])); ?>
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
	<ul>
		<li><?php echo $this->Html->link(__('My Profile'), array('controller' =>'users', 'action' => 'view', $current_user['id'])); ?></li>
		<li><?php echo $this->Html->link(__('Request Item'), array('controller' =>'purchases', 'action' => 'add', $current_user['username'])); ?> </li>
        <li><?php echo $this->Html->link(__('List Items'), array('controller' => 'logistics', 'action' => 'index')); ?></li>
    </ul>
</div>
