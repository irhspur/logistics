<div class="post view">
<h2><?php echo $post['Post']['title']; ?></h2>

	<p><?php echo $post['Post']['body']; ?></p>
	<p><small>Created on: <?php echo $post['Post']['created']; ?></small>
	<small>Modified on: <?php echo $post['Post']['modified']; ?></small></p>

	<br />
    <p><?php echo $this->Html->link('Comments', array('controller' => 'comments', 'action' => 'add', $post['Post']['id'], $current_user['username'])); ?></p>

    <?php if($current_user['roles'] == 'branch_manager'):?>
	    <p><?php echo $this->Html->link('Back', array('action' =>'index_overall', $current_user['branch_id'])); ?></p>
    <?php else:?>
        <p><?php echo $this->Html->link('Back', array('action' =>'index', $current_user['id'])); ?></p>
    <?php endif;?>
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

