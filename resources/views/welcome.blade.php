<x-layouts.app>
  <!-- Scroll Progress Indicator -->
  <div id="scroll-progress" class="fixed top-0 left-0 h-[3px] bg-cobaltBlue z-[99999] transition-all duration-75" style="width: 0%"></div>

  <!-- CUSTOM CURSOR -->
  <div id="custom-cursor" class="hidden md:block"></div>
  <div id="custom-cursor-dot" class="hidden md:block"></div>

  <!-- Interaction Canvas Overlay for Particle Effects -->
  <canvas id="interaction-canvas" class="fixed inset-0 w-full h-full pointer-events-none z-[9999]"></canvas>

  <!-- PRELOADER INTRO OVERLAY -->
  <div id="preloader" class="fixed inset-0 w-full h-full bg-[#121212] text-creamBg dark:text-charcoalText z-50 flex flex-col justify-between p-8 md:p-16 transition-transform duration-1000">
    <div class="flex justify-between items-center font-tech text-[10px] uppercase font-bold tracking-widest opacity-60">
      <span>[ Valdric.sys ]</span>
      <span>Boot sequence in progress</span>
    </div>
    
    <div class="my-auto flex flex-col items-start justify-center">
      <h1 class="text-4xl md:text-7xl font-extrabold tracking-tighter uppercase font-tech leading-[0.85] mb-4 overflow-hidden">
        <span id="preloader-text" class="inline-block transition-all duration-300">initializing</span>
      </h1>
      <div class="w-48 md:w-64 h-[1.5px] bg-creamBg/20 dark:bg-charcoalText/20 relative mt-4 overflow-hidden">
        <div id="preloader-bar" class="absolute left-0 top-0 h-full bg-cobaltBlue transition-all duration-150" style="width: 0%"></div>
      </div>
    </div>

    <div class="flex justify-between items-end font-tech font-bold text-3xl md:text-5xl uppercase tracking-tighter">
      <span>Loading</span>
      <span id="preloader-percent">00%</span>
    </div>
  </div>

  <!-- TOP STATUS HEADER -->
  <header class="w-full border-b-2 border-charcoalText bg-creamBg px-6 md:px-12 py-6 flex justify-between items-center z-30 relative font-tech">
    <a href="#hero" class="text-xl md:text-2xl font-extrabold tracking-tighter uppercase flex items-center space-x-1.5">
      <span class="px-2 py-0.5 bg-charcoalText text-creamBg rounded-sm">V</span>
      <span>Abirama</span>
    </a>
    
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

  <!-- HERO SECTION -->
  <section id="hero" class="min-h-[90vh] flex flex-col justify-between pt-16 pb-24 px-6 md:px-12 border-b-2 border-charcoalText relative z-10">
    <div class="max-w-7xl mx-auto w-full my-auto flex flex-col items-start justify-center">
      <span class="text-xs font-bold uppercase tracking-widest text-charcoalText/60 mb-6 font-tech block">[ portfolio.2026 ]</span>

      <h1 class="text-5xl md:text-8xl lg:text-9xl font-extrabold tracking-tighter uppercase leading-[0.85] mb-8 font-tech text-left flex flex-col">
        <span class="block overflow-hidden"><span class="block translate-y-full hero-slide-up">valdric</span></span>
        <span class="block overflow-hidden"><span class="block translate-y-full hero-slide-up" style="transition-delay: 0.1s">abirama</span></span>
        <span class="block overflow-hidden"><span class="block translate-y-full hero-slide-up text-cobaltBlue" style="transition-delay: 0.2s">pranaja</span></span>
        <span class="block overflow-hidden"><span class="block translate-y-full hero-slide-up text-cobaltBlue" style="transition-delay: 0.3s">dandi</span></span>
      </h1>

      <p class="text-xl md:text-3xl font-tech font-bold uppercase tracking-tight text-charcoalText/85 mb-10 text-left border-l-4 border-charcoalText pl-4">
        a <span id="typing-target" class="text-cobaltBlue"></span>
      </p>

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

  <!-- INFINITE RUNNING MARQUEE -->
  <div class="w-full bg-[#121212] text-creamBg dark:text-charcoalText py-4 border-b-2 border-charcoalText overflow-hidden marquee-container font-tech uppercase font-bold text-xs md:text-sm tracking-widest z-10 relative">
    <div class="marquee-content flex space-x-12">
      <span>Informatics Engineering student ✦ Full Stack Developer ✦ Game Dev Enthusiast ✦ Flutter Specialist ✦ Unity 2D/3D ✦ Web & Mobile Systems ✦ Pixel Art Animator ✦ C# Scripting ✦ Itch.io Publisher ✦</span>
      <span>Informatics Engineering student ✦ Full Stack Developer ✦ Game Dev Enthusiast ✦ Flutter Specialist ✦ Unity 2D/3D ✦ Web & Mobile Systems ✦ Pixel Art Animator ✦ C# Scripting ✦ Itch.io Publisher ✦</span>
    </div>
  </div>

  <!-- ABOUT ME SECTION -->
  <section id="about" class="py-24 px-6 md:px-12 border-b-2 border-charcoalText scroll-reveal relative z-10">
    <div class="max-w-7xl mx-auto">
      <div class="flex items-center space-x-3 mb-16 font-tech">
        <span class="text-sm font-bold text-cobaltBlue">01 /</span>
        <h2 class="text-3xl md:text-4xl font-extrabold uppercase tracking-tighter">About Valdric</h2>
      </div>

      <div class="grid grid-cols-1 lg:grid-cols-12 gap-12 items-start">
        <div class="lg:col-span-5 flex justify-center">
          <div class="relative w-full max-w-sm group border-2 border-charcoalText p-2 bg-creamHighlight rounded-2xl">
            <div id="avatar-frame" class="w-full aspect-square overflow-hidden border border-charcoalText rounded-xl bg-creamBg cursor-pointer transition-all relative group">
              <img id="about-avatar-img" src="public/images/valdric.jpg" alt="Valdric Abirama Pranaja Dandi" class="w-full h-full object-cover grayscale transition-all duration-300 transform group-hover:scale-105">
              <span id="avatar-mode-badge" class="absolute bottom-2 right-2 px-2 py-0.5 bg-charcoalText/85 text-creamBg text-[9px] font-tech font-bold uppercase rounded opacity-90">⚡ Click for 2D Pixel</span>
            </div>
            <div class="mt-4 flex justify-between items-center text-xs font-bold font-tech uppercase px-2 text-charcoalText">
              <span id="avatar-label">[ system.avatar ]</span>
              <span id="avatar-status-tag" class="text-cobaltBlue font-bold">REAL PHOTO</span>
            </div>
          </div>
        </div>

        <div class="lg:col-span-7 flex flex-col space-y-8">
          <h3 class="text-2xl md:text-3xl font-extrabold uppercase font-tech leading-tight text-charcoalText">
            Crafting conscious, clean, and interactive digital interfaces.
          </h3>
          <p class="text-charcoalText/85 text-base md:text-lg">
            I am an Informatics Engineering student focused on building highly functional systems. I have a deep passion for solving complex architectural problems, designing scalable full-stack web and mobile apps, and building 2D pixel-art games with rich, code-driven mechanics.
          </p>
          <p class="text-charcoalText/75 text-sm md:text-base">
            I enjoy clean grids, bold layouts, and responsive components. Following modern, print-inspired digital design principles (like those seen in elite design houses), I aim to create visual and technical clarity across every application I code.
          </p>

          <div class="grid grid-cols-2 md:grid-cols-4 border-2 border-charcoalText rounded-xl overflow-hidden text-center font-tech">
            <div class="bg-creamBg p-6 flex flex-col justify-center items-center border-r-2 border-b-2 md:border-b-0 border-charcoalText">
              <div class="text-2xl md:text-3xl font-extrabold text-cobaltBlue">3.55+</div>
              <div class="text-[9px] uppercase tracking-wider font-bold text-charcoalText/60 mt-1">GPA Score</div>
            </div>
            <div class="bg-creamBg p-6 flex flex-col justify-center items-center border-b-2 md:border-b-0 md:border-r-2 border-charcoalText">
              <div class="text-2xl md:text-3xl font-extrabold text-charcoalText">12+</div>
              <div class="text-[9px] uppercase tracking-wider font-bold text-charcoalText/60 mt-1">Projects Done</div>
            </div>
            <div class="bg-creamBg p-6 flex flex-col justify-center items-center border-r-2 border-charcoalText">
              <div class="text-2xl md:text-3xl font-extrabold text-cobaltBlue">1.5k+</div>
              <div class="text-[9px] uppercase tracking-wider font-bold text-charcoalText/60 mt-1">Hours Coded</div>
            </div>
            <div class="bg-creamBg p-6 flex flex-col justify-center items-center border-charcoalText">
              <div class="text-2xl md:text-3xl font-extrabold text-charcoalText">4+</div>
              <div class="text-[9px] uppercase tracking-wider font-bold text-charcoalText/60 mt-1">Game Jams</div>
            </div>
          </div>
        </div>
      </div>
    </div>
  </section>

  <!-- SKILLS SECTION -->
  <section id="skills" class="py-24 px-6 md:px-12 border-b-2 border-charcoalText scroll-reveal relative z-10">
    <div class="max-w-7xl mx-auto">
      <div class="flex items-center space-x-3 mb-16 font-tech">
        <span class="text-sm font-bold text-cobaltBlue">02 /</span>
        <h2 class="text-3xl md:text-4xl font-extrabold uppercase tracking-tighter">Core Competencies</h2>
      </div>

      <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 xl:grid-cols-5 gap-6">
        <div class="border-2 border-charcoalText p-8 rounded-2xl bg-creamBg hover:bg-creamHighlight transition-all duration-300 flex flex-col justify-between space-y-8">
          <div>
            <div class="text-xs font-bold uppercase tracking-wider text-charcoalText/50 font-tech mb-4">[ ➊ Languages ]</div>
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

        <div class="border-2 border-charcoalText p-8 rounded-2xl bg-creamBg hover:bg-pastelPink transition-all duration-300 flex flex-col justify-between space-y-8">
          <div>
            <div class="text-xs font-bold uppercase tracking-wider text-charcoalText/50 font-tech mb-4">[ ➋ Interfaces ]</div>
            <h3 class="text-xl font-bold font-tech mb-4 uppercase">Frontend</h3>
            <ul class="space-y-2 font-bold text-xs uppercase tracking-wide text-charcoalText/85 font-tech">
              <li>✦ HTML5 / CSS3</li>
              <li>✦ Tailwind CSS</li>
              <li>✦ React.js</li>
              <li>✦ User Interface Layouts</li>
            </ul>
          </div>
        </div>

        <div class="border-2 border-charcoalText p-8 rounded-2xl bg-creamBg hover:bg-creamHighlight transition-all duration-300 flex flex-col justify-between space-y-8">
          <div>
            <div class="text-xs font-bold uppercase tracking-wider text-charcoalText/50 font-tech mb-4">[ ➌ Mobile & Game ]</div>
            <h3 class="text-xl font-bold font-tech mb-4 uppercase">Interactive</h3>
            <ul class="space-y-2 font-bold text-xs uppercase tracking-wide text-charcoalText/85 font-tech">
              <li>✦ Flutter Framework</li>
              <li>✦ Unity Engine 2D/3D</li>
              <li>✦ Aseprite Drawing</li>
              <li>✦ Animation States</li>
            </ul>
          </div>
        </div>

        <div class="border-2 border-charcoalText p-8 rounded-2xl bg-creamBg hover:bg-cobaltBlue/25 transition-all duration-300 flex flex-col justify-between space-y-8">
          <div>
            <div class="text-xs font-bold uppercase tracking-wider text-charcoalText/50 font-tech mb-4">[ ➍ Databases ]</div>
            <h3 class="text-xl font-bold font-tech mb-4 uppercase">Databases & Tools</h3>
            <ul class="space-y-2 font-bold text-xs uppercase tracking-wide text-charcoalText/85 font-tech">
              <li>✦ SQL Relational</li>
              <li>✦ Git Version Control</li>
              <li>✦ GitHub Repos</li>
              <li>✦ Rest API Services</li>
            </ul>
          </div>
        </div>

        <div class="border-2 border-charcoalText p-8 rounded-2xl bg-creamBg hover:bg-pastelPink/25 transition-all duration-300 flex flex-col justify-between space-y-8">
          <div>
            <div class="text-xs font-bold uppercase tracking-wider text-charcoalText/50 font-tech mb-4">[ ➎ Creative Media ]</div>
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

  <!-- FEATURED PROJECTS -->
  <section id="projects" class="py-24 px-6 md:px-12 border-b-2 border-charcoalText scroll-reveal overflow-hidden relative z-10">
    <div class="max-w-7xl mx-auto flex flex-col space-y-16">
      <div class="flex flex-col sm:flex-row justify-between items-start sm:items-center space-y-4 sm:space-y-0">
        <div class="flex items-center space-x-3 font-tech">
          <span class="text-sm font-bold text-cobaltBlue">03 /</span>
          <h2 class="text-3xl md:text-4xl font-extrabold uppercase tracking-tighter">Featured Work</h2>
        </div>
        <div class="flex space-x-4 font-tech z-20">
          <button id="carousel-prev" class="w-12 h-12 rounded-full border-2 border-charcoalText flex items-center justify-center font-bold hover:bg-charcoalText hover:text-creamBg transition-all duration-300" aria-label="Previous Project">
            ←
          </button>
          <button id="carousel-next" class="w-12 h-12 rounded-full border-2 border-charcoalText flex items-center justify-center font-bold hover:bg-charcoalText hover:text-creamBg transition-all duration-300" aria-label="Next Project">
            →
          </button>
        </div>
      </div>

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

      <div id="project-scroll-container" class="horizontal-scroll-container flex gap-6 pb-6 select-none cursor-grab">
        @foreach($projects as $p)
          <div class="carousel-slide flex-none w-[300px] md:w-[380px] border-2 border-charcoalText rounded-2xl overflow-hidden bg-creamBg hover-lift transition-all duration-300 flex flex-col justify-between" data-category="{{ in_array('Flutter', $p->tags ?? []) ? 'web' : (in_array('Laravel', $p->tags ?? []) || in_array('HTML5', $p->tags ?? []) ? 'web' : 'game') }}">
            <div class="w-full h-40 overflow-hidden border-b-2 border-charcoalText bg-neutral-900 relative">
              <img src="{{ asset('public/images/' . ($p->image ?? 'gosir.jpg')) }}" alt="{{ $p->title }}" class="w-full h-full object-cover grayscale hover:grayscale-0 transition-all duration-500 transform hover:scale-105">
              <div class="absolute top-3 right-3 px-2 py-0.5 bg-charcoalText text-creamBg text-[8px] font-bold font-tech uppercase tracking-wider rounded border border-charcoalText/20">
                {{ $p->tags[0] ?? 'Project' }}
              </div>
            </div>

            <div class="p-6 flex-1 flex flex-col justify-between">
              <div>
                <div class="text-[9px] font-bold uppercase tracking-wider text-cobaltBlue font-tech mb-2">[ Featured ]</div>
                <h3 class="text-xl font-extrabold font-tech text-charcoalText uppercase mb-2 line-clamp-1">{{ $p->title }}</h3>
                <p class="text-charcoalText/75 text-xs leading-relaxed mb-4 line-clamp-3">
                  {{ $p->description }}
                </p>
                <div class="flex flex-wrap gap-1.5">
                  @foreach($p->tags ?? [] as $tag)
                    <span class="px-2 py-0.5 border border-charcoalText/20 text-charcoalText/80 text-[8px] font-bold tracking-wider font-tech uppercase rounded">{{ $tag }}</span>
                  @endforeach
                </div>
              </div>

              <div class="flex justify-between items-center text-[10px] font-bold uppercase tracking-wider font-tech pt-4 border-t border-charcoalText/10 mt-4 z-20">
                <a href="{{ $p->external_url }}" target="_blank" class="text-cobaltBlue hover:underline transition-all font-bold">Visit ↗</a>
                <a href="https://github.com/Valdric" target="_blank" class="hover:text-cobaltBlue transition-colors">Github ↗</a>
              </div>
            </div>
          </div>
        @endforeach
      </div>
    </div>
  </section>

  <!-- LIBRARY SECTION -->
  <section id="library" class="py-24 px-6 md:px-12 border-b-2 border-charcoalText scroll-reveal relative z-10">
    <div class="max-w-7xl mx-auto space-y-16">
      <div class="flex flex-col sm:flex-row justify-between items-start sm:items-center space-y-4 sm:space-y-0">
        <div class="flex items-center space-x-3 font-tech">
          <span class="text-sm font-bold text-cobaltBlue">04 /</span>
          <h2 class="text-3xl md:text-4xl font-extrabold uppercase tracking-tighter">Library of Valdric</h2>
        </div>
      </div>

      <div class="flex flex-wrap gap-3 font-tech text-xs font-bold uppercase tracking-wider z-20 relative">
        <button data-lib-filter="all" class="lib-filter-btn px-5 py-2.5 border-2 border-charcoalText bg-charcoalText text-creamBg rounded-full transition-all duration-300">
          [ All Highlights ]
        </button>
        <button data-lib-filter="ba" class="lib-filter-btn px-5 py-2.5 border-2 border-charcoalText bg-creamBg hover:bg-charcoalText hover:text-creamBg text-charcoalText rounded-full transition-all duration-300">
          [ Brand Ambassador ]
        </button>
        <button data-lib-filter="hmtif" class="lib-filter-btn px-5 py-2.5 border-2 border-charcoalText bg-creamBg hover:bg-charcoalText hover:text-creamBg text-charcoalText rounded-full transition-all duration-300">
          [ Staff HMTIF ]
        </button>
        <button data-lib-filter="gdgoc" class="lib-filter-btn px-5 py-2.5 border-2 border-charcoalText bg-creamBg hover:bg-charcoalText hover:text-creamBg text-charcoalText rounded-full transition-all duration-300">
          [ Head GDGOC ]
        </button>
        <button data-lib-filter="ggj" class="lib-filter-btn px-5 py-2.5 border-2 border-charcoalText bg-creamBg hover:bg-charcoalText hover:text-creamBg text-charcoalText rounded-full transition-all duration-300">
          [ Game Jam ]
        </button>
      </div>

      <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-3 gap-6 relative z-10">
        <div class="lib-card border-2 border-charcoalText rounded-2xl overflow-hidden bg-creamBg p-3 hover-lift shadow-sm cursor-pointer group" 
             data-lib-cat="ba"
             data-lib-index="1"
             data-lib-title="Brand Ambassador FT Unpas"
             data-lib-role="Valdric as Brand Ambassador (Duta Kampus)"
             data-lib-org="Fakultas Teknik Unpas"
             data-lib-img="public/images/library_4.jpg"
             data-lib-desc="Selected as the Brand Ambassador of the Faculty of Engineering, Universitas Pasundan."
             data-lib-points="Public Relations & Hosting;High School Socialization Roadshows;Official University Marketing Campaigns">
          <div class="w-full aspect-[4/5] overflow-hidden rounded-xl border border-charcoalText/10 bg-neutral-900">
            <img src="public/images/library_4.jpg" alt="Brand Ambassador Portrait" class="w-full h-full object-cover grayscale group-hover:grayscale-0 transition-all duration-500 transform group-hover:scale-105">
          </div>
          <div class="mt-3 flex justify-between items-center font-tech text-[10px] font-bold uppercase tracking-wider text-charcoalText/60">
            <span>[ Sash Portrait ]</span>
            <span class="text-cobaltBlue">FT Unpas</span>
          </div>
        </div>
      </div>
    </div>
  </section>

  <!-- CONTACT SECTION -->
  <section id="contact" class="py-24 px-6 md:px-12 scroll-reveal relative z-10">
    <div class="max-w-7xl mx-auto">
      <div class="flex items-center space-x-3 mb-16 font-tech">
        <span class="text-sm font-bold text-cobaltBlue">05 /</span>
        <h2 class="text-3xl md:text-4xl font-extrabold uppercase tracking-tighter">Connection</h2>
      </div>

      <div class="grid grid-cols-1 lg:grid-cols-12 gap-12">
        <div class="lg:col-span-5 flex flex-col justify-between">
          <div class="space-y-6">
            <h3 class="text-3xl font-extrabold uppercase font-tech leading-tight text-charcoalText">Got a design or dev challenge?</h3>
            <p class="text-charcoalText/85 text-sm leading-relaxed">
              I am open to discussions, application development roles, or general engineering questions.
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

          <div class="pt-8 lg:pt-0 font-tech font-bold uppercase">
            <span class="text-[10px] block text-charcoalText/50 tracking-wider mb-4">Follow Systems</span>
            <div class="flex space-x-6 text-sm">
              <a href="https://github.com/Valdric" target="_blank" class="hover:text-cobaltBlue transition-all">Github ↗</a>
              <a href="https://www.linkedin.com/in/valdric-abirama-pranaja-dandi-2a1110298/?skipRedirect=true" target="_blank" class="hover:text-cobaltBlue transition-all">LinkedIn ↗</a>
              <a href="https://www.instagram.com/valdronout/" target="_blank" class="hover:text-cobaltBlue transition-all">Instagram ↗</a>
            </div>
          </div>
        </div>

        <div class="lg:col-span-7">
          <livewire:contact-form />
        </div>
      </div>
    </div>
  </section>

  <nav class="fixed bottom-6 left-1/2 transform -translate-x-1/2 z-40 bottom-nav-dock px-3 py-2.5 rounded-full hidden md:flex items-center justify-center space-x-1 border-2 border-charcoalText">
    <a href="#hero" class="nav-link px-3 py-2 text-[10px] font-bold uppercase tracking-wider text-charcoalText hover:bg-charcoalText hover:text-creamBg rounded-full transition-all duration-300 font-tech">Home</a>
    <a href="#about" class="nav-link px-3 py-2 text-[10px] font-bold uppercase tracking-wider text-charcoalText hover:bg-charcoalText hover:text-creamBg rounded-full transition-all duration-300 font-tech">About</a>
    <a href="#skills" class="nav-link px-3 py-2 text-[10px] font-bold uppercase tracking-wider text-charcoalText hover:bg-charcoalText hover:text-creamBg rounded-full transition-all duration-300 font-tech">Skills</a>
    <a href="#projects" class="nav-link px-3 py-2 text-[10px] font-bold uppercase tracking-wider text-charcoalText hover:bg-charcoalText hover:text-creamBg rounded-full transition-all duration-300 font-tech">Work</a>
    <a href="#library" class="nav-link px-3 py-2 text-[10px] font-bold uppercase tracking-wider text-charcoalText hover:bg-charcoalText hover:text-creamBg rounded-full transition-all duration-300 font-tech">Library</a>
    <a href="/cv" class="nav-link px-3 py-2 text-[10px] font-bold uppercase tracking-wider text-charcoalText hover:bg-charcoalText hover:text-creamBg rounded-full transition-all duration-300 font-tech">CV</a>
    <a href="#contact" class="nav-link px-3 py-2 text-[10px] font-bold uppercase tracking-wider text-charcoalText hover:bg-charcoalText hover:text-creamBg rounded-full transition-all duration-300 font-tech">Contact</a>
  </nav>

  <script src="/script.js"></script>
</x-layouts.app>
