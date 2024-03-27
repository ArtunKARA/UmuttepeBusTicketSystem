<?php

namespace App\Controllers;

use App\Models\AdminUyeModel;//class adı model değil

class Uye extends BaseController
{

    public function IndexUye(): string
    {
        $session = session();
        $user = $session->get('uye');
        $uyeModel = new AdminUyeModel;//class adı model değil
        $data = [
            'kullanici' => $uyeModel->uyeQuery()
        ];
        
        return View('admin/adminHeader.php')
        .View('admin/KullaniciTanimlari/adminKullanici.php', $data)
        .View('admin/adminFooter.php');
    }
   
}
?>