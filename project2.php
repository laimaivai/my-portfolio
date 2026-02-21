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
    <title>Project 2 - Photo Inspection Tool</title>
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
    <link rel="stylesheet" href="https://unpkg.com/aos@2.3.4/dist/aos.css" />
    <link rel="stylesheet" href="css/style.css" />
  </head>
  <body>
    <div class="page project-page">
      <div class="bg-grid" aria-hidden="true"></div>
      <?php include __DIR__ . '/includes/header.php'; ?>

      <main class="project-main">
        <section class="hero-head" data-aos="fade-up" data-aos-duration="600">
          <h1>Improving vehicle inspection self-service tool</h1>
          <p>
            Photo Inspection (PHIN) is a digital tool that enables customers to submit vehicle damage
            photos, which automotive workshops then assess remotely. This approach streamlines the
            claims process while supporting more sustainable business practices.
          </p>
          <div class="hero-meta-row">
            <article>
              <h3>Year</h3>
              <p>2025</p>
            </article>
            <article>
              <h3>Duration</h3>
              <p>8 months</p>
            </article>
            <article>
              <h3>Company</h3>
              <p>If Insurance</p>
            </article>
            <article>
              <h3>Role</h3>
              <p>Product Designer</p>
            </article>
          </div>
        </section>

        <section class="hero-visual-wrap" data-aos="fade-up" data-aos-delay="120" data-aos-duration="650">
          <div class="hero-visual-bg">
            <img src="Images/project_inspection.png" alt="Photo Inspection Tool mobile app screens" />
          </div>
        </section>

        <section class="coming-soon-section" data-aos="fade-up" data-aos-duration="600">
          <div class="coming-soon-card">
            <div class="coming-soon-icon">
              <!-- Glow Effect -->
              <div class="icon-glow"></div>
              <!-- Rotating Clock -->
              <div class="icon-clock">
                <svg width="64" height="64" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">
                  <circle cx="12" cy="12" r="9" stroke="#2b3a52" stroke-width="1.5"/>
                  <polyline points="12 6 12 12 16 14" stroke="#2b3a52" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round"/>
                </svg>
              </div>
              <!-- Sparkle Star -->
              <div class="icon-sparkle">
                <div class="icon-sparkle-inner">
                  <svg width="24" height="24" viewBox="0 0 24 24" fill="#DE3343" stroke="#DE3343" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" xmlns="http://www.w3.org/2000/svg">
                    <path d="M9.937 15.5A2 2 0 0 0 8.5 14.063l-6.135-1.582a.5.5 0 0 1 0-.962L8.5 9.936A2 2 0 0 0 9.937 8.5l1.582-6.135a.5.5 0 0 1 .963 0L14.063 8.5A2 2 0 0 0 15.5 9.937l6.135 1.581a.5.5 0 0 1 0 .964L15.5 14.063a2 2 0 0 0-1.437 1.437l-1.582 6.135a.5.5 0 0 1-.963 0z"/>
                    <path d="M20 3v4"/>
                    <path d="M22 5h-4"/>
                    <path d="M4 17v2"/>
                    <path d="M5 18H3"/>
                  </svg>
                </div>
              </div>
            </div>
            <h2 class="coming-soon-title">Full case study coming soon</h2>
            <p class="coming-soon-desc">
              I'm currently documenting the complete design process, user research insights, and
              implementation details for this project. Check back soon to explore the full story.
            </p>
          </div>
        </section>

        <nav class="project-switch project-switch--prev-only" aria-label="Project navigation">
          <a href="project1.php" class="project-nav-btn project-nav-btn--prev">
            <svg class="project-nav-arrow" width="20" height="20" viewBox="0 0 20 20" fill="none" xmlns="http://www.w3.org/2000/svg">
              <defs>
                <linearGradient id="arrow-grad-prev" x1="100%" y1="0%" x2="0%" y2="100%">
                  <stop offset="0%" stop-color="#2B3A52"/>
                  <stop offset="100%" stop-color="#DE3343"/>
                </linearGradient>
              </defs>
              <path d="M15.833 10H4.167M10 4.167L4.167 10 10 15.833" stroke="url(#arrow-grad-prev)" stroke-width="1.67" stroke-linecap="round" stroke-linejoin="round"/>
            </svg>
            <div class="project-nav-text">
              <span class="project-nav-label">Previous</span>
              <span class="project-nav-name">Partner Management System</span>
            </div>
          </a>
        </nav>

        <?php include __DIR__ . '/includes/footer.php'; ?>
      </main>
    </div>
    <script src="https://unpkg.com/aos@2.3.4/dist/aos.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/animejs/3.2.2/anime.min.js"></script>
    <script src="js/header-nav.js"></script>
    <script src="js/aos.js"></script>
    <script src="js/contact-form.js"></script>
    <script src="js/main.js"></script>
    <script>
      // Sparkle Star Animation with Anime.js
      document.addEventListener('DOMContentLoaded', function() {
        const sparkle = document.querySelector('.icon-sparkle');
        const sparkleInner = document.querySelector('.icon-sparkle-inner');
        
        if (sparkle && sparkleInner) {
          // Smooth continuous rotation on outer element
          anime({
            targets: sparkle,
            rotate: 360,
            easing: 'linear',
            duration: 10000,
            loop: true
          });
          
          // Gentle breathing pulse on inner element
          anime({
            targets: sparkleInner,
            scale: [1, 1.15, 1],
            easing: 'easeInOutSine',
            duration: 2000,
            loop: true
          });
        }
      });
    </script>
  </body>
</html>
