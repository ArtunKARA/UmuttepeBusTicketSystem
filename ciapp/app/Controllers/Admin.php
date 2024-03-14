<?php

namespace App\Controllers;

use App\Models\OtobusModel;

class Admin extends BaseController
{
    public function index(): string
    {
        return View('admin/adminHeader.php')
        .View('admin/adminHome.php')
        .View('admin/adminFooter.php');
    }

    public function otobus(): string
    {
        $otobusModel = new OtobusModel;
        $data = [
            'otobusler' => $otobusModel->findAll()
        ];

        return View('admin/adminHeader.php')
        .View('admin/AracTanimlari/Otobus/index.php', $data)
        .View('admin/adminFooter.php');
    }
}