<?php
require_once __DIR__ . '/../models/ProductModel.php';
require_once __DIR__ . '/../models/User.php';
require_once __DIR__ . '/../models/CommentModel.php';
require_once __DIR__ . '/../models/CategoryModel.php';
class Nhap_kyController {
    public $productModel;
    public $userModel;
    public $commentModel;
    public $categoryModel;

    public function __construct(){
        $this->productModel  = new ProductModel();
        $this->userModel     = new UserModel();
        $this->commentModel  = new CommentModel();
        $this->categoryModel = new CategoryModel();
    }

   

  public function dangnhap(){
    session_start();
    $loi = "";
    if(isset($_POST['dangnhap'])){
        $email    = trim($_POST['email']);
        $password = trim($_POST['password']);

        // Lấy user theo email
        $user = $this->userModel->findByEmail($email);

        if($user){
            // Kiểm tra tài khoản đã kích hoạt (status = 1)
            if(isset($user->status) && $user->status != 1){
                $loi = "Tài khoản của bạn đã bị khóa. Vui lòng liên hệ quản trị.";
            } else {
                // Kiểm tra mật khẩu
                if(password_verify($password, $user->password)){
                    // Lưu thông tin user vào session
                    $_SESSION['user'] = [
                        'id'   => $user->id,
                        'name' => $user->name,
                        'role' => $user->role
                    ];
                    // Chuyển hướng theo role
                    if($user->role == 0){
                        header("Location:?act=trangchu_admin");
                        exit;
                    } else {
                        header("Location:?act=trangchu");
                        exit;
                    }
                } else {
                    $loi = "Mật khẩu không đúng.";
                }
            }
        } else {
            $loi = "Email không tồn tại.";
        }
    }
    include "views/dangky_dangnhap/dangnhap.php";
}



    public function dangky(){
    $loi = "";
    $thanhcong = "";
    $user = new User();
    if (isset($_POST['dangky'])) {
        $user->name = $_POST['name'];
        $user->email = $_POST['email'];
        $user->address = $_POST['address'];
        $user->number = $_POST['number'];
        // Mã hóa mật khẩu trước khi lưu
        $user->password = password_hash($_POST['password'], PASSWORD_DEFAULT);
        $user->role = (int)1;

        if (empty($user->name) || empty($user->address) || empty($user->number) || empty($_POST['password']) || empty($user->email)) {
            $loi = "Kiểm tra lại các trường dữ liệu";
        } else {
            $ketqua = $this->userModel->create($user);
            if ($ketqua === 1) {
                $thanhcong = "Đăng ký thành công";
            } else {
                $loi = "Đăng ký thất bại";
            }
        }
    }

    include "views/dangky_dangnhap/dangky.php";
}


    public function dangxuat(){
        session_start();
        session_destroy();
        header("Location: ?act=dangnhap"); 
        exit;
    }
}
?>