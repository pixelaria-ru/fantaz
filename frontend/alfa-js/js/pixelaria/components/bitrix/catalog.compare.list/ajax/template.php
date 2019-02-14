<?if(!defined("B_PROLOG_INCLUDED") || B_PROLOG_INCLUDED!==true)die();?>

<?foreach($_SESSION['CATALOG_COMPARE_LIST'][1]['ITEMS'] as $arItem){
    unset($sec);
    $nav = CIBlockSection::GetNavChain(false,$arItem['IBLOCK_SECTION_ID']);
    while($arSectionPath = $nav->GetNext())
       $sec[] = $arSectionPath['ID'];
    if($arItem['ID']){
        $compareCount[$sec[0]][] = $arItem['ID'];
        $compareFilter[$sec[0]] = $sec[0];
    }
}?>
<div class="el-block-compare-products js-compare-products-carousel">
    <div class="block-line">
        <?$arFilter = Array('IBLOCK_ID'=>1, 'ID'=>$compareFilter);
        $db_list = CIBlockSection::GetList(Array($by=>$order), $arFilter, true);
        while($arSection = $db_list->GetNext()){?>
            <div>
                <div class="element">
                    <div class="image">
                        <a href="/compare/?SECTION_ID=<?=$arSection['ID']?>">
                            <img src="<?=resize($arSection['PICTURE'],165,170)?>" alt="<?=$arSection['NAME']?>">
                        </a>
                    </div>
                    <div class="name">
                        <a href="/compare/?SECTION_ID=<?=$arSection['ID']?>"><?=$arSection['NAME']?> (<?=count($compareCount[$arSection['ID']])?>)</a>
                    </div>
                </div>
            </div>
          <?}?>
    </div>
</div>                                   
               