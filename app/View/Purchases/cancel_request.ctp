<div class="cancel form">
    <?php echo $this->Form->create('Purchase', array('action' => 'cancel_request')); ?>
    <fieldset>
        <legend><?php echo __('Reason to cancel the purchase'); ?></legend>
        <?php
        echo $this->Form->input('cancel_reason');
        echo $this->Form->input('purchase_status', array('type' => 'hidden', 'value' => 'rejected'));
        echo $this->Form->input('id', array('type' => 'hidden'));
        ?>
    </fieldset>
    <?php echo $this->Form->end(__('Cancel Request')); ?>
</div>
<div class="actions">
    <h3><?php echo __('Actions'); ?></h3>
    <ul>

<!--        <li>--><?php //echo $this->Form->postLink(__('Delete'), array('action' => 'delete', $this->Form->value('Admin.id')), array(), __('Are you sure you want to delete # %s?', $this->Form->value('Admin.id'))); ?><!--</li>-->
<!--        <li>--><?php //echo $this->Html->link(__('List Admins'), array('action' => 'index')); ?><!--</li>-->
    </ul>
</div>
