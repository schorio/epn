<?php

function getUt($id_ut){

    global $dbh;

    $req = $dbh->prepare("SELECT * from utilisateur WHERE id_ut = :id_ut");
    $req->bindParam(":id_ut", $id_ut);
    $req->execute();

    return $result = $req->fetch(PDO::FETCH_ASSOC);
}