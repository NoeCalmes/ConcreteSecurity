<body class="paneladmin">
    <div class="container-contrat">
        <div class="Title">
            <h1><?php echo $title ?></h1>
        </div>

        <div class="Employe-id-List">
            <table class=table>
                <?php
                $cpt = 0;
                if ($employes->count() == 0) {
                    echo '<h1> Il Faut Embaucher ! </h1>';
                } else {
                    foreach ($employes as $e) {
                        echo '<div class="Employes-All">';
                        //
                        echo '<li class="Employe-Infos">';
                        //
                        echo '<br>';
                        echo '<b>Employer n° ' . $e->id . '</b>';
                        echo '<br>';
                        echo '<b>Nom : ' . $e->nom . '</b>';
                        echo '<br>';
                        echo '<b>Prenom : ' . $e->prenom . '</b>';
                        echo '<br>';
                        echo '<b>Identifiant : ' . $e->numidentifiant . '</b>';
                        echo '<br>';
                        //
                        echo '</li>';

                        echo '<li class="Employe-Contrat">';
                        //
                        foreach ($employes_contrat as $ec) {
                            if ($ec->employe_id == $e->id) {
                                echo '<div class="Contrat-Employe">';
                                //
                                echo "<b>Contrat N° <b class = 'Content'>$ec->id </b></b>";
                                echo "<br>";
                                echo "<b>Date Debut : $ec->datedebut </b>";
                                echo "<br>";
                                echo "<b>Date Fin : $ec->datefin </b>";
                                echo "<br>";
                                if ($ec->periode_id == 1) {
                                    echo "<b>Periode : Nuit</b>";
                                } else {
                                    echo "<b>Periode : Jour</b>";
                                }
                                //
                                echo '</div>';
                            }
                        }
                        //
                        echo '</li>';
                        //
                        echo '</div>';


                        $cpt++;

                        if ($cpt % 1 == 0) {
                            echo "</tr><tr>";
                        }
                    }
                    echo '<tr>';
                    echo '</tr>';
                }
                ?>
            </table>
        </div>
</body>