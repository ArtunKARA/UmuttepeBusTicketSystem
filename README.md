# Örnek Sayfalar
## Giriş Sayfası
![Ekran görüntüsü 2024-05-01 163441](https://github.com/ArtunKARA/UmuttepeBusTicketSystem/assets/76822513/7560e1e0-df3f-4e81-ab1c-f510931f3b5b)
## Kayıt Ol
![image](https://github.com/ArtunKARA/UmuttepeBusTicketSystem/assets/76822513/494516a0-55f7-4cd9-996f-d25fcc644d96)
## PNR Sorgu
![WhatsApp Görsel 2024-03-24 saat 16 37 00_2870b64a](https://github.com/ArtunKARA/UmuttepeBusTicketSystem/assets/76822513/6dfec659-25ca-4f39-b21e-730e4af16bb3)
## Kullanıcı Sayfası
![image](https://github.com/ArtunKARA/UmuttepeBusTicketSystem/assets/76822513/7284af56-822d-4e43-aec9-acdd569153c9)
## Kullanıcı Biletler
![WhatsApp Görsel 2024-03-23 saat 21 17 56_99df3e73](https://github.com/ArtunKARA/UmuttepeBusTicketSystem/assets/76822513/6e389860-3f19-4649-81a7-62144a9273d6)
## Kullanıcı Kartları
![image](https://github.com/ArtunKARA/UmuttepeBusTicketSystem/assets/76822513/ffa06036-d957-4be8-a59c-f2aa01afe4d1)
## Seferler
![image](https://github.com/ArtunKARA/UmuttepeBusTicketSystem/assets/76822513/2f33780c-f477-4586-808e-f70c251f80f6)
## Güzergah Detay
![image](https://github.com/ArtunKARA/UmuttepeBusTicketSystem/assets/76822513/1bbb01d7-a3ee-4f31-8e1d-ac51a1b6f366)
## Bilet Bilgileri
![image](https://github.com/ArtunKARA/UmuttepeBusTicketSystem/assets/76822513/c29cecc7-e289-4d79-815b-7ca7ba1ab752)
## Ödeme Sayfası
![image](https://github.com/ArtunKARA/UmuttepeBusTicketSystem/assets/76822513/2f4d32b0-9f05-44a4-9cda-be11e2d67a90)


# Otobüs Bilet Satış Sistemi

Bu proje, otobüs biletlerinin çevrimiçi olarak satılmasını sağlayan bir web uygulamasıdır. CodeIgniter 4 kullanılarak PHP ile geliştirilmiştir.

## Başlangıç

Bu talimatlar, projeyi yerel makinanızda çalıştırmak ve geliştirme yapmak için gerekli adımları içerir.

### Gereksinimler

Bu projeyi çalıştırmak için şunlara ihtiyacınız olacak:

- PHP 7.2 veya daha yeni bir sürüm
- Composer

### Kurulum

1. Depoyu klonlayın:

git clone https://github.com/ArtunKARA/UmuttepeBusTicketSystem.git

2. Projedeki dizine gidin:

cd ciapp

3. Bağımlılıkları yüklemek için Composer kullanın:

composer install

4. .env dosyasını oluşturun ve gerekli ayarları yapın:

cp .env.example .env

5. Veritabanı ayarlarını .env dosyasında yapılandırın.

6. Veritabanını oluşturmak ve tabloları oluşturmak için Migration'ları çalıştırın:

php spark migrate

7. Development sunucusunu başlatmak için:

php spark serve

8. Tarayıcınızda http://localhost:8080/UmuttepeBusTicketSystem/ciapp/public/ adresine gidin.

## Kullanım

Bu bölüm, uygulamanın nasıl kullanılacağına dair temel bilgiler içerir. Örneğin:

- Oturum açma/çıkma
- Bilet arama ve satın alma
- Rezervasyon yapma
- vb.

Admin paneline erişmek için, tarayıcınızda http://localhost:8080/UmuttepeBusTicketSystem/ciapp/public/admn/dashboard adresine gidin.

## Lisans

Bu proje MIT lisansı altında lisanslanmıştır.
