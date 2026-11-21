document.addEventListener('DOMContentLoaded', () => {
  // ==========================================
  // 00. THEME & CALENDAR-BASED SEASONAL ENGINE
  // ==========================================
  function applyTheme() {
    const currentTheme = localStorage.getItem('theme') || 'light';
    const toggleBtns = document.querySelectorAll('#theme-toggle-btn, #mobile-theme-toggle-btn');
    if (currentTheme === 'dark') {
      document.documentElement.classList.add('dark');
      document.body.classList.add('dark');
      toggleBtns.forEach(btn => {
        if (btn.id === 'mobile-theme-toggle-btn') {
          btn.textContent = '[ ☀ ]';
        } else {
          btn.textContent = '[ ☀ Light ]';
        }
      });
    } else {
      document.documentElement.classList.remove('dark');
      document.body.classList.remove('dark');
      toggleBtns.forEach(btn => {
        if (btn.id === 'mobile-theme-toggle-btn') {
          btn.textContent = '[ ☾ ]';
        } else {
          btn.textContent = '[ ☾ Dark ]';
        }
      });
    }
  }
  applyTheme();

  document.addEventListener('click', (e) => {
    const btn = e.target.closest('#theme-toggle-btn') || e.target.closest('#mobile-theme-toggle-btn');
    if (btn) {
      const currentTheme = localStorage.getItem('theme') || 'light';
      const newTheme = currentTheme === 'dark' ? 'light' : 'dark';
      localStorage.setItem('theme', newTheme);
      applyTheme();
    }
  });

  // Automatic Calendar-Based Seasonal Theme Engine
  function detectCalendarSeason(dateObj = new Date()) {
    const month = dateObj.getMonth(); // 0 = Jan .. 11 = Dec
    if (month >= 2 && month <= 4) return 'spring'; // Mar–May
    if (month >= 5 && month <= 7) return 'summer'; // Jun–Aug
    if (month >= 8 && month <= 10) return 'autumn'; // Sep–Nov
    return 'winter'; // Dec–Feb
  }

  const activeCalendarSeason = detectCalendarSeason();
  document.documentElement.setAttribute('data-season', activeCalendarSeason);
  if (typeof window.setSeasonalWeather === 'function') {
    window.setSeasonalWeather(activeCalendarSeason);
  }

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

    let isDown = false;
    let startX;
    let scrollLeft;

    scrollContainer.addEventListener('mousedown', (e) => {
      isDown = true;
      scrollContainer.classList.remove('cursor-grab');
      scrollContainer.classList.add('cursor-grabbing');
      startX = e.pageX - scrollContainer.offsetLeft;
      scrollLeft = scrollContainer.scrollLeft;
    });

    scrollContainer.addEventListener('mouseleave', () => {
      isDown = false;
      scrollContainer.classList.remove('cursor-grabbing');
      scrollContainer.classList.add('cursor-grab');
    });

    scrollContainer.addEventListener('mouseup', () => {
      isDown = false;
      scrollContainer.classList.remove('cursor-grabbing');
      scrollContainer.classList.add('cursor-grab');
    });

    scrollContainer.addEventListener('mousemove', (e) => {
      if (!isDown) return;
      e.preventDefault();
      const x = e.pageX - scrollContainer.offsetLeft;
      const walk = (x - startX) * 1.5;
      scrollContainer.scrollLeft = scrollLeft - walk;
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

        filterBtns.forEach(b => {
          b.classList.remove('bg-charcoalText', 'text-creamBg');
          b.classList.add('bg-creamBg', 'text-charcoalText');
        });
        btn.classList.remove('bg-creamBg', 'text-charcoalText');
        btn.classList.add('bg-charcoalText', 'text-creamBg');

        slides.forEach(slide => {
          const cat = slide.getAttribute('data-category');
          if (filter === 'all' || cat === filter) {
            slide.classList.remove('hidden');
          } else {
            slide.classList.add('hidden');
          }
        });

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
  handleScrollAnimation();

  // ==========================================
  // 5. SCROLLSPY (ACTIVE NAV LINK SCROLLING)
  // ==========================================
  const sections = document.querySelectorAll('section');
  const navLinks = document.querySelectorAll('.nav-link');

  function scrollSpy() {
    let currentSection = '';
    
    sections.forEach(section => {
      const sectionTop = section.offsetTop;
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

    chatSend.addEventListener('click', handleUserSend);
    chatInput.addEventListener('keypress', (e) => {
      if (e.key === 'Enter') {
        handleUserSend();
      }
    });

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
          throw new Error('API failed or returned status error');
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

  // ----------------------------------------------------
  // 9. LIBRARY SECTION FILTERING & LIGHTBOX
  // ----------------------------------------------------
  const libFilterBtns = document.querySelectorAll('.lib-filter-btn');
  const libCards = document.querySelectorAll('.lib-card');
  
  libFilterBtns.forEach(btn => {
    btn.addEventListener('click', () => {
      const filter = btn.getAttribute('data-lib-filter');

      libFilterBtns.forEach(b => {
        b.classList.remove('bg-charcoalText', 'text-creamBg');
        b.classList.add('bg-creamBg', 'text-charcoalText');
      });
      btn.classList.remove('bg-creamBg', 'text-charcoalText');
      btn.classList.add('bg-charcoalText', 'text-creamBg');

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
        
        lightboxImg.src = img;
        lightboxImg.alt = title;
        lightboxOrg.textContent = `[ ${org} ]`;
        lightboxTitle.textContent = title;
        lightboxRole.textContent = role;
        lightboxDesc.textContent = desc;
        lightboxIndex.textContent = `${index.padStart(2, '0')} / 07`;

        lightboxPoints.innerHTML = '';
        if (pointsAttr) {
          const points = pointsAttr.split(';');
          points.forEach(pt => {
            const li = document.createElement('li');
            li.textContent = `✦ ${pt.trim()}`;
            lightboxPoints.appendChild(li);
          });
        }

        if (link) {
          lightboxLink.href = link;
          lightboxLink.textContent = linkText;
          lightboxLinkContainer.classList.remove('hidden');
        } else {
          lightboxLinkContainer.classList.add('hidden');
        }

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

  // ==========================================
  // MOBILE MENU OVERLAY CONTROLLER
  // ==========================================
  const mobileMenuBtn = document.getElementById('mobile-menu-btn');
  const closeMobileMenuBtn = document.getElementById('close-mobile-menu');
  const mobileMenuOverlay = document.getElementById('mobile-menu-overlay');
  const mobileMenuLinks = document.querySelectorAll('.mobile-menu-link');

  if (mobileMenuBtn && closeMobileMenuBtn && mobileMenuOverlay) {
    mobileMenuBtn.addEventListener('click', () => {
      mobileMenuOverlay.classList.remove('hidden');
      setTimeout(() => {
        mobileMenuOverlay.classList.add('open');
      }, 10);
      document.body.style.overflow = 'hidden';
    });

    const closeMobileMenu = () => {
      mobileMenuOverlay.classList.remove('open');
      setTimeout(() => {
        mobileMenuOverlay.classList.add('hidden');
      }, 400);
      document.body.style.overflow = '';
    };

    closeMobileMenuBtn.addEventListener('click', closeMobileMenu);

    mobileMenuLinks.forEach(link => {
      link.addEventListener('click', () => {
        closeMobileMenu();
      });
    });

    mobileMenuOverlay.addEventListener('click', (e) => {
      if (e.target === mobileMenuOverlay) {
        closeMobileMenu();
      }
    });
  }

  // ==========================================
  // SCROLL PROGRESS INDICATOR
  // ==========================================
  const scrollProgress = document.getElementById('scroll-progress');
  if (scrollProgress) {
    const handleScrollProgress = () => {
      const totalHeight = document.documentElement.scrollHeight - window.innerHeight;
      if (totalHeight > 0) {
        const progress = (window.scrollY / totalHeight) * 100;
        scrollProgress.style.width = `${progress}%`;
      } else {
        scrollProgress.style.width = '0%';
      }
    };
    window.addEventListener('scroll', handleScrollProgress);
    handleScrollProgress();
  }
});

// ==========================================
// A. INTERACTION CANVAS — Click Burst Particles & Cursor Trail
// ==========================================
(function() {
  const canvas = document.getElementById('interaction-canvas');
  if (!canvas) return;
  const ctx = canvas.getContext('2d');

  function resizeCanvas() {
    canvas.width = window.innerWidth;
    canvas.height = window.innerHeight;
  }
  resizeCanvas();
  window.addEventListener('resize', resizeCanvas);

  const particles = [];
  const trailParticles = [];

  function getThemeColors() {
    const season = document.documentElement.getAttribute('data-season') || 'autumn';
    const isDark = document.documentElement.classList.contains('dark');
    const palettes = {
      spring: isDark ? ['#4ade80', '#f9a8d4', '#eefaf2', '#86efac'] : ['#168a54', '#f48fb1', '#12261b', '#34d399'],
      summer: isDark ? ['#fb923c', '#facc15', '#fff8eb', '#fdba74'] : ['#e1520a', '#f5b019', '#1c140d', '#fbbf24'],
      autumn: isDark ? ['#f97316', '#f59e0b', '#faf0e4', '#fdba74'] : ['#b93a0e', '#d97706', '#22140d', '#ea580c'],
      winter: isDark ? ['#38bdf8', '#a5b4fc', '#f0f7ff', '#7dd3fc'] : ['#0284c7', '#818cf8', '#0f172a', '#38bdf8']
    };
    return palettes[season] || palettes.autumn;
  }

  class BurstParticle {
    constructor(x, y) {
      const colors = getThemeColors();
      this.x = x;
      this.y = y;
      this.color = colors[Math.floor(Math.random() * colors.length)];
      const angle = Math.random() * Math.PI * 2;
      const speed = Math.random() * 4 + 1.5;
      this.vx = Math.cos(angle) * speed;
      this.vy = Math.sin(angle) * speed;
      this.alpha = 1;
      this.size = Math.random() * 4 + 2;
      this.type = Math.floor(Math.random() * 3);
      this.gravity = 0.08;
      this.life = 1;
      this.decay = Math.random() * 0.025 + 0.015;
    }
    update() {
      this.vy += this.gravity;
      this.x += this.vx;
      this.y += this.vy;
      this.vx *= 0.97;
      this.life -= this.decay;
      this.alpha = Math.max(0, this.life);
    }
    draw() {
      ctx.save();
      ctx.globalAlpha = this.alpha;
      ctx.fillStyle = this.color;
      ctx.strokeStyle = this.color;
      ctx.lineWidth = 1.5;
      if (this.type === 0) {
        ctx.beginPath();
        ctx.arc(this.x, this.y, this.size, 0, Math.PI * 2);
        ctx.fill();
      } else if (this.type === 1) {
        const s = this.size * 1.5;
        ctx.beginPath();
        ctx.moveTo(this.x - s, this.y); ctx.lineTo(this.x + s, this.y);
        ctx.moveTo(this.x, this.y - s); ctx.lineTo(this.x, this.y + s);
        ctx.stroke();
      } else {
        ctx.fillRect(this.x - this.size / 2, this.y - this.size / 2, this.size, this.size);
      }
      ctx.restore();
    }
    get dead() { return this.life <= 0; }
  }

  class TrailParticle {
    constructor(x, y) {
      const colors = getThemeColors();
      this.x = x;
      this.y = y;
      this.size = Math.random() * 2.5 + 0.5;
      this.alpha = Math.random() * 0.5 + 0.3;
      this.color = colors[Math.floor(Math.random() * 2)];
      this.life = 1;
      this.decay = Math.random() * 0.06 + 0.04;
    }
    update() {
      this.life -= this.decay;
      this.alpha = Math.max(0, this.life * 0.6);
      this.size *= 0.93;
    }
    draw() {
      ctx.save();
      ctx.globalAlpha = this.alpha;
      ctx.fillStyle = this.color;
      ctx.beginPath();
      ctx.arc(this.x, this.y, this.size, 0, Math.PI * 2);
      ctx.fill();
      ctx.restore();
    }
    get dead() { return this.life <= 0 || this.size < 0.2; }
  }

  document.addEventListener('click', (e) => {
    const count = 16;
    for (let i = 0; i < count; i++) {
      particles.push(new BurstParticle(e.clientX, e.clientY));
    }
  });

  let mouseX = 0, mouseY = 0;
  document.addEventListener('mousemove', (e) => {
    mouseX = e.clientX;
    mouseY = e.clientY;
    if (Math.random() > 0.4) {
      trailParticles.push(new TrailParticle(mouseX, mouseY));
    }
  });

  function render() {
    ctx.clearRect(0, 0, canvas.width, canvas.height);

    for (let i = trailParticles.length - 1; i >= 0; i--) {
      trailParticles[i].update();
      trailParticles[i].draw();
      if (trailParticles[i].dead) trailParticles.splice(i, 1);
    }

    for (let i = particles.length - 1; i >= 0; i--) {
      particles[i].update();
      particles[i].draw();
      if (particles[i].dead) particles.splice(i, 1);
    }

    requestAnimationFrame(render);
  }
  render();
})();

// ==========================================
// B. MAGNETIC BUTTON EFFECT
// ==========================================
(function() {
  const magnetTargets = document.querySelectorAll('a[href="#projects"], a[href="#contact"], #download-cv-btn, a[href="cv.html"], a[href="/cv"], #theme-toggle-btn');

  magnetTargets.forEach(el => {
    el.classList.add('magnetic-effect');

    el.addEventListener('mousemove', (e) => {
      const rect = el.getBoundingClientRect();
      const centerX = rect.left + rect.width / 2;
      const centerY = rect.top + rect.height / 2;
      const deltaX = (e.clientX - centerX) * 0.3;
      const deltaY = (e.clientY - centerY) * 0.3;
      el.style.transform = `translate(${deltaX}px, ${deltaY}px)`;
    });

    el.addEventListener('mouseleave', () => {
      el.style.transform = 'translate(0px, 0px)';
    });
  });
})();

// ==========================================
// C. 3D TILT CARD PARALLAX EFFECT
// ==========================================
(function() {
  function applyTilt() {
    const cards = document.querySelectorAll('.carousel-slide, .lib-card, .border-2.border-charcoalText.p-8.rounded-2xl');
    cards.forEach(card => {
      if (card.classList.contains('tilt-attached')) return;
      card.classList.add('tilt-card', 'tilt-attached');

      card.addEventListener('mousemove', (e) => {
        const rect = card.getBoundingClientRect();
        const x = e.clientX - rect.left;
        const y = e.clientY - rect.top;
        const centerX = rect.width / 2;
        const centerY = rect.height / 2;
        const rotateX = ((y - centerY) / centerY) * -8;
        const rotateY = ((x - centerX) / centerX) * 8;
        card.style.transform = `perspective(800px) rotateX(${rotateX}deg) rotateY(${rotateY}deg) scale3d(1.02, 1.02, 1.02)`;
        card.style.boxShadow = `${-rotateY * 1.5}px ${rotateX * 1.5}px 30px rgba(65,106,252,0.18)`;
      });

      card.addEventListener('mouseleave', () => {
        card.style.transform = 'perspective(800px) rotateX(0deg) rotateY(0deg) scale3d(1, 1, 1)';
        card.style.boxShadow = '';
      });
    });
  }

  applyTilt();
  const tiltObserver = new MutationObserver(() => applyTilt());
  tiltObserver.observe(document.body, { childList: true, subtree: true });
})();

// ==========================================
// D. CYBER TEXT SCRAMBLE EFFECT
// ==========================================
(function() {
  const chars = 'ABCDEFGHIJKLMNOPQRSTUVWXYZ0123456789@#$%&';

  function scramble(el, finalText, duration = 900) {
    let frame = 0;
    const totalFrames = Math.ceil(duration / 16);
    let rafId;
    const original = finalText || el.textContent;

    function tick() {
      frame++;
      const progress = frame / totalFrames;
      let output = '';
      for (let i = 0; i < original.length; i++) {
        if (original[i] === ' ') { output += ' '; continue; }
        if (i / original.length < progress) {
          output += original[i];
        } else {
          output += chars[Math.floor(Math.random() * chars.length)];
        }
      }
      el.textContent = output;
      if (frame < totalFrames) {
        rafId = requestAnimationFrame(tick);
      } else {
        el.textContent = original;
      }
    }
    cancelAnimationFrame(rafId);
    tick();
  }

  const heroSpans = document.querySelectorAll('.hero-slide-up');
  heroSpans.forEach(span => {
    const orig = span.textContent.trim();
    span.style.cursor = 'default';
    span.addEventListener('mouseenter', () => {
      scramble(span, orig, 700);
    });
    span.addEventListener('click', () => {
      scramble(span, orig, 700);
    });
  });

  const headings = document.querySelectorAll('h2');
  headings.forEach(h => {
    const orig = h.textContent.trim();
    h.addEventListener('mouseenter', () => {
      scramble(h, orig, 600);
    });
    h.addEventListener('click', () => {
      scramble(h, orig, 600);
    });
  });

  const preloader = document.getElementById('preloader');
  if (preloader) {
    const observer = new MutationObserver(() => {
      if (preloader.classList.contains('preloader-hidden')) {
        setTimeout(() => {
          heroSpans.forEach((span, i) => {
            setTimeout(() => scramble(span, span.textContent.trim(), 800), i * 180);
          });
        }, 400);
        observer.disconnect();
      }
    });
    observer.observe(preloader, { attributes: true, attributeFilter: ['class'] });
  }
})();

// ==========================================
// E. SKILL SHIMMER & STAGGER SCROLL REVEAL
// ==========================================
(function() {
  document.querySelectorAll('li').forEach(li => {
    if (li.textContent.trim().startsWith('✦')) {
      li.classList.add('skill-shimmer');
      li.style.cursor = 'default';
      li.style.transition = 'color 0.3s ease';
    }
  });

  const staggerParents = document.querySelectorAll('.grid');
  staggerParents.forEach(grid => {
    const children = grid.querySelectorAll(':scope > div, :scope > article, :scope > a');
    children.forEach((child, i) => {
      if (!child.classList.contains('scroll-reveal')) {
        child.classList.add('scroll-reveal');
      }
      child.style.transitionDelay = `${i * 80}ms`;
    });
  });

  const io = new IntersectionObserver((entries) => {
    entries.forEach(entry => {
      if (entry.isIntersecting) {
        entry.target.classList.add('revealed');
        io.unobserve(entry.target);
      }
    });
  }, { threshold: 0.1 });
})();

// ==========================================
// F. ABOUT AVATAR 3-MODE TOGGLE (Real -> Pixel -> Vector)
// ==========================================
(function() {
  document.addEventListener('DOMContentLoaded', () => {
    const avatarFrame = document.getElementById('avatar-frame');
    const avatarImg = document.getElementById('about-avatar-img');
    const avatarBadge = document.getElementById('avatar-mode-badge');
    const avatarLabel = document.getElementById('avatar-label');
    const avatarStatusTag = document.getElementById('avatar-status-tag');

    if (avatarFrame && avatarImg) {
      let modeIndex = 0; // 0: Real, 1: Pixel, 2: Vector
      const modes = [
        {
          src: 'public/images/valdric.jpg',
          grayscale: true,
          badge: '⚡ Click for 2D Pixel',
          label: '[ system.avatar ]',
          statusText: 'REAL PHOTO',
          statusColor: '#416afc'
        },
        {
          src: 'public/images/valdric_pixel.png',
          grayscale: false,
          badge: '⚡ Click for 2D Vector',
          label: '[ system.avatar_pixel ]',
          statusText: '2D PIXEL ART',
          statusColor: '#ffa5c6'
        },
        {
          src: 'public/images/valdric_vector.png',
          grayscale: false,
          badge: '⚡ Click for Real Photo',
          label: '[ system.avatar_vector ]',
          statusText: '2D VECTOR ART',
          statusColor: '#6384ff'
        }
      ];

      avatarFrame.addEventListener('click', () => {
        modeIndex = (modeIndex + 1) % modes.length;
        const currentMode = modes[modeIndex];

        avatarImg.style.transition = 'opacity 0.15s ease, transform 0.15s ease';
        avatarImg.style.opacity = '0';
        avatarImg.style.transform = 'scale(0.95)';

        setTimeout(() => {
          avatarImg.src = currentMode.src;
          if (currentMode.grayscale) {
            avatarImg.classList.add('grayscale');
          } else {
            avatarImg.classList.remove('grayscale');
          }

          if (avatarBadge) avatarBadge.textContent = currentMode.badge;
          if (avatarLabel) avatarLabel.textContent = currentMode.label;
          if (avatarStatusTag) {
            avatarStatusTag.textContent = currentMode.statusText;
          }

          avatarImg.style.opacity = '1';
          avatarImg.style.transform = 'scale(1)';
        }, 150);
      });
    }
  });
})();

// ==========================================
// G. GPU-FRIENDLY SEASONAL AMBIENT WEATHER ENGINE
//    - Spring (Mar-May): Falling sakura / blossom petals
//    - Summer (Jun-Aug): Sun-drenched glowing golden light motes
//    - Autumn (Sep-Nov): Gentle falling autumn leaves
//    - Winter (Dec-Feb): Crisp lightweight snowfall
// ==========================================
(function() {
  const canvas = document.getElementById('seasonal-canvas');
  if (!canvas) return;
  const ctx = canvas.getContext('2d');

  let width = window.innerWidth;
  let height = window.innerHeight;
  let dpr = Math.min(window.devicePixelRatio || 1, 1.5);

  function resizeSeasonalCanvas() {
    width = window.innerWidth;
    height = window.innerHeight;
    dpr = Math.min(window.devicePixelRatio || 1, 1.5);
    canvas.width = Math.floor(width * dpr);
    canvas.height = Math.floor(height * dpr);
    ctx.setTransform(dpr, 0, 0, dpr, 0, 0);
  }
  resizeSeasonalCanvas();

  let currentSeason = document.documentElement.getAttribute('data-season') || 'autumn';
  let seasonalParticles = [];

  function getTargetParticleCount() {
    if (window.matchMedia && window.matchMedia('(prefers-reduced-motion: reduce)').matches) {
      return 8;
    }
    return width < 768 ? 18 : 32;
  }

  function getSeasonPalette(season) {
    const isDark = document.documentElement.classList.contains('dark');
    if (season === 'spring') {
      return isDark
        ? ['#f9a8d4', '#f472b6', '#fbcfe8', '#86efac']
        : ['#f48fb1', '#ec407a', '#f8bbd0', '#6ee7b7'];
    }
    if (season === 'summer') {
      return isDark
        ? ['#facc15', '#fb923c', '#fde047', '#fdba74']
        : ['#f59e0b', '#ea580c', '#fbbf24', '#f97316'];
    }
    if (season === 'autumn') {
      return isDark
        ? ['#f97316', '#f59e0b', '#ea580c', '#d97706', '#fb923c']
        : ['#c2410c', '#d97706', '#ea580c', '#b45309', '#9a3412'];
    }
    // winter
    return isDark
      ? ['#ffffff', '#e0f2fe', '#bae6fd', '#c7d2fe']
      : ['#0284c7', '#38bdf8', '#818cf8', '#7dd3fc'];
  }

  class SeasonalParticle {
    constructor(season, randomY = true) {
      this.reset(season, randomY);
    }

    reset(season, randomY = false) {
      this.season = season;
      const palette = getSeasonPalette(season);
      this.color = palette[Math.floor(Math.random() * palette.length)];
      this.x = Math.random() * width;
      this.swayPhase = Math.random() * Math.PI * 2;
      this.swaySpeed = Math.random() * 0.018 + 0.008;
      this.rotation = Math.random() * Math.PI * 2;
      this.rotationSpeed = (Math.random() - 0.5) * 0.025;
      this.flipPhase = Math.random() * Math.PI * 2;
      this.flipSpeed = Math.random() * 0.025 + 0.01;

      if (season === 'summer') {
        // Warm sun-drenched glowing light motes float gently upward
        this.y = randomY ? Math.random() * height : height + 20;
        this.size = Math.random() * 10 + 5;
        this.vy = -(Math.random() * 0.45 + 0.2);
        this.vx = (Math.random() - 0.5) * 0.3;
        this.alpha = Math.random() * 0.35 + 0.18;
      } else if (season === 'spring') {
        // Falling blossom petals
        this.y = randomY ? Math.random() * height : -20;
        this.size = Math.random() * 5.5 + 4.5;
        this.vy = Math.random() * 0.65 + 0.45;
        this.vx = Math.random() * 0.4 - 0.1;
        this.alpha = Math.random() * 0.38 + 0.35;
      } else if (season === 'autumn') {
        // Falling cozy autumn leaves
        this.y = randomY ? Math.random() * height : -25;
        this.size = Math.random() * 6.5 + 5.5;
        this.vy = Math.random() * 0.75 + 0.5;
        this.vx = Math.random() * 0.5 - 0.15;
        this.alpha = Math.random() * 0.42 + 0.35;
      } else {
        // Winter snowfall
        this.y = randomY ? Math.random() * height : -15;
        this.size = Math.random() * 3.8 + 1.8;
        this.vy = Math.random() * 0.8 + 0.45;
        this.vx = (Math.random() - 0.5) * 0.3;
        this.alpha = Math.random() * 0.45 + 0.3;
      }
    }

    update() {
      this.swayPhase += this.swaySpeed;
      this.rotation += this.rotationSpeed;
      this.flipPhase += this.flipSpeed;

      if (this.season === 'summer') {
        this.x += this.vx + Math.sin(this.swayPhase) * 0.35;
        this.y += this.vy;
        if (this.y < -30) this.reset(this.season, false);
      } else if (this.season === 'spring') {
        this.x += this.vx + Math.sin(this.swayPhase) * 0.65;
        this.y += this.vy;
        if (this.y > height + 25) this.reset(this.season, false);
      } else if (this.season === 'autumn') {
        this.x += this.vx + Math.cos(this.swayPhase) * 0.85;
        this.y += this.vy;
        if (this.y > height + 30) this.reset(this.season, false);
      } else {
        // winter
        this.x += this.vx + Math.sin(this.swayPhase) * 0.4;
        this.y += this.vy;
        if (this.y > height + 20) this.reset(this.season, false);
      }

      if (this.x > width + 30) this.x = -25;
      if (this.x < -30) this.x = width + 25;
    }

    draw() {
      ctx.save();
      ctx.translate(this.x, this.y);

      if (this.season === 'spring') {
        // Draw cherry blossom petal
        const flipScale = 0.55 + Math.abs(Math.cos(this.flipPhase)) * 0.45;
        ctx.rotate(this.rotation);
        ctx.scale(1, flipScale);
        ctx.globalAlpha = this.alpha;
        ctx.fillStyle = this.color;
        const s = this.size;
        ctx.beginPath();
        ctx.moveTo(0, s);
        ctx.bezierCurveTo(-s * 1.1, s * 0.4, -s * 0.9, -s * 0.9, -s * 0.22, -s);
        ctx.lineTo(0, -s * 0.65);
        ctx.lineTo(s * 0.22, -s);
        ctx.bezierCurveTo(s * 0.9, -s * 0.9, s * 1.1, s * 0.4, 0, s);
        ctx.closePath();
        ctx.fill();
      } else if (this.season === 'summer') {
        // Draw warm glowing sun-mote / solar orb
        const pulse = 0.75 + Math.sin(this.swayPhase * 1.5) * 0.25;
        const r = this.size * pulse;
        ctx.globalAlpha = this.alpha * pulse;
        const grad = ctx.createRadialGradient(0, 0, 0, 0, 0, r * 2.2);
        grad.addColorStop(0, this.color);
        grad.addColorStop(0.45, this.color);
        grad.addColorStop(1, 'rgba(251, 191, 36, 0)');
        ctx.fillStyle = grad;
        ctx.beginPath();
        ctx.arc(0, 0, r * 2.2, 0, Math.PI * 2);
        ctx.fill();
      } else if (this.season === 'autumn') {
        // Draw cozy falling autumn leaf
        const flipScale = 0.45 + Math.abs(Math.sin(this.flipPhase)) * 0.55;
        ctx.rotate(this.rotation + Math.sin(this.swayPhase) * 0.35);
        ctx.scale(1, flipScale);
        ctx.globalAlpha = this.alpha;
        ctx.fillStyle = this.color;
        ctx.strokeStyle = this.color;
        const s = this.size;
        ctx.beginPath();
        ctx.moveTo(0, -s * 1.1);
        ctx.quadraticCurveTo(s * 0.95, -s * 0.25, 0, s * 1.1);
        ctx.quadraticCurveTo(-s * 0.95, -s * 0.25, 0, -s * 1.1);
        ctx.closePath();
        ctx.fill();
        // Subtle stem
        ctx.lineWidth = 1;
        ctx.beginPath();
        ctx.moveTo(0, s * 1.0);
        ctx.lineTo(0, s * 1.45);
        ctx.stroke();
      } else {
        // Draw crisp winter snowflake
        ctx.globalAlpha = this.alpha;
        ctx.fillStyle = this.color;
        ctx.strokeStyle = this.color;
        if (this.size > 3.6) {
          ctx.rotate(this.rotation);
          ctx.lineWidth = 1.1;
          for (let i = 0; i < 3; i++) {
            ctx.beginPath();
            ctx.moveTo(-this.size, 0);
            ctx.lineTo(this.size, 0);
            ctx.stroke();
            ctx.rotate(Math.PI / 3);
          }
        } else {
          ctx.beginPath();
          ctx.arc(0, 0, this.size, 0, Math.PI * 2);
          ctx.fill();
        }
      }

      ctx.restore();
    }
  }

  function initSeasonalParticles(season) {
    currentSeason = season;
    const count = getTargetParticleCount();
    seasonalParticles = [];
    for (let i = 0; i < count; i++) {
      seasonalParticles.push(new SeasonalParticle(season, true));
    }
  }

  window.setSeasonalWeather = function(newSeason) {
    initSeasonalParticles(newSeason || 'autumn');
  };

  window.addEventListener('resize', () => {
    resizeSeasonalCanvas();
    const targetCount = getTargetParticleCount();
    while (seasonalParticles.length > targetCount) seasonalParticles.pop();
    while (seasonalParticles.length < targetCount) {
      seasonalParticles.push(new SeasonalParticle(currentSeason, true));
    }
  });

  initSeasonalParticles(currentSeason);

  function animateSeasonalWeather() {
    if (!document.hidden) {
      ctx.clearRect(0, 0, width, height);
      for (let i = 0; i < seasonalParticles.length; i++) {
        seasonalParticles[i].update();
        seasonalParticles[i].draw();
      }
    }
    requestAnimationFrame(animateSeasonalWeather);
  }
  animateSeasonalWeather();
})();
