<?php

namespace App\Controllers;

class Odeme extends BaseController
{
    public function index(): string 
    {
        return View('kullanici/kullaniciHeader.php')
              .View('kullanici/kullaniciGirisYap.php')
              .View('odeme/odemeKart.php')
              .View('kullanici/kullaniciFooter.php');
    }

}
?>