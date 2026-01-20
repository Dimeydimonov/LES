<?php

	namespace App\Components;

	use App\Models\Category;
	use Illuminate\Support\Facades\Cache;
	use Throwable;

	class MenuWidget extends Widget
	{
		public $tpl = 'widgets.menu-tpl';
		public $ul_class = 'menu';
		public $data = [];
		protected $tree = [];

		/**
		 * @throws Throwable
		 */
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
		 * @throws Throwable
		 */
		public function run(): string
		{
			if (Cache::has('my_menu')) {
				return Cache::get('my_menu');
			}



			$this->data = Category::select('id', 'parent_id', 'title')
				->get()->keyBy('id')->toArray();

 			$this->tree = $this->getTree();


 			$html = view($this->tpl, [
				'ul_class' => $this->ul_class,
				'data'     => $this->tree,
			])->render();

			 Cache::put('my_menu', $html, now()->addMinutes(10));
			 return $html;


		}

 		protected function getTree(): array
		{
			$tree = [];
			foreach ($this->data as $id => &$node) {

				if (!$node['parent_id']) {
 					$tree[$id] = &$node;
				} else if (isset($this->data[$node['parent_id']])) {
					$this->data[$node['parent_id']]['childs'][$node['id']] = &$node;
				}
			}

			return $tree;
		}
	}
