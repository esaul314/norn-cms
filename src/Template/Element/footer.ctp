<footer>
    <div class="container">
        <div class="row">
            <div class="col-lg-3 col-md-3 col-sm-6 col-xs-6 wow fadeInUp maxheight">
                <p class="title"><?php echo COMPANY; ?></p>
                <p class="prev"><span>&copy;</span> <em id="copyright-year"></em> Copyright</p>
            </div>
            <div class="col-lg-3 col-md-3 col-sm-6 col-xs-6 wow fadeInUp maxheight" data-wow-delay="0.1s">
				<h5><?php echo __('Our Offices'); ?></h5>
                <ul class="list1">
                    <li>
					<p><?php echo $this->element('address');?></p>
                    </li>
                </ul>
            </div>
            <div class="col-lg-3 col-md-3 col-sm-6 col-xs-6 wow fadeInUp maxheight" data-wow-delay="0.2s">
			<h5><?php echo __('Reach Us by Phone'); ?></h5>
                <p class="tel"><?php echo COMPANY_PHONE;?></p>
				<p><?php echo __('Get a prompt response by e-mail'); ?>:</p>
				<a href="mailto:<?php echo COMPANY_EMAIL;?>" class="mail_link"><?php echo COMPANY_EMAIL;?></a>
            </div>
            <div class="col-lg-3 col-md-3 col-sm-6 col-xs-6 wow fadeInUp maxheight" data-wow-delay="0.3s">
			<h5><?php echo __('Keep In Touch'); ?></h5>
                <ul class="follow_icon2">
                    <li><a href="https://www.facebook.com/vikinglaws/timeline" class="fa fa-facebook"></a></li>
                    <li><a href="#" class="fa fa-google-plus"></a></li>
                    <li><a href="#" class="fa fa-linkedin"></a></li>
                </ul>
            </div>
        </div>
    </div>
</footer>
