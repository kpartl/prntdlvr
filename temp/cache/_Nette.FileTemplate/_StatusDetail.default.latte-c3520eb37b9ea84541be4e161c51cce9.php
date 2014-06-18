<?php //netteCache[01]000393a:2:{s:4:"time";s:21:"0.98901700 1391682673";s:9:"callbacks";a:2:{i:0;a:3:{i:0;a:2:{i:0;s:19:"Nette\Caching\Cache";i:1;s:9:"checkFile";}i:1;s:79:"C:\projects\NetBeans\trans\app\FrontModule\templates\StatusDetail\default.latte";i:2;i:1391162052;}i:1;a:3:{i:0;a:2:{i:0;s:19:"Nette\Caching\Cache";i:1;s:10:"checkConst";}i:1;s:25:"Nette\Framework::REVISION";i:2;s:22:"released on 2013-12-31";}}}?><?php

// source file: C:\projects\NetBeans\trans\app\FrontModule\templates\StatusDetail\default.latte

?><?php
// prolog Nette\Latte\Macros\CoreMacros
list($_l, $_g) = Nette\Latte\Macros\CoreMacros::initRuntime($template, '3rsaf0fx1l')
;
// prolog Nette\Latte\Macros\UIMacros
//
// block content
//
if (!function_exists($_l->blocks['content'][] = '_lbea57bd17e5_content')) { function _lbea57bd17e5_content($_l, $_args) { foreach ($_args as $__k => $__v) $$__k = $__v
;Nette\Latte\Macros\CoreMacros::includeTemplate('../base.latte', $template->getParameters(), $_l->templates['3rsaf0fx1l'])->render() ?>

<h2>Detail spoolu</h2>

<table class="table table-bordered table-condensed table-striped">
	<tr>
		<th>Číslo</th>
		<th colspan="2">Status ze dne <?php echo Nette\Templating\Helpers::escapeHtml($template->date($statusEntity->dateIn, 'd.m.Y H:i:s'), ENT_NOQUOTES) ?></th>	
	</tr>
	<tr>
		<td><?php echo Nette\Templating\Helpers::escapeHtml($statusEntity->id_spool, ENT_NOQUOTES) ?></td>
		<td>Typ dokladu</td>
		<td><?php echo Nette\Templating\Helpers::escapeHtml($statusEntity->docType->name, ENT_NOQUOTES) ?></td>
	</tr>
	<tr><td></td><td>Počet stran</td><td><?php echo Nette\Templating\Helpers::escapeHtml($statusEntity->totalAmountPages, ENT_NOQUOTES) ?></td></tr>
	<tr><td></td><td>Počet obálek</td><td><?php echo Nette\Templating\Helpers::escapeHtml($statusEntity->totalAmountEnvelop, ENT_NOQUOTES) ?></td></tr>
	<tr><td></td><td>Přijato</td><td><?php echo Nette\Templating\Helpers::escapeHtml($template->date($statusEntity->dateIn, 'd.m.Y H:i:s'), ENT_NOQUOTES) ?></td></tr>
	<tr><td></td><td>Zpracováno</td><td><?php echo Nette\Templating\Helpers::escapeHtml($template->date($statusEntity->dateProcess, 'd.m.Y H:i:s'), ENT_NOQUOTES) ?></td></tr>
	<tr><td></td><td>Vytištěno</td><td><?php echo Nette\Templating\Helpers::escapeHtml($template->date($statusEntity->datePrint, 'd.m.Y H:i:s'), ENT_NOQUOTES) ?></td></tr>
	<tr><td></td><td>Odesláno</td><td><?php echo Nette\Templating\Helpers::escapeHtml($template->date($statusEntity->dateOut, 'd.m.Y H:i:s'), ENT_NOQUOTES) ?></td></tr>
	<tr><td></td><td>Počet barevných stran</td><td><?php echo Nette\Templating\Helpers::escapeHtml($statusEntity->totalAmountColor, ENT_NOQUOTES) ?></td></tr>
	<tr><td></td><td>Počet čb stran</td><td><?php echo Nette\Templating\Helpers::escapeHtml($statusEntity->totalAmountBW, ENT_NOQUOTES) ?></td></tr>
	<tr><td></td><td>Počet krycích listů</td><td><?php echo Nette\Templating\Helpers::escapeHtml($statusEntity->totalCoverSheet, ENT_NOQUOTES) ?></td></tr>
	<tr><td></td><td>Počet listů celkem</td><td><?php echo Nette\Templating\Helpers::escapeHtml($statusEntity->totalSheets, ENT_NOQUOTES) ?></td></tr>
	<tr><td></td><td>Počet složenek</td><td><?php echo Nette\Templating\Helpers::escapeHtml($statusEntity->totalSlip, ENT_NOQUOTES) ?></td></tr>
	<tr><td></td><td>Počet adresných příloh</td><td><?php echo Nette\Templating\Helpers::escapeHtml($statusEntity->totalAddressAd, ENT_NOQUOTES) ?></td></tr>
	<tr><td></td><td>Počet neadresných příloh</td><td><?php echo Nette\Templating\Helpers::escapeHtml($statusEntity->totalNonAddressAd, ENT_NOQUOTES) ?></td></tr>
	<tr><td></td><td>Počet umístěných bannerů</td><td><?php echo Nette\Templating\Helpers::escapeHtml($statusEntity->totalAmountBanner, ENT_NOQUOTES) ?></td></tr>
	<tr><td></td><td>Počet elektronických dokumentů</td><td><?php echo Nette\Templating\Helpers::escapeHtml($statusEntity->totalEleDoc, ENT_NOQUOTES) ?></td></tr>
	<tr><td></td><td>Poštovné celkem</td><td><?php echo Nette\Templating\Helpers::escapeHtml($statusEntity->totalPostFee, ENT_NOQUOTES) ?></td></tr>	
</table>
<div class="row">
	<div class="col-md-2">	
		<a href="<?php echo htmlSpecialChars($template->safeurl($_presenter->link("Status:default"))) ?>" class="btn btn-primary">Zpět na seznam spoolů</a>
	</div>
	<div class="col-md-4">
		 
		<a href="<?php echo htmlSpecialChars($template->safeurl($_presenter->link("Document:default"))) ?>" class="btn btn-primary" >Seznam dokladů</a>

	</div>

</div>
<?php
}}

//
// end of blocks
//

// template extending and snippets support

$_l->extends = empty($template->_extended) && isset($_control) && $_control instanceof Nette\Application\UI\Presenter ? $_control->findLayoutTemplateFile() : NULL; $template->_extended = $_extended = TRUE;


if ($_l->extends) {
	ob_start();

} elseif (!empty($_control->snippetMode)) {
	return Nette\Latte\Macros\UIMacros::renderSnippets($_control, $_l, get_defined_vars());
}

//
// main template
//
if ($_l->extends) { ob_end_clean(); return Nette\Latte\Macros\CoreMacros::includeTemplate($_l->extends, get_defined_vars(), $template)->render(); }
call_user_func(reset($_l->blocks['content']), $_l, get_defined_vars()) ; 