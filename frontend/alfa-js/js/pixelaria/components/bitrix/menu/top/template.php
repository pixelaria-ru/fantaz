<?if (!defined("B_PROLOG_INCLUDED") || B_PROLOG_INCLUDED!==true)die();?> 

<div id="nav" class="nav">
<?if (!empty($arResult)):?>
<ul class="nav__list"> 
<?foreach($arResult as $arItem):?> 
  <li class="nav__item <?=($arItem["CHILD"] ? "nav__item--parent" : "")?> <?=($arItem["SELECTED"] ? "active" : "")?> <?=$class?>">
    <a href="<?=$arItem["LINK"]?>" class="nav__link link"  title="<?=$arItem["TEXT"]?>"><?=$arItem["TEXT"]?></a>
    <?if($arItem["CHILD"]):?>
      <div class="dropdown">
        
        <?if(isset($arItem['PARAMS']['two']) && $arItem['PARAMS']['two'] =='1'){?>
          <div class="dropdown__inner" style="width:340px;">
          <div class="dropdown__list" style="width: 50%;float: left;margin-top:0;">
            <p style="font-weight: bold; margin-bottom: 10px;">О нас</p>
            <?foreach($arItem["CHILD"] as $arSubItem):?>
              <? if ($arSubItem['PARAMS'] && $arSubItem['PARAMS']['left'] !='1') continue;?>
              <a style="display:block;" href="<?=$arSubItem["LINK"]?>" class="dropdown__link <?=($arSubItem["SELECTED"] ? "dropdown__link--active" : "")?>" title="<?=$arSubItem["TEXT"]?>">
                      <?=$arSubItem["TEXT"]?>
              </a>
            <?endforeach;?>  
          </div>
          <div class="dropdown__list" style="width: 50%;float: right;margin-top:0;">
            <p style="font-weight: bold; margin-bottom: 10px;">Пресс-центр</p>
            <?foreach($arItem["CHILD"] as $arSubItem):?>
              <? if ($arSubItem['PARAMS'] && $arSubItem['PARAMS']['right'] !='1') continue;?>
              <a style="display:block;" href="<?=$arSubItem["LINK"]?>" class="dropdown__link <?=($arSubItem["SELECTED"] ? "dropdown__link--active" : "")?>" title="<?=$arSubItem["TEXT"]?>">
                      <?=$arSubItem["TEXT"]?>
              </a>
            <?endforeach;?>  
          </div>
          <div style="clear:both"></div>
          </div>
        <?}else{?>
          <div class="dropdown__inner">
            <?foreach($arItem["CHILD"] as $arSubItem):?>
              <a style="display:block;" href="<?=$arSubItem["LINK"]?>" class="dropdown__link <?=($arSubItem["SELECTED"] ? "dropdown__link--active" : "")?> <?=$class?>" title="<?=$arSubItem["TEXT"]?>">
                      <?=$arSubItem["TEXT"]?>
              </a>
            <?endforeach;?>
          </div>
        <?}?>
      </div>
      
      
    <?endif;?>
  </li>
<?endforeach?>
</ul>
<?endif?>

</div>
<div class="nav__toggler navbar-toggler" data-target="nav">
  <span class="navbar-toggler__bar"></span>
  <span class="navbar-toggler__bar"></span>
  <span class="navbar-toggler__bar"></span>
  <span class="navbar-toggler__bar"></span>
</div>