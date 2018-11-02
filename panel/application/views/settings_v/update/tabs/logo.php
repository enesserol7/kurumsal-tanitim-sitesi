<div role="tabpanel" class="tab-pane fade" id="tab-7">
    <div class="row">
        <div class="col-md-2">
            <img
                src="<?php echo get_picture($viewFolder, $item->logo, "165x57"); ?>"
                alt="<?php echo $item->company_name; ?>"
                class="img-responsive"
                style="margin: 0px auto"
            >
        </div>
        <div class="form-group col-md-6">
            <label>Masaüstü Logo Seçimi</label>
            <input type="file" name="logo" class="form-control">
        </div>
    </div>
    <div class="row">
        <div class="col-md-2">
            <img
                src="<?php echo get_picture($viewFolder, $item->mobile_logo, "134x42"); ?>"
                alt="<?php echo $item->company_name; ?>"
                class="img-responsive"
                style="margin: 0px auto"
            >
        </div>
        <div class="form-group col-md-6">
            <label>Mobil Logo Seçimi</label>
            <input type="file" name="mobile_logo" class="form-control">
        </div>
    </div>
    <div class="row">
        <div class="col-md-2">
            <img
                src="<?php echo get_picture($viewFolder, $item->favicon, "32x32"); ?>"
                alt="<?php echo $item->company_name; ?>"
                class="img-responsive"
                style="margin: 0px auto"
            >
        </div>
        <div class="form-group col-md-6">
            <label>Favicon Seçimi</label>
            <input type="file" name="favicon" class="form-control">
        </div>
    </div>
</div>