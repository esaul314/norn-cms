<?php
if (!empty($article->commands)) {
	echo $this->Html->scriptBlock($article->commands, ['block' => 'scriptBottom']);
}
?>
<div class="content indent" id="mainContent">
	<div class="container" id="mainContainer">
		<h2 id="articleTitle" class="indent wow fadeIn"><?php echo h($article->title);?></h2>
		<div class="row">
			<div class="col-xs-12 col-sm-6 col-md-8 <?php echo $related ? '' : 'col-md-offset-2'; ?> wow fadeInUp">
				<?php if ($article->cell) : ?>
					<?php echo $this->cell($article->cell); ?>
				<?php endif; ?>
				<div class="thumb-pad5">
					<div class="thumbnail">
						<div class="caption">
							<p><?php echo $this->Markdown->transform($article->body); ?></p>
							<?php if (ARTICLE_TIMESTAMP) : ?>
								<p><small><?php echo __('Created'); ?>: <?php echo $article->created->format(DATE_RFC850); ?></small></p>
							<?php endif; ?>
						</div>
					</div>
				</div>
			</div>
			<?php if (!empty($related)) : ?>
			<div class="col-xs-6 col-md-4 wow fadeInUp" data-wow-delay="0.1s">
				<div class="thumb-pad5">
					<div class="thumbnail">
						<div class="caption">
							<h3><?php echo h($related->title); ?></h3>
							<p><?php echo $this->Text->truncate($this->Markdown->transform($related->body), 530, ['exact' => false]); ?></p>
							<?php echo $this->Html->link(__('Read Full Article'), ['_name' => 'articlesView', 'slug' => $related['slug']], ['class' => 'btn-default btn-xs']);?>
						</div>
					</div>
				</div>
			</div>
			<?php endif; ?>
		</div>
	</div>
</div>
