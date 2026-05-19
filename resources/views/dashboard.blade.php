<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-slate-800 leading-tight">
            {{ __('Admin Dashboard | Portfolio Manager') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-4xl mx-auto sm:px-6 lg:px-8">
            
            @if(session('success'))
                <div class="mb-4 bg-green-100 border border-green-500 text-green-800 px-4 py-3 rounded">
                    {{ session('success') }}
                </div>
            @endif
            @if(session('error'))
                <div class="mb-4 bg-red-100 border border-red-500 text-red-800 px-4 py-3 rounded">
                    {{ session('error') }}
                </div>
            @endif
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
                <h3 class="text-lg font-bold text-blue-600 mb-6">Tambah Portofolio Baru</h3>
                
                <form action="{{ route('projects.store') }}" method="POST" enctype="multipart/form-data" class="space-y-6">
                    @csrf
                    
                    <div>
                        <label class="block text-sm font-medium text-gray-700">Judul Portofolio</label>
                        <input type="text" name="title" required class="mt-1 block w-full bg-slate-50 border border-slate-200 rounded-md py-2 px-3 text-slate-900" placeholder="Contoh: Prediksi Tren Klaim Asuransi">
                    </div>

                    <div>
                        <label class="block text-sm font-medium text-gray-700">Jenis Portofolio</label>
                        <select name="type" required class="mt-1 block w-full bg-slate-50 border border-slate-200 rounded-md py-2 px-3 text-slate-900">
                            <option value="machine_learning">Predictive / Machine Learning Model</option>
                            <option value="visualisasi">Visualisasi data</option>
                            <option value="data_analysis_eda">Data Analysis & EDA</option>
                            <option value="web_project">Web Development / Software</option>
                            <option value="certification">Sertifikasi / Kredensial IT</option>
                        </select>
                    </div>

                    <div>
                        <label class="block text-sm font-medium text-gray-700">Deskripsi / Latar Belakang Masalah</label>
                        <textarea name="description" rows="3" class="mt-1 block w-full bg-slate-50 border border-slate-200 rounded-md py-2 px-3 text-slate-900" placeholder="Jelaskan singkat tentang proyek ini..."></textarea>
                    </div>

                    <div>
                        <label class="block text-sm font-medium text-gray-700">Hasil Analisis & Metodologi (Narasi Utama)</label>
                        <textarea name="analysis" rows="6" class="mt-1 block w-full bg-slate-50 border border-slate-200 rounded-md py-2 px-3 text-slate-900" placeholder="Tuliskan analisis mendalam, insights yang ditemukan, atau fitur-fitur software di sini..."></textarea>
                    </div>

                    <div class="grid grid-cols-1 md:grid-cols-2 gap-4">
                        <div>
                            <label class="block text-sm font-medium text-gray-700">Metrik Utama (Opsional)</label>
                            <input type="text" name="metric_label" class="mt-1 block w-full bg-slate-50 border border-slate-200 rounded-md py-2 px-3 text-slate-900" placeholder="Contoh: Akurasi / MAPE / Stack">
                        </div>
                        <div>
                            <label class="block text-sm font-medium text-gray-700">Nilai Metrik (Opsional)</label>
                            <input type="text" name="metric_value" class="mt-1 block w-full bg-slate-50 border border-slate-200 rounded-md py-2 px-3 text-slate-900" placeholder="Contoh: 94.2% / 5.4% MAPE / Laravel, SQL">
                        </div>
                    </div>

                    <div>
                        <label class="block text-sm font-medium text-gray-700">File Jupyter Notebook (.ipynb) <span class="text-xs text-gray-400">(Khusus Machine Learning)</span></label>
                        <input type="file" name="notebook" accept=".ipynb" class="mt-1 block w-full text-sm text-gray-600 file:mr-4 file:py-2 file:px-4 file:rounded-full file:border-0 file:text-sm file:font-semibold file:bg-blue-50 file:text-blue-700 hover:file:bg-blue-100">
                    </div>

                    <div class="p-4 bg-emerald-50 border border-emerald-100 rounded-lg">
                        <label class="block text-sm font-bold text-emerald-800 mb-2">File Sertifikat / Bukti (.pdf, .png, .jpg)</label>
                        <p class="text-xs text-emerald-600 mb-3">Wajib diisi jika kamu memilih Jenis Portofolio "Sertifikasi".</p>
                        <input type="file" name="certificate" accept=".pdf,.png,.jpg,.jpeg" class="mt-1 block w-full text-sm text-gray-600 file:mr-4 file:py-2 file:px-4 file:rounded-full file:border-0 file:text-sm file:font-semibold file:bg-white file:text-emerald-700 hover:file:bg-emerald-100">
                    </div>

                    <div>
                        <button type="submit" class="bg-blue-600 hover:bg-blue-700 text-white font-bold py-2 px-6 rounded transition">
                            Simpan Portofolio
                        </button>
                    </div>
                </form>
            </div>
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg border border-slate-100 p-6 mt-8">
                <h3 class="text-lg font-bold text-slate-800 mb-6">Daftar Portofolio Saya</h3>
                
                <div class="overflow-x-auto">
                    <table class="min-w-full divide-y divide-gray-200">
                        <thead class="bg-slate-50">
                            <tr>
                                <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Judul Proyek</th>
                                <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Tipe</th>
                                <th class="px-6 py-3 text-right text-xs font-medium text-gray-500 uppercase tracking-wider">Aksi</th>
                            </tr>
                        </thead>
                        <tbody class="bg-white divide-y divide-gray-200">
                            @forelse($projects as $project)
                                <tr>
                                    <td class="px-6 py-4 whitespace-nowrap text-sm font-medium text-gray-900">
                                        {{ $project->title }}
                                    </td>
                                    <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-500">
                                        {{ str_replace('_', ' ', $project->type) }}
                                    </td>
                                    <td class="px-6 py-4 whitespace-nowrap text-right text-sm font-medium flex justify-end gap-4 items-center">
                                        
                                        <a href="{{ route('projects.edit', $project->id) }}" class="text-blue-600 hover:text-blue-900 transition">Edit</a>

                                        <form action="{{ route('projects.destroy', $project->id) }}" method="POST" onsubmit="return confirm('Apakah kamu yakin ingin menghapus portofolio ini secara permanen?');">
                                            @csrf
                                            @method('DELETE')
                                            <button type="submit" class="text-red-600 hover:text-red-900 transition">Hapus</button>
                                        </form>

                                    </td>
                                </tr>
                            @empty
                                <tr>
                                    <td colspan="3" class="px-6 py-8 whitespace-nowrap text-sm text-center text-gray-500 italic">
                                        Belum ada data portofolio.
                                    </td>
                                </tr>
                            @endforelse
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>