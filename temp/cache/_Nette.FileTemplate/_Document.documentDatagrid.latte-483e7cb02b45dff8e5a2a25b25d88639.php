<?php //netteCache[01]000398a:2:{s:4:"time";s:21:"0.36745400 1391682678";s:9:"callbacks";a:2:{i:0;a:3:{i:0;a:2:{i:0;s:19:"Nette\Caching\Cache";i:1;s:9:"checkFile";}i:1;s:84:"C:\projects\NetBeans\trans\app\FrontModule\templates\Document\documentDatagrid.latte";i:2;i:1390483980;}i:1;a:3:{i:0;a:2:{i:0;s:19:"Nette\Caching\Cache";i:1;s:10:"checkConst";}i:1;s:25:"Nette\Framework::REVISION";i:2;s:22:"released on 2013-12-31";}}}?><?php

// source file: C:\projects\NetBeans\trans\app\FrontModule\templates\Document\documentDatagrid.latte

?><?php
// prolog Nette\Latte\Macros\CoreMacros
list($_l, $_g) = Nette\Latte\Macros\CoreMacros::initRuntime($template, 'segb1ajmr8')
;
// prolog Nette\Latte\Macros\UIMacros
//
// block col-spoolEnvelop
//
if (!function_exists($_l->blocks['col-spoolEnvelop'][] = '_lb234334f5ae_col_spoolEnvelop')) { function _lb234334f5ae_col_spoolEnvelop($_l, $_args) { foreach ($_args as $__k => $__v) $$__k = $__v
?><td>	 	
	<a href="<?php echo htmlSpecialChars($template->safeurl($_presenter->link("DocumentDetail:default", array($row->id)))) ?>"> 	 
		<?php echo Nette\Templating\Helpers::escapeHtml($row->spoolEnvelop, ENT_NOQUOTES) ?>

	</a>
</td>
<?php
}}

//
// block col-docType
//
if (!function_exists($_l->blocks['col-docType'][] = '_lb2e85a0afae_col_docType')) { function _lb2e85a0afae_col_docType($_l, $_args) { foreach ($_args as $__k => $__v) $$__k = $__v
?><td>
<?php if (isset($row->docType)) { ?>
		<?php echo Nette\Templating\Helpers::escapeHtml($row->docType->name, ENT_NOQUOTES) ?>

<?php } ?>
</td>
<?php
}}

//
// block col-distChannel
//
if (!function_exists($_l->blocks['col-distChannel'][] = '_lbe130b4657a_col_distChannel')) { function _lbe130b4657a_col_distChannel($_l, $_args) { foreach ($_args as $__k => $__v) $$__k = $__v
?><td>
<?php if (isset($row->distChannel)) { ?>
		<?php echo Nette\Templating\Helpers::escapeHtml($row->distChannel->name, ENT_NOQUOTES) ?>

<?php } ?>
</td>
<?php
}}

//
// block col-operator
//
if (!function_exists($_l->blocks['col-operator'][] = '_lb57a690ee12_col_operator')) { function _lb57a690ee12_col_operator($_l, $_args) { foreach ($_args as $__k => $__v) $$__k = $__v
?><td>
<?php if (isset($row->operator)) { ?>
		<?php echo Nette\Templating\Helpers::escapeHtml($row->operator->name, ENT_NOQUOTES) ?>

<?php } ?>
</td>
<?php
}}

//
// block col-dateIn
//
if (!function_exists($_l->blocks['col-dateIn'][] = '_lb8a4594428e_col_dateIn')) { function _lb8a4594428e_col_dateIn($_l, $_args) { foreach ($_args as $__k => $__v) $$__k = $__v
?><td>
	<?php echo Nette\Templating\Helpers::escapeHtml($template->date($row->dateIn, 'd.m.Y H:i:s'), ENT_NOQUOTES) ?>

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
if ($_l->extends) { ob_end_clean(); return Nette\Latte\Macros\CoreMacros::includeTemplate($_l->extends, get_defined_vars(), $template)->render(); } ?>




