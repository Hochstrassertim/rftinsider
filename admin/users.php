<?php  include('../config.php'); ?>
<?php  include(ROOT_PATH . '/admin/includes/admin_functions.php'); ?>
<?php
// Get all admin users from DB
$admins = getAdminUsers();
$roles = ['Admin', 'Author'];
?>
<?php include(ROOT_PATH . '/admin/includes/head_section.php'); ?>
<title>Admin - Benutzer verwalten</title>
</head>
<body>
<!-- admin navbar -->
<?php include(ROOT_PATH . '/admin/includes/navbar.php') ?>
<div class="container content">
    <!-- Left side menu -->
    <?php include(ROOT_PATH . '/admin/includes/menu.php') ?>
    <!-- Middle form - to create and edit  -->
    <div class="action">
        <h1 class="page-title">Benutzer erstellen/bearbeiten</h1>

        <form method="post" action="<?php echo BASE_URL . 'admin/users.php'; ?>" >

            <!-- validation errors for the form -->
            <?php include(ROOT_PATH . '/includes/errors.php') ?>

            <!-- if editing user, the id is required to identify that user -->
            <?php if ($isEditingUser === true): ?>
                <input type="hidden" name="admin_id" value="<?php echo $admin_id; ?>">
            <?php endif ?>

            <input type="text" name="username" value="<?php echo $username; ?>" placeholder="Benutzername">
            <input type="email" name="email" value="<?php echo $email ?>" placeholder="Email">
            <input type="password" name="password" placeholder="Passwort">
            <input type="password" name="passwordConfirmation" placeholder="Passwort bestätigen">
            <select name="role">
                <option value="" selected disabled>Rolle auswählen</option>
                <?php foreach ($roles as $key => $role): ?>
                    <option value="<?php echo $role; ?>"><?php echo $role; ?></option>
                <?php endforeach ?>
            </select>

            <!-- if editing user, display the update button instead of create button -->
            <?php if ($isEditingUser === true): ?>
                <button type="submit" class="btn" name="update_admin">Aktualisieren</button>
            <?php else: ?>
                <button type="submit" class="btn" name="create_admin">Speichern</button>
            <?php endif ?>
        </form>
    </div>
    <!-- // Middle form - to create and edit -->

    <!-- Display records from DB-->
    <div class="table-div">
        <!-- Display notification message -->
        <?php include(ROOT_PATH . '/includes/messages.php') ?>

        <?php if (empty($admins)): ?>
            <h1>Keine Benutzer vorhanden</h1>
        <?php else: ?>
            <table class="table">
                <thead>
                <th>Nummer</th>
                <th>Benutzername, Email</th>
                <th>Rolle</th>
                <th colspan="2">Aktionen</th>
                </thead>
                <tbody>
                <?php foreach ($admins as $key => $admin): ?>
                    <tr>
                        <td><?php echo $key + 1; ?></td>
                        <td>
                            <?php echo $admin['username']; ?>, &nbsp;
                            <?php echo $admin['email']; ?>
                        </td>
                        <td><?php echo $admin['role']; ?></td>
                        <td>
                            <a class="fa fa-pencil btn edit"
                               href="users.php?edit-admin=<?php echo $admin['id'] ?>">
                            </a>
                        </td>
                        <td>
                            <a class="fa fa-trash btn delete"
                               href="users.php?delete-admin=<?php echo $admin['id'] ?>">
                            </a>
                        </td>
                    </tr>
                <?php endforeach ?>
                </tbody>
            </table>
        <?php endif ?>
    </div>
    <!-- // Display records from DB -->
</div>
</body>
</html>