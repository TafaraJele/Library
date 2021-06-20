<!DOCTYPE html>
<html>

<head>
  <meta charset='utf-8'>
  <meta http-equiv='X-UA-Compatible' content='IE=edge'>
  <title>Libary</title>
  <meta name='viewport' content='width=device-width, initial-scale=1'>  
</head>
<body>
<?php

class LibraryService
{ 
  public $servername = "localhost";
  public $username = "root";
  public $password = "";
  public $dbname = "Library"; 

 function GetBooksByTitle($booktitle)  {
          // Create connection
          $conn = mysqli_connect($servername, $username, $password, $dbname);
        // Check connection
          if (!$conn) {
         die("Connection failed: " . mysqli_connect_error());
          }

        $sql = "SELECT book_Id_code, book_title,book_loan_status author FROM Book 
        WHERE Book.book_title = $booktitle";

         $result = mysqli_query($conn, $sql);

         /*if (mysqli_num_rows($result) > 0) {
           // output data of each row
         while($row = mysqli_fetch_assoc($result)) {
        echo "book_Id_code: " . $row["book_Id_code"]. " book_title: " . $row["book_title"]. "book_loan_status: " . $row["book_loan_status"]."author: " . $row["author"] ;
         }
       } else {
         echo "0 results";
         }*/
         echo "<table>
         <tr>
         <th>Book Code Id</th>
         <th>Book Title</th>
         <th>Book Loan Status</th>
         <th>Author</th>        
         </tr>";
         while($row = mysqli_fetch_array($result)) {
             echo "<tr>";
               echo "<td>" . $row['book_Id_code'] . "</td>";
                 echo "<td>" . $row['book_title'] . "</td>";
                   echo "<td>" . $row['book_loan_status'] . "</td>";
                     echo "<td>" . $row['author'] . "</td>";                       
                         echo "</tr>";
                        }
                        echo "</table>";
            mysqli_close($conn);

function submitLoanRequest($name, $booktitle, $Id, $address,$bookIdCode)  {
              // Create connection
              $conn = mysqli_connect($servername, $username, $password, $dbname);
            // Check connection
              if (!$conn) {
             die("Connection failed: " . mysqli_connect_error());
              }
              $curr_timestamp = date('Y-m-d H:i:s');
            $sql = "INSERT INTO Loans (book_id_code, reader_Id, acquisition_date) Values ($bookIdCode,  $Id, $curr_timestamp)

            UPDATE Books SET book_loan_status = 'ON LOAN'
            WHERE book_Id_code = $bookIdCode";
    
             $result = mysqli_query($conn, $sql);
    
             if ($result) {
               return true;
             }
             else{
               return false;
             }            
    
                mysqli_close($conn);

 }

?>
</body>
</html>