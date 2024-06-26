<body class="paneladmin">
    <div class="container-contrat">

        <div class="DivLis">

            <div class="Contrat-id-List">
                <ul class=table>
                    <h1><?php echo $title ?></h1>
                    <?php
                    $cpt = 0;
                    if ($demandes->count() == 0) {
                        
                    } else {
                        foreach ($demandes as $d) {
                            echo '<li class ="Contrat-Number-Main">';
                            echo '<div class ="Contrat-Number">';
                            echo '<b>Demande n°' . $d->id . '</b>';
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
                        echo "<h1 class='NoContrat'> Aucune demande de ce type n'est disponible </h1>";
                    } else {
                        echo "<tr>";
                        echo "<td width='30%' class='contrat-div'>";
                        echo "<br>";
                        if ($demandes == null) {
                            echo "<h1> ? <h1>";
                        } else {
                            echo "<h2> Demande N° <b>" . $demande->id . "</b></h2>";
                            echo "<br>";
                            echo " <p>Date de Création : <b>" . $demande->dated . "</b></p>";
                            echo "<br>";
                            echo " <p>Etat : <b>" . $demande->etat . "</b></p>";
                            echo "<br>";
                            echo " <p>Client : <b>" . $demande->client_id . "</b></p>";
                            echo "<br>";
                            echo "<br>";

                            // Affichage des informations de pivot
                            echo "<p class='InfoTitle'>Informations de la demande</p>";
                            echo "<br>";
                            echo "<div class = 'InformationDemande'>";
                            foreach ($demande->prestations as $prestation) {
                                echo "<br>";
                                echo "<p class='InfoFormText'>Date début  <b>" . $prestation->pivot->date_debut . "</b></p>";
                                echo "<br>";
                                echo "<p>Date fin <b>" . $prestation->pivot->date_fin . "</b></p>";
                                echo "<br>";
                                echo "<p class='InfoFormText'> Adresse <b>" . $prestation->pivot->adresse . "</b></p>";
                                echo "<br>";
                                echo "<p class='InfoFormText'> Ville <b>" . $prestation->pivot->ville . "</b></p>";
                                echo "<br>";
                                echo "<p class='InfoFormText'> Code postal <b>" . $prestation->pivot->cp . "</b></p>";
                                echo "<br>";
                                echo "<p class='InfoFormText'> Période <b>";
                                if ($prestation->pivot->periode == 1) {
                                    echo "Journée";
                                } elseif ($prestation->pivot->periode == 2) {
                                    echo "Nuit";
                                }
                                echo "</b></p>";
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
                            echo "</div class = 'InformationDemande'>";
                        }
                    }
                    ?>
                </table>
            </div>
        </div>

        </.>
</body>