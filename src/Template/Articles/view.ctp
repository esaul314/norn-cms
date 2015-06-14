<div class="content indent">
	<div class="thumb-box9">
		<div class="container">
			<h2 class="indent wow fadeIn"><?php echo h($article->title);//echo h($article->Categories->name);?></h2>
			<div class="row">
				<div class="col-xs-12 col-sm-6 col-md-8 wow fadeInUp">
					<div class="thumb-pad5">
						<div class="thumbnail">
							<div class="caption">
								<h3><?php echo h($article->title); ?></h3>
								<p><?php echo $this->Markdown->transform($article->body); ?></p>
								<p><small>Created: <?php echo $article->created->format(DATE_RFC850); ?></small></p>
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
							</div>
						</div>
					</div>
				</div>
				<?php endif; ?>
			</div>
		</div>
	</div>
</div>
