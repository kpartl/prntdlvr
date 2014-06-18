<?php //netteCache[01]000389a:2:{s:4:"time";s:21:"0.66828500 1391682676";s:9:"callbacks";a:2:{i:0;a:3:{i:0;a:2:{i:0;s:19:"Nette\Caching\Cache";i:1;s:9:"checkFile";}i:1;s:75:"C:\projects\NetBeans\trans\app\FrontModule\templates\Document\default.latte";i:2;i:1391162052;}i:1;a:3:{i:0;a:2:{i:0;s:19:"Nette\Caching\Cache";i:1;s:10:"checkConst";}i:1;s:25:"Nette\Framework::REVISION";i:2;s:22:"released on 2013-12-31";}}}?><?php

// source file: C:\projects\NetBeans\trans\app\FrontModule\templates\Document\default.latte

?><?php
// prolog Nette\Latte\Macros\CoreMacros
list($_l, $_g) = Nette\Latte\Macros\CoreMacros::initRuntime($template, '0ghtksmf5n')
;
// prolog Nette\Latte\Macros\UIMacros
//
// block content
//
if (!function_exists($_l->blocks['content'][] = '_lbb3b9049f20_content')) { function _lbb3b9049f20_content($_l, $_args) { foreach ($_args as $__k => $__v) $$__k = $__v
;Nette\Latte\Macros\CoreMacros::includeTemplate('../base.latte', $template->getParameters(), $_l->templates['0ghtksmf5n'])->render() ?>

<H2>Seznam dokladů ze spoolu č. <?php echo Nette\Templating\Helpers::escapeHtml($id_spool, ENT_NOQUOTES) ?></H2>

<?php $_ctrl = $_control->getComponent("documentDatagrid"); if ($_ctrl instanceof Nette\Application\UI\IRenderable) $_ctrl->redrawControl(NULL, FALSE); $_ctrl->render() ?>

<div>
<?php $args = array('id_spool' => $id_spool, 'id_company' => $id_company) ?>
	<a href="<?php echo htmlSpecialChars($template->safeurl($_presenter->link("StatusDetail:default", array_merge(array(), $args, array())))) ?>" class="btn btn-primary">Zpět na detail spoolu</a>	
</div>


<!--<script>
	$("document").ready( function() {
	$('select[name^="filter"]').change(function() {
		
		$('input[name="filter[filter]"]').click();
			
	  });
  });
</script>-->

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