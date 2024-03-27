<!--- banner ---->
<div class="banner">
	<div class="container">
		<h1 class="wow zoomIn animated animated" data-wow-delay=".5s" style="visibility: visible; ; animation-delay: 0.5s; animation-name: zoomIn;"><b> UMUTTEPE  TURİZM</b> </h1>
	</div>
</div>
<div class="container">
	<div class="col-md-5 bann-info1 wow fadeInLeft animated" data-wow-delay=".5s">
		<i class="fa-solid fa-bus"></i>
		<h3 style="color:#8ee364">Unutulmaz anılar için <span style="color:#34ad00"> güvenilir <br></span>yol arkadaşınız.</h3>
	</div>
	<div class="col-md-7 bann-info wow fadeInRight animated" data-wow-delay=".5s">
		<h2>Online Bilet Rezervasyonu</h2>
        <form method="POST" action="<?php echo Base_url('UmuttepeBusTicketSystem/ciapp/public/');?>guzergah" >
        <div class="ban-top">
            <div class="bnr-left">
                <label class="inputLabel">Nereden</label>
                <select style="width: 95%;color: #9E9E9E;outline: none;font-size: 14px;padding: 10px 10px;border: 1px solid #9E9E9E;-webkit-appearance: none;margin-top: 10px;" id="fromCity" class="city" name="fromCity" required>
                    <option value="">Şehir Seçiniz</option>
                    <option value="istanbul">İstanbul</option>
                    <option value="ankara">Ankara</option>
                    <option value="izmir">İzmir</option>
                    <option value="antalya">Antalya</option>
                </select>
            </div>
            <div class="bnr-left">
                <label class="inputLabel">Nereye</label>
                <select style="width: 95%;color: #9E9E9E;outline: none;font-size: 14px;padding: 10px 10px;border: 1px solid #9E9E9E;-webkit-appearance: none;margin-top: 10px;" id="toCity" class="city" name="toCity" required>
                    <option value="">Şehir Seçiniz</option>
                    <option value="istanbul">İstanbul</option>
                    <option value="ankara">Ankara</option>
                    <option value="izmir">İzmir</option>
                    <option value="antalya">Antalya</option>
                </select>
            </div>
            <div class="clearfix"></div>
            
        </div>
                <div class="ban-bottom">
                    <div class="bnr-right">
                        <label class="inputLabel">Gidiş Tarihi</label>
                        <input name="gidis" class="date" id="datepicker" type="text" value="" onfocus="this.value = '';" onblur="if (this.value == '') {this.value = '';}" required=>
                    </div>
                    <div class="bnr-right">
                <label class="inputLabel" id="donusLabel" style="display: none;">Dönüş Tarihi</label>
                <input name="donus" class="date" id="datepicker1" type="text" value=" " onfocus="this.value = '';" onblur="if (this.value == '') {this.value = '';}" style="display: none;" required>
                <label class="inputLabel" for="brand"><span><input type="checkbox" id="brand" value=""></span>Gidiş Dönüş</label>
                        
                        <link rel="stylesheet" href="css/jquery-ui.css">
            <script src="js/jquery-ui.js"></script>
            <script>
                $(function() {
                    $("#datepicker,#datepicker1").datepicker();
                    
                    $("#brand").change(function() {
                        if ($(this).is(":checked")) {
                            $("#datepicker1").show();
                        } else {
                            $("#datepicker1").hide();
                        }
                    });
                });
            </script>
                    </div>
                        <div class="clearfix"></div>
                        <!---start-date-piker---->
                        <link rel="stylesheet" href="css/jquery-ui.css">

            <!---/End-date-piker---->
                </div>
                <div class="sear">
           <button type="submit" class="seabtn">Sefer Ara</button>
        </form>
			<!-- <form action="bus.html">
				<button class="seabtn">Otobüs Ara</button>
			</form> -->
		</div>
	</div>
	<div class="clearfix"></div>
</div>
<!--- /banner ---->

<script src="js/jquery-ui.js"></script>
            <script>
                $(function() {
                    $("#datepicker,#datepicker1").datepicker();
                    var donusLabel = $("#donusLabel");
                    var datepicker1 = $("#datepicker1");
                    var brand = $("#brand");

                    brand.change(function() {
                        if ($(this).is(":checked")) {
                            donusLabel.show();
                            datepicker1.show();
                        } else {
                            donusLabel.hide();
                            datepicker1.hide();
                        }
                    });
                });
            </script>
<script>document.addEventListener('DOMContentLoaded', function () {
            var fromCitySelect = document.getElementById('fromCity');
            var toCitySelect = document.getElementById('toCity');

            fromCitySelect.addEventListener('change', function () {
                var selectedFromCity = this.value;
                var selectedToCity = toCitySelect.value;
                
                toCitySelect.options[0].disabled = false; // Enable all options initially

                for (var i = 0; i < toCitySelect.options.length; i++) {
                    if (toCitySelect.options[i].value === selectedFromCity) {
                        toCitySelect.options[i].disabled = true;
                        if (selectedToCity === selectedFromCity) {
                            toCitySelect.selectedIndex = 0; // Reset to default if selected city is disabled
                        }
                    }
                }
            });

            toCitySelect.addEventListener('change', function () {
                var selectedToCity = this.value;
                var selectedFromCity = fromCitySelect.value;

                fromCitySelect.options[0].disabled = false; // Enable all options initially

                for (var i = 0; i < fromCitySelect.options.length; i++) {
                    if (fromCitySelect.options[i].value === selectedToCity) {
                        fromCitySelect.options[i].disabled = true;
                        if (selectedFromCity === selectedToCity) {
                            fromCitySelect.selectedIndex = 0; // Reset to default if selected city is disabled
                        }
                    }
                }
            });
        });

        </script>