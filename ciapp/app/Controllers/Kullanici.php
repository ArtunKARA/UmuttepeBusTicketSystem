<?php

namespace App\Controllers;
use App\Models\userModel;

class Kullanici extends BaseController
{
    public function index(): string
    {
        $user = session();
        $kullanici = $user->get();
        $kullaniciModel = new userModel;
        $data = [
            'kullanici' => $kullaniciModel->kullaniciBilgi($kullanici['ID'])
        ]; 

        return View('kullanici/kullaniciHeader.php')
            .View('kullanici/kullaniciDetay.php',$data)
            .View('kullanici/kullaniciGirisYap.php')
            .View('kullanici/kullaniciFooter.php');
    }
}
?>