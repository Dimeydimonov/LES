<!doctype html>
<html lang="ru">
<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width,initial-scale=1">
	<title>@yield("title","Grocery Store")</title>
	<link rel="stylesheet" href="{{ asset("css/style.css") }}">
	<link rel="stylesheet" href="{{ asset("css/flexslider.css") }}">
	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
	<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
	<link href="https://fonts.googleapis.com/css2?family=Open+Sans:wght@300;400;600;700&display=swap" rel="stylesheet">
	<link href="https://fonts.googleapis.com/css2?family=Ubuntu:wght@300;400;500;700&display=swap" rel="stylesheet">
</head>
<body>
@yield("content")

<script src="https://code.jquery.com/jquery-1.11.1.min.js"></script>
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
<script src="{{ asset("js/flexslider.js") }}"></script>
<script src="{{ asset("js/app.js") }}"></script>
<script>
$(window).load(function(){
  $(".flexslider").flexslider({
    animation: "slide",
    start: function(slider){
      $("body").removeClass("loading");
    }
  });
});

$(document).ready(function(){
    $(".dropdown").hover(            
        function() {
            $(".dropdown-menu", this).stop( true, true ).slideDown("fast");
            $(this).toggleClass("open");        
        },
        function() {
            $(".dropdown-menu", this).stop( true, true ).slideUp("fast");
            $(this).toggleClass("open");       
        }
    );
});
</script>
</body>
</html>
