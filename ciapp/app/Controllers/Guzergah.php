<?php

namespace App\Controllers;

class Guzergah extends BaseController
{
    public function index(): string 
    {
        return View('kullanici/kullaniciHeader.php')
              .View('guzergah/guzergah.php')
              .View('kullanici/kullaniciFooter.php');
    }
}

?>