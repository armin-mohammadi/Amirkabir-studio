<!doctype html>

<html lang="fa">
	<head>
	  <meta charset="utf-8">

	  <title>ثبت نام</title>
	  <meta name="description" content="ثبت نام در سایت">
	  <meta name="author" content="9231017">
		<!-- CSRF Token -->
		<meta name="csrf-token" content="{{ csrf_token() }}">

		<!-- Styles -->
		<!-- <link href="/css/app.css" rel="stylesheet"> -->

		<!-- Scripts -->
		<script>
		    window.Laravel = <?php echo json_encode([
		        'csrfToken' => csrf_token(),
		    ]); ?>
		</script>
	  <link rel="stylesheet" href="styles/hw2-global.css">
	  <link rel="stylesheet" href="styles/register.css">
	</head>

	<body>
		<div class="nav_bar">
	  		<span class="material-icons">person</span>
	  		<div class="nav_bar_empty_space"></div>
	  		<div class="nav_bar_text">ceitgames</div>
	  	</div>
	  	<div class="card_view">
	  		<div class="register_container">
	  		<div class="card_title">ثبت نام</div>	
	  		<form role="form" method="POST" action="{{ url('/register') }}">
	  			{{ csrf_field() }}
		  		<div class="textfield_container">
		  			<input placeholder="نام کاربری" type="text" id="name" name="name" required>
		  			<span class="material-icons textfield_icon">person</span>
	  			</div>
		  		<div class="textfield_container">
		  			<input class="textfield" placeholder="ایمیل" type="email" id="email" name="email" required>
		  			<span class="material-icons textfield_icon">mail</span>
	  			</div>
	  			@if ($errors->has('email'))
		  			<span class="help-block">
		  				<strong>{{ $errors->first('email') }}</strong>
		  			</span>
	  			@endif
	  			<div class="textfield_container">
		  			<input class="textfield" placeholder="رمز عبور" type="password" id="password" name="password" required>
		  			<span class="material-icons textfield_icon">lock</span>
	  			</div>
	  			@if ($errors->has('password'))
		  			<span class="help-block">
		  				<strong>{{ $errors->first('password') }}</strong>
		  			</span>
	  			@endif
	  			<div class="textfield_container">
		  			<input class="textfield" placeholder="تکرار رمز عبور" type="password" id="password-confirm" name="password_confirmation" required>
		  			<span class="material-icons textfield_icon">security</span>
	  			</div>
  				<button class="button blue" type="submit">ثبت نام</button>
  			</form>
  			</div>
	  	</div>
	  	<!-- <strong>{{ dd($errors) }}</strong> -->
	  	<!-- Scripts -->
    	<script src="/js/app.js"></script>
	</body>

</html>