<?php

namespace App\Http\Controllers;

use Telegram\Bot\Laravel\Facades\Telegram;
use App\Models\Movie;
use Illuminate\Http\Request;

class TelegramBotController extends Controller
{

    public function handleWebhook(Request $request)
    {
        $update = Telegram::commandsHandler(true);

        \Log::info($update);

        return response()->json(['message' => 'Webhook received']);
    }


    public function getUpdates()
    {
        try {
            $updates = Telegram::getUpdates();

            if (empty($updates)) {
                return response()->json(['message' => 'No updates found']);
            }

            session(['telegram_message' => json_encode($updates)]);

            $movies = Movie::orderBy('created_at', 'desc')->get();

            return view('admin.movies.index', compact('movies'));

        } catch (\Exception $e) {
            return response()->json(['error' => $e->getMessage()]);
        }
    }

}
