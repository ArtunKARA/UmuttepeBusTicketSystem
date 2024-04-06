<?php

namespace App\Controllers;
use App\Models\koltukModel;
use App\Models\SeferModel;
use App\Controllers\Guzergah;

class seferAPI extends BaseController
{

    public function koltukDolumu() 
    {
        $koltukModel = new KoltukModel;
        $sorgu = [
            'SeferID' => $this->request->getGet('SeferID'),
            'KoltukNo' => $this->request->getGet('KoltukNo'),
            'OturanCinsiyeti' => $this->request->getGet('OturanCinsiyeti')
        ];

        if($sorgu['KoltukNo'] > 17){
            return  $this->response->setJSON("True");
        }

        $data = $koltukModel->getKoltuklar($sorgu['SeferID']);
        $doluKadinKoltuklar = array();
        $doluErkekKoltuklar = array();
        
        foreach ($data as $koltuk) {
            if ($koltuk["Durum"] == "Dolu") {
                if ($koltuk["OturanCinsiyeti"] == "Kız") {
                    $doluKadinKoltuklar[] = $koltuk["KoltukNo"];
                } elseif ($koltuk["OturanCinsiyeti"] == "Erkek") {
                    $doluErkekKoltuklar[] = $koltuk["KoltukNo"];
                }
            }
        }
        if($sorgu['OturanCinsiyeti'] == "Kız"){
            foreach($doluErkekKoltuklar as $koltukNo){
                if($sorgu['KoltukNo'] == $koltukNo-8 || $sorgu['KoltukNo'] == $koltukNo+8){
                    return  $this->response->setJSON("False");
                }
            }
            return  $this->response->setJSON("True");
        }else if($sorgu['OturanCinsiyeti'] == "Erkek"){
            foreach($doluKadinKoltuklar as $koltukNo){
                if($sorgu['KoltukNo'] == $koltukNo-8 || $sorgu['KoltukNo'] == $koltukNo+8){
                    return $this->response->setJSON("False");
                }
            }
            return  $this->response->setJSON("True");
        }

    }

    public function rezerveEt(){
        $plaka = $this->request->getPost('otobusPlaka');
        $saat = $this->request->getPost('saat');
        $seferPeriyodu = $this->zamanSiniflandirma($saat);
        $kullanıcıID = $this->request->getPost('kullanıcıID');
        $seferID = $this->request->getPost('seferID');
        $seferTarih = $this->request->getPost('tarih');
        $koltukNo = $this->request->getPost('seciliKoltukRezerve');
        $biletUcreti = $this->request->getPost('biletUcreti');
        $tarih = date("Y-m-d H:i:s");
        $biletTuru = 'r';
        $PNR = $this->PNR($plaka,$tarih,$seferID,$seferPeriyodu);// plaka ööös ve saat bilgileri ile oluşturulacak
        $seferModel = new SeferModel;
        $seferModel->rezerveBiletOlustur($PNR,$kullanıcıID,$seferID,$koltukNo,$biletTuru,$biletUcreti,$seferTarih);
        $session = session(); 
        $seferTercih = $session->get('tercih');
        $gidisDonus = $seferTercih[4];
        $gidisDonusSayac = $seferTercih[5];
        if($gidisDonus == 1){
            if($gidisDonusSayac == 0){
                $seferTercih[5] = 1;
                $session->set('tercih', $seferTercih);
                return redirect()->to(base_url('donus'));
            }else{
                $session->remove('tercih');
                return redirect()->to('http://localhost:8080/UmuttepeBusTicketSystem/ciapp/public/kullaniciSefer');
            }
        }else{
            $session->remove('tercih');
            return redirect()->to('http://localhost:8080/UmuttepeBusTicketSystem/ciapp/public/kullaniciSefer');
        }
        //return $this->response->setJSON($PNR);
    }

    private function PNR($plaka,$tarih,$seferID,$OOOS):string{
        $seferModel = new SeferModel;
        $query = $seferModel->getPNR($plaka,$tarih,$seferID,$OOOS);
        return $query[0]['PNR'];
    }

    private function zamanSiniflandirma($saat){
        // Saati parçalara ayır
        list($saat, $dakika, $saniye) = explode(':', $saat);
    
        // Saat değerini integer'a dönüştür
        $saat = intval($saat);
    
        // Eğer saat 12 veya daha küçükse, öğleden önce
        if ($saat < 12) {
            return "ÖÖ";
        } else {
            return "ÖS";
        }
    }

}
?>