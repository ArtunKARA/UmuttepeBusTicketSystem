<?php

namespace App\Controllers;

class KullaniciBilgi extends BaseController
{
    public function index(): string 
    {
        return View('kullanici/kullaniciHeader.php')
              .View('kullanici/kullaniciGirisYap.php')
               .View('kullaniciBilgi/kullaniciBilgileri.php')
              .View('kullanici/kullaniciFooter.php');
    }

}
?>