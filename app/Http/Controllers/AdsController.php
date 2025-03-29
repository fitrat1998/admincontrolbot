<?php

namespace App\Http\Controllers;


use App\Http\Requests\StoreAdsRequest;
use App\Http\Requests\UpdateAdsRequest;
use App\Models\Ads;
use App\Models\BotAds;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class AdsController extends Controller
{
    public function index()
    {
        $ads = Ads::latest()->get();
        return view('admin.ads.index', compact('ads'));
    }

    public function create()
    {
        return view('admin.ads.add');
    }

    public function store(Request $request)
    {
        $request->validate([
            'title' => 'required|string|max:255',
            'description' => 'nullable|string',
            'file' => 'required|file|mimes:jpg,jpeg,png,gif,mp4,mov,avi|max:51200',
        ]);

        if ($request->hasFile('file')) {
            $filePath = $request->file('file')->store('ads', 'public');
        }

        Ads::create([
            'title' => $request->title,
            'description' => $request->description,
            'file_path' => $filePath,
            'status' => $request->status,
            'duration' => $request->duration,
        ]);

        return redirect()->route('ads.index')->with('success', 'Реклама бомуваффақият илова карда шуд!');
    }

    public function edit($id)
    {
        $ad = Ads::find($id);

        return view('admin.ads.edit', compact('ad'));
    }

    public function update(Request $request, $id)
    {

        $request->validate([
            'title' => 'required|string|max:255',
            'description' => 'nullable|string',
            'file' => 'nullable|file|mimes:jpg,jpeg,png,gif,mp4,mov,avi|max:2048', // Adjust file types and size as needed
        ]);


        $ad = Ads::findOrFail($id);


        $ad->title = $request->input('title');
        $ad->description = $request->input('description');
        $ad->status = $request->input('status');
        $ad->duration = $request->input('duration');


        if ($request->hasFile('file')) {
            if ($ad->file && Storage::exists($ad->file)) {
                Storage::delete($ad->file_path);
            }

            $filePath = $request->file('file')->store('ads', 'public');
            $ad->file_path = $filePath;
        }

        // Save the updated advertisement
        $ad->save();

        // Redirect back with a success message
        return redirect()->route('ads.index')->with('success', 'Реклам муваффақиятли таҳрирланди!');
    }

    public function show(Ads $ad)
    {
        return view('ads.show', compact('ad'));
    }

    public function showAds(Request $request)
    {
        $ads = Ads::where('is_seen', false)->take(2)->get();

        // Reklamalarni ko‘rilgan deb belgilash
        Ads::whereIn('id', $ads->pluck('id'))->update(['is_seen' => true]);

        return view('ads.index', compact('ads'));
    }

    public function destroy(Ads $ad)
    {
        Storage::disk('public')->delete($ad->file_path);
        $ad->delete();

        return redirect()->route('ads.index')->with('success', 'Ad deleted successfully.');
    }
}
