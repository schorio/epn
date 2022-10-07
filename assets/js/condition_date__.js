$(document).ready(function()
			{
				$('#i_code_statut, #i_d_contrat, #i_code_grade, #i_code_categorie').change(function()
				{
				
				var d_contrat = document.getElementById("i_d_contrat").value;
				var code_statut = document.getElementById("i_code_statut").value;
				var code_grade = document.getElementById("i_code_grade").value;
				var code_categorie = document.getElementById("i_code_categorie").value;

				// Transformation de la date d_contrrat en date long
				let dd_contrat = new Date(d_contrat + " 00:00:00");


				function ELD(dd_contrat) {
					let jour = `${dd_contrat.getDate() < 10 ? "0" : ""}${dd_contrat.getDate()}`;
					let mois = `${(dd_contrat.getMonth() + 1) < 10 ? "0" : ""}${dd_contrat.getMonth() + 1}`;
					let annee = (dd_contrat.getFullYear() + 2);

					var v_ELD = annee + "-" + mois + "-" + jour;
					return v_ELD;
				}


				function FONCT(dd_contrat, code_grade) {
					if(code_grade == "2C1E"||code_grade == "2C2E"||code_grade == "1C1E"||code_grade == "1C2E"||code_grade == "P1E"||code_grade == "P2E"||code_grade == "EX1E") {
						let jour = `${dd_contrat.getDate() < 10 ? "0" : ""}${dd_contrat.getDate()}`;
						let mois = `${(dd_contrat.getMonth() + 1) < 10 ? "0" : ""}${dd_contrat.getMonth() + 1}`;
						let annee = (dd_contrat.getFullYear() + 2);

						var v_FONCT = annee + "-" + mois + "-" + jour;
						return v_FONCT;
					}
					else{
						let jour = `${dd_contrat.getDate() < 10 ? "0" : ""}${dd_contrat.getDate()}`;
						let mois = `${(dd_contrat.getMonth() + 1) < 10 ? "0" : ""}${dd_contrat.getMonth() + 1}`;
						let annee = (dd_contrat.getFullYear() + 3);

						var v_FONCT = annee + "-" + mois + "-" + jour;
						return v_FONCT;
					}
				}


				function EFA(dd_contrat, code_grade, code_categorie){
					if(code_categorie == "CAT I"||code_categorie == "CAT II"||code_categorie == "CAT III"){
						var v_EFA = ELD(dd_contrat);
						return v_EFA;
					}
					else{
						var v_EFA = FONCT(dd_contrat, code_grade);
						return v_EFA;
					}
				}


				function d_avancement(dd_contrat, code_grade, code_categorie, code_statut){
					if(code_statut == "FONCT"){
						var v_d_avancement = FONCT(dd_contrat, code_grade);
						return v_d_avancement;
					}
					else if (code_statut == "EFA"){
						var v_d_avancement = EFA(dd_contrat, code_grade, code_categorie);
						return v_d_avancement;
					}
					else if (code_statut == "ELD"){
						var v_d_avancement = ELD(dd_contrat);
						return v_d_avancement;
					}
					else{
						var v_d_avancement = "000-00-00"
						return v_d_avancement;
					}
				}

				var v_avancement = d_avancement(dd_contrat, code_grade, code_categorie, code_statut);
				// document.sampleForm.avancement.value = v_avancement;
				document.sampleForm_1.n_avancement.value = v_avancement;
				});


				$('#i_date_naissance').change(function()
				{
				// let ii_d_retraite = document.getElementById("i_d_retraite");
				var date_naissance = document.getElementById("i_date_naissance").value;
				let ddate_naissance = new Date(date_naissance + " 00:00:00");

				let time_ddate_naissance = ddate_naissance.getTime();

				// 1 jour = 86 400 000ms
				const new_time_ddate_naissance = Math.ceil(time_ddate_naissance - 86400000);

				let new_ddate_naissance = new Date(new_time_ddate_naissance);

				let jour = `${new_ddate_naissance.getDate() < 10 ? "0" : ""}${new_ddate_naissance.getDate()}`;
				let mois = `${(new_ddate_naissance.getMonth() + 1) < 10 ? "0" : ""}${new_ddate_naissance.getMonth() + 1}`;
				let annee = (new_ddate_naissance.getFullYear() + 60);


				// ii_d_retraite.textContent = `${jour}-${mois}-${annee}`;
				var ii_d_retraite = annee + "-" + mois + "-" + jour;

				// document.sampleForm.d_retraite.value = ii_d_retraite;
				document.sampleForm_1.n_d_retraite.value = ii_d_retraite;
				// document.getElementById("i_d_retraite").innerHTML=new_ddate_naissance;
				});


				$('#i_code_statut, #i_d_contrat').change(function()
				{

				var i_d_contrat = document.getElementById("i_d_contrat").value;
				var i_code_statut = document.getElementById("i_code_statut").value;

				if (i_code_statut == "EFA"||i_code_statut == "ELD") {

					let ii_d_contrat = new Date(i_d_contrat + " 00:00:00");

					let time_ii_d_contrat = ii_d_contrat.getTime();

					// 1 jour = 86 400 000ms
					const new_time_ii_d_contrat = Math.ceil(time_ii_d_contrat - 86400000);

					let new_ii_d_contrat = new Date(new_time_ii_d_contrat);

					let jour = `${new_ii_d_contrat.getDate() < 10 ? "0" : ""}${new_ii_d_contrat.getDate()}`;
					let mois = `${(new_ii_d_contrat.getMonth() + 1) < 10 ? "0" : ""}${new_ii_d_contrat.getMonth() + 1}`;
					let annee = (new_ii_d_contrat.getFullYear() + 2);

					var ff_contrat = annee + "-" + mois + "-" + jour;

					// document.sampleForm.f_contrat.value = ff_contrat;
					document.sampleForm_1.n_f_contrat.value = ff_contrat;
				}
				
				else{

					var ff_contrat = "000-00-00";

					// document.sampleForm.f_contrat.value = ff_contrat;
					document.sampleForm_1.n_f_contrat.value = ff_contrat;
				}

				});

			});