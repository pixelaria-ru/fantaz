<?
  foreach($arResult["ITEMS"] as $key => $arItem){
    $arSelect = Array("ID", "IBLOCK_ID", "NAME");
    
    $arFilter = Array("IBLOCK_ID"=>IntVal(5), "ID"=>$arItem['PROPERTIES']['INDUSTRY']['VALUE']);
    $res = CIBlockElement::GetList(Array(), $arFilter, false, false, $arSelect);
    
    if($ob = $res->GetNextElement()){
        $arFields = $ob->GetFields();
        $arResult["ITEMS"][$key]['PROPERTIES']['INDUSTRY']['VALUE'] = $arFields['NAME'];
    }

    $res = CIBlockSection::GetByID($arItem["IBLOCK_SECTION_ID"]);
    if($ob = $res->GetNext())
      $arResult["ITEMS"][$key]['IBLOCK_SECTION_NAME'] = $ob['NAME'];
    }  
?>