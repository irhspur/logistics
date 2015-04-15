<div class="cancel form">
    <?php echo $this->Form->create('Dispatch'); ?>
    <fieldset>
        <legend><?php echo __('Dispatch Details'); ?></legend>
        <?php
        echo $this->Form->input('dispatch_date');
        echo $this->Form->input('purchase_id', array('type' => 'hidden'));
        ?>
    </fieldset>
    <?php echo $this->Form->end(__('Dispatch')); ?>
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
            <li><?php echo $this->Html->link(__('Dispatch Purchases'), array('controller' => 'purchases', 'action' => 'view_approved')); ?></li>
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
