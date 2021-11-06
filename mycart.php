<?php
    include("header.php");
?>
<!doctype html>
<html lang="en">
  <head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">

    <title>Hello, world!</title>
  </head>
  <body>
    
    <div class="container">
        <div class="row">
            <div class="col-lg-10 text-center border rounded bg-light my-5">
               <h1>My Cart</h1>
            </div>
            <div class="col-lg-8">
                <table class="table">
                <thead class="text-center">
                    <tr>
                    <th scope="col"></th>
                    <th scope="col">Item Name</th>
                    <th scope="col">Price</th>
                    <th scope="col">Quantity</th>
                    </tr>
                </thead>
                <tbody class="text-center">
                    <?php
                    $total=0;
                        foreach($_SESSION['cart'] as $key=>$value)
                        {
                            $i=$key+1;
                            $total=$total+(int)($value['Quantity'])*(int)($value['Price']);
                            echo "
                            <tr>
                            <th>$i</th>
                            <td>$value[Item_Name]</td>
                            <td>$value[Price]</td>
                            <td>
                            <form action='manage_cart.php' method='POST'>
                                <button name='Dec_Item' class='btn btn-sm button-outline-success'>-</button>
                                $value[Quantity]
                                <button name='Inc_Item' class='btn btn-sm button-outline-success'>+</button>
                                <input type='hidden' name='Item_Name' value='$value[Item_Name]'>
                                <input type='hidden' name='Price' value='$value[Price]'>
                                <input type='hidden' name='Quantity' value='$value[Quantity]'>
                            </form>
                            </td>
                            <td>
                            <form action='manage_cart.php' method='POST'>
                                <button name='Remove_Item' class='btn btn-sm btn-outline-danger'>REMOVE</button>
                                <input type='hidden' name='Item_Name' value='$value[Item_Name]'>
                            </form>
                            </td>
                            </tr>
                            ";
                        }
                    ?>
                </tbody>
                </table>
            </div>
            <div class="col-lg-2 border rounded bg-light p-4">
                <h4>Total:</h4>
                <h5 class="text-right"><?php echo $total ?></h5>
                <form>
                    <button class="btn btn-primary btn-block ">Make Purchase</button>
                </form>
            </div>
        </div>
    </div>

    <!-- Optional JavaScript; choose one of the two! -->

    <!-- Option 1: Bootstrap Bundle with Popper -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p" crossorigin="anonymous"></script>

    <!-- Option 2: Separate Popper and Bootstrap JS -->
    <!--
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.10.2/dist/umd/popper.min.js" integrity="sha384-7+zCNj/IqJ95wo16oMtfsKbZ9ccEh31eOz1HGyDuCQ6wgnyJNSYdrPa03rtR1zdB" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.min.js" integrity="sha384-QJHtvGhmr9XOIpI6YVutG+2QOK9T+ZnN4kzFN1RtK3zEFEIsxhlmWl5/YESvpZ13" crossorigin="anonymous"></script>
    -->
  </body>
</html>