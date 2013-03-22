<?php

defined('_JEXEC') or die;

$doc = JFactory::getDocument();
$doc -> addStyleSheet('templates/' . $this->template . '/css/main.css');
$doc -> addScript('/templates/' . $this->template . '/js/main.js', 'text/javascript');

$app = JFactory::getApplication();
$templateparams = $app->getTemplate(true)->params;
?>
<!DOCTYPE html>
<html xmlns="http://www.w3.org/1999/xhtml" xml:lang="<?php echo $this->language; ?>" lang="<?php echo $this->language; ?>" dir="<?php echo $this->direction; ?>">
<head>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <jdoc:include type="head" />
</head>

<body>
<div class="container">
    <div id="header">
        <h1>
            <a href="<?php echo $this->baseurl; ?>"><?php echo htmlspecialchars($this->params->get('sitedescription')); ?></a>
        </h1>
    </div>

    <div class='mid_container'>

        <div class='main_content_area'>
            <jdoc:include type="modules" name="position-3" style="xhtml" />
            <jdoc:include type="message" />
            <jdoc:include type="component" />
            <jdoc:include type="modules" name="position-2" style="none" />
        </div>

        <div class='right_sidebar'>
            <jdoc:include type="modules" name="position-7" style="well" />
        </div>

    </div>

    <div class='footer'>
        Footer
    </div>
    
</div>
</body>
</html>