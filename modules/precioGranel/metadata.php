<?php
/**
 * Metadata version
 */
$sMetadataVersion = '1.0.0';

/**
 * Module information
 */
$aModule = array(
    'id' => 'preciogranel',
    'title' => 'PRECIO A GRANEL',
    'description' => 'Módulo para precio a granel.',
    'thumbnail' => 'picture.png',
    'version' => '1.0.1',
    'author' => 'Julio',
    'extend' => array(
        'oxBasketItem' => 'precioGranel/models/preciogranel_oxbasketitem',
        'oxBasket' => 'precioGranel/models/preciogranel_oxbasket'
    ),
    'files' => array(),
    'templates' => array(
        'article_main_precio_granel.tpl' => 'precioGranel/views/admin/article_main_precio_granel.tpl',
    ),
    'blocks' => array(),
);
