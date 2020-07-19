<?php

// abstract class in php4??
class DataClass {

	const NEW_OBJECT = -1;

	function save() {

		if ( $this->getId() < 0 ) {
			$this->addData();
		} else {
			$this->updateData();
		}
	}

	function toJson() {
		require_once( 'includes/JSON.php' );

		$objJson = new Services_JSON();
		return $objJson->encode( $this );

	}

}