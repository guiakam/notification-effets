<?php

namespace App\Http\Controllers;

use App\Models\Notification;
use Illuminate\Http\Request;

class NotificationController extends Controller
{
    public function index()
    {
        return Notification::all();
    }

    public function create()
    {
        return view('notifications.create');
    }

    public function store(Request $request)
    {
        return Notification::create($request->all());
    }

    public function show(Notification $notification)
    {
        return $notification;
    }

    public function edit(Notification $notification)
    {
        return view('notifications.edit', compact('notification'));
    }

    public function update(Request $request, Notification $notification)
    {
        $notification->update($request->all());
        return $notification;
    }

    public function destroy(Notification $notification)
    {
        $notification->delete();
        return response()->noContent();
    }
}
