<!DOCTYPE html>
<html lang="fr">

<head>
  <meta charset="UTF-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0" />
  <script src="https://kit.fontawesome.com/64d58efce2.js" crossorigin="anonymous"></script> 
  <title>Contact</title>
</head>

<body class="contact-body">
  <div class="container-contact">
    <span class="big-circle-contact"></span>
    <div class="form-contact">
      <div class="contact-info">
        <h3 class="title-contact">Prenons contact</h3>
        <p class="text">
          Une question ? N'hésitez pas à nous contacter. Nous sommes là pour répondre à toutes vos interrogations.
        </p>
        <div class="info">
          <div class="information">
            <img src="<?= base_url('public/img/contact/location.svg') ?>" class="icon" alt="" />
            <p>15 Rue Notre-Dame 48000 , Mende</p>
          </div>
          <div class="information">
            <img src="<?= base_url('public/img/contact/mail.svg') ?>" class="icon" alt="" />
            <p>concretesecurity@contact.com</p>
          </div>
          <div class="information">
            <img src="<?= base_url('public/img/contact/phone.svg') ?>" class="icon" alt="" />
            <p>+07 58 69 78 54</p>
          </div>
        </div>

        <div class="social-media">
          <p>Nos réseaux :</p>
          <div class="social-icons">
            <a href="#">
              <i class="fab fa-facebook-f"></i>
            </a>
            <a href="#">
              <i class="fab fa-twitter"></i>
            </a>
            <a href="#">
              <i class="fab fa-instagram"></i>
            </a>
            <a href="#">
              <i class="fab fa-linkedin-in"></i>
            </a>
          </div>
        </div>
      </div>

      <div class="contact-form">
        <span class="circle-contact one"></span>
        <span class="circle-contact two"></span>

        <form class="form-contact-c"  action="index.html" autocomplete="off">
          <h3 class="title-contact">Nous contacter</h3>
          <div class="input-container">
            <input type="text-contact" name="name" class="input" />
            <label for="">Nom</label>
            <span>Nom</span>
          </div>
          <div class="input-container">
            <input type="email" name="email" class="input" />
            <label for="">Email</label>
            <span>Email</span>
          </div>
          <div class="input-container">
            <input type="tel" name="phone" class="input" />
            <label for="">Téléphone</label>
            <span>Téléphone</span>
          </div>
          <div class="input-container textarea">
            <textarea name="message" class="input"></textarea>
            <label for="">Message</label>
            <span>Message</span>
          </div>
          <input type="submit" value="Envoyer" class="btn" />
        </form>
      </div>
    </div>
  </div>


</body>

</html>
