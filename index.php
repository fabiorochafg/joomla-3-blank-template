<?php
defined('_JEXEC') or die;

$app = JFactory::getApplication();
$doc = JFactory::getDocument();
$menu = $app->getMenu();
$option = JRequest::GetWord('option');

$doc -> addStyleSheet('templates/' . $this->template . '/css/main.css');
$doc -> addScript('templates/' . $this->template . '/js/main.js');
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
<html lang="<?php echo $this->language; ?>" dir="<?php echo $this->direction; ?>">
<head>
<meta property="viewport" content="width=device-width, initial-scale=1">
<meta property="og:site_name" content="<?php echo $app->getCfg('sitename'); ?>" />
<meta property="og:type" content="article" />
<?php
$article = JTable::getInstance("content"); 
$article->load(JRequest::getInt("id"));
$article_images = $article->get("images");
$pictures = json_decode($article_images);
$article_title = $article->get("title");
$article_uri = JFactory::getURI();
$absolute_url = $article_uri->toString();
echo '<meta property="og:image" content="'.$pictures->{'image_intro'}.'" />';
echo '<meta property="og:title" content="'.$article_title.'" />';
echo '<meta property="og:url" content="'.$absolute_url.'" />';
?>
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
            <jdoc:include type="modules" name="search" />
        </div>
    <?php endif; ?>

    <?php if ($this->countModules('menu')) : ?>
        <nav>
            <jdoc:include type="modules" name="menu" />
        </nav>
    <?php endif; ?>

</header>

<section class="container">        

    <article class="<?php echo $classContent; ?>">

        <?php if($this->countModules('breadcrumbs')) : ?>
            <div id="breadcrumbs">
                <p>You are in:</p>
                <jdoc:include type="modules" name="breadcrumbs" />
            </div>
        <?php endif; ?>

        <jdoc:include type="message" />

        <?php if ($menu->getActive() != $menu->getDefault()) { ?>
            <jdoc:include type="component" />
        <?php } ?>

        <?php if ($option != 'com_search' && $this->countModules('content')) : ?>
            <jdoc:include type="modules" name="content" style="html5" />
        <?php endif; ?>

    </article>

    <?php if ($option != 'com_search' && $this->countModules('left')) : ?>
        <aside class="left">
            <jdoc:include type="modules" name="left" style="html5" />
        </aside>
    <?php endif; ?>

    <?php if ($option != 'com_search' && $this->countModules('right')) : ?>
        <aside class="right">
            <jdoc:include type="modules" name="right" style="html5" />
        </aside>
    <?php endif; ?>

</section>

<footer class="container">

    <?php if($this->countModules('footer')) : ?>
        <jdoc:include type="modules" name="footer" style="html5" />
    <?php endif; ?>

    <?php echo '<dl>
        <dt>Template</dt>
        <dd>Joomla Blank Template</dd>
        <dt>Developed by</dt>
        <dd><a href="http://solutibrasil.com.br">http://solutibrasil.com.br</a></dd>
        <dt>E-mail</dt>
        <dd><a href="mailto:contato@solutibrasil.com.br">contato@solutibrasil.com.br</a></dd>
    </dl>
    <a href="#" id="go-to-top">Go to Top</a>'; ?>

</footer>

<jdoc:include type="modules" name="debug" />

</body>
</html>