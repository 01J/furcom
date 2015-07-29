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
	<jdoc:include type="head" />
	<?php if ($this->params->get('googleFont')) { ?>
		<link href='http://fonts.googleapis.com/css?family=<?php echo $this->params->get('googleFontName');?>' rel='stylesheet' type='text/css' />
		<style type="text/css"> h1,h2,h3,h4,h5,h6,.site-title{ font-family: '<?php echo str_replace('+', ' ', $this->params->get('googleFontName'));?>', sans-serif; } </style>
	<?php } ?>
	<link rel="stylesheet" href="templates/rsmetro/css/ios.css" media="only screen and (max-device-width:1024px)" />
	<link rel="stylesheet" href="<?php echo $this->baseurl ?>/templates/system/css/system.css" type="text/css" />
	<link rel="stylesheet" href="<?php echo $this->baseurl ?>/templates/rsmetro/css/template.css" type="text/css" />
	<link rel="apple-touch-icon-precomposed" sizes="57x57" href="templates/rsmetro/apple-touch-icon-57x57.png" />
    <link rel="apple-touch-icon-precomposed" sizes="72x72" href="templates/rsmetro/apple-touch-icon-72x72.png" />
    <link rel="apple-touch-icon-precomposed" sizes="114x114" href="templates/rsmetro/apple-touch-icon-114x114.png" />
    <link rel="apple-touch-icon-precomposed" sizes="144x144" href="templates/rsmetro/apple-touch-icon-144x144.png" />
	<link href='http://fonts.googleapis.com/css?family=Roboto+Condensed:400,700&subset=latin,cyrillic-ext' rel='stylesheet' type='text/css'>
	<link href='http://fonts.googleapis.com/css?family=Roboto+Condensed:300&subset=latin,cyrillic,cyrillic-ext' rel='stylesheet' type='text/css'>
</head>
<body>
    <div id="container_bg">
		<div class="header_bg">
			<div class="header">
				<div class="headerlt">
					<jdoc:include type="modules" name="topmenu" style="xhtml" />
				</div>
				<div class="headerrt">
					<jdoc:include type="modules" name="login" style="xhtml" />
				</div>
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
				<a class="logo" href="<?php echo $this->baseurl; ?>">
					<?php echo $logo;?> <?php if ($this->params->get('sitedescription')) { echo '<div class="site-description">'. htmlspecialchars($this->params->get('sitedescription')) .'</div>'; } ?>
				</a>
				<jdoc:include type="modules" name="social" style="xhtml" />
				<jdoc:include type="modules" name="seargh" style="xhtml" />
            
			<div class="main_menu">
				<jdoc:include type="modules" name="mainmenu" style="xhtml" />
            </div>
			
<div class="phone_num">
				<jdoc:include type="modules" name="phone_num" style="xhtml" />
				<div class="phones">
				<jdoc:include type="modules" name="phones" style="xhtml" />
				</div>
				<div class="phone_button">
				<jdoc:include type="modules" name="phone_button" style="xhtml" />
				</div>	
				</div>	
</div>				
		</div>
				<div class="clr"></div>
			
<div class="rs_sliderprodv">
			
				<jdoc:include type="modules" name="sliderprodv" style="xhtml" />
				<div class="konkurprodv">
				
				<div class="formcontainerprodv">
				<div class="formaprodv">
			<div class="formanameprodv"><h4>Оставьте заявку</h4><p>и специалист агентства поможет выбрать нужную для решения вашей задачи услугу</p></div>
			<div class="formanameprodv1"><h4>Закажите</h4><p>бесплатный расчёт стоимости продвижения Вашего сайта</p></div>
			<jdoc:include type="modules" name="forma" style="xhtml" />
			</div>
				<div class="aim"><jdoc:include type="modules" name="bystro" style="xhtml" /></div>
				<div class="zapolnenieprodv"><jdoc:include type="modules" name="zapolnenie" style="xhtml" /></div>
				
				<div class="clr"></div>
            </div>	
			</div>
			
			</div>			

			<div class="rs_slider3prodv">
				<jdoc:include type="modules" name="slider3" style="xhtml" />
				<div class="opt">
				<div class="opt1">
					<jdoc:include type="modules" name="opt1" style="xhtml" />
				</div>
				<div class="opt2">
					<jdoc:include type="modules" name="opt2" style="xhtml" />
				</div>
				<div class="opt3">
					<jdoc:include type="modules" name="opt3" style="xhtml" />
				</div>
				</div>
				<div class="clr"></div>
            </div>	
			<div class="rs_slider4prodv">
				<jdoc:include type="modules" name="slider4" style="xhtml" />
				
				<div class="clr"></div>
            </div>	
			<div class="sledovatelno">
				<jdoc:include type="modules" name="sledovatelno" style="xhtml" />
				<div class="percent">
				<div class="percent1">
					<jdoc:include type="modules" name="percent1" style="xhtml" />
				</div>
				<div class="percent2">
					<jdoc:include type="modules" name="percent2" style="xhtml" />
				</div>
				<div class="percent3">
					<jdoc:include type="modules" name="percent3" style="xhtml" />
				</div>
				</div>
				<div class="percent4">
					<jdoc:include type="modules" name="percent4" style="xhtml" />
				</div>
				<div class="percent5">
					<jdoc:include type="modules" name="percent5" style="xhtml" />
				</div>
				
				<div class="clr"></div>
            </div>	
			<div class="pochemu">
				<jdoc:include type="modules" name="pochemu" style="xhtml" />
				<div class="pochemu1">
					<jdoc:include type="modules" name="pochemu1" style="xhtml" />
				</div>
				<div class="pochemu2">
					<jdoc:include type="modules" name="pochemu2" style="xhtml" />
				</div>
				<div class="pochemu3">
					<jdoc:include type="modules" name="pochemu3" style="xhtml" />
				</div>
				
				<div class="clr"></div>
            </div>
			<div class="question">
				<jdoc:include type="modules" name="question" style="xhtml" />
				
				<div class="clr"></div>
            </div>
			<div class="social_links">
				<jdoc:include type="modules" name="social_links" style="xhtml" />
				
				
				<div class="clr"></div>
				<div class="soc"></div>
            </div>
			<div class="clr"></div>
			<div class="prodvizhenie">
				<jdoc:include type="modules" name="prodvizhenie" style="xhtml" />
				<div class="prodv">
				<jdoc:include type="modules" name="prodv" style="xhtml" />
				</div>
				<div class="prodazhy">
				<jdoc:include type="modules" name="prodazhy" style="xhtml" />
				</div>
				<div class="vidget">
				<jdoc:include type="modules" name="vidget" style="xhtml" />
				</div>
				
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
		<div class="jr_component">
            <?php if($this->countModules('left')) : ?>
            <div class="jr_left">
                <jdoc:include type="modules" name="left" style="xhtml" />
            </div>
            <?php endif; ?>
            <div class="jr<?php echo $contentwidth; ?>">
                <jdoc:include type="modules" name="breadcrumb" style="xhtml" />	        
                <jdoc:include type="component" />
            </div>
            <?php if($this->countModules('right')) : ?>
            <div class="jr_right">
                <jdoc:include type="modules" name="right" style="xhtml" />
            </div>
            <?php endif; ?>
			<div class="clr"></div>
        </div>			
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
	<div id="footer">
		<div class="footer1170">
			<div class="footer_bottom"><div class="skype">
                		<jdoc:include type="modules" name="skype" style="xhtml" />
            		</div>
					<div class="socialbuttons">
                		<jdoc:include type="modules" name="socialbuttons" style="xhtml" />
            		</div>
					<div class="footerlinks">
                		<jdoc:include type="modules" name="footerlinks" style="xhtml" />
            		</div>
				<div class="footermenu">			    	
					<jdoc:include type="modules" name="footermenu" style="xhtml" />
            	</div>
				<div class="footer_rt">
			    	<div class="footer_rtleft">
					<span>&copy; <?php echo date('Y');?> <br /><?php echo $sitename; ?></span>
			        	<a href="http://redsoft.ru/" alt="Redsoft - ведущий разработчик сайтов на CMS Joomla! Веб-дизайн, брендинг, разработка компонентов Joomla, поддержка сайтов" title="Redsoft - ведущий разработчик сайтов на CMS Joomla! Веб-дизайн, брендинг, разработка компонентов Joomla, поддержка сайтов" target="_blank">Дизайн сайта - Redsoft</a>
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
