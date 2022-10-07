<div id="edit_grade<?php echo $id_grade; ?>" class="modal custom-modal fade" role="dialog">
					<div class="modal-dialog modal-dialog-centered" role="document">
						<div class="modal-content">
							<div class="modal-header">
								<h5 class="modal-title">Modifier la grade</h5>
								<button type="button" class="close" data-dismiss="modal" aria-label="Close">
									<span aria-hidden="true">&times;</span>
								</button>
							</div>
							<div class="modal-body">
								<form method="post">
									<input type="hidden" name="edit_id" value="<?php echo $id_grade; ?>">
									<div class="form-group">
										<label>Code du grade<span class="text-danger">*</span></label>
										<input class="form-control" name="n_code_grade" value="<?php echo $code_grade; ?>" type="text">
									</div>
									<div class="submit-section">
										<button name="modifier_grade" type="submit" class="btn btn-primary submit-btn">Sauvegarder</button>
									</div>
								</form>
							</div>
						</div>
					</div>
				</div>