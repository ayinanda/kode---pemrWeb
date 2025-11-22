<?php
$inputErr = "";
$input = "";

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    if (empty($_POST['input'])) {
        $inputErr = "Input teks tidak boleh kosong.";
    } else {

        $raw_input = $_POST['input'];
        $input = htmlspecialchars($raw_input, ENT_QUOTES, 'UTF-8');
    }
}
?>
