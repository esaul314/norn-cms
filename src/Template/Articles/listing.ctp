<div class="content indent">
	<div class="container">
		<div class="row">
<h1>Article Admin Panel</h1>
    <table class="table table-striped table-hover">
    <thead>
        <tr>
            <th><?= $this->Paginator->sort('id') ?></th>
            <th><?= $this->Paginator->sort('title') ?></th>
            <th><?= $this->Paginator->sort('Categories.name') ?></th>
            <th><?= $this->Paginator->sort('modified') ?></th>
            <th class="actions"><?= __('Actions') ?></th>
        </tr>
    </thead>
    <tbody>
    <?php foreach ($articles as $article): ?>
        <tr>
            <td><?= $this->Number->format($article->id) ?></td>
			<td><?= $this->Html->link(__($article->title), ['_name' => (($article->article_type_id == ARTICLE_TYPE_SYSTEM) ? 'coreLinks' : 'articlesView'), 'slug' => $article['slug']]);?></td>
            <td><?= h($article->category['name']) ?></td>
            <td><?= h($article->modified) ?></td>
            <td class="actions">
                <?= $this->Html->link(__('Edit'), ['action' => 'edit', $article->id]) ?>
                <?= $this->Form->postLink(__('Delete'), ['action' => 'delete', $article->id], ['confirm' => __('Are you sure you want to delete # {0}?', $article->id)]) ?>
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
	</div>
</div>
