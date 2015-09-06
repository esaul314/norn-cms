<div class="content indent">
	<div class="container">
		<div class="row">
			<h1>Add Article</h1>
			<?php
				echo $this->Form->create($article);
				echo $this->Form->input('categories');
				echo $this->Form->input('title');
				echo $this->Form->input('slug');
				echo $this->Form->input('body', ['rows' => '20']);
				echo $this->Form->input('article_type_id');
				echo $this->Form->input('article_status_id');
				echo $this->Form->input('article.article_statuses.id');
				echo $this->Form->button(__('Save Article'));
				echo $this->Form->end();
			?>
		</div>
	</div>
</div>
