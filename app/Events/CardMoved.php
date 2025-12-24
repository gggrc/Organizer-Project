namespace App\Events;

use App\Models\Card;
use Illuminate\Broadcasting\PresenceChannel;
use Illuminate\Contracts\Broadcasting\ShouldBroadcast;
use Illuminate\Foundation\Events\Dispatchable;
use Illuminate\Queue\SerializesModels;

class CardMoved implements ShouldBroadcast
{
    use Dispatchable, SerializesModels;

    public $card;

    public function __construct(Card $card) {
        $this->card = $card;
    }

    public function broadcastOn(): array {
        return [new PresenceChannel('board.' . $this->card->list->board_id)];
    }
}