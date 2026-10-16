<!DOCTYPE html>
<html lang="id" class="h-full bg-slate-50 antialiased">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Modifile — Otomasi Dokumen & Utilitas PDF</title>

    <!-- Google Fonts -->
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Inter:wght@300;400;500;600;700&family=Newsreader:ital,opsz,wght@0,6..72,400;0,6..72,600;1,6..72,400&display=swap" rel="stylesheet">
    
    <!-- Lucide Icons -->
    <script src="https://unpkg.com/lucide@latest"></script>

    @vite(['resources/css/app.css', 'resources/js/app.js'])
</head>
<body class="h-full flex overflow-hidden text-slate-800 select-none md:select-auto">

    <!-- ================= SIDEBAR NAVIGATION ================= -->
    <aside id="sidebar" class="w-64 bg-white border-r border-slate-200/80 flex flex-col justify-between transition-all duration-300 ease-in-out z-30 shrink-0">
        <!-- Top Brand -->
        <div>
            <div id="top-brand" class="h-16 px-4 flex items-center justify-between border-b border-slate-100 transition-all">
                <div id="brand-logo" class="flex items-center gap-3 overflow-hidden transition-all rounded-xl">
                    <div class="w-9 h-9 rounded-xl bg-brand-600 flex items-center justify-center text-white shadow-sm shadow-brand-500/30 shrink-0">
                        <i data-lucide="layers" class="w-5 h-5"></i>
                    </div>
                    <div class="sidebar-text transition-opacity duration-200">
                        <div class="font-semibold text-slate-900 tracking-tight leading-none flex items-center gap-1.5">
                            Modifile
                            <span class="text-[10px] font-medium px-1.5 py-0.5 rounded-full bg-brand-50 text-brand-600 border border-brand-100">v1.0</span>
                        </div>
                        <p class="text-[11px] text-slate-400 mt-1 truncate">Administrative Workspace</p>
                    </div>
                </div>
                <button id="sidebar-toggle-btn" onclick="toggleSidebar()" title="Ciutkan/Perluas Menu" class="p-1.5 rounded-lg text-slate-400 hover:text-slate-600 hover:bg-slate-100 transition-colors shrink-0">
                    <i id="sidebar-toggle-icon" data-lucide="panel-left-close" class="w-4 h-4"></i>
                </button>
            </div>

            <!-- Main Menu Groups -->
            <div class="p-3 space-y-6 overflow-y-auto max-h-[calc(100vh-140px)]">
                <div>
                    <div class="px-3 mb-2 text-[11px] font-semibold uppercase tracking-wider text-slate-400 sidebar-text">
                        Modul Utama
                    </div>
                    <nav class="space-y-1" id="main-nav">
                        <button onclick="switchMenu('dashboard')" id="nav-dashboard" class="nav-btn w-full flex items-center justify-between px-3 py-2.5 rounded-xl text-sm font-semibold bg-brand-50 text-brand-700 transition-all">
                            <div class="nav-inner flex items-center gap-3 overflow-hidden w-full transition-all">
                                <i data-lucide="layout-grid" class="w-4 h-4 shrink-0"></i>
                                <span class="sidebar-text truncate">Ringkasan Cepat</span>
                            </div>
                        </button>

                        <button onclick="switchMenu('word-template')" id="nav-word-template" class="nav-btn w-full flex items-center justify-between px-3 py-2.5 rounded-xl text-sm font-medium text-slate-600 hover:bg-slate-100 hover:text-slate-900 transition-all">
                            <div class="nav-inner flex items-center gap-3 overflow-hidden w-full transition-all">
                                <i data-lucide="file-text" class="w-4 h-4 shrink-0"></i>
                                <span class="sidebar-text truncate">Generator Dokumen</span>
                            </div>
                            <span class="sidebar-text text-[11px] px-2 py-0.5 rounded-full bg-brand-50 text-brand-600 font-semibold">3</span>
                        </button>

                        <button onclick="switchMenu('pdf-tools')" id="nav-pdf-tools" class="nav-btn w-full flex items-center justify-between px-3 py-2.5 rounded-xl text-sm font-medium text-slate-600 hover:bg-slate-100 hover:text-slate-900 transition-all">
                            <div class="nav-inner flex items-center gap-3 overflow-hidden w-full transition-all">
                                <i data-lucide="file-sliders" class="w-4 h-4 shrink-0"></i>
                                <span class="sidebar-text truncate">Utilitas PDF</span>
                            </div>
                        </button>
                    </nav>
                </div>
            </div>
        </div>

        <!-- Bottom Status / User Info -->
        <div class="p-3 border-t border-slate-100 bg-slate-50/50">
            <div id="user-info-container" class="flex items-center gap-3 px-2 py-1.5 transition-all">
                <div class="w-8 h-8 rounded-full bg-slate-200 flex items-center justify-center text-slate-600 font-semibold text-xs shrink-0">
                    RP
                </div>
                <div class="sidebar-text overflow-hidden">
                    <p class="text-xs font-medium text-slate-700 truncate">Ridho Pardede</p>
                    <p class="text-[11px] text-emerald-600 flex items-center gap-1">
                        <span class="w-1.5 h-1.5 rounded-full bg-emerald-500 inline-block"></span> Online
                    </p>
                </div>
            </div>
        </div>
    </aside>

    <!-- ================= MAIN CONTENT AREA ================= -->
    <div class="flex-1 flex flex-col h-full overflow-hidden bg-slate-50">
        
        <!-- Top Header Bar -->
        <header class="h-16 bg-white border-b border-slate-200/80 px-4 md:px-6 flex items-center justify-between shrink-0 gap-4">
            
            <div class="flex items-center min-w-0">
                <div id="header-breadcrumb" class="flex items-center gap-2 text-sm min-w-0">
                    <span class="text-slate-400 shrink-0 hidden sm:inline">Modifile</span>
                    <i data-lucide="chevron-right" class="w-4 h-4 text-slate-300 shrink-0 hidden sm:inline"></i>
                    <span id="current-page-title" class="font-semibold text-slate-800 truncate">Dashboard & Ringkasan Cepat</span>
                </div>
            </div>

            <div class="flex items-center gap-2.5 shrink-0">
                <!-- Quick Switcher Pill -->
                <div class="hidden md:flex items-center bg-slate-100 p-1 rounded-xl text-xs font-medium">
                    <button onclick="switchMenu('word-template')" id="top-pill-word" class="px-3 py-1.5 rounded-lg text-slate-500 hover:text-slate-800 transition-all">
                        Template Word
                    </button>
                    <button onclick="switchMenu('pdf-tools')" id="top-pill-pdf" class="px-3 py-1.5 rounded-lg text-slate-500 hover:text-slate-800 transition-all">
                        Tools PDF
                    </button>
                </div>

                <button onclick="alert('Ini akan membuka modal modul baru nantinya!')" class="px-3 py-2 rounded-xl border border-slate-200 hover:border-slate-300 bg-white text-slate-600 hover:text-slate-900 text-xs font-medium flex items-center gap-1.5 shadow-sm transition-all shrink-0">
                    <i data-lucide="blocks" class="w-3.5 h-3.5 text-brand-600"></i>
                    <span class="hidden sm:inline">+ Modul Baru</span>
                </button>
            </div>
        </header>

        <!-- ================= BAGIAN CONTAINER VIEW (ROUTING VIRTUAL) ================= -->
        
        <!-- VIEW 0: DASHBOARD -->
        <main id="view-dashboard" class="view-section flex-1 overflow-y-auto p-6 transition-opacity">
            <div class="max-w-6xl mx-auto">
                <div class="bg-white rounded-2xl p-6 border border-slate-200 shadow-sm">
                    <h1 class="text-xl font-bold text-slate-900">Selamat Datang di Workspace Modifile</h1>
                    <p class="text-sm text-slate-500 mt-1">Silahkan coba interaksi menu pada sidebar atau header.</p>
                </div>
            </div>
        </main>

        <!-- VIEW 1: WORD TEMPLATE -->
        <main id="view-word-template" class="view-section hidden flex-1 overflow-y-auto p-6 transition-opacity">
            <div class="max-w-6xl mx-auto">
                <div class="bg-white rounded-2xl p-6 border border-slate-200 shadow-sm">
                    <h1 class="text-xl font-bold text-brand-600 flex items-center gap-2">
                        <i data-lucide="file-text" class="w-6 h-6"></i> Area Generator Dokumen (Kosong)
                    </h1>
                    <p class="text-sm text-slate-500 mt-1">Tampilan interaksi form dan kertas A4 akan diletakkan di sini nantinya.</p>
                </div>
            </div>
        </main>

        <!-- VIEW 2: PDF TOOLS -->
        <main id="view-pdf-tools" class="view-section hidden flex-1 overflow-y-auto p-6 transition-opacity">
            <div class="max-w-6xl mx-auto">
                <div class="bg-white rounded-2xl p-6 border border-slate-200 shadow-sm">
                    <h1 class="text-xl font-bold text-rose-600 flex items-center gap-2">
                        <i data-lucide="file-sliders" class="w-6 h-6"></i> Area Utilitas PDF (Kosong)
                    </h1>
                    <p class="text-sm text-slate-500 mt-1">Tampilan merge, rotate, dan split PDF akan diletakkan di sini nantinya.</p>
                </div>
            </div>
        </main>

    </div>

    <!-- ================= SCRIPT INTERAKTIF ================= -->
    <script>
        let sidebarCollapsed = false;

        // FUNGSI 1: Interaksi Mengecilkan Sidebar & Merapikan Layout Saat Tertutup
        function toggleSidebar() {
            sidebarCollapsed = !sidebarCollapsed;
            
            // Ambil elemen yang terpengaruh
            const sidebar = document.getElementById('sidebar');
            const texts = document.querySelectorAll('.sidebar-text');
            const icon = document.getElementById('sidebar-toggle-icon');
            
            // Elemen khusus untuk dirapikan saat ditutup (Perbaikan sisa tampilan)
            const topBrand = document.getElementById('top-brand');
            const toggleBtn = document.getElementById('sidebar-toggle-btn');
            const brandLogo = document.getElementById('brand-logo');
            const navInners = document.querySelectorAll('.nav-inner');
            const userInfo = document.getElementById('user-info-container');

            if (sidebarCollapsed) {
                // Kecilkan kontainer sidebar
                sidebar.classList.remove('w-64');
                sidebar.classList.add('w-[72px]');
                texts.forEach(t => t.classList.add('hidden')); // Sembunyikan semua teks/badge
                icon.setAttribute('data-lucide', 'panel-left-open');

                // Tengahkan logo & sembunyikan tombol panah header
                topBrand.classList.remove('px-4', 'justify-between');
                topBrand.classList.add('justify-center');
                toggleBtn.classList.add('hidden'); 
                
                // Jadikan logo utama bisa diklik untuk membuka sidebar kembali
                brandLogo.classList.add('cursor-pointer', 'hover:bg-slate-100', 'p-1');
                brandLogo.setAttribute('onclick', 'toggleSidebar()');

                // Tengahkan ikon menu di sidebar
                navInners.forEach(nav => {
                    nav.classList.remove('gap-3');
                    nav.classList.add('justify-center');
                });
                
                userInfo.classList.add('justify-center');
            } else {
                // Lebarkan kembali
                sidebar.classList.remove('w-[72px]');
                sidebar.classList.add('w-64');
                texts.forEach(t => t.classList.remove('hidden'));
                icon.setAttribute('data-lucide', 'panel-left-close');

                // Kembalikan Header Sidebar
                topBrand.classList.add('px-4', 'justify-between');
                topBrand.classList.remove('justify-center');
                toggleBtn.classList.remove('hidden');
                
                brandLogo.classList.remove('cursor-pointer', 'hover:bg-slate-100', 'p-1');
                brandLogo.removeAttribute('onclick');

                // Kembalikan ikon menu
                navInners.forEach(nav => {
                    nav.classList.add('gap-3');
                    nav.classList.remove('justify-center');
                });

                userInfo.classList.remove('justify-center');
            }
            
            lucide.createIcons();
        }

        // FUNGSI 2: Sistem Routing / Penggantian Menu Interaktif SPA
        function switchMenu(menuKey) {
            // Sembunyikan semua bagian <main>
            document.querySelectorAll('.view-section').forEach(el => {
                el.classList.add('hidden');
            });

            // Reset warna semua tombol menu sidebar agar menjadi default
            document.querySelectorAll('.nav-btn').forEach(btn => {
                btn.className = 'nav-btn w-full flex items-center justify-between px-3 py-2.5 rounded-xl text-sm font-medium text-slate-600 hover:bg-slate-100 hover:text-slate-900 transition-all';
            });

            // Reset warna tombol pil di pojok kanan atas
            const pillWord = document.getElementById('top-pill-word');
            const pillPdf = document.getElementById('top-pill-pdf');
            if(pillWord) pillWord.className = 'px-3 py-1.5 rounded-lg text-slate-500 hover:text-slate-800 transition-all';
            if(pillPdf) pillPdf.className = 'px-3 py-1.5 rounded-lg text-slate-500 hover:text-slate-800 transition-all';

            const titleEl = document.getElementById('current-page-title');

            // Logika untuk menampilkan menu spesifik
            if (menuKey === 'dashboard') {
                document.getElementById('view-dashboard').classList.remove('hidden');
                setActiveNav('nav-dashboard');
                titleEl.textContent = 'Dashboard & Ringkasan Cepat';
            } 
            else if (menuKey === 'word-template') {
                document.getElementById('view-word-template').classList.remove('hidden');
                setActiveNav('nav-word-template');
                if(pillWord) pillWord.className = 'px-3 py-1.5 rounded-lg bg-white text-slate-900 shadow-xs transition-all font-semibold';
                titleEl.textContent = 'Generator Dokumen (Word Template)';
            } 
            else if (menuKey === 'pdf-tools') {
                document.getElementById('view-pdf-tools').classList.remove('hidden');
                setActiveNav('nav-pdf-tools');
                if(pillPdf) pillPdf.className = 'px-3 py-1.5 rounded-lg bg-white text-slate-900 shadow-xs transition-all font-semibold';
                titleEl.textContent = 'Utilitas PDF (Combine & Kelola Halaman)';
            }
        }

        // Helper untuk mewarnai tombol menu yang aktif dengan warna biru brand
        function setActiveNav(btnId) {
            const btn = document.getElementById(btnId);
            if (btn) {
                btn.className = 'nav-btn w-full flex items-center justify-between px-3 py-2.5 rounded-xl text-sm font-semibold bg-brand-50 text-brand-700 transition-all';
            }
        }

        // Inisialisasi ikon saat pertama kali halaman dimuat
        document.addEventListener('DOMContentLoaded', () => {
            lucide.createIcons();
        });
    </script>
</body>
</html>