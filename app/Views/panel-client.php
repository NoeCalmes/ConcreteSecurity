<!DOCTYPE html>
<html lang="fr">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Panel Client</title>
</head>

<body>

    <div class="container-infoclient">
        <form id="modifier-form" method="post" action="<?php echo base_url("/panelclient/update"); ?>">
        <h2 class="infoclient-panel">Vos informations : </h2>
            <div class="container-principal-client">
                <div class="container-textclient">
                    <p class="textclient-p">
                        Nom :
                    </p>
                    <input class="userclient-info" type="text" id="nom" name="nom"
                        value="<?php echo isset ($nomclient) ? $nomclient : ''; ?>" />
                </div>
                <div class="container-textclient">
                    <p class="textclient-p">
                        Tel :
                    </p>
                    <input class="userclient-info" type="text" id="tel" name="tel"
                        value="<?php echo isset ($telclient) ? $telclient : ''; ?>" />
                </div>
                <div class="container-textclient">
                    <p class="textclient-p">
                        Rue :
                    </p>
                    <input class="userclient-info" type="text" id="rue" name="rue"
                        value="<?php echo isset ($rueclient) ? $rueclient : ''; ?>" />
                </div>
                <div class="container-textclient">
                    <p class="textclient-p">
                        CP:
                    </p>
                    <input class="userclient-info" type="text" id="cp" name="cp"
                        value="<?php echo isset ($cpclient) ? $cpclient : ''; ?>" />
                </div>
                <div class="container-textclient">
                    <p class="textclient-p">
                        Ville:
                    </p>
                    <input class="userclient-info" type="text" id="ville" name="ville"
                        value="<?php echo isset ($villeclient) ? $villeclient : ''; ?>" />
                </div>

            </div>
            <button type="submit" class="modifier-btn">Modifier</button>
        </form>
    </div>

</body>

<style>
    .modifier-btn {
        color: white;
        font-family: 'Inter';
        font-style: normal;
        font-weight: 500;
        font-size: 15px;
        line-height: 24px;
        padding: 6px 15px 6px 15px;
        background-color: #1c2752;
        cursor: pointer;
        text-decoration: none;
        transition: background-color 0.2s;
        outline: none;

    }

    .container-principal-client {
        display: flex;
        align-items: center;
        justify-content: center;
        margin-bottom: 20px;

    }

    .container-infoclient {
        border-radius: 5px;
        display: flex;
        align-items: center;
        margin: auto;
        background: #f4f4f4;
        width: 1000px;
        height: 250px;
        margin-bottom: 40px;
        justify-content: center;
        flex-direction: column;
    }

    .container-textclient {
        margin: 10px;
    }

    .userclient-info {
        border: 2px solid rgba(216, 216, 216, 0.4);
        border-radius: 5px;
        height: 25px;
    }

    .textclient-p {
        margin-bottom: 5px;
    }

    .infoclient-panel {
        margin: 0px 0px 30px 0px;
    }
</style>

</html>