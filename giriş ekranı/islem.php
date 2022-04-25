<?php

ob_start();
session_start();

require 'baglan.php';

if(isset($_POST['kayit'])){
    $username = $_POST['username'];
    $password = $_POST['password'];
    $mail = $_POST['mail'];

    if(!$username){
        echo "Lütfen kullanıcı adınızı girin";
    }elseif(!$password ){
        echo "lütfen şifrenizi girin";
    }elseif($mail != $mail){
        echo "lütfen mail adresinizi girin ";
    }else{
            //veritabanı kayıt işlemi
            $sorgu = $db->prepare('INSERT INTO users SET user_name = ?, user_password = ?, user_mail = ?');
            $ekle = $sorgu->execute([
                $username, $password, $mail
            ]);
            if($ekle){
              
                header('Refresh:2; index.php');
            }else{
               
            }
    }

}
if(isset($_POST['giris'])){
    $username = $_POST['username'];
    $password = $_POST['password'];
    $mail = $_POST['mail'];

    if(!$username){
        echo "kullanıcı adınızı giriniz";
    }elseif(!$password){
        echo "şifrenizi giriniz";
    }elseif(!$mail){
        echo "mail adresinizi giriniz";    
    }else{
        $kullanici_sor = $db->prepare('SELECT * FROM users WHERE user_name = ? || user_password = ? || user_mail = ?');
        $kullanici_sor->execute([
            $username , $password , $mail
        ]);

        $say = $kullanici_sor->rowCount();
        if($say==1){
            $SESSION['username']=$username;
            
            header('Refresh:2; anasayfa.php');
        }
    }
}

?>