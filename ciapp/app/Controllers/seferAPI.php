<?php

namespace App\Controllers;
use App\Models\KoltukModel;
use App\Models\SeferModel;

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
        $tarih = date("Y-m-d H:i:s");
        $koltukNo = $this->request->getPost('koltukNo');
        $biletTuru = 'r';
        $biletUcreti = $this->request->getPost('biletUcreti');
        $PNR = $this->PNR($plaka,$tarih,$seferID,$seferPeriyodu);// plaka ööös ve saat bilgileri ile oluşturulacak
        return $this->response->setJSON($PNR);
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