<?php
$con = mysqli_connect("localhost", "root", "rootpassword@694208008", "hungry_hippo");

$query = "SELECT * FROM foods ";
$result = mysqli_query($con, $query);
$rows = mysqli_fetch_all($result, MYSQLI_ASSOC);


?>

<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Hungry Hippo | Roshan Shrestha</title>
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.6.0/css/all.min.css">
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
  <link rel="stylesheet" href="style.css">
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous">
  </script>
</head>

<body class="container">
  <div class="row row-cols-1 row-cols-md-2 row-cols-lg-4 g-4">
    <?php foreach ($rows as $data): ?>
      <div class="col">
        <div class="card h-100">
          <img src="<?= $data["imageURL"] ?>" class="card-img-top" alt="...">
          <div class="card-body">
            <h5 class="card-title"><?= $data["name"] ?></h5>
            <h6><?php if ($data["recommendedForKid"] == 1): ?>
                <span class="badge rounded-pill text-bg-success">Recommended For Kids</span>
              <?php else: ?>
                <span class="badge rounded-pill text-bg-danger"> Not Recommended For Kids</span>
              <?php endif; ?>
            </h6>
            <span><i class="fa fa-bars" aria-hidden="true"></i><?= $data["category"] ?><span><br>
                <span class="nutritioninfo"><?= $data["nutritionInfo"] ?></span><br>
                <span class="price"> <?php
                                      $rupees = 134.37 * $data["price"];
                                      echo "Rs. " . $rupees;

                                      ?></span>
                <br> <button type="button" class="btn btn-success mb-2">EDIT</button>
                <br> <button type="margin" class="btn btn-danger mb-2">DELETE</button>

          </div>
        </div>
      </div>
    <?php endforeach; ?>
  </div>

</body>


</html>