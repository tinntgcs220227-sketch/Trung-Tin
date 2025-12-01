<?php
// Tệp: /Structure/includes/DatabaseFunctions.php

if (!function_exists('totalQuestions')) {
function totalQuestions($pdo) {
    $query = $pdo->prepare('SELECT COUNT(*) FROM question');
    $query->execute();
    return $query->fetchColumn();
}
}
function getAllQuestions($pdo) {
    $query = $pdo->prepare('SELECT * FROM question ORDER BY date DESC');
    $query->execute();
    return $query->fetchAll();
}

function insertQuestion($pdo, $text, $authorid, $image, $categoryid = 1) { 
    $query = $pdo->prepare('INSERT INTO question (text, date, authorid, image, categoryid) 
    VALUES (:text, CURDATE(), :authorid, :image, :categoryid)');
    
    $query->execute([
        'text' => $text, 
        'authorid' => $authorid, 
        'image' => $image, 
        'categoryid' => $categoryid 
    ]);
}

function getQuestionById($pdo, $id) {
    $query = $pdo->prepare('SELECT * FROM question WHERE id = :id');
    $query->execute(['id' => $id]);
    return $query->fetch();
}

function updateQuestion($pdo, $id, $text, $image, $authorid, $categoryid) {
    $query = $pdo->prepare('UPDATE question SET 
        text = :text, 
        image = :image,
        authorid = :authorid,
        categoryid = :categoryid
    WHERE id = :id');
    $query->execute([
        'text' => $text, 
        'image' => $image, 
        'authorid' => $authorid,
        'categoryid' => $categoryid,
        'id' => $id
    ]);
}

function deleteQuestion($pdo, $id) {
    $query = $pdo->prepare('DELETE FROM question WHERE id = :id');
    $query->execute(['id' => $id]);
}


// --- Các hàm cho Bảng AUTHOR (Manage Users) ---

function getAllAuthors($pdo) {
    $query = $pdo->prepare('SELECT id, name, email FROM author ORDER BY name ASC');
    $query->execute();
    return $query->fetchAll();
}

function getAuthorById($pdo, $id) {
    $query = $pdo->prepare('SELECT * FROM author WHERE id = :id');
    $query->execute(['id' => $id]);
    return $query->fetch();
}

function updateAuthor($pdo, $id, $name, $email, $password = null) {
    $sql = 'UPDATE author SET name = :name, email = :email';
    $params = ['name' => $name, 'email' => $email, 'id' => $id];

    if (!empty($password)) {
        $hashedPassword = password_hash($password, PASSWORD_DEFAULT);
        $sql .= ', password = :password';
        $params['password'] = $hashedPassword;
    }
    
    $sql .= ' WHERE id = :id';
    $query = $pdo->prepare($sql);
    $query->execute($params);
}

function addAuthor($pdo, $name, $email, $password) {
    $hashedPassword = password_hash($password, PASSWORD_DEFAULT);
    $query = $pdo->prepare('INSERT INTO author (name, email, password) 
    VALUES (:name, :email, :password)');
    $query->execute([
        'name' => $name, 
        'email' => $email, 
        'password' => $hashedPassword 
    ]);
}

function deleteAuthor($pdo, $id) {
    $query = $pdo->prepare('DELETE FROM author WHERE id = :id');
    $query->execute(['id' => $id]);
}

// Hàm này được dùng trong Validate.php để đăng nhập
function getAuthorByEmail($pdo, $email) {
    $query = $pdo->prepare('SELECT * FROM author WHERE email = :email');
    $query->execute(['email' => $email]);
    return $query->fetch(); 
}


// --- Các hàm cho Chức năng Liên hệ (user_contact) ---

function insertContactMessage($pdo, $username, $email, $message) {
    $query = $pdo->prepare('INSERT INTO user_contact (username, email, message, sent_date) 
    VALUES (:username, :email, :message, NOW())');
    $query->execute([
        'username' => $username, 
        'email' => $email, 
        'message' => $message 
    ]);
}

function getAllContactMessages($pdo) {
    $query = $pdo->prepare('SELECT * FROM user_contact ORDER BY sent_date DESC');
    $query->execute();
    return $query->fetchAll();
}

function deleteContactMessage($pdo, $id) {
    $query = $pdo->prepare('DELETE FROM user_contact WHERE id = :id');
    $query->execute(['id' => $id]);
}
function getAllCategories($pdo) {
    // Tên cột danh mục là categoryName
    $query = $pdo->prepare('SELECT id, categoryName FROM category ORDER BY categoryName ASC');
    $query->execute();
    return $query->fetchAll();
}



// 1. Thêm Category/Module mới (CREATE)
function insertCategory($pdo, $name) {
    // Lưu ý: Tên cột là categoryName
    $query = $pdo->prepare('INSERT INTO category (categoryName) VALUES (:name)');
    $query->execute(['name' => $name]);
}

// 2. Lấy Category/Module bằng ID (dùng cho Edit)
function getCategoryById($pdo, $id) {
    $query = $pdo->prepare('SELECT id, categoryName FROM category WHERE id = :id');
    $query->execute(['id' => $id]);
    return $query->fetch();
}

// 3. Cập nhật Category/Module (UPDATE)
function updateCategory($pdo, $id, $name) {
    $query = $pdo->prepare('UPDATE category SET categoryName = :name WHERE id = :id');
    $query->execute(['name' => $name, 'id' => $id]);
}

// 4. Xóa Category/Module (DELETE)
function deleteCategory($pdo, $id) {
    // CẦN XỬ LÝ RÀNG BUỘC KHÓA NGOẠI: Tùy thuộc vào thiết lập của bạn,
    // bạn có thể cần xóa các câu hỏi liên quan hoặc đặt categoryid thành NULL trước.
    $query = $pdo->prepare('DELETE FROM category WHERE id = :id');
    $query->execute(['id' => $id]);
}





 
function countUnreadMessages($pdo) {
    $query = $pdo->prepare('SELECT COUNT(*) FROM user_contact WHERE is_read = 0');
    $query->execute();
    return $query->fetchColumn();
}

/**
 * Đánh dấu TẤT CẢ tin nhắn chưa đọc là đã đọc (is_read = 1).
 */
function markAllMessagesAsRead($pdo) {
    // Chỉ cập nhật những tin nhắn chưa đọc để tối ưu
    $query = $pdo->prepare('UPDATE user_contact SET is_read = 1 WHERE is_read = 0');
    $query->execute();
}
?>