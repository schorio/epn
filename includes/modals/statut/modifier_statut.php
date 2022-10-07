<div id="edit_statut<?php echo $id_statut; ?>" class="modal custom-modal fade" role="dialog">
	<form method="post" class="form-horizontal" role="form">
		<div class="modal-dialog modal-dialog-centered">
			<!-- Modal content-->
			<div class="modal-content">
				<div class="modal-header">
					<h5 class="modal-title">Modifier du statut</h5>
					<button type="button" class="close" data-dismiss="modal" aria-label="Close">
						<span aria-hidden="true">&times;</span>
					</button>
				</div>
				<div class="modal-body">
					<input type="hidden" name="edit_id" value="<?php echo $id_statut; ?>">
					<div class="form-group">
						<label for="n_code_statut">Code du statut : </label>
						<input type="text" class="form-control" id="n_code_statut" name="n_code_statut" value="<?php echo $code_statut; ?>" required>
					</div>
					<div class="form-group">
						<label for="n_nom_statut">Nom du statut : </label>
						<input type="text" class="form-control" id="n_nom_statut" name="n_nom_statut" value="<?php echo $nom_statut; ?>" required autofocus>
					</div>
					<div class="submit-section">
						<button type="submit" class="btn btn-primary submit-btn" id="modifier_statut" name="modifier_statut">Valider</button>
					</div>
				</div>
				
			</div>
		</div>
	</form>
</div>			