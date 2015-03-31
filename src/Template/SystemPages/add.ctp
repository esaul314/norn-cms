<div class="actions columns large-2 medium-3">
    <h3><?= __('Actions') ?></h3>
    <ul class="side-nav">
        <li><?= $this->Html->link(__('List System Pages'), ['action' => 'index']) ?></li>
        <li><?= $this->Html->link(__('List Articles'), ['controller' => 'Articles', 'action' => 'index']) ?> </li>
        <li><?= $this->Html->link(__('New Article'), ['controller' => 'Articles', 'action' => 'add']) ?> </li>
    </ul>
</div>
<div class="systemPages form large-10 medium-9 columns">
    <?= $this->Form->create($systemPage); ?>
    <fieldset>
        <legend><?= __('Add System Page') ?></legend>
        <?php
            echo $this->Form->input('name');
            echo $this->Form->input('article_id', ['options' => $articles]);
        ?>
    </fieldset>
    <?= $this->Form->button(__('Submit')) ?>
    <?= $this->Form->end() ?>
</div>
