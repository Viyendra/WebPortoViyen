<x-app-layout>
    <x-slot name="header">
        <div class="flex items-center justify-between">
            <h2 class="font-extrabold text-2xl text-slate-800 tracking-tight flex items-center gap-2.5">
                <div class="p-2 bg-blue-50 rounded-xl text-blue-600 shadow-sm border border-blue-100">
                    <svg class="w-6 h-6" fill="none" stroke="currentColor" stroke-width="2" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" d="M10.325 4.317c.426-1.756 2.924-1.756 3.35 0a1.724 1.724 0 002.573 1.066c1.543-.94 3.31.826 2.37 2.37a1.724 1.724 0 001.065 2.572c1.756.426 1.756 2.924 0 3.35a1.724 1.724 0 00-1.066 2.573c.94 1.543-.826 3.31-2.37 2.37a1.724 1.724 0 00-2.572 1.065c-.426 1.756-2.924 1.756-3.35 0a1.724 1.724 0 00-2.573-1.066c-1.543.94-3.31-.826-2.37-2.37a1.724 1.724 0 00-1.065-2.572c-1.756-.426-1.756-2.924 0-3.35a1.724 1.724 0 001.066-2.573c-.94-1.543.826-3.31 2.37-2.37.996.608 2.296.07 2.572-1.065z"></path>
                        <path stroke-linecap="round" stroke-linejoin="round" d="M15 12a3 3 0 11-6 0 3 3 0 016 0z"></path>
                    </svg>
                </div>
                <span>{{ __('Admin Dashboard | Portfolio Manager') }}</span>
            </h2>
            <a href="{{ url('/') }}" target="_blank" class="inline-flex items-center gap-2 text-sm font-bold text-blue-600 hover:text-blue-700 bg-blue-50 hover:bg-blue-100/80 border border-blue-200/50 px-4 py-2.5 rounded-xl transition duration-200 shadow-sm">
                Lihat Portofolio
                <svg class="w-4 h-4" fill="none" stroke="currentColor" stroke-width="2.5" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" d="M13.5 6H5.25A2.25 2.25 0 003 8.25v10.5A2.25 2.25 0 005.25 21h10.5A2.25 2.25 0 0018 18.75V10.5m-10.5 6L21 3m0 0h-5.25M21 3v5.25"></path>
                </svg>
            </a>
        </div>
    </x-slot>

    <div class="py-10 bg-slate-50/50 min-h-[calc(100vh-140px)]">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            
            <!-- Success/Error Alert Notifications -->
            @if(session('success'))
                <div class="mb-6 bg-emerald-50 border border-emerald-200 text-emerald-800 px-5 py-4 rounded-2xl flex items-start gap-3 shadow-sm transition duration-300">
                    <svg class="w-5 h-5 text-emerald-600 mt-0.5 flex-shrink-0" fill="none" stroke="currentColor" stroke-width="2" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" d="M9 12l2 2 4-4m6 2a9 9 0 11-18 0 9 9 0 0118 0z"></path>
                    </svg>
                    <div>
                        <span class="font-bold text-sm block">Success</span>
                        <span class="text-sm opacity-90">{{ session('success') }}</span>
                    </div>
                </div>
            @endif
            @if(session('error'))
                <div class="mb-6 bg-rose-50 border border-rose-200 text-rose-800 px-5 py-4 rounded-2xl flex items-start gap-3 shadow-sm transition duration-300">
                    <svg class="w-5 h-5 text-rose-600 mt-0.5 flex-shrink-0" fill="none" stroke="currentColor" stroke-width="2" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" d="M12 9v2m0 4h.01m-6.938 4h13.856c1.54 0 2.502-1.667 1.732-3L13.732 4c-.77-1.333-2.694-1.333-3.464 0L3.34 16c-.77 1.333.192 3 1.732 3z"></path>
                    </svg>
                    <div>
                        <span class="font-bold text-sm block">Error</span>
                        <span class="text-sm opacity-90">{{ session('error') }}</span>
                    </div>
                </div>
            @endif
            @if ($errors->any())
                <div class="mb-6 bg-rose-50 border border-rose-200 text-rose-800 px-5 py-4 rounded-2xl flex items-start gap-3 shadow-sm">
                    <svg class="w-5 h-5 text-rose-600 mt-0.5 flex-shrink-0" fill="none" stroke="currentColor" stroke-width="2" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" d="M12 9v2m0 4h.01m-6.938 4h13.856c1.54 0 2.502-1.667 1.732-3L13.732 4c-.77-1.333-2.694-1.333-3.464 0L3.34 16c-.77 1.333.192 3 1.732 3z"></path>
                    </svg>
                    <div>
                        <strong class="font-bold text-sm block mb-1">Oops! Ada input yang salah:</strong>
                        <ul class="list-disc list-inside text-sm opacity-90 space-y-0.5">
                            @foreach ($errors->all() as $error)
                                <li>{{ $error }}</li>
                            @endforeach
                        </ul>
                    </div>
                </div>
            @endif

            <!-- Stacked Layout Container -->
            <div class="space-y-8">
                
                <!-- TOP CARD: Tambah Portofolio Baru -->
                <div class="bg-white border border-slate-100 rounded-2xl shadow-sm shadow-slate-100/50 p-6 md:p-8">
                    <div class="flex items-center gap-2 mb-6 pb-4 border-b border-slate-100">
                        <div class="p-1.5 bg-blue-50 rounded-lg text-blue-600 border border-blue-100">
                            <svg class="w-5 h-5" fill="none" stroke="currentColor" stroke-width="2" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" d="M12 4.5v15m7.5-7.5h-15"></path>
                            </svg>
                        </div>
                        <div>
                            <h3 class="text-lg font-bold text-slate-900 tracking-tight">Tambah Portofolio Baru</h3>
                            <p class="text-xs text-slate-400 mt-0.5">Lengkapi form berikut untuk menambahkan konten portofolio baru.</p>
                        </div>
                    </div>
                    
                    <form action="{{ route('projects.store') }}" method="POST" enctype="multipart/form-data">
                        @csrf
                        
                        <!-- Grid Form Fields for Large Screens -->
                        <div class="grid grid-cols-1 lg:grid-cols-2 gap-6">
                            
                            <!-- Left Column of the Form -->
                            <div class="space-y-5">
                                <div>
                                    <label class="block text-xs font-extrabold text-slate-700 uppercase tracking-wider mb-1.5">Judul Portofolio</label>
                                    <input type="text" name="title" required class="mt-1 block w-full bg-slate-50/50 border border-slate-200 rounded-xl py-2.5 px-3.5 text-slate-900 text-sm focus:bg-white focus:border-blue-500 focus:ring-4 focus:ring-blue-500/10 transition-all duration-200" placeholder="Contoh: Prediksi Tren Klaim Asuransi">
                                </div>

                                <div>
                                    <label class="block text-xs font-extrabold text-slate-700 uppercase tracking-wider mb-1.5">Jenis Portofolio</label>
                                    <select name="type" required class="mt-1 block w-full bg-slate-50/50 border border-slate-200 rounded-xl py-2.5 px-3.5 text-slate-900 text-sm focus:bg-white focus:border-blue-500 focus:ring-4 focus:ring-blue-500/10 transition-all duration-200">
                                        <option value="machine_learning">Predictive / Machine Learning Model</option>
                                        <option value="visualisasi">Visualisasi data</option>
                                        <option value="data_analysis_eda">Data Analysis & EDA</option>
                                        <option value="certification">Sertifikasi / Kredensial IT</option>
                                        <option value="experience">Experience</option>
                                        <option value="other">Other</option>
                                    </select>
                                </div>

                                <div class="grid grid-cols-1 sm:grid-cols-2 gap-4">
                                    <div>
                                        <label class="block text-xs font-extrabold text-slate-700 uppercase tracking-wider mb-1.5">Metrik Utama <span class="text-slate-400 font-normal">(Opsional)</span></label>
                                        <input type="text" name="metric_label" class="mt-1 block w-full bg-slate-50/50 border border-slate-200 rounded-xl py-2.5 px-3.5 text-slate-900 text-sm focus:bg-white focus:border-blue-500 focus:ring-4 focus:ring-blue-500/10 transition-all duration-200" placeholder="Akurasi / MAPE / Stack">
                                    </div>
                                    <div>
                                        <label class="block text-xs font-extrabold text-slate-700 uppercase tracking-wider mb-1.5">Nilai Metrik <span class="text-slate-400 font-normal">(Opsional)</span></label>
                                        <input type="text" name="metric_value" class="mt-1 block w-full bg-slate-50/50 border border-slate-200 rounded-xl py-2.5 px-3.5 text-slate-900 text-sm focus:bg-white focus:border-blue-500 focus:ring-4 focus:ring-blue-500/10 transition-all duration-200" placeholder="94.2% / 5.4% / Python, SQL">
                                    </div>
                                </div>

                                <!-- File Inputs Grid -->
                                <div class="grid grid-cols-1 sm:grid-cols-2 gap-4">
                                    <!-- Jupyter Notebook File Input -->
                                    <div class="p-4 bg-blue-50/50 border border-blue-100 rounded-xl flex items-start gap-3 shadow-inner">
                                        <div class="p-2 bg-blue-100/50 text-blue-600 rounded-lg border border-blue-200/50 mt-0.5">
                                            <svg class="w-5 h-5" fill="none" stroke="currentColor" stroke-width="2" viewBox="0 0 24 24">
                                                <path stroke-linecap="round" stroke-linejoin="round" d="M19.5 14.25v-2.625a3.375 3.375 0 00-3.375-3.375h-1.5A1.125 1.125 0 0113.5 7.125v-1.5a3.375 3.375 0 00-3.375-3.375H8.25m3.75 9v6m3-3H9m1.5-12H5.625c-.621 0-1.125.504-1.125 1.125v17.25c0 .621.504 1.125 1.125 1.125h12.75c.621 0 1.125-.504 1.125-1.125V11.25a9 9 0 00-9-9z"></path>
                                            </svg>
                                        </div>
                                        <div class="flex-1 min-w-0">
                                            <label class="block text-xs font-bold text-blue-800">Notebook (.ipynb)</label>
                                            <p class="text-[10px] text-blue-600/80 mb-2 leading-snug">Khusus tipe ML/EDA.</p>
                                            <input type="file" name="notebook" accept=".ipynb" class="block w-full text-xs text-slate-500 file:mr-2.5 file:py-1 file:px-2 file:rounded-lg file:border file:border-blue-200 file:text-[10px] file:font-bold file:bg-white file:text-blue-700 hover:file:bg-blue-50 file:cursor-pointer transition">
                                        </div>
                                    </div>

                                    <!-- Certificate File Input -->
                                    <div class="p-4 bg-emerald-50/50 border border-emerald-100 rounded-xl flex items-start gap-3 shadow-inner">
                                        <div class="p-2 bg-emerald-100/50 text-emerald-600 rounded-lg border border-emerald-200/50 mt-0.5">
                                            <svg class="w-5 h-5" fill="none" stroke="currentColor" stroke-width="2" viewBox="0 0 24 24">
                                                <path stroke-linecap="round" stroke-linejoin="round" d="M12 9v2m0 4h.01m-6.938 4h13.856c1.54 0 2.502-1.667 1.732-3L13.732 4c-.77-1.333-2.694-1.333-3.464 0L3.34 16c-.77 1.333.192 3 1.732 3z"></path>
                                            </svg>
                                        </div>
                                        <div class="flex-1 min-w-0">
                                            <label class="block text-xs font-bold text-emerald-800">Sertifikat / Bukti</label>
                                            <p class="text-[10px] text-emerald-600/80 mb-2 leading-snug">Wajib jika tipe Sertifikasi.</p>
                                            <input type="file" name="certificate" accept=".pdf,.png,.jpg,.jpeg" class="block w-full text-xs text-slate-500 file:mr-2.5 file:py-1 file:px-2 file:rounded-lg file:border file:border-emerald-200 file:text-[10px] file:font-bold file:bg-white file:text-emerald-700 hover:file:bg-emerald-50 file:cursor-pointer transition">
                                        </div>
                                    </div>
                                </div>
                            </div>
                            
                            <!-- Right Column of the Form -->
                            <div class="space-y-5">
                                <div>
                                    <label class="block text-xs font-extrabold text-slate-700 uppercase tracking-wider mb-1.5">Deskripsi / Latar Belakang Masalah</label>
                                    <textarea name="description" rows="3" class="mt-1 block w-full bg-slate-50/50 border border-slate-200 rounded-xl py-2.5 px-3.5 text-slate-900 text-sm focus:bg-white focus:border-blue-500 focus:ring-4 focus:ring-blue-500/10 transition-all duration-200" placeholder="Jelaskan secara singkat latar belakang atau masalah proyek ini..."></textarea>
                                </div>

                                <div>
                                    <label class="block text-xs font-extrabold text-slate-700 uppercase tracking-wider mb-1.5">Hasil Metodologi, Analisis dan Detail</label>
                                    <textarea name="analysis" rows="7.5" class="mt-1 block w-full bg-slate-50/50 border border-slate-200 rounded-xl py-2.5 px-3.5 text-slate-900 text-sm focus:bg-white focus:border-blue-500 focus:ring-4 focus:ring-blue-500/10 transition-all duration-200" placeholder="Tuliskan analisis mendalam, metodologi, model yang digunakan, insight penting, dll..."></textarea>
                                </div>
                            </div>
                            
                        </div>

                        <!-- Submit Button at the Bottom -->
                        <div class="pt-6 mt-6 border-t border-slate-100 flex justify-end">
                            <button type="submit" class="w-full sm:w-auto bg-blue-600 hover:bg-blue-700 text-white font-bold py-3 px-8 rounded-xl transition duration-200 shadow-md shadow-blue-500/25 hover:shadow-blue-500/35 transform hover:-translate-y-0.5 flex items-center justify-center gap-2 text-sm cursor-pointer">
                                <svg class="w-4 h-4" fill="none" stroke="currentColor" stroke-width="2.5" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" d="M12 4.5v15m7.5-7.5h-15"></path>
                                </svg>
                                Simpan Portofolio Baru
                            </button>
                        </div>
                    </form>
                </div>
                
                <!-- BOTTOM CARD: Daftar Portofolio Saya -->
                <div class="bg-white border border-slate-100 rounded-2xl shadow-sm shadow-slate-100/50 p-6 md:p-8">
                    <div class="flex items-center justify-between mb-6 pb-4 border-b border-slate-100">
                        <div>
                            <h3 class="text-lg font-bold text-slate-900 tracking-tight">Daftar Portofolio Saya</h3>
                            <p class="text-xs text-slate-400 mt-0.5">Kelola portofolio dan proyek yang ditampilkan pada website utama.</p>
                        </div>
                        <span class="bg-blue-50 text-blue-700 text-xs font-extrabold px-3 py-1 rounded-full border border-blue-100">
                            {{ count($projects) }} Total Portofolio
                        </span>
                    </div>
                    
                    <div class="overflow-x-auto rounded-xl border border-slate-100 shadow-sm">
                        <table class="min-w-full divide-y divide-slate-100">
                            <thead class="bg-slate-50/75">
                                <tr>
                                    <th class="px-5 py-3.5 text-left text-xs font-bold text-slate-500 uppercase tracking-wider">Judul Proyek</th>
                                    <th class="px-5 py-3.5 text-left text-xs font-bold text-slate-500 uppercase tracking-wider">Tipe</th>
                                    <th class="px-5 py-3.5 text-right text-xs font-bold text-slate-500 uppercase tracking-wider">Aksi</th>
                                </tr>
                            </thead>
                            <tbody class="bg-white divide-y divide-slate-100">
                                @forelse($projects as $project)
                                    <tr class="hover:bg-slate-50/50 transition duration-150">
                                        <td class="px-5 py-4 text-sm font-semibold text-slate-800">
                                            <div class="truncate max-w-[400px] sm:max-w-[600px]" title="{{ $project->title }}">
                                                {{ $project->title }}
                                            </div>
                                        </td>
                                        <td class="px-5 py-4 whitespace-nowrap text-sm">
                                            @php
                                                $badgeClass = match($project->type) {
                                                    'machine_learning' => 'bg-blue-50 text-blue-700 border-blue-100',
                                                    'visualisasi' => 'bg-cyan-50 text-cyan-700 border-cyan-100',
                                                    'data_analysis_eda' => 'bg-indigo-50 text-indigo-700 border-indigo-100',
                                                    'certification' => 'bg-emerald-50 text-emerald-700 border-emerald-100',
                                                    'experience' => 'bg-purple-50 text-purple-700 border-purple-100',
                                                    default => 'bg-slate-100 text-slate-700 border-slate-200',
                                                };
                                                
                                                $iconSvg = match($project->type) {
                                                    'machine_learning' => '<svg class="w-3.5 h-3.5 inline mr-1" fill="none" stroke="currentColor" stroke-width="2" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" d="M9.663 17h4.673M12 3v1m6.364 1.636l-.707.707M21 12h-1M4 12H3m3.343-5.657l-.707-.707m2.828 9.9a5 5 0 117.072 0l-.548.547A3.374 3.374 0 0014 18.469V19a2 2 0 11-4 0v-.531c0-.895-.356-1.754-.988-2.386l-.548-.547z"></path></svg>',
                                                    'visualisasi' => '<svg class="w-3.5 h-3.5 inline mr-1" fill="none" stroke="currentColor" stroke-width="2" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" d="M11 3.055A9.003 9.003 0 1020.945 13H11V3.055z"></path><path stroke-linecap="round" stroke-linejoin="round" d="M20.488 9H15V3.512A9.025 9.025 0 0120.488 9z"></path></svg>',
                                                    'data_analysis_eda' => '<svg class="w-3.5 h-3.5 inline mr-1" fill="none" stroke="currentColor" stroke-width="2" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" d="M9 19v-6a2 2 0 00-2-2H5a2 2 0 00-2 2v6a2 2 0 002 2h2a2 2 0 002-2zm0 0V9a2 2 0 012-2h2a2 2 0 012 2v10m-6 0a2 2 0 002 2h2a2 2 0 002-2m0 0V5a2 2 0 012-2h2a2 2 0 012 2v14a2 2 0 002 2h2a2 2 0 002-2z"></path></svg>',
                                                    'certification' => '<svg class="w-3.5 h-3.5 inline mr-1" fill="none" stroke="currentColor" stroke-width="2" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" d="M9 12l2 2 4-4M7.835 4.697a3.42 3.42 0 001.946-.806 3.42 3.42 0 014.438 0 3.42 3.42 0 001.946.806 3.42 3.42 0 013.138 3.138 3.42 3.42 0 00.806 1.946 3.42 3.42 0 010 4.438 3.42 3.42 0 00-.806 1.946 3.42 3.42 0 01-3.138 3.138 3.42 3.42 0 00-1.946.806 3.42 3.42 0 01-4.438 0 3.42 3.42 0 00-1.946-.806 3.42 3.42 0 01-3.138-3.138 3.42 3.42 0 00-.806-1.946 3.42 3.42 0 010-4.438 3.42 3.42 0 00.806-1.946 3.42 3.42 0 013.138-3.138z"></path></svg>',
                                                    'experience' => '<svg class="w-3.5 h-3.5 inline mr-1" fill="none" stroke="currentColor" stroke-width="2" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" d="M21 13.255A23.931 23.931 0 0112 15c-3.183 0-6.22-.62-9-1.745M16 6V4a2 2 0 00-2-2h-4a2 2 0 00-2 2v2m4 6h.01M5 20h14a2 2 0 002-2V8a2 2 0 00-2-2H5a2 2 0 00-2 2v10a2 2 0 002 2z"></path></svg>',
                                                    default => '<svg class="w-3.5 h-3.5 inline mr-1" fill="none" stroke="currentColor" stroke-width="2" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" d="M5 19a2 2 0 01-2-2V7a2 2 0 012-2h4l2 2h4a2 2 0 012 2v1m-6 10a4 4 0 11-8 0 4 4 0 018 0z"></path></svg>',
                                                };
                                            @endphp
                                            <span class="inline-flex items-center px-2.5 py-1 rounded-full text-xs font-bold border {{ $badgeClass }}">
                                                {!! $iconSvg !!}
                                                {{ ucwords(str_replace('_', ' ', $project->type)) }}
                                            </span>
                                        </td>
                                        <td class="px-5 py-4 whitespace-nowrap text-right text-sm font-medium">
                                            <div class="flex justify-end gap-3.5 items-center">
                                                <a href="{{ route('projects.edit', $project->id) }}" class="inline-flex items-center gap-1 text-xs font-bold text-blue-600 hover:text-blue-800 transition duration-150">
                                                    <svg class="w-3.5 h-3.5" fill="none" stroke="currentColor" stroke-width="2" viewBox="0 0 24 24">
                                                        <path stroke-linecap="round" stroke-linejoin="round" d="M16.862 4.487l1.687-1.688a1.875 1.875 0 112.652 2.652L6.832 19.82a4.5 4.5 0 01-1.897 1.13l-2.685.8.8-2.685a4.5 4.5 0 011.13-1.897L16.863 4.487zm0 0L19.5 7.125"></path>
                                                    </svg>
                                                    Edit
                                                </a>
                                                
                                                <form action="{{ route('projects.destroy', $project->id) }}" method="POST" onsubmit="return confirm('Apakah kamu yakin ingin menghapus portofolio ini secara permanen?');" class="inline-block">
                                                    @csrf
                                                    @method('DELETE')
                                                    <button type="submit" class="inline-flex items-center gap-1 text-xs font-bold text-slate-400 hover:text-rose-600 transition duration-150 cursor-pointer">
                                                        <svg class="w-3.5 h-3.5" fill="none" stroke="currentColor" stroke-width="2" viewBox="0 0 24 24">
                                                            <path stroke-linecap="round" stroke-linejoin="round" d="M14.74 9l-.346 9m-4.788 0L9.26 9m9.968-3.21c.342.052.682.107 1.022.166m-1.022-.165L18.16 19.673a2.25 2.25 0 01-2.244 2.077H8.084a2.25 2.25 0 01-2.244-2.077L4.772 5.79m14.456 0a48.108 48.108 0 00-3.478-.397m-12 .562c.34-.059.68-.114 1.022-.165m0 0a48.11 48.11 0 013.478-.397m7.5 0v-.916c0-1.18-.91-2.164-2.09-2.201a51.964 51.964 0 00-3.32 0c-1.18.037-2.09 1.022-2.09 2.201v.916m7.5 0a48.667 48.667 0 00-7.5 0"></path>
                                                        </svg>
                                                        Hapus
                                                    </button>
                                                </form>
                                            </div>
                                        </td>
                                    </tr>
                                @empty
                                    <tr>
                                        <td colspan="3" class="px-6 py-12 text-sm text-center text-slate-400 italic">
                                            <div class="flex flex-col items-center justify-center gap-2">
                                                <svg class="w-8 h-8 text-slate-300" fill="none" stroke="currentColor" stroke-width="1.5" viewBox="0 0 24 24">
                                                    <path stroke-linecap="round" stroke-linejoin="round" d="M2.25 13.5h3.86a2.25 2.25 0 012.008 1.24l.885 1.77a2.25 2.25 0 002.007 1.24h1.98a2.25 2.25 0 002.007-1.24l.885-1.77a2.25 2.25 0 012.007-1.24h3.86m-18 0h18a2.25 2.25 0 012.25 2.25v4.5A2.25 2.25 0 0119.5 21h-15A2.25 2.25 0 012 18.75v-4.5A2.25 2.25 0 012.25 13.5zm0-6h18A2.25 2.25 0 0122.5 9.75v1.5A2.25 2.25 0 0120.5 13.5h-17A2.25 2.25 0 011 11.25v-1.5A2.25 2.25 0 013.25 7.5z"></path>
                                                </svg>
                                                <span>Belum ada data portofolio. Silakan tambah data baru.</span>
                                            </div>
                                        </td>
                                    </tr>
                                @endforelse
                            </tbody>
                        </table>
                    </div>
                </div>
                
            </div>
        </div>
    </div>
</x-app-layout>