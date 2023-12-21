<body class="paneladmin">
    <div class="container-contrat">
        <div class="Title">
            <h1>Contrat en Attente</h1>
            <div class="border-title"></div>
        </div>

        <div class = "liste-contrat">
            <table class =table>
            <?php
                $cpt=0;
                echo "<tr>";
                foreach ($contratsattente as $contrats) {
                    echo "<td width='30%' class='text-center'>";
                    echo "<br>";
                    echo " Contrat N° : <b>".$contrats->id."</b>";
                    echo "<br>";
                    echo " Description : <b>".$contrats->description."</b>";
                    echo "<br>";
                    echo " Date Début : <b>".$contrats->datedebut."</b>";
                    echo "<br>";
                    echo " Date Fin : <b>".$contrats->datefin."</b>";
                    echo "<br>";
                    echo " Ville : <b>".$contrats->ville."</b>";
                    echo "<br>";
                    echo " Code Postal : <b>".$contrats->cp."</b>";
                    echo "<br>";
                    echo " Adresse: <b>".$contrats->adresse."</b>";
                    echo "<br>";
                    echo " Periode : <b>".$contrats->cp."</b>";
                    echo "</td>";
                    $cpt++;
                    if ($cpt%1==0) {
                        echo "</tr><tr>";
                    }
                }
                echo "</tr>";
            ?>
            </table>
        </div>

        
    </div>
</body>