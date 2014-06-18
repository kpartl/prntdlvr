<?php //netteCache[01]000395a:2:{s:4:"time";s:21:"0.50324400 1391683261";s:9:"callbacks";a:2:{i:0;a:3:{i:0;a:2:{i:0;s:19:"Nette\Caching\Cache";i:1;s:9:"checkFile";}i:1;s:81:"C:\projects\NetBeans\trans\app\FrontModule\templates\DocumentDetail\default.latte";i:2;i:1391683259;}i:1;a:3:{i:0;a:2:{i:0;s:19:"Nette\Caching\Cache";i:1;s:10:"checkConst";}i:1;s:25:"Nette\Framework::REVISION";i:2;s:22:"released on 2013-12-31";}}}?><?php

// source file: C:\projects\NetBeans\trans\app\FrontModule\templates\DocumentDetail\default.latte

?><?php
// prolog Nette\Latte\Macros\CoreMacros
list($_l, $_g) = Nette\Latte\Macros\CoreMacros::initRuntime($template, 'dr0v92gdp7')
;
// prolog Nette\Latte\Macros\UIMacros
//
// block content
//
if (!function_exists($_l->blocks['content'][] = '_lb2d361b84a5_content')) { function _lb2d361b84a5_content($_l, $_args) { foreach ($_args as $__k => $__v) $$__k = $__v
;Nette\Latte\Macros\CoreMacros::includeTemplate('../base.latte', $template->getParameters(), $_l->templates['dr0v92gdp7'])->render() ?>




<H2>Doklad číslo <B><?php echo Nette\Templating\Helpers::escapeHtml($documentEntity->spoolEnvelop, ENT_NOQUOTES) ?>
</B> ze spoolu číslo <B><?php echo Nette\Templating\Helpers::escapeHtml($documentEntity->id_spool, ENT_NOQUOTES) ?></B></H2>


<?php Nette\Latte\Macros\FormMacros::renderFormBegin($form = $_form = $_control["noticeForm"], array()) ?>
	<table class="table  table-condensed table-striped">

		<tr><td>Číslo zákazníka</td><td><?php echo Nette\Templating\Helpers::escapeHtml($documentEntity->custommerNumber, ENT_NOQUOTES) ?></td></tr>
		<tr><td>Zákazník</td><td><?php echo Nette\Templating\Helpers::escapeHtml($documentEntity->custommerName, ENT_NOQUOTES) ?></td></tr>
		<tr><td>Zasílací adresa</td><td><?php echo Nette\Templating\Helpers::escapeHtml($documentEntity->custommerAddr, ENT_NOQUOTES) ?></td></tr>
		<tr><td>Typ dokladu</td><td><?php echo Nette\Templating\Helpers::escapeHtml($documentEntity->docType->name, ENT_NOQUOTES) ?></td></tr>
		<tr><td>Číslo dokladu</td><td><?php echo Nette\Templating\Helpers::escapeHtml($documentEntity->docNumber, ENT_NOQUOTES) ?></td></tr>
		<tr><td>Počet stran</td><td><?php echo Nette\Templating\Helpers::escapeHtml($documentEntity->docPages, ENT_NOQUOTES) ?></td></tr>
		<tr><td>Přijato</td><td><?php echo Nette\Templating\Helpers::escapeHtml($template->date($documentEntity->dateIn, 'd.m.Y H:i:s'), ENT_NOQUOTES) ?></td></tr>
		<tr><td>Zpracováno</td><td><?php echo Nette\Templating\Helpers::escapeHtml($template->date($documentEntity->dateProcess, 'd.m.Y H:i:s'), ENT_NOQUOTES) ?></td></tr>
		<tr><td>Vytištěno</td><td><?php echo Nette\Templating\Helpers::escapeHtml($template->date($documentEntity->datePrint, 'd.m.Y H:i:s'), ENT_NOQUOTES) ?></td></tr>
		<tr><td>Odesláno</td><td><?php echo Nette\Templating\Helpers::escapeHtml($template->date($documentEntity->dateOut, 'd.m.Y H:i:s'), ENT_NOQUOTES) ?></td></tr>
		<tr><td>Poštovní opeátor</td><td><?php echo Nette\Templating\Helpers::escapeHtml($documentEntity->operator->name, ENT_NOQUOTES) ?></td></tr>
		<tr><td>Kanál odeslání</td><td><?php echo Nette\Templating\Helpers::escapeHtml($documentEntity->distChannel->name, ENT_NOQUOTES) ?></td></tr>
		<tr><td>Email</td><td><?php echo Nette\Templating\Helpers::escapeHtml($documentEntity->custEmail, ENT_NOQUOTES) ?></td></tr>
		<tr><td></td><td></td></tr>
		<tr><td>Link na archiv</td><td><a href="<?php echo htmlSpecialChars($template->safeurl($documentEntity->archiveLink)) ?>">odkaz</a></td></tr>
		<tr><td>Volba produkčního dotisku</td><td><?php echo Nette\Templating\Helpers::escapeHtml($documentEntity->reprint, ENT_NOQUOTES) ?></td></tr>
		<tr><td></td><td></td></tr>

		<tr><td>Poznámka</td>
			<td>

<?php if ($user->isAllowed('Front:DocumentDetail', 'edit')) { ?>
					<?php echo $_form["noticeInput"]->getControl()->addAttributes(array('value'=>$documentEntity->docNote, 'disabled'=>'disabled', 'size'=>strlen($documentEntity->docNote))) ?>

					<?php echo $_form["noticeChangeButton"]->getControl()->addAttributes(array('value'=>'editovat', 'class'=>'btn btn-default btn-small')) ?>

				<?php } else { ?> <?php echo Nette\Templating\Helpers::escapeHtml($documentEntity->docNote, ENT_NOQUOTES) ?>

<?php } ?>
				

				<?php echo $_form["submittButton"]->getControl()->addAttributes(array('value'=>'OK', 'class'=>'btn btn-success btn-small', 'style'=>'display:none;')) ?>

				<?php echo $_form["cancelButton"]->getControl()->addAttributes(array('value'=>'Zrušit','class'=>'btn btn-default btn-small', 'style'=>'display:none;')) ?>


			</td>
		</tr>	


	</table>

<?php Nette\Latte\Macros\FormMacros::renderFormEnd($_form) ?>
<div>
<?php $args = array('id_spool' => $documentEntity->id_spool, 'id_company' => $documentEntity->company->id) ?>
	<a href="<?php echo htmlSpecialChars($template->safeurl($_presenter->link("Document:default", array_merge(array(), $args, array())))) ?>" class="btn btn-primary">Zpět na seznam dokladů</a>
</div>

<script>
//	$(document).ready(function() {
	$('#frm-noticeForm-noticeChangeButton').click(function() {
					$('#frm-noticeForm-noticeInput').prop('disabled', false);
								$('#frm-noticeForm-noticeInput').prop('size', 100);
								$('#frm-noticeForm-noticeChangeButton').hide();
								$('#frm-noticeForm-submittButton').show();
								$('#frm-noticeForm-cancelButton').show();
							});
//						});
</script>




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
if ($_l->extends) { ob_end_clean(); return Nette\Latte\Macros\CoreMacros::includeTemplate($_l->extends, get_defined_vars(), $template)->render(); }
call_user_func(reset($_l->blocks['content']), $_l, get_defined_vars()) ; 