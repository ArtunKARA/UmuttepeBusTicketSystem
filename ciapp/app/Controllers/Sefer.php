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

    

}
?>