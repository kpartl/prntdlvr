<?php //netteCache[01]000377a:2:{s:4:"time";s:21:"0.32448000 1403684831";s:9:"callbacks";a:2:{i:0;a:3:{i:0;a:2:{i:0;s:19:"Nette\Caching\Cache";i:1;s:9:"checkFile";}i:1;s:63:"C:\projects\NetBeans\trans\app\FrontModule\templates\base.latte";i:2;i:1403684826;}i:1;a:3:{i:0;a:2:{i:0;s:19:"Nette\Caching\Cache";i:1;s:10:"checkConst";}i:1;s:25:"Nette\Framework::REVISION";i:2;s:22:"released on 2013-12-31";}}}?><?php

// source file: C:\projects\NetBeans\trans\app\FrontModule\templates\base.latte

?><?php
// prolog Nette\Latte\Macros\CoreMacros
list($_l, $_g) = Nette\Latte\Macros\CoreMacros::initRuntime($template, 'padbzrf6zc')
;
// prolog Nette\Latte\Macros\UIMacros

// snippets support
if (!empty($_control->snippetMode)) {
	return Nette\Latte\Macros\UIMacros::renderSnippets($_control, $_l, get_defined_vars());
}

//
// main template
//
?>

<div class='navbar navbar-default navbar-fixed-top' role='navigation'>
	<div class="container-fluid">
		<div class="navbar-header">
			<button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".navbar-collapse">
				<span class="sr-only">Naviguj</span>
				<span class ="icon-bar"></span>
				<span class ="icon-bar"></span>
				<span class ="icon-bar"></span>
			</button>
			<span class="navbar-brand">Print Portal</span>
		</div>

		<div class='navbar-collapse collapse'>

			<ul class='nav navbar-nav navbar-right'>
				<li>
					<a class='navbar-brand' href=<?php echo '"' . htmlSpecialChars($template->safeurl($_control->link(":Front:Status:default"))) . '"' ?>>Seznam spoolů</a>
				</li>
				<li>
					<a class='navbar-brand' href=<?php echo '"' . htmlSpecialChars($template->safeurl($_control->link(":Front:Banner:default"))) . '"' ?>>Evidence Bannerů</a>
				</li>
<?php if ($user->isInRole('admin')) { ?>
					<li>
						<a class='navbar-brand' href=<?php echo '"' . htmlSpecialChars($template->safeurl($_presenter->link(":Admin:AdminPage:default"))) . '"' ?>>Administrace</a>
					</li>
<?php } ?>
				<li>
					<label class='navbar-brand'>Přihlášen uživatel <?php echo Nette\Templating\Helpers::escapeHtml($user->id, ENT_NOQUOTES) ?></label>
				</li>
				<li>
					<a class='navbar-brand' href=<?php echo '"' . htmlSpecialChars($template->safeurl($_presenter->link(":Auth:Sign:out"))) . '"' ?>>Odhlásit</a>
				</li>		
			</ul>
		</div>
	</div>
</div>

