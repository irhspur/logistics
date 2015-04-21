<div class="users view">
    <h2><?php echo __('Evidence of Goods Received Form'); ?></h2>
    <dl>
        <dt><?php echo __('Id'); ?></dt>
        <dd>
            <?php echo h($purchase['Purchase']['id']); ?>
            &nbsp;
        </dd>
        <dt><?php echo __('Branch'); ?></dt>
        <dd>
            <?php echo h($purchase['Branch']['name']); ?>
            &nbsp;
        </dd>
        <dt><?php echo __('Username'); ?></dt>
        <dd>
            <?php echo h($purchase['User']['username']); ?>
            &nbsp;
        </dd>
    </dl>
    <hr>
    <dl>
        <dt><?php echo __('Item'); ?></dt>
        <dd>
            <?php echo h($purchase['Logistic']['name']); ?>
            &nbsp;
        </dd>
        <dt><?php echo __('Quantity'); ?></dt>
        <dd>
            <?php echo h($purchase['Purchase']['quantity']); ?>
            &nbsp;
        </dd>
        <dt><?php echo __('Amount'); ?></dt>
        <dd>
            <?php echo h($purchase['Purchase']['amount']); ?>
            &nbsp;
        </dd>
        <dt><?php echo __('Date of purchase'); ?></dt>
        <dd>
            <?php echo h($purchase['Purchase']['created']); ?>
            &nbsp;
        </dd>
    </dl>
    <hr>
    <dl>
        <dt><?php echo __('Vendor'); ?></dt>
        <dd>
            <?php echo h($purchase['Vendor']['company']); ?>
            &nbsp;
        </dd>
        <dt><?php echo __('Vendor Name'); ?></dt>
        <dd>
            <?php echo h($purchase['Vendor']['name_of_person']); ?>
            &nbsp;
        </dd>
    </dl>
    <?php echo $this->Form->postLink(__('Confirm Deliverance'), array('action' => 'delivered', $purchase['Purchase']['id'], $purchase['Purchase']['user_id']), array(), __('Are you sure you want to confirm the deliverance of the purchase # %s?', $purchase['Purchase']['id'])); ?>
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
            <li><?php echo $this->Html->link(__('Show Items'), array('controller' => 'logistics', 'action' => 'index')); ?></li>
            <li><?php echo $this->Html->link(__('Request Item'), array('controller' => 'purchases', 'action' => 'add', $current_user['username'])); ?></li>
            <li><?php echo $this->Html->link(__('My Purchases'), array('controller' => 'purchases', 'action' => 'view', $current_user['branch_id'])); ?> </li>
            <li><?php echo $this->Html->link(__('Dispatched Purchases'), array('controller' => 'purchases', 'action' => 'view_dispatched', $current_user['branch_id'])); ?></li>
            <li><?php echo $this->Html->link(__('Delivered Purchases'), array('controller' => 'purchases', 'action' => 'view_delivered', $current_user['branch_id'])); ?></li>
            <li><?php echo $this->Html->link(__('Create a post'), array('controller' => 'posts', 'action' => 'add', $current_user['id'], $current_user['roles'], $current_user['branch_id'])); ?></li>
            <li><?php echo $this->Html->link(__('View posts'), array('controller' => 'posts', 'action' => 'index_overall', $current_user['branch_id'])); ?></li>
        </ul>

    <?php else: ?>
        <ul>
            <li><?php echo $this->Html->link(__('My Profile'), array('controller' => 'users', 'action' => 'view', $current_user['id'])); ?></li>
            <li><?php echo $this->Html->link(__('Edit Profile'), array('controller' => 'users', 'action' => 'edit', $current_user['id'])); ?></li>
            <li><?php echo $this->Html->link(__('Show Items'), array('controller' => 'logistics', 'action' => 'index')); ?></li>
            <li><?php echo $this->Html->link(__("Branch's Purchases"), array('controller' => 'purchases', 'action' => 'view', $current_user['branch_id'])); ?> </li>
            <li><?php echo $this->Html->link(__('Dispatched Purchases'), array('controller' => 'purchases', 'action' => 'view_dispatched', $current_user['branch_id'])); ?></li>
            <li><?php echo $this->Html->link(__('Delivered Purchases'), array('controller' => 'purchases', 'action' => 'view_delivered', $current_user['branch_id'])); ?></li>
            <li><?php echo $this->Html->link(__('Create a post'), array('controller' => 'posts', 'action' => 'add', $current_user['id'], $current_user['roles'], $current_user['branch_id'])); ?></li>
            <li><?php echo $this->Html->link(__('View posts'), array('controller' => 'posts', 'action' => 'index', $current_user['id'])); ?></li>
        </ul>
    <?php endif;?>
</div>

