<?php defined( '_JEXEC' ) or die;

JHtml::script(Juri::base() . 'templates/'.$this->template.'/build/app.js');
JHtml::stylesheet(Juri::base() . 'templates/'.$this->template.'/build/style.css');

?><!doctype html>
<html lang="<?php echo $this->language; ?>">

<head>
  <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1" />
  <jdoc:include type="head" />
</head>

<body class="jd19de <?php echo $active->alias . ' ' . $pageclass; ?>">

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
      <jdoc:include type="message" />
      <jdoc:include type="component" />
    </div>
  </main>

  <footer id="particles-nav" >
    <div class="wrap-inside">
      <jdoc:include type="modules" name="footer" style="xhtml" />
    </div>
  </footer>

</body>

</html>
