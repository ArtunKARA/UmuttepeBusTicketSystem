<div class="rooms">
	<div class="container">
		<div class="room-bottom">
			<h3>Kartlarım</h3>			
			<?php foreach ($kartlar as $kart) : ?>
			<div class="rom-btm">
				<div class="col-md-9 room-midle wow fadeInUp animated" data-wow-delay=".5s">
					<h4><?php echo $kart["KartNumarasi"];?></h4>
					<h6>Son Kullanma Tarih / CCV</h6>
					<p><?php echo $kart["SonKullanmaTarihi"]." - ".$kart["CVV"];?></p>
					<p></p>
				</div>
				<div class="col-md-3 room-right wow fadeInRight animated" data-wow-delay=".5s">
                    <form method="post" action="<?php echo Base_url('UmuttepeBusTicketSystem/ciapp/public/kartDetay'); ?>">
                        <input type="hidden" name="kartID" value="<?php echo $kart['ID']; ?>">
                        <button class="btn" type="submit">Düzenle</button>
                        <button class="btn" style="background-color: red; color:white;" onclick="deleteOtobus(<?php echo $kart['ID'];?>);">Sil</button>
                    </form>
				</div>
				<div class="clearfix"></div>
			</div>
			<?php endforeach; ?>
            <form method="post" action="<?php echo Base_url('UmuttepeBusTicketSystem/ciapp/public/kartDetay'); ?>">
                <button class="btn" type="submit" style="width: 100% !important;color:white;background-color: #4CB320;outline: none;font-size: 14px;padding: 10px 10px ; border: 1px solid #9E9E9E;margin-top: 10px; border: 1px solid #E6E4E4 ;" >Kart Ekle</button>
            </form>
            
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