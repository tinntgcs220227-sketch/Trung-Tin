<?php
// Tệp: /Structure/admin/questions.php
session_start();
// BẢO MẬT: Kiểm tra ủy quyền
if (!isset($_SESSION["Authorised"]) || $_SESSION["Authorised"] != "Y") { 
    header("Location: login/Notauthorised.php");
    exit();
}

try{
    include '../includes/Databasequestion.php';
    include '../includes/DatabaseFunctions.php';

    // THÊM: Lấy số lượng tin nhắn chưa đọc vào biến $unreadMessageCount
$unreadMessageCount = countUnreadMessages($pdo);

   // ĐIỀU CHỈNH: Sửa c.name thành c.categoryName
   $sql = 'SELECT 
                q.*, 
                a.name AS author_name, 
                c.categoryName AS categoryName 
            FROM question q
            LEFT JOIN author a ON q.authorid = a.id 
            LEFT JOIN category c ON q.categoryid = c.id
            ORDER BY q.date DESC';
            
    $questionsQuery = $pdo->query($sql);
    $questions = $questionsQuery->fetchAll();
    
    $title = 'Question list (Admin)';

    ob_start();
    include '../templates/admin_questions.html.php'; 
    $output = ob_get_clean();
}catch (PDOException $e){
    $title = 'An error has occured';
    $output= 'Database error: ' . $e->getMessage();
}
include '../templates/admin_layout.html.php';
?>