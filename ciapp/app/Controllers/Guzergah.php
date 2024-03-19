<?php

namespace App\Controllers;

use App\Models\SeferModel;

use App\Models\KoltukModel;

class Guzergah extends BaseController
{
    public function index(): string 
    {
        $user = session();
        $nerden = $_POST['fromCity'];
        $nereye = $_POST['toCity'];
        $seferModel = new SeferModel;
        $data = [
            'seferler' => $seferModel->getSehirSefer($nerden,$nereye)
        ];
        return View('kullanici/kullaniciHeader.php')
              .View('guzergah/guzergah.php',$data)
              .View('kullanici/kullaniciGirisYap.php')
            //    .View('guzergah/koltuklar.php')
              .View('kullanici/kullaniciFooter.php');
    }

    public function show($id): string
    {
        $user = session();
        $seferModel = new SeferModel;
        $koltukModel = new KoltukModel;
        $tekSefer = [
            'sefer' => $seferModel->getTekSefer($id)
        ];
        $koltuklar = [
            'koltuklar' => $koltukModel->getKoltuklar($id)
        ];
        return View('kullanici/kullaniciHeader.php')
              .View('guzergah/guzergahDetay.php',array_merge($tekSefer, $koltuklar))
              .View('kullanici/kullaniciGirisYap.php')
              .View('kullanici/kullaniciFooter.php');
    }
}
?>