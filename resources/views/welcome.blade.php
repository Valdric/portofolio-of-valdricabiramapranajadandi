<x-layouts.app>
    <!-- TOP STATUS HEADER -->
    <header class="w-full border-b-2 border-charcoalText bg-creamBg px-6 md:px-12 py-6 flex justify-between items-center z-30 relative font-tech">
        <!-- Brand Logo -->
        <a href="#hero" class="text-xl md:text-2xl font-extrabold tracking-tighter uppercase flex items-center space-x-1.5">
            <span class="px-2 py-0.5 bg-charcoalText text-creamBg rounded-sm">V</span>
            <span>Abirama</span>
        </a>
        
        <!-- Time & Status Info + Theme Toggle -->
        <div class="flex items-center space-x-6">
            <div class="hidden sm:flex items-center space-x-6 text-[11px] font-bold uppercase tracking-wider text-charcoalText/75">
                <div class="flex items-center">
                    <span class="w-2 h-2 rounded-full bg-emerald-500 mr-2 inline-block animate-pulse"></span>
                    <span>Open for commissions</span>
                </div>
                <div class="border-l border-charcoalText/20 h-4"></div>
                <div>
                    <span>Loc: Indonesia</span>
                </div>
            </div>
            <button id="theme-toggle-btn" class="px-4 py-2 border-2 border-charcoalText hover:bg-charcoalText hover:text-creamBg text-[10px] font-extrabold uppercase tracking-widest rounded-full transition-all duration-300">
                [ ☾ Dark ]
            </button>
        </div>
    </header>

    <!-- HERO SECTION (Spanning Large Typography) -->
    <section id="hero" class="min-h-[90vh] flex flex-col justify-between pt-16 pb-24 px-6 md:px-12 border-b-2 border-charcoalText relative z-10 bg-creamBg">
        <div class="max-w-7xl mx-auto w-full my-auto flex flex-col items-start justify-center">
            <!-- Cyberpunk Sub-title -->
            <span class="text-xs font-bold uppercase tracking-widest text-charcoalText/60 mb-6 font-tech block">[ portfolio.2026 ]</span>

            <!-- Screen-Spanning Headings -->
            <h1 class="text-5xl md:text-8xl lg:text-9xl font-extrabold tracking-tighter uppercase leading-[0.85] mb-8 font-tech text-left flex flex-col select-none">
                <span class="block overflow-hidden"><span class="block hero-slide-up">valdric</span></span>
                <span class="block overflow-hidden"><span class="block hero-slide-up" style="transition-delay: 0.1s">abirama</span></span>
                <span class="block overflow-hidden"><span class="block hero-slide-up text-cobaltBlue" style="transition-delay: 0.2s">pranaja</span></span>
                <span class="block overflow-hidden"><span class="block hero-slide-up text-cobaltBlue" style="transition-delay: 0.3s">dandi</span></span>
            </h1>

            <!-- Typing Animation Container -->
            <p class="text-xl md:text-3xl font-tech font-bold uppercase tracking-tight text-charcoalText/85 mb-10 text-left border-l-4 border-charcoalText pl-4">
                a <span id="typing-target" class="text-cobaltBlue"></span>
            </p>

            <!-- CTA Buttons Block -->
            <div class="flex flex-wrap gap-4 z-20">
                <a href="#projects" class="px-8 py-4 bg-charcoalText hover:bg-cobaltBlue text-creamBg font-extrabold text-sm uppercase tracking-wider rounded-full transition-all duration-300 font-tech">
                    [ View Projects ]
                </a>
                <a href="/cv" class="px-8 py-4 bg-creamHighlight hover:bg-cobaltBlue hover:text-creamBg text-charcoalText border-2 border-charcoalText font-extrabold text-sm uppercase tracking-wider rounded-full transition-all duration-300 font-tech">
                    [ View CV / Resume ]
                </a>
                <a href="#contact" class="px-8 py-4 border-2 border-charcoalText hover:bg-creamHighlight text-charcoalText font-extrabold text-sm uppercase tracking-wider rounded-full transition-all duration-300 font-tech">
                    [ Let's Talk ]
                </a>
            </div>
        </div>
    </section>

    <!-- INFINITE RUNNING MARQUEE (Poch Studio detail) -->
    <div class="w-full bg-[#121212] text-creamBg py-4 border-b-2 border-charcoalText overflow-hidden marquee-container font-tech uppercase font-bold text-xs md:text-sm tracking-widest z-10 relative">
        <div class="marquee-content flex space-x-12">
            <span>Informatics Engineering student ✦ Full Stack Developer ✦ Game Dev Enthusiast ✦ Flutter Specialist ✦ Web & Mobile Systems ✦ Unity Sandbox ✦</span>
            <span>Informatics Engineering student ✦ Full Stack Developer ✦ Game Dev Enthusiast ✦ Flutter Specialist ✦ Web & Mobile Systems ✦ Unity Sandbox ✦</span>
        </div>
    </div>

    <!-- ABOUT ME SECTION (Editorial Grid) -->
    <section id="about" class="py-24 px-6 md:px-12 border-b-2 border-charcoalText scroll-reveal relative z-10 bg-creamBg">
        <div class="max-w-7xl mx-auto">
            <div class="flex items-center space-x-3 mb-16 font-tech">
                <span class="text-sm font-bold text-cobaltBlue">01 /</span>
                <h2 class="text-3xl md:text-4xl font-extrabold uppercase tracking-tighter">About Valdric</h2>
            </div>

            <!-- Grid Columns -->
            <div class="grid grid-cols-1 lg:grid-cols-12 gap-12 items-start">
                
                <!-- Avatar Block Left -->
                <div class="lg:col-span-5 flex justify-center">
                    <div class="relative w-full max-w-sm group border-2 border-charcoalText p-2 bg-creamHighlight rounded-2xl">
                        <!-- Frame Container -->
                        <div class="w-full aspect-square overflow-hidden border border-charcoalText rounded-xl bg-creamBg">
                            <img src="/images/valdric.jpg" alt="Valdric Abirama Pranaja Dandi" class="w-full h-full object-cover grayscale transition-all duration-500 transform group-hover:scale-105 group-hover:grayscale-0">
                        </div>
                        <!-- Subtitle -->
                        <div class="mt-4 flex justify-between items-center text-xs font-bold font-tech uppercase px-2 text-charcoalText">
                            <span>[ system.avatar ]</span>
                            <span>Informatics student</span>
                        </div>
                    </div>
                </div>

                <!-- Bio Details Right -->
                <div class="lg:col-span-7 flex flex-col space-y-8">
                    <h3 class="text-2xl md:text-3xl font-extrabold uppercase font-tech leading-tight text-charcoalText">
                        Crafting conscious, clean, and interactive digital interfaces.
                    </h3>
                    <p class="text-charcoalText/85 text-base md:text-lg leading-relaxed">
                        I am an Informatics Engineering student focused on building highly functional systems. I have a deep passion for solving complex architectural problems, designing scalable full-stack web and mobile apps, and building 2D pixel-art games with rich, code-driven mechanics.
                    </p>
                    <p class="text-charcoalText/75 text-sm md:text-base leading-relaxed">
                        I enjoy clean grids, bold layouts, and responsive components. Following modern, print-inspired digital design principles (like those seen in elite design houses), I aim to create visual and technical clarity across every application I code.
                    </p>

                    <!-- Stats Grid Layout -->
                    <div class="grid grid-cols-2 md:grid-cols-4 border-2 border-charcoalText rounded-xl overflow-hidden divide-x-2 divide-y-2 md:divide-y-0 divide-charcoalText text-center font-tech bg-creamBg">
                        <!-- Stat -->
                        <div class="p-6 flex flex-col justify-center items-center">
                            <div class="text-2xl md:text-3xl font-extrabold text-cobaltBlue">3.71+</div>
                            <div class="text-[9px] uppercase tracking-wider font-bold text-charcoalText/60 mt-1">GPA Score</div>
                        </div>
                        <!-- Stat -->
                        <div class="p-6 flex flex-col justify-center items-center">
                            <div class="text-2xl md:text-3xl font-extrabold text-charcoalText">12+</div>
                            <div class="text-[9px] uppercase tracking-wider font-bold text-charcoalText/60 mt-1">Projects Done</div>
                        </div>
                        <!-- Stat -->
                        <div class="p-6 flex flex-col justify-center items-center">
                            <div class="text-2xl md:text-3xl font-extrabold text-cobaltBlue">1.5k+</div>
                            <div class="text-[9px] uppercase tracking-wider font-bold text-charcoalText/60 mt-1">Hours Coded</div>
                        </div>
                        <!-- Stat -->
                        <div class="p-6 flex flex-col justify-center items-center">
                            <div class="text-2xl md:text-3xl font-extrabold text-charcoalText">4+</div>
                            <div class="text-[9px] uppercase tracking-wider font-bold text-charcoalText/60 mt-1">Game Jams</div>
                        </div>
                    </div>
                </div>

            </div>
        </div>
    </section>

    <!-- TECH STACK & SKILLS SECTION (Clean Box Grid) -->
    <section id="skills" class="py-24 px-6 md:px-12 border-b-2 border-charcoalText scroll-reveal relative z-10 bg-creamBg">
        <div class="max-w-7xl mx-auto">
            <div class="flex items-center space-x-3 mb-16 font-tech">
                <span class="text-sm font-bold text-cobaltBlue">02 /</span>
                <h2 class="text-3xl md:text-4xl font-extrabold uppercase tracking-tighter">Core Competencies</h2>
            </div>

            <!-- Grid Cards -->
            <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 xl:grid-cols-5 gap-6">
                
                <!-- Grid item 1: Languages -->
                <div class="border-2 border-charcoalText p-8 rounded-2xl bg-creamBg hover:bg-creamHighlight transition-all duration-300 flex flex-col justify-between space-y-8">
                    <div>
                        <div class="text-[10px] font-bold uppercase tracking-wider text-charcoalText/50 font-tech mb-4">[ ➊ Languages ]</div>
                        <h3 class="text-xl font-bold font-tech mb-4 uppercase">Core Code</h3>
                        <ul class="space-y-2 font-bold text-xs uppercase tracking-wide text-charcoalText/85 font-tech">
                            <li>✦ JavaScript</li>
                            <li>✦ Python</li>
                            <li>✦ C++ / C#</li>
                            <li>✦ Dart</li>
                            <li>✦ PHP</li>
                        </ul>
                    </div>
                </div>

                <!-- Grid item 2: Frontend -->
                <div class="border-2 border-charcoalText p-8 rounded-2xl bg-creamBg hover:bg-pastelPink transition-all duration-300 flex flex-col justify-between space-y-8">
                    <div>
                        <div class="text-[10px] font-bold uppercase tracking-wider text-charcoalText/50 font-tech mb-4">[ ➋ Interfaces ]</div>
                        <h3 class="text-xl font-bold font-tech mb-4 uppercase">Frontend</h3>
                        <ul class="space-y-2 font-bold text-xs uppercase tracking-wide text-charcoalText/85 font-tech">
                            <li>✦ HTML5 / CSS3</li>
                            <li>✦ Tailwind CSS</li>
                            <li>✦ React.js</li>
                            <li>✦ User Interface Layouts</li>
                        </ul>
                    </div>
                </div>

                <!-- Grid item 3: Mobile & Game -->
                <div class="border-2 border-charcoalText p-8 rounded-2xl bg-creamBg hover:bg-creamHighlight transition-all duration-300 flex flex-col justify-between space-y-8">
                    <div>
                        <div class="text-[10px] font-bold uppercase tracking-wider text-charcoalText/50 font-tech mb-4">[ ➌ Mobile & Game ]</div>
                        <h3 class="text-xl font-bold font-tech mb-4 uppercase">Interactive</h3>
                        <ul class="space-y-2 font-bold text-xs uppercase tracking-wide text-charcoalText/85 font-tech">
                            <li>✦ Flutter Framework</li>
                            <li>✦ Unity Engine 2D/3D</li>
                            <li>✦ Aseprite Drawing</li>
                            <li>✦ Animation States</li>
                        </ul>
                    </div>
                </div>

                <!-- Grid item 4: Tools & Backend -->
                <div class="border-2 border-charcoalText p-8 rounded-2xl bg-creamBg hover:bg-cobaltBlue/25 transition-all duration-300 flex flex-col justify-between space-y-8">
                    <div>
                        <div class="text-[10px] font-bold uppercase tracking-wider text-charcoalText/50 font-tech mb-4">[ ➍ Databases ]</div>
                        <h3 class="text-xl font-bold font-tech mb-4 uppercase">Databases & Tools</h3>
                        <ul class="space-y-2 font-bold text-xs uppercase tracking-wide text-charcoalText/85 font-tech">
                            <li>✦ SQL Relational</li>
                            <li>✦ Git Version Control</li>
                            <li>✦ GitHub Repos</li>
                            <li>✦ Rest API Services</li>
                        </ul>
                    </div>
                </div>

                <!-- Grid item 5: Creative Media -->
                <div class="border-2 border-charcoalText p-8 rounded-2xl bg-creamBg hover:bg-pastelPink/25 transition-all duration-300 flex flex-col justify-between space-y-8">
                    <div>
                        <div class="text-[10px] font-bold uppercase tracking-wider text-charcoalText/50 font-tech mb-4">[ ➎ Creative Media ]</div>
                        <h3 class="text-xl font-bold font-tech mb-4 uppercase">Video Editing</h3>
                        <ul class="space-y-2 font-bold text-xs uppercase tracking-wide text-charcoalText/85 font-tech">
                            <li>✦ DaVinci Resolve</li>
                            <li>✦ CapCut Editor</li>
                            <li>✦ Alight Motion</li>
                            <li>✦ Motion Graphics</li>
                        </ul>
                    </div>
                </div>

            </div>
        </div>
    </section>

    <!-- FEATURED PROJECTS SECTION (Horizontal Slider Carousel) -->
    <section id="projects" class="py-24 px-6 md:px-12 border-b-2 border-charcoalText scroll-reveal overflow-hidden relative z-10 bg-creamBg">
        <div class="max-w-7xl mx-auto flex flex-col space-y-16">
            
            <!-- Section Header with Controls -->
            <div class="flex flex-col sm:flex-row justify-between items-start sm:items-center space-y-4 sm:space-y-0">
                <div class="flex items-center space-x-3 font-tech">
                    <span class="text-sm font-bold text-cobaltBlue">03 /</span>
                    <h2 class="text-3xl md:text-4xl font-extrabold uppercase tracking-tighter">Featured Work</h2>
                </div>
                
                <!-- Navigation Buttons -->
                <div class="flex space-x-4 font-tech z-20">
                    <button id="carousel-prev" class="w-12 h-12 rounded-full border-2 border-charcoalText flex items-center justify-center font-bold hover:bg-charcoalText hover:text-creamBg transition-all" aria-label="Previous Project">
                        ←
                    </button>
                    <button id="carousel-next" class="w-12 h-12 rounded-full border-2 border-charcoalText flex items-center justify-center font-bold hover:bg-charcoalText hover:text-creamBg transition-all" aria-label="Next Project">
                        →
                    </button>
                </div>
            </div>

            <!-- Project Filter Controls -->
            <div class="flex flex-wrap gap-3 font-tech text-xs font-bold uppercase tracking-wider z-20 relative">
                <button data-filter="all" class="project-filter-btn px-5 py-2.5 border-2 border-charcoalText bg-charcoalText text-creamBg rounded-full transition-all duration-300">
                    [ All Work ]
                </button>
                <button data-filter="game" class="project-filter-btn px-5 py-2.5 border-2 border-charcoalText bg-creamBg hover:bg-charcoalText hover:text-creamBg text-charcoalText rounded-full transition-all duration-300">
                    [ Game Dev ]
                </button>
                <button data-filter="web" class="project-filter-btn px-5 py-2.5 border-2 border-charcoalText bg-creamBg hover:bg-charcoalText hover:text-creamBg text-charcoalText rounded-full transition-all duration-300">
                    [ Web & Mobile ]
                </button>
            </div>

            <!-- Horizontal Scrollable Container -->
            <div id="project-scroll-container" class="horizontal-scroll-container flex gap-6 pb-6 select-none cursor-grab">
                @foreach($projects as $project)
                    @php
                        $isPhysics = false;
                        $cardBg = 'bg-creamBg';
                        $isGame = str_contains($project->external_url, 'itch.io') 
                               || str_contains($project->external_url, 'drive.google.com') 
                               || str_contains($project->external_url, 'globalgamejam.org');
                        
                        $categoryAttr = $isGame ? 'game' : 'web';
                        
                        $taglineLabel = '[ Systems ]';
                        if ($isGame) {
                            $taglineLabel = '[ Game Dev ]';
                        } elseif (str_contains($project->title, 'Cashier')) {
                            $taglineLabel = '[ Mobile POS ]';
                        } elseif (str_contains($project->title, 'Portfolio') || str_contains($project->title, 'Landing')) {
                            $taglineLabel = '[ Web Dev ]';
                        }
                        
                        $accentColor = 'text-cobaltBlue';
                        $btnText = $isGame ? (str_contains($project->external_url, 'drive.google.com') ? 'Download ↗' : 'Play Game ↗') : 'Visit Web ↗';
                    @endphp
                    
                    <div class="carousel-slide flex-none w-[300px] md:w-[380px] border-2 border-charcoalText rounded-2xl overflow-hidden {{ $cardBg }} hover-lift transition-all duration-300 flex flex-col justify-between" data-category="{{ $categoryAttr }}">
                        <!-- Project Cover Graphic -->
                        <div class="w-full h-40 overflow-hidden border-b-2 border-charcoalText bg-neutral-900 relative">
                            <img src="{{ $project->media[0] }}" alt="{{ $project->title }}" class="w-full h-full object-cover grayscale hover:grayscale-0 transition-all duration-500 transform hover:scale-105">
                            <!-- Overlay Badge -->
                            <div class="absolute top-3 right-3 px-2 py-0.5 bg-charcoalText text-creamBg text-[8px] font-bold font-tech uppercase tracking-wider rounded border border-charcoalText/20">
                                {{ $project->tags[0] }}
                            </div>
                        </div>

                        <div class="p-6 flex-1 flex flex-col justify-between">
                            <div>
                                <div class="text-[9px] font-bold uppercase tracking-wider {{ $accentColor }} font-tech mb-2">{{ $taglineLabel }}</div>
                                <h3 class="text-xl font-extrabold font-tech text-charcoalText uppercase mb-2 line-clamp-1">{{ $project->title }}</h3>
                                <p class="text-charcoalText/75 text-xs leading-relaxed mb-4 line-clamp-3">
                                    {{ $project->description }}
                                </p>
                                <div class="flex flex-wrap gap-1.5">
                                    @foreach($project->tags as $tag)
                                        <span class="px-2 py-0.5 border border-charcoalText/20 text-charcoalText/80 text-[8px] font-bold tracking-wider font-tech uppercase rounded">{{ $tag }}</span>
                                    @endforeach
                                </div>
                            </div>

                            <div class="flex justify-between items-center text-[10px] font-bold uppercase tracking-wider font-tech pt-4 border-t border-charcoalText/10 mt-4 z-20">
                                <a href="{{ $project->external_url }}" target="_blank" class="text-cobaltBlue hover:underline transition-all font-bold">{{ $btnText }}</a>
                                <a href="https://github.com/Valdric" target="_blank" class="hover:text-cobaltBlue transition-colors">Github ↗</a>
                            </div>
                        </div>
                    </div>
                @endforeach
            </div>

        </div>
    </section>

    <!-- CONTACT SECTION (Minimalist Underline Layout) -->
    <section id="contact" class="py-24 px-6 md:px-12 scroll-reveal relative z-10 bg-creamBg">
        <div class="max-w-7xl mx-auto">
            <div class="flex items-center space-x-3 mb-16 font-tech">
                <span class="text-sm font-bold text-cobaltBlue">04 /</span>
                <h2 class="text-3xl md:text-4xl font-extrabold uppercase tracking-tighter">Connection</h2>
            </div>

            <div class="grid grid-cols-1 lg:grid-cols-12 gap-12">
                
                <!-- Contact Details Left -->
                <div class="lg:col-span-5 flex flex-col justify-between">
                    <div class="space-y-6">
                        <h3 class="text-3xl font-extrabold uppercase font-tech leading-tight text-charcoalText">Got a design or dev challenge?</h3>
                        <p class="text-charcoalText/85 text-sm leading-relaxed">
                            I am open to discussions, application development roles, or general engineering questions. Send a message, and let's craft something smart.
                        </p>
                        
                        <div class="space-y-4 pt-6 text-sm font-tech uppercase font-bold text-charcoalText">
                            <div>
                                <span class="text-[10px] block text-charcoalText/50 tracking-wider font-bold mb-1">Direct Communication</span>
                                <a href="mailto:valdricapd@gmail.com" class="text-base text-cobaltBlue hover:underline">valdricapd@gmail.com</a>
                            </div>
                            <div class="pt-4">
                                <span class="text-[10px] block text-charcoalText/50 tracking-wider font-bold mb-1">Location Coordinates</span>
                                <span class="text-base">Indonesia (WIB)</span>
                            </div>
                        </div>
                    </div>

                    <!-- Social links -->
                    <div class="pt-8 lg:pt-0 font-tech font-bold uppercase">
                        <span class="text-[10px] block text-charcoalText/50 tracking-wider mb-4">Follow Systems</span>
                        <div class="flex space-x-6 text-sm">
                            <a href="https://github.com/Valdric" target="_blank" class="hover:text-cobaltBlue transition-all">Github ↗</a>
                            <a href="https://www.linkedin.com/in/valdric-abirama-pranaja-dandi" target="_blank" class="hover:text-cobaltBlue transition-all">LinkedIn ↗</a>
                            <a href="https://www.instagram.com/valdronout/" target="_blank" class="hover:text-cobaltBlue transition-all">Instagram ↗</a>
                        </div>
                    </div>
                </div>

                <!-- Forms Right -->
                <div class="lg:col-span-7">
                    <livewire:contact-form />
                </div>

            </div>
        </div>
    </section>

    <!-- FOOTER -->
    <footer class="py-12 border-t border-charcoalText/20 px-6 md:px-12 text-center text-xs font-tech font-bold uppercase tracking-widest text-charcoalText/60 mb-20 z-10 relative bg-creamBg">
        <span>&copy; 2026 Valdric Abirama Pranaja Dandi.</span>
    </footer>

    <!-- MODAL: LIGHT EDITORIAL PHYSICS SANDBOX -->
    <div id="physics-modal" class="fixed inset-0 w-full h-full bg-charcoalText/50 backdrop-blur-md hidden items-center justify-center z-50 p-6">
        <div class="w-full max-w-3xl bg-creamBg border-2 border-charcoalText rounded-2xl overflow-hidden shadow-2xl flex flex-col animate-in fade-in zoom-in duration-300">
            <!-- Header -->
            <div class="px-6 py-4 bg-creamHighlight border-b-2 border-charcoalText flex items-center justify-between font-tech">
                <h3 class="text-sm font-extrabold uppercase tracking-wider">Physics Sandbox Engine</h3>
                <button id="close-physics-btn" class="text-charcoalText hover:text-red-650 transition-colors font-bold" aria-label="Close Sandbox">
                    ✖ Close
                </button>
            </div>
            
            <!-- Canvas -->
            <div class="relative bg-creamBg flex flex-col items-center">
                <canvas id="physics-canvas" class="w-full h-[400px]"></canvas>
                <div class="absolute bottom-4 left-4 right-4 pointer-events-none flex justify-between items-center text-[9px] font-bold font-tech uppercase text-charcoalText/65 bg-creamHighlight/90 py-1.5 px-3 rounded border border-charcoalText">
                    <span>Click sandbox to spawn balls</span>
                    <span>Simulation stats: gravity 0.45</span>
                </div>
            </div>

            <!-- Footer -->
            <div class="px-6 py-4 bg-creamBg border-t-2 border-charcoalText flex justify-between items-center text-[10px] font-bold uppercase font-tech text-charcoalText">
                <span>Elastic collisions, dynamic math vectors</span>
                <button id="inject-ball-btn" class="px-3 py-1.5 border border-charcoalText bg-creamHighlight hover:bg-charcoalText hover:text-creamBg text-charcoalText transition-all">
                    Inject Ball
                </button>
            </div>
        </div>
    </div>

    <!-- JS Hooks for carousel scrolling and physics modal -->
    <script>
        document.addEventListener('DOMContentLoaded', () => {
            // ----------------------------------------------------
            // 1. HORIZONTAL PROJECTS CAROUSEL SCROLLING
            // ----------------------------------------------------
            const scrollContainer = document.getElementById('project-scroll-container');
            const prevBtn = document.getElementById('carousel-prev');
            const nextBtn = document.getElementById('carousel-next');

            if (scrollContainer && prevBtn && nextBtn) {
                function getScrollStep() {
                    const firstSlide = scrollContainer.querySelector('.carousel-slide:not(.hidden)');
                    return firstSlide ? firstSlide.offsetWidth + 24 : 350;
                }

                prevBtn.addEventListener('click', () => {
                    scrollContainer.scrollBy({
                        left: -getScrollStep(),
                        behavior: 'smooth'
                    });
                });

                nextBtn.addEventListener('click', () => {
                    scrollContainer.scrollBy({
                        left: getScrollStep(),
                        behavior: 'smooth'
                    });
                });

                // boundary lock styling
                scrollContainer.addEventListener('scroll', () => {
                    const maxScroll = scrollContainer.scrollWidth - scrollContainer.clientWidth;
                    prevBtn.style.opacity = scrollContainer.scrollLeft <= 5 ? '0.3' : '1';
                    nextBtn.style.opacity = scrollContainer.scrollLeft >= maxScroll - 5 ? '0.3' : '1';
                });
            }

            // ----------------------------------------------------
            // 1.5. PROJECTS CAROUSEL FILTERING
            // ----------------------------------------------------
            const filterBtns = document.querySelectorAll('.project-filter-btn');
            const slides = document.querySelectorAll('.carousel-slide');

            filterBtns.forEach(btn => {
                btn.addEventListener('click', () => {
                    const filter = btn.getAttribute('data-filter');

                    // Reset active button styles
                    filterBtns.forEach(b => {
                        b.classList.remove('bg-charcoalText', 'text-creamBg');
                        b.classList.add('bg-creamBg', 'text-charcoalText');
                    });
                    // Set current button active
                    btn.classList.remove('bg-creamBg', 'text-charcoalText');
                    btn.classList.add('bg-charcoalText', 'text-creamBg');

                    // Filter slides
                    slides.forEach(slide => {
                        const cat = slide.getAttribute('data-category');
                        if (filter === 'all' || cat === filter) {
                            slide.classList.remove('hidden');
                        } else {
                            slide.classList.add('hidden');
                        }
                    });

                    // Scroll back to the start of the container
                    if (scrollContainer) {
                        scrollContainer.scrollTo({
                            left: 0,
                            behavior: 'smooth'
                        });
                    }
                });
            });

            // ----------------------------------------------------
            // 2. 2D VECTOR PHYSICS ENGINE MODAL
            // ----------------------------------------------------
            const openPhysicsBtn = document.getElementById('open-physics-btn');
            const closePhysicsBtn = document.getElementById('close-physics-btn');
            const physicsModal = document.getElementById('physics-modal');
            const physicsCanvas = document.getElementById('physics-canvas');
            const injectBallBtn = document.getElementById('inject-ball-btn');
            
            let physicsAnimFrameId = null;
            let isPhysicsRunning = false;

            if (openPhysicsBtn && closePhysicsBtn && physicsModal) {
                openPhysicsBtn.addEventListener('click', (e) => {
                    e.preventDefault();
                    physicsModal.classList.remove('hidden');
                    physicsModal.classList.add('flex');
                    document.body.style.overflow = 'hidden';
                    startPhysicsSandbox();
                });

                closePhysicsBtn.addEventListener('click', () => {
                    physicsModal.classList.remove('flex');
                    physicsModal.classList.add('hidden');
                    document.body.style.overflow = '';
                    stopPhysicsSandbox();
                });

                physicsModal.addEventListener('click', (e) => {
                    if (e.target === physicsModal) {
                        physicsModal.classList.remove('flex');
                        physicsModal.classList.add('hidden');
                        document.body.style.overflow = '';
                        stopPhysicsSandbox();
                    }
                });
            }

            function startPhysicsSandbox() {
                if (!physicsCanvas) return;
                const ctx = physicsCanvas.getContext('2d');
                isPhysicsRunning = true;
                let balls = [];

                function resizePhysicsCanvas() {
                    physicsCanvas.width = physicsCanvas.parentElement.clientWidth;
                    physicsCanvas.height = 400;
                }

                resizePhysicsCanvas();
                window.addEventListener('resize', resizePhysicsCanvas);

                const gravity = 0.45;
                const friction = 0.96;

                class Ball {
                    constructor(x, y, dx, dy, radius, color) {
                        this.x = x;
                        this.y = y;
                        this.dx = dx;
                        this.dy = dy;
                        this.radius = radius;
                        this.color = color;
                        this.mass = radius;
                    }

                    draw() {
                        ctx.beginPath();
                        ctx.arc(this.x, this.y, this.radius, 0, Math.PI * 2, false);
                        ctx.fillStyle = this.color;
                        ctx.fill();
                        ctx.strokeStyle = '#121212';
                        ctx.lineWidth = 1.5;
                        ctx.stroke();
                    }

                    update() {
                        if (this.y + this.radius + this.dy > physicsCanvas.height) {
                            this.dy = -this.dy * friction;
                            this.dx = this.dx * friction;
                            this.y = physicsCanvas.height - this.radius;
                        } else {
                            this.dy += gravity;
                        }

                        if (this.x + this.radius + this.dx > physicsCanvas.width) {
                            this.dx = -this.dx * friction;
                            this.x = physicsCanvas.width - this.radius;
                        } else if (this.x - this.radius + this.dx < 0) {
                            this.dx = -this.dx * friction;
                            this.x = this.radius;
                        }

                        this.x += this.dx;
                        this.y += this.dy;
                        this.draw();
                    }
                }

                function initPhysicsEngine() {
                    balls = [];
                    const colors = ['#416afc', '#ffa5c6', '#fff6c6', '#121212'];
                    for (let i = 0; i < 8; i++) {
                        let radius = Math.random() * 15 + 15;
                        let x = Math.random() * (physicsCanvas.width - radius * 2) + radius;
                        let y = Math.random() * (physicsCanvas.height / 2);
                        let dx = (Math.random() - 0.5) * 8;
                        let dy = (Math.random() - 0.5) * 8;
                        let color = colors[Math.floor(Math.random() * colors.length)];
                        balls.push(new Ball(x, y, dx, dy, radius, color));
                    }
                }

                function checkCollisions() {
                    for (let i = 0; i < balls.length; i++) {
                        for (let j = i + 1; j < balls.length; j++) {
                            const dx = balls[j].x - balls[i].x;
                            const dy = balls[j].y - balls[i].y;
                            const distance = Math.sqrt(dx * dx + dy * dy);
                            const minDistance = balls[i].radius + balls[j].radius;

                            if (distance < minDistance) {
                                const overlap = minDistance - distance;
                                const nx = dx / distance;
                                const ny = dy / distance;

                                const totalMass = balls[i].mass + balls[j].mass;
                                balls[i].x -= nx * overlap * (balls[j].mass / totalMass);
                                balls[i].y -= ny * overlap * (balls[j].mass / totalMass);
                                balls[j].x += nx * overlap * (balls[i].mass / totalMass);
                                balls[j].y += ny * overlap * (balls[i].mass / totalMass);

                                const kx = balls[i].dx - balls[j].dx;
                                const ky = balls[i].dy - balls[j].dy;
                                const p = 2 * (nx * kx + ny * ky) / totalMass;

                                balls[i].dx -= p * balls[j].mass * nx;
                                balls[i].dy -= p * balls[j].mass * ny;
                                balls[j].dx += p * balls[i].mass * nx;
                                balls[j].dy += p * balls[i].mass * ny;
                            }
                        }
                    }
                }

                // Spawn ball handler
                function spawnBall(clientX, clientY) {
                    let rect = physicsCanvas.getBoundingClientRect();
                    let spawnX = clientX - rect.left;
                    let spawnY = clientY - rect.top;
                    
                    let radius = Math.random() * 12 + 12;
                    let colors = ['#416afc', '#ffa5c6', '#fff6c6', '#121212'];
                    let color = colors[Math.floor(Math.random() * colors.length)];
                    let dx = (Math.random() - 0.5) * 12;
                    let dy = (Math.random() - 2) * 6;
                    
                    if (balls.length > 30) {
                        balls.shift();
                    }
                    balls.push(new Ball(spawnX, spawnY, dx, dy, radius, color));
                }

                // Click to spawn on canvas
                physicsCanvas.addEventListener('mousedown', (event) => {
                    spawnBall(event.clientX, event.clientY);
                });

                // Inject ball button spawn
                injectBallBtn.onclick = () => {
                    const randomX = Math.random() * (physicsCanvas.width - 60) + 30;
                    const randomY = 50;
                    
                    let radius = Math.random() * 12 + 12;
                    let colors = ['#416afc', '#ffa5c6', '#fff6c6', '#121212'];
                    let color = colors[Math.floor(Math.random() * colors.length)];
                    let dx = (Math.random() - 0.5) * 12;
                    let dy = 2;

                    if (balls.length > 30) {
                        balls.shift();
                    }
                    balls.push(new Ball(randomX, randomY, dx, dy, radius, color));
                };

                function updatePhysicsEngine() {
                    if (!isPhysicsRunning) return;
                    ctx.clearRect(0, 0, physicsCanvas.width, physicsCanvas.height);
                    
                    // Draw editorial grid
                    ctx.strokeStyle = 'rgba(18, 18, 18, 0.04)';
                    ctx.lineWidth = 1;
                    const gridSize = 40;
                    for (let x = 0; x < physicsCanvas.width; x += gridSize) {
                        ctx.beginPath();
                        ctx.moveTo(x, 0);
                        ctx.lineTo(x, physicsCanvas.height);
                        ctx.stroke();
                    }
                    for (let y = 0; y < physicsCanvas.height; y += gridSize) {
                        ctx.beginPath();
                        ctx.moveTo(0, y);
                        ctx.lineTo(physicsCanvas.width, y);
                        ctx.stroke();
                    }

                    checkCollisions();
                    
                    balls.forEach(ball => {
                        ball.update();
                    });

                    physicsAnimFrameId = requestAnimationFrame(updatePhysicsEngine);
                }

                initPhysicsEngine();
                updatePhysicsEngine();
            }

            function stopPhysicsSandbox() {
                isPhysicsRunning = false;
                if (physicsAnimFrameId) {
                    cancelAnimationFrame(physicsAnimFrameId);
                }
            }
        });
    </script>
</x-layouts.app>
