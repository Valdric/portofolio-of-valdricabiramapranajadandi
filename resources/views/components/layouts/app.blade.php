<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}" class="scroll-smooth">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Valdric Abirama Pranaja Dandi | Portfolio</title>
    
    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <!-- SEO Meta Tags -->
    <meta name="description" content="Valdric Abirama Pranaja Dandi | Portfolio - Informatics Engineering, Web & Game Developer.">
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
        <a href="{{ request()->is('cv') || request()->is('library') ? '/#hero' : '#hero' }}" class="nav-link px-4 py-2 text-xs font-bold uppercase tracking-wider text-charcoalText hover:bg-charcoalText hover:text-creamBg rounded-full transition-all duration-300 font-tech">Home</a>
        <a href="{{ request()->is('cv') || request()->is('library') ? '/#about' : '#about' }}" class="nav-link px-4 py-2 text-xs font-bold uppercase tracking-wider text-charcoalText hover:bg-charcoalText hover:text-creamBg rounded-full transition-all duration-300 font-tech">About</a>
        <a href="{{ request()->is('cv') || request()->is('library') ? '/#skills' : '#skills' }}" class="nav-link px-4 py-2 text-xs font-bold uppercase tracking-wider text-charcoalText hover:bg-charcoalText hover:text-creamBg rounded-full transition-all duration-300 font-tech">Skills</a>
        <a href="{{ request()->is('cv') || request()->is('library') ? '/#projects' : '#projects' }}" class="nav-link px-4 py-2 text-xs font-bold uppercase tracking-wider text-charcoalText hover:bg-charcoalText hover:text-creamBg rounded-full transition-all duration-300 font-tech">Work</a>
        <a href="/cv" class="nav-link px-4 py-2 text-xs font-bold uppercase tracking-wider text-charcoalText hover:bg-charcoalText hover:text-creamBg rounded-full transition-all duration-300 font-tech {{ request()->is('cv') ? 'nav-link-active' : '' }}">CV</a>
        <a href="/library" class="nav-link px-4 py-2 text-xs font-bold uppercase tracking-wider text-charcoalText hover:bg-charcoalText hover:text-creamBg rounded-full transition-all duration-300 font-tech {{ request()->is('library') ? 'nav-link-active' : '' }}">Library</a>
        <a href="{{ request()->is('cv') || request()->is('library') ? '/#contact' : '#contact' }}" class="nav-link px-4 py-2 text-xs font-bold uppercase tracking-wider text-charcoalText hover:bg-charcoalText hover:text-creamBg rounded-full transition-all duration-300 font-tech">Contact</a>
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

            // ==========================================
            // 8. AI ASSISTANT CHATBOT LOGIC
            // ==========================================
            const chatWidget = document.querySelector('.ai-chat-widget');
            const chatBtn = document.querySelector('.ai-chat-btn');
            const chatWindow = document.querySelector('.ai-chat-window');
            const chatClose = document.querySelector('.ai-chat-close');
            const chatMessages = document.querySelector('.ai-chat-messages');
            const chatInput = document.querySelector('.ai-chat-input');
            const chatSend = document.querySelector('.ai-chat-send');
            const suggestionChips = document.querySelectorAll('.suggestion-chip');
            const pulseDot = document.querySelector('.pulse-dot');

            if (chatWidget && chatBtn && chatWindow && chatClose) {
                let isChatOpen = false;
                let hasWelcomed = false;

                // Toggle Chat Window
                chatBtn.addEventListener('click', () => {
                    isChatOpen = !isChatOpen;
                    if (isChatOpen) {
                        chatWindow.classList.add('open');
                        if (pulseDot) pulseDot.style.display = 'none';
                        if (!hasWelcomed) {
                            sendWelcomeMessage();
                            hasWelcomed = true;
                        }
                        setTimeout(() => chatInput.focus(), 300);
                    } else {
                        chatWindow.classList.remove('open');
                    }
                });

                chatClose.addEventListener('click', () => {
                    isChatOpen = false;
                    chatWindow.classList.remove('open');
                });

                // Send Message Event
                chatSend.addEventListener('click', handleUserSend);
                chatInput.addEventListener('keypress', (e) => {
                    if (e.key === 'Enter') {
                        handleUserSend();
                    }
                });

                // Suggestion Chips Click
                suggestionChips.forEach(chip => {
                    chip.addEventListener('click', () => {
                        const text = chip.getAttribute('data-question') || chip.textContent;
                        addUserMessage(text);
                        getAIResponse(text);
                    });
                });

                function handleUserSend() {
                    const text = chatInput.value.trim();
                    if (!text) return;
                    addUserMessage(text);
                    chatInput.value = '';
                    getAIResponse(text);
                }

                function addUserMessage(text) {
                    const msgDiv = document.createElement('div');
                    msgDiv.className = 'chat-msg user';
                    msgDiv.textContent = text;
                    chatMessages.appendChild(msgDiv);
                    scrollToBottom();
                }

                function addBotMessage(text) {
                    const msgDiv = document.createElement('div');
                    msgDiv.className = 'chat-msg bot';
                    msgDiv.innerHTML = formatMarkdown(text);
                    chatMessages.appendChild(msgDiv);
                    scrollToBottom();

                    // Bind cursor hover event to newly generated links in the bot message
                    const links = msgDiv.querySelectorAll('a');
                    const cursor = document.getElementById('custom-cursor');
                    if (cursor) {
                        links.forEach(link => {
                            link.addEventListener('mouseenter', () => cursor.classList.add('hovered'));
                            link.addEventListener('mouseleave', () => cursor.classList.remove('hovered'));
                        });
                    }
                }

                function sendWelcomeMessage() {
                    showTypingIndicator();
                    setTimeout(() => {
                        removeTypingIndicator();
                        addBotMessage("Halo! Saya adalah **VAbirama AI**, asisten virtual Valdric. Ada yang bisa saya bantu seputar profil, proyek, atau rencana magang Valdric?");
                    }, 800);
                }

                function showTypingIndicator() {
                    const typingDiv = document.createElement('div');
                    typingDiv.className = 'chat-msg bot typing-indicator-wrapper';
                    typingDiv.innerHTML = `
                        <div class="typing-dots">
                            <div class="typing-dot"></div>
                            <div class="typing-dot"></div>
                            <div class="typing-dot"></div>
                        </div>
                    `;
                    chatMessages.appendChild(typingDiv);
                    scrollToBottom();
                }

                function removeTypingIndicator() {
                    const indicator = chatMessages.querySelector('.typing-indicator-wrapper');
                    if (indicator) {
                        indicator.remove();
                    }
                }

                function scrollToBottom() {
                    chatMessages.scrollTop = chatMessages.scrollHeight;
                }

                function formatMarkdown(text) {
                    let html = text.replace(/\*\*(.*?)\*\*/g, '<strong>$1</strong>');
                    html = html.replace(/\*(.*?)\*/g, '<em>$1</em>');
                    html = html.replace(/\[(.*?)\]\((.*?)\)/g, '<a href="$2" target="_blank" style="color: var(--color-accent-blue); text-decoration: underline; font-weight: bold;">$1</a>');
                    
                    const lines = html.split('\n');
                    let inList = false;
                    for (let i = 0; i < lines.length; i++) {
                        const line = lines[i].trim();
                        if (line.startsWith('- ') || line.startsWith('* ')) {
                            const content = line.substring(2);
                            if (!inList) {
                                lines[i] = '<ul style="list-style-type: disc; margin-left: 16px; margin-top: 4px; margin-bottom: 4px;"><li>' + content + '</li>';
                                inList = true;
                            } else {
                                lines[i] = '<li>' + content + '</li>';
                            }
                        } else {
                            if (inList) {
                                lines[i - 1] += '</ul>';
                                inList = false;
                            }
                            if (line !== '') {
                                lines[i] = '<p style="margin-bottom: 6px;">' + lines[i] + '</p>';
                            }
                        }
                    }
                    if (inList) {
                        lines[lines.length - 1] += '</ul>';
                    }
                    return lines.join('\n');
                }

                function getAIResponse(userMessage) {
                    showTypingIndicator();

                    fetch('/api/chat', {
                        method: 'POST',
                        headers: {
                            'Content-Type': 'application/json',
                            'X-CSRF-TOKEN': document.querySelector('meta[name="csrf-token"]')?.getAttribute('content') || ''
                        },
                        body: JSON.stringify({ message: userMessage })
                    })
                    .then(res => {
                        if (!res.ok) {
                            throw new Error('API failed');
                        }
                        return res.json();
                    })
                    .then(data => {
                        removeTypingIndicator();
                        if (data.status === 'success' && data.reply) {
                            addBotMessage(data.reply);
                        } else {
                            handleFallbackResponse(userMessage);
                        }
                    })
                    .catch(err => {
                        removeTypingIndicator();
                        handleFallbackResponse(userMessage);
                    });
                }

                const localDatabase = [
                    {
                        keywords: ['siapa', 'profil', 'bio', 'tentang', 'about', 'who', 'nama', 'valdric', 'vabirama'],
                        response: "Valdric Abirama Pranaja Dandi adalah mahasiswa S1 Teknik Informatika di **Universitas Pasundan (UNPAS) Bandung** (Angkatan 2023). Ia berfokus pada pengembangan web full-stack (menggunakan Laravel, Livewire) dan mobile application (menggunakan Flutter), serta aktif membuat game 2D."
                    },
                    {
                        keywords: ['ipk', 'gpa', 'nilai', 'score', 'akademik'],
                        response: "IPK (GPA) Valdric saat ini adalah **3.55 / 4.00** (skala 4.00), yang mencerminkan komitmen akademisnya yang kuat di bidang Teknik Informatika UNPAS."
                    },
                    {
                        keywords: ['kuliah', 'jurusan', 'kampus', 'unpas', 'universitas', 'study', 'education', 'sekolah', 'nrp', 'nim'],
                        response: "Valdric berkuliah di **Universitas Pasundan (UNPAS) Bandung**, mengambil Program Studi S1 Teknik Informatika. NRP-nya adalah **233040163**."
                    },
                    {
                        keywords: ['skill', 'keahlian', 'tech', 'stack', 'pemrograman', 'bahasa', 'technologies', 'tools', 'bisa apa'],
                        response: "Keahlian teknis Valdric meliputi:\n- **Programming Languages**: HTML, CSS, JavaScript, PHP, SQL, Dart, C# (Unity)\n- **Frontend/Backend**: Tailwind CSS, Livewire, Alpine.js, Vite, Laravel, SQLite, MySQL\n- **Mobile & Game**: Flutter, Unity 2D\n- **Tools**: Git, VS Code"
                    },
                    {
                        keywords: ['kasiduit', 'crowdfunding', 'donasi', 'kampanye', 'sosial'],
                        response: "**KasiDuit** adalah salah satu proyek featured work Valdric. Ini adalah platform crowdfunding & donasi berbasis web yang dibuat dengan **Laravel, SQLite, dan Tailwind CSS**. Platform ini mendukung pembuatan kampanye, manajemen donasi, dashboard tracking, dan transparansi keuangan publik. [Kunjungi Kasiduit](https://kasiduit.my.id/)"
                    },
                    {
                        keywords: ['gosir', 'kasir', 'pos', 'cashier', 'flutter', 'dart'],
                        response: "**Gosir (Cashier App)** adalah aplikasi POS (Point of Sale) mobile yang dikembangkan menggunakan **Flutter & Dart**. Aplikasi ini memiliki sistem enkripsi data lokal SQL terstruktur, barcode scanner simulasi, ekspor struk transaksi PDF, dan visualisasi grafik inventaris secara real-time."
                    },
                    {
                        keywords: ['magang', 'bjb', 'naripan', 'kantor', 'internship', 'tujuan'],
                        response: "Valdric memiliki minat besar untuk magang di **PT. Bank BJB Kantor Cabang Utama Bandung (Jalan Naripan)**. Ia menargetkan posisi IT Developer (Mobile Flutter/Backend Laravel) atau Quality Assurance (QA) untuk mengaplikasikan keahlian teknisnya dalam proyek perbankan nyata."
                    },
                    {
                        keywords: ['kontak', 'hubungi', 'email', 'github', 'contact', 'sosmed', 'social'],
                        response: "Anda dapat menghubungi Valdric melalui saluran berikut:\n- **Email**: valdricapd@gmail.com\n- **GitHub**: [github.com/Valdric](https://github.com/Valdric)\n- **Lokasi**: Bandung, Indonesia"
                    }
                ];

                function handleFallbackResponse(message) {
                    const lowerMsg = message.toLowerCase();
                    let bestMatch = null;
                    let maxMatches = 0;

                    localDatabase.forEach(item => {
                        let matches = 0;
                        item.keywords.forEach(keyword => {
                            if (lowerMsg.includes(keyword)) {
                                matches++;
                            }
                        });
                        if (matches > maxMatches) {
                            maxMatches = matches;
                            bestMatch = item;
                        }
                    });

                    showTypingIndicator();
                    setTimeout(() => {
                        removeTypingIndicator();
                        if (bestMatch && maxMatches > 0) {
                            addBotMessage(bestMatch.response);
                        } else {
                            addBotMessage("Saya mengerti. Namun, sebagai asisten virtual Valdric, lingkup informasi saya berfokus pada:\n- Profil, IPK (**3.55**), dan pendidikan Valdric di UNPAS\n- Keahlian teknis & Tech Stack\n- Detail proyek unggulan (**KasiDuit**, **Gosir**)\n- Minat magang di PT. Bank BJB Kantor Cabang Utama Bandung (Jalan Naripan)\n- Cara menghubungi Valdric\n\nSilakan ajukan pertanyaan seputar topik-topik di atas!");
                        }
                    }, 500);
                }
            }
        });
    </script>

    <!-- AI Chatbot Widget HTML Markup -->
    <div class="ai-chat-widget no-print">
        <!-- Floating Action Button -->
        <button class="ai-chat-btn" aria-label="Tanya AI" title="Tanya AI seputar Valdric">
            <span class="pulse-dot"></span>
            <svg viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
                <path d="M12 2C6.477 2 2 6.13 2 11.23c0 2.97 1.517 5.617 3.9 7.28l-.9 3.09c-.11.39.26.74.65.62l3.66-1.12c.85.25 1.76.39 2.69.39 5.523 0 10-4.13 10-9.23S17.523 2 12 2zm0 15.5c-.82 0-1.63-.12-2.38-.34a.75.75 0 00-.51.05l-2.07.63.5-1.74a.75.75 0 00-.17-.71C5.87 14.28 5 12.63 5 11.23 5 7.79 8.14 5 12 5s7 2.79 7 6.23-3.14 6.27-7 6.27z"/>
            </svg>
        </button>

        <!-- Chat Window -->
        <div class="ai-chat-window">
            <!-- Header -->
            <div class="ai-chat-header">
                <div class="ai-chat-title-group">
                    <span class="ai-chat-status"></span>
                    <span class="ai-chat-title">VAbirama AI Assistant</span>
                </div>
                <button class="ai-chat-close" aria-label="Close Chat">
                    <svg viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
                        <path d="M19 6.41L17.59 5 12 10.59 6.41 5 5 6.41 10.59 12 5 17.59 6.41 19 12 13.41 17.59 19 19 17.59 13.41 12z"/>
                    </svg>
                </button>
            </div>

            <!-- Messages area -->
            <div class="ai-chat-messages"></div>

            <!-- Suggested questions -->
            <div class="ai-chat-suggestions">
                <button class="suggestion-chip" data-question="Siapa itu Valdric?">Siapa Valdric?</button>
                <button class="suggestion-chip" data-question="Berapa IPK Valdric saat ini?">Berapa IPK-nya?</button>
                <button class="suggestion-chip" data-question="Apa saja keahlian teknisnya?">Keahlian Teknis</button>
                <button class="suggestion-chip" data-question="Bisa ceritakan tentang proyek KasiDuit?">Proyek KasiDuit</button>
                <button class="suggestion-chip" data-question="Apa rencana magang Valdric?">Rencana Magang</button>
                <button class="suggestion-chip" data-question="Bagaimana cara menghubungi Valdric?">Hubungi Valdric</button>
            </div>

            <!-- Input Area -->
            <div class="ai-chat-input-area">
                <input type="text" class="ai-chat-input" placeholder="Tanya sesuatu..." aria-label="Message Input">
                <button class="ai-chat-send" aria-label="Send Message">
                    <svg viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
                        <path d="M2.01 21L23 12 2.01 3 2 10l15 2-15 2z"/>
                    </svg>
                </button>
            </div>
        </div>
    </div>
</body>
</html>
