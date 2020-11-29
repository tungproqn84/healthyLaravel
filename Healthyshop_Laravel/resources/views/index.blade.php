@extends('master')
@section('content')
<div class="fullwidthbanner-container">{{Session::get('name')}}
	<div class="fullwidthbanner">
		<div class="bannercontainer" >
	    <div class="banner" >
				<ul>
					@foreach($slide as $sl)
					<!-- THE FIRST SLIDE -->
					<li data-transition="boxfade" data-slotamount="20" class="active-revslide" style="width: 80%; height: 250px; overflow: hidden; z-index: 18; visibility: hidden; opacity: 0; margin-top: 20px;">
		            <div class="slotholder" style="width:80%;height:100%; margin-left: 20%" data-duration="undefined" data-zoomstart="undefined" data-zoomend="undefined" data-rotationstart="undefined" data-rotationend="undefined" data-ease="undefined" data-bgpositionend="undefined" data-bgposition="undefined" data-kenburns="undefined" data-easeme="undefined" data-bgfit="undefined" data-bgfitend="undefined" data-owidth="undefined" data-oheight="undefined">
									<div class="tp-bgimg defaultimg" data-lazyload="undefined" data-bgfit="cover" data-bgposition="center center" data-bgrepeat="no-repeat" data-lazydone="undefined" src="{{$sl->image}}" data-src="{{$sl->image}}" style="background-color: rgba(0, 0, 0, 0); background-repeat: no-repeat; background-image: url('{{$sl->image}}'); background-size: cover; background-position: center center; width: 80%; height: 100%; opacity: 1; visibility: inherit;">
									</div>
								</div>
		        </li>
					@endforeach()
				</ul>
			</div>
		</div>
		<div class="tp-bannertimer"></div>
	</div>
	</div>
	<!--slider-->
	</div>
	<div class="container">
		<div id="content" class="space-top-none">
			<div class="main-content">
				<div class="space60">&nbsp;</div>
				<div class="row">
					<div class="col-sm-12">
						<div class="beta-products-list">
							<h4>Sản phẩm </h4>
							<div class="beta-products-details">
							<!-- @isset($sp)
									{{$ds=$sp}}
							@else
									{{$ds=$sp}}
							@endisset -->
								@if(count($sp)==0)
								<p class="pull-left">Không tìm thấy sản phẩm nào. </p>
								@else
								<p class="pull-left">Tổng cộng: {{count($sp)}}</p>
								@endif
								<div class="clearfix"></div>
							</div>
							<div class="row">
								@foreach($sp as $spm)
								<div class="col-sm-3">
									<div class="single-item">
										<div class="single-item-header">
											<a href="{{route('chitietsp',$spm->id)}}"><img src="{{$spm->image}}" alt="" height="250px"></a>
										</div>
										<div class="single-item-body">
											<p class="single-item-title">{{$spm->tensp}}</p>
											<p class="single-item-price">
												<span>{{number_format($spm->dongia)}} VND</span>
											</p>
										</div>
										<div class="single-item-caption">
											<a class="add-to-cart pull-left" href="/cart/{{$spm->id}}"><button class="btn btn-success">Đặt mua</button></a>
											<!-- <a class="beta-btn primary" href="{{Route('chitietsp',$spm->id)}}">Details <i class="fa fa-chevron-right"></i></a> -->
											<div class="clearfix"></div>
										</div>
									</div>
								</div>
								@endforeach()
							</div>
							<div class="row">
								{{$sp->links()}}
							</div>
						</div> <!-- .beta-products-list -->

						<div class="space50">&nbsp;</div>

						<div class="beta-products-list">
							<div class="space40">&nbsp;</div>
						</div> <!-- .beta-products-list -->
					</div>
				</div> <!-- end section with sidebar and main content -->


			</div> <!-- .main-content -->
		</div> <!-- #content -->
@endsection
