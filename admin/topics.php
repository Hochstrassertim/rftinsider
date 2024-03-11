<?php  include('../config.php'); ?>
<?php  include(ROOT_PATH . '/admin/includes/admin_functions.php'); ?>
<?php include(ROOT_PATH . '/admin/includes/head_section.php'); ?>
<?php
$topic_id = 0;
$isEditingTopic = false;
$topic_name = "";
?>
<!-- Get all topics from DB -->
<?php $topics = getAllTopics();      ?>
<title>Admin - Kategorien verwalten</title>
</head>
<body>
<!-- admin navbar -->
<?php include(ROOT_PATH . '/admin/includes/navbar.php') ?>
<div class="container content">
    <!-- Left side menu -->
    <?php include(ROOT_PATH . '/admin/includes/menu.php') ?>

    <!-- Middle form - to create and edit -->
    <div class="action">
        <h1 class="page-title">Kategorien erstellen/bearbeiten</h1>
        <form method="post" action="<?php echo BASE_URL . 'admin/topics.php'; ?>" >
            <!-- validation errors for the form -->
            <?php include(ROOT_PATH . '/includes/errors.php') ?>
            <!-- if editing topic, the id is required to identify that topic -->
            <?php if ($isEditingTopic === true): ?>
                <input type="hidden" name="topic_id" value="<?php echo $topic_id; ?>">
            <?php endif ?>
            <input type="text" name="topic_name" value="<?php echo $topic_name; ?>" placeholder="Kategorie">
            <!-- if editing topic, display the update button instead of create button -->
            <?php if ($isEditingTopic === true): ?>
                <button type="submit" class="btn" name="update_topic">Aktualisieren</button>
            <?php else: ?>
                <button type="submit" class="btn" name="create_topic">Speichern</button>
            <?php endif ?>
        </form>
    </div>
    <!-- // Middle form - to create and edit -->

    <!-- Display records from DB-->
    <div class="table-div">
        <!-- Display notification message -->
        <?php include(ROOT_PATH . '/includes/messages.php') ?>
        <?php if (empty($topics)): ?>
            <h1>Keine Kategorien vorhanden</h1>
        <?php else: ?>
            <table class="table">
                <thead>
                <th>Nummer</th>
                <th>Name</th>
                <th colspan="2">Aktionen</th>
                </thead>
                <tbody>
                <?php foreach ($topics as $key => $topic): ?>
                    <tr>
                        <td><?php echo $key + 1; ?></td>
                        <td><?php echo $topic['name']; ?></td>
                        <td>
                            <a class="fa fa-pencil btn edit"
                               href="topics.php?edit-topic=<?php echo $topic['id'] ?>">
                            </a>
                        </td>
                        <td>
                            <a class="fa fa-trash btn delete"
                               href="topics.php?delete-topic=<?php echo $topic['id'] ?>">
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