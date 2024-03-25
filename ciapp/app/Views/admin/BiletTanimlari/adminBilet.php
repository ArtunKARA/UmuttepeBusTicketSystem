<!-- PAGE CONTENT -->
<div class="content-wrapper">
    <div class="content">


        <div class="row">
            <div class="col-lg-12">
                <div class="card">
                    <div class="card-block">
                        <h6 class="card-title text-bold">Biletler</h6>
                        <a href="<?php echo base_url('UmuttepeBusTicketSystem/ciapp/public/admn/otobusDuzenle'); ?>" class="btn btn-sm btn">Ekle</a>
                        <table class="display datatable table table-stripped" cellspacing="0" width="100%">
                            <thead>
                                <tr>
                                    <th>Bilet ID</th>
                                    <th>PNR No</th>
                                    <th>Kullanıcı İsmi</th>
                                    <th>Kullanıcı olmayan isim</th>
                                    <th>Kalkış Şehri</th>
                                    <th>Varış Şehri</th>
                                    <th>Kalkış Saati</th>
                                    <th>Varış Saati</th>
                                    <th>Tarih</th>
                                    <th>Koltuk No</th>
                                    <th>Bilet Durumu</th>
                                    <th>Bilet Ücreti</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php foreach ($biletler as $bilet) : ?>
                                    <tr>
                                        <td><?php echo $bilet['BiletID']; ?></td>
                                        <td><?php echo $bilet['PNR']; ?></td>
                                        <td><?php echo $bilet['KullaniciIsmi']; ?></td>
                                        <td><?php echo $bilet['KullaniciOlmayanIsmi']; ?></td>
                                        <td><?php echo $bilet['KalkisSehri']; ?></td>
                                        <td><?php echo $bilet['ID']; ?></td>
                                        <td><?php echo $bilet['Aktif']; ?></td>
                                        <td><?php echo $bilet['Isim']; ?></td>
                                        <td><?php echo $bilet['Plaka']; ?></td>
                                        <td><?php echo $bilet['KoltukSayisi']; ?></td>
                                        <td><?php echo $bilet['KoltukSayisi']; ?></td>
                                        <td>
                                        <a href="<?php echo base_url('UmuttepeBusTicketSystem/ciapp/public/admn/otobusDuzenle'.$otobus['ID']); ?>" class="btn btn-sm btn-warning">Düzenle</a>
                                        <a href="javascript:void(0);" class="btn btn-sm btn-danger" onclick="deleteOtobus(<?php echo $otobus['ID']; ?>)">Sil</a>
                                        <script>
                                            function deleteOtobus(id) {
                                                if (confirm("Bu otobüsü silmek istediğinizden emin misiniz?")) {
                                                    $.ajax({
                                                        url: "<?php echo base_url('UmuttepeBusTicketSystem/ciapp/public/adm/otobus/'); ?>" + id,
                                                        type: "DELETE",
                                                        success: function(response) {
                                                            alert("Otobüs başarıyla silindi!");
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
                                        </td>
                                    </tr>
                                <?php endforeach; ?>
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<!-- /PAGE CONTENT -->