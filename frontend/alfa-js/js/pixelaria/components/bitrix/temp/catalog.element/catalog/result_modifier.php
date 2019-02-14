<?
// подключаем пространство имен класса HighloadBlockTable и даём ему псевдоним HLBT для удобной работы
use Bitrix\Highloadblock\HighloadBlockTable as HLBT;
// id highload-инфоблока
const MY_HL_BLOCK_ID = 1;
//подключаем модуль highloadblock
CModule::IncludeModule('highloadblock');
//Напишем функцию получения экземпляра класса:
function GetEntityDataClass($HlBlockId) {
    if (empty($HlBlockId) || $HlBlockId < 1){
        return false;
    }
    $hlblock = HLBT::getById($HlBlockId)->fetch();   
    $entity = HLBT::compileEntity($hlblock);
    $entity_data_class = $entity->getDataClass();
    return $entity_data_class;
}

CModule::IncludeModule('highloadblock');
$entity_data_class = GetEntityDataClass(MY_HL_BLOCK_ID);
$rsData = $entity_data_class::getList(array(
   'select' => array('*')
));
while($el = $rsData->fetch()){
	$arResult['COUNTRYS'][$el['UF_XML_ID']] = $el;
}

if($arResult['PROPERTIES']['MANUFACTURER']['VALUE']){
    $arSelect = Array("ID", "NAME", "DETAIL_PAGE_URL", "PROPERTY_COUNTRY");
    $arFilter = Array("IBLOCK_ID"=>IntVal(2), "ID"=>$arResult['PROPERTIES']['MANUFACTURER']['VALUE']);
    $res = CIBlockElement::GetList(Array(), $arFilter, false, Array("nPageSize"=>1), $arSelect);
    if($ob = $res->GetNextElement()){
        $arFields = $ob->GetFields();
        $arResult['PROPERTIES']['MANUFACTURER']['VALUE'] = "<a href='".$arFields['DETAIL_PAGE_URL']."'>".$arFields['NAME'].'</a>';
        $arResult['PROPERTIES']['MANUFACTURER']['PICTURE'] = $arResult['COUNTRYS'][$arFields['PROPERTY_COUNTRY_VALUE']]['UF_FILE'];
    }
}

foreach($arResult['PROPERTIES']['SERVICES']['VALUE'] as $key => $service){
    $res = CIBlockElement::GetByID($service);
    if($ar_res = $res->GetNext()){
        $arResult['PROPERTIES']['SERVICES']['DISPLAY_VALUE'][$key]['NAME'] = $ar_res['NAME'];
        $arResult['PROPERTIES']['SERVICES']['DISPLAY_VALUE'][$key]['DETAIL_PAGE_URL'] = $ar_res['DETAIL_PAGE_URL'];
    }
}

$nav = CIBlockSection::GetNavChain($arParams["IBLOCK_ID"], $arResult['IBLOCK_SECTION_ID']);           
while ($arNav=$nav->GetNext()) $arResult['SECTIONS_CHAIN'][] = $arNav["ID"];
?>