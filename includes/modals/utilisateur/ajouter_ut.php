<?php $set = '1234567890';
$id = substr(str_shuffle($set), 0, 6); 
?>

<div id="ajouter_ut" class="modal custom-modal fade" role="dialog">
	<div class="modal-dialog modal-dialog-centered modal-lg" role="document">
		<div class="modal-content">
			<div class="modal-header">
				<h5 class="modal-title">Ajouter un nouveau utilisateur</h5>
				<button type="button" class="close" data-dismiss="modal" aria-label="Close">
					<span aria-hidden="true">&times;</span>
				</button>
			</div>
			<div class="modal-body">
				<form id="sampleForm" name="sampleForm" method="POST" enctype="multipart/form-data">
					<div class="row">
						<div class="col-sm-6">
							<div class="form-group">
								<label>Nom <span class="text-danger">*</span></label>
								<input class="form-control" required name="nom_ut" type="text">
							</div>
						</div>
						<div class="col-sm-6">
							<div class="form-group">
								<label>Prenom </label>
								<input class="form-control" required name="prenom_ut" type="text">
							</div>
						</div>
						<div class="col-sm-6">
							<div class="form-group">
								<label>Username <span class="text-danger">*</span></label>
								<input class="form-control" name="username_ut" required type="text">
							</div>
						</div>
						<div class="col-sm-6">
							<div class="form-group">
								<label>Email <span class="text-danger">*</span></label>
								<input class="form-control" required name="email_ut" type="email">
							</div>
						</div>
						<div class="col-sm-6">
							<div class="form-group">
								<label>Password</label>
								<input class="form-control" name="password_ut" required type="password">
							</div>
						</div>
						<div class="col-sm-6">
							<div class="form-group">
								<label>Confirmer le Password</label>
								<input class="form-control" name="confirmPassword" required type="password">
							</div>
						</div>
						<div class="col-sm-6">
							<div class="form-group">
								<label>Role </label>
								<input class="form-control" name="role_ut"  required type="text">
							</div>
						</div>
						<div class="col-md-6">
							<div class="form-group">
								<label>Departement <span class="text-danger">*</span></label>
								<?php if ($_SESSION["role"] !== $config["ROLES"][0]) :?>
									<input name="ut_code_departement" readonly value="<?php echo $_SESSION['departement']; ?>" class="form-control" type="text">
								<?php else: ?>
									<select id="ut_code_departement" required name="ut_code_departement" class="select">
										<option>Selectionner le departement </option>
										<?php 
											$sql2 = "SELECT * from departement";
											$query2 = $dbh -> prepare($sql2);
											$query2->execute();
											$result2=$query2->fetchAll(PDO::FETCH_OBJ);
											foreach($result2 as $row)
											{          
										?>  
											<option value="<?php echo htmlentities($row->code_departement);?>">
										<?php echo htmlentities($row->code_departement);?></option>
										<?php
											} 
										?> 
									</select>
								<?php endif ?>
							</div>
						</div>
						<div class="col-sm-12">
							<div class="form-group">
								<label>Image </label>
								<input class="form-control" required name="image" type="file">
							</div>
						</div>
					
					
					<div class="submit-section">
						<button type="submit" name="ut_ajouter" class="btn btn-primary submit-btn">Ajouter</button>
					</div>
				</form>
			</div>
		</div>
		
	</div>
</div>