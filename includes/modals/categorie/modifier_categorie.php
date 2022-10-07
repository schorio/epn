<div id="edit_categorie<?php echo $id_categorie; ?>" class="modal custom-modal fade" role="dialog">
	<div class="modal-dialog modal-dialog-centered" role="document">
		<div class="modal-content">
			<div class="modal-header">
				<h5 class="modal-title">Modifier la categorie</h5>
				<button type="button" class="close" data-dismiss="modal" aria-label="Close">
					<span aria-hidden="true">&times;</span>
				</button>
			</div>
			<div class="modal-body">
				<form method="post">
					<input type="hidden" name="edit_id" value="<?php echo $id_categorie; ?>">
					<div class="form-group">
						<label>Code du categorie<span class="text-danger">*</span></label>
						<input class="form-control" name="n_code_categorie" value="<?php echo $code_categorie; ?>" type="text">
					</div>
					<div class="submit-section">
						<button name="modifier_categorie" type="submit" class="btn btn-primary submit-btn">Sauvegarder</button>
					</div>
				</form>
			</div>
		</div>
	</div>
</div>