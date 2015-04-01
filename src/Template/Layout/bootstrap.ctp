<?php
/**
 * CakePHP(tm) : Rapid Development Framework (http://cakephp.org)
 * Copyright (c) Cake Software Foundation, Inc. (http://cakefoundation.org)
 *
 * Licensed under The MIT License
 * For full copyright and license information, please see the LICENSE.txt
 * Redistributions of files must retain the above copyright notice.
 *
 * @copyright     Copyright (c) Cake Software Foundation, Inc. (http://cakefoundation.org)
 * @link          http://cakephp.org CakePHP(tm) Project
 * @since         0.10.0
 * @license       http://www.opensource.org/licenses/mit-license.php MIT License
 */

$cakeDescription = 'CakePHP: the rapid development php framework';
?>
<!doctype html>
<!--[if lt IE 7]>      <html class="no-js lt-ie9 lt-ie8 lt-ie7" lang=""> <![endif]-->
<!--[if IE 7]>         <html class="no-js lt-ie9 lt-ie8" lang=""> <![endif]-->
<!--[if IE 8]>         <html class="no-js lt-ie9" lang=""> <![endif]-->
<!--[if gt IE 8]><!--> <html class="no-js" lang=""> <!--<![endif]-->
	<head>
	<?php echo $this->Html->charset(); ?>
	<?php echo $this->fetch('metaTags'); ?>
		<meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1">
		<title>
			<?php //echo $title_for_layout; ?>
		</title>
		<?php echo $this->Html->meta('icon'); ?>
		<meta name="description" content="">
		<meta name="viewport" content="width=device-width, initial-scale=1.0">
		<link rel="stylesheet" type="text/css" href="//fonts.googleapis.com/css?family=Coustard:400,900">

		<?php echo $this->fetch('meta'); ?>
		<?php echo $this->fetch('css'); ?>
		<?php echo $this->Html->css('bootstrap.min.css'); ?>
		<style>
			body {
/*				padding-top: 50px;
				padding-bottom: 20px;
*/			}
		</style>
		<?php echo $this->Html->css(['bootstrap-theme.min.css', 'main.css', 'bootstrap-drawer']); ?>
		<?= $this->fetch('script') ?>
	</head>
	<body class="has-drawer">
		<!--[if lt IE 8]>
			<p class="browserupgrade">You are using an <strong>outdated</strong> browser. Please <a href="http://browsehappy.com/">upgrade your browser</a> to improve your experience.</p>
		<![endif]-->
	<div id="mainDrawer" class="drawer dw-xs-10 dw-sm-6 dw-md-4 fold" aria-labelledby="mainDrawer">
		<div class="drawer-controls">
			<a href="#mainDrawer" data-toggle="drawer" aria-foldedopen="false" aria-controls="mainDrawer" class="btn btn-default btn-lg height30"><i id="mainDrawerButton" class=""></i></a>
		</div>
		<div class="drawer-contents">
			<div class="drawer-heading">
				<h2 class="drawer-title"><strong>drawer menu title</strong></h2>
			</div>
			<div class="drawer-body">
				drawer body
			</div>
			<div class="drawer-heading">
				<h3 class="drawer-title">Menu Title</h2>
			</div>
			<ul id="doc-nav" class="drawer-fullnav">
				<li role="presentation"><a href="/">Home - Recent and Featured Articles</a></li>
				<li role="presentation"><a href="/categories">Categories</a></li>
				<li role="presentation"><a href="/sobre/nosotros">About Us</a></li>
				<li role="presentation"><a href="/sobre/contactenos">Contact Us</a></li>
			</ul>
			<div class="drawer-heading">
				<h3 class="drawer-title">Other Links</h2>
			</div>
			<ul class="drawer-fullnav">
				<li role="presentation"><a href="/sobre/publicaciones"><i class=""></i>&nbsp; Our Publications</a></li>
				<li role="presentation"><a href="/sobre/prensa"><i class=""></i>&nbsp; Meouchi Initiative In the Press</a></li>
				<li role="presentation"><a href="/sobre/eventos"><i class=""></i>&nbsp; Events</a></li>
				<li><a name="">Story of the Day</a></li>
            </ul>
            <div class="drawer-footer">
                <small>&copy; <?= COMPANY . " " . date('Y') ?></small>
            </div>
        </div>
    </div>
		</div>
	<div class="outer">
	<?php //echo $this->element('navbar'); ?>
	<?php //echo $this->element('jumbotron'); ?>
	<div class="container">
		<?php echo $this->fetch('content'); ?>
      <hr>

      <footer>
	  <p>&copy; <?= COMPANY . " " . date('Y') ?> </p>
      </footer>
	</div> <!-- /container -->
	</div>
		<script src="//ajax.googleapis.com/ajax/libs/jquery/2.1.3/jquery.min.js"></script>
        <script>window.jQuery || document.write('<script src="js/vendor/jquery-2.1.3.min.js"><\/script>')</script>

        <script src="/js/vendor/bootstrap.min.js"></script>
        <script src="/js/vendor/drawer.js"></script>

        <script src="/js/plugins.js"></script>
        <script src="/js/main.js"></script>

        <!-- Google Analytics: change UA-XXXXX-X to be your site's ID. -->
        <script>
            (function(b,o,i,l,e,r){b.GoogleAnalyticsObject=l;b[l]||(b[l]=
            function(){(b[l].q=b[l].q||[]).push(arguments)});b[l].l=+new Date;
            e=o.createElement(i);r=o.getElementsByTagName(i)[0];
            e.src='//www.google-analytics.com/analytics.js';
            r.parentNode.insertBefore(e,r)}(window,document,'script','ga'));
            ga('create','UA-XXXXX-X','auto');ga('send','pageview');
        </script>
    </body>
</html>
