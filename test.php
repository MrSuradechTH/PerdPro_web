<!DOCTYPE html>
<html>
<body>

<div id="demo">
</div>

<script>
function loadDoc() {
  var xhttp = new XMLHttpRequest();
  xhttp.onreadystatechange = function() {
    if (this.readyState == 4 && this.status == 200) {
      document.getElementById("demo").innerHTML =
      this.responseText;
    }
  };
  xhttp.open("POST", "http://127.0.0.1/api_auto_update.php", true);
  xhttp.send();
}
loadDoc();
</script>

</body>
</html>
