<html>
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0-beta.2/css/bootstrap.min.css">
        <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
        <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.6/umd/popper.min.js"></script>
        <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0-beta.2/js/bootstrap.min.js"></script>
    </head>
    <body background = "2.jpg">

<?php
require_once('../ps3_connect.php');
//include 'ps3_checkavailability.php';
if(isset($_POST['check'])){
    
//    echo '<form action = "http://localhost/ps3/bookings.php" method="post">';
   
    $cust_name = $_POST['name'];
    $nop = $_POST['nop'];
    $time = $_POST['time'];
    
 //   echo $time;
    
    echo '<h1 class="bg-primary text-white" align = "center">Book Your Seats</h1>';
    
    $query1 = "select r.rid, r.rname, r.description, r.capacity, b.bdate
            from restaurant as r inner join booking as b on r.rid = b.rid
            where (r.rname like '%".$_POST['keyword']."%' or r.description like '%".$_POST['keyword']."%')
	       and timestamp(b.bdate) != '".$_POST['time']."'
           group by b.rid 
           having r.capacity >= ".$_POST['nop'];

    $query2 = "select r.rid, r.rname, r.description, (r.capacity - quanttotal) as available, t.bdate
                from restaurant as r inner join booking as b on r.rid = b.rid inner join 
                (select r.rid, r.rname, r.description, sum(b.quantity) as quanttotal, b.bdate
                from restaurant as r inner join booking as b on r.rid = b.rid
                where (r.rname like '%".$_POST['keyword']."%' or r.description like '%".$_POST['keyword']."%') and timestamp(b.bdate) = '".$_POST['time']."'
                group by b.rid) as t on b.rid = t.rid
        group by b.rid
        having available >".$_POST['nop'];
 /*   
    $query3 = "select 
                    rid, rname, rdescription
                from
                    restaurant 
                where
                    "
*/
    $response1 = @mysqli_query($dbc, $query1);
    $response2 = @mysqli_query($dbc, $query2);


    echo '<table align="left" cellspacing="5" cellpadding="8" class="table table-dark table-hover">
        <thead>
        <tr>
            <td align="left"><b>Name</b></td>
            <td align="left"><b>Description</b></td>
            <td align="left"><b>Available Seats</b></td>
        </tr>
        </thead>
        <tbody>';

     if($response2){
// mysqli_fetch_array will return a row of data from the query
// until no further data is available
        while($row = mysqli_fetch_array($response2)){

            echo '<tr>';   
            $cust_name = $_POST['name'];
            $nop = $_POST['nop'];
            $time = $_POST['time'];
            $rid = $row['rid'];

            echo '<td align="left">' . 
                    $row['rname'] . 
                '</td>
                <td align="left">' . 
                    $row['description'] . 
                '</td>
                <td align="left">'.
                    $row['available'].
                '</td>
                <td align = "left">'.
                    '<form action = "bookings.php" method = "post">'.
                    '<input type = "hidden" name = "rid" value = "'.$rid.'">'.
                    '<input type="hidden" name="cust_name" value="'.$cust_name.'">
                    <input type="hidden" name="nop" value="'.$nop.'">
                    <input type="hidden" name="time" value="'.$time.'">
                    <input type="submit" name="book" value="Book" class="btn btn-primary">
                    </form>
                </td>';
            echo '</tr>';
   // echo $time;
        }

    }
    else {

        echo "Couldn't issue database query<br />";

        echo mysqli_error($dbc);

    }

    if($response1){
// mysqli_fetch_array will return a row of data from the query
// until no further data is available
//        while($row = mysqli_fetch_array($response1)){
/*echo '<tr>';
    echo '<form action = "http://localhost/ps3/bookings.php" method="post">';
   
    $cust_name = $_POST['name'];
    $nop = $_POST['nop'];
    $time = $_POST['time'];
    $rid = $row['rid'];
echo '<td align="left">' . 
$row['rname'] . '</td><td align="left">' . 
$row['description'] . '</td><td align="left">'.
$row['capacity'].'</td><td align = "left">'.
    '<input type = "hidden" name = "rid" value = "'.$rid.'">'.
    '<input type = "hidden" name = "rid" value = "'.$cust_name.'">'.
    '<input type = "hidden" name = "rid" value = "'.$nop.'">'.
    '<input type = "hidden" name = "rid" value = "'.$time.'">'.
'<input type="submit" name="book" value="Book">';
 echo '</td></form>';
echo '</tr>';
}*/
//echo '
//<table>';
    while($row = mysqli_fetch_array($response1)){
        $cust_name = $_POST['name'];
        $nop = $_POST['nop'];
        $time = $_POST['time'];
        $rid = $row['rid'];
        echo '
            <tr>
                <td>'.
                    $row['rname'].'
                </td>'.'
                <td>'.
                    $row['description'].'
                </td>'.
                '<td>'.
                    $row['capacity'].'
                </td>            
                <td>
                    <form action = "bookings.php" method = "post">
                    <input type="hidden" name="rid" value="'.$rid.'">
                    <input type="hidden" name="cust_name" value="'.$cust_name.'">
                    <input type="hidden" name="nop" value="'.$nop.'">
                    <input type="hidden" name="time" value="'.$time.'">
                    <input type="submit" name="book" value="Book" class="btn btn-primary">
                    </form>
                </td>
            </tr>';
   //     echo $time;
            }
        }

    }
    else {

        echo "Couldn't issue database query<br />";

        echo mysqli_error($dbc);

    }

   
    echo '</tbody></table>';

    mysqli_close($dbc);
?>
 
    </body>
</html>