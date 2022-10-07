<?php $set = '1234567890';
$id = substr(str_shuffle($set), 0, 6); 
?>

<div id="add_employee" class="modal custom-modal fade" role="dialog">
	<div class="modal-dialog modal-dialog-centered modal-lg">
		<div class="modal-content">
			<div class="modal-header">
				<h5 class="modal-title">Ajouter un(e) employé(e)</h5>
				<button type="button" class="close" data-dismiss="modal" aria-label="Close">
					<span aria-hidden="true">&times;</span>
				</button>
			</div>

			<div class="modal-body">
				<form id="sampleForm" name="sampleForm" method="POST" enctype="multipart/form-data">
					<div class="row">

						<div class="col-sm-6">
							<div class="form-group">
								<label class="col-form-label">Matricule : <span class="text-danger">*</span></label>
								<input name="matricule" required class="form-control" type="number">
							</div>
						</div>

						<div class="col-sm-6">
							<div class="form-group">
								<label class="col-form-label">Nom : <span class="text-danger">*</span></label>
								<input name="nom" required class="form-control" type="text">
							</div>
						</div>

						<div class="col-sm-6">
							<div class="form-group">
								<label class="col-form-label">Prénoms : </label>
								<input name="prenom" required class="form-control" type="text">
							</div>
						</div>

						<div class="col-sm-6">
							<div class="form-group">
								<label class="col-form-label">Date de naissance : <span class="text-danger">*</span></label>
								<input id="i_date_naissance" name="date_naissance" required class="form-control" type="date">
							</div>
						</div>

						<div class="col-sm-6">
							<div class="form-group">
								<label class="col-form-label">Genre : <span class="text-danger">*</span></label>
								<select id="i_genre" name="genre" required class="select">
									<option value="Homme">Homme</option>
									<option value="Femme">Femme</option>
								</select>
							</div>
						</div>

						<div class="col-sm-6">
							<div class="form-group">
								<label class="col-form-label">Téléphone : <span class="text-danger">*</span></label>
								<input id="i_telephone" name="telephone" maxlength="10" required class="form-control" type="tel">
							</div>
						</div>

						<div class="col-sm-6">
							<div class="form-group">
								<label class="col-form-label">Adresse : <span class="text-danger">*</span></label>
								<input id="i_adresse" name="adresse" required class="form-control" type="text">
							</div>
						</div>

						<div class="col-sm-6">
							<div class="form-group">
								<label class="col-form-label">Adresse Email : <span class="text-danger">*</span></label>
								<input id="i_email" name="email" required class="form-control" type="email">
							</div>
						</div>
						
						<div class="col-md-6">
							<div class="form-group">
								<label>Departement : <span class="text-danger">*</span></label>
								<?php if ($_SESSION["role"] !== $config["ROLES"][0]) :?>
									<input name="id_departement" readonly value="<?php echo $_SESSION['departement']; ?>" class="form-control" type="text">
								<?php else: ?>
								<select required id="id_departement" name="id_departement" class="select action">
									<option>Selectionner le departement </option>
									<?php 
							$sql2 = "SELECT * from departement";
							$query2 = $dbh -> prepare($sql2);
							$query2->execute();
							$result2=$query2->fetchAll(PDO::FETCH_OBJ);
							foreach($result2 as $row)
							{          
								?>  
							<option value="<?php echo htmlentities($row->id_departement);?>">
							<?php echo htmlentities($row->code_departement);?></option>
							<?php } ?> 
								</select>
								<?php endif ?>
							</div>
						</div>

						<div class="col-md-6">
							<div class="form-group">
								<label>Etablissement : <span class="text-danger">*</span></label>
								<select required id="id_etablissement" name="id_etablissement" class="select action">
									<option value="">Selectionner l'etablissement </option>
								</select>
							</div>
						</div>

						<div class="col-md-6">
							<div class="form-group">
								<label>Statut : <span class="text-danger">*</span></label>
								<select required id="i_code_statut" name="id_statut" class="select">
									<option>Selectionner le statut </option>
									<?php 
										$sql2 = "SELECT * from statut";
										$query2 = $dbh -> prepare($sql2);
										$query2->execute();
										$result2=$query2->fetchAll(PDO::FETCH_OBJ);
										foreach($result2 as $row)
										{          
									?>  
										<option value="<?php echo htmlentities($row->code_statut);?>">
											<?php echo htmlentities($row->code_statut);?>
										</option>
									<?php
										} 
									?> 
								</select>
							</div>
						</div>

						<div class="col-md-6">
							<div class="form-group">
								<label>Categorie : <span class="text-danger">*</span></label>
								<select required id="i_code_categorie" name="id_categorie" class="select">
									<option>Selectionner le categorie</option>
									<?php 
							$sql2 = "SELECT * from categorie";
							$query2 = $dbh -> prepare($sql2);
							$query2->execute();
							$result2=$query2->fetchAll(PDO::FETCH_OBJ);
							foreach($result2 as $row)
							{          
								?>  
							<option value="<?php echo htmlentities($row->code_categorie);?>">
								<?php echo htmlentities($row->code_categorie);?>
							</option>
							<?php } ?> 
								</select>
							</div>
						</div>

						<div class="col-md-6">
							<div class="form-group">
								<label>Grade : <span class="text-danger">*</span></label>
								<select required id="i_code_grade" name="id_grade" class="select">
									<option>Selectionner le grade </option>
									<?php 
							$sql2 = "SELECT * from grade";
							$query2 = $dbh -> prepare($sql2);
							$query2->execute();
							$result2=$query2->fetchAll(PDO::FETCH_OBJ);
							foreach($result2 as $row)
							{          
									?>  
								<option value="<?php echo htmlentities($row->code_grade);?>">
									<?php echo htmlentities($row->code_grade);?>
								</option>
								<?php 
							} 
							?> 
								</select>
							</div>
						</div>
						
						<div class="col-sm-6">
							<div class="form-group">
								<label class="col-form-label">Date de debut du contrat : <span class="text-danger">*</span></label>
								<input id="i_d_contrat" name="d_contrat" required class="form-control" type="date">
							</div>
						</div>
						
						<div class="col-sm-6">
							<div class="form-group">
								<label class="col-form-label">Date d'avancement : <span class="text-danger">*</span></label>
								<input readonly id="i_avancement" name="avancement" class="form-control" value="" type="date">
							</div>
						</div>

						<div class="col-sm-6">
							<div class="form-group">
								<label class="col-form-label">Date de fin de contrat : <span class="text-danger">*</span></label>
								<input readonly id="i_f_contrat" name="f_contrat" class="form-control" value="" type="date">
							</div>
						</div>

						<div class="col-md-12">
							<div class="form-group">
								<label class="col-form-label">Date de retraite : <span class="text-danger">*</span></label>
								<input readonly id="i_d_retraite" name="d_retraite" class="form-control" value="" type="date">
							</div>
						</div>

						<div class="col-md-12">
							<div class="form-group">
								<label class="col-form-label">Photo d'identiter </label>
								<input class="form-control" required name="image" type="file">
							</div>
						</div>
					</div>
					
					<div class="submit-section">
						<button type="submit" name="emp_ajouter" class="btn btn-primary submit-btn">Ajouter</button>
					</div>
				</form>
			</div>
		</div>
	</div>
</div>

