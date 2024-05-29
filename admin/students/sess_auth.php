<?php
if (session_status() == PHP_SESSION_NONE) {
    session_start();
}
if (isset($_SERVER['HTTPS']) && $_SERVER['HTTPS'] === 'on')
    $link = "https";
else
    $link = "http";
$link .= "://";
$link .= $_SERVER['HTTP_HOST'];
$link .= $_SERVER['REQUEST_URI'];
if (!isset($_SESSION['userdata']) && !strpos($link, 'login.php')) {
    redirect('admin/login.php');
}
if (isset($_SESSION['userdata']) && strpos($link, 'login.php')) {
    $role = $_SESSION['userdata']['role'];
    if ($role == 'admin') {
        redirect('admin/index.php');
    } elseif ($role == 'student') {
        redirect('admin/index.php');
    }
}
$module = array('', 'admin', 'staff', 'user', 'student');
if (isset($_SESSION['userdata']) && (strpos($link, 'index.php') || strpos($link, 'admin/')) && $_SESSION['userdata']['role'] == 3) {
    echo "<script>alert('Access Denied!');location.replace('" . base_url . $module[array_search('student', $module)] . "');</script>";
    exit;
}