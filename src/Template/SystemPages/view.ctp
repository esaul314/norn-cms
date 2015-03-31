<div class="actions columns large-2 medium-3">
    <h3><?= __('Actions') ?></h3>
    <ul class="side-nav">
        <li><?= $this->Html->link(__('Edit System Page'), ['action' => 'edit', $systemPage->id]) ?> </li>
        <li><?= $this->Form->postLink(__('Delete System Page'), ['action' => 'delete', $systemPage->id], ['confirm' => __('Are you sure you want to delete # {0}?', $systemPage->id)]) ?> </li>
        <li><?= $this->Html->link(__('List System Pages'), ['action' => 'index']) ?> </li>
        <li><?= $this->Html->link(__('New System Page'), ['action' => 'add']) ?> </li>
        <li><?= $this->Html->link(__('List Articles'), ['controller' => 'Articles', 'action' => 'index']) ?> </li>
        <li><?= $this->Html->link(__('New Article'), ['controller' => 'Articles', 'action' => 'add']) ?> </li>
    </ul>
</div>
<div class="systemPages view large-10 medium-9 columns">
    <h2><?= h($systemPage->name) ?></h2>
    <div class="row">
        <div class="large-5 columns strings">
            <h6 class="subheader"><?= __('Name') ?></h6>
            <p><?= h($systemPage->name) ?></p>
            <h6 class="subheader"><?= __('Article') ?></h6>
            <p><?= $systemPage->has('article') ? $this->Html->link($systemPage->article->title, ['controller' => 'Articles', 'action' => 'view', $systemPage->article->id]) : '' ?></p>
        </div>
        <div class="large-2 columns numbers end">
            <h6 class="subheader"><?= __('Id') ?></h6>
            <p><?= $this->Number->format($systemPage->id) ?></p>
        </div>
        <div class="large-2 columns dates end">
            <h6 class="subheader"><?= __('Modified') ?></h6>
            <p><?= h($systemPage->modified) ?></p>
            <h6 class="subheader"><?= __('Created') ?></h6>
            <p><?= h($systemPage->created) ?></p>
        </div>
    </div>
</div>
