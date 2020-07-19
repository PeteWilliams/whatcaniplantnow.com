<!doctype html>
<!--[if lt IE 7]> <html class="no-js ie6 oldie" lang="en"> <![endif]-->
<!--[if IE 7]>    <html class="no-js ie7 oldie" lang="en"> <![endif]-->
<!--[if IE 8]>    <html class="no-js ie8 oldie" lang="en"> <![endif]-->
<!--[if gt IE 8]><!--> <html class="no-js" lang="en"> <!--<![endif]-->
<head>
	<meta charset="utf-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1">

	<title>What Can I Plant in {$strMonth}? WhatCanIPlantNow.com - {$strMonth}</title>
	<meta name="description" content="Find out what veg you can plant in {$strMonth}. 'What can I plant now?' is a simple website for gardeners who want to know what veggies they can plant in their vegetable plot or allotment at any given time of the year. We list the most popular variety of each vegetable that is available to sow or plant (indoors or outdoors) during {$strMonth},  and link directly to where you can buy the seeds.">
	<meta name="keywords" content="{$strMonth}, vegetables, plants, plant, sow, grow, sowing, planting, growing, seeds, garden, veggies, veg, gardening, gardener, allotment, veggie patch, vegetable patch, plot, patch, vegetable garden, kitchen garden, uk, britain, great britain, england, scotland, ireland, wales, summer, winter, spring, autumn, january, february, march, april, may, june, july, august, september, november, december, seed calendar, calendar">
	<meta name="author" content="Pete Williams">

    <meta name="viewport" content="width=device-width">
	<link rel="stylesheet" href="/css/style.css">
	<link href='http://fonts.googleapis.com/css?family=Cardo:400,400italic,700' rel='stylesheet' type='text/css'>

	<!--[if lt IE 9]>
		<script src="/js/html5.js"></script>
	<![endif]-->

<meta name="google-site-verification" content="FVCT5XsPooflB7Ru1GXrG7fbNmWc03r3ulKpJV9S304" />
</head>
<body id="{$strMonth|lower}">
<div id="container">
	<div id="content">
		<header>
			<a href="/"><h1>What can I plant now?</h1></a>
			<nav>
				<ol>
					<li><a href="/january"{if $intMonth==1} class="selected"{/if} id="jan">January</a></li>
					<li><a href="/february"{if $intMonth==2} class="selected"{/if} id="feb">February</a></li>
					<li><a href="/march"{if $intMonth==3} class="selected"{/if} id="mar">March</a></li>
					<li><a href="/april"{if $intMonth==4} class="selected"{/if} id="apr">April</a></li>
					<li><a href="/may"{if $intMonth==5} class="selected"{/if} id="may">May</a></li>
					<li><a href="/june"{if $intMonth==6} class="selected"{/if} id="jun">June</a></li>
					<li><a href="/july"{if $intMonth==7} class="selected"{/if} id="jul">July</a></li>
					<li><a href="/august"{if $intMonth==8} class="selected"{/if} id="aug">August</a></li>
					<li><a href="/september"{if $intMonth==9} class="selected"{/if} id="sep">September</a></li>
					<li><a href="/october"{if $intMonth==10} class="selected"{/if} id="oct">October</a></li>
					<li><a href="/november"{if $intMonth==11} class="selected"{/if} id="nov">November</a></li>
					<li><a href="/december"{if $intMonth==12} class="selected"{/if} id="dec">December</a></li>
				</ol>
			</nav>
		</header>
		<div id="main" role="main"{if isset($strPromo)} class="promo"{/if}>
			<p>{$strIntro}</p>
			{if isset($strPromo)}<p id="promo">{$strPromo}</p>{/if}
			
			<h1>What to plant in {$strMonth}</h1>
			<section id="outdoors">
				<h2>What to sow outdoors in {$strMonth}</h2>
				<ol>
				{foreach from=$arrSowOutdoors item=objVeg name=sowOutdoors}
					<li class="{$objVeg->strClass} clearfix">
						<article>

							<hgroup>
								<h3>{$objVeg->strVegetable}</h3>
								<h4>{$objVeg->strName}</h4>
							</hgroup>
							<p>{$objVeg->strDescription}</p>
							<a href="{$objVeg->strUrlBuy}" class="buy" title="Buy seeds from Thompson &amp; Morgan">Buy {$objVeg->strVegetable} Seeds</a>
						</article>
					</li>
				{/foreach}
				</ol>
			</section>
			{if $arrPlantOutdoors}
			<section id="plant-outdoors">
				<h2>What to plant outdoors in {$strMonth}</h2>
				<ol>
				{foreach from=$arrPlantOutdoors item=objVeg}
					<li class="{$objVeg->strClass} clearfix">
						<article>
							<hgroup>
								<h3>{$objVeg->strVegetable}</h3>
								<h4>{$objVeg->strName}</h4>
							</hgroup>
							<p>{$objVeg->strDescription}</p>
							<a href="{$objVeg->strUrlBuy}" class="buy" title="Buy seeds from Thompson &amp; Morgan">Buy {$objVeg->strVegetable} Seeds</a>
						</article>
					</li>
				{/foreach}
				</ol>
			</section>
			{/if}
			{if $arrSowUnderCover}
			<section id="indoors">
				<h2>What to plant indoors in {$strMonth}</h2>
				<ol>
				{foreach from=$arrSowUnderCover item=objVeg}
					<li class="{$objVeg->strClass} clearfix">
						<article>
							<hgroup>
								<h3>{$objVeg->strVegetable}</h3>
								<h4>{$objVeg->strName}</h4>
							</hgroup>
							<p>{$objVeg->strDescription}</p>
							<a href="{$objVeg->strUrlBuy}" class="buy" title="Buy seeds from Thompson &amp; Morgan">Buy {$objVeg->strVegetable} Seeds</a>
						</article>
					</li>
				{/foreach}
				</ol>
			</section>
			{/if}

		</div>
		<footer>
			<p>A bit of fun by <a href="http://petewilliams.info">Pete Williams</a></p>
			<p>Contact: <a href="mailto:info@whatcaniplantnow.com">info@whatcaniplantnow.com</a></p>
		</footer>
	</div>
</div> <!--! end of #container -->

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