<div class="vendors form">
    <?php echo $this->Form->create('Vendor'); ?>
    <fieldset>
        <legend><?php echo __('Add Vendor'); ?></legend>
        <?php
        echo $this->Form->input('company');
        echo $this->Form->input('name_of_person');
        echo $this->Form->input('contact');
        ?>
    </fieldset>
    <?php echo $this->Form->end(__('Submit')); ?>
</div>
<div class="actions">
    <h3><?php echo __('Actions'); ?></h3>
    <ul>

        <li><?php echo $this->Html->link(__('List Vendors'), array('action' => 'index')); ?></li>
        <li><?php echo $this->Html->link(__('List Logistics'), array('controller' => 'logistics', 'action' => 'index')); ?> </li>
    </ul>
</div>
