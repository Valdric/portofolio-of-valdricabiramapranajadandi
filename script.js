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
});
