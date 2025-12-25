<?php

	namespace App\Models;

	use Illuminate\Database\Eloquent\Model;
	use Illuminate\Database\Eloquent\Relations\HasMany; // Импортируйте этот класс

	class Category extends Model
	{
		// По умолчанию имя таблицы 'categories', поэтому свойство $table не обязательно

		/**
		 * Получить все продукты для этой категории.
		 */
		public function products(): HasMany
		{
			return $this->hasMany(Product::class);
		}
	}
