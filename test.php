<?php ?>
<!DOCTYPE html>
<html>
<head>
<style>
@media (hover: none) and (pointer: coarse) {
  h1 { font-size: 16px; }
}
</style>
</head>
<body>
<script>
const wid = window.innerWidth;
const hi = window.innerHeight;
console.log("wid="+wid+", hi="+hi);
</script>
<picture>
  <source media="((hover: none) and (pointer: course))"
         srcset="images/LittleJohnPlumbingLogo-300.png"/>
  <source media="((hover: hover) and (pointer: fine))"
         srcset="images/LittleJohnPlumbingLogoNoDomain500x386.png"/>
  <img src="images/LittleJohnPlumbingLogo-300.png"/>
</picture>
  
<hr>
<h1>This is a test</h1>
</body>
</html>
