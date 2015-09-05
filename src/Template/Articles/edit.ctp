<div class="content indent">
	<div class="container">
		<div class="row">
			<h1>Edit Article</h1>
			<?php
				echo $this->Form->create($article);
				echo $this->Form->input('category_id', ['type' => 'select', 'options' =>  $categories, 'label' => __('Category'), 'empty' => __('Select Category')]);
				echo $this->Form->input('title');
				echo $this->Form->input('slug');
				echo $this->Form->input('cell');
				echo $this->Form->input('body', ['rows' => '20']);
				echo $this->Form->checkbox('doCommands', ['onclick' => '$("#commands").toggleClass("hidden show")', 'hiddenField' => false]);
				echo $this->Form->input('commands', ['class' => 'hidden']);
				echo $this->Form->input('article_type_id');
				echo $this->Form->input('article_status_id');
				echo $this->Form->button(__('Save Article'));
				echo $this->Form->end();
			?>
		</div>
	</div>
</div>
