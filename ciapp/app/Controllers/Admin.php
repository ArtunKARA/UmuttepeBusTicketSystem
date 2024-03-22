<?php

namespace App\Controllers;

use App\Models\OtobusModel;

class Admin extends BaseController
{
    public function index(): string
    {
        $user = session();
        return View('admin/adminHeader.php')
        .View('admin/adminHome.php')
        .View('admin/adminFooter.php');
    }



    public function indexOtobus(): string
    {
        $user = session();
        $otobusModel = new OtobusModel;
        $data = [
            'otobusler' => $otobusModel->customQuery()
        ];
        
        return View('admin/adminHeader.php')
        .View('admin/AracTanimlari/adminOtobus.php', $data)
        .View('admin/adminFooter.php');
    }

    public function showOtobus($id): string
    {
        $user = session();
        $otobusModel = new OtobusModel;
        $data = [
            'otobus' => $otobusModel->getOtobusByID($id)
        ];
        
        return View('admin/adminHeader.php')
        .View('admin/AracTanimlari/otobusDuzenle.php', $data)
        .View('admin/adminFooter.php');
    }

    public function create(): string
    {
        $user = session();
        $otobusModel = new OtobusModel;
        $data = [
            'otobus' => $otobusModel->insert($_POST)
        ];
        
        return View('admin/adminHeader.php')
        .View('admin/AracTanimlari/create.php', $data)
        .View('admin/adminFooter.php');
    }

    public function deleteOtobus($id): string
    {
        $user = session();
        $otobusModel = new OtobusModel;
        $data = [
            'otobus' => $otobusModel->delete($id)
        ];
        $data = [
            'otobusler' => $otobusModel->customQuery()
        ];
        
        return View('admin/adminHeader.php')
        .View('admin/AracTanimlari/adminOtobus.php', $data)
        .View('admin/adminFooter.php');
    }

    public function otobusGuncele(): string
    {
        $user = session();
        $otobusModel = new OtobusModel;
        $otobus = [
            'Isim' => $_POST['Isim'],
            'Plaka' => $_POST['Plaka'],
            'KoltukSayisi' => $_POST['KoltukSayisi'],
            'Aktif' => $_POST['Aktif']
        ];
        $data = [
            'otobus' => $otobusModel->updateOtobus($_POST['ID'], $otobus)
        ];
        $data = [
            'otobusler' => $otobusModel->customQuery()
        ];
        
        return View('admin/adminHeader.php')
        .View('admin/AracTanimlari/adminOtobus.php', $data)
        .View('admin/adminFooter.php');
    }

}
?>