<!doctype html>
<html lang="ru">
<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width,initial-scale=1">
	<title>@yield('title','Grocery Store')</title>

	<!-- Подключаем public/css/style.css напрямую -->
	<link rel="stylesheet" href="{{ asset('css/style.css') }}">


	<!-- Font Awesome -->
	<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">

	<!-- Google Fonts (open sans used in CSS) -->
	<link href="https://fonts.googleapis.com/css2?family=Open+Sans:wght@300;400;600;700&display=swap" rel="stylesheet">
</head>
<body>
@yield('content')

<!-- Optional JS -->
<script src="{{ asset('js/app.js') }}"></script>
</body>
</html>
