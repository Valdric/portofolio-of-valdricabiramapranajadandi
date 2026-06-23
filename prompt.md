# Master Prompt: Poch Studio-Style Editorial Portfolio (VAbirama.dev)

Copy and paste the prompt below into Stitch AI or any advanced coding assistant to generate a fully complete, production-ready, and highly interactive print-editorial style portfolio website.

---

```text
Act as an expert frontend developer and senior UI/UX designer. Build a complete, highly interactive, modern, and fully responsive personal portfolio website for an Informatics Engineering student named "Valdric Abirama Pranaja Dandi" (brand name: "VAbirama"). 

The website must be styled in a warm, clean, print-editorial aesthetic inspired by creative agencies like "poch.studio" (warm cream backgrounds, floating bottom navigation, horizontal project carousels, thin gridlines, bold typography, an intro preloader loading screen, and a custom circular cursor).

Generate clean, production-ready code split into three separate files: `index.html`, `style.css`, and `script.js`.

### 1. DESIGN SYSTEM & VISUAL AESTHETICS
- **Theme:** Warm, print-inspired off-white light theme.
- **Color Palette:**
  - Primary Background: Warm Cream/Alabaster (#FAF9F6)
  - Card/Interactive Highlights: Soft Yellow (#FFF6C6) or Pastel Pink (#ffa5c6)
  - Accents: Cobalt/Electric Blue (#416afc)
  - Typography/Borders: Dark Charcoal/Black (#121212)
- **Typography:** Display styling using "Space Grotesk" for large bold headings, and clean geometric "Outfit" for content/body.
- **Micro-Animations:** Custom cursor expansion on hover, outline box shifts, infinite text ticker scroll, preloader loader transitions, and slide-up title reveals.

### 2. PAGE STRUCTURE & SECTIONS (Single-Page Layout)

#### A. Interactive Preloader Overlay
- A full-screen overlay (`#121212` background) displaying progress text counter (`initializing` -> `building grid sections` -> `rendering creative modules` -> `welcome`) and a progress bar. 
- Once loaded, the overlay slides upward out of the screen, unlocking body scrolling and triggering staggered slide-up heading reveals.

#### B. Top Status Header
- A simple, flat header bar showing the brand logo (e.g., "V Abirama" in a black box) and current state metadata (e.g., "Loc: Indonesia", "Open for commissions") divided by thin gray line slots.

#### C. Floating Bottom Navigation Dock
- A fixed dock-like navigation menu centered at the bottom viewport boundary.
- Encased in a pill-shaped container with round edges and a dark border.
- Features smooth text buttons for: Home, About, Skills, Work, Contact, which toggle a high-contrast fill background on scroll spy activation.

#### D. Hero Section
- Minimalist background featuring giant, screen-spanning lowercase headings split into staggered reveal lines: "valdric / abirama / pranaja / dandi" clipping upwards from behind a mask.
- A custom typewriter text cycle running underneath in cobalt: "Informatics Engineering Student", "Full-Stack Developer", "Game Dev Enthusiast".
- High-contrast, outline-style pill shape CTA buttons: "[ View Projects ]" and "[ Let's Talk ]".

#### E. Infinite Marquee Banner
- A full-width running horizontal banner beneath the hero section with an infinite looping text track listing Valdric's skills and roles, separating words with stars (✦).

#### F. About Me (Editorial Grid)
- Divided using clean black lines (`border-2 border-charcoalText`).
- Left Column: Cyberpunk avatar profile picture (`avatar.jpg`) encased in a solid black border container with a soft yellow background.
- Right Column: Professional bio outlining engineering capabilities, paired with a flat 4-block grid displaying stats: GPA (3.55+), Projects (12+), Hours Coded (1.5k+), and Game Jams (4+).

#### G. Tech Stack & Competencies Section
- Clean four-column layout categorized as Programming Languages, Frontend, Mobile & Game Dev, Tools & Databases. Hovering over a card dynamically morphs the card background to highlights of yellow, pink, or light cobalt.

#### H. Projects Section (Horizontal Slider Carousel)
- Horizontal slide tray housing project cards with GitHub links directed to `https://github.com/Valdric`:
  1. **Mobile Cashier App ("tubes_sab")**: POS client in Flutter.
  2. **Spectral Extraction / Soul Extractor**: C# Unity 2D horror pitch.
  3. **Physics Simulation Engine**: Javascript Canvas app featuring a trigger button labeled "Launch Sandbox".
- Two rounded arrows (← and →) sit in the top right to control smooth horizontal sliding transitions.

#### I. Contact Section & Socials
- Minimalist forms with bottom-border-only input fields (floating placeholder lines).
- Social links styled as simple vertical text grids showing arrows on hover (e.g., "Github ↗", "LinkedIn ↗").

### 3. ADVANCED JAVASCRIPT LOGIC
- **Smooth Custom Cursor**: Tracks mouse coordinates using standard coordinates for a small black center dot, and applies a LERP (Linear Interpolation) drift delay for an outer circle ring. Hovering over links scales and fills the outer ring.
  - *Critical Accessibility:* Explicitly apply `pointer-events: none !important` to custom cursor classes in CSS so click events always pass through. Hide the cursor on touchscreen devices using `@media (pointer: coarse)`.
- **ScrollSpy**: Updates active link classes inside the bottom floating nav dock based on screen scroll heights.
- **Horizontal Slide Controls**: Maps carousel left/right buttons to scroll coordinates in the project slider card container.
- **2D Light-Theme Physics Modal Sandbox**: Clicking "Launch Sandbox" launches a modal carrying a clean physics canvas.
  - Simulates collision bounds, gravity (0.45), boundary restitution, and friction dampening (0.96).
  - Clicking on the cream canvas spawns colored balls with solid outlines that bounce off boundaries and collide with each other.

### 4. CODE DELIVERABLES
Provide complete, functional code for `index.html` (with Tailwind CSS CDN), `style.css`, and `script.js` without placeholders or placeholder paths.
```
