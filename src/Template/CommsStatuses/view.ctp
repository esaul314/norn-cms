<div class="actions columns large-2 medium-3">
    <h3><?= __('Actions') ?></h3>
    <ul class="side-nav">
        <li><?= $this->Html->link(__('Edit Comms Status'), ['action' => 'edit', $commsStatus->id]) ?> </li>
        <li><?= $this->Form->postLink(__('Delete Comms Status'), ['action' => 'delete', $commsStatus->id], ['confirm' => __('Are you sure you want to delete # {0}?', $commsStatus->id)]) ?> </li>
        <li><?= $this->Html->link(__('List Comms Statuses'), ['action' => 'index']) ?> </li>
        <li><?= $this->Html->link(__('New Comms Status'), ['action' => 'add']) ?> </li>
        <li><?= $this->Html->link(__('List Comms'), ['controller' => 'Comms', 'action' => 'index']) ?> </li>
        <li><?= $this->Html->link(__('New Comms'), ['controller' => 'Comms', 'action' => 'add']) ?> </li>
    </ul>
</div>
<div class="commsStatuses view large-10 medium-9 columns">
    <h2><?= h($commsStatus->name) ?></h2>
    <div class="row">
        <div class="large-5 columns strings">
            <h6 class="subheader"><?= __('Name') ?></h6>
            <p><?= h($commsStatus->name) ?></p>
        </div>
        <div class="large-2 columns numbers end">
            <h6 class="subheader"><?= __('Id') ?></h6>
            <p><?= $this->Number->format($commsStatus->id) ?></p>
        </div>
        <div class="large-2 columns dates end">
            <h6 class="subheader"><?= __('Modified') ?></h6>
            <p><?= h($commsStatus->modified) ?></p>
            <h6 class="subheader"><?= __('Created') ?></h6>
            <p><?= h($commsStatus->created) ?></p>
        </div>
    </div>
</div>
<div class="related row">
    <div class="column large-12">
    <h4 class="subheader"><?= __('Related Comms') ?></h4>
    <?php if (!empty($commsStatus->comms)): ?>
    <table cellpadding="0" cellspacing="0">
        <tr>
            <th><?= __('Id') ?></th>
            <th><?= __('Dest') ?></th>
            <th><?= __('Subject') ?></th>
            <th><?= __('Body') ?></th>
            <th><?= __('Comms Status Id') ?></th>
            <th><?= __('Modified') ?></th>
            <th><?= __('Created') ?></th>
            <th class="actions"><?= __('Actions') ?></th>
        </tr>
        <?php foreach ($commsStatus->comms as $comms): ?>
        <tr>
            <td><?= h($comms->id) ?></td>
            <td><?= h($comms->dest) ?></td>
            <td><?= h($comms->subject) ?></td>
            <td><?= h($comms->body) ?></td>
            <td><?= h($comms->comms_status_id) ?></td>
            <td><?= h($comms->modified) ?></td>
            <td><?= h($comms->created) ?></td>

            <td class="actions">
                <?= $this->Html->link(__('View'), ['controller' => 'Comms', 'action' => 'view', $comms->id]) ?>

                <?= $this->Html->link(__('Edit'), ['controller' => 'Comms', 'action' => 'edit', $comms->id]) ?>

                <?= $this->Form->postLink(__('Delete'), ['controller' => 'Comms', 'action' => 'delete', $comms->id], ['confirm' => __('Are you sure you want to delete # {0}?', $comms->id)]) ?>

            </td>
        </tr>

        <?php endforeach; ?>
    </table>
    <?php endif; ?>
    </div>
</div>
