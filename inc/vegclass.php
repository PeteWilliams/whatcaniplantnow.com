<?php

require_once( 'dataclass.php' );

class VegClass extends DataClass {

	CONST WHERE_SOW_OUTDOORS 	= 1;
	CONST WHERE_PLANT_OUTDOORS	= 2;
	CONST WHERE_SOW_UNDER_COVER = 3;

	function __construct( $idVeg, $idPlant ) {

		$strSql = "SELECT p.*, v.*
					FROM plant AS p
					Inner Join veg AS v ON v.idVeg = p.idVeg
					WHERE p.idVeg =  $idVeg AND p.idPlant =  $idPlant";

		$sql = mysql_query( $strSql );

		while($row = mysql_fetch_array($sql)){

			$this->strName 		= stripslashes( $row[ 'strName' ] );
			$this->strVegetable = stripslashes( $row[ 'strVegetable' ] );
			$this->strUrlBuy 	= "http://www.awin1.com/cread.php?awinmid=2283&awinaffid=127690&clickref=&p=" . urlencode( stripslashes( $row[ 'strUrlBuy' ] ) );
			$this->intDistance	= stripslashes( $row[ 'intDistance' ] );
			$this->intSpacing	= stripslashes( $row[ 'intSpacing' ] );
			$this->blnInactive	= stripslashes( $row[ 'blnInactive' ] );

			if ( stripslashes( $row[ 'intWhere' ] ) ) {
				$this->intWhere = stripslashes( $row[ 'intWhere' ] );
			} else {
				$this->intWhere = stripslashes( $row[ 'intDefaultWhere' ] );
			}

			if ( stripslashes( $row[ 'strDescription' ] ) ) {
				$this->strDescription = stripslashes( $row[ 'strDescription' ] );
			} else {
				$this->strDescription = stripslashes( $row[ 'strDefaultDescription' ] );
			}

			if ( stripslashes( $row[ 'strClass' ] ) ) {
				$this->strClass = stripslashes( $row[ 'strClass' ] );
			} else {
				$this->strClass = str_replace( ' ', '-', preg_replace( '/[^a-z\s]/', '', strtolower( $this->strVegetable ) ) );
			}
		

			$strSql = "SELECT intMonth, intDayStart, intDayEnd
						FROM plant
						WHERE idVeg = $idVeg
						ORDER BY intMonth";

			$arrMonths = array();
			$sql = mysql_query( $strSql );
			while($row2 = mysql_fetch_array($sql)){
					$arrMonths[] = (int)($row2['intMonth']);
			}
		
			$this->strSow = get_months_as_string( $arrMonths );

			$strSql = "SELECT intMonth
						FROM harvest
						WHERE idVeg = $idVeg
						ORDER BY intMonth";

			$arrMonths = array();
			$sql = mysql_query( $strSql );
			while($row2 = mysql_fetch_array($sql)){
					$arrMonths[] = (int)($row2['intMonth']);
			}
		
			$this->strHarvest = get_months_as_string( $arrMonths );
		
		}

	}

	static function get_veg( $intMonth = null ) {

		if (!intMonth) {
			$intMonth = date( 'n' );
		}else {
			$intDay = date( 'j' );	
		}

/*
$intMonth = 1;
$intDay = 25;
*/
		
		$strSql = "SELECT idVeg, idPlant FROM plant WHERE intMonth = $intMonth";

		if ( $intDay ) {
			$strSql .= " AND ( ( intDayStart >= $intDay OR intDayStart IS NULL ) AND ( intDayEnd IS NULL OR intDayEnd <= $intDay ) )";
		}

/*			
		$strSql = "SELECT
		plant.idVeg,
		veg.idVeg,
		veg.strVegetable,
		veg.strName,
		veg.strUrlBuy,
		veg.intDistance,
		veg.intSpacing,
		veg.intDefaultWhere,
		veg.strDefaultDescription,
		plant.idPlant,
		plant.intMonth,
		plant.intDayStart,
		plant.intDayEnd,
		plant.strDescription,
		plant.intWhere
		FROM
		veg
		Inner Join plant ON veg.idVeg = plant.idVeg
		WHERE plant.intMonth = $intMonth AND ( ( plant.intDayStart >= $intDay OR plant.intDayStart IS NULL ) AND ( plant.intDayEnd IS NULL OR plant.intDayEnd <= $intDay ) )
		ORDER BY
		plant.intWhere, veg.strVegetable ASC";
*/

		$sql = mysql_query( $strSql );

		while($row = mysql_fetch_array($sql)){
			$objVeg = new VegClass( $row['idVeg'], $row['idPlant'] );
			if ( !$objVeg->blnInactive ) {	
				switch ( $objVeg->intWhere ) {
					case self::WHERE_SOW_OUTDOORS:
						$arrSowOutdoors[] = $objVeg;
						break;
					case self::WHERE_PLANT_OUTDOORS:
						$arrPlantOutdoors[] = $objVeg;
						break;
					case self::WHERE_SOW_UNDER_COVER:
						$arrSowUnderCover[] = $objVeg;
						break;
					default:
						// error...
						break;
				}
			}
		}

		if ( $arrSowOutdoors ) { usort( $arrSowOutdoors, 'compare_veg' ); }
		if ( $arrPlantOutdoors ) { usort( $arrPlantOutdoors, 'compare_veg' ); }
		if ( $arrSowUnderCover ) { usort( $arrSowUnderCover, 'compare_veg' ); }

		return ( array( $arrSowOutdoors, $arrPlantOutdoors, $arrSowUnderCover ) );

	}

}

function compare_veg($a, $b)
{
    if ($a->strVegetable == $b->strVegetable) {
        return 0;
    }
    return ($a->strVegetable < $b->strVegetable) ? -1 : 1;
}

function get_months_as_string( $arrMonths ) {

		for ( $i=0; $i<count($arrMonths); $i++ ) {

			$intMonth = $arrMonths[$i];

			if ( $i == 0 ) {
				$strMonths = date( 'F', mktime(0, 0, 0, $intMonth ) );
			} else if ( $arrMonths[$i-1] == $intMonth-1 && $arrMonths[$i+1] != $intMonth+1 && $intMonth-2 === $arrMonths[$i-2]) {
				$strMonths .= "&mdash;" . date( 'F', mktime(0, 0, 0, $intMonth ) );
			} else if ( ( $intMonth -2 != $arrMonths[$i-2] && $intMonth -1 != $arrMonths[$i-1] ) || ($arrMonths[$i-1] == $intMonth-1 && $arrMonths[$i+1] != $intMonth+1)) { 
				$strMonths .= ", " . date( 'F', mktime(0, 0, 0, $intMonth ) );
			}
		}
		return $strMonths;

}