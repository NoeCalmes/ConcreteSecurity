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
                    if ($contrats->count() == 0){
                        echo '<h1> Aucun Contrat de ce type est disponible </h1>';
                    }else{
                        foreach($contrats as $c){
                            echo '<td class ="Contrat-Number-Main">';
                                echo '<td class ="Contrat-Number">';
                                    echo '<b>Contrat n°'. $c->id .'</b>';
                                    echo $logo;
                                echo '</td>';
    
                                echo '<td class ="Contrat-Button">';
                                    echo anchor('admin/contrats/'. $identifiant .'/'. $c->id .'','<i class="fa-solid fa-eye"></i>');
                                
                                echo '</td>';
                            echo'</td>';
    
    
                            $cpt++;
    
                            if ($cpt%1==0) {
                                echo "</tr><tr>";
                            }   
                        }
                        echo '<tr>';
                        echo'</tr>';
                    }
                ?>
            </table>
        </div>

        <div class = "liste-contrat">
            <table class =table>
            <?php
            if ($contrats->count() == 0){

            }else{
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
                    if ($identifiant == 1) {
                        echo "Assigner un Employer : ";
                        echo "<form action='/projets/concretsecurity/admin/assigner' method='post'>";
                        echo "<select name='employe_id'>";
                        foreach ($employee as $employe) {
                            echo "<option value='" . $employe->id . "'>" . $employe->nom . "</option>";
                        }
                        echo "</select>";
                        echo "<input type='hidden' name='contrat_id' value='" . $contrat->id . "'>";
                        echo "<button type='submit'>Valider</button>";
                        echo "</form>";
                    }
                    echo '</div>';
                    echo "</td>";
                echo "</tr>";
            }
            ?>
            </table>
        </div>

        
    </div>
</body>