<?php

	namespace App\Classes;

	use App\Interfaces\I3D;

	class BookProduct extends Product  implements I3D

	{
		public $NumPages;
		public $Autor;

		public function __construct($name, $price, $NumPages = null, $Autor = null)
		{
			parent::__construct($name, $price);
			$this->NumPages = $NumPages;
			$this->Autor = $Autor;

		}

		public function getProduct() : string
		{
			$out = parent::getProduct();
			$out .= "Страниц-{$this->NumPages } <br>
					Автор: {$this->Autor} <br> ";
			return $out;
		}

		public function addPro($name , $price, $XXX =0 )
		{
			var_dump($name);
			var_dump($price);
			var_dump($XXX);
			// TODO: Implement addPro() method.
		}

		public function test()
		{

			// TODO: Implement test() method.
		}
	}