<?php
$_site = require_once(getenv("SITELOADNAME"));
$S = new SiteClass($_site);

$recaptcha = require_once("/var/www/PASSWORDS/littlejohnplumbing.com-recaptcha.php"); // This is an assoc array

if($_POST['submit']) {
  $name = $_POST['name'];
  $post = $_POST['testimonial'];

  if(empty($name) || empty($post)) {
    $err = "<h2>You must provide an name and a testimonial.</h2>";
  } else {
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

    if($retAr['success'] !== true) {
      $err = <<<EOF
<h1>Failed Verification. Try Again.</h1>
<p>$reason</p>
EOF;
    } else {
      $test = "<hr class='sep'/><p class='posts'><span>$name</span><br><span>$post</span></p>\n";
      file_put_contents("testimonials.txt", $test, FILE_APPEND);
      header("location: testimonials.php");
    }
  }
}

$S->title = "Testimonials";
$S->banner = "<h1>What People Have to Say</h1>";
$S->css =<<<EOF
#error { color: red; animation: fadeOut 10s linear; animation-fill-mode: forwards; }
@keyframes fadeOut {
    from { opacity: 1; }
    to { opacity: 0; display: none; }
}

#logo img {
  width: 500px;
}
#whattheysay { border: 5px solid green; padding-left: 10px; margin-top: 10px; }
td { padding: 5px; }
tr:nth-of-type(2) td:first-of-type { vertical-align: top; }
form input { font-size: var(--blpFontSize); }
form button { border-radius: 5px; color: white; background: green; }
form textarea { width: 500px; height: 300px; font-size: var(--blpFontSize); }
.posts { padding-top: 30px; }
.posts span:first-of-type { font-size: calc(16px + .6vw); color: pink; }
.posts span:nth-of-type(2) { font-size: calc(16px + .2vw); }
.sep { position: absolute; left: 20; width: 280px; height: 5px; background: green; }
EOF;

$S->h_script = <<<EOF
<script src="https://www.google.com/recaptcha/api.js" async defer></script>
EOF;

$what = file_get_contents("testimonials.txt");

if($what) {
  $what = "<div id='whattheysay'><h2>This is what people have to say about Little John Plumbing.</h2>$what</div>";
}

[$top, $footer] = $S->getPageTopBottom();

$key = $recaptcha['siteKey'];

echo <<<EOF
$top
<hr>
<div id="error">$err</div>
$what
<form method="post">
<p>Add a testimonial.</p>
<table>
<tbody>
<tr><td><input type="text" name="name" value="$name" data-form-type="other" placeholder="Add your name"></td></tr>
<tr><td><textarea name="testimonial" placeholder="Add your testimonial">$post</textarea></td><tr>
</tbody>
</table>
<div class="g-recaptcha" data-sitekey="$key"></div>
<button name="submit" value="submit">Submit</button>
</form>

<div id="bbb-seal">
<a href="https://www.bbb.org/us/tx/venus/profile/plumber/little-john-plumbing-0825-1000223524/#sealclick" target="_blank" rel="nofollow">
<img src="https://seal-austin.bbb.org/seals/blue-seal-293-61-bbb-1000223524.png" style="border: 0;" alt="Little John Plumbing BBB Business Review" />
</a>
</div>

<hr>
$footer
EOF;
