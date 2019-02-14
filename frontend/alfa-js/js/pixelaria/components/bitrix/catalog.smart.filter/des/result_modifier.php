<?if (!defined("B_PROLOG_INCLUDED") || B_PROLOG_INCLUDED!==true)die();


$categories = Array(
  0 => array ('name'=>'От 5 до 50 кВт','count'=>0,'categories'=>array()),
  1 => array ('name'=>'От 50 до 100 кВт','count'=>0,'categories'=>array()),
  2 => array ('name'=>'От 100 до 1000 кВт','count'=>0,'categories'=>array()),
  3 => array ('name'=>'От 1МВт','count'=>0,'categories'=>array())
); 

if(CModule::IncludeModule("iblock")) { 
  $arSelect = Array('ID','CODE','NAME','SECTION_PAGE_URL','UF_POWER');
  $arFilter = Array(
    'IBLOCK_ID'=>$arParams['IBLOCK_ID'], 
    'SECTION_ID'=>$arParams['SECTION_ID'], 
    'GLOBAL_ACTIVE'=>'Y'
  );
  $db_list = CIBlockSection::GetList(Array("SORT"=>"ASC"), $arFilter,false,$arSelect);

  while($ar_result = $db_list->GetNext()) { 
    $uf_power = $ar_result['UF_POWER'];
    if (!$uf_power) continue;
    if ($uf_power>0 && $uf_power < 50) { //5-50
      $categories[0]['categories'][]=$ar_result;
      $categories[0]['count']++;
    } else if ($uf_power>=50 && $uf_power < 100) { //50-100
      $categories[1]['categories'][]=$ar_result;
      $categories[1]['count']++;
    } else if ($uf_power>=100 && $uf_power < 1000) { //100-1000
      $categories[2]['categories'][]=$ar_result;
      $categories[2]['count']++;
    } else { //1000  
      $categories[3]['categories'][]=$ar_result;
      $categories[3]['count']++;
    }
  }
}

$arResult['categories'] = $categories;