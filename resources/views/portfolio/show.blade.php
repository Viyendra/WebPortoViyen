<!DOCTYPE html>
<html lang="en" class="scroll-smooth">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>{{ $project->title }} | Portfolio</title>
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
        <div class="glass rounded-full px-8 py-3.5 flex items-center gap-8 text-sm font-medium shadow-2xl">
            <a href="{{ url('/#projects') }}" class="text-gray-400 hover:text-white transition flex items-center gap-2 border-r border-white/10 pr-8">
                <span class="text-lg leading-none mb-0.5">&larr;</span> Back to Home
            </a>
            <div class="flex items-center gap-2 text-blue-400 font-bold text-lg">
                <svg class="w-5 h-5" fill="currentColor" viewBox="0 0 24 24"><path d="M12 2L2 22h20L12 2zm0 4.5l6.5 13h-13L12 6.5z"/></svg>
                <span>Viyendra.</span>
            </div>
        </div>
    </nav>

    <main class="max-w-6xl mx-auto px-6 pt-40 pb-20 relative z-10">
        
        <!-- <div class="mb-6 max-w-4xl mx-auto">
            <a href="{{ route('dashboard') }}" class="text-sm text-gray-400 hover:text-blue-400 transition-colors inline-flex items-center">
                ← Kembali ke Dashboard
            </a>
        </div> -->

        @if($project->type === 'experience')
            <div class="max-w-4xl mx-auto glass p-8 rounded-3xl border border-white/5 shadow-2xl">
                <div class="mb-6">
                    <span class="px-4 py-1.5 bg-blue-600/20 text-blue-400 rounded-full text-xs font-semibold uppercase tracking-wider">
                        Experience / Pengalaman
                    </span>
                    <h1 class="text-3xl md:text-4xl font-extrabold text-white mt-4">{{ $project->title }}</h1>
                </div>

                <div class="text-gray-300 text-base leading-relaxed mb-8" style="text-align: justify;">
                    {!! nl2br(e($project->description)) !!}
                </div>

                @if($project->analysis)
                    <div class="border-t border-white/10 pt-6 mt-6">
                        <h2 class="text-xl font-bold text-white mb-3">Detail & Pencapaian</h2>
                        <div class="text-gray-400 text-sm leading-relaxed space-y-2" style="text-align: justify;">
                            {!! nl2br(e($project->analysis)) !!}
                        </div>
                    </div>
                @endif

                @if(isset($project->metadata['certificate_path']))
                    <div class="border-t border-white/10 pt-6 mt-8">
                        <h2 class="text-xl font-bold text-white mb-4">Dokumen / Bukti Pendukung</h2>
                        @php $ext = pathinfo($project->metadata['certificate_path'], PATHINFO_EXTENSION); @endphp

                        @if(in_array(strtolower($ext), ['png', 'jpg', 'jpeg']))
                            <div class="rounded-2xl overflow-hidden border border-slate-700/50 max-w-2xl mx-auto shadow-2xl bg-[#0d1117] p-2">
                                <img src="{{ asset('storage/' . $project->metadata['certificate_path']) }}" class="w-full h-auto rounded-xl" alt="Bukti Pengalaman">
                            </div>
                        @elseif(strtolower($ext) === 'pdf')
                            <div class="w-full h-[600px] rounded-2xl overflow-hidden border border-slate-700/50 shadow-2xl bg-[#0d1117]">
                                <iframe src="{{ asset('storage/' . $project->metadata['certificate_path']) }}" class="w-full h-full" frameborder="0"></iframe>
                            </div>
                        @else
                            <div class="flex justify-center py-4">
                                <a href="{{ asset('storage/' . $project->metadata['certificate_path']) }}" target="_blank" class="inline-flex items-center px-6 py-3 bg-blue-600 hover:bg-blue-500 text-white font-bold rounded-xl transition-all shadow-lg hover:scale-105 duration-300">
                                    <svg class="w-5 h-5 mr-2" fill="none" stroke="currentColor" stroke-width="2" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" d="M4 16v1a3 3 0 003 3h10a3 3 0 003-3v-1m-4-4l-4 4m0 0l-4-4m4 4V4"></path></svg>
                                    Unduh Dokumen Pendukung
                                </a>
                            </div>
                        @endif
                    </div>
                @endif
            </div>

        @else
            <div class="mb-16 text-center flex flex-col items-center">
                <span class="inline-block px-4 py-1.5 bg-blue-900/30 border border-blue-500/20 text-blue-300 rounded-full text-xs font-bold uppercase tracking-widest shadow-sm mb-6">
                    {{ str_replace('_', ' ', $project->type) }}
                </span>
                
                <h1 class="text-5xl md:text-6xl font-extrabold mb-6 tracking-tight leading-tight text-gradient pb-2">
                    {{ $project->title }}
                </h1>
                
                @if(isset($project->metadata['metric_label']) && $project->metadata['metric_value'])
                    <div class="glass rounded-full px-8 py-3 mt-2 inline-flex items-center gap-4">
                        <span class="text-gray-400 font-medium uppercase tracking-wider text-sm">{{ $project->metadata['metric_label'] }}:</span>
                        <span class="text-xl font-bold text-blue-400">{{ $project->metadata['metric_value'] }}</span>
                    </div>
                @endif
            </div>

            @if($project->analysis)
                <div class="glass rounded-3xl p-8 md:p-12 mb-12 relative overflow-hidden border border-white/5 shadow-2xl">
                    <div class="absolute top-0 right-0 w-32 h-32 bg-blue-600/20 blur-2xl rounded-full"></div>
                    <h3 class="text-blue-400 font-semibold mb-6 text-xl flex items-center gap-3">
                        <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12h6m-6 4h6m2 5H7a2 2 0 01-2-2V5a2 2 0 012-2h5.586a1 1 0 01.707.293l5.414 5.414a1 1 0 01.293.707V19a2 2 0 01-2 2z"></path></svg>
                        Detail
                    </h3>
                    <div class="text-gray-300 text-lg leading-relaxed">
                        {!! nl2br(e($project->analysis)) !!}
                    </div>
                </div>
            @endif

            @if(isset($project->metadata['rendered_html']))
                <div class="glass rounded-3xl p-6 md:p-10 border border-white/5 relative shadow-2xl mb-12">
                    <div class="flex flex-col sm:flex-row sm:items-center justify-between mb-8 gap-4 px-2">
                        <h3 class="text-2xl font-bold text-white flex items-center gap-3 tracking-tight">
                            <svg class="w-7 h-7 text-blue-500" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M10 20l4-16m4 4l4 4-4 4M6 16l-4-4 4-4"></path></svg>
                            Jupyter Output Model
                        </h3>
                        <a href="{{ asset('storage/' . $project->metadata['rendered_html']) }}" target="_blank" class="bg-blue-600 hover:bg-blue-700 text-white px-6 py-2.5 rounded-full font-medium transition shadow-[0_0_20px_rgba(37,99,235,0.4)] flex items-center gap-2 text-sm w-fit">
                            Buka Layar Penuh <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M10 6H6a2 2 0 00-2 2v10a2 2 0 002 2h10a2 2 0 002-2v-4M14 4h6m0 0v6m0-6L10 14"></path></svg>
                        </a>
                    </div>
                    
                    <div class="w-full bg-white rounded-2xl overflow-hidden border border-slate-700 shadow-inner">
                        <iframe 
                            src="{{ asset('storage/' . $project->metadata['rendered_html']) }}" 
                            style="width: 100%; height: 90vh; min-height: 850px;"
                            class="rounded-xl"
                            frameborder="0"
                            title="Jupyter Notebook View"
                        ></iframe>
                    </div>
                </div>
            @endif

            @if(isset($project->metadata['certificate_path']))
                <div class="glass rounded-3xl p-6 md:p-10 border border-white/5 relative shadow-2xl mt-12">
                    <h3 class="text-2xl font-bold text-white mb-6 flex items-center gap-3">
                        <svg class="w-7 h-7 text-emerald-400" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12l2 2 4-4m6 2a9 9 0 11-18 0 9 9 0 0118 0z"></path></svg>
                        Dokumen Sertifikasi
                    </h3>
                    
                    <div class="w-full bg-slate-900 rounded-2xl overflow-hidden border border-slate-700 p-2 text-center">
                        @php $ext = pathinfo($project->metadata['certificate_path'], PATHINFO_EXTENSION); @endphp
                        
                        @if(in_array(strtolower($ext), ['png', 'jpg', 'jpeg']))
                            <img src="{{ Storage::url($project->metadata['certificate_path']) }}" alt="{{ $project->title }}" class="max-w-full h-auto mx-auto rounded-xl">
                        @elseif(strtolower($ext) == 'pdf')
                            <iframe 
                                src="{{ Storage::url($project->metadata['certificate_path']) }}" 
                                style="width: 100%; height: 90vh; min-height: 850px;"
                                class="rounded-xl" 
                                frameborder="0">
                            </iframe>
                        @endif
                    </div>
                </div>
            @endif
        @endif 

    </main>
</body>
</html>