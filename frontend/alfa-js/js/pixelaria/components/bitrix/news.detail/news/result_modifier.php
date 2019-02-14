<?
  $arSelect = Array("ID", "IBLOCK_ID", "NAME","PREVIEW_TEXT","PROPERTY_PREVIEW","DETAIL_PAGE_URL","PREVIEW_PICTURE");

  $arFilter = Array(
    "IBLOCK_ID"=>IntVal($arParams['IBLOCK_ID']), 
    "ACTIVE"=>"Y",
    "ID" => $arResult['PROPERTIES']['RELATED']['VALUE'] 

  );

  $res = CIBlockElement::GetList(Array(), $arFilter, false, Array("nPageSize"=>5), $arSelect);

  $arFields = array();
  while($ob = $res->GetNextElement()){
      $arFields[] = $ob->GetFields();
  }
  $arResult['PROPERTIES']['RELATED_NEWS'] = $arFields;
?>