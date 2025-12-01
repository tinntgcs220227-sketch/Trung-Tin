<?php
// Tệp: /Structure/questions.php
try {
    include 'includes/Databasequestion.php';
    include 'includes/DatabaseFunctions.php';

    // SỬA ĐỔI: Sử dụng JOIN để lấy tên Tác giả và tên Danh mục
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
    
    $title = 'All Questions';

    ob_start();
    include 'templates/questions.html.php';
    $output = ob_get_clean();
} catch (PDOException $e) {
    $title = 'An error has occured';
    $output= 'Database error: ' . $e->getMessage();
}
include 'templates/layout.html.php';
?>