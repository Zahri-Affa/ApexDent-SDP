<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Announcement;
class AnnouncementController extends Controller
{
    public function index()
{
    $announcements = Announcement::where('is_active', true)->latest()->get();
    return view('announcements.index', compact('announcements'));
}

public function create()
{
    return view('announcements.create');
}

public function store(Request $request)
{
    $announcement = new Announcement();
$announcement->title = $request->title;
$announcement->content = $request->content;
$announcement->is_active = $request->has('is_active'); //  Handles checkbox
$announcement->save();

}

public function edit(Announcement $announcement)
{
    return view('announcements.edit', compact('announcement'));
}

public function update(Request $request, Announcement $announcement)
{
    $announcement->title = $request->title;
$announcement->content = $request->content;
$announcement->is_active = $request->has('is_active'); //  Handles checkbox
$announcement->save();

}

public function destroy(Announcement $announcement)
{
    $announcement->delete();

    return redirect()->route('announcements.index')->with('success', 'Announcement deleted successfully.');
}
}
