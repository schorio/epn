<div id="add_etablissement" class="modal custom-modal fade" role="dialog">
					<div class="modal-dialog modal-dialog-centered" role="document">
						<div class="modal-content">
							<div class="modal-header">
								<h5 class="modal-title">Ajouter un etablissement</h5>
								<button type="button" class="close" data-dismiss="modal" aria-label="Close">
									<span aria-hidden="true">&times;</span>
								</button>
							</div>
							<div class="modal-body">
								<form method="POST">
									<div class="form-group">
										<label>Code du etablissement <span class="text-danger">*</span></label>
										<input name="code_etablissement" required class="form-control" type="text">
									</div>

									<div class="form-group">
										<label>Nom du etablissement <span class="text-danger">*</span></label>
										<input name="nom_etablissement" required class="form-control" type="text">
									</div>

									<div class="row">
										<div class="col-md-6">
											<div class="form-group">
												<label>Domaine <span class="text-danger">*</span></label>
												<input name="type_etablissement" required class="form-control" type="text">
											</div>
										</div>

										<div class="col-md-6">
											<div class="form-group">
												<label>Departement <span class="text-danger">*</span></label>
												<?php if ($_SESSION["role"] !== $config["ROLES"][0]) :?>
													<input name="et_id_departement" readonly value="<?php echo $_SESSION['departement']; ?>" class="form-control" type="text">
												<?php else: ?>
													<select id="et_id_departement" required name="et_id_departement" class="select action">
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
														<?php
															} 
														?> 
													</select>
												<?php endif ?>
											</div>
										</div>
									</div>
									<div class="form-group">
										<label>Chef de l'etablissement <span class="text-danger">*</span></label>
										<select required id="id_chef_etablissement" name="id_chef_etablissement" class="select action">
											<option>Selectionner le chef de l'etablissement </option>
										</select>
									</div>
									<div class="submit-section">
										<button name="ajouter_etablissement" type="submit" class="btn btn-primary submit-btn">Valider</button>
									</div>
								</form>
							</div>
						</div>
					</div>
				</div>