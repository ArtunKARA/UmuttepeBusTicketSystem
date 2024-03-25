<div class="rooms">
	<div class="container">
		<div class="room-bottom">
			<h3>Biletlerim</h3>			
			<?php
				function qrCode($s, $w = 250, $h = 250){
					$u = 'https://chart.googleapis.com/chart?chs=%dx%d&cht=qr&chl=%s';
					$url = sprintf($u, $w, $h, $s);
					return $url;
				}
			?>
			<?php foreach ($biletler as $bilet) : ?>
			<div class="rom-btm">
				<div class="col-md-3 room-left wow fadeInLeft animated" data-wow-delay=".5s">
				<?php
					$qr = qrCode($bilet["PNR"], 200, 200); // 200x200
					?>
					<img style="display:block ;margin-left: auto; margin-right: auto;" src="<?=$qr?>">
					<p style="font-size:small;">PNR: <?php echo $bilet["PNR"];?></p>
				</div>
				<div class="col-md-6 room-midle wow fadeInUp animated" data-wow-delay=".5s">
					<h4><?php echo $bilet["KalkisSehri"]." - ".$bilet["VarisSehri"];?></h4>
					<h6>Kalkış Tarih / Saat</h6>
					<p><?php echo $bilet["KalkisSaat"]." / ".$bilet["Tarih"];?></p>
					<h6 style="color: #4CB320;">Koltuk No:<span style="color: black;"><?php echo $bilet["KoltukNo"];?></span></h6>
					<h6 style="color: #4CB320;">Yolcu Adı: <span style="color: black;"><?php echo $bilet["YolcuAdi"];?></span></h6>
					<p></p>
				</div>
				<div class="col-md-3 room-right wow fadeInRight animated" data-wow-delay=".5s">
					<h5><?php echo $bilet["BiletUcret"];?> TL</h5>

					<form action="biletIptal" method="post">
						<input type="hidden" name="biletID" value="<?php echo $bilet["PNR"];?>">
						<input type="hidden" name="aksiyon" value="iptal">
					<input type="submit" value="İptal Et">


					<?php
						if($bilet["BiletTipi"] == 'Aktif'){
							echo '<p style="color: green;">Aktif</p>';
							echo '<a style="background-color: red;" href="biletIptal/'.$bilet["PNR"].'" class="view">İptal Et</a>';
						}
						else if($bilet["BiletTipi"] == 'Geçmiş'){
							echo '<p style="color: Red;">Tamamlandı</p>';
							echo '<a style="background-color: orange;" class="view">Sefer Serçekleşti</a>';
						}
						else if($bilet["BiletTipi"] == 'Rezervasyon'){
							echo '<p style="color: blue;">Rezerve</p>';
							echo '<a href="biletIptal/'.$bilet["PNR"].'" class="view">Satın Al</a>';
						}else{
							echo '<p style="color: black;">Açığa Alındı</p>';
							echo '<a style="background-color: red;" class="view">Fiyat	Bakiyeye Yansımıştır</a>';
						}	
					?>
				</div>
				<div class="clearfix"></div>
			</div>
			<?php endforeach; ?>
		</div>
	</div>
</div>
