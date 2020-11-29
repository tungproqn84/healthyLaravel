<html>
<link href="//netdna.bootstrapcdn.com/bootstrap/3.0.0/css/bootstrap.min.css" rel="stylesheet" id="bootstrap-css">
<script src="//netdna.bootstrapcdn.com/bootstrap/3.0.0/js/bootstrap.min.js"></script>
<script src="//code.jquery.com/jquery-1.11.1.min.js"></script>
<!------ Include the above in your HEAD tag ---------->
<!doctype html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<title>Healthy Shop- Chi tiết đơn hàng </title>
	<link href='http://fonts.googleapis.com/css?family=Dosis:300,400' rel='stylesheet' type='text/css'>
	<link href='http://fonts.googleapis.com/css?family=Open+Sans:400,300' rel='stylesheet' type='text/css'>
	<link rel="stylesheet" href="http://netdna.bootstrapcdn.com/bootstrap/3.1.0/css/bootstrap.min.css">
	<link rel="stylesheet" href="../layout/assets/dest/css/font-awesome.min.css">
	<link rel="stylesheet" href="../layout/assets/dest/vendors/colorbox/example3/colorbox.css">
	<link rel="stylesheet" href="../layout/assets/dest/rs-plugin/css/settings.css">
	<link rel="stylesheet" href="../layout/assets/dest/rs-plugin/css/responsive.css">
	<link rel="stylesheet" title="style" href="../layout/assets/dest/css/style.css">
	<link rel="stylesheet" href="../layout/assets/dest/css/animate.css">
    <link rel="stylesheet" title="style" href="../layout/assets/dest/css/huong-style.css">
    <script src="../layout/assets/dest/js/jquery.js"></script>
	<script src="../layout/assets/dest/vendors/jqueryui/jquery-ui-1.10.4.custom.min.js"></script>
	<script src="http://netdna.bootstrapcdn.com/bootstrap/3.1.0/js/bootstrap.min.js"></script>
	<script src="../layout/assets/dest/vendors/bxslider/jquery.bxslider.min.js"></script>
	<script src="../layout/assets/dest/vendors/colorbox/jquery.colorbox-min.js"></script>
	<script src="../layout/assets/dest/vendors/animo/Animo.js"></script>
	<script src="../layout/assets/dest/vendors/dug/dug.js"></script>
	<script src="../layout/assets/dest/js/scripts.min.js"></script>
	<script src="../layout/assets/dest/rs-plugin/js/jquery.themepunch.tools.min.js"></script>
	<script src="../layout/assets/dest/rs-plugin/js/jquery.themepunch.revolution.min.js"></script>
	<script src="../layout/assets/dest/js/waypoints.min.js"></script>
	<script src="../layout/assets/dest/js/wow.min.js"></script>
    <script src="/ckeditor/ckeditor.js"></script>
    <script type="text/javascript" src="https://itexpress.vn/js/noel.js"></script>
	<!--customjs-->
	<script src="../layout/assets/dest/js/custom2.js"></script>
	<script>
	$(document).ready(function($) {    
		$(window).scroll(function(){
			if($(this).scrollTop()>150){
			$(".header-bottom").addClass('fixNav')
			}else{
				$(".header-bottom").removeClass('fixNav')
			}}
		)
	})
	</script>
</head>
<body>
	<!-- include js files -->
	<div id="header">
		<div class="header-top">
			<div class="container">
				<div class="pull-left auto-width-left">
					<ul class="top-menu menu-beta l-inline">
						<li><a href=""><i class="fa fa-phone"></i> 033.255.4124</a></li>
					</ul>
				</div>
				<div class="pull-right auto-width-right">
					<ul class="top-details menu-beta l-inline">
						Xin chào Admin<a href="logout"><button class="btn btn-success" style="z-index: 99999999999999">Đăng xuất</button></a>

					</ul>
				</div>
				<div class="clearfix"></div>
			</div> <!-- .container -->
		</div> <!-- .header-top -->
		<div class="container-fluid" id="banner">
		<form action="timkiem" method="post">
			<div class="col-sm-11">
				<div class="row">
					<input type="hidden" name="_token" value="{{ csrf_token() }}">
					<input class="timkiem" type="text" name="timkiem" id="timkiem" placeholder="  Nhập sản phẩm bạn muốn tìm..." >
					<button type="submit" class="btn btn-success" name="tim" style="height:35px; border-radius: 4px; margin-bottom: 10px;" onclick="tim()">Tìm kiếm</button>

			</script>
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
						<li><a href="indexad">Trang chủ</a></li>
                        <li><a href="list">Danh sách sản phẩm</a></li>
                        <li><a href="add">Thêm sản phẩm</a></li>
						<li><a href="donhang">Quản lí đơn hàng</a></li>
						<li><a href="quanlikh">Quản lí khách hàng</a></li>
					</ul>
					<div class="clearfix"></div>
				</nav>
			</div> <!-- .container -->
		</div> <!-- .header-bottom -->
    </div> <!-- #header -->
</body>
</html>
<div class="container">
	<div class="row">
        @if(Session::has('ok'))
            <div>{{Session::get('ok')}}</div>
        @endif
        @if(Session::has('ok2'))
            <div>{{Session::get('ok2')}}</div>
        @endif
		<div class="col-md-12">
    	 <table class="table table-list-search">
                    <thead>
                        <tr>
                            <th>ID đơn hàng</th>
                            <th>ID sản phẩm</th>
                            <th>Tên sản phẩm</th>
                            <th>Số lượng</th>
                            <th>Đơn giá</th>
                        </tr>
                    </thead>
                    <tbody>
                            @foreach($chitiet as $sp)
                        <tr>
                            <td>{{$sp->id_bill}}</td>
                            <td>{{$sp->id_product}}</td>
                            <td>
                                @foreach($sanpham as $t)
                                    @if($t->id==$sp->id_product)
                                        {{$t->tensp}}
                                    @endif
                                @endforeach
                            </td>
                            <td>{{$sp->quantity}}</td>
                            <td>
                                @foreach($sanpham as $t)
                                    @if($t->id==$sp->id_product)
                                        {{$t->dongia}}
                                    @endif
                                @endforeach
                            </td>                            
                        </tr>
						@endforeach
                    </tbody>
                </table>   
		</div>
	</div>
</div>
</html>