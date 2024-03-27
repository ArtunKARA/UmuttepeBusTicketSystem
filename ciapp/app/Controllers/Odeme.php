<?php

namespace App\Controllers;
use App\Libraries\Iyzico;

class Odeme extends BaseController
{
    public function index(): string 
    {
        $user = session()->get('user');
        return View('kullanici/kullaniciHeader.php')
              .View('kullanici/kullaniciGirisYap.php')
              .View('odeme/odemeKart.php')
              .View('kullanici/kullaniciFooter.php');
    }

    public function payment()
    {
        $user = session()->get('user');
        if (!$user) {
            return redirect()->to('/login');
        }
        
        $iyzico = new Iyzico();
        $payment = $iyzico->setForm([
            'conversationID' => '123456789',
            'price' => 180.0,
            'paidPrice' => 186.0,
            'basketID' => 'SPT123456',
        ])
        ->setBuyer([
            'id' => 123,
            'name' => 'Mahmut',
            'surname' => 'Uzunadam',
            'phone' => '05071234567',
            'email' => 'example@example.com',
            'identity' => '12345678901',
            'address' => 'Alıcı Adresi İstanbul',
            'ip' => $this->request->getIPAddress(),
            'city' => 'İstanbul',
            'country' => 'Türkiye',
        ])
        ->setShipping([
            'name' => 'Veli Kısabacak',
            'city' => 'Ankara',
            'country' => 'Türkiye',
            'address' => 'Kargonun gideceği adres Ankara',
        ])
        ->setBilling([
            'name' => 'Veli Kısabacak',
            'city' => 'Ankara',
            'country' => 'Türkiye',
            'address' => 'Kargonun gideceği adres Ankara',
        ])
        ->setItems([
            [
                'id' => 8749,
                'name' => 'Kırmızı Ayakkabı',
                'category' => 'Erkek Ayakkabı',
                'price' => 60.0,
            ],
            [
                'id' => 8750,
                'name' => 'Siyah Ayakkabı',
                'category' => 'Erkek Ayakkabı',
                'price' => 60.0,
            ],
            [
                'id' => 8751,
                'name' => 'Mavi Ayakkabı',
                'category' => 'Erkek Ayakkabı',
                'price' => 60.0,
            ],
        ])
        ->paymentForm();

    return view('odeme-yap', [
        'paymentContent' => $payment->getCheckoutFormContent(),
        'paymentStatus' => $payment->getStatus(),
    ]);
    }

    public function callback()
    {
        $token = $_REQUEST['token'];
        $conversionID = '123456789';
        $iyzico = new Iyzico();
        $response = $iyzico->callbackForm($token, $conversionID);

        return view('callback', [
            'paymentStatus' => $response->getPaymentStatus(),
        ]);
    }
}
?>