
<!DOCTYPE html>
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Arabic Tutors</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.1.3/dist/css/bootstrap.min.css"
        integrity="sha384-MCw98/SFnGE8fJT3GXwEOngsV7Zt27NXFoaoApmYm81iuXoPkFOJwJ8ERdknLPMO" crossorigin="anonymous">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js"></script>
    <script src="https://use.fontawesome.com/releases/v5.0.8/js/all.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/kute.js@2.1.2/dist/kute.min.js"></script>
    <link href="style.css" rel="stylesheet">
</head>
<style>
    @import url("https://fonts.googleapis.com/css?family=Spartan&display=swap");
* {
  margin: 0;
  padding: 0;
}



.contact-us {
background: gray;
  padding: 50px 100px;
  border-top: 10px solid #f45702;
}

label, input, textarea {
  display: block;
  width: 100%;
  font-size: 12pt;
  line-height: 24pt;
  font-family: "Spartan";
}

input {
  margin-bottom: 24pt;
}

h3 {
  font-weight: normal;
  font-size: 10pt;
  line-height: 24pt;
  font-style: italic;
  margin: 0 0 0.5em 0;
}

span {
  font-size: 8pt;
}

em {
  color: #f45702;
  font-weight: bold;
}

input, textarea {
  border: none;
  border: 1px solid rgba(0, 0, 0, 0.1);
  border-radius: 2px;
  background: #f8f4e5;
  padding-left: 5px;
  outline: none;
}

input:focus, textarea:focus {
  border: 1px solid #6bd4b1;
}

textarea {
  resize: none;
}

button {
  display: block;
  float: right;
  line-height: 24pt;
  padding: 0 20px;
  border: none;
  background: #f45702;
  color: white;
  letter-spacing: 2px;
  transition: 0.2s all ease-in-out;
  border-bottom: 2px solid transparent;
  outline: none;
}
button:hover {
  background: inherit;
  color: #f45702;
  border-bottom: 2px solid #f45702;
}

::selection {
  background: #ffc7b8;
}

input:-webkit-autofill,
input:-webkit-autofill:hover,
input:-webkit-autofill:focus,
textarea:-webkit-autofill,
textarea:-webkit-autofill:hover,
textarea:-webkit-autofill:focus {
  border: 1px solid #6bd4b1;
  -webkit-text-fill-color: #2A293E;
  -webkit-box-shadow: 0 0 0px 1000px #f8f4e5 inset;
  transition: background-color 5000s ease-in-out 0s;
}






</style>

<?php

ini_set("SMTP","ssl://smtp.gmail.com");
ini_set("smtp_port","465");

$errors = [];
$errorMessage = '';

if (!empty($_POST)) {
   $name = $_POST['name'];
   $email = $_POST['email'];
   $message = $_POST['message'];

   if (empty($name)) {
       $errors[] = 'Name is empty';
   }

   if (empty($email)) {
       $errors[] = 'Email is empty';
   } else if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
       $errors[] = 'Email is invalid';
   }

   if (empty($message)) {
       $errors[] = 'Message is empty';
   }

   if (empty($errors)) {
       $toEmail = 'onlinequran779@gmail.com';
       $emailSubject = 'New enquiry: Arabic Tutors Website';
       $headers = ['From' => $email, 'Reply-To' => $email, 'Content-type' => 'text/html; charset=utf-8'];
       $bodyParagraphs = ["Name: {$name}", "Email: {$email}", "Message:", $message];
       $body = join(PHP_EOL, $bodyParagraphs);

       if (mail($toEmail, $emailSubject, $body, $headers)) 

           header('Location: index.html');
       } else {
           $errorMessage = 'Oops, something went wrong. Please try again later';
       }

   } else {

       $allErrors = join('<br/>', $errors);
       $errorMessage = "<p style='color: red;'>{$allErrors}</p>";
   }


?>


<html>
<body>

 

    
    <!-- Navigation -->
<nav class="navbar navbar-custom navbar-expand-md sticky-top">
    <!-- md is breakpoint where it'll switch from mobile to website, light is the white background and dark text, sticky navbar  -->
        <div class="container-fluid"> 
            <!-- takes full screen -->
            <a class="navbar-brand" href="index.html"><img src="img/logo.JPG"></a>
            <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarResponsive"> 
                <!-- collapse allows it to close -->
                <span class="navbar-toggler-icon">   
                <i class="fas fa-bars" style="color:#fff; font-size:28px;"></i>
            </span>
            </button>
            <div class="collapse navbar-collapse" id="navbarResponsive">
                <ul class="navbar-nav ml-auto">
                    <!-- ml-auto: pushs menu to right hand side when screen is smaller -->
                    <li class="nav-item active">
                        <!-- active shows which tab is currently on -->
                        <a class="nav-link" href="index.html">Home</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="reviews.html">Reviews</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="contact.php">Contact</a>
                    </li>
            </div>
        </div>
    </nav> 


<div class="contact-us">
<h1 class="display-2 first">Contact Us</h1>
    <form method="post" id="contact-form">
      <label for="name">NAME <em>&#x2a;</em>
    </label>
    <input id="name" name="name" required="" type="text" />
    <label for="email">EMAIL <em>&#x2a;</em>
    </label>
    <input id="email" name="email" required="" type="email" />
    <label for="phone">PHONE</label>
    <input id="phone" name="phone" type="tel" />
    <label for="message">YOUR MESSAGE <em>&#x2a;</em></label>
    <textarea id="message" name="message" required="" rows="4"></textarea>
    <button id="customerOrder">SUBMIT</button>

    </form>
  </div>

          <!-- Footer -->
          <footer>
            <div class="container-fluid padding" style="background-image: url('img/quran.jpg') no-repeat cover;">
                <div class="row text-center">
                    <div class="container-fluid">
                        <div class="row text-center padding ">
                            <div class="col-12">
                                <h2>Contact us</h2>
                            </div>
                            <div class="col-12 social padding">
                                <a href="https://www.facebook.com/ArabicTutors/"><i class="fab fa-facebook"></i></a>
                                <a href="mailto:onlinequran779@gmail.com"><i class="far fa-envelope"></i></a>
                                <a href="https://wa.me/447466216535/?text=urlencodedtext"><i  class="fab fa-whatsapp"></i></a>
                            </div>
                        </div>
                    </div>
                    <div class="col-12">
                        <hr class="light-100">
                        <h5>Copyright © 2020 Arabic Tutors. All Rights Reserved.</h5>
                    </div>
                </div>
            </div>
        </footer>
  
        <script src="//cdnjs.cloudflare.com/ajax/libs/validate.js/0.13.1/validate.min.js"></script>
 <script>


     const constraints = {
         name: {
             presence: { allowEmpty: false }
         },
         email: {
             presence: { allowEmpty: false },
             email: true
         },
         message: {
             presence: { allowEmpty: false }
         }
     };

    //  const form = document.getElementById('contact-form');
    //  form.addEventListener('submit', function (event) {

    //      const formValues = {
    //          name: form.elements.name.value,
    //          email: form.elements.email.value,
    //          message: form.elements.message.value
    //      };


    //      const errors = validate(formValues, constraints);
    //      if (errors) {
    //          event.preventDefault();
    //          const errorMessage = Object
    //              .values(errors)
    //              .map(function (fieldValues) {
    //                  return fieldValues.join(', ')
    //              })
    //              .join("\n");

    //          alert(errorMessage);
    //      }
    //  }, false);
 </script>

  </body>
  
  
  </html>
  