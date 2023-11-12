<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Todos</title>
  <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/css/bootstrap.min.css"
    integrity="sha384-9aIt2nRpC12Uk9gS9baDl411NQApFmC26EwAOH8WgZl5MYYxFfc+NcPb1dKGj7Sk" crossorigin="anonymous" />
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.2/css/all.min.css"
    integrity="sha512-z3gLpd7yknf1YoNbCzqRKc4qyor8gaKU1qmn+CShxbuBusANI9QpRohGBreCFkKxLhei6S9CQXFEbbKuqLg0DA=="
    crossorigin="anonymous" referrerpolicy="no-referrer" />
</head>

<body>
  <div class="bg-info text-white d-flex align-items-center justify-content-between p-4" id="header">
    <h2>PHP, MySQL</h2>
    <form action="./controllers/logout.php" method="post">
      <button type="submit" class="btn btn-info">
        <h4>
          <?php
          session_start();
          if (isset($_SESSION["username"])) {
            echo $_SESSION["username"];
          }
          ?>
          &nbsp;
          <i class="fa-solid fa-arrow-right-from-bracket"></i>
        </h4>
      </button>
    </form>
  </div>

  <div class="container-fluid">
    <a href="./views/create.php">
      <button type="button" class="btn btn-primary my-4 px-4">Create</button>
    </a>
    <table class="table table-striped">
      <thead>
        <tr>
          <th scope="col">#</th>
          <th scope="col">Content</th>
          <th scope="col">Edit</th>
          <th scope="col">Delete</th>
        </tr>
      </thead>
      <tbody>
        <?php
        session_start();
        if (isset($_SESSION["username"])) {
          $conn = include_once("./database/connect.php");
          // require_once("../database/connect.php");
        
          $sql = "SELECT id, content FROM todos WHERE author = '" . $_SESSION["username"] . "'";

          $result = mysqli_query($conn, $sql);
          if ($result->num_rows > 0) {
            while ($row = mysqli_fetch_assoc($result)) {
              echo '<tr>';
              echo '<th scope="row">' . $row['id'] . '</th>';
              echo '<td>' . $row['content'] . '</td>';
              echo '<td><a href="./views/update.php?id=' . $row['id'] . '"><i class="fa-solid fa-pen"></i></a></td>';
              echo '<td><a href="./controllers/delete.php?id=' . $row['id'] . '"><i class="fa-solid fa-trash"></i></a></td>';
              echo '</tr>';
            }
          }

          mysqli_close($conn);
        } else {
          header("Location: ./views/login.php");
        }
        ?>
      </tbody>
    </table>
  </div>

  <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"
    integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj"
    crossorigin="anonymous"></script>
  <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js"
    integrity="sha384-Q6E9RHvbIyZFJoft+2mJbHaEWldlvI9IOYy5n3zV9zzTtmI3UksdQRVvoxMfooAo"
    crossorigin="anonymous"></script>
  <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/js/bootstrap.min.js"
    integrity="sha384-OgVRvuATP1z7JjHLkuOU7Xw704+h835Lr+6QL9UvYjZE3Ipu6Tp75j7Bh/kR0JKI"
    crossorigin="anonymous"></script>
</body>

</html>