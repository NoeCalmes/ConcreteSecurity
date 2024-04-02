<body class="paneladmin">
    <div class="container-contrat">
        <div class="Title">
            <h1><?php echo $title ?></h1>
            <div class="border-title"></div>
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
                                    echo '<b>Employer n° '. $e->id .'</b>';
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