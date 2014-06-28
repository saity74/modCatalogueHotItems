<?php

defined('_JEXEC') or die;

//require_once JPATH_SITE.'/components/com_catalogue/helpers/route.php';

JModelLegacy::addIncludePath(JPATH_SITE.'/components/com_catalogue/models', 'CatalogueModel');

abstract class modCatalogueHotItemsHelper
{
	public static function getList(&$params)
	{
		$model = JModelLegacy::getInstance('Item', 'CatalogueModel', array('ignore_request' => true));

		$app = JFactory::getApplication();
		$appParams = $app->getParams();
		$model->setState('params', $appParams);

		$items = $model->getHot();
                
                $cid = JRequest::getVar('cid', 0);
                
                foreach ($items as &$item)
                {		  
                    $item->link = JRoute::_('index.php?option=com_catalogue&view=item&cid='.$item->cat_id.'&id='.$item->id.'&Itemid=105');
                }
		return $items;
	}
}
