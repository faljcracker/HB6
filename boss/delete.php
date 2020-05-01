<?php

/* setting up connection to database  using PDO php data object*/
require "config.php";


/* check for a submitted for using a try catch err block standard php rules */
if (isset($_POST["submit"])) {

  try {
    $connection = new PDO($dsn, $username, $password, $options); //create connection to db using predefined variables above

    $id = $_POST["submit"]; //extract id from submitted form data

    $sql = "DELETE FROM parcels WHERE id = :id";  //sql query to delete item based on its id

    $statement = $connection->prepare($sql);  //sending the sql statement to the database through a PDO connection
    $statement->bindValue(':id', $id);
    $statement->execute();

  } catch(PDOException $error) {  /* catch any errors that occur and display them */
    echo $sql . "<br>" . $error->getMessage();
  }
}

try {

   /* on successful connection to database return all records in it */

  $connection = new PDO($dsn, $username, $password, $options);

  $sql = "SELECT * FROM parcels";

  $statement = $connection->prepare($sql);
  $statement->execute();

  $result = $statement->fetchAll();
} catch(PDOException $error) {
  echo $sql . "<br>" . $error->getMessage();
}
?>

<!-- html code to be processed by php
     all elements styled using bootstrap -->
<!doctype html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta http-equiv="x-ua-compatible" content="ie=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <title>Delete</title>

    <link rel="stylesheet" href="./css/bootstrap.min.css">
</head>

<body>

    <div class="container-fluid p-5">
        <h2 class="my-5 text-primary"><strong>Delete items</strong></h2>

        <?php if (isset($_POST['submit']) && $statement) : ?>
        <h4 class="mb-5">Success Tracking <strong class="text-danger"><?php echo $_POST['submit']; ?></strong> Has been
            deleted.</h4>
        <?php endif; ?>



        <form class="form" method="post">
            <!-- wrap form with table -->
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
                        <td><button class="btn btn-danger px-4 py-1" type="submit" name="submit"
                                value="<?php echo $row["id"]; ?>">Delete</button></td>
                    </tr>
                    <?php endforeach; ?>
                </tbody>
            </table>
        </form>

        <a class="btn btn-danger btn-lg w-25 my-3" href="index.php">menu</a> <!-- nav button to return to main menu -->


</body>

</html>