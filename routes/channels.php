Broadcast::channel('board.{boardId}', function ($user, $boardId) {
    return \App\Models\Board::where('id', $boardId)
                           ->where('user_id', $user->id)
                           ->exists();
});