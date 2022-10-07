<div id="add_grade" class="modal custom-modal fade" role="dialog">
					<div class="modal-dialog modal-dialog-centered" role="document">
						<div class="modal-content">
							<div class="modal-header">
								<h5 class="modal-title">Ajouter une grade</h5>
								<button type="button" class="close" data-dismiss="modal" aria-label="Close">
									<span aria-hidden="true">&times;</span>
								</button>
							</div>
							<div class="modal-body">
								<form method="POST">
									<div class="form-group">
										<label>Code du grade <span class="text-danger">*</span></label>
										<input name="code_grade" required class="form-control" type="text">
									</div>
									<div class="submit-section">
										<button name="ajouter_grade" type="POST" class="btn btn-primary submit-btn">Valider</button>
									</div>
								</form>
							</div>
						</div>
					</div>
				</div>