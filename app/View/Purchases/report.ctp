<div class="Users index">

    <?php if($admin):?>
    <h2><?php echo __('Monthly Purchases Report for the month of %s, %s (%s)',date('F', mktime(0, 0, 0, $month, 10)),$year, $requestee); ?></h2>
    <table cellpadding="0" cellspacing="0">
        <thead>
        <tr>
            <th><?php echo $this->Paginator->sort('id'); ?></th>
            <th><?php echo $this->Paginator->sort('logistic_id'); ?></th>
            <th><?php echo $this->Paginator->sort('requestee'); ?></th>
            <th><?php echo $this->Paginator->sort('vendor_id'); ?></th>
            <th><?php echo $this->Paginator->sort('quantity'); ?></th>
            <th><?php echo $this->Paginator->sort('amount'); ?></th>
            <th><?php echo $this->Paginator->sort('purchase_status'); ?></th>
            <th><?php echo $this->Paginator->sort('created'); ?></th>
        </tr>
        </thead>
        <tbody>
        <?php foreach ($purchases as $purchase): ?>
        <tr>
                <td><?php echo $purchase['Purchase']['id']; ?></td>
                <td><?php echo $purchase['Logistic']['name']; ?></td>
                <td><?php echo $purchase['Purchase']['requestee']; ?></td>
                <td><?php echo $purchase['Vendor']['company']; ?></td>
                <td><?php echo $purchase['Purchase']['quantity']; ?></td>
                <td><?php echo $purchase['Purchase']['amount']; ?></td>
                <td><?php echo $purchase['Purchase']['purchase_status']; ?></td>
                <td><?php echo $purchase['Purchase']['created']; ?></td>
            </tr>
        <?php endforeach; ?>
        </tbody>
    </table>
    <p>
        <?php echo $this->Paginator->counter(array(
        'format' => __('Page {:page} of {:pages}, showing {:current} records out of {:count} total, starting on record {:start}, ending on {:end}')
        ));
        ?>	</p>
    <div class="paging">
        <?php
        echo $this->Paginator->prev('< ' . __('previous'), array(), null, array('class' => 'prev disabled'));
        echo $this->Paginator->numbers(array('separator' => ''));
        echo $this->Paginator->next(__('next') . ' >', array(), null, array('class' => 'next disabled'));
        ?>
    </div>
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
        <li>------------------------------</li>
        <li><?php echo $this->Html->link(__('Purchase Report'), array('controller' => 'purchases', 'action' => 'select_report')); ?></li>
    </ul>
    <?php else:?>
       <?php echo $this->Session->flash('auth'); ?>
    <?php endif;?>
</div>
