<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Contact List</title>
    <!-- Add any CSS styles or external CSS links here -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">
    <link rel="stylesheet" href="../../public/css/globalStyles.css">
    <link rel="stylesheet" href="../../public/css/list.css">
</head>

<body>
    <!-- <?php
    session_start();
    if (isset($_SESSION['success_message'])) {
        echo '<div id="success-message">' . $_SESSION['success_message'] . '</div>';
        unset($_SESSION['success_message']);
    }
    ?> -->

    <div class="container">
        <h1>Contact List</h1>
        <!-- Add a search form to filter contacts -->
        <div class="box-search">
            <a href="<?= $_SERVER['REQUEST_SCHEME'] . '://' . $_SERVER['HTTP_HOST'] ?>/contact/create"><button type="button" class="btn btn-outline-success">Add New Contact</button></a>
            <form action="<?= $_SERVER['REQUEST_SCHEME'] . '://' . $_SERVER['HTTP_HOST'] ?>/contact/index" method="GET">
                <input type="text" name="content" placeholder="Search by phone" value="<?php echo $content = isset($_GET['content']) ? $_GET['content'] : ''; ?>">
                <button type="submit" class="btn btn-primary" name="button_search" id="">Search</button>
            </form>
        </div>
        <!-- Display the list of contacts -->
        <table class="table">
            <thead>
                <tr>
                    <th>ID</th>
                    <th>First Name</th>
                    <th>Last Name</th>
                    <th>Email</th>
                    <th>Phone</th>
                    <th>Address</th>
                    <th>Action</th>
                </tr>
            </thead>
            <tbody class="table-group-divider">
                <?php foreach ($contacts as $contact) : ?>
                    <tr>
                        <td><?php echo $contact['id']; ?></td>
                        <td><?php echo $contact['first_name']; ?></td>
                        <td><?php echo $contact['last_name']; ?></td>
                        <td><?php echo $contact['email']; ?></td>
                        <td><?php echo $contact['phone']; ?></td>
                        <td><?php echo $contact['address']; ?></td>
                        <td style="display: flex;justify-content:center; gap: 5px;">
                            <a href="<?= $_SERVER['REQUEST_SCHEME'] . '://' . $_SERVER['HTTP_HOST'] ?>/contact/view?id=<?php echo $contact['id']; ?>">
                                <button type="button" class="btn btn-outline-info">View</button></a>
                            <a href="<?= $_SERVER['REQUEST_SCHEME'] . '://' . $_SERVER['HTTP_HOST'] ?>/contact/edit?id=<?php echo $contact['id']; ?>"><button type="button" class="btn btn-outline-warning">Edit</button></a>
                            <form action="<?= $_SERVER['REQUEST_SCHEME'] . '://' . $_SERVER['HTTP_HOST'] ?>/contact/delete" method="POST">
                                <input type="hidden" name="id" value="<?php echo $contact['id'] ?>">
                                <button type="submit" class="btn btn-outline-danger">Delete</button>
                            </form>
                        </td>
                    </tr>
                <?php endforeach; ?>
            </tbody>
        </table>
    </div>
</body>

</html>
<!-- <script>
    setTimeout(function() {
        var successMessage = document.getElementById('success-message');
        if (successMessage) {
            successMessage.style.display = 'block';
            setTimeout(function() {
                successMessage.style.display = 'none';
            }, 2000); 
        }
    }, 0); 
</script> -->
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-C6RzsynM9kWDrMNeT87bh95OGNyZPhcTNXj1NW7RuBCsyN/o0jlpcV8Qyq46cDfL" crossorigin="anonymous">
</script>