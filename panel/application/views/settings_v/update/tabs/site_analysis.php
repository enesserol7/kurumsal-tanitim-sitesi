<div role="tabpanel" class="tab-pane fade" id="tab-9">
	<div class="row">
		<div class="form-group col-md-12">
			<label>Google Analytics (Script kodlarını editörün "Code View (< / >)" bölümünden ekleyiniz!)</label>
			<textarea name="analytics" class="m-0" data-plugin="summernote" data-options="{height: 250}"><?php echo isset($form_error) ? set_value("analytics") : $item->analytics; ?></textarea>
		</div>
		<div class="form-group col-md-12">
			<label>Yandex Metrica (Script kodlarını editörün "Code View (< / >)" bölümünden ekleyiniz!)</label>
			<textarea name="metrica" class="m-0" data-plugin="summernote" data-options="{height: 250}"><?php echo isset($form_error) ? set_value("metrica") : $item->metrica; ?></textarea>
		</div>
	</div>
</div>