<div class="Users index">

    <?php if($admin):?>
    <h2><?php echo __('Monthly Purchases Report for the month of %s, %s (%s)',date('F', mktime(0, 0, 0, $month, 10)),$year, $requestee); ?></h2>
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
            <th><?php echo $this->Paginator->sort('created'); ?></th>
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
                <td><?php echo $purchase['Purchase']['created']; ?></td>
            </tr>
        <?php endforeach; ?>
        <?php endif;?>
        </tbody>
    </table>
    <p>
        <?php echo $this->Paginator->counter(array(
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
            <li><?php echo $this->Html->link(__('Show Users'), array('controller' => 'users', 'action' => 'index')); ?></li>
            <li><?php echo $this->Html->link(__('Show Branches'), array('controller' => 'branches', 'action' => 'index')); ?></li>
            <li><?php echo $this->Html->link(__('Show Items'), array('controller' => 'logistics', 'action' => 'index')); ?></li>
            <li><?php echo $this->Html->link(__('Show Vendors'), array('controller' => 'vendors', 'action' => 'index')); ?></li>
            <li>------------------------------</li>
            <li><?php echo $this->Html->link(__('Item Requests'), array('controller' => 'users', 'action' => 'requests')); ?></li>
            <li><?php echo $this->Html->link(__('Dispatch Purchases'), array('controller' => 'purchases', 'action' => 'view_approved')); ?></li>
            <li>------------------------------</li>
            <li><?php echo $this->Html->link(__('Purchase Report'), array('controller' => 'purchases', 'action' => 'select_report')); ?></li>
        </ul>
    <?php elseif($current_user['roles'] == 'branch_manager'): ?>
        <ul>
            <li><?php echo $this->Html->link(__('My Profile'), array('controller' => 'users', 'action' => 'view', $current_user['id'])); ?></li>
            <li><?php echo $this->Html->link(__('Edit Profile'), array('controller' => 'users', 'action' => 'edit', $current_user['id'])); ?></li>
            <li><?php echo $this->Html->link(__('Request Item'), array('controller' => 'purchases', 'action' => 'add', $current_user['username'])); ?></li>
            <li><?php echo $this->Html->link(__('My Purchases'), array('controller' => 'purchases', 'action' => 'view', $current_user['username'])); ?> </li>
            <li><?php echo $this->Html->link(__('Dispatched Purchases'), array('controller' => 'purchases', 'action' => 'view_dispatched', $current_user['id'])); ?></li>
            <li><?php echo $this->Html->link(__('Create a post'), array('controller' => 'posts', 'action' => 'add', $current_user['id'], $current_user['roles'], $current_user['branch_id'])); ?></li>
            <li><?php echo $this->Html->link(__('View posts'), array('controller' => 'posts', 'action' => 'index_overall', $current_user['branch_id'])); ?></li>
        </ul>

    <?php else: ?>
        <ul>
            <li><?php echo $this->Html->link(__('My Profile'), array('controller' => 'users', 'action' => 'view', $current_user['id'])); ?></li>
            <li><?php echo $this->Html->link(__('Edit Profile'), array('controller' => 'users', 'action' => 'edit', $current_user['id'])); ?></li>
            <li><?php echo $this->Html->link(__("Branch's Purchases"), array('controller' => 'purchases', 'action' => 'view', $current_user['username'])); ?> </li>
            <li><?php echo $this->Html->link(__('Dispatched Purchases'), array('controller' => 'purchases', 'action' => 'view_dispatched', $current_user['id'])); ?></li>
            <li><?php echo $this->Html->link(__('Create a post'), array('controller' => 'posts', 'action' => 'add', $current_user['id'], $current_user['roles'], $current_user['branch_id'])); ?></li>
            <li><?php echo $this->Html->link(__('View posts'), array('controller' => 'posts', 'action' => 'index', $current_user['id'])); ?></li>
        </ul>
    <?php endif;?>
</div>
