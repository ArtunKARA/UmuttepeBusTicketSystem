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
                                        <td><?php echo $uye['Cinsiyet']; ?></td>
                                        <td><?php echo $uye['TelefonNo']; ?></td>
                                        <td><?php echo $uye['Mail']; ?></td>
                                        <td><?php echo $uye['Bakiye']; ?></td>
                                        <td>

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