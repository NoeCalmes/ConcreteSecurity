<body class="paneladmin">
    <div class="container-contrat">
        <div class="Title">
            <h1>
                <?php echo $title ?>
            </h1>
        </div>

        <br>

        <div class="Demande-id-List">
            <table class="table">
                <?php
                $cpt = 0;
                if ($demandes->count() == 0) {
                    echo '<h1> Aucune Demande de ce type est disponible </h1>';
                } else {
                    foreach ($demandes as $d) {
                        echo '<tr>';
                        echo '<td class="Contrat-Number-Main">';
                        echo '<b>Demande n°' . $d->id . '</b>';
                        echo '</td>';

                        echo '<td class="Contrat-Button">';
                        echo anchor('admin/demandes/' . $identifiant . '/' . $d->id . '', '<i class="fa-solid fa-eye"></i>');
                        echo '</td>';

                        echo '</tr>';
                        $cpt++;
                    }
                }
                ?>
            </table>
        </div>

        <div class="liste-contrat">
            <table class="table">
                <?php
                if ($demandes->count() > 0) {
                    echo "<tr>";
                    echo "<td width='30%' class='contrat-div'>";
                    echo "<br>";
                    echo "Demande N° : <b>" . $demande->id . "</b>";
                    echo "<br>";
                    echo "Date : <b>" . $demande->dated . "</b>";
                    echo "<br>";
                    echo "Etat : <b>" . $demande->etat . "</b>";
                    echo "<br>";
                    echo "Client : <b>" . $demande->client_id . "</b>";
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
                ?>
            </table>
        </div>
    </div>
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