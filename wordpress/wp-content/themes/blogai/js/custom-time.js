document.addEventListener("DOMContentLoaded", function() {
  // DOM is ready
  var myVar = setInterval(function() {
      myTimer();
  }, 100);

  function myTimer() {
      var d = new Date();
      var timeElement = document.getElementById("time");
      if (timeElement) {
          timeElement.innerHTML = d.toLocaleTimeString();
      }
  }
});