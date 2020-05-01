<?php
/* create db connection  */
require "config.php";


if (isset($_POST['submit'])) { /* extract user data sent in form */

  try {
    $connection = new PDO($dsn, $username, $password, $options);

    $user =[
      "id"           => $_POST['id'],
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
      "weight_kg"     => $_POST['weight_kg']
    ];

    /*edit the selected user based on their id */
    $sql = "UPDATE parcels
            SET
            id = :id,
            collection_date_time = :collection_date_time,
            delivery_schedule  = :delivery_schedule,
            last_location  = :last_location,
            origin  = :origin,
            destination = :destination,
            service_mode = :service_mode,
            service_type = :service_type,
            shipping_description = :shipping_description,
            sender_name  = :sender_name,
            sender_phone = :sender_phone,
            sender_address = :sender_address,
            recipient_name  = :recipient_name,
            recipient_phone  = :recipient_phone,
            recipient_address = :recipient_address,
            shipping_history  = :shipping_history,
            tracking_number = :tracking_number,
            shipping_state = :shipping_state,
            shipping_date_time    = :shipping_date_time,
            remarks  = :remarks,
            weight_kg = :weight_kg
            WHERE id = :id";

  $statement = $connection->prepare($sql);
  $statement->execute($user);
  } catch(PDOException $error) {
      echo $sql . "<br>" . $error->getMessage();
  }
}

if (isset($_GET['id'])) {
  try {
    $connection = new PDO($dsn, $username, $password, $options);
    $id = $_GET['id'];

    $sql = "SELECT * FROM parcels WHERE id = :id";
    $statement = $connection->prepare($sql);
    $statement->bindValue(':id', $id);
    $statement->execute();

    $user = $statement->fetch(PDO::FETCH_ASSOC);
  } catch(PDOException $error) {
      echo $sql . "<br>" . $error->getMessage();
  }
} else {
    echo "Could not modify an error occurred";
    exit;
}
?>

<!doctype html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta http-equiv="x-ua-compatible" content="ie=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <title>Update single</title>

    <link rel="stylesheet" href="./css/bootstrap.min.css">
</head>

<body>

    <div class="container">
        <h2 class="my-5 text-primary"><strong>Edit item</strong></h2>

        <?php if (isset($_POST['submit']) && $statement) : ?>
        <!-- feedback based on form status -->
        <h4 class="mb-5 text-success">success Tracking <strong
                class=""><?php echo $_POST['tracking_number']; ?></strong>
            updated!!!</h4>
        <?php endif; ?>

        <form class="form w-50" method="post">

            <?php foreach ($user as $key => $value) : ?>
            <!-- loop through user data and place them accordingly -->

            <div class="form-group">
                <label class="h4" for="<?php echo $key; ?>"><strong><?php echo ucfirst($key); ?></strong></label>
                <input class="form-control form-control-lg" type="text" name="<?php echo $key; ?>"
                    id="<?php echo $key; ?>" value="<?php echo $value; ?>"
                    <?php echo ($key === 'id' ? 'readonly' : null); ?>>
            </div>
            <?php endforeach; ?>
            <input class="btn btn-primary btn-lg w-100" type="submit" name="submit" value="update" data-toggle="modal"
                data-target="#exampleModal">
        </form>


        <a class="btn btn-danger btn-lg w-25 my-3" href="index.php">menu</a>
    </div>
</body>

</html>