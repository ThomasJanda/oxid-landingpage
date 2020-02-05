<?php

$sMetadataVersion = '2.0';

$aModule = array(
    'id'           => 'rs-landingpage',
    'title'        => '*RS Landingpage',
    'description'  => 'Add a new pagetype landingpage for action products',
    'thumbnail'    => '',
    'version'      => '1.0',
    'author'       => '',
    'url'          => '',
    'email'        => '',
    'extend'       => array(
        \OxidEsales\Eshop\Application\Controller\Admin\ActionsMain::class => rs\landingpage\Application\Controller\Admin\rs_landingpage_actions_main::class,
    ),
    'controllers' => array(
        'rs_landingpage'      => rs\landingpage\Application\Controller\rs_landingpage::class,
    ),
    'templates'    => array(
        'rs_landingpage.tpl' => 'rs/landingpage/views/tpl/rs_landingpage.tpl'
    ),
    'blocks'       => array(
        array(
            'template'  => 'actions_main.tpl',
            'block'     => 'admin_actions_main_form',
            'file'      => '/views/admin/blocks/actions_main__admin_actions_main_form.tpl',
        ),
    )
);
