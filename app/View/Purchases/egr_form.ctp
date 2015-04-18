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
