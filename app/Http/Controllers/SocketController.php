<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Http;

class SocketController extends Controller
{
    private $nodeUrl = 'http://localhost:3000/api/admin/socket';
    public function index()
    {
        $data = [
            'title' => 'Socket Page',
            'description' => 'This is the socket page for real-time communication at ' . now()->toDateTimeString()
        ];
        $request = Http::post($this->nodeUrl, $data);
        return response()->json(['status' => 'Message sent successfully', 'data' => $data]);
    }
}
