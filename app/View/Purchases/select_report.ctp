<div class="users index">
    <h3><?php echo __('Generate Report'); ?></h3>
    <?php if($admin):?>
    <fieldset>
        <legend><?php echo __('Select details'); ?></legend>
        <?php
        echo $this->Form->create('Purchase', array('action' => 'select_report'));
        echo $this->Form->input('month');
        echo $this->Form->input('year');
        echo $this->Form->input('user');
        ?>
    </fieldset>
    <?php echo $this->Form->end(__('View Report')); ?>
</div>
<div class="actions">
    <h3><?php echo __('Actions'); ?></h3>
        <ul>
            <li><?php echo $this->Html->link(__('New User'), array('action' => 'add')); ?></li>
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
        </ul>
    <?php else:?>
       <?php $this->Session->flash('auth'); ?>
    <?php endif;?>
</div>
