<?php

	namespace App\Http\Controllers;

	class Category extends Controller
	{
		public function index()
		{
			$categories = self::where('parent_id', 0)->with('children')->get();
			return view('categories.index', compact('categories'));


		}
	}
