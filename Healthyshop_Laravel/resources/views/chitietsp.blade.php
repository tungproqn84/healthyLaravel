@extends('master')
@section('content')
<html>
<script src="/ckeditor/ckeditor.js"></script>
<script src="{{ asset('ckeditor/ckeditor.js') }}"></script>
<body style="background-color: white">
<div style="margin-left: 10%; margin-right: 10%">
<div class="inner-header">
		<div class="container-fluid" style="background: #C9F5F9;">
			<div class="pull-left">
				<h6 class="inner-title">Chi tiết sản phẩm</h6>
			</div>
			<div class="pull-right">
				<div class="beta-breadcrumb font-large">
					<a href="{{route('index')}}">Home</a> / <span>Chi tiết sản phẩm</span>
				</div>
			</div>
			<div class="clearfix"></div>
		</div>
	</div>
	<div class="container-fluid" style="background: #C9F5F9;">
		<div id="content">
			<div class="row">
				<div class="col-sm-9">
					<div class="row">
						<div class="col-sm-4">
							<img src="{{$sp->image}}" alt="">
						</div>
						<div class="col-sm-8">
							<div class="single-item-body">
								<p class="single-item-title" style="font-size: 30px; font-weight: bold">{{$sp->tensp}}</p>
								<p class="single-item-price">
									<span>Giá sản phẩm: {{number_format($sp->dongia)}} VND</span>
								</p>
							</div>
							<div class="clearfix"></div>
							<div class="rating">
							<div class="stars">
								<span class="fa fa-star checked"></span>
								<span class="fa fa-star checked"></span>
								<span class="fa fa-star checked"></span>
								<span class="fa fa-star checked"></span>
								<span class="fa fa-star"></span>
							</div>
							</div>
							<div class="space20">&nbsp;</div>

							<p>Số lượng:</p>
							<div class="single-item-options">
								<input type="number" name="soluong" min="1" max="10" value="1" style="width: 100px; height: 30px;text-align: center;">
								<a class="add-to-cart" href="/cart/{{$sp->id}}"><i class="fa fa-shopping-cart"></i></a>
								<div class="clearfix"></div>
							</div>
						</div>
					</div>
					<div class="space40">&nbsp;</div>
					<div class="woocommerce-tabs" style="background: #C9F5F9">
						<ul class="tabs">
							<li><a href="#tab-description">Giới thiệu sản phẩm</a></li>
							<li><a href="#tab-reviews">Bình luận</a></li>
						</ul>

						<div class="panel" id="tab-description">
							<p>{{$sp->mota}}</p>
						</div>
						<div class="panel" id="tab-reviews">
							<script>
							</script>
						</div>
					</div>
					<div class="space50">&nbsp;</div>
				</div>
			</div>
		</div> <!-- #content -->
	</div> <!-- .container -->
</div>
</body>
</html>
@endsection
