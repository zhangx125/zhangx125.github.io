<!DOCTYPE html>
<html>
<head>
  <style media="screen">
  .button {
    border: none;
    color: white;
    padding: 15px 32px;
    text-align: center;
    text-decoration: none;
    display: inline-block;
    font-size: 16px;
    margin: 4px 2px;
    cursor: pointer;
    background-color: #4CAF50;
  }
  </style>
</head>

<body>

  <script>
  function enableSend() {
    try {
      //alert("IN");
      document.forms["locom"]["send"].disabled = false;
      //alert("OUT");
    } catch (err) {
      alert(err);
    }
  }

  function getLocation() {
    try {
      //alert("IN");
      navigator.geolocation.getCurrentPosition(showPosition);
      //document.forms["locom"]["lattd"].value = navigator.language;
      //document.forms["locom"]["logtd"].value = navigator.language;
      //alert("OUT");
    } catch (err) {
      alert(err);
    }
  }

  function showPosition(position) {
    if (position!=null) {
      //alert("ININ");
      document.forms["locom"]["lattd"].value = position.coords.latitude;
      document.forms["locom"]["logtd"].value = position.coords.longitude;
      enableSend();
      //alert(document.forms["locom"]["lattd"].value);
    } else {
      alert("getting position failed");
    }
  }
  </script>

  <form id="locom" name="locom" action="form_handle.php" method="post">
    <label for="expression"><strong>Please share your thoughts:)</strong></label><br>
    <textarea id="expression" name="comment" rows="5" cols="40" onchange="getLocation()"></textarea><br>
    <input type="hidden" id="lattd" name="lattd">
    <input type="hidden" id="logtd" name="logtd">
    <button class="button" type="submit" name="send" disabled>Send</button>
  </form>

</body>
</html>
