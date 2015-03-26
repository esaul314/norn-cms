<h1><?php echo h($article->title); ?></h1>
<p><?php echo $this->Markdown->transform($article->body); ?></p>
<p><small>Created: <?php echo $article->created->format(DATE_RFC850); ?></small></p>

