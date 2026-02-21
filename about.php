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
    <title>About - Laima Portfolio</title>
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
    <link rel="stylesheet" href="css/about.css" />
    
    <!-- Matomo -->
    <script>
      var _paq = window._paq = window._paq || [];
      /* tracker methods like "setCustomDimension" should be called before "trackPageView" */
      _paq.push(['trackPageView']);
      _paq.push(['enableLinkTracking']);
      (function() {
        var u="//lvainina.eu/analytics/";
        _paq.push(['setTrackerUrl', u+'matomo.php']);
        _paq.push(['setSiteId', '1']);
        var d=document, g=d.createElement('script'), s=d.getElementsByTagName('script')[0];
        g.async=true; g.src=u+'matomo.js'; s.parentNode.insertBefore(g,s);
      })();
    </script>
    <!-- End Matomo Code -->
  </head>
  <body>
    <div class="page">
      <div class="bg-grid" aria-hidden="true"></div>

      <?php include __DIR__ . '/includes/header.php'; ?>

      <main class="content about-content">
        <!-- About Header Section -->
        <section class="about-header">
          <div class="about-header-container">
            <span class="about-label">About me</span>
            <h1 class="about-title">Designer and visual storyteller</h1>
            <p class="about-description">
              I craft intuitive digital experiences grounded in research, shape narratives through interfaces, and stay curious about how people feel, move, and decide online.
            </p>
          </div>
        </section>

        <!-- Work History Section -->
        <section class="work-history">
          <div class="work-history-container">
            <div class="section-title">
              <span class="title-dark">Work</span>
              <span class="title-muted">History</span>
            </div>
            <div class="work-cards">
              <!-- If Insurance -->
              <article class="work-card">
                <div class="work-card-content">
                  <img class="company-logo" src="Images/logo_if.png" alt="If Insurance logo" />
                  <div class="work-details">
                    <div class="company-info">
                      <h3 class="company-name">If Insurance</h3>
                      <p class="job-title">UX Designer</p>
                    </div>
                    <div class="job-description">
                      <span class="job-duration">Sep 2021 - Nov 2025</span>
                      <p class="job-responsibilities">
                        Designed B2B tools for partner and claims management across Nordic markets. Owned end-to-end UX process from research through usability testing.
                      </p>
                    </div>
                    <div class="job-tags">
                      <span class="tag">Fintech</span>
                      <span class="tag">Full Time</span>
                      <span class="tag">Riga, Latvia</span>
                    </div>
                  </div>
                </div>
              </article>

              <!-- Dynatrace -->
              <article class="work-card">
                <div class="work-card-content">
                  <img class="company-logo" src="Images/logo_dynatrace.png" alt="Dynatrace logo" />
                  <div class="work-details">
                    <div class="company-info">
                      <h3 class="company-name">Dynatrace</h3>
                      <p class="job-title">UI Designer &amp; Community Moderator</p>
                    </div>
                    <div class="job-description">
                      <span class="job-duration">Nov 2019 - Aug 2021</span>
                      <p class="job-responsibilities">
                        Designed interfaces for enterprise Community forum.
                      </p>
                    </div>
                    <div class="job-tags">
                      <span class="tag">Enterprise Software</span>
                      <span class="tag">Full Time</span>
                      <span class="tag">Gdansk, Poland</span>
                    </div>
                  </div>
                </div>
              </article>
            </div>
          </div>
        </section>

        <!-- Education Section -->
        <section class="education">
          <div class="education-container">
            <div class="section-title">
              <span class="title-dark">Education &amp;</span>
              <span class="title-muted">Courses</span>
            </div>
            <div class="education-cards">
              <!-- Designlab -->
              <article class="education-card">
                <div class="education-card-header">
                  <img class="education-logo" src="Images/logo_designlab.png" alt="Designlab logo" />
                  <div class="education-info">
                    <h3 class="institution-name">Designlab</h3>
                    <p class="degree">Data - driven Design course</p>
                  </div>
                </div>
                <div class="education-details">
                  <span class="education-duration">May 2025 - July 2025</span>
                  <p class="education-description">
                    Learned to ground design decisions in user research, analytics, and measurable outcomes rather than assumptions.
                  </p>
                </div>
              </article>

              <!-- Latvian Academy of Culture -->
              <article class="education-card">
                <div class="education-card-header">
                  <img class="education-logo education-logo-rounded" src="Images/logo_lka.png" alt="Latvian Academy of Culture logo" />
                  <div class="education-info">
                    <h3 class="institution-name">Latvian Academy of Culture</h3>
                    <p class="degree">Bachelor of Arts (B.A.)</p>
                  </div>
                </div>
                <div class="education-details">
                  <span class="education-duration">Sep 2010 - Jun 2014</span>
                  <p class="education-description">
                    Studied audiovisual theory and cinema criticism, developing analytical skills for interpreting visual narratives and audience perception.
                  </p>
                </div>
              </article>
            </div>
          </div>
        </section>

        <?php include __DIR__ . '/includes/footer.php'; ?>
      </main>
    </div>
    <script src="https://cdn.jsdelivr.net/npm/gsap@3/dist/gsap.min.js"></script>
    <script src="js/header-nav.js"></script>
    <script src="js/contact-form.js"></script>
    <script src="js/main.js"></script>
  </body>
</html>
