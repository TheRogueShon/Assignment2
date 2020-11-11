<?php
include 'autoload.php';

$view = new View();
$model = new SignupModel();
$errors = [];
/*
if(!filter_var($_POST['email'], FILTER_VALIDATE_EMAIL)) {
    $errors['email'] = 'Invalid email format';
}
if(!preg_match("/^(?:(?=.*\d)(?=.*[a-z])(?=.*[A-Z]).*)^[a-zA-Z0-9]{10}$/", $_POST['password'])){
    $errors['password'] = 'Invalid password format';
}
*/

$controller = new FrontController();
$controller->init();
$validator = $controller->validator;
$result = $validator->validate();
// 2. If the data is invalid, get and display error messages
if (!$result) { // validation failed, errors were generated
    $errors = $validator->getErrors();  // an array of strings
    $view->setTemplate(TPL_DIR . '/signup.tpl.php');
    $view->addVar('errors', $errors);
    $view->display();
}
else{
    $model->insert($_POST);
    $status = 'Sign up successful. Please log in below.';
    $view->setTemplate(TPL_DIR . '/login.tpl.php');
    $view->addVar('status', $status);
    $view->display();
}
    /*
if(empty($errors)){
    $json = $model->getAll();
    $_POST['password'] = password_hash($_POST['password'], PASSWORD_DEFAULT);
    array_push($json['users'], $_POST);
    $model->storeData($json);
    $status = 'Sign up successful. Please log in below.';
    $view->setTemplate(TPL_DIR . '/login.tpl.php');
    $view->addVar('status', $status);
    $view->display();
}
else{
    $view->setTemplate(TPL_DIR . '/signup.tpl.php');
    $view->addVar('errors', $errors);
    $view->display();
}
*/