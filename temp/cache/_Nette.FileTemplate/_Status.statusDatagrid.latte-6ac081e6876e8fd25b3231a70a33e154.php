<?php //netteCache[01]000394a:2:{s:4:"time";s:21:"0.77732900 1400839116";s:9:"callbacks";a:2:{i:0;a:3:{i:0;a:2:{i:0;s:19:"Nette\Caching\Cache";i:1;s:9:"checkFile";}i:1;s:80:"C:\projects\NetBeans\trans\app\FrontModule\templates\Status\statusDatagrid.latte";i:2;i:1400839115;}i:1;a:3:{i:0;a:2:{i:0;s:19:"Nette\Caching\Cache";i:1;s:10:"checkConst";}i:1;s:25:"Nette\Framework::REVISION";i:2;s:22:"released on 2013-12-31";}}}?><?php

// source file: C:\projects\NetBeans\trans\app\FrontModule\templates\Status\statusDatagrid.latte

?><?php
// prolog Nette\Latte\Macros\CoreMacros
list($_l, $_g) = Nette\Latte\Macros\CoreMacros::initRuntime($template, 'fwibujj1bz')
;
// prolog Nette\Latte\Macros\UIMacros
//
// block col-id_spool
//
if (!function_exists($_l->blocks['col-id_spool'][] = '_lb17fc8a8779_col_id_spool')) { function _lb17fc8a8779_col_id_spool($_l, $_args) { foreach ($_args as $__k => $__v) $$__k = $__v
?><td>
<?php $args = array('id_spool' => $row->id_spool) ?>

	<a href="<?php echo htmlSpecialChars($template->safeurl($_presenter->link("StatusDetail:default", array_merge(array(), $args, array())))) ?>"> 
				<?php echo Nette\Templating\Helpers::escapeHtml($row->id_spool, ENT_NOQUOTES) ?>

	</a>
</td>
<?php
}}

//
// block col-filter-dateIn
//
if (!function_exists($_l->blocks['col-filter-dateIn'][] = '_lb44ab820608_col_filter_dateIn')) { function _lb44ab820608_col_filter_dateIn($_l, $_args) { foreach ($_args as $__k => $__v) $$__k = $__v
;$_formStack[] = $_form; $formContainer = $_form = $_form["dateIn"] ?>
	<?php echo $_form["min"]->getControl() ?>

	<?php echo $_form["max"]->getControl() ?>

<?php $_form = array_pop($_formStack) ;
}}

//
// block col-dateIn
//
if (!function_exists($_l->blocks['col-dateIn'][] = '_lb68a9ac9f5b_col_dateIn')) { function _lb68a9ac9f5b_col_dateIn($_l, $_args) { foreach ($_args as $__k => $__v) $$__k = $__v
?><td>
	<?php echo Nette\Templating\Helpers::escapeHtml($template->date($row->dateIn, 'd.m.Y H:i:s'), ENT_NOQUOTES) ?>

</td>
<?php
}}

//
// block col-dateProcess
//
if (!function_exists($_l->blocks['col-dateProcess'][] = '_lb508ae05ee5_col_dateProcess')) { function _lb508ae05ee5_col_dateProcess($_l, $_args) { foreach ($_args as $__k => $__v) $$__k = $__v
?><td>
	<?php echo Nette\Templating\Helpers::escapeHtml($template->date($row->dateProcess, 'd.m.Y H:i:s'), ENT_NOQUOTES) ?>

</td>
<?php
}}

//
// block col-datePrint
//
if (!function_exists($_l->blocks['col-datePrint'][] = '_lbc15268702c_col_datePrint')) { function _lbc15268702c_col_datePrint($_l, $_args) { foreach ($_args as $__k => $__v) $$__k = $__v
?><td>
	<?php echo Nette\Templating\Helpers::escapeHtml($template->date($row->datePrint, 'd.m.Y H:i:s'), ENT_NOQUOTES) ?>

</td>
<?php
}}

//
// block col-dateOut
//
if (!function_exists($_l->blocks['col-dateOut'][] = '_lbfe2d75c57b_col_dateOut')) { function _lbfe2d75c57b_col_dateOut($_l, $_args) { foreach ($_args as $__k => $__v) $$__k = $__v
?><td>
	<?php echo Nette\Templating\Helpers::escapeHtml($template->date($row->dateOut, 'd.m.Y H:i:s'), ENT_NOQUOTES) ?>

</td>
<?php
}}

//
// block col-docType
//
if (!function_exists($_l->blocks['col-docType'][] = '_lbe0ea388c73_col_docType')) { function _lbe0ea388c73_col_docType($_l, $_args) { foreach ($_args as $__k => $__v) $$__k = $__v
?><td>
<?php if (isset($row->docType)) { ?>
		<?php echo Nette\Templating\Helpers::escapeHtml($row->docType->name, ENT_NOQUOTES) ?>

<?php } ?>
</td>
<?php
}}

//
// block col-statusType
//
if (!function_exists($_l->blocks['col-statusType'][] = '_lb35c73d9d3d_col_statusType')) { function _lb35c73d9d3d_col_statusType($_l, $_args) { foreach ($_args as $__k => $__v) $$__k = $__v
?><td>
<?php if (isset($row->statusType)) { ?>
		<?php echo Nette\Templating\Helpers::escapeHtml($row->statusType->name, ENT_NOQUOTES) ?>

<?php } ?>
</td>
<?php
}}

//
// block col-rdiLink
//
if (!function_exists($_l->blocks['col-rdiLink'][] = '_lbd8de563ae7_col_rdiLink')) { function _lbd8de563ae7_col_rdiLink($_l, $_args) { foreach ($_args as $__k => $__v) $$__k = $__v
?><td>
<?php if (isset($row->rdiLink)) { ?>
		<a href="<?php echo htmlSpecialChars($template->safeurl($row->rdiLink)) ?>">odkaz</a>		
<?php } ?>
</td>
<?php
}}

//
// block col-operator
//
if (!function_exists($_l->blocks['col-operator'][] = '_lbfcdc167b4e_col_operator')) { function _lbfcdc167b4e_col_operator($_l, $_args) { foreach ($_args as $__k => $__v) $$__k = $__v
?><td>
<?php if (isset($row->operator)) { ?>
		<?php echo Nette\Templating\Helpers::escapeHtml($row->operator->name, ENT_NOQUOTES) ?>

<?php } ?>
</td>
<?php
}}

//
// block row-actions
//
if (!function_exists($_l->blocks['row-actions'][] = '_lb892fcd3061_row_actions')) { function _lb892fcd3061_row_actions($_l, $_args) { foreach ($_args as $__k => $__v) $$__k = $__v
;if (($user->isAllowed('Front:Status', 'edit'))) { ?>

	<a href="<?php echo htmlSpecialChars($template->safeurl($_control->link("edit!", array($primary)))) ?>"  class="btn btn-default ajax">Editovat</a>
<?php } 
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











