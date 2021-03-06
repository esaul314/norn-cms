<div class="actions columns large-2 medium-3">
    <h3><?= __('Actions') ?></h3>
    <ul class="side-nav">
        <li><?= $this->Form->postLink(
                __('Delete'),
                ['action' => 'delete', $comms->id],
                ['confirm' => __('Are you sure you want to delete # {0}?', $comms->id)]
            )
        ?></li>
        <li><?= $this->Html->link(__('List Comms'), ['action' => 'index']) ?></li>
        <li><?= $this->Html->link(__('List Comms Statuses'), ['controller' => 'CommsStatuses', 'action' => 'index']) ?></li>
        <li><?= $this->Html->link(__('New Comms Status'), ['controller' => 'CommsStatuses', 'action' => 'add']) ?></li>
        <li><?= $this->Html->link(__('List Users'), ['controller' => 'Users', 'action' => 'index']) ?></li>
        <li><?= $this->Html->link(__('New User'), ['controller' => 'Users', 'action' => 'add']) ?></li>
    </ul>
</div>
<div class="comms form large-10 medium-9 columns">
    <?= $this->Form->create($comms) ?>
    <fieldset>
        <legend><?= __('Edit Comms') ?></legend>
        <?php
            echo $this->Form->input('dest');
            echo $this->Form->input('subject');
            echo $this->Form->input('body');
            echo $this->Form->input('comms_status_id', ['options' => $commsStatuses]);
            echo $this->Form->input('user_id', ['options' => $users]);
        ?>
    </fieldset>
    <?= $this->Form->button(__('Submit')) ?>
    <?= $this->Form->end() ?>
</div>
