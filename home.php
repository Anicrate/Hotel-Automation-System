<?php

include 'config.php';
session_start();

// page redirect
$usermail = "";
$usermail = $_SESSION['usermail'];
if ($usermail == true) {
} else {
  header("location: index.php");
}

?>

<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <link rel="stylesheet" href="./css/home.css">
  <title>Hotel La Serene</title>
  <!-- boot -->
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>
  <!-- fontowesome -->
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.2.0/css/all.min.css" integrity="sha512-xh6O/CkQoPOWDdYTDqeRdPCVd1SpvCA9XXcUnZS2FmJNp1coAFzvtCN9BmamE+4aHK8yyUHUSCcJHgXloTyT2A==" crossorigin="anonymous" referrerpolicy="no-referrer" />
  <!-- sweet alert -->
  <script src="https://unpkg.com/sweetalert/dist/sweetalert.min.js"></script>
  <link rel="stylesheet" href="./admin/css/roombook.css">
  <style>
    #guestdetailpanel {
      display: none;
    }

    #guestdetailpanel .middle {
      height: 450px;
    }
  </style>
</head>

<body>
  <nav>
    <div class="logo">
      <img class="bluebirdlogo" src="./image/logo.png" alt="logo">
      <p>LA Serene</p>
    </div>
    <ul>
      <li><a href="#firstsection">Home</a></li>
      <li><a href="#secondsection">Rooms</a></li>
      <li><a href="#thirdsection">Facilites</a></li>
      <li><a href="#contactus">contact us</a></li>
      <a href="./logout.php"><button class="btn btn-danger">Logout</button></a>
    </ul>
  </nav>

  <section id="firstsection" class="carousel slide carousel_section" data-bs-ride="carousel">


      <div class="welcomeline">
        <h1 class="welcometag">Welcome to heaven on earth</h1>
      </div>

      <!-- bookbox -->
      <div id="guestdetailpanel">
        <form action="" method="POST" class="guestdetailpanelform">
          <div class="head">
            <h3>RESERVATION</h3>
            <i class="fa-solid fa-circle-xmark" onclick="closebox()"></i>
          </div>
          <div class="middle">
            <div class="guestinfo">
              <h4>Guest information</h4>
              <input type="text" name="Name" placeholder="Enter Full name">
              <input type="email" name="Email" placeholder="Enter Email">

              <?php
              $countries = array("Afghanistan", "Albania", "Algeria", "American Samoa", "Andorra", "Angola", "Anguilla", "Antarctica", "Antigua and Barbuda", "Argentina", "Armenia", "Aruba", "Australia", "Austria", "Azerbaijan", "Bahamas", "Bahrain", "Bangladesh", "Barbados", "Belarus", "Belgium", "Belize", "Benin", "Bermuda", "Bhutan", "Bolivia", "Bosnia and Herzegowina", "Botswana", "Bouvet Island", "Brazil", "British Indian Ocean Territory", "Brunei Darussalam", "Bulgaria", "Burkina Faso", "Burundi", "Cambodia", "Cameroon", "Canada", "Cape Verde", "Cayman Islands", "Central African Republic", "Chad", "Chile", "China", "Christmas Island", "Cocos (Keeling) Islands", "Colombia", "Comoros", "Congo", "Congo, the Democratic Republic of the", "Cook Islands", "Costa Rica", "Cote d'Ivoire", "Croatia (Hrvatska)", "Cuba", "Cyprus", "Czech Republic", "Denmark", "Djibouti", "Dominica", "Dominican Republic", "East Timor", "Ecuador", "Egypt", "El Salvador", "Equatorial Guinea", "Eritrea", "Estonia", "Ethiopia", "Falkland Islands (Malvinas)", "Faroe Islands", "Fiji", "Finland", "France", "France Metropolitan", "French Guiana", "French Polynesia", "French Southern Territories", "Gabon", "Gambia", "Georgia", "Germany", "Ghana", "Gibraltar", "Greece", "Greenland", "Grenada", "Guadeloupe", "Guam", "Guatemala", "Guinea", "Guinea-Bissau", "Guyana", "Haiti", "Heard and Mc Donald Islands", "Holy See (Vatican City State)", "Honduras", "Hong Kong", "Hungary", "Iceland", "India", "Indonesia", "Iran (Islamic Republic of)", "Iraq", "Ireland", "Israel", "Italy", "Jamaica", "Japan", "Jordan", "Kazakhstan", "Kenya", "Kiribati", "Korea, Democratic People's Republic of", "Korea, Republic of", "Kuwait", "Kyrgyzstan", "Lao, People's Democratic Republic", "Latvia", "Lebanon", "Lesotho", "Liberia", "Libyan Arab Jamahiriya", "Liechtenstein", "Lithuania", "Luxembourg", "Macau", "Macedonia, The Former Yugoslav Republic of", "Madagascar", "Malawi", "Malaysia", "Maldives", "Mali", "Malta", "Marshall Islands", "Martinique", "Mauritania", "Mauritius", "Mayotte", "Mexico", "Micronesia, Federated States of", "Moldova, Republic of", "Monaco", "Mongolia", "Montserrat", "Morocco", "Mozambique", "Myanmar", "Namibia", "Nauru", "Nepal", "Netherlands", "Netherlands Antilles", "New Caledonia", "New Zealand", "Nicaragua", "Niger", "Nigeria", "Niue", "Norfolk Island", "Northern Mariana Islands", "Norway", "Oman", "Pakistan", "Palau", "Panama", "Papua New Guinea", "Paraguay", "Peru", "Philippines", "Pitcairn", "Poland", "Portugal", "Puerto Rico", "Qatar", "Reunion", "Romania", "Russian Federation", "Rwanda", "Saint Kitts and Nevis", "Saint Lucia", "Saint Vincent and the Grenadines", "Samoa", "San Marino", "Sao Tome and Principe", "Saudi Arabia", "Senegal", "Seychelles", "Sierra Leone", "Singapore", "Slovakia (Slovak Republic)", "Slovenia", "Solomon Islands", "Somalia", "South Africa", "South Georgia and the South Sandwich Islands", "Spain", "Sri Lanka", "St. Helena", "St. Pierre and Miquelon", "Sudan", "Suriname", "Svalbard and Jan Mayen Islands", "Swaziland", "Sweden", "Switzerland", "Syrian Arab Republic", "Taiwan, Province of China", "Tajikistan", "Tanzania, United Republic of", "Thailand", "Togo", "Tokelau", "Tonga", "Trinidad and Tobago", "Tunisia", "Turkey", "Turkmenistan", "Turks and Caicos Islands", "Tuvalu", "Uganda", "Ukraine", "United Arab Emirates", "United Kingdom", "United States", "United States Minor Outlying Islands", "Uruguay", "Uzbekistan", "Vanuatu", "Venezuela", "Vietnam", "Virgin Islands (British)", "Virgin Islands (U.S.)", "Wallis and Futuna Islands", "Western Sahara", "Yemen", "Yugoslavia", "Zambia", "Zimbabwe");
              ?>

              <select name="Country" class="selectinput">
                <option value selected>Select your country</option>
                <?php
                foreach ($countries as $key => $value) :
                  echo '<option value="' . $value . '">' . $value . '</option>';
                //close your tags!!
                endforeach;
                ?>
              </select>
              <input type="text" name="Phone" placeholder="Enter Phoneno">
            </div>

            <div class="line"></div>

            <div class="reservationinfo">
              <h4>Reservation information</h4>
              <select name="RoomType" class="selectinput">
                <option value selected>Type Of Room</option>
                <option value="Superior Room">SUPERIOR ROOM</option>
                <option value="Deluxe Room">DELUXE ROOM</option>
                <option value="Guest House">GUEST HOUSE</option>
                <option value="Single Room">SINGLE ROOM</option>
              </select>
              <select name="Bed" class="selectinput">
                <option value selected>Bedding Type</option>
                <option value="Single">Single</option>
                <option value="Double">Double</option>
                <option value="Triple">Triple</option>
                <option value="Quad">Quad</option>
                <option value="None">None</option>
              </select>
              <select name="NoofRoom" class="selectinput">
                <option value selected>No of Room</option>
                <option value="1">1</option>
                <!-- <option value="1">2</option> -->
                <!-- <option value="1">3</option> -->
              </select>
              <select name="Meal" class="selectinput">
                <option value selected>Meal</option>
                <option value="Room only">Room only</option>
                <option value="Breakfast">Breakfast</option>
                <option value="Half Board">Half Board</option>
                <option value="Full Board">Full Board</option>
              </select>
              <div class="datesection">
                <span>
                  <label for="cin"> Check-In</label>
                  <input name="cin" type="date">
                </span>
                <span>
                  <label for="cin"> Check-Out</label>
                  <input name="cout" type="date">
                </span>
              </div>
            </div>
          </div>
          <div class="footer">
            <button class="btn btn-success" name="guestdetailsubmit">Submit</button>
          </div>
        </form>

        <!-- ==== room book php ====-->
        <?php
        if (isset($_POST['guestdetailsubmit'])) {
          $Name = $_POST['Name'];
          $Email = $_POST['Email'];
          $Country = $_POST['Country'];
          $Phone = $_POST['Phone'];
          $RoomType = $_POST['RoomType'];
          $Bed = $_POST['Bed'];
          $NoofRoom = $_POST['NoofRoom'];
          $Meal = $_POST['Meal'];
          $cin = $_POST['cin'];
          $cout = $_POST['cout'];

          if ($Name == "" || $Email == "" || $Country == "") {
            echo "<script>swal({
                        title: 'Fill the proper details',
                        icon: 'error',
                    });
                    </script>";
          } else {
            $sta = "NotConfirm";
            $sql = "INSERT INTO roombook(Name,Email,Country,Phone,RoomType,Bed,NoofRoom,Meal,cin,cout,stat,nodays) VALUES ('$Name','$Email','$Country','$Phone','$RoomType','$Bed','$NoofRoom','$Meal','$cin','$cout','$sta',datediff('$cout','$cin'))";
            $result = mysqli_query($conn, $sql);


            if ($result) {
              echo "<script>swal({
                                title: 'Reservation successful',
                                icon: 'success',
                            });
                        </script>";
            } else {
              echo "<script>swal({
                                    title: 'Something went wrong',
                                    icon: 'error',
                                });
                        </script>";
            }
          }
        }
        ?>
      </div>

    </div>
  </section>

  <?php

  $superior_stars = 0;
  $deluxe_stars = 0;
  $guest_stars = 0;
  $single_stars = 0;

  $rating_sql1 = "SELECT AVG(Rating) AS average_rating FROM rating WHERE RoomType = 'Superior Room';";
  $rating_sql2 = "SELECT AVG(Rating) AS average_rating FROM rating WHERE RoomType = 'Deluxe Room';";
  $rating_sql3 = "SELECT AVG(Rating) AS average_rating FROM rating WHERE RoomType = 'Guest House';";
  $rating_sql4 = "SELECT AVG(Rating) AS average_rating FROM rating WHERE RoomType = 'Single Room';";


  $superior_room_rating = mysqli_query($conn, $rating_sql1);

  if ($superior_room_rating->num_rows > 0) {
    $row = $superior_room_rating->fetch_assoc();
    $average_rating = $row["average_rating"];
    // echo "The average rating for specific type is: " . $average_rating;
    $superior_stars = $average_rating;
  }



  $deluxe_room_rating = mysqli_query($conn, $rating_sql2);
  if ($deluxe_room_rating->num_rows > 0) {
    $row = $deluxe_room_rating->fetch_assoc();
    $average_rating = $row["average_rating"];
    // echo "The average rating for specific type is: " . $average_rating;
    $deluxe_stars = $average_rating;
  }

  $guest_room_rating = mysqli_query($conn, $rating_sql3);
  if ($guest_room_rating->num_rows > 0) {
    $row = $guest_room_rating->fetch_assoc();
    $average_rating = $row["average_rating"];
    // echo "The average rating for specific type is: " . $average_rating;
    $guest_stars = $average_rating;
  }

  $single_room_rating = mysqli_query($conn, $rating_sql4);
  if ($single_room_rating->num_rows > 0) {
    $row = $single_room_rating->fetch_assoc();
    $average_rating = $row["average_rating"];
    // echo "The average rating for specific type is: " . $average_rating;
    $single_stars = $average_rating;
  }

  ?>

  <section id="secondsection">
    <img src="./image/homeanimatebg.svg">
    <div class="ourroom">
      <h1 class="head">≼ Our room ≽</h1>
      <div class="roomselect">
        <div class="roombox">
          <div class="hotelphoto h1"></div>
          <div class="roomdata">
            <h2>Superior Room</h2>
            <div class="services">
              <i class="fa-solid fa-wifi"></i>
              <i class="fa-solid fa-burger"></i>
              <i class="fa-solid fa-spa"></i>
              <i class="fa-solid fa-dumbbell"></i>
              <i class="fa-solid fa-person-swimming"></i>
            </div>
            <div style="display: flex;">
              <button class="btn btn-primary bookbtn" onclick="openbookbox()">Book</button>
              <h3 class="rate">Rating <?php echo number_format($superior_stars) . '&#9733' ?></h3>
            </div>
          </div>
        </div>
        <div class="roombox">
          <div class="hotelphoto h2"></div>
          <div class="roomdata">
            <h2>Deluxe Room</h2>
            <div class="services">
              <i class="fa-solid fa-wifi"></i>
              <i class="fa-solid fa-burger"></i>
              <i class="fa-solid fa-spa"></i>
              <i class="fa-solid fa-dumbbell"></i>
            </div>
            <div style="display: flex;">
              <button class="btn btn-primary bookbtn" onclick="openbookbox()">Book</button>
              <h3 class="rate">Rating <?php echo number_format($deluxe_stars, 1) . '&#9733' ?></h3>
            </div>
          </div>
        </div>
        <div class="roombox">
          <div class="hotelphoto h3"></div>
          <div class="roomdata">
            <h2>Guest House</h2>
            <div class="services">
              <i class="fa-solid fa-wifi"></i>
              <i class="fa-solid fa-burger"></i>
              <i class="fa-solid fa-spa"></i>
            </div>
            <div style="display: flex;">
              <button class="btn btn-primary bookbtn" onclick="openbookbox()">Book</button>
              <h3 class="rate">Rating <?php echo number_format($guest_stars, 1) . '&#9733' ?></h3>
            </div>
          </div>
        </div>
        <div class="roombox">
          <div class="hotelphoto h4"></div>
          <div class="roomdata">
            <h2>Single Room</h2>
            <div class="services">
              <i class="fa-solid fa-wifi"></i>
              <i class="fa-solid fa-burger"></i>
            </div>
            <div style="display: flex;">
              <button class="btn btn-primary bookbtn" onclick="openbookbox()">Book</button>
              <h3 class="rate">Rating <?php echo number_format($single_stars) . '&#9733' ?></h3>
            </div>
          </div>
        </div>
      </div>
    </div>
  </section>
  <style>
    .rate {
      color: white;
      font-size: 14px;
      margin-top: auto;
      margin-bottom: auto;

    }
    .col {
      padding: 4px 6px;
      text-align: center
    }

    .col-head {
      background-color: rgb(8, 8, 48);
      padding: 6px 4px;
      /* border: 1px solid black; */
      text-align: center;
    }

    .bookings {
      padding: 0px 0px 160px 0px;
    }
  </style>

  <div class="bookings" style="display:flex; flex-direction: column">
    <h1 style="text-align: center; padding: 10px">≼ Your Bookings ≽</h1>
    <table style="margin:auto; background-color: #d1d5db; padding: 10px;">
      <thead style=" color: white;">
        <tr>
          <th scope="col" class="col-head">Type of Room</th>
          <th scope="col" class="col-head">Type of Bed</th>
          <th scope="col" class="col-head">No of Room</th>
          <th scope="col" class="col-head">Meal</th>
          <th scope="col" class="col-head">Check-In</th>
          <th scope="col" class="col-head">Check-Out</th>
          <th scope="col" class="col-head">No of Day</th>
          <th scope="col" class="col-head">Status</th>
          <th scope="col" class="col-head" class="action">Action</th>
          <!-- <th>Delete</th> -->
        </tr>
      </thead>
      <tbody>
        <?php
        $sql = "Select * FROM roombook WHERE Email='$usermail'";
        $room_book_result = mysqli_query($conn, $sql);
        while ($res = mysqli_fetch_array($room_book_result)) {
        ?>
          <tr>
            <td class="col"><?php echo $res['RoomType'] ?></td>
            <td class="col"><?php echo $res['Bed'] ?></td>
            <td class="col"><?php echo $res['NoofRoom'] ?></td>
            <td class="col"><?php echo $res['Meal'] ?></td>
            <td class="col"><?php echo $res['cin'] ?></td>
            <td class="col"><?php echo $res['cout'] ?></td>
            <td class="col"><?php echo $res['nodays'] ?></td>
            <td class="col"><?php echo $res['stat'] ?></td>
            <td class="col action">
              <?php
              if ($res['stat'] == "Confirm") {
                echo " N/A";
              } else {
                echo "<a href='user/deletebooking.php?id=" . $res['id'] . "'><button class='btn btn-danger'>Cancel</button></a>";
              }
              ?>
            </td>
          </tr>
        <?php
        }
        ?>
      </tbody>
    </table>

  </div>


  <section id="thirdsection">
    <h1 class="head">≼ Facilities ≽</h1>
    <div class="facility">
      <div class="box">
        <h2>Swiming pool</h2>
      </div>
      <div class="box">
        <h2>Spa</h2>
      </div>
      <div class="box">
        <h2>24*7 Restaurants</h2>
      </div>
      <div class="box">
        <h2>24*7 Gym</h2>
      </div>
      <div class="box">
        <h2>Heli service</h2>
      </div>
    </div>
  </section>

  <section id="contactus">
    <div class="social">
      <i class="fa-brands fa-instagram"></i>
      <i class="fa-brands fa-facebook"></i>
      <i class="fa-solid fa-envelope"></i>
    </div>
    <div class="createdby">
      <h5>@La Serene</h5>
    </div>
  </section>
</body>

<script>
  var bookbox = document.getElementById("guestdetailpanel");

  openbookbox = () => {
    bookbox.style.display = "flex";
  }
  closebox = () => {
    bookbox.style.display = "none";
  }
</script>

</html>