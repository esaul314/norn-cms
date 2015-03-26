<h1>Edit Article</h1>
<?php
    echo $this->Form->create($article);
    echo $this->Form->input('categories');
    echo $this->Form->input('title');
    echo $this->Form->input('body', ['rows' => '3']);
    echo $this->Form->input('article_type_id');
    echo $this->Form->input('article_status_id');
    echo $this->Form->button(__('Save Article'));
    echo $this->Form->end();
?>
