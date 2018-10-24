<header>
    <div class="navbar-main">
        <nav class="navbar navbar-default header-top">
            <div class="container">
                <div class="col-lg-10 col-lg-offset-1">
                  <div class="navbar-header">
                    <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#navbar" aria-expanded="false" aria-controls="navbar">
                      <span class="sr-only">Toggle navigation</span>
                      <span class="icon-bar"></span>
                      <span class="icon-bar"></span>
                      <span class="icon-bar"></span>
                    </button>
                    <a class="navbar-brand" href="<?= $this->Html->url('/') ?>"><img height="42px;" src="<?= $theme_config['m_logo'] ?>"></a>
                  </div>

                  <div id="navbar" class="navbar-collapse collapse navbar-right">
                    <ul class="nav navbar-nav navbar-right">
                        <?php
                        if(!empty($nav)) {
                          $i = 0;
                          foreach ($nav as $key => $value) { ?>
                            <?php if(empty($value['Navbar']['submenu'])) { ?>
                              <li class="li-nav">
                                  <a href="<?= $value['Navbar']['url'] ?>">
                                    <span class="white hcolor"><b>
                                        <?php if(!empty($value['Navbar']['icon'])): ?>
                                            <i class="fa fa-<?= $value['Navbar']['icon'] ?>"></i>
                                        <?php endif; ?>
                                      <?= $value['Navbar']['name'] ?></b>
                                    </span>
                                  </a>
                              </li>
                            <?php } else { ?>
                              <li class="dropdown">
                                <a href="#" id="menu-dropdown" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-expanded="false"><span class="white hcolor"><b>
                                <?php if(!empty($value['Navbar']['icon'])): ?>
                                <i class="fa fa-<?= $value['Navbar']['icon'] ?>"></i>
                                <?php endif; ?>
                                <?= $value['Navbar']['name'] ?>
                                </b> <span class="caret"></span></span></a>
                                <ul class="dropdown-menu" role="menu">
                                <?php
                                $submenu = json_decode($value['Navbar']['submenu']);
                                foreach ($submenu as $k => $v) {
                                ?>
                                  <li><a href="<?= rawurldecode(rawurldecode($v)) ?>"<?= ($value['Navbar']['open_new_tab']) ? ' target="_blank"' : '' ?> id="navbar-dropdown-item"><?= rawurldecode(str_replace('+', ' ', $k)) ?></a></li>
                                <?php } ?>
                                </ul>
                              </li>
                            <?php } ?>
                            <?php
                              $i++;
                            }
                          } ?>


                      </ul>
                  </div>
                </div>
            </div>
        </nav>
    </div>
  <div class="header-bottom">
    <center>
      <?php if(!$isConnected){ ?>
        <?php if($EyPlugin->isInstalled('phpierre.signinup')) { ?>
            <a href="/login" class="hcolor white">Se connecter</a>
            <a href="/register" class="hwhite color">S'incrire</a>
        <?php } else { ?>
            <a href="#login" class="hcolor white">Se connecter</a>
            <a href="#register" class="hwhite color">S'incrire</a>
        <?php } ?>
      <?php }else{ ?>
        <a href="<?= $this->Html->url(array('controller' => 'profile', 'action' => 'index', 'plugin' => false)); ?>" class="hcolor white"><?= $Lang->get('USER__PROFILE'); ?></a>
        <a href="#notifications_modal" onclick="notification.markAllAsSeen(2)" id="navbar-dropdown-item" class="hcolor white"><span class="notification-indicator"></span>Notification</a>
        <?php if($Permissions->can('ACCESS_DASHBOARD')) { ?>
        <a href="<?= $this->Html->url(array('controller' => 'admin', 'action' => 'index', 'plugin' => false, 'admin' => true)) ?>" class="color hwhite"><?= $Lang->get('GLOBAL__ADMIN_PANEL') ?></a>
        <?php } ?>
        <a href="<?= $this->Html->url(array('controller' => 'user', 'action' => 'logout', 'plugin' => false)) ?>" class="hcolor white"><?= $Lang->get('USER__LOGOUT') ?></a>

        <?php } ?>
    </center>
  </div>
</header>
