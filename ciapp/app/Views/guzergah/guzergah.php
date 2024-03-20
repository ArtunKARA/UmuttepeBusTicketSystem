<div class="bus-btm">
	<div class="container">
		<ul>
			<li class="trav"><a href="#"><b>Güzergah (<?php
		      echo $gidis;
			  if($donus != null){
				  echo " - " . $donus;
			  }
			?>)</b></a></li>
			<li class="dept"><a href="#"><b>Kalkış Saati</b></a></li>
			<li class="arriv"><a href="#"><b>Varış Saati</b></a></li>
			<li class="seat"><a href="#"><b>Koltuklar</b></a></li>
			<li class="fare"><a href="#"><b>Bilet Fiyatı</a></li>
				<div class="clearfix"></div>
		</ul>
	</div>
</div>

<!--- güzergah  ---->
<div class="bus-midd wow zoomIn animated animated" data-wow-delay=".5s" style="visibility: visible; animation-delay: 0.5s; animation-name: zoomIn;">
	<div class="container">
	
	<?php foreach ($seferler as $sefer) : ?>
		<ul class="first">
			<li class="trav">
				<div class="bus-ic">
					<img src="images/bus.png" class="img-responsive" alt="">
				</div>
				<div class="bus-txt">
					<h4><?php echo $sefer['KalkisSehri']?> - <?php echo $sefer['VarisSehri']?></h4>
					<p><?php echo $sefer['OtobusIsim']?></p>
				</div>
				<div class="clearfix"></div>
			</li>
			<li class="dept">
				<div class="bus-ic1">
					<i class="fa fa-clock-o"></i>
				</div>
				<div class="bus-txt1">
					<h4><a href="#"><?php echo $sefer['KalkisSaat']?></a></h4>
					<p>Süre</p>
				</div>
				<div class="clearfix"></div>
			</li>
			<li class="arriv">
				<div class="bus-txt2">
					<h4><a href="#"><?php echo $sefer['VarisSaat']?></a></h4>
					<p><?php echo $sefer['Fiyat']?> Hrs</p>
				</div>
			</li>
			<li class="seat">
				<div class="bus-ic3">
					<img src="images/seat.png" class="img-responsive" alt="">
				</div>
				<div class="bus-txt3">
					<h4><?php echo $sefer['KoltukSayisi']?></h4>
					<p>2+1</p>
				</div>
				<div class="clearfix"></div>
			</li>
			<li class="fare">
				<div class="bus-txt4">
					<h5>TL <?php echo $sefer['Fiyat']?></h4>
					<Form method="POST" action="<?php echo base_url('UmuttepeBusTicketSystem/ciapp/public/guzergahdetayi'); ?>">
						<input type="hidden" name="seferID" value="<?php echo $sefer['SeferID']; ?>">
						<input type="hidden" name="gidis" value="<?php echo $gidis; ?>">
						<input type="hidden" name="donus" value="<?php echo $donus; ?>">
					<button class="view" type="submit" style="background-color: #4CB320; border-color: #4CB320; margin-top: 10px; margin-bottom: 10px; width: 100%;">SEFER DETAY</button>
					</Form>
					
			</li>
				<div class="clearfix"></div>
		</ul>
    <?php endforeach; ?>
</div>
</div>
		<!--- /güzergah  ---->