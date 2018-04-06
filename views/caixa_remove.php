<?php
	require("../conexao.php");
	if (isset($_GET['exclui'])) {
		$query = mysqli_query($con, "DELETE FROM caixa WHERE id='".$_GET['exclui']."'");
	}
	header("location:/index.php?p=caixa")
?>