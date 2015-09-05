<?php
if (isset($success)) {
	$alert = $success ? __('Your email has been sent.') : __('The email could not be sent');
	echo $this->Html->alert($alert, $success? 'success' : '');
	echo $this->Html->scriptBlock('$("#contactFieldset").attr("disabled", true);', ['block' => true, 'defer' => true]);
}
?>
<div class="content indent">
	<div class="thumb-box10">
		<div class="container">
			<div class="row">
				<div class="col-lg-4 col-md-4 col-sm-4">
					<h2><?php echo __('Get in touch'); ?></h2>
					<address>
						<h3><?php echo __('Mailing Address'); ?></h3>
						<strong><?= COMPANY ?></strong>
						<p>
							Penthouse Torre Mayor<br />
							Floors 52 and 53<br />
							Ave Paseo de la Reforma No. 505<br />
							Delegación Cuauhtémoc<br />
							Ciudad de México D.F.<br />
							México, 06500<br />
						</p>
						<p>
							Telephones:
							<br />+ 52 (55) 5208 3100
							<br />+ 52 (33) 3813 2038
							<br />+ 52 (33) 1813 2184
						</p>
					</address>
				</div>
				<div class="col-lg-8 col-md-8 col-sm-8">
					<h2><?php echo __('Contact Form'); ?></h2>
					<?= $this->Form->create($comms, ['horizontal' => true, 'id' => 'contactForm']) ?>
					<fieldset id="contactFieldset">
						<?php
							echo $this->Form->input('user.name');
							echo $this->Form->input('user.email');
							echo $this->Form->input('user.phone');
							echo $this->Form->input('subject');
							echo $this->Form->input('body', ['type' => 'textarea']);
							echo $this->Form->input('Send', ['type' => 'submit', 'class' => 'btn1']);
						?>
					</fieldset>
					<?= $this->Form->end() ?>
				</div>
			</div>
		</div>
	</div>
</div>
<?php echo $this->fetch('script'); ?>
