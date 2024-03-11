<? if(!defined("B_PROLOG_INCLUDED") || B_PROLOG_INCLUDED!==true)die();


if (CModule::IncludeModule("tasks")) {
    $res = CTasks::GetList(
        array("UF_PRIORITY" => "ASC"),
        $arFilter = array(),
        [
            'TITLE',
            'CREATED_DATE',
            'RESPONSIBLE_NAME',
            'RESPONSIBLE_LAST_NAME',
            'CREATED_BY_NAME',
            'CREATED_BY_LAST_NAME',
            'UF_PRIORITY'
         ],
        $arParams = array()
    )
    ;

    while ($arTask = $res->GetNext()) {
        $arTask['UF_PRIORITY']= (int)($arTask['UF_PRIORITY']);
        $arTask['ID']= (int)($arTask['ID']);
        $arResult['DATA'][$arTask['ID']] = $arTask;
    }
}
/*echo "<pre>"; print_r($arResult['DATA']); echo "</pre>";*/
$arHeaders = [
    ['name' => 'ID'],
    ['name' => 'Название'],
    ['name' => 'Дата постановки'],
    ['name' => 'Ответственный'],
    ['name' => 'Поставновщик'],
    ['name' => 'Приоритет']
];
$arResult['HEADERS']=$arHeaders;
$this->IncludeComponentTemplate();
?>