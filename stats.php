<?php
include_once 'config.php';
$a = new actions();
$indic  = $a->getNbClient();

$list   = $a->getListClient();
?>
<!DOCTYPE html>
<html lang="fr">
  <head>
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1">

        <title>OkoVision - Stats</title>
    </head>
    
    <h4>Nb de client (hors DEV) : &nbsp; <?php echo $indic->nbClient; ?> </h4>

    <body role="document">
        
        <table>
            <thead>
                <tr>
                    <th class="col-md-3">date</th>
                    <th class="col-md-3">source</th>
		    <th class="col-md-3">remote_address</th>
                    <th class="col-md-3">token</th>
                    <th class="col-md-3">version</th>
                </tr>
            </thead>
    
        <tbody>
            <?php  
            
            
            foreach($list as $obj){
		echo '<tr><td>'.$obj->date.'</td><td>'.$obj->source.'</td><td>'.$obj->remote_address.'</td><td>'.$obj->apptoken.'</td><td>'.$obj->version.'</td></tr>';
            }
            ?>
        </tbody>

    </table>
    
    </body>
</html>