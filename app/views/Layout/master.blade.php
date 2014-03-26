

<!DOCTYPE html>
<html lang="en">

<head>
	<title>
			{{$title}}
	</title>
	<meta charset="utf-8">
	{{HTML::style("css/bootstrap.css")}}
	{{HTML::style("css/reset.css")}}
	{{HTML::style("css/layout.css")}}
	{{HTML::style("css/style.css" )}}

	
	
	@yield('scripts')
	
	<script type="text/javascript" src="js/jquery-1.4.2.js" ></script>
	<script type="text/javascript" src="js/bootstrap.min.js" ></script>
	
	<script type="text/javascript" src="js/cufon-yui.js"></script>
	<script type="text/javascript" src="js/cufon-replace.js"></script>
	<script type="text/javascript" src="js/Myriad_Pro_400.font.js"></script>
	<script type="text/javascript" src="js/Myriad_Pro_700.font.js"></script>
	<script type="text/javascript" src="js/Myriad_Pro_600.font.js"></script>
	<!--[if lt IE 9]>
		<script type="text/javascript" src="http://info.template-help.com/files/ie6_warning/ie6_script_other.js"></script>
		<script type="text/javascript" src="js/html5.js"></script>
	<![endif]-->
</head>

<body id="page2">
		<div class="main">
		<!-- header -->
					<div id="header">
							@include('Layout.header')
					</div>

			<div class="ic">More Website Templates at TemplateMonster.com!</div>
		<!-- / header -->


		<!-- content -->

			<section id="content">
					
					@yield('content')
					
			</section>

		<!-- / content -->
		<!-- footer -->

			<footer>
					<div id="footer">
							@include('Layout.footer');
					</div>

			</footer>
		<!-- / footer -->
		</div>
<script type="text/javascript"> Cufon.now(); </script>
</body>
</html>