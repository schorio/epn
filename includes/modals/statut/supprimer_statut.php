<div id="delete_statut<?php echo $id_statut; ?>" class="modal custom-modal fade" role="dialog">
	<div class="modal-dialog modal-dialog-centered">
		<form method="post">
			<!-- Modal content-->
			<div class="modal-content">
				<div class="modal-body-delete">
					<div class="form-header">
							<button type="button" class="close" data-dismiss="modal">&times;</button>
							<h3>Supprimer un statut</h3>
							<p>Voulez vous vraiment supprimer le statut <strong><?php echo $code_statut; ?></strong> ?</p>
					</div>
					<div class="modal-btn delete-action">
						<input type="hidden" name="delete_id" value="<?php echo $id_statut; ?>">
						<div class="row">
							<div class="col-6">
								<a href="javascript:void(0);" data-dismiss="modal" class="btn btn-primary cancel-btn">Annuler</a>
							</div>
							<div class="col-6">
								<button type="submit" name="delete_statut" class="btn btn-primary continue-btn">Supprimer</button>
							</div>
						</div>
					</div>
				</div>
			</div>
		</form>
	</div>
</div>