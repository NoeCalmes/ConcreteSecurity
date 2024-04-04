<body class="paneladmin">
    <div class="container-contrat">
        <div class="Title">
            <h1><?php echo $title ?></h1>
        </div>

        <div class ="Employe-id-List">
            <table class =table>
                <?php
                    $cpt=0;
                    if ($employes->count() == 0){
                        echo '<h1> Il Faut Embaucher ! </h1>';
                    }else{
                        foreach($employes as $e){
                            echo '<td class ="Contrat-Number-Main">';
                                echo '<td class ="Contrat-Number">';
                                    echo'<br>';
                                    echo '<b>Employer n° '. $e->id .'</b>';
                                    echo'<br>';
                                    echo '<b>Nom : '. $e->nom .'</b>';
                                    echo'<br>';
                                    echo '<b>Prenom : '. $e->prenom .'</b>';
                                    echo'<br>';
                                    echo '<b>Identifiant : '. $e->numidentifiant .'</b>';
                                    echo'<br>';
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
</body>