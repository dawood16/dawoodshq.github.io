<?php 

    // Email settings 
    $toEmail = 'softhousesol@outlook.com'; // Recipient email 
    $from = 'dont-reply@softhousesol.com'; // Sender email 
    
    $statusMsg = ''; 

    $msgClass = 'errordiv'; 
    if(isset($_POST['submit']) && $_POST['submit'] === 'Submit'){ 
    // Get the submitted form data 
    $Name = $_POST['fName'] . ' '. $_POST['lName']  ;
    $Email = $_POST['email'];
    $phoneNo = $_POST['phoneNo'];
    $message = $_POST['message'];


    $emailSubject = 'A contact form submission by '.$Name; 

    // Email message  
    $htmlContent = '<h4>A contact form submission by '.$Name .'</h4> 
    <p><b>Name</b>: '. $Name . '</p>
    <p><b>Email</b>: '. $Email . '</p>
    <p><b>Phone No</b>: '. $phoneNo . '</p>
    <p><b>Message</b>: '. $message . '</p>';
    
    // <p><b>Name:</b> '.$name.'</p> 
    // <p><b>Email:</b> '.$email.'</p> 
    // <p><b>Subject:</b> '.$subject.'</p> 
    // <p><b>Message:</b><br/>'.$message.'</p>'; 


    // Header for sender info 
    
    $headers = "From: $Name"." <".$from.">"; 

    // Boundary  
    $semi_rand = md5(time());  
    $mime_boundary = "==Multipart_Boundary_x{$semi_rand}x";  
     
    // Headers for attachment  
    $headers .= "\nMIME-Version: 1.0\n" . "Content-Type: multipart/mixed;\n" . " boundary=\"{$mime_boundary}\"";  
     
    // Multipart boundary  
    $message = "--{$mime_boundary}\n" . "Content-Type: text/html; charset=\"UTF-8\"\n" . 
    "Content-Transfer-Encoding: 7bit\n\n" . $htmlContent . "\n\n";  
     
    // Preparing attachment 
    
        $message .= "--{$mime_boundary}\n"; 
        $data = chunk_split(base64_encode($data)); 
        $message .= "Content-Type: application/octet-stream;" .  
        "Content-Transfer-Encoding: base64\n\n" . $data . "\n\n"; 
        $message .= "--{$mime_boundary}--"; 
     
    // Send email 
    $mail = mail($toEmail, $emailSubject, $message, $headers); 

    // $mail = mail($toEmail, $emailSubject, $htmlContent, $headers);  
        if($mail){
            $statusMsg = 'We have received your email. We will get back to you shortly.';
        }else{
            $statusMsg = 'Error email is not send.';
        }
    }


?>

<!doctype html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>SoftHouse - Thank You</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Montserrat:wght@400;500;700&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="css/style.css">
    <link rel="icon" type="image/png" href="img/fav.png">
    <style>
        section#about-us {
            height: 76.8vh;
            align-items: center;
            display: flex;
        }
    </style>
</head>

<body>
    <header>
        <nav class="navbar navbar-expand-lg ">
            <div class="container">
                <a class="navbar-brand" href="/"><img src="img/logo.png" alt="" class="img-fluid logo"></a>
                <button class="navbar-toggler" type="button" data-bs-toggle="collapse"
                    data-bs-target="#navbarNavDropdown" aria-controls="navbarNavDropdown" aria-expanded="false"
                    aria-label="Toggle navigation">
                    <span class="navbar-toggler-icon"></span>
                </button>
                <div class="collapse navbar-collapse justify-content-end" id="navbarNavDropdown">
                    <ul class="navbar-nav">
                        <li class="nav-item">
                            <a class="nav-link active" aria-current="page" href="/">HOME</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="/#about-us">ABOUT US</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="/#services">SERVICES</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="/#projects">PROJECTS</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link btn btn-theme" href="/#contact">CONTACT US</a>
                        </li>
                    </ul>
                </div>
            </div>
        </nav>
    </header>

    <section class="bg-theme" id="about-us">
        <div class="container">
            <div class="row align-items-center">
                
                <div class="col-md-12 text-center">
                    <h3>Thank You!</h3>
                    <p><?php echo $statusMsg; ?></p>
                </div>
            </div>
        </div>
    </section>

    <footer class="py-3">
        <div class="container">
            <div class="row text-center">
                <div class="col-md-12">
                    <p class="mb-0">
                        &copy; Copyright 2023 SoftHouse. All right reserved.
                    </p>
                </div>
            </div>
        </div>
    </footer>


    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.8/dist/umd/popper.min.js"
        integrity="sha384-I7E8VVD/ismYTF4hNIPjVp/Zjvgyol6VFvRkX/vR+Vc4jQkC+hVqc2pM8ODewa9r"
        crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.min.js"
        integrity="sha384-BBtl+eGJRgqQAUMxJ7pMwbEyER4l1g+O15P+16Ep7Q9Q+zqX6gSbd85u4mG4QzX+"
        crossorigin="anonymous"></script>
</body>

</html>