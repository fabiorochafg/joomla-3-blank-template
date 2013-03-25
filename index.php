<?php
defined('_JEXEC') or die;

$app = JFactory::getApplication();
$doc = JFactory::getDocument();
$menu = JSite::getMenu();
$option = JRequest::GetWord('option');

$doc -> addStyleSheet('templates/' . $this->template . '/css/main.css');
$doc -> addScript('/templates/' . $this->template . '/js/main.js', 'text/javascript');
$showLeftColumn = $this->countModules('left');
$showRightColumn = $this->countModules('right');
$classContent = '';
if ($option != 'com_search') {
    if ($showLeftColumn && $showRightColumn) {
        $classContent = 'bothbar';
    } else if (!$showLeftColumn && $showRightColumn) {
        $classContent = 'rightbar';
    } else if ($showLeftColumn && !$showRightColumn) {
        $classContent = 'leftbar';
    }
}
?>
<!DOCTYPE html>
<html xmlns="http://www.w3.org/1999/xhtml" xml:lang="<?php echo $this->language; ?>" lang="<?php echo $this->language; ?>" dir="<?php echo $this->direction; ?>">
<head>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <jdoc:include type="head" />
</head>

<?php if ($menu->getActive() == $menu->getDefault()) { ?>
    <body class="index">
<?php } else { ?>
    <body>
<?php } ?>

    <div id="header" class="container">

        <h1>
            <a href="<?php echo $this->baseurl; ?>"><?php echo $app->getCfg('sitename'); ?></a>
        </h1>

        <?php if($this->countModules('search')) : ?>
            <div id="search">
                <jdoc:include type="modules" name="search" style="none" />
            </div>
        <?php endif; ?>

        <?php if ($this->countModules('menu')) : ?>
            <div id="menu">
                <jdoc:include type="modules" name="menu" style="none" />
            </div>
        <?php endif; ?>

    </div>

    <div id="main" class="container">

        <?php if ($option != 'com_search' && $this->countModules('left')) : ?>
            <div id="left">
                <jdoc:include type="modules" name="left" style="xhtml" />
            </div>
        <?php endif; ?>

        <div id="content" class="<?php echo $classContent; ?>">

            <?php if($this->countModules('breadcrumbs')) : ?>
                <div id="breadcrumbs">
                    <p>You are in:</p>
                    <jdoc:include type="modules" name="breadcrumbs" style="none" />
                </div>
            <?php endif; ?>

            <jdoc:include type="message" />

            <?php if ($menu->getActive() != $menu->getDefault()) { ?>
                <jdoc:include type="component" />
            <?php } ?>

            <?php if ($option != 'com_search' && $this->countModules('content')) : ?>
                <jdoc:include type="modules" name="content" style="xhtml" />
            <?php endif; ?>

        </div>

        <?php if ($option != 'com_search' && $this->countModules('right')) : ?>
            <div id="right">
                <jdoc:include type="modules" name="right" style="xhtml" />
            </div>
        <?php endif; ?>

    </div>

    <div id="footer" class="container">

        <?php if($this->countModules('footer')) : ?>
            <jdoc:include type="modules" name="footer" style="none" />
        <?php endif; ?>

        <?php echo '&copy;' . date('Y') . ' A blank Template for Joomla 3.0'; ?>

    </div>

    <jdoc:include type="modules" name="debug" style="none" />

</body>
</html>