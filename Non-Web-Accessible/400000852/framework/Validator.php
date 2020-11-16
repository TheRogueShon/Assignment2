<?php
namespace Quwi\framework;
class Validator
{
    private static $instance;
    protected $data = [];
    protected $errors = [];
    protected $registered_validators = ['email'     => 'isEmailValid',
                                        'password' => 'isPasswordValid',
                                    ];

    public function __construct(){

    }

    public function getInstance(){
        if ( empty( self::$instance ) ) {
            self::$instance = new Validator();
            }
            return self::$instance;
    }

    public function validate() : bool
    {
        if (empty($this->data)) {
            trigger_error('No data received for validation', E_USER_WARNING);
            return true;
        }
        foreach($this->data as $key=>$value) {
            // if there is no registered validation method
            if (!array_key_exists($key, $this->registered_validators)) {
                $warning_msg = 'Form field ' . $key . ' has no registered validator method. Validation not done';
                trigger_error($warning_msg, E_USER_WARNING);
                //$this->setErrors($warning_msg);
            }
            else {
                // get the registered validator
                $validator = $this->registered_validators[$key];
    
                // check to make sure the method exists before calling it. Issue a warning if it doesn't
                if (!method_exists($this, $validator)) {
                    $warning_msg = 'Form field ' . $key . ' has a registered validator but no corresponding validator method. Validation not done';
                    trigger_error($warning_msg, E_USER_WARNING);
                    //$this->setErrors($warning_msg);
                }
                else {
                    // remember that each validator should update the $errors property
                    // if the data is invalid
                    $this->$validator($value);
                }
            }
        }
        return (empty($this->errors) ? true : false);
    }

    public function getErrors() : array
    {
        return $this->errors;
    }

    protected function setErrors(string $field_name, string $err_msg)
    {
        if (empty($err_msg)) {
            trigger_error('Cannot create an empty error message', E_USER_ERROR);
        }
        if (empty($field_name)) {
            trigger_error('Invalid field name used. Cannot be empty', E_USER_ERROR);
        }
        $this->errors[$field_name] = $err_msg;
    }

    protected function isEmailValid(){
        if(!filter_var($_POST['email'], FILTER_VALIDATE_EMAIL)) {
            $this->setErrors('email', 'Invalid email format');
            return false;
        }
        return true;
    }

    protected function isPasswordValid(){
        if(!preg_match("/^(?:(?=.*\d)(?=.*[a-z])(?=.*[A-Z]).*)^[a-zA-Z0-9]{10}$/", $_POST['password'])){
            $this->setErrors('password', 'Invalid password format');
            return false;
        }
        return true;
    }
}