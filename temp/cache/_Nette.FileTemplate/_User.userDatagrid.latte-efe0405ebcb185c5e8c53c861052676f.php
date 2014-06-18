<?php //netteCache[01]000390a:2:{s:4:"time";s:21:"0.92445700 1391694080";s:9:"callbacks";a:2:{i:0;a:3:{i:0;a:2:{i:0;s:19:"Nette\Caching\Cache";i:1;s:9:"checkFile";}i:1;s:76:"C:\projects\NetBeans\trans\app\AdminModule\templates\User\userDatagrid.latte";i:2;i:1391694079;}i:1;a:3:{i:0;a:2:{i:0;s:19:"Nette\Caching\Cache";i:1;s:10:"checkConst";}i:1;s:25:"Nette\Framework::REVISION";i:2;s:22:"released on 2013-12-31";}}}?><?php

// source file: C:\projects\NetBeans\trans\app\AdminModule\templates\User\userDatagrid.latte

?><?php
// prolog Nette\Latte\Macros\CoreMacros
list($_l, $_g) = Nette\Latte\Macros\CoreMacros::initRuntime($template, 'fyx82r9eye')
;
// prolog Nette\Latte\Macros\UIMacros
//
// block col-username
//
if (!function_exists($_l->blocks['col-username'][] = '_lbc20c26ddd4_col_username')) { function _lbc20c26ddd4_col_username($_l, $_args) { foreach ($_args as $__k => $__v) $$__k = $__v
?><td>
	 


<!--	<a href="<?php echo Nette\Templating\Helpers::escapeHtmlComment($_presenter->link("User:default", array($row->id))) ?>"> -->

		<?php echo Nette\Templating\Helpers::escapeHtml($row->username, ENT_NOQUOTES) ?>

	<!--</a>-->
</td>
<?php
}}

//
// block col-role
//
if (!function_exists($_l->blocks['col-role'][] = '_lb001b9569c9_col_role')) { function _lb001b9569c9_col_role($_l, $_args) { foreach ($_args as $__k => $__v) $$__k = $__v
?><td>	 	
<?php if (isset($row->role)) { ?>
		<?php echo Nette\Templating\Helpers::escapeHtml($row->role->name, ENT_NOQUOTES) ?>

<?php } ?>
</td>
<?php
}}

//
// block row-actions
//
if (!function_exists($_l->blocks['row-actions'][] = '_lb3fdf7ed413_row_actions')) { function _lb3fdf7ed413_row_actions($_l, $_args) { foreach ($_args as $__k => $__v) $$__k = $__v
?>	<a href="<?php echo htmlSpecialChars($template->safeurl($_presenter->link("edit", array($primary)))) ?>"  class="btn btn-default ">Editovat</a>
	<a href="<?php echo htmlSpecialChars($template->safeurl($_presenter->link("changePassword", array($primary)))) ?>"  class="btn btn-default ">Změnit heslo</a>
	<a href="<?php echo htmlSpecialChars($template->safeurl($_presenter->link("delete!", array($primary)))) ?>" data-confirm="Opravdu smazat?" class="btn btn-danger ajax" data-ajax="on">Smazat</a>
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





