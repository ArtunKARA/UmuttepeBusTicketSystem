<?php

namespace App\Controllers;

use App\Models\SeferModel;

class Sefer extends BaseController
{
 
    public function SeferDetay(): string
    {
        $user = session();
        $seferModel = new SeferModel;
        $data = [
            'seferler' => $seferModel->getAllSefer()
        ];
        
        return View('admin/adminHeader.php')
        .View('admin/SeferTanimlari/adminSeferler.php', $data)
        .View('admin/adminFooter.php');
    }

    

}
?>