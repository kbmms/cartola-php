<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Strict//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-strict.dtd">
<html xmlns="http://www.w3.org/1999/xhtml" xml:lang="pt-br" lang="pt-br">
<head>
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
	<meta name="viewport" content="initial-scale=0.9, maximum-scale=0.9">
	<title>Placar da Rodada Qualihouse Cartola</title>
	
	<link rel="stylesheet" href="css/bootstrap.min.css" />
	<style>
	body {
		background: rgb(233, 233, 233);
	}
	.box-time .col-md-3 {
		width: 
	}
		.box-time {
	    background: #fff;
	    background: url(img/2144.jpg);
	    background-size: cover;
	    padding: 5px;
	    margin: 3px;
	    border-radius: 3px;
	    border-bottom: 2px solid #ccc;
		}
		.nome h5, .jogadores h5 {
    font-size: 10px;
    text-transform: uppercase;
    font-weight: bolder;
		}
	.escudo img {
		margin-top: 50%;
	}
	</style>
</head>
<body>
<div class="container">

<div class="header">
	<div class="col-md-12 text-center">
		<h1>Liga Los Cuervos</h1>
	</div>
</div>
<?php
	$array = array("Leeds-United-A","Chapeu-de-palha-team"); 

for ($i = 0; $i < count($array); ++$i) {
	$url = 'https://api.cartolafc.globo.com/time/'.$array[$i];
	$site = file_get_contents($url);
	$json = json_decode($site);
	$jogadores[$i] = $json;
}

for ($j = 0; $j < count($jogadores); ++$j) {
		print '<div class="box-time col-md-3">';
	 print '<div class="col-md-12"><div class="col-md-3"><img src="'.$jogadores[$j]->{'time'}->{'url_escudo_png'}.'" class="imgTime img-responsive" /></div>';		
		// print '<h3>'.round($jogadores[$j]->{'pontos'},2).'</h3>';
	print  '<div class="nome col-md-7"><h5>' .$jogadores[$j]->{'time'}->{'nome'}.'</h5></div>';
	print  '<div class="col-md-1"><h5>' .round($jogadores[$j]->{'pontos'},2).'</h5></div>';

	print '</div><div class="col-md-12 jogadores">';
	$escalados = $jogadores[$j]->{'atletas'};

	// Ordenar por Posicão
	usort($escalados, function($a, $b) {
		return $a->posicao_id < $b->posicao_id? -1 : 1; //Compare the scores
	});
	for($k = 0; $k < count($jogadores[$j]->{'atletas'}); ++$k){
			print '<div class="row jog-all">';
			print '<div class="escudo col-md-2"><img class="img-responsive" src="'.retornaEscudo($escalados[$k]->{'clube_id'}).'" /></div>';
			print '<div class="pos col-md-2"><h5>'.retornaPosicao($escalados[$k]->{'posicao_id'}).'</h5></div>';
			print '<div class="col-md-8"><h5 class="lblApelido">'.$escalados[$k]->{'apelido'}.'</h5></div>';
			print '</div>';	
	}
	 	print '</div>';	
	 	print '</div>';	
	
	
}


function retornaPosicao($pos){
	$posicoes = array("", "GOL", "LAT", "ZAG", "MEI", "ATA", "TEC");
	return $posicoes[$pos];
}

function retornaEscudo($idclube){
		$clubes = '{"clubes":[{"262":{"id":262,"nome":"Flamengo","abreviacao":"FLA","posicao":6,"escudos":{"60x60":"https://s.glbimg.com/es/sde/f/equipes/2014/04/14/flamengo_60x60.png","45x45":"https://s.glbimg.com/es/sde/f/equipes/2013/12/16/flamengo_45x45.png","30x30":"https://s.glbimg.com/es/sde/f/equipes/2013/12/16/flamengo_30x30.png"}},"263":{"id":263,"nome":"Botafogo","abreviacao":"BOT","posicao":18,"escudos":{"60x60":"https://s.glbimg.com/es/sde/f/equipes/2014/04/14/botafogo_60x60.png","45x45":"https://s.glbimg.com/es/sde/f/equipes/2013/12/16/botafogo_45x45.png","30x30":"https://s.glbimg.com/es/sde/f/equipes/2013/12/16/botafogo_30x30.png"}},"264":{"id":264,"nome":"Corinthians","abreviacao":"COR","posicao":4,"escudos":{"60x60":"https://s.glbimg.com/es/sde/f/equipes/2014/04/14/corinthians_60x60.png","45x45":"https://s.glbimg.com/es/sde/f/equipes/2013/12/16/corinthians_45x45.png","30x30":"https://s.glbimg.com/es/sde/f/equipes/2013/12/16/corinthians_30x30.png"}},"266":{"id":266,"nome":"Fluminense","abreviacao":"FLU","posicao":11,"escudos":{"60x60":"https://s.glbimg.com/es/sde/f/equipes/2015/07/21/fluminense_60x60.png","45x45":"https://s.glbimg.com/es/sde/f/equipes/2015/07/21/fluminense_45x45.png","30x30":"https://s.glbimg.com/es/sde/f/equipes/2015/07/21/Fluminense-escudo.png"}},"275":{"id":275,"nome":"Palmeiras","abreviacao":"PAL","posicao":1,"escudos":{"60x60":"https://s.glbimg.com/es/sde/f/equipes/2014/04/14/palmeiras_60x60.png","45x45":"https://s.glbimg.com/es/sde/f/equipes/2013/12/16/palmeiras_45x45.png","30x30":"https://s.glbimg.com/es/sde/f/equipes/2013/12/16/palmeiras_30x30.png"}},"276":{"id":276,"nome":"São Paulo","abreviacao":"SAO","posicao":5,"escudos":{"60x60":"https://s.glbimg.com/es/sde/f/equipes/2014/04/14/sao_paulo_60x60.png","45x45":"https://s.glbimg.com/es/sde/f/equipes/2013/12/16/sao_paulo_45x45.png","30x30":"https://s.glbimg.com/es/sde/f/equipes/2013/12/16/sao_paulo_30x30.png"}},"277":{"id":277,"nome":"Santos","abreviacao":"SAN","posicao":8,"escudos":{"60x60":"https://s.glbimg.com/es/sde/f/equipes/2014/04/14/santos_60x60.png","45x45":"https://s.glbimg.com/es/sde/f/equipes/2013/12/16/santos_45x45.png","30x30":"https://s.glbimg.com/es/sde/f/equipes/2013/12/16/santos_30x30.png"}},"282":{"id":282,"nome":"Atlético-MG","abreviacao":"ATL","posicao":14,"escudos":{"60x60":"https://s.glbimg.com/es/sde/f/equipes/2014/04/14/atletico_mg_60x60.png","45x45":"https://s.glbimg.com/es/sde/f/equipes/2013/12/16/atletico_mg_45x45.png","30x30":"https://s.glbimg.com/es/sde/f/equipes/2013/12/16/atletico_mg_30x30.png"}},"283":{"id":283,"nome":"Cruzeiro","abreviacao":"CRU","posicao":20,"escudos":{"60x60":"https://s.glbimg.com/es/sde/f/equipes/2015/04/29/cruzeiro_65.png","45x45":"https://s.glbimg.com/es/sde/f/equipes/2015/04/29/cruzeiro_45.png","30x30":"https://s.glbimg.com/es/sde/f/equipes/2015/04/29/cruzeiro_30.png"}},"284":{"id":284,"nome":"Grêmio","abreviacao":"GRE","posicao":3,"escudos":{"60x60":"https://s.glbimg.com/es/sde/f/equipes/2014/04/14/gremio_60x60.png","45x45":"https://s.glbimg.com/es/sde/f/equipes/2013/12/16/gremio_45x45.png","30x30":"https://s.glbimg.com/es/sde/f/equipes/2013/12/16/gremio_30x30.png"}},"285":{"id":285,"nome":"Internacional","abreviacao":"INT","posicao":2,"escudos":{"60x60":"https://s.glbimg.com/es/sde/f/equipes/2016/05/03/inter65.png","45x45":"https://s.glbimg.com/es/sde/f/equipes/2016/05/03/inter45.png","30x30":"https://s.glbimg.com/es/sde/f/equipes/2016/05/03/inter30.png"}},"287":{"id":287,"nome":"Vitória","abreviacao":"VIT","posicao":15,"escudos":{"60x60":"https://s.glbimg.com/es/sde/f/equipes/2014/04/14/vitoria_60x60.png","45x45":"https://s.glbimg.com/es/sde/f/equipes/2013/12/16/vitoria_45x45.png","30x30":"https://s.glbimg.com/es/sde/f/equipes/2013/12/16/vitoria_30x30.png"}},"292":{"id":292,"nome":"Sport","abreviacao":"SPO","posicao":17,"escudos":{"60x60":"https://s.glbimg.com/es/sde/f/equipes/2015/07/21/sport65.png","45x45":"https://s.glbimg.com/es/sde/f/equipes/2015/07/21/sport45.png","30x30":"https://s.glbimg.com/es/sde/f/equipes/2015/07/21/sport30.png"}},"293":{"id":293,"nome":"Atlético-PR","abreviacao":"ATL","posicao":9,"escudos":{"60x60":"https://s.glbimg.com/es/sde/f/equipes/2015/06/24/atletico-pr_2015_65.png","45x45":"https://s.glbimg.com/es/sde/f/equipes/2015/06/24/atletico-pr_2015_45.png","30x30":"https://s.glbimg.com/es/sde/f/equipes/2015/06/24/atletico-pr_2015_30.png"}},"294":{"id":294,"nome":"Coritiba","abreviacao":"COR","posicao":16,"escudos":{"60x60":"https://s.glbimg.com/es/sde/f/equipes/2014/04/14/coritiba_60x60.png","45x45":"https://s.glbimg.com/es/sde/f/equipes/2013/12/16/coritiba_45x45.png","30x30":"https://s.glbimg.com/es/sde/f/equipes/2013/12/16/coritiba_30x30.png"}},"303":{"id":303,"nome":"Ponte Preta","abreviacao":"PON","posicao":10,"escudos":{"60x60":"https://s.glbimg.com/es/sde/f/equipes/2014/04/14/ponte_preta_60x60.png","45x45":"https://s.glbimg.com/es/sde/f/equipes/2013/12/16/ponte_preta_45x45.png","30x30":"https://s.glbimg.com/es/sde/f/equipes/2013/12/16/ponte_preta_30x30.png"}},"315":{"id":315,"nome":"Chapecoense","abreviacao":"CHA","posicao":7,"escudos":{"60x60":"https://s.glbimg.com/es/sde/f/equipes/2015/08/03/Escudo-Chape-165.png","45x45":"https://s.glbimg.com/es/sde/f/equipes/2015/08/03/Escudo-Chape-145.png","30x30":"https://s.glbimg.com/es/sde/f/equipes/2015/08/03/Escudo-Chape-130.png"}},"316":{"id":316,"nome":"Figueirense","abreviacao":"FIG","posicao":12,"escudos":{"60x60":"https://s.glbimg.com/es/sde/f/equipes/2014/04/14/figueirense_60x60.png","45x45":"https://s.glbimg.com/es/sde/f/equipes/2013/12/16/figueirense_45x45.png","30x30":"https://s.glbimg.com/es/sde/f/equipes/2013/12/16/figueirense_30x30.png"}},"327":{"id":327,"nome":"América-MG","abreviacao":"AME","posicao":19,"escudos":{"60x60":"https://s.glbimg.com/es/sde/f/equipes/2016/06/08/America-MG_65_YAXGu0v.png","45x45":"https://s.glbimg.com/es/sde/f/equipes/2016/06/08/America-MG_45_10JJfa5.png","30x30":"https://s.glbimg.com/es/sde/f/equipes/2016/06/08/America-MG_30_Dp4rFYO.png"}},"344":{"id":344,"nome":"Santa Cruz","abreviacao":"STC","posicao":13,"escudos":{"60x60":"https://s.glbimg.com/es/sde/f/organizacoes/2014/04/14/santa_cruz_60x60.png","45x45":"https://s.glbimg.com/es/sde/f/organizacoes/2014/04/14/santa_cruz_45x45.png","30x30":"https://s.glbimg.com/es/sde/f/organizacoes/2014/04/14/santa_cruz_30x30.png"}}}]}';
			$json =	json_decode($clubes);
			$times = $json->{'clubes'};
			return $times[0]->{"$idclube"}->{'escudos'}->{'60x60'};
	}
?>


</div>

<script src="js/bootstrap.min.js"></script>
</body>
</html>