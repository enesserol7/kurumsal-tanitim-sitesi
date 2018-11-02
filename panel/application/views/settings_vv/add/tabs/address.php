<div role="tabpanel" class="tab-pane fade" id="tab-6">
	<div class="row">
		<div class="form-group col-md-12">
			<label>Adres Bilgisi</label>
			<textarea name="address" class="m-0" data-plugin="summernote" data-options="{height: 250}"></textarea>
		</div>
	</div>
	<div class="row">
        <div class="form-group col-md-4">
            <label>Harita Lat</label>
            <input class="form-control" placeholder="Harita Lat" name="lat" value="<?php echo isset($form_error) ? set_value("lat") : ""; ?>">
        </div>
        <div class="form-group col-md-4">
            <label>Harita Long</label>
            <input class="form-control" placeholder="Harita Long" name="long" value="<?php echo isset($form_error) ? set_value("long") : ""; ?>">
        </div>
    </div>
</div>