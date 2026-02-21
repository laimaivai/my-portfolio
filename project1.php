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
    <title>Project 1 - Partner Management</title>
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
          <h1>Unifying Nordic partner management</h1>
          <p>
            Helping Nordic insurance teams achieve unified partner management by replacing
            fragmented Excel processes with intelligent digital platform.
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
            <img src="Images/partner_details.jpg" alt="Partner management platform" />
          </div>
        </section>

        <section class="journey-layout" id="projects">
          <aside class="toc">
            <a class="toc-link" href="#overview">
              <span class="toc-number">01</span>
              <span class="toc-title">Overview</span>
            </a>
            <a class="toc-link" href="#problem">
              <span class="toc-number">02</span>
              <span class="toc-title">The Problem</span>
            </a>
            <a class="toc-link" href="#research">
              <span class="toc-number">03</span>
              <span class="toc-title">User research</span>
            </a>
            <a class="toc-link" href="#process">
              <span class="toc-number">04</span>
              <span class="toc-title">Design process</span>
            </a>
            <a class="toc-link" href="#solution">
              <span class="toc-number">05</span>
              <span class="toc-title">Solution</span>
            </a>
            <a class="toc-link" href="#reflection">
              <span class="toc-number">06</span>
              <span class="toc-title">Reflection</span>
            </a>
          </aside>

          <div class="content-column">
            <section class="story-section" id="overview" data-aos="fade-up" data-aos-duration="550">
              <header>
                <span>Overview</span>
                <h2>Project details</h2>
              </header>
              <p>
                If Insurance's property partnership teams across Sweden, Norway, Denmark, and
                Finland each managed contractors using their own Excel sheets and legacy systems.
              </p>
              <p>
                I designed a centralized partner management platform that gave teams a consistent
                way to find, compare, and maintain partners across all four markets.
              </p>
              <article class="impact-card" data-impact-card data-aos="fade-up" data-aos-delay="120" data-aos-duration="600">
                <h4 class="impact-seq" style="--delay: 0s">Project Impact</h4>
                <div class="impact-line">
                  <strong class="impact-seq" style="--delay: 0.2s">
                    <span class="impact-count" data-target="80">0</span>%
                  </strong>
                  <p class="impact-seq" style="--delay: 0.3s">
                    <span>User Satisfaction</span>
                    <b>•</b>
                    <em>Achieved within 6 months</em>
                  </p>
                </div>
                <div class="impact-track impact-seq" style="--delay: 0.5s"><span class="impact-fill"></span></div>
                <p class="impact-seq" style="--delay: 0.6s">
                  Deployed across 4 Nordic countries, providing leadership with transparent partner
                  performance management for strategic decision-making.
                </p>
              </article>
            </section>

            <hr class="divider" />

            <section class="story-section" id="problem" data-aos="fade-up" data-aos-duration="550">
              <header>
                <span>The problem</span>
                <h2>Four countries, zero shared systems</h2>
              </header>
              <p>
                Imagine you're a claims manager at a Nordic insurance company. A storm has damaged
                dozens of homes, and you need to quickly assign reliable contractors for urgent
                repairs. Instead of a single source of truth, each country maintains its own
                fragmented Excel sheets and legacy systems.
              </p>
              <div class="problem-cards">
                <article>
                  <img
                    src="Images/managers.svg"
                    alt="Partnership managers"
                  />
                  <h3>Partnership Managers</h3>
                  <p>
                    Needed to capture and access partner data regardless of how simple or complex a
                    partner's organization was.
                  </p>
                </article>
                <article>
                  <img
                    src="Images/leads.svg"
                    alt="Country leads"
                  />
                  <h3>Country Leads</h3>
                  <p>
                    Needed to manage partners operating under different business models,
                    certifications, and legal frameworks.
                  </p>
                </article>
              </div>
            </section>

            <hr class="divider" />

            <section class="story-section" id="research" data-aos="fade-up" data-aos-duration="550">
              <header>
                <span>User research</span>
                <h2>Uncovering the root causes</h2>
              </header>
              <img src="Images/roots.png"
                alt="User research overview"
              />
              <p>
                We started with direct user research where we interviewed teams and observed their
                current processes to identify pain points and understand country-specific
                challenges.
              </p>
              <h3 class="mini-head">Key findings</h3>
              <p>The fragmentation reflected structural complexity that no simple database could solve.</p>
              <div class="findings">
                <article>
                  <span>Finding 01</span>
                  <h4>Complex partner structures</h4>
                  <p>
                    Partners operated with 3-level hierarchies (company → region → office) that no
                    existing tool could represent.
                  </p>
                </article>
                <article>
                  <span>Finding 02</span>
                  <h4>Country-specific variations</h4>
                  <p>
                    Each country worked with different trades, certifications, and legal frameworks.
                  </p>
                </article>
                <article>
                  <span>Finding 03</span>
                  <h4>No shared data quality standards</h4>
                  <p>
                    Without consistent data entry practices, the same partner could be described
                    completely differently in two countries.
                  </p>
                </article>
              </div>
            </section>

            <hr class="divider" />

            <section class="story-section" id="process" data-aos="fade-up" data-aos-duration="550">
              <header>
                <span>Design process</span>
                <h2>From findings to a flexible system</h2>
              </header>
              <p>
                The research made one thing clear: partner organizations varied in structure and
                complexity. The system needed to accommodate everything from single-office
                contractors to complex multi-level enterprises.
              </p>
              <article class="challenge-card">
                <h3>Design challenge</h3>
                <p>
                  How might we create a flexible partner management system that handles diverse
                  organizational structures while ensuring data integrity and efficient partner
                  discovery?
                </p>
              </article>

              <h3 class="mini-head">Information architecture</h3>
              <p>
                I designed a flexible hierarchical model supporting partners at three levels: company, region, and office. The key design decision was making the middle layer optional — partners without regional complexity skip it entirely, while multi-level enterprises get the full hierarchy.
              </p>
              <img class="architecture-image" src="Images/architecture.svg" alt="Information architecture" />

              <h3 class="mini-head">User testing &amp; iteration</h3>
              <p>
                I conducted three rounds of usability testing with users across Nordic countries.
              </p>
              <div class="rounds-block" data-rounds>
                <div class="tabs" role="tablist" aria-label="User testing rounds">
                  <button type="button" class="active" role="tab" aria-selected="true" data-round="1">Round 1</button>
                  <button type="button" role="tab" aria-selected="false" data-round="2">Round 2</button>
                  <button type="button" role="tab" aria-selected="false" data-round="3">Round 3</button>
                </div>

                <div class="round-content" data-round-content>
                  <article class="test-note">
                    <h4 data-round-heading>Improved navigation structure</h4>
                    <p data-round-description>
                      Users struggled to understand the relationship between partners and their
                      sub-units. Added section headlines and restructured the hierarchy.
                    </p>
                  </article>
                  <img
                    class="wide-image"
                    style="border-radius: 0; box-shadow: none; background: transparent;"
                    data-round-image
                    src="Images/before_after1.png"
                    alt="Round 1 usability testing results"
                  />
                  <blockquote>
                    <span data-round-quote>“I have to open each one just to figure out which belongs to which.”</span>
                    <cite data-round-author>— Finnish partnership manager</cite>
                  </blockquote>
                </div>
              </div>
            </section>

            <hr class="divider" />

            <section class="story-section" id="solution" data-aos="fade-up" data-aos-duration="550">
              <header>
                <span>Solution</span>
                <h2>Unified partner management</h2>
              </header>
              <img src="Images/final_result.png" alt="Final result" />
            </section>

            <hr class="divider" />

            <section class="story-section" id="reflection" data-aos="fade-up" data-aos-duration="550">
              <header>
                <span>Reflection</span>
                <h2>What I learned</h2>
              </header>
              <div class="learning-cards">
                <article>
                  <h3>Designing for complexity means designing for flexibility</h3>
                  <p>
                    Instead of forcing every partner into one rigid model, embracing adaptable
                    structure makes systems resilient.
                  </p>
                </article>
                <article>
                  <h3>Shared models reduce cross-country friction</h3>
                  <p>
                    A common information model and language creates alignment between local teams
                    and leadership.
                  </p>
                </article>
              </div>
            </section>

            <nav class="project-switch project-switch--next-only" aria-label="Project navigation">
              <a href="project2.php" class="project-nav-btn project-nav-btn--next">
                <div class="project-nav-text">
                  <span class="project-nav-label">Next</span>
                  <span class="project-nav-name">Photo Inspection Tool</span>
                </div>
                <svg class="project-nav-arrow" width="20" height="20" viewBox="0 0 20 20" fill="none" xmlns="http://www.w3.org/2000/svg">
                  <defs>
                    <linearGradient id="arrow-grad-next" x1="0%" y1="0%" x2="100%" y2="100%">
                      <stop offset="0%" stop-color="#2B3A52"/>
                      <stop offset="100%" stop-color="#DE3343"/>
                    </linearGradient>
                  </defs>
                  <path d="M4.167 10h11.666M10 4.167L15.833 10 10 15.833" stroke="url(#arrow-grad-next)" stroke-width="1.67" stroke-linecap="round" stroke-linejoin="round"/>
                </svg>
              </a>
            </nav>
          </div>
        </section>

        <?php include __DIR__ . '/includes/footer.php'; ?>
      </main>
    </div>
    <script src="https://unpkg.com/aos@2.3.4/dist/aos.js"></script>
    <script src="js/header-nav.js"></script>
    <script src="js/aos.js"></script>
    <script src="js/toc.js"></script>
    <script src="js/impact-card.js"></script>
    <script src="js/rounds.js"></script>
    <script src="js/contact-form.js"></script>
    <script src="js/main.js"></script>
  </body>
</html>
