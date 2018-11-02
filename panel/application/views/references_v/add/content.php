<div class="row">
    <div class="col-md-12">
        <h4 class="m-b-lg">
        	Yeni Ülke Ekle
        </h4>
    </div><!-- END column -->
    <div class="col-md-12">
        <div class="widget">
                    <hr class="widget-separator">
                    <div class="widget-body">                        
                        <form action="<?php echo base_url("references/save"); ?>" method="post" enctype="multipart/form-data">
                            <div class="form-group">
                                <label>Ülke Adı</label>
                                <input class="form-control" placeholder="Ülke Adı" name="title">
                                <?php if (isset($form_error)) { ?>
                                    <small class="input-form-error pull-right"><?php echo form_error("title"); ?></small>
                                <?php } ?>
                            </div>
                            <div class="form-group">
                                <label>Açıklama</label>
                                <textarea name="description" class="m-0" data-plugin="summernote" data-options="{height: 250}"></textarea>
                            </div>
                            <div class="form-group image_upload_container">
                                <label>Görsel Seçiniz</label>
                                <input type="file" name="img_url" class="form-control">
                            </div>
                            <div class="form-group">
                                <label>Dil</label>
                                <select class="form-control" name="language">
                                    <option value="TR">TR (Türkçe/Turkish)</option>
                                    <option value="EN">EN (İngilizce/English)</option>
                                    <option value="DE">DE (Almanca/German)</option>
                                </select>
                            </div>
                            <button type="submit" class="btn btn-primary btn-md btn-outline">Kaydet</button>
                            <a href="<?php echo base_url("references"); ?>" class="btn btn-md btn-danger btn-outlinen">İptal</a>
                        </form>
                    </div><!-- .widget-body -->
                </div><!-- .widget -->
    </div><!-- END column -->
</div>