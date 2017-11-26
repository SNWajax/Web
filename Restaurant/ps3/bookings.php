<html>
<head>
<title>Booking Confirmed</title>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0-beta.2/css/bootstrap.min.css">
        <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
        <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.6/umd/popper.min.js"></script>
        <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0-beta.2/js/bootstrap.min.js"></script>
</head>
<body background = "3.jpg">
<?php

    if(isset($_POST['book'])){
        require_once('../ps3_connect.php');
    
        $query1 = "select cid, cname from customer where cname like '%".$_POST['cust_name']."%'";
        $response1 = @mysqli_query($dbc, $query1);
        $row = mysqli_fetch_array($response1);

 /*   
        echo $_POST['cust_name'];
        echo $_POST['nop'];
        echo $_POST['rid'];
        echo $_POST['time'];
        echo $row['cid'];
   */ 
    /*     if($response1){
// mysqli_fetch_array will return a row of data from the query
// until no further data is available
       
            echo '<table align="left" cellspacing="5" cellpadding="8">
                    <tr>
                        <td align="left"><b>CID</b></td>
                        <td align="left"><b>CNAME</b></td>
                    </tr>';
            while($row = mysqli_fetch_array($response1)){
                echo '<tr>
                    <td align="left">' . 
                        $row['cid'] . 
                    '</td>
                    <td align="left">' . 
                        $row['cname'] . 
                    '</td>';
                echo '</tr>';
            }
            echo '</table>';
        }
        else {
            echo "Couldn't issue database query<br />";
            echo mysqli_error($dbc);
        }
   */ 
    //    echo $_POST['time'];
         echo '<h1 class="bg-primary text-white" align = "center">Review Your Booking</h1>';
        
        $query2 = "insert into booking (bid, cid, rid, bdate, quantity) values (NULL, ".$row['cid'].", ".$_POST['rid'].", '".$_POST['time']."',                ".$_POST['nop']." )";
        $response2 = @mysqli_query($dbc, $query2);
  /*      if($response2){
            $row2 = mysqli_fetch_array($response2);
            echo 'Data inserted';
        }
        else{
            echo 'Data couldn\'t be inserted';
            echo mysqli_error($dbc);
        }
 */       
        $query3 = "select c.cname, r.rname, b.bdate, b.quantity
                    from customer as c inner join booking as b on c.cid = b.cid
					               inner join restaurant as r on r.rid = b.rid
                    where c.cname like '%".$_POST['cust_name']."%' and r.rid = ".$_POST['rid']." and timestamp(b.bdate) = '".$_POST['time']."';";
        $response3 = @mysqli_query ($dbc, $query3);
         if($response3){
        
            echo '<table align="left" cellspacing="5" cellpadding="8" class="table table-dark table-hover">
                <thead>
                    <tr>
                        <td align="left"><b>CNAME</b></td>
                        <td align="left"><b>RNAME</b></td>
                        <td align="left"><b>TIME</b></td>
                        <td align="left"><b>NOP</b></td>
                    </tr>
                </thead>
                <tbody>';
            while($row = mysqli_fetch_array($response3)){
                echo '<tr>
                    <td align="left">' . 
                        $row['cname'] . 
                    '</td>
                    <td align="left">' . 
                        $row['rname'] . 
                    '</td>
                    <td align="left">' . 
                        $row['bdate'] . 
                    '</td>
                    <td align="left">' . 
                        $row['quantity'] . 
                    '</td>';
                echo '</tr>';
            }
            echo '</tbody></table>';
        }
        else {
            echo "Couldn't issue database query<br />";
            echo mysqli_error($dbc);
        }
        
         echo '<h1 class="bg-primary text-white" align = "center">All Bookings</h1>';
        $query4 = "select c.cname, r.rname, b.bdate, b.quantity
                    from customer as c inner join booking as b on c.cid = b.cid
					               inner join restaurant as r on r.rid = b.rid
                    where c.cname like '%".$_POST['cust_name']."%';";
        $response4 = @mysqli_query ($dbc, $query4);
         if($response4){
        
            echo '<table align="left" cellspacing="5" cellpadding="8" class="table table-dark table-hover">
                <thead>
                    <tr>
                        <td align="left"><b>CNAME</b></td>
                        <td align="left"><b>RNAME</b></td>
                        <td align="left"><b>TIME</b></td>
                        <td align="left"><b>NOP</b></td>
                    </tr>
                </thead>
                <tbody>';
            while($row3 = mysqli_fetch_array($response4)){
                echo '<tr>
                    <td align="left">' . 
                        $row3['cname'] . 
                    '</td>
                    <td align="left">' . 
                        $row3['rname'] . 
                    '</td>
                    <td align="left">' . 
                        $row3['bdate'] . 
                    '</td>
                    <td align="left">' . 
                        $row3['quantity'] . 
                    '</td>';
                echo '</tr>';
            }
            echo '</tbody></table>';
        }
        else {
            echo "Couldn't issue database query<br />";
            echo mysqli_error($dbc);
        }
    
       /* 
        $querym = "INSERT INTO booking (cid, rid, bdate, quantity, bid) VALUES (?, ?, ?,
        ?, ?)";
        
        $stmt = mysqli_prepare($dbc, $querym);
        
        mysqli_stmt_bind_param($stmt, "iisi", $cid,
                               $rid, $time, $nop);
        
        mysqli_stmt_execute($stmt);
        
        $affected_rows = mysqli_stmt_affected_rows($stmt);
        
        if($affected_rows == 1){
            
            echo 'Seats Booked';
            
            mysqli_stmt_close($stmt);
            
            mysqli_close($dbc);
            
        }  
    else {
            
            echo 'Error Occurred<br />';
            echo mysqli_error($dbc);
            
            mysqli_stmt_close($stmt);
            
            mysqli_close($dbc);
            
    
         
         }*/
}

?>

</body>
</html>