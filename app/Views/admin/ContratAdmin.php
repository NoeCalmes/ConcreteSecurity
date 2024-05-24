<body class="paneladmin">
    <div class="container-contrat">

        <div class="DivLis">

            <div class="Contrat-id-List">
                <ul class=table>
                    <h1><?php echo $title ?></h1>
                    <?php
                    $cpt = 0;
                    if ($contrats->count() == 0) {

                    } else {
                        foreach ($contrats as $c) {
                            echo '<li class ="Contrat-Number-Main">';
                            echo '<div class ="Contrat-Number">';
                            echo '<b>Contrat n°' . $c->id . '</b>';
                            echo $logo;
                            echo '</div>';

                            echo '<div class ="Contrat-Button">';
                            echo anchor('admin/contrats/' . $identifiant . '/' . $c->id . '', '<i class="fa-solid fa-eye"></i>');

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

                    if ($contrats->count() == 0) {
                        echo "<h1 class='NoContrat'> Aucun Contrat de ce type n'est disponible </h1>";
                    } else {
                        echo "<tr>";
                        echo "<td width='30%' class='contrat-div'>";
                        echo "<br>";
                        if ($contrat == null) {
                            echo "<h1> ? <h1>";
                        } else {
                            echo "<h2> Contrat N° <b>" . $contrat->id . "</b></h2>";
                            echo "<br>";
                            echo " <p class='Description'>Description : <b Class='TextDescription'>" . $contrat->description . "</b></p>";
                            echo "<br>";
                            echo " <p>Date Début : <b>" . $contrat->datedebut . "</b></p>";
                            echo "<br>";
                            echo " <p>Date Fin : <b>" . $contrat->datefin . "</b></p>";
                            echo "<br>";
                            echo " <p>Ville : <b>" . $contrat->ville . "</b></p>";
                            echo "<br>";
                            echo " <p>Code Postal : <b>" . $contrat->cp . "</b></p>";
                            echo "<br>";
                            echo " <p>Adresse: <b>" . $contrat->adresse . "</b></p>";
                            echo "<br>";
                            if ($contrat->prediode_id == 1) {
                                echo "<p>Periode : <b> Jour </b></p>";
                            } else {
                                echo "<p>Periode : <b> Nuit </b></p>";
                            }
                            echo "<br>";
                            if ($identifiant == 1) {
                                echo "<p class='AssignerEmploye'>Assigner un Employer </p>";
                                echo "<br>";
                                echo "<form action='".base_url()."admin/assigner' method='post'class='AssignerEmployeForm' >";
                                echo "<select name='employe_id'>";
                                foreach ($employee as $employe) {
                                    echo "<option value='" . $employe->id . "'>" . $employe->nom . "</option>";
                                }
                                echo "</select>";
                                echo "<input type='hidden' name='contrat_id' value='" . $contrat->id . "'>";
                                echo "<button type='submit'>Valider</button>";
                                echo "</form>";
                            } elseif ($identifiant >= 2) {
                                $employe_id = $contrat->employe_id;
                                $employe_name = Employe::where("id", $employe_id)->first()->prenom;
                                $employe_surname = Employe::where("id", $employe_id)->first()->nom;
                                echo "<p class ='EmployerAssigner'> Employé Assigner: <b>" . $employe_name . " <c>" . $employe_surname . "<c> </b></p>";

                            }
                            echo '</div>';
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