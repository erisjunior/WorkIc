<?php
	require("../conexao.php");
	if (isset($_GET['exclui'])) {
		$query = mysqli_query($con, "DELETE FROM avisos WHERE id='".$_GET['exclui']."'");
	}
	header("location:/index.php?p=perfil")
?>