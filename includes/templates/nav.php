<?php

if (!isset($_SESSION)) {
    session_start();
}
$auth = $_SESSION['login'] ?? false;
//var_dump($_SESSION);
?>
<nav class="nav">
    <ul class="lu">
        <li><i class="fas fa-user"></i><a class="link" href="/index.php" data-text="Home">User</a></li>
        <li><i class="fas fa-home"></i><a class="link" href="/index.php" data-text="Home">Home</a></li>
        <li><i class="fas fa-newspaper"></i><a class="link" href="/news.php" data-text="stuff">Stuff</a></li>
        <li><i class="fas fa-user-alt"></i><a class="link" href="/about.php" data-text="About">About</a></li>
        <li><i class="fas fa-compact-disc"></i><a class="link" href="/discography.php" data-text="discography">discography</a>
        <li><i class="fas fa-shopping-bag"></i><a class="link" href="/merch.php" data-text="merch">Merch</a>
        <li><i class="fas fa-id-card"></i><a class="link" href="/#contact" data-text="Contact">Contact</a></li>
        <?php if ($auth) : ?>
            <li><i class="fas fa-unlock"></i><a class="link" href="/admin/indexAdmin.php" data-text="indexAdmin">Admin</a></li>
        <?php endif ?>
    </ul>
</nav>