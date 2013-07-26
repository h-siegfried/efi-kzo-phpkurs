<?php
/**
 * This file contains the Turtle class
 * intended for turtle graphic programming
 * in php.
 * @author Hanspeter Siegfried, kzo.ch
 * @version 0.1
 * @package classes
 */



/**
 * Class Turtle
 * Intended for educational purpose.
 * With a turtle object you can program turtle graphics in php
 * and draw them on a gd image.
 * @author Hanspeter Siegfried, KZO, CH-8620 Wetzikon
 * @package classes
 * @version 0.1
 *
 */
class Turtle
{
	/**
	 *
	 * @var GD-Image-Handle $imageHandle An image resource object returned
	 * by the function imagecreatetruecolor().
	 */
	private $imageHandle;

	/**
	 * 
	 * @var integer $imageWidth The width of the image handled by the image resource 
	 * passed to the constructor
	 */
	private $imageWidth;

	/**
	 * 
	 * @var integer $imageHeight The height of the image ... @see @var $imagewidth
	 */
	private $imageHeight;

	/**
	 * 
	 * @var integer $xPos the turtle's current x-position
	 */
	private $xPos;

	/**
	 * 
	 * @var integer $yPos the turtle's current y-position
	 */
	private $yPos;

	/**
	 * 
	 * @var integer $penColor A color identifier usable for the GD image object, representing the actual pen color.
	 */
	private $penColor;

	/**
	 * 
	 * @var integer $penWidth The pen's width in pixels
	 */
	private $penWidth;

	/**
	 * 
	 * @var float $angle The turtle's current heading in radians
	 */
	private $angle;

	/**
	 * 
	 * @var boolean Whether the turtle's pen is currently down or not.
	 */
	private $isPenDown;

	/**
	 * 
	 * @var FirePHP an instance of the FirePHP.class. Can be NULL.
	 */
	protected $firephp;

	function __construct(&$imageHandle, $imageWidth, $imageHeight, $firePHP = NULL)
	{
		$this->imageHandle = $imageHandle;
		$this->imageWidth = $imageWidth;
		$this->imageHeight = $imageHeight;
		$this->xPos = $this->imageWidth / 2;
		$this->yPos = $this->imageHeight / 2;
		$this->angle = 0.0;
		$this->penColor = imagecolorallocate($imageHandle, 0, 0, 0);
		$this->isPenDown = FALSE;
		if($firePHP != NULL) {
			$this->firephp = $firePHP;
		}

	}
	
	/**
	 * 
	 * @return integer the color identifier of the turtle's current pen color
	 * (compatible to PHP's GD image functions)
	 */
	public function getPenColor()
	{
		return $this->penColor;
	}
	
	/**
	 * 
	 * @return integer the current width of the turtle's pen (in pixels)
	 */
	public function getPenWidth()
	{
		return $this->penWidth;
	}
	
	/**
	 * 
	 * @return boolean Whether the turtle's pen is currently down or not.
	 */
	public function isPenDown()
	{
		return $this->isPenDown();
	}
	
	/**
	 * 
	 * @return integer The turtle's current x-position
	 */
	public function getX()
	{
		return $this->xPos;
	}
	
	/**
	 * 
	 * @return integer The turtle's current y-position
	 */
	public function getY()
	{
		return $this->yPos;
	}
	
	/**
	 * 
	 * @param integer $red The amount of red (decimal number between 0 and 250)
	 * @param integer $green The amount of green (decimal number between 0 and 250)
	 * @param integer $blue The amount of blue (decimal number between 0 and 250)
	 */
	public function setPenColor($red, $green, $blue)
	{
		$this->penColor = imagecolorallocate($this->imageHandle, $red, $green, $blue);
		$this->firephp->log($this);
	}

	/**
	 * 
	 * @param integer $penWidth The new width of the turtle's pen. In Pixels.
	 */
	public function setPenWidth($penWidth)
	{
		$this->penWidth = $penWidth;
		imagesetthickness($this->imageHandle, $penWidth);
	}

	/**
	 * Puts the turtle's pen onto the canvas.
	 */
	public function penDown()
	{
		$this->isPenDown = TRUE;
	}

	/**
	 * Takes the turtle's pen off the canvas.
	 */
	public function penUp()
	{
		$this->isPenDown = FALSE;
	}

	/**
	 * 
	 * @param integer $strecke moves the turtle for the distance passed as argument (in pixels)
	 */
	public function forward($strecke)
	{
// 		$back = imagecolorallocate($this->imageHandle, 255, 255, 255);
// 		imagefill($this->imageHandle, 0, 0, $back);

		$newX = $this->xPos + round($strecke * cos($this->angle));
		$newY = $this->yPos + round($strecke * sin($this->angle));
		if(isset($this->firephp)) {
			$this->firephp->log(array(
					"angle" => $this->angle,
					"sinus" => (sin($this->angle)),
					"delta-y" => round($strecke * sin($this->angle))), "Berechnung von Delta-y");
			$this->firephp->log($newX, "newX");
			$this->firephp->log($newY, "newY");
		}

		if($this->isPenDown) {
			imageline($this->imageHandle, $this->xPos, $this->yPos, $newX, $newY, $this->penColor);
		}
		else{
			$this->jumpTo($newX, $newY);
		}

		$this->xPos = $newX;
		$this->yPos = $newY;
	}


	/**
	 * 
	 * @param integer $newAngleDegrees  The new heading of the turtle. In degrees
	 */
	public function setAngle($newAngleDegrees) {
		$this->angle = $newAngleDegrees * pi() / 180;
	}

	/**
	 * 
	 * @param integer $angleDegrees The angle to turn. In degrees.
	 */
	public function turn($angleDegrees)
	{
		$this->angle += $angleDegrees * pi() / 180;
	}

	/**
	 * Lets the turtle jump to a new place 
	 * With this method the turtle moves without drawing, even if it's pen is down.
	 * @param integer $newX The new x-position
	 * @param integer $newY The new y-position
	 */
	public function jumpTo($newX, $newY)
	{
		$this->xPos = $newX;
		$this->yPos = $newY;
	}
}
?>