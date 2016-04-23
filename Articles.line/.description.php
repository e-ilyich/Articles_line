<? if (!defined("B_PROLOG_INCLUDED") || B_PROLOG_INCLUDED!==true) die(); 
$arComponentDescription = array(
                                "NAME" => GetMessage('Статьи в линию'),
                                "DESCRIPTION" => GetMessage("Выводим статьи в линию"),
                                "ICON" => "/images/carousel.gif",
                                "PATH" => array(
                                                "ID" => "aura_components",
                                                "CHILD" => array(
                                                                 "ID" => "articlesline",
                                                                 "NAME" => "Статьи в линию"
                                                                )
                                               ),
                                );
?>