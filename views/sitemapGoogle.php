<?php

// Receberá todos os dados do XML
$xml = '<?xml version="1.0"?>'."\n";

// A raiz do meu documento XML
$xml .= '<rss version="2.0" xmlns:g="http://base.google.com/ns/1.0">'."\n";

$xml.='<channel>';

$xml.='<title>Reparos e cia Online</title>'."\n";

$xml.='<link>http://www.dominio.com.br</link>'."\n";

$xml.='<description>Loja online de produtos para construção, ferragem e decoração</description>'."\n";
		$now = new DateTime();
		$datetime = $now->format('Y-m-d H:i:s'); 
	foreach ($dados as $obj) {
	$xml .= '<item>';
	$xml .= '<g:id>' . $obj->item_id . '</g:id>'."\n";
	$xml .= '<g:title>' . str_replace('&','',$obj->item_title) . '</g:title>'."\n";
	$xml .= '<g:description>' .str_replace('nbsp','',str_replace('amp','',str_replace('&','',strip_tags($obj->item_desc)))) . '</g:description>'."\n";
	$xml .= '<g:link>' . $obj->item_url . '</g:link>'."\n";
	$xml .= '<g:image_link>' . base_url().'app/fotos/'.$obj->foto_url . '</g:image_link>'."\n";
	$xml .= '<g:condition>' . 'novo'. '</g:condition>'."\n";
	$xml .= '<g:availbility>' . $obj->item_estoque . '</g:availbility>'."\n";
	$xml .= '<g:price>' . $obj->item_preco . '</g:price>'."\n";
	$xml .= '<g:sku>' . $obj->item_ref . '</g:sku>'."\n";
	//$xml .= '<g:google_product_category>' . $meus_links[$i]['prod_cat'] . '</g:google_product_category>';
	$xml .= '<g:updated>'.$datetime. '</g:updated>'."\n";
	$xml .= '</item>'."\n";
}

$xml .= '</channel>'."\n".'</rss>'."\n";

// Escreve o arquivo
$arquivo= 'googleshopping.xml';
$fp = fopen($arquivo, 'w+');
fwrite($fp, $xml);
fclose($fp);
?>