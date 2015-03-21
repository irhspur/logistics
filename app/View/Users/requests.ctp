<div class="users index">
    <h2><?php echo __('Item Requests'); ?></h2>
    <?php if($admin):?>
        <table cellpadding="0" cellspacing="0">
            <thead>
            <tr>
                <th><?php echo __('id'); ?></th>
                <th><?php echo __('username'); ?></th>
                <th><?php echo __('roles'); ?></th>
                <th class="actions"><?php echo __('Actions'); ?></th>
            </tr>
            </thead>
            <tbody>
            <?php foreach ($users as $User): ?>
                <tr>
                    <td><?php echo h($User['User']['id']); ?>&nbsp;</td>
                    <td><?php echo h($User['User']['username']); ?>&nbsp;</td>
                    <td><?php echo h($User['User']['roles']); ?>&nbsp;</td>
                    <td class="actions">
                        <?php echo $this->Html->link(__('View'), array('controller' =>'purchases', 'action' => 'view', $User['User']['username'])); ?>
                        <?php echo $this->Html->link(__('Edit'), array('action' => 'edit', $User['User']['id'])); ?>
                        <?php echo $this->Form->postLink(__('Delete'), array('action' => 'delete', $User['User']['id']), array(), __('Are you sure you want to delete # %s?', $User['User']['id'])); ?>
                    </td>
                </tr>
            <?php endforeach; ?>
            </tbody>
        </table>

    <?php else:?>
        <p>Welcome <?php echo $current_user['username']; ?></p>
    <?php endif;?>
</div>
<div class="actions">
    <h3><?php echo __('Actions'); ?></h3>
    <?php if($admin):?>
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
        <ul>
            <li><?php echo $this->Html->link(__('My Profile'), array('action' => 'view', $current_user['id'])); ?></li>
            <li><?php echo $this->Html->link(__('Edit Profile'), array('action' => 'edit', $current_user['id'])); ?></li>
            <li><?php echo $this->Html->link(__('Request Item'), array('controller' => 'purchases', 'action' => 'add', $current_user['username'])); ?></li>
            <li><?php echo $this->Html->link(__('My Purchases'), array('controller' => 'purchases', 'action' => 'view', $current_user['username'])); ?> </li>
        </ul>
    <?php endif;?>
</div>
