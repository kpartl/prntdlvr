<?php //netteCache[01]000368a:2:{s:4:"time";s:21:"0.30211100 1391601651";s:9:"callbacks";a:2:{i:0;a:3:{i:0;a:2:{i:0;s:19:"Nette\Caching\Cache";i:1;s:9:"checkFile";}i:1;s:54:"C:\projects\NetBeans\trans\app\templates\Sign\in.latte";i:2;i:1391114048;}i:1;a:3:{i:0;a:2:{i:0;s:19:"Nette\Caching\Cache";i:1;s:10:"checkConst";}i:1;s:25:"Nette\Framework::REVISION";i:2;s:22:"released on 2013-12-31";}}}?><?php

// source file: C:\projects\NetBeans\trans\app\templates\Sign\in.latte

?><?php
// prolog Nette\Latte\Macros\CoreMacros
list($_l, $_g) = Nette\Latte\Macros\CoreMacros::initRuntime($template, 'fgavy1fyj2')
;
// prolog Nette\Latte\Macros\UIMacros
//
// block content
//
if (!function_exists($_l->blocks['content'][] = '_lb03926718cc_content')) { function _lb03926718cc_content($_l, $_args) { foreach ($_args as $__k => $__v) $$__k = $__v
;call_user_func(reset($_l->blocks['title']), $_l, get_defined_vars())  ?>

<div class="row-fluid">
	<div class="span5">
<?php $_ctrl = $_control->getComponent("signInForm"); if ($_ctrl instanceof Nette\Application\UI\IRenderable) $_ctrl->redrawControl(NULL, FALSE); $_ctrl->render() ?>
	</div>
</div><?php
}}

//
// block title
//
if (!function_exists($_l->blocks['title'][] = '_lb16dc6b63b1_title')) { function _lb16dc6b63b1_title($_l, $_args) { foreach ($_args as $__k => $__v) $$__k = $__v
?><h1>Přihlášení</h1>
<?php
}}

//
// end of blocks
//

// template extending and snippets support

$_l->extends = '..\@layout.latte'; $template->_extended = $_extended = TRUE;


if ($_l->extends) {
	ob_start();

} elseif (!empty($_control->snippetMode)) {
	return Nette\Latte\Macros\UIMacros::renderSnippets($_control, $_l, get_defined_vars());
}

//
// main template
// ?>

<?php if ($_l->extends) { ob_end_clean(); return Nette\Latte\Macros\CoreMacros::includeTemplate($_l->extends, get_defined_vars(), $template)->render(); }
call_user_func(reset($_l->blocks['content']), $_l, get_defined_vars()) ; 