<!DOCTYPE html>
<html lang="fr">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>A propos du compte</title>
</head>

<body>
    <div class="container-aproposclient">
        <a class="apropos-btnclient" href="<?php echo base_url('modification') ?>">Modifier vos Informations</a>
        <a class="apropos-btnclient" href="<?php echo base_url('panelclient') ?>">Consulter vos Demandes</a>
    </div>
</body>

</html>

<style>
    a.apropos-btnclient {
        color: white;
        background-color: #1c2752;
        line-height: 24px;
        padding: 13px;
        cursor: pointer;
        font-weight: 500;
        color: white;
        margin-bottom: 15px;
        font-size: 18px;

    }


    .container-aproposclient {
        margin: 50px;
        display: flex;
        justify-content: center;
        align-items: center;
        flex-direction: column;
    }
</style>