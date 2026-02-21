<?php
$currentPage = basename($_SERVER['PHP_SELF'] ?? '');
$isProjectPage = $currentPage === 'project1.php';
$isAboutPage = $currentPage === 'about.php';
$isHomePage = $currentPage === 'index.php';
?>
<header class="header">
  <a class="logo" href="index.php" aria-label="Go to home page">
    <span class="logo-strong">LV</span><span class="logo-dot">.</span>
  </a>
  <nav class="menu" id="main-navigation">
    <a class="<?= $isHomePage ? 'active' : '' ?>" href="index.php">
      <span class="menu-text">Home</span>
      <span class="menu-underline" aria-hidden="true"></span>
    </a>
    <a class="<?= $isProjectPage ? 'active' : '' ?>" href="index.php#projects">
      <span class="menu-text">Projects</span>
      <span class="menu-underline" aria-hidden="true"></span>
    </a>
    <a class="<?= $isAboutPage ? 'active' : '' ?>" href="about.php">
      <span class="menu-text">About</span>
      <span class="menu-underline" aria-hidden="true"></span>
    </a>
    <a href="#contact">
      <span class="menu-text">Contact</span>
      <span class="menu-underline" aria-hidden="true"></span>
    </a>
  </nav>
  <a class="btn" href="storage/Laima_CV.pdf" target="_blank" rel="noopener noreferrer">Download CV</a>
  <button class="menu-toggle" type="button" aria-label="Open menu" aria-expanded="false" aria-controls="mobile-menu">
    <span></span>
    <span></span>
    <span></span>
  </button>
  <!-- Mobile Menu Dropdown -->
  <nav class="mobile-menu" id="mobile-menu" aria-hidden="true">
    <a class="<?= $isHomePage ? 'active' : '' ?>" href="index.php">Home</a>
    <a class="<?= $isProjectPage ? 'active' : '' ?>" href="index.php#projects">Projects</a>
    <a class="<?= $isAboutPage ? 'active' : '' ?>" href="about.php">About</a>
    <a href="#contact">Contact</a>
    <a class="btn mobile-menu-btn" href="storage/Laima_CV.pdf" target="_blank" rel="noopener noreferrer">Download CV</a>
  </nav>
</header>
