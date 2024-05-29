<?php
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // 獲取表單數據
    $name = $_POST['name'];
    $email = $_POST['email'];
    $message = $_POST['textarea'];

    // 設置郵件收件人地址
    $to = "customerservice@broroots.com";
    $subject = "New message from $name";
    $headers = "From: $email\r\n";
    $headers .= "Reply-To: $email\r\n";
    $headers .= "Content-type: text/html\r\n";

    // 郵件內容
    $email_content = "<h2>New Message</h2>";
    $email_content .= "<p><strong>Name:</strong> $name</p>";
    $email_content .= "<p><strong>Email:</strong> $email</p>";
    $email_content .= "<p><strong>Message:</strong><br>$message</p>";

    // 發送郵件
    if (mail($to, $subject, $email_content, $headers)) {
        // 發送成功，重定向到成功頁面
        header("Location: thank_you.html");
    } else {
        // 發送失敗，顯示錯誤訊息
        echo "<p>Sorry, there was an error sending your message. Please try again later.</p>";
    }
}
?>