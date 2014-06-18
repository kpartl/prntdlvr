<?php //netteCache[01]000368a:2:{s:4:"time";s:21:"0.54905500 1403006795";s:9:"callbacks";a:2:{i:0;a:3:{i:0;a:2:{i:0;s:19:"Nette\Caching\Cache";i:1;s:9:"checkFile";}i:1;s:54:"C:\projects\NetBeans\trans\app\templates\@layout.latte";i:2;i:1403006551;}i:1;a:3:{i:0;a:2:{i:0;s:19:"Nette\Caching\Cache";i:1;s:10:"checkConst";}i:1;s:25:"Nette\Framework::REVISION";i:2;s:22:"released on 2013-12-31";}}}?><?php

// source file: C:\projects\NetBeans\trans\app\templates\@layout.latte

?><?php
// prolog Nette\Latte\Macros\CoreMacros
list($_l, $_g) = Nette\Latte\Macros\CoreMacros::initRuntime($template, 'c1niq7cpri')
;
// prolog Nette\Latte\Macros\UIMacros
//
// block title
//
if (!function_exists($_l->blocks['title'][] = '_lb50cef1beb3_title')) { function _lb50cef1beb3_title($_l, $_args) { foreach ($_args as $__k => $__v) $$__k = $__v
?>Print Portal<?php
}}

//
// block head
//
if (!function_exists($_l->blocks['head'][] = '_lb1abae1cf20_head')) { function _lb1abae1cf20_head($_l, $_args) { foreach ($_args as $__k => $__v) $$__k = $__v
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

        <title><?php if ($_l->extends) { ob_end_clean(); return Nette\Latte\Macros\CoreMacros::includeTemplate($_l->extends, get_defined_vars(), $template)->render(); }
ob_start(); call_user_func(reset($_l->blocks['title']), $_l, get_defined_vars()); echo $template->upper($template->striptags(ob_get_clean()))  ?></title>


		<link rel="stylesheet" media="screen,projection,tv" href="<?php echo htmlSpecialChars($template->safeurl($basePath)) ?>/css/bootstrap.min.css">		
		<link rel="stylesheet" media="screen,projection,tv" href="<?php echo htmlSpecialChars($template->safeurl($basePath)) ?>/css/bootstrap3.nextras.datagrid.css">
		<link rel="stylesheet" media="screen,projection,tv"
			  href="http://ajax.googleapis.com/ajax/libs/jqueryui/1.8/themes/smoothness/jquery-ui.css">
		<link rel="stylesheet" media="print" href="<?php echo htmlSpecialChars($template->safeurl($basePath)) ?>/css/print.css">        
		<link rel="stylesheet" media="screen,projection,tv" href="<?php echo htmlSpecialChars($template->safeurl($basePath)) ?>/css/screen.css">


        <link rel="shortcut icon" href="<?php echo htmlSpecialChars($template->safeurl($basePath)) ?>/favicon.ico">
		<script src="<?php echo htmlSpecialChars($template->safeurl($basePath)) ?>/js/jquery.js"></script>
		<script src="<?php echo htmlSpecialChars($template->safeurl($basePath)) ?>/js/jquery-ui.min"></script>

		<script src="<?php echo htmlSpecialChars($template->safeurl($basePath)) ?>/js/netteForms.js"></script>

		<script src="<?php echo htmlSpecialChars($template->safeurl($basePath)) ?>/js/bootstrap.min.js"></script>
		<script src="<?php echo htmlSpecialChars($template->safeurl($basePath)) ?>/js/main.js"></script>
		<script src="<?php echo htmlSpecialChars($template->safeurl($basePath)) ?>/js/nette.ajax.js"></script>
		<script src="<?php echo htmlSpecialChars($template->safeurl($basePath)) ?>/js/nextras.datagrid.js"></script>

				
<!--		<script>$(function() {
					$.nette.init();
						});
		</script>-->

		<script>
			/* Czech initialisation for the jQuery UI date picker plugin. */
			/* Written by Tomas Muller (tomas@tomas-muller.net). */
			jQuery(function($) {
    $.datepicker.regional['cs'] = {
        closeText: 'Zavřít',
					prevText: '&#x3c;Dříve',
        nextText: 'Později&#x3e;',
					currentText: 'Nyní',
					monthNames: ['leden', 'únor', 'březen', 'duben', 'květen', 'červen', 'červenec', 'srpen',
						'září', 'říjen', 'listopad', 'prosinec'],
					monthNamesShort: ['led', 'úno', 'bře', 'dub', 'kvě', 'čer', 'čvc', 'srp', 'zář', 'říj', 'lis', 'pro'],
					dayNames: ['neděle', 'pondělí', 'úterý', 'středa', 'čtvrtek', 'pátek', 'sobota'],
					dayNamesShort: ['ne', 'po', 'út', 'st', 'čt', 'pá', 'so'],
					dayNamesMin: ['ne', 'po', 'út', 'st', 'čt', 'pá', 'so'],
					weekHeader: 'Týd',
					dateFormat: 'dd. mm. yy',
					firstDay: 1,
					isRTL: false,
					showMonthAfterYear: false,
					yearSuffix: ''
				};
				$.datepicker.setDefaults($.datepicker.regional['cs']);
			});
		</script>

		<script>
			$(document).ready(function() {
    $("input.date").each(function() { // input[type=date] does not work in IE
				var el = $(this);
				var value = el.val();
				var date = (value ? $.datepicker.parseDate($.datepicker.W3C, value) : null);

				var minDate = el.attr("min") || null;
				if (minDate)
					minDate = $.datepicker.parseDate($.datepicker.W3C, minDate);
				var maxDate = el.attr("max") || null;
				if (maxDate)
					maxDate = $.datepicker.parseDate($.datepicker.W3C, maxDate);

        // input.attr("type", "text") throws exception
					if (el.attr("type") == "date") {
            var tmp = $("<input/>");
							$.each("class,disabled,id,maxlength,name,readonly,required,size,style,tabindex,title,value".split(","), function(i, attr) {
                tmp.attr(attr, el.attr(attr));
								});
								tmp.data(el.data());
								el.replaceWith(tmp);
								el = tmp;
							}
							el.datepicker({
            minDate: minDate,
							maxDate: maxDate
						});
						el.val($.datepicker.formatDate(el.datepicker("option", "dateFormat"), date));
					});
				});
		</script>


		<?php call_user_func(reset($_l->blocks['head']), $_l, get_defined_vars())  ?>

    </head>

    <body>	
<!--        <script> document.documentElement.className += ' js'</script>-->



		<div class="container" id="content">
<?php Nette\Latte\Macros\UIMacros::callBlock($_l, 'content', $template->getParameters()) ?>
		</div>


    </body>
</html>
