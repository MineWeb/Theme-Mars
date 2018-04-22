<div class="slider">
  <div class="slider-in">
    <center>
      <b>
        <h2 class="slider-title"><span class="color"><?= before_display($news['News']['title']) ?></span></h2>
      </b>
      <br><br>
    </center>
  </div>
</div>
<div class="container">
  <br><br>
  <?= $news['News']['content'] ?>
  <br><br>
  <p class="pull-right white"><b>Auteur:</b> <?= $news['News']['author'] ?> <br> <b>Date:</b> <?= $Lang->date($news['News']['created']);?></p>


  <br><br><br>

  <?php if($Permissions->can('COMMENT_NEWS')) { ?>
    <form method="POST" data-ajax="true" action="<?= $this->Html->url(array('controller' => 'news', 'action' => 'add_comment')) ?>" data-callback-function="addcomment" data-success-msg="false">
        <input name="news_id" value="<?= $news['News']['id'] ?>" type="hidden">
        <div class="form-group">
            <textarea name="content"  rows="3"></textarea>
        </div>
        <button type="submit" class="btn-news"><?= $Lang->get('GLOBAL__SUBMIT') ?></button>
    </form>
    <br><br>
    <?php }else{ ?>
      <div class="alert alert-danger">
        Vous devez être connecter pour envoyer un commentaire !
      </div>
      <?php } ?>

      <?php foreach ($news['Comment'] as $k => $v) { ?>
          <div class="media comment" id="comment-<?= $v['id'] ?>">
              <a class="pull-left" href="#">
                  <img class="media-object" src="<?= $this->Html->url(array('controller' => 'API', 'action' => 'get_head_skin/')) ?>/<?= $v['author'] ?>/64" alt="">
              </a>
              <div class="media-body">
                  <h4 class="media-heading color"><?= $v['author'] ?>
                      <small><?= $Lang->date($v['created']); ?></small>
                  </h4>
                  <span class="white"><?= before_display($v['content']) ?></span>
              </div>
              <div class="pull-right">
                  <?php if($Permissions->can('DELETE_COMMENT') OR $Permissions->can('DELETE_HIS_COMMENT') AND $user['pseudo'] == $v['author']) { ?>
                      <p><a id="<?= $v['id'] ?>" title="<?= $Lang->get('GLOBAL__DELETE') ?>" class="comment-delete btn btn-danger btn-sm"><icon class="fa fa-times"></icon></a></p>
                  <?php } ?>
              </div>
          </div>
      <?php } ?>
</div>
<br><br>
