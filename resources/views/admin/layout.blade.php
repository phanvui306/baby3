<!DOCTYPE html>
<html lang="en" ng-app="myApp">
<head>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<link href='https://unpkg.com/boxicons@2.0.9/css/boxicons.min.css' rel='stylesheet'>
    <script src="https://ajax.googleapis.com/ajax/libs/angularjs/1.8.2/angular.min.js"></script>

	<link rel="stylesheet" href="{{ asset('css/style_admin.css') }}">
	<title>Admin</title>
</head>
<body>
	
	<!-- SIDEBAR -->
	@include('admin.sidebar')
	<!-- SIDEBAR -->

	<!-- NAVBAR -->
	@include('admin.navbar')
	
		<!-- NAVBAR -->
    @yield('content')

		<!-- MAIN -->
		
	<!-- NAVBAR -->

	<script src="https://cdn.jsdelivr.net/npm/apexcharts"></script>
	<script src="{{ asset('js/script.js') }}"></script>
</body>
</html>