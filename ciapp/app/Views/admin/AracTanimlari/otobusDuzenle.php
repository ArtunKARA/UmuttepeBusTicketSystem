<!-- PAGE CONTENT -->
<div class="content-wrapper">
    <div class="content">
        <div class="row">
            <div class="col-lg-12">
                <div class="card">
                    <div class="card-block">
                        <legend class="text-bold">Otobüs Düzenle</legend>
                        <fieldset class="content-group">
                        <form method="POST" action="<?php if (isset($otobus['ID'])){
                                echo base_url('UmuttepeBusTicketSystem/ciapp/public/admn/otobusGuncelle');                       
                            }
                            else{
                                echo base_url('UmuttepeBusTicketSystem/ciapp/public/admn/otobusEkleme'); 
                            }?>">                                 
                            <input name="ID" type="hidden" name="id" value="<?php if (isset($otobus['ID'])){
                                echo $otobus['ID'];                          
                            } 
                            else{
                                echo null;
                            }                               
                            ?>">
                            <div class="form-group row margin-top-10">
                                <div class="col-md-2">
                                    <label class="control-label col-form-label">Model</label>
                                </div>
                                <div class="col-md-10">
                                    <input name="Isim" type="text" class="form-control" name="busNo" value="<?php if (isset($otobus['Isim'])){
                                echo $otobus['Isim'];                          
                            } 
                            else{
                                echo null;
                            }                               
                            ?>">
                                </div>
                            </div>
                            <div class="form-group row">
                                <div class="col-md-2">
                                    <label class="control-label col-form-label">Plaka</label>
                                </div>
                                <div class="col-md-10">
                                    <input name="Plaka" type="text" class="form-control" name="name" value="<?php if (isset($otobus['Plaka'])){
                                echo $otobus['Plaka'];                          
                            } 
                            else{
                                echo null;
                            }                               
                            ?>">
                                </div>
                            </div>
                            <div class="form-group row">
                                <div class="col-md-2">
                                    <label class="control-label col-form-label">Koltuk Sayısı</label>
                                </div>
                                <div class="col-md-10">
                                    <input name="KoltukSayisi" type="number" class="form-control" name="noOfSeats" value="<?php if (isset($otobus['KoltukSayisi'])){
                                echo $otobus['KoltukSayisi'];                          
                            } 
                            else{
                                echo null;
                            }                               
                            ?>">
                                </div>
                            </div>
                            <div class="form-group row">
                                <div class="col-md-2">
                                    <label class="control-label col-form-label">Aktif</label>
                                </div>
                                <div class="col-md-10">
                                    <input name="Aktif" type="number" class="form-control" name="noOfSeats" value="<?php if (isset($otobus['KoltukSayisi'])){
                                echo $otobus['KoltukSayisi'];                          
                            } 
                            else{
                                echo null;
                            }                               
                            ?>">
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
