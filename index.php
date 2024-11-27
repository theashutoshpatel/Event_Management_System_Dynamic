<!DOCTYPE html>

  <?php
  session_start();
  include('admin/db_connect.php');
  ob_start();
  $query = $conn->query("SELECT * FROM system_settings limit 1")->fetch_array();
  foreach ($query as $key => $value) {
    if (!is_numeric($key))
      $_SESSION['system'][$key] = $value;
  }
  ob_end_flush();
  include('header.php');


  ?>

  <style>

#mainNav {
    transition: background 0.5s ease;
    position: fixed;
    width: 100%;
    z-index: 1000;
    padding: 0; /* Remove extra padding */
    height: 60px; /* Set a fixed height for the navbar */
}
.navbar-nav .nav-item .nav-link {
    font-size: 16px;
    font-weight: 500;
    letter-spacing: 1px;
    text-transform: uppercase;
    padding: 12px 20px;
    color: white !important;
    transition: all 0.3s ease;
}
.navbar-nav .nav-item .nav-link:hover {
    color: #00d4ff;
    transform: scale(1.1);
    background: rgba(0, 212, 255, 0.3);
    border-radius: 10px;
}
.navbar-nav .nav-item.active .nav-link {
    color: #00d4ff;
    font-weight: bold;
}
@media (max-width: 991px) {
    .navbar-nav .nav-item {
        margin-top: 10px;
    }
    .navbar-toggler {
        border-color: rgba(0, 212, 255, 1);
    }
}
.navbar-nav .nav-item.active .nav-link {
    color: #fff;
    background: rgba(47, 47, 170, 0.8);
}
.navbar-brand {
    font-size: 1.6rem;
    font-weight: 600;
    color: white !important;
    transition: all 0.3s ease;
}

.navbar-brand:hover {
    color: #00d4ff !important;
}
@keyframes slideIn {
    0% {
        transform: translateX(-100%);
    }
    100% {
        transform: translateX(0);
    }
}
.navbar-collapse {
    animation: slideIn 0.5s ease-out;
}
@media (max-width: 767px) {
    .navbar-toggler-icon {
        background-color: rgba(0, 212, 255, 1);
    }
}
/* Logo Styling */
.navbar-brand img {
    height: 40px; /* Adjust logo size */
    margin-right: 10px; /* Space between the logo and brand name */
    transition: all 0.3s ease;
}

.navbar-brand:hover img {
    transform: scale(1.1); /* Optional: Add a hover effect to the logo */
}


    header.masthead {
      background: url(admin/assets/uploads/<?php echo $_SESSION['system']['cover_img'] ?>);
      background-repeat: no-repeat;
      background-size: cover;
    }

    #viewer_modal .btn-close {
      position: absolute;
      z-index: 999999;
      /*right: -4.5em;*/
      background: unset;
      color: white;
      border: unset;
      font-size: 27px;
      top: 0;
    }

    #viewer_modal .modal-dialog {
      width: 80%;
      max-width: unset;
      height: calc(90%);
      max-height: unset;
    }

    #viewer_modal .modal-content {
      background: black;
      border: unset;
      height: calc(100%);
      display: flex;
      align-items: center;
      justify-content: center;
    }

    #viewer_modal img,
    #viewer_modal video {
      max-height: calc(100%);
      max-width: calc(100%);
    }

    footer .social-link {
    transition: transform 0.3s ease, color 0.3s ease;
    display: inline-block;
    color: #DEE2E6;
}

footer .social-link:hover {
    transform: scale(1.2);
    color: #00acee; 
}

/* Contact style  */
/* Contact Section */
.form-section {
  background-color: #f7f7f7;
  padding: 50px 0;
  transition: all 0.3s ease;
}

.form-container {
  max-width: 600px;
  margin: 0 auto;
  background: #fff;
  padding: 30px;
  border-radius: 8px;
  box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
  transform: translateY(20px);
  opacity: 0;
  animation: fadeInUp 1s forwards;
}

.form-container h2 {
  font-size: 2rem;
  text-align: center;
  color: #333;
}

.form-container span {
  color: #00d4ff;
}

.input-group {
  margin-bottom: 20px;
}

.input-group label {
  font-weight: bold;
  color: #333;
  margin-bottom: 5px;
}

.input-group input, 
.input-group textarea {
  width: 100%;
  padding: 12px;
  border: 1px solid #ddd;
  border-radius: 5px;
  font-size: 1rem;
  transition: border 0.3s ease;
}

.input-group input:focus, 
.input-group textarea:focus {
  border-color: #00d4ff;
  outline: none;
}

.submit-btn {
  width: 100%;
  padding: 12px;
  background-color: #00d4ff;
  border: none;
  border-radius: 5px;
  font-size: 1.2rem;
  color: white;
  cursor: pointer;
  transition: background-color 0.3s ease;
}

.submit-btn:hover {
  background-color: #007b8f;
}

@keyframes fadeInUp {
  0% {
    transform: translateY(20px);
    opacity: 0;
  }
  100% {
    transform: translateY(0);
    opacity: 1;
  }
}

/* Modal Popup */
.email-popup-modal {
  display: none;
  position: fixed;
  top: 0;
  left: 0;
  right: 0;
  bottom: 0;
  background-color: rgba(0, 0, 0, 0.5);
  z-index: 1000;
  justify-content: center;
  align-items: center;
}

.email-popup-dialog {
  background: white;
  border-radius: 10px;
  padding: 20px;
  max-width: 400px;
  width: 100%;
  transform: scale(0.8);
  animation: popupModal 0.3s forwards;
}

.email-popup-header {
  display: flex;
  justify-content: space-between;
  align-items: center;
}

.email-popup-footer {
  display: flex;
  justify-content: flex-end;
}

.email-popup-close {
  background: none;
  border: none;
  font-size: 1.5rem;
  cursor: pointer;
}

@keyframes popupModal {
  0% {
    transform: scale(0.8);
    opacity: 0;
  }
  100% {
    transform: scale(1);
    opacity: 1;
  }
}

/* Social Media Icons in Footer */
footer .social-link {
  transition: transform 0.3s ease, color 0.3s ease;
  display: inline-block;
}

footer .social-link:hover {
  transform: scale(1.2);
  color: #00acee;
}

  </style>

  <body id="page-top">
    <!-- Navigation-->
    <div class="toast" id="alert_toast" role="alert" aria-live="assertive" aria-atomic="true">
      <div class="toast-body text-white">
      </div>
    </div>
    <nav class="navbar navbar-expand-lg navbar-light fixed-top py-3" id="mainNav" style="background: linear-gradient(90deg, rgba(2, 0, 36, 1) 0%, rgba(47, 47, 170, 1) 35%, rgba(0, 212, 255, 1) 100%);">
  <div class="container">
    <!-- Logo and Brand Name -->
    <a class="navbar-brand js-scroll-trigger text-white" href="./">
      <!-- Logo Image -->
      <img src="admin\assets\img\image.png" alt="Festiiv Logo" style="height: 40px; margin-right: 10px;"> <!-- Update with the correct logo path -->
      Festiiv Events
    </a>
    
    <!-- Navbar Toggler -->
    <button class="navbar-toggler navbar-toggler-right" type="button" data-toggle="collapse"
      data-target="#navbarResponsive" aria-controls="navbarResponsive" aria-expanded="false"
      aria-label="Toggle navigation"><span class="navbar-toggler-icon"></span></button>
      
    <div class="collapse navbar-collapse" id="navbarResponsive">
      <ul class="navbar-nav ml-auto my-2 my-lg-0">
        <li class="nav-item"><a class="nav-link js-scroll-trigger text-white" href="index.php?page=home">Home</a></li>
        <li class="nav-item"><a class="nav-link js-scroll-trigger text-white" href="index.php?page=venue">Venues</a></li>
        <li class="nav-item"><a class="nav-link js-scroll-trigger text-white" href="index.php?page=about">About</a></li>
        <li class="nav-item"><a class="nav-link js-scroll-trigger text-white" href="#contact">Contact</a></li>
      </ul>
    </div>
  </div>
</nav>



    <?php
    $page = isset($_GET['page']) ? $_GET['page'] : "home";
    include $page . '.php';
    ?>


    <div class="modal fade" id="confirm_modal" role='dialog'>
      <div class="modal-dialog modal-md" role="document">
        <div class="modal-content">
          <div class="modal-header">
            <h5 class="modal-title">Confirmation</h5>
          </div>
          <div class="modal-body">
            <div id="delete_content"></div>
          </div>
          <div class="modal-footer">
            <button type="button" class="btn btn-primary" id='confirm' onclick="">Continue</button>
            <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
          </div>
        </div>
      </div>
    </div>
    <div class="modal fade" id="uni_modal" role='dialog'>
      <div class="modal-dialog modal-md" role="document">
        <div class="modal-content">
          <div class="modal-header">
            <h5 class="modal-title"></h5>
          </div>
          <div class="modal-body">
          </div>
          <div class="modal-footer">
            <button type="button" class="btn btn-primary" id='submit'
              onclick="$('#uni_modal form').submit()">Save</button>
            <button type="button" class="btn btn-secondary" data-dismiss="modal">Cancel</button>
          </div>
        </div>
      </div>
    </div>
    <div class="modal fade" id="uni_modal_right" role='dialog'>
      <div class="modal-dialog modal-full-height  modal-md" role="document">
        <div class="modal-content">
          <div class="modal-header">
            <h5 class="modal-title"></h5>
            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
              <span class="fa fa-arrow-righ t"></span>
            </button>
          </div>
          <div class="modal-body">
          </div>
        </div>
      </div>
    </div>
    <div class="modal fade" id="viewer_modal" role='dialog'>
      <div class="modal-dialog modal-md" role="document">
        <div class="modal-content">
          <button type="button" class="btn-close" data-dismiss="modal"><span class="fa fa-times"></span></button>
          <img src="" alt="">
        </div>
      </div>
    </div>
    <!-- Contact section start  -->
    <section class="form-section" id="contact">
  <div class="form-container">
    <h2>Contact <span>Us</span></h2>
    <form action="#" class="animated-form" name="contact" onSubmit="sendEmail(); reset(); return false;">
      <!-- Name -->
      <div class="input-group">
        <label for="name">Name</label>
        <input type="text" id="name" name="name" placeholder="Enter your name" required />
      </div>

      <!-- Email -->
      <div class="input-group">
        <label for="email">Email</label>
        <input type="email" id="email" name="email" placeholder="Enter your email" required />
      </div>

      <!-- Subject -->
      <div class="input-group">
        <label for="subject">Subject</label>
        <input type="text" id="subject" name="subject" placeholder="Enter the subject" required />
      </div>

      <!-- Message -->
      <div class="input-group">
        <label for="message">Message</label>
        <textarea id="message" name="message" rows="4" placeholder="Enter your message" required></textarea>
      </div>

      <!-- Submit Button -->
      <button type="submit" class="submit-btn">Send Message</button>
    </form>
  </div>
</section>

    <div id="preloader"></div>
    <footer class="py-3" style="background-color: #212529; color: #DEE2E6; font-size: 0.9rem;">
    <div class="container text-center">
        <!-- Copyright Section -->
        <p class="mb-3">
            © <?php echo date("Y"); ?> <?php echo $_SESSION['system']['name']; ?> - Festiiv
        </p>

        <!-- Social Media Icons -->
        <ul class="nav justify-content-center list-unstyled d-flex">
            <!-- Facebook -->
            <li class="ms-3">
                <a href="https://www.facebook.com" class="social-link" title="Facebook" target="_blank">
                <img width="32" height="32" src="https://img.icons8.com/3d-fluency/94/facebook-logo.png" alt="facebook-logo"/>
                </a>
            </li>

            <!-- GitHub -->
            <li class="ms-3">
                <a href="https://www.github.com" class="social-link" title="GitHub" target="_blank">
                <img width="32" height="32" src="https://img.icons8.com/3d-fluency/94/linkedin-logo.png" alt="linkedin-logo"/>
                </a>
            </li>

            <!-- LinkedIn -->
            <li class="ms-3">
                <a href="https://www.linkedin.com" class="social-link" title="LinkedIn" target="_blank">
                <img width="32" height="32" src="https://img.icons8.com/3d-fluency/94/github-logo.png" alt="github-logo"/>
                </a>
            </li>
        </ul>
    </div>
</footer>


<script>
  function sendEmail() {
      const customerName = document.getElementById("name").value;
      const customerEmail = document.getElementById("email").value;
      const subject = document.getElementById("subject").value;
      const message = document.getElementById("message").value;

      // Customized email body
      const emailBody = `
        <h2>New Contact Form Enquiry</h2>
        <p><strong>Name:</strong> ${customerName}</p>
        <p><strong>Email:</strong> ${customerEmail}</p>
        <p><strong>Subject:</strong> ${subject}</p>
        <p><strong>Message:</strong></p>
        <p>${message}</p>
    `;

      Email.send({
        Host: "smtp.elasticemail.com",
        Username: "ashutoshpatel.sng2@gmail.com", // Your verified Elastic Email account
        Password: "3089BDDE67842FC6F03244ACFA543FD927FA", // Your Elastic Email API Key
        To: "techgaming561@gmail.com", // Your email to receive the messages
        From: "ashutoshpatel.sng2@gmail.com", // Your verified sender email
        Subject: "New Contact Form Enquiry from " + customerName,
        Body: emailBody,
      })
        .then(() => {
          showEmailPopup();
        })
        .catch((error) => alert("Error: " + error));
    }

    function showEmailPopup() {
      const modal = document.getElementById("emailSuccessPopup");
      modal.style.display = "block";
    }

    function closeEmailPopup() {
      const modal = document.getElementById("emailSuccessPopup");
      modal.style.display = "none";
    }
</script>
    <?php include('footer.php') ?>
  </body>

  <?php $conn->close() ?>
  </div>

  </html>