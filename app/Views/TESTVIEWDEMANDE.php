<body class="paneladmin">
    <div class="container-contrat">

        <div class="DivLis">

            <div class="Contrat-id-List">
                <ul class=table>
                    <h1><?php echo $title ?></h1>
                    <?php
                    $cpt = 0;
                    if ($demandes->count() == 0) {
                        echo "<h1 class='NoContrat'> Aucune demande de ce type n'est disponible </h1>";
                    } else {
                        foreach ($demandes as $d) {
                            echo '<li class ="Contrat-Number-Main">';
                            echo '<div class ="Contrat-Number">';
                            echo '<b>Contrat n°' . $d->id . '</b>';
                            echo '</div>';

                            echo '<div class ="Contrat-Button">';
                            echo anchor('admin/demandes/' . $identifiant . '/' . $d->id . '', '<i class="fa-solid fa-eye"></i>');

                            echo '</div>';
                            echo '</li>';


                            $cpt++;

                        }

                    }
                    ?>
                </ul>
            </div>

            <div class="liste-contrat">
                <table class=table>
                    <?php
                    use App\Models\Employe;

                    if ($demandes->count() == 0) {

                    } else {
                        echo "<tr>";
                        echo "<td width='30%' class='contrat-div'>";
                        echo "<br>";
                        if ($demandes == null) {
                            echo "<h1> ? <h1>";
                        } else {
                            echo "<h2> Demande N° <b>" . $demande->id . "</b></h2>";
                            echo "<br>";
                            echo " <p>Date Début : <b>" . $demande->dated . "</b></p>";
                            echo "<br>";
                            echo " <p>Etat : <b>" . $demande->etat . "</b></p>";
                            echo "<br>";
                            echo " <p>Client : <b>" . $demande->client_id . "</b></p>";
                            echo "<br>";
                            echo "<br>";

                            // Affichage des informations de pivot
                            echo "<b>Informations de la demande :</b>";
                            echo "<br>";
                            foreach ($demande->prestations as $prestation) {
                                echo "<br>";
                                echo "Date début : <b>" . $prestation->pivot->date_debut . "</b>";
                                echo "<br>";
                                echo "Date fin : <b>" . $prestation->pivot->date_fin . "</b>";
                                echo "<br>";
                                echo "Adresse : <b>" . $prestation->pivot->adresse . "</b>";
                                echo "<br>";
                                echo "Ville : <b>" . $prestation->pivot->ville . "</b>";
                                echo "<br>";
                                echo "Code postal : <b>" . $prestation->pivot->cp . "</b>";
                                echo "<br>";
                                echo "Période : <b>";
                                if ($prestation->pivot->periode == 1) {
                                    echo "Journée";
                                } elseif ($prestation->pivot->periode == 2) {
                                    echo "Nuit";
                                }
                                echo "</b>";
                                echo "<br>";

                                // Ajout des boutons Accepté et Refusé
                                if ($demande->etat == 'EnAttente') {

                                    echo '<form action="' . base_url('Admin/validedemande') . '" method="POST">';
                                    echo '<div class="boutons-container">';
                                    echo '<input type="hidden" name="demandeIdAccepte" value="' . $demande->id . '">';
                                    echo '<button type="submit" class="bouton-accepte"  name="action" value="accepte">Accepté</button>';
                                    echo '</form>';

                                    echo '<form action="' . base_url('Admin/refusedemande') . '" method="POST">';
                                    echo '<input type="hidden"  name="demandeIdRefuse" value="' . $demande->id . '">';
                                    echo '<button type="submit" class="bouton-refuse" name="action" value="refuse">Refusé</button>';
                                    echo '</div>';
                                    echo '</form>';
                                }


                            }
                            echo "</td>";
                            echo "</tr>";
                        }
                    }
                    ?>
                </table>
            </div>
        </div>

        </.>
</body>



<style>
    .boutons-container {
        display: flex;
    }

    .bouton-accepte {
        color: white;
        font-weight: 600;
        font-size: 14px;
        line-height: 24px;
        width: 110px;
        height: 30px;
        background-color: #c73320;
        cursor: pointer;
        text-decoration: none;
        transition: background-color 0.2s;
        border: none;
        outline: none;
        border-radius: 2px;

    }

    .bouton-refuse {
        margin-left: 5px;
        color: white;
        font-weight: 600;
        font-size: 14px;
        line-height: 24px;
        width: 110px;
        height: 30px;
        background-color: #17be69;
        cursor: pointer;
        text-decoration: none;
        transition: background-color 0.2s;
        border: none;
        outline: none;
        border-radius: 2px;
    }
</style>