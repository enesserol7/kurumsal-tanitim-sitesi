<div class="row">
    <div class="col-md-12">
        <h4 class="m-b-lg">
            <?php echo "<b>$item->title</b> kaydını düzenliyorsunuz" ?>
        </h4>
    </div><!-- END column -->
    <div class="col-md-12">
        <div class="widget">
            <hr class="widget-separator">
            <div class="widget-body">                        
                <form action="<?php echo base_url("news/update/$item->id"); ?>" method="post" enctype="multipart/form-data">
                    <div class="form-group">
                        <label>Haber Adı</label>
                        <input class="form-control" placeholder="Haber Adı" name="title" value="<?php echo $item->title; ?>">
                        <?php if (isset($form_error)) { ?>
                            <small class="input-form-error pull-right"><?php echo form_error("title"); ?></small>
                        <?php } ?>
                    </div>
                    <div class="form-group">
                        <label>Açıklama</label>
                        <textarea name="description" class="m-0" data-plugin="summernote" data-options="{height: 250}"><?php echo $item->description; ?></textarea>
                    </div>
                    <div class="form-group">
                        <label for="control-demo-6" class="">Haberin Türü</label>
                        <div id="control-demo-6" class="">
                            <?php if (isset($form_error)) { ?>
                                <select class="form-control news_type_select" name="news_type">
                                    <option <?php echo ($news_type == "image") ? "selected" : ""; ?> value="image">Resim</option>
                                    <option <?php echo ($news_type == "video") ? "selected" : ""; ?> value="video">Video</option>
                                </select>
                            <?php } else { ?>
                                <select class="form-control news_type_select" name="news_type">
                                    <option <?php echo ($item->news_type == "image") ? "selected" : ""; ?> value="image">Resim</option>
                                    <option <?php echo ($item->news_type == "video") ? "selected" : ""; ?> value="video">Video</option>
                                </select>
                            <?php } ?>

                        </div>
                    </div><!-- .form-group -->
                    <?php if (isset($form_error)) { ?>
                        <div class="form-group image_upload_container" style="display: <?php echo ($news_type == "image") ? "block" : "none"; ?>">
                            <label>Görsel Seçiniz</label>
                            <input type="file" name="img_url" class="form-control">
                        </div>
                        <div class="form-group video_url_container" style="display: <?php echo ($news_type == "video") ? "block" : "none"; ?>">
                            <label>Video Url</label>
                            <input class="form-control" placeholder="Video bağlantısını buraya yapıştırınız." name="video_url">
                            <?php if (isset($form_error)) { ?>
                                <small class="input-form-error pull-right"><?php echo form_error("video_url"); ?></small>
                            <?php } ?>
                        </div>
                    <?php } else { ?>
                        <div class="row">
                            <div class="col-md-1 image_upload_container">
                                <img src="<?php echo get_picture($viewFolder, $item->img_url, "370x297"); ?>" class="img img-responsive">
                            </div>
                            <div class="col-md-9 form-group image_upload_container" style="display: <?php echo ($item->news_type == "image") ? "block" : "none"; ?>">
                                <label>Görsel Seçiniz</label>
                                <input type="file" name="img_url" class="form-control">
                            </div>
                        </div>
                        <div class="form-group video_url_container" style="display: <?php echo ($item->news_type == "video") ? "block" : "none"; ?>">
                            <label>Video Url</label>
                            <input class="form-control" placeholder="Video bağlantısını buraya yapıştırınız." name="video_url" value="<?php echo $item->video_url; ?>">
                        </div>
                    <?php } ?>
                    <div class="form-group">
                        <label>Haber Dili</label>
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
                    <a href="<?php echo base_url("news"); ?>" class="btn btn-md btn-danger btn-outlinen">İptal</a>
                </form>
            </div><!-- .widget-body -->
        </div><!-- .widget -->
    </div><!-- END column -->
</div>