<?php

require '../../../includes/app.php';



if (isset($_POST["tipo"])) {
    if ($_POST["tipo"] == "destinos") {
        $sql = "
                SELECT * FROM destino
                ORDER BY id ASC
                ";
        $destinos = mysqli_query($conn, $sql);
       
        while ($row = mysqli_fetch_array($destinos)) {
            $saida[] = array(
                'id' => $row["id"],
                'nome' => $row["nome"]
            );
        }
        
        echo json_encode($saida);
                
    } else {
        $cat_id = $_POST["cat_id"];
        $sql = "
                SELECT * FROM data_viagem 
                WHERE cod_destino = '" . $cat_id . "' 
                ORDER BY nome ASC
                ";
        $data_saida = mysqli_query($conn, $sql);

        while ($row = mysqli_fetch_array($data_saida)) {
            $saida[] = array(
                'nome' => $row["nome"],
                'id' => $row["id"]
                
            );
        }
        echo json_encode($saida);
    }
}
?>
