<?php
namespace App\View\Cell;

use Cake\View\Cell;

/**
 * Sitemap cell
 */
class SitemapCell extends Cell
{

	/**
	 * List of valid options that can be passed into this
	 * cell's constructor.
	 *
	 * @var array
	 */
	protected $_validCellOptions = [];

	/**
	 * Default display method.
	  *
	 * @return void
	 */
	public function display() {
		$this->loadModel('Articles');
		$articles = $this->Articles->find('all')
			->select(['Articles.id', 'Articles.title', 'Articles.slug', 'Categories.name', 'Articles.article_type_id', 'Articles.modified'])
			->contain(['Categories'])
			->order(['Categories.id']);
		$sitemap = [];
		foreach ($articles as $k => $article) {
			$sitemap[($article->category['name']) ? $article->category['name'] : __('No Category')][] = [
				'title' => $article->title,
				'slug' => $article->slug,
				'type_id' => $article->article_type_id,
				'modified' => $article->modified
			];
		}

		$this->set('articles', $sitemap);
	}
}
