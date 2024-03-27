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
        .View('admin/SeferTanimlari/seferDuzenle.php', $data)
        .View('admin/adminFooter.php');
    }


    public function SeferGuncelle(): string
    {
        $user = session();
        $seferModel = new AdminSeferModel;
        $sefer = [
            'OtobusID' => $_POST['OtobusID'],
            'Aktif' => $_POST['Aktif']
        ];

        $data = [
            'sefer' => $seferModel->updateSefer($_POST['ID'], $sefer)
        ];

        $data = [
            'seferler' => $seferModel->customQuery()
        ];
        
        return View('admin/adminHeader.php')
        .View('admin/SeferTanimlari/seferDuzenle.php', $data)
        .View('admin/adminFooter.php');
    }
}
?>