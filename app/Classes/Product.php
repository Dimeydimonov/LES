<?php

	namespace App\Classes;

	/**
	 * @method static with(string $string)
	 */
	abstract class Product
	{
		private mixed $name;
		protected mixed $price;

		private mixed $discount= 0;

		public function __construct($name, $price)
		{
			$this->name = $name;
			$this->price = $price;
		}

		public function getProduct() : string
		{
			return "<hr><b> О продукте </b><br>
			Наименование: <b>{$this->name}</b><br>	
			Цена: {$this->price}<br>
			Цена со скидкой: {$this->getPrice()} <br>";
		}

		public function getName() : mixed
		{
			return $this->name;
		}

		public function getPrice() : mixed
		{
			return $this->price - ($this->discount / 100 * $this->price);
		}

		public function getDiscount() : mixed
		{
			return $this->discount;
		}

		public function setDiscount( $discount) : void
		{
			$this->discount = $discount;
		}
	abstract protected function addPro($name, $price);

	}