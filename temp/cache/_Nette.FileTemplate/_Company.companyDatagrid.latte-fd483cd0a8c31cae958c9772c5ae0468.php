<?php //netteCache[01]000396a:2:{s:4:"time";s:21:"0.55045700 1391694275";s:9:"callbacks";a:2:{i:0;a:3:{i:0;a:2:{i:0;s:19:"Nette\Caching\Cache";i:1;s:9:"checkFile";}i:1;s:82:"C:\projects\NetBeans\trans\app\AdminModule\templates\Company\companyDatagrid.latte";i:2;i:1391694274;}i:1;a:3:{i:0;a:2:{i:0;s:19:"Nette\Caching\Cache";i:1;s:10:"checkConst";}i:1;s:25:"Nette\Framework::REVISION";i:2;s:22:"released on 2013-12-31";}}}?><?php

// source file: C:\projects\NetBeans\trans\app\AdminModule\templates\Company\companyDatagrid.latte

?><?php
// prolog Nette\Latte\Macros\CoreMacros
list($_l, $_g) = Nette\Latte\Macros\CoreMacros::initRuntime($template, 'to0d3feh9r')
;
// prolog Nette\Latte\Macros\UIMacros
//
// block row-actions
//
if (!function_exists($_l->blocks['row-actions'][] = '_lb9b29044a03_row_actions')) { function _lb9b29044a03_row_actions($_l, $_args) { foreach ($_args as $__k => $__v) $$__k = $__v
?>	<a href="<?php echo htmlSpecialChars($template->safeurl($_control->link("edit!", array($primary)))) ?>"  class="btn btn-default ajax">Editovat</a>
	<a href="<?php echo htmlSpecialChars($template->safeurl($_presenter->link("delete!", array($primary)))) ?>" data-confirm="Opravdu smazat?" class="btn btn-danger ajax">Smazat</a>
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
?>

<?php if ($_l->extends) { ob_end_clean(); return Nette\Latte\Macros\CoreMacros::includeTemplate($_l->extends, get_defined_vars(), $template)->render(); } ?>



