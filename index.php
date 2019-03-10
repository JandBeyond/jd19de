<?php defined( '_JEXEC' ) or die;

JHtml::script(Juri::base() . 'templates/'.$this->template.'/build/app.js');
JHtml::stylesheet(Juri::base() . 'templates/'.$this->template.'/build/style.css');

$app = JFactory::getApplication();
$params = $app->getParams();
$pageclass = $params->get('pageclass_sfx');
$menu = $app->getMenu();
$active = $app->getMenu()->getActive();

?><!doctype html>
<html lang="<?php echo $this->language; ?>">

<head>
  <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1" />
  <jdoc:include type="head" />
</head>

<body class="jd19de <?php echo $active->alias . ' ' . $pageclass; ?>">
  <div id="particles-nav">

    <nav role="navigation">
      <div id="mainMenu" class="wrap-inside">
        <input type="checkbox" />
        <span></span>
        <span></span>
        <span></span>
        <jdoc:include type="modules" name="menu" />
      </div>
    </nav>

    <header>
      <div class="wrap-inside">
        <jdoc:include type="modules" name="header" />
      </div>
    </header>

    <main>
      <div class="wrap-inside">
        <?php if ($this->countModules( 'intro' )) : ?>
          <section class="intro">
            <jdoc:include type="modules" name="intro" />
          </section>
        <?php endif; ?>

        <?php if (
          $this->countModules('top_a') ||
          $this->countModules('top_b') ||
          $this->countModules('top_c')
        ) : ?>
          <section id="top">
            <jdoc:include type="modules" name="top_a" />
            <jdoc:include type="modules" name="top_b" />
            <jdoc:include type="modules" name="top_c" />
          </section>
        <?php endif; ?>

        <div class="main-content">
          <article>
            <jdoc:include type="message" />
            <jdoc:include type="component" />
          </article>

          <aside>
            <jdoc:include type="modules" name="sidebar" />
          </aside>
        </div>

        <?php if (
          $this->countModules('bottom_a') ||
          $this->countModules('bottom_b') ||
          $this->countModules('bottom_c')
        ) : ?>
          <section id="bottom">
            <jdoc:include type="modules" name="bottom_a" />
            <jdoc:include type="modules" name="bottom_b" />
            <jdoc:include type="modules" name="bottom_c" />
          </section>
        <?php endif; ?>
      </div>
    </main>

    <footer>
      <div class="wrap-inside">
        <jdoc:include type="modules" name="footer" style="xhtml" />
      </div>
    </footer>

  </div>
</body>

</html>