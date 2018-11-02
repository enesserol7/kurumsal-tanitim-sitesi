<div class="row">
    <div class="col-md-12">
        <h4 class="m-b-lg">
            <?php echo "<b>$item->user_name</b> kaydını düzenliyorsunuz" ?>
        </h4>
    </div><!-- END column -->
    <div class="col-md-12">
        <div class="widget">
                    <hr class="widget-separator">
                    <div class="widget-body">                        
                        <form action="<?php echo base_url("emailsettings/update/$item->id"); ?>" method="post">
                            <div class="form-group">
                                <label>Protokol</label>
                                <input class="form-control" placeholder="Protokol" name="protocol" value="<?php echo isset($form_error) ? set_value("protocol") : $item->protocol; ?>">
                                <?php if (isset($form_error)) { ?>
                                    <small class="input-form-error pull-right"><?php echo form_error("protocol"); ?></small>
                                <?php } ?>
                            </div>
                            <div class="form-group">
                                <label>E-Posta Sunucu Bilgisi</label>
                                <input class="form-control" placeholder="Hostname" name="host" value="<?php echo isset($form_error) ? set_value("host") : $item->host; ?>">
                                <?php if (isset($form_error)) { ?>
                                    <small class="input-form-error pull-right"><?php echo form_error("host"); ?></small>
                                <?php } ?>
                            </div>
                            <div class="form-group">
                                <label>Port Numarası</label>
                                <input type="text" class="form-control" placeholder="Port Numarası" name="port" value="<?php echo isset($form_error) ? set_value("port") : $item->port; ?>">
                                <?php if (isset($form_error)) { ?>
                                    <small class="input-form-error pull-right"><?php echo form_error("port"); ?></small>
                                <?php } ?>
                            </div>
                            <div class="form-group">
                                <label>E-Posta Başlık</label>
                                <input type="text" class="form-control" placeholder="E-Posta Başlık" name="user_name" value="<?php echo isset($form_error) ? set_value("user_name") : $item->user_name; ?>">
                                <?php if (isset($form_error)) { ?>
                                    <small class="input-form-error pull-right"><?php echo form_error("user_name"); ?></small>
                                <?php } ?>
                            </div>
                            <div class="form-group">
                                <label>E-Posta Adresi (User)</label>
                                <input type="email" class="form-control" placeholder="E-Posta Adresi (User)" name="user" value="<?php echo isset($form_error) ? set_value("user") : $item->user; ?>">
                                <?php if (isset($form_error)) { ?>
                                    <small class="input-form-error pull-right"><?php echo form_error("user"); ?></small>
                                <?php } ?>
                            </div>
                            <div class="form-group">
                                <label>E-Posta Adresine Ait Şifre</label>
                                <input type="password" class="form-control" placeholder="E-Posta Adresine Ait Şifre" name="password" value="<?php echo isset($form_error) ? set_value("password") : $item->password; ?>">
                                <?php if (isset($form_error)) { ?>
                                    <small class="input-form-error pull-right"><?php echo form_error("password"); ?></small>
                                <?php } ?>
                            </div>
                            <div class="form-group">
                                <label>Kimden Gidecek (From)</label>
                                <input type="email" class="form-control" placeholder="Kimden Gidecek (From)" name="from" value="<?php echo isset($form_error) ? set_value("from") : $item->from; ?>">
                                <?php if (isset($form_error)) { ?>
                                    <small class="input-form-error pull-right"><?php echo form_error("from"); ?></small>
                                <?php } ?>
                            </div>
                            <div class="form-group">
                                <label>Kime Gidecek (To)</label>
                                <input type="email" class="form-control" placeholder="Kime Gidecek (To)" name="to" value="<?php echo isset($form_error) ? set_value("to") : $item->to; ?>">
                                <?php if (isset($form_error)) { ?>
                                    <small class="input-form-error pull-right"><?php echo form_error("to"); ?></small>
                                <?php } ?>
                            </div>
                            <button type="submit" class="btn btn-primary btn-md btn-outline">Kaydet</button>
                            <a href="<?php echo base_url("emailsettings"); ?>" class="btn btn-md btn-danger btn-outlinen">İptal</a>
                        </form>
                    </div><!-- .widget-body -->
                </div><!-- .widget -->
    </div><!-- END column -->
</div>