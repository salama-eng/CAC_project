<?php
namespace App\Http\Controllers\admin;
use App\Http\Controllers\Controller;
use Webklex\PHPIMAP\ClientManager;
use Webklex\PHPIMAP\Client;

class emailController extends Controller{

    function receiveEmail(){

        $mail = new Imap(array(
            'host'     => 'imap.gmail.com',
            'user'     => 'example@gmail.com',
            'port'     => '993',
            'password' => '********',
            'ssl'      => 'tls',
            'auth'     => 'login'
        ));

        echo $mail->countMessages() . " messages found\n";
        foreach ($mail as $message) {
            printf("Mail from '%s': %s\n", $message->from, $message->subject);
        }
}}