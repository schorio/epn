<?php
//fetchdata.php
if(isset($_POST["action"]))
{
    $con = mysqli_connect("localhost", "root", "", "epn_bdd");
    $output = '';

    if($_POST["action"] == "id_departement" || $_POST["action"] == "n_id_departement" )
    {
        $query = "SELECT * FROM etablissement WHERE id_departement = '".$_POST["query"]."' GROUP BY id_etablissement";
        $result = mysqli_query($con, $query);
        $output .= '<option value="">Selectionner etablissement</option>';

        while($row = mysqli_fetch_array($result))
        {
            $output .= '<option value="'.$row["id_etablissement"].'">'.$row["code_etablissement"].'</option>';
        }
    }
    elseif($_POST["action"] == "et_id_departement" || $_POST["action"] == "n_et_id_departement")
    {
        $query = "SELECT * FROM employee WHERE id_departement = '".$_POST["query"]."' GROUP BY id_employee";
        $result = mysqli_query($con, $query);
        $output .= '<option value="">Selectionner le chef de l etablissement </option>';

        while($row = mysqli_fetch_array($result))
        {
            $output .= '<option value="'.$row["id_employee"].'">'.$row["matricule"].' - '.$row["prenom"].'</option>';
        }
    }
    
    echo $output;
}

?>
