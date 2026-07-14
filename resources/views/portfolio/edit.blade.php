<x-app-layout>
    <x-slot name="header">
        <div class="flex items-center justify-between">
            <h2 class="font-extrabold text-2xl text-slate-800 tracking-tight flex items-center gap-2.5">
                <div class="p-2 bg-blue-50 rounded-xl text-blue-600 shadow-sm border border-blue-100">
                    <svg class="w-6 h-6" fill="none" stroke="currentColor" stroke-width="2" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" d="M16.862 4.487l1.687-1.688a1.875 1.875 0 112.652 2.652L6.832 19.82a4.5 4.5 0 01-1.897 1.13l-2.685.8.8-2.685a4.5 4.5 0 011.13-1.897L16.863 4.487zm0 0L19.5 7.125"></path>
                    </svg>
                </div>
                <span>{{ __('Edit Portofolio') }}</span>
            </h2>
            <a href="{{ route('dashboard') }}" class="inline-flex items-center gap-1.5 text-sm font-semibold text-slate-600 hover:text-slate-900 bg-slate-100 hover:bg-slate-200/80 border border-slate-200/50 px-4 py-2.5 rounded-xl transition duration-200 shadow-sm">
                &larr; Kembali ke Dashboard
            </a>
        </div>
    </x-slot>

    <div class="py-10 bg-slate-50/50 min-h-[calc(100vh-140px)]">
        <div class="max-w-3xl mx-auto sm:px-6 lg:px-8">

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

            <div class="bg-white border border-slate-100 rounded-2xl shadow-sm shadow-slate-100/50 p-6 md:p-8">
                <div class="flex items-center gap-2.5 mb-6 pb-4 border-b border-slate-100">
                    <div class="p-1.5 bg-blue-50 rounded-lg text-blue-600 border border-blue-100">
                        <svg class="w-5 h-5" fill="none" stroke="currentColor" stroke-width="2" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" d="M19.5 14.25v-2.625a3.375 3.375 0 00-3.375-3.375h-1.5A1.125 1.125 0 0113.5 7.125v-1.5a3.375 3.375 0 00-3.375-3.375H8.25m5.3 11.6l-3.326-3.326m0 0l-3.326 3.326m3.326-3.326v7"></path>
                        </svg>
                    </div>
                    <div>
                        <h3 class="text-lg font-bold text-slate-900 tracking-tight">Perbarui Portofolio</h3>
                        <p class="text-xs text-slate-400 mt-0.5">Edit detail proyek untuk: <span class="font-semibold text-blue-600">{{ $project->title }}</span></p>
                    </div>
                </div>

                <form action="{{ route('projects.update', $project->id) }}" method="POST" enctype="multipart/form-data" class="space-y-5">
                    @csrf
                    @method('PUT')

                    <div>
                        <label class="block text-xs font-extrabold text-slate-700 uppercase tracking-wider mb-1.5">Judul Portofolio</label>
                        <input type="text" name="title" value="{{ old('title', $project->title) }}" required class="mt-1 block w-full bg-slate-50/50 border border-slate-200 rounded-xl py-2.5 px-3.5 text-slate-900 text-sm focus:bg-white focus:border-blue-500 focus:ring-4 focus:ring-blue-500/10 transition-all duration-200">
                    </div>

                    <div>
                        <label class="block text-xs font-extrabold text-slate-700 uppercase tracking-wider mb-1.5">Jenis Portofolio</label>
                        <select name="type" required class="mt-1 block w-full bg-slate-50/50 border border-slate-200 rounded-xl py-2.5 px-3.5 text-slate-900 text-sm focus:bg-white focus:border-blue-500 focus:ring-4 focus:ring-blue-500/10 transition-all duration-200">
                            <option value="machine_learning" {{ $project->type == 'machine_learning' ? 'selected' : '' }}>Predictive / Machine Learning Model</option>
                            <option value="visualisasi" {{ $project->type == 'visualisasi' ? 'selected' : '' }}>Visualisasi data</option>
                            <option value="data_analysis_eda" {{ $project->type == 'data_analysis_eda' ? 'selected' : '' }}>Data Analysis & EDA</option>
                            <option value="certification" {{ $project->type == 'certification' ? 'selected' : '' }}>Sertifikasi / Kredensial IT</option>
                            <option value="experience" {{ $project->type == 'experience' ? 'selected' : '' }}>Experience</option>
                            <option value="other" {{ $project->type == 'other' ? 'selected' : '' }}>Other</option>
                        </select>
                    </div>

                    <div>
                        <label class="block text-xs font-extrabold text-slate-700 uppercase tracking-wider mb-1.5">Deskripsi Singkat</label>
                        <textarea name="description" rows="3" class="mt-1 block w-full bg-slate-50/50 border border-slate-200 rounded-xl py-2.5 px-3.5 text-slate-900 text-sm focus:bg-white focus:border-blue-500 focus:ring-4 focus:ring-blue-500/10 transition-all duration-200">{{ old('description', $project->description) }}</textarea>
                    </div>

                    <div>
                        <label class="block text-xs font-extrabold text-slate-700 uppercase tracking-wider mb-1.5">Metodologi, Analisis dan Detail</label>
                        <textarea name="analysis" rows="6" class="mt-1 block w-full bg-slate-50/50 border border-slate-200 rounded-xl py-2.5 px-3.5 text-slate-900 text-sm focus:bg-white focus:border-blue-500 focus:ring-4 focus:ring-blue-500/10 transition-all duration-200">{{ old('analysis', $project->analysis) }}</textarea>
                    </div>

                    <div class="grid grid-cols-1 md:grid-cols-2 gap-4">
                        <div>
                            <label class="block text-xs font-extrabold text-slate-700 uppercase tracking-wider mb-1.5">Metrik Utama</label>
                            <input type="text" name="metric_label" value="{{ old('metric_label', $project->metadata['metric_label'] ?? '') }}" class="mt-1 block w-full bg-slate-50/50 border border-slate-200 rounded-xl py-2.5 px-3.5 text-slate-900 text-sm focus:bg-white focus:border-blue-500 focus:ring-4 focus:ring-blue-500/10 transition-all duration-200" placeholder="Akurasi / MAPE / Stack">
                        </div>
                        <div>
                            <label class="block text-xs font-extrabold text-slate-700 uppercase tracking-wider mb-1.5">Nilai Metrik</label>
                            <input type="text" name="metric_value" value="{{ old('metric_value', $project->metadata['metric_value'] ?? '') }}" class="mt-1 block w-full bg-slate-50/50 border border-slate-200 rounded-xl py-2.5 px-3.5 text-slate-900 text-sm focus:bg-white focus:border-blue-500 focus:ring-4 focus:ring-blue-500/10 transition-all duration-200" placeholder="94.2% / 5.4% / Python, SQL">
                        </div>
                    </div>

                    <!-- Jupyter Notebook File Input -->
                    <div class="p-4 bg-blue-50/50 border border-blue-100 rounded-xl flex flex-col sm:flex-row items-start sm:items-center justify-between gap-3 shadow-inner">
                        <div class="flex items-start gap-2.5">
                            <div class="p-2 bg-blue-100/50 text-blue-600 rounded-lg border border-blue-200/50 mt-0.5">
                                <svg class="w-5 h-5" fill="none" stroke="currentColor" stroke-width="2" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" d="M19.5 14.25v-2.625a3.375 3.375 0 00-3.375-3.375h-1.5A1.125 1.125 0 0113.5 7.125v-1.5a3.375 3.375 0 00-3.375-3.375H8.25m3.75 9v6m3-3H9m1.5-12H5.625c-.621 0-1.125.504-1.125 1.125v17.25c0 .621.504 1.125 1.125 1.125h12.75c.621 0 1.125-.504 1.125-1.125V11.25a9 9 0 00-9-9z"></path>
                                </svg>
                            </div>
                            <div>
                                <label class="block text-xs font-bold text-blue-800">Ganti File Notebook (.ipynb)</label>
                                @if(isset($project->metadata['original_notebook']))
                                    <p class="text-[10px] text-blue-700 font-semibold mb-1">File aktif: {{ basename($project->metadata['original_notebook']) }}</p>
                                @endif
                                <p class="text-[10px] text-blue-600/80 mb-2 leading-snug">Kosongkan jika Anda tidak ingin mengubah file notebook saat ini.</p>
                            </div>
                        </div>
                        <input type="file" name="notebook" accept=".ipynb" class="block text-xs text-slate-500 file:mr-3 file:py-1.5 file:px-3 file:rounded-lg file:border file:border-blue-200 file:text-xs file:font-semibold file:bg-white file:text-blue-700 hover:file:bg-blue-50 file:cursor-pointer transition">
                    </div>

                    <!-- Certificate File Input -->
                    <div class="p-4 bg-emerald-50/50 border border-emerald-100 rounded-xl flex flex-col sm:flex-row items-start sm:items-center justify-between gap-3 shadow-inner">
                        <div class="flex items-start gap-2.5">
                            <div class="p-2 bg-emerald-100/50 text-emerald-600 rounded-lg border border-emerald-200/50 mt-0.5">
                                <svg class="w-5 h-5" fill="none" stroke="currentColor" stroke-width="2" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" d="M12 9v2m0 4h.01m-6.938 4h13.856c1.54 0 2.502-1.667 1.732-3L13.732 4c-.77-1.333-2.694-1.333-3.464 0L3.34 16c-.77 1.333.192 3 1.732 3z"></path>
                                </svg>
                            </div>
                            <div>
                                <label class="block text-xs font-bold text-emerald-800">Ganti File Sertifikat / Bukti</label>
                                @if(isset($project->metadata['certificate_path']))
                                    <p class="text-[10px] text-emerald-700 font-semibold mb-1">File aktif: {{ basename($project->metadata['certificate_path']) }}</p>
                                @endif
                                <p class="text-[10px] text-emerald-600/80 mb-2 leading-snug">Kosongkan jika Anda tidak ingin mengubah berkas sertifikat saat ini.</p>
                            </div>
                        </div>
                        <input type="file" name="certificate" accept=".pdf,.png,.jpg,.jpeg" class="block text-xs text-slate-500 file:mr-3 file:py-1.5 file:px-3 file:rounded-lg file:border file:border-emerald-200 file:text-xs file:font-semibold file:bg-white file:text-emerald-700 hover:file:bg-emerald-50 file:cursor-pointer transition">
                    </div>

                    <div class="pt-3 flex gap-3">
                        <button type="submit" class="flex-1 bg-blue-600 hover:bg-blue-700 text-white font-bold py-3 px-6 rounded-xl transition duration-200 shadow-md shadow-blue-500/25 hover:shadow-blue-500/35 transform hover:-translate-y-0.5 flex items-center justify-center gap-2 text-sm cursor-pointer">
                            <svg class="w-4 h-4" fill="none" stroke="currentColor" stroke-width="2.5" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" d="M4.5 12.75l6 6 9-13.5"></path>
                            </svg>
                            Simpan Perubahan
                        </button>
                        <a href="{{ route('dashboard') }}" class="bg-slate-100 hover:bg-slate-200 text-slate-700 font-bold py-3 px-6 rounded-xl transition duration-200 flex items-center justify-center gap-2 text-sm">
                            Batal
                        </a>
                    </div>
                </form>
            </div>
        </div>
    </div>
</x-app-layout>