<?php
namespace App\Http\Controllers;
use Illuminate\Http\Request;
use App\slide;
use App\product;
use App\producttype;
use App\User;
use App\bills;
use App\billdetail;
use Countable;
use Cart;
use Illuminate\Support\Facades\Session;
// use Symfony\Component\HttpFoundation\Session\Session;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash as FacadesHash;
use Illuminate\Bus\Queueable;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;
class mycontroller extends Controller
{
    public function index()
    {
        $slide=slide::all();
        $sp=product::paginate(8);
        $loaisp=producttype::all();
        return view('index', compact('slide', 'sp', 'loaisp'));
    }
    //login
    public function getlogin()
    {
        return view('login');
    }
    public function postlogin(Request $rq)
    {
        $this->validate(
            $rq,
            ['tendn'=>'required','mk'=>'required'],
            ['tendn.required'=>'Tên đăng nhập còn trống','mk.required'=>'Mật khẩu còn trống']
        );
        $xacnhan= array('username'=>$rq->tendn,'password'=>$rq->mk);
        if (($rq->tendn)=='admin') {
            Session::put('tendn', 'Admin');
            return redirect('indexad');
        } else {
            if (Auth::attempt($xacnhan)) {
                $user=User::where('username', $rq->tendn)->first();
                Session::put('tendn', $user->hoten);
                Session::put('id', $user->id);
                return redirect(Route('index'));
            } else {
                return redirect()->back()->with('notice', "Sai tên đăng nhập hoặc mật khẩu");
            }
        }
    }
    //endlogin
    //logout
    public function logout()
    {
        Session::flush();
        return redirect(Route('login'));
    }
    //endlogout
    //signin
    public function getsignin()
    {
        return view('signin');
    }
    public function postsignin(Request $rq)
    {
        $this->validate(
            $rq,
            ['tendn'=>'required||unique:users,username','sdt'=>'required||unique:users,sdt','tenkh'=>'required','diachi'=>'required','cfmk'=>'required|same:mk'],
            ['tendn.unique'=>'Tên đăng nhập đã tồn tại','sdt.unique'=>'Số điện thoại đã được đăng kí','tenkh.required'=>'Tên của bạn còn trống','sdt.required'=>'Số điện thoại còn trống','diachi.required'=>'Địa chỉ của bạn còn trống','tendn.required'=>'Tên đăng nhập còn trống','cfmk.required'=>'Vui lòng xác nhận mật khẩu']
        );
        $user=new User();
        $user->hoten=$rq->tenkh;
        $user->username=$rq->tendn;
        $user->password= FacadesHash::make($rq->mk);
        $user->sdt=$rq->sdt;
        $user->diachi=$rq->diachi;
        $user->save();
        return redirect(Route('login'))->with("thanhcong", "Tài khoản của bạn đã sẵn sàng để sử dụng");
    }
    //endsignin
    public function loaisp($loai)
    {
        $loaisp=product::where('idloai', $loai)->paginate(8);
        $loai=producttype::all();
        return view('loaisp', compact('loaisp', 'loai'));
    }
    public function chitietsp(Request $rq)
    {
        $sp=product::where('id', $rq->id)->first();
        $loaisp=producttype::all();
        return view('chitietsp', compact('sp', 'loaisp'));
    }
    public function addsp()
    {
        $loaisp=producttype::all();
        return view('addproduct', compact('loaisp'));
    }
    public function xladdsp(Request $rq)
    {
        $this->validate(
            $rq,
            ['tensp'=>'required','dongia'=>'required','dongia'=>'required','linkanh'=>'required','mota'=>'required'],
            ['tensp.required'=>'Nhập tên sản phẩm','dongia.required'=>'Nhập đơn giá','linkanh.required'=>'Nhập link ảnh minh họa sản phẩm']
        );
        $tenloai=producttype::all();
        foreach ($tenloai as $ten) {
            $t1=$ten->name;
            $t2=$rq->loai;


            if ($t1==$t2) {
                $idl=$ten->id;
                break;
            } else {
                $idl=0;
            }
        }
        if (($rq->new)=='Sản phẩm mới') {
            $new=1;
        } else {
            $new=0;
        }
        $kt=product::where('tensp', $rq->tensp)->get();
        // printf($kt); die();
        // if(count($kt)>0){
        //     $id=$kt->id;
        //     $slsp=product::find($id);
        //     $sl=$slsp->soluong;
        //     $slsp->soluong=$sl+$rq->soluong;
        //     return redirect()->back()->with('success','Đã cập nhật số lượng sản phẩm');
        // }
        // else
        {
        $newsp=new product();
        $newsp->tensp= $rq->tensp;
        $newsp->idloai=$idl;
        $newsp->mota=$rq->mota;
        $newsp->soluong=$rq->soluong;
        $newsp->dongia=$rq->dongia;
        $newsp->image=$rq->linkanh;
        $newsp->new=$new;
        $newsp->save();
        return redirect()->back()->with('success', 'Đã thêm sản phẩm vào kho hàng');
    }
    }

    //tìm kiếm sản phẩm
    public function timkiem(Request $rq)
    {
        $sp=product::where('tensp', 'like', '%'.$rq->timkiem.'%')->paginate(8);
        if (is_numeric($rq->timkiem)) {
            $sp=product::where('dongia', '<=', $rq->timkiem)->paginate(8);
        }
        $loaisp=producttype::all();
        $slide=slide::all();
        return view('index', compact('sp', 'loaisp', 'slide'));
    }
    public function getcart()
    {
        if (null!==Session::get('tendn')) {
            return view('cart');
        } else {
            return redirect('dangnhap');
        }
    }
    public function postcart($id)
    {
        $product = product::find($id);
        // printf($product); die();
        Cart::add(array('id' => $id, 'name' => $product->tensp, 'qty' => 1, 'price' => $product->dongia,'weight' =>0));
        $cart = Cart::content();
        return view('cart', array('cart' => $cart));
    }
    public function delete($id)
    {
        $rowId= Cart::search(array('id' => $id));
        Cart::remove($rowId);
        return view('cart');
    }
    public function deletecart()
    {
        Cart::destroy();
        return redirect(Route('index'));
    }
    //mua hàng
    public function buy()
    {
        $cart=Cart::content();
        $total=Cart::subtotal();
        $hd= new bills();
        $hd->id_customer=Session::get('id');
        $hd->date_order= now();
        $hd->total=$total;
        $hd->save();
        foreach ($cart as $sp) {
            $idhd=bills::max('id') ;
            $detail= new billdetail();
            $detail->id_bill=$idhd;
            $detail->id_product=$sp->id;
            $detail->quantity=$sp->qty;
            $detail->unit_price=$sp->price;
            $detail->save();
            $product=product::find($detail->id_product);
            $product->soluong=$product->soluong - $detail->quantity;
            $product->save();
        }
        // //gửi mail
        // $user = User::find(Session::get('id'));
        // $email = new UserRegistered($user);
        // Mail::to($user->email)->send($email);
        Cart::destroy();
        return redirect(Route('index'));
    }
    //phần admin

    //trang chủ admin
    public function indexadmin()
    {
        return view('index_admin');
    }
    //danh sách đơn hàng
    public function quanlidonhang()
    {
        $ds=bills::all();
        $tenkh=User::all();
        return view('quanlidonhang', compact('ds', 'tenkh'));
    }
    //chi tiết đơn hàng
    public function chitietdonhang($id)
    {
        $chitiet=billdetail::where('id_bill', $id)->paginate(8);
        $sanpham=product::all();
        return view('chitietdonhang', compact('chitiet', 'sanpham'));
    }
    //xóa đơn hàng
    public function xoadonhang($id)
    {
        $hd=bills::find($id);
        $hd->delete();
        return redirect('donhang');
    }
    //danh sách sản phẩm
    public function getdssp()
    {
        $dssp=product::all();
        $idl=producttype::all();
        return view('dssp', compact('dssp', 'idl'));
    }
    //sửa sản phẩm
    public function getsuasp($id)
    {
        $sp=product::where('id', $id)->first();
        $loaisp=producttype::all();
        return view('editproduct', compact('sp', 'loaisp'));
    }
    public function postsuasp(Request $rq, $id)
    {
        $tenloai=producttype::all();
        foreach ($tenloai as $ten) {
            $t1=$ten->name;
            $t2=$rq->loai;


            if ($t1==$t2) {
                $idl=$ten->id;
                break;
            } else {
                $idl=0;
            }
        }
        if (($rq->new)=='Sản phẩm mới') {
            $new=1;
        } else {
            $new=0;
        }
        $newsp=product::find($id);
        $newsp->tensp= $rq->tensp;
        $newsp->idloai=$idl;
        $newsp->mota=$rq->mota;
        $newsp->soluong=$rq->soluong;
        $newsp->dongia=$rq->dongia;
        $newsp->image=$rq->linkanh;
        $newsp->new=$new;
        $newsp->save();
        return redirect('danhsachsp')->with('ok', 'Đã sửa đổi sản phẩm');
    }
    //xóa sản phẩm
    public function xoasp($id)
    {
        $sp=product::find($id);
        $sp->delete();
        return redirect('danhsachsp')->with('ok2', 'Đã xóa sản phẩm');
    }
    public function xacnhandonhang($id)
    {
        $dh=bills::find($id);
        $dh->status=1;
        $dh->save();
        return redirect('donhang');
    }
    public function quanlikh()
    {
        $tt=User::all();
        return view('quanlikhachhang', compact('tt'));
    }
    public function getsuakh($id)
    {
        $tt=User::find($id);
        return view('editkh', compact('tt'));
    }
    public function postsuakh(Request $rq, $id)
    {
        $thongtin=User::find($id);
        $thongtin->hoten= $rq->name;
        $thongtin->diachi=$rq->diachi;
        $thongtin->sdt=$rq->sdt;
        $thongtin->save();
        return redirect('quanlikh')->with('ok', 'Đã sửa đổi thông tin khách hàng');
    }
    public function xoakh($id)
    {
        $kh=User::find($id);
        $kh->delete();
        return redirect('quanlikh');
    }
}
?>
