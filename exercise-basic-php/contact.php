<?php

$validData = false;

if (isset($_POST)) {
  $contactData = getInput();

  if (validateData($contactData)) {
    $name = $contactData->name;
    $email = $contactData->email;
    $telephone = $contactData->telephone;
    $subject = defineSubjectText($contactData->subject);
    $message = $contactData->message;
  } 
}

function getInput()
{
  return (object) [
    'name' => filter_input(INPUT_POST, 'txtName', FILTER_SANITIZE_STRING),
    'email' => filter_input(INPUT_POST, 'txtEmail', FILTER_SANITIZE_STRING),
    'telephone' => filter_input(INPUT_POST, 'txtTelephone', FILTER_SANITIZE_STRING),
    'subject' => filter_input(INPUT_POST, 'txtSubject', FILTER_SANITIZE_NUMBER_INT),
    'message' => filter_input(INPUT_POST, 'txtMessage', FILTER_SANITIZE_STRING),
  ];
}

function validateData($pContactData)
{
  if (
    strlen($pContactData->name) > 50 ||
    strlen($pContactData->name) < 3
  ) {
    return false;
  }

  if (
    strlen($pContactData->email) > 50 ||
    strlen($pContactData->email) < 3 ||
    strpos($pContactData->email, '@') <= 0 ||
    strpos($pContactData->email, '.') <= 0
  ) {
    return false;
  }

  // 
  // if (
  //   strlen($pContactData->telephone) < 10 ||
  //   strlen($pContactData->telephone) > 11
  // ) {
  //   return false;
  // }

  if (
    strlen($pContactData->subject) > 1 ||
    strlen($pContactData->subject) < 1
  ) {
    return false;
  }

  if (strlen($pContactData->message) < 1) {
    return false;
  }

  return true;
}

function defineSubjectText($pSubject)
{
  switch ($pSubject) {
    case 1:
      $subject = 'Comercial';
      break;
    case 2:
      $subject = 'Doubts';
      break;
    case 3:
      $subject = 'Partnership';
      break;
    default:
      $subject = 'Others';
      break;
  }

  return $subject;
}

?>

<!DOCTYPE html>
<html lang="pt-BR">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">

  <title>Contact checkout</title>
  <link rel="stylesheet" href="./styles.css">
</head>

<body>
  <div class="contact-checkout">
    <div onclick="window.history.back();">
      <button class="btn btn-back">
        <span>&#x1F448;</span>
        <span>Back</span>
      </button>
    </div>
    <h1>Contact checkout</h1>
    <div>
      <p style="margin: 20px 0;">
        Hello name, we receveid your message! &#x1F973; <br />
        As soon as possible, one of our attendants will respond to you
      </p>
      <p>
        <span class="font-weight-bold">Name:</span> <?= $name; ?>
      </p>
      <p>
        <span class="font-weight-bold">Email:</span> <?= $email; ?>
      </p>
      <p>
        <span class="font-weight-bold">Telephone:</span> <?= $telephone; ?>
      </p>
      <p>
        <span class="font-weight-bold">Subject:</span> <?= $subject; ?>
      </p>
      <p>
        <span class="font-weight-bold">Message:</span>
        <br />
        <?= $message; ?>
      </p>
    </div>
  </div>
</body>

</html>