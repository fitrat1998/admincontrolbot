<?php

namespace App\Http\Controllers;

use App\Models\Statistics;
use App\Http\Requests\StoreStatisticsRequest;
use App\Http\Requests\UpdateStatisticsRequest;
use Illuminate\Support\Facades\Http;

class StatisticsController extends Controller
{


    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $token = env('TELEGRAM_BOT_TOKEN');
        $chatId = '@squidgameoficial_bot';

        try {
            // Foydalanuvchilar soni
            $userCountResponse = Http::get("https://api.telegram.org/bot{$token}/getChatMemberCount", [
                'chat_id' => $chatId,
            ]);
            $totalUsers = $userCountResponse->json()['result'] ?? 0;

            // Xabarlar va yangi qo'shilgan foydalanuvchilarni aniqlash
            $messageResponse = Http::get("https://api.telegram.org/bot{$token}/getUpdates");
            $messages = $messageResponse->json()['result'] ?? [];

            // Yangi qo'shilgan foydalanuvchilarni aniqlash
            $newUsers = collect($messages)
                ->where('message.new_chat_members', '!=', null)
                ->pluck('message.new_chat_members')
                ->flatten()
                ->count();

            // Bazadagi statistikani yangilash yoki yaratish
            $stats = Statistics::firstOrCreate([]);
            $stats->update([
                'total_users' => $totalUsers,
                'messages_sent' => count($messages),
                'new_users' => $newUsers + $stats->new_users,
            ]);

            return view('admin.statistics.index', compact('stats'));

        } catch (\Exception $e) {
            return back()->with('error', "Xatolik yuz berdi: " . $e->getMessage());
        }
    }


    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(StoreStatisticsRequest $request)
    {
        //
    }

    /**
     * Display the specified resource.
     */
    public function show(Statistics $statistics)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Statistics $statistics)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdateStatisticsRequest $request, Statistics $statistics)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Statistics $statistics)
    {
        //
    }
}
