<?php //netteCache[01]000401a:2:{s:4:"time";s:21:"0.61284200 1391601658";s:9:"callbacks";a:2:{i:0;a:3:{i:0;a:2:{i:0;s:19:"Nette\Caching\Cache";i:1;s:9:"checkFile";}i:1;s:87:"C:\projects\NetBeans\trans\app\templates\@bootstrap3.extended-pagination.datagrid.latte";i:2;i:1390215926;}i:1;a:3:{i:0;a:2:{i:0;s:19:"Nette\Caching\Cache";i:1;s:10:"checkConst";}i:1;s:25:"Nette\Framework::REVISION";i:2;s:22:"released on 2013-12-31";}}}?><?php

// source file: C:\projects\NetBeans\trans\app\templates\@bootstrap3.extended-pagination.datagrid.latte

?><?php
// prolog Nette\Latte\Macros\CoreMacros
list($_l, $_g) = Nette\Latte\Macros\CoreMacros::initRuntime($template, 'ts7qqw2jap')
;
// prolog Nette\Latte\Macros\UIMacros
//
// block pagination
//
if (!function_exists($_l->blocks['pagination'][] = '_lba0da894e03_pagination')) { function _lba0da894e03_pagination($_l, $_args) { foreach ($_args as $__k => $__v) $$__k = $__v
;
	$page = $paginator->getPage();
	if ($paginator->pageCount < 2) {
		$steps = array($page);
	} else {
		$arr = range(max($paginator->firstPage, $page - 3), min($paginator->lastPage, $page + 3));
		$count = 4;
		$quotient = ($paginator->pageCount - 1) / $count;
		for ($i = 0; $i <= $count; $i++) {
			$arr[] = round($quotient * $i) + $paginator->firstPage;
		}
		sort($arr);
		$steps = array_values(array_unique($arr));
	}
?>
<ul class="pagination">
<?php if ($paginator->isFirst()) { ?>
	<li class="disabled"><a>« <?php echo Nette\Templating\Helpers::escapeHtml($control->translate('Previous'), ENT_NOQUOTES) ?></a></li>
<?php } else { ?>
	<li><a href="<?php echo htmlSpecialChars($template->safeurl($_control->link("paginate!", array('page' => $paginator->page - 1)))) ?>
" rel="prev" class="ajax">« <?php echo Nette\Templating\Helpers::escapeHtml($control->translate('Previous'), ENT_NOQUOTES) ?></a><li>
<?php } ?>

<?php $iterations = 0; foreach ($iterator = $_l->its[] = new Nette\Iterators\CachingIterator($steps) as $step) { if ($step == $paginator->page) { ?>
	<li class="active"><a href=""><?php echo Nette\Templating\Helpers::escapeHtml($step, ENT_NOQUOTES) ?></a></li>
<?php } else { ?>
	<li><a href="<?php echo htmlSpecialChars($template->safeurl($_control->link("paginate!", array('page' => $step)))) ?>
" class="ajax"><?php echo Nette\Templating\Helpers::escapeHtml($step, ENT_NOQUOTES) ?></a></li>
<?php } if ($iterator->nextValue > $step + 1) { ?><li class="disabled"><a>…</a></li><?php } ?>

<?php $iterations++; } array_pop($_l->its); $iterator = end($_l->its) ?>

<?php if ($paginator->isLast()) { ?>
	<li class="disabled"><a ><?php echo Nette\Templating\Helpers::escapeHtml($control->translate('Next'), ENT_NOQUOTES) ?> »</a></li>
<?php } else { ?>
	<li><a href="<?php echo htmlSpecialChars($template->safeurl($_control->link("paginate!", array('page' => $paginator->page + 1)))) ?>
" rel="next" class="ajax"><?php echo Nette\Templating\Helpers::escapeHtml($control->translate('Next'), ENT_NOQUOTES) ?> »</a></li>
<?php } ?>
</ul>
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

// prolog Nextras\Latte\Macros\RedefineMacro
//
// block table-open-tag
//
$_block = &$_l->blocks['table-open-tag'];$_block = $_block === NULL ? array() : $_block;array_unshift($_block, '_lbe7c11ff0da_table_open_tag');if (!function_exists('_lbe7c11ff0da_table_open_tag')) { function _lbe7c11ff0da_table_open_tag($_l, $_args) { extract($_args)
?>	<table class="table table-bordered table-condensed table-striped">
<?php
}}

//
// block global-filter-actions
//
$_block = &$_l->blocks['global-filter-actions'];$_block = $_block === NULL ? array() : $_block;array_unshift($_block, '_lbdf403df4a4_global_filter_actions');if (!function_exists('_lbdf403df4a4_global_filter_actions')) { function _lbdf403df4a4_global_filter_actions($_l, $_args) { extract($_args)
?>	<?php echo $_form["filter"]->getControl()->addAttributes(array('class' => "btn btn-primary btn-sm")) ?>

<?php if ($showCancel) { ?>
		<?php echo $_form["cancel"]->getControl()->addAttributes(array('class' => "btn btn-default btn-sm")) ?>

<?php } 
}}

//
// block col-filter
//
$_block = &$_l->blocks['col-filter'];$_block = $_block === NULL ? array() : $_block;array_unshift($_block, '_lb3f9a348a74_col_filter');if (!function_exists('_lb3f9a348a74_col_filter')) { function _lb3f9a348a74_col_filter($_l, $_args) { extract($_args)
;$_input = is_object($column->name) ? $column->name : $_form[$column->name]; echo $_input->getControl()->addAttributes(array('class' => "input-sm")) ;
}}

//
// block row-actions-edit
//
$_block = &$_l->blocks['row-actions-edit'];$_block = $_block === NULL ? array() : $_block;array_unshift($_block, '_lb35393fde32_row_actions_edit');if (!function_exists('_lb35393fde32_row_actions_edit')) { function _lb35393fde32_row_actions_edit($_l, $_args) { extract($_args)
?>	<?php echo $_form["save"]->getControl()->addAttributes(array('class' => "btn btn-primary btn-xs")) ?>

	<?php echo $_form["cancel"]->getControl()->addAttributes(array('class' => "btn btn-default btn-xs")) ?>

<?php
}}

//
// block row-actions-edit-link
//
$_block = &$_l->blocks['row-actions-edit-link'];$_block = $_block === NULL ? array() : $_block;array_unshift($_block, '_lb41013aab0d_row_actions_edit_link');if (!function_exists('_lb41013aab0d_row_actions_edit_link')) { function _lb41013aab0d_row_actions_edit_link($_l, $_args) { extract($_args)
?>	<a href="<?php echo htmlSpecialChars($template->safeurl($_control->link("edit!", array($primary)))) ?>
" data-datagrid-edit class="ajax btn btn-primary btn-xs"><?php echo Nette\Templating\Helpers::escapeHtml($control->translate('Edit'), ENT_NOQUOTES) ?></a>
<?php
}}

//
// block pagination
//
$_block = &$_l->blocks['pagination'];$_block = $_block === NULL ? array() : $_block;array_unshift($_block, '_lba0da894e03_pagination');if (!function_exists('_lba0da894e03_pagination')) { function _lba0da894e03_pagination($_l, $_args) { extract($_args)
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
//
if ($_l->extends) { ob_end_clean(); return Nette\Latte\Macros\CoreMacros::includeTemplate($_l->extends, get_defined_vars(), $template)->render(); }
  