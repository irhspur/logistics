<div class="Purchase order form">
    <?php echo $this->Form->create('Purchase'); ?>
    <fieldset>
        <legend><?php echo __('Request an Item'); ?></legend>
        <?php
        echo $this->Form->input('logistic_id');
        echo $this->Form->input('quantity');
        echo $this->Form->input('remarks');
        echo $this->Form->input('optionsItems');
        ?>
    </fieldset>
    <?php echo $this->Form->end(__('Submit')); ?>
</div>
<div class="actions">
    <h3><?php echo __('Actions'); ?></h3>
    <ul>

        <li><?php echo $this->Html->link(__('List Items'), array('controller' => 'logistics', 'action' => 'index')); ?></li>
        <li><?php echo $this->Html->link(__('My Purchases'), array('controller' => 'purchases', 'action' => 'view', $current_user['username'])); ?> </li>
    </ul>
</div>
