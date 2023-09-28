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

    <?php session_start(); ?>

    <div class="container">
        <h1>Contact List</h1>
        <!-- Add a search form to filter contacts -->
        <div class="box-search">
            <a href="contact/create"><button type="button" class="btn btn-outline-success">Add New Contact</button></a>
            <form action="search" method="GET">
                <input type="text" name="query" placeholder="Search by name, email, or phone">
                <button type="button" class="btn btn-primary">Search</button>
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
                            <a href="<?= $_SERVER['REQUEST_SCHEME'] . '://' . $_SERVER['HTTP_HOST'] ?>/contact/delete?id=<?php echo $contact['id']; ?>"><button type="button" class="btn btn-outline-danger">Delete</button></a>
                        </td>
                    </tr>
                <?php endforeach; ?>
            </tbody>
        </table>
        <!-- Add a link to the "Add New Contact" page -->
    </div>
    <!-- Add any additional content or scripts here -->
</body>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-C6RzsynM9kWDrMNeT87bh95OGNyZPhcTNXj1NW7RuBCsyN/o0jlpcV8Qyq46cDfL" crossorigin="anonymous"></script>

</html>