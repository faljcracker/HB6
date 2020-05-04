<?php

/* create database connection  */
require "../boss/config.php";

if (isset($_POST['submit'])) { /* check for form submission */

  try  { /* fetch information from database */
    $connection = new PDO($dsn, $username, $password, $options);

    $sql = "SELECT *
            FROM parcels
            WHERE tracking_number = :tracking_number";

    $tracking_number = $_POST['tracking_number'];
    $statement = $connection->prepare($sql);
    $statement->bindParam(':tracking_number', $tracking_number, PDO::PARAM_STR);
    $statement->execute();

    /* return results of querry back here */
    $result = $statement->fetchAll();
  } catch(PDOException $error) {
      echo $sql . "<br>" . $error->getMessage();
  }
}
?>

<?php require 'header.html'; ?>

<div class="header">

    <?php require 'nav.html'; ?>

    <div class="container my-5 text-center text-md-left">
        <div class="row">
            <div class="col mb-5 p-2">
                <hr class="mx-auto mx-md-0 my-5">
                <h1>TRACKING</h1>
            </div>
        </div>
    </div>
</div>

<div class="container my-5">
    <div class="row ">

        <div id="error-message" class="col-md-8 my-5 mx-md-auto d-none">
            <h6 class="text-center">Sorry no match found for Tracking Number <strong
                    class="text-danger"><?php echo $_POST['tracking_number']; ?></strong>. Please verify and try
                again
            </h6>
        </div>

        <div id="tracking-form" class="col-md-8 p-3 p-md-5 m-2 mx-md-auto">
            <h1>Track Your shipments</h1>
            <p>Automatically detect courier based on tracking number format.</p>

            <form method="post" name="tracking_form" class="form-inline my-5 d-block">
                <label class="sr-only" for="search">Tracking Number</label>
                <div class="input-group">
                    <div class="input-group-prepend d-none d-md-block">
                        <div class="btn btn-lg bg-white"><i class="fa fa-search"></i></div>
                    </div>
                    <input type="text" class="form-control form-control-lg border-0" id="search"
                        placeholder="Tracking Number" name="tracking_number">
                    <div class="input-group-append"><input name="submit" type="submit" class="btn btn-lg btn-danger"
                            value="TRACK">
                    </div>
                </div>
            </form>

        </div>
    </div>
</div>

<?php
if (isset($_POST['submit'])) {

    /* loop through returned results and place in tables */
    if ($result && $statement->rowCount() > 0) { ?>
<?php foreach ($result as $row) : ?>

<script type='text/javascript'>
alert('Please scroll to view information.');
document.getElementById('tracking-form').classList.add('d-none');
</script>

<div class="container my-5" id="tracking-details">

    <div class="row p-2">
        <div class="col-md-9 mb-5">
            <h1 class="mb-5 text-center text-md-left "><img class="img-fluid mb-2 mb-md-0"
                    src="../src/assets/images/tracking-search.png"><br class="d-md-none">Parcel Tracking</h1>

            <div class="row">
                <div class="col-md-4">
                    <p><span>Collection date and time</span></p>
                    <p><?php echo $row["collection_date_time"]; ?></p>
                </div>

                <div class="col-md-4">
                    <p><span>Delivery schedule</span></p>
                    <p><?php echo $row["delivery_schedule"]; ?></p>
                </div>

                <div class="col-md-4">
                    <p><span>Last location</p>
                    <p><?php echo $row["last_location"]; ?></span></p>
                </div>
            </div>

            <h5 class="my-4 font-weight-bold">Additional information</h5>

            <div class="row">
                <div class="col-md-4">
                    <p><span>Origin: </span><?php echo $row["origin"]; ?></p>
                    <p><span>Destination: </span><?php echo $row["destination"]; ?></p>
                    <p><span>Service mode: </span><?php echo $row["service_mode"]; ?></p>
                    <p><span>Service Type: </span><?php echo $row["service_type"]; ?></p>
                    <p><span>Shipping Description: </span><?php echo $row["shipping_description"]; ?></p>
                </div>

                <div class="col-md-4">
                    <p><span>Sender information</span></p>
                    <p><span>Name: </span><?php echo $row["sender_name"]; ?></p>
                    <p><span>Phone: </span><?php echo $row["sender_phone"]; ?></p>
                    <p><span>Address: </span><?php echo $row["sender_address"]; ?></p>
                </div>

                <div class="col-md-4">
                    <p><span>Recipient information</span></p>
                    <p><span>Name: </span><?php echo $row["recipient_name"]; ?></p>
                    <p><span>Phone: </span><?php echo $row["recipient_phone"]; ?></p>
                    <p><span>Address: </span><?php echo $row["recipient_address"]; ?></p>
                </div>
            </div>

            <h5 class="my-4 font-weight-bold">Shipping history</h5>

            <table class="table table-bordered table-responsive text-center">
                <thead class="thead-light">
                    <tr>
                        <th>Tracking No</th>
                        <th>Shipping history</th>
                        <th>Shipping state</th>
                        <th>Date and Time</th>
                        <th>Remarks</th>
                    </tr>
                </thead>
                <tbody>
                    <tr>
                        <td><?php echo $row["tracking_number"]; ?></td>
                        <td><?php echo $row["shipping_history"]; ?></td>
                        <td>
                            <p class="btn btn-success font-weight-bold"><?php echo $row["shipping_state"]; ?></p>
                        </td>
                        <td><?php echo $row["shipping_date_time"]; ?></td>
                        <td><?php echo $row["remarks"]; ?></td>
                    </tr>

                </tbody>
            </table>

        </div>

        <div class="col-md-3 bg-light p-3 text-center" id="side-section">
            <img class="w-75 d-block mx-auto" src="../src/assets/images/barcode.png">
            <p class="my-3"><span><?php echo $row["tracking_number"]; ?></span></p>
            <i class="fas fa-map-marked fa-3x my-3"></i>
            <p class="my-3">CURRENT STATE</p>

            <p class="btn btn-success font-weight-bold"><?php echo $row["shipping_state"]; ?></p>
            <br>
            <i class="fas fa-box-open fa-3x my-3"></i>

            <p class="my-3">WEIGHT</p>
            <p><?php echo $row["weight_kg"]; ?>kg</p>


        </div>
    </div>
</div>

<?php endforeach; ?>

<?php } else { ?>

<!-- display an error if no match is found -->
<div class="container">
    <script type='text/javascript'>
    alert('Sorry no match found for Tracking Number: <?php echo $_POST['
        tracking_number ']; ?>. Please verify and try again ');

    document.getElementById('error-message').classList.remove('d-none');
    </script>
</div>

<?php }
    } ?>


<?php require 'footer.html'; ?>