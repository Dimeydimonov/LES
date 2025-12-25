<?php

	namespace App\Http\Controllers;
	use Illuminate\Http\RedirectResponse;

	class LanguageController extends Controller
	{
		public function switch($locale): RedirectResponse
		{
			if (! in_array($locale, ['en', 'uk', 'ru'])) {
				abort(400);
			}

			session(['locale' => $locale]);
			return redirect()->back();
		}
	}