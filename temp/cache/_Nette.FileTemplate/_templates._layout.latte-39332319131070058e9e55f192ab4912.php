<?php //netteCache[01]000380a:2:{s:4:"time";s:21:"0.70387000 1403006813";s:9:"callbacks";a:2:{i:0;a:3:{i:0;a:2:{i:0;s:19:"Nette\Caching\Cache";i:1;s:9:"checkFile";}i:1;s:66:"C:\projects\NetBeans\trans\app\AdminModule\templates\@layout.latte";i:2;i:1403006565;}i:1;a:3:{i:0;a:2:{i:0;s:19:"Nette\Caching\Cache";i:1;s:10:"checkConst";}i:1;s:25:"Nette\Framework::REVISION";i:2;s:22:"released on 2013-12-31";}}}?><?php

// source file: C:\projects\NetBeans\trans\app\AdminModule\templates\@layout.latte

?><?php
// prolog Nette\Latte\Macros\CoreMacros
list($_l, $_g) = Nette\Latte\Macros\CoreMacros::initRuntime($template, 'ewm9019vo9')
;
// prolog Nette\Latte\Macros\UIMacros
//
// block title
//
if (!function_exists($_l->blocks['title'][] = '_lbda39193b75_title')) { function _lbda39193b75_title($_l, $_args) { foreach ($_args as $__k => $__v) $$__k = $__v
?>Print Portal<?php
}}

//
// block head
//
if (!function_exists($_l->blocks['head'][] = '_lb999c65867c_head')) { function _lb999c65867c_head($_l, $_args) { foreach ($_args as $__k => $__v) $$__k = $__v
;
}}

//
// block _flashes
//
if (!function_exists($_l->blocks['_flashes'][] = '_lbd7b86cdbaa__flashes')) { function _lbd7b86cdbaa__flashes($_l, $_args) { foreach ($_args as $__k => $__v) $$__k = $__v; $_control->redrawControl('flashes', FALSE)
;$iterations = 0; foreach ($flashes as $flash) { ?>						<div class="flash <?php echo htmlSpecialChars($flash->type) ?>
"><?php echo Nette\Templating\Helpers::escapeHtml($flash->message, ENT_NOQUOTES) ?></div>
<?php $iterations++; } 
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

        <title><?php if ($_l->extends) { ob_end_clean(); return Nette\Latte\Macros\CoreMacros::includeTemplate($_l->extends, get_defined_vars(), $template)->render(); }
ob_start(); call_user_func(reset($_l->blocks['title']), $_l, get_defined_vars()); echo $template->upper($template->striptags(ob_get_clean()))  ?></title>


		<link rel="stylesheet" media="screen,projection,tv" href="<?php echo htmlSpecialChars($template->safeurl($basePath)) ?>/css/bootstrap.min.css">		
		<link rel="stylesheet" media="screen,projection,tv" href="<?php echo htmlSpecialChars($template->safeurl($basePath)) ?>/css/bootstrap3.nextras.datagrid.css">
		<link rel="stylesheet" media="print" href="<?php echo htmlSpecialChars($template->safeurl($basePath)) ?>/css/print.css">        
		<link rel="stylesheet" media="screen,projection,tv" href="<?php echo htmlSpecialChars($template->safeurl($basePath)) ?>/css/screen.css">


        <link rel="shortcut icon" href="<?php echo htmlSpecialChars($template->safeurl($basePath)) ?>/favicon.ico">

		<script src="<?php echo htmlSpecialChars($template->safeurl($basePath)) ?>/js/jquery.js"></script>
		<script src="<?php echo htmlSpecialChars($template->safeurl($basePath)) ?>/js/netteForms.js"></script>

		<script src="<?php echo htmlSpecialChars($template->safeurl($basePath)) ?>/js/bootstrap.min.js"></script>
		<script src="<?php echo htmlSpecialChars($template->safeurl($basePath)) ?>/js/main.js"></script>
		<script src="<?php echo htmlSpecialChars($template->safeurl($basePath)) ?>/js/nette.ajax.js"></script>
		<script src="<?php echo htmlSpecialChars($template->safeurl($basePath)) ?>/js/confirm.ajax.js"></script>
		<script src="<?php echo htmlSpecialChars($template->safeurl($basePath)) ?>/js/nextras.datagrid.js"></script>



		<!--		<script>$(function() {
						$.nette.init();
							});
		</script>-->

		<?php call_user_func(reset($_l->blocks['head']), $_l, get_defined_vars())  ?>

    </head>
	<body>
		<div class='navbar navbar-inverse navbar-fixed-top' role='navigation'>
			<div class="container-fluid">	
				<div class="navbar-header">
					<button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".navbar-collapse">
						<span class="sr-only">Naviguj</span>
						<span class ="icon-bar"></span>
						<span class ="icon-bar"></span>
						<span class ="icon-bar"></span>
					</button>
					<span class="navbar-brand">Administrace</span>					
				</div>

				<div class='navbar-collapse collapse'>

					<ul class='nav navbar-nav navbar-right'>
						<li>
							<a class='navbar-brand' href=<?php echo '"' . htmlSpecialChars($template->safeurl($_control->link(":Front:Status:default"))) . '"' ?>>Seznam spoolů</a>
						</li>
						<li >
							<label class='navbar-brand'>Přihlášen uživatel <?php echo Nette\Templating\Helpers::escapeHtml($user->id, ENT_NOQUOTES) ?></label>
						</li>
						<li>
							<a class='navbar-brand' href=<?php echo '"' . htmlSpecialChars($template->safeurl($_control->link(":Auth:Sign:out"))) . '"' ?>>Odhlásit</a>
						</li>		
					</ul>
				</div>

			</div>
		</div>

		<div class="container-fluid">
			<div class="row">
				<div class="col-md-2 sidebar">
					<ul class="nav nav-sidebar">
						<li class="active">					
							<a href="<?php echo htmlSpecialChars($template->safeurl($_presenter->link("User:default"))) ?>">Uživatelé</a>
						</li>
						<li class="active">
							<a href="<?php echo htmlSpecialChars($template->safeurl($_presenter->link("Company:default"))) ?>">Společnosti</a>
						</li>						
					</ul>
				</div>
				<div class=" col-md-10 main">
<div id="<?php echo $_control->getSnippetId('flashes') ?>"><?php call_user_func(reset($_l->blocks['_flashes']), $_l, $template->getParameters()) ?>
</div><?php Nette\Latte\Macros\UIMacros::callBlock($_l, 'content', $template->getParameters()) ?>
				</div>

			</div>
		</div>
	</body>
</html>


<!--<div class='navbar navbar-inverse navbar-fixed-top' role='navigation'>
	<div class="container-fluid">
		<div class="navbar-header">
			<button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".navbar-collapse">
				<span class="sr-only">Naviguj</span>
				<span class ="icon-bar"></span>
				<span class ="icon-bar"></span>
				<span class ="icon-bar"></span>
			</button>
			<span class="navbar-brand">Administrace</span>
		</div>

		<div class='navbar-collapse collapse'>

			<ul class='nav navbar-nav navbar-right'>
				<li >
					<label class='navbar-brand'>Přihlášen uživatel <?php echo Nette\Templating\Helpers::escapeHtmlComment($user->id) ?></label>
				</li>
				<li>
					<a class='navbar-brand' href=<?php echo Nette\Templating\Helpers::escapeHtmlComment($_control->link(":Auth:Sign:out")) ?>>Odhlásit</a>
				</li>		
			</ul>
		</div>
	</div>
</div>-->