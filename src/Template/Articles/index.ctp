<?php echo $this->element('jumbotron'); ?>
<hr />
<?php echo $this->element('featured', ['featured' => $featured]); ?>
<div class="container-fluid">
	<?php foreach ($articles as $key => $article): ?>
<hr />
	<div class="row post">
		<h2><?php echo $article['title']; ?></h2>
		<p><?php echo $this->Text->truncate($this->Markdown->transform($article['body']), 3000, ['exact' => false]); ?></p>
		<p><a class="btn btn-default" href="<?php echo $this->Url->build(['_name' => 'articlesView', 'slug' => $article['slug']]); ?>" role="button"><?php echo __('Read Full Article');?> &raquo;</a></p>
	</div>
	<?php endforeach; ?>
</div>
<?php if ($user) : ?>
	<p><?= $this->Html->link(__('Add Article'), ['action' => 'add']) ?></p>
<?php endif; ?>
