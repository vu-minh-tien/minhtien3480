<?php
class AdminController {
    public function dashboard() {
        include '../views/admin/dashboard.php';
    }

    public function products() {
        include '../views/admin/product_list.php';
    }

    public function categories() {
        include '../views/admin/category_list.php';
    }

    public function users() {
        include '../views/admin/user_list.php';
    }

    public function comments() {
        include '../views/admin/comment_list.php';
    }
}
?>