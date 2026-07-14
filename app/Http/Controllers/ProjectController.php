<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Process;
use Illuminate\Support\Facades\Storage;
use App\Models\Project;
use Illuminate\Support\Str;

class ProjectController extends Controller
{
    public function store(Request $request)
    {
    // 1. Validasi Input
        $request->validate([
            'title' => 'required|string|max:255',
            'type' => 'required|in:machine_learning,visualisasi,data_analysis_eda,web_project,certification,experience,other',
            'notebook' => 'nullable|file|max:51200', 
            'certificate' => 'nullable|file|mimes:pdf,png,jpg,jpeg|max:10240'
        ]);

        $metadata = [
            'metric_label' => $request->metric_label,
            'metric_value' => $request->metric_value,
        ];

        if ($request->hasFile('notebook') && in_array($request->type, ['machine_learning', 'visualisasi', 'data_analysis_eda'])) {
            $file = $request->file('notebook');
            $filename = time() . '_' . \Str::slug($request->title) . '.ipynb';
            $notebookPath = $file->storeAs('notebooks', $filename, 'public');

            $error = $this->renderNotebook($filename, $notebookPath, $metadata);
            if ($error) {
                return back()->with('error', 'Gagal merender file Jupyter: ' . $error);
            }
        }

        if ($request->hasFile('certificate') && in_array($request->type, ['certification', 'experience'])) {
            $file = $request->file('certificate');
            $filename = time() . '_cert_' . \Str::slug($request->title) . '.' . $file->getClientOriginalExtension();
            $certPath = $file->storeAs('certificates', $filename, 'public');
            
            $metadata['certificate_path'] = $certPath;
        }

        Project::create([
            'title' => $request->title,
            'slug' => \Str::slug($request->title),
            'type' => $request->type,
            'description' => $request->description,
            'analysis' => $request->analysis,
            'metadata' => $metadata,
        ]);

        return back()->with('success', 'Portofolio berhasil disimpan!');
    }

    public function show(\App\Models\Project $project)
    {
        return view('portfolio.show', compact('project'));
    }

    public function destroy(\App\Models\Project $project)
    {
        if (isset($project->metadata['original_notebook'])) {
            \Illuminate\Support\Facades\Storage::disk('public')->delete($project->metadata['original_notebook']);
        }
        if (isset($project->metadata['rendered_html'])) {
            \Illuminate\Support\Facades\Storage::disk('public')->delete($project->metadata['rendered_html']);
        }

        $project->delete();

        return back()->with('success', 'Portofolio dan file Jupyter berhasil dihapus!');
    }

    public function edit(\App\Models\Project $project)
    {
        return view('portfolio.edit', compact('project'));
    }

    public function update(Request $request, \App\Models\Project $project)
    {
        $request->validate([
            'title' => 'required|string|max:255',
            'type' => 'required|in:machine_learning,visualisasi,data_analysis_eda,web_project,certification,experience,other',
            'notebook' => 'nullable|file|max:51200',
            'certificate' => 'nullable|file|mimes:pdf,png,jpg,jpeg|max:10240'
        ]);

        $metadata = $project->metadata ?? [];
        $metadata['metric_label'] = $request->metric_label;
        $metadata['metric_value'] = $request->metric_value;

        if ($request->hasFile('notebook') && in_array($request->type, ['machine_learning', 'visualisasi', 'data_analysis_eda'])) {
            
            if (isset($metadata['original_notebook'])) {
                \Illuminate\Support\Facades\Storage::disk('public')->delete($metadata['original_notebook']);
                \Illuminate\Support\Facades\Storage::disk('public')->delete($metadata['rendered_html']);
            }

            $file = $request->file('notebook');
            $filename = time() . '_' . \Str::slug($request->title) . '.ipynb';
            $notebookPath = $file->storeAs('notebooks', $filename, 'public');

            $error = $this->renderNotebook($filename, $notebookPath, $metadata);
            if ($error) {
                return back()->with('error', 'Gagal merender file Jupyter: ' . $error);
            }
        }

        if ($request->hasFile('certificate') && in_array($request->type, ['certification', 'experience'])) {
            $file = $request->file('certificate');
            $filename = time() . '_cert_' . \Str::slug($request->title) . '.' . $file->getClientOriginalExtension();
            $certPath = $file->storeAs('certificates', $filename, 'public');
            
            $metadata['certificate_path'] = $certPath;
        }

        $project->update([
            'title' => $request->title,
            'slug' => \Str::slug($request->title),
            'type' => $request->type,
            'description' => $request->description,
            'analysis' => $request->analysis,
            'metadata' => $metadata,
        ]);

        return redirect()->route('dashboard')->with('success', 'Data portofolio berhasil diperbarui!');
    }

    /**
     * Renders a Jupyter Notebook file to HTML using nbconvert.
     */
    private function renderNotebook($filename, $notebookPath, &$metadata)
    {
        $absoluteNotebookPath = storage_path('app/public/' . $notebookPath);
        $absoluteOutputDir = storage_path('app/public/rendered');
        
        if (!file_exists($absoluteOutputDir)) {
            mkdir($absoluteOutputDir, 0755, true);
        }

        $pythonPath = config('services.python.path');
        
        // Fallback checks for absolute path or empty path
        if (empty($pythonPath)) {
            $pythonPath = strtoupper(substr(PHP_OS, 0, 3)) === 'WIN' ? 'python' : 'python3';
        } elseif ((str_contains($pythonPath, '/') || str_contains($pythonPath, '\\')) && !file_exists($pythonPath)) {
            $pythonPath = strtoupper(substr(PHP_OS, 0, 3)) === 'WIN' ? 'python' : 'python3';
        }

        $command = "\"{$pythonPath}\" -m jupyter nbconvert --to html \"{$absoluteNotebookPath}\" --output-dir=\"{$absoluteOutputDir}\"";
        
        $processEnv = [];
        if (strtoupper(substr(PHP_OS, 0, 3)) === 'WIN') {
            $processEnv = [
                'SystemRoot'  => getenv('SystemRoot') ?: 'C:\\Windows',
                'PATH'        => getenv('PATH'),
                'USERPROFILE' => getenv('USERPROFILE') ?: env('USERPROFILE', 'C:\\Users\\viyendra'),
                'HOMEDRIVE'   => getenv('HOMEDRIVE') ?: 'C:',
                'HOMEPATH'    => getenv('HOMEPATH') ?: '\\Users\\viyendra',
            ];
        } else {
            $processEnv = [
                'PATH' => getenv('PATH'),
            ];
        }

        $result = \Illuminate\Support\Facades\Process::env($processEnv)->run($command);

        if ($result->successful()) {
            $htmlFilename = str_replace('.ipynb', '.html', $filename);
            $metadata['original_notebook'] = 'notebooks/' . $filename;
            $metadata['rendered_html'] = 'rendered/' . $htmlFilename;
            return null;
        }

        return $result->errorOutput();
    }
}