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

    public function kayit(){
        $userModel = new userModel;
        $data = [
            'Isim' => $this->request->getPost('Isim'),
            'TcVatandas' => $this->request->getPost('kimlikTuru') == "TC" ? 1 : 0,
            'VatandasNo' => $this->request->getPost('VatandasNo'),
            'DogumTarihi' => $this->request->getPost('DogumTarihi'),
            'Cinsiyet' => $this->request->getPost('cinsiyet') == "Kadın" ? 1 : 0,
            'TelefonNo' => $this->request->getPost('TelefonNo'),
            'Mail' => $this->request->getPost('Mail'),
            'Sifre' => $this->request->getPost('Sifre')
        ];
        $userModel->kayit($data);
        return redirect()->to('http://localhost:8080/UmuttepeBusTicketSystem/ciapp/public');
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

    public function kartlarım(){
        $user = session();
        $kullanici = $user->get();
        $kullaniciID = $kullanici['ID'];
        $userModel = new userModel;
        $data = [
            'kartlar' => $userModel->kartBilgileri($kullaniciID)
        ];
        return View('kullanici/kullaniciHeader.php')
            .View('kullanici/kullaniciKartlar.php',$data)
            .View('kullanici/kullaniciFooter.php');
    }

    public function kartlartSil($id){
        $userModel = new userModel;
        $userModel->deleteKart($id);
    }

    public function kartDetay(){
        if(isset($_POST['kartID'])){
            $kartID = $_POST['kartID'];
        }else{
            $kartID = null;
        }

        $user = session();
        $kullanici = $user->get();
        $kullaniciID = $kullanici['ID'];

        if($kartID != null){
            $userModel = new userModel;
            $data = [
                'kart' => $userModel->tekKartBilgileri($kartID)
            ];
    
            return View('kullanici/kullaniciHeader.php')
                .View('kullanici/kullaniciKartDetay.php',$data)
                .View('kullanici/kullaniciFooter.php');
        }else{
            return View('kullanici/kullaniciHeader.php')
                .View('kullanici/kullaniciKartDetay.php')
                .View('kullanici/kullaniciFooter.php');
        }
    }

    public function kartEkle(){
        $user = session();
        $kullanici = $user->get();
        $kullaniciID = $kullanici['ID'];
        $userModel = new userModel;
        $data = [
            'KartNumarasi' => $this->request->getPost('KartNumarasi'),
            'SonKullanmaTarihi' => $this->request->getPost('SonKullanmaTarihi'),
            'CVV' => $this->request->getPost('CVV'),
            'KullaniciID' => $kullaniciID
        ];
        $userModel->addKart($data);
        return redirect()->to('http://localhost:8080/UmuttepeBusTicketSystem/ciapp/public/kullaniciKartlar');
    }

    public function kartGuncelle(){
        $user = session();
        $kullanici = $user->get();
        $kullaniciID = $kullanici['ID'];
        $userModel = new userModel;
        $data = [
            'KartNumarasi' => $this->request->getPost('KartNumarasi'),
            'SonKullanmaTarihi' => $this->request->getPost('SonKullanmaTarihi'),
            'CVV' => $this->request->getPost('CVV')
        ];
        $userModel->updateKart($this->request->getPost('kartID'), $data);
        return redirect()->to('http://localhost:8080/UmuttepeBusTicketSystem/ciapp/public/kullaniciKartlar');        
    }
}
?>