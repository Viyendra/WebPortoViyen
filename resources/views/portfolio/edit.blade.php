<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-slate-800 leading-tight">
            {{ __('Edit Portofolio: ') }} {{ $project->title }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-4xl mx-auto sm:px-6 lg:px-8">
            
            <div class="mb-4">
                <a href="{{ route('dashboard') }}" class="text-blue-600 hover:underline">&larr; Kembali ke Dashboard</a>
            </div>

            @if ($errors->any())
                <div class="mb-4 bg-red-100 border border-red-500 text-red-800 px-4 py-3 rounded">
                    <strong class="font-bold">Oops! Ada input yang salah:</strong>
                    <ul class="list-disc list-inside mt-2 text-sm">
                        @foreach ($errors->all() as $error)
                            <li>{{ $error }}</li>
                        @endforeach
                    </ul>
                </div>
            @endif

            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg border border-slate-100 p-6">
                
                <form action="{{ route('projects.update', $project->id) }}" method="POST" enctype="multipart/form-data" class="space-y-6">
                    @csrf
                    @method('PUT') <div>
                        <label class="block text-sm font-medium text-gray-700">Judul Portofolio</label>
                        <input type="text" name="title" value="{{ old('title', $project->title) }}" required class="mt-1 block w-full bg-slate-50 border border-slate-200 rounded-md py-2 px-3 text-slate-900">
                    </div>

                    <select name="type" class="..." required>
                        <option value="machine_learning" {{ $project->type == 'machine_learning' ? 'selected' : '' }}>Machine Learning</option>
                        <option value="visualisasi" {{ $project->type == 'visualisasi' ? 'selected' : '' }}>Visualisasi</option>
                        <option value="data_analysis_eda" {{ $project->type == 'data_analysis_eda' ? 'selected' : '' }}>Data Analysis & EDA</option>
                        <option value="certification" {{ $project->type == 'certification' ? 'selected' : '' }}>Certification</option>
                        
                        <option value="experience" {{ $project->type == 'experience' ? 'selected' : '' }}>Experience</option>
                        
                        <option value="other" {{ $project->type == 'other' ? 'selected' : '' }}>Other</option>
                    </select>

                    <div>
                        <label class="block text-sm font-medium text-gray-700">Deskripsi Singkat</label>
                        <textarea name="description" rows="3" class="mt-1 block w-full bg-slate-50 border border-slate-200 rounded-md py-2 px-3 text-slate-900">{{ old('description', $project->description) }}</textarea>
                    </div>

                    <div>
                        <label class="block text-sm font-medium text-gray-700">Metodologi, Analisis dan Detail</label>
                        <textarea name="analysis" rows="6" class="mt-1 block w-full bg-slate-50 border border-slate-200 rounded-md py-2 px-3 text-slate-900">{{ old('analysis', $project->analysis) }}</textarea>
                    </div>

                    <div class="grid grid-cols-1 md:grid-cols-2 gap-4">
                        <div>
                            <label class="block text-sm font-medium text-gray-700">Metrik Utama</label>
                            <input type="text" name="metric_label" value="{{ old('metric_label', $project->metadata['metric_label'] ?? '') }}" class="mt-1 block w-full bg-slate-50 border border-slate-200 rounded-md py-2 px-3 text-slate-900">
                        </div>
                        <div>
                            <label class="block text-sm font-medium text-gray-700">Nilai Metrik</label>
                            <input type="text" name="metric_value" value="{{ old('metric_value', $project->metadata['metric_value'] ?? '') }}" class="mt-1 block w-full bg-slate-50 border border-slate-200 rounded-md py-2 px-3 text-slate-900">
                        </div>
                    </div>

                    <div class="p-4 bg-blue-50 border border-blue-100 rounded-lg">
                        <label class="block text-sm font-bold text-blue-800 mb-2">Ganti File Notebook (.ipynb)</label>
                        <p class="text-xs text-blue-600 mb-3">Kosongkan saja jika kamu tidak ingin mengganti file notebook lama.</p>
                        <input type="file" name="notebook" accept=".ipynb" class="mt-1 block w-full text-sm text-gray-600 file:mr-4 file:py-2 file:px-4 file:rounded-full file:border-0 file:text-sm file:font-semibold file:bg-white file:text-blue-700 hover:file:bg-blue-100">
                    </div>

                    <div class="p-4 bg-emerald-50 border border-emerald-100 rounded-lg mt-4">
                        <label class="block text-sm font-bold text-emerald-800 mb-2">Ganti File Sertifikat / Bukti (.pdf, .png, .jpg)</label>
                        
                        @if(isset($project->metadata['certificate_path']))
                            <p class="text-xs text-emerald-700 mb-2 italic font-medium">
                                File saat ini: {{ basename($project->metadata['certificate_path']) }}
                            </p>
                        @endif
                        
                        <p class="text-xs text-emerald-600 mb-3">Kosongkan saja jika kamu tidak ingin mengganti file sertifikat lama.</p>
                        <input type="file" name="certificate" accept=".pdf,.png,.jpg,.jpeg" class="mt-1 block w-full text-sm text-gray-600 file:mr-4 file:py-2 file:px-4 file:rounded-full file:border-0 file:text-sm file:font-semibold file:bg-white file:text-emerald-700 hover:file:bg-emerald-100">
                    </div>

                    <div>
                        <button type="submit" class="bg-blue-600 hover:bg-blue-700 text-white font-bold py-2 px-6 rounded transition">
                            Update Portofolio
                        </button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</x-app-layout>