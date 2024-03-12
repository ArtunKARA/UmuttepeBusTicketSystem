<?php

namespace App\Controllers;

class Home extends BaseController
{
    public function index(): string 
    {
        return View('kullanici/kullaniciHeader.php')
              .View('kullanici/KullaniciSeferSorgu.php')
              .View('kullanici/kullaniciFooter.php');
    }
}
