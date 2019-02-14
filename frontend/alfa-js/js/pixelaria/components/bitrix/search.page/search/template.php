<?if( !defined("B_PROLOG_INCLUDED") || B_PROLOG_INCLUDED!==true ) die();?>

<section class="section section--corner">
  <div class="container">
    <?$APPLICATION->IncludeComponent("pixelaria:breadcrumb","",Array(
        "START_FROM" => "0", 
        "PATH" => "", 
        "SITE_ID" => "s1" 
      )
    );?>
    <h1 class="page__title">Поиск по сайту</h1>
    <h2 class="page__subtitle page__subtitle--big">Введите слово или фразу, чтобы найти нужную страницу. Например, «Дизельная электростанция»</h2>
		<form action="" method="get">
			<div class="row">
	      <div class="col-md-8">
	        <div class="input-group">
	          <input class="input-group__input used" name="q" value="<?=$arResult["REQUEST"]["QUERY"]?>" type="text">
	          <label class="input-group__label im--email" for="name">Поиск...</label>
	        </div>    
	      </div>
	      <div class="col-md-4">
	        
	        <button type="submit" name="s" value="<?=GetMessage("SEARCH_GO")?>" class="btn btn--orange btn--inline">Поиск</button>
	      </div>
	    </div>
	    <input type="hidden" name="how" value="<?echo $arResult["REQUEST"]["HOW"]=="d"? "d": "r"?>" />
		</form>
  </div>
</section>

<section class="section section--pixelized">
  <div class="container">
    <h2 class="section__title section__title--white">Результаты поиска:</h2>
    <?if($arResult["REQUEST"]["QUERY"] === false && $arResult["REQUEST"]["TAGS"] === false):?>
		<?elseif($arResult["ERROR_CODE"]!=0):?>
			<div style="color:#ffffff">
      <p><?=GetMessage("SEARCH_ERROR")?></p>
			<?ShowError($arResult["ERROR_TEXT"]);?>
			<p><?=GetMessage("SEARCH_CORRECT_AND_CONTINUE")?></p>
			<br /><br />
			<p><?=GetMessage("SEARCH_SINTAX")?><br /><b><?=GetMessage("SEARCH_LOGIC")?></b></p>
			<table border="0" cellpadding="5">
				<tr>
					<td align="center" valign="top"><?=GetMessage("SEARCH_OPERATOR")?></td><td valign="top"><?=GetMessage("SEARCH_SYNONIM")?></td>
					<td><?=GetMessage("SEARCH_DESCRIPTION")?></td>
				</tr>
				<tr>
					<td align="center" valign="top"><?=GetMessage("SEARCH_AND")?></td><td valign="top">and, &amp;, +</td>
					<td><?=GetMessage("SEARCH_AND_ALT")?></td>
				</tr>
				<tr>
					<td align="center" valign="top"><?=GetMessage("SEARCH_OR")?></td><td valign="top">or, |</td>
					<td><?=GetMessage("SEARCH_OR_ALT")?></td>
				</tr>
				<tr>
					<td align="center" valign="top"><?=GetMessage("SEARCH_NOT")?></td><td valign="top">not, ~</td>
					<td><?=GetMessage("SEARCH_NOT_ALT")?></td>
				</tr>
				<tr>
					<td align="center" valign="top">( )</td>
					<td valign="top">&nbsp;</td>
					<td><?=GetMessage("SEARCH_BRACKETS_ALT")?></td>
				</tr>
			</table>
      </div>
		<?elseif(count($arResult["SEARCH"])>0):?>
    <?foreach($arResult["SEARCH"] as $arItem):?>
    <a href="<?echo $arItem["URL"]?>" class="results">
      <p class="results__title"><?echo $arItem["TITLE_FORMATED"]?></p>
      <p class="results__text"><?echo $arItem["BODY_FORMATED"]?></p>
    </a>
    <?endforeach;?>
    <?else:?>
			<?ShowNote(GetMessage("SEARCH_NOTHING_TO_FOUND"));?>
		<?endif;?>
  </div>
</section>