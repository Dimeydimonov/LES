<?php
	error_reporting(-1);


	use App\Classes\Product;
	use App\Classes\NotebookProduct;
	use  App\Classes\BookProduct;
	use App\Interfaces\I3D;

	function debug($data)

	{
		echo '<pre>' . print_r($data, 1) . '</pre>';
	}

	$book = new BookProduct('Film', 30, 322, 'Булгаков');
//	$notebook = new NotebookProduct('Asus', 400, 'Intel', 'dex');
	debug($book);
//	debug($notebook);

	echo $book->getProduct();
//	echo $notebook->getProduct();

//	$notebook->addPro('11',12);
	$book->addPro(12, 12);
	$book-> test();















	/*	use App\Classes\Car2;

		function debug ($data): void
		{
			echo '<pre>' . print_r($data, 1) . '</pre>';
		}

		echo Car2::$countCar;
		echo '<br>';

		$car1 = new Car2('mmm', '2121','sfsfsff','222');
		$car2 = new Car2('vxv','2111', 'dsdsd', '1111');

		echo Car2::getCount();

		echo $car1->getCarInformation();
		echo $car2->getCarInformation();*/


	/*	use App\Classes\File;

		$file = new File(base_path('public/file.txt'));
		$file -> Write('1111');
		$file -> Write('222');
		$file -> Write('333');
		$file -> Write('344');*/