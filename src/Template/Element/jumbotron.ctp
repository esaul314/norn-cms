	<div class="jumbotron">
		<h1><?php
			echo $this->Html->image('church_logo.png', ['alt' => 'Meouchi Initiative promotes virtues', 'height' => '100px', 'style' => 'padding-left: 20px']);
			echo __('Iniciativa Meouchi');
		?></h1>
			<p><?php echo __("Well done, you good and faithful servant: you have been faithful over a few things, I will make you ruler over many things: enter you into the joy of your lord."); ?>
				<div style="float: right;"><?php echo __("Matthew 25:21");?></div>
			</p>
				<?php if (isset($aboutUs) && !empty($aboutUs)) : ?>
					<p>
						<?php echo $this->Html->link(__('Learn More &raquo;'), ['_name' => 'coreLinks', 'slug' => $aboutUs['slug']], ['class' => 'btn btn-primary btn-lg', 'role' => 'button', 'escape' => false]); ?>
						<?php /* <a class="btn btn-primary btn-lg" href="" role="button">Learn more &raquo;</a>*/ ?>
					</p>
				<?php endif; ?>
	</div>

