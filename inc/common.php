<?php

// TEST flag - comment out when live
define( 'TEST', 1 );

// who are system generated emails sent from
define( 'SITE_NAME', 'What can I plant now?' );
define( 'ADMIN_EMAIL', 'info@whatcaniplantnow.com' );

// set up SMARTY  - this only works when open_basedir and include_path is set properly in (sub)domain's vhost.conf

// include SMARTY CLASS
require_once('smarty/libs/Smarty.class.php');

// instanciate OBJECT
$objSmarty = new Smarty();

// turn CACHING off if we are testing
$objSmarty->caching = (int)!(bool)TEST;

// set include PATHS
$strDocumentRoot	= getcwd() . '/inc/';
$strSmartyPath		= $strDocumentRoot . 'smarty';

$objSmarty->template_dir	= "$strSmartyPath/templates/";
$objSmarty->compile_dir		= "$strSmartyPath/templates_c/";
$objSmarty->cache_dir		= "$strSmartyPath/cache/";
$objSmarty->config_dir 		= "$strSmartyPath/configs/";

// split path into array to use to select menus and navigation bits
$strPath = substr( $_SERVER['PHP_SELF'], 1, -4 );
$arrHierachy = explode( '/', $strPath );
$objSmarty->assign( 'hierachy', $arrHierachy );
$strIdBody = $arrHierachy[count($arrHierachy)-1];
if ( count( $arrHierachy ) > 1 ) {
	$strIdBody = $arrHierachy[count($arrHierachy)-2] . "_" . $strIdBody;
}

$objSmarty->assign( 'idBody', $strIdBody );
$objSmarty->assign( 'siteName', SITE_NAME );

/**
 * simple display function for debugging
 *
 * @param mix $mixObj
 * @param string $strLabel
 */
function display( $mixObj, $strLabel = null) {

	// show nothing on production server
	if ( 1 == ini_get( 'display_errors' ) ) {

		$backtrace = debug_backtrace();

		echo "
		<div style=\"border: 1px dotted #000; width: 100%;\">
			<strong>$strLabel</strong> - Called from: " .$backtrace[0]['file'] . " (line " . $backtrace[0]['line'] . ")
			<pre style=\"border: 1px dotted #000; margin-top: 0px\">" . print_r($mixObj, true ) . "</pre>
		</div>";

	}

}