<div class="selectroom">
    <div class="selectroom_top">
      <div class="container">
        <div class="col-md-8" style="float:left;">
          <h2 style="color:#34ad00 !important;">Kullanıcı <span style="color: greenyellow;">Bilgileri</span>
          </h2>
          <div class="selectroom-info animated wow fadeInUp animated" data-wow-duration="1200ms" data-wow-delay="500ms" style="visibility: visible; animation-duration: 1200ms; animation-delay: 500ms; animation-name: fadeInUp;">
            <!-- bilet sahibi bilgileri -->
            <div class="modal-body modal-spa">
              <div class="kart-grids">
                <div class="login">
                  <div class="row">
                    <div class="kart-right">
                      <form method="POST" action="<?php echo base_url('UmuttepeBusTicketSystem/ciapp/public/'); ?>kullaniciGuncelle">
                        <input name="Isim" type="text" value="<?php echo $kullanici[0]["Isim"];  ?>" required="">
                        <?php
                        if ($kullanici[0]["TcVatandas"] == 1) {
                          echo "<input type=\"radio\" style=\"color: #4CB320; float: left; margin-right: 10px;\" id=\"tcVatandası\" name=\"kimlikTuru\" value=\"TC\" checked>
                          <label for=\"tcVatandası\" style=\"color: #4CB320; float: left; margin-right: 10px;\">TC Vatandaşı</label>
                          <input type=\"radio\" style=\"color: #4CB320; float: left; margin-right: 10px;\" id=\"yabancı\" name=\"kimlikTuru\" value=\"yabancı\">
                          <label for=\"yabancı\" style=\"color: #4CB320; float: left; margin-right: 10px;\">Yabancı</label>";
                        } 
                        ?>
                        <div id="kimlikBilgisi">
                          <input name="VatandasNo" value="<?php echo $kullanici[0]["VatandasNo"];?>" type="text" id="tcNo" placeholder="TC Kimlik No" required>
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
                        <input name="TelefonNo" type="text" value="<?php echo $kullanici[0]["TelefonNo"];?>" required="">
                        <input name="Mail" type="text" value="<?php echo $kullanici[0]["Mail"];?>" required="">
                        <div class="ban-bottom">
                          <div class="bnr-right">
                            <div style="margin-bottom: 10px;">
                              <label class="inputLabel" style="color: #4CB320; float: left; margin-right: 10px;">Cinsiyet</label>
                              <?php
                              if($kullanici[0]["Cinsiyet"] == 0){
                                echo "<div style=\"float: left;\">
                                      <input type=\"radio\" id=\"kadın\" name=\"cinsiyet\" value=\"Kadın\" required>
                                      <label for=\"kadın\" style=\"color: #4CB320;\">Kadın</label>
                                      </div>
                                      <div style=\"float: left; margin-left: 10px;\">
                                        <input type=\"radio\" id=\"erkek\" name=\"cinsiyet\" value=\"Erkek\" required checked>
                                        <label for=\"erkek\" style=\"color: #4CB320;\">Erkek</label>
                                      </div>"; 
                              }
                              else{
                                echo "<div style=\"float: left;\">
                                      <input type=\"radio\" id=\"kadın\" name=\"cinsiyet\" value=\"Kadın\" required checked>
                                      <label for=\"kadın\" style=\"color: #4CB320;\">Kadın</label>
                                      </div>
                                      <div style=\"float: left; margin-left: 10px;\">
                                        <input type=\"radio\" id=\"erkek\" name=\"cinsiyet\" value=\"Erkek\" required>
                                        <label for=\"erkek\" style=\"color: #4CB320;\">Erkek</label>
                                      </div>";
                              }
                              ?>
                            </div> 
                          </div>
                          <div class="bnr-right">
                            <label class="inputLabel" style="color: #4CB320; float:left;">Doğum Tarihi</label>
                            <input name="DogumTarihi" class="date" id="dogumTarihi" type="text" value="<?php echo  $kullanici[0]["DogumTarihi"] ?>" required=>
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
                          <input type="submit" value="Bilgilerimi Güncelle">
                        </div>
                    </div>
                    </form>
                    <!-- /bilet sahibi bilgileri -->
                  </div>
                </div>
              </div>
            </div>
          </div>
        </div>
        <div class="col-md-4 bann-info1 wow fadeInLeft animated" data-wow-delay=".5s" style="float:right;">
        <input type="button" value="Ödeme Bilgileri" class="btn btn-primary" style="background-color: #4CB320; border-color: #4CB320; margin-top: 10px; margin-bottom: 10px; width: 100%;"></input>
        <input type="button" value="Seyhatlerim" class="btn btn-primary" style="background-color: #4CB320; border-color: #4CB320; margin-top: 10px; margin-bottom: 10px; width: 100%;"></input>
        </div>
      </div>
    </div>
  </div>