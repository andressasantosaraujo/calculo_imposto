<?php
	require_once('calcular.php');
	$salario_bruto = $_POST['salario_bruto'];
?>

<!DOCTYPE html>
<html>
	<head>
		<title> Calcular Salário e Impostos</title>
		<meta charset="UTF-8">
	</head>
	<body>
		<?php

			$inss = 0;
			$salario_liquido = 0;
			$salario_inss = 0;

			if($salario_bruto <= 1556.94)
			{
				$inss = $salario_bruto * 0.08;
			}else if($salario_bruto <= 2594.92)
			{
				$inss = $salario_bruto * 0.09;
			}else if($salario_bruto > 2594.93)
			{
				if($salario_bruto <= 5189.82)
				{
					$inss = $salario_bruto * 0.11;
				}else
				{
					$inss = 5189.82 * 0.11;
				}
			}

			$salario_inss = $salario_bruto - $inss;

			$ir = 0;

			if($salario_inss <= 1903.98)
			{
				$ir = 0;
			}else if($salario_inss <= 2826.65)
			{
				$ir = ($salario_inss * 0.075)-142.80;
			}else if($salario_inss <= 3751.05)
			{
				$ir = ($salario_inss * 0.15)-354.80;
			}else if($salario_inss <= 4664.68)
			{
				$ir = ($salario_inss * 0.225)-636.13;
			}else if($salario_inss > 4664.68)
			{
				$ir = ($salario_inss * 0.275)-869.36;
			}
			$salario_liquido = ($salario_bruto - $inss) - $ir;
		?>
		<form action="calcular.php" method="post">
			<ul>
				<li><?php echo 'Salário bruto:' .$salario_bruto; ?></li>
				<li><?php echo 'INSS:' .$inss; ?></li>
				<li><?php echo 'IR:' .$ir; ?></li>
				<li><?php echo 'Salário liquido:' .$salario_liquido; ?></li>
			</ul>

			<footer>
				Calculo de impostos e salário liquido
			</footer>
	</body>
</html>