document.addEventListener('DOMContentLoaded', () => {
  // ==========================================
  // 00. THEME SWITCHER LOGIC
  // ==========================================
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

  // ==========================================
  // 0. PRELOADER INTRO LOADING SEQUENCE
  // ==========================================
  const preloader = document.getElementById('preloader');
  const preloaderBar = document.getElementById('preloader-bar');
  const preloaderText = document.getElementById('preloader-text');
  const preloaderPercent = document.getElementById('preloader-percent');

  if (preloader && preloaderBar && preloaderText && preloaderPercent) {
    // Lock scrolling on load
    document.body.style.overflow = 'hidden';
    
    let progress = 0;
    const loadingTexts = [
      { limit: 25, label: 'initializing system' },
      { limit: 55, label: 'building grid sections' },
      { limit: 85, label: 'rendering creative modules' },
      { limit: 100, label: 'welcome sequence' }
    ];

    const preloaderTimer = setInterval(() => {
      progress += Math.floor(Math.random() * 4) + 1; // Increment progress
      if (progress >= 100) {
        progress = 100;
        clearInterval(preloaderTimer);

        preloaderBar.style.width = '100%';
        preloaderPercent.textContent = '100%';
        preloaderText.textContent = 'welcome';

        setTimeout(() => {
          // Slide up preloader overlay
          preloader.classList.add('preloader-hidden');
          document.body.style.overflow = ''; // Unlock scrolling

          // Trigger staggered hero title slide up reveal
          const titleLines = document.querySelectorAll('.hero-slide-up');
          titleLines.forEach((el) => {
            el.classList.add('revealed');
          });
        }, 600);
      } else {
        preloaderBar.style.width = `${progress}%`;
        preloaderPercent.textContent = `${progress.toString().padStart(2, '0')}%`;

        // Update step status labels
        const currentStep = loadingTexts.find(step => progress <= step.limit);
        if (currentStep && preloaderText.textContent !== currentStep.label) {
          preloaderText.textContent = currentStep.label;
        }
      }
    }, 35); // Run counter loop
  }

  // ==========================================
  // 1. CUSTOM CURSOR WITH INTERPOLATION (LERP)
  // ==========================================
  const cursor = document.getElementById('custom-cursor');
  const cursorDot = document.getElementById('custom-cursor-dot');
  
  let mouseX = 0, mouseY = 0; // Mouse coords
  let cursorX = 0, cursorY = 0; // Interpolated coords
  
  if (cursor && cursorDot) {
    window.addEventListener('mousemove', (e) => {
      mouseX = e.clientX;
      mouseY = e.clientY;
      
      // Instantly position the dot
      cursorDot.style.left = `${mouseX}px`;
      cursorDot.style.top = `${mouseY}px`;
    });

    // Animate outer ring with a slight smooth delay (lerp)
    function animateCursor() {
      const lerpFactor = 0.15;
      cursorX += (mouseX - cursorX) * lerpFactor;
      cursorY += (mouseY - cursorY) * lerpFactor;
      
      cursor.style.left = `${cursorX}px`;
      cursor.style.top = `${cursorY}px`;
      
      requestAnimationFrame(animateCursor);
    }
    animateCursor();

    // Hover effect on interactives
    const hoverables = document.querySelectorAll('a, button, input, textarea, select, .project-card, [role="button"]');
    hoverables.forEach(item => {
      item.addEventListener('mouseenter', () => {
        cursor.classList.add('hovered');
      });
      item.addEventListener('mouseleave', () => {
        cursor.classList.remove('hovered');
      });
    });
  }

  // ==========================================
  // 2. HERO TYPING ANIMATION (INLINE)
  // ==========================================
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

  // ==========================================
  // 3. HORIZONTAL PROJECT CAROUSEL CONTROLLER
  // ==========================================
  const scrollContainer = document.getElementById('project-scroll-container');
  const prevBtn = document.getElementById('carousel-prev');
  const nextBtn = document.getElementById('carousel-next');

  if (scrollContainer && prevBtn && nextBtn) {
    // Scroll distance (width of one item plus gap)
    function getScrollStep() {
      const firstSlide = scrollContainer.querySelector('.carousel-slide:not(.hidden)');
      return firstSlide ? firstSlide.offsetWidth + 24 : 350; // default width + gap
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
    
    // Disable/Enable buttons dynamically based on scroll boundary
    scrollContainer.addEventListener('scroll', () => {
      const maxScroll = scrollContainer.scrollWidth - scrollContainer.clientWidth;
      if (scrollContainer.scrollLeft <= 5) {
        prevBtn.style.opacity = '0.3';
      } else {
        prevBtn.style.opacity = '1';
      }

      if (scrollContainer.scrollLeft >= maxScroll - 5) {
        nextBtn.style.opacity = '0.3';
      } else {
        nextBtn.style.opacity = '1';
      }
    });
  }

  // ==========================================
  // 3.5. PROJECTS CAROUSEL FILTERING
  // ==========================================
  const filterBtns = document.querySelectorAll('.project-filter-btn');
  const slides = document.querySelectorAll('.carousel-slide');

  if (filterBtns && slides && filterBtns.length > 0) {
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
  }

  // ==========================================
  // 4. SCROLL REVEAL (FADE-IN ON SCROLL)
  // ==========================================
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
  handleScrollAnimation(); // Initial trigger

  // ==========================================
  // 5. SCROLLSPY (ACTIVE NAV LINK SCROLLING)
  // ==========================================
  const sections = document.querySelectorAll('section');
  const navLinks = document.querySelectorAll('.nav-link');

  function scrollSpy() {
    let currentSection = '';
    
    sections.forEach(section => {
      const sectionTop = section.offsetTop;
      const sectionHeight = section.offsetHeight;
      if (window.scrollY >= sectionTop - 150) {
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

  // ==========================================
  // 6. EDITORIAL 2D PHYSICS ENGINE SANDBOX
  // ==========================================
  const openPhysicsBtn = document.getElementById('open-physics-btn');
  const closePhysicsBtn = document.getElementById('close-physics-btn');
  const physicsModal = document.getElementById('physics-modal');
  const physicsCanvas = document.getElementById('physics-canvas');
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
        
        // Print-editorial outline style
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

    // Spawn ball on sandbox click
    physicsCanvas.addEventListener('mousedown', (event) => {
      const rect = physicsCanvas.getBoundingClientRect();
      const clickX = event.clientX - rect.left;
      const clickY = event.clientY - rect.top;
      
      const radius = Math.random() * 12 + 12;
      const colors = ['#416afc', '#ffa5c6', '#fff6c6', '#121212'];
      const color = colors[Math.floor(Math.random() * colors.length)];
      
      const dx = (Math.random() - 0.5) * 12;
      const dy = (Math.random() - 2) * 6;
      
      if (balls.length > 30) {
        balls.shift();
      }
      
      balls.push(new Ball(clickX, clickY, dx, dy, radius, color));
    });

    function updatePhysicsEngine() {
      if (!isPhysicsRunning) return;
      ctx.clearRect(0, 0, physicsCanvas.width, physicsCanvas.height);
      
      // Draw minimal editorial light gridlines
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

  // ==========================================
  // 7. CONTACT FORM SUBMISSION
  // ==========================================
  const contactForm = document.getElementById('contact-form');
  const successModal = document.getElementById('success-modal');
  const closeSuccessBtn = document.getElementById('close-success-btn');

  if (contactForm && successModal && closeSuccessBtn) {
    contactForm.addEventListener('submit', (e) => {
      e.preventDefault();
      
      const name = document.getElementById('form-name').value;
      const email = document.getElementById('form-email').value;
      const message = document.getElementById('form-message').value;

      if (!name || !email || !message) return;

      const submitBtn = contactForm.querySelector('button[type="submit"]');
      const originalText = submitBtn.innerHTML;
      submitBtn.disabled = true;
      submitBtn.innerHTML = `
        <svg class="animate-spin -ml-1 mr-3 h-5 w-5 text-white inline-block" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24">
          <circle class="opacity-25" cx="12" cy="12" r="10" stroke="currentColor" stroke-width="4"></circle>
          <path class="opacity-75" fill="currentColor" d="M4 12a8 8 0 018-8V0C5.373 0 0 5.373 0 12h4zm2 5.291A7.962 7.962 0 014 12H0c0 3.042 1.135 5.824 3 7.938l3-2.647z"></path>
        </svg> DISPATCHING...
      `;

      fetch('/api/contact', {
        method: 'POST',
        headers: {
          'Content-Type': 'application/json'
        },
        body: JSON.stringify({
          name: name,
          email: email,
          message: message
        })
      })
      .then(response => {
        if (!response.ok) {
          throw new Error('Server error');
        }
        return response.json();
      })
      .then(data => {
        submitBtn.disabled = false;
        submitBtn.innerHTML = originalText;
        contactForm.reset();

        successModal.classList.remove('hidden');
        successModal.classList.add('flex');
        document.body.style.overflow = 'hidden';
      })
      .catch(error => {
        console.error('Error submitting form:', error);
        submitBtn.disabled = false;
        submitBtn.innerHTML = originalText;
        alert('An error occurred while sending the message. Please try again.');
      });
    });

    closeSuccessBtn.addEventListener('click', () => {
      successModal.classList.remove('flex');
      successModal.classList.add('hidden');
      document.body.style.overflow = '';
    });

    successModal.addEventListener('click', (e) => {
      if (e.target === successModal) {
        successModal.classList.remove('flex');
        successModal.classList.add('hidden');
        document.body.style.overflow = '';
      }
    });
  }

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
        if (pulseDot) pulseDot.style.display = 'none'; // Hide notification dot once opened
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
      // Bold text: **text** -> <strong>text</strong>
      let html = text.replace(/\*\*(.*?)\*\*/g, '<strong>$1</strong>');
      // Italic text: *text* -> <em>text</em>
      html = html.replace(/\*(.*?)\*/g, '<em>$1</em>');
      // Hyperlinks: [text](url) -> <a> tag
      html = html.replace(/\[(.*?)\]\((.*?)\)/g, '<a href="$2" target="_blank" style="color: var(--color-accent-blue); text-decoration: underline; font-weight: bold;">$1</a>');
      
      // Multi-line formatting: convert lists and paragraphs
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

    // Call API or Fallback
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
          throw new Error('API failed or returned status error');
        }
        return res.json();
      })
      .then(data => {
        removeTypingIndicator();
        if (data.status === 'success' && data.reply) {
          addBotMessage(data.reply);
        } else {
          // Key not configured or fallback status
          handleFallbackResponse(userMessage);
        }
      })
      .catch(err => {
        // Direct fallback if running statically or server is offline
        removeTypingIndicator();
        handleFallbackResponse(userMessage);
      });
    }

    // Offline / Client-Side Smart Local Matcher
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

      // Scan through local knowledge base
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
          // Default generic response detailing what users can ask
          addBotMessage("Saya mengerti. Namun, sebagai asisten virtual Valdric, lingkup informasi saya berfokus pada:\n- Profil, IPK (**3.55**), dan pendidikan Valdric di UNPAS\n- Keahlian teknis & Tech Stack\n- Detail proyek unggulan (**KasiDuit**, **Gosir**)\n- Minat magang di PT. Bank BJB Kantor Cabang Utama Bandung (Jalan Naripan)\n- Cara menghubungi Valdric\n\nSilakan ajukan pertanyaan seputar topik-topik di atas!");
        }
      }, 500);
    }
  }

  // ----------------------------------------------------
  // 9. LIBRARY SECTION FILTERING & LIGHTBOX
  // ----------------------------------------------------
  const libFilterBtns = document.querySelectorAll('.lib-filter-btn');
  const libCards = document.querySelectorAll('.lib-card');
  
  libFilterBtns.forEach(btn => {
    btn.addEventListener('click', () => {
      const filter = btn.getAttribute('data-lib-filter');

      // Reset active button style
      libFilterBtns.forEach(b => {
        b.classList.remove('bg-charcoalText', 'text-creamBg');
        b.classList.add('bg-creamBg', 'text-charcoalText');
      });
      btn.classList.remove('bg-creamBg', 'text-charcoalText');
      btn.classList.add('bg-charcoalText', 'text-creamBg');

      // Filter cards
      libCards.forEach(card => {
        const cat = card.getAttribute('data-lib-cat');
        if (filter === 'all' || cat === filter) {
          card.style.display = 'block';
        } else {
          card.style.display = 'none';
        }
      });
    });
  });

  // Lightbox Modal Handlers
  const libLightbox = document.getElementById('lib-lightbox');
  const lightboxImg = document.getElementById('lightbox-img');
  const lightboxOrg = document.getElementById('lightbox-org-badge');
  const lightboxTitle = document.getElementById('lightbox-title');
  const lightboxRole = document.getElementById('lightbox-role');
  const lightboxDesc = document.getElementById('lightbox-desc');
  const lightboxPoints = document.getElementById('lightbox-points');
  const lightboxIndex = document.getElementById('lightbox-index-badge');
  const closeLightboxBtn = document.getElementById('close-lightbox-btn');
  const lightboxLinkContainer = document.getElementById('lightbox-link-container');
  const lightboxLink = document.getElementById('lightbox-link');

  if (libCards.length > 0 && libLightbox) {
    libCards.forEach(card => {
      card.addEventListener('click', () => {
        const img = card.getAttribute('data-lib-img');
        const title = card.getAttribute('data-lib-title');
        const role = card.getAttribute('data-lib-role');
        const org = card.getAttribute('data-lib-org');
        const desc = card.getAttribute('data-lib-desc');
        const index = card.getAttribute('data-lib-index');
        const pointsAttr = card.getAttribute('data-lib-points') || '';
        const link = card.getAttribute('data-lib-link');
        const linkText = card.getAttribute('data-lib-link-text') || 'Watch Demo ↗';
        
        // Set attributes
        lightboxImg.src = img;
        lightboxImg.alt = title;
        lightboxOrg.textContent = `[ ${org} ]`;
        lightboxTitle.textContent = title;
        lightboxRole.textContent = role;
        lightboxDesc.textContent = desc;
        lightboxIndex.textContent = `${index.padStart(2, '0')} / 07`;

        // Render bullet points
        lightboxPoints.innerHTML = '';
        if (pointsAttr) {
          const points = pointsAttr.split(';');
          points.forEach(pt => {
            const li = document.createElement('li');
            li.textContent = `✦ ${pt.trim()}`;
            lightboxPoints.appendChild(li);
          });
        }

        // Render Link
        if (link) {
          lightboxLink.href = link;
          lightboxLink.textContent = linkText;
          lightboxLinkContainer.classList.remove('hidden');
        } else {
          lightboxLinkContainer.classList.add('hidden');
        }

        // Open modal
        libLightbox.classList.remove('hidden');
        libLightbox.classList.add('flex');
        document.body.style.overflow = 'hidden';
      });
    });

    closeLightboxBtn.addEventListener('click', () => {
      libLightbox.classList.remove('flex');
      libLightbox.classList.add('hidden');
      document.body.style.overflow = '';
    });

    libLightbox.addEventListener('click', (e) => {
      if (e.target === libLightbox) {
        libLightbox.classList.remove('flex');
        libLightbox.classList.add('hidden');
        document.body.style.overflow = '';
      }
    });
  }
});

