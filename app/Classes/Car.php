<?php

	namespace App\Classes;

	class Car
	{
		public $model;
		public $year;
		public $color;


		public function __construct($model, $year, $color)

		{
		$this->model = $model;
		$this->year = $year;
		$this->color = $color;
		}

		public function Car ($model, $year, $color)


		{
			$this->model = $model;
			$this->year = $year;
			$this->color = $color;

		}
		public function getCarInfo()

		{
			return "<h3> By my auto</h3>
			Model: " . $this->model . "<br>
			Year: " . $this->year . "<br>
			Color: " . $this->color . "<br>";
		}


	}
