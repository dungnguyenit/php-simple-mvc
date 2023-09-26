<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Contact List</title>
    <!-- Add any CSS styles or external CSS links here -->
</head>
<body>
    <h1>Contact List</h1>

    <!-- Add a search form to filter contacts -->
    <form action="search" method="GET">
        <input type="text" name="query" placeholder="Search by name, email, or phone">
        <button type="submit">Search</button>
    </form>

    <!-- Display the list of contacts -->
    <table>
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
        <tbody>
            <?php foreach ($contacts as $contact): ?>
                <tr>
                    <td><?php echo $contact['id']; ?></td>
                    <td><?php echo $contact['first_name']; ?></td>
                    <td><?php echo $contact['last_name']; ?></td>
                    <td><?php echo $contact['email']; ?></td>
                    <td><?php echo $contact['phone']; ?></td>
                    <td><?php echo $contact['address']; ?></td>
                    <td>
                        <a href="view/<?php echo $contact['id']; ?>">View</a>
                        <a href="edit/<?php echo $contact['id']; ?>">Edit</a>
                        <a href="delete/<?php echo $contact['id']; ?>">Delete</a>
                    </td>
                </tr>
            <?php endforeach; ?>
        </tbody>
    </table>

    <!-- Add a link to the "Add New Contact" page -->
    <a href="add">Add New Contact</a>

    <!-- Add any additional content or scripts here -->
</body>
</html>
