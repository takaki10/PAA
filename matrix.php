<html>
<head>
	<title>Trabalho Algoritmos Gulosos e Programação Dinâmica</title>
	<meta charset="utf-8" />
	<link rel="stylesheet" type="text/css" href="assets/bootstrap/css/bootstrap.min.css">
	<link rel="stylesheet" type="text/css" href="assets/css/style.css">
</head>
<body>
<header>
	<div class="container">
		<div class="row">
			<div class="col-lg-12">
				<nav class="navbar navbar-default">
					<div class="container-fluid">
						<!-- mobile -->
						<div class="navbar-header">
							<button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#bs-example-navbar-collapse-1" aria-expanded="false">
								<span class="sr-only">Toggle navigation</span>
								<span class="icon-bar"></span>
								<span class="icon-bar"></span>
								<span class="icon-bar"></span>
							</button>
							<a class="navbar-brand" href="index.php">PAA</a>
						</div>

						<div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
							<ul class="nav navbar-nav">
								<li><a href="index.php">Página Inicial <span class="sr-only">(current)</span></a></li>
								<li class="dropdown">
									<a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false">Algoritmos <span class="caret"></span></a>
									<ul class="dropdown-menu">
										<li><a href="assignment.php">Assignment Problem</a></li>
										<li><a href="huffman.php">Huffman</a></li>
										<li><a href="knapsack.php">Fractional Knapsack Problem</a></li>
										<li><a href="knapsack01.php">Knapsack Problem - Mochila 0-1</a></li>
										<li><a href="subsequence.php">Longest Common Subsequence</a></li>
										<li><a href="matrix.php">Matrix Chain Multiplication</a></li>
									</ul>
								</li>
							</ul>
						</div><!-- /.navbar-collapse -->
					</div><!-- /.container-fluid -->
				</nav>
			</div>
			<div class="col-lg-12 info">
				<h1>Projeto e Análise de Algoritmos</h1>
				<h3>Prof. Danilo Eler</h3>
				<h4>Fábio da Silva Takaki</h4>
				<h4>Thaís Rolón</h4>
				<h4>Laércio</h4>
			</div>
			<div class="col-lg-12 text-right info">
				<h4>Background: Flickr - Max Rive</h4>
			</div>
		</div>
	</div>
</header>

<div class="container">
	<div class="row">
		<div class="col-lg-12">
			<h1>Matrix Chain Multiplication - Multiplicação de Matrizes</h1>
		</div>
		<div class="col-lg-6">
			<h2>Formulário de Matrizes</h2>
			<form>
				<div class="form-group">
					<label for="Matriz">Matriz</label>
					<input type="text" class="form-control" id="name" placeholder="Nome da Matriz">
				</div>
				<div class="form-group">
					<label for="Linhas">Linhas</label>
					<input type="text" class="form-control" id="rows" placeholder="Linhas">
				</div>
				<div class="form-group">
					<label for="Colunas">Colunas</label>
					<input type="text" class="form-control" id="cols" placeholder="Colunas">
				</div>
				<button type="button" class="btn btn-default" id="add">Adicionar Matriz</button>
				<button type="button" class="btn btn-success" id="calculate">Calcular</button>
				<button type="button" class="btn btn-danger pull-right" id="reset">Resetar Tudo</button>
			</form>
		</div>
		<div class="col-lg-6">
			<h2>Tabela de Itens</h2>
			<table class="table table-hover">
				<thead>
					<th>#</th>
					<th>Matriz</th>
					<th>Linhas</th>
					<th>Colunas</th>
				</thead>
				<tbody id="items"></tbody>
			</table>
		</div>

		<div class="col-lg-12">
			<h2>Resultado</h2>
			<div id="result"></div>
		</div>
	</div>
</div>

<footer>
	<div class="container">
		<div class="row">
			<div class="col-lg-12 text-center">
				<p>&copy; Copyright 2016 - Projeto e Análise de Algoritmos.</p>
			</div>
		</div>
	</div>
</footer>

<script type="text/javascript" src="assets/js/jquery-1.12.0.min.js"></script>
<script type="text/javascript" src="assets/bootstrap/js/bootstrap.min.js"></script>

<script type="text/javascript">
	var name, row, col, i=1, items = [], p = [], weightBag;

	$('#add').click(function(event) {
		name 	= $('#name').val();
		row 	= $('#rows').val();
		col 	= $('#cols').val();

		if(items.length == 0){
			$('#items').append(
						'<tr>\
							<td>'+i+'</td>\
							<td>'+name+'</td>\
							<td>'+row+'</td>\
							<td>'+col+'</td>\
						</tr>');

			items.push(name);
			p.push(row);
			p.push(col);
			i++;

			//$('#row').attr("placeholder", col);
			$('#rows').val(col);
			$('#rows').attr('disabled', 'disabled');
		}else{
			$('#items').append(
						'<tr>\
							<td>'+i+'</td>\
							<td>'+name+'</td>\
							<td>'+row+'</td>\
							<td>'+col+'</td>\
						</tr>');

			items.push(name);
			p.push(col);
			i++;

			$('#rows').val(col);
		}
	});

	$('#calculate').click(function(event) {

		$.post('matrix-ajax.php', {items: items, p:p}, function(data, textStatus, xhr) {
			$('#result').html(data);
		}, "html");
	});

	$('#reset').click(function(event) {
		location.reload();
	});

</script>
</body>
</html>