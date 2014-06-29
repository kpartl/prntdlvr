<?php //netteCache[01]000406a:2:{s:4:"time";s:21:"0.91258700 1403797146";s:9:"callbacks";a:2:{i:0;a:3:{i:0;a:2:{i:0;s:19:"Nette\Caching\Cache";i:1;s:9:"checkFile";}i:1;s:92:"C:\projects\NetBeans\trans\app\FrontModule\templates\SouhrnFaktur\souhrnFakturDatagrid.latte";i:2;i:1403797092;}i:1;a:3:{i:0;a:2:{i:0;s:19:"Nette\Caching\Cache";i:1;s:10:"checkConst";}i:1;s:25:"Nette\Framework::REVISION";i:2;s:22:"released on 2013-12-31";}}}?><?php

// source file: C:\projects\NetBeans\trans\app\FrontModule\templates\SouhrnFaktur\souhrnFakturDatagrid.latte

?><?php
// prolog Nette\Latte\Macros\CoreMacros
list($_l, $_g) = Nette\Latte\Macros\CoreMacros::initRuntime($template, 'y35uz63dpw')
;
// prolog Nette\Latte\Macros\UIMacros
//
// block col-ID_DATE_OUT
//
if (!function_exists($_l->blocks['col-ID_DATE_OUT'][] = '_lb4a7f715897_col_ID_DATE_OUT')) { function _lb4a7f715897_col_ID_DATE_OUT($_l, $_args) { foreach ($_args as $__k => $__v) $$__k = $__v
?><td>
	<?php echo Nette\Templating\Helpers::escapeHtml($template->date($row->ID_DATE_OUT, 'd.m.Y H:i:s'), ENT_NOQUOTES) ?>

</td>
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
  