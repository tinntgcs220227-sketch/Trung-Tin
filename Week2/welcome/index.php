<?php
if (!isset($_POST['val1'])) {
} else {
    $val1 = $_POST['val1'];
    $val2 = $_POST['val2'];
    $calc = $_POST['calc'];

    switch ($calc) {
        case "add":$result = $val1 + $val2;
        break;
        case "sub":$result = $val1 - $val2;
        break;
    }
    $output = "Calculation result:" . $result;
}
?>