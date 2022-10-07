<div id="add_department" class="modal custom-modal fade" role="dialog">
					<div class="modal-dialog modal-dialog-centered" role="document">
						<div class="modal-content">
							<div class="modal-header">
								<h5 class="modal-title">Ajouter un departement</h5>
								<button type="button" class="close" data-dismiss="modal" aria-label="Close">
									<span aria-hidden="true">&times;</span>
								</button>
							</div>
							<div class="modal-body">
								<form method="POST">
									<div class="form-group">
										<label>Code du departement <span class="text-danger">*</span></label>
										<input name="code_departement" required class="form-control" type="text">
									</div>
									<div class="form-group">
										<label>Nom du departement <span class="text-danger">*</span></label>
										<input name="nom_departement" required class="form-control" type="text">
									</div>
									<div class="form-group">
										<label>Chef du departement <span class="text-danger">*</span></label>
										<select required name="id_chef_departement" class="select">
											<option>Selectionner le chef du departement </option>
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
										<button name="ajouter_departement" type="POST" class="btn btn-primary submit-btn">Valider</button>
									</div>
								</form>
							</div>
						</div>
					</div>
				</div>