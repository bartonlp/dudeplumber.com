<?php
$_site = require_once(getenv("SITELOADNAME"));
$S = new SiteClass($_site);

$S->title = "Contact Us";
$S->banner = "<h1>Contact Us</h1>";

$S->css =<<<EOF
@media (hover: none) and (pointer: coarse) {
  img[alt="dwf map"] {
    width: 390px;
  }
}
@media (max-width: 1340px) {
  img[alt="dwf map"] { width: 600px; }
}
EOF;

[$top, $footer] = $S->getPageTopBottom();

echo <<<EOF
$top
<hr>
<h2>Phone: (817)-999-3682<br>
Email: <a href="mailto:jeffrojohn@gmail.com">jeffrojohn@gmail.com</a><br>
Licence# M-42447<br>
PO Box 38, Venus, TX 76084</h2>

<h2>The Dallas-Fort Worth Metroplex and adjoining areas.</h2>
<img src="images/dwf-metroplex.png" alt="dwf map">

<div id="bbb-seal">
<a href="https://www.bbb.org/us/tx/venus/profile/plumber/little-john-plumbing-0825-1000223524/#sealclick" target="_blank" rel="nofollow">
<img src="https://seal-austin.bbb.org/seals/blue-seal-293-61-bbb-1000223524.png" style="border: 0;" alt="Little John Plumbing BBB Business Review" />
</a>
</div>

<hr>
$footer
EOF;
