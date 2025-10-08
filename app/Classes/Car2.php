<?php

	namespace App\Classes;

	class Car2
	{
	public $model;
	public $year;
	public $color;
	public $speed;

		public static $countCar = 0;


		public function __construct($model, $year, $color, $speed)
		{
			$this->model = $model;
			$this->year = $year;
			$this->color = $color;
			$this->speed = $speed;
			self::$countCar++;
		}

		public static function getCount()
		{
			return self::$countCar;

		}

		public function getCarInformation()
		{
			return "
			<h3> By my auto</h3>
			Model: " . $this->model . "<br>
			Year: " . $this->year . "<br>
			Color: " . $this->color . "<br>
			Speed: " . $this->speed . "<br>
			";
		}
	}