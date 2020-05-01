<?php

require "config.php";


if (isset($_POST['submit'])) { /* check to see if any form has been submitted */

  try  {
    $connection = new PDO($dsn, $username, $password, $options);

    /*fill the data acquired into an array */
    $new_user = array(
      /*"id"           => $_POST['id'],*/
      "collection_date_time"  => $_POST['collection_date_time'],
      "delivery_schedule"    => $_POST['delivery_schedule'],
      "last_location"          => $_POST['last_location'],
      "origin"          => $_POST['origin'],
      "destination" => $_POST['destination'],
      "service_mode"    => $_POST['service_mode'],
      "service_type"      => $_POST['service_type'],
      "shipping_description"      => $_POST['shipping_description'],
      "sender_name"     => $_POST['sender_name'],
      "sender_phone"     => $_POST['sender_phone'],
      "sender_address"     => $_POST['sender_address'],
      "recipient_name"     => $_POST['recipient_name'],
      "recipient_phone"     => $_POST['recipient_phone'],
      "recipient_address"     => $_POST['recipient_address'],
      "shipping_history"     => $_POST['shipping_history'],
      "tracking_number"     => $_POST['tracking_number'],
      "shipping_state"     => $_POST['shipping_state'],
      "shipping_date_time"     => $_POST['shipping_date_time'],
      "remarks"     => $_POST['remarks'],
      "weight_kg"     => $_POST['weight_kg'],

    );

   /* use sprintf function to piece query together due to issues with php 7 php version */
    $sql = sprintf(
      "INSERT INTO %s (%s) values (%s)",
      "parcels",
      implode(", ", array_keys($new_user)),
      ":" . implode(", :", array_keys($new_user))
    );

    $statement = $connection->prepare($sql);
    $statement-> execute($new_user);
  } catch(PDOException $error) {
      echo $sql . "<br>" . $error->getMessage();
  }
}

?>

<!-- html markup -->
<!doctype html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta http-equiv="x-ua-compatible" content="ie=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <title>Admin - Create</title>

    <link rel="stylesheet" href="./css/bootstrap.min.css">
</head>

<body>
    <div class="container">
        <h2 class="my-5 text-primary"><strong>Create New item</strong></h2>

        <!-- alert message for status of form submission -->
        <?php if (isset($_POST['submit']) && $statement) : ?>
        <h4 class="mb-5">Tracking: <strong class="text-success"><?php echo $_POST['tracking_number']; ?></strong>
            Has been
            added to Database.</h4>
        <?php endif; ?>

        <form class="form w-50" method="post">
            <div class="form-group">
                <input class="form-control form-control-lg" type="hidden" name="id" id="id">
            </div>

            <div class="form-group">
                <label class="h5 font-weight-bold" for="collection_date_time">Collection_date_time</label>
                <input class="form-control form-control-lg" type="text" name="collection_date_time"
                    id="collection_date_time">
            </div>

            <div class="form-group">
                <label class="h5 font-weight-bold" for="delivery_schedule">delivery_schedule</label>
                <input class="form-control form-control-lg" type="text" name="delivery_schedule" id="delivery_schedule"
                    placeholder="">
            </div>

            <div class="form-group">
                <label class="h5 font-weight-bold" for="last_location">last_location</label>
                <input class="form-control form-control-lg" type="text" name="last_location" id="last_location"
                    placeholder="">
            </div>

            <div class="form-group">
                <label class="h5 font-weight-bold" for="origin">origin</label>
                <input class="form-control form-control-lg" type="text" name="origin" id="origin">
            </div>

            <div class="form-group">
                <label class="h5 font-weight-bold" for="destination">destination</label>
                <input class="form-control form-control-lg" type="text" name="destination" id="destination">
            </div>

            <div class="form-group">
                <label class="h5 font-weight-bold" for="service_mode">service_mode</label>
                <input class="form-control form-control-lg" type="text" name="service_mode" id="service_mode">
            </div>

            <div class="form-group">
                <label class="h5 font-weight-bold" for="service_type">service_type</label>
                <input class="form-control form-control-lg" type="text" name="service_type" id="service_type">
            </div>

            <div class="form-group">
                <label class="h5 font-weight-bold" for="shipping_description">shipping_description</label>
                <input class="form-control form-control-lg" type="text" name="shipping_description"
                    id="shipping_description">
            </div>
            <div class="form-group">
                <label class="h5 font-weight-bold" for="sender_name">sender_name</label>
                <input class="form-control form-control-lg" type="text" name="sender_name" id="sender_name">
            </div>

            <div class="form-group">
                <label class="h5 font-weight-bold" for="sender_phone">sender_phone</label>
                <input class="form-control form-control-lg" type="text" name="sender_phone" id="sender_phone">
            </div>

            <div class="form-group">
                <label class="h5 font-weight-bold" for="sender_address">sender_address</label>
                <input class="form-control form-control-lg" type="text" name="sender_address" id="sender_address">
            </div>

            <div class="form-group">
                <label class="h5 font-weight-bold" for="recipient_name">recipient_name</label>
                <input class="form-control form-control-lg" type="text" name="recipient_name" id="recipient_name">
            </div>

            <div class="form-group">
                <label class="h5 font-weight-bold" for="recipient_phone">recipient_phone</label>
                <input class="form-control form-control-lg" type="text" name="recipient_phone" id="recipient_phone">
            </div>

            <div class="form-group">
                <label class="h5 font-weight-bold" for="recipient_address">recipient_address</label>
                <input class="form-control form-control-lg" type="text" name="recipient_address" id="recipient_address">
            </div>

            <div class="form-group">
                <label class="h5 font-weight-bold" for="shipping_history">shipping_history</label>
                <input class="form-control form-control-lg" type="text" name="shipping_history" id="shipping_history">
            </div>

            <div class="form-group">
                <label class="h5 font-weight-bold" for="tracking_number">tracking_number</label>
                <input class="form-control form-control-lg" type="text" name="tracking_number" id="tracking_number">
            </div>

            <div class="form-group">
                <label class="h5 font-weight-bold" for="shipping_state">shipping_state</label>
                <input class="form-control form-control-lg" type="text" name="shipping_state" id="shipping_state">
            </div>

            <div class="form-group">
                <label class="h5 font-weight-bold" for="shipping_date_time">shipping_date_time</label>
                <input class="form-control form-control-lg" type="text" name="shipping_date_time"
                    id="shipping_date_time">
            </div>

            <div class="form-group">
                <label class="h5 font-weight-bold" for="remarks">remarks</label>
                <input class="form-control form-control-lg" type="text" name="remarks" id="remarks">
            </div>

            <div class="form-group">
                <label class="h5 font-weight-bold" for="weight_kg">weight_kg</label>
                <input class="form-control form-control-lg" type="text" name="weight_kg" id="weight_kg">
            </div>



            <input class="btn btn-primary btn-lg w-100" type="submit" name="submit" value="create">




        </form>

        <a class="btn btn-danger btn-lg w-25 my-3" href="index.php">menu</a>
    </div>
</body>

</html>