<body class="paneladmin">
    <div class="container-contrat">
        <div class="Title">
            <h1><?php echo $title ?></h1>
            <div class="border-title"></div>
        </div>

        <div class = "liste-contrat">
            <table class =table>
            <?php
        
                $cpt=0;
                echo "<tr>";
                foreach ($contrats as $contrat) {
                    echo "<td width='30%' class='text-center'>";
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
                    echo " Periode : <b>".$contrat->cp."</b>";
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