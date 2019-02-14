<?foreach($arResult['ITEMS'] as $key => $arItem){
    $res = CIBlockElement::GetByID($arItem['ID']);
    if($ar_res = $res->GetNext())
        $arResult['ITEMS'][$key]['PREVIEW_PICTURE'] = $ar_res['PREVIEW_PICTURE']; 
}?>