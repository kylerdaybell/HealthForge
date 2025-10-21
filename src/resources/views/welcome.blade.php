<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>HealthForge - Forge a Stronger You</title>
    
    <!-- W3.CSS Framework -->
    <link rel="stylesheet" href="https://www.w3schools.com/w3css/4/w3.css">
    
    <!-- Google Fonts: Inter for a clean, modern look -->
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Inter:wght@400;500;700;800&display=swap" rel="stylesheet">

    <style>
        /* --- Base Styling & Apple Aesthetic --- */
        body, html {
            height: 100%;
            margin: 0;
            background-color: #f5f5f7; /* A soft, Apple-like off-white */
            font-family: 'Inter', -apple-system, BlinkMacSystemFont, "Segoe UI", Roboto, Helvetica, Arial, sans-serif;
            color: #1d1d1f; /* Apple's primary text color */
        }

        .page-container {
            display: flex;
            flex-direction: column;
            justify-content: center;
            align-items: center;
            min-height: 100vh;
            text-align: center;
            padding: 20px;
        }

        /* --- The Stunning Rainbow Gradient Title --- */
        .healthforge-title {
            font-size: 8vw; /* Responsive font size */
            font-weight: 800;
            letter-spacing: -0.05em;
            margin-bottom: 0;
            /* The gradient magic */
            background: linear-gradient(90deg, #ff8a00, #e52e71, #6b21a8, #2563eb, #00c2a8, #facc15);
            -webkit-background-clip: text;
            -webkit-text-fill-color: transparent;
            background-clip: text;
            text-fill-color: transparent;
            animation: gradient-flow 10s ease infinite;
            background-size: 300% 300%;
        }

        @media (min-width: 992px) {
            .healthforge-title {
                font-size: 6rem; /* Cap the font size on larger screens */
            }
        }

        /* --- Gradient Animation --- */
        @keyframes gradient-flow {
            0% { background-position: 0% 50%; }
            50% { background-position: 100% 50%; }
            100% { background-position: 0% 50%; }
        }

        /* --- Hero Section Text --- */
        .hero-headline {
            font-size: 2.5rem;
            font-weight: 700;
            margin-top: 24px;
            color: #1d1d1f;
        }

        .hero-subheadline {
            font-size: 1.25rem;
            color: #6e6e73; /* Apple's secondary text color */
            max-width: 600px;
            margin: 16px auto 32px;
            line-height: 1.6;
        }

        /* --- Stunning Call-to-Action Button --- */
        .cta-button {
            color: #fff;
            border: none;
            padding: 16px 32px;
            font-size: 1rem;
            font-weight: 500;
            border-radius: 980px; /* A very rounded pill shape */
            cursor: pointer;
            text-decoration: none;
        }

        .cta-button:hover {
            background-color: #0077ed;
            transform: scale(1.05);
        }

        /* --- Feature Cards --- */
        .feature-section {
            margin-top: 80px;
            max-width: 1200px;
        }

        .feature-card {
            border-radius: 20px;
            padding: 32px;
            margin-bottom: 24px;
            background-color: #ffffff;
            box-shadow: 0 4px 20px rgba(0,0,0,0.05);
            transition: transform 0.3s ease, box-shadow 0.3s ease;
            height: 200px;
        }
        

        .feature-card h3 {
            font-weight: 700;
            color: #1d1d1f;
        }

        .feature-card p {
            color: #6e6e73;
            line-height: 1.6;
        }

    </style>
</head>
<body>

    <!-- Main Centered Content Container -->
    <div class="page-container w3-container">

        <!-- Header and Hero Section -->
        <header class="w3-padding-64">
            <h1 class="healthforge-title">HealthForge</h1>
            <h2 class="hero-headline">Forge a stronger you.</h2>
            <p class="hero-subheadline">The simple, beautiful way to track your health, build lasting habits, and see your progress come to life.</p>
            <a href="#" class="cta-button w3-blue">Get Started &mdash; It's Free</a>
            <br>
            <br>
            <a href="#" class="w3-button w3-hover-grey w3-round">Log In</a>
        </header>

        <!-- Feature Section -->
        <div class="feature-section w3-row-padding">
            <div class="w3-col l4 m6 s12">
                <div class="feature-card">
                    <h3>Effortless Logging</h3>
                    <p>Log meals and workouts in seconds with your personal library. No more endless searching.</p>
                </div>
            </div>
            <div class="w3-col l4 m6 s12">
                <div class="feature-card">
                    <h3>Visual Progress</h3>
                    <p>See your hard work pay off with clean charts and a side-by-side photo comparison gallery.</p>
                </div>
            </div>
            <div class="w3-col l4 m12 s12">
                <div class="feature-card">
                    <h3>Built For You</h3>
                    <p>Forge your own path by building a library of your favorite foods and workout routines.</p>
                </div>
            </div>
        </div>
    </div>

</body>
</html>
