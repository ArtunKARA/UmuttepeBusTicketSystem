<!--- selectroom ---->
<div class="selectroom">
	<div class="container">
    <div class="selectroom_top">
    <noscript>
                  <div class='alert alert-info'>
                     <h4>Your JavaScript is disabled</h4>
                     <p>Please enable JavaScript to view the map.</p>
                  </div>
               </noscript>
               <div id="map" style="height: 500px; width: 100%" ></div>
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
                                                echo "<li><a href='#'><img src='images/seat-2.png' class='img-responsive' alt=''></a></li>";
                                            } elseif (in_array($i, $doluErkekKoltuklar)) {
                                                echo "<li><a href='#'><img src='images/seat-3.png' class='img-responsive' alt=''></a></li>";
                                            } else {
                                                echo "<li><a href='#'><img src='images/seat-1.png' class='img-responsive' alt=''></a></li>";
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
                                        for ($i = 32/2+1; $i <= 32; $i++) {
                                            if (in_array($i, $doluKadinKoltuklar)) {
                                                echo "<li><a href='#'><img src='images/seat-2.png' class='img-responsive' alt=''></a></li>";
                                            } elseif (in_array($i, $doluErkekKoltuklar)) {
                                                echo "<li><a href='#'><img src='images/seat-3.png' class='img-responsive' alt=''></a></li>";
                                            } else {
                                                echo "<li><a href='#'><img src='images/seat-1.png' class='img-responsive' alt=''></a></li>";
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
										<li><p class="aval">Rezerve Kadın</p></li>
										<div class="clearfix"></div>
									</ul>
									<ul class="ste1">
										<li><img src="images/seat-3.png" class="img-responsive" alt=""> </li>
										<li><p class="aval">Rezerve Erkek</p></li>
										<div class="clearfix"></div>
									</ul>
									<ul class="ste1">
										<li><img src="images/seat-5.png" class="img-responsive" alt=""> </li>
										<li><p class="aval">Seçili Koltuk</p></li>
										<div class="clearfix"></div>
									</ul>
								</div>
								
								<div class="clearfix"></div>
								<div style="margin-left: 70%; margin-top: 2%;">
								<button class="btn">Rezerve Et</button>
								<button class="btn" style="background-color: greenyellow;">Satın Al</button>
								</div>

	</div>
</div>

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
<!--- /selectroom ---->