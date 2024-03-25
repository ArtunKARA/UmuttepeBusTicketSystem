<!-- kayıt ol ek sayfa -->
<div class="selectroom">
  <div class="selectroom_top">
    <div class="container">
      <div class="col-md-8" style="float:left;">
        <h2 style="color:#34ad00 !important;">Kaydol <span style="color: greenyellow;">Maceraya Atıl</span>
        </h2>
        <div class="selectroom-info animated wow fadeInUp animated" data-wow-duration="1200ms" data-wow-delay="500ms" style="visibility: visible; animation-duration: 1200ms; animation-delay: 500ms; animation-name: fadeInUp;">
          <!-- bilet sahibi bilgileri -->
          <div class="modal-body modal-spa">
            <div class="kart-grids">
              <div class="login">
                <div class="row">
                  <div class="kart-right">
                    <form method="POST" action="<?php echo base_url('UmuttepeBusTicketSystem/ciapp/public/'); ?>kayit">
                      <input type="text" name="Isim"value="İsim" onfocus="this.value = '';" onblur="if (this.value == '') {this.value = 'İsim';}" required="">
                      <input type="radio" style="color: #4CB320; float: left; margin-right: 10px;" id="tcVatandası" name="kimlikTuru" value="TC" checked>
                      <label for="tcVatandası" style="color: #4CB320; float: left; margin-right: 10px;">TC Vatandaşı</label>
                      <input type="radio" style="color: #4CB320; float: left; margin-right: 10px;" id="yabancı" name="kimlikTuru" value="yabancı">
                      <label for="yabancı" style="color: #4CB320; float: left; margin-right: 10px;">Yabancı</label>
                      <div id="kimlikBilgisi">
                        <input type="text" name="VatandasNo" id="tcNo" placeholder="TC Kimlik No" required>
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
                      <input type="text" value="Telefon numarası"name="TelefonNo"onfocus="this.value = '';" onblur="if (this.value == '') {this.value = 'Telefon numarası';}" required="">
                      <input type="text" value="E-mail" name="Mail"onfocus="this.value = '';" onblur="if (this.value == '') {this.value = 'E-mail';}" required="">
                      <label class="inputLabel" style="color: #4CB320; float: left; margin-right: 10px;">Şifre Giriniz</label>
                      <input class="password" id="password1"name="Sifre" type="password" value="Şifre" onfocus="this.value = '';" onblur="if (this.value == '') {this.value = 'Şifre';}" required="">	
                      <label class="inputLabel" style="color: #4CB320; float: left; margin-right: 10px;">Şifrenizi Tekrar Giriniz</label>
                      <input class="password" id="password2" name="Sifre2" type="password" value="Şifre" onfocus="this.value = '';" onblur="if (this.value == '') {this.value = 'Şifre';}" required="">	
                      <div class="ban-bottom">
                        <div class="bnr-right">
                          <div style="margin-bottom: 10px;">
                            <label class="inputLabel" style="color: #4CB320; float: left; margin-right: 10px;"><b>Cinsiyet</b></label>
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
                          <label class="inputLabel" style="color: #4CB320; float:left;"><b>Doğum Tarihi</b></label>
                          <input class="date" id="dogumTarihi" name="DogumTarihi" type="text" value="gün/ay/yıl" onfocus="this.value = '';" onblur="if (this.value == '') {this.value = 'gün/ay/yıl';}" required=>
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
                        <div class="bnr-right">
                        <button onclick="checkPasswords()" class="btn" style="width: 100% !important;color:white;background-color: #4CB320;outline: none;font-size: 14px;padding: 10px 10px ; border: 1px solid #9E9E9E;margin-top: 10px; border: 1px solid #E6E4E4 ;">Kayıt Ol</button>
                        <script>
  function checkPasswords() {
    var password1 = document.getElementById('Sifre').value;
    var password2 = document.getElementById('Sifre2').value;
    
    if (password1 !== password2) {
      alert("Şifreler eşleşmiyor. Lütfen aynı şifreyi giriniz.");
    } 
  }
</script>
                    </div>
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
        <h3 style="color:#8ee364">Unutulmaz anılar için <span style="color:#34ad00"> güvenilir <br>
          </span>yol arkadaşınız. </h3>
      </div>
    </div>
  </div>
</div>
<!-- /kayıt ol ek sayfa -->




<!--- selectroom ---->
<!-- <div class="selectroom">
	<div class="container">	
		<div class="selectroom_top">
			<h2>Kaydol <span style="color: greenyellow;">Maceraya Atıl</span></h2>
			<div class="selectroom-info animated wow fadeInUp animated" data-wow-duration="1200ms" data-wow-delay="500ms" style="visibility: visible; animation-duration: 1200ms; animation-delay: 500ms; animation-name: fadeInUp;">
                <form method="POST" action="<?php echo base_url('UmuttepeBusTicketSystem/ciapp/public/'); ?>kayitOl">
                <ul>
					<li class="mr">
						<label class="inputLabel">Title</label>
						<select id="country" onchange="change_country(this.value)" class="frm-field required sect">
							<option value="null">MR</option>
							<option value="null">MS</option> 							
						</select>
					</li>
					<li class="nam">
						<label class="inputLabel">First Name</label>
						<input class="name" type="text" value="First Name" onfocus="this.value = '';" onblur="if (this.value == '') {this.value = 'First Name';}" required="">
					</li>
					<li class="nam">
						<label class="inputLabel">Last Name</label>
						<input class="name" type="text" value="Last Name" onfocus="this.value = '';" onblur="if (this.value == '') {this.value = 'Last Name';}" required="">
					</li>
					<li class="nam">
						<label class="inputLabel">Email</label>
						<input class="Email" type="text" value="Email" onfocus="this.value = '';" onblur="if (this.value == '') {this.value = 'Email';}" required="">
					</li>
					<li class="nam">
						<label class="inputLabel">Mobile Number</label>
						<input class="number" type="text" value="Mobile Number" onfocus="this.value = '';" onblur="if (this.value == '') {this.value = 'Mobile Number';}" required="">
					</li>
					<li class="spe">
						<label class="inputLabel">Special Requests</label>
						<input class="special" type="text" value="Special Requests" onfocus="this.value = '';" onblur="if (this.value == '') {this.value = 'Special Requests';}" required="">
					</li>
					<div class="clearfix"></div>
				</ul>

                </form>
			</div>
			
		</div>
	</div>
</div> -->
<!--- /selectroom ---->