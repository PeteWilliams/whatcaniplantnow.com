<?php /* Smarty version 2.6.22, created on 2014-11-10 16:26:10
         compiled from main.tpl */ ?>
<?php require_once(SMARTY_CORE_DIR . 'core.load_plugins.php');
smarty_core_load_plugins(array('plugins' => array(array('modifier', 'lower', 'main.tpl', 25, false),)), $this); ?>
<!doctype html>
<!--[if lt IE 7]> <html class="no-js ie6 oldie" lang="en"> <![endif]-->
<!--[if IE 7]>    <html class="no-js ie7 oldie" lang="en"> <![endif]-->
<!--[if IE 8]>    <html class="no-js ie8 oldie" lang="en"> <![endif]-->
<!--[if gt IE 8]><!--> <html class="no-js" lang="en"> <!--<![endif]-->
<head>
	<meta charset="utf-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1">

	<title>What Can I Plant in <?php echo $this->_tpl_vars['strMonth']; ?>
? WhatCanIPlantNow.com - <?php echo $this->_tpl_vars['strMonth']; ?>
</title>
	<meta name="description" content="Find out what veg you can plant in <?php echo $this->_tpl_vars['strMonth']; ?>
. 'What can I plant now?' is a simple website for gardeners who want to know what veggies they can plant in their vegetable plot or allotment at any given time of the year. We list the most popular variety of each vegetable that is available to sow or plant (indoors or outdoors) during <?php echo $this->_tpl_vars['strMonth']; ?>
,  and link directly to where you can buy the seeds.">
	<meta name="keywords" content="<?php echo $this->_tpl_vars['strMonth']; ?>
, vegetables, plants, plant, sow, grow, sowing, planting, growing, seeds, garden, veggies, veg, gardening, gardener, allotment, veggie patch, vegetable patch, plot, patch, vegetable garden, kitchen garden, uk, britain, great britain, england, scotland, ireland, wales, summer, winter, spring, autumn, january, february, march, april, may, june, july, august, september, november, december, seed calendar, calendar">
	<meta name="author" content="Pete Williams">

    <meta name="viewport" content="width=device-width">
	<link rel="stylesheet" href="/css/style.css">
	<link href='http://fonts.googleapis.com/css?family=Cardo:400,400italic,700' rel='stylesheet' type='text/css'>

	<!--[if lt IE 9]>
		<script src="/js/html5.js"></script>
	<![endif]-->

<meta name="google-site-verification" content="FVCT5XsPooflB7Ru1GXrG7fbNmWc03r3ulKpJV9S304" />
</head>
<body id="<?php echo ((is_array($_tmp=$this->_tpl_vars['strMonth'])) ? $this->_run_mod_handler('lower', true, $_tmp) : smarty_modifier_lower($_tmp)); ?>
">
<div id="container">
	<div id="content">
		<header>
			<a href="/"><h1>What can I plant now?</h1></a>
			<nav>
				<ol>
					<li><a href="/january"<?php if ($this->_tpl_vars['intMonth'] == 1): ?> class="selected"<?php endif; ?> id="jan">January</a></li>
					<li><a href="/february"<?php if ($this->_tpl_vars['intMonth'] == 2): ?> class="selected"<?php endif; ?> id="feb">February</a></li>
					<li><a href="/march"<?php if ($this->_tpl_vars['intMonth'] == 3): ?> class="selected"<?php endif; ?> id="mar">March</a></li>
					<li><a href="/april"<?php if ($this->_tpl_vars['intMonth'] == 4): ?> class="selected"<?php endif; ?> id="apr">April</a></li>
					<li><a href="/may"<?php if ($this->_tpl_vars['intMonth'] == 5): ?> class="selected"<?php endif; ?> id="may">May</a></li>
					<li><a href="/june"<?php if ($this->_tpl_vars['intMonth'] == 6): ?> class="selected"<?php endif; ?> id="jun">June</a></li>
					<li><a href="/july"<?php if ($this->_tpl_vars['intMonth'] == 7): ?> class="selected"<?php endif; ?> id="jul">July</a></li>
					<li><a href="/august"<?php if ($this->_tpl_vars['intMonth'] == 8): ?> class="selected"<?php endif; ?> id="aug">August</a></li>
					<li><a href="/september"<?php if ($this->_tpl_vars['intMonth'] == 9): ?> class="selected"<?php endif; ?> id="sep">September</a></li>
					<li><a href="/october"<?php if ($this->_tpl_vars['intMonth'] == 10): ?> class="selected"<?php endif; ?> id="oct">October</a></li>
					<li><a href="/november"<?php if ($this->_tpl_vars['intMonth'] == 11): ?> class="selected"<?php endif; ?> id="nov">November</a></li>
					<li><a href="/december"<?php if ($this->_tpl_vars['intMonth'] == 12): ?> class="selected"<?php endif; ?> id="dec">December</a></li>
				</ol>
			</nav>
		</header>
		<div id="main" role="main"<?php if (isset ( $this->_tpl_vars['strPromo'] )): ?> class="promo"<?php endif; ?>>
			<p><?php echo $this->_tpl_vars['strIntro']; ?>
</p>
			<?php if (isset ( $this->_tpl_vars['strPromo'] )): ?><p id="promo"><?php echo $this->_tpl_vars['strPromo']; ?>
</p><?php endif; ?>
			
			<h1>What to plant in <?php echo $this->_tpl_vars['strMonth']; ?>
</h1>
			<section id="outdoors">
				<h2>What to sow outdoors in <?php echo $this->_tpl_vars['strMonth']; ?>
</h2>
				<ol>
				<?php $_from = $this->_tpl_vars['arrSowOutdoors']; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array'); }$this->_foreach['sowOutdoors'] = array('total' => count($_from), 'iteration' => 0);
if ($this->_foreach['sowOutdoors']['total'] > 0):
    foreach ($_from as $this->_tpl_vars['objVeg']):
        $this->_foreach['sowOutdoors']['iteration']++;
?>
					<li class="<?php echo $this->_tpl_vars['objVeg']->strClass; ?>
 clearfix">
						<article>

							<hgroup>
								<h3><?php echo $this->_tpl_vars['objVeg']->strVegetable; ?>
</h3>
								<h4><?php echo $this->_tpl_vars['objVeg']->strName; ?>
</h4>
							</hgroup>
							<p><?php echo $this->_tpl_vars['objVeg']->strDescription; ?>
</p>
							<a href="<?php echo $this->_tpl_vars['objVeg']->strUrlBuy; ?>
" class="buy" title="Buy seeds from Thompson &amp; Morgan">Buy <?php echo $this->_tpl_vars['objVeg']->strVegetable; ?>
 Seeds</a>
						</article>
					</li>
				<?php endforeach; endif; unset($_from); ?>
				</ol>
			</section>
			<?php if ($this->_tpl_vars['arrPlantOutdoors']): ?>
			<section id="plant-outdoors">
				<h2>What to plant outdoors in <?php echo $this->_tpl_vars['strMonth']; ?>
</h2>
				<ol>
				<?php $_from = $this->_tpl_vars['arrPlantOutdoors']; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array'); }if (count($_from)):
    foreach ($_from as $this->_tpl_vars['objVeg']):
?>
					<li class="<?php echo $this->_tpl_vars['objVeg']->strClass; ?>
 clearfix">
						<article>
							<hgroup>
								<h3><?php echo $this->_tpl_vars['objVeg']->strVegetable; ?>
</h3>
								<h4><?php echo $this->_tpl_vars['objVeg']->strName; ?>
</h4>
							</hgroup>
							<p><?php echo $this->_tpl_vars['objVeg']->strDescription; ?>
</p>
							<a href="<?php echo $this->_tpl_vars['objVeg']->strUrlBuy; ?>
" class="buy" title="Buy seeds from Thompson &amp; Morgan">Buy <?php echo $this->_tpl_vars['objVeg']->strVegetable; ?>
 Seeds</a>
						</article>
					</li>
				<?php endforeach; endif; unset($_from); ?>
				</ol>
			</section>
			<?php endif; ?>
			<?php if ($this->_tpl_vars['arrSowUnderCover']): ?>
			<section id="indoors">
				<h2>What to plant indoors in <?php echo $this->_tpl_vars['strMonth']; ?>
</h2>
				<ol>
				<?php $_from = $this->_tpl_vars['arrSowUnderCover']; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array'); }if (count($_from)):
    foreach ($_from as $this->_tpl_vars['objVeg']):
?>
					<li class="<?php echo $this->_tpl_vars['objVeg']->strClass; ?>
 clearfix">
						<article>
							<hgroup>
								<h3><?php echo $this->_tpl_vars['objVeg']->strVegetable; ?>
</h3>
								<h4><?php echo $this->_tpl_vars['objVeg']->strName; ?>
</h4>
							</hgroup>
							<p><?php echo $this->_tpl_vars['objVeg']->strDescription; ?>
</p>
							<a href="<?php echo $this->_tpl_vars['objVeg']->strUrlBuy; ?>
" class="buy" title="Buy seeds from Thompson &amp; Morgan">Buy <?php echo $this->_tpl_vars['objVeg']->strVegetable; ?>
 Seeds</a>
						</article>
					</li>
				<?php endforeach; endif; unset($_from); ?>
				</ol>
			</section>
			<?php endif; ?>

		</div>
		<footer>
			<p>A bit of fun by <a href="http://petewilliams.info">Pete Williams</a></p>
			<p>Contact: <a href="mailto:info@whatcaniplantnow.com">info@whatcaniplantnow.com</a></p>
		</footer>
	</div>
</div> <!--! end of #container -->

<script>
<?php echo '
	var _gaq=[[\'_setAccount\',\'UA-8395598-2\'],[\'_trackPageview\']];
	(function(d,t){var g=d.createElement(t),s=d.getElementsByTagName(t)[0];g.async=1;
	g.src=(\'https:\'==location.protocol?\'//ssl\':\'//www\')+\'.google-analytics.com/ga.js\';
	s.parentNode.insertBefore(g,s)}(document,\'script\'));
'; ?>

</script>

<!--[if lt IE 7 ]>
	<script src="//ajax.googleapis.com/ajax/libs/chrome-frame/1.0.2/CFInstall.min.js"></script>
	<script><?php echo 'window.attachEvent("onload",function(){CFInstall.check({mode:"overlay"})})'; ?>
</script>
<![endif]-->

</body>
</html>