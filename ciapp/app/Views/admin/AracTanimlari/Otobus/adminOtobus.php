<!-- PAGE CONTENT -->
<div class="content-wrapper">
    <div class="content">


        <div class="row">
            <div class="col-lg-12">
                <div class="card">
                    <div class="card-block">
                        <h6 class="card-title text-bold">Routes</h6>
                        <p class="content-group">
                            This is the most basic example of the datatables with zero configuration. Use the <code>.datatable</code> class to initialize datatables.
                        </p>
                        <table class="display datatable table table-stripped" cellspacing="0" width="100%">
                            <thead>
                                <tr>
                                    <th>Kayıt No</th>
                                    <th>Destinations</th>
                                    <th>İsim</th>
                                    <th>Plaka</th>
                                    <th>Koltuk Sayisi</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php foreach ($otobusler as $otobus) : ?>
                                    <tr>
                                        <td><?php echo $otobus['ID']; ?></td>
                                        <td><?php echo $otobus['Aktif']; ?></td>
                                        <td><?php echo $otobus['Isim']; ?></td>
                                        <td><?php echo $otobus['Plaka']; ?></td>
                                        <td><?php echo $otobus['KoltukSayisi']; ?></td>
                                        <td>
                                        <a href="<?php echo base_url(); ?>" class="btn btn-sm btn-warning">Edit</a>
                                            <a href="<?php echo base_url('admin/otobus/delete/' . $otobus['ID']); ?>" class="btn btn-sm btn-danger">Delete</a>
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