import './bootstrap';

// Mendengarkan perubahan dari user lain lewat Reverb
window.Echo.join(`board.1`) // Ganti 1 dengan ID board dinamis
    .listen('CardMoved', (e) => {
        const cardElement = document.querySelector(`[data-card-id="${e.card.id}"]`);
        const targetList = document.getElementById(`list-${e.card.list_id}`);
        
        if (cardElement && targetList) {
            targetList.appendChild(cardElement);
            console.log('Kartu diperbarui secara real-time!');
        }
    });