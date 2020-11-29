<link href="//maxcdn.bootstrapcdn.com/bootstrap/4.1.1/css/bootstrap.min.css" rel="stylesheet" id="bootstrap-css">
<script src="//maxcdn.bootstrapcdn.com/bootstrap/4.1.1/js/bootstrap.min.js"></script>
<script src="//cdnjs.cloudflare.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
<link rel="stylesheet" href="../layout/assets/dest/css/signin.css">
<script type="text/javascript" src="https://itexpress.vn/js/noel.js"></script>
<div class="container register-form">
            <div class="form">
                <div class="note">
                    <p>Đăng kí tài khoản.</p>
                </div>
                
                @if(isset($errors))
                    <div class="alert alert-danger">
                        @foreach($errors->all() as $er)
                            {{$er}}<br>
                        @endforeach
                    </div>
                @endif
                <form action="dangki" method="post">
                    <input type="hidden" name="_token" value="{{ csrf_token() }}">
                    <div class="form-content">
                    <div class="row">
                        <div class="col-md-6">
                            <div class="form-group">
                                <input type="text" class="form-control" placeholder="Họ tên của bạn *" name="tenkh">
                            </div>
                            <div class="form-group">
                                <input type="text" class="form-control" placeholder="Số điện thoại *" name="sdt">
                            </div>
                            <div class="form-group">
                                <input type="text" class="form-control" placeholder="Địa chỉ liên hệ *" name="diachi">
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-group">
                                <input type="text" class="form-control" placeholder="Tên đăng nhập *" name="tendn">
                            </div>
                            <div class="form-group">
                                <input type="password" class="form-control" placeholder="Mật khẩu *" name="mk">
                            </div>
                            <div class="form-group">
                                <input type="password" class="form-control" placeholder="Xác nhận mật khẩu *" name="cfmk">
                            </div>
                        </div>
                    </div>
                    <button type="submit" class="btnSubmit">Đăng kí ngay</button>
                    <a href="dangnhap"><button type="button" class="btnSubmit1">Quay lại đăng nhập</button></a>
                </div>
                </form>
            </div>
        </div>