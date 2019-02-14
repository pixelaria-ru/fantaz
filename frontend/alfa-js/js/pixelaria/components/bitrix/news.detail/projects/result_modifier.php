<?
    $arSelect = Array("ID", "IBLOCK_ID", "NAME");
    
    $arFilter = Array("IBLOCK_ID"=>IntVal(5), "ID"=>$arResult['PROPERTIES']['INDUSTRY']['VALUE']);
    $res = CIBlockElement::GetList(Array(), $arFilter, false, false, $arSelect);
    
    if($ob = $res->GetNextElement()){
        $arFields = $ob->GetFields();
        $arResult['PROPERTIES']['INDUSTRY']['VALUE'] = $arFields['NAME'];
    }

    $res = CIBlockSection::GetByID($arResult["IBLOCK_SECTION_ID"]);
   
    if($ob = $res->GetNext()) {
      $arResult['IBLOCK_SECTION_NAME'] = $ob['NAME'];
      $arResult['SECTION_PAGE_URL'] = $ob['SECTION_PAGE_URL'];
    }
        

    $related = array();
    
    if ($arResult['PROPERTIES']['RELATED']['VALUE']) {
        foreach ($arResult['PROPERTIES']['RELATED']['VALUE'] as $related_id) {
            $_related = CIBlockElement::GetByID($related_id);
            
            if($related_obj = $_related->GetNext()) {
                $arFilter = Array("IBLOCK_ID"=>$related_obj['IBLOCK_ID'], "ID"=>$related_obj['ID'], "ACTIVE"=>"Y");
                $arSelect = Array("ID", "IBLOCK_ID", "DETAIL_PAGE_URL","IBLOCK_SECTION_ID","NAME","PREVIEW_PICTURE","INDUSTRY","CLIENT_NAME","CLIENT_LOGO");

                $res = CIBlockElement::GetList(Array(), $arFilter,false,false,$arSelect);
                if ($ob = $res->GetNextElement()){
                    $arFields = $ob->getFields();
                    $arProps = $ob->GetProperties(); // свойства элемента

                    $section_el = CIBlockSection::GetByID($arFields["IBLOCK_SECTION_ID"]);
                    $section_ob = $section_el->GetNext();
                      
                    
                    $industry_el = CIBlockElement::GetByID($arProps['INDUSTRY']['VALUE']);
    
                    $industry_ob = $industry_el->GetNext();
                        
                    $_new = array();
                    $_new['NAME'] = $arFields['NAME'];
                    $_new['IBLOCK_SECTION_NAME'] = $section_ob['NAME'];
                    $_new['DETAIL_PAGE_URL'] = $arFields['DETAIL_PAGE_URL'];

                    $_new['CLIENT_NAME'] = $arProps['CLIENT_NAME']['VALUE'];
                    $_new['CLIENT_LOGO'] = CFile::GetPath($arProps['CLIENT_LOGO']['VALUE']);
                    $_new['PICTURE'] = CFile::GetPath($arFields['PREVIEW_PICTURE']);
                    $_new['INDUSTRY'] = $industry_ob['NAME'];
                    $related[]  = $_new;
                }

            }
        }
        
        $arResult['RELATED'] = $related;       
        
    }
?>