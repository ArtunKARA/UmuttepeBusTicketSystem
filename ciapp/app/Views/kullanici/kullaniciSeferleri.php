<div class="rooms">
	<div class="container">
		<div class="room-bottom">
			<h3>Biletlerim</h3>
			
			<?php foreach ($biletler as $bilet) : ?>
			<div class="rom-btm">
				<div class="col-md-6 room-midle wow fadeInUp animated" data-wow-delay=".5s">
					<h4><?php echo $bilet["KalkisSehri"]." - ".$bilet["VarisSehri"];?></h4>
					<h6>Inclusions (1)</h6>
					<p>Accommodation</p>
					<h6>Amenities (12)</h6>
					<p>Air Conditioning ,Balcony / Terrace,Cable / Satellite / Pay TV available,Ceiling Fan,Hairdryer</p>
				</div>
				<div class="col-md-3 room-right wow fadeInRight animated" data-wow-delay=".5s">
					<h5><?php echo $bilet["BiletUcret"];?></h5>
					<a href="selectroom.html" class="view">Book Now</a>
				</div>
				<div class="clearfix"></div>
			</div>
			<?php endforeach; ?>
			
		</div>
	</div>
</div>