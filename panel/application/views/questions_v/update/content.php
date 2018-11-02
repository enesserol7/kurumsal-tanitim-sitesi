<div class="row">
    <div class="col-md-12">
        <h4 class="m-b-lg">
            <?php echo "<b>$item->title</b> kaydını düzenliyorsunuz"; ?>
        </h4>
    </div>
    <div class="col-md-12">
        <div class="widget">
            <div class="widget-body">
                <form action="<?php echo base_url("questions/update/$item->id"); ?>" method="post" enctype="multipart/form-data">
                    <div class="form-group">
                        <label>Başlık</label>
                        <input 
                        class="form-control" 
                        placeholder="Başlık" 
                        name="title" 
                        value="<?php echo isset($form_error) ? set_value("title") : $item->title; ?>">
                        <?php if(isset($form_error)){ ?>
                            <small class="pull-right input-form-error"> <?php echo form_error("title"); ?></small>
                        <?php } ?>
                    </div>
                    <div class="form-group">
                        <label>Açıklama</label>
                        <textarea name="description" class="m-0" data-plugin="summernote" data-options="{height: 250}"><?php echo isset($form_error) ? set_value("description") : $item->description; ?></textarea>
                    </div>
                    <div class="form-group">
                        <label>Soru Dili</label>
                        <select class="form-control" name="language">
                            <?php if($item->language == "TR") { ?>
                                <option selected="selected" value="TR">TR</option>
                                <option value="EN">EN</option>
                                <?php }else { ?><option value="TR">TR</option>
                                <option selected="selected" value="EN">EN</option>
                            <?php } ?>
                        </select>
                    </div>
                    <div class="form-group">
                        <label>Soru Dili</label>
                        <select class="form-control" name="language">
                            <?php if($item->language == "TR") { ?>
                                <option selected="selected" value="TR">TR (Türkçe/Turkish)</option>
                                <option value="EN">EN (İngilizce/English)</option>
                                <option value="DE">DE (Almanca/German)</option>
                            <?php }else if($item->language == "EN") { ?>
                                <option value="TR">TR (Türkçe/Turkish)</option>
                                <option selected="selected" value="EN">EN (İngilizce/English)</option>
                                <option value="DE">DE (Almanca/German)</option>
                            <?php }else{ ?>
                                <option value="TR">TR (Türkçe/Turkish)</option>
                                <option value="EN">EN (İngilizce/English)</option>
                                <option selected="selected" value="DE">DE (Almanca/German)</option>
                            <?php } ?>
                        </select>
                    </div>
                    <button type="submit" class="btn btn-primary btn-md btn-outline">Güncelle</button>
                    <a href="<?php echo base_url("questions"); ?>" class="btn btn-md btn-danger btn-outline">İptal</a>
                </form>
            </div>
        </div>
    </div>
</div>