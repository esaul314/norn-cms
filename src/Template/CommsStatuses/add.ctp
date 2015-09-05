<div class="actions columns large-2 medium-3">
    <h3><?= __('Actions') ?></h3>
    <ul class="side-nav">
        <li><?= $this->Html->link(__('List Comms Statuses'), ['action' => 'index']) ?></li>
        <li><?= $this->Html->link(__('List Comms'), ['controller' => 'Comms', 'action' => 'index']) ?></li>
        <li><?= $this->Html->link(__('New Comms'), ['controller' => 'Comms', 'action' => 'add']) ?></li>
    </ul>
</div>
<div class="commsStatuses form large-10 medium-9 columns">
    <?= $this->Form->create($commsStatus) ?>
    <fieldset>
        <legend><?= __('Add Comms Status') ?></legend>
        <?php
            echo $this->Form->input('name');
        ?>
    </fieldset>
    <?= $this->Form->button(__('Submit')) ?>
    <?= $this->Form->end() ?>
</div>
