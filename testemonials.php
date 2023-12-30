<?php
$_site = require_once(getenv("SITELOADNAME"));
$S = new SiteClass($_site);

$S->title = "Testimonials";
$S->banner = "<h1>What People Have to Say</h1>";
$S->css =<<<EOF
#logo img {
  width: 500px;
}
@media (hover: none) and (pointer: coarse) {
  #logo img { width: 290px; height: 142px; }
}
EOF;

[$top, $footer] = $S->getPageTopBottom();

echo <<<EOF
$top
<hr>
<hr>
$footer
EOF;
