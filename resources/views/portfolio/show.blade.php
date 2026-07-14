<!DOCTYPE html>
<html lang="en" class="scroll-smooth">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>{{ $project->title }} | Portfolio</title>
    @vite(['resources/css/app.css', 'resources/js/app.js'])
    <link href="https://fonts.bunny.net/css?family=inter:400,500,600,700,800" rel="stylesheet" />
    <style>
        body { 
            font-family: 'Inter', sans-serif; 
            background-color: #020617; 
            color: #ffffff; 
            overflow-x: hidden;
        }
        
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
            background: linear-gradient(135deg, rgba(255, 255, 255, 0.03) 0%, rgba(255, 255, 255, 0.005) 100%);
            backdrop-filter: blur(12px);
            -webkit-backdrop-filter: blur(12px);
            border: 1px solid rgba(255, 255, 255, 0.05);
            box-shadow: 0 8px 32px 0 rgba(0, 0, 0, 0.3);
            transition: all 0.5s cubic-bezier(0.16, 1, 0.3, 1);
        }

        .glass-card:hover {
            border-color: rgba(59, 130, 246, 0.4);
            background: linear-gradient(135deg, rgba(255, 255, 255, 0.05) 0%, rgba(59, 130, 246, 0.02) 100%);
            box-shadow: 0 20px 40px -15px rgba(59, 130, 246, 0.2), inset 0 0 12px rgba(59, 130, 246, 0.05);
        }

        .text-gradient { 
            background: linear-gradient(to right, #ffffff 20%, #60a5fa 60%, #3b82f6 100%); 
            -webkit-background-clip: text; 
            -webkit-text-fill-color: transparent; 
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
    </style>
</head>
<body class="antialiased relative selection:bg-blue-500 selection:text-white">

    <!-- WebGL Canvas for 3D Background Plexus -->
    <canvas id="webgl-canvas" class="fixed inset-0 w-full h-full pointer-events-none z-0"></canvas>

    <div class="absolute top-[-10%] left-[-10%] w-[30rem] h-[30rem] bg-blue-700/10 rounded-full blur-[150px] pointer-events-none z-0"></div>
    <div class="absolute top-[40%] right-[-10%] w-[35rem] h-[35rem] bg-indigo-900/15 rounded-full blur-[180px] pointer-events-none z-0"></div>

    <nav class="fixed w-full top-6 z-50 flex justify-center px-4">
        <div class="glass-nav rounded-full px-8 py-3.5 flex items-center gap-8 text-sm font-medium shadow-2xl">
            @php
                $backHash = '#projects';
                if ($project->type === 'experience') {
                    $backHash = '#experience';
                } elseif ($project->type === 'certification') {
                    $backHash = '#certifications';
                }
            @endphp
            <a href="{{ url('/?skip_intro=true' . $backHash) }}" class="text-gray-400 hover:text-white transition flex items-center gap-2 border-r border-white/10 pr-8">
                <span class="text-lg leading-none mb-0.5">&larr;</span> Back to Home
            </a>
            <div class="flex items-center gap-2 text-blue-400 font-bold text-lg">
                <svg class="w-5 h-5" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1.5">
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
    </nav>

    <main class="max-w-6xl mx-auto px-6 pt-40 pb-20 relative z-10">
        
        <!-- <div class="mb-6 max-w-4xl mx-auto">
            <a href="{{ route('dashboard') }}" class="text-sm text-gray-400 hover:text-blue-400 transition-colors inline-flex items-center">
                ← Kembali ke Dashboard
            </a>
        </div> -->

        @if($project->type === 'experience')
            <div class="max-w-4xl mx-auto glass-card p-8 rounded-3xl shadow-2xl">
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
                <div class="glass-card rounded-3xl p-8 md:p-12 mb-12 relative overflow-hidden shadow-2xl">
                    <div class="absolute top-0 right-0 w-32 h-32 bg-blue-600/10 blur-2xl rounded-full"></div>
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
                <div class="glass-card rounded-3xl p-6 md:p-10 border border-white/5 relative shadow-2xl mb-12">
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
                <div class="glass-card rounded-3xl p-6 md:p-10 border border-white/5 relative shadow-2xl mt-12">
                    <h3 class="text-2xl font-bold text-white mb-6 flex items-center gap-3">
                        <svg class="w-7 h-7 text-blue-400" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12l2 2 4-4m6 2a9 9 0 11-18 0 9 9 0 0118 0z"></path></svg>
                        Dokumen Sertifikasi
                    </h3>
                    
                    <div class="w-full bg-slate-900/55 rounded-2xl overflow-hidden border border-slate-700 p-2 text-center">
                        @php $ext = pathinfo($project->metadata['certificate_path'], PATHINFO_EXTENSION); @endphp
                        
                        @if(in_array(strtolower($ext), ['png', 'jpg', 'jpeg']))
                            <img src="{{ asset('storage/' . $project->metadata['certificate_path']) }}" alt="{{ $project->title }}" class="max-w-full h-auto mx-auto rounded-xl">
                        @elseif(strtolower($ext) == 'pdf')
                            <iframe 
                                src="{{ asset('storage/' . $project->metadata['certificate_path']) }}" 
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

    <!-- Three.js Library CDN -->
    <script src="https://cdnjs.cloudflare.com/ajax/libs/three.js/r128/three.min.js"></script>
    
    <!-- Custom 3D Background Script -->
    <script>
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

        const nodeMaterial = new THREE.PointsMaterial({
            size: 0.6,
            color: 0x60a5fa,
            transparent: true,
            opacity: 0.85,
            blending: THREE.AdditiveBlending
        });

        const particles = new THREE.Points(geometry, nodeMaterial);
        scene.add(particles);

        // Lines
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

        camera.position.z = 45;

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

        function animate() {
            requestAnimationFrame(animate);

            const pos = geometry.attributes.position.array;
            
            // Map 2D mouse to 3D space on the Z=0 plane (rotated)
            const aspect = window.innerWidth / window.innerHeight;
            const mouse3D = new THREE.Vector3(
                targetMouseX * 30 * aspect,
                targetMouseY * 20,
                0
            );
            
            // Convert to local coordinates by applying inverse rotation of particle system
            const localMouse = mouse3D.clone();
            const invEuler = new THREE.Euler(-particles.rotation.x, -particles.rotation.y, 0, 'YXZ');
            localMouse.applyEuler(invEuler);

            // Move particles in their velocities with interactive spring physics
            const time = Date.now() * 0.001;
            for(let i = 0; i < count; i++) {
                const px = pos[i * 3];
                const py = pos[i * 3 + 1];
                const pz = pos[i * 3 + 2];

                const bx = basePositions[i * 3];
                const by = basePositions[i * 3 + 1];
                const bz = basePositions[i * 3 + 2];

                // Distance to local cursor position
                const dx = px - localMouse.x;
                const dy = py - localMouse.y;
                const dz = pz - localMouse.z;
                const dist = Math.sqrt(dx * dx + dy * dy + dz * dz);

                // 1. Spring return force (returns node to its original layout position)
                velocities[i].x += (bx - px) * 0.02;
                velocities[i].y += (by - py) * 0.02;
                velocities[i].z += (bz - pz) * 0.02;

                // 2. Magnetic Repulsion Force from kursor
                const repelRadius = 14;
                if (dist < repelRadius && dist > 0.1) {
                    const force = (repelRadius - dist) / repelRadius; // scale force 0 to 1
                    const repelStrength = 0.55;
                    velocities[i].x += (dx / dist) * force * repelStrength;
                    velocities[i].y += (dy / dist) * force * repelStrength;
                    velocities[i].z += (dz / dist) * force * repelStrength;
                }

                // 3. Damping (friction) to stop infinite vibration
                velocities[i].x *= 0.85;
                velocities[i].y *= 0.85;
                velocities[i].z *= 0.85;

                // 4. Slow organic drift/floating noise
                const driftX = Math.sin(time * 0.5 + i) * 0.003;
                const driftY = Math.cos(time * 0.5 + i) * 0.003;
                const driftZ = Math.sin(time * 0.2 + i) * 0.003;

                // Update position buffer
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

            // Slowly increment base rotation
            baseRotationY += 0.00015;
            baseRotationX += 0.00008;

            // Smooth interpolation for mouse movements (dampened to 0.03 for slow, elegant easing)
            mouseX += (targetMouseX - mouseX) * 0.03;
            mouseY += (targetMouseY - mouseY) * 0.03;
            
            // Set rotation as base rotation + mouse tilt offset
            particles.rotation.y = baseRotationY + mouseX * 0.4;
            particles.rotation.x = baseRotationX + mouseY * 0.4;
            lineSegments.rotation.copy(particles.rotation);

            // Parallax scroll
            camera.position.z = 45 - (scrollPercent * 18);
            camera.position.y = - (scrollPercent * 25);
            camera.rotation.y = scrollPercent * 0.15;

            renderer.render(scene, camera);
        }
        animate();
    </script>
</body>
</html>