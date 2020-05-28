<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Horgászkönyv</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/css/bootstrap.min.css">
    <link rel="stylesheet" href="custom.css">
    <script src="https://code.jquery.com/jquery-2.2.4.min.js"></script>
    <script src="//netdna.bootstrapcdn.com/bootstrap/3.0.0/js/bootstrap.min.js"></script>
    
</head>
<body>
 
 <ul>
 <script>
     
     $(document).ready(function(){
         
      setInterval(function(){
      
         update();
    
         }, 500);

         
 
        // display 
         
        function update(){
          
             $.ajax({
    
        url: 'display.php',
        type: 'POST',
        success: function(show_fish){
        
            if(!show_fish.error) {
                
           $("#show-data").html(show_fish);
            
            
            }
        
        }
             
    
    });
             
        }         
         
  
         
  // ajax upload data      
         
  
   $("#add-fish-form").on('submit',(function(e) {
  e.preventDefault();
  $.ajax({
         url: "add.php",
   type: "POST",
   data:  new FormData(this),
   contentType: false,
         cache: false,
   processData:false,
   beforeSend : function()
   {
    //$("#preview").fadeOut();
    $("#err").fadeOut();
   },
   success: function(data)
      {
    if(data=='invalid')
    {
     // invalid file format.
     $("#err").html("Invalid File !").fadeIn();
    }
    else
    {
     // view uploaded file.
     
     $("#add-fish-form")[0].reset(); 
    }
      },
     error: function(e) 
      {
    $("#err").html(e).fadeIn();
      }          
    });
 }));

  
         
     }); // Document ready function end
    
 
</script>
 
    </ul>
  
  
  <div id="container"> 
    
    
    <div class="row">
       <div class="col-md-6 mx-auto p-3">

        
       
       <form method="post" id="add-fish-form" class="col-md-6 mx-auto" action="add.php" enctype="multipart/form-data">

        <div class="form-group">
          <label for="post_img">Kép hozzáadása:</label>
          <div class="box">
       <div class="image-preview"></div>
    <div class="upload-options">
      <label>
        <input type="file" class="form-control-file" name="image" />
      </label>
    </div>
  </div>

  <div id="err"></div>   
          
         
         
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
          
          
     
            <input type="submit"  class="btn btn-primary" value="Elküld" name="upload">
      
           
       </form>
       
    </div>
  </div>
    
    <div class="row">
        
        <div class="col-md-6 mx-auto w-50 p-3">
           
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
    
 
 
  </div><!---container-end-->
  <script src='//production-assets.codepen.io/assets/common/stopExecutionOnTimeout-b2a7b3fe212eaa732349046d8416e00a9dec26eb7fd347590fbced3ab38af52e.js'></script>
  <script src='js/img_script.js'></script>
    
  
</body>
</html>