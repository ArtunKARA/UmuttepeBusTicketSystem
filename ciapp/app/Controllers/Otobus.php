<?php

namespace App\Controllers;

use App\Models\OtobusModel;

class Otobus extends BaseController{
    public function index(): string
    {
        $otobusModel = new OtobusModel;
        $data = [
            'otobusler' => $otobusModel->customQuery()
        ];
        
        return View('admin/adminHeader.php')
        .View('admin/AracTanimlari/Otobus/index.php', $data)
        .View('admin/adminFooter.php');
    }

    public function show($id): string
    {
        $otobusModel = new OtobusModel;
        $data = [
            'otobus' => $otobusModel->find($id)
        ];
        
        return View('admin/adminHeader.php')
        .View('admin/AracTanimlari/Otobus/show.php', $data)
        .View('admin/adminFooter.php');
    }

    public function create(): string
    {
        $otobusModel = new OtobusModel;
        $data = [
            'otobus' => $otobusModel->insert($_POST)
        ];
        
        return View('admin/adminHeader.php')
        .View('admin/AracTanimlari/Otobus/create.php', $data)
        .View('admin/adminFooter.php');
    }

    public function deleteOtobus($id): string
    {
        $otobusModel = new OtobusModel;
        $data = [
            'otobus' => $otobusModel->delete($id)
        ];
        
        return View('admin/adminHeader.php')
        .View('admin/AracTanimlari/Otobus/delete.php', $data)
        .View('admin/adminFooter.php');
    }
}

