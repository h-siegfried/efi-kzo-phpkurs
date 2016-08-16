<?php
/**
 * @package classes
 */
/**
 * Class Begruesser
 * @package classes
 */
class Begruesser
{
	/**
	 * @var integer $hoeflichkeit Das Mass fuer die Hoeflichkeit der Begruessung.
	 */
	private $hoeflichkeit;

	/**
	 * @var string $name Der Name des Begruessers. Er wird in Abhaengigkeit vom Geschlecht automatisch gesetzt.
	 */
	private $name;

	/**
	 * @var string $gender Das Geschecht des Begruessers
	 */
	private $gender;

	/**
	 * @var integer $alter Das Alter des Begruessers. Es beeinflusst die Art der Begruessung.
	 */
	private $alter;

	/**
	 * Constructor
	 * @param integer $hoeflichkeitParam Ein Wert fuer die angestrebte Hoeflichkeit des Begruessers.
	 * 1 steht fuer "sehr hoch", 2 steht fuer "hoch",
	 * 3 fuer "normal", 4 fuer "niedrig"
	 * @param string $gender Das Geschlecht des Begruessers. <br />Kann "m" oder "f" sein.
	 * @param integer $alter (optional) Das Alter des Begruessers.
	 * @throws ErrorException $e Exception thrown, if the parameter count is below the required 2 params
	 * @throws InvalidArgumentException $e Exception thrown, if the data type of any parameter does not match the required.
	 */
	function __construct($hoeflichkeitParam, $gender, $alter=25)
	{
		if(func_num_args() < 2) {
			throw( new ErrorException(
					"Sie haben dem Konstruktor der Klasse Begruesser zu wenige Parameter uebergeben.",
					E_USER_ERROR, 1, __CLASS__, __LINE__
			)
			);
		}
		if(!is_numeric($hoeflichkeitParam)) {
			throw( new InvalidArgumentException(
					"Der Parameter $hoeflichkeitParam muss eine Zahl zwischen 1 und 4 sein.",
					E_USER_ERROR) );
		}
		if( ($gender != "m") && ($gender != "f") ) {
			throw( new InvalidArgumentException(
					"der Parameter $gender muss \"m\" oder \"f\" sein.",
					E_USER_ERROR) );
		}
		$this->hoeflichkeit = $hoeflichkeitParam;
		$this->gender = $gender;
		$this->alter = $alter;

		if($gender == "f") {
			$this->name = "Claudia";
		}
		else {
			$this->name = "Marco";
		}
	} // End of function __construct
	
	
	/**
	 * getBegruessung: Returns a string containing the begruessung for your web page.
	 * @param string $nutzerName The user's second name
	 * @param string $nutzerVorname The user's firstname
	 * @param string $nutzerGeschlecht The user's gender.
	 * @return string $begruessung The salutation string.
	 */
	function getBegruessung($nutzerName, $nutzerVorname, $nutzerGeschlecht) {
		$begruessung = "";
		if($this->alter < 4) {
			$begruessung = ("tatatatatatabwwwrrr.");
		}
		elseif ($this->alter >= 4 ) {
			switch($this->hoeflichkeit)
			{
				case 1: 
					$begruessung = "hallo man, ales guet?";
					break;
				case 2:
					if($nutzerGeschlecht == "m") {
						$begruessung = "Gr&uuml;ezi, Herr " . $nutzerName;
					}
					elseif($nutzerGeschlecht == "f") {
						$begruessung = "Gr&uuml;ezi, Frau " . $nutzerName;
					}
					else{
						$begruessung = sprintf("Guten Tag, %s %s!", 
								$nutzerVorname, $nutzerName);
					}
					break;
				case 3:
					$bestTeil = "";
					if($nutzerGeschlecht == "m") {
						$bestTeil = "Sehr verehrter Herr ";
					}
					elseif ($nutzerGeschlecht == "f") {
						$bestTeil = "Sehr verehrte Frau ";
					}
					$begruessung .= sprintf("%s %s %s, Mein Name ist %s, 
							Es freut mich sehr, Sie hier begr&uuml;ssen zu d&uuml;rfen.",
							$bestTeil,
							$nutzerVorname,
							$nutzerName,
							$this->name) ;
					break;
				case 4:
					$begruessung = "Entschuldigung, so h&ouml;flich kann ich gar nicht sein.";
					
			}  // End of switch statement
			return $begruessung;
		}
	}  // End of function getBegruessung
}
?>