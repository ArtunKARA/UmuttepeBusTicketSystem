
<!-- bilet sahibi bilgileri -->
<div class="modal-body modal-spa">
			  <div class="kart-grids">
			    <div class="login">
            
          <div class="container">
    <div class="row">
        <div class="col-md-6">
            <div class="kart-right" >
                <form>
                    <!-- <h3><b>Bilet Sahibinin </b></h3>
                    <input type="text" value="İsim" onfocus="this.value = '';" onblur="if (this.value == '') {this.value = 'İsim';}" required="">
                    <input type="text" value="Telefon numarası" onfocus="this.value = '';" onblur="if (this.value == '') {this.value = 'Telefon numarası';}" required="">
                    <input type="text" value="E-mail" onfocus="this.value = '';" onblur="if (this.value == '') {this.value = 'E-mail';}" required=""> 
                    <h3><b>Bilet Sahibinin </b></h3> -->
<input type="text" value="İsim" onfocus="this.value = '';" onblur="if (this.value == '') {this.value = 'İsim';}" required="">
<input type="text" value="Telefon numarası" onfocus="this.value = '';" onblur="if (this.value == '') {this.value = 'Telefon numarası';}" required="">
<input type="text" value="E-mail" onfocus="this.value = '';" onblur="if (this.value == '') {this.value = 'E-mail';}" required="">

<input type="radio" style="color: #4CB320; float: left; margin-right: 10px;"id="tcVatandası" name="kimlikTuru" value="TC" checked>
<label for="tcVatandası" style="color: #4CB320; float: left; margin-right: 10px;">TC Vatandaşı</label>
<input type="radio" style="color: #4CB320; float: left; margin-right: 10px;"id="yabancı" name="kimlikTuru" value="yabancı">
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
                        <div class="bnr-right">
				<label class="inputLabel"  style="color: #4CB320; float:left;">Doğum Tarihi</label>
				<input class="date" id="dogumTarihi" type="text" value="gün/ay/yıl" onfocus="this.value = '';" onblur="if (this.value == '') {this.value = 'gün/ay/yıl';}" required=>
			</div>
				<div class="clearfix"></div>
				<!---tarih---->
				<link rel="stylesheet" href="css/jquery-ui.css" />
				<script src="js/jquery-ui.js"></script>
					<script>
						$(function() {
						$( "#datepicker,#dogumTarihi" ).datepicker();
						});
					</script>
			<!---/tarih---->
                    </div>
                
            </div>
        </div>
        <!-- /bilet sahibi bilgileri -->
          <!-- kart ile ödeme -->
        <div class="col-md-6">
            <div class="kart-right">
                
                    <h3><b>Kart Bilgilerinizi Giriniz</b></h3>
                    <h3 style="float:left;">Kart numaranız </h3>
                    <input type="text" value="Telefon numarası" onfocus="this.value = '';" onblur="if (this.value == '') {this.value = 'Telefon numarası';}" required="">
                    <div class="ban-bottom">
                        <div class="bnr-right">
                            <label class="inputLabel" style="color: #4CB320; float:left;">SKT</label>
                            <input  id="skt" type="text" placeholder="ay/yıl" required>
                        </div>
                        <div class="bnr-right">
                            <label class="inputLabel" style="color: #4CB320; float:left;">CVV</label>
                            <input type="password" value="CVV" onfocus="this.value = '';" onblur="if (this.value == '') {this.value = 'CVV';}" required="">
                        </div>
                        <div class="clearfix"></div>
                    </div>
                    <input type="submit" value="Satın Al">
                    <!-- </div>
											<p> <a href="terms.html">Şartlar ve koşullar</a> & <a href="privacy.html">Gizlilik Politikası</a></p>
									</div> -->
                </form>
               
            </div>
        </div>
    </div>
</div>

			    
			  </div>
			</div> 

<!-- /kart ile ödeme -->





