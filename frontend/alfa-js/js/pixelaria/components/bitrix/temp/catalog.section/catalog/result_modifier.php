<?
  foreach($arResult["ITEMS"] as $key => $arItem){
    $arSelect = Array("ID", "IBLOCK_ID", "NAME", "MF_COUNTRY","MF_COUNTRY_CODE");
    
    $arFilter = Array("IBLOCK_ID"=>IntVal(9), "ID"=>$arItem['PROPERTIES']['M_ENGINE_MF']['VALUE']);
    $res = CIBlockElement::GetList(Array(), $arFilter, false, false, $arSelect);
    
    if($ob = $res->GetNextElement()){
        $arFields = $ob->GetFields();
        $arProps = $ob->GetProperties();

        $arResult["ITEMS"][$key]['PROPERTIES']['MANUFACTURER']['NAME'] = $arFields['NAME'];
        $arResult["ITEMS"][$key]['PROPERTIES']['MANUFACTURER']['COUNTRY'] = $arProps['MF_COUNTRY']['VALUE'];
        $arResult["ITEMS"][$key]['PROPERTIES']['MANUFACTURER']['COUNTRY_CODE'] = $arProps['MF_COUNTRY_CODE']['VALUE'];
    }
  }  

  
  $arFilter = Array('IBLOCK_ID'=>$arParams['IBLOCK_ID'],'GLOBAL_ACTIVE'=>'Y');
  $arSelect = Array('ID','CODE','NAME','SECTION_PAGE_URL','UF_*');
  
  // получаем разделы
  $dbResSect = CIBlockSection::GetList(Array("SORT"=>"ASC"), $arFilter,false,$arSelect);
 
  //Получаем разделы и собираем в массив
  while($sectRes = $dbResSect->GetNext()) {
    $arSections[] = $sectRes;
  }

  //Собираем  массив из Разделов и элементов
  foreach($arSections as $arSection){  
    foreach($arResult["ITEMS"] as $key=>$arItem){
      if($arItem['~IBLOCK_SECTION_ID'] == $arSection['ID']){
        $arSection['ELEMENTS'][] =  $arItem;
      }
    }
    if ($arSection['ELEMENTS'])
    $arElementGroups[] = $arSection;
  }

  $arResult["ITEMS"] = $arElementGroups;
?>