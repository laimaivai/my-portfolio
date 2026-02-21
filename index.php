<?php
if (session_status() !== PHP_SESSION_ACTIVE) {
  session_start();
}
?>

<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>Laima Portfolio</title>
    <link rel="apple-touch-icon" sizes="180x180" href="Images/favicon_io/apple-touch-icon.png">
    <link rel="icon" type="image/png" sizes="32x32" href="Images/favicon_io/favicon-32x32.png">
    <link rel="icon" type="image/png" sizes="16x16" href="Images/favicon_io/favicon-16x16.png">
    <link rel="manifest" href="Images/favicon_io/site.webmanifest">
    <link rel="preconnect" href="https://fonts.googleapis.com" />
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin />
    <link
      href="https://fonts.googleapis.com/css2?family=Bubblegum+Sans&family=Montserrat:wght@400;600;700&family=MuseoModerno:wght@700&family=Poppins:wght@400;500;600&display=swap"
      rel="stylesheet"
    />
    <link rel="stylesheet" href="css/style.css" />
  </head>
  <body>
    <div class="page">
      <div class="bg-grid" aria-hidden="true"></div>

      <?php include __DIR__ . '/includes/header.php'; ?>

      <main class="content">
        <section class="hero" id="about">
          <svg class="hero-vector" viewBox="0 0 445 309" aria-hidden="true">
            <path
              id="hero-connector-path"
              d="M282 306 C262 314 244 306 232 286 C214 254 224 198 208 162 C193 129 160 137 126 160 C106 173 87 181 70 176 C52 171 45 154 45 132 C45 108 50 82 54 58"
            />
            <path id="hero-connector-arrow" d="M46 60 L54 52 L62 60" />
          </svg>

          <div class="hero-text">
            <div class="hero-name">
              <div class="hi">Hi! I Am</div>
              <div class="name">Laima Vaini&#x146;a.</div>
            </div>
            <div class="hero-exp">
              <div class="years">05</div>
              <div class="label">Years Experience</div>
            </div>
            <div class="social-icons" aria-label="Social media">
              <a href="https://www.linkedin.com/in/laima-vainina/" target="_blank" rel="noopener noreferrer" aria-label="LinkedIn"><img class="social-icon" src="Images/icons/linkedin.svg" alt="LinkedIn" width="24" height="24" /></a>
              <a href="https://github.com/laimaivai" target="_blank" rel="noopener noreferrer" aria-label="GitHub"><img class="social-icon" src="Images/icons/github.svg" alt="GitHub" width="24" height="24" /></a>
            </div>
          </div>

          <div class="hero-image">
            <svg class="hero-photo-mask" width="386.01" height="390.03" viewBox="0 0 386.01 390.03" aria-hidden="true">
              <defs>
                <clipPath id="hero-clip" clipPathUnits="userSpaceOnUse">
                  <rect x="0" y="0" width="386.01" height="140" />
                  <circle cx="186.5" cy="250.5" r="134.03" />
                </clipPath>
              </defs>
              <image href="Images/Me.svg" width="386.01" height="390.03" clip-path="url(#hero-clip)" preserveAspectRatio="xMidYMid slice" />
            </svg>
            <svg class="hero-ring" width="268.06" height="268.06" viewBox="0 0 268.06 268.06" aria-hidden="true">
              <defs>
                <linearGradient id="ring-gradient" x1="0" y1="1" x2="0" y2="0">
                  <stop offset="0%" stop-color="#F20C3C" />
                  <stop offset="60%" stop-color="#FAD4DA" />
                  <stop offset="100%" stop-color="#FFFFFF" />
                </linearGradient>
              </defs>
              <circle cx="134.03" cy="134.03" r="133.03" fill="none" stroke="url(#ring-gradient)" stroke-width="2" />
            </svg>
          </div>

          <div class="hero-intro">
            <p class="intro-text">I turn user insights into<br />intuitive interfaces</p>
            <div class="intro-tools">
              <div class="tool-card">
                <img src="Images/Figma.svg" alt="Figma" />
              </div>
              <div class="intro-bubble">
                <img class="intro-arrow" src="https://www.figma.com/api/mcp/asset/3fd316da-6036-4c34-aadd-966d8477d7cb" alt="" />
                <div class="pill">
                  <img
                    class="pill-avatar"
                    src="https://www.figma.com/api/mcp/asset/1d4fe3bc-ae05-4081-9f74-41f9fe2d70c0"
                    alt=""
                  />
                  <span>Laima</span>
                </div>
              </div>
            </div>
            <div class="role">Product Designer.</div>
          </div>
        </section>

        <section class="projects" id="projects">
          <div class="section-header">
            <h2>Projects</h2>
            <p>Check out what I've been working on lately</p>
          </div>
          <div class="project-grid">
            <a class="project-card project-card-link" href="project1.php">
              <div class="project-image">
                <img src="Images/partners.svg" alt="Partner Management" />
              </div>
              <div class="project-body">
                <h3>
                  <span class="title-strong">If Insurance</span>
                  <span> - </span>
                  <span class="title-muted">Partner Management</span>
                </h3>
                <p>
                  A centralized platform that replaced fragmented Excel processes with a unified
                  digital workflow, enabling Nordic teams to find, compare, and maintain partners
                  across four countries.
                </p>
              </div>
              <div class="project-tags">
                <span>Process optimization</span>
                <span>B2B Platform</span>
                <span>Property claims</span>
              </div>
            </a>

            <a href="project2.php" class="project-card project-card-link">
              <div class="project-image">
                <img src="Images/inspection.svg" alt="Photo inspection" />
              </div>
              <div class="project-body">
                <h3>
                  <span class="title-strong">If Insurance</span>
                  <span> - </span>
                  <span class="title-muted">Photo Inspection Tool</span>
                </h3>
                <p>
                  A digital self-service tool enabling customers to submit vehicle damage photos for
                  remote assessment, streamlining claims while reducing the need for physical
                  inspections.
                </p>
              </div>
              <div class="project-tags">
                <span>UX research</span>
                <span>Mobile</span>
                <span>Motor claims</span>
              </div>
            </a>
          </div>
        </section>

        <?php include __DIR__ . '/includes/footer.php'; ?>
      </main>
    </div>
    <script src="https://cdn.jsdelivr.net/npm/gsap@3/dist/gsap.min.js"></script>
    <script src="js/header-nav.js"></script>
    <script src="js/name-gradient.js"></script>
    <script src="js/hero-line.js"></script>
    <script src="js/contact-form.js"></script>
    <script src="js/main.js"></script>
  </body>
</html>
