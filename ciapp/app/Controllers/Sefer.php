<?php

namespace App\Controllers;

use App\Models\AdminSeferModel;//class adı model değil

class Sefer extends BaseController
{
 
    public function SeferDetay(): string
    {
        $user = session();
        $seferModel = new AdminSeferModel;//class adı model değil
        $data = [
            'seferler' => $seferModel->getAllSeferler()
        ];
        
        return View('admin/adminHeader.php')
        .View('admin/SeferTanimlari/adminSeferler.php', $data)
        .View('admin/adminFooter.php');
    }

    public function showSefer($id): string
    {
        $user = session();
        $seferModel = new AdminSeferModel;
        $data = [
            'sefer' => $seferModel->getSeferByID($id)
        ];
        
        return View('admin/adminHeader.php')
        .View('admin/AracTanimlari/otobusDuzenle.php', $data)
        .View('admin/adminFooter.php');
    }


    public function SeferGuncele(): string
    {
        $user = session();
        $seferModel = new AdminSeferModel;
        $sefer = [
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