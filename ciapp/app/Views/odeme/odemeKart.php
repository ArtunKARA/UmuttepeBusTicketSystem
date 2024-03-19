

<div class="modal-body modal-spa">
			  <div class="kart-grids">
			    <div class="login">
            
          <div class="container">
    <div class="row">
        <div class="col-md-6">
            <div class="kart-right" >
                <form>
                    <h3><b>Bilet Sahibinin </b></h3>
                    <input type="text" value="İsim" onfocus="this.value = '';" onblur="if (this.value == '') {this.value = 'İsim';}" required="">
                    <input type="text" value="Telefon numarası" onfocus="this.value = '';" onblur="if (this.value == '') {this.value = 'Telefon numarası';}" required="">
                    <input type="text" value="E-mail" onfocus="this.value = '';" onblur="if (this.value == '') {this.value = 'E-mail';}" required=""> 
                    <input type="password" value="Şifre" onfocus="this.value = '';" onblur="if (this.value == '') {this.value = 'Şifre';}" required=""> 
                    <div class="ban-bottom">
                        <div class="bnr-right">
                        <label class="inputLabel" style="color: #4CB320; float:left; margin=2px;">Cinsiyet</label>
        <input class="inputLabel" type="text" value="Seçiniz" onfocus="this.value = '';" onblur="if (this.value == '') {this.value = 'Seçiniz';}" required list="cinsiyet">
        <datalist id="cinsiyet">
            <option value="Kadın"></option>
            <option value="Erkek"></option>
        </datalist>
                        </div>
                        <div class="bnr-right">
				<label class="inputLabel"  style="color: #4CB320; float:left;">Doğum Tarihi</label>
				<input class="date" id="dogumTarihi" type="text" value="gün/ay/yıl" onfocus="this.value = '';" onblur="if (this.value == '') {this.value = 'gün/ay/yıl';}" required=>
			</div>
				<div class="clearfix"></div>
				<!---start-date-piker---->
				<link rel="stylesheet" href="css/jquery-ui.css" />
				<script src="js/jquery-ui.js"></script>
					<script>
						$(function() {
						$( "#datepicker,#dogumTarihi" ).datepicker();
						});
					</script>
			<!---/End-date-piker---->
                    </div>
                </form>
            </div>
        </div>

        <div class="col-md-6">
            <div class="kart-right">
                <form>
                    <h3><b>Kart Bilgilerinizi Giriniz</b></h3>
                    <h3 style="float:left;">Kart numaranız </h3>
                    <input type="text" value="Telefon numarası" onfocus="this.value = '';" onblur="if (this.value == '') {this.value = 'Telefon numarası';}" required="">
                    <div class="ban-bottom">
                        <div class="bnr-right">
                            <label class="inputLabel" style="color: #4CB320; float:left;">SKT</label>
                            <input class="date" id="datepicker" type="text" placeholder="ay/yıl" required>
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







