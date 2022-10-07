<div id="edit_departement<?php echo $id_departement ?>" class="modal custom-modal fade" role="dialog">
	<form method="post" class="form-horizontal" role="form">
		<div class="modal-dialog modal-dialog-centered">
			<!-- Modal content-->
			<div class="modal-content">
				<div class="modal-header">
					<h5 class="modal-title">Modifier du departement</h5>
					<button type="button" class="close" data-dismiss="modal" aria-label="Close">
						<span aria-hidden="true">&times;</span>
					</button>
				</div>
				<div class="modal-body">
					<input type="hidden" name="edit_id" value="<?php echo $id_departement; ?>">
					<div class="form-group">
						<label for="n_code_departement">Code du departement : </label>
						<input type="text" class="form-control" id="n_code_departement" name="n_code_departement" value="<?php echo $code_departement; ?>" required>
					</div>
					<div class="form-group">
						<label for="n_nom_departement">Nom du departement : </label>
						<input type="text" class="form-control" id="n_nom_departement" name="n_nom_departement" value="<?php echo $nom_departement; ?>" required autofocus>
					</div>
					<div class="form-group">
						<label>Chef du departement <span class="text-danger">*</span></label>
						<select required name="n_id_chef_departement" class="select">
							<option value="<?php echo $id_chef_departement; ?>"><?php echo $nom_chef_departement.' '.$prenom_chef_departement; ?></option>
							<?php 
								$sql2 = "SELECT * from employee ORDER BY matricule ASC";
								$query2 = $dbh -> prepare($sql2);
								$query2->execute();
								$result2=$query2->fetchAll(PDO::FETCH_OBJ);
								foreach($result2 as $row)
								{          
							?>  
								<option value="<?php echo htmlentities($row->id_employee);?>">
							<?php echo htmlentities($row->matricule);?> - <?php echo htmlentities($row->prenom);?></option>
							<?php
								} 
							?> 
						</select>
					</div>
					<div class="submit-section">
						<button type="submit" class="btn btn-primary submit-btn" id="modifier_departement" name="modifier_departement">Valider</button>
					</div>
				</div>
				
			</div>
		</div>
	</form>
</div>			