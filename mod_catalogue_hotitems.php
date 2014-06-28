<?php

defined('_JEXEC') or die;

require_once __DIR__ . '/helper.php';

$list = modCatalogueHotItemsHelper::getList($params);
$moduleclass_sfx = htmlspecialchars($params->get('moduleclass_sfx'));

require JModuleHelper::getLayoutPath('mod_catalogue_hotitems', $params->get('layout', 'default'));