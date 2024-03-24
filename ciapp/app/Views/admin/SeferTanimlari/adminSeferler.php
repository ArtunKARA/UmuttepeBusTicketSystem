<!-- PAGE CONTENT -->
<div class="content-wrapper">
    <div class="content">


        <div class="row">
            <div class="col-lg-12">
                <div class="card">
                    <div class="card-block">
                        <h6 class="card-title text-bold">Seferler</h6>
                        <a href="<?php echo base_url('UmuttepeBusTicketSystem/ciapp/public/admn/otobusDuzenle'); ?>" class="btn btn-sm btn">Ekle</a>
                        <table class="display datatable table table-stripped" cellspacing="0" width="100%">
                            <thead>
                                <tr>
                                    <th>Kayıt No</th>
                                    <th>Kalkış Şehiri</th>
                                    <th>Kalkış Terminali</th>
                                    <th>Variş Şehri</th>
                                    <th>Variş Terminali</th>
                                    <th>OtobusIsim</th>
                                    <th>OtobusPlaka</th>
                                    <th>KalkisSaat</th>
                                    <th>VarisSaat</th>
                                    <th>Fiyat</th>
                                    <th>Durum</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php foreach ($seferler as $sefer) : ?>
                                    <tr>
                                        <td><?php echo $sefer['SeferID']; ?></td>
                                        <td><?php echo $sefer['KalkisSehri']; ?></td>
                                        <td><?php echo $sefer['KalkisTermini']; ?></td>
                                        <td><?php echo $sefer['VarisSehri']; ?></td>
                                        <td><?php echo $sefer['VarisTermini']; ?></td>
                                        <td><?php echo $sefer['OtobusIsim']; ?></td>
                                        <td><?php echo $sefer['OtobusPlaka']; ?></td>
                                        <td><?php echo $sefer['KalkisSaat']; ?></td>
                                        <td><?php echo $sefer['VarisSaat']; ?></td>
                                        <td><?php echo $sefer['Fiyat']; ?></td>
                                        <td><?php echo $sefer['Durum']; ?></td>

                                        <td>
                                        <a href="<?php echo base_url('UmuttepeBusTicketSystem/ciapp/public/admn/seferDuzenle'.$sefer['SeferID']); ?>" class="btn btn-sm btn-warning">Düzenle</a>
                                        <a href="javascript:void(0);" class="btn btn-sm btn-danger" onclick="deleteOtobus(<?php echo $sefer['SeferID']; ?>)">Sil</a>
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