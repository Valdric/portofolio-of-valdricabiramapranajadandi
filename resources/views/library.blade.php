<x-layouts.app>
    <!-- TOP STATUS HEADER -->
    <header class="w-full border-b-2 border-charcoalText bg-creamBg px-6 md:px-12 py-6 flex justify-between items-center z-30 relative font-tech">
        <!-- Brand Logo -->
        <a href="/" class="text-xl md:text-2xl font-extrabold tracking-tighter uppercase flex items-center space-x-1.5">
            <span class="px-2 py-0.5 bg-charcoalText text-creamBg rounded-sm">V</span>
            <span>Abirama</span>
        </a>
        
        <!-- Status & Theme Toggle -->
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

    <!-- LIBRARY HERO HEADER -->
    <section class="py-16 px-6 md:px-12 border-b-2 border-charcoalText bg-creamBg relative z-10">
        <div class="max-w-7xl mx-auto flex flex-col md:flex-row justify-between items-start md:items-end gap-6">
            <div class="space-y-4 max-w-2xl">
                <div class="flex items-center space-x-3 font-tech text-cobaltBlue text-xs font-bold uppercase tracking-widest">
                    <span>[ 📁 Library Catalog ]</span>
                </div>
                <h1 class="text-4xl md:text-7xl font-extrabold uppercase tracking-tighter leading-none font-tech">
                    Library of Valdric
                </h1>
                <p class="text-charcoalText/75 text-sm md:text-base leading-relaxed">
                    A curated archive documenting organizational milestones, campus representation, community contributions, and game design hackathons.
                </p>
            </div>
            <div class="font-tech text-right text-xs text-charcoalText/50 uppercase tracking-widest hidden md:block">
                <span>Updated: June 2026</span><br>
                <span>Index: 04 Categories</span>
            </div>
        </div>
    </section>

    <!-- MAIN GALLERY CONTENT -->
    <section class="py-16 px-6 md:px-12 bg-creamBg relative z-10 pb-36">
        <div class="max-w-7xl mx-auto space-y-24">

            <!-- CATEGORY 1: Brand Ambassador Fakultas Teknik Unpas -->
            <div class="space-y-8">
                <!-- Section Title -->
                <div class="flex items-center justify-between border-b-2 border-charcoalText pb-4">
                    <div class="flex items-center space-x-3 font-tech">
                        <span class="text-xs font-bold text-cobaltBlue">01 /</span>
                        <h2 class="text-xl md:text-2xl font-extrabold uppercase tracking-tight">Duta Kampus / Brand Ambassador</h2>
                    </div>
                    <span class="px-3 py-1 bg-creamHighlight text-charcoalText text-[10px] font-bold uppercase tracking-wider rounded-md border border-charcoalText font-tech">Fakultas Teknik Unpas</span>
                </div>

                <!-- Editorial Asymmetric Layout -->
                <div class="grid grid-cols-1 lg:grid-cols-12 gap-8 items-start">
                    <!-- Left Copy (4 cols) -->
                    <div class="lg:col-span-4 space-y-6">
                        <h3 class="text-2xl font-extrabold uppercase font-tech leading-tight">Representing the Engineering Faculty</h3>
                        <p class="text-charcoalText/80 text-sm leading-relaxed">
                            Selected as the **Brand Ambassador (Duta Kampus) of the Faculty of Engineering, Universitas Pasundan**. Serving in this role involves public relations, guiding campus tours, presenting faculty programs, and acting as the official representative for academic promotions.
                        </p>
                        <ul class="space-y-2 text-xs font-bold uppercase tracking-wide text-charcoalText/70 font-tech">
                            <li>✦ Public Relations & Hosting</li>
                            <li>✦ High School Socialization Roadshows</li>
                            <li>✦ Official University Marketing Campaigns</li>
                            <li>✦ Student Ambassador Network</li>
                        </ul>
                    </div>

                    <!-- Right Images Grid (8 cols) -->
                    <div class="lg:col-span-8 grid grid-cols-1 md:grid-cols-12 gap-6">
                        <!-- Main Standalone Portrait (Image 4 - 5 cols) -->
                        <div class="md:col-span-5 border-2 border-charcoalText rounded-2xl overflow-hidden bg-creamBg p-3 hover-lift shadow-sm">
                            <img src="/images/library_4.jpg" alt="Valdric standing as Brand Ambassador sash" class="w-full h-auto object-cover rounded-xl border border-charcoalText/10">
                            <p class="text-[10px] font-tech text-charcoalText/60 font-bold uppercase mt-3 text-center">
                                Valdric - Duta Kampus FT Unpas
                            </p>
                        </div>

                        <!-- Stacked Right Images (Image 1 & 3 - 7 cols) -->
                        <div class="md:col-span-7 flex flex-col space-y-6">
                            <!-- Image 1: Seminar / Presentation -->
                            <div class="border-2 border-charcoalText rounded-2xl overflow-hidden bg-creamBg p-3 hover-lift shadow-sm">
                                <img src="/images/library_1.jpg" alt="Valdric presenting at high school" class="w-full h-auto object-cover rounded-xl border border-charcoalText/10">
                                <p class="text-[10px] font-tech text-charcoalText/60 font-bold uppercase mt-3">
                                    Presentasi program Fakultas Teknik pada kunjungan sekolah
                                </p>
                            </div>
                            
                            <!-- Image 3: Group auditorium -->
                            <div class="border-2 border-charcoalText rounded-2xl overflow-hidden bg-creamBg p-3 hover-lift shadow-sm">
                                <img src="/images/library_3.jpg" alt="Valdric group photo with students" class="w-full h-auto object-cover rounded-xl border border-charcoalText/10">
                                <p class="text-[10px] font-tech text-charcoalText/60 font-bold uppercase mt-3">
                                    Sosialisasi bersama siswa-siswi SMA Pasundan 2 Bandung
                                </p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <!-- CATEGORY 2: Staff Kominfo HMTIF -->
            <div class="space-y-8">
                <!-- Section Title -->
                <div class="flex items-center justify-between border-b-2 border-charcoalText pb-4">
                    <div class="flex items-center space-x-3 font-tech">
                        <span class="text-xs font-bold text-cobaltBlue">02 /</span>
                        <h2 class="text-xl md:text-2xl font-extrabold uppercase tracking-tight">Staff Departemen Kominfo</h2>
                    </div>
                    <span class="px-3 py-1 bg-creamHighlight text-charcoalText text-[10px] font-bold uppercase tracking-wider rounded-md border border-charcoalText font-tech">HMTIF Unpas</span>
                </div>

                <div class="grid grid-cols-1 lg:grid-cols-12 gap-8 items-center">
                    <!-- Left Image (7 cols) -->
                    <div class="lg:col-span-7 border-2 border-charcoalText rounded-2xl overflow-hidden bg-creamBg p-3 hover-lift shadow-sm order-last lg:order-first">
                        <img src="/images/library_2.jpg" alt="Valdric speaking behind a podium" class="w-full h-auto object-cover rounded-xl border border-charcoalText/10">
                        <p class="text-[10px] font-tech text-charcoalText/60 font-bold uppercase mt-3 text-center">
                            Valdric memimpin sesi/berbicara di podium HMTIF Unpas
                        </p>
                    </div>

                    <!-- Right Copy (5 cols) -->
                    <div class="lg:col-span-5 space-y-6">
                        <h3 class="text-2xl font-extrabold uppercase font-tech leading-tight">Student Governance & Media Communications</h3>
                        <p class="text-charcoalText/80 text-sm leading-relaxed">
                            Serving as active staff in the **Departemen Komunikasi dan Informasi (Kominfo) Himpunan Mahasiswa Teknik Informatika (HMTIF)**. This role involves public communications, coordination of digital announcements, media documentation, and public reporting of organization initiatives.
                        </p>
                        <ul class="space-y-2 text-xs font-bold uppercase tracking-wide text-charcoalText/70 font-tech">
                            <li>✦ Himpunan Mahasiswa Teknik Informatika (HMTIF) governance</li>
                            <li>✦ Management of digital news streams & bulletins</li>
                            <li>✦ Event documentation & graphic design coordination</li>
                            <li>✦ Internal & external public relations</li>
                        </ul>
                    </div>
                </div>
            </div>

            <!-- CATEGORY 3: Head of Media Creative in GDGOC Unpas -->
            <div class="space-y-8">
                <!-- Section Title -->
                <div class="flex items-center justify-between border-b-2 border-charcoalText pb-4">
                    <div class="flex items-center space-x-3 font-tech">
                        <span class="text-xs font-bold text-cobaltBlue">03 /</span>
                        <h2 class="text-xl md:text-2xl font-extrabold uppercase tracking-tight">Head of Media Creative</h2>
                    </div>
                    <span class="px-3 py-1 bg-creamHighlight text-charcoalText text-[10px] font-bold uppercase tracking-wider rounded-md border border-charcoalText font-tech">GDGOC Unpas</span>
                </div>

                <div class="grid grid-cols-1 lg:grid-cols-12 gap-8 items-center">
                    <!-- Left Copy (5 cols) -->
                    <div class="lg:col-span-5 space-y-6">
                        <h3 class="text-2xl font-extrabold uppercase font-tech leading-tight">Brand Creative & Community Design Leadership</h3>
                        <p class="text-charcoalText/80 text-sm leading-relaxed">
                            Served as the **Head of Media Creative** for **Google Developer Groups on Campus (GDGOC) Universitas Pasundan**. Responsible for leading the visual design strategy, coordinating promotional media assets, developing brand layouts, and managing creative outputs for workshops, hackathons, and developer conferences.
                        </p>
                        <ul class="space-y-2 text-xs font-bold uppercase tracking-wide text-charcoalText/70 font-tech">
                            <li>✦ GDGOC Unpas brand alignment & media campaigns</li>
                            <li>✦ Management of graphic designers & content creators</li>
                            <li>✦ Social media asset kits & developer booklet design</li>
                            <li>✦ Visual recording & event coverages</li>
                        </ul>
                    </div>

                    <!-- Right Image (7 cols) -->
                    <div class="lg:col-span-7 border-2 border-charcoalText rounded-2xl overflow-hidden bg-creamBg p-3 hover-lift shadow-sm">
                        <img src="/images/library_6.jpg" alt="Valdric standing in GDGOC uniform" class="w-full h-auto object-cover rounded-xl border border-charcoalText/10">
                        <p class="text-[10px] font-tech text-charcoalText/60 font-bold uppercase mt-3 text-center">
                            Valdric as Head of Media Creative in GDGOC Unpas
                        </p>
                    </div>
                </div>
            </div>

            <!-- CATEGORY 4: Game Designer & Project Manager GGJ 2026 -->
            <div class="space-y-8">
                <!-- Section Title -->
                <div class="flex items-center justify-between border-b-2 border-charcoalText pb-4">
                    <div class="flex items-center space-x-3 font-tech">
                        <span class="text-xs font-bold text-cobaltBlue">04 /</span>
                        <h2 class="text-xl md:text-2xl font-extrabold uppercase tracking-tight">Game Design & Leadership</h2>
                    </div>
                    <span class="px-3 py-1 bg-creamHighlight text-charcoalText text-[10px] font-bold uppercase tracking-wider rounded-md border border-charcoalText font-tech">GGJ 2026</span>
                </div>

                <div class="grid grid-cols-1 lg:grid-cols-12 gap-8 items-start">
                    <!-- Left Image (7 cols) -->
                    <div class="lg:col-span-7 border-2 border-charcoalText rounded-2xl overflow-hidden bg-creamBg p-3 hover-lift shadow-sm order-last lg:order-first">
                        <img src="/images/library_5.jpg" alt="Team localhost at Global Game Jam Bandung 2026" class="w-full h-auto object-cover rounded-xl border border-charcoalText/10">
                        <p class="text-[10px] font-tech text-charcoalText/60 font-bold uppercase mt-3 text-center">
                            Tim "localhost" di Global Game Jam Bandung 2026 (Valdric paling kanan)
                        </p>
                    </div>

                    <!-- Right Copy (5 cols) -->
                    <div class="lg:col-span-5 space-y-6">
                        <h3 class="text-2xl font-extrabold uppercase font-tech leading-tight">Leading Team localhost at Global Game Jam</h3>
                        <p class="text-charcoalText/80 text-sm leading-relaxed">
                            Served as the **Game Designer and Project Manager for team "localhost"** at the **Global Game Jam (GGJ) Bandung 2026** (a intensive 48-hour game development hackathon). Tasked with conceptualizing mechanics, detailing production blueprints, and orchestrating programming tasks to deliver a fully functional 2D pixel-art build.
                        </p>
                        <ul class="space-y-2 text-xs font-bold uppercase tracking-wide text-charcoalText/70 font-tech">
                            <li>✦ Game Design Mechanics & System Blueprint</li>
                            <li>✦ Project management & timeline execution under 48h pressure</li>
                            <li>✦ Collaborative Unity development and integration</li>
                            <li>✦ Project submission pitch and deployment</li>
                        </ul>
                    </div>
                </div>
            </div>

        </div>
    </section>
</x-layouts.app>
