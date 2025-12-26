<?php

	namespace App\Models;

	use Illuminate\Database\Eloquent\Model;
	use Illuminate\Database\Eloquent\Relations\BelongsTo;
	use Illuminate\Database\Eloquent\Relations\HasMany;

	class Category extends Model
	{
		protected $fillable = ['parent_id', 'title', 'description', 'keywords'];
		public function children() : HasMany | Category
		{
			return $this->hasMany(__CLASS__ , 'parent_id');
		}

		public function parent() : BelongsTo
		{
			return $this->belongsTo(__CLASS__ , 'parent_id');
		}


		public function products(): HasMany
		{
			return $this->hasMany(Product::class);
		}
	}
