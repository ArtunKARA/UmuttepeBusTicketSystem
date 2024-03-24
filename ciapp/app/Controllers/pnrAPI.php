<?php

namespace App\Controllers;
use App\Models\pnrApiModel;

class pnrAPI extends BaseController
{
    public function pnrAPI() 
    {
        $pnr = $this->request->getGet('pnr');
        $model = new pnrApiModel();
        $data = $model->pnrSorgu($pnr);
        return $this->response->setJSON($data);
    }

    public function pnrSorgu() 
    {
        return View('kullanici/kullaniciHeader.php')
        .View('kullanici/kullaniciGirisYap.php')
        .View('kullanici/pnrSorgula.php')
        .View('kullanici/kullaniciFooter.php');
    }

}
?>