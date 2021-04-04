<!DOCTYPE html>
<html lang="hu">

<head>
  <meta charset="UTF-8">
  <title>Horgászkönyv</title>
  <link rel="stylesheet" href="assets/css/bootstrap.min.css">
  <link rel="stylesheet" href="assets/css/custom.css">
  <script src="https://code.jquery.com/jquery-2.2.4.min.js"></script>
  

</head>

<body>

  
  <div class="container">


    <div class="row">
      <div class="col-md-12 mx-auto p-3">
      <ul>
    <script>
      $(document).ready(function () {

        $('#search').keyup(function () {

          var search = $('#search').val();


          $.ajax({

            url: 'search.php',
            data: {
              search: search
            },
            type: 'POST',
            success: function (data) {

              if (!data.error) {

                $('#result').html(data);

              }


            }


          });


        });

        setInterval(function () {

          update();

        }, 500);



        // display 

        function update() {

          $.ajax({

            url: 'display.php',
            type: 'POST',
            success: function (show_fish) {

              if (!show_fish.error) {

                $("#show-data").html(show_fish);


              }

            }


          });

        }



        // ajax upload      
        $("#add-fish-form").on('submit', (function (e) {
          e.preventDefault();
          $.ajax({
            url: "add.php",
            type: "POST",
            data: new FormData(this),
            contentType: false,
            cache: false,
            processData: false,
            beforeSend: function () {
              $("#preview").fadeOut();
              $("#err").fadeOut();
            },
            success: function (data) {
              if (data == 'invalid') {

                $("#err").html("Helytelen File !").fadeIn();
              } else {


                $("#add-fish-form")[0].reset();
              }
            },
            error: function (e) {
              $("#err").html(e).fadeIn();
            }
          });
        }));



      });
    </script>

  </ul>


        <div class="row">
          <h2>Válasszon halfajok közül:</h2>
          <input class='form-control' type="text" name='search' id='search' placeholder='Keressen a halfajok közül..'>

          <br>
          <br>
          <h2 class="result" id="result">
          </h2>
        </div>


        <form method="post" id="add-fish-form" class="col-md-8 mx-auto" action="add.php" enctype="multipart/form-data">

          <div class="form-group">
            <label for="post_img">Kép hozzáadása:</label>
            <div class="box">
              <img id="img-pre" src="#" alt="Saját kép"></img>
              <div class="upload-options">
                <label>
                  <input type="file" class="form-control-file" id="imgInp" name="image" />
                </label>
              </div>
            </div>
          </div>
          <div class="form-group">


            <label for="water-name">Vízterületet neve:</label>

            <input type="text" name="water_name" class="form-control" required>

          </div>
          <div class="form-group">


            <label for="fish-name">Hal fajtája:</label>

            <input type="text" name="fish_name" class="form-control" required>

          </div>
          <div class="form-group">


            <label for="fish-weight">Hal súlya:</label>

            <input type="text" name="fish_weight" class="form-control" required>

          </div>



          <input type="submit" class="btn btn-primary" value="Elküld" name="upload">


        </form>

      </div>
    </div>

    <div class="row">

      <div class="col-md-12 mx-auto w-50 p-3">

        <table class="table table-bordered table-hover">

          <thead class="thead-dark">
            <tr>

              <th>#</th>
              <th>Hal képe</th>
              <th>Vízterület</th>
              <th>Fajtája</th>
              <th>Súlya</th>
              <th>Dátum</th>
            </tr>
          </thead>
          <tbody id="show-data"></tbody>
        </table>

      </div>

    </div>
  </div>
  <script src='assets/js/img_script.js'></script>
  <script src="assets/js/bootstrap.min.js"></script>


</body>

</html>