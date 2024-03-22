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
                            <h6><?php echo $_POST["gidis"]; if(isset($donus)){echo " - ".$_POST["donus"];} ?></h6>
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
      

<!-- koltuk  -->

<?php
// Örnek veri
$koltuklar = array(
    array("KoltukNo" => 1, "Durum" => "Boş", "OturanCinsiyeti" => ""), // Boş koltuk
    array("KoltukNo" => 2, "Durum" => "Boş", "OturanCinsiyeti" => ""), // Boş koltuk
    array("KoltukNo" => 3, "Durum" => "Boş", "OturanCinsiyeti" => ""), // Boş koltuk
    // Diğer koltuklar buraya eklenebilir
);

// Koltukları kontrol etmek için kullanılacak kod
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

<!-- HTML ve JavaScript Kodları -->
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Koltuk Seçimi</title>
</head>
<body>

<div class="selectroom_top">
    <div class="set-left">
        <ul class="set">
            <?php
            for ($i = 1; $i <= 32/2; $i++) {
                echo "<li><input type='checkbox' class='koltuk bos' data-koltuk-no='$i'>$i</li>";
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
                echo "<li><input type='checkbox' class='koltuk bos' data-koltuk-no='$i'>$i</li>";
            }
            ?>
            <div class="clearfix"></div>
        </ul>
    </div>
    <div class="set-right">
        <!-- Diğer koltuk türlerini listeleme bölümü buraya gelebilir -->
    </div>
    <div class="clearfix"></div>
    <div style="margin-top: 2%; display: flex; justify-content: center;">
        <button class="btn" style="margin-right: 5px;">Rezerve Et</button>
        <form method="post" action="<?php echo Base_url('UmuttepeBusTicketSystem/ciapp/public/kullaniciBilgi'); ?>">
            <button class="btn" style="background-color: greenyellow; margin-left: 5px;">Satın Al</button>
        </form>
    </div>
    <div class="sear"></div>
</div>
</div>

<!-- Yeni eklenen HTML kodu -->
<div id="cinsiyetSecimPopup" class="cinsiyet-popup" style="display: none; position: absolute;">
    <form id="cinsiyetForm">
        <label><input type="radio" name="cinsiyet" value="kiz"> Kız</label>
        <label><input type="radio" name="cinsiyet" value="erkek"> Erkek</label>
        <button type="submit">Seç</button>
    </form>
</div>

<!-- Yeni eklenen JavaScript kodu -->
<script>
document.addEventListener('DOMContentLoaded', function() {
    // HTML'den koltukları seç
    const koltuklar = document.querySelectorAll('.koltuk');
    // Cinsiyet seçim popup'ını ve formunu seç
    const cinsiyetSecimPopup = document.getElementById('cinsiyetSecimPopup');
    const cinsiyetForm = document.getElementById('cinsiyetForm');
    // Seçilen koltukları saklamak için dizi oluştur
    let secilenKoltuklar = [];

    // Koltuklar üzerinde değişiklik dinleyicisi ekle
    koltuklar.forEach(koltuk => {
        koltuk.addEventListener('change', function() {
            const koltukNo = this.getAttribute('data-koltuk-no');
            // Koltuk tiklendiğinde
            if (this.checked) {
                // En fazla 3 koltuk seçilebilir
                if (secilenKoltuklar.length >= 3) {
                    alert("En fazla 3 koltuk seçebilirsiniz!");
                    this.checked = false; // Tik kaldır
                    return;
                }

                

                // Seçilen koltukları diziye ekle
                secilenKoltuklar.push({koltukNo: koltukNo, cinsiyet: ""});
                // Cinsiyet seçim popup'ını göster
                cinsiyetSecimPopup.style.display = 'block';
                cinsiyetSecimPopup.style.top = this.offsetTop + this.offsetHeight + 'px';
                cinsiyetSecimPopup.style.left = this.offsetLeft + 'px';
                // Cinsiyet formunu gönderirken
                cinsiyetForm.onsubmit = function(event) {
                    event.preventDefault();
                    // Seçilen cinsiyeti al
                    const cinsiyet = document.querySelector('input[name="cinsiyet"]:checked');
                    if (cinsiyet) {
                        // Seçilen koltuğu bul
                        const secilenKoltuk = secilenKoltuklar.find(k => k.koltukNo === koltukNo);
                        if (secilenKoltuk) {
                            // Koltuğun cinsiyetini ayarla
                            secilenKoltuk.cinsiyet = cinsiyet.value;
                            // Koltuğun rengini belirle
                            koltuk.parentNode.style.backgroundColor = cinsiyet.value === 'kiz' ? 'pink' : 'lightblue';
                        }
                        // Cinsiyet seçim popup'ını gizle
                        cinsiyetSecimPopup.style.display = 'none';
                    } else {
                        // Cinsiyet seçilmemişse uyarı ver
                        alert("Lütfen bir cinsiyet seçin!");
                    }
                };
            } else {
                // Koltuk tik kaldırıldığında
                // Seçilen koltukları diziden çıkar
                secilenKoltuklar = secilenKoltuklar.filter(k => k.koltukNo !== koltukNo);
                // Koltuğun rengini kaldır
                koltuk.parentNode.style.backgroundColor = '';
            }
        });
    });

    // Cinsiyet formunu gönderirken
    cinsiyetForm.addEventListener('submit', function(event) {
        event.preventDefault();
        // Seçilen cinsiyeti al
        const cinsiyet = document.querySelector('input[name="cinsiyet"]:checked');
        if (cinsiyet) {
            // Seçilen koltuğu bul
            const secilenKoltuk = secilenKoltuklar.find(k => k.koltukNo === koltukNo);
            if (secilenKoltuk) {
                // Koltuğun cinsiyetini ayarla
                secilenKoltuk.cinsiyet = cinsiyet.value;
                // Koltuğun rengini belirle
                const checkedKoltuk = document.querySelector('.koltuk[data-koltuk-no="' + secilenKoltuk.koltukNo + '"]');
                if (checkedKoltuk) {
                    checkedKoltuk.parentNode.style.backgroundColor = cinsiyet.value === 'kiz' ? 'pink' : 'lightblue';
                }
            }
            // Cinsiyet seçim popup'ını gizle
            cinsiyetSecimPopup.style.display = 'none';
        } else {
            // Cinsiyet seçilmemişse uyarı ver
            alert("Lütfen bir cinsiyet seçin!");
        }
    });
});
</script>











<!-- koltuk son -->






<!-- map -->
<script>
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
<!--- /selectroom ---->