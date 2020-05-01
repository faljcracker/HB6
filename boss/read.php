<?php

require "config.php";


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
<!-- markup to display output -->
<!doctype html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta http-equiv="x-ua-compatible" content="ie=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <title>Admin - Read</title>

    <link rel="stylesheet" href="./css/bootstrap.min.css">


</head>

<body>

    <div class="container">
        <h2 class="my-5 text-primary"><strong>Find items</strong></h2>


        <?php
if (isset($_POST['submit'])) { /* loop through returned results and place in tables */
  if ($result && $statement->rowCount() > 0) { ?>
        <h2>search results </h2>

        <table class="table table-responsive">
            <thead>
                <tr>
                    <th>ID</th>
                    <th>collection_date_time</th>
                    <th>delivery_schedule</th>
                    <th>last_location</th>
                    <th>origin</th>
                    <th>destination</th>
                    <th>service_mode</th>
                    <th>service_type</th>
                    <th>shipping_description</th>
                    <th>sender_name</th>
                    <th>sender_phone</th>
                    <th>sender_address</th>
                    <th>recipient_name</th>
                    <th>recipient_phone</th>
                    <th>recipient_address</th>
                    <th>shipping_history</th>
                    <th>tracking_number</th>
                    <th>shipping_state</th>
                    <th>shipping_date_time</th>
                    <th>remarks</th>
                    <th>weight_kg</th>

                </tr>
            </thead>
            <tbody>

                <?php foreach ($result as $row) : ?>
                <tr>
                    <td><?php echo $row["id"]; ?></td>
                    <td><?php echo $row["collection_date_time"]; ?></td>
                    <td><?php echo $row["delivery_schedule"]; ?></td>
                    <td><?php echo $row["last_location"]; ?></td>
                    <td><?php echo $row["origin"]; ?></td>
                    <td><?php echo $row["destination"]; ?></td>
                    <td><?php echo $row["service_mode"]; ?></td>
                    <td><?php echo $row["service_type"]; ?></td>
                    <td><?php echo $row["shipping_description"]; ?></td>
                    <td><?php echo $row["sender_name"]; ?></td>
                    <td><?php echo $row["sender_phone"]; ?></td>
                    <td><?php echo $row["sender_address"]; ?></td>
                    <td><?php echo $row["recipient_name"]; ?></td>
                    <td><?php echo $row["recipient_phone"]; ?></td>
                    <td><?php echo $row["recipient_address"]; ?></td>
                    <td><?php echo $row["shipping_history"]; ?></td>
                    <td><?php echo $row["tracking_number"]; ?></td>
                    <td><?php echo $row["shipping_state"]; ?></td>
                    <td><?php echo $row["shipping_date_time"]; ?></td>
                    <td><?php echo $row["remarks"]; ?></td>
                    <td><?php echo $row["weight_kg"]; ?></td>

                </tr>
                <?php endforeach; ?>
            </tbody>
        </table>

        <?php } else { ?>
        <!-- display an error if no match is found -->
        <h4 class="mb-5">Sorry no match for <strong
                class="text-danger"><?php echo $_POST['tracking_number']; ?></strong></h4>
        <?php }
} ?>

        <!-- form used to collect information to be searched -->
        <form class="form w-50" method="post">
            <div class="form-group">
                <label class="h4" for="tracking_number"><strong>Tracking Number</strong></label>
                <input class="form-control form-control-lg" type="text" id="tracking_number" name="tracking_number">
            </div>
            <input class="btn btn-primary btn-lg w-100" type="submit" name="submit" value="search">
        </form>
        <a class="btn btn-danger btn-lg w-25 my-3" href="index.php">menu</a>


    </div>
</body>

</html>