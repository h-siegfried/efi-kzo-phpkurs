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
 * @version 1.2.0
 *
 * @Todo Bei sehr kleinen Drehwinkeln wird offenbar falsch gerundet.
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
	 * @var float $xPos the turtle's current x-position
	 */
	private $xPos;

	/**
	 * 
	 * @var float $yPos the turtle's current y-position
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
	 * Constructor method
	 * @param resource $imageHandle An image resource identifier returned by
	 * the function imagecreatetruecolor() or imagecreate()


	 */
	function __construct(&$imageHandle)
	{
		if(!is_resource($imageHandle)) {
			throw new InvalidArgumentException("Sie muessen dem Konstruktor 
				der Klasse Turtle als 1. Parameter eine Image-Resource uebergeben, 
				der Konstruktor hat stattdessen den Wert NULL erhalten.",E_USER_ERROR);
		}
		$this->imageHandle = $imageHandle;


		$this->imageWidth = imagesx($imageHandle);
		$this->imageHeight = imagesy($imageHandle);
		$this->xPos = $this->imageWidth / 2;
		$this->yPos = $this->imageHeight / 2;
		$this->angle = 0.0;
		$this->penColor = imagecolorallocate($imageHandle, 0, 0, 0);
		$this->isPenDown = FALSE;


	}
	
	/**
	 * Returns the color identifier (an integer) of the turtle's pen color.
	 * This color identifier can be used as argument for any draw function 
	 * applied directly to the image resource.
	 * @return integer the color identifier of the turtle's current pen color
	 * (compatible to PHP's GD image functions)
	 */
	public function getPenColor():int
	{
		return $this->penColor;
	}
	
	/**
	 * Returns the amount of red in the turtle's pen color.
	 * @return integer: An integer between 0 and 255 meaning the amount of red in
	 * the turtle's pen color
	 */
	public function getPenRed():int
	{
		return imagecolorsforindex($this->imageHandle, $this->penColor)['red'];
	}
	
	/**
	 * Returns the amount of green in the turtle's pen color.
	 * @return integer: An integer between 0 and 255 meaning the amount of green
	 * in the turtle's pen color
	 */
	public function getPenGreen():int
	{
		return imagecolorsforindex($this->imageHandle, $this->penColor)['green'];		
	}
	
	/**
	 * Returns the amount of blue in the turtle's pen color
	 * @return integer: An integer between 0 and 255 meaning the amount of blue
	 * in the turtle's pen color
	 */
	public function getPenBlue():int
	{
		return imagecolorsforindex($this->imageHandle, $this->penColor)['blue'];
	}
	
	/**
	 * Returns the width of the turtle's pen as an integer (in pixels)
	 * @return integer the current width of the turtle's pen (in pixels)
	 */
	public function getPenWidth():int
	{
		return $this->penWidth;
	}
	
	/**
	 * Returns the information, whether the turtle's pen is currently down.
	 * @return boolean Whether the turtle's pen is currently down or not.
	 */
	public function isPenDown():bool
	{
		return $this->isPenDown();
	}
	
	/**
	 * Returns the turtle's current x ordinate.
	 * @return integer The turtle's current x-position
	 */
	public function getX():float
	{
		return $this->xPos;
	}
	
	/**
	 * Returns the turtle's current y ordinate
	 * @return integer The turtle's current y-position
	 */
	public function getY():float
	{
		return $this->yPos;
	}
	
	/**
	 * Sets the turtle's pen color.
	 * @param integer $red The amount of red (decimal number between 0 and 250)
	 * @param integer $green The amount of green (decimal number between 0 and 250)
	 * @param integer $blue The amount of blue (decimal number between 0 and 250)
	 */
	public function setPenColor(int $red, int $green, int $blue)
	{
		$this->penColor = imagecolorallocate($this->imageHandle, $red, $green, $blue);
		//$this->firephp->log($this->imageHandle);
	}

	/**
	 * Sets the width of the turtle's pen. 
	 * @param integer $penWidth The new width of the turtle's pen. In Pixels.
	 */
	public function setPenWidth(int $penWidth)
	{
		$this->penWidth = $penWidth;
		imagesetthickness($this->imageHandle, $penWidth);
	}

	/**
	 * Puts the turtle's pen onto the canvas.
	 * @return void
	 */
	public function penDown()
	{
		$this->isPenDown = TRUE;
	}

	/**
	 * Takes the turtle's pen off the canvas.
	 * @return void
	 */
	public function penUp()
	{
		$this->isPenDown = FALSE;
	}

	/**
	 * Lets the turtle go forward (in the direction of its current heading). The argument passed
	 * is the desired distance in pixels.
	 * @param float $strecke moves the turtle for the distance passed as argument (in pixels)
	 */
	public function forward(float $strecke)
	{

		$newX = $this->xPos + round($strecke * cos($this->angle));
		$newY = $this->yPos + round($strecke * sin($this->angle));
// 		if(isset($this->firephp)) {
// 			$this->firephp->log(array(
// 					"angle" => $this->angle,
// 					"sinus" => (sin($this->angle)),
// 					"delta-y" => round($strecke * sin($this->angle))), "Berechnung von Delta-y");
// 			$this->firephp->log($newX, "newX");
// 			$this->firephp->log($newY, "newY");
// 		}

		if($this->isPenDown) {
			imageline($this->imageHandle, round($this->xPos), round($this->yPos),
                round($newX), round($newY), $this->penColor);
		}
		else{
			$this->jumpTo($newX, $newY);
		}

		$this->xPos = $newX;
		$this->yPos = $newY;
	}


	/**
	 * Sets the turtle's heading. The argument passed is an integer meaning degrees.
	 * @param float $newAngleDegrees  The new heading of the turtle. In degrees
	 */
	public function setAngle(float $newAngleDegrees) {
		$this->angle = $newAngleDegrees * pi() / 180;
	}

	/**
	 * Lets the turtle turn right by an angle (in degrees) passed as argument.
	 * An integer below zero lets it turn left.
	 * @param float $angleDegrees The angle to turn. In degrees.
	 */
	public function turn(float $angleDegrees)
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