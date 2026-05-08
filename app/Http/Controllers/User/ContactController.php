<?php

namespace App\Http\Controllers\User;

use App\Http\Controllers\Controller;
use App\Models\Message;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class ContactController extends Controller
{
    public function index()
    {
        return view('user.contact');
    }

    public function store(Request $request)
    {
        $request->validate([
            'subject' => 'required|string|max:200',
            'body' => 'required|string',
        ], [
            'subject.required' => 'Subjek wajib diisi.',
            'body.required' => 'Pesan wajib diisi.',
        ]);
        Message::create([
            'user_id' => Auth::id(),
            'subject' => $request->subject,
            'body' => $request->body,
        ]);

        return back()->with('success', 'Pesan berhasil dikirim ke admin!');
    }
}
