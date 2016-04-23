<? if(!defined("B_PROLOG_INCLUDED") || B_PROLOG_INCLUDED!==true)die();

/*Получили $arParams["IBLOCK_ID"] айдишник инфоблока*/

$arParams["IBLOCK_ID"] = intval($arParams["IBLOCK_ID"]);
//echo '<pre>'; print_r($arParams); echo '</pre>';
if ($this->StartResultCache($arParams["CACHE_TIME"])){
	$arPics = array();

	$rsItems = CIBlockElement::GetList(
	 Array("ID"=>"DESC"),
	 Array("IBLOCK_ID" => $arParams["IBLOCK_ID"], "ACTIVE"=>"Y"),
	 false,
	 false,
	 Array("ID", "CODE", "NAME", "PREVIEW_PICTURE", "EDIT_LINK", "DELETE_LINK")
	 );

	while($ob = $rsItems->GetNextElement()) // "бежим" по элементам
	{
		$arFields[] = $ob->GetFields();  // $arFields массив значений полей текущего элемента
		//echo "<pre>";
		//print_r($ob);
		//echo "</pre>";
	}
	$x = 0;
	foreach($arFields as $slides)
	{	
		$slides["PREVIEW_PICTURE"] = CFile::GetFileArray($slides["PREVIEW_PICTURE"]);
		$slides["NAME"] = $slides["NAME"];
		$slides["ID"] = $slides["ID"];
	
		$arButtons = CIBlock::GetPanelButtons(
			$arParams["IBLOCK_ID"],
			$slides["ID"],
			0,
			array("SECTION_BUTTONS"=>false, "SESSID"=>false)
		);
		$slides["EDIT_LINK"]   = $arButtons["edit"]["edit_element"]["ACTION_URL"];
		$slides["DELETE_LINK"] = $arButtons["edit"]["delete_element"]["ACTION_URL"];
			
		//$slides["EDIT_LINK"] = $slides["EDIT_LINK"];
		//$slides["DELETE_LINK"] = $slides["DELETE_LINK"];
		//$slides["PREVIEW_TEXT"] = $slides["PREVIEW_TEXT"];

		$arFieldsc[] = $slides;
		
		$x++;
		if($x == $arParams["KOL_ID"]){
			break;
		}
	}

	$arResult["SlideForArticles"] = $arFieldsc;

	$this->IncludeComponentTemplate();
}
?>
