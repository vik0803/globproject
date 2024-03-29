<!DOCTYPE html>
<html lang="en" ng-app="app">
<head>
	<meta charset="utf-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<title>GlobProject - Manager Project</title>

	@if(Config::get('app.debug'))
		<link href="{{ asset('build/css/app.css') }}" rel="stylesheet" />
		<link href="{{ asset('build/css/components.css') }}" rel="stylesheet" />
		<link href="{{ asset('build/css/flaticon.css') }}" rel="stylesheet" />
		<link href="{{ asset('build/css/font-awesome.css') }}" rel="stylesheet" />
	@else
		<link href="{{ elixir('css/all.css') }}" rel="stylesheet" />
	@endif

	<!-- Fonts -->
	<link href='//fonts.googleapis.com/css?family=Roboto:400,300' rel='stylesheet' type='text/css'>

	<!-- HTML5 shim and Respond.js for IE8 support of HTML5 elements and media queries -->
	<!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
	<!--[if lt IE 9]>
		<script src="https://oss.maxcdn.com/html5shiv/3.7.2/html5shiv.min.js"></script>
		<script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
	<![endif]-->
</head>
<body>
	<nav class="navbar navbar-default">
		<div class="container-fluid">
			<div class="navbar-header">
				<button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#navbar">
					<span class="sr-only">Toggle Navigation</span>
					<span class="icon-bar"></span>
					<span class="icon-bar"></span>
					<span class="icon-bar"></span>
				</button>
				<a class="navbar-brand" href="#">GlobProject</a>
			</div>

			<div class="collapse navbar-collapse" id="navbar">
				<ul class="nav navbar-nav">
					<li><a href="{{ url('#/clients') }}">Clients</a></li>
					<li><a href="{{ url('#/projects') }}">Projects</a></li>
				</ul>
			</div>
		</div>
	</nav>

	<div ng-view></div>

	<!-- Scripts -->
	@if(Config::get('app.debug'))
		<script src="{{ asset('build/js/vendor/jquery.min.js') }}" charset="utf-8"></script>
		<script src="{{ asset('build/js/vendor/angular.min.js') }}" charset="utf-8"></script>
		<script src="{{ asset('build/js/vendor/angular-route.min.js') }}" charset="utf-8"></script>
		<script src="{{ asset('build/js/vendor/angular-resource.min.js') }}" charset="utf-8"></script>
		<script src="{{ asset('build/js/vendor/angular-animate.min.js') }}" charset="utf-8"></script>
		<script src="{{ asset('build/js/vendor/angular-messages.min.js') }}" charset="utf-8"></script>
		<script src="{{ asset('build/js/vendor/query-string.js') }}" charset="utf-8"></script>
		<script src="{{ asset('build/js/vendor/angular-cookies.min.js') }}" charset="utf-8"></script>
		<script src="{{ asset('build/js/vendor/angular-oauth2.min.js') }}" charset="utf-8"></script>
		<script src="{{ asset('build/js/vendor/ui-bootstrap.min.js') }}" charset="utf-8"></script>
		<script src="{{ asset('build/js/vendor/ui-bootstrap-tpls.min.js') }}" charset="utf-8"></script>
		<script src="{{ asset('build/js/vendor/navbar.min.js') }}" charset="utf-8"></script>
		<script src="{{ asset('build/js/vendor/ng-file-upload.min.js') }}" charset="utf-8"></script>


		<script src="{{ asset('build/js/app.js') }}" charset="utf-8"></script>

		<!--Controllers -->
		<script src="{{ asset('build/js/controllers/login.js') }}" charset="utf-8"></script>
		<script src="{{ asset('build/js/controllers/home.js') }}" charset="utf-8"></script>
		<script src="{{ asset('build/js/controllers/client/clientList.js') }}" charset="utf-8"></script>
		<script src="{{ asset('build/js/controllers/client/clientNew.js') }}" charset="utf-8"></script>
		<script src="{{ asset('build/js/controllers/client/clientEdit.js') }}" charset="utf-8"></script>
		<script src="{{ asset('build/js/controllers/client/clientRemove.js') }}" charset="utf-8"></script>

		<script src="{{ asset('build/js/controllers/project/projectList.js') }}" charset="utf-8"></script>
		<script src="{{ asset('build/js/controllers/project/projectNew.js') }}" charset="utf-8"></script>
		<script src="{{ asset('build/js/controllers/project/projectEdit.js') }}" charset="utf-8"></script>
		<script src="{{ asset('build/js/controllers/project/projectRemove.js') }}" charset="utf-8"></script>

		<script src="{{ asset('build/js/controllers/project-note/projectNoteShow.js') }}" charset="utf-8"></script>
		<script src="{{ asset('build/js/controllers/project-note/projectNoteList.js') }}" charset="utf-8"></script>
		<script src="{{ asset('build/js/controllers/project-note/projectNoteNew.js') }}" charset="utf-8"></script>
		<script src="{{ asset('build/js/controllers/project-note/projectNoteEdit.js') }}" charset="utf-8"></script>
		<script src="{{ asset('build/js/controllers/project-note/projectNoteRemove.js') }}" charset="utf-8"></script>


		<script src="{{ asset('build/js/controllers/project-file/projectFileList.js') }}" charset="utf-8"></script>
		<script src="{{ asset('build/js/controllers/project-file/projectFileNew.js') }}" charset="utf-8"></script>
		<script src="{{ asset('build/js/controllers/project-file/projectFileEdit.js') }}" charset="utf-8"></script>
		<script src="{{ asset('build/js/controllers/project-file/projectFileRemove.js') }}" charset="utf-8"></script>

		<!--Services -->
		<script src="{{ asset('build/js/services/urls.js') }}" charset="utf-8"></script>
		<script src="{{ asset('build/js/services/user.js') }}" charset="utf-8"></script>
		<script src="{{ asset('build/js/services/client.js') }}" charset="utf-8"></script>
		<script src="{{ asset('build/js/services/project.js') }}" charset="utf-8"></script>
		<script src="{{ asset('build/js/services/projectNote.js') }}" charset="utf-8"></script>

		<!--Filter -->
		<script src="{{ asset('build/js/filters/dateBr.js') }}" charset="utf-8"></script>

	@else
		<script src="{{ elixir('js/all.js') }}" charset="utf-8"></script>
	@endif
</body>
</html>
