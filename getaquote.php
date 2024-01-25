<?php

$_site = require_once(getenv("SITELOADNAME"));
$S = new SiteClass($_site);

$S->title = "Get A Quote";
$S->banner = "<h1>Get A Quote</h1>";

$S->css = <<<EOF
#error { color: red; animation: fadeOut 10s linear; animation-fill-mode: forwards; }
@keyframes fadeOut {
    from { opacity: 1; }
    to { opacity: 0; display: none; }
}
button {
        color: white;
        background: green;
}
@media (max-width: 730px) {
        html { font-size: 16px; }
}
EOF;

$S->h_script = <<<EOF
<script src="https://www.google.com/recaptcha/api.js" async defer></script>
EOF;

[$top, $footer] = $S->getPageTopBottom();

$recaptcha = require_once("/var/www/PASSWORDS/littlejohnplumbing.com-recaptcha.php"); // This is an assoc array

if($_POST) {
  extract($_POST);

  $message = $msg; // message is what gets put back into the textarea bellow if there is an error.
  
  if(empty($name) || empty($email) || empty($msg)) {
    $err = "<h2>You must suppley a name, email and message.</h2>";
    goto POST_END;
  }

  $response = $_POST['g-recaptcha-response'];
  $secret = $recaptcha['secretKey']; // google grcaptcha key

  $options = ['http' => [
                         'header'  => "Content-type: application/x-www-form-urlencoded\r\n",
                         'method'  => 'POST',
                         'content' => http_build_query(["response"=>$response, "secret"=>$secret])
                        ]
             ];

  // Now we create a context from the options

  $context  = stream_context_create($options);

  // Now this is going to do a POST!
  // NOTE we must have the full url with https!
  // If we are doing a post that does not need to return anything we can avoid the assignment.

  $ret = file_get_contents("https://www.google.com/recaptcha/api/siteverify", false, $context);

  $retAr = json_decode($ret, true);

  $agent = substr($S->agent, 0, 254); // keep it small

  $msg = preg_replace("~\r\n~", "<br>", $msg);
  
  $msg = "Name: $name<br>Email: $email<br>Message: $msg";

  $msg = $S->escape($msg);

  $verify = empty($retAr['success']) ? 0 : 1; // BLP 2023-02-01 - could be empty rather than 1 or zero.
  $reason = $retAr['error-codes'][0];
  
  $S->sql("insert into $S->masterdb.contact_emails (site, ip, agent, subject, message, verify, reason, created, lasttime) ".
          "values('$S->siteName', '$S->ip', '$agent', '$subject', '$msg', '$verify', '$reason', now(), now())");

  if($retAr['success'] !== true) {
    $err = <<<EOF
<h2>Failed Verification. Try Again.<br>
$reason</h2>
EOF;
    goto POST_END;
  }

  $headers = "From: jeff@littlejohnplumbing.com\r\nBcc: bartonphillips@gmail.com\r\n";
  $headers .= 'MIME-Version: 1.0' . "\r\n";
  $headers .= 'Content-type: text/html; charset=UTF-8' . "\r\n";

  $address = "jeffrojohn@gmail.com";
  $subject = "Want a quote";
  
  $ret = mail($address, $subject, $msg, $headers, "-fbarton@bartonphillips.com"); 
  if($ret === false) error_log("littlejohnplumbing getquote.php: mail failed");
  
  header( "refresh:5;url=index.php" );

  echo <<<EOF
$top
<h1>Posted</h1>
<p>This page will redirect to <a href="index.php"><b>Little John Plumbing</b></a> in five seconds.</p>
$footer
EOF;

POST_END:
}

$key = $recaptcha['siteKey'];

echo <<<EOF
$top
<hr>
<div id="error">$err</div>
<form id="quote" action="getaquote.php" method="post">
<label for="name1">Your name</label><br>
<input type="text" id="name1" name="name" value="$name"><br>
<label for="email1">Your Email Address</label><br>
<input type="text" id="email1" name="email" value="$email"><br><br>
<textarea name="msg" placeholder="Enter Message">$message</textarea><br>
<div class="g-recaptcha" data-sitekey="$key"></div>
<button type="submit">Submit</button>
</form><br>

<div id="bbb-seal">
<a href="https://www.bbb.org/us/tx/venus/profile/plumber/little-john-plumbing-0825-1000223524/#sealclick" target="_blank" rel="nofollow">
<img src="https://seal-austin.bbb.org/seals/blue-seal-293-61-bbb-1000223524.png" style="border: 0;" alt="Little John Plumbing BBB Business Review" />
</a>
</div>

<hr>
$footer
EOF;
