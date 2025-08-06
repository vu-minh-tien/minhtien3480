<?php 
class Comment{
    public $id;
    public $content;
    public $idproduct;
    public $date;
    public $iduser;
    public $user_name;
}

class CommentModel{
    public $conn;
    public function __construct()
    {
        $this->conn = connectDB();
    }

        public function create(Comment $comment){       
            try{
                $sql="INSERT INTO `comment` (`id`, `content`, `idproduct`, `iduser`, `date`)
                 VALUES (NULL, '".$comment->content."', '".$comment->idproduct."', '".$comment->iduser."', '".$comment->date."');";
                $data=$this->conn->exec($sql);
                return $data;

            }catch (PDOException $err) {
            echo "Lỗi truy vấn sản phẩm: " . $err->getMessage();
        }
        }  

public function find_comment_idpro($id) {
    try {
        $sql = "SELECT cmt.*, user.name as name_User
        FROM `product` as pro 
        JOIN `comment` as cmt ON cmt.idproduct = pro.id 
        JOIN `user` as user ON cmt.iduser = user.id 
        WHERE pro.id = $id;";
        $data= $this->conn->query($sql)->fetchAll();
        $comments = [];
        foreach ($data as $row) {
            $comment = new Comment();
            $comment->id         = $row['id'];
            $comment->content    = $row['content'];
            $comment->date       = $row['date'];
            $comment->user_name  = $row['name_User'];
            $comments[] = $comment;
        }

        return $comments;
    } catch (PDOException $err) {
        echo "Lỗi truy vấn sản phẩm: " . $err->getMessage();
    }
}



}
