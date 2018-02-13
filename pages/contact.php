<?php

if (isset($_POST["email"])) {
  $EmailFrom = "info@depotpodjok.nl";
  $EmailTo = "info@depotpodjok.nl";
  $Subject = "Een email van de depotpodjok website";
  $Name = Trim(stripslashes($_POST['name']));
  $Lastname = Trim(stripslashes($_POST['lastname']));
  $Tel = Trim(stripslashes($_POST['cellphone']));
  $Email = Trim(stripslashes($_POST['email']));
  $Message = Trim(stripslashes($_POST['message']));

// validation
  $validationOK = true;
  if (!$validationOK) {
    print "<meta http-equiv=\"refresh\" content=\"0;URL=error.htm\">";
    exit;
  }

// prepare email body text
  $Body = "";
  $Body .= "Voornaam: ";
  $Body .= $Name;
  $Body .= "Achternaam: ";
  $Body .= $Lastname;
  $Body .= "\n";
  $Body .= "Telefoonnummer: ";
  $Body .= $Tel;
  $Body .= "\n";
  $Body .= "Email: ";
  $Body .= $Email;
  $Body .= "\n";
  $Body .= "Vraag/opmerking: ";
  $Body .= $Message;
  $Body .= "\n";

// send email
  $success = mail($EmailTo, $Subject, $Body, "From: <$EmailFrom>");

// redirect to success page
  if ($success) {
    print "<meta http-equiv=\"refresh\" content=\"0;URL=bedankt.php\">";
  } else {
    print "<meta http-equiv=\"refresh\" content=\"0;URL=error.html\">";
  }
} else {
  print "<meta http-equiv=\"refresh\" content=\"0;URL=error.html\">";
}
?>