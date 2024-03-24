<!-- bilet sahibi bilgileri -->
<!-- <div class="modal-body modal-spa"><div class="kart-grids"><div class="login"><div class="container"><div class="row"><div class="col-md-6"><div class="kart-right"><form><h3><b>Kart Bilgilerinizi Giriniz</b></h3><h3 style="float:left;">Kart numaranız </h3><input type="text" value="Telefon numarası" onfocus="this.value = '';" onblur="if (this.value == '') {this.value = 'Telefon numarası';}" required=""><div class="ban-bottom"><div class="bnr-right"><label class="inputLabel" style="color: #4CB320; float:left;">SKT</label><input id="skt" type="text" placeholder="ay/yıl" required></div><div class="bnr-right"><label class="inputLabel" style="color: #4CB320; float:left;">CVV</label><input type="password" value="CVV" onfocus="this.value = '';" onblur="if (this.value == '') {this.value = 'CVV';}" required=""></div><div class="clearfix"></div></div><input style="padding:10px !important;margin:10px!important;" type="submit" value="Satın Al"></form></div></div><br><div class="col-md-6"><div class="kart-right"></div></div></div></div></div></div> -->
<!-- /kart ile ödeme -->
<!--- Kartla ödeme---->
<div class="selectroom">
  <div class="container my-auto">
    <div class="selectroom_top">
      <h2>
        <span style="color: greenyellow;">Ödeme</span>
      </h2>
      <div class="selectroom-info animated wow fadeInUp animated" data-wow-duration="1200ms" data-wow-delay="500ms" style="visibility: visible; animation-duration: 1200ms; animation-delay: 500ms; animation-name: fadeInUp;">
        <div class="modal-body modal-spa">
          <div class="kart-grids">
            <div class="login">
              <div class="row">
                <div class="kart-right">
                  <form>
                    <!-- kart ile ödeme -->
                    <div class="col-md-6 ">
                      <div class="kart-right">
                        <h3>
                          <?php
                              if (isset($kart)) {
                                echo "Kart Bilgilerini Düzenleme Ekranı";
                              } else {
                                echo "Kart Bilgilerinizi Giriniz";
                              } 
                          ?>
                        </h3>
                        <h3 style="float:left;">Kart numaranız </h3>
                        <input type="text" name="Kart numarası" value="<?php if(isset($kart)){echo $kart[0]['KartNumarasi'];} ?>" onfocus="this.value = '';" onblur="if (this.value == '') {this.value = '<?php if(isset($kart)){echo $kart[0]['KartNumarasi'];}?>';}" required="">
                        <div class="ban-bottom">
                          <div class="bnr-right">
                            <label class="inputLabel" style="color: #4CB320; float:left;">SKT</label>
                            <input id="skt" type="text" name="skt" value="<?php if(isset($kart)){echo $kart[0]['SonKullanmaTarihi'];}?>" required>
                          </div>
                          <div class="bnr-right">
                            <label class="inputLabel" style="color: #4CB320; float:left;">CVV</label>
                            <input type="text" name="password" value="<?php if(isset($kart)){echo $kart[0]['CVV'];} ?>" onfocus="this.value = '';" onblur="if (this.value == '') {this.value = '<?php if(isset($kart)){echo $kart[0]['CVV'];} ?>';}" required="">
                          </div>
                          <div class="clearfix"></div>
                        </div>
                      </div>
                      <form method="post" action="<?php if(isset($kart)){echo Base_url('UmuttepeBusTicketSystem/ciapp/public/odeme');}else{echo Base_url('UmuttepeBusTicketSystem/ciapp/public/odeme');}; ?>">
                        <input type="hidden" name="kartID" value="<?php if(isset($kart)){echo $kart[0]['ID'];} ?>">
                        <?php if(isset($kart)){
                          echo '<button class="btn" type="submit" style="width: 100% !important;color:white;background-color: #4CB320;outline: none;font-size: 14px;padding: 10px 10px ; border: 1px solid #9E9E9E;margin-top: 10px; border: 1px solid #E6E4E4;">Güncelle</button>';
                        }else{
                          echo '<button class="btn" type="submit" style="width: 100% !important;color:white;background-color: #4CB320;outline: none;font-size: 14px;padding: 10px 10px ; border: 1px solid #9E9E9E;margin-top: 10px; border: 1px solid #E6E4E4;">Ekle</button>';} ?>
                      </form>
                    </div>
                    <!-- </div><p><a href="terms.html">Şartlar ve koşullar</a> & <a href="privacy.html">Gizlilik Politikası</a></p></div> -->
                  </form>
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
</div>

<!--- /Kartla ödeme ---->