<?php defined('_JEXEC') or die;
    JHtml::_('bootstrap.tooltip');
    require_once JPATH_SITE.'/components/com_catalogue/helper.php';
?>

    <ul class="unstyled catalogue-hot-list">
            <?php foreach ($list as $item) : ?>
                    <?php
                            
                            $item->real_price = $item->price;
                            
                            $priceData = new JRegistry();
                            $priceData->loadString($item->params);
                            $price = $priceData->toArray();
                            
                            if ($price[0]['price'] > 0)
                            {
                                    $item->price = $price[0]['price'];
                            }
                    
                    ?>
                    <li class="span3 catalogue-item" id="item-<?php echo $item->id ?>">
                            <?php switch ($item->sticker) {
                                            case 0 : break;
                                            case 1 : echo '<div class="ticket ticket-new"></div>'; break;
                                            case 2 : echo '<div class="ticket ticket-hot"></div>'; break;
                                            case 3 : echo '<div class="ticket ticket-sale"></div>'; break;
                                    }
                                    ?>
                                    <h4 class="title"><i class="icon-fire"> </i> <?php echo $item->name ?></h4>
                            
                            <a href="<?php echo $item->link ?>"><img src="<?php echo rawurlencode(CatalogueHelper::createThumb($item->id, $item->image, 220, 200)) ?>" alt="<?php echo $item->name?>" title="<?php echo $item->name?>"/></a>
                            <div class="info">
                                    
                                    <div class="buttons">
                                            <div class="btn-group">
                                                    <a id="price-item-<?php echo $item->id ?>" href="<?php echo $item->link ?>" title="Цена букета на фото: <?php echo $item->real_price ?> р." class="hasTooltip btn btn-mini btn-<?php echo $params->get('btntype', 'danger') ?>"><i class="icon icon-ok icon-white"> </i> <?php echo $item->price + ($item->price * $addprice / 100)?> руб.</a>
                                                    <a href="#" id="id-<?php echo $item->id ?>" class="btn btn-mini addtofavorite<?php echo (CatalogueHelper::isFavorite($item->id) ? ' active btn-success' : '') ?>"><i class="icon icon-heart"> </i> В избранное</a>
                                            </div>
                                    </div>
                            </div>
                    </li>
            <?php endforeach; ?>
    </ul>
