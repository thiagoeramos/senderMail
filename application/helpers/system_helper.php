<?php

function printr($array =array())
{
	var_dump($array);
	print '<br /><br /><pre>';
		print_r($array);
	print '</pre>';
	die();
}

function mysql_br_time($time = '0000-00-00 00:00:00')
{
	if($time){
        $time = explode(' ', $time);
        return implode('/', array_reverse(explode('-', $time[0]))).' '.$time[1];
	}
	
    return false;
}

function mysql_br_date($time = '0000-00-00 00:00:00')
{
	if($time){
        $time = explode(' ', $time);
        return implode('/', array_reverse(explode('-', $time[0])));
	}
	
    return false;
}

function br_mysql_date($date = '00/00/0000')
{
	return implode('-', array_reverse(explode('/', $date)));
}

function return_hour_minute($time = '0000-00-00 00:00:00')
{
    if($time){
        $time = explode(' ', $time); 
		return date('H:i', strtotime($time[1]));
	}
	
	return FALSE;
}

function return_hour_minute2($time = '00:00')
{
    if($time){    
		return date('H:i', strtotime($time));
	}
}

/***
 * Função para remover acentos de uma string
 *
 * @autor Thiago Belem <contato@thiagobelem.net>
 */
function removeAcentos($string, $slug = false) {
	$string=remove_accent($string);
	$string = mb_strtolower($string);


	// Código ASCII das vogais
	$ascii['a'] = range(224, 230);
	$ascii['e'] = range(232, 235);
	$ascii['i'] = range(236, 239);
	$ascii['o'] = array_merge(range(242, 246), array(240, 248));
	$ascii['u'] = range(249, 252);

	// Código ASCII dos outros caracteres
	$ascii['b'] = array(223);
	$ascii['c'] = array(231);
	$ascii['d'] = array(208);
	$ascii['n'] = array(241);
	$ascii['y'] = array(253, 255);

	foreach ($ascii as $key=>$item) {
		$acentos = '';
		foreach ($item AS $codigo) $acentos .= chr($codigo);
		$troca[$key] = '/['.$acentos.']/i';
	}

	$string = preg_replace(array_values($troca), array_keys($troca), $string);

	// Slug?
	if ($slug) {
		// Troca tudo que não for letra ou número por um caractere ($slug)
		$string = preg_replace('/[^a-z0-9]/i', $slug, $string);
		// Tira os caracteres ($slug) repetidos
		$string = preg_replace('/' . $slug . '{2,}/i', $slug, $string);
		$string = trim($string, $slug);
	}

	return $string;
}


/**
* Função para pegar extensão do arquivo
* @access public static
* @param String $tUrl
* @return void
*/

function getExt($arquivo_nome = '')
{
	if(!isset($arquivo_nome)) {
		return false;
	} else {
		return pathinfo($arquivo_nome, PATHINFO_EXTENSION);
	}
}

function getSizeArchive($arquivo='')
{
    $tamanhoarquivo = filesize($arquivo);

    /* Medidas */
    $medidas = array('kb', 'mb', 'gb', 'tb');
    
	/* Se for menor que 1KB arredonda para 1KB */

    if($tamanhoarquivo < 999){
        $tamanhoarquivo = 1000;
    }

    for ($i = 0; $tamanhoarquivo > 999; $i++){
        $tamanhoarquivo /= 1024;
    }
	
    return round($tamanhoarquivo,2) ." ".$medidas[$i - 1];
}

function remove_accent($str)
{
  $a = array('À', 'Á', 'Â', 'Ã', 'Ä', 'Å', 'Æ', 'Ç', 'È', 'É', 'Ê', 'Ë', 'Ì', 'Í', 'Î', 'Ï', 'Ð', 'Ñ', 'Ò', 'Ó', 'Ô', 'Õ', 'Ö', 'Ø', 'Ù', 'Ú', 'Û', 'Ü', 'Ý', 'ß', 'à', 'á', 'â', 'ã', 'ä', 'å', 'æ', 'ç', 'è', 'é', 'ê', 'ë', 'ì', 'í', 'î', 'ï', 'ñ', 'ò', 'ó', 'ô', 'õ', 'ö', 'ø', 'ù', 'ú', 'û', 'ü', 'ý', 'ÿ', '?', '?', '?', '?', '?', '?', '?', '?', '?', '?', '?', '?', '?', '?', '?', '?', '?', '?', '?', '?', '?', '?', '?', '?', '?', '?', '?', '?', '?', '?', '?', '?', '?', '?', '?', '?', '?', '?', '?', '?', '?', '?', '?', '?', '?', '?', '?', '?', '?', '?', '?', '?', '?', '?', '?', '?', '?', '?', '?', '?', '?', '?', '?', '?', '?', '?', '?', '?', '?', '?', '?', '?', '?', '?', '?', '?', '?', '?', '?', 'Œ', 'œ', '?', '?', '?', '?', '?', '?', '?', '?', '?', '?', '?', '?', 'Š', 'š', '?', '?', '?', '?', '?', '?', '?', '?', '?', '?', '?', '?', '?', '?', '?', '?', '?', '?', '?', '?', '?', '?', 'Ÿ', '?', '?', '?', '?', 'Ž', 'ž', '?', 'ƒ', '?', '?', '?', '?', '?', '?', '?', '?', '?', '?', '?', '?', '?', '?', '?', '?', '?', '?', '?', '?', '?', '?', '?', '?', '?', '?');
  $b = array('A', 'A', 'A', 'A', 'A', 'A', 'AE', 'C', 'E', 'E', 'E', 'E', 'I', 'I', 'I', 'I', 'D', 'N', 'O', 'O', 'O', 'O', 'O', 'O', 'U', 'U', 'U', 'U', 'Y', 's', 'a', 'a', 'a', 'a', 'a', 'a', 'ae', 'c', 'e', 'e', 'e', 'e', 'i', 'i', 'i', 'i', 'n', 'o', 'o', 'o', 'o', 'o', 'o', 'u', 'u', 'u', 'u', 'y', 'y', 'A', 'a', 'A', 'a', 'A', 'a', 'C', 'c', 'C', 'c', 'C', 'c', 'C', 'c', 'D', 'd', 'D', 'd', 'E', 'e', 'E', 'e', 'E', 'e', 'E', 'e', 'E', 'e', 'G', 'g', 'G', 'g', 'G', 'g', 'G', 'g', 'H', 'h', 'H', 'h', 'I', 'i', 'I', 'i', 'I', 'i', 'I', 'i', 'I', 'i', 'IJ', 'ij', 'J', 'j', 'K', 'k', 'L', 'l', 'L', 'l', 'L', 'l', 'L', 'l', 'l', 'l', 'N', 'n', 'N', 'n', 'N', 'n', 'n', 'O', 'o', 'O', 'o', 'O', 'o', 'OE', 'oe', 'R', 'r', 'R', 'r', 'R', 'r', 'S', 's', 'S', 's', 'S', 's', 'S', 's', 'T', 't', 'T', 't', 'T', 't', 'U', 'u', 'U', 'u', 'U', 'u', 'U', 'u', 'U', 'u', 'U', 'u', 'W', 'w', 'Y', 'y', 'Y', 'Z', 'z', 'Z', 'z', 'Z', 'z', 's', 'f', 'O', 'o', 'U', 'u', 'A', 'a', 'I', 'i', 'O', 'o', 'U', 'u', 'U', 'u', 'U', 'u', 'U', 'u', 'U', 'u', 'A', 'a', 'AE', 'ae', 'O', 'o');
  return str_replace($a, $b, $str);
}

function money($value = 0.00)
{
	if(is_numeric($value)){
		return number_format($value,2,',','.');
	}

	else{
		return 0;
	}
}

function converterparahoras($segundos)
{ 
	$hours		= floor($segundos / 3600);
	$segundos	-= $hours * 3600;
	$minutes	= floor($segundos / 60);
	$segundos	-= $minutes * 60;
	
	
	return sprintf("%d:%02d", $hours, $minutes);
}

function metroskm($metros)
{
	$str = str_replace(',','.',$metros / 1000);
	$str = substr( $str, 0, (strlen($str)-1));
	return $str;
}

//Formata um selectbox
function format_select($rows, $selected=0, $text = 'Selecione', $input_1 = 'id', $input_2 = 'nome')
{
	print('<option value="0">'.$text.'</option>');
	if($rows){
		foreach($rows as $row){
			if(intval($row['id']) == $selected){
				
				//printr($selected);
				
				print('<option value="'.$row[$input_1].'" selected="selected">'.$row[$input_2].'</option>');
			} else {
				print('<option value="'.$row[$input_1].'">'.$row[$input_2].'</option>');
			}
		}
	}

	return true;
}


//Formata um selectbox
function format_select_text($rows, $selected=0, $text = '', $input_1 = 'id', $input_2 = 'nome')
{

	if($rows){
		foreach($rows as $row){
			
			if(intval($row['id']) == $selected){			
				
				echo($row[$input_2]);				
			
			} 
		}
	}

	return true;
}
function only_numbers($string = '')
{
	return preg_replace('/\D/', '', $string);

}

function comma_period($value = null)
{
	if($value)
	{
		$value = str_replace(array('.',','), array('','.'), $value);

		return $value;
	}
	else
	{
		return 0;
	}
}

function toFakeDecimal($str)
{
	
	$str = ($str * 100);
	$posicao = strpos($str, ",");
	$str = substr( $str, 0 , ( $posicao + 3) );
	return $str;

	$str = str_replace("%", "", $str);

	if( strpos($str, ",") === false ){
		
		//Trata 90% ou 3%
		if( strlen($str)==2 ){
			$str .=",00";
		}if( strlen($str)==1 ){
			$str = "0".$str.",00";
		}

	//Quando tem ponto
	}else{
		$pedacos = explode(",",$str);

		//Trata primeira parte
		$primeiro = substr($pedacos[0],0,2);
		if( strlen($primeiro) == 1 ){
			$primeiro = "0".$primeiro;
		}

		//Pega segunda parte (aceita 00.4) não pode virar 00.04 ou 00.40
		$segunda = substr($pedacos[1],0,2);
		

		$str = $primeiro.",".$segunda;
	}

	return $str;
}

function soma_horas($times)
{
	if($times){
		
		$segundos = 0;
		
		foreach ($times as $time){
			
			if($time != '0' && $time!="" && $time!=" "  ){

				list($g, $i) = explode(':', $time);
	
				$segundos += $g * 3600;
				$segundos += $i * 60;
			}
		}
		
		return $segundos;
	}
	
	return 0;
}



function array_sort($array, $on, $order=SORT_ASC)
{
    $new_array = array();
    $sortable_array = array();

    if (count($array) > 0) {
        foreach ($array as $k => $v) {
            if (is_array($v)) {
                foreach ($v as $k2 => $v2) {
                    if ($k2 == $on) {
                        $sortable_array[$k] = $v2;
                    }
                }
            } else {
                $sortable_array[$k] = $v;
            }
        }

        switch ($order) {
            case SORT_ASC:
                asort($sortable_array);
            break;
            case SORT_DESC:
                arsort($sortable_array);
            break;
        }

        foreach ($sortable_array as $k => $v) {
            $new_array[$k] = $array[$k];
        }
    }

    return $new_array;
}



function SimNao($value)
{
	if($value == '1'){
		return 'Sim';
	}
	
	return 'Não';
}

function dias_semana()
{
	return array(
		array('id' => 1, 'nome' => 'Seg-Sex'),
		array('id' => 2, 'nome' => 'Sábado'),
		array('id' => 3, 'nome' => 'Domingo'),
		array('id' => 4, 'nome' => 'Feriados'),
	);
}

function return_dia_semana($id)
{
	foreach(dias_semana() as $dia){
		if($dia['id'] == $id){
			return $dia['nome'];
		}
	}
}


function horas()
{
	return array(
		array('id' => 0, 'nome' => '0:00'),
		array('id' => 1, 'nome' => '1:00'),
		array('id' => 2, 'nome' => '2:00'),
		array('id' => 3, 'nome' => '3:00'),
		array('id' => 4, 'nome' => '4:00'),
		array('id' => 5, 'nome' => '5:00'),
		array('id' => 6, 'nome' => '6:00'),
		array('id' => 7, 'nome' => '7:00'),
		array('id' => 8, 'nome' => '8:00'),
		array('id' => 9, 'nome' => '9:00'),
		array('id' => 10, 'nome' => '10:00'),
		array('id' => 11, 'nome' => '11:00'),
		array('id' => 12, 'nome' => '12:00'),
		array('id' => 13, 'nome' => '13:00'),
		array('id' => 14, 'nome' => '14:00'),
		array('id' => 15, 'nome' => '15:00'),
		array('id' => 16, 'nome' => '16:00'),
		array('id' => 17, 'nome' => '17:00'),
		array('id' => 18, 'nome' => '18:00'),
		array('id' => 19, 'nome' => '19:00'),
		array('id' => 20, 'nome' => '20:00'),
		array('id' => 21, 'nome' => '21:00'),
		array('id' => 22, 'nome' => '22:00'),
		array('id' => 23, 'nome' => '23:00'),
	);
}

function return_hora($id)
{
	foreach(horas() as $dia){
		if($dia['id'] == $id){
			return $dia['nome'];
		}
	}
}

function db2url($filename, $path='assets/uploads/ponto/', $tipo='normal'){

	if($tipo!='normal'){ 		
		//Trata o nome do arquivo como texto (não pegar mimetype getext)
		$tmp = explode(".", $filename);
		$ext = end($tmp);
		$thumb = str_replace(array($ext,"._thumb"),array("_thumb".$ext,"_thumb."), $filename);


		#Valida se tem thumb
		if(file_exists($path.$thumb))
			return site_url($path.$thumb);
	}

	#Valida imagem normal
	if(file_exists($path.$filename))
		return site_url($path.$filename);

	return "";
}

function get_extCache($uri = '')
{
	$exts	= explode(',',EXTENSIONS_TO_CACHE);

	return $exts;
}

function status_solicitacao($id)
{
	$status = array(
		1	=> 'Pendente',
		2	=> 'Aguardando Retirada',
		3	=> 'Concluido',
		4	=> 'Cancelado'
	);
	
	return $status[$id];
}

function select_status($id = false, $inicio = 1, $fim = 5)
{
	for($i = $inicio; $i < $fim; $i++){
		if($id == $i){
			echo '<option value="'.$i.'" selected>'.status_solicitacao($i).'</option>';
		}else{
			echo '<option value="'.$i.'">'.status_solicitacao($i).'</option>';
		}
	}
}

function select_chenge_status($status_id_now, $status_id, $user_type)
{
	$fim = ($status_id_now == 1) ? 5 : 4;
	
	switch($user_type){
		case 'ponto':
		case 'admin':
			select_status($status_id, $status_id_now + 1, $fim);
		break;
		case 'usuario':
			//select_status(false, 4);
		break;
	}
}

function geraSenha($tamanho = 8, $letras = true, $maiusculas = true, $numeros = true, $simbolos = false)
{
	$lmin		= 'abcdefghjklmnpqrstuvwxyz';
	$lmai		= 'ABCDEFGHJKLMNPQRSTUVWXYZ';
	$num		= '123456789';
	$simb		= '!@#$%*-';
	$retorno	= '';
	$caracteres	= '';

	if ($numeros)
		$caracteres .= $num;
	if ($letras)
		$caracteres .= $lmin;
	if ($maiusculas)
		$caracteres .= $lmai;
	if ($simbolos)
		$caracteres .= $simb;
	
	$len = strlen($caracteres);
	
	for($n = 1; $n <= $tamanho; $n++){
		$rand		= mt_rand(1, $len);
		$retorno 	.= $caracteres[$rand-1];
	}
	
	return $retorno;
}

function retira_espaco_quebra($string)
{
	$string = trim($string);
	$string = str_replace("\r", "", $string);
	$string = str_replace("\n", "", $string);
	$string = str_replace("\r\n", "", $string);
	$string = str_replace("\t", "", $string);
	
	return $string;
}



//Configurações para a classe de e-mails
function email_config()
{
	$config['useragent']	= 'STD';
	$config['priority']		= '1';
	$config['mailtype']		= 'html';
	$config['charset']		= 'UTF-8';	
	$config['newline']      = "\r\n";



	return $config;
}

