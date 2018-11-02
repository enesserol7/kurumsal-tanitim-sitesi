<div role="tabpanel" class="tab-pane fade" id="tab-9">
	<div class="row">
		<div class="form-group col-md-12">
			<label>Google Analytics</label>
			<textarea class="form-control" name="analytics" cols="30" rows="10"><?php echo isset($form_error) ? set_value("analytics") : $item->analytics; ?></textarea>
		</div>
		<div class="form-group col-md-12">
			<label>Yandex Metrica</label>
			<textarea class="form-control" name="metrica" cols="30" rows="10"><?php echo isset($form_error) ? set_value("metrica") : $item->metrica; ?></textarea>
		</div>
	</div>
</div>