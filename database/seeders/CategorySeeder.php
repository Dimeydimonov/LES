<?php

	namespace Database\Seeders;

	use App\Models\Category;
	use Illuminate\Database\Seeder;

	class CategorySeeder extends Seeder
	{
		/**
		 * Run the database seeds.
		 */
		public function run(): void
		{
			$parents= Category::factory(5)->create();

			$parents->each(function ($parent) {
				Category::factory(rand(1, 5))->create(['parent_id' => $parent->id]);
			});

		}
	}
