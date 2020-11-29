<!DOCTYPE html>
<html>
    
<head>
	<title>Đăng nhập hệ thống</title>
	<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/css/bootstrap.min.css" integrity="sha384-MCw98/SFnGE8fJT3GXwEOngsV7Zt27NXFoaoApmYm81iuXoPkFOJwJ8ERdknLPMO" crossorigin="anonymous">
	<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
	<link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.6.1/css/all.css" integrity="sha384-gfdkjb5BdAXd+lj+gudLWI+BXq4IuLW5IT+brZEZsLFm++aCMlF1V92rMkPaX4PP" crossorigin="anonymous">
    <link rel="stylesheet" href="../layout/assets/dest/css/login.css">
    <script type="text/javascript" src="https://itexpress.vn/js/noel.js"></script>
    
</head>
<!--Coded with love by Mutiullah Samim-->
<body>
	<div class="container h-100">
		<div class="d-flex justify-content-center h-100">
			<div class="user_card">
				<div class="d-flex justify-content-center">
				@if(Session::has('errors'))
				{{Session::get('errors')}}
				@endif
				</div>
				<div class="d-flex justify-content-center form_container">
					<form action="dangnhap" method="post">
                    <input type="hidden" name="_token" value="{{ csrf_token() }}">
						<div class="input-group mb-3">
							<div class="input-group-append">
								<span class="input-group-text"><i class="fas fa-user"></i></span>
							</div>
							<input type="text" name="tendn" class="form-control input_user"  placeholder="Tên đăng nhập">
						</div>
						<div class="input-group mb-2">
							<div class="input-group-append">
								<span class="input-group-text"><i class="fas fa-key"></i></span>
							</div>
							<input type="password" name="mk" class="form-control input_pass" placeholder="Mật khẩu">
						</div>
						<div class="form-group">
							<div class="custom-control custom-checkbox">
								<input type="checkbox" class="custom-control-input" id="customControlInline">
								<label class="custom-control-label" for="customControlInline">Ghi nhớ đăng nhập</label>
							</div>
						</div>
							<div class="d-flex justify-content-center mt-3 login_container">
				 	<button type="submit" name="button" class="btn login_btn">Đăng nhập</button>
				   </div>
					</form>
				</div>
		
				<div class="mt-4">
					<div class="d-flex justify-content-center links">
						Bạn chưa có tài khoản ? <a href="dangki" class="ml-2">Đăng kí ngay</a>
					</div>
					<div class="d-flex justify-content-center links">
						<a href="#">Quên mật khẩu ?</a>
					</div>
				</div>
			</div>
		</div>
	</div>
</body>
</html>
