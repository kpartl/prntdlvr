<?php //netteCache[01]000385a:2:{s:4:"time";s:21:"0.08224400 1391683574";s:9:"callbacks";a:2:{i:0;a:3:{i:0;a:2:{i:0;s:19:"Nette\Caching\Cache";i:1;s:9:"checkFile";}i:1;s:71:"C:\projects\NetBeans\trans\app\AdminModule\templates\User\default.latte";i:2;i:1391683572;}i:1;a:3:{i:0;a:2:{i:0;s:19:"Nette\Caching\Cache";i:1;s:10:"checkConst";}i:1;s:25:"Nette\Framework::REVISION";i:2;s:22:"released on 2013-12-31";}}}?><?php

// source file: C:\projects\NetBeans\trans\app\AdminModule\templates\User\default.latte

?><?php
// prolog Nette\Latte\Macros\CoreMacros
list($_l, $_g) = Nette\Latte\Macros\CoreMacros::initRuntime($template, '4ez90g5d93')
;
// prolog Nette\Latte\Macros\UIMacros
//
// block content
//
if (!function_exists($_l->blocks['content'][] = '_lb1f661bc513_content')) { function _lb1f661bc513_content($_l, $_args) { foreach ($_args as $__k => $__v) $$__k = $__v
?><style>.table{
		max-width: 500px;
	}
</style>


<?php call_user_func(reset($_l->blocks['title']), $_l, get_defined_vars())  ?>



<?php $_ctrl = $_control->getComponent("userDatagrid"); if ($_ctrl instanceof Nette\Application\UI\IRenderable) $_ctrl->redrawControl(NULL, FALSE); $_ctrl->render() ?>

<a href="<?php echo htmlSpecialChars($template->safeurl($_presenter->link("User:add"))) ?>" class="btn btn-small btn-success">Nový uživatel</a>


<?php
}}

//
// block title
//
if (!function_exists($_l->blocks['title'][] = '_lb36fbf19300_title')) { function _lb36fbf19300_title($_l, $_args) { foreach ($_args as $__k => $__v) $$__k = $__v
?><h1>Uživatelé</h1>
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

<?php if ($_l->extends) { ob_end_clean(); return Nette\Latte\Macros\CoreMacros::includeTemplate($_l->extends, get_defined_vars(), $template)->render(); }
call_user_func(reset($_l->blocks['content']), $_l, get_defined_vars()) ; 