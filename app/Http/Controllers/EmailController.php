<?php
namespace App\Http\Controllers;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Auth;

class EmailController extends Controller
{
    private $domain;

    public function __construct()
    {
        $this->domain = 'saberpro.selectop.com.co/';
    }
    public function welcome_email( User $user)
    {
        $to = $user->email;
        $subjet = 'Bienvenido '.$user->name.'';
        $message = \View::make('mails.welcome', ['link' => 'https://' . $this->domain,'name'=>$user->name, 'token'=>$user->remember_token]);
        $header = "From: Santoto + Pro | Universidad Santo Tomas\r\n";
        $header .= "Reply-To: noreply@" . $this->domain . "\r\n";
        $header .= "X-Mailer: PHP/" . phpversion() . "\r\n";
        $header .= "Content-type:text/html;charset=UTF-8";
        $mail = mail($to, $subjet, $message, $header);
        if ($mail) {
            return true; 
        } else {
            return false; 
        }
    }
    
    public function password_recover($email, $code)
    {
        
        $to = $email;
        $subjet = 'Recuperación de contraseña | Santoto + Pro';
        $message = \View::make('mails.recover', ['code'=>$code]);
        $header = "From: Santoto + Pro | Universidad Santo Tomas\r\n";
        $header .= "Reply-To: noreply@" . $this->domain . "\r\n";
        $header .= "X-Mailer: PHP/" . phpversion() . "\r\n";
        $header .= "Content-type:text/html;charset=UTF-8";
        $mail = mail($to, $subjet, $message, $header);
        if ($mail) {
            return true; 
        } else {
            return false; 
        }
    }
}