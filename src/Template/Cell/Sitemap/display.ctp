<?php foreach ($articles as $cat => $cats) : ?>
<div class="row">
	<dl>
		<dt><?php echo h($cat) ?></dt>
		<?php foreach ($cats as $article) : ?>
			<dd><?php echo $this->Html->link(h($article['title']), ['_name' => 'coreLinks', 'slug' => $article['slug']]); ?></dd>
		<?php endforeach; ?>
	</dl>
</div>
<?php endforeach; ?>
