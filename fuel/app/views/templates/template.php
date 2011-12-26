<!doctype html>
<!-- paulirish.com/2008/conditional-stylesheets-vs-css-hacks-answer-neither/ -->
<!--[if lt IE 7]> <html class="no-js lt-ie9 lt-ie8 lt-ie7" lang="en"> <![endif]-->
<!--[if IE 7]>    <html class="no-js lt-ie9 lt-ie8" lang="en"> <![endif]-->
<!--[if IE 8]>    <html class="no-js lt-ie9" lang="en"> <![endif]-->
<!-- Consider adding a manifest.appcache: h5bp.com/d/Offline -->
<!--[if gt IE 8]><!--> <html class="no-js" lang="en"> <!--<![endif]-->
<head>
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1">

  <title><?php echo isset($title) ? ' - '.$title : null; ?></title></title>
  <meta name="description" content="<?php echo isset($description) ? ' - '.$description : null; ?>">
  <meta name="author" content="Primoz Rome">
  <meta name="viewport" content="width=device-width,initial-scale=1">

  <?php echo Asset::css(array('style.css')); ?>

  <?php echo Asset::js('libs/modernizr-2.0.6.min.js'); ?>
  <link rel="shortcut icon" href="favicon.ico">
  <link rel="apple-touch-icon" href="apple-touch-icon.png">
</head>

<body>
    <header>
		<?php echo $header; ?>
    </header>
    <div class="container" role="main">
		<?php echo $content; ?>
	    <footer>
			<?php echo $footer; ?>
	    </footer>
    </div>

	<script src="//ajax.googleapis.com/ajax/libs/jquery/1.7.1/jquery.min.js"></script>
	<script>window.jQuery || document.write('<script src="js/libs/jquery-1.7.1.min.js"><\/script>')</script>
	<?php echo Asset::js('plugins.js'); ?>
	<?php echo Asset::js('script.js'); ?>
	<script>
	var _gaq=[['_setAccount','UA-XXXXX-X'],['_trackPageview']];
	(function(d,t){var g=d.createElement(t),s=d.getElementsByTagName(t)[0];
	g.src=('https:'==location.protocol?'//ssl':'//www')+'.google-analytics.com/ga.js';
	s.parentNode.insertBefore(g,s)}(document,'script'));
	</script>
	<!-- Prompt IE 6 users to install Chrome Frame. Remove this if you want to support IE 6.
	chromium.org/developers/how-tos/chrome-frame-getting-started -->
	<!--[if lt IE 7 ]>
	<script defer src="//ajax.googleapis.com/ajax/libs/chrome-frame/1.0.3/CFInstall.min.js"></script>
	<script defer>window.attachEvent('onload',function(){CFInstall.check({mode:'overlay'})})</script>
	<![endif]-->
</body>
</html>