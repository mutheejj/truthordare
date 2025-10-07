<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <meta name="csrf-token" content="{{ csrf_token() }}">
        <title>Truth or Dare - Black & White Edition</title>
        
        <!-- Fonts -->
        <link rel="preconnect" href="https://fonts.bunny.net">
        <link href="https://fonts.bunny.net/css?family=space-grotesk:400,500,600,700" rel="stylesheet" />
        
        @vite(['resources/css/app.css', 'resources/js/app.js'])
        
        <style>
            body {
                font-family: 'Space Grotesk', ui-sans-serif, system-ui, sans-serif;
            }
            
            .fade-in {
                animation: fadeIn 0.5s ease-in;
            }
            
            .slide-up {
                animation: slideUp 0.5s ease-out;
            }
            
            @keyframes fadeIn {
                from { opacity: 0; }
                to { opacity: 1; }
            }
            
            @keyframes slideUp {
                from {
                    opacity: 0;
                    transform: translateY(20px);
                }
                to {
                    opacity: 1;
                    transform: translateY(0);
                }
            }
            
            .btn-hover {
                transition: all 0.3s ease;
            }
            
            .btn-hover:hover {
                transform: translateY(-2px);
                box-shadow: 0 10px 25px -5px rgba(0, 0, 0, 0.3);
            }
            
            .card-pattern {
                background-image: 
                    repeating-linear-gradient(45deg, transparent, transparent 10px, rgba(255,255,255,.03) 10px, rgba(255,255,255,.03) 20px);
            }
        </style>
    </head>
    <body class="bg-white text-black min-h-screen flex items-center justify-center p-4 md:p-8">
        <div class="w-full max-w-2xl">
            <!-- Welcome Screen -->
            <div id="welcomeScreen" class="text-center fade-in">
                <div class="mb-8">
                    <h1 class="text-6xl md:text-8xl font-bold mb-4 tracking-tight">
                        <span class="inline-block">T</span><span class="inline-block">R</span><span class="inline-block">U</span><span class="inline-block">T</span><span class="inline-block">H</span>
                    </h1>
                    <div class="flex items-center justify-center gap-4 mb-4">
                        <div class="h-px bg-black w-20"></div>
                        <span class="text-2xl md:text-3xl font-medium">or</span>
                        <div class="h-px bg-black w-20"></div>
                    </div>
                    <h1 class="text-6xl md:text-8xl font-bold tracking-tight">
                        <span class="inline-block">D</span><span class="inline-block">A</span><span class="inline-block">R</span><span class="inline-block">E</span>
                    </h1>
                </div>
                
                <p class="text-lg md:text-xl mb-12 text-gray-700 max-w-md mx-auto">
                    A classic game of honesty and courage. Are you ready to play?
                </p>
                
                <button onclick="showPlayerSetup()" class="btn-hover bg-black text-white px-12 py-4 text-xl font-semibold border-4 border-black hover:bg-white hover:text-black transition-all duration-300">
                    START GAME
                </button>
                
                <div class="mt-8">
                    <a href="{{ route('admin.index') }}" class="text-sm text-gray-500 hover:text-black transition">Admin Panel →</a>
                </div>
            </div>
            
            <!-- Player Setup Screen -->
            <div id="playerSetupScreen" class="hidden fade-in">
                <div class="mb-8 text-center">
                    <h2 class="text-4xl md:text-5xl font-bold mb-4">Add Players</h2>
                    <p class="text-gray-600">Enter the names of all players (minimum 2)</p>
                </div>
                
                <div class="bg-white border-4 border-black p-8">
                    <div id="playerInputs" class="space-y-4 mb-6">
                        <div class="flex gap-2">
                            <input type="text" class="flex-1 border-2 border-black px-4 py-3 text-lg focus:outline-none focus:ring-2 focus:ring-black" placeholder="Player 1 Name" data-player-index="0">
                            <button onclick="removePlayer(0)" class="hidden border-2 border-red-600 bg-red-600 text-white px-4 hover:bg-red-700">×</button>
                        </div>
                        <div class="flex gap-2">
                            <input type="text" class="flex-1 border-2 border-black px-4 py-3 text-lg focus:outline-none focus:ring-2 focus:ring-black" placeholder="Player 2 Name" data-player-index="1">
                            <button onclick="removePlayer(1)" class="hidden border-2 border-red-600 bg-red-600 text-white px-4 hover:bg-red-700">×</button>
                        </div>
                    </div>
                    
                    <button onclick="addPlayerInput()" class="w-full border-2 border-black px-6 py-3 text-lg font-semibold hover:bg-gray-100 transition mb-6">
                        + Add Another Player
                    </button>
                    
                    <div class="flex gap-3">
                        <button onclick="startGameWithPlayers()" class="flex-1 bg-black text-white px-6 py-3 text-lg font-semibold hover:bg-gray-900 transition">
                            START PLAYING
                        </button>
                        <button onclick="backToWelcome()" class="border-2 border-black px-6 py-3 text-lg font-semibold hover:bg-gray-100 transition">
                            ← BACK
                        </button>
                    </div>
                </div>
            </div>
            
            <!-- Game Screen -->
            <div id="gameScreen" class="hidden">
                <!-- Header -->
                <div class="flex items-center justify-between mb-6 slide-up">
                    <button onclick="goHome()" class="text-sm font-medium border-2 border-black px-4 py-2 hover:bg-black hover:text-white transition-all duration-300">
                        ← HOME
                    </button>
                    <div class="text-center">
                        <div class="text-xs text-gray-500 mb-1">Current Player</div>
                        <div class="text-lg font-bold" id="currentPlayerName"></div>
                    </div>
                    <div class="text-sm font-medium border-2 border-black px-4 py-2">
                        Round <span id="roundCounter">1</span>
                    </div>
                </div>
                
                <!-- Players List -->
                <div id="playersList" class="mb-6 flex flex-wrap gap-2 justify-center"></div>
                
                <!-- Choice Buttons -->
                <div id="choiceButtons" class="grid grid-cols-2 gap-4 mb-8 slide-up">
                    <button onclick="selectOption('truth')" class="btn-hover bg-white border-4 border-black px-8 py-16 text-3xl md:text-4xl font-bold hover:bg-black hover:text-white transition-all duration-300">
                        TRUTH
                    </button>
                    <button onclick="selectOption('dare')" class="btn-hover bg-black text-white border-4 border-black px-8 py-16 text-3xl md:text-4xl font-bold hover:bg-white hover:text-black transition-all duration-300">
                        DARE
                    </button>
                </div>
                
                <!-- Prompt Display -->
                <div id="promptDisplay" class="hidden slide-up">
                    <div class="border-4 border-black p-8 md:p-12 mb-6 card-pattern relative">
                        <div class="absolute top-4 left-4 text-xs font-bold tracking-wider opacity-50" id="promptType"></div>
                        <p class="text-2xl md:text-3xl font-semibold leading-relaxed text-center min-h-[100px] flex items-center justify-center" id="promptText"></p>
                    </div>
                    
                    <div class="grid grid-cols-2 gap-4">
                        <button onclick="skipPrompt()" class="border-2 border-black px-6 py-4 text-lg font-semibold hover:bg-gray-100 transition-all duration-300">
                            SKIP
                        </button>
                        <button onclick="nextRound()" class="bg-black text-white border-2 border-black px-6 py-4 text-lg font-semibold hover:bg-gray-900 transition-all duration-300">
                            NEXT →
                        </button>
                    </div>
                </div>
            </div>
            
            <!-- Footer -->
            <div class="text-center mt-12 text-sm text-gray-500">
                <p>Black & White Edition • Play Responsibly</p>
            </div>
        </div>
        
        <script>
            let round = 1;
            let currentPrompt = null;
            let players = [];
            let currentPlayerIndex = 0;
            let playerCount = 2;
            
            function showPlayerSetup() {
                document.getElementById('welcomeScreen').classList.add('hidden');
                document.getElementById('playerSetupScreen').classList.remove('hidden');
            }
            
            function backToWelcome() {
                document.getElementById('playerSetupScreen').classList.add('hidden');
                document.getElementById('welcomeScreen').classList.remove('hidden');
            }
            
            function addPlayerInput() {
                const container = document.getElementById('playerInputs');
                const newIndex = playerCount;
                const div = document.createElement('div');
                div.className = 'flex gap-2';
                div.innerHTML = `
                    <input type="text" class="flex-1 border-2 border-black px-4 py-3 text-lg focus:outline-none focus:ring-2 focus:ring-black" placeholder="Player ${newIndex + 1} Name" data-player-index="${newIndex}">
                    <button onclick="removePlayer(${newIndex})" class="border-2 border-red-600 bg-red-600 text-white px-4 hover:bg-red-700">×</button>
                `;
                container.appendChild(div);
                playerCount++;
            }
            
            function removePlayer(index) {
                const inputs = document.querySelectorAll('#playerInputs > div');
                if (inputs.length > 2) {
                    const input = document.querySelector(`[data-player-index="${index}"]`).parentElement;
                    input.remove();
                }
            }
            
            function startGameWithPlayers() {
                const inputs = document.querySelectorAll('#playerInputs input');
                players = [];
                
                inputs.forEach(input => {
                    const name = input.value.trim();
                    if (name) {
                        players.push(name);
                    }
                });
                
                if (players.length < 2) {
                    alert('Please add at least 2 players!');
                    return;
                }
                
                currentPlayerIndex = 0;
                round = 1;
                
                document.getElementById('playerSetupScreen').classList.add('hidden');
                document.getElementById('gameScreen').classList.remove('hidden');
                
                updatePlayersList();
                updateCurrentPlayer();
                updateRound();
            }
            
            function updatePlayersList() {
                const container = document.getElementById('playersList');
                container.innerHTML = players.map((player, index) => `
                    <div class="px-3 py-1 text-sm font-medium ${index === currentPlayerIndex ? 'bg-black text-white' : 'border border-black'}" id="player-${index}">
                        ${player}
                    </div>
                `).join('');
            }
            
            function updateCurrentPlayer() {
                document.getElementById('currentPlayerName').textContent = players[currentPlayerIndex];
                updatePlayersList();
            }
            
            function goHome() {
                document.getElementById('gameScreen').classList.add('hidden');
                document.getElementById('welcomeScreen').classList.remove('hidden');
                document.getElementById('choiceButtons').classList.remove('hidden');
                document.getElementById('promptDisplay').classList.add('hidden');
                players = [];
                currentPlayerIndex = 0;
                round = 1;
            }
            
            async function selectOption(type) {
                try {
                    const response = await fetch(`/api/${type}`);
                    const data = await response.json();
                    
                    if (data.error) {
                        alert(data.error);
                        return;
                    }
                    
                    currentPrompt = data.text;
                    
                    document.getElementById('promptType').textContent = type.toUpperCase();
                    document.getElementById('promptText').textContent = currentPrompt;
                    
                    document.getElementById('choiceButtons').classList.add('hidden');
                    document.getElementById('promptDisplay').classList.remove('hidden');
                } catch (error) {
                    alert('Error loading prompt. Please make sure you have added questions in the admin panel.');
                }
            }
            
            function skipPrompt() {
                const currentType = document.getElementById('promptType').textContent.toLowerCase();
                selectOption(currentType);
            }
            
            function nextRound() {
                currentPlayerIndex = (currentPlayerIndex + 1) % players.length;
                
                if (currentPlayerIndex === 0) {
                    round++;
                    updateRound();
                }
                
                updateCurrentPlayer();
                document.getElementById('choiceButtons').classList.remove('hidden');
                document.getElementById('promptDisplay').classList.add('hidden');
            }
            
            function updateRound() {
                document.getElementById('roundCounter').textContent = round;
            }
        </script>
    </body>
</html>
