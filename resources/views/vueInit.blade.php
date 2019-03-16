<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	  <meta name="csrf-token" content="{{ csrf_token() }}">

	<title>Calificapp</title>
</head>
<body>
     <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.0.10/css/all.css" integrity="sha384-+d0P83n9kaQMCwj8F4RJB66tzIwOKmrdb46+porD/OvrJ+37WqIM7UoBtwHO6Nlg" crossorigin="anonymous">
	 <link href='https://fonts.googleapis.com/css?family=Roboto:300,400,500,700|Material+Icons' rel="stylesheet">

	<div id="app" ></div>


<script type="text/javascript" src="{{ asset('./js/app.js') }}" ></script>

</body>
</html>