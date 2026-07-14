@php
    $models = $projects->whereIn('type', ['machine_learning', 'visualisasi', 'data_analysis_eda', 'other']);    
    $certifications = $projects->where('type', 'certification');
    $experiences = $projects->where('type', 'experience');
@endphp
<!DOCTYPE html>
<html lang="en" class="scroll-smooth">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="description" content="Portfolio of Muhammad Viyendra - Data Scientist & Machine Learning Engineer specializing in predictive modeling, deep learning, computer vision, and data analytics.">
    <title>Muhammad Viyendra | Data Scientist & ML Engineer</title>
    @vite(['resources/css/app.css', 'resources/js/app.js'])
    <link href="https://fonts.bunny.net/css?family=inter:400,500,600,700,800" rel="stylesheet" />
    <style>
        html {
            scroll-behavior: smooth;
            overflow-y: scroll;
        }
        
        /* Hide scrollbars for credentials list */
        #cert-list {
            -ms-overflow-style: none;  /* IE and Edge */
            scrollbar-width: none;  /* Firefox */
        }
        #cert-list::-webkit-scrollbar {
            display: none; /* Chrome, Safari and Opera */
        }
        
        html.loaded {
            scroll-snap-type: y mandatory;
        }

        body { 
            font-family: 'Inter', sans-serif; 
            background-color: #020617; 
            color: #ffffff; 
            overflow-x: hidden;
        }

        body.loading {
            overflow: hidden;
            height: 100vh;
        }

        /* Hide cursor when custom follower is active on desktop */
        @media (min-width: 768px) {
            body, a, button, [onclick], .tilt-card, .node-menu-btn {
                cursor: none !important;
            }
        }
        
        /* Glassmorphism system */
        .glass { 
            background: rgba(15, 23, 42, 0.35); 
            backdrop-filter: blur(16px); 
            -webkit-backdrop-filter: blur(16px); 
            border: 1px solid rgba(255, 255, 255, 0.05); 
        }
        
        .glass-nav {
            background: rgba(15, 23, 42, 0.45); 
            backdrop-filter: blur(20px); 
            -webkit-backdrop-filter: blur(20px); 
            border: 1px solid rgba(255, 255, 255, 0.08);
            box-shadow: 0 4px 30px rgba(0, 0, 0, 0.5);
        }

        .glass-card {
            position: relative;
            background: linear-gradient(135deg, rgba(255, 255, 255, 0.03) 0%, rgba(255, 255, 255, 0.005) 100%);
            backdrop-filter: blur(12px);
            -webkit-backdrop-filter: blur(12px);
            border: 1px solid rgba(255, 255, 255, 0.05);
            box-shadow: 0 8px 32px 0 rgba(0, 0, 0, 0.3);
            transition: all 0.5s cubic-bezier(0.16, 1, 0.3, 1);
            overflow: hidden;
        }

        /* Custom Glowing Border that tracks the cursor */
        .glass-card::before {
            content: '';
            position: absolute;
            inset: 0;
            border-radius: inherit;
            padding: 1.5px;
            background: radial-gradient(circle 140px at var(--mouse-x, 50%) var(--mouse-y, 50%), rgba(96, 165, 250, 0.35) 0%, transparent 60%);
            -webkit-mask: linear-gradient(#fff 0 0) content-box, linear-gradient(#fff 0 0);
            mask: linear-gradient(#fff 0 0) content-box, linear-gradient(#fff 0 0);
            -webkit-mask-composite: xor;
            mask-composite: exclude;
            opacity: 0;
            transition: opacity 0.5s ease;
            pointer-events: none;
            z-index: 5;
        }

        .glass-card:hover::before {
            opacity: 1;
        }

        .glass-card:hover {
            border-color: rgba(59, 130, 246, 0.35);
            background: linear-gradient(135deg, rgba(255, 255, 255, 0.05) 0%, rgba(59, 130, 246, 0.02) 100%);
            box-shadow: 0 20px 45px -15px rgba(59, 130, 246, 0.25), inset 0 0 12px rgba(59, 130, 246, 0.04);
            transform: translateY(-5px);
        }

        .text-gradient { 
            background: linear-gradient(to right, #ffffff 20%, #60a5fa 60%, #3b82f6 100%); 
            -webkit-background-clip: text; 
            -webkit-text-fill-color: transparent; 
        }

        /* Snap Section */
        .snap-section {
            scroll-snap-align: start;
            scroll-snap-stop: always;
            min-height: 100vh;
            display: flex;
            flex-direction: column;
            justify-content: center;
            position: relative;
            z-index: 10;
            padding-top: 6rem;
            padding-bottom: 4rem;
            box-sizing: border-box;
        }

        /* Scroll reveal system with cinematic scale transition */
        .reveal {
            opacity: 0;
            transform: translateY(40px) scale(0.96);
            transition: opacity 1s cubic-bezier(0.16, 1, 0.3, 1), transform 1s cubic-bezier(0.16, 1, 0.3, 1);
        }

        .reveal.active {
            opacity: 1;
            transform: translateY(0) scale(1);
        }
        
        /* 3D Tilt Card */
        .tilt-card {
            transform-style: preserve-3d;
            transition: transform 0.15s ease-out, border-color 0.4s ease, box-shadow 0.4s ease;
        }

        /* Floating elements animation */
        @keyframes float {
            0% { transform: translateY(0px); }
            50% { transform: translateY(-10px); }
            100% { transform: translateY(0px); }
        }
        .animate-float {
            animation: float 4s ease-in-out infinite;
        }

        /* Laser scanning effect animation */
        @keyframes scan {
            0% { top: 0%; opacity: 0.3; }
            50% { top: 100%; opacity: 1; }
            100% { top: 0%; opacity: 0.3; }
        }
        .animate-scan {
            animation: scan 3.5s ease-in-out infinite;
        }

        /* Preloader Circular Sweep Portal Crop */
        #preloader {
            transition: clip-path 1.5s cubic-bezier(0.86, 0, 0.07, 1), opacity 1.5s ease-out, visibility 1.5s;
            clip-path: circle(100% at 50% 50%);
            opacity: 1;
            visibility: visible;
        }
        #preloader.fade-out {
            clip-path: circle(0% at 50% 50%);
            opacity: 0.3;
            visibility: hidden;
            pointer-events: none;
        }
        
        /* Custom scrollbar */
        ::-webkit-scrollbar {
            width: 8px;
        }
        ::-webkit-scrollbar-track {
            background: #020617;
        }
        ::-webkit-scrollbar-thumb {
            background: #1e293b;
            border-radius: 4px;
        }
        ::-webkit-scrollbar-thumb:hover {
            background: #3b82f6;
        }

        /* Custom lag-free hide scrollbar utility */
        .scrollbar-none::-webkit-scrollbar {
            display: none;
        }
        .scrollbar-none {
            -ms-overflow-style: none;
            scrollbar-width: none;
        }
    </style>
</head>
<body class="antialiased relative selection:bg-blue-500 selection:text-white loading">
    <script>
        const urlParams = new URLSearchParams(window.location.search);
        if (urlParams.get('skip_intro') === 'true') {
            document.body.classList.remove('loading');
            document.documentElement.classList.add('loaded');
            document.write('<style>#preloader { display: none !important; }</style>');
        }
    </script>

    <!-- Custom Luxury Cursor Follower (Mix blend mode screen for premium neon transparency) -->
    <div id="custom-cursor-dot" class="fixed w-2.5 h-2.5 bg-blue-400 rounded-full pointer-events-none z-[99999] -translate-x-1/2 -translate-y-1/2 transition-transform duration-75 ease-out mix-blend-screen shadow-[0_0_10px_rgba(96,165,250,0.9)] hidden md:block"></div>
    <div id="custom-cursor-ring" class="fixed w-9 h-9 border border-blue-500/40 rounded-full pointer-events-none z-[99998] -translate-x-1/2 -translate-y-1/2 transition-[width,height,border-color,background-color,box-shadow] duration-500 cubic-bezier(0.16, 1, 0.3, 1) mix-blend-screen hidden md:block"></div>

    <!-- Futuristic Preloader Overlay -->
    <div id="preloader" class="fixed inset-0 w-full h-full bg-[#020617] z-[9999] flex flex-col items-center justify-center">
        <!-- Digital Matrix Grid Background Decor -->
        <div class="absolute inset-0 opacity-[0.03] pointer-events-none bg-[linear-gradient(to_right,#808080_1px,transparent_1px),linear-gradient(to_bottom,#808080_1px,transparent_1px)] bg-[size:28px_28px]"></div>
        
        <div class="flex flex-col items-center max-w-md px-6 text-center space-y-8 z-10">
            <!-- Glowing Rotating Rings and Logo -->
            <div class="relative flex items-center justify-center p-10">
                <!-- Outer Rotating Ring -->
                <div id="ring-outer" class="absolute inset-0 rounded-full border border-dashed border-blue-500/30 animate-spin transition-all duration-[2s]" style="animation-duration: 20s;"></div>
                <!-- Inner Reverse Ring -->
                <div id="ring-inner" class="absolute inset-3 rounded-full border border-double border-indigo-500/20 animate-spin transition-all duration-[2s]" style="animation-duration: 10s; animation-direction: reverse;"></div>
                
                <div class="flex items-center justify-center text-blue-400 font-extrabold text-4xl tracking-wider animate-pulse relative z-10">
                    <!-- Neural Network Logo (Preloader) -->
                    <svg class="w-10 h-10 mr-3 text-blue-400" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1.5">
                        <line x1="5" y1="7" x2="12" y2="5" stroke-opacity="0.6"/>
                        <line x1="5" y1="7" x2="12" y2="12" stroke-opacity="0.6"/>
                        <line x1="5" y1="7" x2="12" y2="19" stroke-opacity="0.3"/>
                        <line x1="5" y1="17" x2="12" y2="5" stroke-opacity="0.3"/>
                        <line x1="5" y1="17" x2="12" y2="12" stroke-opacity="0.6"/>
                        <line x1="5" y1="17" x2="12" y2="19" stroke-opacity="0.6"/>
                        <line x1="12" y1="5" x2="19" y2="7" stroke-opacity="0.6"/>
                        <line x1="12" y1="5" x2="19" y2="17" stroke-opacity="0.3"/>
                        <line x1="12" y1="12" x2="19" y2="7" stroke-opacity="0.6"/>
                        <line x1="12" y1="12" x2="19" y2="17" stroke-opacity="0.6"/>
                        <line x1="12" y1="19" x2="19" y2="7" stroke-opacity="0.3"/>
                        <line x1="12" y1="19" x2="19" y2="17" stroke-opacity="0.6"/>
                        <circle cx="5" cy="7" r="1.5" fill="currentColor"/>
                        <circle cx="5" cy="17" r="1.5" fill="currentColor"/>
                        <circle cx="12" cy="5" r="1.5" fill="currentColor"/>
                        <circle cx="12" cy="12" r="1.5" fill="currentColor"/>
                        <circle cx="12" cy="19" r="1.5" fill="currentColor"/>
                        <circle cx="19" cy="7" r="1.5" fill="currentColor"/>
                        <circle cx="19" cy="17" r="1.5" fill="currentColor"/>
                    </svg>
                    <span>Viyendra.</span>
                </div>
            </div>
            
            <!-- Loader status text -->
            <div class="font-mono text-xs text-blue-400/70 h-5 overflow-hidden transition-colors duration-300" id="loader-status">
                INITIALIZING PIPELINE...
            </div>

            <!-- Interactive Loader Core Area -->
            <div class="h-24 flex items-center justify-center relative w-64">
                <!-- Loader percentage -->
                <div id="loader-progress-group" class="flex items-baseline space-x-1 font-mono transition-all duration-500">
                    <span id="loader-percent" class="text-6xl font-extrabold text-white tracking-tighter">00</span>
                    <span class="text-blue-500 font-bold text-xl">%</span>
                </div>

                <!-- Connect Node Call-To-Action (Hidden initially) -->
                <button id="enter-btn" class="absolute opacity-0 scale-95 pointer-events-none transition-all duration-500 glass border border-blue-500/30 px-8 py-4 rounded-full text-xs font-mono tracking-widest text-blue-400 hover:text-white hover:border-blue-400 hover:shadow-[0_0_30px_rgba(59,130,246,0.5)] flex items-center gap-2 cursor-pointer group">
                    <span>CONNECT NODE</span>
                    <svg class="w-4 h-4 transform group-hover:translate-x-1.5 transition duration-300" fill="none" stroke="currentColor" stroke-width="2.5" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" d="M9 5l7 7-7 7"/></svg>
                </button>
            </div>

            <!-- Loader bar -->
            <div id="loader-bar-container" class="w-48 h-[2px] bg-slate-950 rounded-full overflow-hidden border border-white/5 transition-all duration-500">
                <div id="loader-bar" class="h-full bg-gradient-to-r from-blue-500 to-indigo-500 w-0 transition-all duration-100 ease-out"></div>
            </div>
        </div>
    </div>

    <!-- Standalone Preloader Script (runs before Three.js, never blocked by 3D errors) -->
    <script>
    (function() {
        // ponytail: preloader extracted to standalone script to avoid Three.js crash cascade
        var statusTexts = [
            "INITIALIZING MACHINE LEARNING CORES...",
            "CONNECTING TO NEURAL PLEXUS GRAPH...",
            "LOADING TENSORFLOW KERNELS...",
            "GENERATING HOLOGRAPHIC CREDENTIALS...",
            "TUNING ENSEMBLE REGRESSORS...",
            "PIPELINE COMPILED. SYSTEM ONLINE."
        ];

        var loaderPercent = document.getElementById('loader-percent');
        var loaderBar = document.getElementById('loader-bar');
        var loaderStatus = document.getElementById('loader-status');
        var preloader = document.getElementById('preloader');
        var enterBtn = document.getElementById('enter-btn');
        var loaderProgressGroup = document.getElementById('loader-progress-group');
        var loaderBarContainer = document.getElementById('loader-bar-container');
        var flashOverlay = document.getElementById('flash-overlay');
        var ringOuter = document.getElementById('ring-outer');
        var ringInner = document.getElementById('ring-inner');

        var percent = 0;
        var statusIndex = 0;

        var preloaderInterval = setInterval(function() {
            percent += Math.floor(Math.random() * 4) + 1;
            if (percent >= 100) {
                percent = 100;
                clearInterval(preloaderInterval);
                setTimeout(function() {
                    loaderStatus.textContent = "[ CONNECTION READY. SECURE LINK ESTABLISHED ]";
                    loaderStatus.classList.remove('text-blue-400/70');
                    loaderStatus.classList.add('text-emerald-400', 'font-bold');
                    loaderProgressGroup.classList.add('opacity-0', 'scale-95', 'pointer-events-none');
                    loaderBarContainer.classList.add('opacity-0', 'scale-95', 'pointer-events-none');
                    setTimeout(function() {
                        enterBtn.classList.remove('opacity-0', 'scale-95', 'pointer-events-none');
                        enterBtn.classList.add('opacity-100', 'scale-100');
                    }, 300);
                }, 400);
            }
            loaderPercent.textContent = String(percent).padStart(2, '0');
            loaderBar.style.width = percent + '%';
            var textSection = Math.floor(percent / (100 / statusTexts.length));
            if (textSection !== statusIndex && textSection < statusTexts.length) {
                statusIndex = textSection;
                loaderStatus.textContent = statusTexts[statusIndex];
            }
        }, 22);

        // Button hover micro-interactions
        enterBtn.addEventListener('mouseenter', function() {
            ringOuter.style.animationDuration = '6s';
            ringInner.style.animationDuration = '3s';
            ringOuter.style.borderColor = 'rgba(59, 130, 246, 0.7)';
            ringInner.style.borderColor = 'rgba(99, 102, 241, 0.4)';
        });
        enterBtn.addEventListener('mouseleave', function() {
            ringOuter.style.animationDuration = '20s';
            ringInner.style.animationDuration = '10s';
            ringOuter.style.borderColor = 'rgba(59, 130, 246, 0.3)';
            ringInner.style.borderColor = 'rgba(99, 102, 241, 0.2)';
        });

        // Global callback — filled by main script once observer is ready
        window.__preloaderEnter = null;

        enterBtn.addEventListener('click', function() {
            flashOverlay.style.opacity = '0.85';
            setTimeout(function() { flashOverlay.style.opacity = '0'; }, 150);
            preloader.classList.add('fade-out');
            document.body.classList.remove('loading');
            document.documentElement.classList.add('loaded');
            // Delegate to main script if ready, otherwise just reveal all
            if (typeof window.__preloaderEnter === 'function') {
                window.__preloaderEnter();
            } else {
                // Fallback: reveal all .reveal elements directly
                document.querySelectorAll('.reveal').forEach(function(el) { el.classList.add('active'); });
            }
        });
    })();
    </script>

    <!-- Interactive click flash overlay -->
    <div id="flash-overlay" class="fixed inset-0 bg-white z-[10000] pointer-events-none opacity-0 transition-opacity duration-150"></div>

    <!-- WebGL Canvas for 3D Background Plexus -->
    <canvas id="webgl-canvas" class="fixed inset-0 w-full h-full pointer-events-none z-0"></canvas>

    <!-- Glowing Background blobs -->
    <div class="absolute top-[-10%] left-[-10%] w-[30rem] h-[30rem] bg-blue-700/10 rounded-full blur-[150px] pointer-events-none z-0"></div>
    <div class="absolute top-[45%] right-[-10%] w-[35rem] h-[35rem] bg-indigo-900/15 rounded-full blur-[180px] pointer-events-none z-0"></div>
    <div class="absolute bottom-[-5%] left-[20%] w-[30rem] h-[30rem] bg-blue-900/10 rounded-full blur-[150px] pointer-events-none z-0"></div>

    <!-- Navigation Header -->
    <nav class="fixed w-full top-6 z-50 flex justify-center px-4">
        <div class="glass-nav rounded-full px-8 py-4 flex items-center space-x-8 text-sm font-medium shadow-2xl">
            <div class="flex items-center space-x-2 text-blue-400 font-bold text-lg mr-4">
                <!-- Neural Network Logo (Navbar) -->
                <svg class="w-5 h-5 text-blue-400" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1.5">
                    <line x1="5" y1="7" x2="12" y2="5" stroke-opacity="0.6"/>
                    <line x1="5" y1="7" x2="12" y2="12" stroke-opacity="0.6"/>
                    <line x1="5" y1="7" x2="12" y2="19" stroke-opacity="0.3"/>
                    <line x1="5" y1="17" x2="12" y2="5" stroke-opacity="0.3"/>
                    <line x1="5" y1="17" x2="12" y2="12" stroke-opacity="0.6"/>
                    <line x1="5" y1="17" x2="12" y2="19" stroke-opacity="0.6"/>
                    <line x1="12" y1="5" x2="19" y2="7" stroke-opacity="0.6"/>
                    <line x1="12" y1="5" x2="19" y2="17" stroke-opacity="0.3"/>
                    <line x1="12" y1="12" x2="19" y2="7" stroke-opacity="0.6"/>
                    <line x1="12" y1="12" x2="19" y2="17" stroke-opacity="0.6"/>
                    <line x1="12" y1="19" x2="19" y2="7" stroke-opacity="0.3"/>
                    <line x1="12" y1="19" x2="19" y2="17" stroke-opacity="0.6"/>
                    <circle cx="5" cy="7" r="1.5" fill="currentColor"/>
                    <circle cx="5" cy="17" r="1.5" fill="currentColor"/>
                    <circle cx="12" cy="5" r="1.5" fill="currentColor"/>
                    <circle cx="12" cy="12" r="1.5" fill="currentColor"/>
                    <circle cx="12" cy="19" r="1.5" fill="currentColor"/>
                    <circle cx="19" cy="7" r="1.5" fill="currentColor"/>
                    <circle cx="19" cy="17" r="1.5" fill="currentColor"/>
                </svg>
                <span>Viyendra.</span>
            </div>
            <a href="#home" class="text-gray-300 hover:text-white transition">Home</a>
            <a href="#connect" class="text-gray-300 hover:text-white transition">Connect</a>
            <a href="#about" class="text-gray-300 hover:text-white transition">About</a>
            @if($experiences->count() > 0)
                <a href="#experience" class="text-gray-300 hover:text-white transition">Experiences</a>
            @endif
            <a href="#projects" class="text-gray-300 hover:text-white transition">Projects</a>
            @if($certifications->count() > 0)
                <a href="#certifications" class="text-gray-300 hover:text-white transition">Certifications</a>
            @endif
        </div>
    </nav>

    <!-- Main Container (Expanded to widescreen max-w-[90rem] / 1440px layout) -->
    <main class="max-w-[90rem] mx-auto px-8 md:px-16 relative z-10">
        
        <!-- Hero Section -->
        <section id="home" class="snap-section justify-between">
            <div class="grid grid-cols-1 lg:grid-cols-12 gap-16 items-center w-full max-w-7xl mx-auto">
                <!-- Column Left: Profile portrait frame & floating badges (Enlarged) -->
                <div class="lg:col-span-5 flex justify-center relative reveal">
                    <div class="absolute w-96 h-96 rounded-full bg-blue-500/10 blur-3xl -z-10 animate-pulse"></div>
                    
                    <!-- 3D Profile Frame (Enlarged significantly) -->
                    <div class="tilt-card relative w-80 h-96 lg:w-[26rem] lg:h-[32rem] rounded-[2.5rem] p-3.5 glass-card border border-white/10 shadow-2xl flex items-center justify-center group" data-tilt>
                        <div class="absolute inset-0 bg-gradient-to-br from-blue-600/10 via-transparent to-indigo-950/15 opacity-50 group-hover:opacity-100 transition duration-500 pointer-events-none"></div>
                        <div class="card-glare absolute inset-0 pointer-events-none z-10 transition duration-300 opacity-0" style="background: radial-gradient(circle at 50% 50%, rgba(255,255,255,0.12) 0%, transparent 60%);"></div>

                        <!-- Image Container with Laser Scanner -->
                        <div class="relative w-full h-full rounded-[2rem] overflow-hidden">
                            <img 
                                src="{{ asset('images/PasFotoFormal_MuhammadViyendra.jpeg') }}" 
                                alt="Muhammad Viyendra" 
                                class="w-full h-full object-cover grayscale-[20%] group-hover:grayscale-0 transition duration-700 scale-102 group-hover:scale-105"   
                            >
                            
                            <!-- Laser Scanning Line Overlay -->
                            <div class="absolute inset-0 pointer-events-none z-20">
                                <div class="absolute left-0 w-full h-[2px] bg-gradient-to-r from-transparent via-blue-500 to-transparent shadow-[0_0_8px_rgba(59,130,246,0.8)] animate-scan"></div>
                            </div>
                        </div>
                    </div>

                    <!-- Floating Technology Badges (Adjusted offsets for larger card) -->
                    <div class="absolute -top-6 -left-8 px-4.5 py-2.5 rounded-full glass border border-blue-500/20 text-xs font-mono font-bold tracking-wider text-blue-300 flex items-center gap-1.5 shadow-lg select-none hover:border-blue-400 hover:text-white transition duration-300 hover:scale-105 animate-float" style="animation-delay: 0s;">
                        <span class="w-1.5 h-1.5 rounded-full bg-blue-400"></span>
                        DEEP LEARNING
                    </div>
                    <div class="absolute top-[40%] -right-12 px-4.5 py-2.5 rounded-full glass border border-indigo-500/20 text-xs font-mono font-bold tracking-wider text-indigo-300 flex items-center gap-1.5 shadow-lg select-none hover:border-indigo-400 hover:text-white transition duration-300 hover:scale-105 animate-float" style="animation-delay: 1.5s;">
                        <span class="w-1.5 h-1.5 rounded-full bg-indigo-400 animate-ping"></span>
                        COMPUTER VISION
                    </div>
                    <div class="absolute -bottom-4 -left-6 px-4.5 py-2.5 rounded-full glass border border-emerald-500/20 text-xs font-mono font-bold tracking-wider text-emerald-300 flex items-center gap-1.5 shadow-lg select-none hover:border-emerald-400 hover:text-white transition duration-300 hover:scale-105 animate-float" style="animation-delay: 3s;">
                        <span class="w-1.5 h-1.5 rounded-full bg-emerald-400 animate-pulse"></span>
                        NLP PIPELINE
                    </div>
                </div>

                <!-- Column Right: Hero Typography & Info (Title First, Then Content - Enlarged) -->
                <div class="lg:col-span-7 space-y-8 reveal">
                    <!-- Status Badge -->
                    <div class="inline-flex items-center gap-2.5 px-4 py-2 bg-blue-950/30 border border-blue-500/20 rounded-full text-xs font-mono tracking-widest text-blue-400">
                        <span class="w-2 h-2 rounded-full bg-emerald-400 animate-pulse"></span>
                        STATUS: ACTIVE NODE // SYSTEM INITIALIZED
                    </div>
                    
                    <!-- Massive Title (Title first!) -->
                    <h1 class="text-6xl md:text-7xl lg:text-8xl font-extrabold tracking-tight leading-none">
                        Data Scientist & <br> <span class="text-gradient">ML Engineer</span>
                    </h1>

                    <!-- Subtitle / Name (Content starts here) -->
                    <h2 class="text-2xl md:text-3xl text-blue-400 font-semibold tracking-wide">
                        Hi, I'm Muhammad Viyendra
                    </h2>

                    <!-- Massive Description Paragraph (Enlarged) -->
                    <p class="text-gray-300 text-lg md:text-xl leading-relaxed max-w-3xl" style="text-align: justify;">
                        I am an Information Systems student specializing in Data Science and Artificial Intelligence. I have a proven track record of designing Machine Learning pipelines, building Deep Learning architectures, and implementing Computer Vision solutions—from optimizing stacked ensemble models to a 5.4% MAPE for insurance claim trends to developing assistive mobile AI technologies.
                    </p>
                    <div class="h-4"></div>
                </div>
            </div>
            
            <!-- Interactive Stats Deck -->
            <div class="grid grid-cols-2 md:grid-cols-4 gap-6 w-full max-w-7xl mx-auto mt-12 reveal">
                <div class="tilt-card glass-card rounded-2xl p-6 text-center border border-white/5 relative overflow-hidden group" data-tilt>
                    <div class="absolute inset-0 bg-gradient-to-br from-blue-500/5 to-transparent opacity-0 group-hover:opacity-100 transition duration-300"></div>
                    <h3 class="text-4xl font-extrabold text-white mb-1 group-hover:text-blue-400 transition-colors duration-300">3.96</h3>
                    <p class="text-gray-500 text-xs font-mono tracking-wider uppercase">Academic GPA</p>
                </div>
                <div class="tilt-card glass-card rounded-2xl p-6 text-center border border-white/5 relative overflow-hidden group" data-tilt>
                    <div class="absolute inset-0 bg-gradient-to-br from-indigo-500/5 to-transparent opacity-0 group-hover:opacity-100 transition duration-300"></div>
                    <h3 class="text-4xl font-extrabold text-white mb-1 group-hover:text-indigo-400 transition-colors duration-300">High<span class="text-blue-500">+</span></h3>
                    <p class="text-gray-500 text-xs font-mono tracking-wider uppercase">Model Accuracy</p>
                </div>
                <div class="tilt-card glass-card rounded-2xl p-6 text-center border border-white/5 relative overflow-hidden group" data-tilt>
                    <div class="absolute inset-0 bg-gradient-to-br from-blue-500/5 to-transparent opacity-0 group-hover:opacity-100 transition duration-300"></div>
                    <h3 class="text-4xl font-extrabold text-white mb-1 group-hover:text-blue-400 transition-colors duration-300">5<span class="text-blue-500">+</span></h3>
                    <p class="text-gray-500 text-xs font-mono tracking-wider uppercase">Competitions</p>
                </div>
                <div class="tilt-card glass-card rounded-2xl p-6 text-center border border-white/5 relative overflow-hidden group" data-tilt>
                    <div class="absolute inset-0 bg-gradient-to-br from-indigo-500/5 to-transparent opacity-0 group-hover:opacity-100 transition duration-300"></div>
                    <h3 class="text-4xl font-extrabold text-white mb-1 group-hover:text-indigo-400 transition-colors duration-300">25<span class="text-blue-500">+</span></h3>
                    <p class="text-gray-500 text-xs font-mono tracking-wider uppercase">Datasets Analyzed</p>
                </div>
            </div>
        </section>

        <!-- Connect Section (3D Interactive Hub - Centered Igloo Style - Frameless) -->
        <section id="connect" class="snap-section border-t border-white/10 flex flex-col items-center justify-center">
            <div class="w-full max-w-7xl mx-auto flex flex-col justify-center items-center space-y-4 reveal">
                <!-- Sleek Centered Header -->
                <div class="text-center space-y-3 mb-6 reveal">
                    <span class="text-blue-500 font-bold uppercase tracking-widest text-xs">Interactive 3D Hub</span>
                    <h2 class="text-4xl md:text-5xl font-extrabold text-white tracking-tight">Connect with the <span class="text-gradient">Neural Core</span></h2>
                    <p class="text-gray-400 text-base max-w-xl mx-auto">Let's Connect. Drag the massive 3D gemstones to spin them, and click the text links below to connect.</p>
                </div>

                <!-- 3D Holographic Chamber Box (Centered, with frameless minimalist line-based navigation arrows in Igloo style) -->
                <div class="relative w-full max-w-2xl mx-auto h-[55vh] md:h-[65vh] flex items-center justify-center cursor-grab active:cursor-grabbing group/chamber">
                    <!-- Left Arrow Button (Igloo style - Frameless text) -->
                    <button onclick="prevNode()" class="absolute left-4 md:left-12 z-30 text-xl md:text-2xl font-mono tracking-wider transition-all duration-300 text-blue-500/70 hover:text-white hover:scale-125 cursor-pointer whitespace-nowrap drop-shadow-[0_0_8px_rgba(59,130,246,0.3)] select-none">
                        [ &lt; ]
                    </button>

                    <!-- Local WebGL Interactive Canvas -->
                    <canvas id="connect-3d-canvas" class="w-full h-full block"></canvas>

                    <!-- Right Arrow Button (Igloo style - Frameless text) -->
                    <button onclick="nextNode()" class="absolute right-4 md:right-12 z-30 text-xl md:text-2xl font-mono tracking-wider transition-all duration-300 text-blue-500/70 hover:text-white hover:scale-125 cursor-pointer whitespace-nowrap drop-shadow-[0_0_8px_rgba(59,130,246,0.3)] select-none">
                        [ &gt; ]
                    </button>
                </div>

                <!-- Igloo-style Selector Menu (Flex-nowrap, whitespace-nowrap, fully responsive and scales to prevent wrapping) -->
                <div data-tilt class="tilt-card glass-card flex flex-nowrap items-center justify-center gap-2 md:gap-4 w-full max-w-3xl rounded-full px-4 md:px-8 py-3.5 z-20 overflow-hidden">
                    <button onclick="selectNode('github', true)" id="btn-github" class="node-menu-btn px-4 py-2 md:px-6 md:py-2.5 rounded-full text-sm md:text-lg lg:text-xl font-mono tracking-wider transition-all duration-300 text-gray-500 hover:text-white whitespace-nowrap">[ GitHub ]</button>
                    <button onclick="selectNode('linkedin', true)" id="btn-linkedin" class="node-menu-btn px-4 py-2 md:px-6 md:py-2.5 rounded-full text-sm md:text-lg lg:text-xl font-mono tracking-wider transition-all duration-300 text-gray-500 hover:text-white whitespace-nowrap">LinkedIn</button>
                    <button onclick="selectNode('gmail', true)" id="btn-gmail" class="node-menu-btn px-4 py-2 md:px-6 md:py-2.5 rounded-full text-sm md:text-lg lg:text-xl font-mono tracking-wider transition-all duration-300 text-gray-500 hover:text-white whitespace-nowrap">Gmail</button>
                    <button onclick="selectNode('whatsapp', true)" id="btn-whatsapp" class="node-menu-btn px-4 py-2 md:px-6 md:py-2.5 rounded-full text-sm md:text-lg lg:text-xl font-mono tracking-wider transition-all duration-300 text-gray-500 hover:text-white whitespace-nowrap">WhatsApp</button>
                </div>
            </div>
        </section>

        <!-- About Section -->
        <section id="about" class="snap-section border-t border-white/10">
            <div class="max-w-7xl mx-auto w-full">
                <div class="text-center space-y-3 mb-12 reveal">
                    <span class="text-blue-500 font-bold uppercase tracking-widest text-xs">About Me</span>
                    <h2 class="text-4xl md:text-5xl font-extrabold text-white tracking-tight">Philosophy & Tech Stack</h2>
                    <p class="text-gray-400 text-base max-w-xl mx-auto">Translating complex datasets into strategic intelligence through custom deep learning models and data engineering.</p>
                </div>
                
                <div class="grid grid-cols-1 md:grid-cols-3 gap-6">
                    <div class="glass-card rounded-3xl p-8 relative overflow-hidden flex flex-col justify-between reveal">
                        <div class="absolute top-0 right-0 w-32 h-32 bg-blue-600/10 blur-2xl rounded-full"></div>
                        <div>
                            <h3 class="text-blue-400 font-semibold mb-2 text-xl">Analytical</h3>
                            <h4 class="text-2xl font-bold text-white mb-4">Mindset & Precision</h4>
                            <p class="text-gray-400 text-sm leading-relaxed" style="text-align: justify;">
                                I approach complex datasets with deep curiosity and rigorous validation following the CRISP-DM framework. Whether engineering robust features, handling anomalies through EDA, or tuning hyperparameters, my focus is always on building models that generalize well to real-world data.
                            </p>
                        </div>
                    </div>

                    <div class="md:col-span-2 glass-card rounded-3xl p-8 flex flex-col md:flex-row gap-8 items-start reveal">
                        <div class="w-full md:w-1/2 bg-[#030712]/90 rounded-xl p-5 font-mono text-[0.8rem] text-gray-300 border border-slate-800 shadow-2xl leading-loose overflow-hidden">
                            <div class="flex space-x-2 mb-4">
                                <div class="w-3 h-3 rounded-full bg-red-500/80"></div>
                                <div class="w-3 h-3 rounded-full bg-yellow-500/80"></div>
                                <div class="w-3 h-3 rounded-full bg-green-500/80"></div>
                            </div>
                            <p><span class="text-pink-400">import</span> pandas <span class="text-pink-400">as</span> pd</p>
                            <p><span class="text-pink-400">from</span> sklearn.ensemble <span class="text-pink-400">import</span> StackingRegressor</p>
                            <br>
                            <p><span class="text-blue-400">def</span> <span class="text-yellow-200">build_model</span>(X, y):</p>
                            <p class="ml-4 text-gray-500"># Optimizing predictive accuracy</p>
                            <p class="ml-4">model = StackingRegressor(estimators=estimators)</p>
                            <p class="ml-4"><span class="text-pink-400">return</span> model.fit(X, y)</p>
                        </div>
                        <div class="w-full md:w-1/2 space-y-4">   
                            <div>
                                <h3 class="text-2xl font-bold text-white mb-1">Data-Driven <span class="text-blue-400">Solutions</span></h3>
                            </div>
                            <p class="text-white text-base font-semibold leading-relaxed" style="text-align: justify;">
                                Empowering intelligent decision-making through high-fidelity predictive modeling, end-to-end automation, and clean feature engineering.
                            </p>
                            <p class="text-gray-400 text-sm leading-relaxed" style="text-align: justify;">
                                My expertise lies in translating raw data into strategic assets. I believe the best architectures are built with a solid understanding of domain logic, structured ETL processes, and a strict obsession with preventing data leakage in stacked ensemble models.
                            </p>
                        </div>
                    </div>

                    <div class="glass-card rounded-3xl p-8 reveal">
                        <h3 class="text-xl font-bold text-white mb-5">Core Tech Stack</h3>
                        <div class="flex flex-wrap gap-2.5">
                            <span class="px-4 py-1.5 bg-transparent border border-white/10 rounded-full text-sm text-gray-300 hover:border-blue-400 hover:text-white transition">Python</span>
                            <span class="px-4 py-1.5 bg-transparent border border-white/10 rounded-full text-sm text-gray-300 hover:border-blue-400 hover:text-white transition">TensorFlow</span>
                            <span class="px-4 py-1.5 bg-transparent border border-white/10 rounded-full text-sm text-gray-300 hover:border-blue-400 hover:text-white transition">Scikit-Learn</span>
                            <span class="px-4 py-1.5 bg-transparent border border-white/10 rounded-full text-sm text-gray-300 hover:border-blue-400 hover:text-white transition">PyTorch</span>
                            <span class="px-4 py-1.5 bg-transparent border border-white/10 rounded-full text-sm text-gray-300 hover:border-blue-400 hover:text-white transition">OpenCV</span>
                            <span class="px-4 py-1.5 bg-transparent border border-white/10 rounded-full text-sm text-gray-300 hover:border-blue-400 hover:text-white transition">Pandas & NumPy</span>
                            <span class="px-4 py-1.5 bg-transparent border border-white/10 rounded-full text-sm text-gray-300 hover:border-blue-400 hover:text-white transition">Matplotlib & Seaborn</span>
                            <span class="px-4 py-1.5 bg-transparent border border-white/10 rounded-full text-sm text-gray-300 hover:border-blue-400 hover:text-white transition">MySQL</span>
                        </div>
                    </div>

                    <div class="md:col-span-2 rounded-3xl p-8 bg-gradient-to-br from-slate-950/80 to-blue-950/20 border border-blue-500/20 flex flex-col lg:flex-row items-center justify-between gap-8 text-left reveal">
                        <div class="flex-1">
                            <h3 class="text-2xl font-bold text-white mb-2">Committed to Collaboration</h3>
                            <p class="text-blue-200 text-sm max-w-xl mb-6">
                                Synergy and communication are key to translating business requirements into effective data architectures. I am experienced in leading teams through the product development lifecycle and collaborating intensively across competitive projects.
                            </p>
                            
                            <div class="grid grid-cols-1 sm:grid-cols-2 gap-3.5 text-sm text-gray-300">
                                <div class="flex items-center gap-2.5">
                                    <svg class="w-4 h-4 text-blue-400 flex-shrink-0" fill="none" stroke="currentColor" stroke-width="2" viewBox="0 0 24 24">
                                        <path stroke-linecap="round" stroke-linejoin="round" d="M5 13l4 4L19 7"></path>
                                    </svg>
                                    <span>Technical Leadership & Scrum</span>
                                </div>
                                <div class="flex items-center gap-2.5">
                                    <svg class="w-4 h-4 text-blue-400 flex-shrink-0" fill="none" stroke="currentColor" stroke-width="2" viewBox="0 0 24 24">
                                        <path stroke-linecap="round" stroke-linejoin="round" d="M5 13l4 4L19 7"></path>
                                    </svg>
                                    <span>Cross-functional Coordination</span>
                                </div>
                                <div class="flex items-center gap-2.5">
                                    <svg class="w-4 h-4 text-blue-400 flex-shrink-0" fill="none" stroke="currentColor" stroke-width="2" viewBox="0 0 24 24">
                                        <path stroke-linecap="round" stroke-linejoin="round" d="M5 13l4 4L19 7"></path>
                                    </svg>
                                    <span>Analytical Problem Solving</span>
                                </div>
                                <div class="flex items-center gap-2.5">
                                    <svg class="w-4 h-4 text-blue-400 flex-shrink-0" fill="none" stroke="currentColor" stroke-width="2" viewBox="0 0 24 24">
                                        <path stroke-linecap="round" stroke-linejoin="round" d="M5 13l4 4L19 7"></path>
                                    </svg>
                                    <span>Academic Mentoring & Guidance</span>
                                </div>
                            </div>
                        </div>
                        
                        <div class="flex-shrink-0 w-full lg:w-auto text-center lg:text-right">
                            <a href="https://wa.me/6281261455645" target="_blank" class="inline-block px-8 py-3.5 rounded-full hover:scale-105 transition-all duration-300 shadow-lg bg-white text-slate-950 font-extrabold text-sm whitespace-nowrap">
                                Let's Talk
                            </a>
                        </div>
                    </div>
                </div>
            </div>
        </section>

        <!-- Experience Section -->
        @if($experiences->count() > 0)
        <section id="experience" class="snap-section border-t border-white/10">
            <div class="max-w-5xl mx-auto w-full">
                <div class="text-center space-y-3 mb-12 reveal">
                    <span class="text-blue-500 font-bold uppercase tracking-widest text-xs">Career Timeline</span>
                    <h2 class="text-4xl md:text-5xl font-extrabold text-white tracking-tight">Professional Experiences</h2>
                    <p class="text-gray-400 text-base max-w-xl mx-auto">A chronicle of my software engineering, technical leadership, and data analytics roles.</p>
                </div>
                
                <!-- Timeline Container (Stretches fully - Scrollable window completely removed!) -->
                <div class="relative border-l border-blue-500/30 ml-4 md:ml-6 pl-8 md:pl-10 space-y-12 py-4">
                    @foreach($experiences as $exp)
                    <div class="relative reveal group">
                        <!-- Timeline Node Glow Dot -->
                        <div class="absolute -left-[41px] md:-left-[49px] top-1.5 w-5 h-5 rounded-full bg-slate-950 border-2 border-blue-500 flex items-center justify-center z-10 transition duration-300 group-hover:scale-125 group-hover:border-blue-400">
                            <div class="w-1.5 h-1.5 rounded-full bg-blue-500 group-hover:bg-blue-400 animate-pulse"></div>
                        </div>
                        <div class="absolute -left-[51px] md:-left-[59px] top-[-3.5px] w-[40px] h-[40px] rounded-full border border-blue-500/0 group-hover:border-blue-500/20 group-hover:scale-100 scale-50 opacity-0 group-hover:opacity-100 transition-all duration-500 pointer-events-none"></div>

                        <!-- Experience Glass Card (Restored as requested!) -->
                        <div class="glass-card p-8 rounded-3xl relative overflow-hidden flex flex-col justify-between border-l-4 border-l-blue-500 shadow-xl group-hover:border-l-blue-400 transition-all duration-300">
                            <div class="absolute top-0 right-0 w-32 h-32 bg-blue-600/5 blur-2xl rounded-full pointer-events-none"></div>
                            
                            <div>
                                <div class="flex flex-col sm:flex-row sm:items-center justify-between gap-2 mb-4">
                                    @if(isset($exp->metadata['company']))
                                    <span class="px-3 py-1 bg-blue-950/40 border border-blue-800/30 text-blue-300 rounded-full text-xs font-semibold w-fit">
                                        {{ $exp->metadata['company'] }}
                                    </span>
                                    @endif
                                </div>
                                
                                <h3 class="text-2xl font-bold text-white mb-3 group-hover:text-blue-400 transition duration-300">
                                    {{ $exp->title }}
                                </h3>
                                
                                <p class="text-gray-400 text-sm leading-relaxed mb-6" style="text-align: justify;">
                                    {{ $exp->description }}
                                </p>
                            </div>
                            
                            <div class="pt-4 border-t border-white/5 flex flex-col sm:flex-row justify-between items-start sm:items-center gap-4">
                                @if(isset($exp->metadata['skills']))
                                <div class="flex flex-wrap gap-1.5">
                                    @foreach(explode(',', $exp->metadata['skills']) as $skill)
                                    <span class="text-[0.7rem] bg-white/5 border border-white/5 text-gray-400 px-2 py-0.5 rounded-md font-mono">#{{ trim($skill) }}</span>
                                    @endforeach
                                </div>
                                @endif
                                
                                <a href="{{ route('project.show', $exp->slug) }}" class="inline-flex items-center gap-1.5 text-xs text-blue-400 hover:text-blue-300 font-bold transition-colors whitespace-nowrap self-end sm:self-auto flex group">
                                    Read Evidence
                                    <svg class="w-3.5 h-3.5 transform group-hover:translate-x-1 transition" fill="none" stroke="currentColor" stroke-width="2.5" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" d="M9 5l7 7-7 7"/></svg>
                                </a>
                            </div>
                        </div>
                    </div>
                    @endforeach
                </div>
            </div>
        </section>
        @endif

        <!-- Projects Header Section (ONLY ONE with Scroll to Explore indicator) -->
        <section id="projects" class="snap-section border-t border-white/10">
            <div class="max-w-7xl mx-auto w-full text-center space-y-4 mb-12 reveal">
                <span class="text-blue-500 font-bold uppercase tracking-widest text-xs md:text-sm">Portfolio Showcase</span>
                <h2 class="text-4xl md:text-5xl lg:text-6xl font-extrabold text-white tracking-tight">Featured Projects</h2>
                <p class="text-gray-300 text-lg md:text-xl max-w-3xl mx-auto">A curated collection of machine learning pipelines, deep learning architectures, and interactive data analytics dashboards.</p>
                <div class="w-px h-24 bg-gradient-to-b from-blue-500 to-transparent mt-8 mx-auto animate-pulse"></div>
                <span class="text-xs text-gray-500 uppercase tracking-widest font-mono block mt-4">Scroll to explore</span>
            </div>
        </section>

        <!-- Projects List (Each project is its own full-page snap section - Clean native snap) -->
        @php $index = 1; @endphp
        @forelse($models as $project)
        <section class="snap-section border-t border-white/5">
            <div class="max-w-7xl mx-auto w-full flex flex-col {{ $index % 2 === 0 ? 'lg:flex-row-reverse' : 'lg:flex-row' }} gap-16 items-center justify-between reveal">
                <!-- Project Info (Enlarged text columns) -->
                <div class="w-full lg:w-6/12 space-y-6">
                    <div class="flex items-center gap-4">
                        <span class="text-6xl md:text-7xl font-extrabold text-blue-900/40 font-mono">{{ sprintf("%02d", $index) }} /</span>
                        <span class="inline-block px-4 py-1.5 bg-blue-950/40 border border-blue-800/30 text-blue-300 rounded-full text-xs font-bold uppercase tracking-wider">
                            {{ str_replace('_', ' ', $project->type) }}
                        </span>
                    </div>
                    
                    <!-- Enlarged Project Title -->
                    <h3 class="text-4xl md:text-5xl font-extrabold text-white leading-tight">
                        {{ $project->title }}
                    </h3>
                    
                    <!-- Enlarged Project Description -->
                    <p class="text-gray-300 text-lg md:text-xl leading-relaxed" style="text-align: justify;">
                        {{ $project->description ?: 'Tidak ada deskripsi singkat. Klik detail untuk membaca analisis lengkap.' }}
                    </p>
                    
                    @if(isset($project->metadata['metric_label']) && $project->metadata['metric_value'])
                        <div class="inline-flex items-center gap-3 bg-blue-950/20 border border-blue-500/10 rounded-2xl px-5 py-2.5">
                            <span class="text-xs text-gray-400 font-semibold uppercase tracking-wider">{{ $project->metadata['metric_label'] }}</span>
                            <div class="w-1.5 h-1.5 rounded-full bg-blue-400"></div>
                            <span class="text-base font-bold text-blue-400">{{ $project->metadata['metric_value'] }}</span>
                        </div>
                    @endif

                    <div class="pt-2">
                        <a href="{{ route('project.show', $project->slug) }}" class="inline-flex items-center gap-2 font-bold bg-blue-600 hover:bg-blue-500 text-white px-6 py-3.5 rounded-xl transition shadow-[0_0_15px_rgba(37,99,235,0.3)] group hover:scale-105 duration-300">
                            <span>Lihat Detail Proyek</span>
                            <svg class="w-4 h-4 transform group-hover:translate-x-1 transition" fill="none" stroke="currentColor" stroke-width="2" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" d="M14 5l7 7m0 0l-7 7m7-7H3"/></svg>
                        </a>
                    </div>
                </div>

                <!-- Project Interactive 3D Card (Enlarged) -->
                <div class="w-full lg:w-5/12 flex justify-center">
                    <div class="tilt-card relative w-full max-w-xl aspect-[4/3] rounded-[2.5rem] p-8 glass-card border border-white/10 shadow-2xl flex flex-col justify-between overflow-hidden group" data-tilt>
                        <!-- Card background glow decoration -->
                        <div class="absolute inset-0 bg-gradient-to-br from-blue-600/10 via-transparent to-indigo-950/15 opacity-50 group-hover:opacity-100 transition duration-500 pointer-events-none"></div>
                        
                        <!-- Card Glare Reflection element -->
                        <div class="card-glare absolute inset-0 pointer-events-none z-10 transition duration-300 opacity-0" style="background: radial-gradient(circle at 50% 50%, rgba(255,255,255,0.12) 0%, transparent 60%);"></div>

                        <div class="flex justify-between items-start z-10">
                            <div class="w-12 h-12 rounded-2xl bg-blue-600/20 border border-blue-500/30 flex items-center justify-center text-blue-400 font-extrabold shadow-inner">
                                {{ sprintf("%02d", $index) }}
                            </div>
                            <div class="text-right">
                                <span class="text-xs text-gray-500 font-mono">PROJECT TYPE</span>
                                <p class="text-sm font-semibold text-blue-300 uppercase tracking-wide">{{ str_replace('_', ' ', $project->type) }}</p>
                            </div>
                        </div>

                        <div class="space-y-4 z-10">
                            <h4 class="text-2xl md:text-3xl font-extrabold text-white leading-tight group-hover:text-blue-400 transition duration-300">
                                {{ $project->title }}
                            </h4>
                            <div class="w-12 h-1 bg-gradient-to-r from-blue-500 to-indigo-500 rounded-full"></div>
                        </div>
                        
                        <!-- Bottom info -->
                        <div class="flex justify-between items-end z-10 border-t border-white/5 pt-4">
                            <div>
                                <span class="text-xs text-gray-500 block font-mono">STATUS</span>
                                <span class="text-xs font-semibold text-emerald-400 flex items-center gap-1.5">
                                    <span class="w-1.5 h-1.5 rounded-full bg-emerald-400 animate-pulse"></span>
                                    Completed
                                </span>
                            </div>
                            <span class="text-sm font-bold text-gray-400 group-hover:text-white transition flex items-center gap-1.5 duration-300">
                                Explore <svg class="w-4 h-4 transform group-hover:translate-x-1.5 transition duration-300" fill="none" stroke="currentColor" stroke-width="2.5" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" d="M9 5l7 7-7 7"/></svg>
                            </span>
                        </div>
                    </div>
                </div>
            </div>
        </section>
        @php $index++; @endphp
        @empty
        <section class="snap-section border-t border-white/5">
            <div class="max-w-7xl mx-auto w-full text-center py-24 glass-card border border-dashed border-slate-700/50 rounded-[2rem] text-gray-500 reveal">
                Belum ada proyek yang di-upload.
            </div>
        </section>
        @endforelse

        <!-- Certifications Section -->
        @if($certifications->count() > 0)
        @php
            $firstCert = $certifications->first();
            $firstIssuer = 'CREDENTIAL';
            if ($firstCert) {
                if (stripos($firstCert->title, 'IBM') !== false) {
                    $firstIssuer = 'IBM';
                } elseif (stripos($firstCert->title, 'EDUCBA') !== false) {
                    $firstIssuer = 'EDUCBA';
                } elseif (stripos($firstCert->title, 'Dicoding') !== false) {
                    $firstIssuer = 'DICODING';
                } elseif (stripos($firstCert->title, 'Oracle') !== false) {
                    $firstIssuer = 'ORACLE';
                } elseif (stripos($firstCert->title, 'London Business School') !== false) {
                    $firstIssuer = 'LBS';
                } elseif (stripos($firstCert->title, 'Programming Hub') !== false) {
                    $firstIssuer = 'PROG_HUB';
                } elseif (stripos($firstCert->title, 'Taiwan Chamber') !== false) {
                    $firstIssuer = 'TCC';
                }
            }
        @endphp
        <section id="certifications" class="snap-section border-t border-white/10">
            <div class="max-w-7xl mx-auto w-full px-4">
                <div class="text-center space-y-3 mb-12 reveal">
                    <span class="text-blue-500 font-bold uppercase tracking-widest text-xs">Credentials Archive</span>
                    <h2 class="text-4xl md:text-5xl font-extrabold text-white tracking-tight">Licenses & Certifications</h2>
                    <p class="text-gray-400 text-base max-w-xl mx-auto">Interactive holographic terminal verifying academic credentials, technical certifications, and neural network training.</p>
                </div>

                <!-- Holographic Verification Console -->
                <div class="grid grid-cols-1 lg:grid-cols-12 gap-8 items-stretch reveal">
                    <!-- Left Console: Interactive List of Certifications (Scrollable Panel) -->
                    <div class="lg:col-span-5 flex flex-col h-[520px] glass-card rounded-3xl border border-white/10 overflow-hidden relative">
                        <!-- Header with Terminal Vibe -->
                        <div class="p-4 border-b border-white/10 bg-slate-900/40 flex items-center justify-between">
                            <span class="font-mono text-xs text-blue-400 font-semibold tracking-wider flex items-center gap-2">
                                <span class="w-2.5 h-2.5 rounded-full bg-blue-500 animate-pulse"></span>
                                SELECT_CREDENTIAL_NODE
                            </span>
                            <span class="font-mono text-[0.65rem] text-gray-500">RECORDS: {{ $certifications->count() }}</span>
                        </div>

                        <!-- Scrollable List -->
                        <div class="flex-1 overflow-y-auto p-4 space-y-3 scrollbar-none" id="cert-list">
                            @foreach($certifications as $idx => $cert)
                            <!-- Parse issuer from title -->
                            @php
                                $issuer = 'CREDENTIAL';
                                if (stripos($cert->title, 'IBM') !== false) {
                                    $issuer = 'IBM';
                                } elseif (stripos($cert->title, 'EDUCBA') !== false) {
                                    $issuer = 'EDUCBA';
                                } elseif (stripos($cert->title, 'Dicoding') !== false) {
                                    $issuer = 'DICODING';
                                } elseif (stripos($cert->title, 'Oracle') !== false) {
                                    $issuer = 'ORACLE';
                                } elseif (stripos($cert->title, 'London Business School') !== false) {
                                    $issuer = 'LBS';
                                } elseif (stripos($cert->title, 'Programming Hub') !== false) {
                                    $issuer = 'PROG_HUB';
                                } elseif (stripos($cert->title, 'Taiwan Chamber') !== false) {
                                    $issuer = 'TCC';
                                }
                            @endphp
                            <div 
                                class="cert-item group flex items-start justify-between p-4 rounded-2xl border border-white/5 bg-slate-950/40 hover:bg-slate-900/40 hover:border-blue-500/30 transition-all duration-300 cursor-pointer"
                                onclick="window.selectCredential({{ $idx }})"
                                data-index="{{ $idx }}"
                                data-title="{{ $cert->title }}"
                                data-issuer="{{ $issuer }}"
                                data-hash="{{ strtoupper(substr(md5($cert->slug), 0, 8)) }}"
                                data-cert-url="{{ $cert->metadata && isset($cert->metadata['certificate_path']) ? asset('storage/' . $cert->metadata['certificate_path']) : route('project.show', $cert->slug) }}"
                                data-details-url="{{ route('project.show', $cert->slug) }}"
                                data-slug="{{ $cert->slug }}"
                            >
                                <div class="space-y-1.5 flex-1 pr-4">
                                    <div class="flex items-center gap-2">
                                        <span class="px-2 py-0.5 rounded text-[0.55rem] font-mono font-bold tracking-widest uppercase
                                            @if($issuer == 'IBM') bg-blue-500/10 text-blue-400 border border-blue-500/20
                                            @elseif($issuer == 'DICODING') bg-teal-500/10 text-teal-400 border border-teal-500/20
                                            @elseif($issuer == 'ORACLE') bg-red-500/10 text-red-400 border border-red-500/20
                                            @elseif($issuer == 'EDUCBA') bg-violet-500/10 text-violet-400 border border-violet-500/20
                                            @elseif($issuer == 'PROG_HUB') bg-fuchsia-500/10 text-fuchsia-400 border border-fuchsia-500/20
                                            @elseif($issuer == 'LBS' || $issuer == 'TCC') bg-amber-500/10 text-amber-400 border border-amber-500/20
                                            @else bg-slate-500/10 text-slate-400 border border-slate-500/20
                                            @endif
                                        ">
                                            {{ $issuer }}
                                        </span>
                                        <span class="text-[0.6rem] font-mono text-gray-500">ID: {{ strtoupper(substr(md5($cert->slug), 0, 6)) }}</span>
                                    </div>
                                    <h4 class="text-sm font-bold text-white group-hover:text-blue-400 transition-colors duration-300 line-clamp-1">
                                        {{ $cert->title }}
                                    </h4>
                                </div>
                                <div class="flex items-center self-center h-full">
                                    <!-- Neon Checkbox/Indicator -->
                                    <div class="cert-indicator w-3.5 h-3.5 rounded-full border border-white/10 flex items-center justify-center transition-all duration-300 group-hover:border-blue-500/50">
                                        <div class="w-1.5 h-1.5 rounded-full bg-blue-400 scale-0 transition-transform duration-300 cert-dot"></div>
                                    </div>
                                </div>
                            </div>
                            @endforeach
                        </div>
                    </div>

                    <!-- Right Column: Interactive 3D Hologram Projection Chamber -->
                    <div class="lg:col-span-7 flex flex-col h-[520px] glass-card rounded-3xl border border-white/10 overflow-hidden relative bg-slate-950/20">
                        <!-- Glowing Scanline Laser Overlay -->
                        <div class="absolute left-0 w-full h-[2px] bg-gradient-to-r from-transparent via-blue-500 to-transparent opacity-60 pointer-events-none z-20 animate-scan"></div>
                        
                        <!-- Ambient Grid overlay removed (resolves vertical line glitch) -->
                        
                        <!-- Three.js Canvas Container for 3D Holographic Badge -->
                        <div class="absolute inset-0 flex items-center justify-center" id="cert-canvas-container">
                            <canvas id="cert-canvas" class="w-full h-full"></canvas>
                        </div>

                        <!-- High-Tech Cyber HUD Text Overlays -->
                        <div class="absolute top-4 left-4 font-mono text-[0.65rem] text-gray-500 space-y-1 pointer-events-none z-20">
                            <p>SYS_STATUS: <span class="text-emerald-400 font-semibold animate-pulse">ONLINE</span></p>
                            <p>PROJECTION_CHAMBER: <span class="text-blue-400 font-semibold">ACTIVE</span></p>
                            <p>CYBER_DECRYPTOR: v2.0</p>
                        </div>
                        <div class="absolute top-4 right-4 font-mono text-[0.65rem] text-right text-gray-500 space-y-1 pointer-events-none z-20">
                            <p>ENCRYPTION: AES_256</p>
                            <p>VERIFICATION_STATUS: <span class="text-blue-400 font-semibold">VERIFIED</span></p>
                        </div>

                        <!-- Bottom panel containing Title, Issuer, and dynamic verification details -->
                        <div class="mt-auto p-6 bg-gradient-to-t from-[#020617] via-[#020617]/95 to-transparent z-20 flex flex-col justify-end space-y-4">
                            <div class="space-y-1.5">
                                <div class="flex items-center gap-3">
                                    <span class="px-2.5 py-0.5 bg-emerald-500/10 border border-emerald-500/30 text-emerald-400 rounded-full font-mono text-[0.65rem] font-semibold flex items-center gap-1">
                                        <span class="w-1.5 h-1.5 rounded-full bg-emerald-400 animate-pulse"></span>
                                        VERIFIED SECURE RECORD
                                    </span>
                                    <span class="text-xs font-mono text-blue-400 font-semibold" id="cert-display-hash">0x{{ $firstCert ? strtoupper(substr(md5($firstCert->slug), 0, 8)) : '8C49F30A' }}</span>
                                </div>
                                <h3 class="text-xl md:text-2xl font-extrabold text-white tracking-tight transition-all duration-300" id="cert-display-title">
                                    {{ $firstCert ? $firstCert->title : 'Select a credential node' }}
                                </h3>
                                <p class="text-xs text-gray-400" id="cert-display-issuer-container">
                                    Issuer: <span class="text-blue-400 font-bold" id="cert-display-issuer">{{ $firstIssuer }}</span>
                                </p>
                            </div>

                            <div class="pt-2">
                                <a id="cert-view-btn" href="{{ $firstCert ? route('project.show', $firstCert->slug) : '#' }}" class="w-full px-6 py-3 rounded-xl bg-blue-600 hover:bg-blue-500 text-white font-semibold text-sm transition-all duration-300 flex items-center justify-center gap-2 shadow-[0_0_20px_rgba(59,130,246,0.3)] hover:shadow-[0_0_25px_rgba(59,130,246,0.5)]">
                                    <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M10 6H6a2 2 0 00-2 2v10a2 2 0 002 2h10a2 2 0 002-2v-4M14 4h6m0 0v6m0-6L10 14"></path></svg>
                                    VIEW CREDENTIAL DOCUMENT
                                </a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </section>
        @endif

    </main>

    <!-- Three.js Library CDN -->
    <script src="https://cdnjs.cloudflare.com/ajax/libs/three.js/r128/three.min.js"></script>
    
    <!-- Custom 3D Background Script & Reveal Animation -->
    <script>
    try {
        // Three.js Network Plexus Background (Neural Network Theme)
        const canvas = document.getElementById('webgl-canvas');
        const scene = new THREE.Scene();
        const camera = new THREE.PerspectiveCamera(60, window.innerWidth / window.innerHeight, 0.1, 1000);
        const renderer = new THREE.WebGLRenderer({ canvas: canvas, alpha: true, antialias: true });
        
        function resizeRenderer() {
            camera.aspect = window.innerWidth / window.innerHeight;
            camera.updateProjectionMatrix();
            renderer.setSize(window.innerWidth, window.innerHeight);
            renderer.setPixelRatio(Math.min(window.devicePixelRatio, 2));
        }
        resizeRenderer();
        window.addEventListener('resize', resizeRenderer);

        // Create particles (data nodes)
        const count = 120;
        const geometry = new THREE.BufferGeometry();
        const positions = new Float32Array(count * 3);
        const basePositions = new Float32Array(count * 3);
        const velocities = [];

        for(let i = 0; i < count; i++) {
            const x = (Math.random() - 0.5) * 60;
            const y = (Math.random() - 0.5) * 45;
            const z = (Math.random() - 0.5) * 50;

            positions[i * 3] = x;
            positions[i * 3 + 1] = y;
            positions[i * 3 + 2] = z;

            basePositions[i * 3] = x;
            basePositions[i * 3 + 1] = y;
            basePositions[i * 3 + 2] = z;

            velocities.push({ x: 0, y: 0, z: 0 });
        }

        geometry.setAttribute('position', new THREE.BufferAttribute(positions, 3));

        // Node material (Glowing nodes in Blue-White range)
        const nodeMaterial = new THREE.PointsMaterial({
            size: 0.6,
            color: 0x60a5fa,
            transparent: true,
            opacity: 0.85,
            blending: THREE.AdditiveBlending
        });

        const particles = new THREE.Points(geometry, nodeMaterial);
        scene.add(particles);

        // Lines (Network links)
        const maxConnections = 300;
        const linePosArray = new Float32Array(maxConnections * 2 * 3);
        const lineGeometry = new THREE.BufferGeometry();
        lineGeometry.setAttribute('position', new THREE.BufferAttribute(linePosArray, 3));

        const lineMaterial = new THREE.LineBasicMaterial({
            color: 0x3b82f6,
            transparent: true,
            opacity: 0.15,
            blending: THREE.AdditiveBlending
        });

        const lineSegments = new THREE.LineSegments(lineGeometry, lineMaterial);
        scene.add(lineSegments);

        // Camera init position - starts far back for space travel intro fly-in
        camera.position.z = 120;

        // Interactive Tracking State
        let baseRotationY = 0;
        let baseRotationX = 0;
        let mouseX = 0, mouseY = 0;
        let targetMouseX = 0, targetMouseY = 0;
        let scrollPercent = 0;

        window.addEventListener('mousemove', (e) => {
            // Normalize mouse position to range [-1, 1]
            targetMouseX = (e.clientX / window.innerWidth - 0.5) * 2;
            targetMouseY = (e.clientY / window.innerHeight - 0.5) * 2;
        });

        window.addEventListener('scroll', () => {
            const docHeight = document.documentElement.scrollHeight - window.innerHeight;
            if (docHeight > 0) {
                scrollPercent = window.scrollY / docHeight;
            }
        });

        // -----------------------------------------------------------------------
        // LUXURIOUS HIGH-END INTERACTIVE 3D SOCIAL NODE HOLOGRAPHIC CHAMBER ENGINE
        // -----------------------------------------------------------------------
        const connectCanvas = document.getElementById('connect-3d-canvas');
        const cScene = new THREE.Scene();
        const cCamera = new THREE.PerspectiveCamera(50, connectCanvas.clientWidth / connectCanvas.clientHeight, 0.1, 100);
        const cRenderer = new THREE.WebGLRenderer({ canvas: connectCanvas, alpha: true, antialias: true });
        
        cRenderer.setSize(connectCanvas.clientWidth, connectCanvas.clientHeight);
        cRenderer.setPixelRatio(Math.min(window.devicePixelRatio, 2));
        
        // Balanced framing for the enlarged interactive layout (Perfect distance of 13.0 for massive, crisp objects)
        cCamera.position.z = 13.0;
        cCamera.position.y = 0.6;

        // Local Chamber Lighting
        const cAmbient = new THREE.AmbientLight(0xffffff, 0.85);
        cScene.add(cAmbient);

        const cDirLight1 = new THREE.DirectionalLight(0xffffff, 1.4);
        cDirLight1.position.set(5, 12, 10);
        cScene.add(cDirLight1);

        const cDirLight2 = new THREE.DirectionalLight(0x3b82f6, 0.7);
        cDirLight2.position.set(-5, -10, -5);
        cScene.add(cDirLight2);

        // Social Group
        const socialGroup = new THREE.Group();
        cScene.add(socialGroup);

        // ---------------------------------------------------------
        // CLEAN DESIGN: ELEGANT THIN ORBITAL CALIBRATION RINGS
        // ---------------------------------------------------------
        const orbitMaterial = new THREE.MeshBasicMaterial({
            color: 0xa855f7, // starts purple (GitHub)
            side: THREE.DoubleSide,
            transparent: true,
            opacity: 0.15,
            blending: THREE.AdditiveBlending,
            depthWrite: false
        });

        // Orbit Ring 1 (Tilted A)
        const orbitGeom1 = new THREE.RingGeometry(4.3, 4.33, 64);
        const orbitMesh1 = new THREE.Mesh(orbitGeom1, orbitMaterial);
        orbitMesh1.rotation.set(Math.PI / 4, Math.PI / 6, 0);
        cScene.add(orbitMesh1);

        // Orbit Ring 2 (Tilted B)
        const orbitGeom2 = new THREE.RingGeometry(4.3, 4.33, 64);
        const orbitMesh2 = new THREE.Mesh(orbitGeom2, orbitMaterial);
        orbitMesh2.rotation.set(-Math.PI / 4, -Math.PI / 3, 0);
        cScene.add(orbitMesh2);

        // ---------------------------------------------------------
        // HIGH-END ADDITIONS: DYNAMIC SCANNING HALO SCAN RING
        // ---------------------------------------------------------
        const scanRingGeom = new THREE.RingGeometry(4.3, 4.4, 64);
        const scanRingMaterial = new THREE.MeshBasicMaterial({
            color: 0xa855f7,
            side: THREE.DoubleSide,
            transparent: true,
            opacity: 0.5,
            blending: THREE.AdditiveBlending,
            depthWrite: false
        });
        const scanRing = new THREE.Mesh(scanRingGeom, scanRingMaterial);
        scanRing.rotation.x = Math.PI / 2;
        cScene.add(scanRing);

        // ---------------------------------------------------------
        // HIGH-END ADDITIONS: SWIRLING HOLOGRAPHIC DUST PARTICLES (DENSE COSMIC SHIELD WITH PHYSICS)
        // ---------------------------------------------------------
        const dustCount = 350;
        const dustPositions = new Float32Array(dustCount * 3);
        const dustBasePositions = new Float32Array(dustCount * 3);
        const dustVelocities = [];

        for (let i = 0; i < dustCount; i++) {
            // Random coordinates inside a sphere around the center
            const r = 2.8 + Math.random() * 3.5;
            const theta = Math.random() * Math.PI * 2;
            const phi = Math.acos((Math.random() * 2) - 1);

            const x = r * Math.sin(phi) * Math.cos(theta);
            const y = r * Math.sin(phi) * Math.sin(theta);
            const z = r * Math.cos(phi);

            dustPositions[i * 3] = x;
            dustPositions[i * 3 + 1] = y;
            dustPositions[i * 3 + 2] = z;

            dustBasePositions[i * 3] = x;
            dustBasePositions[i * 3 + 1] = y;
            dustBasePositions[i * 3 + 2] = z;

            dustVelocities.push({ x: 0, y: 0, z: 0 });
        }

        const dustGeom = new THREE.BufferGeometry();
        dustGeom.setAttribute('position', new THREE.BufferAttribute(dustPositions, 3));
        const dustMaterial = new THREE.PointsMaterial({
            size: 0.16,
            color: 0xa855f7,
            transparent: true,
            opacity: 0.8,
            blending: THREE.AdditiveBlending,
            depthWrite: false
        });
        const dustParticles = new THREE.Points(dustGeom, dustMaterial);
        cScene.add(dustParticles);

        // Pedestal (Concentric glowing rings rotating at the base of the chamber, expanded diameter)
        const ringMaterial = new THREE.MeshBasicMaterial({
            color: 0xa855f7, // initial GitHub color
            side: THREE.DoubleSide,
            transparent: true,
            opacity: 0.15
        });

        const ringGeom1 = new THREE.RingGeometry(5.0, 5.08, 64);
        const ringMesh1 = new THREE.Mesh(ringGeom1, ringMaterial);
        ringMesh1.rotation.x = Math.PI / 2;
        ringMesh1.position.y = -4.8;
        cScene.add(ringMesh1);

        const ringGeom2 = new THREE.RingGeometry(3.5, 3.56, 64);
        const ringMesh2 = new THREE.Mesh(ringGeom2, ringMaterial);
        ringMesh2.rotation.x = Math.PI / 2;
        ringMesh2.position.y = -4.8;
        cScene.add(ringMesh2);

        const ringGeom3 = new THREE.RingGeometry(2.0, 2.03, 64);
        const ringMesh3 = new THREE.Mesh(ringGeom3, ringMaterial);
        ringMesh3.rotation.x = Math.PI / 2;
        ringMesh3.position.y = -4.8;
        cScene.add(ringMesh3);

        // Node Chamber spotlight glow
        const socialPointLight = new THREE.PointLight(0xa855f7, 2.5, 30);
        socialPointLight.position.set(0, 0, 5);
        cScene.add(socialPointLight);

        // Bounding Proxy Sphere geometry for responsive flicker-free hover detection (fixes Donut hole bug)
        const hoverDetectionGeom = new THREE.SphereGeometry(3.8, 32, 32);
        const hoverDetectionMat = new THREE.MeshBasicMaterial({
            visible: false,
            depthWrite: false
        });
        const hoverDetectionMesh = new THREE.Mesh(hoverDetectionGeom, hoverDetectionMat);
        hoverDetectionMesh.position.set(0, 0.5, 0);
        cScene.add(hoverDetectionMesh);

        // Helper to generate glowing digital numeric label sprites
        function createNumberSprite(numberStr, colorStr) {
            const canvas = document.createElement('canvas');
            canvas.width = 64;
            canvas.height = 32;
            const ctx = canvas.getContext('2d');
            ctx.fillStyle = 'rgba(0,0,0,0)';
            ctx.fillRect(0, 0, 64, 32);
            
            ctx.font = 'bold 20px monospace';
            ctx.fillStyle = colorStr;
            ctx.textAlign = 'center';
            ctx.textBaseline = 'middle';
            ctx.fillText(numberStr, 32, 16);
            
            const texture = new THREE.CanvasTexture(canvas);
            const material = new THREE.SpriteMaterial({
                map: texture,
                transparent: true,
                opacity: 0,
                depthWrite: false
            });
            const sprite = new THREE.Sprite(material);
            sprite.scale.set(1.4, 0.7, 1);
            return sprite;
        }

        // Helper to create exploding disassembling mesh with plexus lines and numeric labels (Igloo Physics)
        function createExplodingPlexusGroup(geom, color, emissiveColor, wireColor, link, maxNeighborDist) {
            const group = new THREE.Group();
            group.userData = {
                link: link,
                angularVelocity: { x: 0, y: 0 },
                baselineY: 0.5,
                explodeFactor: 0,
                faces: [],
                neighborPairs: [],
                plexusLines: null,
                numSprites: []
            };

            // Convert geometry to flat non-indexed triangles
            const flatGeom = geom.clone().toNonIndexed();
            const posAttr = flatGeom.getAttribute('position');
            const faces = [];

            const faceMat = new THREE.MeshPhongMaterial({
                color: color,
                emissive: emissiveColor,
                shininess: 120,
                flatShading: true,
                transparent: true,
                opacity: 0.85,
                side: THREE.DoubleSide
            });

            // Extract each individual triangle face as an independent mesh piece (brick)
            for (let i = 0; i < posAttr.count / 3; i++) {
                const v1 = new THREE.Vector3(posAttr.getX(i * 3), posAttr.getY(i * 3), posAttr.getZ(i * 3));
                const v2 = new THREE.Vector3(posAttr.getX(i * 3 + 1), posAttr.getY(i * 3 + 1), posAttr.getZ(i * 3 + 1));
                const v3 = new THREE.Vector3(posAttr.getX(i * 3 + 2), posAttr.getY(i * 3 + 2), posAttr.getZ(i * 3 + 2));

                const center = new THREE.Vector3()
                    .add(v1).add(v2).add(v3)
                    .divideScalar(3);

                // Compute face normal vector pointing outward
                const edge1 = v2.clone().sub(v1);
                const edge2 = v3.clone().sub(v1);
                const normal = edge1.cross(edge2).normalize();
                if (normal.dot(center) < 0) {
                    normal.negate();
                }

                // Create local face geometry
                const triGeom = new THREE.BufferGeometry();
                const positions = new Float32Array([
                    v1.x - center.x, v1.y - center.y, v1.z - center.z,
                    v2.x - center.x, v2.y - center.y, v2.z - center.z,
                    v3.x - center.x, v3.y - center.y, v3.z - center.z
                ]);
                triGeom.setAttribute('position', new THREE.BufferAttribute(positions, 3));
                triGeom.computeVertexNormals();

                const faceMesh = new THREE.Mesh(triGeom, faceMat.clone());
                faceMesh.position.copy(center);
                faceMesh.userData = {
                    basePosition: center.clone(),
                    normal: normal.clone(),
                    randomFactor: 0.75 + Math.random() * 0.5, // tighter random scale for stability
                    rotX: (Math.random() - 0.5) * 1.5,
                    rotY: (Math.random() - 0.5) * 1.5,
                    rotZ: (Math.random() - 0.5) * 1.5,
                    parentGroup: group
                };

                group.add(faceMesh);
                faces.push(faceMesh);
            }

            group.userData.faces = faces;

            // Pre-calculate neighbor pairs for Plexus networking links
            const neighborPairs = [];
            for (let i = 0; i < faces.length; i++) {
                for (let j = i + 1; j < faces.length; j++) {
                    const dist = faces[i].userData.basePosition.distanceTo(faces[j].userData.basePosition);
                    if (dist < maxNeighborDist) {
                        neighborPairs.push({ a: i, b: j });
                    }
                }
            }
            group.userData.neighborPairs = neighborPairs;

            // plexus network lines
            const linePositions = new Float32Array(neighborPairs.length * 6);
            const lineGeom = new THREE.BufferGeometry();
            lineGeom.setAttribute('position', new THREE.BufferAttribute(linePositions, 3));
            const lineMat = new THREE.LineBasicMaterial({
                color: wireColor,
                transparent: true,
                opacity: 0,
                blending: THREE.AdditiveBlending,
                depthWrite: false
            });
            const plexusLines = new THREE.LineSegments(lineGeom, lineMat);
            group.add(plexusLines);
            group.userData.plexusLines = plexusLines;

            // Numeric digital label sprites
            const numSprites = [];
            const selectedIndices = [];
            while (selectedIndices.length < Math.min(6, faces.length)) {
                const idx = Math.floor(Math.random() * faces.length);
                if (!selectedIndices.includes(idx)) {
                    selectedIndices.push(idx);
                }
            }
            selectedIndices.forEach(idx => {
                const face = faces[idx];
                const numStr = String(Math.floor(Math.random() * 90) + 10);
                const sprite = createNumberSprite(numStr, wireColor);
                sprite.userData = {
                    faceIndex: idx,
                    normal: face.userData.normal.clone()
                };
                group.add(sprite);
                numSprites.push(sprite);
            });
            group.userData.numSprites = numSprites;

            // Default scale is zero
            group.scale.set(0, 0, 0);
            group.visible = false;

            socialGroup.add(group);
            return group;
        }

        // Initialize 4 Exploding Plexus Gemstone Nodes (Restored to original massive sizes)
        const githubGroup = createExplodingPlexusGroup(
            new THREE.IcosahedronGeometry(3.3, 0),
            0xa855f7, 0x3b0764, '#d8b4fe',
            'https://github.com/Viyendra', 4.8
        );

        const linkedinGroup = createExplodingPlexusGroup(
            new THREE.TorusGeometry(2.3, 0.55, 6, 12),
            0x3b82f6, 0x1e3a8a, '#93c5fd',
            'https://www.linkedin.com/in/muhammad-viyendra-916a09272/', 2.0
        );

        const gmailGroup = createExplodingPlexusGroup(
            new THREE.OctahedronGeometry(3.3, 1),
            0xef4444, 0x7f1d1d, '#fca5a5',
            'mailto:muhammadviyendra@gmail.com', 3.5
        );

        const whatsappGroup = createExplodingPlexusGroup(
            new THREE.TorusKnotGeometry(1.6, 0.48, 24, 6),
            0x10b981, 0x064e3b, '#6ee7b7',
            'https://wa.me/6281261455645', 2.0
        );

        // Position them in the center of the local chamber
        githubGroup.position.set(0, 0.5, 0);
        linkedinGroup.position.set(0, 0.5, 0);
        gmailGroup.position.set(0, 0.5, 0);
        whatsappGroup.position.set(0, 0.5, 0);

        // Active State Mapping
        const nodes = {
            github: {
                group: githubGroup,
                color: 0xa855f7,
                link: 'https://github.com/Viyendra',
                name: 'GitHub'
            },
            linkedin: {
                group: linkedinGroup,
                color: 0x3b82f6,
                link: 'https://www.linkedin.com/in/muhammad-viyendra-916a09272/',
                name: 'LinkedIn'
            },
            gmail: {
                group: gmailGroup,
                color: 0xef4444,
                link: 'mailto:muhammadviyendra@gmail.com',
                name: 'Gmail'
            },
            whatsapp: {
                group: whatsappGroup,
                color: 0x10b981,
                link: 'https://wa.me/6281261455645',
                name: 'WhatsApp'
            }
        };

        const nodeKeys = ['github', 'linkedin', 'gmail', 'whatsapp'];
        let activeNodeKey = 'github';

        // Global function to switch active node (Igloo Style)
        window.selectNode = function(key, shouldOpenLink = false) {
            if (!nodes[key]) return;
            activeNodeKey = key;

            const node = nodes[key];

            // Update Selector Menu active styling
            nodeKeys.forEach(k => {
                const btn = document.getElementById(`btn-${k}`);
                if (btn) {
                    if (k === key) {
                        btn.textContent = `[ ${nodes[k].name} ]`;
                        btn.classList.remove('text-gray-500');
                        if (key === 'github') btn.className = 'node-menu-btn px-4 py-2 md:px-6 md:py-2.5 rounded-full text-sm md:text-lg lg:text-xl font-mono tracking-wider transition-all duration-300 text-purple-400 font-extrabold whitespace-nowrap';
                        if (key === 'linkedin') btn.className = 'node-menu-btn px-4 py-2 md:px-6 md:py-2.5 rounded-full text-sm md:text-lg lg:text-xl font-mono tracking-wider transition-all duration-300 text-blue-400 font-extrabold whitespace-nowrap';
                        if (key === 'gmail') btn.className = 'node-menu-btn px-4 py-2 md:px-6 md:py-2.5 rounded-full text-sm md:text-lg lg:text-xl font-mono tracking-wider transition-all duration-300 text-red-400 font-extrabold whitespace-nowrap';
                        if (key === 'whatsapp') btn.className = 'node-menu-btn px-4 py-2 md:px-6 md:py-2.5 rounded-full text-sm md:text-lg lg:text-xl font-mono tracking-wider transition-all duration-300 text-emerald-400 font-extrabold whitespace-nowrap';
                    } else {
                        btn.textContent = nodes[k].name;
                        btn.className = 'node-menu-btn px-4 py-2 md:px-6 md:py-2.5 rounded-full text-sm md:text-lg lg:text-xl font-mono tracking-wider transition-all duration-300 text-gray-500 hover:text-white whitespace-nowrap';
                    }
                }
            });

            if (shouldOpenLink) {
                window.open(node.link, '_blank');
            }
        };

        // Arrow switching actions (No link redirection, just rotate/switch 3D gemstone)
        window.prevNode = function() {
            let currentIndex = nodeKeys.indexOf(activeNodeKey);
            let prevIndex = (currentIndex - 1 + nodeKeys.length) % nodeKeys.length;
            selectNode(nodeKeys[prevIndex], false);
        };

        // Arrow switching actions (No link redirection, just rotate/switch 3D gemstone)
        window.nextNode = function() {
            let currentIndex = nodeKeys.indexOf(activeNodeKey);
            let nextIndex = (currentIndex + 1) % nodeKeys.length;
            selectNode(nodeKeys[nextIndex], false);
        };

        // Raycasting & Draggability variables
        const raycaster = new THREE.Raycaster();
        const localMouse = new THREE.Vector2(99, 99);
        
        let isDragging = false;
        let activeDragGroup = null;
        let previousMousePosition = { x: 0, y: 0 };
        let dragDistance = 0;

        function updateLocalMouse(clientX, clientY) {
            const rect = connectCanvas.getBoundingClientRect();
            localMouse.x = ((clientX - rect.left) / rect.width) * 2 - 1;
            localMouse.y = -((clientY - rect.top) / rect.height) * 2 + 1;
        }

        connectCanvas.addEventListener('mousedown', (e) => {
            isDragging = false;
            activeDragGroup = null;
            dragDistance = 0;
            
            previousMousePosition = { x: e.clientX, y: e.clientY };
            updateLocalMouse(e.clientX, e.clientY);

            raycaster.setFromCamera(localMouse, cCamera);
            const candidates = [];
            const activeGroup = nodes[activeNodeKey].group;
            activeGroup.userData.faces.forEach(child => candidates.push(child));

            const intersects = raycaster.intersectObjects(candidates);
            if (intersects.length > 0) {
                const clickedObj = intersects[0].object;
                activeDragGroup = clickedObj.userData.parentGroup;
                isDragging = true;
            }
        });

        connectCanvas.addEventListener('mousemove', (e) => {
            updateLocalMouse(e.clientX, e.clientY);
            
            if (isDragging && activeDragGroup) {
                const deltaX = e.clientX - previousMousePosition.x;
                const deltaY = e.clientY - previousMousePosition.y;
                activeDragGroup.userData.angularVelocity.y += deltaX * 0.005;
                activeDragGroup.userData.angularVelocity.x += deltaY * 0.005;
                dragDistance += Math.abs(deltaX) + Math.abs(deltaY);
            }
            previousMousePosition = { x: e.clientX, y: e.clientY };
        });

        connectCanvas.addEventListener('mouseup', () => {
            isDragging = false;
            activeDragGroup = null;
        });

        connectCanvas.addEventListener('mouseleave', () => {
            isDragging = false;
            activeDragGroup = null;
            localMouse.set(99, 99);
        });

        // Touch Support
        connectCanvas.addEventListener('touchstart', (e) => {
            if (e.touches.length > 0) {
                isDragging = false;
                activeDragGroup = null;
                dragDistance = 0;
                
                const t = e.touches[0];
                previousMousePosition = { x: t.clientX, y: t.clientY };
                updateLocalMouse(t.clientX, t.clientY);

                raycaster.setFromCamera(localMouse, cCamera);
                const candidates = [];
                const activeGroup = nodes[activeNodeKey].group;
                activeGroup.userData.faces.forEach(child => candidates.push(child));

                const intersects = raycaster.intersectObjects(candidates);
                if (intersects.length > 0) {
                    const clickedObj = intersects[0].object;
                    activeDragGroup = clickedObj.userData.parentGroup;
                    isDragging = true;
                }
            }
        });

        connectCanvas.addEventListener('touchmove', (e) => {
            if (e.touches.length > 0 && isDragging && activeDragGroup) {
                const t = e.touches[0];
                const deltaX = t.clientX - previousMousePosition.x;
                const deltaY = t.clientY - previousMousePosition.y;
                activeDragGroup.userData.angularVelocity.y += deltaX * 0.005;
                activeDragGroup.userData.angularVelocity.x += deltaY * 0.005;
                dragDistance += Math.abs(deltaX) + Math.abs(deltaY);
                previousMousePosition = { x: t.clientX, y: t.clientY };
            }
        });

        connectCanvas.addEventListener('touchend', () => {
            isDragging = false;
            activeDragGroup = null;
        });

        // Window resize listener for the interactive 3D chamber to prevent stretching
        function resizeChamberRenderer() {
            const width = connectCanvas.clientWidth;
            const height = connectCanvas.clientHeight;
            cCamera.aspect = width / height;
            cCamera.updateProjectionMatrix();
            cRenderer.setSize(width, height);
        }
        resizeChamberRenderer();
        window.addEventListener('resize', resizeChamberRenderer);

        // Intro Camera Fly-In Control State
        const urlParamsObj = new URLSearchParams(window.location.search);
        const isSkipIntro = urlParamsObj.get('skip_intro') === 'true';
        let introTriggered = isSkipIntro;
        let introCompleted = isSkipIntro;
        let introProgress = isSkipIntro ? 1.0 : 0.0;

        if (isSkipIntro) {
            window.history.replaceState({}, document.title, window.location.pathname + window.location.hash);
        }

        function easeOutCubic(x) {
            return 1 - Math.pow(1 - x, 3);
        }

        // Raycasting unproject helper on Z=0 plane for physics repulsion
        const localMouseRaycaster = new THREE.Raycaster();
        const planeZ = new THREE.Plane(new THREE.Vector3(0, 0, 1), 0);
        const localMouseIntersection = new THREE.Vector3();

        // Animation loop
        function animate() {
            requestAnimationFrame(animate);

            // 1. Render Plexus Background
            const pos = geometry.attributes.position.array;
            const aspect = window.innerWidth / window.innerHeight;
            const mouse3D = new THREE.Vector3(
                targetMouseX * 30 * aspect,
                targetMouseY * 20,
                0
            );
            
            const localMouseCoords = mouse3D.clone();
            const invEuler = new THREE.Euler(-particles.rotation.x, -particles.rotation.y, 0, 'YXZ');
            localMouseCoords.applyEuler(invEuler);

            const time = Date.now() * 0.001;
            for(let i = 0; i < count; i++) {
                const px = pos[i * 3];
                const py = pos[i * 3 + 1];
                const pz = pos[i * 3 + 2];

                const bx = basePositions[i * 3];
                const by = basePositions[i * 3 + 1];
                const bz = basePositions[i * 3 + 2];

                const dx = px - localMouseCoords.x;
                const dy = py - localMouseCoords.y;
                const dz = pz - localMouseCoords.z;
                const dist = Math.sqrt(dx * dx + dy * dy + dz * dz);

                velocities[i].x += (bx - px) * 0.02;
                velocities[i].y += (by - py) * 0.02;
                velocities[i].z += (bz - pz) * 0.02;

                const repelRadius = 14;
                if (dist < repelRadius && dist > 0.1) {
                    const force = (repelRadius - dist) / repelRadius;
                    const repelStrength = 0.55;
                    velocities[i].x += (dx / dist) * force * repelStrength;
                    velocities[i].y += (dy / dist) * force * repelStrength;
                    velocities[i].z += (dz / dist) * force * repelStrength;
                }

                velocities[i].x *= 0.85;
                velocities[i].y *= 0.85;
                velocities[i].z *= 0.85;

                const driftX = Math.sin(time * 0.5 + i) * 0.003;
                const driftY = Math.cos(time * 0.5 + i) * 0.003;
                const driftZ = Math.sin(time * 0.2 + i) * 0.003;

                pos[i * 3] += velocities[i].x + driftX;
                pos[i * 3 + 1] += velocities[i].y + driftY;
                pos[i * 3 + 2] += velocities[i].z + driftZ;
            }
            geometry.attributes.position.needsUpdate = true;

            let lineIndex = 0;
            const maxDistance = 10;
            for(let i = 0; i < count; i++) {
                for(let j = i + 1; j < count; j++) {
                    const dx = pos[i * 3] - pos[j * 3];
                    const dy = pos[i * 3 + 1] - pos[j * 3 + 1];
                    const dz = pos[i * 3 + 2] - pos[j * 3 + 2];
                    const dist = Math.sqrt(dx * dx + dy * dy + dz * dz);

                    if (dist < maxDistance && lineIndex < maxConnections) {
                        const idx = lineIndex * 6;
                        linePosArray[idx] = pos[i * 3];
                        linePosArray[idx + 1] = pos[i * 3 + 1];
                        linePosArray[idx + 2] = pos[i * 3 + 2];
                        linePosArray[idx + 3] = pos[j * 3];
                        linePosArray[idx + 4] = pos[j * 3 + 1];
                        linePosArray[idx + 5] = pos[j * 3 + 2];
                        lineIndex++;
                    }
                }
            }
            lineGeometry.setDrawRange(0, lineIndex * 2);
            lineGeometry.attributes.position.needsUpdate = true;

            baseRotationY += 0.00015;
            baseRotationX += 0.00008;

            mouseX += (targetMouseX - mouseX) * 0.03;
            mouseY += (targetMouseY - mouseY) * 0.03;
            
            particles.rotation.y = baseRotationY + mouseX * 0.4;
            particles.rotation.x = baseRotationX + mouseY * 0.4;
            lineSegments.rotation.copy(particles.rotation);

            // Integrated background scroll parallax
            if (introTriggered && !introCompleted) {
                introProgress += 0.015;
                if (introProgress >= 1) {
                    introProgress = 1;
                    introCompleted = true;
                }
                const targetZ = 45 - (scrollPercent * 18);
                camera.position.z = THREE.MathUtils.lerp(120, targetZ, easeOutCubic(introProgress));
                camera.position.y = THREE.MathUtils.lerp(-40, - (scrollPercent * 25), easeOutCubic(introProgress));
            } else if (!introTriggered) {
                camera.position.z = 120;
                camera.position.y = -40;
            } else {
                camera.position.z = 45 - (scrollPercent * 18);
                camera.position.y = - (scrollPercent * 25);
            }
            camera.rotation.y = scrollPercent * 0.15;
            renderer.render(scene, camera);

            // 2. Rotate Concentric Pedestal Rings in opposite directions
            ringMesh1.rotation.z += 0.002;
            ringMesh2.rotation.z -= 0.003;
            ringMesh3.rotation.z += 0.004;

            // Pedestal opacity pulses slowly
            ringMaterial.opacity = 0.12 + Math.sin(time * 1.5) * 0.06;

            // 3. Rotate thin orbital calibration rings (lightweight replacement for cylinder beam)
            orbitMesh1.rotation.y += 0.0035;
            orbitMesh1.rotation.x += 0.0015;
            orbitMesh2.rotation.y -= 0.004;
            orbitMesh2.rotation.z += 0.002;

            // 6. Update and Render Local Social Gemstones Scene (Scale-morph transition)
            let isHoveringNode = false;
            
            // Check Raycaster hover relative to the invisible proxy sphere (Resolves donut hole hover issue)
            raycaster.setFromCamera(localMouse, cCamera);
            const activeGroup = nodes[activeNodeKey].group;
            hoverDetectionMesh.position.copy(activeGroup.position);
            
            const localIntersects = raycaster.intersectObject(hoverDetectionMesh);
            if (localIntersects.length > 0) {
                isHoveringNode = true;
            }

            // 4. Animate Scanning Halo scan ring (sliding up/down the gemstone - speeds up on hover)
            scanRing.position.y = 0.5 + Math.sin(time * (isHoveringNode ? 4.5 : 2.2)) * 3.0;
            scanRingMaterial.opacity = 0.65 * (1.0 - Math.abs(scanRing.position.y - 0.5) / 3.3);

            // Get local mouse 3D intersection on Z=0 plane
            localMouseRaycaster.setFromCamera(localMouse, cCamera);
            localMouseRaycaster.ray.intersectPlane(planeZ, localMouseIntersection);

            // Convert intersection coordinate into stardust cloud's local coordinate system
            const localMouseInDust = localMouseIntersection.clone();
            dustParticles.worldToLocal(localMouseInDust);

            // 5. Stardust Physics Repulsion (Bulatan/partikel debu menjauh saat didekati kursor)
            const dPos = dustGeom.attributes.position.array;
            const repelRadius = 2.4; 
            const repelStrength = 0.55; 

            for (let i = 0; i < dustCount; i++) {
                const px = dPos[i * 3];
                const py = dPos[i * 3 + 1];
                const pz = dPos[i * 3 + 2];

                const bx = dustBasePositions[i * 3];
                const by = dustBasePositions[i * 3 + 1];
                const bz = dustBasePositions[i * 3 + 2];

                const dx = px - localMouseInDust.x;
                const dy = py - localMouseInDust.y;
                const dz = pz - localMouseInDust.z;
                const dist = Math.sqrt(dx * dx + dy * dy + dz * dz);

                // Spring force to pull back to original orbit positions
                dustVelocities[i].x += (bx - px) * 0.05;
                dustVelocities[i].y += (by - py) * 0.05;
                dustVelocities[i].z += (bz - pz) * 0.05;

                // Push away if cursor is close
                if (dist < repelRadius && dist > 0.01) {
                    const force = (repelRadius - dist) / repelRadius;
                    dustVelocities[i].x += (dx / dist) * force * repelStrength;
                    dustVelocities[i].y += (dy / dist) * force * repelStrength;
                    dustVelocities[i].z += (dz / dist) * force * repelStrength;
                }

                // Apply velocity with damping
                dustVelocities[i].x *= 0.85;
                dustVelocities[i].y *= 0.85;
                dustVelocities[i].z *= 0.85;

                dPos[i * 3] += dustVelocities[i].x;
                dPos[i * 3 + 1] += dustVelocities[i].y;
                dPos[i * 3 + 2] += dustVelocities[i].z;
            }
            dustGeom.attributes.position.needsUpdate = true;

            // Rotate and swirl Dust Particle Swarm around active gemstone (accelerates on hover)
            let activeDustSpeedY = isHoveringNode ? 0.025 : 0.004;
            if (isDragging) {
                activeDustSpeedY = 0.045; 
            }
            dustParticles.rotation.y += activeDustSpeedY;
            dustParticles.rotation.z += 0.001;
            dustMaterial.opacity = isHoveringNode ? 1.0 : 0.8;

            // Magnetic Parallax Tilt towards mouse cursor (stronger tilt on hover)
            let targetParallaxX = 0;
            let targetParallaxY = 0;
            if (!isDragging && localMouse.x !== 99) {
                const multiplier = isHoveringNode ? 0.65 : 0.25;
                targetParallaxX = localMouse.y * multiplier;
                targetParallaxY = localMouse.x * multiplier;
            }
            socialGroup.rotation.x = THREE.MathUtils.lerp(socialGroup.rotation.x, targetParallaxX, 0.08);
            socialGroup.rotation.y = THREE.MathUtils.lerp(socialGroup.rotation.y, targetParallaxY, 0.08);

            // Node spotlight glow surges on hover
            const targetLightIntensity = isHoveringNode ? 6.5 : 2.5;
            socialPointLight.intensity = THREE.MathUtils.lerp(socialPointLight.intensity, targetLightIntensity, 0.1);

            socialGroup.children.forEach(group => {
                if (group === hoverDetectionMesh) return; // skip invisible helper mesh
                
                group.rotation.x += group.userData.angularVelocity.x;
                group.rotation.y += group.userData.angularVelocity.y;
                group.userData.angularVelocity.x *= 0.93;
                group.userData.angularVelocity.y *= 0.93;

                // Constant base rotation - remains identical whether hovered or not (as requested)
                const baseSpinSpeed = 0.005;
                group.rotation.y += baseSpinSpeed;
                group.rotation.x += baseSpinSpeed * 0.5;

                // Gentle floating wave motion
                group.position.y = 0.5 + Math.sin(time * 1.2) * 0.18;

                // Lerp scale and opacity smoothly based on active and hover status
                const isActive = (group === nodes[activeNodeKey].group);
                
                let targetScale = isActive ? 1.0 : 0.0;
                if (isActive && isHoveringNode) {
                    targetScale = 1.15; // grows larger on hover
                }
                
                const currentScale = group.scale.x;
                const newScale = THREE.MathUtils.lerp(currentScale, targetScale, 0.12);
                group.scale.set(newScale, newScale, newScale);

                if (newScale > 0.01) {
                    group.visible = true;

                    // Ultra-slow cinematic spring physics transition (0.022 speed for smooth sci-fi motion)
                    // Oscillates between 0.0 and 0.12 when active but not hovered (breathing effect)
                    let targetExplode = (isActive && isHoveringNode) ? 1.0 : (isActive ? 0.06 + Math.sin(time * 1.8) * 0.06 : 0.0);
                    group.userData.explodeFactor = THREE.MathUtils.lerp(group.userData.explodeFactor || 0, targetExplode, 0.022);
                    const factor = group.userData.explodeFactor;

                    // Update independent face pieces position and rotation
                    group.userData.faces.forEach(face => {
                        const basePos = face.userData.basePosition;
                        const normal = face.userData.normal;
                        const rand = face.userData.randomFactor;
                        
                        // Clean parallel expand along normal (no Y drift or wild local rotation, keeps spinning in perfect formation)
                        face.position.copy(basePos)
                            .addScaledVector(normal, factor * 0.95 * rand);
                            
                        // Perfect rotation lock: aligned exactly with the parent group to match when united
                        face.rotation.set(0, 0, 0);

                        // Pulse scale slightly (amplitude increased to 8%)
                        face.scale.setScalar(1.0 + factor * Math.sin(time * 3.5) * 0.08);

                        if (face.material) {
                            face.material.transparent = true;
                            face.material.opacity = 0.85 * (newScale / 1.0);
                        }
                    });

                    // Render dynamic network plexus linking lines between the floating blocks
                    if (group.userData.plexusLines) {
                        const lineArray = group.userData.plexusLines.geometry.attributes.position.array;
                        let lineIdx = 0;
                        group.userData.neighborPairs.forEach(pair => {
                            const posA = group.userData.faces[pair.a].position;
                            const posB = group.userData.faces[pair.b].position;
                            
                            lineArray[lineIdx++] = posA.x;
                            lineArray[lineIdx++] = posA.y;
                            lineArray[lineIdx++] = posA.z;
                            
                            lineArray[lineIdx++] = posB.x;
                            lineArray[lineIdx++] = posB.y;
                            lineArray[lineIdx++] = posB.z;
                        });
                        group.userData.plexusLines.geometry.attributes.position.needsUpdate = true;
                        group.userData.plexusLines.material.opacity = isHoveringNode ? factor * 0.45 * (newScale / 1.0) : 0.0;
                    }

                    // Float and fade numeric network labels
                    group.userData.numSprites.forEach(sprite => {
                        const face = group.userData.faces[sprite.userData.faceIndex];
                        sprite.position.copy(face.position).addScaledVector(sprite.userData.normal, 0.8);
                        sprite.material.opacity = isHoveringNode ? factor * 0.85 * (newScale / 1.0) : 0.0;
                    });

                } else {
                    group.visible = false;
                    // Reset active states on hide
                    group.userData.explodeFactor = 0;
                }
            });

            // Lerp Point Light, Pedestal Rings, Orbital Rings, Scan Ring, and Dust colors
            const targetColor = new THREE.Color(nodes[activeNodeKey].color);
            socialPointLight.color.lerp(targetColor, 0.06);
            ringMaterial.color.lerp(targetColor, 0.06);
            orbitMaterial.color.lerp(targetColor, 0.06);
            scanRingMaterial.color.lerp(targetColor, 0.06);
            dustMaterial.color.lerp(targetColor, 0.06);

            document.body.classList.toggle('node-hover', isHoveringNode);

            cRenderer.render(cScene, cCamera);
        }
        animate();

        // Initialize active state on load
        window.selectNode('github');

        // ==========================================
        // Three.js Certifications Hologram Console Setup
        // ==========================================
        const certCanvas = document.getElementById('cert-canvas');
        if (certCanvas) {
            const certScene = new THREE.Scene();
            const certCamera = new THREE.PerspectiveCamera(45, certCanvas.clientWidth / certCanvas.clientHeight, 0.1, 100);
            const certRenderer = new THREE.WebGLRenderer({ canvas: certCanvas, alpha: true, antialias: true });

            certRenderer.setSize(certCanvas.clientWidth, certCanvas.clientHeight, false);
            certRenderer.setPixelRatio(Math.min(window.devicePixelRatio, 2));
            certCamera.position.z = 8;

            // Lights
            const certAmbient = new THREE.AmbientLight(0xffffff, 0.55);
            certScene.add(certAmbient);

            const certDirLight1 = new THREE.DirectionalLight(0xffffff, 1.0);
            certDirLight1.position.set(5, 5, 5);
            certScene.add(certDirLight1);

            const certDirLight2 = new THREE.DirectionalLight(0x3b82f6, 0.6);
            certDirLight2.position.set(-5, -5, 5);
            certScene.add(certDirLight2);

            // Groups
            const badgeGroup = new THREE.Group();
            certScene.add(badgeGroup);

            const orbitGroup = new THREE.Group();
            certScene.add(orbitGroup);

            // Geometries Definition (Different Shape per Brand)
            const geometries = {
                'IBM': new THREE.IcosahedronGeometry(1.8, 0),
                'DICODING': new THREE.TorusGeometry(1.2, 0.32, 4, 8),
                'ORACLE': new THREE.OctahedronGeometry(1.8, 0),
                'PROG_HUB': new THREE.TetrahedronGeometry(1.8, 0),
                'EDUCBA': new THREE.CylinderGeometry(1.2, 1.2, 1.8, 6),
                'LBS': new THREE.DodecahedronGeometry(1.6, 0),
                'TCC': new THREE.DodecahedronGeometry(1.6, 0),
                'CREDENTIAL': new THREE.BoxGeometry(1.5, 1.5, 1.5)
            };

            // Materials
            const badgeMat = new THREE.MeshPhongMaterial({
                color: 0x3b82f6,
                transparent: true,
                opacity: 0.18,
                shininess: 90,
                specular: 0xffffff,
                flatShading: true,
                side: THREE.DoubleSide
            });

            const wireframeMat = new THREE.LineBasicMaterial({
                color: 0x3b82f6,
                transparent: true,
                opacity: 0.45,
                blending: THREE.AdditiveBlending
            });

            const certRingMat = new THREE.MeshBasicMaterial({
                color: 0x3b82f6,
                side: THREE.DoubleSide,
                transparent: true,
                opacity: 0.22,
                blending: THREE.AdditiveBlending
            });

            // Helper to create exploding disassembling mesh with plexus lines and numeric labels for certs
            function createExplodingCertGroup(geom, maxNeighborDist) {
                const group = new THREE.Group();
                group.userData = {
                    explodeFactor: 0,
                    faces: [],
                    neighborPairs: [],
                    plexusLines: null,
                    numSprites: []
                };

                // Convert geometry to flat non-indexed triangles
                const flatGeom = geom.clone().toNonIndexed();
                const posAttr = flatGeom.getAttribute('position');
                const faces = [];

                // Extract each individual triangle face as an independent mesh piece (brick)
                for (let i = 0; i < posAttr.count / 3; i++) {
                    const v1 = new THREE.Vector3(posAttr.getX(i * 3), posAttr.getY(i * 3), posAttr.getZ(i * 3));
                    const v2 = new THREE.Vector3(posAttr.getX(i * 3 + 1), posAttr.getY(i * 3 + 1), posAttr.getZ(i * 3 + 1));
                    const v3 = new THREE.Vector3(posAttr.getX(i * 3 + 2), posAttr.getY(i * 3 + 2), posAttr.getZ(i * 3 + 2));

                    const center = new THREE.Vector3()
                        .add(v1).add(v2).add(v3)
                        .divideScalar(3);

                    // Compute face normal vector pointing outward
                    const edge1 = v2.clone().sub(v1);
                    const edge2 = v3.clone().sub(v1);
                    const normal = edge1.cross(edge2).normalize();
                    if (normal.dot(center) < 0) {
                        normal.negate();
                    }

                    // Create local face geometry
                    const triGeom = new THREE.BufferGeometry();
                    const positions = new Float32Array([
                        v1.x - center.x, v1.y - center.y, v1.z - center.z,
                        v2.x - center.x, v2.y - center.y, v2.z - center.z,
                        v3.x - center.x, v3.y - center.y, v3.z - center.z
                    ]);
                    triGeom.setAttribute('position', new THREE.BufferAttribute(positions, 3));
                    triGeom.computeVertexNormals();

                    const faceMat = new THREE.MeshPhongMaterial({
                        color: 0x3b82f6,
                        emissive: 0x1e3a8a,
                        shininess: 90,
                        flatShading: true,
                        transparent: true,
                        opacity: 0.85,
                        side: THREE.DoubleSide
                    });

                    const faceMesh = new THREE.Mesh(triGeom, faceMat);
                    faceMesh.position.copy(center);
                    faceMesh.userData = {
                        basePosition: center.clone(),
                        normal: normal.clone(),
                        randomFactor: 0.75 + Math.random() * 0.5,
                        parentGroup: group
                    };

                    group.add(faceMesh);
                    faces.push(faceMesh);
                }

                group.userData.faces = faces;

                // Pre-calculate neighbor pairs for Plexus networking links
                const neighborPairs = [];
                for (let i = 0; i < faces.length; i++) {
                    for (let j = i + 1; j < faces.length; j++) {
                        const dist = faces[i].userData.basePosition.distanceTo(faces[j].userData.basePosition);
                        if (dist < maxNeighborDist) {
                            neighborPairs.push({ a: i, b: j });
                        }
                    }
                }
                group.userData.neighborPairs = neighborPairs;

                // plexus network lines
                const linePositions = new Float32Array(neighborPairs.length * 6);
                const lineGeom = new THREE.BufferGeometry();
                lineGeom.setAttribute('position', new THREE.BufferAttribute(linePositions, 3));
                const lineMat = new THREE.LineBasicMaterial({
                    color: 0x3b82f6,
                    transparent: true,
                    opacity: 0,
                    blending: THREE.AdditiveBlending,
                    depthWrite: false
                });
                const plexusLines = new THREE.LineSegments(lineGeom, lineMat);
                group.add(plexusLines);
                group.userData.plexusLines = plexusLines;

                // Numeric digital label sprites
                const numSprites = [];
                const selectedIndices = [];
                while (selectedIndices.length < Math.min(6, faces.length)) {
                    const idx = Math.floor(Math.random() * faces.length);
                    if (!selectedIndices.includes(idx)) {
                        selectedIndices.push(idx);
                    }
                }
                selectedIndices.forEach(idx => {
                    const face = faces[idx];
                    const numStr = String(Math.floor(Math.random() * 90) + 10);
                    const sprite = createNumberSprite(numStr, '#3b82f6');
                    sprite.scale.set(0.7, 0.35, 1); // Reduced to half size (50%) to fit smaller cert shapes perfectly
                    sprite.userData = {
                        faceIndex: idx,
                        normal: face.userData.normal.clone()
                    };
                    group.add(sprite);
                    numSprites.push(sprite);
                });
                group.userData.numSprites = numSprites;

                return group;
            }

            // Pre-create Exploding Groups for all Certifications
            const certGroups = {};
            Object.keys(geometries).forEach(key => {
                let maxDist = 2.0;
                if (key === 'IBM') maxDist = 3.0;
                else if (key === 'DICODING') maxDist = 1.5;
                else if (key === 'ORACLE') maxDist = 2.5;
                else if (key === 'PROG_HUB') maxDist = 1.5;
                else if (key === 'EDUCBA') maxDist = 2.0;
                else if (key === 'LBS' || key === 'TCC') maxDist = 2.5;
                
                certGroups[key] = createExplodingCertGroup(geometries[key], maxDist);
            });

            let activeCertGroup = certGroups['CREDENTIAL'];
            badgeGroup.add(activeCertGroup);

            // concentric rings restored (radius reduced to 2.15 to prevent clipping and vertical line artifacts)
            const certRingGeom = new THREE.RingGeometry(2.15, 2.17, 64);
            const certRing1 = new THREE.Mesh(certRingGeom, certRingMat);
            const certRing2 = new THREE.Mesh(certRingGeom, certRingMat);
            certRing2.rotation.x = Math.PI / 2;
            orbitGroup.add(certRing1);
            orbitGroup.add(certRing2);

            // Particles cloud
            const certParticleCount = 50;
            const certParticleGeom = new THREE.BufferGeometry();
            const certParticlePos = new Float32Array(certParticleCount * 3);
            for (let i = 0; i < certParticleCount * 3; i += 3) {
                certParticlePos[i] = (Math.random() - 0.5) * 6.5;
                certParticlePos[i+1] = (Math.random() - 0.5) * 6.5;
                certParticlePos[i+2] = (Math.random() - 0.5) * 6.5;
            }
            certParticleGeom.setAttribute('position', new THREE.BufferAttribute(certParticlePos, 3));
            
            const certParticleMat = new THREE.PointsMaterial({
                color: 0x3b82f6,
                size: 0.07,
                transparent: true,
                opacity: 0.7,
                blending: THREE.AdditiveBlending
            });
            const certParticles = new THREE.Points(certParticleGeom, certParticleMat);
            certScene.add(certParticles);

            // Brand color map
            const brandColors = {
                'IBM': { primary: '#3b82f6', secondary: '#60a5fa' },
                'DICODING': { primary: '#14b8a6', secondary: '#f59e0b' },
                'ORACLE': { primary: '#ef4444', secondary: '#f87171' },
                'EDUCBA': { primary: '#8b5cf6', secondary: '#ec4899' },
                'PROG_HUB': { primary: '#ec4899', secondary: '#6366f1' },
                'LBS': { primary: '#f59e0b', secondary: '#3b82f6' },
                'TCC': { primary: '#f97316', secondary: '#8b5cf6' },
                'CREDENTIAL': { primary: '#3b82f6', secondary: '#6366f1' }
            };

            let activeIssuer = 'CREDENTIAL';
            let targetColorPrimary = new THREE.Color(brandColors['CREDENTIAL'].primary);
            let targetColorSecondary = new THREE.Color(brandColors['CREDENTIAL'].secondary);
            let spinSpeedMultiplier = 1.0;

            function updateHologramShape(issuer) {
                activeIssuer = issuer;
                const colors = brandColors[issuer] || brandColors['CREDENTIAL'];
                targetColorPrimary.set(colors.primary);
                targetColorSecondary.set(colors.secondary);
                
                // Spin burst
                spinSpeedMultiplier = 5.0;
                
                // Swap active group
                const nextGroup = certGroups[issuer] || certGroups['CREDENTIAL'];
                if (nextGroup !== activeCertGroup) {
                    badgeGroup.remove(activeCertGroup);
                    activeCertGroup = nextGroup;
                    activeCertGroup.scale.set(0.01, 0.01, 0.01);
                    activeCertGroup.userData.explodeFactor = 0;
                    badgeGroup.add(activeCertGroup);
                }
            }

            // Scramble Text animation
            function scrambleText(elementId, finalText, duration = 500) {
                const el = document.getElementById(elementId);
                if (!el) return;
                const chars = 'ABCDEFGHIJKLMNOPQRSTUVWXYZ0123456789@#$%&*_+?';
                const start = performance.now();
                
                function update(time) {
                    const progress = Math.min((time - start) / duration, 1);
                    let result = '';
                    for (let i = 0; i < finalText.length; i++) {
                        if (finalText[i] === ' ') {
                            result += ' ';
                        } else if (i < progress * finalText.length) {
                            result += finalText[i];
                        } else {
                            result += chars[Math.floor(Math.random() * chars.length)];
                        }
                    }
                    el.textContent = result;
                    if (progress < 1) {
                        requestAnimationFrame(update);
                    }
                }
                requestAnimationFrame(update);
            }

            // Global credential selector function
            window.selectCredential = function(index) {
                const items = document.querySelectorAll('.cert-item');
                const activeItem = document.querySelector(`.cert-item[data-index="${index}"]`);
                if (!activeItem) return;
                
                items.forEach(item => {
                    item.classList.remove('border-blue-500/40', 'bg-slate-900/50');
                    item.classList.add('border-white/5', 'bg-slate-950/40');
                    const dot = item.querySelector('.cert-dot');
                    if (dot) dot.classList.remove('scale-100');
                });
                
                activeItem.classList.add('border-blue-500/40', 'bg-slate-900/50');
                activeItem.classList.remove('border-white/5', 'bg-slate-950/40');
                const activeDot = activeItem.querySelector('.cert-dot');
                if (activeDot) activeDot.classList.add('scale-100');
                
                const title = activeItem.getAttribute('data-title');
                const issuer = activeItem.getAttribute('data-issuer');
                const hash = activeItem.getAttribute('data-hash');
                const detailsUrl = activeItem.getAttribute('data-details-url');
                
                scrambleText('cert-display-title', title, 600);
                document.getElementById('cert-display-issuer').textContent = issuer;
                document.getElementById('cert-display-hash').textContent = `0x${hash}`;
                
                document.getElementById('cert-view-btn').setAttribute('href', detailsUrl);
                
                updateHologramShape(issuer);
            };

            // Interactive Drag Rotation for Certifications Badge
            let isCertDragging = false;
            let prevCertMousePos = { x: 0, y: 0 };
            const certAngularVelocity = { x: 0, y: 0 };

            certCanvas.addEventListener('mousedown', (e) => {
                isCertDragging = true;
                prevCertMousePos = { x: e.clientX, y: e.clientY };
            });

            window.addEventListener('mousemove', (e) => {
                if (!isCertDragging) return;
                const deltaX = e.clientX - prevCertMousePos.x;
                const deltaY = e.clientY - prevCertMousePos.y;
                certAngularVelocity.y += deltaX * 0.0045;
                certAngularVelocity.x += deltaY * 0.0045;
                prevCertMousePos = { x: e.clientX, y: e.clientY };
            });

            window.addEventListener('mouseup', () => {
                isCertDragging = false;
            });

            // Touch support for mobile dragging
            certCanvas.addEventListener('touchstart', (e) => {
                if (e.touches.length > 0) {
                    isCertDragging = true;
                    prevCertMousePos = { x: e.touches[0].clientX, y: e.touches[0].clientY };
                }
            });

            window.addEventListener('touchmove', (e) => {
                if (!isCertDragging || e.touches.length === 0) return;
                const deltaX = e.touches[0].clientX - prevCertMousePos.x;
                const deltaY = e.touches[0].clientY - prevCertMousePos.y;
                certAngularVelocity.y += deltaX * 0.0045;
                certAngularVelocity.x += deltaY * 0.0045;
                prevCertMousePos = { x: e.touches[0].clientX, y: e.touches[0].clientY };
            });

            window.addEventListener('touchend', () => {
                isCertDragging = false;
            });

            // Resize observer
            window.addEventListener('resize', () => {
                if (certCanvas.clientWidth) {
                    certCamera.aspect = certCanvas.clientWidth / certCanvas.clientHeight;
                    certCamera.updateProjectionMatrix();
                    certRenderer.setSize(certCanvas.clientWidth, certCanvas.clientHeight, false);
                }
            });

            // Play when in view observer
            let certSectionInView = false;
            const certSectionEl = document.getElementById('certifications');
            const certSectionObs = new IntersectionObserver((entries) => {
                entries.forEach(entry => {
                    certSectionInView = entry.isIntersecting;
                });
            }, { threshold: 0.1 });
            if (certSectionEl) certSectionObs.observe(certSectionEl);

            const certLocalMouse = new THREE.Vector2(99, 99);
            let isHoveringCert = false;

            function updateCertLocalMouse(clientX, clientY) {
                const rect = certCanvas.getBoundingClientRect();
                certLocalMouse.x = ((clientX - rect.left) / rect.width) * 2 - 1;
                certLocalMouse.y = -((clientY - rect.top) / rect.height) * 2 + 1;
            }

            certCanvas.addEventListener('mousemove', (e) => {
                updateCertLocalMouse(e.clientX, e.clientY);
            });

            certCanvas.addEventListener('touchmove', (e) => {
                if (e.touches.length > 0) {
                    updateCertLocalMouse(e.touches[0].clientX, e.touches[0].clientY);
                }
            });

            certCanvas.addEventListener('mouseleave', () => {
                isHoveringCert = false;
                certLocalMouse.set(99, 99); // Reset to offscreen coordinate
            });

            const certHoverDetectionGeom = new THREE.SphereGeometry(2.5, 32, 32);
            const certHoverDetectionMat = new THREE.MeshBasicMaterial({
                visible: false,
                depthWrite: false
            });
            const certHoverDetectionMesh = new THREE.Mesh(certHoverDetectionGeom, certHoverDetectionMat);
            certScene.add(certHoverDetectionMesh);

            // Cert Scene Animation Loop
            function animateCert() {
                requestAnimationFrame(animateCert);
                if (!certSectionInView) return;

                // 1. Raycast hover detection
                const certRaycaster = new THREE.Raycaster();
                certRaycaster.setFromCamera(certLocalMouse, certCamera);
                certHoverDetectionMesh.position.copy(badgeGroup.position);
                const intersects = certRaycaster.intersectObject(certHoverDetectionMesh);
                isHoveringCert = intersects.length > 0;

                certCanvas.style.cursor = isHoveringCert ? 'pointer' : 'default';

                // Slow down spin burst
                spinSpeedMultiplier += (1.0 - spinSpeedMultiplier) * 0.05;

                // Apply automatic rotation
                badgeGroup.rotation.y += 0.006 * spinSpeedMultiplier;
                badgeGroup.rotation.x += 0.002 * spinSpeedMultiplier;

                // Apply manual drag velocity
                badgeGroup.rotation.y += certAngularVelocity.y;
                badgeGroup.rotation.x += certAngularVelocity.x;

                // Apply damping to drag velocity
                certAngularVelocity.x *= 0.92;
                certAngularVelocity.y *= 0.92;

                certRing1.rotation.z += 0.004;
                certRing2.rotation.z -= 0.005;

                certParticles.rotation.y -= 0.0008;
                certParticles.rotation.x += 0.0004;

                const time = Date.now() * 0.0015;

                // Lerp scale and explode factor smoothly based on active and hover status
                let targetScale = isHoveringCert ? 1.15 : 1.0;
                const currentScale = activeCertGroup.scale.x;
                const newScale = THREE.MathUtils.lerp(currentScale, targetScale, 0.12);
                activeCertGroup.scale.set(newScale, newScale, newScale);

                // Explode factor
                // Oscillates between 0.0 and 0.12 when not hovered (breathing effect)
                let targetExplode = isHoveringCert ? 1.0 : 0.06 + Math.sin(time * 1.8) * 0.06;
                activeCertGroup.userData.explodeFactor = THREE.MathUtils.lerp(activeCertGroup.userData.explodeFactor || 0, targetExplode, 0.022);
                const factor = activeCertGroup.userData.explodeFactor;

                // Update face pieces position
                activeCertGroup.userData.faces.forEach(face => {
                    const basePos = face.userData.basePosition;
                    const normal = face.userData.normal;
                    const rand = face.userData.randomFactor;
                    
                    face.position.copy(basePos).addScaledVector(normal, factor * 0.95 * rand);
                    face.rotation.set(0, 0, 0);
                    // Pulse scale slightly (amplitude increased to 8%)
                    face.scale.setScalar(1.0 + factor * Math.sin(time * 3.5) * 0.08);

                    if (face.material) {
                        face.material.color.lerp(targetColorPrimary, 0.08);
                        face.material.emissive.lerp(targetColorSecondary, 0.08);
                    }
                });

                // Update plexus lines
                if (activeCertGroup.userData.plexusLines) {
                    const lineArray = activeCertGroup.userData.plexusLines.geometry.attributes.position.array;
                    let lineIdx = 0;
                    activeCertGroup.userData.neighborPairs.forEach(pair => {
                        const posA = activeCertGroup.userData.faces[pair.a].position;
                        const posB = activeCertGroup.userData.faces[pair.b].position;
                        
                        lineArray[lineIdx++] = posA.x;
                        lineArray[lineIdx++] = posA.y;
                        lineArray[lineIdx++] = posA.z;
                        
                        lineArray[lineIdx++] = posB.x;
                        lineArray[lineIdx++] = posB.y;
                        lineArray[lineIdx++] = posB.z;
                    });
                    activeCertGroup.userData.plexusLines.geometry.attributes.position.needsUpdate = true;
                    activeCertGroup.userData.plexusLines.material.opacity = isHoveringCert ? factor * 0.45 : 0.0;
                    activeCertGroup.userData.plexusLines.material.color.lerp(targetColorSecondary, 0.08);
                }

                // Float and fade numeric sprites
                activeCertGroup.userData.numSprites.forEach(sprite => {
                    const face = activeCertGroup.userData.faces[sprite.userData.faceIndex];
                    sprite.position.copy(face.position).addScaledVector(sprite.userData.normal, 0.8);
                    sprite.material.opacity = isHoveringCert ? factor * 0.85 : 0.0;
                    sprite.material.color.lerp(targetColorSecondary, 0.08);
                });

                // Lerp global scene elements colors
                certRingMat.color.lerp(targetColorPrimary, 0.08);
                certParticleMat.color.lerp(targetColorSecondary, 0.08);

                certRenderer.render(certScene, certCamera);
            }
            animateCert();

            // Initial selection
            setTimeout(() => {
                window.selectCredential(0);
            }, 600);
        }

        // Scroll Reveal Animation (Intersection Observer)
        const revealElements = document.querySelectorAll('.reveal');
        const observer = new IntersectionObserver((entries) => {
            entries.forEach(entry => {
                if (entry.isIntersecting) {
                    entry.target.classList.add('active');
                } else {
                    entry.target.classList.remove('active');
                }
            });
        }, {
            threshold: 0.15,
            rootMargin: "0px 0px -50px 0px"
        });

        // Observe reveal elements immediately if coming from a detail page
        if (typeof isSkipIntro !== 'undefined' && isSkipIntro) {
            revealElements.forEach(el => observer.observe(el));
        }

        // 3D Card Hover Tilt Effect (Interactive Glare & Dynamic Glowing Border Coordinate Mapping)
        const tiltCards = document.querySelectorAll('.tilt-card, .glass-card');
        tiltCards.forEach(card => {
            const glare = card.querySelector('.card-glare');
            
            card.addEventListener('mousemove', (e) => {
                const rect = card.getBoundingClientRect();
                const x = e.clientX - rect.left; 
                const y = e.clientY - rect.top;  
                
                // Set mouse cursor coordinates for CSS border glow
                card.style.setProperty('--mouse-x', `${x}px`);
                card.style.setProperty('--mouse-y', `${y}px`);
                
                const centerX = rect.width / 2;
                const centerY = rect.height / 2;
                
                const rotateX = ((centerY - y) / centerY) * 12; // Dynamic 3D tilt
                const rotateY = ((x - centerX) / centerX) * 12;
                
                card.style.transform = `perspective(1000px) rotateX(${rotateX}deg) rotateY(${rotateY}deg) scale3d(1.03, 1.03, 1.03)`;
                
                if (glare) {
                    glare.style.opacity = '1';
                    glare.style.background = `radial-gradient(circle at ${x}px ${y}px, rgba(255, 255, 255, 0.14) 0%, transparent 60%)`;
                }
            });
            
            card.addEventListener('mouseleave', () => {
                card.style.transform = 'perspective(1000px) rotateX(0deg) rotateY(0deg) scale3d(1, 1, 1)';
                if (glare) {
                    glare.style.opacity = '0';
                }
            });
            
            // Redirect on card click
            card.addEventListener('click', (e) => {
                // If it is a button, do not redirect
                if (card.tagName.toLowerCase() === 'button' || e.target.closest('button')) return;
                if (card.parentElement.tagName === 'A') return;
                // Exclude certifications section to allow select click logic
                if (card.closest('#certifications')) return;
                const detailLink = card.closest('.reveal').querySelector('a');
                if (detailLink) {
                    detailLink.click();
                }
            });
        });

        // Custom Mouse Follower Physics Engine
        const cursorDot = document.getElementById('custom-cursor-dot');
        const cursorRing = document.getElementById('custom-cursor-ring');
        let cursorX = 0, cursorY = 0;
        let ringX = 0, ringY = 0;
        
        window.addEventListener('mousemove', (e) => {
            cursorX = e.clientX;
            cursorY = e.clientY;
            cursorDot.style.left = cursorX + 'px';
            cursorDot.style.top = cursorY + 'px';
        });
        
        function updateCursorRing() {
            // Smooth lerped tracking with fluid inertia
            ringX += (cursorX - ringX) * 0.16;
            ringY += (cursorY - ringY) * 0.16;
            cursorRing.style.left = ringX + 'px';
            cursorRing.style.top = ringY + 'px';
            requestAnimationFrame(updateCursorRing);
        }
        updateCursorRing();
        
        // Custom cursor hover states delegation (bulletproof dynamic elements support)
        window.addEventListener('mouseover', (e) => {
            const isHovered = e.target.closest('a, button, [onclick], .tilt-card, .glass-card, .node-menu-btn');
            if (isHovered) {
                cursorRing.style.width = '60px';
                cursorRing.style.height = '60px';
                cursorRing.style.backgroundColor = 'rgba(59, 130, 246, 0.12)';
                cursorRing.style.borderColor = 'rgba(96, 165, 250, 0.85)';
                cursorRing.style.boxShadow = '0 0 25px rgba(96, 165, 250, 0.35)';
                cursorDot.style.transform = 'scale(0)';
            } else {
                cursorRing.style.width = '36px';
                cursorRing.style.height = '36px';
                cursorRing.style.backgroundColor = 'transparent';
                cursorRing.style.borderColor = 'rgba(59, 130, 246, 0.4)';
                cursorRing.style.boxShadow = 'none';
                cursorDot.style.transform = 'scale(1)';
            }
        });

        // Wire up preloader enter callback to use Three.js intro + reveal observer
        window.__preloaderEnter = function() {
            introTriggered = true;
            revealElements.forEach(el => observer.observe(el));
        };
    } catch(e) {
        // ponytail: Three.js or 3D code failed — preloader still works independently
        console.warn('[3D] Three.js initialization failed:', e);
        // Ensure reveal elements are visible even without 3D
        document.querySelectorAll('.reveal').forEach(function(el) { el.classList.add('active'); });
    }
    </script>
</body>
</html>