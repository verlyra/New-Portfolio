<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Verly's Portfolio</title>
    <link rel="icon" href="/images/pfp.jpeg?v=3">
    <script src="https://cdn.tailwindcss.com"></script>
    <link href="https://fonts.googleapis.com/css2?family=Press+Start+2P&family=Fira+Code:wght@400;500&display=swap" rel="stylesheet">
    
    <style>
        :root {
            --pixel-pink: #ff76d8;
            --pink-dim: #4e003a;
            --bg-black: #050505;
        }

        body {
            background-color: var(--bg-black);
            background-image: radial-gradient(var(--pink-dim) 1px, transparent 1px);
            background-size: 25px 25px;
            color: var(--pixel-pink);
            font-family: 'Fira Code', monospace;
            overflow-x: hidden;
            line-height: 1.4;
        }

        /* Responsive Pixel Font */
        .pixel-font { 
            font-family: 'Press Start 2P', cursive; 
            word-break: break-word;
        }

        /* Scanline Effect */
        .crt-overlay {
            position: fixed; top: 0; left: 0; width: 100%; height: 100%;
            background: linear-gradient(rgba(18, 16, 16, 0) 50%, rgba(0, 0, 0, 0.1) 50%);
            z-index: 999; pointer-events: none; background-size: 100% 3px;
        }

        @keyframes flicker {
            0% { opacity: 0.98; } 5% { opacity: 0.96; } 10% { opacity: 0.9; } 
            15% { opacity: 0.99; } 100% { opacity: 1; }
        }
        .monitor-flicker { animation: flicker 0.15s infinite; }

        .pixel-border {
            border: 4px solid var(--pixel-pink);
            box-shadow: 0 0 15px var(--pink-dim), inset 0 0 10px var(--pink-dim);
            background: rgba(10, 0, 8, 0.95);
            position: relative;
        }

        .profile-frame {
            width: 100px; height: 100px;
            border: 4px solid var(--pixel-pink);
            padding: 4px;
            background: var(--bg-black);
            image-rendering: pixelated;
        }

        /* Glitch for Mobile */
        .glitch:hover { animation: glitch-anim 0.3s infinite; }
        @keyframes glitch-anim {
            0% { transform: translate(0); text-shadow: 2px 0 #fff; }
            50% { transform: translate(-1px, 1px); color: #fff; }
            100% { transform: translate(0); }
        }

        /* Custom Scrollbar */
        .scroll-custom::-webkit-scrollbar { width: 4px; }
        .scroll-custom::-webkit-scrollbar-thumb { background: var(--pixel-pink); }

    </style>
</head>
<body class="monitor-flicker p-3 md:p-8">
    <div class="crt-overlay"></div>

    <div class="max-w-7xl mx-auto">
        <!-- HEADER SECTION -->
        <header class="mb-6 flex flex-col md:flex-row items-center gap-4 md:gap-6 border-b-2 border-pink-900 pb-6 text-center md:text-left">
            <div class="profile-frame shadow-[0_0_20px_rgba(255,118,216,0.4)]">
                <img src="{{ asset('images/pfp.jpeg') }}" alt="Verly" class="w-full h-full object-cover bg-pink-950">
            </div>

            <div class="flex-1">
                <h1 class="pixel-font text-lg md:text-3xl glitch mb-2 uppercase text-white leading-tight">Verly Rahma Aulia</h1>
                <p class="text-[10px] md:text-sm text-pink-400 tracking-tighter">
                    SYSTEM_STATUS: <span class="text-white underline">[ ENCRYPTED ]</span> | 
                    NODE: <span class="text-yellow-400">[ JAKARTA ]</span>
                </p>
                <!-- Uptime khusus Mobile (muncul di bawah status) -->
                <p class="text-[9px] mt-2 md:hidden">UPTIME: <span id="uptime-mobile">0</span>s | OS: VRA</p>
            </div>
            
            <!-- Uptime Desktop -->
            <div class="text-right hidden md:block pl-6 border-l border-pink-900">
                <p class="text-[10px] text-pink-700">OS_VERSION: VRA</p>
                <p class="text-[10px]">UPTIME: <span id="uptime-desktop">0</span>s</p>
            </div>
        </header>

        <div class="grid grid-cols-1 lg:grid-cols-12 gap-6 lg:gap-8 items-start">
            
            <!-- SIDEBAR  -->
            <div class="lg:col-span-4 flex flex-col gap-6">
                
                <!-- 1. EDUCATION LOG -->
                <div class="pixel-border p-4">
                    <h2 class="pixel-font text-[9px] md:text-[10px] mb-3 bg-pink-900 p-1 text-white">EDUCATION.LOG</h2>
                    <div class="text-[11px] space-y-1">
                        <p class="text-pink-300 font-bold uppercase">Budi Luhur University</p>
                        <p class="text-gray-400 text-[10px] italic">Bachelor’s Degree of Computer Science, Cyber Security</p>
                        <p class="text-yellow-400 font-bold mt-2 underline">GPA: 3.94 / 4.00</p>
                    </div>
                </div>

                <!-- 2. TERMINAL -->
                <div class="pixel-border p-4 h-[320px] md:h-[380px] flex flex-col">
                    <div class="flex justify-between items-center mb-3 border-b border-pink-900 pb-2">
                        <span class="text-[9px] md:text-[10px] pixel-font text-pink-300">COMMAND_CENTER.SH</span>
                        <div class="w-2 h-2 bg-pink-400 animate-pulse"></div>
                    </div>
                    
                    <div id="terminal" class="flex-1 overflow-y-auto scroll-custom text-[11px] md:text-[12px] space-y-2 mb-3">
                        <p class="text-pink-300 font-bold underline">[!] INITIALIZING_SYSTEM...</p>
                        <p>> Hello, I'm Verly. A Computer Science student who loves turning ideas into digital solutions!</p>
                        <p>> Type <span class="text-white underline font-bold">'help'</span> for more info about me!!!</p>
                    </div>

                    <div class="flex items-center text-[11px] border-t border-pink-900 pt-3">
                        <span class="mr-1 text-pink-500 font-bold whitespace-nowrap text-[9px] md:text-xs">root@verlyra:~#</span>
                        <input type="text" id="cmd-input" autofocus 
                               class="bg-transparent border-none outline-none flex-1 text-white w-full"
                               autocomplete="off">
                    </div>
                </div>

                <!-- 3. GRAPHIC DESIGN ARCHIVE -->
                <div class="pixel-border p-4">
                    <h2 class="pixel-font text-[9px] md:text-[10px] mb-4 bg-pink-900 p-1 text-white text-center uppercase">Graphic_Archive.db</h2>
                    
                    <!-- Teks Pengantar -->
                    <div class="text-[10px] text-pink-200 mb-4 leading-relaxed italic border-l-2 border-pink-500 pl-2">
                    Rendering ideas into visual form — here are some of my commissioned works, made with creativity and love💖
                    </div>

                    <!-- Horizontal Scroll Card Container -->
                    <div class="flex overflow-x-auto gap-4 pb-4 scroll-custom snap-x snap-mandatory">
                        <!-- CARD 1 -->
                        <div class="min-w-[160px] md:min-w-[180px] snap-center">
                            <div class="border-2 border-pink-900 p-1 bg-black group">
                                <div class="relative overflow-hidden aspect-[3/4] bg-pink-950">
                                    <img src="{{ asset('images/digitalart.jpeg')}}" 
                                        alt="Commission 04" 
                                        class="w-full h-full object-cover opacity-80 group-hover:opacity-100 transition-opacity">
                                </div>
                                <p class="text-[8px] mt-2 text-center text-pink-400 font-bold uppercase tracking-tighter">Digital_art_01</p>
                            </div>
                        </div>
                        
                        
                        <!-- CARD 4 -->
                        <div class="min-w-[160px] md:min-w-[180px] snap-center">
                            <div class="border-2 border-pink-900 p-1 bg-black group">
                                <div class="relative overflow-hidden aspect-[3/4] bg-pink-950">
                                    <img src="{{ asset('images/gundam.png')}}" 
                                        alt="Commission 04" 
                                        class="w-full h-full object-cover opacity-80 group-hover:opacity-100 transition-opacity">
                                </div>
                                <p class="text-[8px] mt-2 text-center text-pink-400 font-bold uppercase tracking-tighter">Digital_art_02</p>
                            </div>
                        </div>
                        
                        <!-- CARD 1: Ganti URL dengan hasil commission kamu -->
                        <div class="min-w-[160px] md:min-w-[180px] snap-center">
                            <div class="border-2 border-pink-900 p-1 bg-black group">
                                <div class="relative overflow-hidden aspect-[3/4] bg-pink-950">
                                    <!-- Loading Placeholder Efek Pixel -->
                                    <img src="{{ asset('images/Integritas.png')}}" 
                                        alt="Commission 01" 
                                        class="w-full h-full object-cover opacity-80 group-hover:opacity-100 transition-opacity">
                                </div>
                                <p class="text-[8px] mt-2 text-center text-pink-400 font-bold uppercase tracking-tighter">Poster_v1</p>
                            </div>
                        </div>

                        <!-- CARD 2 -->
                        <div class="min-w-[160px] md:min-w-[180px] snap-center">
                            <div class="border-2 border-pink-900 p-1 bg-black group">
                                <div class="relative overflow-hidden aspect-[3/4] bg-pink-950">
                                    <img src="{{ asset('images/delp.jpg')}}" 
                                        alt="Commission 02" 
                                        class="w-full h-full object-cover opacity-80 group-hover:opacity-100 transition-opacity">
                                </div>
                                <p class="text-[8px] mt-2 text-center text-pink-400 font-bold uppercase tracking-tighter">Poster_v2</p>
                            </div>
                        </div>

                        <!-- CARD 3 -->
                        <div class="min-w-[160px] md:min-w-[180px] snap-center">
                            <div class="border-2 border-pink-900 p-1 bg-black group">
                                <div class="relative overflow-hidden aspect-[3/4] bg-pink-950">
                                    <img src="{{asset('images/ict.png')}}" 
                                        alt="Commission 03" 
                                        class="w-full h-full object-cover opacity-80 group-hover:opacity-100 transition-opacity">
                                </div>
                                <p class="text-[8px] mt-2 text-center text-pink-400 font-bold uppercase tracking-tighter">poster_v3</p>
                            </div>
                        </div>

                        

                    </div>

                    <!-- Navigasi Petunjuk (Hanya muncul di Desktop) -->
                    <div class="hidden md:block text-right mt-1">
                        <span class="text-[7px] text-pink-800 animate-pulse">SCROLL_HORIZONTAL_TO_VIEW >></span>
                    </div>
                </div>
            </div>

            <!-- MAIN CONTENT (Bawah di HP, Kanan di Desktop) -->
            <div class="lg:col-span-8">
                <!-- SYSTEM STATUS PANEL -->
                <div class="mt-8 pb-6 text-[12px]">

                    <!-- TITLE (DI LUAR BOX, DI ATAS) -->
                    <p class="text-[20px] pixel-font text-pink-300 mb-4">
                        [ SYSTEM_INFO ]
                    </p>

                    <!-- GRID 2 KOLOM -->
                    <div class="grid grid-cols-1 md:grid-cols-2 gap-6">

                        <!-- LEFT: BOX USER -->
                        <div class="border border-pink-900 p-5 bg-black">
                            <p class="mb-1">> USER: <span class="text-white">verlyr.a</span></p>
                            <p class="mb-1">> FOCUS: <span class="text-white">Web • Cyber • Data</span></p>
                            <p>> STATUS: <span class="text-green-400 animate-pulse">ACTIVE</span></p>
                        </div>

                        <!-- RIGHT: TAGS + QUOTE -->
                        <div class="flex flex-col justify-between gap-4">

                            <!-- TAGS -->
                            <div class="flex flex-wrap gap-2">
                                <span class="border border-pink-500 px-3 py-1 text-[11px]">Linux</span>
                                <span class="border border-pink-500 px-3 py-1 text-[11px]">Laravel</span>
                                <span class="border border-pink-500 px-3 py-1 text-[11px]">React</span>
                                <span class="border border-pink-500 px-3 py-1 text-[11px]">Python</span>
                                <span class="border border-pink-500 px-3 py-1 text-[11px]">Java</span>
                                <span class="border border-pink-500 px-3 py-1 text-[11px]">MySQL</span>
                                <span class="border border-pink-500 px-3 py-1 text-[11px]">Git</span>
                                <span class="border border-pink-500 px-3 py-1 text-[11px]">Figma</span>
                            </div>

                            <!-- QUOTE -->
                            <p class="text-pink-300 italic text-[11px] border-l-2 border-pink-700 pl-3 leading-relaxed">
                                > building systems with logic,<br>
                                > designing with heart 💖
                            </p>

                        </div>

                    </div>
                </div>

                <div class="pixel-border p-4 md:p-6 min-h-[500px] flex flex-col">
                    <div class="flex justify-between items-center mb-6 border-b-2 border-pink-900 pb-2">
                        <h2 class="pixel-font text-[10px] md:text-sm text-white">PROJECT_ARCHIVE_LOG</h2>
                        <span class="text-[8px] md:text-[9px] bg-pink-600 px-2 py-1 text-black font-bold">LVL_3</span>
                    </div>

                    <div class="flex-1 md:overflow-y-auto md:max-h-[800px] scroll-custom md:pr-4 space-y-10">
                        <!-- KEPRABON -->
                        <div class="relative">
                            <div class="flex flex-col gap-1 mb-2">
                                <h3 class="text-white font-bold text-sm md:text-base underline decoration-pink-500 italic">Financial Information System – Nasi Liwet Keprabon Bu Darmi</h3>
                                <span class="text-pink-500 text-[9px] font-bold uppercase">Nov 2025 - Feb 2026</span>
                                <a href="https://github.com/verlyra/KEPRABON" target="_blank"
                                class="text-[10px] text-green-400 hover:text-white font-mono">
                                > open_repo://keprabon</a>
                            </div>
                            <p class="text-yellow-400 text-[10px] mb-3 font-bold uppercase">[ Backend & Security Developer ]</p>
                            <ul class="text-[11px] md:text-[12px] space-y-2 text-pink-100 list-none pl-2 border-l border-pink-900">
                                <li><span class="text-pink-500">>></span> Developed secure REST API using <span class="text-white">HMAC-SHA256 authentication</span>.</li>
                                <li><span class="text-pink-500">>></span> Managed financial data using <span class="text-white">Laravel</span> (Sales, Income, Expenses).</li>
                                <li><span class="text-pink-500">>></span> Integrated with <span class="text-white">React + TypeScript</span>.</li>
                                <li><span class="text-pink-500">>></span> Managed <span class="text-white">MySQL</span> optimization & clean architecture.</li>
                            </ul>
                        </div>

                        <!-- ECOSMART -->
                        <div class="relative">
                            <div class="flex flex-col gap-1 mb-2">
                                <h3 class="text-white font-bold text-sm md:text-base underline decoration-pink-500 italic">EcoSmart Composter</h3>
                                <span class="text-pink-500 text-[9px] font-bold uppercase">July 2025 - Nov 2025</span>
                            </div>
                            <p class="text-yellow-400 text-[10px] mb-3 font-bold uppercase">[ Team Leader & System Developer ]</p>
                            <ul class="text-[11px] md:text-[12px] space-y-2 text-pink-100 list-none pl-2 border-l border-pink-900">
                                <li><span class="text-pink-500">>></span> Funded by <span class="text-white">Ministry of Education (PKM-KC 2025)</span>.</li>
                                <li><span class="text-pink-500">>></span> IoT Prototype with <span class="text-white">pH, ultrasonic, & conductivity sensors</span>.</li>
                                <li><span class="text-pink-500">>></span> Built web dashboard and Android app for monitoring.</li>
                                <li><span class="text-pink-500">>></span> Implemented device integration to reduce organic waste.</li>
                            </ul>
                        </div>

                        <!-- CTF -->
                        <div class="relative pb-4">
                            <div class="flex justify-between items-center mb-2">
                                <h3 class="text-white font-bold text-sm md:text-base italic">CTF - Recursion 2025</h3>
                                <span class="text-pink-500 text-[9px]">APR 2025</span>
                            </div>
                            <p class="text-[11px] text-pink-100 italic opacity-80">Participated in CTF competitions focusing on web exploitation, general skills, and reverse engineering.</p>
                        </div>
                    </div>

                    <!-- FOOTER -->
                    <div class="mt-8 pt-4 border-t border-pink-900 flex flex-col gap-4">
                        <div class="flex gap-2">
                            <a href="https://linkedin.com/in/verlyra" class="bg-pink-900 hover:bg-white hover:text-black px-3 py-2 text-[9px] flex-1 text-center transition-all text-white ">LINKEDIN</a>
                            <a href="https://github.com/verlyra" target="_blank" class="border border-pink-500 hover:bg-pink-500 hover:text-black px-3 py-2 text-[9px] flex-1 text-center transition-all text-white uppercase">Github</a>
                            <a href="/cv/CV Verly Rahma Aulia.pdf" download
                            class="bg-pink-500 hover:bg-white hover:text-black px-3 py-2 text-[9px] flex-1 text-center transition-all text-white uppercase ">DOWNLOAD_CV</a>
                        </div>
                        <span class="text-[8px] text-pink-800 tracking-widest text-center">[ ACCESS_GRANTED ] // © 2026 verlyr.a</span>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <script>
        const terminal = document.getElementById('terminal');
        const input = document.getElementById('cmd-input');
        const uptDesktop = document.getElementById('uptime-desktop');
        const uptMobile = document.getElementById('uptime-mobile');

        let seconds = 0;
        setInterval(() => { 
            seconds++;
            if(uptDesktop) uptDesktop.innerText = seconds;
            if(uptMobile) uptMobile.innerText = seconds;
        }, 1000);

        const initialContent = terminal.innerHTML;
        const database = {
            help: "Commands: <span class='text-white'>about, stack, clear</span>",
            about: "I love exploring web development, cybersecurity, and data analysis while creating designs that are both functional and beautiful💖",
            stack: "HTML/CSS • JavaScript • React • Laravel • Python • C • Java • MySQL • Git • Figma • Linux",
            clear: ""
        };

        input.addEventListener('keydown', (e) => {
            if (e.key === 'Enter') {
                const cmd = input.value.toLowerCase().trim();
                if (cmd === 'clear') { 
                    terminal.innerHTML = initialContent;
                }
                else if (cmd !== '') {
                    const response = database[cmd] || "Unauthorized Access. Command Unknown.";
                    terminal.innerHTML += `<div class="mt-2 text-pink-700">root@verlyra:~# ${cmd}</div>`;
                    terminal.innerHTML += `<div class="text-pink-100 ml-2">${response}</div>`;
                }
                input.value = '';
                terminal.scrollTop = terminal.scrollHeight;
            }
        });
        document.addEventListener('click', () => input.focus());
    </script>
</body>
</html>