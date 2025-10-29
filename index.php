<?php
/**
 * PortfolioX — Kuldeep Joshi
 * Single-file PHP portfolio generated from CV.
 * Note: GitHub Pages cannot run PHP; use a PHP-capable host (Render, etc.).
 */
 
$profile = [
  "name" => "Kuldeep Joshi",
  "title" => "Engineering Manager (MBA, MSc CS)",
  "summary" => "Strategic Engineering Leader with 10+ years delivering scalable, high‑performance software across startups and global organisations. Built scalable systems in Python, Java and PHP; specialise in designing & optimising cloud systems on GCP, Kubernetes and microservices with a focus on reliability and clean architecture. Passionate about mentoring and people development (won an external mentorship award). Executive MBA from the London School of Economics (LSE) and MSc in Computing Science. Experienced in diverse, multicultural environments.",
  "location" => "Dublin, Ireland",
  "email" => "Kuldeep.joshi197@gmail.com",
  "links" => [
    ["label" => "LinkedIn", "url" => "https://www.linkedin.com/in/kuldeep-joshi/"],
    ["label" => "GitHub", "url" => "https://github.com/thekuldeepjoshi"],
  ]
];

$experience = [
  [
    "role" => "Engineering Manager (Ops)",
    "company" => "Fiserv (Clover)",
    "location" => "Nenagh, Ireland",
    "bullets" => [
      "Led design, development, and support of microservices and web APIs in Python and Java integrating with Clover’s payment platform and financial services.",
      "Managed a team of 8 engineers in Developer Relations handling customer escalations, API troubleshooting, and platform behaviour analysis.",
      "Drove Monthly and Quarterly Business Reviews with senior leadership across Engineering and Operations.",
      "Deployed services on GCP for scalability and high availability; optimised cloud resource usage for cost/performance.",
      "Optimised MySQL & MongoDB for high throughput, low latency on financial/payment data workloads.",
      "Built Python services to automate incident response workflows, improving response time and uptime for financial applications.",
      "Mentored engineers on secure coding, API design, and cloud deployment best practices."
    ],
    "tech" => "Python, PHP, Java, React, JavaScript, Google Cloud, Kubernetes, CI/CD, SQL, MongoDB"
  ],
  [
    "role" => "Senior Software Engineer",
    "company" => "Fiserv",
    "bullets" => [
      "Served as SME for Clover APIs, SDKs, and SaaS platforms; provided technical guidance and resolved customer‑reported issues.",
      "Improved SLA response time by 30% by building Python automation tooling for issue resolution.",
      "Collaborated cross‑functionally to ensure product reliability and rapid issue resolution for enterprise clients."
    ]
  ],
  [
    "role" => "Engineering Mentor (Volunteer)",
    "company" => "Future in Tech",
    "location" => "Dublin, Ireland",
    "bullets" => [
      "Mentored a small team on Python and Java projects within the Software Delivery zone.",
      "Guided team to meet project challenges and win the final competition.",
      "Provided hands‑on support with API integrations and delivery best practices.",
      "Received an award for best mentorship in the software delivery project."
    ]
  ],
  [
    "role" => "Software Engineer",
    "company" => "Nolan Transport",
    "location" => "New Ross, Ireland",
    "bullets" => [
      "Developed Transport Planning System, Customer Portal, and Fleet Management apps using PHP/LAMP.",
      "Built 6+ automated microservices improving job processing efficiency by ~20%.",
      "Developed Android apps integrating Google APIs and backend systems; published on Google Play.",
      "Deployed and maintained services on Apache with CI/CD."
    ]
  ],
  [
    "role" => "Software Engineer",
    "company" => "Stay Planet",
    "location" => "Dublin, Ireland",
    "bullets" => [
      "Developed and maintained web app using PHP, Laravel, HTML, CSS.",
      "Implemented OOP concepts and maintained MySQL database.",
      "Took study break for MSc thereafter."
    ]
  ],
];

$skills = [
  "Leadership" => [
    "Engineering Team Leadership", "Stakeholder Management", "Agile", "Hiring & Performance Management",
    "Mentoring", "Strategic Planning (QBR/MBR)", "Code Review"
  ],
  "Core Stack & Architecture" => [
    "Python", "PHP", "Laravel", "Java", "RESTful APIs", "SQL", "React", "JavaScript"
  ],
  "Cloud & DevOps" => [
    "GCP", "AWS", "Kubernetes (K8s)", "Docker", "CI/CD (Jenkins)", "Observability (Kibana, Grafana)", "Postman"
  ],
  "Compliance & Domains" => [
    "FinTech (Payment Systems)", "B2B/B2C SaaS", "Microservices", "Logistics Tech", "Android", "Security & Compliance (PCI DSS, GDPR)"
  ],
  "Ops & Support" => [
    "Incident Management (PagerDuty)", "Customer Escalations (L3)", "API Troubleshooting", "Log Analysis"
  ]
];

$education = [
  ["degree" => "MBA Executive", "school" => "London School of Economics (LSE)"],
  ["degree" => "MSc in Computing", "school" => "Griffith College Dublin, Ireland"],
  ["degree" => "BSc in Computer Application", "school" => "KSKV Kachchh University, India"],
];

$certifications = [
  ["name" => "MongoDB (Credly)", "url" => "https://www.credly.com/badges/0a1bf230-a5f6-43e3-aaf1-41cfde83aa53/linked_in?t=sw91cs"],
  ["name" => "Google Cloud Fundamentals (Coursera)", "url" => "https://www.coursera.org/learn/gcp-fundamentals"],
  ["name" => "Python Specialization (Coursera)", "url" => "https://www.coursera.org/specializations/python"],
  ["name" => "React.js (LinkedIn Learning)", "url" => "https://www.linkedin.com/learning/learning-react-js-5"],
  ["name" => "Designing RESTful APIs (LinkedIn Learning)", "url" => "http://www.linkedin.com/learning/designing-restful-apis"],
  ["name" => "NPM (LinkedIn Learning)", "url" => "http://www.linkedin.com/learning/learning-npm-the-node-package-manager-3"]
];
?>
<!doctype html>
<html lang="en">
<head>
  <meta charset="utf-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1" />
  <title><?= htmlspecialchars($profile["name"]) ?> — Portfolio</title>
  <meta name="description" content="Portfolio of <?= htmlspecialchars($profile["name"]) ?> — <?= htmlspecialchars($profile["title"]) ?> in <?= htmlspecialchars($profile["location"]) ?>." />
  <style>
    :root {
      --bg: #0b0d10;
      --card: #12161b;
      --muted: #9aa4af;
      --text: #e8edf2;
      --accent: #6aa6ff;
      --pill: #1e2530;
      --border: #22303d;
    }
    * { box-sizing: border-box; }
    html, body { margin: 0; padding: 0; background: var(--bg); color: var(--text); font: 16px/1.6 system-ui, -apple-system, Segoe UI, Roboto, Ubuntu, Cantarell, "Helvetica Neue", Arial, "Noto Sans", "Apple Color Emoji", "Segoe UI Emoji"; }
    a { color: var(--accent); text-decoration: none; }
    a:hover { text-decoration: underline; }
    .wrap { max-width: 1000px; margin: 0 auto; padding: 24px; }
    header { display: flex; flex-wrap: wrap; gap: 16px; align-items: center; justify-content: space-between; padding: 8px 0 24px; border-bottom: 1px solid var(--border); }
    .title h1 { font-size: 28px; margin: 0; }
    .title p { margin: 4px 0 0; color: var(--muted); }
    .links { display: flex; flex-wrap: wrap; gap: 10px; }
    .pill { background: var(--pill); color: var(--text); padding: 6px 10px; border-radius: 999px; display: inline-flex; align-items: center; gap: 6px; border: 1px solid var(--border); }
    .grid { display: grid; grid-template-columns: 1fr; gap: 18px; margin-top: 24px; }
    @media (min-width: 900px) { .grid { grid-template-columns: 1.1fr 0.9fr; } }
    section { background: var(--card); border: 1px solid var(--border); border-radius: 14px; padding: 18px; }
    h2 { margin: 0 0 10px; font-size: 18px; letter-spacing: .3px; }
    .muted { color: var(--muted); }
    ul { margin: 8px 0 0 18px; }
    li { margin: 6px 0; }
    .job { padding: 12px; border: 1px solid var(--border); border-radius: 12px; margin-bottom: 12px; background: rgba(255,255,255,0.01); }
    .job h3 { margin: 0; font-size: 16px; }
    .chip { display: inline-block; padding: 4px 8px; border-radius: 999px; background: var(--pill); border: 1px solid var(--border); margin: 4px 6px 0 0; font-size: 12px; color: var(--muted); }
    footer { margin: 24px 0 8px; color: var(--muted); text-align: center; }
    .sr { position: absolute; left: -9999px; }
  </style>
</head>
<body>
  <div class="wrap">
    <header>
      <div class="title">
        <h1><?= htmlspecialchars($profile["name"]) ?></h1>
        <p><?= htmlspecialchars($profile["title"]) ?> • <?= htmlspecialchars($profile["location"]) ?></p>
      </div>
      <nav class="links" aria-label="Profile links">
        <?php foreach ($profile["links"] as $l): ?>
          <a class="pill" href="<?= htmlspecialchars($l["url"]) ?>" target="_blank" rel="noopener"><?= htmlspecialchars($l["label"]) ?></a>
        <?php endforeach; ?>
        <a class="pill" href="mailto:<?= htmlspecialchars($profile["email"]) ?>">Email</a>
      </nav>
    </header>

    <main class="grid">
      <section aria-labelledby="summary">
        <h2 id="summary">Summary</h2>
        <p class="muted"><?= htmlspecialchars($profile["summary"]) ?></p>
      </section>

      <section aria-labelledby="skills">
        <h2 id="skills">Skills</h2>
        <?php foreach ($skills as $group => $items): ?>
          <div class="job">
            <h3><?= htmlspecialchars($group) ?></h3>
            <p class="muted">
              <?php foreach ($items as $i): ?>
                <span class="chip"><?= htmlspecialchars($i) ?></span>
              <?php endforeach; ?>
            </p>
          </div>
        <?php endforeach; ?>
      </section>

      <section aria-labelledby="experience" style="grid-column: 1 / -1;">
        <h2 id="experience">Experience</h2>
        <?php foreach ($experience as $exp): ?>
          <article class="job">
            <h3>
              <?= htmlspecialchars($exp["role"]) ?> — <?= htmlspecialchars($exp["company"]) ?>
            </h3>
            <p class="muted">
              <?php if (!empty($exp["location"])): ?>
                <?= htmlspecialchars($exp["location"]) ?> •
              <?php endif; ?>
              <?= htmlspecialchars($exp["period"]) ?>
            </p>
            <?php if (!empty($exp["bullets"])): ?>
              <ul>
                <?php foreach ($exp["bullets"] as $b): ?>
                  <li><?= htmlspecialchars($b) ?></li>
                <?php endforeach; ?>
              </ul>
            <?php endif; ?>
            <?php if (!empty($exp["tech"])): ?>
              <p class="muted">
                <?php foreach (explode(",", $exp["tech"]) as $t): ?>
                  <span class="chip"><?= htmlspecialchars(trim($t)) ?></span>
                <?php endforeach; ?>
              </p>
            <?php endif; ?>
          </article>
        <?php endforeach; ?>
      </section>

      <section aria-labelledby="education">
        <h2 id="education">Education</h2>
        <?php foreach ($education as $e): ?>
          <div class="job">
            <h3><?= htmlspecialchars($e["degree"]) ?></h3>
            <p class="muted"><?= htmlspecialchars($e["school"]) ?> • <?= htmlspecialchars($e["year"]) ?></p>
          </div>
        <?php endforeach; ?>
      </section>

      <section aria-labelledby="certs">
        <h2 id="certs">Certificates</h2>
        <ul>
          <?php foreach ($certifications as $c): ?>
            <li><a href="<?= htmlspecialchars($c["url"]) ?>" target="_blank" rel="noopener"><?= htmlspecialchars($c["name"]) ?></a></li>
          <?php endforeach; ?>
        </ul>
      </section>
    </main>

    <footer>
      <small>&copy; <?php echo date('Y'); ?> <?= htmlspecialchars($profile["name"]) ?> — Portfolio</small>
    </footer>
  </div>
</body>
</html>
