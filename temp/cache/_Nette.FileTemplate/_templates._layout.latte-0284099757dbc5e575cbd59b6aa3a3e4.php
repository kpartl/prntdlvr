<?php //netteCache[01]000368a:2:{s:4:"time";s:21:"0.36527600 1390831041";s:9:"callbacks";a:2:{i:0;a:3:{i:0;a:2:{i:0;s:19:"Nette\Caching\Cache";i:1;s:9:"checkFile";}i:1;s:54:"C:\projects\NetBeans\trans\app\templates\@layout.latte";i:2;i:1390830486;}i:1;a:3:{i:0;a:2:{i:0;s:19:"Nette\Caching\Cache";i:1;s:10:"checkConst";}i:1;s:25:"Nette\Framework::REVISION";i:2;s:22:"released on 2013-12-31";}}}?><?php

// source file: C:\projects\NetBeans\trans\app\templates\@layout.latte

?><?php
// prolog Nette\Latte\Macros\CoreMacros
list($_l, $_g) = Nette\Latte\Macros\CoreMacros::initRuntime($template, 'xcwou7d573')
;
// prolog Nette\Latte\Macros\UIMacros
//
// block title
//
if (!function_exists($_l->blocks['title'][] = '_lb47f053737b_title')) { function _lb47f053737b_title($_l, $_args) { foreach ($_args as $__k => $__v) $$__k = $__v
?>Nette Application Skeleton<?php
}}

//
// block head
//
if (!function_exists($_l->blocks['head'][] = '_lb0a58a06e38_head')) { function _lb0a58a06e38_head($_l, $_args) { foreach ($_args as $__k => $__v) $$__k = $__v
;
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
<!DOCTYPE html>
<html>
    <head>
        <meta charset="UTF-8">
        <meta name="description" content="">
<?php if (isset($robots)) { ?>        <meta name="robots" content="<?php echo htmlSpecialChars($robots) ?>">
<?php } ?>

        <title><?php if ($_l->extends) { ob_end_clean(); return Nette\Latte\Macros\CoreMacros::includeTemplate($_l->extends, get_defined_vars(), $template)->render(); }
ob_start(); call_user_func(reset($_l->blocks['title']), $_l, get_defined_vars()); echo $template->upper($template->striptags(ob_get_clean()))  ?></title>

		<link rel="stylesheet" media="print" href="<?php echo htmlSpecialChars($template->safeurl($basePath)) ?>/css/print.css">        
		<link rel="stylesheet" media="screen,projection,tv" href="<?php echo htmlSpecialChars($template->safeurl($basePath)) ?>/css/screen.css">
		<link rel="stylesheet" media="screen,projection,tv" href="<?php echo htmlSpecialChars($template->safeurl($basePath)) ?>/css/bootstrap.min.css">		
		<link rel="stylesheet" media="screen,projection,tv" href="<?php echo htmlSpecialChars($template->safeurl($basePath)) ?>/css/bootstrap3.nextras.datagrid.css">


        <link rel="shortcut icon" href="<?php echo htmlSpecialChars($template->safeurl($basePath)) ?>/favicon.ico">
		<script src="<?php echo htmlSpecialChars($template->safeurl($basePath)) ?>/js/jquery.js"></script>
		<script src="<?php echo htmlSpecialChars($template->safeurl($basePath)) ?>/js/netteForms.js"></script>

		<script src="<?php echo htmlSpecialChars($template->safeurl($basePath)) ?>/js/bootstrap.min.js"></script>
		<script src="<?php echo htmlSpecialChars($template->safeurl($basePath)) ?>/js/main.js"></script>
		<script src="<?php echo htmlSpecialChars($template->safeurl($basePath)) ?>/js/nette.ajax.js"></script>
		<script src="<?php echo htmlSpecialChars($template->safeurl($basePath)) ?>/js/nextras.datagrid.js"></script>

		<!--	<script>$(function() {
				$.nette.init();
					});</script>-->

			<?php call_user_func(reset($_l->blocks['head']), $_l, get_defined_vars())  ?>

    </head>

    <body>	
        <script> document.documentElement.className += ' js'</script>

<?php $iterations = 0; foreach ($flashes as $flash) { ?>        <div class="flash <?php echo htmlSpecialChars($flash->type) ?>
"><?php echo Nette\Templating\Helpers::escapeHtml($flash->message, ENT_NOQUOTES) ?></div>
<?php $iterations++; } ?>

        <div class="container" id="content">
<?php Nette\Latte\Macros\UIMacros::callBlock($_l, 'content', $template->getParameters()) ?>
        </div>

    </body>
</html>
