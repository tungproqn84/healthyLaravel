
<!DOCTYPE html>
<html>
<head>
    <title>Healthy Shop- Thêm sản phẩm</title>
    <link href="//maxcdn.bootstrapcdn.com/bootstrap/4.1.1/css/bootstrap.min.css" rel="stylesheet" id="bootstrap-css">
    <script src="//maxcdn.bootstrapcdn.com/bootstrap/4.1.1/js/bootstrap.min.js"></script>
    <script src="//cdnjs.cloudflare.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
    <link rel="stylesheet" href="../layout/assets/dest/css/signin.css">
    <script type="text/javascript" src="https://itexpress.vn/js/noel.js"></script>
    <script src="/ckeditor/ckeditor.js"></script>
</head>
<body>

<div class="container-fluid ">
    
        <div class="form">
            <div class="note">
                <p>Sửa đổi thông tin khách hàng.</p>
            </div>
            <form action="../suakh/{{$tt->id}}" method="post">
                <input type="hidden" name="_token" value="{{ csrf_token() }}">
                <div class="form-content">
                <div class="row">
                    <div class="col-md-6">
                        <div class="form-group">Họ tên khách hàng
                            <input type="text" class="form-control" value="{{$tt->hoten}}" name="name">
                        </div>
                        <div class="form-group">Tên đăng nhập
                            <input type="text" class="form-control" value="{{$tt->username}}" name="tendn" readonly>
                        </div>
                        <div class="form-group">Số điện thoại
                            <input type="text" class="form-control" value="{{$tt->sdt}}" name="sdt">
                        </div>
                        <div class="form-group">Địa chỉ
                            <input type="text" class="form-control" value="{{$tt->diachi}}" name="diachi">
                        </div>
                    </div>
                </div>
            </div>
                <button type="submit" class="btnSubmit">Cập nhật thông tin</button>
                <a href="dssp"><button type="button" class="btnSubmit1">Quay lại</button></a>
            </div>
            </form>
        </div>
    
</div>
</body>
</html>
