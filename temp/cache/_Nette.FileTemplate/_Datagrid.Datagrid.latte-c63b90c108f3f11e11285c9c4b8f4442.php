<?php //netteCache[01]000379a:2:{s:4:"time";s:21:"0.54383500 1391601658";s:9:"callbacks";a:2:{i:0;a:3:{i:0;a:2:{i:0;s:19:"Nette\Caching\Cache";i:1;s:9:"checkFile";}i:1;s:65:"C:\projects\NetBeans\trans\vendor\Nextras\Datagrid\Datagrid.latte";i:2;i:1387761472;}i:1;a:3:{i:0;a:2:{i:0;s:19:"Nette\Caching\Cache";i:1;s:10:"checkConst";}i:1;s:25:"Nette\Framework::REVISION";i:2;s:22:"released on 2013-12-31";}}}?><?php

// source file: C:\projects\NetBeans\trans\vendor\Nextras\Datagrid\Datagrid.latte

?><?php
// prolog Nette\Latte\Macros\CoreMacros
list($_l, $_g) = Nette\Latte\Macros\CoreMacros::initRuntime($template, 'bei1wb0mgp')
;
// prolog Nette\Latte\Macros\UIMacros
//
// block _rows
//
if (!function_exists($_l->blocks['_rows'][] = '_lb7ef03544e6__rows')) { function _lb7ef03544e6__rows($_l, $_args) { foreach ($_args as $__k => $__v) $$__k = $__v; $_control->redrawControl('rows', FALSE)
 ?>










<?php $iterations = 0; foreach ($iterator = $_l->its[] = new Nette\Iterators\CachingIterator($cellsTemplates) as $cellsTemplate) { Nette\Latte\Macros\CoreMacros::includeTemplate($cellsTemplate, get_defined_vars(), $_l->templates['bei1wb0mgp'])->render() ;$iterations++; } array_pop($_l->its); $iterator = end($_l->its) ?>

<?php Nette\Latte\Macros\FormMacros::renderFormBegin($form = $_form = $_control["form"], array('class' => 'ajax')) ;$template->hasActionsColumn =
	isset($_l->blocks['row-actions']) ||
	isset($_l->blocks['global-actions']) ||
	isset($_form['filter']) ||
	(bool) $control->getEditFormFactory() ;call_user_func(reset($_l->blocks['table-open-tag']), $_l, get_defined_vars()) ?>
	<thead>
<?php call_user_func(reset($_l->blocks['row-head-colums']), $_l, get_defined_vars()) ;if (isset($_form['filter'])) { call_user_func(reset($_l->blocks['row-head-filter']), $_l, get_defined_vars()) ;} ?>
	</thead>
	<tbody>
<?php $template->form = $_form ;$_dynSnippets = new ArrayObject() ;$iterations = 0; foreach ($iterator = $_l->its[] = new Nette\Iterators\CachingIterator($data) as $row) { $template->row = $row ;call_user_func(reset($_l->blocks['row']), $_l, array('row' => $row, 'primary' => $control->getter($row, $rowPrimaryKey), '_dynSnippets' => & $_dynSnippets) + get_defined_vars()) ;$iterations++; } array_pop($_l->its); $iterator = end($_l->its) ;if (isset($echoSnippets)) { unset($_dynSnippets) ;} else { $_dynSnippets = iterator_to_array($_dynSnippets) ;} ?>
	</tbody>
	<tfoot>
<?php if (isset($paginator)) { ?>
		<tr>
			<th colspan="<?php echo htmlSpecialChars(count($columns) + $template->hasActionsColumn) ?>">
<?php call_user_func(reset($_l->blocks['pagination']), $_l, get_defined_vars()) ?>
			</th>
		</tr>
<?php } ?>
	</tfoot>
<?php call_user_func(reset($_l->blocks['table-close-tag']), $_l, get_defined_vars()) ;Nette\Latte\Macros\FormMacros::renderFormEnd($_form) ;if (isset($_dynSnippets)) return $_dynSnippets; 
}}

//
// block table-open-tag
//
if (!function_exists($_l->blocks['table-open-tag'][] = '_lb4c15a6ce7d_table_open_tag')) { function _lb4c15a6ce7d_table_open_tag($_l, $_args) { foreach ($_args as $__k => $__v) $$__k = $__v
?>	<table>
<?php
}}

//
// block table-close-tag
//
if (!function_exists($_l->blocks['table-close-tag'][] = '_lbf7e66801ca_table_close_tag')) { function _lbf7e66801ca_table_close_tag($_l, $_args) { foreach ($_args as $__k => $__v) $$__k = $__v
?>	</table>
<?php
}}

//
// block global-filter-actions
//
if (!function_exists($_l->blocks['global-filter-actions'][] = '_lb6dc8f7e91d_global_filter_actions')) { function _lb6dc8f7e91d_global_filter_actions($_l, $_args) { foreach ($_args as $__k => $__v) $$__k = $__v
?>	<?php echo $_form["filter"]->getControl() ?>

<?php if ($showCancel) { ?>
		<?php echo $_form["cancel"]->getControl() ?>

<?php } 
}}

//
// block row-head-colums
//
if (!function_exists($_l->blocks['row-head-colums'][] = '_lba3c77c1a0b_row_head_colums')) { function _lba3c77c1a0b_row_head_colums($_l, $_args) { foreach ($_args as $__k => $__v) $$__k = $__v
?>	<tr class="grid-columns">
<?php $iterations = 0; foreach ($columns as $column) { ?>
			<th class="grid-col-<?php echo htmlSpecialChars($column->name) ?>">
<?php if ($column->canSort()) { ?>
					<a href="<?php echo htmlSpecialChars($template->safeurl($_control->link("sort!", array('orderColumn' => $column->getNewState() ? $column->name : NULL, 'orderType' => $column->getNewState())))) ?>
" class="ajax"><?php echo Nette\Templating\Helpers::escapeHtml($column->label, ENT_NOQUOTES) ?></a>
<?php if ($column->isAsc()) { ?>
						<span class="grid-sort-symbol"><em>&#9650;</em></span>
<?php } elseif ($column->isDesc()) { ?>
						<span class="grid-sort-symbol"><em>&#9660;</em></span>
<?php } } else { ?>
					<?php echo Nette\Templating\Helpers::escapeHtml($column->label, ENT_NOQUOTES) ?>

<?php } ?>
			</th>
<?php $iterations++; } if ($template->hasActionsColumn) { ?>
			<th class="grid-col-actions"><?php if (isset($_l->blocks["global-actions"])) { Nette\Latte\Macros\UIMacros::callBlock($_l, 'global-actions', $template->getParameters()) ;} ?></th>
<?php } ?>
	</tr>
<?php
}}

//
// block col-filter
//
if (!function_exists($_l->blocks['col-filter'][] = '_lb18d4ad065e_col_filter')) { function _lb18d4ad065e_col_filter($_l, $_args) { foreach ($_args as $__k => $__v) $$__k = $__v
;$_input = is_object($column->name) ? $column->name : $_form[$column->name]; echo $_input->getControl() ;
}}

//
// block row-head-filter
//
if (!function_exists($_l->blocks['row-head-filter'][] = '_lbe601620db3_row_head_filter')) { function _lbe601620db3_row_head_filter($_l, $_args) { foreach ($_args as $__k => $__v) $$__k = $__v
?>	<tr class="grid-filters">
<?php $_formStack[] = $_form; $formContainer = $_form = $_form["filter"] ;$iterations = 0; foreach ($iterator = $_l->its[] = new Nette\Iterators\CachingIterator($columns) as $column) { ?>
			<th class="grid-col-<?php echo htmlSpecialChars($column->name) ?>">
<?php if (isset($_form[$column->name])) { if (isset($_l->blocks["col-filter-{$column->name}"])) { Nette\Latte\Macros\UIMacros::callBlock($_l, "col-filter-{$column->name}", array('form' => $_form, '_form' => $_form, 'column' => $column) + $template->getParameters()) ;} else { call_user_func(reset($_l->blocks['col-filter']), $_l, array('form' => $_form, '_form' => $_form, 'column' => $column) + get_defined_vars()) ;} } ?>
			</th>
<?php $iterations++; } array_pop($_l->its); $iterator = end($_l->its) ?>
		<th class="grid-col-actions">
<?php call_user_func(reset($_l->blocks['global-filter-actions']), $_l, array('showCancel' => !empty($control->filter), '_form' => $_form, 'form' => $form) + get_defined_vars()) ?>
		</th>
<?php $_form = array_pop($_formStack) ?>
	</tr>
<?php
}}

//
// block row-actions-edit
//
if (!function_exists($_l->blocks['row-actions-edit'][] = '_lb8e7fbea74b_row_actions_edit')) { function _lb8e7fbea74b_row_actions_edit($_l, $_args) { foreach ($_args as $__k => $__v) $$__k = $__v
?>	<?php echo $_form["save"]->getControl() ?>

	<?php echo $_form["cancel"]->getControl() ?>

<?php
}}

//
// block row
//
if (!function_exists($_l->blocks['row'][] = '_lbf3501bc9a1_row')) { function _lbf3501bc9a1_row($_l, $_args) { foreach ($_args as $__k => $__v) $$__k = $__v
?>	<tr<?php echo ' id="' . ($_dynSnippetId = $_control->getSnippetId("rows-$primary")) . '"' ?>>
<?php ob_start() ;Nette\Latte\Macros\UIMacros::callBlock($_l, 'row-inner', $template->getParameters()) ;$_dynSnippets[$_dynSnippetId] = ob_get_flush() ?>	</tr>
<?php
}}

//
// block row-actions-edit-link
//
if (!function_exists($_l->blocks['row-actions-edit-link'][] = '_lbef6ae97083_row_actions_edit_link')) { function _lbef6ae97083_row_actions_edit_link($_l, $_args) { foreach ($_args as $__k => $__v) $$__k = $__v
?>	<a href="<?php echo htmlSpecialChars($template->safeurl($_control->link("edit!", array($primary)))) ?>
" class="ajax" data-datagrid-edit><?php echo Nette\Templating\Helpers::escapeHtml($control->translate('Edit'), ENT_NOQUOTES) ?></a>
<?php
}}

//
// block row-inner
//
if (!function_exists($_l->blocks['row-inner'][] = '_lb3d080151a4_row_inner')) { function _lb3d080151a4_row_inner($_l, $_args) { foreach ($_args as $__k => $__v) $$__k = $__v
;$row = $template->row ;$_form = $template->form ;$primary = $control->getter($row, $rowPrimaryKey) ;$editRow = $editRowKey == $primary ;$iterations = 0; foreach ($iterator = $_l->its[] = new Nette\Iterators\CachingIterator($columns) as $column) { $cell = $control->getter($row, $column->name, FALSE) ;if ($editRow && $column->name != $rowPrimaryKey && isset($_form['edit'][$column->name])) { ?>
			<td class="grid-col-<?php echo htmlSpecialChars($column->name) ?>">
<?php $_formStack[] = $_form; $formContainer = $_form = $_form["edit"] ;$_input = is_object($column->name) ? $column->name : $_form[$column->name]; echo $_input->getControl() ;if ($_form[$column->name]->hasErrors()) { $iterations = 0; foreach ($_form[$column->name]->getErrors() as $error) { ?>
						<p class="error"><?php echo Nette\Templating\Helpers::escapeHtml($error, ENT_NOQUOTES) ?></p>
<?php $iterations++; } } $_form = array_pop($_formStack) ?>
			</td>
<?php } else { if (isset($_l->blocks["col-$column->name"])) { Nette\Latte\Macros\UIMacros::callBlock($_l, "col-{$column->name}", array('row' => $row, 'cell' => $cell, 'iterator' => $iterator) + $template->getParameters()) ;} else { ?>
				<td class="grid-col-<?php echo htmlSpecialChars($column->name) ?>">
<?php if (isset($_l->blocks["cell-$column->name"])) { Nette\Latte\Macros\UIMacros::callBlock($_l, "cell-{$column->name}", array('row' => $row, 'cell' => $cell, 'iterator' => $iterator) + $template->getParameters()) ;} else { ?>
						<?php echo Nette\Templating\Helpers::escapeHtml($cell, ENT_NOQUOTES) ?>

<?php } ?>
				</td>
<?php } } $iterations++; } array_pop($_l->its); $iterator = end($_l->its) ;if ($template->hasActionsColumn) { ?>
	<td class="grid-col-actions">
<?php if ($editRow) { $_formStack[] = $_form; $formContainer = $_form = $_form["edit"] ;$_input = is_object($rowPrimaryKey) ? $rowPrimaryKey : $_form[$rowPrimaryKey]; echo $_input->getControl()->addAttributes(array('class' => 'grid-primary-value')) ;call_user_func(reset($_l->blocks['row-actions-edit']), $_l, array('_form' => $_form, 'form' => $form) + get_defined_vars()) ;$_form = array_pop($_formStack) ;} else { if (isset($_l->blocks["row-actions"])) { Nette\Latte\Macros\UIMacros::callBlock($_l, 'row-actions', array('row' => $row, 'primary' => $primary) + $template->getParameters()) ;} elseif ($control->getEditFormFactory()) { call_user_func(reset($_l->blocks['row-actions-edit-link']), $_l, array('row' => $row, 'primary' => $primary) + get_defined_vars()) ;} } ?>
	</td>
<?php } 
}}

//
// block pagination
//
if (!function_exists($_l->blocks['pagination'][] = '_lba5077a7718_pagination')) { function _lba5077a7718_pagination($_l, $_args) { foreach ($_args as $__k => $__v) $$__k = $__v
?>	<div class="grid-paginator">
<?php if ($paginator->isFirst()) { ?>
			<span>« <?php echo Nette\Templating\Helpers::escapeHtml($control->translate('First'), ENT_NOQUOTES) ?></span>
			<span>« <?php echo Nette\Templating\Helpers::escapeHtml($control->translate('Previous'), ENT_NOQUOTES) ?></span>
<?php } else { ?>
			<a href="<?php echo htmlSpecialChars($template->safeurl($_control->link("paginate!", array('page' => 1)))) ?>
" class="ajax">« <?php echo Nette\Templating\Helpers::escapeHtml($control->translate('First'), ENT_NOQUOTES) ?></a>
			<a href="<?php echo htmlSpecialChars($template->safeurl($_control->link("paginate!", array('page' => $paginator->page - 1)))) ?>
" class="ajax">« <?php echo Nette\Templating\Helpers::escapeHtml($control->translate('Previous'), ENT_NOQUOTES) ?></a>
<?php } ?>

		<span>
			<span><?php echo Nette\Templating\Helpers::escapeHtml($paginator->page, ENT_NOQUOTES) ?>
</span> / <span><?php echo Nette\Templating\Helpers::escapeHtml($paginator->pageCount, ENT_NOQUOTES) ?></span>
		</span>

<?php if ($paginator->isLast()) { ?>
			<span><?php echo Nette\Templating\Helpers::escapeHtml($control->translate('Next'), ENT_NOQUOTES) ?> »</span>
			<span><?php echo Nette\Templating\Helpers::escapeHtml($control->translate('Last'), ENT_NOQUOTES) ?> »</span>
<?php } else { ?>
			<a href="<?php echo htmlSpecialChars($template->safeurl($_control->link("paginate!", array('page' => $paginator->page + 1)))) ?>
" class="ajax"><?php echo Nette\Templating\Helpers::escapeHtml($control->translate('Next'), ENT_NOQUOTES) ?> »</a>
			<a href="<?php echo htmlSpecialChars($template->safeurl($_control->link("paginate!", array('page' => $paginator->pageCount)))) ?>
" class="ajax"><?php echo Nette\Templating\Helpers::escapeHtml($control->translate('Last'), ENT_NOQUOTES) ?> »</a>
<?php } ?>
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
?>
<div class="grid" data-grid-name="<?php echo htmlSpecialChars($control->getUniqueId()) ?>">

<?php if ($_l->extends) { ob_end_clean(); return Nette\Latte\Macros\CoreMacros::includeTemplate($_l->extends, get_defined_vars(), $template)->render(); } ?>
<div id="<?php echo $_control->getSnippetId('rows') ?>"><?php call_user_func(reset($_l->blocks['_rows']), $_l, $template->getParameters()) ?>
</div></div>
