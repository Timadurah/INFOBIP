<!DOCddd html>
  <html lang="en">

  <head>
    <meta charset="UTF-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>Killogrammie Mail Tool</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/css/bootstrap.min.css" integrity="sha384-rbsA2VBKQhggwzxH7pPCaAqO46MgnOM80zW1RWuH61DGLwZJEdK2Kadq2F9CUG65" crossorigin="anonymous" />
    <link rel="shortcut icon" href="https://media.istockphoto.com/id/1245268075/vector/sending-fast-mail-icon-newsletter-message-logo-vector.jpg?s=612x612&w=0&k=20&c=-OnmTfaCfo4uIVPO4n0C0jvY0t1xQik8zY7wD095ahM=" ddd="image/x-icon">
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.7.0/jquery.min.js" integrity="sha512-3gJwYpMe3QewGELv8k/BX9vcqhryRdzRMxVfq6ngyWXwo03GFEzjsUm8Q7RZcHPHksttq7/GFoxjCVUjkjvPdw==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>
  </head>

  <body>
    <br />
    <br />
    <br />

    <div class="px-5 col-12 col-lg-6 m-auto">
      <form action="./infob.php" id="xpreader_form" method="post">

        <div id="result" class="p-2" style="border-left: 5px solid gray; border-radius: 10px; ">

        </div>
        <br>

        <div class="form-floating" style="margin-bottom: 10px">
          <input required type="text" class="form-control" id="api" name="api" placeholder="Api secrete key" />
          <label for="floatingInput">Api Key</label>
        </div> <br>
        <div class="form-floating" style="margin-bottom: 10px">
          <input required type="text" class="form-control" name="urly" id="url" placeholder="base url" />
          <label for="floatingInput">Base url</label>
        </div>
        <div class="form-floating" style="margin-bottom: 10px">
          <input required type="text" class="form-control" name="from" id="from" placeholder="E.g Abcd selling senter" />
          <label for="floatingInput">Sender ID</label>
        </div>
        <div class="form-floating" style="margin-bottom: 10px">
          <input required type="text" class="form-control" placeholder="text" name="info" style="min-height: 200px" id="info" />
          <label for="floatingPassword">Mail information will goes here...</label>
        </div>
        <div class="my-2">
          NB:: If its in bulk seperate the phone address seperate with sign coma ' , '
        </div>
        <div class="form-floating" style="margin-bottom: 10px">
          <input required type="text" class="form-control" name="to" placeholder="text" style="min-height: 200px" id="phone" />
          <label for="floatingPassword">phones will goes here.. </label>
        </div>
        <button class="w-100 btn btn-lg btn-primary" type="submit">
          Send Em
        </button>
        <p class="mt-5 mb-3 text-muted">Nb: Dont use this for bad intention</p>
    </div>
    </form>
    <script>
      // Attach a submit handler to the form
      $("#xpreader_form").on("submit", function(event) {

        // Stop form from submitting normally
        event.preventDefault();

        // Get some values from elements on the page:
        var $form = $(this),
          //  term = $form.find( "input[name='s']" ).val(),
          url = $form.attr("action");

        // scrape the data from the inputs
        var phones = document.getElementById('phone').value;
        var phoneArr = phones.split(",");
        var to__ = phoneArr;
        var from__ = document.getElementById('from').value;
        var info__ = document.getElementById('info').value;
        var api = document.getElementById('api').value;
        var urly = document.getElementById('url').value;

        // Send the data using post
        var posting = $.post(url, {
          "to": to__,
          "from": from__,
          "api": api,
          "urly": urly,
          "info__": info__
        });

        // Put the results in a div
        posting.done(function(data) {
          $("#result").html(data);
        });
      });
    </script>
  </body>

  </html>