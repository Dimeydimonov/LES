<?php

	namespace App\Models;

	use Illuminate\Database\Eloquent\Factories\HasFactory;
	use Illuminate\Database\Eloquent\Model;

	class Product extends Model

	{
use HasFactory;
protected $fillable = [
	'category_id',
	'title',
	'content',
	'price',
	'old_price',
	'description',
	'keywords',
	'img',
	'is_offer'
];


//		protected $table = 'products';
//		protected $fillable = [
//			'category_id',
//			'name',
//			'price',

	}
