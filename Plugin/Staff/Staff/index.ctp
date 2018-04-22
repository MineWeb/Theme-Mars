<?= $this->Html->css('Staff.css.css'); ?>
<?= $this->Html->css('Staff.font-awesome.min.css'); ?>

<div class="slider">
  <div class="slider-in">
    <center>
      <b>
        <h2 class="slider-title">NOTRE <span class="color">STAFF</span></h2>
      </b>
      <br><br>
    </center>
  </div>
</div><br><br>

<div class="col-md-12">
          <div class="container">
    <?php if(empty($staffs)): ?>
        <h4 class="text-center"><?= $Lang->get("EMPTY_STAFF") ?></h4>
    <?php endif; ?>
    <?php foreach ($staffs as $k=>$v):
        $v = current($v);
        ?>
        <div class="col-md-4 col-sm-6 col-xs-12 container">
            <div class="panel panel-default">
                <div class=" text-center bgcolor"><h3 style="display: inline-block;"><?= $v['user'] ?></h3></div>
                <div class="panel-body text-center">
                    <div class="img-staff-h">
                        <?php if(!empty($v['image'])) { ?>
                            <img src="<?= $v['image'] ?>" alt="<?= $v['user'] ?>" class="image" style="width:50%; min-width:100%">
                        <?php } else { ?>
                            <?php
                            $lien = "https://api.mojang.com/users/profiles/minecraft/".$v['user'];
                            if(file_get_contents($lien)){ ?>
                                <img src="https://visage.surgeplay.com/bust/200/<?= $v['user'] ?>" alt="<?= $v['user'] ?>" class="image" style="width:50%;">
                            <?php } else { ?>
                                <img src="https://visage.surgeplay.com/bust/200/steve" alt="<?= $v['user'] ?>" class="image" style="width:200px; min-width:100%">
                            <?php } ?>
                        <?php } ?>
                        <div class="middle">
                            <?php if(!empty($v['facebook'])): ?>
                                <a class="discord" href="<?= $v['facebook'] ?>"><i class="fa fa-discord"></i></a>
                            <?php endif; ?>
                            <?php if(!empty($v['twitter'])): ?>
                                <a class="twitter" href="<?= $v['twitter'] ?>"><i class="fa fa-twitter"></i></a>
                            <?php endif; ?>
                            <?php if(!empty($v['youtube'])): ?>
                                <a class="youtube" href="<?= $v['youtube'] ?>"><i class="fa fa-youtube"></i></a>
                            <?php endif; ?>
                            <?php if(!empty($v['description'])): ?>
                                <div class="text"><?= cut($v['description'], 75) ?></div>
                            <?php endif; ?>
                        </div>
                    </div>
                </div>
                <div class=" bgcolor text-center" style="padding:10px;">
                  <div class="bgcolor">
                    <h4 class="white">
                        <?= $v['rank'] ?>
                    </h4>
                  </div>
                </div>
            </div>
        </div>
    <?php endforeach; ?>
      </div>
</div>
<div class="clearfix"></div>
