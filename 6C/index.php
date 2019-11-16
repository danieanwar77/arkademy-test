<!DOCTYPE html>
<html>

<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <!-- PAGE settings -->
  <link rel="icon" href="https://templates.pingendo.com/assets/Pingendo_favicon.ico">
  <title>Landing</title>
  <meta name="description" content="Wireframe design of a landing page by Pingendo">
  <meta name="keywords" content="Pingendo bootstrap example template wireframe landing">
  <meta name="author" content="Pingendo">
  <!-- CSS dependencies -->
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css" type="text/css">
  <link rel="stylesheet" href="wireframe.css">
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/4.1.3/css/bootstrap.css">
  <link rel="stylesheet" href="https://cdn.datatables.net/1.10.20/css/dataTables.bootstrap4.min.css">
</head>

<body class="">
  <nav class="navbar navbar-expand-md navbar-dark bg-info">
    <div class="container">
      <img src="assets/logo arkademy.png" width="70px"> &nbsp; ARKADEMY COFFE SHOP
      <div class="collapse navbar-collapse text-center justify-content-between" id="navbar2SupportedContent">
        <ul class="navbar-nav">
        </ul>
        <div class="btn-group" >
          <button class="btn dropdown-toggle" data-toggle="dropdown"> Add </button>
          <div class="dropdown-menu"> <a class="dropdown-item" href="#" data-toggle="modal" data-target="#ModalProduct">Product</a>
            <div class="dropdown-divider"></div>
            <a class="dropdown-item" href="#" data-toggle="modal" data-target="#ModalCashier">Cashier</a>
            <a class="dropdown-item" href="#" data-toggle="modal" data-target="#ModalCategory">Category</a>
          </div>
        </div>
      </div>
    </div>
  </nav>
  <div class="py-5">
    <div class="container">
      <div class="row"><table id="example" class="table table-striped table-bordered" style="width:100%">
        <thead>
            <tr>
                <th>No</th>
                <th>Cashier</th>
                <th>Product</th>
                <th>Category</th>
                <th>Price</th>
                <th>Action</th>
            </tr>
        </thead>
        <tbody>
          <?php
          $no = 1;
          $con=mysqli_connect("localhost","root","","arkademy");
          $query = mysqli_query($con,"SELECT product.id AS pid, cashier.name AS csh, product.name AS prd, category.name AS cat, product.price AS pri FROM product INNER JOIN cashier, category WHERE product.id_cashier = cashier.id AND product.id_category = category.id");
          while($row = mysqli_fetch_assoc($query))
          {
            $id = $row['pid'];
            $cashier = $row['csh'];
            $product = $row['prd'];
            $category = $row['cat'];
            $price = $row['pri'];
            echo
            "<tr>
                <td>$no</td>
                <td>$cashier</td>
                <td>$product</td>
                <td>$category</td>
                <td>$price</td>
                <td><a href='' class='text-success' data-toggle='modal' data-target='#myModal$id'>Edit<a> | <a href='' class='text-danger' >Delete<a></td>

            <div id='myModal$id' class='modal fade' role='dialog'>
              <div class='modal-dialog'>

                <!-- Modal content-->
                <div class='modal-content'>
                  <div class='modal-header'>
                    <h4 class='modal-title'>Edit Product</h4>
                    <button type='button' class='close' data-dismiss='modal'>&times;</button>
                  </div>
                  <div class='modal-body'>
                    <p>
                      <form action='proses.php?p=edit_product&id=$id' method='post'>
                        <div class='form-group'>
                          <label>Product Name</label>
                          <input type='text' name='name' class='form-control' value='$product'>
                        </div>
                        <div class='form-group'>
                          <label>Price</label>
                          <input type='text' name='price' class='form-control' value='$price'>
                        </div>
                        <div class='form-group'>
                          <label>Category</label>
                          <select name='category' class='form-control'>
                            <option>--Select Category--</option>";
                          $sql= mysqli_query($con,"SELECT * FROM category");
                          while($row = mysqli_fetch_assoc($sql))
                          {
                            $id = $row['id'];
                            $nama = $row['name'];
                            echo "<option value='$id'>$nama</option>";
                          }
                          echo"
                          </select>
                        </div>
                        <div class='form-group'>
                          <label>Cashier</label>
                          <select name='cashier' class='form-control'>
                            <option>--Select Cashier--</option>";
                          $sql= mysqli_query($con,"SELECT * FROM cashier");
                          while($row = mysqli_fetch_assoc($sql))
                          {
                            $id = $row['id'];
                            $nama = $row['name'];
                            echo "<option value='$id'>$nama</option>";
                          }
                          echo"
                          </select>
                        </div>
                        <div class='form-group'>
                          <input type='submit' class='btn btn-success'>
                        </div>
                      </form>
                    </p>
                  </div>
                  <div class='modal-footer'>
                    <button type='button' class='btn btn-default' data-dismiss='modal'>Close</button>
                  </div>
                </div>

              </div>
            </div>

            </tr>";
            $no++;
          }
          ?>
        </tbody>
        <tfoot>
            <tr>
                <th>Name</th>
                <th>Position</th>
                <th>Office</th>
                <th>Age</th>
                <th>Start date</th>
                <th>Salary</th>
            </tr>
        </tfoot>
    </table></div>
    </div>
  </div>

  <!-- Modal -->
<div id="ModalProduct" class="modal fade" role="dialog">
  <div class="modal-dialog">

    <!-- Modal content-->
    <div class="modal-content">
      <div class="modal-header">
        <h4 class="modal-title">Add Product</h4>
        <button type="button" class="close" data-dismiss="modal">&times;</button>
      </div>
      <div class="modal-body">
        <p>
          <form action="proses.php?p=add_product" method="post">
            <div class="form-group">
              <label>Product Name</label>
              <input type="text" name="name" class="form-control">
            </div>
            <div class="form-group">
              <label>Price</label>
              <input type="text" name="price" class="form-control">
            </div>
            <div class="form-group">
              <label>Category</label>
              <select name="category" class="form-control">
                <option>--Select Category--</option>
              <?php
              $sql= mysqli_query($con,"SELECT * FROM category");
                while($row = mysqli_fetch_assoc($sql))
                {
                  $id = $row['id'];
                  $nama = $row['name'];
                  echo "<option value='$id'>$nama</option>";
                }
              ?>
              </select>
            </div>
            <div class="form-group">
              <label>Cashier</label>
              <select name="cashier" class="form-control">
                <option>--Select Cashier--</option>
              <?php
              $sql= mysqli_query($con,"SELECT * FROM cashier");
                while($row = mysqli_fetch_assoc($sql))
                {
                  $id = $row['id'];
                  $nama = $row['name'];
                  echo "<option value='$id'>$nama</option>";
                }
              ?>
              </select>
            </div>
            <div class="form-group">
              <input type="submit" class="btn btn-success">
            </div>
          </form>
        </p>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
      </div>
    </div>

  </div>
</div>

<div id="ModalCashier" class="modal fade" role="dialog">
  <div class="modal-dialog">

    <!-- Modal content-->
    <div class="modal-content">
      <div class="modal-header">
        <h4 class="modal-title">Add Cashier</h4>
        <button type="button" class="close" data-dismiss="modal">&times;</button>
      </div>
      <div class="modal-body">
        <p>
          <form action="proses.php?p=add_cashier" method="post">
            <div class="form-group">
              <label>Cashier Name</label>
              <input type="text" name="name" class="form-control">
            </div>
            <div class="form-group">
              <input type="submit" class="btn btn-success">
            </div>
          </form>
        </p>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
      </div>
    </div>

  </div>
</div>

<div id="ModalCategory" class="modal fade" role="dialog">
  <div class="modal-dialog">

    <!-- Modal content-->
    <div class="modal-content">
      <div class="modal-header">
        <h4 class="modal-title">Add Category</h4>
        <button type="button" class="close" data-dismiss="modal">&times;</button>
      </div>
      <div class="modal-body">
        <p>
          <form action="proses.php?p=add_category" method="post">
            <div class="form-group">
              <label>Category Name</label>
              <input type="text" name="name" class="form-control">
            </div>
            <div class="form-group">
              <input type="submit" class="btn btn-success">
            </div>
          </form>
        </p>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
      </div>
    </div>

  </div>
</div>

  <script>
    $(document).ready(function() {
    $('#example').DataTable();
    } );
  </script>
  <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.3/umd/popper.min.js" integrity="sha384-ZMP7rVo3mIykV+2+9J3UJ46jBk0WLaUAdn689aCwoqbBJiSnjAK/l8WvCWPIPm49" crossorigin="anonymous"></script>
  <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/js/bootstrap.min.js" integrity="sha384-ChfqqxuZUCnJSK3+MXmPNIyE6ZbWh2IMqE241rYiqJxyMiZ6OW/JmZQ5stwEULTy" crossorigin="anonymous"></script>
  <script src="https://code.jquery.com/jquery-3.3.1.js"></script>
  <script src="https://cdn.datatables.net/1.10.20/js/jquery.dataTables.min.js"></script>
  <script src="https://cdn.datatables.net/1.10.20/js/dataTables.bootstrap4.min.js"></script>
</body>

</html>