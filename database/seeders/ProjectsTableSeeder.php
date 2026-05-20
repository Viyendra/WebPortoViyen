<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;

class ProjectsTableSeeder extends Seeder
{

    /**
     * Auto generated seed file
     *
     * @return void
     */
    public function run()
    {
        

        \DB::table('projects')->delete();
        
        \DB::table('projects')->insert(array (
            0 => 
            array (
                'id' => 7,
                'title' => 'Prediksi Tren Klaim Asuransi - MCF ITB x AXA Mandiri',
                'slug' => 'prediksi-tren-klaim-asuransi-mcf-itb-x-axa-mandiri',
                'type' => 'machine_learning',
                'description' => 'Merupakan Bagian dari lomba yang diadakan oleh ITB',
            'analysis' => 'Melakukan pembersihan dan Exploratory Data Analysis (EDA) terhadap 4096 data polis dan 5781 data klaim asuransi
kesehatan dari AXA Financial Indonesia untuk mengidentifikasi anomali dan faktor utama yang memengaruhi frekuensi
serta severitas klaim.

Mengembangkan dan mengevaluasi arsitektur stacked ensemble machine learning untuk memprediksi tren klaim tingkat
portofolio tahun 2026, berhasil mengoptimalkan akurasi prediksi dengan metrik evaluasi Mean Absolute Percentage
Error (MAPE) sebesar 5.4%.',
                'cover_image' => NULL,
                'metadata' => '{"metric_label": "MAPE", "metric_value": "5.4%", "rendered_html": "rendered/1779283101_prediksi-tren-klaim-asuransi-mcf-itb-x-axa-mandiri.html", "original_notebook": "notebooks/1779283101_prediksi-tren-klaim-asuransi-mcf-itb-x-axa-mandiri.ipynb"}',
                'is_private' => 0,
                'created_at' => '2026-05-20 13:18:28',
                'updated_at' => '2026-05-20 13:18:28',
            ),
            1 => 
            array (
                'id' => 9,
                'title' => 'IoT System Designer & Project Planner - PPK Ormawa Kemdiktisaintek',
                'slug' => 'iot-system-designer-project-planner-ppk-ormawa-kemdiktisaintek',
                'type' => 'experience',
                'description' => NULL,
                'analysis' => 'Merancang cetak biru dan rencana implementasi teknis untuk sistem otomasi penyiraman berbasis IoT guna mendukung
digitalisasi pertanian di Desa Pasir Langu, Jawa Barat.

Menyusun proyeksi kelayakan finansial dan merumuskan alur pengadaan komponen secara komprehensif untuk
memastikan efisiensi anggaran serta viabilitas program saat tahap eksekusi',
                'cover_image' => NULL,
                'metadata' => '{"metric_label": null, "metric_value": null}',
                'is_private' => 0,
                'created_at' => '2026-05-20 13:21:45',
                'updated_at' => '2026-05-20 13:21:45',
            ),
            2 => 
            array (
                'id' => 10,
                'title' => 'Android & Computer Vision Developer - Smart Glasses for the Blind Project',
                'slug' => 'android-computer-vision-developer-smart-glasses-for-the-blind-project',
                'type' => 'experience',
                'description' => NULL,
                'analysis' => 'Merancang dan mengembangkan aplikasi mobile aksesibilitas menggunakan Kotlin dan Android Studio sebagai
antarmuka utama yang menghubungkan pengguna tunanetra dengan perangkat smart glasses.

Mengkurasi ribuan dataset gambar visual dan memodifikasi arsitektur kode Python berbasis algoritma YOLOv8 guna
mengoptimalkan akurasi model deteksi objek secara real-time',
                'cover_image' => NULL,
                'metadata' => '{"metric_label": null, "metric_value": null}',
                'is_private' => 0,
                'created_at' => '2026-05-20 13:22:05',
                'updated_at' => '2026-05-20 13:22:05',
            ),
            3 => 
            array (
                'id' => 11,
                'title' => 'Coordinator Practicum Assistant - Data Mining',
                'slug' => 'coordinator-practicum-assistant-data-mining',
                'type' => 'experience',
                'description' => NULL,
                'analysis' => 'Memimpin dan mengoordinasikan tim asisten praktikum dalam mengeksekusi tiga pekan kurikulum laboratorium Data
Mining, memastikan standardisasi pengajaran end-to-end mulai dari Data Preparation, Exploration, hingga Model
Deployment.

Mengawasi implementasi teknis dan troubleshooting menggunakan Python untuk algoritma Machine Learning (K-Means
Clustering, Logistic Regression dan Naive Bayes), serta menyediakan konsultasi final project mahasiswa agar sesuai
dengan standar industri',
                'cover_image' => NULL,
                'metadata' => '{"metric_label": null, "metric_value": null}',
                'is_private' => 0,
                'created_at' => '2026-05-20 13:22:38',
                'updated_at' => '2026-05-20 13:22:38',
            ),
            4 => 
            array (
                'id' => 12,
                'title' => 'Practicum Assistant - Database, Applied Stats, Algorithms, & OOP',
                'slug' => 'practicum-assistant-database-applied-stats-algorithms-oop',
                'type' => 'experience',
                'description' => NULL,
                'analysis' => 'Membimbing dan mengevaluasi performa akademik mahasiswa secara komprehensif pada empat mata kuliah teknis
fundamental: Pemrograman Berbasis Objek (OOP), Basis Data, Statistika Terapan, dan Algoritma Pemrograman.

Memfasilitasi sesi troubleshooting secara langsung untuk logika algoritma, sintaks OOP, dan query SQL guna memastikan
pemahaman komprehensif mahasiswa terhadap arsitektur sistem dan basis data.',
                'cover_image' => NULL,
                'metadata' => '{"metric_label": null, "metric_value": null}',
                'is_private' => 0,
                'created_at' => '2026-05-20 13:23:01',
                'updated_at' => '2026-05-20 13:23:54',
            ),
            5 => 
            array (
                'id' => 13,
                'title' => 'Mathematics & Statistics Material Coordinator - Tentor Community HMSI',
                'slug' => 'mathematics-statistics-material-coordinator-tentor-community-hmsi',
                'type' => 'experience',
                'description' => NULL,
                'analysis' => 'Mengoordinasikan penyusunan kurikulum dan standardisasi materi ajar untuk mata kuliah fundamental kuantitatif
(Kalkulus, Probabilitas & Statistik, Matematika Diskrit, Statistika Industri) bagi mahasiswa tahun pertama.

Memimpin sesi pendampingan akademik intensif untuk memperkuat pemahaman konsep matematis dasar yang menjadi
fondasi esensial dalam pemodelan algoritma dan analisis data tingkat lanjut.',
                'cover_image' => NULL,
                'metadata' => '{"metric_label": null, "metric_value": null}',
                'is_private' => 0,
                'created_at' => '2026-05-20 13:23:18',
                'updated_at' => '2026-05-20 13:23:18',
            ),
            6 => 
            array (
                'id' => 14,
                'title' => 'EDUCBA SPSS: Apply and Evaluate Cluster Analysis Techniques',
                'slug' => 'educba-spss-apply-and-evaluate-cluster-analysis-techniques',
                'type' => 'certification',
                'description' => NULL,
                'analysis' => NULL,
                'cover_image' => NULL,
                'metadata' => '{"metric_label": null, "metric_value": null, "certificate_path": "certificates/1779283869_cert_spss-apply-and-evaluate-cluster-analysis-techniques.pdf"}',
                'is_private' => 0,
                'created_at' => '2026-05-20 13:31:09',
                'updated_at' => '2026-05-20 13:31:32',
            ),
            7 => 
            array (
                'id' => 15,
                'title' => 'EDUCBA SPSS: Apply and Interpret Logistic Regression Models',
                'slug' => 'educba-spss-apply-and-interpret-logistic-regression-models',
                'type' => 'certification',
                'description' => NULL,
                'analysis' => NULL,
                'cover_image' => NULL,
                'metadata' => '{"metric_label": null, "metric_value": null, "certificate_path": "certificates/1779283907_cert_educba-spss-apply-and-interpret-logistic-regression-models.pdf"}',
                'is_private' => 0,
                'created_at' => '2026-05-20 13:31:47',
                'updated_at' => '2026-05-20 13:31:47',
            ),
            8 => 
            array (
                'id' => 16,
                'title' => 'IBM: Introduction to Deep Learning & Neural Networks',
                'slug' => 'ibm-introduction-to-deep-learning-neural-networks',
                'type' => 'certification',
                'description' => NULL,
                'analysis' => NULL,
                'cover_image' => NULL,
                'metadata' => '{"metric_label": null, "metric_value": null, "certificate_path": "certificates/1779284038_cert_introduction-to-deep-learning-neural-networks.pdf"}',
                'is_private' => 0,
                'created_at' => '2026-05-20 13:33:58',
                'updated_at' => '2026-05-20 13:34:22',
            ),
            9 => 
            array (
                'id' => 17,
                'title' => 'IBM: Machine Learning with Python',
                'slug' => 'ibm-machine-learning-with-python',
                'type' => 'certification',
                'description' => NULL,
                'analysis' => NULL,
                'cover_image' => NULL,
                'metadata' => '{"metric_label": null, "metric_value": null, "certificate_path": "certificates/1779284168_cert_ibm-machine-learning-with-python.pdf"}',
                'is_private' => 0,
                'created_at' => '2026-05-20 13:36:08',
                'updated_at' => '2026-05-20 13:36:08',
            ),
            10 => 
            array (
                'id' => 18,
                'title' => 'London Business School: Fundamental of Financial Analysis',
                'slug' => 'london-business-school-fundamental-of-financial-analysis',
                'type' => 'certification',
                'description' => NULL,
                'analysis' => NULL,
                'cover_image' => NULL,
                'metadata' => '{"metric_label": null, "metric_value": null, "certificate_path": "certificates/1779284253_cert_london-business-school-fundamental-of-financial-analysis.pdf"}',
                'is_private' => 0,
                'created_at' => '2026-05-20 13:37:33',
                'updated_at' => '2026-05-20 13:37:33',
            ),
            11 => 
            array (
                'id' => 19,
                'title' => 'Company Visit to IDX by HIPMI PT Telkom',
                'slug' => 'company-visit-to-idx-by-hipmi-pt-telkom',
                'type' => 'experience',
                'description' => 'Melakukan Company Visit ke IDX Jakarta untuk edukasi Saham kepada Mahasiswa',
                'analysis' => NULL,
                'cover_image' => NULL,
                'metadata' => '{"metric_label": null, "metric_value": null, "certificate_path": "certificates/1779284293_cert_company-visit-to-idx-by-hipmi-pt-telkom.pdf"}',
                'is_private' => 0,
                'created_at' => '2026-05-20 13:38:13',
                'updated_at' => '2026-05-20 14:15:45',
            ),
            12 => 
            array (
                'id' => 20,
                'title' => 'Mental Arithmetic Ability by Taiwan Chamber of Commerce',
                'slug' => 'mental-arithmetic-ability-by-taiwan-chamber-of-commerce',
                'type' => 'certification',
                'description' => NULL,
                'analysis' => NULL,
                'cover_image' => NULL,
                'metadata' => '{"metric_label": null, "metric_value": null, "certificate_path": "certificates/1779284507_cert_mental-arithmetic-ability-by-taiwan-chamber-of-commerce.pdf"}',
                'is_private' => 0,
                'created_at' => '2026-05-20 13:41:47',
                'updated_at' => '2026-05-20 13:41:47',
            ),
            13 => 
            array (
                'id' => 21,
                'title' => 'Programming Hub: Artificial Intelligence',
                'slug' => 'programming-hub-artificial-intelligence',
                'type' => 'certification',
                'description' => NULL,
                'analysis' => NULL,
                'cover_image' => NULL,
                'metadata' => '{"metric_label": null, "metric_value": null}',
                'is_private' => 0,
                'created_at' => '2026-05-20 13:44:03',
                'updated_at' => '2026-05-20 13:45:15',
            ),
            14 => 
            array (
                'id' => 22,
                'title' => 'Programming Hub: Machine Learning Using Python',
                'slug' => 'programming-hub-machine-learning-using-python',
                'type' => 'certification',
                'description' => NULL,
                'analysis' => NULL,
                'cover_image' => NULL,
                'metadata' => '{"metric_label": null, "metric_value": null, "certificate_path": "certificates/1779284673_cert_programming-hub-machine-learning-using-python.pdf"}',
                'is_private' => 0,
                'created_at' => '2026-05-20 13:44:33',
                'updated_at' => '2026-05-20 13:45:08',
            ),
            15 => 
            array (
                'id' => 23,
                'title' => 'Oracle Academy: Java Foundation',
                'slug' => 'oracle-academy-java-foundation',
                'type' => 'certification',
                'description' => NULL,
                'analysis' => NULL,
                'cover_image' => NULL,
                'metadata' => '{"metric_label": null, "metric_value": null, "certificate_path": "certificates/1779284774_cert_oracle-academy-java-foundation.pdf"}',
                'is_private' => 0,
                'created_at' => '2026-05-20 13:46:14',
                'updated_at' => '2026-05-20 13:46:14',
            ),
            16 => 
            array (
                'id' => 24,
                'title' => 'Internal Selection Case 1 for Satria Data 2026 Telkom University',
                'slug' => 'internal-selection-case-1-for-satria-data-2026-telkom-university',
                'type' => 'machine_learning',
                'description' => 'Merupakan bagian dari seleksi internal satria data 2026 untuk tingkat universitas',
            'analysis' => 'Proyek ini mengimplementasikan pendekatan State-of-the-Art (SOTA) Natural Language
Processing (NLP) untuk mengklasifikasikan dokumen teks dari platform X (Twitter) mengenai
Program Makan Bergizi Gratis (MBG) ke dalam 8 kategori topikal (Anggaran, Distribusi,
Ekonomi, Kualitas Pangan, Lainnya, Politik, Sasaran Penerima, dan Tata Kelola).

Guna mengatasi tingginya ambiguitas, variasi dialek (slang), serta ketidakseimbangan kelas
(class imbalance) pada data pengguna (User Generated Content), kami membangun arsitektur
Stacked Generalization (Ensemble Stacked) yang menggabungkan kekuatan representasi
semantik dari dua rumpun model Transformer Bahasa Indonesia yang berbeda, dengan
pengklasifikasi linier regularisasi sebagai Meta-Learner.',
            'cover_image' => NULL,
            'metadata' => '{"metric_label": null, "metric_value": null, "rendered_html": "rendered/1779285973_internal-selection-case-1-for-satria-data-2026-telkom-university.html", "original_notebook": "notebooks/1779285973_internal-selection-case-1-for-satria-data-2026-telkom-university.ipynb"}',
            'is_private' => 0,
            'created_at' => '2026-05-20 14:06:18',
            'updated_at' => '2026-05-20 14:06:34',
        ),
        17 => 
        array (
            'id' => 26,
            'title' => 'Internal Selection Case 2 for Satria Data 2026 Telkom University',
            'slug' => 'internal-selection-case-2-for-satria-data-2026-telkom-university',
            'type' => 'visualisasi',
            'description' => 'Merupakan bagian dari seleksi internal satria data 2026 untuk tingkat universitas',
        'analysis' => 'Program Makan Bergizi Gratis (MBG) yang dijalankan pada masa pemerintahan Presiden Prabowo Subianto merupakan salah satu kebijakan publik berskala nasional yang paling banyak diperbincangkan di ruang digital. Intensitas perbincangan di platform X terus meningkat seiring munculnya berbagai isu turunan dalam pelaksanaannya, baik yang bernada apresiasi maupun kritik.

Berdasarkan hasil analisis sentimen terhadap 15.000 tweet mengenai program Makan Bergizi Gratis (MBG), sebanyak 50,85% tweet diklasifikasikan sebagai sentimen negatif. Hal ini menunjukkan bahwa
mayoritas pengguna platform X cenderung memberikan tanggapan berupa kritik, ketidakpuasan, atau kekhawatiran terhadap program ini.',
        'cover_image' => NULL,
        'metadata' => '{"metric_label": null, "metric_value": null, "rendered_html": "rendered/1779286369_internal-selection-case-2-for-satria-data-2026-telkom-university.html", "original_notebook": "notebooks/1779286369_internal-selection-case-2-for-satria-data-2026-telkom-university.ipynb"}',
        'is_private' => 0,
        'created_at' => '2026-05-20 14:12:17',
        'updated_at' => '2026-05-20 14:14:28',
    ),
));
        
        
    }
}