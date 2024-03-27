<?php

namespace App\Controllers;
use App\Models\userModel;
use App\Models\BiletModel;

class Kullanici extends BaseController
{
    public function index(): string
    {
        $session = session();
        $kullanici = $session->get('user');
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
        $session = session();
        $kullanici = $session->get('user');
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
        $session = session();
        $kullanici = $session->get('user');
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
        $session = session();
        $kullanici = $session->get('user');
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

        $session = session();
        $kullanici = $session->get('user');
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
        $session = session();
        $kullanici = $session->get('user');
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
        $session = session();
        $kullanici = $session->get('user');
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

    public function biletAksiyon(){
        $biletModel = new BiletModel;
        $biletModel->biletAksiyon($this->request->getPost('biletID'), $this->request->getPost('aksiyon'));
        return redirect()->to('http://localhost:8080/UmuttepeBusTicketSystem/ciapp/public/kullaniciSefer');
    }
}
?>