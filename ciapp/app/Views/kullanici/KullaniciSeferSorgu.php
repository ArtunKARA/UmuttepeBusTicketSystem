<!--- banner ---->
<div class="banner">
	<div class="container">
		<h1 class="wow zoomIn animated animated" data-wow-delay=".5s" style="visibility: visible; ; animation-delay: 0.5s; animation-name: zoomIn;"><b> UMUTTEPE  TURİZM</b> </h1>
	</div>
</div>
<div class="container">
	<div class="col-md-5 bann-info1 wow fadeInLeft animated" data-wow-delay=".5s">
		<i class="fa-solid fa-bus"></i>
		<h3>Unutulmaz anılar için <span style="color:#e2ab4f"> güvenilir yol</span> arkadaşınız.</h3>
	</div>
	<div class="col-md-7 bann-info wow fadeInRight animated" data-wow-delay=".5s">
		<h2>Online Bilet Rezervasyonu</h2>
<div class="ban-top">
    <div class="bnr-left">
        <label class="inputLabel">Nereden</label>
        <select style="width: 95%;color: #9E9E9E;outline: none;font-size: 14px;padding: 10px 10px;border: 1px solid #9E9E9E;-webkit-appearance: none;margin-top: 10px;" id="fromCity" class="city" required>
            <option value="">Şehir Seçiniz</option>
            <option value="istanbul">İstanbul</option>
            <option value="ankara">Ankara</option>
            <option value="izmir">İzmir</option>
            <option value="antalya">Antalya</option>
        </select>
    </div>
    <div class="bnr-left">
        <label class="inputLabel">Nereye</label>
        <select style="width: 95%;color: #9E9E9E;outline: none;font-size: 14px;padding: 10px 10px;border: 1px solid #9E9E9E;-webkit-appearance: none;margin-top: 10px;" id="toCity" class="city" required>
            <option value="">Şehir Seçiniz</option>
            <option value="istanbul">İstanbul</option>
            <option value="ankara">Ankara</option>
            <option value="izmir">İzmir</option>
            <option value="antalya">Antalya</option>
        </select>
    </div>
    <div class="clearfix"></div>
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
</div>
		<div class="ban-bottom">
			<div class="bnr-right">
				<label class="inputLabel">Gidiş Tarihi</label>
				<input class="date" id="datepicker" type="text" value="gün/ay/yıl" onfocus="this.value = '';" onblur="if (this.value == '') {this.value = 'gün/ay/yıl';}" required=>
			</div>
			<div class="bnr-right">
				<label class="inputLabel">Dönüş Tarihi<span class="opt">&nbsp;(Opsiyonel)</span></label>
				<input class="date" id="datepicker1" type="text" value="gün/ay/yıl" onfocus="this.value = '';" onblur="if (this.value == '') {this.value = 'gün/ay/yıl';}" required=>
			</div>
				<div class="clearfix"></div>
				<!---start-date-piker---->
				<link rel="stylesheet" href="css/jquery-ui.css" />
				<script src="js/jquery-ui.js"></script>
					<script>
						$(function() {
						$( "#datepicker,#datepicker1" ).datepicker();
						});
					</script>
			<!---/End-date-piker---->
		</div>
		<div class="sear">

		<form action="<?php echo Base_url('UmuttepeBusTicketSystem/ciapp/public/guzergah'); ?>" method="post">
           <button class="seabtn">Buton Metni</button>
        </form>
			<!-- <form action="bus.html">
				<button class="seabtn">Otobüs Ara</button>
			</form> -->
		</div>
	</div>
	<div class="clearfix"></div>
</div>
<!--- /banner ---->