	<div class="row">
<?php foreach ($featured as $key => $article): ?>
	<?php if (isset($done) && $done >= 2) { break; }?>
	<?php isset($done) ? $done++ : $done = 0; ?>
	<?php isset($keys) ? $keys[] = $key : $keys = [$key]; ?>
<?php
//TODO: use constants
?>
		<div class="col-md-4">
			<h2 class="centertext"><?php echo $article['title']; ?></h2>
			<p><?php echo $this->Text->truncate($this->Markdown->transform($article['body']), 330, ['exact' => false]); ?></p>
		</div>
		<?php endforeach; ?>
<?php foreach ($keys as $key): ?>
		<div class="col-md-4">
			<p><a class="btn btn-default" href="<?php echo $this->Url->build(['controller' => 'Articles', 'action' => 'view', $featured[$key]['id']]); ?>" role="button"><?php echo __('Read Full Article');?> &raquo;</a></p>
		</div>
<?php endforeach; ?>
	</div>
