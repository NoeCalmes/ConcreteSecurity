<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Apropos</title>
</head>

<div class="apropos">
    <div class="container-apropos">
        <div class="left">
            <img class="pic" src="<?= base_url('public/img/apropos/image.jpg') ?>" alt="">
        </div>
        <div class="right">
            <h1>A propos</h1>
            <h2>L'entreprise concretesecurity</h2>
            <p>ConcreteSecurity, fondée en 2012 à Mende, est aujourd'hui un acteur majeur en Lozère en matière de
                sécurité. Forte de ses neuf ans d'expérience, l'entreprise a fièrement offert 250 services de sécurité
                personnalisés à ses clients. Elle s'est imposée comme une référence dans le domaine, grâce à son
                engagement constant envers la protection et la tranquillité de ses clients.</p>
            <a href="Hire Me"></a>
        </div>
    </div>
</div>

</html>

<style>
    @import url('https://fonts.googleapis.com/css2?family=Poppins:wght@200;300;400;500&display=swap');

    * {
        margin: 0;
        padding: 0;
        text-decoration: none;
        list-style: none;
    }

    .container-apropos {
        display: flex;
        justify-content: center;
        align-items: center;
    }

    .apropos {
        display: flex;
        justify-content: center;
        align-items: center;
        height: 60vh;
        width: 100%;
        padding: 90px 0;
        background: #f4f4f4;
    }

    .pic {
        height: auto;
        width: 600px;
        border-radius: 20px;
    }

    .apropos .right {
        margin-left: 80px;
        width: 40%;
    }

    .apropos h1 {
        font-family: "Poppins";
        font-size: 80px;
        font-weight: 600;
        margin-bottom: 10px;
        color: #1c2752;
    }

    .apropos h2 {
        font-family: "Poppins";
        font-size: 22px;
        font-weight: 500;
        margin-bottom: 20px;
        
    }

    .apropos p {
        font-family: "Poppins";
        font-size: 18px;
        line-height: 25px;
        letter-spacing: 1px;
        margin-bottom: 25px;
    }
</style>