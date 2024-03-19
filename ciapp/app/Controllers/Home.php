<?php

namespace App\Controllers;

use App\Models\userModel;

class Home extends BaseController
{
    public function index(): string 
    {
        $user = session();
        return View('kullanici/kullaniciHeader.php')
              .View('kullanici/KullaniciSeferSorgu.php')
              .View('kullanici/kullaniciGirisYap.php')
              .View('kullanici/kullaniciFooter.php');
    }
    
    public function logedUser(): string
    {
        $email = $_POST['email'];
		$password = $_POST['password'];
        $kullaniciModel = new userModel;
        $kullanici = $kullaniciModel->login($email, $password);
        if($kullanici["Mail"] != "null")
        {
            $user = session();
            $user->set($kullanici);
            
            if($kullanici['KullaniciTipi'] == 0)
            {
                return View('kullanici/kullaniciHeader.php')
                .View('kullanici/KullaniciSeferSorgu.php')
                .View('kullanici/kullaniciGirisYap.php')
                .View('kullanici/kullaniciFooter.php');
            }
            else if($kullanici['KullaniciTipi'] == 1)
            {
                return redirect()->to('/admin');
            }
        }
        else
        {
            return View('kullanici/kullaniciHeader.php')
            .View('kullanici/KullaniciSeferSorgu.php')
            .View('kullanici/kullaniciGirisYap.php')
            .View('kullanici/kullaniciFooter.php');
        }
    }

    public function logout(): string
    {
        $user = session();
        $user->destroy();
        return View('kullanici/kullaniciHeader.php')
        .View('kullanici/KullaniciSeferSorgu.php')
        .View('kullanici/kullaniciGirisYap.php')
        .View('kullanici/kullaniciFooter.php');
    }


    public function admin(): string
    {
        $user = session();
        return View('admin/adminHeader.php')
        .View('admin/adminHome.php')
        .View('admin/adminFooter.php');
    }
}
?>