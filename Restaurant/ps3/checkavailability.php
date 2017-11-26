<html>
    <head>
        <title>
            Check Avaialability
        </title>
        <meta charset="utf-8">
            <meta name="viewport" content="width=device-width, initial-scale=1">
            <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0-beta.2/css/bootstrap.min.css">
            <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
            <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.6/umd/popper.min.js"></script>
            <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0-beta.2/js/bootstrap.min.js"></script>
    </head>
    <body background = "bg.jpg">
    <div class="container">
     <form action = "bookseats.php" method="post">
         <div class="card">
             <div class="card-body">
            <h1 align = "center">Check Availability</h1>
                <p><b> Customer Name: </b><input type: "text" name = "name" size = "30" value = ""> </p>
                <p><b> Keyword: </b><input type="text" name="keyword" size="30" value=""></p>
                 <p><b> Enter number of people: </b><input type="number" name="nop" size="2" value=""></p>
                 <p><b>Enter Date & Time (YYYY-MM-DD HH:MM:SS): </b><input type="text" name="time" size="30" value=""> </p>
                <p align = "center"><input type="submit" name="check" value="Check Availability" class="btn btn-primary"></p>       
      <!--           <table align="left" cellspacing="5" cellpadding="8" class="table table-dark table-hover">
                     <thead>
                         <tr>
                             <td align="left"><b>Name</b></td>
                             <td align="left"><input type="text" name="name" size="30" value=""></td>
                         </tr>
                         <tr>
                             <td align="left"><b>Keyword</b></td>
                             <td align="left"><input type="text" name="keyword" size="30" value=""></td>
                         </tr>
                         <tr>
                             <td align="left"><b>Number of Seats</b></td>
                             <td align="left"><input type="number" name="nop" size="30" value=""></td>
                         </tr>
                         <tr>
                             <td align="left"><b>Enter Time (YYYY-MM-DD HH:MM:SS)</b></td>
                             <td align="left"><input type="number" name="time" size="30" value=""></td>
                         </tr>
                     </thead>
                    </table>
                 <p align = "center">
                    <input type="submit" name="check" value="Check Availability" class="btn btn-primary">
                </p>        -->
                 </div>
             </div>
        </form>
        </div>
    </body>
</html>
