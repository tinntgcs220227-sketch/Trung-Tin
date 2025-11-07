<?php
function query($pdo, $sql, $parameters = []) {
    $query = $pdo->prepare($sql);
    $query->execute($parameters);
    return $query;
}

function totalJokes($pdo) {
    $query = query($pdo, 'SELECT COUNT(*) FROM joke');
    return $query->fetchColumn();
}

function allJokes($pdo) {
    $sql = 'SELECT 
                j.id, 
                j.joketext, 
                j.jokedate, 
                a.name AS authorName, 
                a.email AS authorEmail,
                c.categoryname AS categoryName
            FROM joke j
            INNER JOIN author a ON j.authorid = a.id
            INNER JOIN category c ON j.categoryid = c.id
            ORDER BY j.jokedate DESC';
    $query = query($pdo, $sql);
    return $query->fetchAll();
}

function getJoke($pdo, $id) {
    $parameters = [':id' => $id];
    $sql = 'SELECT 
                j.id, 
                j.joketext, 
                j.jokedate, 
                a.name AS authorName, 
                c.categoryname AS categoryName
            FROM joke j
            INNER JOIN author a ON j.authorid = a.id
            INNER JOIN category c ON j.categoryid = c.id
            WHERE j.id = :id';
    $query = query($pdo, $sql, $parameters);
    return $query->fetch();
}

function addJoke($pdo, $authorId, $categoryId, $text) {
    $parameters = [
        ':authorid' => $authorId,
        ':categoryid' => $categoryId,
        ':joketext' => $text
    ];

    $sql = 'INSERT INTO joke (authorid, categoryid, joketext, jokedate)
            VALUES (:authorid, :categoryid, :joketext, CURDATE())';
    query($pdo, $sql, $parameters);
}

function updateJoke($pdo, $id, $text) {
    $parameters = [
        ':id' => $id,
        ':joketext' => $text
    ];
    $sql = 'UPDATE joke 
            SET joketext = :joketext 
            WHERE id = :id';
    query($pdo, $sql, $parameters);
}

function deleteJoke($pdo, $id) {
    $parameters = [':id' => $id];
    $sql = 'DELETE FROM joke WHERE id = :id';
    query($pdo, $sql, $parameters);
}
?>
