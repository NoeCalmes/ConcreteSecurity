<body>

        <div class="Title">
            <h1><?php echo $title ?></h1>
            <div class="border-title"></div>
        </div>
        
        <br>

        <div class ="Demande-id-List">
            <table class =table>
                <?php
                    $cpt=0;
                    if ($demandes->count() == 0){
                        echo '<h1> Aucune Demande de ce type est disponible </h1>';
                    }else{
                        foreach($demandes as $d){
                            echo '<td class ="Contrat-Number-Main">';
                                echo '<td class ="Contrat-Number">';
                                    echo '<b>Contrat n°'. $d->id .'</b>';
                                    echo $logo;
                                echo '</td>';
    
                                echo '<td class ="Contrat-Button">';
                                    echo anchor('admin/demandes/'. $identifiant .'/'. $d->id .'','<i class="fa-solid fa-eye"></i>');
                                
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
                if ($demandes->count() == 0){
                    
                }else{
                    echo "<tr>";
                        echo "<td width='30%' class='contrat-div'>";
                        echo "<br>";
                        echo " Contrat N° : <b>".$demande->id."</b>";
                        echo "<br>";
                        echo " Date : <b>".$demande->dated."</b>";
                        echo "<br>";
                        echo " Etat : <b>".$demande->etat."</b>";
                        echo "<br>";
                        echo " Client : <b>".$demande->client_id."</b>";
                        echo "<br>";
                        echo "</td>";
                    echo "</tr>";
                }
            ?>
            </table>
        </div>
</body>