 

 <!DOCTYPE html>
 <html lang="en">
 <head>
     <meta charset="UTF-8">
     <meta http-equiv="X-UA-Compatible" content="IE=edge">
     <meta name="viewport" content="width=device-width, initial-scale=1.0">
    
      <link rel="stylesheet" href="src/style.css">

<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>
<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.8.0/font/bootstrap-icons.css">
<title>SoliDao</title>
     <?php 


    global $total;
    global $Total_TVA;
    global $sous_total;
    $tranche = 0;
    global $consomation;
    global $redevnce;
    global $calibre;
    global $Taxes;
    global $MontantHT ;
    global $numtranche;
    global $key;
    global $AncienI;
    global $NouvelI;
    global $tarif;

    echo "<style> 
        #tranche2{
            display: none;
        }
     </style>";
    
    if (isset ( $_POST["submit"])) {
       
        $NouvelI = $_POST["NI"];
        $AncienI = $_POST["AI"];
        $calibre = $_POST["calibre"];
        $consomation = $NouvelI - $AncienI;

        $TVA = 0.14 ; 
        $timbre = 0.45;
        $numtranche;
        $calibre = $_POST["calibre"];
        $tranche1 = 0.794;
        $tranche2 = 0.883;
        $tranche3 = 0.9451;
        $tranche4 = 1.0489;
        $tranche5 = 1.2915;
        $tranche6 = 1.4975;
        

        //tranche 1 (0-100kwh) 
        if ($consomation <= 100){

          

            $tarif = 0.794;
            $tranche = $consomation * $tranche1;
            $MontantHT = $tranche + $calibre;
            $Total_TVA = $tranche * $TVA ;
            $redevnce = $calibre * $TVA;
            $Taxes = $redevnce + $Total_TVA;
            $sous_total = $Taxes + $timbre; 
            $total = $MontantHT + $sous_total;
            $numtranche = 1;
            echo "<style> 
                #tranche2{
                    display: none;
                }
             </style>";
        }
        //tranche 2 (101-150kwh) 
        if ($consomation <=150 && $consomation >= 101){

            echo "<style> 
            #tranche2{
                display: block;
            }
            </style>";

            $tarif = 0.794;
            $tarif2 =  0.883;
            $tra = 100;
            $B = $consomation - 100 ;

            $tranche = 100 * $tranche1;
            $demo = $B * $tranche2;

            $Total_TVA = $tranche * $TVA ;
            $Total_TVA2 = $demo * $TVA;

            $redevnce = $calibre * $TVA;
            $Taxes = $redevnce + $Total_TVA + $Total_TVA2;
            $sous_total = $Taxes + $timbre; 
            $MontantHT = $tranche + $demo +  $calibre;
            $total = $MontantHT + $sous_total;
            $numtranche = 1;

            

           
        }
        //tranche 3 (151-210kwh) 
        if ($consomation <= 210 && $consomation >= 151){

            $tarif = 0.9451;
            $tranche = $consomation * $tranche3;
            $MontantHT = $tranche + $calibre;
            $Total_TVA = $tranche  * $TVA ;
            $redevnce = $calibre * $TVA;
            $Taxes = $redevnce + $Total_TVA;
            $sous_total = $Taxes + $timbre; 
          
            $total = $MontantHT + $sous_total;
            $numtranche = 3;
            echo "<style> 
            #tranche2{
                display: none;
            }
         </style>";

        } 
        //tranche 4 (211-310kwh) 
        if ($consomation <= 310 && $consomation >= 211){

            $tarif = 0.0489;
            $tranche = $consomation * $tranche4;
            $MontantHT = $tranche + $calibre;
            $Total_TVA = $tranche  * $TVA ;
            $redevnce = $calibre * $TVA;
            $Taxes = $redevnce + $Total_TVA;
            $sous_total = $Taxes + $timbre; 
          
            $total = $MontantHT + $sous_total;
            $numtranche = 4;
            echo "<style> 
            #tranche2{
                display: none;
            }
         </style>";
        }
        //tranche 5 (311-510kwh)
        if ( $consomation <= 510 && $consomation >= 311){

            $tarif = 1.2915;
            $tranche = $consomation * $tranche5;
            $MontantHT = $tranche + $calibre;
            $Total_TVA = $tranche  * $TVA ;
            $redevnce = $calibre * $TVA;
            $Taxes = $redevnce + $Total_TVA;
            $sous_total = $Taxes + $timbre; 
          
            $total = $MontantHT + $sous_total;
            $numtranche = 5;
            echo "<style> 
            #tranche2{
                display: none;
            }
         </style>";
        } 
        //tranche 6 (>511kwh)
        if ($consomation >= 511 ){

            $tarif = 1.4975;
            $tranche = $consomation * $tranche6;
            $MontantHT = $tranche + $calibre;
            $Total_TVA = $tranche  * $TVA ;
            $redevnce = $calibre * $TVA;
            $Taxes = $redevnce + $Total_TVA;
            $sous_total = $Taxes + $timbre; 
          
            $total = $MontantHT + $sous_total;
            $numtranche = 6;
            echo "<style> 
            #tranche2{
                display: none;
            }
         </style>";
        }
       
}

 ?>
     
 </head>
 <body>
    <header >
    <?php include "navbar.php" ?>
    </header>
    <main class="text-center  bg-light text-muted container">
    <?php include "main.php" ?>
    </main>
    <article class="text-center  bg-light text-muted container">
      <input type="submit" class="btn btn-success btn-block" name="submit" value="PRINT" onclick="window.print();" />  
     </article> 

 </body>
 </html>
   
     
