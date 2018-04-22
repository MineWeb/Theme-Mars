<div class="slider">
  <div class="slider-in">
    <center>
      <b>
        <h2 class="slider-title"><?= $theme_config['slider']; ?></h2>
      </b>
      <br><br>
      <a href="<?= $theme_config['slider_lien']; ?>" class="btnb btn-success hwhite color"><b><?= $theme_config['slider_text']; ?></b></a>
    </center>
  </div>
</div>
<div class="container">
  <section class="features">
            <div class="container">
                <div class="row features-row">
                    <!-- Feature Box Starts -->
                    <div class="feature-box col-md-4 col-sm-12">
                        <span class="feature-icon">
							<img id="download-bitcoin" src="<?= $theme_config['home_ach_icon_1']; ?>" alt="download bitcoin">
						</span>
                        <div class="feature-box-content">
                            <h3><?= $theme_config['home_ach_titre_1']; ?></h3>
                            <p><?= $theme_config['home_ach_text_1']; ?></p>
                        </div>
                    </div>
                    <!-- Feature Box Ends -->
                    <!-- Feature Box Starts -->
                    <div class="feature-box two col-md-4 col-sm-12">
                        <span class="feature-icon">
							<img id="add-bitcoins" src="<?= $theme_config['home_ach_icon_2']; ?>" alt="add bitcoins">
						</span>
                        <div class="feature-box-content">
                            <h3><?= $theme_config['home_ach_titre_2']; ?></h3>
                            <p><?= $theme_config['home_ach_text_2']; ?></p>
                        </div>
                    </div>
                    <!-- Feature Box Ends -->
                    <!-- Feature Box Starts -->
                    <div class="feature-box three col-md-4 col-sm-12">
                        <span class="feature-icon">
							<img id="buy-sell-bitcoins" src="<?= $theme_config['home_ach_icon_3']; ?>" alt="buy and sell bitcoins">
						</span>
                        <div class="feature-box-content">
                            <h3><?= $theme_config['home_ach_titre_3']; ?></h3>
                            <p><?= $theme_config['home_ach_text_3']; ?></p>
                        </div>
                    </div>
                    <!-- Feature Box Ends -->
                </div>
            </div>
        </section>

        <section class="news">
          <div class="news-one">
            <div class="container">

              <?php if(!empty($search_news)) { foreach ($search_news as $news) {  ?>
                          <div class="news-all" style="width:100%;">
                              <a href="<?= $this->Html->url(array('controller' => 'blog', 'action' => $news['News']['slug'])); ?>"><h2 class="color"><?= $news['News']['title']; ?></h2></a>
                              <span class="date theme-color-text"><?= $Lang->date($news['News']['created']); ?></span>
                              <div class="texte"><p><?= $this->Text->truncate($news['News']['content'], 700, array('ellipsis' => '...', 'html' => true)); ?></p></div>
                              <div class="likes">
                                  <?= $news['News']['count_likes'] ?> <i class="fa fa-thumbs-up"></i>
                              </div>
                              <div class="commentaires">
                                  <?= $news['News']['count_comments'] ?> <i class="fa fa-comments" aria-hidden="true"></i>
                              </div>
                          </div>
              <?php } ?>
              <?php } else { echo '<div class="alert alert-danger">'.$Lang->get('NEWS__NONE_PUBLISHED').'</div>'; } ?>

           </div>
         </div>
       </section>
</div>
