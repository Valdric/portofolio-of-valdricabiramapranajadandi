<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Valdric Abirama Pranaja Dandi - Curriculum Vitae</title>
    
    <!-- SEO Meta Tags -->
    <meta name="description" content="Curriculum Vitae of Valdric Abirama Pranaja Dandi - Informatics Engineering Student, Web & Game Developer.">
    <meta name="author" content="Valdric Abirama Pranaja Dandi">

    <!-- CSS / Assets -->
    @vite(['resources/css/app.css', 'resources/js/app.js'])
    @livewireStyles

    <!-- Prevent Dark Theme Flash -->
    <script>
        if (localStorage.getItem('theme') === 'dark') {
            document.documentElement.classList.add('dark');
        }
    </script>

    <style>
        /* Print media styling override */
        @media print {
            body {
                background-color: #ffffff !important;
                color: #121212 !important;
                font-size: 12px !important;
            }
            .no-print {
                display: none !important;
            }
            /* Reset paper shadow/borders for clean physical prints */
            .cv-container {
                border: none !important;
                box-shadow: none !important;
                margin: 0 !important;
                padding: 0 !important;
                max-w: 100% !important;
                background-color: #ffffff !important;
            }
            /* Hide custom cursors during print */
            #custom-cursor, #custom-cursor-dot {
                display: none !important;
            }
            body, a, button, [role="button"] {
                cursor: auto !important;
            }
            /* Prevent orphan headings and card page-breaks */
            .cv-section-title, .project-print-card, .skills-block {
                page-break-inside: avoid;
            }
            @page {
                size: A4;
                margin: 1.5cm 1.2cm 1.5cm 1.2cm;
            }
        }
    </style>
</head>
<body class="bg-creamBg text-charcoalText antialiased min-h-screen selection:bg-creamHighlight selection:text-charcoalText">

    <!-- Custom Cursor (Desktop Only) - Hidden on Touch -->
    <div id="custom-cursor" class="hidden md:block"></div>
    <div id="custom-cursor-dot" class="hidden md:block"></div>

    <!-- UTILITY CONTROL HEADER (Sticky Top, Hidden on Print) -->
    <header class="no-print sticky top-0 left-0 right-0 z-30 w-full bg-creamBg/90 backdrop-blur-md border-b-2 border-charcoalText py-4 px-6 md:px-12 flex justify-between items-center font-tech">
        <a href="/" class="flex items-center space-x-2 text-xs font-bold uppercase tracking-wider text-charcoalText hover:text-cobaltBlue transition-colors group">
            <span>←</span>
            <span>Back to Portfolio</span>
        </a>
        <div class="flex items-center space-x-3">
            <button id="theme-toggle-btn" class="px-4 py-2 border-2 border-charcoalText hover:bg-charcoalText hover:text-creamBg text-[10px] font-extrabold uppercase tracking-widest rounded-full transition-all duration-300">
                [ ☾ Dark ]
            </button>
            <button onclick="window.print()" class="px-6 py-2.5 bg-charcoalText hover:bg-cobaltBlue text-creamBg font-bold text-xs uppercase tracking-wider rounded-full transition-all duration-300">
                [ Print CV / Save PDF ]
            </button>
        </div>
    </header>

    <!-- CV SHEET WRAPPER -->
    <main class="max-w-5xl mx-auto my-8 px-4 md:px-8 print:my-0 print:px-0">
        <div class="cv-container bg-creamBg border-2 border-charcoalText rounded-2xl md:rounded-3xl p-8 md:p-12 shadow-xl print:border-none print:shadow-none print:p-0 print:bg-white">
            
            <!-- HEADER BLOCK (Grid Name / Contact / Avatar) -->
            <div class="grid grid-cols-1 md:grid-cols-12 gap-8 pb-10 border-b-2 border-charcoalText items-center print:grid-cols-12 print:gap-4 print:pb-6">
                
                <!-- Title and Details -->
                <div class="md:col-span-8 flex flex-col space-y-4 print:col-span-9">
                    <div>
                        <span class="text-xs font-bold uppercase tracking-widest text-charcoalText/60 font-tech mb-2 block print:mb-1">[ Curriculum Vitae ]</span>
                        <h1 class="text-4xl md:text-5xl font-extrabold tracking-tighter uppercase font-tech leading-tight select-none">
                            Valdric Abirama<br>
                            <span class="text-cobaltBlue">Pranaja Dandi</span>
                        </h1>
                        <p class="text-sm md:text-base font-tech uppercase tracking-wide font-bold text-charcoalText/85 mt-2">
                            Informatics Engineering Student & Web/Game Developer
                        </p>
                    </div>

                    <!-- Contact Details Underlines -->
                    <div class="grid grid-cols-1 sm:grid-cols-2 gap-x-6 gap-y-2.5 text-xs font-tech font-bold uppercase text-charcoalText pt-2 print:grid-cols-2 print:gap-x-4">
                        <div class="flex items-center space-x-2">
                            <span class="text-charcoalText/40">Mail:</span>
                            <a href="mailto:valdricapd@gmail.com" class="text-cobaltBlue hover:underline">valdricapd@gmail.com</a>
                        </div>
                        <div class="flex items-center space-x-2">
                            <span class="text-charcoalText/40">Github:</span>
                            <a href="https://github.com/Valdric" target="_blank" class="hover:text-cobaltBlue transition-all">github.com/Valdric ↗</a>
                        </div>
                        <div class="flex items-center space-x-2">
                            <span class="text-charcoalText/40">Loc:</span>
                            <span>Indonesia (WIB)</span>
                        </div>
                        <div class="flex items-center space-x-2">
                            <span class="text-charcoalText/40">Status:</span>
                            <span class="text-emerald-600 print:text-charcoalText">Open for projects</span>
                        </div>
                    </div>
                </div>

                <!-- Avatar Block -->
                <div class="md:col-span-4 flex justify-center md:justify-end print:col-span-3">
                    <div class="relative w-32 h-32 md:w-36 md:h-36 group border-2 border-charcoalText p-1 bg-creamHighlight rounded-2xl print:w-28 print:h-28 print:rounded-xl">
                        <div class="w-full h-full overflow-hidden border border-charcoalText rounded-xl bg-creamBg">
                            <img src="/images/valdric.jpg" alt="Valdric Abirama Pranaja Dandi" class="w-full h-full object-cover grayscale print:grayscale-0">
                        </div>
                    </div>
                </div>

            </div>

            <!-- TWO-COLUMN BODY LAYOUT -->
            <div class="grid grid-cols-1 lg:grid-cols-12 gap-8 pt-10 print:grid-cols-12 print:gap-6 print:pt-6">
                
                <!-- LEFT COLUMN: Profile summary, competencies, education -->
                <div class="lg:col-span-5 flex flex-col space-y-10 print:col-span-5 print:space-y-6">
                    
                    <!-- SUMMARY SECTION -->
                    <div class="flex flex-col space-y-3 print:space-y-2">
                        <div class="flex items-center space-x-2 font-tech cv-section-title">
                            <span class="text-xs font-bold text-cobaltBlue">01 /</span>
                            <h2 class="text-sm font-extrabold uppercase tracking-widest">Profile Summary</h2>
                        </div>
                        <p class="text-charcoalText/85 text-xs md:text-sm leading-relaxed">
                            An Informatics Engineering student focused on building highly functional systems. I have a deep passion for solving complex architectural problems, designing scalable full-stack web and mobile apps, and building interactive, code-driven mechanics. Focused on clean grids, modular layouts, and visual and technical clarity.
                        </p>
                    </div>

                    <!-- CORE COMPETENCIES -->
                    <div class="flex flex-col space-y-4 print:space-y-3">
                        <div class="flex items-center space-x-2 font-tech cv-section-title">
                            <span class="text-xs font-bold text-cobaltBlue">02 /</span>
                            <h2 class="text-sm font-extrabold uppercase tracking-widest">Core Skills</h2>
                        </div>

                        <div class="grid grid-cols-1 gap-4 print:gap-3">
                            <!-- Category 1 -->
                            <div class="border-2 border-charcoalText p-4 rounded-xl bg-creamBg print:p-3 print:border print:rounded-lg skills-block">
                                <div class="text-[9px] font-bold uppercase tracking-wider text-charcoalText/50 font-tech mb-1.5">[ Core Code ]</div>
                                <h3 class="text-xs font-bold font-tech mb-2 uppercase">Languages</h3>
                                <p class="font-bold text-[10px] uppercase tracking-wide text-charcoalText/85 font-tech">
                                    JavaScript, Python, C++, C#, Dart, PHP
                                </p>
                            </div>
                            <!-- Category 2 -->
                            <div class="border-2 border-charcoalText p-4 rounded-xl bg-creamBg print:p-3 print:border print:rounded-lg skills-block">
                                <div class="text-[9px] font-bold uppercase tracking-wider text-charcoalText/50 font-tech mb-1.5">[ Frontend ]</div>
                                <h3 class="text-xs font-bold font-tech mb-2 uppercase">Interfaces</h3>
                                <p class="font-bold text-[10px] uppercase tracking-wide text-charcoalText/85 font-tech">
                                    HTML5, CSS3, Tailwind CSS, React.js
                                </p>
                            </div>
                            <!-- Category 3 -->
                            <div class="border-2 border-charcoalText p-4 rounded-xl bg-creamBg print:p-3 print:border print:rounded-lg skills-block">
                                <div class="text-[9px] font-bold uppercase tracking-wider text-charcoalText/50 font-tech mb-1.5">[ Interactive ]</div>
                                <h3 class="text-xs font-bold font-tech mb-2 uppercase">Mobile & Game</h3>
                                <p class="font-bold text-[10px] uppercase tracking-wide text-charcoalText/85 font-tech">
                                    Flutter, Unity 2D/3D, Aseprite Sprite Sheets
                                </p>
                            </div>
                            <!-- Category 4 -->
                            <div class="border-2 border-charcoalText p-4 rounded-xl bg-creamBg print:p-3 print:border print:rounded-lg skills-block">
                                <div class="text-[9px] font-bold uppercase tracking-wider text-charcoalText/50 font-tech mb-1.5">[ Data & Versioning ]</div>
                                <h3 class="text-xs font-bold font-tech mb-2 uppercase">Databases & Tools</h3>
                                <p class="font-bold text-[10px] uppercase tracking-wide text-charcoalText/85 font-tech">
                                    SQL Databases, Git, GitHub, REST APIs
                                </p>
                            </div>
                            <!-- Category 5 -->
                            <div class="border-2 border-charcoalText p-4 rounded-xl bg-creamBg print:p-3 print:border print:rounded-lg skills-block">
                                <div class="text-[9px] font-bold uppercase tracking-wider text-charcoalText/50 font-tech mb-1.5">[ Creative Media ]</div>
                                <h3 class="text-xs font-bold font-tech mb-2 uppercase">Video Editing</h3>
                                <p class="font-bold text-[10px] uppercase tracking-wide text-charcoalText/85 font-tech">
                                    DaVinci Resolve, CapCut, Alight Motion
                                </p>
                            </div>
                        </div>
                    </div>

                    <!-- EDUCATION SECTION -->
                    <div class="flex flex-col space-y-3 print:space-y-2">
                        <div class="flex items-center space-x-2 font-tech cv-section-title">
                            <span class="text-xs font-bold text-cobaltBlue">03 /</span>
                            <h2 class="text-sm font-extrabold uppercase tracking-widest">Education</h2>
                        </div>
                        <div class="border-l-2 border-charcoalText pl-4 py-1 flex flex-col space-y-1.5 print:border-l print:pl-3">
                            <h3 class="text-xs font-bold font-tech uppercase text-charcoalText">Universitas Pasundan</h3>
                            <p class="text-charcoalText/80 text-[11px] font-tech font-bold uppercase">
                                Informatics Engineering Student (S1)
                            </p>
                            <div class="flex items-center space-x-3 text-[10px] font-tech text-charcoalText/60 font-bold uppercase">
                                <span>GPA: 3.71 / 4.00</span>
                                <span>•</span>
                                <span>Bandung, Indonesia</span>
                            </div>
                        </div>
                    </div>

                </div>

                <!-- RIGHT COLUMN: Projects list -->
                <div class="lg:col-span-7 flex flex-col space-y-6 print:col-span-7 print:space-y-4">
                    
                    <div class="flex items-center space-x-2 font-tech cv-section-title">
                        <span class="text-xs font-bold text-cobaltBlue">04 /</span>
                        <h2 class="text-sm font-extrabold uppercase tracking-widest">Projects Registry</h2>
                    </div>

                    <!-- Projects list container -->
                    <div class="space-y-5 print:space-y-4">
                        @foreach($projects as $project)
                            @php
                                $isGame = str_contains($project->external_url, 'itch.io') 
                                       || str_contains($project->external_url, 'drive.google.com')
                                       || str_contains($project->external_url, 'globalgamejam.org');
                                $tagLabel = $isGame ? '[ Game Dev ]' : '[ Systems ]';
                            @endphp
                            <article class="project-print-card border-2 border-charcoalText rounded-xl p-5 bg-creamBg hover:bg-creamHighlight/50 transition-all duration-300 flex flex-col justify-between print:p-4 print:border print:rounded-lg print:bg-white">
                                <div>
                                    <div class="flex justify-between items-start mb-2">
                                        <h3 class="text-sm font-extrabold font-tech text-charcoalText uppercase leading-snug">
                                            {{ $project->title }}
                                        </h3>
                                        <span class="text-[8px] font-bold tracking-wider font-tech uppercase text-charcoalText/50 print:text-[7px]">
                                            {{ $tagLabel }}
                                        </span>
                                    </div>
                                    
                                    <p class="text-charcoalText/85 text-[11px] leading-relaxed mb-3 print:text-[10px] print:mb-2">
                                        {{ $project->description }}
                                    </p>
                                </div>

                                <div class="flex flex-wrap gap-1.5 mb-3 print:mb-2">
                                    @foreach($project->tags as $tag)
                                        <span class="px-2 py-0.5 border border-charcoalText/25 text-charcoalText/80 text-[8px] font-bold tracking-wider font-tech uppercase rounded print:px-1.5 print:py-0 print:text-[7px]">
                                            {{ $tag }}
                                        </span>
                                    @endforeach
                                </div>

                                <div class="flex justify-between items-center text-[9px] font-bold uppercase tracking-wider font-tech pt-2.5 border-t border-charcoalText/10 mt-1 print:pt-1.5 print:text-[8px]">
                                    <a href="{{ $project->external_url }}" target="_blank" class="text-cobaltBlue hover:underline transition-all font-bold">
                                        {{ str_contains($project->external_url, 'drive.google.com') ? 'Asset Drive' : (str_contains($project->external_url, 'itch.io') ? 'Itch.io Portal' : (str_contains($project->external_url, 'globalgamejam.org') ? 'GGJ Portal' : (str_contains($project->external_url, 'github.io') ? 'Live Site' : 'GitHub Link'))) }} ↗
                                    </a>
                                    <span class="text-charcoalText/50 font-bold font-tech">Order ID: #0{{ $project->order }}</span>
                                </div>
                            </article>
                        @endforeach
                    </div>

                </div>

            </div>

        </div>
    </main>

    <!-- Print Footer block -->
    <footer class="hidden print:block py-6 text-center text-[9px] font-tech font-bold uppercase tracking-wider text-charcoalText/50">
        Curriculum Vitae • Valdric Abirama Pranaja Dandi • Generate timestamp: {{ now()->format('Y-m-d') }}
    </footer>

    <!-- Interactive Custom Cursor Hook -->
    <script>
        document.addEventListener('DOMContentLoaded', () => {
            // ----------------------------------------------------
            // Theme toggle preferences handler
            // ----------------------------------------------------
            function applyTheme() {
                const currentTheme = localStorage.getItem('theme') || 'light';
                const toggleBtns = document.querySelectorAll('#theme-toggle-btn');
                if (currentTheme === 'dark') {
                    document.documentElement.classList.add('dark');
                    document.body.classList.add('dark');
                    toggleBtns.forEach(btn => btn.textContent = '[ ☀ Light ]');
                } else {
                    document.documentElement.classList.remove('dark');
                    document.body.classList.remove('dark');
                    toggleBtns.forEach(btn => btn.textContent = '[ ☾ Dark ]');
                }
            }
            applyTheme();

            document.addEventListener('click', (e) => {
                const btn = e.target.closest('#theme-toggle-btn');
                if (btn) {
                    const currentTheme = localStorage.getItem('theme') || 'light';
                    const newTheme = currentTheme === 'dark' ? 'light' : 'dark';
                    localStorage.setItem('theme', newTheme);
                    applyTheme();
                }
            });

            // Setup custom cursor
            const cursor = document.getElementById('custom-cursor');
            const cursorDot = document.getElementById('custom-cursor-dot');
            
            let mouseX = 0, mouseY = 0;
            let cursorX = 0, cursorY = 0;
            
            if (cursor && cursorDot) {
                window.addEventListener('mousemove', (e) => {
                    mouseX = e.clientX;
                    mouseY = e.clientY;
                    
                    cursorDot.style.left = `${mouseX}px`;
                    cursorDot.style.top = `${mouseY}px`;
                });

                function animateCursor() {
                    const lerpFactor = 0.15;
                    cursorX += (mouseX - cursorX) * lerpFactor;
                    cursorY += (mouseY - cursorY) * lerpFactor;
                    
                    cursor.style.left = `${cursorX}px`;
                    cursor.style.top = `${cursorY}px`;
                    
                    requestAnimationFrame(animateCursor);
                }
                animateCursor();

                function attachHoverListeners() {
                    const hoverables = document.querySelectorAll('a, button, input, textarea, select, .project-print-card, [role="button"]');
                    hoverables.forEach(item => {
                        item.addEventListener('mouseenter', () => cursor.classList.add('hovered'));
                        item.addEventListener('mouseleave', () => cursor.classList.remove('hovered'));
                    });
                }
                attachHoverListeners();
            }
        });
    </script>
</body>
</html>
