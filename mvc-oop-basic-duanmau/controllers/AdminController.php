<?php 

require_once __DIR__ . '/../models/ProductModel.php';
require_once __DIR__ . '/../models/User.php';
require_once __DIR__ . '/../models/CommentModel.php';
require_once __DIR__ . '/../models/CategoryModel.php';

class AdminController {
    public $productModel;
    public $userModel;
    public $commentModel;
    public $categoryModel;

    public function __construct() {
        $this->productModel  = new ProductModel();
        $this->userModel     = new UserModel();
        $this->commentModel  = new CommentModel();
        $this->categoryModel = new CategoryModel();
    }

    public function trangchu_admin() {
        include "views/admin/trangchu_admin.php";
    }

    // Quản lý danh mục
    public function quanly_danhmuc() {
        $danhsach = $this->categoryModel->all();
        $thanhcong = "";
        $loi = "";
        $danhmuc = new Category();

        if (isset($_POST['create_danhmuc'])) {
            $danhmuc->name  = $_POST['name_danhmuc'];
            $danhmuc->date  = date("Y-m-d H:i:s");

            if (empty($danhmuc->name)) {
                $loi = "Kiểm tra lại dữ liệu";
            } else {
                $ketqua = $this->categoryModel->create_danhmuc($danhmuc);
                if ($ketqua === 1) {
                    $thanhcong = "Tạo danh mục thành công";
                    $danhsach = $this->categoryModel->all();
                } else {
                    $loi = "Tạo danh mục thất bại";
                }
            }
        }

        include "views/admin/danhmuc/noidung.php";
    }

    public function create_danhmuc() {
        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            $name = $_POST['name'];
            $this->categoryModel->create_danhmuc($name);
            header('Location: index.php?url=quanly_danhmuc');
            exit;
        }

        include './views/admin/danhmuc/create.php';
    }

    public function delete_danhmuc($id) {
        $danhmuc = $this->categoryModel->find($id);
        $thongbao = "";
        if (!$danhmuc) {
            $thongbao = "Danh mục không tồn tại!";
        } else if ($danhmuc->sum > 0) {
            $thongbao = "Không thể xóa khi danh mục vẫn còn sản phẩm.";
        } else {
            $ketqua = $this->categoryModel->delete_danhmuc($id);
            if ($ketqua === 1) {
                header("Location: ?act=danhmuc");
                exit;
            } else {
                $thongbao = "Xóa danh mục thất bại.";
            }
        }

        $danhsach = $this->categoryModel->all();
        include "views/admin/danhmuc/noidung.php";
    }

    public function update_danhmuc($id) {
        $ten_danhmuc_cu = $this->categoryModel->find($id);
        $thanhcong = "";
        $loi = "";
        $danhmuc = new Category();

        if (isset($_POST['update_danhmuc'])) {
            $danhmuc->id = $id;
            $danhmuc->name = $_POST['name_danhmuc'];

            if (empty($danhmuc->name)) {
                $loi = "Kiểm tra lại dữ liệu";
            } else {
                $ketqua = $this->categoryModel->update_danhmuc($danhmuc);
                if ($ketqua > 0) {
                    $thanhcong = "Sửa thành công tên danh mục";
                }
            }
        }

        include "views/admin/danhmuc/update.php";
    }

    // Quản lý tài khoản
    public function quanly_taikhoan() {
        $err = "";
        $danhsach = $this->userModel->all();
        $ketqua = [];

        if (isset($_POST['tim'])) {
            $user = trim($_POST['user']);
            if ($user === "") {
                $err = "Bạn chưa nhập tên hoặc email để tìm kiếm";
            } else {
                foreach ($danhsach as $tt) {
                    if (stripos($tt->email, $user) !== false || stripos($tt->name, $user) !== false) {
                        $ketqua[] = $tt;
                    }
                }
                if (empty($ketqua)) {
                    $err = "Không tìm thấy tài khoản phù hợp";
                } else {
                    $danhsach = $ketqua;
                }
            }
        }

        include "views/admin/taikhoan/noidung.php";
    }
public function lock_taikhoan($id) {
    $ketqua = $this->userModel->update_status($id, 0);  // 0 = khóa tài khoản
    header("Location: ?act=taikhoan");
    exit;
}

public function unlock_taikhoan($id) {
    $ketqua = $this->userModel->update_status($id, 1);  // 1 = mở khóa tài khoản
    header("Location: ?act=taikhoan");
    exit;
}
    // Bật/tắt trạng thái tài khoản
    public function toggle_status($id) {
        $user = $this->userModel->find($id);
        if ($user) {
            // Trạng thái: 1 = mở, 0 = đóng
            $user->status = (isset($user->status) && $user->status == 1) ? 0 : 1;
            $this->userModel->update_status($user);
        }
        header("Location: ?act=taikhoan");
        exit;
    }

    // Cập nhật tài khoản
    public function update_taikhoan($id) {
        $loi = "";
        $thanhcong = "";
        $user = $this->userModel->find($id);

        if (isset($_POST['update_user'])) {
            $user->name = $_POST['name'] ?? $user->name;
            $user->email = $_POST['email'] ?? $user->email;
            $user->number = $_POST['number'] ?? $user->number;

            $result = $this->userModel->update($user);

            if ($result) {
                $thanhcong = "Cập nhật tài khoản thành công";
            } else {
                $loi = "Cập nhật tài khoản thất bại";
            }
        }

        if (isset($_POST['change_password'])) {
            $password_old = $_POST['password_old'];
            $password_new = $_POST['password_new'];
            $password_confirm = $_POST['password_confirm'];

            if (empty($password_old) || empty($password_new) || empty($password_confirm)) {
                $loi = "Vui lòng nhập đầy đủ các trường mật khẩu";
            } elseif ($password_new !== $password_confirm) {
                $loi = "Mật khẩu mới và xác nhận mật khẩu không khớp";
            } elseif (!password_verify($password_old, $user->password)) {
                $loi = "Mật khẩu cũ không đúng";
            } else {
                $user->password = password_hash($password_new, PASSWORD_DEFAULT);
                $ketqua = $this->userModel->update_password($user);
                if ($ketqua) {
                    $thanhcong = "Đổi mật khẩu thành công";
                } else {
                    $loi = "Đổi mật khẩu thất bại";
                }
            }
        }

        include "views/admin/taikhoan/update.php";
    }

    // Xóa tài khoản
    public function delete_taikhoan($id) {
        try {
            $ketqua = $this->userModel->delete_user($id);

            if ($ketqua) {
                header("Location: ?act=taikhoan");
                exit();
            } else {
                $err = "Không thể xóa tài khoản này.";
                $danhsach = $this->userModel->all();
                include "views/admin/taikhoan/noidung.php";
            }
        } catch (Exception $e) {
            $err = "Lỗi xóa tài khoản: " . $e->getMessage();
            $danhsach = $this->userModel->all();
            include "views/admin/taikhoan/noidung.php";
        }
    }

    // Quản lý sản phẩm
    public function quanly_sanpham() {
        $err = "";
        $danhsach = $this->productModel->all();
        $ketqua = [];

        if (isset($_POST['tim'])) {
            $tukhoa = $_POST['tukhoa'] ?? '';

            if (trim($tukhoa) === '') {
                $err = "Bạn chưa nhập nội dung";
            } else {
                foreach ($danhsach as $tt) {
                    if (stripos($tt->name, $tukhoa) !== false) {
                        $ketqua[] = $tt;
                    }
                }

                if (empty($ketqua)) {
                    $err = "Không tìm thấy";
                    $danhsach = [];
                } else {
                    $danhsach = $ketqua;
                }
            }
        }

        include "views/admin/sanpham/noidung.php";
    }

    // Tạo sản phẩm mới
    public function create_sanpham() {
        $loi = "";
        $thanhcong = "";
        $sanpham = new Product();
        $danhsach = $this->categoryModel->all();

        if (isset($_POST['create_sanpham'])) {
            $sanpham->name = $_POST['name'];

            if ($_FILES['anh_sp']['size'] > 0) {
                $uploadPath = uploadFile($_FILES['anh_sp'], 'uploads/');
                if ($uploadPath) {
                    $sanpham->image = str_replace('uploads/', '', $uploadPath);
                }
            }

            $sanpham->price = $_POST['price'];
            $sanpham->idcategory = $_POST['idcategory'];
            $sanpham->descripsion = $_POST['descripsion'];
            $sanpham->hot = $_POST['hot'];
            $sanpham->discount = $_POST['discount'];
            $sanpham->quantity = $_POST['quantity'];

            if ($sanpham->name === "") {
                $loi = "Kiểm tra lại các trường dữ liệu";
            } else {
                $ketqua_update = $this->productModel->create($sanpham);
                if ($ketqua_update) {
                    header("Location: ?act=sanpham");
                    $thanhcong = "Tạo sản phẩm thành công";
                } else {
                    $loi = "Tạo sản phẩm thất bại";
                }
            }
        }

        include "views/admin/sanpham/create_sanpham.php";
    }

    // Xóa sản phẩm
    public function delete_sanpham($id) {                            
        $ketqua = $this->productModel->delete_sanpham($id);
        if ($ketqua) {
            header("Location: ?act=sanpham&msg=Xóa thành công");
            exit;
        } else {
            $loi = "Không thể xóa";
            $danhsach = $this->productModel->all();
            include "views/admin/sanpham/noidung.php";
        }
    }

    // Cập nhật sản phẩm
    public function update_sanpham($id) {
        $loi = "";
        $thanhcong = "";
        $sanpham = $this->productModel->find($id);
        $danhsach = $this->categoryModel->all();

        if (isset($_POST['update_sanpham'])) {
            $sanpham->id         = $id;
            $sanpham->name       = $_POST['name'];

            if ($_FILES['anh_sp']['size'] > 0) {
                $uploadPath = uploadFile($_FILES['anh_sp'], 'uploads/');
                if ($uploadPath) {
                    $sanpham->image = str_replace('uploads/', '', $uploadPath);
                }
            }

            $sanpham->price       = $_POST['price'];
            $sanpham->idcategory  = $_POST['idcategory'];
            $sanpham->descripsion = $_POST['descripsion'];
            $sanpham->hot         = $_POST['hot'];
            $sanpham->discount    = $_POST['discount'];
            $sanpham->quantity    = $_POST['quantity'];

            if ($sanpham->name === "") {
                $loi = "Kiểm tra lại các trường dữ liệu";
            } else {
                $ketqua_update = $this->productModel->update($sanpham);
                if ($ketqua_update > 0) {
                    $thanhcong = "Cập nhật sản phẩm thành công";
                } else {
                    $loi = 'Cập nhật sản phẩm thất bại';
                }
            }
        }

        include "views/admin/sanpham/update_sanpham.php";
    }

    // Quản lý bình luận
    public function quanly_binhluan() {
        $err = "";
        $danhsach = [];

        try {
            $sql = "SELECT cmt.*, pro.name AS ten_sanpham, user.name AS ten_user
                    FROM `comment` AS cmt
                    JOIN `product` AS pro ON cmt.idproduct = pro.id
                    JOIN `user` AS user ON cmt.iduser = user.id
                    ORDER BY cmt.date DESC";
            $danhsach = $this->commentModel->conn->query($sql)->fetchAll();
        } catch (PDOException $e) {
            $err = "Lỗi truy vấn bình luận: " . $e->getMessage();
        }

        if (isset($_POST['tim'])) {
            $keyword = trim($_POST['tukhoa']);
            if ($keyword == "") {
                $err = "Vui lòng nhập từ khóa tìm kiếm";
            } else {
                $ketqua = [];
                foreach ($danhsach as $row) {
                    if (stripos($row['content'], $keyword) !== false || 
                        stripos($row['ten_sanpham'], $keyword) !== false || 
                        stripos($row['ten_user'], $keyword) !== false) {
                        $ketqua[] = $row;
                    }
                }
                if (empty($ketqua)) {
                    $err = "Không tìm thấy bình luận phù hợp";
                    $danhsach = [];
                } else {
                    $danhsach = $ketqua;
                }
            }
        }

        include "views/admin/binhluan/noidung.php";
    }

    // Xóa bình luận
    public function delete_binhluan($id) {
        try {
            $sql = "DELETE FROM comment WHERE id = $id";
            $ketqua = $this->commentModel->conn->exec($sql);
            if ($ketqua > 0) {
                header("Location: ?act=binhluan");
                exit;
            } else {
                echo "Không thể xóa bình luận.";
            }
        } catch (PDOException $e) {
            echo "Lỗi xóa bình luận: " . $e->getMessage();
        }
    }
}

?>
