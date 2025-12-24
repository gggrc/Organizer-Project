public function move(Request $request, Card $card) {
    $card->update(['list_id' => $request->list_id, 'position' => $request->position]);

    broadcast(new \App\Events\CardMoved($card))->toOthers();

    return response()->json(['success' => true]);
}