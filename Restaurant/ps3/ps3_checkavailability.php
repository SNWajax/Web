<html>
    <head>
        <title>
            Check Avaialability
        </title>
    </head>
    <body>
     <form action = "http://localhost/ps3/ps3_checkbooking.php" method="post">
            <h1>Check Availability</h1>
            <p> Customer Name: <input type: "text" name = "name" size = "30" value = ""> </p>
            <p> Keyword: <input type="text" name="keyword" size="30" value=""></p>
            <p> Enter number of people: <input type="number" name="nop" size="2" value=""></p>
            <p>
                Enter Month: <input type="number" name="month" size="2" value="">
                Enter Day: <input type="number" name="day" size="2" value="">
                Enter Start Time: <input type="number" name="sttime" size="2" value="">
            </p>
            <p>
                
                    <input type="submit" name="checkbooking" value="Check Bookings">
               </form>  
                <input type="submit" name="checkavailabilty" value="Check Availability"> 
            </p>
            <p>
                <form action = "http://localhost/ps3/ps3_checkallbookings.php">
                    <input type="submit" name="checkall" value="Show All Bookings">
                </form>
            </p>
       
    </body>
</html>