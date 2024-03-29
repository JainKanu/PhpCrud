<!doctype html>
<html lang="en">
  <head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
    <link rel="stylesheet" href="https://cdn.datatables.net/1.10.19/css/jquery.dataTables.min.css" />
    <title>Hello, world!</title>
  </head>
  <body>
  <?php
    // include("lib/tableData.php");
    
    // $abc["data"] = $db->data;
    echo "<pre>";
    // print_r($db->data);
    echo "</pre>";
  ?>
  <div id="msg" class="alert alert-danger d-none"></div>
  <table id="dataTable" class="display" style="width:100%">
        
    </table>
    <!-- Optional JavaScript -->
    <!-- jQuery first, then Popper.js, then Bootstrap JS -->
    <script src="https://code.jquery.com/jquery-3.4.1.min.js"></script>
    <!-- <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script> -->
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>
    <script src="https://cdn.datatables.net/1.10.19/js/jquery.dataTables.min.js"></script>
    <!-- <script src="./js/custom.js"></script> -->
    <script>
        // var dbData =  ;

        // console.log(dbData);
    $(document).ready(function() {
        
      $.ajax({
            type:"Post",
            url: "./lib/tableData.php",
            contentType: "application/json",
            dataType: "JSON",
            beforeSend: function(  ) {   },
            success:function(res){ 
              // var result = JSON.parse(res);
              // console.log(typeof(res)); 
              myTable(res); 
            },
            error:function(err){ 
              console.log(err);
              myTable([]); 
              $("#msg").removeClass("d-none").text("Something get wrong :"+err.statusText);
            }
            
            });
        
        
    } );

    function myTable(data){
      $('#dataTable').DataTable( {
                "data": data,
              columns: [
                  { title: "First Name" },
                  { title: "Last Name" },
                  { title: "Position" },
                  { title: "Email" },
                  { title: "Office" }
              ]
          } );
    }
    </script>
  </body>
</html>