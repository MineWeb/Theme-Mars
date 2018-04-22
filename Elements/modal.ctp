<div id="login" class="modalDialog">
    <div>

      <div class="modal-dialog">
        <div class="modal-content">
          <div class="modal-header bg-color">
            <a class="close" href="#close"><span aria-hidden="true" href="#close" class="close black">&times;</span><span class="sr-only"><?= $Lang->get('GLOBAL__CLOSE') ?></a></span></a>
            <h4 class="modal-title" id="myModalLabel"><?= $Lang->get('USER__LOGIN') ?></h4>
          </div>
          <div class="modal-body">
            <form class="form-horizontal" method="POST" data-ajax="true" action="<?= $this->Html->url(array('plugin' => null, 'admin' => false, 'controller' => 'user', 'action' => 'ajax_login')) ?>" data-redirect-url="?">

              <div class="form-group">
                <label for="inputEmail3" class="col-sm-2 control-label"><?= $Lang->get('USER__USERNAME') ?></label>
                <div class="col-sm-10">
                  <input type="text" class="form-control" name="pseudo" id="inputEmail3" placeholder="<?= $Lang->get('USER__USERNAME_LABEL') ?>">
                </div>
              </div>

              <div class="form-group">
                <label class="col-sm-2 control-label"><?= $Lang->get('USER__PASSWORD') ?></label>
                <div class="col-sm-10">
                  <input type="password" class="form-control" name="password" placeholder="<?= $Lang->get('USER__PASSWORD_LABEL') ?>">
                </div>
              </div>

              <div class="form-group">
                <div class="col-sm-offset-2 col-sm-10">
                  <div class="checkbox">
                    <label>
                      <input type="checkbox" name="remember_me">
                      <?= $Lang->get('USER__REMEMBER_ME') ?>
                    </label>
                  </div>
                </div>
              </div>

              <center><a class="color" href="#lostpassword"><?= $Lang->get('USER__PASSWORD_FORGOT_LABEL') ?></a></center>
          </div>
          <div class="modal-footer bg-color">
            <a class="btn btn-danger" data-dismiss="modal" href="#close"><?= $Lang->get('GLOBAL__CLOSE') ?></a>
            <button type="submit" class="btn btn-danger"><?= $Lang->get('USER__LOGIN') ?></button>
          </form>
          </div>
        </div>
      </div>
</div>
</div>

<div id="register" class="modalDialog">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header bg-color">
        <a class="close" href="#close"><span aria-hidden="true" href="#close" class="close">&times;</span><span class="sr-only"><?= $Lang->get('GLOBAL__CLOSE') ?></a></span></a>
        <h4 class="modal-title" id="myModalLabel"><?= $Lang->get('USER__REGISTER') ?></h4>
      </div>
      <div class="modal-body">
        <form class="form-horizontal" method="POST" data-ajax="true" action="<?= $this->Html->url(array('plugin' => null, 'admin' => false, 'controller' => 'user', 'action' => 'ajax_register')) ?>" data-redirect-url="?">
          <div class="form-group">
            <label  class="col-sm-2 control-label"><?= $Lang->get('USER__USERNAME') ?></label>
            <div class="col-sm-10">
              <input type="text" class="form-control" name="pseudo" placeholder="<?= $Lang->get('USER__USERNAME_LABEL') ?>">
            </div>
          </div>
          <div class="form-group">
            <label  class="col-sm-2 control-label"><?= $Lang->get('USER__PASSWORD') ?></label>
            <div class="col-sm-10">
              <input type="password" class="form-control" name="password" placeholder="<?= $Lang->get('USER__PASSWORD_LABEL') ?>">
            </div>
          </div>
          <div class="form-group">
            <label  class="col-sm-2 control-label"><?= $Lang->get('USER__PASSWORD_CONFIRM') ?></label>
            <div class="col-sm-10">
              <input type="password" class="form-control" name="password_confirmation" placeholder="<?= $Lang->get('USER__PASSWORD_CONFIRM_LABEL') ?>">
            </div>
          </div>
          <div class="form-group">
            <label  class="col-sm-2 control-label"><?= $Lang->get('USER__EMAIL') ?></label>
            <div class="col-sm-10">
              <input type="email" class="form-control" name="email" placeholder="<?= $Lang->get('USER__EMAIL_LABEL') ?>">
            </div>
          </div>
          <?php if($reCaptcha['type'] == "google") { ?>
            <script src='https://www.google.com/recaptcha/api.js'></script>
            <div class="form-group">
              <label class="col-sm-2 control-label"><?= $Lang->get('FORM__CAPTCHA') ?></label>
              <div class="col-sm-10">
                <div class="g-recaptcha" data-sitekey="<?= $reCaptcha['siteKey'] ?>"></div>
              </div>
            </div>
          <?php } else { ?>
            <div class="form-group">
              <label for="inputPassword3" class="col-sm-2 control-label"><?= $Lang->get('FORM__CAPTCHA') ?></label>
              <div class="col-sm-10">
                <?php
                  echo $this->Html->image(array('controller' => 'user', 'action' => 'get_captcha', 'plugin' => false, 'admin' => false), array('plugin' => false, 'admin' => false, 'id' => 'captcha_image'));
                  echo $this->Html->link($Lang->get('FORM__RELOAD_CAPTCHA'), 'javascript:void(0);',array('id' => 'reload'));
                ?>
              </div>
            </div>
            <div class="form-group">
              <label class="col-sm-2 control-label"></label>
              <div class="col-sm-10">
                <input type="text" class="form-control" name="captcha" id="inputPassword3" placeholder="<?= $Lang->get('FORM__CAPTCHA_LABEL') ?>">
              </div>
            </div>
          <?php } ?>
      </div>
      <div class="modal-footer bg-color">
        <a class="btn btn-danger" data-dismiss="modal" href="#close"><?= $Lang->get('GLOBAL__CLOSE') ?></a>
        <button type="submit" class="btn"><?= $Lang->get('USER__REGISTER') ?></button>
        </form>
      </div>
    </div>
  </div>
</div>

<!-- Password -->

<div id="lostpassword" class="modalDialog">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header bg-color">
        <button type="button" class="close" data-dismiss="modal"><span aria-hidden="true">&times;</span><span class="sr-only"><?= $Lang->get('GLOBAL__CLOSE') ?></span></button>
        <h4 class="modal-title" id="myModalLabel"><?= $Lang->get('USER__PASSWORD_FORGOT_LABEL') ?></h4>
      </div>
      <div class="modal-body">
        <form class="form-horizontal" method="POST" data-ajax="true" action="<?= $this->Html->url(array('plugin' => null, 'admin' => false, 'controller' => 'user', 'action' => 'ajax_lostpasswd')) ?>">
          <div class="form-group">
            <label class="col-sm-2 control-label"><?= $Lang->get('USER__EMAIL') ?></label>
            <div class="col-sm-10">
              <input type="text" class="form-control" name="email" placeholder="<?= $Lang->get('USER__EMAIL_LABEL') ?>">
            </div>
          </div>
      </div>
      <div class="modal-footer bg-color">
          <a class="btn-red-small button" data-dismiss="modal" href="#close"><?= $Lang->get('GLOBAL__CLOSE') ?></a>
        <button type="submit" class="btn-green-small button"><?= $Lang->get('USER__PASSWORD_FORGOT_SEND_MAIL') ?></button>
      </form>
      </div>
    </div>
  </div>
</div>

<?php if(!empty($resetpsswd)) { ?>
  <div id="lostpassword" class="modalDialog">
    <div class="modal-dialog">
      <div class="modal-content">
        <div class="modal-header bg-color">
          <button type="button" class="close" data-dismiss="modal"><span aria-hidden="true">&times;</span><span class="sr-only"><?= $Lang->get('GLOBAL__CLOSE') ?></span></button>
          <h4 class="modal-title" id="myModalLabel"><?= $Lang->get('USER__PASSWORD_FORGOT_LABEL') ?></h4>
        </div>
        <div class="modal-body">
          <form class="form-horizontal" method="POST" data-ajax="true" action="<?= $this->Html->url(array('plugin' => null, 'admin' => false, 'controller' => 'user', 'action' => 'ajax_resetpasswd')) ?>" data-redirect-url="?">
            <input type="hidden" name="key" value="<?= $resetpsswd['key'] ?>">
            <input type="hidden" name="email" value="<?= $resetpsswd['email'] ?>">
            <div class="form-group">
              <label  class="col-sm-2 control-label"><?= $Lang->get('USER__PASSWORD') ?></label>
              <div class="col-sm-10">
                <input type="password" class="form-control" name="password" placeholder="<?= $Lang->get('USER__PASSWORD_LABEL') ?>">
              </div>
            </div>
            <div class="form-group">
              <label  class="col-sm-2 control-label"><?= $Lang->get('USER__PASSWORD_CONFIRM') ?></label>
              <div class="col-sm-10">
                <input type="password" class="form-control" name="password2" placeholder="<?= $Lang->get('USER__PASSWORD_CONFIRM_LABEL') ?>">
              </div>
            </div>
        </div>
        <div class="modal-footer bg-color">
            <a class="btn-red-small button" data-dismiss="modal" href="#close"><?= $Lang->get('GLOBAL__CLOSE') ?></a>
          <button type="submit" class="btn-green-small button"><?= $Lang->get('GLOBAL__SAVE') ?></button>
        </form>
        </div>
      </div>
    </div>
  </div>
<?php } ?>

<!-- Notification -->

<?php if($isConnected) { ?>
  <div id="notifications_modal" class="modalDialog">
    <div class="modal-dialog">
      <div class="modal-content">
        <div class="modal-header bg-color">
          <h4 class="modal-title"><?= $Lang->get('NOTIFICATIONS__LIST') ?></h4>
          <a class="close" href="#close"><span aria-hidden="true" href="#close" class="close">&times;</span><span class="sr-only"><?= $Lang->get('GLOBAL__CLOSE') ?></a></span></a>
        </div>
        <div class="modal-body" style="padding:0;">

          <div class="notifications-list" style="color:black;"></div>

        </div>
        <div class="modal-footer bg-color">
          <button type="button" class="btn btn-info" onclick="notification.markAllAsSeen()" data-dismiss="modal"><?= $Lang->get('NOTIFICATIONS__MARK_ALL_AS_SEEN') ?></button>
          <button type="submit" class="btn btn-danger" onclick="notification.clearAll()" data-dismiss="modal"><?= $Lang->get('NOTIFICATIONS__CLEAR_ALL') ?></button>
        </div>
      </div>
    </div>
  </div>
<?php } ?>
