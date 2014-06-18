<?php //netteCache[01]000381a:2:{s:4:"time";s:21:"0.58583900 1391601658";s:9:"callbacks";a:2:{i:0;a:3:{i:0;a:2:{i:0;s:19:"Nette\Caching\Cache";i:1;s:9:"checkFile";}i:1;s:67:"C:\projects\NetBeans\trans\app\templates\@bootstrap3.datagrid.latte";i:2;i:1387761472;}i:1;a:3:{i:0;a:2:{i:0;s:19:"Nette\Caching\Cache";i:1;s:10:"checkConst";}i:1;s:25:"Nette\Framework::REVISION";i:2;s:22:"released on 2013-12-31";}}}?><?php

// source file: C:\projects\NetBeans\trans\app\templates\@bootstrap3.datagrid.latte

?><?php
// prolog Nette\Latte\Macros\CoreMacros
list($_l, $_g) = Nette\Latte\Macros\CoreMacros::initRuntime($template, '00pay9zapu')
;
// prolog Nette\Latte\Macros\UIMacros

// snippets support
if (!empty($_control->snippetMode)) {
	return Nette\Latte\Macros\UIMacros::renderSnippets($_control, $_l, get_defined_vars());
}

// prolog Nextras\Latte\Macros\RedefineMacro
//
// block table-open-tag
//
$_block = &$_l->blocks['table-open-tag'];$_block = $_block === NULL ? array() : $_block;array_unshift($_block, '_lbe8b297e447_table_open_tag');if (!function_exists('_lbe8b297e447_table_open_tag')) { function _lbe8b297e447_table_open_tag($_l, $_args) { extract($_args)
?>	<table class="table table-bordered table-condensed table-striped">
<?php
}}

//
// block global-filter-actions
//
$_block = &$_l->blocks['global-filter-actions'];$_block = $_block === NULL ? array() : $_block;array_unshift($_block, '_lbe8ca9d05ca_global_filter_actions');if (!function_exists('_lbe8ca9d05ca_global_filter_actions')) { function _lbe8ca9d05ca_global_filter_actions($_l, $_args) { extract($_args)
?>	<?php echo $_form["filter"]->getControl()->addAttributes(array('class' => "btn btn-primary btn-sm")) ?>

<?php if ($showCancel) { ?>
		<?php echo $_form["cancel"]->getControl()->addAttributes(array('class' => "btn btn-default btn-sm")) ?>

<?php } 
}}

//
// block col-filter
//
$_block = &$_l->blocks['col-filter'];$_block = $_block === NULL ? array() : $_block;array_unshift($_block, '_lbc4b4bc5a42_col_filter');if (!function_exists('_lbc4b4bc5a42_col_filter')) { function _lbc4b4bc5a42_col_filter($_l, $_args) { extract($_args)
;$_input = is_object($column->name) ? $column->name : $_form[$column->name]; echo $_input->getControl()->addAttributes(array('class' => "input-sm")) ;
}}

//
// block row-actions-edit
//
$_block = &$_l->blocks['row-actions-edit'];$_block = $_block === NULL ? array() : $_block;array_unshift($_block, '_lb18a566cc0a_row_actions_edit');if (!function_exists('_lb18a566cc0a_row_actions_edit')) { function _lb18a566cc0a_row_actions_edit($_l, $_args) { extract($_args)
?>	<?php echo $_form["save"]->getControl()->addAttributes(array('class' => "btn btn-primary btn-xs")) ?>

	<?php echo $_form["cancel"]->getControl()->addAttributes(array('class' => "btn btn-default btn-xs")) ?>

<?php
}}

//
// block row-actions-edit-link
//
$_block = &$_l->blocks['row-actions-edit-link'];$_block = $_block === NULL ? array() : $_block;array_unshift($_block, '_lb366b3261c5_row_actions_edit_link');if (!function_exists('_lb366b3261c5_row_actions_edit_link')) { function _lb366b3261c5_row_actions_edit_link($_l, $_args) { extract($_args)
?>	<a href="<?php echo htmlSpecialChars($template->safeurl($_control->link("edit!", array($primary)))) ?>
" data-datagrid-edit class="ajax btn btn-primary btn-xs"><?php echo Nette\Templating\Helpers::escapeHtml($control->translate('Edit'), ENT_NOQUOTES) ?></a>
<?php
}}

//
// block pagination
//
$_block = &$_l->blocks['pagination'];$_block = $_block === NULL ? array() : $_block;array_unshift($_block, '_lb16beca9fc1_pagination');if (!function_exists('_lb16beca9fc1_pagination')) { function _lb16beca9fc1_pagination($_l, $_args) { extract($_args)
?><ul class="pagination">
<?php if ($paginator->isFirst()) { ?>
	<li class="disabled"><a>« <?php echo Nette\Templating\Helpers::escapeHtml($control->translate('First'), ENT_NOQUOTES) ?></a></li>
	<li class="disabled"><a>« <?php echo Nette\Templating\Helpers::escapeHtml($control->translate('Previous'), ENT_NOQUOTES) ?></a></li>
<?php } else { ?>
	<li><a href="<?php echo htmlSpecialChars($template->safeurl($_control->link("paginate!", array('page' => 1)))) ?>
" class="ajax">« <?php echo Nette\Templating\Helpers::escapeHtml($control->translate('First'), ENT_NOQUOTES) ?></a></li>
	<li><a href="<?php echo htmlSpecialChars($template->safeurl($_control->link("paginate!", array('page' => $paginator->page - 1)))) ?>
" class="ajax">« <?php echo Nette\Templating\Helpers::escapeHtml($control->translate('Previous'), ENT_NOQUOTES) ?></a></li>
<?php } ?>

<li class="active">
	<a><strong><?php echo Nette\Templating\Helpers::escapeHtml($paginator->page, ENT_NOQUOTES) ?>
</strong> / <?php echo Nette\Templating\Helpers::escapeHtml($paginator->pageCount, ENT_NOQUOTES) ?></a>
</li>

<?php if ($paginator->isLast()) { ?>
	<li class="disabled"><a><?php echo Nette\Templating\Helpers::escapeHtml($control->translate('Next'), ENT_NOQUOTES) ?> »</a></li>
	<li class="disabled"><a><?php echo Nette\Templating\Helpers::escapeHtml($control->translate('Last'), ENT_NOQUOTES) ?> »</a></li>
<?php } else { ?>
	<li><a href="<?php echo htmlSpecialChars($template->safeurl($_control->link("paginate!", array('page' => $paginator->page + 1)))) ?>
" class="ajax"><?php echo Nette\Templating\Helpers::escapeHtml($control->translate('Next'), ENT_NOQUOTES) ?> »</a></li>
	<li><a href="<?php echo htmlSpecialChars($template->safeurl($_control->link("paginate!", array('page' => $paginator->pageCount)))) ?>
" class="ajax"><?php echo Nette\Templating\Helpers::escapeHtml($control->translate('Last'), ENT_NOQUOTES) ?> »</a></li>
<?php } ?>
</ul>
<?php
}}

//
// end of blocks
//

//
// main template
// ?>





