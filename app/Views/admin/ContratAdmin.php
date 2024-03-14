<body class="paneladmin">
    <div class="container-contrat">
        <div class="Title">
            <h1><?php echo $title ?></h1>
            <div class="border-title"></div>
        </div>

        <div class ="Contrat-id-List">
            <table class =table>
                <?php
                    $cpt=0;
                    foreach($contrats as $c){

                        echo '<td class ="Contrat-Number">';
                            echo '<b>Contrat n°'. $c->id .'</b>';
                            echo $logo;
                        echo '</td>';
                        echo '<td class ="Contrat-Button">';
                            echo anchor('admin/contrats/'. $identifiant .'/'. $c->id .'','<i class="fa-solid fa-eye"></i>');
                        echo '</td>';


                        $cpt++;

                        if ($cpt%1==0) {
                            echo "</tr><tr>";
                        }   
                    }
                    echo '<tr>';
                    echo'</tr>';
                ?>
            </table>
        </div>

        <div class = "liste-contrat">
            <table class =table>
            <?php
                echo "<tr>";
                    echo "<td width='30%' class='contrat-div'>";
                    echo "<br>";
                    echo " Contrat N° : <b>".$contrat->id."</b>";
                    echo "<br>";
                    echo " Description : <b>".$contrat->description."</b>";
                    echo "<br>";
                    echo " Date Début : <b>".$contrat->datedebut."</b>";
                    echo "<br>";
                    echo " Date Fin : <b>".$contrat->datefin."</b>";
                    echo "<br>";
                    echo " Ville : <b>".$contrat->ville."</b>";
                    echo "<br>";
                    echo " Code Postal : <b>".$contrat->cp."</b>";
                    echo "<br>";
                    echo " Adresse: <b>".$contrat->adresse."</b>";
                    echo "<br>";
                    if ($contrat->prediode_id == 1){
                        echo " Periode : <b> Jour </b>";
                    }else{
                        echo " Periode : <b> Nuit </b>";
                    }
                    echo "<br>";
                    echo '<div class = "icon">';
                    echo '</div>';
                    echo "</td>";
                echo "</tr>";
            ?>
            </table>
        </div>

        
    </div>
</body>