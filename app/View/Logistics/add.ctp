<div class="logistics form">
<?php echo $this->Form->create('Logistic'); ?>
	<fieldset>
		<legend><?php echo __('Add Logistic'); ?></legend>
	<?php
//		echo $this->Form->input('category');
        echo $this->Form->input('category', array(
            'options' => array(
                'Stationary' => 'Stationary',
                'Furniture' => 'Furniture',
                'Food and Beverages' => 'Food and Beverages',
                'Vehicle' => 'Vehicle'),
            'empty' => '(Choose one)'
        ));
		echo $this->Form->input('name');
		echo $this->Form->input('price');
		echo $this->Form->input('vendor_id');
	?>
	</fieldset>
<?php echo $this->Form->end(__('Submit')); ?>
</div>
<div class="actions">
	<h3><?php echo __('Actions'); ?></h3>
	<ul>

		<li><?php echo $this->Html->link(__('List Logistics'), array('action' => 'index')); ?></li>
		<li><?php echo $this->Html->link(__('List Purchases'), array('controller' => 'purchases', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Purchase'), array('controller' => 'purchases', 'action' => 'add')); ?> </li>
	</ul>
</div>
