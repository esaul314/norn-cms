	<div class="jumbotron">
		<h1><?php
			echo $this->Html->image(COMPANY_LOGO, ['alt' => COMPANY_LOGO_TEXT, 'height' => '100px', 'style' => 'padding-left: 20px']);
			echo __(COMPANY);
		?></h1>
			<p><?php echo __(COMPANY_SLOGAN); ?>
				<div style="float: right;"><?php echo __(COMPANY_SLOGAN_2);?></div>
			</p>
				<?php if (isset($aboutUs) && !empty($aboutUs)) : ?>
					<p>
						<?php echo $this->Html->link(__('Learn More &raquo;'), ['_name' => 'coreLinks', 'slug' => $aboutUs['slug']], ['class' => 'btn btn-primary btn-lg', 'role' => 'button', 'escape' => false]); ?>
						<?php /* <a class="btn btn-primary btn-lg" href="" role="button">Learn more &raquo;</a>*/ ?>
					</p>
				<?php endif; ?>
	</div>

