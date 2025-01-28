<?php  
include('inc/header.php');
include('inc/navbar.php');  

?>

    <h1 class="text-center col-12 bg-primary py-3 text-white my-5" style="width:80%;margin:auto;">ALL Users</h1>
    <div class="row">
        <div class="col-sm-12">
            <table class="table" style="border:1px solid black;width:50%;margin:auto">
                <thead>
                    <tr>
                    <th scope="col">#</th>
                    <th scope="col">Name</th>
                    <th scope="col">Email</th>
                    <th scope="col">Phone</th>

                    <th scope="col">Edit</th>
                    <th scope="col">Delete</th>
                    </tr>
                </thead>
                <tbody>

                     <?php  include('classes/users.php');
                            $i=1;
                            foreach(user::getAllUser() as $row):
                     
                     ?>
                    <tr>
                        <th scope="row"><?php echo $i++; ?></th>
                        <td><?php echo $row->name;?></td>
                        <td><?php echo $row->email;?></td>
                        <td><?php echo $row->phone;?></td>
                        <td>
                            <a class="btn btn-info" href="edit.php">Edit</a>
                        </td>
                        <td>
                            <a class="btn btn-danger" href="delete.php">Delete</a>
                        </td>
                    </tr>
                          <?php   endforeach;    ?>
                </tbody>
            </table>
        </div>
    </div>

<?php  include('inc/footer.php'); ?>

 
  