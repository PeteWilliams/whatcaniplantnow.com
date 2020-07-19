<!doctype html>
<!--[if lt IE 7]> <html class="no-js ie6 oldie" lang="en"> <![endif]-->
<!--[if IE 7]>    <html class="no-js ie7 oldie" lang="en"> <![endif]-->
<!--[if IE 8]>    <html class="no-js ie8 oldie" lang="en"> <![endif]-->
<!--[if gt IE 8]><!--> <html class="no-js" lang="en"> <!--<![endif]-->
<head>
	<meta charset="utf-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1">

	<title>What Can I Plant in {$strMonth}? WhatCanIPlantNow.com - {$strMonth}</title>
	<meta name="description" content="">
	<meta name="author" content="">

	<meta name="viewport" content="width=device-width,initial-scale=1">

	<link rel="stylesheet" href="css/style.css">

	<script src="js/libs/modernizr-2.0.6.min.js"></script>
</head>
<body>

<div id="container">
	<header>
		<hgroup>
			<h1>What can I plant now? (logotype)</h1>
			<h2>What can I plant in {$strMonth}?</h2>
		</hgroup>
		<nav>
			<ol>
				<li><a href="/january"{if $intMonth==1} class="selected"{/if}>January</a></li>
				<li><a href="/february"{if $intMonth==2} class="selected"{/if}>February</a></li>
				<li><a href="/march"{if $intMonth==3} class="selected"{/if}>March</a></li>
				<li><a href="/april"{if $intMonth==4} class="selected"{/if}>April</a></li>
				<li><a href="/may"{if $intMonth==5} class="selected"{/if}>May</a></li>
				<li><a href="/june"{if $intMonth==6} class="selected"{/if}>June</a></li>
				<li><a href="/july"{if $intMonth==7} class="selected"{/if}>July</a></li>
				<li><a href="/august"{if $intMonth==8} class="selected"{/if}>August</a></li>
				<li><a href="/september"{if $intMonth==9} class="selected"{/if}>September</a></li>
				<li><a href="/october"{if $intMonth==10} class="selected"{/if}>October</a></li>
				<li><a href="/november"{if $intMonth==11} class="selected"{/if}>November</a></li>
				<li><a href="/december"{if $intMonth==12} class="selected"{/if}>December</a></li>
			</ol>
		</nav>
		<p>September is generally lorem ipsum dolor sit amet, consectetur adipiscing elit. Cras ultrices laoreet dignissim. Duis ultricies adipiscing nisl, in condimentum nisi fermentum quis.</p>
	</header>
	<div id="main" role="main">
		<h2>Sow Outdoors</h2>
		<ol>
		{foreach from=$arrSowOutdoors item=objVeg name=sowOutdoors}
			<li class="{$objVeg->strClass} clearfix">
				<article>

					<hgroup>
						<h3>{$objVeg->strVegetable}</h3>
						<h4>{$objVeg->strName}
					</hgroup>
					<p>{$objVeg->strDescription}</p>
					<p class="links"> <a>Sowing info</a> <a href="{$objVeg->strUrlBuy}" class="buy">Buy Seeds</a></p>
					{if $smarty.foreach.sowOutdoors.index == 0}
					<p class="popup">Mark this as planted so we don't suggest it again next month. <img src="img/close.png" alt="Close" /></p>
					{/if}
					<aside>
						<ul class="when">
							<li><b>Sow outdoors:</b> <img src="chart/sow/mid-aug-mid-oct.png" alt="{$objVeg->strSow}" /></li>
							<li><b>Harvest:</b> <img src="chart/harvest/mid-apr-mid-july.png" alt="{$objVeg->strHarvest}" /></li>
						</ul>
						<ul class="where">
							<li class="sowing"><b>Sowing distance:</b><br /> <span>2cm (1 inch)</span></li>
							<li class="rows"><b>Row spacing:</b><br /> <span>30cm (12 inch)</span></li>
						</ul>
					</aside>
				</article>
			</li>
		{/foreach}
		</ol>
		<h2>Plant Outdoors</h2>
		<ol>
		{foreach from=$arrPlantOutdoors item=objVeg}
			<li class="{$objVeg->strClass} clearfix">
				<article>
					<details>
						<summary>
							<hgroup>
								<h3>{$objVeg->strVegetable}</h3>
								<h4>{$objVeg->strName}
							</hgroup>
							<p>{$objVeg->strDescription}</p>
							<p class="links"> <a>Sowing info</a> <a href="{$objVeg->strUrlBuy}" class="buy">Buy Seeds</a></p>
						</summary>
						<ul class="when">
							<li><b>Sow outdoors:</b> <img src="chart/sow/mid-aug-mid-oct.png" alt="{$objVeg->strSow}" /></li>
							<li><b>Harvest:</b> <img src="chart/harvest/mid-apr-mid-july.png" alt="{$objVeg->strHarvest}" /></li>
						</ul>
						<ul class="where">
							<li class="sowing"><b>Sowing distance:</b><br /> <span>2cm (1 inch)</span></li>
							<li class="rows"><b>Row spacing:</b><br /> <span>30cm (12 inch)</span></li>
						</ul>
					</details>
				</article>
			</li>
		{/foreach}
		</ol>
		<h2>Sow Under Cover</h2>
		<ol>
		{foreach from=$arrSowUnderCover item=objVeg}
			<li class="{$objVeg->strClass} clearfix">
				<article>
					<details>
						<summary>
							<hgroup>
								<h3>{$objVeg->strVegetable}</h3>
								<h4>{$objVeg->strName}
							</hgroup>
							<p>{$objVeg->strDescription}</p>
							<p class="links"> <a>Sowing info</a> <a href="{$objVeg->strUrlBuy}" class="buy">Buy Seeds</a></p>
						</summary>
						<ul class="when">
							<li><b>Sow outdoors:</b> <img src="chart/sow/mid-aug-mid-oct.png" alt="{$objVeg->strSow}" /></li>
							<li><b>Harvest:</b> <img src="chart/harvest/mid-apr-mid-july.png" alt="{$objVeg->strHarvest}" /></li>
						</ul>
						<ul class="where">
							<li class="sowing"><b>Sowing distance:</b><br /> <span>2cm (1 inch)</span></li>
							<li class="rows"><b>Row spacing:</b><br /> <span>30cm (12 inch)</span></li>
						</ul>
					</details>
				</article>
			</li>
		{/foreach}
		</ol>

	</div>
	<footer>
		<p>Site by <a href="http://petewilliams.info">Pete Williams</a> - Contact <a href="mailto:info@whatcaniplantnow.com">info@whatcaniplantnow.com</a>.</p>
	</footer>
</div> <!--! end of #container -->

<script src="//ajax.googleapis.com/ajax/libs/jquery/1.6.2/jquery.min.js"></script>
<script>window.jQuery || document.write('<script src="js/libs/jquery-1.6.2.min.js"><\/script>')</script>

<!-- scripts concatenated and minified via ant build script-->
<script src="js/plugins.js"></script>
<script src="js/script.js"></script>
<!-- end scripts-->

<script>
{literal}
	var _gaq=[['_setAccount','UA-8395598-2'],['_trackPageview']];
	(function(d,t){var g=d.createElement(t),s=d.getElementsByTagName(t)[0];g.async=1;
	g.src=('https:'==location.protocol?'//ssl':'//www')+'.google-analytics.com/ga.js';
	s.parentNode.insertBefore(g,s)}(document,'script'));
{/literal}
</script>

<!--[if lt IE 7 ]>
	<script src="//ajax.googleapis.com/ajax/libs/chrome-frame/1.0.2/CFInstall.min.js"></script>
	<script>{literal}window.attachEvent("onload",function(){CFInstall.check({mode:"overlay"})}){/literal}</script>
<![endif]-->

</body>
</html>