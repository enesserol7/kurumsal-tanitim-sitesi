<div role="tabpanel" class="tab-pane fade" id="tab-10">
	<div class="row">
		<div class="form-group col-md-12">
			<label>Canlı Destek (Script kodlarını editörün "Code View (< / >)" bölümünden ekleyiniz!)</label>
			<textarea name="live_support" class="m-0" data-plugin="summernote" data-options="{height: 250}"><?php echo isset($form_error) ? set_value("live_support") : $item->live_support; ?></textarea>
		</div>
	</div>
</div>