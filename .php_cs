<?php
$header = <<<EOF
@author Mygento Team
@copyright 2016-2019 Mygento (https://www.mygento.ru)
@package Mygento_Payment
EOF;

$finder = PhpCsFixer\Finder::create()->in('.')->name('*.phtml');
$config = new \Mygento\CS\Config\Module($header);
$config->setFinder($finder);
return $config;
