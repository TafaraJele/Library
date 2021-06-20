<!DOCTYPE html>
<html>

<head>
  <meta charset='utf-8'>
  <meta http-equiv='X-UA-Compatible' content='IE=edge'>
  <title>Libary</title>
  <script src="https://code.jquery.com/jquery-3.6.0.min.js"
    integrity="sha256-/xUj+3OJU5yExlq6GSYGSHk7tPXikynS7ogEvDej/m4=" crossorigin="anonymous"></script>
  <meta name='viewport' content='width=device-width, initial-scale=1'>
  <link rel='stylesheet' type='text/css' media='screen' href='main.css'>
  <script src='main.js'></script>  
  <script type="application/javascript">

    $(function () {
      // $('#reserveButton').html('book1');
      $('#bookReservationRequest').hide();    
      $('#reserveButton').on('click', function () {

        $('#bookReservationRequest').show();
        $('#showData').hide();
      });
      $("submitButton").click(function () {
        
       
          $(document).ready(function(){

alert("Hi welcome to Jquery ");
});;  

        });

          
      });
      

   
  </script>

  <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css"
    integrity="sha384-HSMxcRTRxnN+Bdg0JdbxYKrThecOKuH5zCYotlSAcp1+c8xmyTe9GYg1l9a69psu" crossorigin="anonymous">
</head>

<body>
  <div class="heading_level_1">
    <span class="square"> </span>

    <div class="centerHeading">
      <h1>Library</h1>
    </div>
  </div>

  <div class="heading_level_2">
    <div class="row" id="search_area">
      <div class="col-md-3">
        <form>
          <div class="mb-3">
            <label for="bookTitle" class="form-label">Book Title Search</label>
            <input type="text" class="form-control" id="bookTitle" aria-describedby="textBookInputMessage" required>
            <div id="textBookInputMessage" class="form-text">Please enter Book Title.</div>            
            <input value="submit"  type="submit" onClick="showBooks()" />
          </div>
        </form>

      </div>

    </div>

    <div class="row">

      <div class="col-12 col-md-5" id="showData">
        <table class="table table-striped">
          <tr>
            <th>Book ID Code</th>
            <th>Book Title</th>
            <th>Book Loan Status</th>
            <th>Book Author</th>
            <th>Action</th>
          </tr>
          <?php
          $conn = mysqli_connect("localhost", "root", "", "library");
          // Check connection
            if (!$conn) {
                 die("Connection failed: " . mysqli_connect_error());
                  }
            $sql = "SELECT book_Id_code, book_title,book_loan_status, author FROM Book ";
            
             $result = mysqli_query($conn, $sql);
             
             if (mysqli_num_rows($result) > 0) {
                // output data of each row
              while($row = mysqli_fetch_assoc($result)) {
             echo "<tr>
             <td>". $row["book_Id_code"]. " </td>
             <td> " . $row["book_title"]. "</td>
             <td> " . $row["book_loan_status"]."</td>
             <td> " . $row["author"]."</td>
             </tr>" ;

              }
              echo "</table>";
            } else {
              echo "0 results";

              mysqli_close($conn);
         
          ?>
        </table>

      </div>
      <div class="col-md-5" id="bookReservationRequest">

        <div class="col-md-6">
          <form>
            <div class="mb-">
              <label for="readerId" class="form-label">Id Number</label>
              <input type="text" class="form-control" id="readeridNumber" placeholder="enter your ID number" required>
              <div class="mb-3">
                <label for="readerName" class="form-label">Name</label>
                <input type="text" class="form-control" id="readerName" placeholder="enter your name" required>
              </div>
            </div>
            <div class="mb-3">
              <label for="readerAddress" class="form-label">Address</label>
              <input type="text" class="form-control" id="readerAddress" placeholder="enter your address" required>              
            </div>          
            <div class="mb-3">
              <label for="bookTitle" class="form-label">Book TItle</label>
              <input type="text" class="form-control" id="bookTitle" placeholder="enter book title" required>             
            </div>
            <div class="mb-3">
              <label for="bookIDCode" class="form-label">Book ID Code</label>
              <input type="text" class="form-control" id="bookIDCode" placeholder="enter book Id Code" required>
              <input value="submit" class ="submitButton" type="submit" onClick="submitLoanRequest()" />
            </div>
          </form>

        </div>

      </div>


    </div>
  </div>


  <div class="heading_level_3"></div>
  

</body>

</html>