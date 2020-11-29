<div id="header">
		<div class="header-top">
			<div class="container">
				<div class="pull-right auto-width-right">
					<ul class="top-details menu-beta l-inline">
						 @if(Session::has('tendn'))
								 Xin chào <a href="{{Route('suakh',Session::get('id'))}}">{{Session::get('tendn')}}</a>
								<a href="logout"><button class="btn btn-success" style="z-index: 99999999999999">Đăng xuất</button></a>
						 @else
							<div class="dropdown">
								<a href="../dangki"><button class="btn btn-success">Đăng kí</button></a>
								<a href="../dangnhap"><button class="btn btn-success">Đăng nhập</button></a>
						 	</div>
						@endif
					</ul>
				</div>
				<div class="clearfix"></div>
			</div> <!-- .container -->
		</div> <!-- .header-top -->
		<div class="container-fluid" id="banner">
		<form action="../timkiem" method="post">
			<div class="col-sm-11">
				<div class="row">
					<input type="hidden" name="_token" value="{{ csrf_token() }}">
					<input class="timkiem" type="text" name="timkiem" id="timkiem" placeholder="  Nhập sản phẩm bạn muốn tìm..." >
					<button type="submit" class="btn btn-success" name="tim" style="height:35px; border-radius: 4px; margin-bottom: 10px;" onclick="tim()">Tìm kiếm</button>
			</div>
			</div>
      </div>
    </form>
		</div>
		<div class="header-bottom" style="background-color: #0277b8;">
			<div class="container">
				<a class="visible-xs beta-menu-toggle pull-right" href=""><span class='beta-menu-toggle-text'>Menu</span> <i class="fa fa-bars"></i></a>
				<div class="visible-xs clearfix"></div>
				<nav class="main-menu">
					<ul class="l-inline ov">
						<li><a href="index">Trang chủ</a></li>
						<li><a href="a">Danh mục</a>
							<ul class="sub-menu">
								@foreach($loaisp as $sp)
								<li><a href="{{ route('loaisanpham',$sp->id) }}">{{ $sp->name }}</a></li>
								@endforeach
							</ul>
						</li>
						<li><a href="about.html">Giới thiệu</a></li>
						<li><a href="contacts.html">Liên hệ</a></li>
						@if(Session::has('tendn'))
						<li><a href="{{Route('cart')}}">Giỏ hàng</a></li>
							@else
								<li>
									<div class="dropdown">
										<button class="btn btn-primary dropdown-toggle" type="button" data-toggle="dropdown">Tài khoản
										<span class="caret"></span></button>
										<ul class="dropdown-menu">
										<li><a href="../dangki">Đăng kí</a></li>
										<li><a href="../dangnhap">Đăng nhập</a></li>
										</ul>
									</div>
								</li>
							@endif
					</ul>
					<div class="clearfix"></div>
				</nav>

			</div> <!-- .container -->
		</div> <!-- .header-bottom -->
	</div> <!-- #header -->
