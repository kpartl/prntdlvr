<?php //netteCache[01]000393a:2:{s:4:"time";s:21:"0.16528700 1403796075";s:9:"callbacks";a:2:{i:0;a:3:{i:0;a:2:{i:0;s:19:"Nette\Caching\Cache";i:1;s:9:"checkFile";}i:1;s:79:"C:\projects\NetBeans\trans\app\FrontModule\templates\SouhrnFaktur\default.latte";i:2;i:1403795926;}i:1;a:3:{i:0;a:2:{i:0;s:19:"Nette\Caching\Cache";i:1;s:10:"checkConst";}i:1;s:25:"Nette\Framework::REVISION";i:2;s:22:"released on 2013-12-31";}}}?><?php

// source file: C:\projects\NetBeans\trans\app\FrontModule\templates\SouhrnFaktur\default.latte

?><?php
// prolog Nette\Latte\Macros\CoreMacros
list($_l, $_g) = Nette\Latte\Macros\CoreMacros::initRuntime($template, 'wo9zrsqdq4')
;
// prolog Nette\Latte\Macros\UIMacros
//
// block content
//
if (!function_exists($_l->blocks['content'][] = '_lbe4a46507ea_content')) { function _lbe4a46507ea_content($_l, $_args) { foreach ($_args as $__k => $__v) $$__k = $__v
;Nette\Latte\Macros\CoreMacros::includeTemplate('../base.latte', $template->getParameters(), $_l->templates['wo9zrsqdq4'])->render() ?>

<?php $iterations = 0; foreach ($flashes as $flash) { ?><div class="flash <?php echo htmlSpecialChars($flash->type) ?>
"><?php echo Nette\Templating\Helpers::escapeHtml($flash->message, ENT_NOQUOTES) ?></div>
<?php $iterations++; } ?>


<div ><h1>Evidence fakturace</h1></div>

<?php Nette\Latte\Macros\FormMacros::renderFormBegin($form = $_form = $_control["datePicker"], array()) ?>
<h4>Rozsah zobrazení</h4>
<h5>od: <?php echo $_form["from"]->getControl() ?></h5>
<h5>do: <?php echo $_form["to"]->getControl() ?></h5>
<?php echo $_form["submittButton"]->getControl()->addAttributes(array('value'=>'Vybrat', 'class'=>'btn btn-success btn-small')) ?>

<?php Nette\Latte\Macros\FormMacros::renderFormEnd($_form) ?>
<br>
<h4>Celkový souhrn</h4>

<?php $_ctrl = $_control->getComponent("fakturyDatagrid"); if ($_ctrl instanceof Nette\Application\UI\IRenderable) $_ctrl->redrawControl(NULL, FALSE); $_ctrl->render() ;
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