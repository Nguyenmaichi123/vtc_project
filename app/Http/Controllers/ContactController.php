<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;
use App\Mail\ContactMail;
use App\Models\Contact;

class ContactController extends Controller
{
    public function store(Request $request)
    {
        // Validate dữ liệu đầu vào
        $request->validate([
            'name' => 'required|string|max:255',
            'email' => 'required|email|max:255',
            'phone' => 'required|string|max:20',
            'message' => 'required|string',
        ]);

        // Lưu vào database
        $contact =  Contact::create($request->all());


        Mail::to($contact->email)->send(new ContactMail($contact));

        // Quay lại trang trước với thông báo thành công
        return redirect()->back()->with('success', 'Gửi lời nhắn thành công!');
    }
}
