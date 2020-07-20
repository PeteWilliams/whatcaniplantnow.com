Checking links…

<pre>

<?php

	require_once( 'inc/config.php' );

		$strSql = "SELECT idVeg, strUrlBuy
					FROM veg
					WHERE blnInactive IS NULL
					ORDER BY veg.idVeg ASC";

		$sql = mysql_query( $strSql );

		while($row = mysql_fetch_array($sql)){
//echo "$strLink";
			$strLink = $row['strUrlBuy'];
			$idVeg = $row['idVeg'];

			$strContents = file_get_contents($strLink, 1);

			if ( strpos( $strContents, 'Product not found' ) ) {
				echo "\n\n<span style=\"color:red\">$idVeg NOT found: <a href=\"$strLink\" target=\"_blank\">$strLink</a></span>\n";
				
			} else {
				echo "\n\n$idVeg found: <a href=\"$strLink\" target=\"_blank\">$strLink</a>\n";
			}

		}