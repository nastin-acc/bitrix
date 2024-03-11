<? if(!defined("B_PROLOG_INCLUDED") || B_PROLOG_INCLUDED!==true)die();

/*$leadResult = CCrmLead::GetListEx(
    $arOrder = array(),
    [
        'CHECK_PERMISSIONS' => 'N',
        'UF_CHECKED' => 'Y'
    ],
    $arGroupBy = false,
    $arNavStartParams = false,
    $arSelectFields = array(),
    $arOptions = array(),
);*/


$leadResult = CCrmLead::GetListEx(
    array("DATE_CREATE" => "DESC"),
    $arFilter = array(),
    $arGroupBy = false,
    array('nTopCount' => 10),
    [
        'TITLE',
        'DATE_CREATE',
        'SOURCE_ID',
        'ASSIGNED_BY_NAME',
        'ASSIGNED_BY_LAST_NAME',
        'STATUS_ID',
        'UF_CHECKED'
    ]);



while( $lead = $leadResult->Fetch() )
{
    /**
     * [ 'ID' => ..., 'TITLE' => ... ]
     * @var array
     */
    $arResult['LEAD'][$lead['ID']] = $lead;
}


$this->IncludeComponentTemplate();
?>