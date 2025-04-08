<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use GuzzleHttp\Client;

class ChatController extends Controller
{
    public function chat(Request $request)
    {
        $userMessage = $request->input('message');
        
        // Tạo client Guzzle để gọi API của OpenAI (hoặc dịch vụ AI khác)
        $client = new Client();
        $response = $client->post('https://api.openai.com/v1/completions', [
            'headers' => [
                'Authorization' => 'Bearer ' . env('OPENAI_API_KEY')
            ],
            'json' => [
                'model' => 'gpt-3.5-turbo', // Hoặc model tương ứng
                'messages' => [
                    ['role' => 'user', 'content' => $userMessage]
                ]
            ]
        ]);

        $body = json_decode($response->getBody(), true);
        $aiReply = $body['choices'][0]['message']['content'];
        
        // Trả về phản hồi từ AI
        return response()->json(['reply' => $aiReply]);
    }
}

