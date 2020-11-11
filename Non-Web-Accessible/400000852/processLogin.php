<?php
include 'autoload.php';

$view = new View();
$model = new SignupModel();

$errors = '';

$records = $model->getAll();

if(searchEmail($_POST['email'], $records['users']) && password_verify($_POST['password'], '$2y$10$7zX0DyRdES8olnedpceEr.pxtG5ttqLPnmS9rRzTHpVJqrmzWF76K')){
    header('Location:profile.php');
} 
else{
    $errors = 'Invalid email/password';
    $view->setTemplate(TPL_DIR . '/login.tpl.php');
    $view->addVar('errors', $errors);
    $view->display();
}

function searchEmail($id, $array) {
    $found = false;
    if(in_array($id, array_column($array, 'email'))){
        $found = true;
    }
    return $found;
 }