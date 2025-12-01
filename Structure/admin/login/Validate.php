<?php
// Validate.php
$ActualPassword = "secret"; // The actual password is set here 
$ActualEmail = "nguyentintrung0401@gmail.com"; // THÊM: Email cứng

if ($_POST["password"] == $ActualPassword && $_POST["email"] == $ActualEmail) { // Check if the guess matches the actual password [cite: 169, 21]
    session_start(); // Start the session to store authorization status 
    $_SESSION["Authorised"] = "Y"; // Set the authorized session variable 
    // Tùy chọn: Lưu ID người dùng nếu bạn có ý định dùng CSDL sau này
    $_SESSION['user_id'] = 1;
    header("Location:../index.php"); // Redirect to the secure page 
} else {
    header("Location:Wrongpassword.php"); // Redirect to the wrong password page 
}
?>