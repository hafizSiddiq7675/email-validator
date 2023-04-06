<?php
use Illuminate\Support\Facades\Route;
use Email\Validator\MailValidation;

Route::get('test', function(){
   echo $email = 'a@gmail.com';
    $result = MailValidation::MailBoxValidation($email);

    echo '<pre>'; print_r($result); exit;



});
