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
