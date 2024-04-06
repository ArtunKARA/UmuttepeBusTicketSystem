<?php 
$user = session(); 
$kullanici = $user->get('user');
?>
<input type="hidden" name="biletUcreti" value="<?php echo $fiyat; ?>">
<!--- Kişi bilet bilgilerinin girilişi ---->
<form method="post" action="<?php echo Base_url('UmuttepeBusTicketSystem/ciapp/public/odeme'); ?>">
<div class="selectroom">
    <?php 
    $biletAdet = 0;
    foreach ($seciliKoltuklar as $koltuk) : 
    $biletAdet++;
    
    ?>
  <div class="container">
    <div class="selectroom_top">
      <h2>
        <span style="color: greenyellow;"><?php echo $biletAdet?>. Bilet Sahibinin</span>
      </h2>
      <div class="selectroom-info animated wow fadeInUp animated" data-wow-duration="1200ms" data-wow-delay="500ms" style="visibility: visible; animation-duration: 1200ms; animation-delay: 500ms; animation-name: fadeInUp;">
        <div class="modal-body modal-spa">
          <div class="kart-grids">
            <div class="login">
              <div class="row">
                <div class="kart-right">
                    <div style="float: left;">
                        <input class="cinsiyet<?php echo $biletAdet?>" type="radio" id="kendim<?php echo $biletAdet?>" name="biletSahibi[]" value="kendim" onclick="kendimIcinSecildi(<?php echo $biletAdet ?>)" required>
                        <label for="kendim<?php echo $biletAdet?>" style="color: #4CB320;">Kendim İçin</label>
                    </div>
                    <div style="float: left; margin-left: 10px;">
                        <input class="cinsiyet<?php echo $biletAdet?>" type="radio" id="yenikisi<?php echo $biletAdet?>" name="biletSahibi[]" value="yenikisi" onclick="yeniKisiSecildi(<?php echo $biletAdet ?>)" required checked>
                        <label for="yenikisi<?php echo $biletAdet?>" style="color: #4CB320;">Yeni Kişi</label>
                    </div>
                    <input id="id<?php echo $biletAdet?>" type="hidden">
                    <input id="isim<?php echo $biletAdet?>" type="text" name="isim[]" placeholder="İsim" required="">
                    <!-- Vatandaşlık sorgu -->
                        <input class="vatandaslik<?php echo $biletAdet ?>" type="radio" style="color: #4CB320; float: left; margin-right: 10px;" id="tcVatandası<?php echo $biletAdet ?>" name="kimlikTuru[<?php echo $biletAdet ?>]" placeholder="TC" checked>
                        <label for="tcVatandası<?php echo $biletAdet ?>" style="color: #4CB320; float: left; margin-right: 10px;">TC Vatandaşı</label>
                        <input  class="vatandaslik<?php echo $biletAdet ?>" type="radio" style="color: #4CB320; float: left; margin-right: 10px;" id="yabancı<?php echo $biletAdet ?>" name="kimlikTuru[<?php echo $biletAdet ?>]" placeholder="yabancı">
                        <label for="yabancı<?php echo $biletAdet ?>" style="color: #4CB320; float: left; margin-right: 10px;">Yabancı</label>
                        <div id="kimlikBilgisi<?php echo $biletAdet ?>">
                            <input id="tcNo<?php echo $biletAdet?>" type="text" name="tcNo[]" id="tcNo<?php echo $biletAdet ?>" placeholder="TC Kimlik No" required>
                        </div>
                        <script>
                            const tcNoInput<?php echo $biletAdet ?> = document.getElementById("tcNo<?php echo $biletAdet ?>");
                            const kimlikTuruRadio<?php echo $biletAdet ?> = document.querySelectorAll('input[name="kimlikTuru[<?php echo $biletAdet ?>]"]');
                            kimlikTuruRadio<?php echo $biletAdet ?>.forEach(radio => {
                                radio.addEventListener("change", function() {
                                    if (this.value === "TC") {
                                        tcNoInput<?php echo $biletAdet ?>.placeholder = "TC Kimlik No";
                                        tcNoInput<?php echo $biletAdet ?>.setAttribute("pattern", "[0-9]{11}");
                                    } else {
                                        tcNoInput<?php echo $biletAdet ?>.placeholder = "Pasaport No";
                                        tcNoInput<?php echo $biletAdet ?>.removeAttribute("pattern");
                                    }
                                });
                            });
                        </script>
                    <!-- /Vatandaşlık sorgu -->
                    <input id="telefonNumarası<?php echo $biletAdet?>"  type="text" placeholder="Telefon numarası" name="telefonNumarası[]" required="">
                    <input id="email<?php echo $biletAdet?>" type="text" placeholder="E-mail" name="email[]"required="">
                    <!-- ikili blok -->
                    <div class="ban-bottom">
                      <div class="bnr-right ">
                        <label class="inputLabel" style="color: #4CB320; float:left;">Bilet Türü Seçiniz</label>
                        <select style="width: 100% !important;color: #9E9E9E;outline: none;font-size: 14px;padding: 10px 10px !important; border: 1px solid #9E9E9E;margin-top: 10px; border: 1px solid #E6E4E4 !important;" id="<?php echo $biletAdet ?>" class="biletTuru" name="biletTuru[]" required>
                          <option value="1">Tam</option>
                          <option value="0">7 Yaş Altı(Ücretsiz)</option>
                          <option value="0">65 Yaş ve Üstüne(Ücretsiz)</option>
                          <option value="0,85">Memur(%15)</option>
                          <option value="0,85">Öğrenci(%15)</option>
                          <option value="0"> Güvenlik Güçleri(Ücretsiz)</option>
                        </select>
                      </div>
                      <div class="bnr-right">
                        <label class="inputLabel" style="color: #4CB320; float:left;">Doğum Tarihi</label>
                        <input class="date" id="dogumTarihi<?php echo $biletAdet ?>" name="dogumTarihi[]" type="text" placeholder="gün/ay/yıl" required=>
                      </div>
                      <div class="clearfix"></div>
                      <!---tarih---->
                      <link rel="stylesheet" href="css/jquery-ui.css" />
                      <script src="js/jquery-ui.js"></script>
                      <script>
                        $(function() {
                          $("#datepicker,#dogumTarihi").datepicker();
                        });
                      </script>
                      <!---/tarih---->
                    </div>
                    <!-- ikili blok -->
                    <!-- ikili blok -->
                    <div class="ban-bottom">
                      <div class="bnr-right">
                        <div style="margin-bottom: 10px;">
                          <label class="inputLabel"  for"koltuk[]" style="color: #4CB320; float: left; margin-right: 10px;">Koltuk No</label>
                          <input type="text" id="cinsiyet" name="koltuk[]" value="<?php echo $koltuk['koltukNo'] ?>" readonly>
                          <label class="inputLabel" style="color: #4CB320; float:left;">Bilet Fiyatı</label>
                          <input class="text" id="fiyat<?php echo $biletAdet ?>" name="fiyat[]" type="text" value="<?php 
                          echo $fiyat;
                          ?>"  readonly required=>
                        </div>
                      </div>
                      <div class="bnr-right">
                          <label class="inputLabel" for"cinsiyet[]" style="color: #4CB320; float: left; margin-right: 10px;">Cinsiyet</label>
                          <input type="text" id="cinsiyet" name="cinsiyet[]" value="<?php echo $koltuk['cinsiyet'] ?>" readonly>
                      </div>
                      <div class="bnr-right">
                      </div>
                      <!-- ikili blok -->
                    </div>
                </div>
                <!-- /bilet sahibi bilgileri -->
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
  <?php endforeach; ?>
  <div class="container">
  
  
            <div class="login">
              <div class="row">
              
                  <div>
                      <input type="hidden" id="toplamUcretI" name="toplamUcretI" value="<?php echo ((int)$fiyat * count($seciliKoltuklar)) ?>" readonly>
                      <h3 style="display: inline;">Toplam Ücret:</h3><h3 id="toplamUcret" style="color: #4CB320; display: inline;"><?php echo ((int)$fiyat * count($seciliKoltuklar)) ?></h3><h3 style="display: inline; color: #4CB320;">TL</h3>
                      <button class="btn" style="width: 100% ;color:white;background-color: #4CB320;outline: none;font-size: 14px;padding: 10px 10px ; border: 1px solid #9E9E9E; margin-top: 10px; border: 1px solid #E6E4E4 ;">Ödeme</button>
                    </form>
                  </div>
               
              </div>
            </div>
   
   
   
  </div>
</div>
</div>
<!--- /Kişi bilet bilgilerinin girilişi ---->
<script>
    // Temel fiyatı bir değişkende sakla
    var temelFiyat = parseFloat(document.getElementsByName("biletUcreti")[0].value);
    
    var biletTuruElements = document.getElementsByClassName("biletTuru");
    Array.from(biletTuruElements).forEach(function(element) {
        element.addEventListener("change", function() {
            var secilenBiletTuru = this.value;
            var secilenBiletTuruId = this.id;
            var indirimOrani = 0;

            switch(secilenBiletTuru) {
                case "0": // 7 Yaş Altı
                    indirimOrani = 1; // Ücretsiz
                    break;
                case "1": // Tam
                    indirimOrani = 0; // İndirim yok
                    break;
                case "0,85": // Diğer indirimli türler
                    indirimOrani = 0.15; // %15 indirim
                    break;
                // Diğer durumlar için gerektiğinde eklemeler yapılabilir
            }

            var indirimMiktari = temelFiyat * indirimOrani;
            var indirimliFiyat = temelFiyat - indirimMiktari;
            var degisicekFiyat = "fiyat" + secilenBiletTuruId;
            document.getElementById(degisicekFiyat).value = indirimliFiyat.toFixed(2); // 2 ondalık hane
            
            var toplamFiyat = 0;
            var fiyatInputs = document.querySelectorAll('[id^="fiyat"]');
            fiyatInputs.forEach(function(input) {
                toplamFiyat += parseFloat(input.value);
            });
        });
    });
    
    
    function kendimIcinSecildi(idSuffix) {
        // "Kendim İçin" seçildiğinde gizli alanlardaki bilgileri doldur
        var kullaniciID = "<?php echo $kullanici['ID']; ?>";
        var kullaniciIsim = "<?php echo $kullanici['Isim']; ?>";
        var kullaniciTcVatandas = "<?php echo $kullanici['TcVatandas']; ?>";
        var kullaniciVatandasNo = "<?php echo $kullanici['VatandasNo']; ?>";
        var kullaniciDogumTarihi = "<?php echo $kullanici['DogumTarihi']; ?>";
        var kullaniciCinsiyet = "<?php echo $kullanici['Cinsiyet']; ?>";
        var kullaniciTelefonNo = "<?php echo $kullanici['TelefonNo']; ?>";
        var kullaniciMail = "<?php echo $kullanici['Mail']; ?>";
        
        document.getElementById("id" + idSuffix).value = kullaniciID;
        document.getElementById("isim" + idSuffix).value = kullaniciIsim;
        document.getElementById("tcNo" + idSuffix).value = kullaniciVatandasNo;
        document.getElementById("dogumTarihi" + idSuffix).value = kullaniciDogumTarihi;
        document.getElementById("telefonNumarası" + idSuffix).value = kullaniciTelefonNo;
        document.getElementById("email" + idSuffix).value = kullaniciMail;
        
        document.getElementById("id" + idSuffix).readOnly  = true;
        document.getElementById("isim" + idSuffix).readOnly = true;
        document.getElementById("tcNo" + idSuffix).readOnly = true;
        document.getElementById("dogumTarihi" + idSuffix).readOnly = true;
        document.getElementById("telefonNumarası" + idSuffix).readOnly = true;
        document.getElementById("email" + idSuffix).readOnly = true;
        
    }
    function yeniKisiSecildi(idSuffix) {
        document.getElementById("id" + idSuffix).value = "";
        document.getElementById("isim" + idSuffix).value = "";
        document.getElementById("tcNo" + idSuffix).value = "";
        document.getElementById("dogumTarihi" + idSuffix).value = "";
        document.getElementById("telefonNumarası" + idSuffix).value = "";
        document.getElementById("email" + idSuffix).value = "";
        
        document.getElementById("id" + idSuffix).readOnly  = false;
        document.getElementById("isim" + idSuffix).readOnly = false;
        document.getElementById("tcNo" + idSuffix).readOnly = false;
        document.getElementById("dogumTarihi" + idSuffix).readOnly = false;
        document.getElementById("telefonNumarası" + idSuffix).readOnly = false;
        document.getElementById("email" + idSuffix).readOnly = false;
    }
    
    var biletTuruElements = document.getElementsByClassName("biletTuru");
    Array.from(biletTuruElements).forEach(function(element) {
        element.addEventListener("change", function() {
            var toplamFiyat = 0;
            var fiyatInputs = document.querySelectorAll('[id^="fiyat"]');
            fiyatInputs.forEach(function(input) {
                toplamFiyat += parseFloat(input.value);
            });
            
            // Toplam fiyatı ekrana yazdır
            document.getElementById("toplamUcret").innerText = toplamFiyat.toFixed(2);
            document.getElementById("toplamUcretI").value = toplamFiyat.toFixed(2);
        });
    });
    
</script>
