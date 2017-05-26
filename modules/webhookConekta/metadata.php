<?php
/**
 * Metadata version
 */
$sMetadataVersion = '1.0';

/**
 * Module information
 */
$aModule = array(
    'id'           => 'webhookConekta',
    'title'        => 'WebHook Conekta',
    'description'  => 'Modulo para recibir notificaciones de Conekta para pagos con OXXO.',
    'thumbnail'    =>  null,
    'version'      => '1.0',
    'author'       => 'Daniel Benson <ventas@greenpeach.mx>',
    'extend' => array(),
    'files' => array(
        'webhook' =>
            'webhookConekta/controllers/webhook.php',
    ),
   'blocks' => array(),
);
