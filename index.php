<?php
// This is the page for 'littlejohnplumber.com', 'littlejohnplumbing.com', 'dude-plumber.com',
// 'plumberdfw.com'

$_site = require_once(getenv("SITELOADNAME"));
$S = new SiteClass($_site);

$S->title = "Little John Plumbing";
$S->meta = "<meta name='Editor' content='Bonnie Burch 12-27-2023'>";
$S->banner = <<<EOF
<!-- This div is used to move the banner text up to just below the <picture>-->
<div id="banner">
<h2>Phone: (817)-999-3682<br>
Email: jeffrojohn@gmail.com</h2>
<h1>All Plumbing Needs in the DFW Metroplex</h1>
</div>
EOF;

$S->canonical = "https://www.littlejohnplumbing.com";
$S->favicon = "./images/favicon-192.ico";

[$top, $footer] = $S->getPageTopBottom();

echo <<<EOF
$top
<hr>
<p><a href="testemonials.php" alt="Testemonials">What People Say</a><br>
<a href="contactme.php" alt="Contact Me">Contact Me</a></p>

<!-- Start of container -->
<div id="container">
<div class="item">
<h3>I'm the owner of <b>Little John Plumbing</b>.</h3>
<img src="images/jeff1.png" alt="Jeff John Owner">
<p>Hi, I'm Jeff John, welcome to my website. I'm the one who will be on the job when you have an issue.
Whether it is a simple clogged drain or
a new or remodel construction project, I will be there.</p>
<p>Business hours are 8:00 am to 5:00 pm. Depending on the
emergency, after hours calls are possible.</p>
<p>My primary service areas are Tarrant, Johnson and Ellis counties. I will occasionally work in Dallas County.</p>
</div>
<div class="item">
<h3>Even simple plumbing problems usually require a real plumbing professional.</h3>
<div id="clog">
<img src="images/simple-plumbing1.jpg" alt="Clogged Toilet">
<img src="images/simple-plumbing2.jpg" alt="Clogged Sink"><br>
<img src="images/simple-plumbing3.jpg" alt="Sink Repair">
</div>
<p>Whether it is a stopped-up toilet or a sink, we have what it takes to do the job correctly by carrying almost all parts in our vehicle.</p>
</div>

<div class="item">
<h3>When you need to have rehab work done on your systems, call us.</h3>
<img src="images/rehab1.jpg" alt="Pluming brick work">
<p>We possess all the equipment and skills needed to do the job.</p>
</div>

<div class="item">
<h3>Need a new water heater?</h3>
<img src="images/waterheater3.png" alt="Need a new water heater">
<p>Consider removing your old tank water heater and replacing it with a tankless model.
We carry a full line of both.</p>
<img src="images/NPE-A2-CoverON-NV.png" alt="Tankless Heaters">
</div>

<div class="item">
<h3>Building a new home or business?</h3>
<img src="images/new-construction1.jpg" alt="newconsturction1"><br>
<img src="images/new-construction2.jpg" alt="newconstruction2"><br>
<img src="images/new-construction3.jpg" alt="newconstruction3">
<p>Contact us for a quote. We have the equipment and skills for almost every new-build job.</p>
</div>

<div class="item">
<h3>Doing a home remodel?</h3>
<img src="images/home-makeover1.jpg" alt="remodel1">
<img src="images/remodel1.jpeg" alt="remodel2">
<img src="images/f1b424_fd6c6ff9d3cd45578338051a3c6822a0~mv2.webp" alt="remodel3">
<p>We will work with your designer to provide the kitchen and bath you want.</p>
</div>

</div> <!-- End of Contaner -->

<div id="facebook">
<p>Visit Us on <a href="https://www.facebook.com/LittleJohnServices/">Facebook</a></p>
</div>
<div id="other">
<p>Other URLs that can get you here:</p>
<ul>
<li>littlejohnplumber.com
<li>littlejohnplumbing.com
<li>plumberdfw.com
<li>dudeplumber.com
</ul>
</div>
<hr>
$footer
EOF;

