<?php

namespace App\Controllers;
use App\Models\KoltukModel;

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

}
?>