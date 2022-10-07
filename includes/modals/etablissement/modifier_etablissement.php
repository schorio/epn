<div id="edit_etablissement<?php echo $id_etablissement; ?>" class="modal custom-modal fade" role="dialog">
	<form method="post" class="form-horizontal" role="form">
		<div class="modal-dialog modal-dialog-centered">
			<!-- Modal content-->
			<div class="modal-content">
				<div class="modal-header">
					<h5 class="modal-title">Modifier du etablissement</h5>
					<button type="button" class="close" data-dismiss="modal" aria-label="Close">
						<span aria-hidden="true">&times;</span>
					</button>
				</div>
				<div class="modal-body">
					<input type="hidden" name="edit_id" value="<?php echo $id_etablissement; ?>">

					<div class="form-group">
						<label for="n_code_etablissement">Code du etablissement : </label>
						<input type="text" class="form-control" id="n_code_etablissement" name="n_code_etablissement" value="<?php echo $code_etablissement; ?>" required>
					</div>

					<div class="form-group">
						<label for="n_nom_etablissement">Nom du etablissement : </label>
						<input type="text" class="form-control" id="n_nom_etablissement" name="n_nom_etablissement" value="<?php echo $nom_etablissement; ?>" required autofocus>
					</div>

					<div class="row">
						<div class="col-md-6">
							<div class="form-group">
								<label>Domaine <span class="text-danger">*</span></label>
								<input name="n_type_etablissement" value="<?php echo $type_etablissement; ?>" required class="form-control" type="text">
							</div>
						</div>

						<div class="col-md-6">
							<div class="form-group">
								<label>Departement : <span class="text-danger">*</span></label>
								<?php if ($_SESSION["role"] !== $config["ROLES"][0]) :?>
									<input name="n_et_id_departement" readonly value="<?php echo $_SESSION['departement']; ?>" class="form-control" type="text">
								<?php else: ?>
									<select id="n_et_id_departement" required name="n_et_id_departement" class="select action">
										<option value="<?php echo $id_departement; ?>"><?php echo $code_departement; ?></option>
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
											<?php } 
										?> 
									</select>
								<?php endif ?>
							</div>
						</div>
					</div>
					<div class="form-group">
						<label>Chef de l'etablissement <span class="text-danger">*</span></label>
						<select required id="n_id_chef_etablissement" name="n_id_chef_etablissement" class="select action">
							<option value="<?php echo $id_chef_etablissement; ?>"><?php echo $nom_chef_etablissement.' '.$prenom_chef_etablissement; ?></option>
						</select>
					</div>
					<div class="submit-section">
						<button type="submit" class="btn btn-primary submit-btn" id="modifier_etablissement" name="modifier_etablissement">Valider</button>
					</div>
				</div>
				
			</div>
		</div>
	</form>
</div>		

<script>
	$(document).ready(function(){
	$('.action').change(function(){
		if($(this).val() != '')
		{
			var action = $(this).attr("id");
			var query = $(this).val();
			var result = '';

			if(action == "n_et_id_departement")
			{
				result = 'n_id_chef_etablissement';
			}

			$.ajax({
			url:"/epn/includes/fetchdata.php",
			method:"POST",
			data:{action:action, query:query},
				success:function(data)
				{
				$('#'+result).html(data);
				}
			})
		
		}
	});
	});
</script>