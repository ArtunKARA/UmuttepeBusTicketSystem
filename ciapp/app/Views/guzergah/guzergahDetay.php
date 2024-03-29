<!--- selectroom ---->
<script src="https://maps.googleapis.com/maps/api/js?key=AIzaSyBVTxXxJwNZNyXFbO5N2jUr2erGge59Ao4"></script>
<script>
		function initMap() {
			var directionsService = new google.maps.DirectionsService;
			var directionsDisplay = new google.maps.DirectionsRenderer;
			var map = new google.maps.Map(document.getElementById('map'), {
				zoom: 7,
				center: { lat: 41.0082, lng: 28.9784 } // İstanbul koordinatları, başlangıç noktası olarak kullanılabilir.
			});
			directionsDisplay.setMap(map);
			calculateAndDisplayRoute(directionsService, directionsDisplay);
		}

		function calculateAndDisplayRoute(directionsService, directionsDisplay) {
			var start = "<?php echo $sefer["KalkisSehri"]; ?>" // Başlangıç şehri** burayı ve altı kendi değişkenlerinize göreyi ayarla
			var end = "<?php echo $sefer["VarisSehri"]; ?>"     // Varış şehri


			directionsService.route({
				origin: start,
				destination: end,
				travelMode: 'DRIVING'
			}, function (response, status) {
				if (status === 'OK') {
					directionsDisplay.setDirections(response);
				} else {
					window.alert('Rota bulunamadı: ' + status);
				}
			});
		}
	</script>

    		<div class="modal fade" id="myModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
				<div class="modal-dialog" role="document">
					<div class="modal-content">
						<div class="modal-header">
							<button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>						
						</div>
							<section>
								<div class="modal-body modal-spa">
									<div class="login-grids">
										<div class="login">
											<div class="login-left">
												<ul>
                                                    <h3 id="secilenKoltuk"></h3>
                                                    <p hidden id="secilenKoltukID"></p>
                                                <br>
													<li><p>Erkek Yanına Kadın Satın Alamazsız</p></li>
													<li><p>Kadın Yanına Erkek Satın Alamazsız</p></li>
													<li><p>Evli yada çocuk için aynı oturumdan bilet satın almalısınız</p></li>
												</ul>
											</div>
											<div class="login-right">
                                            <select style="width: 95%;color: #9E9E9E;outline: none;font-size: 14px;padding: 10px 10px;border: 1px solid #9E9E9E;" id="koltukSecimi">
                                                <option value="Kız">Kadın</option>
                                                <option value="Erkek">Erkek</option>
                                            </select>
											<button class="btn" style="background-color: greenyellow; margin-top:3%;" onclick="confirmSelection()">Seçimi Onayla</button>
											</div>
												<div class="clearfix"></div>								
										</div>
									</div>
								</div>
							</section>
					</div>
				</div>
			</div>


<div class="selectroom">
	<div class="container">
    <div class="selectroom_top">
    <noscript>
                  <div class='alert alert-info'>
                     <h4>Your JavaScript is disabled</h4>
                     <p>Please enable JavaScript to view the map.</p>
                  </div>
               </noscript>
               <div style="text-align: center; padding: 20px;">
    <h2 style="color:#34ad00 !important">Güzergah</h2>
</div>
               <div id="map" style="height: 500px; width: 100%; "></div>
					<script>initMap();</script>
    </div>
		<div class="selectroom_top">

			<div class="col-md-12 selectroom_right wow fadeInRight animated" data-wow-delay=".5s">
					<ul>
						<li>
							<h6>Kalkış</h6>
							<h4><?php echo $sefer["KalkisSehri"] ?></h4>
							<h6><?php echo $sefer["KalkisSaat"] ?></h6>
						</li>
						<li>
							<h6>Varış</h6>
							<h4><?php echo $sefer["VarisSehri"] ?></h4>
							<h6><?php echo $sefer["VarisSaat"] ?></h6>
						</li>
						<li>
							<h6><?php echo $sefer["OtobusIsim"] ?></h6>
                            <?php 
                            $varisSaat = strtotime($sefer["VarisSaat"]);
                            $kalkisSaat = strtotime($sefer["KalkisSaat"]);
                            $saatFarki = ($varisSaat - $kalkisSaat) / 3600;
                            $saatFarki = round($saatFarki);
                            ?>
							<h4><?php echo $saatFarki ?> Saat</h4>
                            <h6><?php
                            $session = session(); 
                            $seferTercih = $session->get('tercih');
                            if($seferTercih[4] == 1){
                                if($seferTercih[5] == 0){
                                    echo $seferTercih[2];
                                }else{
                                    echo $seferTercih[3];
                                }

                            }else{
                                echo $seferTercih[2];
                            }
                            ?></h6>
						</li>
					</ul>
						<div class="clearfix"></div>
				<div class="grand">
					<p>Bilet Fiyat</p>
					<h3><?php echo $sefer["Fiyat"] ?> TL</h3>
				</div>
			</div>
			<div class="clearfix"></div>
		</div>
        <?php 
           $doluKadinKoltuklar = array();
           $doluErkekKoltuklar = array();
           
           foreach ($koltuklar as $koltuk) {
               if ($koltuk["Durum"] == "Dolu") {
                   if ($koltuk["OturanCinsiyeti"] == "Kız") {
                       $doluKadinKoltuklar[] = $koltuk["KoltukNo"];
                   } elseif ($koltuk["OturanCinsiyeti"] == "Erkek") {
                       $doluErkekKoltuklar[] = $koltuk["KoltukNo"];
                   }
               }
           }
        ?>
        <div class="selectroom_top">
								<div class="set-left">
									<ul class="set">
                                    <?php
                                        for ($i = 1; $i <= 32/2; $i++) {
                                            if (in_array($i, $doluKadinKoltuklar)) {
                                                echo "<li><a id=\"".$i."\"><img src='images/seat-2.png' class='img-responsive' alt=''></a></li>";
                                            } elseif (in_array($i, $doluErkekKoltuklar)) {
                                                echo "<li><a id=\"".$i."\"><img src='images/seat-3.png' class='img-responsive' alt=''></a></li>";
                                            } else {
                                                echo "<li><a class='seat' id=\"".$i."\"><img src='images/seat-1.png' class='img-responsive' alt=''></a></li>";
                                            }
                                        }
                                    ?>
										<div class="clearfix"></div>
									</ul>
									<ul class="set-1" style="text-align:right !important">
										<div class="clearfix"></div>
									</ul>
									<ul class="set">
                                    <?php
                                        for ($i = 32/2+1; $i <= (32/4)*3; $i++) {
                                            if (in_array($i, $doluKadinKoltuklar)) {
                                                echo "<li><a id=\"".$i."\"><img src='images/seat-2.png' class='img-responsive' alt=''></a></li>";
                                            } elseif (in_array($i, $doluErkekKoltuklar)) {
                                                echo "<li><a id=\"".$i."\"><img src='images/seat-3.png' class='img-responsive' alt=''></a></li>";
                                            } else {
                                                echo "<li><a class='seat' id=\"".$i."\"><img src='images/seat-1.png' class='img-responsive' alt=''></a></li>";
                                            }
                                        }
                                    ?>
										<div class="clearfix"></div>
									</ul>
								</div>
								<div class="set-right">
									<ul class="ste1">
										<li><img src="images/seat-1.png" class="img-responsive" alt=""> </li>
										<li><p class="aval">Boş Koltuklar</p></li>
										<div class="clearfix"></div>
									</ul>
									<ul class="ste1">
										<li><img src="images/seat-2.png" class="img-responsive" alt=""> </li>
										<li><p class="aval">Dolu Kadın</p></li>
										<div class="clearfix"></div>
									</ul>
									<ul class="ste1">
										<li><img src="images/seat-3.png" class="img-responsive" alt=""> </li>
										<li><p class="aval">Dolu Erkek</p></li>
										<div class="clearfix"></div>
									</ul>
									<ul class="ste1">
										<li><img src="images/seat-5.png" class="img-responsive" alt=""> </li>
										<li><p class="aval">Seçili Erkek</p></li>
										<div class="clearfix"></div>
									</ul>
                                    <ul class="ste1">
										<li><img src="images/seat-4.png" class="img-responsive" alt=""> </li>
										<li><p class="aval">Seçili Kadın</p></li>
										<div class="clearfix"></div>
									</ul>
								</div>
								
								<!-- <div class="clearfix"></div>
								<div style="margin-left: 70%; margin-top: 2%;">
								<button class="btn">Rezerve Et</button>
								<button class="btn" style="background-color: greenyellow;">Satın Al</button>
								</div> -->
<!-- burayı yeni yazdım -->
                                <div class="clearfix"></div>
                             <div style="margin-top: -0%; display: flex; justify-content: center;">
                             <form method="post" action="<?php echo Base_url('UmuttepeBusTicketSystem/ciapp/public/rezerveEt'); ?>"  onsubmit="return kontrolEt();">
                                 <input type="hidden" name="seferID" value="<?php echo $sefer['SeferID']; ?>">
                                 <input type="hidden" name="gidis" value="<?php echo $_POST['gidis']; ?>">
                                 <input type="hidden" name="donus" value="<?php echo $_POST['donus']; ?>">
                                 <input type="hidden" name="fiyat" value="<?php echo $sefer['Fiyat']; ?>">
                                 <input type="hidden" name="otobusPlaka" value="<?php echo $sefer['OtobusPlaka']?>">
                                 <input type="hidden" name="seferZaman" value="<?php echo $sefer["KalkisSaat"] ?>">
                                 <input type="hidden" name="seciliKoltukSayisi" id="seciliKoltukSayisi">
                                 <input type="hidden" name="seciliKoltukRezerve" id="seciliKoltukRezerve">
                                 <input type="hidden" name="kulaniciCinsiyet" id="kulaniciCinsiyet" value="<?php $session = session(); $user = $session->get('user'); if(isset($user['Cinsiyet'])){echo $user['Cinsiyet'];} ?>">                                 
                                 <button type="submit" class="btn" style="margin-right: 5px;">Rezerve Et</button>
                                </form>
                               <form method="post" action="<?php echo Base_url('UmuttepeBusTicketSystem/ciapp/public/kullaniciBilgi'); ?>">
                                    <input type="hidden" name="SeferID" value="<?php echo $sefer['SeferID']; ?>">
                                    <input type="hidden" name="gidis" value="<?php echo $_POST['gidis']; ?>">
                                    <input type="hidden" name="donus" value="<?php echo $_POST['donus']; ?>">
                                    <input type="hidden" name="Fiyat" value="<?php echo $sefer['Fiyat']; ?>">
                                    <input type="hidden" name="otobusPlaka" value="<?php echo $sefer['OtobusPlaka']?>">
                                    <input type="hidden" name="seferZaman" value="<?php strtotime($sefer["VarisSaat"]) ?>">
                                    <input type="hidden" name="seciliKoltuklar" id="seciliKoltuklar">
                                 <button class="btn" style="background-color: greenyellow; margin-left: 5px;">Satın Al</button>
                               </form>
                             </div>
                             <div class="sear"></div>
                             <!-- burayı yeni yazdım -->
                            </div>
                        </div>

<script>
function kontrolEt() {
    var seciliKoltukSayisi = document.getElementById('seciliKoltukSayisi').value;
    var seciliKoltuklar = document.getElementById('seciliKoltuklar').value;
    var kulaniciCinsiyet = document.getElementById('kulaniciCinsiyet').value;
    if(kulaniciCinsiyet.length == 0){
        alert("Bir kullanıcı girişi bulunmamaktadır.");
        return false;
    }
    // Eğer sadece bir koltuk seçilmişse devam et
    if (seciliKoltukSayisi == 1) {
        var regex = new RegExp("\\d+,(K|E);", 'g');
        var match = regex.exec(seciliKoltuklar);
        
        // Eğer koltuk bilgisi bulunduysa devam et
        if (match) {
            var koltukCinsiyet = match[0].substring(match[0].indexOf(",") + 1, match[0].length - 1);
            
            // Kullanıcının cinsiyetiyle seçilen koltuğun cinsiyetini kontrol et
            if ((kulaniciCinsiyet == "0" && koltukCinsiyet == "E") || 
                (kulaniciCinsiyet == "1" && koltukCinsiyet == "K")) {
                return true; // Formu gönderir
            } else {
                alert("Seçilen koltuk cinsiyeti ile kullanıcının cinsiyeti uyuşmuyor.");
                return false; // Formun gönderilmesini engeller
            }
        }
    } else if (seciliKoltukSayisi > 1) {
        alert("Sadece bir koltuk seçebilirsiniz.");
        return false; // Formun gönderilmesini engeller
    } else {
        alert("Lütfen bir koltuk seçiniz.");
        return false; // Formun gönderilmesini engeller
    }
}
        // Koltuk resimlerini seçme
var koltuklar = document.querySelectorAll('.seat');

// Her bir koltuk resmine tıklanınca popup'ı gösterme secilenKoltuk
koltuklar.forEach(function(koltuk) {
    koltuk.addEventListener('click', function() {
        var secilenKoltukId = koltuk.id;
        if(koltuk.children[0].src.includes('seat-5.png')){
            koltuguKaldir(secilenKoltukId);
            koltuk.children[0].src = "images/seat-1.png";
        }else if(koltuk.children[0].src.includes('seat-4.png')){
            koltuguKaldir(secilenKoltukId);
            koltuk.children[0].src = "images/seat-1.png";
        }
        else{
            document.getElementById('secilenKoltuk').textContent = "Seçilen Koltuk: " + secilenKoltukId;
            document.getElementById('secilenKoltukID').textContent =  secilenKoltukId;
            $('#myModal').modal('show');
        }
    });
});

function confirmSelection(koltuk){
    var secilenKoltuk = document.getElementById('koltukSecimi').value;
    var secilenKoltukNO = document.getElementById('secilenKoltukID').textContent.trim();
    var seciliKoltuklar = document.getElementById('seciliKoltuklar').value;
    

    // Değişken tanımlandıktan sonra işlemleri gerçekleştirin

    var xhr = new XMLHttpRequest();
    var koltukNo = secilenKoltukNO;
    var oturanCinsiyeti = secilenKoltuk;

    var url = "http://localhost:8080/UmuttepeBusTicketSystem/ciapp/public/koltukSorguAPI?KoltukNo="+koltukNo+"&OturanCinsiyeti="+oturanCinsiyeti+"&SeferID="+ <?php echo $sefer['SeferID']; ?>;
    console.log(url);
    xhr.open("GET", url, true);
    xhr.onreadystatechange = function () {
        if (xhr.readyState == 4 && xhr.status == 200) {
            console.log(xhr.responseText);
            if (xhr.responseText == "True") {
                var imageElement = document.getElementById(secilenKoltukNO).children;
                for (var i = 0; i < imageElement.length; i++) {
                    console.log(imageElement[i]);
                    if (imageElement[i].tagName.toLowerCase() === 'img') {
                        console.log(imageElement[i].src);
                        if(secilenKoltuk == "Kız"){
                            imageElement[i].src = "images/seat-4.png";
                            document.getElementById('seciliKoltuklar').value += secilenKoltukNO +","+ "K;";
                        }else{
                            imageElement[i].src = "images/seat-5.png";
                            document.getElementById('seciliKoltuklar').value += secilenKoltukNO +","+ "E;";
                        }
                        console.log(imageElement[i].src);
                        break; // Resmi bulduğumuzda döngüden çık
                    }
                }
                var secili = document.getElementById('seciliKoltukSayisi').value;
                secili++;
                document.getElementById('seciliKoltukSayisi').value = secili;
                
                alert("Koltuk seçimi başarılı");
            }else {
                alert("Koltuk seçimi başarısız");
            }
        }
    };
    xhr.send();
    $('#myModal').modal('hide');
}
function koltuguKaldir(koltukNo) {
    // seciliKoltuklar dizesini al
    var seciliKoltuklar = document.getElementById('seciliKoltuklar').value;

    // Koltuk numarasına göre arama yap
    var regex = new RegExp(koltukNo + ',(K|E);', 'g');
    var match = regex.exec(seciliKoltuklar);

    if (match) {
        // Bulunan koltuğu dizeden kaldır
        seciliKoltuklar = seciliKoltuklar.replace(match[0], '');
        
        // Güncellenmiş seciliKoltuklar değerini input alanına yaz
        document.getElementById('seciliKoltuklar').value = seciliKoltuklar;
        console.log("Koltuk " + koltukNo + " başarıyla kaldırıldı.");
    } else {
        console.log("Belirtilen koltuk numarası bulunamadı.");
    }
    var secili = document.getElementById('seciliKoltukSayisi').value;
    secili--;
    document.getElementById('seciliKoltukSayisi').value = secili;

}
$(function () {
        var origin, destination, map;

        // add input listeners
        google.maps.event.addDomListener(window, 'load', function (listener) {
            setDestination();
            initMap();
        });

        // init or load map
        function initMap() {

            var myLatLng = {
                lat: 20.5937,
                lng: 78.9629
            };
            map = new google.maps.Map(document.getElementById('map'), {zoom: 16, center: myLatLng,});
        }

        function setDestination() {
            var from_places = new google.maps.places.Autocomplete(document.getElementById('from_places'));
            var to_places = new google.maps.places.Autocomplete(document.getElementById('to_places'));

            google.maps.event.addListener(from_places, 'place_changed', function () {
                var from_place = from_places.getPlace();
                var from_address = from_place.formatted_address;
                $('#origin').val(from_address);
            });

            google.maps.event.addListener(to_places, 'place_changed', function () {
                var to_place = to_places.getPlace();
                var to_address = to_place.formatted_address;
                $('#destination').val(to_address);
            });


        }

        function displayRoute(travel_mode, origin, destination, directionsService, directionsDisplay) {
            directionsService.route({
                origin: origin,
                destination: destination,
                travelMode: travel_mode,
                avoidTolls: true
            }, function (response, status) {
                if (status === 'OK') {
                    directionsDisplay.setMap(map);
                    directionsDisplay.setDirections(response);
                } else {
                    directionsDisplay.setMap(null);
                    directionsDisplay.setDirections(null);
                    alert('Could not display directions due to: ' + status);
                }
            });
        }

        // calculate distance , after finish send result to callback function
        function calculateDistance(travel_mode, origin, destination) {

            var DistanceMatrixService = new google.maps.DistanceMatrixService();
            DistanceMatrixService.getDistanceMatrix(
                {
                    origins: [origin],
                    destinations: [destination],
                    travelMode: google.maps.TravelMode[travel_mode],
                    unitSystem: google.maps.UnitSystem.IMPERIAL, // miles and feet.
                    // unitSystem: google.maps.UnitSystem.metric, // kilometers and meters.
                    avoidHighways: false,
                    avoidTolls: false
                }, save_results);
        }

        // save distance results
        function save_results(response, status) {

            if (status != google.maps.DistanceMatrixStatus.OK) {
                $('#result').html(err);
            } else {
                var origin = response.originAddresses[0];
                var destination = response.destinationAddresses[0];
                if (response.rows[0].elements[0].status === "ZERO_RESULTS") {
                    $('#result').html("Sorry , not available to use this travel mode between " + origin + " and " + destination);
                } else {
                    var distance = response.rows[0].elements[0].distance;
                    var duration = response.rows[0].elements[0].duration;
                    var distance_in_kilo = distance.value / 1000; // the kilo meter
                    var distance_in_mile = distance.value / 1609.34; // the mile
                    var duration_text = duration.text;
                    appendResults(distance_in_kilo, distance_in_mile, duration_text);
                    sendAjaxRequest(origin, destination, distance_in_kilo, distance_in_mile, duration_text);
                }
            }
        }

        // append html results
        function appendResults(distance_in_kilo, distance_in_mile, duration_text) {
            $("#result").removeClass("hide");
            $('#in_mile').html(" Distance in Mile: <span class='badge badge-pill badge-secondary'>" + distance_in_mile.toFixed(2) + "</span>");
            $('#in_kilo').html("Distance in KM: <span class='badge badge-pill badge-secondary'>" + distance_in_kilo.toFixed(2) + "</span>");
            $('#duration_text').html("Duration: <span class='badge badge-pill badge-success'>" + duration_text + "</span>");
        }

        // send ajax request to save results in the database
        

        // on submit  display route ,append results and send calculateDistance to ajax request
        $('#distance_form').submit(function (e) {
            e.preventDefault();
            var origin = $('#origin').val();
            var destination = $('#destination').val();
            var travel_mode = $('#travel_mode').val();
            var directionsDisplay = new google.maps.DirectionsRenderer({'draggable': false});
            var directionsService = new google.maps.DirectionsService();
           displayRoute(travel_mode, origin, destination, directionsService, directionsDisplay);
            calculateDistance(travel_mode, origin, destination);
        });

    });

    // get current Position
    function getCurrentPosition() {
        if (navigator.geolocation) {
            navigator.geolocation.getCurrentPosition(setCurrentPosition);
        } else {
            alert("Geolocation is not supported by this browser.")
        }
    }

    // get formatted address based on current position and set it to input
    function setCurrentPosition(pos) {
        var geocoder = new google.maps.Geocoder();
        var latlng = {lat: parseFloat(pos.coords.latitude), lng: parseFloat(pos.coords.longitude)};
        geocoder.geocode({ 'location' :latlng  }, function (responses) {
            console.log(responses);
            if (responses && responses.length > 0) {
                $("#origin").val(responses[1].formatted_address);
                $("#from_places").val(responses[1].formatted_address);
                //    console.log(responses[1].formatted_address);
            } else {
                alert("Cannot determine address at this location.")
            }
        });
    }
</script>
<!--- /selectroom ---->