<?php

namespace App\Controllers;

class KullaniciBilgi extends BaseController
{
    public function index()
    {
        $user = session()->get('user');
        if(!$user){
            return redirect()->to('http://localhost:8080/UmuttepeBusTicketSystem/ciapp/public/kayitOl');
        }
        $parcalanmis = explode(';', $_POST['seciliKoltuklar']);
        $yolcular = array();
        
        for($i = 0; $i < count($parcalanmis) - 1; $i++) {
            $detaylar = explode(',', $parcalanmis[$i]);
            $koltukNo = $detaylar[0];
            $cinsiyet = $detaylar[1];
            $yolcu = array(
                'koltukNo' => $koltukNo,
                'cinsiyet' => $cinsiyet
            );
            $yolcular[] = $yolcu;
        }

        $data = [
            'user' => $user,
            'sefer' => $_POST['SeferID'],
            'gidis' => $_POST['gidis'],
            'donus' => $_POST['donus'],
            'fiyat' => $_POST['Fiyat'],
            'seciliKoltuklar' => $yolcular
        ];
        return View('kullanici/kullaniciHeader.php')
              .View('kullanici/kullaniciGirisYap.php')
               .View('kullaniciBilgi/kullaniciBilgileri.php', $data)
              .View('kullanici/kullaniciFooter.php');
    }


}
?>