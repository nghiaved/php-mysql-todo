<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Login</title>
  <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/css/bootstrap.min.css"
    integrity="sha384-9aIt2nRpC12Uk9gS9baDl411NQApFmC26EwAOH8WgZl5MYYxFfc+NcPb1dKGj7Sk" crossorigin="anonymous" />
</head>

<body>
  <div class="container pt-5">
    <div class="row justify-content-center align-items-center">
      <div class="col-md-6">
        <div class="col-md-12">
          <?php
          $conn = include_once("../database/connect.php");

          $id = $_GET['id'];

          $sql = "SELECT * FROM todos WHERE id = $id";
          $result = mysqli_query($conn, $sql);

          while ($row = mysqli_fetch_assoc($result)) {
            echo '
              <form id="auth-form-form" class="form" action="../controllers/update.php?id=' . $id . '" method="post">
              <h3 class="text-center text-info">Update</h3>
              <div class="form-group">
                <label for="content" class="text-info">Content:</label><br>
                <input value="' . $row['content'] . '" type="text" name="content" placeholder="Content" id="content" class="form-control">
              </div>
              <div class="form-group pt-4">
                <input type="submit" name="submit" class="btn btn-info btn-md" value="Update">
              </div>
              <div class="text-right">
                <a href="../index.php" class="text-info">Trở về trang chủ</a>
              </div>
            </form>
              ';
          }

          mysqli_close($conn);
          ?>

        </div>
      </div>
    </div>
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