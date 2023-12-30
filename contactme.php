<?php
$_site = require_once(getenv("SITELOADNAME"));
$S = new SiteClass($_site);

$S->title = "Contact Me";
$S->banner = "<h1>Contact Me</h1>";

[$top, $footer] = $S->getPageTopBottom();

echo <<<EOF
$top
<hr>
<h2>Phone: (817)-999-3682<br>
Email: jeffrojohn@gmail.com</h2>
<h2>The Dallas-Fort Worth Metroplex and adjoining areas.</h2>
<img src="images/dwf-metroplex.png" alt="dwf map">
<hr>
$footer
EOF;
