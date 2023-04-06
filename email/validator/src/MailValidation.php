<?php

namespace Email\Validator;

use Illuminate\Support\Facades\Mail;
use Email\Validator\ValidationMail;
use Exception;


class MailValidation
{

    public static function MailBoxValidation($email)
    {


        if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {

            $response = [
                'success' => false,
                'message' => 'Invalid email format'

            ];
            return $response;

        } else {

            list($username, $domain) = explode('@', $email);

            if (!checkdnsrr($domain, 'MX')) {

                $response = [
                    'success' => false,
                    'message' => 'Invalid domain or missing MX record'

                ];
                return $response;


            } else {
                try {




                    $data = [
                        'title' => 'Mail Box Validation',
                        'email' => $email,

                    ];
                    Mail::to($email)->send(new ValidationMail($data));
                    $response = [
                        'success' => true,
                        'message' => 'Valid Email'

                    ];

                    return $response;


                } catch (Exception $e) {
                    $error = $e->getMessage();

                    $response = [
                        'success' => false,
                        'message' => $error

                    ];

                    return $response;
                }




            }

        }
    }

}
