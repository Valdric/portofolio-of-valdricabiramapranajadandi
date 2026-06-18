<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}" class="scroll-smooth">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Valdric Abirama Pranaja Dandi | Portfolio</title>
    
    <!-- SEO Meta Tags -->
    <meta name="description" content="Valdric Abirama Pranaja Dandi | Portfolio - Informatics Engineering, Web & Game Developer. Designed in the aesthetic style of poch.studio.">
    <meta name="keywords" content="Valdric Abirama Pranaja Dandi, Portfolio, Informatics Engineering, Developer, Game Dev, Flutter, Unity, Poch Studio Style">
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
</head>
<body class="bg-creamBg text-charcoalText antialiased">

    <!-- Custom Cursor (Desktop Only) -->
    <div id="custom-cursor" class="hidden md:block"></div>
    <div id="custom-cursor-dot" class="hidden md:block"></div>

    <!-- Preloader Intro Overlay -->
    <div id="preloader" class="fixed inset-0 w-full h-full bg-[#121212] text-creamBg z-50 flex flex-col justify-between p-8 md:p-16">
        <div class="flex justify-between items-center font-tech text-[10px] uppercase font-bold tracking-widest opacity-60">
            <span>[ Valdric.sys ]</span>
            <span>Boot sequence in progress</span>
        </div>
        
        <div class="my-auto flex flex-col items-start justify-center">
            <h1 class="text-4xl md:text-7xl font-extrabold tracking-tighter uppercase font-tech leading-[0.85] mb-4 overflow-hidden">
                <span id="preloader-text" class="inline-block">initializing</span>
            </h1>
            <div class="w-48 md:w-64 h-[1.5px] bg-creamBg/20 relative mt-4 overflow-hidden">
                <div id="preloader-bar" class="absolute left-0 top-0 h-full bg-cobaltBlue" style="width: 0%"></div>
            </div>
        </div>

        <div class="flex justify-between items-end font-tech font-bold text-3xl md:text-5xl uppercase tracking-tighter">
            <span>Loading</span>
            <span id="preloader-percent">00%</span>
        </div>
    </div>

    <!-- Main Content Slot -->
    <main class="relative z-10">
        {{ $slot }}
    </main>

    <!-- Bottom Floating Navigation Dock -->
    <nav class="fixed bottom-6 left-1/2 transform -translate-x-1/2 z-40 bottom-nav-dock px-3 py-2.5 rounded-full flex items-center justify-center space-x-1 border-2 border-charcoalText no-print">
        <a href="{{ request()->is('cv') ? '/#hero' : '#hero' }}" class="nav-link px-4 py-2 text-xs font-bold uppercase tracking-wider text-charcoalText hover:bg-charcoalText hover:text-creamBg rounded-full transition-all duration-300 font-tech">Home</a>
        <a href="{{ request()->is('cv') ? '/#about' : '#about' }}" class="nav-link px-4 py-2 text-xs font-bold uppercase tracking-wider text-charcoalText hover:bg-charcoalText hover:text-creamBg rounded-full transition-all duration-300 font-tech">About</a>
        <a href="{{ request()->is('cv') ? '/#skills' : '#skills' }}" class="nav-link px-4 py-2 text-xs font-bold uppercase tracking-wider text-charcoalText hover:bg-charcoalText hover:text-creamBg rounded-full transition-all duration-300 font-tech">Skills</a>
        <a href="{{ request()->is('cv') ? '/#projects' : '#projects' }}" class="nav-link px-4 py-2 text-xs font-bold uppercase tracking-wider text-charcoalText hover:bg-charcoalText hover:text-creamBg rounded-full transition-all duration-300 font-tech">Work</a>
        <a href="/cv" class="nav-link px-4 py-2 text-xs font-bold uppercase tracking-wider text-charcoalText hover:bg-charcoalText hover:text-creamBg rounded-full transition-all duration-300 font-tech {{ request()->is('cv') ? 'nav-link-active' : '' }}">CV</a>
        <a href="{{ request()->is('cv') ? '/#contact' : '#contact' }}" class="nav-link px-4 py-2 text-xs font-bold uppercase tracking-wider text-charcoalText hover:bg-charcoalText hover:text-creamBg rounded-full transition-all duration-300 font-tech">Contact</a>
    </nav>

    <!-- Livewire Scripts -->
    @livewireScripts

    <!-- Core Interactive JavaScript -->
    <script>
        document.addEventListener('DOMContentLoaded', () => {
            // ----------------------------------------------------
            // 00. THEME SWITCHER LOGIC
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

            // ----------------------------------------------------
            // 0. PRELOADER LOADING COUNTER & TRANSITION
            // ----------------------------------------------------
            const preloader = document.getElementById('preloader');
            const preloaderBar = document.getElementById('preloader-bar');
            const preloaderText = document.getElementById('preloader-text');
            const preloaderPercent = document.getElementById('preloader-percent');

            if (preloader && preloaderBar && preloaderText && preloaderPercent) {
                // Lock scrolling on page load
                document.body.style.overflow = 'hidden';
                
                let progress = 0;
                const loadingTexts = [
                    { limit: 25, label: 'initializing system' },
                    { limit: 55, label: 'building grid sections' },
                    { limit: 85, label: 'rendering creative modules' },
                    { limit: 100, label: 'welcome sequence' }
                ];

                const preloaderTimer = setInterval(() => {
                    progress += Math.floor(Math.random() * 4) + 1;
                    if (progress >= 100) {
                        progress = 100;
                        clearInterval(preloaderTimer);

                        preloaderBar.style.width = '100%';
                        preloaderPercent.textContent = '100%';
                        preloaderText.textContent = 'welcome';

                        setTimeout(() => {
                            preloader.classList.add('preloader-hidden');
                            document.body.style.overflow = ''; // Unlock scroll

                            // Staggered reveal of hero slide-up texts
                            const titleLines = document.querySelectorAll('.hero-slide-up');
                            titleLines.forEach((el) => {
                                el.classList.add('revealed');
                            });
                        }, 600);
                    } else {
                        preloaderBar.style.width = `${progress}%`;
                        preloaderPercent.textContent = `${progress.toString().padStart(2, '0')}%`;

                        const currentStep = loadingTexts.find(step => progress <= step.limit);
                        if (currentStep && preloaderText.textContent !== currentStep.label) {
                            preloaderText.textContent = currentStep.label;
                        }
                    }
                }, 35);
            }

            // ----------------------------------------------------
            // 1. CUSTOM CURSOR WITH LERP DELAY
            // ----------------------------------------------------
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

                // Mouse hover scaling trigger
                function attachHoverListeners() {
                    const hoverables = document.querySelectorAll('a, button, input, textarea, select, .project-card, [role="button"], .carousel-slide');
                    hoverables.forEach(item => {
                        // Avoid duplicates
                        item.removeEventListener('mouseenter', addHoverClass);
                        item.removeEventListener('mouseleave', removeHoverClass);
                        item.addEventListener('mouseenter', addHoverClass);
                        item.addEventListener('mouseleave', removeHoverClass);
                    });
                }
                
                function addHoverClass() {
                    cursor.classList.add('hovered');
                }
                
                function removeHoverClass() {
                    cursor.classList.remove('hovered');
                }

                // Initial attach
                attachHoverListeners();

                // Re-attach listeners on Livewire DOM updates
                document.addEventListener('livewire:navigated', attachHoverListeners);
                document.addEventListener('livewire:load', attachHoverListeners);
                window.addEventListener('livewire:update', attachHoverListeners);
            }

            // ----------------------------------------------------
            // 2. HERO TYPING CYCLE
            // ----------------------------------------------------
            const typeTarget = document.getElementById('typing-target');
            const roles = [
                "Informatics Engineering Student",
                "Full-Stack Developer",
                "Game Dev Enthusiast"
            ];
            let roleIndex = 0;
            let charIndex = 0;
            let isDeleting = false;
            let typingDelay = 100;
            let erasingDelay = 50;
            let newRoleDelay = 2000;

            function typeEffect() {
                if (!typeTarget) return;
                const currentRole = roles[roleIndex];

                if (isDeleting) {
                    typeTarget.textContent = currentRole.substring(0, charIndex - 1);
                    charIndex--;
                    typingDelay = erasingDelay;
                } else {
                    typeTarget.textContent = currentRole.substring(0, charIndex + 1);
                    charIndex++;
                    typingDelay = 100;
                }

                if (!isDeleting && charIndex === currentRole.length) {
                    isDeleting = true;
                    typingDelay = newRoleDelay;
                } else if (isDeleting && charIndex === 0) {
                    isDeleting = false;
                    roleIndex = (roleIndex + 1) % roles.length;
                    typingDelay = 500;
                }

                setTimeout(typeEffect, typingDelay);
            }

            if (typeTarget) {
                setTimeout(typeEffect, 1000);
            }

            // ----------------------------------------------------
            // 3. SCROLL REVEAL TRIGGERS
            // ----------------------------------------------------
            const scrollElements = document.querySelectorAll('.scroll-reveal');
            
            const elementInView = (el, dividend = 1) => {
                const elementTop = el.getBoundingClientRect().top;
                return (
                    elementTop <= (window.innerHeight || document.documentElement.clientHeight) / dividend
                );
            };

            const displayScrollElement = (element) => {
                element.classList.add('revealed');
            };

            const handleScrollAnimation = () => {
                scrollElements.forEach((el) => {
                    if (elementInView(el, 1.15)) {
                        displayScrollElement(el);
                    }
                });
            };

            window.addEventListener('scroll', handleScrollAnimation);
            handleScrollAnimation();

            // ----------------------------------------------------
            // 4. SCROLLSPY ACTIVE LINK
            // ----------------------------------------------------
            const sections = document.querySelectorAll('section');
            const navLinks = document.querySelectorAll('.nav-link');

            function scrollSpy() {
                let currentSection = '';
                
                sections.forEach(section => {
                    const sectionTop = section.offsetTop;
                    const sectionHeight = section.offsetHeight;
                    if (window.scrollY >= sectionTop - 250) {
                        currentSection = section.getAttribute('id');
                    }
                });

                navLinks.forEach(link => {
                    link.classList.remove('nav-link-active');
                    if (link.getAttribute('href') === `#${currentSection}`) {
                        link.classList.add('nav-link-active');
                    }
                });
            }

            window.addEventListener('scroll', scrollSpy);
            scrollSpy();
        });
    </script>
</body>
</html>
