<?php

	namespace App\Components;

	abstract class Widget
	{
		public function __construct(array $config = [])
		{
			foreach ($config as $key => $value) {
				if (property_exists($this, $key)) {
					$this->$key = $value;
				}
			}
		}

		public function init(): void
		{
			// базовая инициализация (если нужна)
		}

		abstract public function run(): string;
	}
