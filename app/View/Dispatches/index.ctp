<div class="branches index">
    <h2><?php echo __('Dispatches'); ?></h2>
    <table cellpadding="0" cellspacing="0">
        <thead>
        <tr>
            <th><?php echo $this->Paginator->sort('id'); ?></th>
            <th><?php echo $this->Paginator->sort('branch_id'); ?></th>
            <th><?php echo $this->Paginator->sort('logistic_id'); ?></th>
            <th><?php echo $this->Paginator->sort('purchase_id'); ?></th>
            <th><?php echo $this->Paginator->sort('vendor_id'); ?></th>
            <th><?php echo $this->Paginator->sort('user_id'); ?></th>
            <th><?php echo $this->Paginator->sort('dispatch_date'); ?></th>
            <th class="actions"><?php echo __('Actions'); ?></th>
        </tr>
        </thead>
        <tbody>
        <?php foreach ($dispatches as $dispatch): ?>
            <tr>
                <td><?php echo h($dispatch['Dispatch']['id']); ?>&nbsp;</td>
                <td><?php echo h($dispatch['Dispatch']['branch_id']); ?>&nbsp;</td>
                <td><?php echo h($dispatch['Dispatch']['logistic_id']); ?>&nbsp;</td>
                <td><?php echo h($dispatch['Dispatch']['purchase_id']); ?>&nbsp;</td>
                <td><?php echo h($dispatch['Dispatch']['vendor_id']); ?>&nbsp;</td>
                <td><?php echo h($dispatch['Dispatch']['user_id']); ?>&nbsp;</td>
                <td><?php echo h($dispatch['Dispatch']['dispatch_date']); ?>&nbsp;</td>
                <td class="actions">
                    <?php echo $this->Html->link(__('View'), array('action' => 'view', $dispatch['Dispatch']['id'])); ?>
                    <?php echo $this->Html->link(__('Edit'), array('action' => 'edit', $dispatch['Dispatch']['id'])); ?>
                    <?php echo $this->Form->postLink(__('Delete'), array('action' => 'delete', $dispatch['Dispatch']['id']), array(), __('Are you sure you want to delete # %s?', $dispatch['Dispatch']['id'])); ?>
                </td>
            </tr>
        <?php endforeach; ?>
        </tbody>
    </table>
    <p>
        <?php
        echo $this->Paginator->counter(array(
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
    <?php if($admin):?>
        <ul>
            <li><?php echo $this->Html->link(__('New User'), array('controller' => 'users', 'action' => 'add')); ?></li>
            <li><?php echo $this->Html->link(__('New Branch'), array('controller' => 'branches', 'action' => 'add')); ?></li>
            <li><?php echo $this->Html->link(__('New Item'), array('controller' => 'logistics', 'action' => 'add')); ?></li>
            <li><?php echo $this->Html->link(__('New Vendor'), array('controller' => 'vendors', 'action' =>'add')); ?></li>
            <li><?php echo $this->Html->link(__('Dispatch purchases'), array('controller' => 'purchases', 'action' =>'view_approved')); ?></li>
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
    <?php endif;?>
</div>

