<div class="rooms">
	<div class="container">
		<div class="room-bottom">
			<h3>Kartlarım</h3>			
			<?php foreach ($kartlar as $kart) : ?>
			<div class="rom-btm">
				<div class="col-md-6 room-midle wow fadeInUp animated" data-wow-delay=".5s">
					<h4><?php echo $kart["KartNumarasi"];?></h4>
					<h6>Son Kullanma Tarih / CCV</h6>
					<p><?php echo $kart["SonKullanmaTarihi"]." / ".$kart["CVV"];?></p>
					<p></p>
				</div>
				<div class="col-md-3 room-right wow fadeInRight animated" data-wow-delay=".5s">
					<button class="btn">Düzenle</button>
                    <button class="btn" style="background-color: red; color:white;" onclick="deleteOtobus(<?php echo $kart['ID'];?>);">Sil</button>
				</div>
				<div class="clearfix"></div>
			</div>
			<?php endforeach; ?>
            <button class="btn" style="background-color:grean; color:white;" ></button>
            <script>
                function deleteOtobus(id) {
                    if (confirm("Bu kartı silmek istediğinizden emin misiniz?")) {
                        $.ajax({
                            url: "<?php echo base_url('UmuttepeBusTicketSystem/ciapp/public/kullaniciKartlar/sil/'); ?>" + id,
                            type: "get",
                            success: function(response) {
                                alert("Kart başarıyla silindi!");
                                // Burada sayfayı yenileyebilir veya başka bir işlem yapabilirsiniz.
                                location.reload();
                            },
                            error: function(xhr, status, error) {
                                alert("Hata: " + xhr.responseText);
                            }
                        });
                    }
                }
            </script>
		</div>
	</div>
</div>