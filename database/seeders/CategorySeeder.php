<?php

	namespace Database\Seeders;

	use Illuminate\Database\Seeder;
	use Illuminate\Support\Facades\DB;
	use Carbon\Carbon;

	class CategorySeeder extends Seeder
	{
		/**
		 * Run the database seeds.
		 */
		public function run(): void
		{
			$now = Carbon::now();

			DB::table('categories')->insert([
				['id' => 1, 'parent_id' => null, 'title' => 'Branded Foods', 'description' => 'Branded Foods description', 'keywords' => 'Branded Foods keywords', 'created_at' => $now, 'updated_at' => $now],
				['id' => 2, 'parent_id' => null, 'title' => 'Households', 'description' => 'Households description', 'keywords' => 'Households keywords', 'created_at' => $now, 'updated_at' => $now],
				['id' => 3, 'parent_id' => null, 'title' => 'Veggies & Fruits', 'description' => 'Veggies & Fruits description', 'keywords' => 'Veggies & Fruits keywords', 'created_at' => $now, 'updated_at' => $now],
				['id' => 4, 'parent_id' => 3,    'title' => 'Vegetables', 'description' => 'Vegetables description', 'keywords' => 'Vegetables keywords', 'created_at' => $now, 'updated_at' => $now],
				['id' => 5, 'parent_id' => 3,    'title' => 'Fruits', 'description' => 'Fruits description', 'keywords' => 'Fruits keywords', 'created_at' => $now, 'updated_at' => $now],

				['id' => 6, 'parent_id' => null, 'title' => 'Kitchen', 'description' => null, 'keywords' => null, 'created_at' => $now, 'updated_at' => $now],
				['id' => 8, 'parent_id' => null, 'title' => 'Beverages', 'description' => null, 'keywords' => null, 'created_at' => $now, 'updated_at' => $now],
				['id' => 9, 'parent_id' => 8,    'title' => 'Soft Drinks', 'description' => null, 'keywords' => null, 'created_at' => $now, 'updated_at' => $now],
				['id' => 10, 'parent_id' => 8,   'title' => 'Juices', 'description' => null, 'keywords' => null, 'created_at' => $now, 'updated_at' => $now],
				['id' => 11, 'parent_id' => null, 'title' => 'Frozen Foods', 'description' => null, 'keywords' => null, 'created_at' => $now, 'updated_at' => $now],
				['id' => 12, 'parent_id' => 11,  'title' => 'Frozen Snacks', 'description' => null, 'keywords' => null, 'created_at' => $now, 'updated_at' => $now],
				['id' => 13, 'parent_id' => 11,  'title' => 'Frozen Nonveg', 'description' => null, 'keywords' => null, 'created_at' => $now, 'updated_at' => $now],
				['id' => 14, 'parent_id' => null, 'title' => 'Bread & Bakery', 'description' => null, 'keywords' => null, 'created_at' => $now, 'updated_at' => $now],
				['id' => 15, 'parent_id' => null, 'title' => 'Pet Food', 'description' => null, 'keywords' => null, 'created_at' => $now, 'updated_at' => $now],
			]);
		}
	}
