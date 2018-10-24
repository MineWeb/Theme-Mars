<div class="slider" wfd-id="86">
  <div class="slider-in" wfd-id="87">
    <center>
      <b>
        <h2 class="slider-title"><span class="color" wfd-id="88"><?= $Lang->get('USER__LOGIN') ?></span></h2>
      </b>
      <br><br>
    </center>
  </div>
</div>
<div class="container">
    <div class="row">
        <div class="col-md-6 col-md-push-3">
            <div class="thumbnail text-center" style="background-color:transparent;border:none;margin-top:20px;" style="padding:15px">
                <form method="post" data-redirect-url="?" data-ajax="true" action="<?= $this->Html->url(array('plugin' => null, 'admin' => false, 'controller' => 'user', 'action' => 'ajax_login')) ?>">
                    <input type="hidden" name="data[_Token][key]" value="<?= $csrfToken ?>" />
                    <div class="form-group">
                        <div class="input-group">
                            <span class="input-group-addon">
                                <i class="fa fa-user"></i>
                            </span>
                            <input class="form-control" name="pseudo" placeholder="<?= $Lang->get('USER__USERNAME_LABEL') ?>" type="text" autofocus />
                        </div>
                    </div>
                    <div class="form-group">
                        <div class="input-group">
                            <span class="input-group-addon">
                                <i class="fa fa-lock"></i>
                            </span>
                            <input class="form-control" name="password" placeholder="<?= $Lang->get('USER__PASSWORD_LABEL') ?>" type="password" autofocus />
                        </div>
                    </div>
                    <div class="form-group">
                        <div class="checkbox">
                            <input type="checkbox" name="remember_me">
                            <label><?= $Lang->get('USER__REMEMBER_ME') ?></label>
                        </div>
                    </div>
                    <div class="form-group">
                        <input type="submit" class="btn btn-primary" value="<?= $Lang->get('USER__LOGIN') ?>" />
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>