<div id="modifier_ut<?php echo $row["id_ut"]; ?>" class="modal custom-modal fade" role="dialog">
	<div class="modal-dialog modal-dialog-centered modal-lg" role="document">
		<div class="modal-content">
			<div class="modal-header">
				<h5 class="modal-title">Modification du profile utilisateur</h5>
				<button type="button" class="close" data-dismiss="modal" aria-label="Close">
					<span aria-hidden="true">&times;</span>
				</button>
			</div>
			<div class="modal-body">
				<form id="sampleForm" name="sampleForm" method="POST" enctype="multipart/form-data">
					<input type="hidden" name="edit_id" value="<?php echo $row["id_ut"]; ?>">
					<div class="row">
						<div class="col-sm-6">
							<div class="form-group">
								<label>Nom <span class="text-danger">*</span></label>
								<input class="form-control" required name="nom_ut" value="<?php echo $row["nom_ut"]; ?>" type="text">
							</div>
						</div>
						<div class="col-sm-6">
							<div class="form-group">
								<label>Prenom </label>
								<input class="form-control" required name="prenom_ut" value="<?php echo $row["prenom_ut"]; ?>" type="text">
							</div>
						</div>
						<div class="col-sm-6">
							<div class="form-group">
								<label>Username <span class="text-danger">*</span></label>
								<input class="form-control" name="username_ut" required value="<?php echo $row["username_ut"]; ?>" type="text">
							</div>
						</div>
						<div class="col-sm-6">
							<div class="form-group">
								<label>Email <span class="text-danger">*</span></label>
								<input class="form-control" required name="email_ut" value="<?php echo $row["email_ut"]; ?>" type="email">
							</div>
						</div>
						<div class="col-sm-6">
							<div class="form-group">
								<label>Password</label>
								<input class="form-control" name="password_ut" required value="<?php echo $row["password_ut"]; ?>" type="password">
							</div>
						</div>
						<div class="col-sm-6">
							<div class="form-group">
								<label>Confirmer le Password</label>
								<input class="form-control" name="confirmPassword" required value="<?php echo $row["password_ut"]; ?>" type="password">
							</div>
						</div>
						<div class="col-sm-6">
							<div class="form-group">
								<label>Role </label>
								<input class="form-control" name="role_ut"  required value="<?php echo $row["role_ut"]; ?>" type="text">
							</div>
						</div>
						<div class="col-sm-6">
							<div class="form-group">
								<label>Image </label>
								<input class="form-control" id="image" name="image" type="file">
								<input type="hidden" name="h_image" value="<?php echo $row["image_ut"]; ?>">
							</div>
						</div>
					
					
					<div class="submit-section">
						<button name="modifier_ut" type="submit" class="btn btn-primary submit-btn">Sauvegarder</button>
					</div>
				</form>
			</div>
		</div>
		
	</div>
</div>