<?php require_once 'views/layouts/header.php'; ?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1" />
    <title>Liên hệ</title>
    <style>
        form {
           
            /* margin: 30px auto; */
            padding: 20px;
            
            
            border-radius: 8px;
          
        }
        form div {
            margin-bottom: 15px;
        }
        label {
            display: block;
            font-weight: bold;
            margin-bottom: 6px;
        }
        input[type="text"], input[type="email"], textarea {
            width: 100%;
            padding: 8px 10px;
            border: 1px solid #ccc;
            border-radius: 4px;
            resize: vertical;
        }
        button {
            background-color: #007bff;
            color: white;
            padding: 10px 15px;
            border: none;
            border-radius: 4px;
            cursor: pointer;
        }
        button:hover {
            background-color: #0056b3;
        }
        .message {
            max-width: 600px;
            margin: 15px auto;
            padding: 12px;
            border-radius: 6px;
            font-weight: bold;
        }
        .success {
            background-color: #d4edda;
            color: #155724;
            border: 1px solid #c3e6cb;
        }
        .error {
            background-color: #f8d7da;
            color: #721c24;
            border: 1px solid #f5c6cb;
        }
    </style>
</head>
<body>

<?php
$message = '';
$messageClass = '';
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    // Lấy dữ liệu gửi từ form
    $name = trim($_POST['name'] ?? '');
    $email = trim($_POST['email'] ?? '');
    $subject = trim($_POST['subject'] ?? '');
    $content = trim($_POST['content'] ?? '');

    // Kiểm tra dữ liệu đơn giản
    if (!$name || !$email || !$subject || !$content) {
        $message = "Vui lòng điền đầy đủ thông tin.";
        $messageClass = 'error';
    } elseif (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
        $message = "Email không hợp lệ.";
        $messageClass = 'error';
    } else {
        // Ở đây bạn có thể xử lý gửi email hoặc lưu vào CSDL
        // Ví dụ gửi email (bạn cần cấu hình mail server)
        /*
        $to = 'contact@example.com';
        $mailSubject = "Liên hệ từ $name: $subject";
        $mailContent = "Tên: $name\nEmail: $email\n\nNội dung:\n$content";
        mail($to, $mailSubject, $mailContent);
        */

        $message = "Cảm ơn bạn đã liên hệ với chúng tôi. Chúng tôi sẽ phản hồi sớm nhất.";
        $messageClass = 'success';

        // Xóa dữ liệu form sau khi gửi thành công
        $name = $email = $subject = $content = '';
    }
}
?>

<?php if ($message): ?>
    <div class="message <?= $messageClass ?>">
        <?= htmlspecialchars($message) ?>
    </div>
<?php endif; ?>

<form action="" method="post" novalidate>
    <div>
        <label for="name">Họ tên:</label>
        <input type="text" id="name" name="name" value="<?= htmlspecialchars($name ?? '') ?>" required />
    </div>
    <div>
        <label for="email">Email:</label>
        <input type="email" id="email" name="email" value="<?= htmlspecialchars($email ?? '') ?>" required />
    </div>
    <div>
        <label for="subject">Chủ đề:</label>
        <input type="text" id="subject" name="subject" value="<?= htmlspecialchars($subject ?? '') ?>" required />
    </div>
    <div>
        <label for="content">Nội dung:</label>
        <textarea id="content" name="content" rows="6" required><?= htmlspecialchars($content ?? '') ?></textarea>
    </div>
    <button type="submit">Gửi liên hệ</button>
</form>

</body>
</html>

<?php require_once 'views/layouts/footer.php'; ?>
