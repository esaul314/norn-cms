<div class="actions columns large-2 medium-3">
    <h3><?= __('Actions') ?></h3>
    <ul class="side-nav">
        <li><?= $this->Html->link(__('Edit Comms'), ['action' => 'edit', $comms->id]) ?> </li>
        <li><?= $this->Form->postLink(__('Delete Comms'), ['action' => 'delete', $comms->id], ['confirm' => __('Are you sure you want to delete # {0}?', $comms->id)]) ?> </li>
        <li><?= $this->Html->link(__('List Comms'), ['action' => 'index']) ?> </li>
        <li><?= $this->Html->link(__('New Comms'), ['action' => 'add']) ?> </li>
        <li><?= $this->Html->link(__('List Comms Statuses'), ['controller' => 'CommsStatuses', 'action' => 'index']) ?> </li>
        <li><?= $this->Html->link(__('New Comms Status'), ['controller' => 'CommsStatuses', 'action' => 'add']) ?> </li>
        <li><?= $this->Html->link(__('List Users'), ['controller' => 'Users', 'action' => 'index']) ?> </li>
        <li><?= $this->Html->link(__('New User'), ['controller' => 'Users', 'action' => 'add']) ?> </li>
    </ul>
</div>
<div class="comms view large-10 medium-9 columns">
    <h2><?= h($comms->id) ?></h2>
    <div class="row">
        <div class="large-5 columns strings">
            <h6 class="subheader"><?= __('Dest') ?></h6>
            <p><?= h($comms->dest) ?></p>
            <h6 class="subheader"><?= __('Subject') ?></h6>
            <p><?= h($comms->subject) ?></p>
            <h6 class="subheader"><?= __('Comms Status') ?></h6>
            <p><?= $comms->has('comms_status') ? $this->Html->link($comms->comms_status->name, ['controller' => 'CommsStatuses', 'action' => 'view', $comms->comms_status->id]) : '' ?></p>
            <h6 class="subheader"><?= __('User') ?></h6>
            <p><?= $comms->has('user') ? $this->Html->link($comms->user->name, ['controller' => 'Users', 'action' => 'view', $comms->user->id]) : '' ?></p>
        </div>
        <div class="large-2 columns numbers end">
            <h6 class="subheader"><?= __('Id') ?></h6>
            <p><?= $this->Number->format($comms->id) ?></p>
        </div>
        <div class="large-2 columns dates end">
            <h6 class="subheader"><?= __('Modified') ?></h6>
            <p><?= h($comms->modified) ?></p>
            <h6 class="subheader"><?= __('Created') ?></h6>
            <p><?= h($comms->created) ?></p>
        </div>
    </div>
    <div class="row texts">
        <div class="columns large-9">
            <h6 class="subheader"><?= __('Body') ?></h6>
            <?= $this->Text->autoParagraph(h($comms->body)) ?>
        </div>
    </div>
</div>
