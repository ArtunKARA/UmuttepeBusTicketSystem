<?php

namespace App\Controllers;

use App\Models\SeferModel;

use App\Models\koltukModel;

class Guzergah extends BaseController
{
    public function index(): string 
    {
        $session = session();
        $user = $session->get('user');
        $nerden = $_POST['fromCity'];
        $nereye = $_POST['toCity'];
        $seferModel = new SeferModel;
        if(isset($_POST['gidisDonus'])){
            $gidisDonus = 1;
        }else{
            $gidisDonus = 0;
        }
        $session->set('tercih',[$nerden,$nereye,$_POST['gidis'],$_POST['donus'],$gidisDonus,0]); // 4 , 5 
        $data = [
            'seferler' => $seferModel->getSehirSefer($nerden,$nereye),
            'gidis' => $_POST['gidis'],
            'donus' => $_POST['donus']
        ];
        return View('kullanici/kullaniciHeader.php')
              .View('guzergah/guzergah.php',$data)
              .View('kullanici/kullaniciGirisYap.php')
            //.View('guzergah/koltuklar.php')
              .View('kullanici/kullaniciFooter.php');
    }

    public function donus(): string 
    {
        $session = session();
        $user = $session->get('user');
        $sessionData = $session->get('tercih');
        $seferModel = new SeferModel;
        
        if ($sessionData !== null) {
            // Access session data elements
            $nerden = $sessionData[0];
            $nereye = $sessionData[1];
            $gidis = $sessionData[2];
            $donus = $sessionData[3];
            $gidisDonus = $sessionData[4];
            $adım = $sessionData[5]; 
        } else {
            // Session data not found
        }
        
        $data = [
            'seferler' => $seferModel->getSehirSefer($nereye,$nerden),
            'gidis' => $nereye,
            'donus' => $nerden
        ];
        return View('kullanici/kullaniciHeader.php')
              .View('guzergah/guzergah.php',$data)
              .View('kullanici/kullaniciGirisYap.php')
            //    .View('guzergah/koltuklar.php')
              .View('kullanici/kullaniciFooter.php');
    }

    public function show(): string
    {
        $session = session();
        $user = $session->get('user');
        $seferModel = new SeferModel;
        $koltukModel = new KoltukModel;
        $id = $_POST['seferID'];
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