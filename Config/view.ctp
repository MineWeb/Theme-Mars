<?php
$form_input = array('title' => $Lang->get('THEME__UPLOAD_LOGO'));

if(isset($config['logo']) && $config['logo']) {
  $form_input['img'] = $config['logo'];
  $form_input['filename'] = 'theme_logo.png';
}

?>
<section class="content">
  <div class="row">
    <div class="col-md-12">
      <div class="box">
        <div class="box-header with-border">
          <h3 class="box-title"><?= $Lang->get('THEME__CUSTOMIZATION') ?></h3><span class="pull-right">Tronai</span>
        </div>
        <div class="box-body">



          <div class="tabbable">
            <ul class="nav nav-tabs">
             <li class="active"><a href="#tab1" data-toggle="tab">Option General</a></li>
             <li><a href="#tab4" data-toggle="tab">Achievement</a></li>
             </ul>
             <form method="post" enctype="multipart/form-data" data-ajax="false">
          <div class="tab-content">
            <div class="tab-pane active" id="tab1">
              <br>
               <div class="form-group">
                 <label>General</label>

                 <table class="table">
                   <tr>
                     <td>Couleur du background</td>
                     <td><i>Par default : #</i></td>
                     <td><input type="text" class="form-control" name="color" value="<?= $theme_config['color'] ?>"></td>
                   </tr>
                   <tr>
                     <td>Image du "slider"</td>
                     <td><i>Par default : #</i></td>
                     <td><input type="text" class="form-control" name="bg-img" value="<?= $theme_config['bg-img'] ?>"></td>
                   </tr>
                   <tr>
                     <td>Logo</td>
                     <td><i>Par default : #</i></td>
                     <td><input type="text" class="form-control" name="m_logo" value="<?= $theme_config['m_logo'] ?>"></td>
                   </tr>
                   <tr>
                     <td>Texte Slider</td>
                     <td><i>Par default : #</i></td>
                     <td>
                       <input type="text" class="form-control" name="slider" value="<?= $theme_config['slider'] ?>">
                     </td>
                   </tr>
                   <tr>
                     <td>Lien sur le slider</td>
                     <td><i>Par default : #</i></td>
                     <td><input type="text" class="form-control" name="slider_lien" value="<?= $theme_config['slider_lien'] ?>"></td>
                   </tr>
                   <tr>
                     <td>Texte bouton slider</td>
                     <td><i>Par default : #</i></td>
                     <td><input type="text" class="form-control" name="slider_text" value="<?= $theme_config['slider_text'] ?>"></td>
                   </tr>
                 </table>
               </div>
            </div>






            <!-- Section 4 -->

            <div class="tab-pane" id="tab4">
              <br>
              <div class="form-group">
                <label>Page principale</label>
                <table class="table">

                  <!-- Achievement 1 -->
                  <tr>
                    <td>Achievement 1</td>
                    <td><i>Icon</i></td>
                    <td>
                      <input type="text" class="form-control" name="home_ach_icon_1" value="<?= $theme_config['home_ach_icon_1'] ?>" placeholder="">
                    </td>
                  </tr>
                  <tr>
                    <td>Achievement 1</td>
                    <td><i>Titre</i></td>
                    <td>
                      <input type="text" class="form-control" name="home_ach_titre_1" value="<?= $theme_config['home_ach_titre_1'] ?>" placeholder="Titre">
                    </td>
                  </tr>
                  <tr>
                    <td>Achievement 1</td>
                    <td><i>Texte</i></td>
                    <td>
                      <input type="text" class="form-control" name="home_ach_text_1" value="<?= $theme_config['home_ach_text_1'] ?>" placeholder="Texte">
                    </td>
                  </tr>

                  <!-- Achievement 2 -->
                  <tr>
                    <td>Achievement 2</td>
                    <td><i>Icon</i></td>
                    <td>
                      <input type="text" class="form-control" name="home_ach_icon_2" value="<?= $theme_config['home_ach_icon_2'] ?>" placeholder="">
                    </td>
                  </tr>
                  <tr>
                    <td>Achievement 2</td>
                    <td><i>Titre</i></td>
                    <td>
                      <input type="text" class="form-control" name="home_ach_titre_2" value="<?= $theme_config['home_ach_titre_2'] ?>" placeholder="Titre">
                    </td>
                  </tr>
                  <tr>
                    <td>Achievement 2</td>
                    <td><i>Texte</i></td>
                    <td>
                      <input type="text" class="form-control" name="home_ach_text_2" value="<?= $theme_config['home_ach_text_2'] ?>" placeholder="Texte">
                    </td>
                  </tr>

                  <!-- Achievement 3 -->
                  <tr>
                    <td>Achievement 3</td>
                    <td><i>Icon</i></td>
                    <td>
                      <input type="text" class="form-control" name="home_ach_icon_3" value="<?= $theme_config['home_ach_icon_3'] ?>" placeholder="">
                    </td>
                  </tr>
                  <tr>
                    <td>Achievement 3</td>
                    <td><i>Titre</i></td>
                    <td>
                      <input type="text" class="form-control" name="home_ach_titre_3" value="<?= $theme_config['home_ach_titre_3'] ?>" placeholder="Titre">
                    </td>
                  </tr>
                  <tr>
                    <td>Achievement 3</td>
                    <td><i>Texte</i></td>
                    <td>
                      <input type="text" class="form-control" name="home_ach_text_3" value="<?= $theme_config['home_ach_text_3'] ?>" placeholder="Texte">
                    </td>
                  </tr>



                </table>
              </div>

            </div>



          <input name="data[_Token][key]" value="<?= $csrfToken ?>" type="hidden"> <button class="btn btn-primary" type="submit"><?= $Lang->get('GLOBAL__SUBMIT') ?></button> <a href="<?= $this->Html->url(array('controller' => 'theme', 'action' => 'index', 'admin' => true)) ?>" type="button" class="btn btn-default"><?= $Lang->get('GLOBAL__CANCEL') ?></a>
          </form>

          </div>



          </div>
        </div>
      </div>
    </div>
  </div>
</section>
