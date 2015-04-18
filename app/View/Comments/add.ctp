<div class = "comment form">
<h3><?php echo $this->Html->link($posts['Post']['title'], array('controller' => 'posts', 'action' => 'view', $posts['Post']['id']));?></h3>
<p><?php echo $posts['Post']['body']; ?></p>
<p><b>Comments</b></p>
<?php foreach($comments as $Comment): ?>
    <p><?php echo $Comment['Comment']['content']; ?></p>
    <p><?php echo 'Commented by : ' . $Comment['Comment']['name'] . ' on ' . $Comment['Comment']['created']; ?></p>
    <hr>
<?php endforeach;?>
    <br>
<p><b>Add a comment</b></p>
<?php
	echo $this->Form->create('Comment');
    echo $this->Form->input('post_id', array('type' => 'hidden'));
    echo $this->Form->input('name', array('type' => 'hidden'));
	echo $this->Form->input('content');
	echo $this->Form->end('Create a comment');
    echo $this->Html->link('Back', array('controller' => 'posts', 'action' => 'view', $posts['Post']['id']));

?>
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

