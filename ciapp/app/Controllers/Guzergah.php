<?php

namespace App\Controllers;

use App\Models\SeferModel;

class Guzergah extends BaseController
{
    public function index(): string 
    {
      $seferModel = new SeferModel;
        $data = [
            'seferler' => $seferModel->getAllSefer()
        ];
        return View('kullanici/kullaniciHeader.php')
              .View('guzergah/guzergah.php',$data)
              .View('kullanici/kullaniciGirisYap.php')
            //    .View('guzergah/koltuklar.php')
              .View('kullanici/kullaniciFooter.php');
    }

    public function show($id): string
    {
        
        
        return View('kullanici/kullaniciHeader.php')
              .View('guzergah/guzergahDetay.php')
              .View('kullanici/kullaniciGirisYap.php')
              .View('kullanici/kullaniciFooter.php');
    }
}
?>