<?if(!defined("B_PROLOG_INCLUDED") || B_PROLOG_INCLUDED!==true)die();?>

<div class = "articles_line_cont">
	<div class="articles_line_header"><h4><a href="/articles/">Блог AuTrade.ru</a></h4></div>
				<?
				foreach($arResult["SlideForArticles"] as $slide)
				{
					$this->AddEditAction($slide['ID'], $slide['EDIT_LINK'], CIBlock::GetArrayByID($slide["IBLOCK_ID"], "ELEMENT_EDIT"));
					$this->AddDeleteAction($slide['ID'], $slide['DELETE_LINK'], CIBlock::GetArrayByID($slide["IBLOCK_ID"], "ELEMENT_DELETE"), array("CONFIRM" => GetMessage('CT_BNL_ELEMENT_DELETE_CONFIRM')));					

    // echo "<pre>";
    // print_r($slide);
    // echo "</pre>";
	
					if (!empty($slide["PREVIEW_PICTURE"])){

						$descrtext = $slide["NAME"];
						$file = CFile::ResizeImageGet($slide["PREVIEW_PICTURE"], array('width'=>100, 'height'=>100), BX_RESIZE_IMAGE_PROPORTIONAL, true);
						$img = '<img src="'.$file['src'].'" width="'.$file['width'].'" height="'.$file['height'].'" alt="'.$descrtext.'" title="'.$descrtext.'"'.'/>';
						$slide["PREVIEW_PICTURE"] = $img;
						$y = round((100 - $file["height"]) / 2);
						if($y < 0){$y = 0;}
					?>
					<div class="news-item" id="<?=$this->GetEditAreaId($slide['ID']);?>">
						<div class="articles_line_slaid">
							<div>
								<a href="/articles/<?=$slide["CODE"];?>/"><div class="articles_line_img_cont"><div style="margin-top: <?=$y;?>px;"><?=$slide["PREVIEW_PICTURE"];?></div></div>
								<div class="articles_line_name_cont"><?=$slide["NAME"];?></div></a>
							</div>
						</div>
					</div>
					<?

					}
				}
				?>
	<div class="articles_line_footer"></h4></div>
 </div>