<?php include "includes/header.php"; ?>
    <?php require_once("process.php"); ?>

    <div class="container mt-4 mb-4 p-2 shadow bg-white">
        <h1>Add, Edit, Update and Delete <a class="btn btn-primary" href="index.php">Back to Main Menu</a></h1>
        
        <form action="process.php" method="post">
            <div class="form-row justify-content-center">
            <input type="hidden" value="<?php echo $id; ?>" name=id>
            <div class="col-auto">
            <input type="text" name="firstname" value="<?php echo $name; ?>" placeholder="First Name" id="firstname" required autofocus class="form-control">
            </div>
            <div class="col-auto">
            <input type="text" name="lastname" placeholder="Last Name" value="<?php echo $surname; ?>" id="lastname" required class="form-control">
            </div>
            <?php
            if($update==true){ ?>
                <div class="col-auto">
                    <button class="btn btn-outline-info" name="save">Save</button>
                </div>
            <?php }else{ ?>
                <div class="col-auto">
                <button class="btn btn-outline-info" name="update">Update</button>
                </div>
            <?php } ?>
            </div>
        </form>
    </div>
    <div class="container dataOnTheTable">
        <?php if (isset($_SESSION['msg'])) : ?>
            <div class="<?= $_SESSION['alert']; ?>">
                <?= $_SESSION['msg'];
                unset($_SESSION['msg']); ?>
            </div>
        <?php endif; ?>


        <table class="table table-dark table-striped">
            <thead class="text-light">
            <tr>
                <th class="text-secondary">ID</th>
                <th class="text-secondary">Name</th>
                <th class="text-secondary">Surname</th>
                <th class="text-secondary" colspan="2" class="text center">Action</th>
            </tr>
            </thead>
            <tbody>
                <?php
                $result=$connection->query("SELECT * FROM tdata") or die($connection->error);
                while($row=$result->fetch_assoc()):
                $id=$row['id'];
                $name=$row['firstname'];
                $surname=$row['lastname']; ?>
                <tr class="text-danger">
                    <td><?php echo $id; ?></td>
                    <td><?php echo $name; ?></td>
                    <td><?php echo $surname; ?></td>
                    <td style="width: 25%">
                        <a href="create.php?edit=<?php echo $id; ?>" class="btn btn-outline-warning" name="edit" value="">EDIT</a>
                        <a href="process.php?delete=<?php echo $id; ?>" class="btn btn-outline-danger" name="delete" value="">DELETE</a>
                    </td>
                </tr>
                <?php endwhile; ?>
            </tbody>
        </table>

    </div>
    <!-- Optional JavaScript -->
    <!-- jQuery first, then Popper.js, then Bootstrap JS -->
    <script src="https://code.jquery.com/jquery-3.4.1.slim.min.js" integrity="sha384-J6qa4849blE2+poT4WnyKhv5vZF5SrPo0iEjwBvKU7imGFAV0wwj1yYfoRSJoZ+n" crossorigin="anonymous"></script>
    <script src="javascript/javascript.js"></script>

<?php include "includes/footer.php"; ?>

