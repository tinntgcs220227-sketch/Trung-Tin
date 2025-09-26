<?php
if (!isset($_POST['val1'])) { include __DIR__ . '/templates/form.html.php'; exit; }
$val1 = $_POST['val1'] ?? '';
$val2 = $_POST['val2'] ?? '';
$calc = $_POST['calc'] ?? 'add';
if (!is_numeric($val1) || !is_numeric($val2)) { $error='Please enter valid numbers.'; include __DIR__ . '/templates/error.html.php'; exit; }
$val1+=0; $val2+=0;
switch ($calc) {
  case 'add': $result=$val1+$val2; break;
  case 'sub': $result=$val1-$val2; break;
  case 'mul': $result=$val1*$val2; break;
  case 'div': if($val2==0){$error='Division by zero.'; include __DIR__ . '/templates/error.html.php'; exit;} $result=$val1/$val2; break;
  default: $result='Unknown'; 
}
$output = "Result: $result";
include __DIR__ . '/templates/result.html.php';
