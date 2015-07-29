<?php
// No direct access.
defined('_JEXEC') or die;
JHtml::_('jquery.framework');

$menu = JFactory::getApplication()->getMenu();
$doc = JFactory::getDocument();
$doc->addScriptDeclaration(' jQuery(document).ready(function(){if(0<jQuery("#system-message-container > div").length){var a=jQuery("#system-message-container");a.animate({opacity:0},5E3,function(){a.remove()})}}); ');
$app = JFactory::getApplication();
$sitename = $app->getCfg('sitename');

// Logo file or site title param
if ($this->params->get('logoFile'))
{
	$logo = '<img src="'. JURI::root() . $this->params->get('logoFile') .'" alt="'. $sitename .'" />';
}
elseif ($this->params->get('sitetitle'))
{
	$logo = '<span class="site-title" title="'. $sitename .'">'. htmlspecialchars($this->params->get('sitetitle')) .'</span>'; } else { $logo = '<span class="site-title" title="'. $sitename .'">'. $sitename .'</span>'; }

if($this->countModules('header_b and header_c') == 0) $header_a = "_full";
if($this->countModules('header_b or header_c') == 1) $header_a = "_middle";
if($this->countModules('header_b and header_c') == 1) $header_a = "_small";

if($this->countModules('top_b and top_c') == 0) $top_a = "_full";
if($this->countModules('top_b or top_c') == 1) $top_a = "_middle";
if($this->countModules('top_b and top_c') == 1) $top_a = "_small";

if($this->countModules('left and right') == 0) $contentwidth = "_full";
if($this->countModules('left or right') == 1) $contentwidth = "_middle";
if($this->countModules('left and right') == 1) $contentwidth = "_small";

if($this->countModules('bottom_b and bottom_c') == 0) $bottom_a = "_full";
if($this->countModules('bottom_b or bottom_c') == 1) $bottom_a = "_middle";
if($this->countModules('bottom_b and bottom_c') == 1) $bottom_a = "_small";

if($this->countModules('footer_b and footer_c') == 0) $footer_a = "_full";
if($this->countModules('footer_b or footer_c') == 1) $footer_a = "_middle";
if($this->countModules('footer_b and footer_c') == 1) $footer_a = "_small";

?>

<!DOCTYPE html>
<html xmlns="http://www.w3.org/1999/xhtml" xml:lang="<?php echo $this->language; ?>" lang="<?php echo $this->language; ?>" dir="<?php echo $this->direction; ?>" >
<head>
	
<style>@font-face {
    font-family: MZ5ff0i9; /* Гарнитура шрифта */
    src: url(templates/rsmetro/css/MZ5ff0i9.ttf); /* Путь к файлу со шрифтом */
   }</style>
	<jdoc:include type="head" />
	<?php if ($this->params->get('googleFont')) { ?>
		<link href='http://fonts.googleapis.com/css?family=<?php echo $this->params->get('googleFontName');?>' rel='stylesheet' type='text/css' />
		<style type="text/css"> h1,h2,h3,h4,h5,h6,.site-title{ font-family: '<?php echo str_replace('+', ' ', $this->params->get('googleFontName'));?>', sans-serif; } </style>
	<?php } ?>
	<link rel="stylesheet" href="templates/rsmetro/css/ios.css" media="only screen and (max-device-width:1024px)" />
	<link rel="stylesheet" href="css/MZ5ff0i9.ttf" type="text/css" />
	<link rel="stylesheet" href="<?php echo $this->baseurl ?>/templates/system/css/system.css" type="text/css" />
	<link rel="stylesheet" href="<?php echo $this->baseurl ?>/templates/rsmetro/css/template.css" type="text/css" />
	<link rel="apple-touch-icon-precomposed" sizes="57x57" href="templates/rsmetro/apple-touch-icon-57x57.png" />
    <link rel="apple-touch-icon-precomposed" sizes="72x72" href="templates/rsmetro/apple-touch-icon-72x72.png" />
    <link rel="apple-touch-icon-precomposed" sizes="114x114" href="templates/rsmetro/apple-touch-icon-114x114.png" />
    <link rel="apple-touch-icon-precomposed" sizes="144x144" href="templates/rsmetro/apple-touch-icon-144x144.png" />
	<link href='http://fonts.googleapis.com/css?family=Merriweather:400,700' rel='stylesheet' type='text/css'>
	<link href='http://fonts.googleapis.com/css?family=Scada:400,700&subset=latin,cyrillic' rel='stylesheet' type='text/css'>
	
	
	<script type="text/javascript">
// <![CDATA[
var us_msg = {missing: "Не задано обязательное поле: \"%s\"", invalid: "Недопустимое значение поля: \"%s\"", email_or_phone: "Не задан ни email, ни телефон", no_list_ids: "Не выбрано ни одного списка рассылки"};
var us_emailRegexp = /^[a-zA-Z0-9_+=-]+[a-zA-Z0-9\._+=-]*@[a-zA-Z0-9][a-zA-Z0-9-]*(\.[a-zA-Z0-9]([a-zA-Z0-9-]*))*\.([a-zA-Z]{2,6})$/;
var us_phoneRegexp = /^\s*[\d +()-.]{7,32}\s*$/;
if (typeof us_ == 'undefined') {
	var us_ = new function() {

		var onLoadCalled = false;
		var onLoadOld = window.onload;
		window.onload = function() { us_.onLoad(); };
		var onResizeOld = null;
		var popups = [];

		function autodetectCharset(form) {
			var ee = form.getElementsByTagName('input');
			for (var i = 0;  i < ee.length;  i++) {
				var e = ee[i];
				if (e.getAttribute('name') == 'charset') {
					if (e.value == '') {
						// http://stackoverflow.com/questions/318831
						e.value = document.characterSet ? document.characterSet : document.charset;
					}
					return;
				}
			}
		}

		function createAndShowPopup(form) {
			var d = document;
			// outerHTML(): http://stackoverflow.com/questions/1700870
			var e = d.createElement('div');
			e.style.position = 'absolute';
			e.style.width = 'auto';
			e = d.body.appendChild(e);
			e.appendChild(form);
			form.style.display = '';
			popups.push(e);
		}

		function centerAllPopups() {
			// Multiple popups will overlap, but nobody cares until somebody cares.
			var w = window;
			var d = document;
			var ww = w.innerWidth ? w.innerWidth : d.body.clientWidth;
			var wh = w.innerHeight ? w.innerHeight : d.body.clientHeight;
			for (var i = 0;  i < popups.length;  i++) {
				var e = popups[i];
				var ew = parseInt(e.offsetWidth + '');
				var eh = parseInt(e.offsetHeight + '');
				e.style.left = (ww - ew) / 2 + d.body.scrollLeft + (i * 10);
				e.style.top = (wh - eh) / 2 + d.body.scrollTop + (i * 10);
			}
		}

		this.onLoad = function() {
			var i;
			var ffl = document.getElementsByTagName('form');
			var ff = [];
			// NodeList changes while we move form to different parent; preload into array.
			for (i = 0;  i < ffl.length;  i++) {
				ff.push(ffl[i]);
			}
			
			for (i = 0;  i < ff.length;  i++) {
				var f = ff[i];
				var a = f.getAttribute('us_mode');
				if (!a) {
					continue;
				}
				if (a == 'popup') {
					createAndShowPopup(f);
				}
				autodetectCharset(f);
			}
//			console.log(popups);
			centerAllPopups();
			onResizeOld = window.onresize;
			window.onresize = function() { us_.onResize(); };
			onLoadCalled = true;
			if (onLoadOld) {
				onLoadOld();
			}
		};

		this.onResize = function() {
			centerAllPopups();
			if (onResizeOld) {
				onResizeOld();
			}
		};

		this.onSubmit = function(form) {
			if (!onLoadCalled) {
				alert('us_.onLoad() has not been called');
				return false;
			}

			function trim(s) {
				return s == null ? '' : s.replace(/^\s\s*/, '').replace(/\s\s*$/, '');
			}

			var d = document;

			var ee, i, e, n, v, r, k, b1, b2;
			var hasEmail = false;
			var hasPhone = false;

			ee = form.getElementsByTagName('input');
			for (i = 0;  i < ee.length;  i++) {
				e = ee[i];
				n = e.getAttribute('name');
				if (!n || e.getAttribute('type') != 'text') {
					continue;
				}

				v = trim(e.value);
				if (v == '') {
					k = e.getAttribute('_required');
					if (k == '1') {
						alert(us_msg['missing'].replace('%s', e.getAttribute('_label')));
						e.focus();
						return false;
					}
					continue;
				}

				if (n == 'email') {
					hasEmail = true;
				} else if (n == 'phone') {
					hasPhone = true;
				}

				k = e.getAttribute('_validator');
				r = null;
				switch (k) {
					case null:
					case '':
					case 'date':
						break;
					case 'email':
						r = us_emailRegexp;
						break;
					case 'phone':
						r = us_phoneRegexp;
						break;
					case 'float':
						r = /^[+\-]?\d+(\.\d+)?$/;
						break;
					default:
						alert('Internal error: unknown validator "' + k + '"');
						e.focus();
						return false;
				}
				if (r && !r.test(v)) {
					alert(us_msg['invalid'].replace('%s', e.getAttribute('_label')));
					e.focus();
					return false;
				}
			}

			if (!hasEmail && !hasPhone) {
				alert(us_msg['email_or_phone']);
				return false;
			}

			ee = form.getElementsByTagName('input');
			b1 = false;
			b2 = false;
			for (i = 0;  i < ee.length;  i++) {
				e = ee[i];
				if (e.getAttribute('name') != 'list_ids[]') {
					continue;
				}
				b1 = true;
				if (e.checked) {
					b2 = true;
					break;
				}
			}
			if (b1 && !b2) {
				alert(us_msg['no_list_ids']);
				return false;
			}

			return true;
		};
	};
}
// ]]>
</script>

<style type="text/css">
/* <![CDATA[ */
#us_form {
	margin: 0;
	font-family:  "Scada",sans-serif;;
	font-size: 13px;
	font-style: normal;
	font-weight: normal;
	text-decoration: none;
	color: black;
	overflow: visible;
}

#us_form table {
	margin: 0;
}
#us_form th, #us_form td {
	vertical-align: top;
	text-align: left;
	border: 0;
	padding: 0;

}

/* http://stackoverflow.com/questions/1100409 */
.us_input, .us_select {
    border-top: 1px #acaeb4 solid;
    border-left: 1px #dde1e7 solid;
    border-right: 1px #dde1e7 solid;
    border-bottom: 1px #e3e9ef solid;
    -moz-border-radius: 2px;
    -webkit-border-radius: 2px;
    padding: 2px;
}
/*.us_input:hover, .us_select:hover, .us_input:focus, .us_select:focus {
    border-top: 1px #5794bf solid;
    border-left: 1px #c5daed solid;
    border-right: 1px #b7d5ea solid;
    border-bottom: 1px #c7e2f1 solid;
}*/

label input.us_checkbox {
	margin-right: 4px;
}
#us_form * {font-family:arial,helvetica,sans-serif;font-size:13px;}
/* ]]> */
</style>



</head>
<body>
<div class="page">
    <div id="container_bg">
		<div class="header_bg">
			<div class="header">
				<div class="headerlt">
					<jdoc:include type="modules" name="topmenu" style="xhtml" />
				</div>
				<div class="headerrt">
					<jdoc:include type="modules" name="login" style="xhtml" />
				</div>
				<div class="clr"></div>
				
			</div>	
		</div>		
		<div class="container">			
			<div class="jr_module head">
            	<?php if($this->countModules('header_b')) : ?>
            	<div class="jr_mod_b">
                	<jdoc:include type="modules" name="header_b" style="xhtml" />
            	</div>
            	<?php endif; ?>
            	<div class="jr_mod<?php echo $header_a; ?>">
                	<jdoc:include type="modules" name="header_a" style="xhtml" />
            	</div>
            	<?php if($this->countModules('header_c')) : ?>
            	<div class="jr_mod_c">
                	<jdoc:include type="modules" name="header_c" style="xhtml" />
            	</div>
            	<?php endif; ?>
				<div class="clr"></div>
        	</div>
			<div class="header_rt">	
			<div class="headerwrap"><div class="fur1">
				<a class="logo" href="http://furcom.by">МФК |
				</a>
				<div class="fur">Швейная фурнитура оптом</div></div>
				<jdoc:include type="modules" name="social" style="xhtml" />
				<jdoc:include type="modules" name="seargh" style="xhtml" />
				<div class="main_menu">
				<jdoc:include type="modules" name="mainmenu" style="xhtml" />
            </div>	
			<div class="grafik"><jdoc:include type="modules" name="grafik" style="xhtml" /></div>
			<div class="phone_num">
				<jdoc:include type="modules" name="phone_num" style="xhtml" />
            </div>
				</div>
				<div class="clr"></div>
				<div class="headername">
					<jdoc:include type="modules" name="headername" style="xhtml" />
				</div>
				
            </div>
				
		</div>
				<div class="clr"></div>
	<div class="big">
		<div class="left">
			<div class="subscibe">
				<jdoc:include type="modules" name="subscibe" style="xhtml" />
            </div>
			<div class="kategories">
				<jdoc:include type="modules" name="kategories" style="xhtml" />
            </div>
		</div>
		<div class="right">
			<div class="content">
			<jdoc:include type="component" />
				<jdoc:include type="modules" name="content" style="xhtml" />
				<div class="clr"></div>
            </div>			
		<div class="jr_module top">
            <?php if($this->countModules('top_b')) : ?>
            <div class="jr_mod_b">
                <jdoc:include type="modules" name="top_b" style="xhtml" />
            </div>
            <?php endif; ?>
            <div class="jr_mod<?php echo $top_a; ?>">
                <jdoc:include type="modules" name="top_a" style="xhtml" />
            </div>
            <?php if($this->countModules('top_c')) : ?>
            <div class="jr_mod_c">
                <jdoc:include type="modules" name="top_c" style="xhtml" />
            </div>
            <?php endif; ?>
			<div class="clr"></div>
        </div>	
		 <?php if($this->countModules('katalogi')) : ?>
		<div id="jr_component">
            <jdoc:include type="modules" name="katalogi" style="xhtml" />
			<div class="kat1">
				<jdoc:include type="modules" name="kat1" style="xhtml" />
				<div class="kat1descr">
					<jdoc:include type="modules" name="kat1descr" style="xhtml" />
				</div>
			</div>
			<div class="kat2">
				<jdoc:include type="modules" name="kat2" style="xhtml" />
				<div class="kat2descr">
					<jdoc:include type="modules" name="kat2descr" style="xhtml" />
				</div>
			</div>
			<div class="kat3">
				<jdoc:include type="modules" name="kat3" style="xhtml" />
				<div class="kat3descr">
					<jdoc:include type="modules" name="kat3descr" style="xhtml" />
				</div>
			</div>
			<div class="kat4">
				<jdoc:include type="modules" name="kat4" style="xhtml" />
				<div class="kat4descr">
					<jdoc:include type="modules" name="kat4descr" style="xhtml" />
				</div>
			</div>
			<div class="clr"></div>
        </div>
		<?php endif; ?>
		<div class="news">
            <jdoc:include type="modules" name="news" style="xhtml" />
			
			<div class="news2container">
			<?php if($this->countModules('formwrap')) : ?>
			<div class="formwrap">
			
			 <jdoc:include type="modules" name="formwrap" style="xhtml" />
			
			</div><?php endif; ?>
			<div class="news2">
				<jdoc:include type="modules" name="news2" style="xhtml" />
			</div> 
			<?php if($this->countModules('news2button')) : ?>
			<div class="news2button">
				<jdoc:include type="modules" name="news2button" style="xhtml" />
			</div>
			<?php endif; ?>
			
			
			</div>
			<div class="news1">
				<jdoc:include type="modules" name="news1" style="xhtml" />
			</div>
			
			<div class="news3">
				<jdoc:include type="modules" name="news3" style="xhtml" />
			</div>
			<div class="clr"></div>
        </div>	
	</div>
	</div>
	<div class="clr"></div>
		<div class="jr_module bott">
            <?php if($this->countModules('bottom_b')) : ?>
            <div class="jr_mod_b">
                <jdoc:include type="modules" name="bottom_b" style="xhtml" />
            </div>
            <?php endif; ?>
            <div class="jr_mod<?php echo $bottom_a; ?>">
                <jdoc:include type="modules" name="bottom_a" style="xhtml" />
            </div>
            <?php if($this->countModules('bottom_c')) : ?>
            <div class="jr_mod_c">
                <jdoc:include type="modules" name="bottom_c" style="xhtml" />
            </div>
            <?php endif; ?>
			<div class="clr"></div>
        </div>			
	</div>
	<div class="clr"></div>
	</div class="garant"></div>
	</div>
	<div id="footer">
		<div class="footer_top">	
	 		<div class="footer_bg">			
				<div class="jr_module">
            		<?php if($this->countModules('footer_b')) : ?>
            		<div class="jr_mod_b">
                		<jdoc:include type="modules" name="footer_b" style="xhtml" />
            		</div>
            		<?php endif; ?>
            		<div class="jr_mod<?php echo $footer_a; ?>">
                		<jdoc:include type="modules" name="footer_a" style="xhtml" />
            		</div>
            		<?php if($this->countModules('footer_c')) : ?>
            		<div class="jr_mod_c">
						<jdoc:include type="modules" name="footer_c" style="xhtml" />
            		</div>
            		<?php endif; ?>
					<div class="clr"></div>
        		</div>
			</div>
		</div>	
		<div class="footer_bottom_bg">
			<div class="footer_bottom">
				<div class="footermenu">			    	
					<jdoc:include type="modules" name="footermenu" style="xhtml" />
					<div class="footermenu1">			    	
					<jdoc:include type="modules" name="footermenu1" style="xhtml" />
            	</div>
            	</div>
				<div class="clr"></div>
				<div class="footer_rt">
			    	<div class="footer_rtleft">
					 <a href="http://furcom.by"><span>&copy; &nbsp<?php echo date('Y');?>&nbsp<?php echo $sitename; ?></span></a>
			        	<a href="http://redsoft.ru/" alt="" target="_blank"></a>
					</div>	
			    	<a href="http://redsoft.ru/" target="_blank">
				    	<img src="/templates/rsmetro/images/redsoftlogo.png" alt="Redsoft - ведущий разработчик сайтов на CMS Joomla! Веб-дизайн, брендинг, разработка компонентов Joomla, поддержка сайтов">
					</a>
				</div>
			</div>			
		</div>
	</div>
    <jdoc:include type="modules" name="debug" />
<jdoc:include type="message" />
</body>
</html>
