<?php
defined('_JEXEC') or die;

$app = JFactory::getApplication();
$doc = JFactory::getDocument();
$menu = JSite::getMenu();
$option = JRequest::GetWord('option');

$doc -> addStyleSheet('templates/' . $this->template . '/css/main.css');
$doc -> addScript('templates/' . $this->template . '/js/main.js', 'text/javascript');
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
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <meta content="Joomla 3 Blank Template" name="description" />
    <link rel="icon" href="/templates/<?php echo $this->template; ?>/favicon.ico" type="image/x-icon" />
    <jdoc:include type="head" />
</head>

<?php if ($menu->getActive() == $menu->getDefault()) { ?>
    <body class="index">
<?php } else { ?>
    <body>
<?php } ?>

    <header class="container">

        <h1>
            <a href="<?php echo $this->baseurl; ?>"><?php echo $app->getCfg('sitename'); ?></a>
        </h1>

        <?php if($this->countModules('search')) : ?>
            <div id="search">
                <jdoc:include type="modules" name="search" style="none" />
            </div>
        <?php endif; ?>

        <?php if ($this->countModules('menu')) : ?>
            <nav>
                <jdoc:include type="modules" name="menu" style="none" />
            </nav>
        <?php endif; ?>

    </header>

    <section class="container">        

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

        <?php if ($option != 'com_search' && $this->countModules('left')) : ?>
            <div id="left">
                <jdoc:include type="modules" name="left" style="xhtml" />
            </div>
        <?php endif; ?>

        <?php if ($option != 'com_search' && $this->countModules('right')) : ?>
            <div id="right">
                <jdoc:include type="modules" name="right" style="xhtml" />
            </div>
        <?php endif; ?>

    </section>

    <footer class="container">

        <?php if($this->countModules('footer')) : ?>
            <jdoc:include type="modules" name="footer" style="none" />
        <?php endif; ?>

        <?php echo 'Joomla 3.0 Blank Template - Developed by Fabio Rocha (<a href="https://github.com/fabiorochafg">https://github.com/fabiorochafg</a> | <a href="mailto:fabiorochafg@gmail.com">fabiorochafg@gmail.com</a>)'; ?>

    </footer>

    <jdoc:include type="modules" name="debug" style="none" />

</body>
</html>