<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0" />
  <title>Add New Province</title>
  <style>
    input[type="text"],
    button {
      font-family: iransans;
      line-height: 30px;
      padding: 0 30px;
      border-radius: 5px;
      border: 1px solid #81b7d0;
    }

    div#ajax-result {
      margin: 20px;
      font-family: sahel;
      direction: rtl;
    }

    span.success {
      color: #4CAF50;
    }

    span.error {
      color: red;
    }
  </style>
</head>

<body style="padding: 50px; text-align: center">
  <form action="ajax-save-province.php" method="post" id="provinceForm">
    <button type="submit">افزودن</button>
    <input type="text" name="province" id="province" style="text-align: center; direction: rtl;">
    <div id="ajax-result"></div>

  </form>
  <script src="js/jquery.js"></script>

  <script>
    $(document).ready(function() {
      var form = $("#provinceForm");
      var resultTag = $("#ajax-result");
      form.submit(function(e) {
        resultTag.html('<img src="loader.gif">')
        e.preventDefault();
        $.ajax({
          url: form.attr("action"),
          method: form.attr("method"),
          data: form.serialize(),
          success: function(response) {
            resultTag.html(response);
          },
          error: function(response) {
            resultTag.html(response);
          },
        });
      });
    });
  </script>
</body>

</html>