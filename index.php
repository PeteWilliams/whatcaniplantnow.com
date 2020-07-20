<?php

require_once( 'inc/config.php' );
require_once( 'inc/vegclass.php' );

if ($_REQUEST['intMonth']) {
	$intMonth = $_REQUEST['intMonth'];
} else {
	$intMonth = date( 'n' );
}

$strMonth =  date( 'F', mktime(1, 1, 1, $intMonth, 1) );

list( $arrSowOutdoors, $arrPlantOutdoors, $arrSowUnderCover ) = VegClass::get_veg( $intMonth );

// For each vegetable, we've found the most popular variety which you can plant right now.
switch ($intMonth) {
	case 1:
//		$strIntro = "January might seem a bit chilly to be sowing your summer veg, but the below varieties are all specially picked for their frost tolerance and low germination temperatures. So stick to our recommendations, get your thermals on and get out there!";
		$strIntro = "Obviously it's still pretty chilly out there, so there's not much you can plant outside for now. So instead, in January we're mostly concentrating  on what are the best early varieties which you can start off indoors and move our once it warms up.";
		break;
	case 2:
		$strIntro = "Finally, winter is coming to a close, but it's still pretty chilly out there so there's only so much you can plant outside. There are however plenty of things you can get started indoors now, so we've listed all the best varieties of vegetables that you can plant today.";
		break;
	case 3:
		$strIntro = "Spring! At last! Hopefully we're now past the worst of the frosts, so there's plenty of veg you can now sow or plant outside. There's also plenty of plants you can get going inside, to either plant out when it warms up, or move to the greenhouse.";
		break;
	case 4:
		$strIntro = "Right, we're properly into sowing season now! With the frosts a thing of the past you're spoilt for choice for veg you can plant either inside or out - luckily for you though, we've picked the very best variety of each veggie to make things easier.";
		break;
	case 5:
		$strIntro = "Spring is drawing to a close, but May is still a busy time of year, with plenty of veg ready to be planted both inside and out. As such, we've worked out what the best variety of each veggie is to plant at this time of year.";
		break;
	case 6:
		$strIntro = "Summer is here! YAY! Things are growing thick and fast in the veggie patch but there's still plenty you can sow: late varieties, autumn/winter veg and plenty of fast-growing summer veg - and we've picked all the best of these for you.";
		break;
	case 7:
		$strIntro = "If you're not too busy harvesting your crops, and you've got some spare room in your plot, there are some great fast-growing varieties that at this time of year will be ready in weeks. Alternatively, you can get a head-start on your autumn and winter veg.";
		break;
	case 8:
		$strIntro = "So, summer's slowly drawing to a close, but we've specially picked some fast-growing varieties so that you can squeeze the very last out of the summer sun. It's also a good time to start thinking about sowing some spring vegetables.";
		break;
	case 9:
		$strIntro = "Well, that was summer. On to spring&hellip; We've chosen some special late-sowing varieties that'll tolerate the current temperatures, and also found the best frost-hardy varieties to slowly grow over winter.";
		break;
	case 10:
		$strIntro = "Autumn isn't usually the busiest time in the vegetable garden, but there's actually still loads of veg you can plant right now - there's a surprising amount of veg you can grow over winter and others which you can happily grow indoors.";
		break;
	case 11:
		$strIntro = "Now we're into winter, the seed sowing certainly slows down, but it doesn't have to stop altogether. Luckily for you, we've done the hard work for you and worked out what you can still plant.";
		break;
	case 12:
		$strIntro = "As the year draws to a close and temperatures continue to plunge, our sowing opportunities certainly reduce, but it turns out there's still a few veg you can grow - both inside and out. ";
		break;
}

$strPromo ='<a href="http://www.awin1.com/cread.php?awinmid=2283&amp;awinaffid=127690&amp;clickref=&amp;p=http%3A%2F%2Fwww.thompson-morgan.com%2Ftaf181"><i>5 packs for<br>the price of 4</i> at <i>Thompson &amp; Morgan</i> with code TAF181</a>';

$objSmarty->assign( 'arrSowOutdoors', $arrSowOutdoors );
$objSmarty->assign( 'arrPlantOutdoors', $arrPlantOutdoors );
$objSmarty->assign( 'arrSowUnderCover', $arrSowUnderCover );
$objSmarty->assign( 'intMonth', $intMonth );
$objSmarty->assign( 'strMonth', $strMonth );
$objSmarty->assign( 'strIntro', $strIntro );
$objSmarty->assign( 'strPromo', $strPromo );
$objSmarty->display( 'main.tpl' );


exit();