<?php
// Get a connection for the database
//require_once('../ps3_connect.php');
        
if(isset($_POST['checkall'])){
// Create a query for the database
    $query = "select c.cname, r.rname, b.bdate, b.bid
            from customer as c join booking as b on c.cid = b.cid
            join restaurant as r on b.rid = r.rid";

// Get a response from the database by sending the connection
// and the query
            $response = @mysqli_query($dbc, $query);

// If the query executed properly proceed
        if($response){

            echo '<table align="left"
            cellspacing="5" cellpadding="8">

        <tr><td align="left"><b>Customer Name</b></td>
            <td align="left"><b>Restaurant Name</b></td>
            <td align="left"><b>Time & Date</b></td>
            <td align="left"><b>BID</b></td>
        </tr>';

// mysqli_fetch_array will return a row of data from the query
// until no further data is available
        while($row = mysqli_fetch_array($response)){

            echo '<tr><td align="left">' . 
                $row['cname'] . '</td><td align="left">' . 
                $row['rname'] . '</td><td align="left">' .
                $row['bdate'] . '</td><td align="left">' .
                $row['bid'] . '</td><td align = "left">';

            echo '</tr>';
            }

            echo '</table>';

        } else {

            echo "Couldn't issue database query<br />";

            echo mysqli_error($dbc);

        }

    // Close connection to the database
    mysqli_close($dbc);
}
?>