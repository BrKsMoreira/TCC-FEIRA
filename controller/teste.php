<?php 
include("../model/connect.php");

if (!isset($_SESSION)) {
    session_start();
}

// Executa a consulta
$resultado = mysqli_query($connect, "SELECT cod_empresa FROM empresa ORDER BY cod_empresa desc LIMIT 0,1 ;");

// Verifica se a consulta retornou resultados
if (mysqli_num_rows($resultado) > 0) {
    // Exibe os dados de cada linha
    while ($row = mysqli_fetch_assoc($resultado)) {
        $eas = $row['cod_empresa'];
        $_SESSION["idEmpresa1"] = $eas;
    }
} else {
    echo "Nenhum usuário encontrado.";
}

echo $_SESSION["idEmpresa1"];
mysqli_free_result($resultado);

// Fecha a conexão
$connect->close();
?>


