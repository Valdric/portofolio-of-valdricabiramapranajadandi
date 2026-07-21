<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}" class="dark scroll-smooth">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Valdric Abirama Pranaja Dandi - Curriculum Vitae</title>
    
    <!-- SEO Meta Tags -->
    <meta name="description" content="Curriculum Vitae of Valdric Abirama Pranaja Dandi - Informatics Engineering Student, Game & Fullstack Developer.">
    <meta name="author" content="Valdric Abirama Pranaja Dandi">

    <!-- Tailwind CSS via CDN -->
    <script src="https://cdn.tailwindcss.com"></script>
    <script>
      tailwind.config = {
        darkMode: 'class',
        theme: {
          extend: {
            colors: {
              cyberCyan: '#00f0ff',
              cyberViolet: '#a855f7',
              cyberEmerald: '#10b981',
              cyberDark: '#090b0e',
            }
          }
        }
      }
    </script>

    <link rel="stylesheet" href="/style.css">

    <style>
        @media print {
            body {
                background-color: #ffffff !important;
                color: #0f172a !important;
                font-size: 11pt !important;
            }
            .no-print {
                display: none !important;
            }
            .cv-container {
                border: 1px solid #cbd5e1 !important;
                box-shadow: none !important;
                background-color: #ffffff !important;
                color: #0f172a !important;
                max-width: 100% !important;
            }
        }
    </style>
</head>
<body class="bg-[#090b0e] text-slate-100 font-mono antialiased p-4 md:p-8 min-h-screen">

    <!-- TOP CONTROL BAR (NO PRINT) -->
    <div class="no-print max-w-4xl mx-auto mb-6 flex flex-wrap justify-between items-center gap-4 bg-slate-900/90 border border-cyan-500/30 p-4 rounded backdrop-blur">
        <a href="/" class="px-4 py-2 bg-slate-800 hover:bg-slate-700 text-cyan-400 font-pixel rounded text-sm transition-all">
            ⬅ RETURN TO PORTFOLIO
        </a>

        <div class="flex items-center gap-3">
            <button onclick="window.print()" class="px-5 py-2 bg-cyan-500 hover:bg-cyan-400 text-slate-950 font-bold font-pixel rounded text-sm transition-all box-glow-cyan">
                🖨 PRINT / SAVE PDF
            </button>
        </div>
    </div>

    <!-- MAIN CV DOCUMENT CONTAINER -->
    <main class="cv-container max-w-4xl mx-auto bg-[#10141b] border border-cyan-500/30 p-6 md:p-10 rounded shadow-[0_0_30px_rgba(0,240,255,0.15)] space-y-8">
        
        <!-- HEADER PROFILE -->
        <header class="border-b border-cyan-500/30 pb-6 space-y-3">
            <div class="flex justify-between items-start flex-wrap gap-4">
                <div>
                    <h1 class="text-3xl md:text-4xl font-extrabold font-pixel text-cyan-400 uppercase tracking-tight">
                        VALDRIC ABIRAMA PRANAJA DANDI
                    </h1>
                    <p class="text-slate-300 font-bold text-sm mt-1">
                        INFORMATICS ENGINEERING STUDENT | GAME DEV & FULLSTACK DEVELOPER
                    </p>
                </div>
                <div class="text-xs text-right space-y-1 text-slate-400">
                    <div>📍 Bandung, West Java, Indonesia</div>
                    <div>✉ valdricabiramapranajadandi@gmail.com</div>
                    <div>🔗 github.com/Valdric</div>
                    <div>🎮 vulcanova-team.itch.io</div>
                </div>
            </div>

            <!-- KEY STATS STRIP -->
            <div class="grid grid-cols-2 sm:grid-cols-4 gap-3 pt-3 border-t border-cyan-500/20 text-xs">
                <div class="bg-cyan-950/30 border border-cyan-500/20 p-2 rounded text-center">
                    <span class="text-cyan-400 font-bold text-sm block font-pixel">20+</span>
                    <span class="text-slate-400">Projects Done</span>
                </div>
                <div class="bg-violet-950/30 border border-violet-500/20 p-2 rounded text-center">
                    <span class="text-violet-400 font-bold text-sm block font-pixel">1k+</span>
                    <span class="text-slate-400">Coding Hours</span>
                </div>
                <div class="bg-emerald-950/30 border border-emerald-500/20 p-2 rounded text-center">
                    <span class="text-emerald-400 font-bold text-sm block font-pixel">5+</span>
                    <span class="text-slate-400">Game Jams</span>
                </div>
                <div class="bg-amber-950/30 border border-amber-500/20 p-2 rounded text-center">
                    <span class="text-amber-400 font-bold text-sm block font-pixel">3.55+</span>
                    <span class="text-slate-400">GPA Score</span>
                </div>
            </div>
        </header>

        <!-- PROFILE SUMMARY -->
        <section class="space-y-2">
            <h2 class="text-lg font-pixel font-bold text-cyan-400 border-b border-cyan-500/20 pb-1 uppercase">
                // PROFESSIONAL SUMMARY
            </h2>
            <p class="text-xs text-slate-300 leading-relaxed">
                Informatics Engineering student at Universitas Pasundan (UNPAS) specializing in 2D Game Development (Unity, C#, Aseprite sprite design) and Fullstack Web/Mobile Development (Laravel, Flutter, React, Tailwind CSS). Proven track record across 20+ completed software projects, 5+ competitive Game Jams (including Global Game Jam 2026 and Gameseed 2026), and collaborative team environments.
            </p>
        </section>

        <!-- EDUCATION -->
        <section class="space-y-3">
            <h2 class="text-lg font-pixel font-bold text-cyan-400 border-b border-cyan-500/20 pb-1 uppercase">
                // EDUCATION & ACADEMIC ACHIEVEMENTS
            </h2>
            <div class="text-xs space-y-1">
                <div class="flex justify-between font-bold text-white">
                    <span>UNIVERSITAS PASUNDAN (UNPAS) - BANDUNG</span>
                    <span class="text-cyan-400">2023 - PRESENT</span>
                </div>
                <div class="text-slate-300">Bachelor of Computer Science / Informatics Engineering (S.T.)</div>
                <div class="text-emerald-400 font-bold">Current Cumulative GPA: 3.55 / 4.00</div>
            </div>
        </section>

        <!-- CORE SKILLS & TECH STACK -->
        <section class="space-y-3">
            <h2 class="text-lg font-pixel font-bold text-cyan-400 border-b border-cyan-500/20 pb-1 uppercase">
                // TECHNICAL SKILLS & COMPETENCIES
            </h2>
            <div class="grid grid-cols-1 sm:grid-cols-2 gap-4 text-xs">
                <div>
                    <strong class="text-violet-400 block mb-1">🎮 GAME DEVELOPMENT:</strong>
                    <p class="text-slate-300">Unity 2D/3D (C#), Godot Engine, Aseprite Pixel Art, Procedural Raycasting, Inventory Systems, Custom Physics.</p>
                </div>
                <div>
                    <strong class="text-emerald-400 block mb-1">🌐 FULLSTACK & MOBILE:</strong>
                    <p class="text-slate-300">Laravel (PHP), React, Flutter (Dart), Tailwind CSS, REST APIs, SQLite, MySQL Database Architecture.</p>
                </div>
                <div>
                    <strong class="text-amber-400 block mb-1">🛠 TOOLS & WORKFLOWS:</strong>
                    <p class="text-slate-300">Git & GitHub, Figma UI Design, Vite, Docker basics, Agile development.</p>
                </div>
                <div>
                    <strong class="text-cyan-400 block mb-1">🗣 LANGUAGES & SOFT SKILLS:</strong>
                    <p class="text-slate-300">Indonesian (Native), English (Technical Fluency), Problem Solving, Team Collaboration.</p>
                </div>
            </div>
        </section>

        <!-- FEATURED PROJECTS & GAME JAMS -->
        <section class="space-y-4">
            <h2 class="text-lg font-pixel font-bold text-cyan-400 border-b border-cyan-500/20 pb-1 uppercase">
                // KEY FEATURED PROJECTS & GAME JAMS
            </h2>

            <div class="space-y-3 text-xs">
                <div>
                    <div class="flex justify-between font-bold text-white">
                        <span>Ooga Booga Attack (Global Game Jam 2026)</span>
                        <span class="text-cyan-400">JAN 2026</span>
                    </div>
                    <p class="text-slate-300">Built an action survival game within 48 hours using Unity 2D & custom C# physics components for Global Game Jam 2026.</p>
                </div>

                <div>
                    <div class="flex justify-between font-bold text-white">
                        <span>Her Fallacy (2D Survival Horror Game)</span>
                        <span class="text-violet-400">2025 - 2026</span>
                    </div>
                    <p class="text-slate-300">Designed story-driven horror mechanics, C# vision field raycasting, ambient audio mixers, and custom frame-by-frame Aseprite sprites. Released on Itch.io.</p>
                </div>

                <div>
                    <div class="flex justify-between font-bold text-white">
                        <span>Cashier App ("Gosir") Mobile POS</span>
                        <span class="text-emerald-400">2025</span>
                    </div>
                    <p class="text-slate-300">Engineered a Flutter mobile transaction client featuring barcode scanning, local encrypted SQL logging, and receipt generator.</p>
                </div>

                <div>
                    <div class="flex justify-between font-bold text-white">
                        <span>KasiDuit Crowdfunding Platform</span>
                        <span class="text-amber-400">2025</span>
                    </div>
                    <p class="text-slate-300">Developed a fullstack web donation platform with Laravel, PHP, and Tailwind CSS incorporating campaign tracking and financial reporting.</p>
                </div>
            </div>
        </section>

        <!-- FOOTER -->
        <footer class="pt-6 border-t border-cyan-500/30 text-center text-xs text-slate-500">
            Valdric Abirama Pranaja Dandi // Official CV Document // Updated 2026
        </footer>
    </main>

</body>
</html>
