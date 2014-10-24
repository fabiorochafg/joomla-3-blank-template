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
<html lang="<?php echo $this->language; ?>" dir="<?php echo $this->direction; ?>">
<head>
<meta name="viewport" content="width=device-width, initial-scale=1">
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

<section class="container"> 
    <h2>Lorem Ipsum</h2>
    <p>Eiiitaaa Mainhaaa!! Esse Lorem ipsum é só na sacanageeem!! E que abundância meu irmão viuu!! Assim você vai matar o papai. Só digo uma coisa, Domingo ela não vai! Danadaa!! Vem minha odalisca, agora faz essa cobra coral subir!!! Pau que nasce torto, Nunca se endireita. Tchannn!! Tchannn!! Tu du du pááá! Eu gostchu muitchu, heinn! danadinha! Mainhaa! Agora use meu lorem ipsum ordinária!!! Olha o quibeee! rema, rema, ordinária!.</p>
    <p>Você usa o Lorem Ipsum tradicional? Sabe de nada inocente!! Conheça meu lorem que é Tchan, Tchan, Tchannn!! Txu Txu Tu Paaaaa!! Vem, vem ordinária!! Venha provar do meu dendê que você não vai se arrepender. Só na sacanageeem!! Eu gostchu muitchu, heinn! Eitchaaa template cheio de abundância danadaaa!! Assim você mata o papai hein!? Etâaaa Mainhaaaaa...me abusa nesse seu layout, me gera, me geraaaa ordinária!!! Só na sacanagem!!!! Venha provar do meu dendê Tu du du pááá!.</p>
</section>

<footer class="container">

    <?php if($this->countModules('footer')) : ?>
        <jdoc:include type="modules" name="footer" style="none" />
    <?php endif; ?>

    <?php echo '<dl>
        <dt>Template</dt>
        <dd>Joomla 3 Blank Template</dd>
        <dt>Developed by</dt>
        <dd>Fabio Rocha Ferreira Gomes</dd>
        <dt>Site</dt>
        <dd><a href="http://fabiorochafg.github.io">http://fabiorochafg.github.io</a></dd>
        <dt>E-mail</dt>
        <dd><a href="fabiorochafg@gmail.com">fabiorochafg@gmail.com</a></dd>
    </dl>
    <a href="#" id="top-of-the-page">Top of the page</a>'; ?>

</footer>

<jdoc:include type="modules" name="debug" style="none" />

</body>
</html>