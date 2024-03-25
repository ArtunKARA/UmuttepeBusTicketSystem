-- DATABASE OLUŞTURMA VE SEÇME
CREATE DATABASE UMUTTEPEOTOBUSBILETSISTEMI;
USE UMUTTEPEOTOBUSBILETSISTEMI;

-- TABLO OLUŞTURMA KOMUTLARI
CREATE TABLE SEHIR(
    ID INT PRIMARY KEY AUTO_INCREMENT,
    Sehir nvarchar(50) NOT NULL,
    TeriminalAdi nvarchar(150) NOT NULL,
    SehirKodu INT NOT NULL, 
    Peron nvarchar(5) NOT NULL, 
    Aktif TINYINT(1) NOT NULL
);

CREATE TABLE OTOBUS(
    ID INT PRIMARY KEY AUTO_INCREMENT,
    Isim nvarchar(50) NOT NULL,
    Plaka nvarchar(11) NOT NULL,
    KoltukSayisi int NOT NULL,
    Aktif TINYINT(1) NOT NULL
);

CREATE TABLE SEFER(
    ID INT PRIMARY KEY AUTO_INCREMENT,
    KalkisSehirID int,
    FOREIGN KEY (KalkisSehirID) REFERENCES SEHIR(ID),
    VarisSehirID int,
    FOREIGN KEY (VarisSehirID) REFERENCES SEHIR(ID),
    OtobusID int,
    FOREIGN KEY (OtobusID) REFERENCES OTOBUS(ID),
    KalkisSaat TIME,
    VarisSaat TIME,
    Fiyat DECIMAL,
    Aktif TINYINT(1)
);

CREATE TABLE KULLANICI (
    ID INT PRIMARY KEY AUTO_INCREMENT,
    Isim NVARCHAR(50),
    TcVatandas TINYINT(1), -- 1:vatandaş, 0:değil
    VatandasNo VARCHAR(11),
    DogumTarihi DATE,
    Cinsiyet TINYINT(1), -- 1:kız, 0:erkek
    TelefonNo varchar(12),
    Mail NVARCHAR(150),
    Sifre NVARCHAR(50),
    KullaniciTipi TINYINT(1),
    Bakiye INT
);

CREATE TABLE KULANICIOLMAYAN (
    ID INT PRIMARY KEY AUTO_INCREMENT,
    Isim NVARCHAR(50),
    TcVatandas TINYINT(1),
    VatandasNo VARCHAR(11),
    DogumTarihi DATE,
    Cinsiyet TINYINT(1),
    TelefonNo varchar(11),
    Mail NVARCHAR(150)
);

CREATE TABLE KARTBILGILERI(
    ID INT PRIMARY KEY AUTO_INCREMENT,
    KullaniciID INT,
    FOREIGN KEY (KullaniciID) REFERENCES KULLANICI(ID),
    KartNumarasi varchar(20),
    SonKullanmaTarihi varchar(5),
    CVV int
);

CREATE TABLE BILET(
    ID INT PRIMARY KEY AUTO_INCREMENT,
    PNR nvarchar(50),
    KullaniciID int,
    FOREIGN KEY (KullaniciID) REFERENCES KULLANICI(ID),
    KullaniciOlmayanID INT,
    FOREIGN KEY (KullaniciOlmayanID) REFERENCES KULANICIOLMAYAN(ID),
    SeferID int,
    FOREIGN KEY (SeferID) REFERENCES SEFER(ID),
    Tarih DATE,
    KoltukNo int,
    BiletTur varchar(4), -- a:aktif, g:geçmiş, r:rezervasyon, p:açığa alınanlar
    BiletUcret INT
);

-- Sehir Tablosu Test Verisi
INSERT INTO SEHIR (ID, Sehir, TeriminalAdi, Aktif, SehirKodu, Peron) VALUES
(1, 'Istanbul', 'Harem Otogarı', 1, 34, 'H'),
(2, 'Ankara', 'AŞTİ', 1, 06, 'E'),
(3, 'Antalya', 'Antalya Şehirlerarası Otobüs Terminali', 1, 07, 'I'),
(4, 'Izmir', 'İzmir Şehirlerarası Otobüs Terminali', 1, 35, 'A');

-- Otobus Tablosu Test Verisi
INSERT INTO OTOBUS (ID, Isim, Plaka, KoltukSayisi, Aktif) VALUES
(1, 'Mercedes Travego', '34ABC123', 32, 1),
(2, 'MAN Lions Coach', '06DEF789', 32, 1),
(3, 'Neoplan Starliner', '35GHI456', 32, 1),
(4, 'Volvo Turismo', '41KCL250', 32, 1),
(5, 'Scania Irizar', '01ADN235', 32, 1),
(6, 'Setra ComfortClass', '22EDR071', 32, 1),
(7, 'Ayats Bravo', '45MNS236', 32, 1),
(8, 'Mercedes Travego', '34PQR987', 32, 1),
(9, 'MAN Lions Coach', '06STU543', 32, 1),
(10, 'Neoplan Starliner', '35VWX321', 32, 1),
(11, 'Volvo Turismo', '41YZA789', 32, 1),
(12, 'Scania Irizar', '01BCD456', 32, 1),
(13, 'Setra ComfortClass', '22EFG123', 32, 1),
(14, 'Ayats Bravo', '45HIJ789', 32, 1),
(15, 'Mercedes Travego', '34KLM456', 32, 1),
(16, 'MAN Lions Coach', '06NOP123', 32, 1),
(17, 'Neoplan Starliner', '35QRS789', 32, 1),
(18, 'Volvo Turismo', '41TUV456', 32, 1),
(19, 'Mercedes Travego', '34XYZ123', 32, 0),
(20, 'MAN Lions Coach', '06UVW789', 32, 0),
(21, 'Neoplan Starliner', '35EFG456', 32, 0),
(22, 'Volvo Turismo', '41HIJ250', 32, 0),
(23, 'Scania Irizar', '01KLM235', 32, 0),
(24, 'Setra ComfortClass', '22OPQ071', 32, 0);

-- Sefer Tablosu Test Verisi
INSERT INTO SEFER (ID, KalkisSehirID, VarisSehirID, OtobusID, KalkisSaat, VarisSaat, Fiyat, Aktif) VALUES
(1, 1, 2, 1, '10:00:00', '14:40:00', 50.00, 1),-- 1-2, 2-1: 4.40
(2, 1, 3, 2, '14:00:00', '22:10:00', 80.00, 1),-- 1-3, 3-1 :8.10
(3, 1, 4, 3, '08:00:00', '12:30:00', 45.00, 1),-- 1-4, 4-1: 4.30
(4, 2, 1, 1, '14:50:00', '19:30:00', 50.00, 1),-- 
(5, 2, 3, 4, '09:00:00', '15:20:00', 70.00, 1),-- 2-3, 3-2 :6.20
(6, 2, 4, 5, '07:00:00', '13:50:00', 65.00, 1),-- 2-4, 4-2 :6.50
(7, 3, 1, 2, '22:20:00', '07:30:00', 80.00, 1),--
(8, 3, 2, 4, '15:30:00', '21:50:00', 70.00, 1),--
(9, 3, 4, 6, '11:00:00', '16:30:00', 60.00, 1),-- 3-4,4-3 : 5.30
(10, 4, 1, 3, '12:40:00', '17:10:00', 45.00, 1),--
(11, 4, 2, 5, '14:00:00', '20:50:00', 65.00, 1),--
(12, 4, 3, 6, '16:40:00', '22:10:00', 60.00, 1),--

(13, 1, 2, 7, '18:00:00', '22:40:00', 50.00, 1),-- 1-2, 2-1: 4.40
(14, 1, 3, 8, '22:00:00', '06:10:00', 80.00, 1),-- 1-3, 3-1 :8.10
(15, 1, 4, 9, '16:00:00', '20:30:00', 45.00, 1),-- 1-4, 4-1: 4.30
(16, 2, 1, 7, '22:50:00', '03:30:00', 50.00, 1),-- 
(17, 2, 3, 10, '17:00:00', '23:20:00', 70.00, 1),-- 2-3, 3-2 :6.20
(18, 2, 4, 11, '15:00:00', '21:50:00', 65.00, 1),-- 2-4, 4-2 :6.50
(19, 3, 1, 8, '06:20:00', '15:30:00', 80.00, 1),--
(20, 3, 2, 10, '23:30:00', '05:50:00', 70.00, 1),--
(21, 3, 4, 12, '19:00:00', '00:30:00', 60.00, 1),-- 3-4,4-3 : 5.30
(22, 4, 1, 9, '20:40:00', '01:10:00', 45.00, 1),--
(23, 4, 2, 11, '22:00:00', '04:50:00', 65.00, 1),--
(24, 4, 3, 12, '00:40:00', '06:10:00', 60.00, 1),--

(25, 1, 2, 13, '02:00:00', '06:40:00', 50.00, 1),-- 1-2, 2-1: 4.40
(26, 1, 3, 14, '06:00:00', '14:10:00', 80.00, 1),-- 1-3, 3-1 :8.10
(27, 1, 4, 15, '00:00:00', '04:30:00', 45.00, 1),-- 1-4, 4-1: 4.30
(28, 2, 1, 13, '06:50:00', '11:30:00', 50.00, 1),-- 
(29, 2, 3, 16, '01:00:00', '07:20:00', 70.00, 1),-- 2-3, 3-2 :6.20
(30, 2, 4, 17, '23:00:00', '05:50:00', 65.00, 1),-- 2-4, 4-2 :6.50
(31, 3, 1, 14, '14:20:00', '23:30:00', 80.00, 1),--
(32, 3, 2, 16, '07:30:00', '13:50:00', 70.00, 1),--
(33, 3, 4, 18, '03:00:00', '08:30:00', 60.00, 1),-- 3-4,4-3 : 5.30
(34, 4, 1, 15, '04:40:00', '09:10:00', 45.00, 1),--
(35, 4, 2, 17, '06:00:00', '12:50:00', 65.00, 1),--
(36, 4, 3, 18, '08:40:00', '14:10:00', 60.00, 1);--

-- Kullanici Tablosu Test Verisi
INSERT INTO KULLANICI (ID, Isim, TcVatandas, VatandasNo, DogumTarihi, Cinsiyet, TelefonNo, Mail, Sifre, KullaniciTipi, Bakiye) VALUES
(1, 'Ahmet Yılmaz', 1, '12345678901', '1985-05-15', 0, 5551234567, 'ahmet@email.com', 'ahmet123', 0, 150.00),
(2, 'Ayşe Demir', 1, '2345678902', '1990-08-22', 1, 5559876543, 'ayse@email.com', 'ayse456', 0, 200.00),
(3, 'Admin User', 0, 'AB123456', '1995-01-10', 0, 5551112233, 'admin@email.com', 'adminpass', 1, 0.00),
(4, 'Can Demir', 1, '2345678903', '1997-02-08', 0, 5533145685, 'can@email.com', 'can456', 0, 15.00),
(5, 'Burak Çelik', 0, 'US789012', '2005-10-01', 0, 53154487589, 'burak@email.com', 'burak456', 0, 480.00),
(6, 'Selin Ekinci', 1, '2345678904', '1991-08-23', 1, 5050647856, 'selin@email.com', 'selin456', 0, 16.00),
(7, 'Deniz Kaya', 1, '2345678905', '1988-11-17', 0, 5554443333, 'deniz@email.com', 'deniz789', 0, 100.00),
(8, 'Ebru Tekin', 1, '2345678906', '1994-06-25', 1, 5556667777, 'ebru@email.com', 'ebru123', 0, 75.00),
(9, 'Fatih Duran', 1, '2345678907', '1999-03-14', 0, 5552221111, 'fatih@email.com', 'fatih456', 0, 200.00),
(10, 'Gizem Yıldız', 0, 'UK345678', '2002-09-30', 1, 5553334444, 'gizem@email.com', 'gizem789', 0, 150.00),
(11, 'Hasan Korkmaz', 1, '2345678908', '1993-12-05', 0, 5558889999, 'hasan@email.com', 'hasan123', 0, 125.00),
(12, 'Ipek Şahin', 0, 'FR901234', '1990-07-20', 1, 5555555555, 'ipek@email.com', 'ipek456', 0, 300.00),
(13, 'Jale Toprak', 1, '2345678909', '1987-04-18', 1, 5559998888, 'jale@email.com', 'jale789', 0, 80.00),
(14, 'Kaan Demirci', 1, '2345678910', '1995-01-27', 0, 5556663333, 'kaan@email.com', 'kaan123', 0, 180.00),
(15, 'Leyla Arslan', 0, 'DE567890', '1998-08-10', 1, 5552223333, 'leyla@email.com', 'leyla456', 0, 90.00),
(16, 'Mehmet Yılmaz', 1, '2345678911', '1991-05-22', 0, 5554445555, 'mehmet@email.com', 'mehmet789', 0, 220.00),
(17, 'Nalan Er', 0, 'JP234567', '1986-02-14', 1, 5557778888, 'nalan@email.com', 'nalan123', 0, 70.00),
(18, 'Özgür Ak', 1, '2345678912', '1989-09-08', 0, 5551112222, 'ozgur@email.com', 'ozgur456', 0, 110.00),
(19, 'Pınar Akgün', 0, 'CN890123', '1996-11-29', 1, 5555554444, 'pinar@email.com', 'pinar789', 0, 260.00),
(20, 'Rabia Eren', 1, '2345678913', '1994-10-05', 1, 5556669999, 'rabia@email.com', 'rabia123', 0, 50.00),
(21, 'Sefa Demir', 1, '2345678914', '1985-07-13', 0, 5553332222, 'sefa@email.com', 'sefa456', 0, 300.00),
(22, 'Şeyma Balcı', 0, 'AU456789', '1997-03-18', 1, 5551110000, 'seyma@email.com', 'seyma789', 0, 150.00),
(23, 'Tolga Ceylan', 1, '2345678915', '1992-04-09', 0, 5559990000, 'tolga@email.com', 'tolga123', 0, 180.00),
(24, 'Ümit Çetin', 1, '2345678916', '1999-01-15', 0, 5554440000, 'umit@email.com', 'umit456', 0, 120.00),
(25, 'Vildan Durmuş', 0, 'IT012345', '1990-08-22', 1, 5556661111, 'vildan@email.com', 'vildan789', 0, 90.00),
(26, 'Yasin Ertürk', 1, '2345678917', '1987-12-03', 0, 5553336666, 'yasin@email.com', 'yasin123', 0, 200.00),
(27, 'Zehra Fidan', 0, 'BR678901', '1995-06-27', 1, 5551119999, 'zehra@email.com', 'zehra456', 0, 75.00),
(28, 'Ahmet Kaya', 0, 'CA123456', '1988-05-11', 0, 5552228888, 'ahmetkaya@email.com', 'ahmetkaya123', 0, 150.00),
(29, 'Ayşe Öztürk', 1, '2345678918', '1991-09-09', 1, 5553338888, 'ayseozturk@email.com', 'ayseozturk789', 0, 180.00),
(30, 'Ali Yıldırım', 1, '2345678919', '1994-02-28', 0, 5555558888, 'aliyildirim@email.com', 'aliyildirim123', 0, 210.00),
(31, 'Betül Şen', 0, 'MX789012', '1989-07-19', 1, 5556667777, 'betulsen@email.com', 'betulsen789', 0, 95.00),
(32, 'Cemal Korkut', 0, 'ES345678',  '1996-10-25', 0, 5557776666, 'cemalkorkut@email.com', 'cemalkorkut123', 0, 120.00),
(33, 'Derya Yüksel', 1, '2345678920', '1993-04-15', 1, 5558885555, 'deryayuksel@email.com', 'deryayuksel789', 0, 240.00),
(34, 'Emre Avcı', 0, 'IN901234', '1986-08-30', 0, 5559994444, 'emreavci@email.com', 'emreavci123', 0, 180.00),
(35, 'Fatma Taş', 1, '2345678921', '1998-12-20', 1, 5551117777, 'fatmattas@email.com', 'fatmattas789', 0, 130.00),
(36, 'Gökhan Demirtaş', 1, '2345678922', '1991-03-05', 0, 5553334444, 'gokhandemirtas@email.com', 'gokhandemirtas123', 0, 170.00),
(37, 'Hakan Aydın', 1, '2345678923', '1997-05-12', 0, 5556661111, 'hakan@email.com', 'hakan123', 0, 200.00),
(38, 'İrem Çelik', 1, '2345678934', '1994-08-25', 1, 5557772222, 'irem@email.com', 'irem456', 0, 180.00),
(39, 'Jülide Demir', 1, '2345678924', '1990-01-08', 0, 5558883333, 'julide@email.com', 'julide123', 0, 150.00),
(40, 'Kadir Ekmekçi', 1, '2345678925', '1988-11-03', 0, 5559994444, 'kadir@email.com', 'kadir456', 0, 220.00),
(41, 'Lale Genç', 1, '2345678935', '1996-06-19', 1, 5551112222, 'lale@email.com', 'lale123', 0, 160.00),
(42, 'Mert Atalay', 1, '2345678926', '1992-09-27', 0, 5552223333, 'mert@email.com', 'mert456', 0, 190.00),
(43, 'Nesrin Başaran', 1, '2345678936', '1985-12-14', 1, 5553334444, 'nesrin@email.com', 'nesrin123', 0, 80.00),
(44, 'Orhan Can', 1, '2345678927', '1991-03-29', 0, 5554445555, 'orhan@email.com', 'orhan456', 0, 250.00),
(45, 'Pelin Duru', 1, '2345678937', '1998-04-05', 1, 5555556666, 'pelin@email.com', 'pelin789', 0, 170.00),
(46, 'Ramazan Emir', 1, '2345678928', '1995-07-21', 0, 5556667777, 'ramazan@email.com', 'ramazan123', 0, 300.00),
(47, 'Şule Fırat', 1, '2345678938', '1993-10-12', 1, 5557778888, 'sule@email.com', 'sule456', 0, 130.00),
(48, 'Tolga Gündoğdu', 1, '2345678929', '1990-02-18', 0, 5558889999, 'tolga@email.com', 'tolga789', 0, 180.00),
(49, 'Ülkü Kaya', 1, '2345678939', '1997-09-07', 1, 5559990000, 'ulku@email.com', 'ulku123', 0, 220.00),
(50, 'Veli Özkan', 1, '2345678930', '1994-11-24', 0, 5551112222, 'veli@email.com', 'veli456', 0, 260.00),
(51, 'Yasemin Pala', 0, 'RU567890', '1989-05-03', 1, 5552223333, 'yasemin@email.com', 'yasemin789', 0, 150.00),
(52, 'Zeynep Şimşek', 1, '2345678931', '1986-08-11', 0, 5553334444, 'zeynep@email.com', 'zeynep123', 0, 200.00),
(53, 'Ahmet Yılmaz', 1, '2345678932', '1985-05-15', 0, 5551234567, 'ahmet@email.com', 'ahmet123', 0, 150.00),
(54, 'Ayşe Demir', 1, '2345678933', '1990-08-22', 1, 5559876543, 'ayse@email.com', 'ayse456', 0, 200.00);


-- Kart Bilgileri Tablosu Test Verisi
INSERT INTO KARTBILGILERI (ID, KullaniciID, KartNumarasi, SonKullanmaTarihi, CVV) VALUES
(1, 1, 1234567890123456, '12/25', 123),
(2, 2, 9876543210987654, '06/24', 456),
(3, 3, 1111222233334444, '09/23', 789),
(4, 4, 1234567890123457, '12/26', 124),
(5, 5, 9876543210987655, '06/25', 457),
(6, 6, 1111222233334445, '09/24', 790),
(7, 7, 1234567890123458, '12/27', 125),
(8, 8, 9876543210987656, '06/26', 458),
(9, 9, 1111222233334446, '09/25', 791),
(10, 10, 1234567890123459, '12/28', 126),
(11, 11, 9876543210987657, '06/27', 459),
(12, 12, 1111222233334447, '09/26', 792),
(13, 13, 1234567890123460, '12/29', 127),
(14, 14, 9876543210987658, '06/28', 460),
(15, 15, 1111222233334448, '09/27', 793),
(16, 16, 1234567890123461, '12/30', 128),
(17, 17, 9876543210987659, '06/29', 461),
(18, 18, 1111222233334449, '09/28', 794),
(19, 19, 1234567890123462, '12/31', 129),
(20, 20, 9876543210987660, '06/30', 462),
(21, 21, 1111222233334450, '09/29', 795),
(22, 22, 1234567890123463, '01/01', 130),
(23, 23, 9876543210987661, '07/01', 463),
(24, 24, 1111222233334451, '09/30', 796),
(25, 25, 1234567890123464, '01/02', 131),
(26, 26, 9876543210987662, '07/02', 464),
(27, 27, 1111222233334452, '10/01', 797),
(28, 28, 1234567890123465, '01/03', 132),
(29, 29, 9876543210987663, '07/03', 465),
(30, 30, 1111222233334453, '10/02', 798),
(31, 31, 1234567890123466, '01/04', 133),
(32, 32, 9876543210987664, '07/04', 466),
(33, 33, 1111222233334454, '10/03', 799),
(34, 34, 1234567890123467, '01/05', 134),
(35, 35, 9876543210987665, '07/05', 467),
(36, 36, 1111222233334455, '10/04', 800),
(37, 37, 1234567890123468, '01/06', 135),
(38, 38, 9876543210987666, '07/06', 468),
(39, 39, 1111222233334456, '10/05', 801),
(40, 40, 1234567890123469, '01/07', 136),
(41, 41, 9876543210987667, '07/07', 469),
(42, 42, 1111222233334457, '10/06', 802),
(43, 43, 1234567890123470, '01/08', 137),
(44, 44, 9876543210987668, '07/08', 470),
(45, 45, 1111222233334458, '10/07', 803),
(46, 46, 1234567890123471, '01/09', 138),
(47, 47, 9876543210987669, '07/09', 471),
(48, 48, 1111222233334459, '10/08', 804),
(49, 49, 1234567890123472, '01/10', 139),
(50, 50, 9876543210987670, '07/10', 472),
(51, 51, 1111222233334460, '10/09', 805),
(52, 52, 1234567890123473, '01/11', 140),
(53, 53, 9876543210987671, '07/11', 473),
(54, 54, 1111222233334461, '10/10', 806),
(55, 2, 1234567890123474, '01/12', 141),
(56, 1, 9876543210987672, '07/12', 474);


INSERT INTO KULANICIOLMAYAN (ID, Isim, TcVatandas, VatandasNo, DogumTarihi, Cinsiyet, TelefonNo, Mail) VALUES
(1, 'Ahmet Yılmaz', 1, '12345678901', '1985-05-15', 0, 5551234567, 'ahmet@email.com'),
(2, 'Ayşe Demir', 1, '2345678902', '1990-08-22', 1, 5559876543, 'ayse@email.com'),
(3, 'Admin User', 0, 'AB123456', '1995-01-10', 0, 5551112233, 'admin@email.com'),
(4, 'Can Demir', 1, '2345678903', '1997-02-08', 0, 5533145685, 'can@email.com'),
(5, 'Burak Çelik', 0, 'US789012', '2005-10-01', 0, 53154487589, 'burak@email.com'),
(6, 'Selin Ekinci', 1, '2345678904', '1991-08-23', 1, 5050647856, 'selin@email.com'),
(7, 'Deniz Kaya', 1, '2345678905', '1988-11-17', 0, 5554443333, 'deniz@email.com'),
(8, 'Ebru Tekin', 1, '2345678906', '1994-06-25', 1, 5556667777, 'ebru@email.com'),
(9, 'Fatih Duran', 1, '2345678907', '1999-03-14', 0, 5552221111, 'fatih@email.com'),
(10, 'Gizem Yıldız', 0, 'UK345678', '2002-09-30', 1, 5553334444, 'gizem@email.com'),
(11, 'Hasan Korkmaz', 1, '2345678908', '1993-12-05', 0, 5558889999, 'hasan@email.com'),
(12, 'Ipek Şahin', 0, 'FR901234', '1990-07-20', 1, 5555555555, 'ipek@email.com'),
(13, 'Jale Toprak', 1, '2345678909', '1987-04-18', 1, 5559998888, 'jale@email.com'),
(14, 'Kaan Demirci', 1, '2345678910', '1995-01-27', 0, 5556663333, 'kaan@email.com'),
(15, 'Leyla Arslan', 0, 'DE567890', '1998-08-10', 1, 5552223333, 'leyla@email.com'),
(16, 'Mehmet Yılmaz', 1, '2345678911', '1991-05-22', 0, 5554445555, 'mehmet@email.com'),
(17, 'Nalan Er', 0, 'JP234567', '1986-02-14', 1, 5557778888, 'nalan@email.com'),
(18, 'Özgür Ak', 1, '2345678912', '1989-09-08', 0, 5551112222, 'ozgur@email.com'),
(19, 'Pınar Akgün', 0, 'CN890123', '1996-11-29', 1, 5555554444, 'pinar@email.com'),
(20, 'Rabia Eren', 1, '2345678913', '1994-10-05', 1, 5556669999, 'rabia@email.com'),
(21, 'Sefa Demir', 1, '2345678914', '1985-07-13', 0, 5553332222, 'sefa@email.com'),
(22, 'Şeyma Balcı', 0, 'AU456789', '1997-03-18', 1, 5551110000, 'seyma@email.com'),
(23, 'Tolga Ceylan', 1, '2345678915', '1992-04-09', 0, 5559990000, 'tolga@email.com'),
(24, 'Ümit Çetin', 1, '2345678916', '1999-01-15', 0, 5554440000, 'umit@email.com'),
(25, 'Vildan Durmuş', 0, 'IT012345', '1990-08-22', 1, 5556661111, 'vildan@email.com');



-- Bilet Tablosu Test Verisi
INSERT INTO BILET (ID, KullaniciID, SeferID, Tarih, KoltukNo, BiletTur, PNR, BiletUcret) VALUES
(1, 1, 1, '2024-03-10', 15, 'a', '34ÖÖ16022024004321E34ABC123', '200'),
(2, 1, 2, '2024-03-11', 16, 'r', '34ÖÖ16022024004321E34ABC124', '150'),
(3, 2, 2, '2024-03-12', 22, 'a', '34ÖS15032024150845I06DEF789', '250'),
(4, 3, 3, '2024-03-15 ', 7, 'r', '34ÖÖ18032024183205A35GHI456', '200'),
(5, 1, 1, '2024-03-18', 15, 'a', '34ÖÖ18032024084321E34ABC123', '200'),
(6, 1, 2, '2024-08-19', 16, 'r', '34ÖÖ19082024114321I06DEF789', '150'),
(7, 1, 3, '2024-03-22', 22, 'p', '34ÖS22032024150845A35GHI456', '250'),
(8, 1, 4, '2024-06-27', 7, 'g', '06ÖS27062024183205H34ABC123', '200');