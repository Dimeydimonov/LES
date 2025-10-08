<?php
	namespace App\Classes;

























/*	class File
	{
		public  $file_op;
		public  $file;
	public function __construct($file)
	{
		$this->file = $file;
		if (!is_writable($file)) {
			echo 'File is not writable';
			exit;
		}
		$this->file_op = fopen($this ->file, 'ab');
	}
	public function __destruct()
	{
		fclose($this->file_op);
	}

		public function Write($text)
		{
			if (fwrite($this->file_op, $text . PHP_EOL) === false) {
				echo 'File is not writable';
				exit;
			}
		}

	}*/