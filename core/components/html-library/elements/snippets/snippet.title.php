<?php
/**
 * Questo snippet genera un titolo HTML rispettando gli stardard SEO
 **/
$title = $modx->resource->get('longtitle');

$ancestor = $modx->resource;
while($ancestor->get('parent') > 0){
	$ancestor = $modx->getObject('modResource', $ancestor->get('parent'));
}
if( $ancestor->get('id') != $modx->resource->get('id') ){
	$title .= ' - '. $ancestor->get('longtitle');
}
unset($ancestor);

return '<title>'. $title .' | '. $modx->getOption('site_name') .'</title>';
