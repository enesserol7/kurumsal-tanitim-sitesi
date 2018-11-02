<div class="row">
    <div class="col-md-12">
        <h4 class="m-b-lg">
            Site Ayarları
            <a href="<?php echo base_url("settings/new_form"); ?>" class="btn btn-outline btn-primary btn-xs pull-right"> <i class="fa fa-plus"></i> Yeni Ekle</a>
        </h4>
    </div><!-- END column -->
    <div class="col-md-12">
        <div class="widget p-lg">
            <?php if (empty($items)) { ?>
                <div class="alert alert-info text-center">
                    <h5 class="alert-title">Kayıt Bulunamadı</h5>
                    <p>Burada herhangi bir veri bulunmamaktadır. Ekleme için lütfen <a href="<?php echo base_url("settings/new_form"); ?>">tıklayınız...</a></p>
                </div>
            <?php }else { ?>
            <table class="table table-hover table-striped table-bordered content-container">

                <thead>
                    <th class="w50">#id</th>
                    <th>Başlık</th>
                    <th>Dil</th>
                    <th>Görsel</th>
                    <th>İşlem</th>
                </thead>
                <tbody>
                    <?php foreach ($items as $item) { ?>
                        <tr>
                            <td class="w50 text-center">#<?php echo $item->id; ?></td>
                            <td><?php echo $item->company_name; ?></td>
                            <td><?php echo $item->language; ?></td>
                            <td class="text-center w100">
                                <img width="75" src="<?php echo get_picture($viewFolder,$item->mobile_logo, "165x57"); ?>" alt="" class="img img-responsive">
                            </td>
                            <td class="text-center w200">
                                <button data-url="<?php echo base_url("settings/delete/$item->id"); ?>" class="btn btn-sm btn-danger btn-outline remove-btn"><i class="fa fa-trash"></i> Sil</button>
                                <a href="<?php echo base_url("settings/update_form/$item->id"); ?>" class="btn btn-sm btn-info btn-outline"><i class="fa fa-pencil-square-o"></i> Düzenle</a>
                            </td>
                        </tr>
                    <?php } ?>                    
                </tbody>

            </table>
        <?php } ?>

        </div><!-- .widget -->
    </div><!-- END column -->
</div>