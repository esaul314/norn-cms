<div class="actions columns large-2 medium-3">
    <h3><?= __('Actions') ?></h3>
    <ul class="side-nav">
        <li><?= $this->Html->link(__('New Comms'), ['action' => 'add']) ?></li>
        <li><?= $this->Html->link(__('List Comms Statuses'), ['controller' => 'CommsStatuses', 'action' => 'index']) ?></li>
        <li><?= $this->Html->link(__('New Comms Status'), ['controller' => 'CommsStatuses', 'action' => 'add']) ?></li>
        <li><?= $this->Html->link(__('List Users'), ['controller' => 'Users', 'action' => 'index']) ?></li>
        <li><?= $this->Html->link(__('New User'), ['controller' => 'Users', 'action' => 'add']) ?></li>
    </ul>
</div>
<div class="comms index large-10 medium-9 columns">
    <table cellpadding="0" cellspacing="0">
    <thead>
        <tr>
            <th><?= $this->Paginator->sort('id') ?></th>
            <th><?= $this->Paginator->sort('dest') ?></th>
            <th><?= $this->Paginator->sort('subject') ?></th>
            <th><?= $this->Paginator->sort('comms_status_id') ?></th>
            <th><?= $this->Paginator->sort('user_id') ?></th>
            <th><?= $this->Paginator->sort('modified') ?></th>
            <th><?= $this->Paginator->sort('created') ?></th>
            <th class="actions"><?= __('Actions') ?></th>
        </tr>
    </thead>
    <tbody>
    <?php foreach ($comms as $comms): ?>
        <tr>
            <td><?= $this->Number->format($comms->id) ?></td>
            <td><?= h($comms->dest) ?></td>
            <td><?= h($comms->subject) ?></td>
            <td>
                <?= $comms->has('comms_status') ? $this->Html->link($comms->comms_status->name, ['controller' => 'CommsStatuses', 'action' => 'view', $comms->comms_status->id]) : '' ?>
            </td>
            <td>
                <?= $comms->has('user') ? $this->Html->link($comms->user->name, ['controller' => 'Users', 'action' => 'view', $comms->user->id]) : '' ?>
            </td>
            <td><?= h($comms->modified) ?></td>
            <td><?= h($comms->created) ?></td>
            <td class="actions">
                <?= $this->Html->link(__('View'), ['action' => 'view', $comms->id]) ?>
                <?= $this->Html->link(__('Edit'), ['action' => 'edit', $comms->id]) ?>
                <?= $this->Form->postLink(__('Delete'), ['action' => 'delete', $comms->id], ['confirm' => __('Are you sure you want to delete # {0}?', $comms->id)]) ?>
            </td>
        </tr>

    <?php endforeach; ?>
    </tbody>
    </table>
    <div class="paginator">
        <ul class="pagination">
            <?= $this->Paginator->prev('< ' . __('previous')) ?>
            <?= $this->Paginator->numbers() ?>
            <?= $this->Paginator->next(__('next') . ' >') ?>
        </ul>
        <p><?= $this->Paginator->counter() ?></p>
    </div>
</div>
