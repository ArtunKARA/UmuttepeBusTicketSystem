<!-- PAGE CONTENT -->
<div class="content-wrapper">
    <div class="content">
        <div class="row">
            <div class="col-lg-12">
                <div class="card">
                    <div class="card-block">
                        <legend class="text-bold">Sefer Düzenle</legend>
                        <fieldset class="content-group">
                        <form method="POST" action="<?php echo base_url('UmuttepeBusTicketSystem/ciapp/public/admn/'); ?>SeferGuncelle">
                            <input name="ID" type="hidden" name="id" value="<?php echo $sefer['ID']; ?>">
                            <div class="form-group row margin-top-10">
                                <div class="col-md-2">
                                    <label class="control-label col-form-label">Otobüs</label>
                                </div>
                                <div class="col-md-10">
                                    <input name="Isim" type="text" class="form-control" name="busID" value="<?php echo $sefer['OtobusID']; ?>">
                                </div>
                            </div>                                                  
                            <div class="form-group row">
                                <div class="col-md-2">
                                    <label class="control-label col-form-label">Aktif</label>
                                </div>
                                <div class="col-md-10">
                                    <input name="Aktif" type="number" class="form-control" name="seferAktif" value="<?php echo $sefer['Aktif']; ?>">
                                </div>
                            </div>
                            <div class="form-group row">
                                <div class="col-md-12">
                                    <button type="submit" class="btn btn-primary">Güncelle</button>
                                </div>
                            </div>
                            </form>

                        </fieldset>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<!-- /PAGE CONTENT -->