<?php

	namespace App\Classes;

	class NotebookProduct extends Product
	{
		public $cpu;
		public $ram;

		public function __construct($name, $price, $cpu = null, $ram = null)
		{
			parent::__construct($name, $price);
			$this->cpu = $cpu;
			$this->ram = $ram;
			$this -> setDiscount(10);

		}

		public function getProduct() : string
		{
			$out = parent::getProduct();
			$out .= "Процессор-{$this->cpu } <br>
					Ram: {$this->ram} <br> ";
			return $out;
		}

		public function getCpu()
		{
			return $this->cpu;
		}

		public function getRam()
		{
			return $this->ram;
		}


		public function addPro($name , $price, $xs =0)

		{
			// TODO: Implement addPro() method.
/*			var_dump ($name);
			var_dump($price);
			var_dump($xs);*/
		}
	}