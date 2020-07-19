<?php

require_once( 'dataclass.php' );

class AttendeeClass extends DataClass {

	// contact details
	protected $idAttendee;
	protected $strName;
	protected $strTitle;
	protected $strDepartment;
	protected $strOrganisation;
	protected $strAddressLine1;
	protected $strAddressLine2;
	protected $strAddressTown;
	protected $strAddressCounty;
	protected $strAddressPostcode;
	protected $strEmail;
	protected $strPhone;
	protected $intDate;

	// Requirement
	protected $blnBikePark;
	protected $strRequirementDietary;
	protected $strRequirementAccess;

	// attendance - those to be stored
	protected $chrWorkshopAm1;
	protected $chrWorkshopAm2;
	protected $chrWorkshopPm;

	protected $arrWorkshopAmSelected; // those in the request object

	protected $blnNewsletter;

	function AttendeeClass( $idAttendee = NEW_OBJECT ) {
		$this->loadData( $idAttendee );
	}

	function loadData( $idAttendee = null ) {

		$this->idAttendee = $idAttendee;

		// only if a valid borough is passed
		if ( $idAttendee > 0 ) {
			$sql = mysql_query( "SELECT * FROM attendees WHERE idAttendee = $idAttendee" );

            while($row = mysql_fetch_array($sql)){
				$this->strName					= stripslashes( $row[ 'strName' ] );
				$this->strTitle					= stripslashes( $row[ 'strTitle' ] );
				$this->strDepartment			= stripslashes( $row[ 'strDepartment' ] );
				$this->strOrganisation			= stripslashes( $row[ 'strOrganisation' ] );
				$this->strAddressLine1			= stripslashes( $row[ 'strAddressLine1' ] );
				$this->strAddressLine2			= stripslashes( $row[ 'strAddressLine2' ] );
				$this->strAddressTown			= stripslashes( $row[ 'strAddressTown' ] );
				$this->strAddressCounty			= stripslashes( $row[ 'strAddressCounty' ] );
				$this->strAddressPostcode		= stripslashes( $row[ 'strAddressPostcode' ] );
				$this->strEmail					= stripslashes( $row[ 'strEmail' ] );
				$this->strPhone					= stripslashes( $row[ 'strPhone' ] );
				$this->blnBikePark				= stripslashes( $row[ 'blnBikePark' ] );
				$this->strRequirementDietary	= stripslashes( $row[ 'strRequirementDietary' ] );
				$this->strRequirementAccess		= stripslashes( $row[ 'strRequirementAccess' ] );
				$this->chrWorkshopAm1			= stripslashes( $row[ 'chrWorkshopAm1' ] );
				$this->chrWorkshopAm2			= stripslashes( $row[ 'chrWorkshopAm2' ] );
				$this->chrWorkshopPm			= stripslashes( $row[ 'chrWorkshopPm' ] );
				$this->strPassword				= stripslashes( $row[ 'strPassword' ] );
				$this->blnNewsletter			= stripslashes( $row[ 'blnNewsletter' ] );
				$this->intDate			= stripslashes( $row[ 'dtAdded' ] );

				$this->arrWorkshopAmSelected = array( $this->chrWorkshopAm1, $this->chrWorkshopAm2 );

            }
		}

	}

	function loadFromForm() {
		$this->strName					= addslashes( $_REQUEST[ 'strName' ] );
		$this->strTitle					= addslashes( $_REQUEST[ 'strTitle' ] );
		$this->strDepartment			= addslashes( $_REQUEST[ 'strDepartment' ] );
		$this->strOrganisation			= addslashes( $_REQUEST[ 'strOrganisation' ] );
		$this->strAddressLine1			= addslashes( $_REQUEST[ 'strAddressLine1' ] );
		$this->strAddressLine2			= addslashes( $_REQUEST[ 'strAddressLine2' ] );
		$this->strAddressTown			= addslashes( $_REQUEST[ 'strAddressTown' ] );
		$this->strAddressCounty			= addslashes( $_REQUEST[ 'strAddressCounty' ] );
		$this->strAddressPostcode		= addslashes( $_REQUEST[ 'strAddressPostcode' ] );
		$this->strEmail					= addslashes( $_REQUEST[ 'strEmail' ] );
		$this->strPhone					= addslashes( $_REQUEST[ 'strPhone' ] );
		$this->blnBikePark				= $_REQUEST[ 'blnBikePark' ] == 'on';
		$this->strRequirementDietary	= $_REQUEST[ 'blnRequirementDietary' ] == 'on' ? addslashes( $_REQUEST[ 'strRequirementDietary' ] ) : '';
		$this->strRequirementAccess		= $_REQUEST[ 'blnRequirementAccess' ] == 'on' ? addslashes( $_REQUEST[ 'strRequirementAccess' ] ) : '';
		$this->arrWorkshopAmSelected	= $_REQUEST[ 'chrWorkshopAm' ];
		$this->chrWorkshopAm1			= $_REQUEST[ 'chrWorkshopAm' ][0];
		$this->chrWorkshopAm2			= $_REQUEST[ 'chrWorkshopAm' ][1];
		$this->chrWorkshopPm			= $_REQUEST[ 'chrWorkshopPm' ];
		$this->strPassword				= addslashes( $_REQUEST[ 'strPassword' ] );
		$this->blnNewsletter			= (int)( $_REQUEST[ 'blnBikePark' ] == 'on' );

	}

	function addData() {

		$this->strPassword = $this->generatePassword();


		$strInsert = "
			INSERT INTO attendees ( strName, strTitle, strDepartment, strOrganisation, strAddressLine1, strAddressLine2, strAddressTown, strAddressCounty, strAddressPostcode, strEmail, strPhone, blnBikePark, strRequirementDietary, strRequirementAccess, chrWorkshopAm1, chrWorkshopAm2, chrWorkshopPm, blnNewsletter, dtAdded )
			VALUES ( '{$this->strName}', '{$this->strTitle}', '{$this->strDepartment}', '{$this->strOrganisation}', '{$this->strAddressLine1}', '{$this->strAddressLine2}', '{$this->strAddressTown}', '{$this->strAddressCounty}', '{$this->strAddressPostcode}', '" . strtolower( $this->strEmail ) . "', '{$this->strPhone}', '{$this->blnBikePark}', '{$this->strRequirementDietary}', '{$this->strRequirementAccess}', '{$this->chrWorkshopAm1}', '{$this->chrWorkshopAm2}', '{$this->chrWorkshopPm}', '{$this->blnNewsletter}', '" . mktime() . "')";

		mysql_query( $strInsert );
		$this->idAttendee = mysql_insert_id();

		$this->sendEmailsRegistered();

	}

	function updateData() {


		$strSql = "
			UPDATE attendees
			SET strName = '{$this->strName}', strTitle = '{$this->strTitle}', strDepartment = '{$this->strDepartment}', strOrganisation = '{$this->strOrganisation}', strAddressLine1 = '{$this->strAddressLine1}', strAddressLine2 = '{$this->strAddressLine2}', strAddressTown = '{$this->strAddressTown}', strAddressCounty = '{$this->strAddressCounty}', strAddressPostcode = '{$this->strAddressPostcode}', strEmail = '{$this->strEmail}', strPhone = '{$this->strPhone}', blnBikePark = '{$this->blnBikePark}', strRequirementDietary = '{$this->strRequirementDietary}', strRequirementAccess = '{$this->strRequirementAccess}', chrWorkshopAm1 = '{$this->chrWorkshopAm1}', chrWorkshopAm2 = '{$this->chrWorkshopAm2}', chrWorkshopPm = '{$this->chrWorkshopPm}', " . ( $this->strPassword  ? " strPassword = '{$this->strPassword}', " : '' ) . "dtModified = '" . mktime() . "'
			WHERE idAttendee = " . $this->idAttendee;

		mysql_query( $strSql );

	}

	function validateData() {

		$arrErrors = array();

		// SPAM check
		$strTimeTaken = time() - $_REQUEST['strTime'];
		if ( !$_REQUEST['blnJs'] && $strTimeTaken < 10 ) {

			if ( $_REQUEST['recaptcha_challenge_field'] ) {

				// captcha check here
				require_once('recaptchalib.php');
				$privatekey = "6LeuqAoAAAAAADlCsqVeIAn_-jwbrk8SIrKJcIVn";
				$resp = recaptcha_check_answer ($privatekey,
				                                $_SERVER["REMOTE_ADDR"],
				                                $_POST["recaptcha_challenge_field"],
				                                $_POST["recaptcha_response_field"]);

				if (!$resp->is_valid) {
					$arrErrors['captcha'] = 'Please re-enter the text in the image correctly.';
				}

			} else {
				$arrErrors['captcha'] = 'Please enter the text in the image.';
			}
		}
		// check MANDATORY fields
		if ( !$this->strName ) {
			$arrErrors[] = 'Name - Please enter your name.';
		}
		if ( !$this->strTitle ) {
			$arrErrors[] = 'Job Title - Please enter your job title.';
		}
		if ( !$this->strOrganisation ) {
			$arrErrors[] = 'Organisation - Please enter your organisation\'s name.';
		}
		if ( !$this->strAddressLine1 ) {
			$arrErrors[] = 'Address Line 1 - Please enter the first line of your address.';
		}
		if ( !$this->strAddressTown ) {
			$arrErrors[] = 'Town - Please enter your town.';
		}
		if ( !$this->strAddressCounty ) {
			$arrErrors[] = 'County - Please enter your county.';
		}
		if ( !$this->strAddressPostcode ) {
			$arrErrors[] = 'Postcode - Please enter your postcode.';
		}
		if ( !$this->strPhone ) {
			$arrErrors[] = 'Phone Number - Please enter your phone number.';
		}
		if ( !$this->strEmail ) {
			$arrErrors[] = 'Email Address - Please enter your email address.';
		} else if ( !$this->isEmailValid() ) {
			$arrErrors[] = 'Email Address - Please enter a valid email address.';
		}
		if ( count( $this->arrWorkshopAmSelected ) != 2 ) {
			$arrErrors[] = 'Morning Workshops - Please select <u>two</u> morning workshops';
		}
		if ( !$this->chrWorkshopPm ) {
			$arrErrors[] = 'Afternoon Workshops - Please select an afternoon workshops';
		}

		return $arrErrors;

	}

	function deleteData() {

		$strSql = "
			DELETE FROM attendees
			WHERE idAttendee = " . $this->idAttendee;
		mysql_query( $strSql );
	}

	function generatePassword( $length=6 ) {
		$conso=array("b","c","d","f","g","h","j","k","l",
		"m","n","p","r","s","t","v","w","x","y","z");
		$vocal=array("a","e","i","o","u");
		$password="";
		srand ((double)microtime()*1000000);
		$max = $length/2;
		for($i=1; $i<=$max; $i++)
		{
			$password.=$conso[rand(0,19)];
			$password.=$vocal[rand(0,4)];
		}
		return $password;
}

	function sendEmailsRegistered() {

		$this->sendConfirmationMessage();

		// admin email
		mail( 'info@smartmovesconference.org.uk', 'New registrant', $this->getStringName() . " has registered from " . $this->getStringOrganisation(), $strHeaders );

	}

	function sendConfirmationMessage() {

			// send confirmation EMAIL to user
			$strTo		=  ( TEST === 1 ) ? 'pete.w@bitecp.com' : $this->getStringEmail();
			$strHeaders	= 'From: ' . ADMIN_EMAIL;
			$strSubject = CONFERENCE_NAME . ' Registration';
			$strBody	= "Dear {$this->getStringName()},

Thank you for registering for the TfL Smartmoves conference on 22 April 2010 at:

Congress Centre
28 Great Russell Street,
London
WC1B 3LS";

			return mail( $strTo, $strSubject, $strBody, $strHeaders );
	}

	function sendPasswordReminder() {

		// send confirmation EMAIL to user
		$strTo		=  ( TEST === 1 ) ? 'pete.w@bitecp.com' : $this->getStringEmail();
		$strHeaders	= 'From: ' . ADMIN_EMAIL;
		$strSubject = CONFERENCE_NAME . ' Password Reminder';
		$strBody	= "Dear " . $this->getStringName() . ",

Your login details are:

	Email Address: " .$this->getStringEmail() . "
	Password	: " . $this->getStringPassword() . "

You can log in at http://" . $_SERVER['SERVER_NAME'] . "/login.php";

		mail( $strTo, $strSubject, $strBody, $strHeaders );

	}

	function login() {

		$idAttendee = 0;

		$objQuery = mysql_query( "SELECT idAttendee FROM attendees WHERE strEmail = '" .strtolower( $this->strEmail ) . "' AND strPassword = '" . $this->strPassword . "'");

        while($row = mysql_fetch_array($objQuery)){
			$idAttendee = $row['idAttendee'];
        }

        $_SESSION['idAttendee']	= $idAttendee;
        $_SESSION['blnRegistered'] = 1;

        return $idAttendee;
	}

	function getId() {
		return $this->idAttendee;
	}

	function getStringName() {
		return $this->strName;
	}

	function getStringTitle() {
		return $this->strTitle;
	}

	function getStringDepartment() {
		return $this->strDepartment;
	}

	function getStringOrganisation() {
		return $this->strOrganisation;
	}

	function getStringAddressLine1() {
		return $this->strAddressLine1;
	}

	function getStringAddressLine2() {
		return $this->strAddressLine2;
	}

	function getStringAddressTown() {
		return $this->strAddressTown;
	}

	function getStringAddressCounty() {
		return $this->strAddressCounty;
	}

	function getStringAddressPostcode() {
		return $this->strAddressPostcode;
	}

	function getStringEmail() {
		return $this->strEmail;
	}

	function getStringPhone() {
		return $this->strPhone;
	}

	function needsBikePark(){
		return $this->blnBikePark;
	}

	function getStringRequirementDietary() {
		return $this->strRequirementDietary;
	}

	function getStringRequirementAccess() {
		return $this->strRequirementAccess;
	}

	function getArrayWorkshopAmSelected() {
		return $this->arrWorkshopAmSelected;
	}

	function getChrWorkshopAm1(){
		return $this->chrWorkshopAm1;
	}

	function getChrWorkshopAm2(){
		return $this->chrWorkshopAm2;
	}

	function getChrWorkshopPm(){
		return $this->chrWorkshopPm;
	}

	function getStringPassword() {
		return $this->strPassword;
	}

	function wantsNewsletter() {
		return $this->blnNewsletter;
	}

	function isAdmin() {
		return ( $this->idAttendee == 1 && $this->strName == 'admin' );
	}

	function getStringDate() {
		if ( $this->intDate ) {
			return date( 'd M y', $this->intDate );
		}
	}

	function isEmailValid() {
		$email = $this->strEmail;
	// First, we check that there's one @ symbol,
	// and that the lengths are right.
	if (!ereg("^[^@]{1,64}@[^@]{1,255}$", $email)) {
	// Email invalid because wrong number of characters
	// in one section or wrong number of @ symbols.
	return false;
	}
	// Split it into sections to make life easier
	$email_array = explode("@", $email);
	$local_array = explode(".", $email_array[0]);
	for ($i = 0; $i < sizeof($local_array); $i++) {
	if
	(!ereg("^(([A-Za-z0-9!#$%&'*+/=?^_`{|}~-][A-Za-z0-9!#$%&'*+/=?^_`{|}~\.-]{0,63})|(\"[^(\\|\")]{0,62}\"))$",
	$local_array[$i])) {
	  return false;
	}
	}
	// Check if domain is IP. If not,
	// it should be valid domain name
	if (!ereg("^\[?[0-9\.]+\]?$", $email_array[1])) {
	$domain_array = explode(".", $email_array[1]);
	if (sizeof($domain_array) < 2) {
	    return false; // Not enough parts to domain
	}
	for ($i = 0; $i < sizeof($domain_array); $i++) {
	  if
	(!ereg("^(([A-Za-z0-9][A-Za-z0-9-]{0,61}[A-Za-z0-9])|([A-Za-z0-9]+))$",
	$domain_array[$i])) {
	    return false;
	  }
	}
	}
	return true;
	}

	// STATICS
	static function get_id_from_email( $strEmail ) {

		$objQuery = mysql_query( "SELECT idAttendee FROM attendees WHERE strEmail = '" . $strEmail . "'");

        while($row = mysql_fetch_array($objQuery)){
			return $row['idAttendee'];
        }

	}

	static function get_int_total_registrations() {

		$strQuery = "SELECT COUNT( DISTINCT idAttendee) AS intTotalAttendees FROM attendees WHERE blnTest = 0";

		$objQuery = mysql_query( $strQuery );

        while($row = mysql_fetch_array($objQuery)){
			return $row['intTotalAttendees'];
        }
	}

	static function get_array_attendees() {

		$arrResults = array();

		$strQuery = "SELECT idAttendee FROM attendees WHERE blnTest = 0 ORDER BY strOrganisation, strName";

		$sql = mysql_query( $strQuery );

		while($row = mysql_fetch_array($sql)){
			$arrResults[$row['idAttendee']] = new AttendeeClass( $row['idAttendee'] );
		}

		return $arrResults;
	}

	static function get_count_breakout_attendance( $strField ) {

		$arrResults = array();

		$strQuery = "SELECT COUNT( idAttendee) as intCount FROM attendees WHERE $strField = " . $chrWorkshopAm1;

		$sql = mysql_query( $strQuery );
		while($row = mysql_fetch_array($sql)){
			return $row['intCount'];
		}

	}

	static function get_workshop_registrations() {

		$arrResults = array();

		for ( $i = 'A'; $i <= 'P'; $i++ ) {

			$strQuery = "SELECT COUNT( idAttendee) as intCount FROM attendees WHERE chrWorkshopAm1 = '$i' OR chrWorkshopAm2 = '$i' OR chrWorkshopPm = '$i'";

			$sql = mysql_query( $strQuery );
			while($row = mysql_fetch_array($sql)){
				$arrResults[$i] = $row['intCount'];
			}
		}

		return $arrResults;

	}

	static function get_attending_organisations() {

		$arrResults = array();

		$strQuery = "SELECT DISTINCT( strOrganisation ) FROM attendees WHERE strOrganisation IS NOT NULL and strOrganisation != '' ORDER BY strOrganisation";

		$sql = mysql_query( $strQuery );
		while($row = mysql_fetch_array($sql)){
			$arrResults[] = $row['strOrganisation'];
		}

		return $arrResults;
	}
}