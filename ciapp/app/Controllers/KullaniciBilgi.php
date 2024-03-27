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

        $data = [
            'user' => $user,
            'sefer' => $_POST['SeferID'],
            'gidis' => $_POST['gidis'],
            'donus' => $_POST['donus'],
            'fiyat' => $_POST['Fiyat'],
            'seciliKoltuklar' =>  $_POST['seciliKoltuklar']
        ];
        return View('kullanici/kullaniciHeader.php')
              .View('kullanici/kullaniciGirisYap.php')
               .View('kullaniciBilgi/kullaniciBilgileri.php', $data)
              .View('kullanici/kullaniciFooter.php');
    }


}
?>