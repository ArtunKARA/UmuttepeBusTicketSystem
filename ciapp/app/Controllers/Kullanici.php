<?php

namespace App\Controllers;
use App\Models\userModel;
use App\Models\BiletModel;

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
    public function guncelle(){
        $user = session();
        $kullanici = $user->get();
        $kullaniciID = $kullanici['ID'];
        $kullaniciModel = new userModel;
        $data = [
            'Isim' => $this->request->getPost('Isim'),
            'TcVatandas' => $this->request->getPost('kimlikTuru') == "TC" ? 1 : 0,
            'VatandasNo' => $this->request->getPost('VatandasNo'),
            'DogumTarihi' => $this->request->getPost('DogumTarihi'),
            'Cinsiyet' => $this->request->getPost('cinsiyet') == "Kadın" ? 1 : 0,
            'TelefonNo' => $this->request->getPost('TelefonNo'),
            'Mail' => $this->request->getPost('Mail')
        ];
        $kullaniciModel->kullaniciGuncelle($kullaniciID, $data);
        return redirect()->to('http://localhost:8080/UmuttepeBusTicketSystem/ciapp/public/kullanici');
    }

    public function seferlerim(){
        $user = session();
        $kullanici = $user->get();
        $kullaniciID = $kullanici['ID'];
        $biletModel = new BiletModel;
        $data = [
            'biletler' => $biletModel->getBiletler($kullaniciID)
        ];
        return View('kullanici/kullaniciHeader.php')
            .View('kullanici/kullaniciSeferleri.php',$data)
            .View('kullanici/kullaniciFooter.php');
    }
}
?>