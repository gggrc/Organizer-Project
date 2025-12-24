<x-app-layout>
    <div class="py-12">
        <div class="max-w-full mx-auto sm:px-6 lg:px-8">
            <div class="mb-6 flex justify-between items-center px-4">
                <h2 class="font-semibold text-2xl text-gray-800 leading-tight">Project Board</h2>
                <button class="bg-blue-600 text-white px-4 py-2 rounded-lg text-sm">+ Add List</button>
            </div>

            <div id="kanban-container" class="flex overflow-x-auto pb-4 gap-4 px-4 items-start" style="min-height: 80vh;">
                
                <div class="flex-shrink-0 w-80 bg-gray-200 rounded-xl p-3 shadow-sm">
                    <h3 class="font-bold text-gray-700 mb-3 px-2">To Do</h3>
                    
                    <div id="list-1" class="card-list space-y-3 min-h-[10px]">
                        <div draggable="true" class="card bg-white p-4 rounded-lg shadow cursor-grab active:cursor-grabbing border-b-2 border-gray-300">
                            <p class="text-sm font-medium text-gray-800">Selesaikan desain UI Dashboard</p>
                        </div>
                        <div draggable="true" class="card bg-white p-4 rounded-lg shadow cursor-grab border-b-2 border-gray-300">
                            <p class="text-sm font-medium text-gray-800">Integrasi Reverb WebSocket</p>
                        </div>
                    </div>

                    <button class="mt-4 text-gray-600 text-sm hover:text-black w-full text-left px-2">+ Add a card</button>
                </div>

                <div class="flex-shrink-0 w-80 bg-gray-200 rounded-xl p-3 shadow-sm">
                    <h3 class="font-bold text-gray-700 mb-3 px-2">In Progress</h3>
                    <div id="list-2" class="card-list space-y-3 min-h-[10px]"></div>
                </div>

            </div>
        </div>
    </div>

    <script>
        const cards = document.querySelectorAll('.card');
        const lists = document.querySelectorAll('.card-list');

        cards.forEach(card => {
            card.addEventListener('dragstart', () => card.classList.add('opacity-50'));
            card.addEventListener('dragend', () => card.classList.remove('opacity-50'));
        });

        lists.forEach(list => {
            list.addEventListener('dragover', e => {
                e.preventDefault();
                const draggingCard = document.querySelector('.opacity-50');
                list.appendChild(draggingCard);
            });

            list.addEventListener('drop', (e) => {
                console.log('Kartu dipindahkan ke list:', list.id);
            });
        });
    </script>
</x-app-layout>