<?php

	namespace App\Components;

	class MenuWidget extends Widget
	{
		public $tpl = 'menu';
		public $ul_class = 'menu';
		public $data = [];

		public static function Widget(array $config = []): void
		{
			$widget = new self($config);
			$widget->init();
			echo $widget->run();
		}

		public function init(): void
		{
			parent::init();
			$this->tpl .= '.php';
		}

		public function run(): string
		{
			return view($this->tpl, [
				'ul_class' => $this->ul_class,
				'data'     => $this->data,
			])->render();
		}

	}
