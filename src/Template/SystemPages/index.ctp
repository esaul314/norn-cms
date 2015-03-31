<div class="actions columns large-2 medium-3">
    <h3><?= __('Actions') ?></h3>
    <ul class="side-nav">
        <li><?= $this->Html->link(__('New System Page'), ['action' => 'add']) ?></li>
        <li><?= $this->Html->link(__('List Articles'), ['controller' => 'Articles', 'action' => 'index']) ?> </li>
        <li><?= $this->Html->link(__('New Article'), ['controller' => 'Articles', 'action' => 'add']) ?> </li>
    </ul>
</div>
<div class="systemPages index large-10 medium-9 columns">
    <table cellpadding="0" cellspacing="0">
    <thead>
        <tr>
            <th><?= $this->Paginator->sort('id') ?></th>
            <th><?= $this->Paginator->sort('name') ?></th>
            <th><?= $this->Paginator->sort('article_id') ?></th>
            <th><?= $this->Paginator->sort('modified') ?></th>
            <th><?= $this->Paginator->sort('created') ?></th>
            <th class="actions"><?= __('Actions') ?></th>
        </tr>
    </thead>
    <tbody>
    <?php foreach ($systemPages as $systemPage): ?>
        <tr>
            <td><?= $this->Number->format($systemPage->id) ?></td>
            <td><?= h($systemPage->name) ?></td>
            <td>
                <?= $systemPage->has('article') ? $this->Html->link($systemPage->article->title, ['controller' => 'Articles', 'action' => 'view', $systemPage->article->id]) : '' ?>
            </td>
            <td><?= h($systemPage->modified) ?></td>
            <td><?= h($systemPage->created) ?></td>
            <td class="actions">
                <?= $this->Html->link(__('View'), ['action' => 'view', $systemPage->id]) ?>
                <?= $this->Html->link(__('Edit'), ['action' => 'edit', $systemPage->id]) ?>
                <?= $this->Form->postLink(__('Delete'), ['action' => 'delete', $systemPage->id], ['confirm' => __('Are you sure you want to delete # {0}?', $systemPage->id)]) ?>
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
