<?
/**
 * @global  \CMain $APPLICATION
 */
require($_SERVER["DOCUMENT_ROOT"]."/bitrix/header.php");
?>

<? $APPLICATION->IncludeComponent(
    "dv:lead.list",
    ".default",
    Array(
        "LEAD_COUNT" => "10"
    ),
    false
);?>

<?php

?>
<? $APPLICATION->IncludeComponent(
    "dv:tasks.priority",
    ".default",
    Array(
        "LEAD_COUNT" => "10"
    ),
    false
);?>
<?php
/*$arData = \Tables\TasksTable::getList()->fetchAll();
echo "<pre>"; print_r($arData); echo "</pre>";
*/?>




<?php
require($_SERVER["DOCUMENT_ROOT"]."/bitrix/footer.php");