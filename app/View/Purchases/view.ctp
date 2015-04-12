<div class="Users index">

	<h2><?php echo __('Purchases'); ?></h2>
	<table cellpadding="0" cellspacing="0">
	<thead>
	<tr>
			<th><?php echo $this->Paginator->sort('id'); ?></th>
			<th><?php echo $this->Paginator->sort('logistic_id'); ?></th>
			<th><?php echo $this->Paginator->sort('requestee'); ?></th>
			<th><?php echo $this->Paginator->sort('vendor_id'); ?></th>
            <th><?php echo $this->Paginator->sort('branch_id'); ?></th>
			<th><?php echo $this->Paginator->sort('quantity'); ?></th>
			<th><?php echo $this->Paginator->sort('amount'); ?></th>
			<th><?php echo $this->Paginator->sort('purchase_status'); ?></th>
			<th><?php echo $this->Paginator->sort('created'); ?></th>
			<th class="actions"><?php echo __('Actions'); ?></th>
	</tr>
	</thead>
	<tbody>
	<?php foreach ($purchases as $purchase): ?>
	<tr>
		<td><?php echo $purchase['Purchase']['id']; ?></td>
		<td><?php echo $purchase['Logistic']['name']; ?></td>
        <td><?php echo $purchase['User']['username']; ?></td>
        <td><?php echo $purchase['Vendor']['company']; ?></td>
        <td><?php echo $purchase['Branch']['name']; ?></td>
		<td><?php echo $purchase['Purchase']['quantity']; ?></td>

		<td><?php echo $purchase['Purchase']['amount']; ?></td>
		<td><?php if($purchase['Purchase']['purchase_status'] == 'rejected'): ?>
                <?php
                    echo $this->Form->postLink(
                        __($purchase['Purchase']['purchase_status']),
                        array(),
                        array(),
                        __('Your purchase was rejected due to following reason:'."\n\r".'- %s', $purchase['Purchase']['cancel_reason']));
                ?>
            <?php else:?>
                <?php echo $purchase['Purchase']['purchase_status']; ?>
            <?php endif;?>

        </td>
		<td><?php echo $purchase['Purchase']['created']; ?></td>
		<td class="actions">
            <?php if($admin):?>
                <?php if($purchase['Purchase']['purchase_status'] == 'pending' || $purchase['Purchase']['purchase_status'] == 'rejected'):?>
                    <?php /*echo $this->Form->postLink(__('Approve Request'), array('action' => 'approve', $purchase['Purchase']['id'], $purchase['Purchase']['requestee']), array(), __('Are you sure you want to approve purchase # %s?', $purchase['Purchase']['id'])); */?>
                    <?php echo $this->Form->postLink(__('Approve Request'), array('action' => 'poaf_form', $purchase['Purchase']['id'], $purchase['Purchase']['requestee'])); ?>
                <?php else:?>
                    <?php echo $this->Form->postLink(__('Disapprove Request'), array('action' => 'disapprove', $purchase['Purchase']['id'], $purchase['Purchase']['requestee']), array(), __('Are you sure you want to disapprove purchase # %s?', $purchase['Purchase']['id'])); ?>
                <?php endif;?>
                <?php echo $this->Form->postLink(__('Reject Purchase'), array('action' => 'cancel_request', $purchase['Purchase']['id']), array(), __('Are you sure you want to cancel purchase # %s?', $purchase['Purchase']['id'])); ?>
            <?php else:?>
                <?php echo $this->Form->postLink(__('Cancel Purchase'), array('action' => 'delete', $purchase['Purchase']['id'], $current_user['username']), array(), __('Are you sure you want to cancel purchase # %s?', $purchase['Purchase']['id'])); ?>
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
            <li><?php echo $this->Html->link(__('New User'), array('controller' => 'users', 'action' => 'add')); ?></li>
            <li><?php echo $this->Html->link(__('New Branch'), array('controller' => 'branches', 'action' => 'add')); ?></li>
            <li><?php echo $this->Html->link(__('New Item'), array('controller' => 'logistics', 'action' => 'add')); ?></li>
            <li><?php echo $this->Html->link(__('New Vendor'), array('controller' => 'vendors', 'action' =>'add')); ?></li>
            <li>------------------------------</li>
            <li><?php echo $this->Html->link(__('Show Branches'), array('controller' => 'branches', 'action' => 'index')); ?></li>
            <li><?php echo $this->Html->link(__('Show Items'), array('controller' => 'logistics', 'action' => 'index')); ?></li>
            <li><?php echo $this->Html->link(__('Show Vendors'), array('controller' => 'vendors', 'action' => 'index')); ?></li>
            <li>------------------------------</li>
            <li><?php echo $this->Html->link(__('Item Requests'), array('controller' => 'users', 'action' => 'requests')); ?></li>
            <li>------------------------------</li>
            <li><?php echo $this->Html->link(__('Purchase Report'), array('controller' => 'purchases', 'action' => 'select_report')); ?></li>
        </ul>
    <?php else:?>
	<ul>
		<li><?php echo $this->Html->link(__('My Profile'), array('controller' =>'users', 'action' => 'view', $current_user['id'])); ?></li>
		<li><?php echo $this->Html->link(__('Request Item'), array('controller' =>'purchases', 'action' => 'add', $current_user['username'])); ?> </li>
        <li><?php echo $this->Html->link(__('List Items'), array('controller' => 'logistics', 'action' => 'index')); ?></li>
    </ul>
    <?php endif;?>
</div>
