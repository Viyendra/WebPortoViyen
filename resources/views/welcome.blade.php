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
    <title>Muhammad Viyendra | Data Scientist</title>
    @vite(['resources/css/app.css', 'resources/js/app.js'])
    <link href="https://fonts.bunny.net/css?family=inter:400,500,600,700,800" rel="stylesheet" />
    <style>
        body { font-family: 'Inter', sans-serif; background-color: #020617; color: #ffffff; }
        .glass { background: rgba(255, 255, 255, 0.03); backdrop-filter: blur(10px); -webkit-backdrop-filter: blur(10px); border: 1px solid rgba(255, 255, 255, 0.05); }
        .text-gradient { background: linear-gradient(to right, #ffffff, #3b82f6); -webkit-background-clip: text; -webkit-text-fill-color: transparent; }
    </style>
</head>
<body class="antialiased relative overflow-x-hidden selection:bg-blue-500 selection:text-white">

    <div class="absolute top-[-10%] left-[-10%] w-96 h-96 bg-blue-700/20 rounded-full blur-[120px] pointer-events-none"></div>
    <div class="absolute top-[40%] right-[-10%] w-[30rem] h-[30rem] bg-slate-800/40 rounded-full blur-[150px] pointer-events-none"></div>

    <nav class="fixed w-full top-6 z-50 flex justify-center px-4">
        <div class="glass rounded-full px-8 py-4 flex items-center space-x-8 text-sm font-medium shadow-2xl">
            <div class="flex items-center space-x-2 text-blue-400 font-bold text-lg mr-4">
                <svg class="w-5 h-5" fill="currentColor" viewBox="0 0 24 24"><path d="M12 2L2 22h20L12 2zm0 4.5l6.5 13h-13L12 6.5z"/></svg>
                <span>Viyendra.</span>
            </div>
            <a href="#about" class="text-gray-300 hover:text-white transition">About</a>
            @if($experiences->count() > 0)
                <a href="#experience" class="text-gray-300 hover:text-white transition">Experiences</a>
            @endif
            <a href="#projects" class="text-gray-300 hover:text-white transition">Projects</a>
            <a href="#certifications" class="text-gray-300 hover:text-white transition">Certifications</a>
        </div>
    </nav>

    <main class="max-w-6xl mx-auto px-6 pt-40 pb-20 relative z-10">
        
        <div class="grid grid-cols-1 md:grid-cols-12 gap-12 items-center">
            <div class="md:col-span-4 flex justify-center">
                <div class="relative w-72 h-80 lg:w-full lg:h-96 rounded-[2rem] glass p-2 overflow-hidden group">
                    <img 
                        src="{{ asset('storage/images/PasFotoFormal_MuhammadViyendra.jpeg') }}" 
                        alt="Muhammad Viyendra" 
                        class="w-full h-full object-cover rounded-[1.5rem] grayscale-[20%] group-hover:grayscale-0 transition duration-500"   
                    >            
                </div>
            </div>

            <div class="md:col-span-8">
                <h2 class="text-xl text-gray-300 font-medium mb-2">Hi, I'm Muhammad Viyendra</h2>
                <h1 class="text-5xl md:text-6xl lg:text-7xl font-extrabold mb-6 tracking-tight leading-tight">
                    Data Scientist & <br> <span class="text-gradient">ML Engineer</span>
                </h1>
                <p class="text-gray-400 text-lg leading-relaxed max-w-2xl mb-8">
                    I am an Information Systems student specializing in Data Science and Artificial Intelligence. I have a proven track record of designing Machine Learning pipelines, building Deep Learning architectures, and implementing Computer Vision solutions from optimizing stacked ensemble models to a 5.4% MAPE for insurance claim trends to developing assistive mobile AI technologies.
                </p>

                <div class="flex flex-wrap items-center gap-4 mt-8">
                    <a href="https://wa.me/6281261455645" target="_blank" class="bg-blue-600 hover:bg-blue-500 text-white font-bold py-3 px-8 rounded-full shadow-[0_0_15px_rgba(37,99,235,0.4)] transition-all duration-300 hover:scale-105">
                        Contact Me
                    </a>
                    <div class="flex items-center gap-5 bg-[#0f172a]/80 border border-slate-700/50 rounded-full px-6 py-3 shadow-lg backdrop-blur-sm">
                        <a href="https://github.com/Viyendra" target="_blank" class="text-gray-400 hover:text-white transition-colors duration-300 hover:scale-110" title="GitHub">
                            <svg class="w-6 h-6" fill="currentColor" viewBox="0 0 24 24"><path d="M12 0c-6.626 0-12 5.373-12 12 0 5.302 3.438 9.8 8.207 11.387.599.111.793-.261.793-.577v-2.234c-3.338.726-4.033-1.416-4.033-1.416-.546-1.387-1.333-1.756-1.333-1.756-1.089-.745.083-.729.083-.729 1.205.084 1.839 1.237 1.839 1.237 1.07 1.834 2.807 1.304 3.492.997.107-.775.418-1.305.762-1.604-2.665-.305-5.467-1.334-5.467-5.931 0-1.311.469-2.381 1.236-3.221-.124-.303-.535-1.524.117-3.176 0 0 1.008-.322 3.301 1.23.957-.266 1.983-.399 3.003-.404 1.02.005 2.047.138 3.006.404 2.291-1.552 3.297-1.23 3.297-1.23.653 1.653.242 2.874.118 3.176.77.84 1.235 1.911 1.235 3.221 0 4.609-2.807 5.624-5.479 5.921.43.372.823 1.102.823 2.222v3.293c0 .319.192.694.801.576 4.765-1.589 8.199-6.086 8.199-11.386 0-6.627-5.373-12-12-12z"/></svg>
                        </a>
                        <a href="https://www.linkedin.com/in/muhammad-viyendra-916a09272/" target="_blank" class="text-gray-400 hover:text-blue-400 transition-colors duration-300 hover:scale-110" title="LinkedIn">
                            <svg class="w-6 h-6" fill="currentColor" viewBox="0 0 24 24"><path d="M19 0h-14c-2.761 0-5 2.239-5 5v14c0 2.761 2.239 5 5 5h14c2.762 0 5-2.239 5-5v-14c0-2.761-2.238-5-5-5zm-11 19h-3v-11h3v11zm-1.5-12.268c-.966 0-1.75-.79-1.75-1.764s.784-1.764 1.75-1.764 1.75.79 1.75 1.764-.783 1.764-1.75 1.764zm13.5 12.268h-3v-5.604c0-3.368-4-3.113-4 0v5.604h-3v-11h3v1.765c1.396-2.586 7-2.777 7 2.476v6.759z"/></svg>
                        </a>
                        <div class="w-px h-5 bg-slate-600/50"></div>
                        <a href="mailto:muhammadviyendra@gmail.com" class="text-gray-400 hover:text-white font-medium text-sm tracking-wide transition-colors duration-300">
                            muhammadviyendra@gmail.com
                        </a>
                    </div>
                </div>
            </div>
        </div>

        <div class="glass rounded-2xl p-8 mt-16 grid grid-cols-2 md:grid-cols-4 gap-8 divide-x divide-white/10 text-center">
            <div>
                <h3 class="text-3xl font-bold text-white mb-1">3.96</h3>
                <p class="text-gray-500 text-sm font-medium">Academic GPA</p>
            </div>
            <div>
                <h3 class="text-3xl font-bold text-white mb-1">High<span class="text-blue-500">+</span></h3>
                <p class="text-gray-500 text-sm font-medium">Model Accuracy</p>
            </div>
            <div>
                <h3 class="text-3xl font-bold text-white mb-1">5<span class="text-blue-500">+</span></h3>
                <p class="text-gray-500 text-sm font-medium">Competitions</p>
            </div>
            <div>
                <h3 class="text-3xl font-bold text-white mb-1">25<span class="text-blue-500">+</span></h3>
                <p class="text-gray-500 text-sm font-medium">Datasets Analyzed</p>
            </div>
        </div>

        <div class="grid grid-cols-1 md:grid-cols-3 gap-6 mt-16" id="about">
            <div class="glass rounded-3xl p-8 relative overflow-hidden flex flex-col justify-between border border-white/5">
                <div class="absolute top-0 right-0 w-32 h-32 bg-blue-600/20 blur-2xl rounded-full"></div>
                <div>
                    <h3 class="text-blue-400 font-semibold mb-2 text-xl">Analytical</h3>
                    <h4 class="text-2xl font-bold text-white mb-4">Mindset & Precision</h4>
                    <p class="text-gray-400 text-sm leading-relaxed" style="text-align: justify;">
                        I approach complex datasets with deep curiosity and rigorous validation following the CRISP-DM framework. Whether engineering robust features, handling anomalies through comprehensive EDA, or tuning hyperparameters, my focus is always on building models that generalize well to real-world data.
                    </p>
                </div>
            </div>

            <div class="md:col-span-2 glass rounded-3xl p-8 flex flex-col md:flex-row gap-8 items-start border border-white/5">
                <div class="w-full md:w-1/2 bg-[#0d1117] rounded-xl p-5 font-mono text-[0.8rem] text-gray-300 border border-gray-800 shadow-2xl leading-loose overflow-hidden">
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
                <div class="w-full md:w-1/2">   
                    <h3 class="text-2xl font-bold text-white mb-3">Data-Driven <span class="text-blue-400">Solutions</span></h3>
                    <p class="text-gray-400 text-sm leading-relaxed" style="text-align: justify;">
                        My expertise lies in translating raw data into strategic assets. I believe the best architectures are built with a solid understanding of domain logic, structured ETL processes, and a strict obsession with preventing data leakage in stacked ensemble models.
                    </p>
                </div>
            </div>

            <div class="glass rounded-3xl p-8 border border-white/5">
                <h3 class="text-xl font-bold text-white mb-5">Core Tech Stack</h3>
                <div class="flex flex-wrap gap-2.5">
                    <span class="px-4 py-1.5 bg-transparent border border-white/20 rounded-full text-sm text-gray-300 hover:border-blue-400 hover:text-white transition">Python</span>
                    <span class="px-4 py-1.5 bg-transparent border border-white/20 rounded-full text-sm text-gray-300 hover:border-blue-400 hover:text-white transition">TensorFlow</span>
                    <span class="px-4 py-1.5 bg-transparent border border-white/20 rounded-full text-sm text-gray-300 hover:border-blue-400 hover:text-white transition">Scikit-Learn</span>
                    <span class="px-4 py-1.5 bg-transparent border border-white/20 rounded-full text-sm text-gray-300 hover:border-blue-400 hover:text-white transition">PyTorch</span>
                    <span class="px-4 py-1.5 bg-transparent border border-white/20 rounded-full text-sm text-gray-300 hover:border-blue-400 hover:text-white transition">OpenCV</span>
                    <span class="px-4 py-1.5 bg-transparent border border-white/20 rounded-full text-sm text-gray-300 hover:border-blue-400 hover:text-white transition">Pandas & NumPy</span>
                    <span class="px-4 py-1.5 bg-transparent border border-white/20 rounded-full text-sm text-gray-300 hover:border-blue-400 hover:text-white transition">XGBoost</span>
                    <span class="px-4 py-1.5 bg-transparent border border-white/20 rounded-full text-sm text-gray-300 hover:border-blue-400 hover:text-white transition">MySQL</span>
                </div>
            </div>

            <div class="md:col-span-2 rounded-3xl p-8 bg-gradient-to-br from-slate-900/80 to-blue-900/40 border border-blue-500/20 flex flex-col lg:flex-row items-center justify-between gap-8 text-left">
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
                    <a href="https://wa.me/6281261455645" target="_blank" class="inline-block px-8 py-3 rounded-full hover:scale-105 transition-all duration-300 shadow-lg bg-white text-slate-950 font-extrabold text-sm whitespace-nowrap">
                        Let's Talk
                    </a>
                </div>
            </div>
        </div>

        @if($experiences->count() > 0)
        <div id="experience" class="border-t border-white/10" style="margin-top: 28px; padding-top: 28px;">
            <div class="mb-12 flex flex-col gap-3">
                <h2 class="text-3xl md:text-4xl font-extrabold text-white">Experiences</h2>
                <p class="text-gray-400">A timeline of my professional journey, academic involvement, and technical leadership.</p>
            </div>
            
            <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
                @foreach($experiences as $exp)
                <div class="glass p-6 rounded-2xl border border-slate-700/50 hover:border-blue-500/50 transition-colors flex flex-col justify-between">
                    <div>
                        <h3 class="text-xl font-bold text-white mb-2">{{ $exp->title }}</h3>
                        <p class="text-gray-400 text-sm mb-6 leading-relaxed line-clamp-3" style="text-align: justify;">
                            {{ $exp->description }}
                        </p>
                    </div>
                    
                    <div class="pt-4 border-t border-white/5 flex justify-end">
                        <a href="{{ route('project.show', $exp->slug) }}" class="inline-flex items-center gap-1.5 text-xs text-blue-400 hover:text-blue-300 font-semibold transition-colors">
                            Read Detail & Evidence
                            <svg class="w-3 h-3" fill="none" stroke="currentColor" stroke-width="2" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" d="M9 5l7 7-7 7"/></svg>
                        </a>
                    </div>
                </div>
                @endforeach
            </div>
        </div>
        @endif

        <div id="projects" class="border-t border-white/10" style="margin-top: 28px; padding-top: 28px;">
            <div class="mb-12 flex flex-col gap-3">
                <h2 class="text-3xl font-extrabold text-white tracking-tight">Featured Projects</h2>
                <p class="text-gray-400 text-sm">A collection of machine learning pipelines, data analysis dashboards, and software development applications.</p>
            </div>

            <div class="grid grid-cols-1 md:grid-cols-2 gap-8 pt-4">
                @forelse($models as $project)
                <div class="glass rounded-[2rem] p-8 flex flex-col justify-between border border-white/10 relative group hover:border-blue-500/50 hover:bg-slate-800/50 transition duration-300 shadow-xl overflow-hidden">
                    <div class="absolute inset-0 bg-gradient-to-b from-blue-600/5 to-transparent opacity-0 group-hover:opacity-100 transition duration-500 pointer-events-none"></div>

                    <div class="relative z-10">
                        <div class="mb-6">
                            <span class="inline-block px-4 py-1.5 bg-blue-950/50 border border-blue-800/30 text-blue-400 rounded-full text-xs font-bold uppercase tracking-wider shadow-sm">
                                {{ str_replace('_', ' ', $project->type) }}
                            </span>
                        </div>
                        
                        <h3 class="text-3xl font-bold text-white mb-4 group-hover:text-blue-400 transition leading-snug">
                            {{ $project->title }}
                        </h3>
                        
                        <p class="text-gray-400 text-sm leading-relaxed mb-8 line-clamp-3">
                            {{ $project->description ?: 'Tidak ada deskripsi singkat. Klik detail untuk membaca analisis lengkap.' }}
                        </p>
                        
                        @if(isset($project->metadata['metric_label']) && $project->metadata['metric_value'])
                            <div class="bg-[#020617]/50 border border-white/5 rounded-2xl p-4 mb-8 flex justify-between items-center shadow-inner">
                                <span class="text-xs text-gray-500 font-semibold uppercase tracking-wider">{{ $project->metadata['metric_label'] }}</span>
                                <span class="text-lg font-bold text-blue-400">{{ $project->metadata['metric_value'] }}</span>
                            </div>
                        @endif
                    </div>

                    <div class="relative z-10 flex items-center mt-auto">
                        <a href="{{ route('project.show', $project->slug) }}" class="w-full text-center font-bold bg-blue-600 hover:bg-blue-500 text-white px-5 py-3.5 rounded-xl transition shadow-[0_0_15px_rgba(37,99,235,0.2)]">
                            Lihat Detail
                        </a>
                    </div>
                </div>
                @empty
                <div class="col-span-1 md:col-span-2 text-center py-20 glass border border-dashed border-slate-700/50 rounded-[2rem] text-gray-500">
                    Belum ada proyek yang di-upload.
                </div>
                @endforelse
            </div>
        </div>

        @if($certifications->count() > 0)
        <div id="certifications" class="border-t border-white/10" style="margin-top: 28px; padding-top: 28px;">
            <div class="mb-12 flex flex-col gap-3">
                <h2 class="text-3xl font-extrabold text-white tracking-tight flex items-center gap-3">
                    <svg class="w-8 h-8 text-emerald-500" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12l2 2 4-4M7.835 4.697a3.42 3.42 0 001.946-.806 3.42 3.42 0 014.438 0 3.42 3.42 0 001.946.806 3.42 3.42 0 013.138 3.138 3.42 3.42 0 00.806 1.946 3.42 3.42 0 010 4.438 3.42 3.42 0 00-.806 1.946 3.42 3.42 0 01-3.138 3.138 3.42 3.42 0 00-1.946.806 3.42 3.42 0 01-4.438 0 3.42 3.42 0 00-1.946-.806 3.42 3.42 0 01-3.138-3.138 3.42 3.42 0 00-.806-1.946 3.42 3.42 0 010-4.438 3.42 3.42 0 00.806-1.946 3.42 3.42 0 013.138-3.138z"></path></svg>
                    Licenses & Certifications
                </h2>
                <p class="text-gray-400 text-sm">Validation of my technical expertise, industry certifications, and professional milestones.</p>
            </div>

            <div class="grid grid-cols-1 md:grid-cols-3 gap-6">
                @foreach($certifications as $cert)
                    <div class="glass rounded-2xl p-6 border border-white/5 hover:border-emerald-500/30 transition group flex flex-col justify-between">
                        <div>
                            <span class="text-emerald-400 text-xs font-bold uppercase tracking-widest mb-3 block">Certification</span>
                            <h3 class="text-xl font-bold text-white mb-2 leading-tight group-hover:text-emerald-300 transition">{{ $cert->title }}</h3>
                            <p class="text-gray-400 text-sm line-clamp-2 mb-6">{{ $cert->description }}</p>
                        </div>
                        <a href="{{ route('project.show', $cert->slug) }}" class="text-emerald-500 text-sm font-semibold hover:text-emerald-400 flex items-center gap-2 mt-4">
                            Lihat Sertifikat &rarr;
                        </a>
                    </div>
                @endforeach
            </div>
        </div>
        @endif

    </main>

</body>
</html>