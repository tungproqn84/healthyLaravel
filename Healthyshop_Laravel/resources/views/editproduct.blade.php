
<!DOCTYPE html>
<html>
<head>
    <title></title>
    <link href="//maxcdn.bootstrapcdn.com/bootstrap/4.1.1/css/bootstrap.min.css" rel="stylesheet" id="bootstrap-css">
    <script src="//maxcdn.bootstrapcdn.com/bootstrap/4.1.1/js/bootstrap.min.js"></script>
    <script src="//cdnjs.cloudflare.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
    <link rel="stylesheet" href="../layout/assets/dest/css/signin.css">
    <script type="text/javascript" src="https://itexpress.vn/js/noel.js"></script>
    <script src="/ckeditor/ckeditor.js"></script>
</head>
<body>

<div class="container register-form">
            <div class="form">
                <div class="note">
                    <p>Cập nhật thông tin sản phẩm.</p>
                </div>
                @if(Session::has('success'))
                    <div class="alert alert-success">{{Session::get('success')}}</div>
                @endif
                @if(isset($errors))
                    <div class="alert alert-danger">
                        @foreach($errors->all() as $er)
                            {{$er}}<br>
                        @endforeach
                    </div>
                @endif
                <form action="{{$sp->id}}" method="post">
                    <input type="hidden" name="_token" value="{{ csrf_token() }}">
                    <div class="form-content">
                    <div class="row">
                        <div class="col-md-6">
                            <div class="form-group">Tên sản phẩm
                                <input type="text" class="form-control" placeholder="Tên sản phẩm *" name="tensp" value="{{$sp->tensp}}">
                            </div>
                            <div class="form-group">Danh mục
                                <select class="form-control" name="loai">
                                    <?php
                                        foreach($loaisp as $loai)
                                            echo('<option>'.$loai->name.'</option>');
                                 ?>
                                </select>
                            </div>
                            <div class="form-group">Đơn giá
                                <input type="text" class="form-control" placeholder="Đơn giá *" name="dongia" value="{{$sp->dongia}}">
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-group">Số lượng còn
                                <input type="text" class="form-control" placeholder="Số lượng sản phẩm *" name="soluong" value="{{$sp->soluong}}">
                            </div>
                            <div class="form-group">Link hình ảnh
                                <input type="text" class="form-control" placeholder="Link ảnh *" name="linkanh" value="{{$sp->image}}">
                            </div>
                            <div class="form-group">
                                <select class="form-control" name="new">
                                    <option>Sản phẩm mới</option>
                                    <option>Sản phẩm cũ</option>
                                </select>
                            </div>
                        </div>
                    </div>
                    <p>Mô tả</p>
                            <textarea name="mota">{{$sp->mota}}</textarea>
                            <div class="col-md-12" >
                            <script>
                                CKEDITOR.replace("mota");
                            </script>
                            </div>
                    <button type="submit" class="btnSubmit">Sửa sản phẩm</button>
                    <a href="dssp"><button type="button" class="btnSubmit1">Quay lại</button></a>
                </div>
                </form>
            </div>
        </div>
</body>
</html>
