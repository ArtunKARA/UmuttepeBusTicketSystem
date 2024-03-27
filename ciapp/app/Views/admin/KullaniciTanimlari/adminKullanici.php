<!-- PAGE CONTENT -->
<div class="content-wrapper">
    <div class="content">


        <div class="row">
            <div class="col-lg-12">
                <div class="card">
                    <div class="card-block">
                        <h6 class="card-title text-bold">Üyeler</h6>
                        <table class="display datatable table table-stripped" cellspacing="0" width="100%">
                            <thead>
                                <tr>
                                    <th>ID</th>
                                    <th>Ad Soyad</th>
                                    <th>TC Vatandaş</th>
                                    <th>TC-Pasaport No</th>
                                    <th>Doğum Tarihi</th>
                                    <th>Cinsiyet</th>
                                    <th>Telefon No</th>
                                    <th>E-posta</th>
                                    <th>Bakiye</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php foreach ($uyeler as $uye) : ?>
                                    <tr>
                                        <td><?php echo $uye['ID']; ?></td>
                                        <td><?php echo $uye['Isim']; ?></td>
                                        <td><?php echo $uye['TcVatandas']; ?></td>
                                        <td><?php echo $uye['VatandasNo']; ?></td>
                                        <td><?php echo $uye['DogumTarihi']; ?></td>
                                        <td><?php echo $uye['Cİnsiyet']; ?></td>
                                        <td><?php echo $uye['TelefonNo']; ?></td>
                                        <td><?php echo $uye['Mail']; ?></td>
                                        <td><?php echo $uye['Bakiye']; ?></td>
                                        <td>
                                        <a href="<?php echo base_url('UmuttepeBusTicketSystem/ciapp/public/admn/otobusDuzenle'.$uye['ID']); ?>" class="btn btn-sm btn-warning">Düzenle</a>
                                        <a href="javascript:void(0);" class="btn btn-sm btn-danger" onclick="deleteOtobus(<?php echo $uye['ID']; ?>)">Sil</a>
                                        <script>


                                            function deleteOtobus(id) {
                                                if (confirm("Bu otobüsü silmek istediğinizden emin misiniz?")) {
                                                    $.ajax({
                                                        url: "<?php echo base_url('UmuttepeBusTicketSystem/ciapp/public/admn/otobus/sil/'); ?>" + id,
                                                        type: "get",
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