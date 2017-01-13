<!doctype html>
<html lang="en">
	<head>
	  <meta charset="utf-8">

	  <title>ورود</title>
	  <meta name="description" content="ورود به سایت">
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
	  <link rel="stylesheet" href="styles/login.css">
	  <!-- include the BotDetect layout stylesheet -->
	  <link href="{{ captcha_layout_stylesheet_url() }}" type="text/css" rel="stylesheet">
	</head>

	<body>
	  <div class="nav_bar">
	  	<span class="material-icons">person</span>
	  	<div class="nav_bar_empty_space"></div>
	  	<div class="nav_bar_text">ceitgames</div>
	  </div>
	  <div class="card_view">
	  	<div class="login_container">
	  		<form role="form" method="POST" action="{{ url('/login') }}">
	  			{{ csrf_field() }}
		  		<div class="card_title">ورود</div>
		  		<div class="textfield_container">
		  			<input class="textfield" placeholder="ایمیل یا شماره تلفن" type="email" id="email" name="email" value="{{ old('email') }}" required>
		  			<span class="material-icons textfield_icon">mail</span>
	  			</div>
		  		<div class="textfield_container">
		  			<input id="password" class="textfield" placeholder="رمز عبور" type="password" name="password" required>
		  			<span class="material-icons textfield_icon">lock</span>
	  			</div>
	  			@if ($errors->has('email'))
		  			<span class="help-block">
		  				<strong>{{ $errors->first('email') }}</strong>
		  			</span>
	  			@endif
	  			<div class="textfield_container">
		  			{!! captcha_image_html('LoginCaptcha') !!}
                	<input type="text" class="textfield" name="CaptchaCode" id="CaptchaCode" placeholder="کد امنیتی" required>
		  			<span class="material-icons textfield_icon">security</span>
	  			</div>
	  			@if ($errors->has('CaptchaCode'))
		  			<span class="help-block">
		  				<strong>{{ $errors->first('CaptchaCode') }}</strong>
		  			</span>
	  			@endif
                <div class="checkbox_container">
		  			<input type="checkbox" id="c1" name="remember" {{ old('remember') ? 'checked' : ''}}/>
					<label for="c1" class="label">
						مرا به یاد داشته باش<span></span>
					</label>
				</div>
				<button class="button red" type="submit">ورود</button>
  			</form>
	  	</div>
	  	<div class="register_link_container">حساب کاربری ندارید؟ 
	  		<a href="register">ثبت نام کنید</a>
	  	</div>
	  </div>
	  	  <!-- <strong>{{ dd($errors) }}</strong> -->

	  	<!-- Scripts -->
    	<script src="/js/app.js"></script>
	</body>
	
</html>
