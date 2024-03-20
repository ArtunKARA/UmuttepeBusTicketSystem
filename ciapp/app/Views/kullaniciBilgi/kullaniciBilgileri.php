<!--- Kişi bilet bilgilerinin girilişi ---->
<div class="selectroom">
  <div class="container">
    <div class="selectroom_top">
      <h2>
        <span style="color: greenyellow;">Bilet Sahibinin</span>
      </h2>
      <div class="selectroom-info animated wow fadeInUp animated" data-wow-duration="1200ms" data-wow-delay="500ms" style="visibility: visible; animation-duration: 1200ms; animation-delay: 500ms; animation-name: fadeInUp;">
        <div class="modal-body modal-spa">
          <div class="kart-grids">
            <div class="login">
              <div class="row">
                <div class="kart-right">
                  <form>
                    <div style="float: left;">
                      <input type="radio" id="kadın" name="cinsiyet" value="Kadın" required checked>
                      <label for="kadın" style="color: #4CB320;">Kendim İçin</label>
                    </div>
                    <div style="float: left; margin-left: 10px;">
                      <input type="radio" id="erkek" name="cinsiyet" value="Erkek" required>
                      <label for="erkek" style="color: #4CB320;">Yeni Kişi</label>
                    </div>
                    <input type="text" value="İsim" onfocus="this.value = '';" onblur="if (this.value == '') {this.value = 'İsim';}" required="">
                    <!-- Vatandaşlık sorgu -->
                    <input type="radio" style="color: #4CB320; float: left; margin-right: 10px;" id="tcVatandası" name="kimlikTuru" value="TC" checked>
                    <label for="tcVatandası" style="color: #4CB320; float: left; margin-right: 10px;">TC Vatandaşı</label>
                    <input type="radio" style="color: #4CB320; float: left; margin-right: 10px;" id="yabancı" name="kimlikTuru" value="yabancı">
                    <label for="yabancı" style="color: #4CB320; float: left; margin-right: 10px;">Yabancı</label>
                    <div id="kimlikBilgisi">
                      <input type="text" id="tcNo" placeholder="TC Kimlik No" required>
                    </div>
                    <script>
                      const tcNoInput = document.getElementById("tcNo");
                      const kimlikTuruRadio = document.querySelectorAll('input[name="kimlikTuru"]');
                      kimlikTuruRadio.forEach(radio => {
                        radio.addEventListener("change", function() {
                          if (this.value === "TC") {
                            tcNoInput.placeholder = "TC Kimlik No";
                            tcNoInput.setAttribute("pattern", "[0-9]{11}");
                          } else {
                            tcNoInput.placeholder = "Pasaport No";
                            tcNoInput.removeAttribute("pattern");
                          }
                        });
                      });
                    </script>
                    <!-- /Vatandaşlık sorgu -->
                    <input type="text" value="Telefon numarası" onfocus="this.value = '';" onblur="if (this.value == '') {this.value = 'Telefon numarası';}" required="">
                    <input type="text" value="E-mail" onfocus="this.value = '';" onblur="if (this.value == '') {this.value = 'E-mail';}" required="">
                    <!-- ikili blok -->
                    <div class="ban-bottom">
                    <div class="bnr-right ">
                      <label class="inputLabel" style="color: #4CB320; float:left;">Bilet Türü Seçiniz</label>
                      <select style="width: 100% !important;color: #9E9E9E;outline: none;font-size: 14px;padding: 10px 10px !important; border: 1px solid #9E9E9E;-webkit-appearance: none;margin-top: 10px; border: 1px solid #E6E4E4 !important;"id="biletTuru" class="city" name="biletTuru" required>
                        <option value="tam">Tam</option>
                        <option value="yediYasAlti">7 Yaş Altı(Ücretsiz)</option>
                        <option value="65Yasveustune">65 Yaş ve Üstüne(%15)</option>
                        <option value="memur">Memur(%15)</option>
                        <option value="guvenlikGucleri"> Güvenlik Güçleri(Ücretsiz)</option>
                      </select>
                    </div>
                      <div class="bnr-right">
                        <label class="inputLabel" style="color: #4CB320; float:left;">Doğum Tarihi</label>
                        <input class="date" id="dogumTarihi" type="text" value="gün/ay/yıl" onfocus="this.value = '';" onblur="if (this.value == '') {this.value = 'gün/ay/yıl';}" required=>
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
                          <label class="inputLabel" style="color: #4CB320; float: left; margin-right: 10px;">Cinsiyet</label>
                          <div style="float: left;">
                            <input type="radio" id="kadın" name="cinsiyet" value="Kadın" required>
                            <label for="kadın" style="color: #4CB320;">Kadın</label>
                          </div>
                          <div style="float: left; margin-left: 10px;">
                            <input type="radio" id="erkek" name="cinsiyet" value="Erkek" required>
                            <label for="erkek" style="color: #4CB320;">Erkek</label>
                          </div>
                        </div>
                      </div>

                      </form>
                      <div class="bnr-right">
                      <form method="post" action="<?php echo Base_url('UmuttepeBusTicketSystem/ciapp/public/odeme'); ?>">
                        <button class="btn" style="width: 100% ;color:white;background-color: #4CB320;outline: none;font-size: 14px;padding: 10px 10px ; border: 1px solid #9E9E9E;-webkit-appearance: none;margin-top: 10px; border: 1px solid #E6E4E4 ;">Ödeme</button>
                        </form>
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
</div>
<!--- /Kişi bilet bilgilerinin girilişi ---->