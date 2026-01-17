<?php

	namespace App\Components;

	use App\Models\Category;

	class MenuWidget extends Widget
	{
		public $tpl = 'widgets.menu-tpl';
		public $ul_class = 'menu';
		public $data = [];
		protected $tree = [];
		public static function Widget(array $config = []): void
		{
			$widget = new self($config);

 			foreach ($config as $key => $value) {
				if (property_exists($widget, $key)) {
					$widget->$key = $value;
				}
			}

			echo $widget->run();
		}

		/**
		 * @throws \Throwable
		 */
		public function run(): string
		{

			$this->data = Category::select('id', 'parent_id', 'title')
				->get()->keyBy('id')->toArray();

 			$this->tree = $this->getTree();

 			return view($this->tpl, [
				'ul_class' => $this->ul_class,
				'data'     => $this->tree,
			])->render();
		}

 		protected function getTree(): array
		{
			$tree = [];
			foreach ($this->data as $id => &$node) {
				if (!$node['parent_id']) {
 					$tree[$id] = &$node;
				} else {
 					$this->data[$node['parent_id']]['childs'][$id] = &$node;
				}
			}
			return $tree;
		}
	}
