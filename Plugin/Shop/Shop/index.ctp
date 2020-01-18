<?= $this->Html->css('Shop.jquery.bootstrap-touchspin.css') ?>

<div class="slider">
  <div class="slider-in">
    <center>
      <b>
        <h2 class="slider-title"><span class="color">BOUTIQUE</span></h2>
      </b>
      <br><br>
    </center>
  </div>
</div><br><br>

<div id="content">
  <div class="container shop">
    <?= $this->element('flash') ?>
    <?= $vouchers->get_vouchers() // Les promotions en cours ?>
    <div class="row">
      <div class="col-sm-3">

          <!-- Profil Boutique -->
          <?php if($isConnected) { ?>
          <div class="panel panel-default bdcolor-top">
          <div class="panel-body">
            <span class="MankSans">Mes crédits</span> <span class="badge bgcolor"><?= $money; ?></span><br><br>
              <?php if($Permissions->can('CREDIT_ACCOUNT')) { ?>
                  <span class="badge bgcolor"><a href="#" data-toggle="modal" data-target="#addmoney" class=" white" style="margin-top:20px; color:white;"><?= $Lang->get('SHOP__ADD_MONEY') ?></a></span>
            <?php } ?>

          </div>
        </div>
          <?php }else{ ?>
            <div class="alert alert-danger">
              <?= $Lang->get('SHOP__BUY_ERROR_NEED_LOGIN') ?>
            </div>
            <?php } ?>

            <!-- Categorie -->
            <div class="panel bdcolor-top">
                <ul class="nav shop-category">
                  <?php
                  $i=0;
                  foreach ($search_categories as $category_link) {
                    $i++;

                    echo '<div class="shop-category-item item"';
                      echo (isset($category) && $category_link['Category']['id'] == $category || (!isset($category) && $i == 1)) ? ' id="shop-active"' : '';
                    echo 'style="cursor:pointer">';
                      echo '<a href="'.$this->Html->url(array('controller' => 'c/'.$category_link['Category']['id'], 'plugin' => 'shop')).'"';
                      echo 'class="white hwhite">';
                        echo "<p class=\"hwhite\">";
                        echo $category_link['Category']['name'];
                      echo '</p></a>';
                    echo '</div>';

                  }
                  ?>
                </ul>
            </div>

          <!-- Panier -->
          <?php if($isConnected) { ?>
          <div class="panel panel-default bdcolor-top" style="padding-top:25px;padding-bottom:25px;">
                <?php if($isConnected) { ?>
                  <a href="#" data-toggle="modal" data-target="#cart-modal" class=" shop-category-item-2 block" style="color:white;"><?= $Lang->get('SHOP__BUY_CART') ?></a>
                <?php } ?>
              </div>
          <?php } ?>
      </div>
      <div class="col-sm-9">

        <div class="row products">
          <?php
          foreach ($search_items as $item) {
            $item = $item['Item'];

            if(!isset($category) AND $item['category'] == $search_first_category OR isset($category) AND $item['category'] == $category) { ?>



              <div class="col-lg-4">
                <div class="box">
                  <img src="<?= $item['img_url'] ?>" width="100%" class="bdcolor-bottom">
                  <a href="#" class="display-item" data-item-id="<?= $item['id'] ?>"><h3 class="white center"><?= $item['name'] ?> (<?= $item['price'] ?> <img src="https://cdn.discordapp.com/attachments/372425208872566785/396009393100947460/money.png" width="20px">)</h3></a>
                </div>
                <br>
              </div>
          <?php  }
          }
          ?>

        </div>
    </div>
  </div>
</div>
</div>

<script type="text/javascript">
  var LOADING_MSG = '<?= $Lang->get('GLOBAL__LOADING') ?>';
  var ADDED_TO_CART_MSG = '<?= $Lang->get('SHOP__BUY_ADDED_TO_CART') ?> <i class="fa fa-check"></i>';
  var CART_EMPTY_MSG = '<?= $Lang->get('SHOP__BUY_CART_EMPTY') ?>';
  var ITEM_GET_URL = '<?= $this->Html->url(array('controller' => 'shop/ajax_get', 'plugin' => 'shop')); ?>/';
  var VOUCHER_CHECK_URL = '<?= $this->Html->url(array('action' => 'checkVoucher')) ?>/';
  var BUY_URL = '<?= $this->Html->url(array('action' => 'buy_ajax')) ?>';

  var CART_ITEM_NAME_MSG = '<?= $Lang->get('SHOP__ITEM_NAME') ?>';
  var CART_ITEM_PRICE_MSG = '<?= $Lang->get('SHOP__ITEM_PRICE') ?>';
  var CART_ITEM_QUANTITY_MSG = '<?= $Lang->get('SHOP__ITEM_QUANTITY') ?>';
  var CART_ACTIONS_MSG = '<?= $Lang->get('GLOBAL__ACTIONS') ?>';

  var CSRF_TOKEN = '<?= $csrfToken ?>';
</script>
<?= $this->Html->script('Shop.jquery.cookie') ?>
<?= $this->Html->script('Shop.shop') ?>
<?= $this->Html->script('Shop.jquery.bootstrap-touchspin.js') ?>
  <!-- Modal -->

    <!-- Modal Confirmation -->
<div class="modal fade" id="buy-modal" tabindex="-1" role="dialog">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal"><i class="fa fa-times"></i></button>
        <h4 class="modal-title"><?= $Lang->get('SHOP__BUY_CONFIRM') ?></h4>
      </div>
      <div class="modal-body">
      </div>

    </div>
  </div>
</div>


<!-- Modal Panier -->
<div class="modal fade" id="cart-modal" tabindex="-1" role="dialog">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header"><button type="button" class="close" data-dismiss="modal"><i class="fa fa-times"></i></button>
        <h4 class="modal-title"><i class="fa fa-shopping-basket"></i> <?= $Lang->get('SHOP__BUY_CART') ?> <span class="badge badge-danger">(<span id="cart-total-price">0</span>  <?= $Configuration->getMoneyName() ?>)</span></h4>
      </div>
      <div class="modal-body">
      </div>
      <div class="modal-footer">
        <div class="pull-left col-lg-6">
          <input name="cart-voucher" type="text" class="form-control" autocomplete="off" id="cart-voucher" style="width:245px;" placeholder="<?= $Lang->get('SHOP__BUY_VOUCHER_ASK') ?>">
        </div>
        <div class="col-lg-1"></div>
        <div class="col-lg-5"></div>
        <button type="button" class="btnb white" id="buy-cart" style="border:0px;"><?= $Lang->get('SHOP__BUY') ?></button>
      </div>
    </div>
  </div>
</div>

<?= $this->element('payments_modal') ?>
