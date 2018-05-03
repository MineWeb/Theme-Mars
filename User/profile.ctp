<br><br>
<div class="container">
  <?= $this->element('flash') ?>
  <div class="panel panel-default">
      <div class="panel-heading white"  id="panel-head"><span class="white">Mon profil</span></div>
      <div class="panel-body">

        <div class="row">
    <div class="col-sm-6">
      <div class="form-group">
        <label><?= $Lang->get('USER__USERNAME') ?></label>
        <input type="text" class="form-control" value="<?= $user['pseudo'] ?>" disabled>
      </div>
    </div>
    <div class="col-sm-6">
      <div class="form-group">
        <label><?= $Lang->get('USER__EMAIL') ?></label>
        <input type="text" class="form-control" value="<?= $user['email'] ?>" disabled>
      </div>
    </div>
  </div>

  <div class="row">
    <div class="col-sm-6">
      <div class="form-group">
        <label><?= $Lang->get('USER__RANK') ?></label>
          <?php foreach ($available_ranks as $key => $value) {
            if($user['rank'] == $key) {
              $rank = $value;
              break;
            }
          } ?>
        <input type="text" class="form-control" value="<?= $rank ?>" disabled>
      </div>
    </div>
    <div class="col-sm-6">
      <div class="form-group">
        <label><?= $Lang->get('IP') ?></label>
        <input type="text" class="form-control" value="<?= $user['ip'] ?>" disabled>
      </div>
    </div>
  </div>

  <div class="row">
    <div class="col-sm-6">
      <div class="form-group">
        <label><?= $Lang->get('GLOBAL__CREATED') ?></label>
        <input type="text" class="form-control" value="<?= $Lang->date($user['created']) ?>" disabled>
      </div>
    </div>
    <?php if($EyPlugin->isInstalled('eywek.shop')) { ?>
      <div class="col-sm-6">
        <div class="form-group">
          <label><?= $Lang->get('USER__MONEY') ?></label>
          <input type="text" class="form-control" value="<?= $user['money'] ?>" disabled>
        </div>
      </div>
    <?php } ?>
  </div>
      </div>
  </div>


  <!-- Changer le Mot de passe -->
  <div class="panel panel-default">
      <div class="panel-heading" id="panel-head"><span class="white"><?= $Lang->get('USER__UPDATE_PASSWORD') ?></span></div>
      <div class="panel-body">
        <div class="panel-body" style="padding: 30px 20px;">
          <form method="post" data-ajax="true" action="<?= $this->Html->url(array('plugin' => null, 'controller' => 'user', 'action' => 'change_pw')) ?>">

      <div class="row">
        <div class="col-sm-6">
          <div class="form-group">
            <label><?= $Lang->get('USER__PASSWORD') ?></label>
            <input type="password" class="form-control" name="password">
          </div>
        </div>
        <div class="col-sm-6">
          <div class="form-group">
            <label><?= $Lang->get('USER__PASSWORD_CONFIRM') ?></label>
            <input type="password" class="form-control" name="password_confirmation">
          </div>
        </div>
      </div>

      <div class="text-right">
        <button type="submit" class="btn btn-primary btn-large"><i class="fa fa-save"></i> <?= $Lang->get('GLOBAL__SUBMIT') ?></button>
      </div>

    </form>
        </div>
      </div>
    </div>


  <!-- Changer l'Email' -->
  <?php if($Permissions->can('EDIT_HIS_EMAIL')) { ?>
  <div class="panel panel-default">
      <div class="panel-heading" id="panel-head"><span class="white"><?= $Lang->get('USER__UPDATE_EMAIL') ?></span></div>
      <div class="panel-body">

        <div class="panel-body" style="padding: 30px 20px;">
          <form method="post" data-ajax="true" action="<?= $this->Html->url(array('plugin' => null, 'controller' => 'user', 'action' => 'change_email')) ?>">

    <div class="row">
      <div class="col-sm-6">
        <div class="form-group">
          <label><?= $Lang->get('USER__EMAIL') ?></label>
          <input type="email" class="form-control" name="email">
        </div>
      </div>
      <div class="col-sm-6">
        <div class="form-group">
          <label><?= $Lang->get('USER__EMAIL_CONFIRM_LABEL') ?></label>
          <input type="email" class="form-control" name="email_confirmation">
        </div>
      </div>
    </div>

    <div class="text-right">
      <button type="submit" class="btn btn-primary btn-large"><?= $Lang->get('GLOBAL__SUBMIT') ?></button>
    </div>

  </form>
        </div>


      </div>
    </div>
    <?php } ?>

    <?php if($EyPlugin->isInstalled('eywek.shop')) { ?>

      <div class="panel panel-default">
            <h3 class="panel-title" id="panel-head"><?= $Lang->get('SHOP__USER_POINTS_TRANSFER') ?></h3>
          <div class="panel-body" style="padding: 30px 20px;">
            <form method="post" data-ajax="true" action="<?= $this->Html->url(array('plugin' => 'shop', 'controller' => 'payment', 'action' => 'transfer_points')) ?>">

      <div class="row">
        <div class="col-sm-6">
          <div class="form-group">
            <label><?= $Lang->get('SHOP__USER_POINTS_TRANSFER_WHO') ?></label>
            <input type="text" class="form-control" name="to">
          </div>
        </div>
        <div class="col-sm-6">
          <div class="form-group">
            <label><?= $Lang->get('SHOP__USER_POINTS_TRANSFER_HOW_MANY') ?></label>
            <input type="text" class="form-control" name="how">
          </div>
        </div>
      </div>

      <div class="text-right">
        <button type="submit" class="btn btn-primary btn-large"><?= $Lang->get('GLOBAL__SUBMIT') ?></button>
      </div>

    </form>
          </div>
        </div>
    <?php } ?>




    <?php if($can_skin) { ?>

          <div class="panel panel-default">
                <h3 class="panel-title" id="panel-head"><?= $Lang->get('API__SKIN_LABEL') ?></h3>
              <div class="panel-body" style="padding: 30px 20px;">
                <p class="lead" style="font-size:16px;">
          <u><?= $Lang->get('USER__PROFILE_FORM_IMG') ?> :</u><br>
          - <?= $Lang->get('USER__IMG_UPLOAD_TYPE_PNG') ?><br>
          - <?= str_replace('{PIXELS}', $skin_width_max, $Lang->get('USER__IMG_UPLOAD_WIDTH_MAX')) ?><br>
          - <?= str_replace('{PIXELS}', $skin_height_max, $Lang->get('USER__IMG_UPLOAD_HEIGHT_MAX')) ?><br>
        </p>

        <form class="form-inline" method="post" id="skin" method="post" data-ajax="true" data-upload-image="true" action="<?= $this->Html->url(array('action' => 'uploadSkin')) ?>">
          <div class="form-group">
            <input name="image" type="file">
          </div>
          <input name="data[_Token][key]" value="<?= $csrfToken ?>" type="hidden">
          <button type="submit" class="btn btn-primary btn-large"><?= $Lang->get('GLOBAL__SUBMIT') ?></button>
        </form>
              </div>
            </div>

    <?php } ?>

    <?php if($can_cape) { ?>

        <div class="panel panel-default">


            <h3 class="panel-title" id="panel-head"><?= $Lang->get('API__CAPE_LABEL') ?></h3>


          <div class="panel-body" style="padding: 30px 20px;">

            <p class="lead" style="font-size:16px;">
              <u><?= $Lang->get('USER__PROFILE_FORM_IMG') ?> :</u><br>
              - <?= $Lang->get('USER__IMG_UPLOAD_TYPE_PNG') ?><br>
              - <?= str_replace('{PIXELS}', $cape_width_max, $Lang->get('USER__IMG_UPLOAD_WIDTH_MAX')) ?><br>
              - <?= str_replace('{PIXELS}', $cape_height_max, $Lang->get('USER__IMG_UPLOAD_HEIGHT_MAX')) ?><br>
            </p>


            <form class="form-inline" method="post" id="cape" method="post" data-ajax="true" data-upload-image="true" action="<?= $this->Html->url(array('action' => 'uploadCape')) ?>">
              <div class="form-group">
                <input name="image" type="file">
              </div>
              <input name="data[_Token][key]" value="<?= $csrfToken ?>" type="hidden">
              <button type="submit" class="btn btn-primary btn-large"><?= $Lang->get('GLOBAL__SUBMIT') ?></button>
            </form>


          </div>
        </div>

    <?php } ?>

    <?php if($Configuration->getKey('mineguard') == "true") { ?>
      <div class="box clearfix no-mb">

          <div class="panel panel-default">
                <h3 class="panel-title" id="panel-head"><?= $Lang->get('API__MINEGUARD_LABEL') ?></h3>
              <div class="panel-body" style="padding: 30px 20px;">
                <p class="lead" style="font-size:18px;">
          <?= $Lang->get('API__MINEGUARD_EXPLAIN') ?>
        </p>

        <div class="row">
          <div class="col-md-8">
            <table class="table">
              <thead>
                <tr>
                  <th><?= $Lang->get('IP') ?></th>
                  <th><?= $Lang->get('GLOBAL__ACTIONS') ?></th>
                </tr>
              </thead>
              <tbody id="table-ip">
                <?php
                foreach ($api as $key => $value) { ?>
                  <tr id="<?= $key ?>">
                    <th><?= $value ?></th>
                    <th><button data-ip-id="<?= $key ?>" class="btn btn-danger delete_ip"><?= $Lang->get('GLOBAL__DELETE') ?></button></th>
                  </tr>
                <?php } ?>
              </tbody>

            </table>
          </div>

          <div class="col-md-4">
            <form method="post" data-ajax="true" action="<?= $this->Html->url(array('controller' => 'api', 'action' => 'add_ip')) ?>" data-callback-function="addIP">
              <div class="form-group">
                <input type="text" class="form-control" name="ip" placeholder="<?= $Lang->get('IP') ?>">
              </div>

              <div class="form-group">
                <button type="submit" class="btn btn-success"><?= $Lang->get('GLOBAL__ADD') ?></button>
              </div>
            </form>
          </div>
        </div>
              </div>
            </div>





      </div>
    <?php } ?>
    <?= $Module->loadModules('user_profile') ?>
  </div>
