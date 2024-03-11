<?php  include('../config.php'); ?>
<?php include(ROOT_PATH . '/admin/includes/admin_functions.php'); ?>
<?php include(ROOT_PATH . '/admin/includes/head_section.php'); ?>
<title>Admin - Dashboard</title>
</head>
<body>
<div class="header">
    <div class="logo">
        <a href="<?php echo BASE_URL .'admin/dashboard.php' ?>">
            <h1>RFT Insider - Admin</h1>
        </a>
    </div>
    <?php if (isset($_SESSION['user'])): ?>
        <div class="user-info">
            <span><?php echo $_SESSION['user']['username'] ?></span> &nbsp; &nbsp;
            <a href="<?php echo BASE_URL . '/logout.php'; ?>" class="logout-btn">Abmelden</a>
        </div>
    <?php endif ?>
</div>
<div class="container dashboard">
    <h1>Willkommen</h1>
    <div class="stats">
        <a href="users.php" class="first">
            <span>Registrierte Benutzer</span>
        </a>
        <a href="posts.php">
            <span>Posts</span>
        </a>
    </div>
    <br><br><br>
    <div class="buttons">
        <a href="users.php">Benutzer hinzufügen</a>
        <a href="posts.php">Post hinzufügen</a>
    </div>
</div>
</body>
</html>