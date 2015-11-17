

<script type="text/javascript">
         var ar, wtdSpins, wtdViews, wtdSales, wtdTwitter, wtdFB, wtdSC, wtdVenue, wtdPress, wtdTV, wtdProduct, wtdCosign, total,finalScore;
         $('form').serializeArray()
         if (ar[3] > 8944) {
             ar[3] = 8944;
         } 
         if (ar[4] > 1005555) {
             ar[4] = 100555;
         }
         if (ar[5] > 19937500) {
             ar[5] = 19937500;
         }

         if (ar[8] <= 10) {
             ar[8] = 8.33;
         } elseif (ar[8] <= 20 ) {
             ar[8] = 7.33;
         } elseif (ar[8] <= 40) {
             ar[8] = 6.33;
         } elseif (ar[8] <= 100) {
            ar[8] = 5.33;
         } elseif (ar[8]) <= 200) {
           ar[8] = 4.33;
         } else {
           ar[8] = 0;
         }
         
         if (ar[9] > 4888888) {
             ar[9] = 4888888;
         }
         
         if (ar[10] > 17222222) {
            ar[10] = 17222222;
         }
  
         if (ar[11] > 641111) {
            ar[11] = 641111;
        }
        if (ar[12] > 29.9) {
           ar[12] = 29.9; 
        }
        if (ar[13] > 13.9) {
           ar[13] = 13.9;
        }
        if (ar[14] > 10.8) {
          ar[14] = 10.8;
        }
        if (ar[15] > 2.11) {
          ar[15] = 2.11;
        }
         if (ar[16] > 2.11) {
          ar[16] = 2.11;
        }
      
        wtdSpins = (((ar[3]/8944)*1800)*0.15);
        wtdViews = (((ar[4]/100555)*100)*0.1633);
        wtdSales = (((ar[5]/19937500)*100)*0.16556);
        wtdTwitter = (((ar[9]/4888888.889)*100)*0.08667);
        wtdFB = (((ar[10]/17222222.222)*100)*0.05444);
        wtdSC = (((ar[11]/641111.111)*100)*0.05778);
        wtdVenue = (((ar[12]/29.889)*100)*.06000);
        wtdPress = (((ar[13]/13.889)*100)*.05000);
        wtdTV = (((ar[14]/10.778)*100)*.10333);
        wtdProduct = (((ar[15]/2.111)*100)*.01889);
        wtdCosign = (((ar[16]/2.111)*100)*0.006670);
        total =  (wtdSpins + wtdViews + wtdSales + wtdTwitter + wtdFB + wtdSC + wtdVenue + wtdPress + wtdTV + wtdProduct + wtdCosign); 
        if (ar[6] = "No" {
            finalScore = total*8;
        } else {
           finalScore = (total*8)*1.618;
        } 
        $.ajax({
                 url: 'post_receiver.php',
                  type: 'POST',
                   data: { finalScore : finalScore},
                });




       </script>

