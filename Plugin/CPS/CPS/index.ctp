
   <style>.cps{ cursor: 	Pointer; text-align: center; border:0px; border-radius: 0px;} .cps{text-align: center; padding-top:25px; padding-bottom: 25px; } .cps:selection {background : transparent;}
   .cps{
   user-select: none;
   -moz-user-select: none;
   -khtml-user-select: none;
   -webkit-user-select: none;
   }
   .textc{padding-top: 25px; padding-bottom: 25px; color:black;}
   </style>

   <!-- HTML -->
   <div class="slider">
     <div class="slider-in">
       <center>
         <b>
           <h2 class="slider-title">COMPTEUR DE <span class="color">CPS</span></h2>
         </b>
         <br><br>
       </center>
     </div>
   </div><br><br>


   <div class="container cps-title">
       <p id="aff"><?= $Lang->get('CLICK__NUMBER') ?> : </p>
       <p id="cps"><?= $Lang->get('CPS__NUMBER') ?> : </p>
       <br>
       <div class="well well-large cps bgcolor" id="countcps">
           <div>
               <div class="click-div textc white">
                  <h4 class="white"><?= $Lang->get('START') ?></h2>
               </div>
           </div>
       </div>
       <p id="bip" class="cps-title">Timer : 0</p>
       <p class="white">
       &Agrave; la seconde ou vous cliquer, un chronometre se lance et vous disposez de 10 secondes pour cliquez un maximum
       de fois.<br>
       Grace &agrave; ce nombre de clics, nous pourront definir votre CPS !
       </p>
   </div><br><br>

   <script src="https://code.jquery.com/jquery-3.2.1.min.js"></script>

   <script>
     var clicks = 0;
     var timer = 10;
     var x;
     var begin = false;

     $('.click-div').click(function () {
       if (!begin) {
         startTimer();
       }
       else {
         addClick()
       }
     })

     function addClick()
     {
       clicks++;
       $('#aff').html('<?= $Lang->get("CLICK__NUMBER") ?> : ' + clicks)
     }

     function startTimer() {
       begin = true;
       x = setInterval(updateTimer, 1000);
       $('.click-div').html('<h4 class="white">CLIQUEZ</h2>');
       $('#bip').html('Timer: ' + timer + " secondes.")
       $('#aff').html('<?= $Lang->get("CLICK__NUMBER") ?> :')
       $('#cps').html('<?= $Lang->get("CPS__NUMBER") ?> :')
     }

     function stopTimer() {
       begin = false;
       clearInterval(x);
       $('#bip').html('<?= $Lang->get("CPS__NUMBER") ?> : 0')
       $('#cps').html('<?= $Lang->get("CLICK__NUMBER") ?> : '+(clicks/10))
       alert('Vous avez fait ' + (clicks/10) + ' cps')
       timer = 10;
       clicks = 0;
       $('.click-div').html('<h4 class="white"><?= $Lang->get("RESTART") ?></h2>');
     }

     function updateTimer() {
       timer--;
       if (timer > 0) {
         if (timer == 1) {
           var suffix = " seconde.";
         } else {
           var suffix = " secondes.";
         }
         $('#bip').html('Timer: ' + timer + " " + suffix)
       }
       else {
         stopTimer()
       }
     }
   </script>

 </section>
