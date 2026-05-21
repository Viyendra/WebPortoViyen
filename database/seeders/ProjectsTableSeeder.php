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
                'title' => 'MCF ITB Data Science Competition: Forecasting Health Insurance Claim Severity',
                'slug' => 'mcf-itb-data-science-competition-forecasting-health-insurance-claim-severity',
                'type' => 'machine_learning',
            'description' => 'Merancang model machine learning regresi untuk memprediksi besaran tagihan klaim asuransi kesehatan (claim severity) guna mengoptimalkan manajemen risiko finansial pada ajang MCF ITB Data Science Competition. Melakukan eksplorasi data, feature engineering, dan prapemrosesan pada riwayat data medis dan profil demografi pemegang polis. Berhasil mengimplementasikan arsitektur ensemble regression yang divalidasi dengan ketat, mencapai performa prediksi dengan tingkat kesalahan (Mean Absolute Percentage Error / MAPE) hanya sebesar 5.4%, sebuah presisi yang krusial untuk manajemen alokasi dana cadangan asuransi.',
                'analysis' => 'Tentang Proyek:
Proyek ini merupakan solusi pemodelan analitik untuk memecahkan studi kasus Mega Capital Finance (MCF) pada ITB Data Science Competition. Tantangan bisnis utamanya berpusat pada industri asuransi kesehatan: merancang model yang mampu memprediksi secara akurat estimasi nilai tagihan klaim medis yang akan diajukan oleh pemegang polis. Akurasi prediksi ini sangat vital bagi perusahaan asuransi (Insurtech) untuk mencegah risiko under-pricing premi asuransi kesehatan, memprediksi inflasi biaya medis, serta memastikan ketersediaan dana cadangan (reserve allocation) yang aman dan proporsional.

Alur Kerja & Metodologi Teknis:
1. Exploratory Data Analysis (EDA) & Preprocessing: Melakukan pembedahan mendalam terhadap data historis klaim asuransi kesehatan, yang mencakup profil demografi pasien, jenis perawatan, dan riwayat klaim sebelumnya. Prapemrosesan melibatkan penanganan missing values serta identifikasi anomali/ outliers pada lonjakan biaya perawatan medis.
2. Feature Engineering Pipeline: Mentransformasi data rekam medis mentah menjadi format numerik yang terstandardisasi. Mengaplikasikan teknik Label Encoding dan One-Hot Encoding pada variabel kategorikal (seperti jenis polis atau diagnosis klaim), serta melakukan feature scaling untuk menstabilkan distribusi data sebelum proses pelatihan.
3. Advanced Regression Modeling: Mengeksplorasi dan melatih serangkaian algoritma regresi dan metode ensemble tingkat lanjut. Tujuan utamanya adalah untuk memetakan hubungan kompleks dan non-linear antara profil risiko kesehatan nasabah dengan estimasi nominal kerugian finansial perusahaan.
4. High-Precision Model Evaluation: Mengevaluasi model menggunakan metrik Mean Absolute Percentage Error (MAPE) guna memvalidasi margin kesalahan estimasi. Hasil akhir kompetisi menunjukkan model ini sukses meraih akurasi dengan tingkat error yang sangat rendah, yakni 5.4% MAPE, menjadikannya sebagai arsitektur yang sangat stabil dan siap divalidasi untuk implementasi bisnis nyata.

Teknologi & Keahlian Terapan:
1. Bahasa Pemrograman: Python
2. Machine Learning: Scikit-learn (Regression Algorithms, Ensemble Methods)
3. Data Processing & Analytics: Pandas, NumPy
4. Data Visualization: Matplotlib, Seaborn',
                'cover_image' => NULL,
                'metadata' => '{"metric_label": "MAPE", "metric_value": "5.4%", "rendered_html": "rendered/1779283101_prediksi-tren-klaim-asuransi-mcf-itb-x-axa-mandiri.html", "original_notebook": "notebooks/1779283101_prediksi-tren-klaim-asuransi-mcf-itb-x-axa-mandiri.ipynb"}',
                'is_private' => 0,
                'created_at' => '2026-05-20 13:18:28',
                'updated_at' => '2026-05-21 10:33:26',
            ),
            1 => 
            array (
                'id' => 10,
            'title' => 'Research Assistant (Computer Vision & Android) - Smart Glasses Project',
                'slug' => 'research-assistant-computer-vision-android-smart-glasses-project',
                'type' => 'experience',
            'description' => 'Dipercaya sebagai asisten teknis dalam proyek riset dosen untuk pengembangan teknologi smart glasses bagi penyandang tunanetra. Berkontribusi dalam pengembangan antarmuka aplikasi mobile aksesibilitas menggunakan Kotlin dan Android Studio. Mendukung eksekusi teknis pada pemodelan Computer Vision dengan mengkurasi ribuan dataset gambar visual, serta membantu modifikasi arsitektur algoritma YOLOv8 (Python) untuk mengoptimalkan akurasi deteksi objek jalanan secara real-time.',
            'analysis' => 'Proyek ini merupakan inisiatif riset akademis dan inovasi teknologi asistif yang dipimpin oleh dosen, bertujuan untuk merancang smart glasses guna meningkatkan kemandirian navigasi penyandang tunanetra. Sebagai asisten peneliti/kontributor teknis, saya dipercaya untuk mengeksekusi dan mengintegrasikan dua pilar teknis utama proyek ini: pengembangan antarmuka mobile dan optimasi model pendeteksi objek berbasis Artificial Intelligence (AI).

Tanggung Jawab & Kontribusi Teknis:
1. Mobile App Execution: Berkolaborasi dalam mengembangkan aplikasi Android menggunakan Kotlin dan Android Studio. Bertanggung jawab memastikan aplikasi berfungsi dengan stabil sebagai jembatan komunikasi (interface) antara pengguna dan perangkat keras keras kacamata pintar.
2. Computer Vision & Model Optimization: Mendukung pengembangan arsitektur Computer Vision proyek riset ini dengan mengimplementasikan dan memodifikasi algoritma State-of-the-Art YOLOv8 (Python). Fokus utama saya adalah menyesuaikan parameter model agar mampu melakukan inferensi deteksi objek secara real-time dengan latensi minimal.
3. Dataset Management: Mengambil peran penting dalam pemrosesan data, dengan mengkurasi, membersihkan, dan memberikan anotasi pada ribuan dataset gambar visual. Kurasi data yang teliti ini berkontribusi langsung pada peningkatan akurasi model dalam mengenali rintangan fisik, kendaraan, dan pejalan kaki guna meminimalisasi false-positive yang membahayakan pengguna.',
            'cover_image' => NULL,
            'metadata' => '{"metric_label": null, "metric_value": null}',
            'is_private' => 0,
            'created_at' => '2026-05-20 13:22:05',
            'updated_at' => '2026-05-21 09:56:04',
        ),
        2 => 
        array (
            'id' => 11,
            'title' => 'Coordinator Practicum Assistant | Data Mining',
            'slug' => 'coordinator-practicum-assistant-data-mining',
            'type' => 'experience',
        'description' => 'Memimpin tim asisten praktikum dalam pelaksanaan kurikulum laboratorium Data Mining secara end-to-end (dari fase Data Preparation, Eksplorasi, hingga Model Deployment). Bertanggung jawab mengawasi implementasi teknis dan memfasilitasi troubleshooting pemrograman Python untuk algoritma Machine Learning (K-Means Clustering, Logistic Regression, dan Naive Bayes). Berperan sebagai mentor dan konsultan teknis untuk final project mahasiswa guna memastikan metodologi pemodelan dan kualitas analisis memenuhi standar industri data science.',
        'analysis' => 'Sebagai Koordinator Asisten Praktikum Data Mining, peran saya melampaui instruksi teknis dasar; saya bertindak layaknya seorang Tech Lead di lingkungan akademis. Posisi ini menuntut perpaduan antara kepemimpinan operasional untuk mengelola tim asisten, serta keahlian teknis tingkat lanjut (advanced technical skills) untuk memastikan mahasiswa dapat menerjemahkan teori analitik data ke dalam pipeline machine learning yang komprehensif dan production-ready.

Tanggung Jawab & Pencapaian Utama:
1. Curriculum Execution & Team Leadership: Memimpin dan mengorkestrasi tim asisten praktikum dalam mengeksekusi tiga pekan kurikulum laboratorium Data Mining yang intensif. Memastikan standardisasi dan kualitas pengajaran berjalan mulus secara end-to-end, mencakup Data Preparation, Exploratory Data Analysis (EDA), pelatihan model, hingga Model Deployment.
2. Hands-on Technical Supervision: Mengawasi langsung jalannya implementasi teknis dan memandu jalannya troubleshooting kode menggunakan bahasa pemrograman Python. Membantu mahasiswa memecahkan kendala algoritmik dan parametrik pada model Machine Learning fundamental, khususnya K-Means Clustering (Unsupervised), Logistic Regression, dan Naive Bayes (Supervised).
3. Industry-Standard Project Advising: Menyelenggarakan sesi konsultasi tingkat lanjut untuk final project mahasiswa. Mengarahkan alur pemecahan masalah (problem-solving framework), pemilihan metrik evaluasi model, dan cara penarikan kesimpulan (data storytelling) agar output proyek selaras dengan praktik terbaik (best practices) di industri analitik data saat ini.',
            'cover_image' => NULL,
            'metadata' => '{"metric_label": null, "metric_value": null, "certificate_path": "certificates/1779353118_cert_coordinator-practicum-assistant-data-mining.pdf"}',
            'is_private' => 0,
            'created_at' => '2026-05-20 13:22:38',
            'updated_at' => '2026-05-21 09:51:17',
        ),
        3 => 
        array (
            'id' => 12,
            'title' => 'Practicum Assistant | Database, Applied Stats, Algorithms, & OOP',
            'slug' => 'practicum-assistant-database-applied-stats-algorithms-oop',
            'type' => 'experience',
        'description' => 'Bertindak sebagai instruktur laboratorium yang bertanggung jawab untuk membimbing, mengasuh, dan mengevaluasi performa akademik mahasiswa pada empat mata kuliah teknis fundamental: Pemrograman Berbasis Objek (OOP), Basis Data, Statistika Terapan, dan Algoritma Pemrograman. Memfasilitasi sesi troubleshooting langsung untuk membantu mahasiswa memecahkan masalah logika algoritma yang kompleks, perbaikan sintaks kode, hingga optimasi query SQL guna memperkuat pemahaman mereka terhadap arsitektur sistem.',
        'analysis' => 'Sebagai Asisten Praktikum (Practicum Assistant), saya memegang peran krusial dalam mendukung kelancaran instruksi akademis di laboratorium untuk rumpun mata kuliah inti bidang teknologi informasi dan analitik data. Peran ini menuntut penguasaan multi-paradigma (mulai dari logika pemrograman, manajemen data relasional, hingga komputasi statistik) serta kemampuan komunikasi teknis yang efektif untuk menjembatani teori kelas dengan implementasi praktis di dunia nyata.

Tanggung Jawab & Pencapaian Utama:
1. Comprehensive Academic Mentorship: Membimbing dan memantau perkembangan akademik mahasiswa secara intensif dalam menguasai pilar dasar teknologi: Pemrograman Berbasis Objek (OOP), Sistem Basis Data, Statistika Terapan, dan Algoritma Pemrograman.
2. Hands-on Troubleshooting & Debugging: Memfasilitasi sesi asistensi mandiri dan memberikan solusi troubleshooting real-time terhadap kendala teknis yang dihadapi mahasiswa, seperti kesalahan logika struktur data, eror sintaksis OOP, hingga kegagalan eksekusi manipulasi data.
3. Architecture & Database Reinforcement: Membimbing mahasiswa dalam merancang, menulis, dan mengoptimalkan query SQL (DDL/DML), serta memastikan mereka memahami dasar-dasar perancangan skema basis data relasional dan arsitektur sistem yang efisien.
4. Objective Evaluation & Assessment: Melakukan penilaian berkala, mengoreksi tugas laboratorium, serta memberikan umpan balik (feedback) konstruktif terhadap proyek pemrograman yang dikerjakan mahasiswa untuk memastikan standar kompetensi kelulusan praktikum terpenuhi.',
            'cover_image' => NULL,
            'metadata' => '{"metric_label": null, "metric_value": null, "certificate_path": "certificates/1779353108_cert_practicum-assistant-database-applied-stats-algorithms-oop.pdf"}',
            'is_private' => 0,
            'created_at' => '2026-05-20 13:23:01',
            'updated_at' => '2026-05-21 09:49:14',
        ),
        4 => 
        array (
            'id' => 13,
            'title' => 'Mathematics & Statistics Material Coordinator | Tentor Community HMSI',
            'slug' => 'mathematics-statistics-material-coordinator-tentor-community-hmsi',
            'type' => 'experience',
        'description' => 'Bertanggung jawab atas standardisasi kurikulum dan penyusunan materi ajar fundamental kuantitatif (Kalkulus, Probabilitas & Statistik, Matematika Diskrit, dan Statistika Industri) bagi mahasiswa tahun pertama (tahap persiapan/TPB). Mengelola dan memimpin sesi pendampingan akademik intensif yang bertujuan untuk memperkuat logika dan pemahaman matematis dasar, guna mempersiapkan mahasiswa menghadapi mata kuliah lanjutan yang berfokus pada pemodelan algoritma dan keilmuan data sains.',
        'analysis' => 'Sebagai Koordinator Materi Matematika dan Statistik di Tentor Community Himpunan Mahasiswa Sistem Informasi (HMSI), saya berperan sebagai fasilitator akademis yang menjembatani transisi pembelajaran mahasiswa tahun pertama. Peran ini menuntut penguasaan konsep kuantitatif yang mendalam serta kemampuan komunikasi asertif untuk menerjemahkan teori matematika yang kompleks menjadi modul pembelajaran yang terstruktur, praktis, dan mudah dipahami.

Tanggung Jawab & Pencapaian Utama:
1. Curriculum Standardization & Development: Mengoordinasikan penyusunan kurikulum dan merancang standardisasi materi ajar untuk empat mata kuliah pilar kuantitatif (Kalkulus, Probabilitas & Statistik, Matematika Diskrit, Statistika Industri). Memastikan setiap modul selaras dengan target capaian pembelajaran program studi.
2. Intensive Academic Mentorship: Memimpin langsung kelas tutorial dan sesi pendampingan belajar secara intensif. Berhasil menciptakan lingkungan belajar yang interaktif untuk membantu mahasiswa mengatasi kesulitan dalam memahami perhitungan matematis dan logika statistika.
3. Bridging Theory to Advanced Analytics: Tidak sekadar mengajarkan rumus, namun memfokuskan metode pengajaran pada pembentukan pola pikir logis (logical framing). Menekankan relevansi materi dasar ini sebagai fondasi esensial yang mutlak dibutuhkan untuk memahami arsitektur pemodelan algoritma, machine learning, dan advanced data analysis di tingkat lanjutan.',
            'cover_image' => NULL,
            'metadata' => '{"metric_label": null, "metric_value": null, "certificate_path": "certificates/1779356788_cert_mathematics-statistics-material-coordinator-tentor-community-hmsi.png"}',
            'is_private' => 0,
            'created_at' => '2026-05-20 13:23:18',
            'updated_at' => '2026-05-21 09:46:28',
        ),
        5 => 
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
        6 => 
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
        7 => 
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
        8 => 
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
        9 => 
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
        10 => 
        array (
            'id' => 19,
        'title' => 'Capital Market Exploration: Company Visit to Indonesia Stock Exchange (IDX) with HIPMI PT Telkom',
            'slug' => 'capital-market-exploration-company-visit-to-indonesia-stock-exchange-idx-with-hipmi-pt-telkom',
            'type' => 'experience',
        'description' => 'Berpartisipasi dalam delegasi Company Visit ke Bursa Efek Indonesia (IDX) yang diselenggarakan oleh Himpunan Pengusaha Muda Indonesia Perguruan Tinggi (HIPMI PT) Telkom University. Kunjungan industri ini bertujuan untuk memperdalam literasi keuangan dan pemahaman strategis mengenai ekosistem pasar modal di Indonesia. Melalui kegiatan ini, saya mendapatkan wawasan langsung mengenai mekanisme perdagangan saham real-time, proses Initial Public Offering (IPO) untuk ekspansi bisnis, serta bagaimana infrastruktur sistem informasi yang masif menggerakkan pasar keuangan nasional.',
        'analysis' => 'Kunjungan industri (Company Visit) ke Bursa Efek Indonesia (IDX) ini merupakan inisiatif strategis yang diwadahi oleh HIPMI PT Telkom untuk menjembatani kesenjangan antara teori akademik dan realitas dunia bisnis profesional. Berada langsung di pusat finansial Indonesia memberikan eksposur nyata mengenai bagaimana modal didistribusikan, bagaimana perusahaan-perusahaan bervaluasi tinggi beroperasi secara transparan, dan bagaimana ekosistem investasi mendukung pertumbuhan ekonomi nasional.

Aktivitas Utama & Wawasan yang Diperoleh:
1. Interactive Sessions & Market Outlook: Mengikuti sesi pemaparan langsung dari perwakilan IDX mengenai literasi finansial, tren pasar saat ini, dan pentingnya investasi sejak dini bagi generasi muda dan calon pengusaha.
2. Technological Observation: Mengamati secara langsung infrastruktur perdagangan digital dan dasbor analitik yang memvisualisasikan pergerakan IHSG (Indeks Harga Saham Gabungan), memberikan perspektif baru tentang krusialnya pengolahan data masif dalam industri keuangan.',
            'cover_image' => NULL,
            'metadata' => '{"metric_label": null, "metric_value": null, "certificate_path": "certificates/1779284293_cert_company-visit-to-idx-by-hipmi-pt-telkom.pdf"}',
            'is_private' => 0,
            'created_at' => '2026-05-20 13:38:13',
            'updated_at' => '2026-05-21 09:40:35',
        ),
        11 => 
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
        12 => 
        array (
            'id' => 21,
            'title' => 'Programming Hub: Artificial Intelligence',
            'slug' => 'programming-hub-artificial-intelligence',
            'type' => 'certification',
            'description' => NULL,
            'analysis' => NULL,
            'cover_image' => NULL,
            'metadata' => '{"metric_label": null, "metric_value": null, "certificate_path": "certificates/1779355523_cert_programming-hub-artificial-intelligence.pdf"}',
            'is_private' => 0,
            'created_at' => '2026-05-20 13:44:03',
            'updated_at' => '2026-05-21 09:25:23',
        ),
        13 => 
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
        14 => 
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
        15 => 
        array (
            'id' => 24,
            'title' => 'Public Opinion Classification on "Makan Bergizi Gratis" Program: A Dual-Transformer Stacking Ensemble Approach',
            'slug' => 'public-opinion-classification-on-makan-bergizi-gratis-program-a-dual-transformer-stacking-ensemble-approach',
            'type' => 'machine_learning',
        'description' => 'Mengembangkan arsitektur machine learning tingkat lanjut berupa Dual-Transformer Meta-Stacking Ensemble untuk mengklasifikasikan opini publik terkait program Makan Bergizi Gratis (MBG) ke dalam 8 kelas topikal pada ajang seleksi internal Satria Data 2026. Mengkombinasikan keunggulan pemahaman konteks formal dari IndoBERT-p2 dengan ketajaman analisis teks informal dari IndoBERTweet. Model-model Transformer ini disatukan menggunakan Logistic Regression sebagai meta-learner, yang secara efektif mampu menangani masalah ketidakseimbangan kelas ekstrem dan mencapai Macro F1-Score sebesar ~67%.',
            'analysis' => 'Tentang Proyek:
Proyek ini merupakan solusi pemodelan Natural Language Processing (NLP) State-of-the-Art (SOTA) untuk memecahkan Case 1 Big Data Challenge (BDC) pada seleksi internal Satria Data 2026. Tantangan utama yang dihadapi adalah tingginya ambiguitas klasifikasi teks media sosial (X/Twitter) yang berisik (high-noise) dengan dialek kasual, serta rasio ketidakseimbangan kelas yang ekstrem (kelas \'Ekonomi\' sebagai minoritas mutlak vs \'Kualitas Pangan\' sebagai mayoritas). Untuk mengatasi keterbatasan model tunggal, proyek ini mengimplementasikan arsitektur Stacked Generalization yang mengorkestrasi dua rumpun model Transformer bahasa Indonesia secara simultan.

Fitur & Metodologi Utama:
1. Dual-Transformer Base Models: Menggunakan IndoBERT Base Phase 2 (untuk menangkap penalaran sintaksis kalimat formal dan berita) dan IndoBERTweet (untuk menangkap nuansa kata slang, singkatan, serta emosi khas pengguna Twitter/X) sebagai fondasi pengekstraksi fitur probabilistik (soft labels).
2. Meta-Learner Calibration: Menerapkan algoritma Logistic Regression (dengan regularisasi L2) sebagai meta-learner. Algoritma ini dipilih untuk mencari batas keputusan linier (hyperplane) dari matriks probabilitas kedua Transformer, bertindak sebagai weight-calibrator yang adil untuk mencegah overfitting.
3. Custom PyTorch Data Pipeline: Membangun kelas torch.utils.data.Dataset secara modular yang mengotomatisasi dynamic tokenization, padding, dan trunkasi (dengan max_len=98). Batasan panjang ini ditentukan secara analitis berdasarkan distribusi histogram panjang kata (EDA) untuk mengoptimalkan memori VRAM GPU tanpa menghilangkan informasi penting.
4. Robust Evaluation Metrics: Berhasil mencatatkan performa Macro-Averaged F1-Score sebesar 67.67% (akurasi 68%). Optimalisasi metrik ini membuktikan bahwa model tidak terbuai oleh kelas mayoritas, melainkan tetap sensitif dan terkalibrasi dengan baik dalam memprediksi wawasan di kelas-kelas minoritas.

Teknologi yang Digunakan:
1. Bahasa Pemrograman: Python
2. Deep Learning Frameworks: PyTorch, Hugging Face Transformers (AutoTokenizer, AutoModelForSequenceClassification, Trainer)
3. Machine Learning & Modeling: Scikit-learn (LogisticRegression, Classification Report)
4. Data Processing & Visualization: Pandas, NumPy, RegEx, Matplotlib, Seaborn, WordCloud',
            'cover_image' => NULL,
            'metadata' => '{"metric_label": "Macro F1 Score", "metric_value": "67,67%", "rendered_html": "rendered/1779285973_internal-selection-case-1-for-satria-data-2026-telkom-university.html", "original_notebook": "notebooks/1779285973_internal-selection-case-1-for-satria-data-2026-telkom-university.ipynb"}',
            'is_private' => 0,
            'created_at' => '2026-05-20 14:06:18',
            'updated_at' => '2026-05-21 09:28:51',
        ),
        16 => 
        array (
            'id' => 26,
            'title' => 'Public Policy Social Media Analytics: NLP & Network Analysis on Indonesia\'s "Makan Bergizi Gratis" Program',
            'slug' => 'public-policy-social-media-analytics-nlp-network-analysis-on-indonesias-makan-bergizi-gratis-program',
            'type' => 'data_analysis_eda',
        'description' => 'Melakukan audit opini publik berbasis data terhadap program Makan Bergizi Gratis (MBG) dengan memproses 15.000 data teks dari platform X (Twitter). Mengembangkan pipeline analitik komprehensif yang mencakup pembersihan teks tingkat lanjut, klasifikasi sentimen berbasis IndoBERT, dan pemodelan topik menggunakan Latent Dirichlet Allocation (LDA) untuk mengekstraksi 4 pilar diskusi utama. Mengimplementasikan Social Network Analysis (SNA) dengan NetworkX untuk memetakan 1.455 komunitas organik dan mengidentifikasi Key Opinion Leaders (KOL), serta mendeteksi anomali penyebaran informasi untuk menghasilkan rekomendasi kebijakan strategis.',
            'analysis' => 'Tentang Proyek:
Proyek ini merupakan inisiatif riset data analitik terapan yang bertujuan untuk mengevaluasi respons dan dinamika masyarakat terhadap kebijakan publik berskala nasional (Program Makan Bergizi Gratis). Mengingat tingginya volume opini yang tidak terstruktur di media sosial, tantangan utama dari proyek ini adalah menyaring noise informasi untuk menemukan wawasan strategis. Melalui pendekatan Natural Language Processing (NLP) dan Social Network Analysis (SNA), jutaan teks interaksi mentah berhasil diubah menjadi peta persepsi publik yang transparan dan actionable bagi pemangku kepentingan.

Alur Kerja Analitik & Eksekusi Teknis:
1. Robust Text Preprocessing: Membangun pipeline pembersihan data menggunakan ekspresi reguler (RegEx) untuk menormalisasi 15.000 data cuitan mentah, menghapus tautan, mention, hashtag, dan stop-words khusus guna meningkatkan kualitas ekstraksi fitur.
2. Deep Learning Sentiment & Topic Extraction: Mengintegrasikan model Transformer IndoBERT untuk mengukur polarisasi sentimen publik secara akurat. Selanjutnya, mengaplikasikan Latent Dirichlet Allocation (LDA) dan CountVectorizer untuk mengisolasi percakapan ke dalam 4 klaster topik dominan (misalnya: gizi, transparansi anggaran, pelaksanaan lapangan).
3. Complex Network Mapping: Mengonstruksi graf jaringan sosial menggunakan NetworkX untuk menganalisis relasi antar-pengguna. Menggunakan In-Degree Centrality untuk mengukur tingkat pengaruh figur publik/media, serta algoritma Greedy Modularity yang berhasil mengidentifikasi 1.455 sub-communities atau ruang gema (echo chambers).
4. Behavioral Diagnostics: Melakukan analisis perilaku penyebaran informasi melalui identifikasi sumber aplikasi (Tweet Source), yang mengungkap keberadaan orkestrasi opini atau aktivitas buzzer di balik narasi tertentu.

Teknologi & Library Utama:
1. Bahasa Pemrograman: Python
2. NLP & Pemrosesan Teks: Transformers (Hugging Face), Scikit-learn (LDA, CountVectorizer), NLTK, RegEx
3. Network Graph: NetworkX
4. Data Wrangling & Visualisasi: Pandas, NumPy, Matplotlib, Seaborn',
            'cover_image' => NULL,
            'metadata' => '{"metric_label": null, "metric_value": null, "rendered_html": "rendered/1779355195_public-policy-social-media-analytics-nlp-network-analysis-on-indonesias-nutrition-program.html", "original_notebook": "notebooks/1779355195_public-policy-social-media-analytics-nlp-network-analysis-on-indonesias-nutrition-program.ipynb"}',
            'is_private' => 0,
            'created_at' => '2026-05-20 14:12:17',
            'updated_at' => '2026-05-21 09:21:15',
        ),
        17 => 
        array (
            'id' => 27,
            'title' => 'Dicoding: Dasar Visualisasi Data',
            'slug' => 'dicoding-dasar-visualisasi-data',
            'type' => 'certification',
            'description' => NULL,
            'analysis' => NULL,
            'cover_image' => NULL,
            'metadata' => '{"metric_label": null, "metric_value": null, "certificate_path": "certificates/1779352987_cert_dicoding-dasar-visualisasi-data.pdf"}',
            'is_private' => 0,
            'created_at' => '2026-05-21 08:43:07',
            'updated_at' => '2026-05-21 08:43:07',
        ),
        18 => 
        array (
            'id' => 28,
            'title' => 'Dicoding: Dasar AI',
            'slug' => 'dicoding-dasar-ai',
            'type' => 'certification',
            'description' => NULL,
            'analysis' => NULL,
            'cover_image' => NULL,
            'metadata' => '{"metric_label": null, "metric_value": null, "certificate_path": "certificates/1779353160_cert_dicoding-dasar-ai.pdf"}',
            'is_private' => 0,
            'created_at' => '2026-05-21 08:43:53',
            'updated_at' => '2026-05-21 08:46:00',
        ),
        19 => 
        array (
            'id' => 29,
            'title' => 'Dicoding: Dasar Data Science',
            'slug' => 'dicoding-dasar-data-science',
            'type' => 'certification',
            'description' => NULL,
            'analysis' => NULL,
            'cover_image' => NULL,
            'metadata' => '{"metric_label": null, "metric_value": null, "certificate_path": "certificates/1779353079_cert_dicoding-dasar-data-science.pdf"}',
            'is_private' => 0,
            'created_at' => '2026-05-21 08:44:39',
            'updated_at' => '2026-05-21 08:44:39',
        ),
        20 => 
        array (
            'id' => 30,
        'title' => 'Coordinator of Entrepreneurship Division | Staff Muda HMSI (Information Systems Student Association)',
            'slug' => 'coordinator-of-entrepreneurship-division-staff-muda-hmsi-information-systems-student-association',
            'type' => 'experience',
            'description' => 'Bertanggung jawab penuh atas arahan strategis dan operasional Divisi Kewirausahaan di Staff Muda HMSI. Berhasil merencanakan dan mengeksekusi strategi fundraising untuk memenuhi target pendanaan berbagai proyek himpunan. Berperan aktif dalam mengelola alur kerja tim, mengoordinasikan anggota divisi, dan memastikan setiap inisiatif bisnis berjalan sesuai dengan timeline dan tujuan finansial yang telah ditetapkan.',
        'analysis' => 'Sebagai Koordinator Divisi Kewirausahaan di Staff Muda Himpunan Mahasiswa Sistem Informasi (HMSI), saya dipercaya untuk memimpin inisiatif komersial dan pencarian dana (fundraising) guna mendukung keberlangsungan program kerja organisasi. Peran ini menuntut keseimbangan antara kepemimpinan strategis, kepekaan terhadap peluang bisnis, dan kemampuan manajerial untuk mengubah ide kewirausahaan menjadi profit yang nyata bagi organisasi.

Tanggung Jawab & Pencapaian Utama:
1. Strategic Financial Planning: Merancang, memproyeksikan, dan mengimplementasikan target pendanaan (revenue streams) yang realistis dan terukur untuk menopang berbagai proyek dan acara divisi.
2. Team Leadership & Coordination: Mengelola dinamika tim dengan mendelegasikan tugas secara efektif kepada anggota divisi. Mengorkestrasi kolaborasi tim untuk memastikan semua pihak bergerak selaras menuju pencapaian tujuan proyek bisnis.',
        'cover_image' => NULL,
        'metadata' => '{"metric_label": null, "metric_value": null, "certificate_path": "certificates/1779353359_cert_coordinator-of-the-entrepreneurship-division-by-staff-muda-hmsi.jpg"}',
        'is_private' => 0,
        'created_at' => '2026-05-21 08:49:19',
        'updated_at' => '2026-05-21 09:42:56',
    ),
    21 => 
    array (
        'id' => 31,
        'title' => 'Evaluating Model Limitations: A Case Study on Standard Logistic Regression for Multiclass Target',
        'slug' => 'evaluating-model-limitations-a-case-study-on-standard-logistic-regression-for-multiclass-target',
        'type' => 'machine_learning',
    'description' => 'Membangun dasbor machine learning interaktif berbasis Streamlit sebagai studi eksperimental untuk menguji kapabilitas model Standard Logistic Regression pada klasifikasi multikelas (tingkat pendidikan) tanpa menggunakan parameter multinomial. Proyek ini berfokus pada pengujian hipotesis, evaluasi model, dan analisis fundamental algoritma, yang pada akhirnya membuktikan limitasi model tersebut dengan akurasi 33%. Melalui dasbor ini, hasil evaluasi dan Confusion Matrix divisualisasikan secara transparan untuk membedah titik kelemahan prediksi.',
    'analysis' => 'Tentang Proyek (Eksperimen & Hipotesis):
Proyek ini pada dasarnya adalah sebuah studi eksperimental machine learning. Tujuan utamanya adalah untuk menguji sebuah hipotesis: Apakah model Logistic Regression standar dapat dipaksakan untuk memprediksi target yang memiliki lebih dari dua label (multinomial), seperti Tingkat Pendidikan, tanpa mengaktifkan parameter multinomial secara eksplisit? Melalui aplikasi berbasis Streamlit yang mengintegrasikan pipeline preprocessing secara end-to-end, proyek ini membuktikan bahwa pendekatan tersebut tidak efektif. Model mengalami kesulitan dalam membedah batasan keputusan antarkelas, menghasilkan metrik akurasi yang rendah (0.33 atau 33%). Hasil yang "jelek" ini justru menjadi temuan analitis yang krusial, mendemonstrasikan secara empiris mengapa pemilihan algoritma yang tepat (seperti Multinomial Logistic Regression atau model berbasis Tree) mutlak diperlukan untuk kasus klasifikasi kompleks.

Fitur & Fokus Analisis Utama:
1. Hypothesis Testing & Reality Check: Fokus utama proyek ini bukan pada penciptaan model sempurna, melainkan pada pembuktian matematis dan analitis mengenai batasan algoritma klasifikasi dasar pada target multikelas.
2. Transparent Evaluation Dashboard: Menampilkan metrik performa (Accuracy, Precision, Recall, F1-Score) secara transparan untuk memvalidasi rendahnya kemampuan prediksi model (akurasi 33%).
3. Confusion Matrix Diagnostics: Integrasi visualisasi Confusion Matrix menggunakan Seaborn untuk menganalisis di kelas mana model mengalami misclassification paling parah, memberikan wawasan diagnostic mengapa hipotesis awal gagal.
4. End-to-End Pipeline Interactivity: Meskipun model dasar memiliki limitasi, arsitektur aplikasi tetap dibangun dengan best practices software engineering, mencakup penanganan missing values, Label Encoding dinamis, dan StandardScaler yang memungkinkan pengguna melakukan pengujian input data baru secara real-time.

Teknologi yang Digunakan:
1. Bahasa Pemrograman: Python
2. Framework Web: Streamlit
3. Machine Learning: Scikit-learn (Logistic Regression, Evaluation Metrics, Scalers)
4. Manipulasi Data & Visualisasi: Pandas, NumPy, Matplotlib, Seaborn',
    'cover_image' => NULL,
    'metadata' => '{"metric_label": null, "metric_value": null, "rendered_html": "rendered/1779353783_predictive-analytics-dashboard-inferring-education-level-from-e-commerce-behavior.html", "original_notebook": "notebooks/1779353783_predictive-analytics-dashboard-inferring-education-level-from-e-commerce-behavior.ipynb"}',
    'is_private' => 0,
    'created_at' => '2026-05-21 08:56:30',
    'updated_at' => '2026-05-21 09:05:22',
),
22 => 
array (
    'id' => 32,
    'title' => 'IoT System Designer & Project Planner | PPK Ormawa Kemdiktisaintek',
    'slug' => 'iot-system-designer-project-planner-ppk-ormawa-kemdiktisaintek',
    'type' => 'experience',
'description' => 'Bertindak sebagai IoT System Designer dan Project Planner pada program hibah pengabdian masyarakat PPK Ormawa Kemdiktisaintek. Merancang cetak biru arsitektur teknis dan rencana implementasi sistem otomasi penyiraman berbasis Internet of Things (IoT) untuk mengakselerasi digitalisasi pertanian di Desa Pasir Langu, Jawa Barat. Bertanggung jawab penuh menyusun proyeksi kelayakan finansial (financial feasibility) dan merumuskan alur pengadaan (procurement) komponen guna memastikan efisiensi anggaran dan keberlanjutan program saat eksekusi.',
'analysis' => 'Proyek ini merupakan bagian dari Program Penguatan Kapasitas Organisasi Kemahasiswaan (PPK Ormawa) di bawah naungan Kemdiktisaintek, yang bertujuan membawa solusi teknologi tepat guna untuk memberdayakan sektor pertanian lokal di Desa Pasir Langu, Jawa Barat. Dalam proyek ini, peran saya menjembatani dua aspek fundamental: keteknikan sistem cerdas dan manajemen proyek operasional. Fokus utamanya adalah memastikan inovasi teknologi yang diajukan tidak sekadar canggih secara konseptual, melainkan juga realistis, terjangkau, dan berdampak nyata bagi produktivitas petani.

Tanggung Jawab & Kontribusi Utama:
1. IoT Architecture & Blueprint Design: Merancang cetak biru (blueprint) teknis secara end-to-end untuk sistem irigasi cerdas berbasis Internet of Things (IoT). Rancangan ini disesuaikan dengan kondisi geografis lapangan dan kebutuhan operasional petani untuk memastikan sistem penyiraman otomatis berjalan presisi.
2. Financial Feasibility & Budgeting: Menganalisis dan menyusun proyeksi kelayakan finansial yang ketat. Mengoptimalkan perencanaan dana hibah dengan memastikan Cost-Benefit Ratio yang proporsional untuk implementasi teknologi di area pedesaan.
3. Procurement & Viability Assurance: Merumuskan alur pengadaan (procurement) komponen perangkat keras IoT secara komprehensif. Pemilihan vendor dan spesifikasi komponen dikurasi secara strategis untuk mencegah pembengkakan anggaran (over-budgeting) serta menjamin sistem memiliki ketahanan hidup (viability) dan kemudahan perawatan (maintainability) jangka panjang oleh warga desa.',
    'cover_image' => NULL,
    'metadata' => '{"metric_label": null, "metric_value": null}',
    'is_private' => 0,
    'created_at' => '2026-05-21 10:07:42',
    'updated_at' => '2026-05-21 10:08:01',
),
));
        
        
    }
}