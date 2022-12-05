<?php
defined('BASEPATH') OR exit('No direct script access allowed');

/**
 * CodeIgniter PHPMailer Class
 *
 * This class enables SMTP email with PHPMailer
 *
 * @category    Libraries
 * @author      CodexWorld
 * @link        https://www.codexworld.com
 */

use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\Exception;
class PHPMailer_Lib
{
    public function __construct(){
        log_message('Debug', 'PHPMailer class is loaded.');
    }

    public function load(){
        
        // Include PHPMailer library files
        require_once APPPATH.'third_party/PHPMailer/Exception.php';
        require_once APPPATH.'third_party/PHPMailer/PHPMailer.php';
        require_once APPPATH.'third_party/PHPMailer/SMTP.php';
        
        $mail = new PHPMailer;

        $mail->IsSMTP(); 
        $mail->SMTPAuth = true;//設定SMTP需要驗證
        $mail->SMTPSecure = 'tls';//'tls'
        $mail->Host = 'sm11.siteground.biz';//設定SMTP主機 
        $mail->Port = 587; //old   new 587 //設定SMTP埠位。
        $mail->Username = 'service@auto.jinzdm.com';//'jinzdm97'
        $mail->Password = 'jinZdm@1107';//'jinzdm~963'
        $mail->From = 'service@auto.jinzdm.com';//設定寄件者信箱
        $mail->FromName = '精立數位';//設定寄件者姓名 
        $mail->CharSet = 'UTF-8';// 編碼

        return $mail;
    }
}