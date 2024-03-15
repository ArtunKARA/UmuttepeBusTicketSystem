<?php

namespace App\Controllers;

class Home extends BaseController
{
    public function index(): string 
    {
        return View('kullanici/kullaniciHeader.php')
              .View('kullanici/KullaniciSeferSorgu.php')
              .View('kullanici/kullaniciGirisYap.php')
              .View('kullanici/kullaniciFooter.php');
    }
    
    public function admin(): string
    {
        return View('admin/adminHeader.php')
        .View('admin/adminHome.php')
        .View('admin/adminFooter.php');
    }
}
?>