<?php
$contactSent = false;
$errors = [];
$name = "";
$email = "";
$message = "";

if (($_SERVER["REQUEST_METHOD"] ?? "GET") === "POST") {
    $name = trim($_POST["name"] ?? "");
    $email = trim($_POST["email"] ?? "");
    $message = trim($_POST["message"] ?? "");

    if ($name === "") {
        $errors[] = "Vul je naam in.";
    }

    if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
        $errors[] = "Vul een geldig e-mailadres in.";
    }

    if ($message === "") {
        $errors[] = "Vul een bericht in.";
    }

    if (!$errors) {
        $contactSent = true;
        $name = "";
        $email = "";
        $message = "";
    }
}

function e(string $value): string
{
    return htmlspecialchars($value, ENT_QUOTES, "UTF-8");
}

$values = [
    ["icon" => "code", "title" => "Clean Code", "description" => "Ik schrijf onderhoudbare en schaalbare code volgens best practices."],
    ["icon" => "idea", "title" => "Innovatie", "description" => "Altijd op zoek naar nieuwe technologieen en creatieve oplossingen."],
    ["icon" => "rocket", "title" => "Prestaties", "description" => "Geoptimaliseerde applicaties die snel laden en soepel werken."],
    ["icon" => "team", "title" => "Samenwerking", "description" => "Sterke communicatie en teamwork voor succesvolle projecten."],
];

$skills = [
    "frontend" => [
        "title" => "Frontend Development",
        "items" => [
            ["name" => "PHP", "level"],
            ["name" => "HTML", "level"],
            ["name" => "CSS"],
        ],
    ],
    "backend" => [
        "title" => "Backend Development",
        "items" => [
            ["name" => "MySQL", "level"],
            ["name" => "Java", "level"],
        ],
    ],
    "tools" => [
        "title" => "Tools & Platform",
        "items" => [
            ["name" => "GitHub", "level"],
            ["name" => "Figma", "level"],
            ["name" => "Canva", "level"],
        ],
    ],
];
?>
<!doctype html>
<html lang="nl">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Tristan Bos | Portfolio</title>
    <meta name="description" content="Portfolio van Tristan Bos, Software Development student aan Vista College Maastricht.">
    <link rel="stylesheet" href="assets/style.css">
</head>
<body>
    <main>
        <section class="hero" id="home">
            <div class="container hero__inner">
                <p class="eyebrow">Software Developer Student</p>
                <h1>Hallo, ik ben <span>Tristan Bos</span></h1>
                <p class="hero__subtitle">Software Developer Student & AI Enthusiast</p>
                <p class="hero__text">
                    Student aan Vista College Maastricht met een passie voor webontwikkeling en AI.
                    Gespecialiseerd in het bouwen van intelligente applicaties met PHP, React en moderne technologieen.
                </p>
                <div class="hero__actions" aria-label="Belangrijke links">
                    <a class="button button--primary" href="#projects">Bekijk Mijn Werk</a>
                    <a class="button button--outline" href="#contact">Neem Contact Op</a>
                </div>
                <div class="socials" aria-label="Social links">
                    <a href="https://github.com" target="_blank" rel="noopener noreferrer" aria-label="GitHub">
                        <svg viewBox="0 0 24 24" aria-hidden="true"><path d="M12 2a10 10 0 0 0-3.16 19.49c.5.09.68-.22.68-.48v-1.7c-2.78.61-3.37-1.19-3.37-1.19-.45-1.16-1.11-1.47-1.11-1.47-.91-.62.07-.61.07-.61 1 .07 1.53 1.03 1.53 1.03.89 1.52 2.34 1.08 2.91.83.09-.65.35-1.08.63-1.33-2.22-.25-4.56-1.11-4.56-4.94 0-1.09.39-1.98 1.03-2.68-.1-.25-.45-1.27.1-2.64 0 0 .84-.27 2.75 1.02A9.5 9.5 0 0 1 12 5.99c.85 0 1.7.11 2.5.33 1.91-1.29 2.75-1.02 2.75-1.02.55 1.37.2 2.39.1 2.64.64.7 1.03 1.59 1.03 2.68 0 3.84-2.34 4.69-4.57 4.94.36.31.68.92.68 1.85v2.74c0 .27.18.58.69.48A10 10 0 0 0 12 2Z"/></svg>
                    </a>
                    <a href="https://www.linkedin.com/in/tristan-bos-7a26b3329/" target="_blank" rel="noopener noreferrer" aria-label="LinkedIn">
                        <svg viewBox="0 0 24 24" aria-hidden="true"><path d="M6.94 8.75H3.75V20h3.19V8.75ZM5.35 4a1.84 1.84 0 1 0 0 3.68A1.84 1.84 0 0 0 5.35 4Zm15 9.78c0-3.02-1.61-4.42-3.76-4.42a3.24 3.24 0 0 0-2.93 1.61h-.04V8.75H10.56V20h3.19v-5.57c0-1.47.28-2.89 2.1-2.89 1.79 0 1.81 1.68 1.81 2.98V20h3.19v-6.22Z"/></svg>
                    </a>
                    <a href="mailto:tbos44370@gmail.com" aria-label="Email">
                        <svg viewBox="0 0 24 24" aria-hidden="true"><path d="M4 6h16a2 2 0 0 1 2 2v8a2 2 0 0 1-2 2H4a2 2 0 0 1-2-2V8a2 2 0 0 1 2-2Zm0 2v.35l8 5 8-5V8H4Zm16 8V10.7l-7.47 4.66a1 1 0 0 1-1.06 0L4 10.7V16h16Z"/></svg>
                    </a>
                </div>
                <a class="scroll-link" href="#about" aria-label="Scroll naar over mij">
                    <svg viewBox="0 0 24 24" aria-hidden="true"><path d="M11 4h2v12.17l5.59-5.58L20 12l-8 8-8-8 1.41-1.41L11 16.17V4Z"/></svg>
                </a>
            </div>
        </section>

        <section class="section" id="about">
            <div class="container">
                <h2>Over Mij</h2>
                <div class="about-grid">
                    <div class="copy">
                        <p>Ik ben een tweedejaars student Software Development (Niveau 4) aan Vista College Maastricht, geboren op 18 september 2005. Mijn passie ligt in webontwikkeling en AI-oplossingen.</p>
                        <p>Ik ben actief op zoek naar een stageplaats waar ik mijn vaardigheden in software development verder kan ontwikkelen. Voor mijn eindexamenproduct heb ik gekozen voor een afstudeeropdracht waarbij ik mij verdiep in webontwikkeling en AI-oplossingen. Een van mijn recente projecten is een AI chatbot die bezoekers kan helpen met het geven van informatie over de bedrijven binnen het Brightlands gebouw Heerlen.</p>
                        <p>Met mijn interesse in software development zoek ik mooie projecten waarbij ik mijn kennis kan toepassen en nieuwe vaardigheden kan ontwikkelen. Ik ben gemotiveerd om te leren van ervaren professionals.</p>
                    </div>
                    <div class="workspace-image" role="img" aria-label="Developer workspace"></div>
                </div>
                <div class="value-grid">
                    <?php foreach ($values as $value): ?>
                        <article class="card value-card">
                            <div class="icon-box icon-box--<?php echo e($value["icon"]); ?>"></div>
                            <h3><?php echo e($value["title"]); ?></h3>
                            <p><?php echo e($value["description"]); ?></p>
                        </article>
                    <?php endforeach; ?>
                </div>
            </div>
        </section>

        <section class="section section--muted" id="projects">
            <div class="container container--narrow">
                <h2>Mijn Projecten</h2>
                <p class="section-intro">Een selectie van recente projecten waar ik aan heb gewerkt. Van concept tot deployment, elk project vertelt een uniek verhaal.</p>
                <article class="card project-card">
                    <img src="assets/chatbot-screenshot-1.png" alt="Screenshot van AI Recruitment Chatbot">
                    <div class="project-card__body">
                        <h3>AI Chatbot - brightlands</h3>
                        <p>Chatbot voor brightlands die bezoekers vragen beantwoordt over het bedrijf als ze iets willen weten over de bedrijven binnen het campus van brightlands Heerlen.</p>
                    </div>
                </article>
            </div>
        </section>

        <section class="section" id="skills">
            <div class="container container--skills">
                <h2>Vaardigheden</h2>
                <p class="section-intro">Technologieen en tools waar ik dagelijks mee werk</p>
                <div class="tabs" data-tabs>
                    <div class="tab-list" role="tablist" aria-label="Vaardigheid categorieen">
                        <button class="tab-button is-active" type="button" role="tab" aria-selected="true" aria-controls="tab-frontend" data-tab="frontend">Frontend</button>
                        <button class="tab-button" type="button" role="tab" aria-selected="false" aria-controls="tab-backend" data-tab="backend">Backend</button>
                        <button class="tab-button" type="button" role="tab" aria-selected="false" aria-controls="tab-tools" data-tab="tools">Tools</button>
                    </div>
                    <?php foreach ($skills as $key => $category): ?>
                        <article class="card tab-panel<?php echo $key === "frontend" ? " is-active" : ""; ?>" id="tab-<?php echo e($key); ?>" role="tabpanel" data-panel="<?php echo e($key); ?>">
                            <h3><?php echo e($category["title"]); ?></h3>
                            <?php foreach ($category["items"] as $skill): ?>
                                <div class="skill-row">
                                    <div class="skill-row__label">
                                        <strong><?php echo e($skill["name"]); ?></strong>
                                        <span><?php echo e((string) $skill["level"]); ?>%</span>
                                    </div>
                                    <div class="progress" aria-label="<?php echo e($skill["name"]); ?> <?php echo e((string) $skill["level"]); ?> procent">
                                        <span style="width: <?php echo e((string) $skill["level"]); ?>%"></span>
                                    </div>
                                </div>
                            <?php endforeach; ?>
                        </article>
                    <?php endforeach; ?>
                </div>
            </div>
        </section>

        <section class="section section--muted" id="contact">
            <div class="container">
                <h2>Neem Contact Op</h2>
                <p class="section-intro">Heb je een vraag of wil je samenwerken? Laat het me weten!</p>
                <div class="contact-grid">
                    <article class="card">
                        <h3>Stuur een bericht</h3>
                        <p class="card-description">Vul het formulier in en ik neem zo snel mogelijk contact met je op.</p>
                        <?php if ($contactSent): ?>
                            <div class="notice notice--success">Bedankt voor je bericht! Ik neem zo snel mogelijk contact met je op.</div>
                        <?php endif; ?>
                        <?php if ($errors): ?>
                            <div class="notice notice--error">
                                <?php foreach ($errors as $error): ?>
                                    <p><?php echo e($error); ?></p>
                                <?php endforeach; ?>
                            </div>
                        <?php endif; ?>
                        <form method="post" action="#contact" class="contact-form">
                            <label for="name">Naam</label>
                            <input id="name" name="name" type="text" placeholder="Jouw naam" value="<?php echo e($name); ?>" required>
                            <label for="email">Email</label>
                            <input id="email" name="email" type="email" placeholder="jouw@email.com" value="<?php echo e($email); ?>" required>
                            <label for="message">Bericht</label>
                            <textarea id="message" name="message" rows="5" placeholder="Jouw bericht..." required><?php echo e($message); ?></textarea>
                            <button class="button button--primary button--full" type="submit">Verstuur Bericht</button>
                        </form>
                    </article>
                    <div class="contact-side">
                        <article class="card">
                            <h3>Contact Informatie</h3>
                            <p class="card-description">Je kunt me ook direct bereiken via onderstaande kanalen.</p>
                            <div class="contact-item">
                                <span class="mini-icon mini-icon--mail"></span>
                                <div>
                                    <strong>Email</strong>
                                    <a href="mailto:Tbos44370@gmail.com">Tbos44370@gmail.com</a>
                                </div>
                            </div>
                            <div class="contact-item">
                                <span class="mini-icon mini-icon--phone"></span>
                                <div>
                                    <strong>Telefoon</strong>
                                    <a href="tel:+31642276123">06 42276123</a>
                                </div>
                            </div>
                            <div class="contact-item">
                                <span class="mini-icon mini-icon--pin"></span>
                                <div>
                                    <strong>Locatie</strong>
                                    <p>Maastricht, Nederland</p>
                                </div>
                            </div>
                        </article>
                        <article class="card card--compact">
                            <p>Ik ben momenteel student aan Vista College Maastricht en op zoek naar stageplaatsen en samenwerkingsmogelijkheden. Neem gerust contact op!</p>
                        </article>
                    </div>
                </div>
                <footer>
                    <p>&copy; 2026 Tristan Bos. Alle rechten voorbehouden.</p>
                </footer>
            </div>
        </section>
    </main>
    <script src="assets/script.js"></script>
</body>
</html>
