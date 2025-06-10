<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use Kreait\Firebase\Factory;
use Kreait\Firebase\Database;

class ChatController extends Controller
{
    protected $database;
    
    public function __construct()
    { 
        $factory = (new Factory)
            ->withServiceAccount(storage_path('app/firebase/firebase_credentials.json'))
            ->withDatabaseUri(env('FIREBASE_DB_URL'));

        $this->database = $factory->createDatabase();
 
    }

    // send message to Firebase
    public function sendMessage(Request $request)
    {
        $request->validate([
            'chat_id' => 'required|string',
            'message' => 'required|string',
        ]);

        $chatId = $request->chat_id;
        $message = [
            'sender_id' => auth()->id(),
            'message' => $request->message,
            'timestamp' => now()->timestamp,
        ];

        $this->database
            ->getReference('chats/' . $chatId)
            ->push($message);

        return response()->json(['status' => 'sent']);
    }

    // Get all messages from Firebase
    public function getMessages($chatId)
    {
        $messages = $this->database
            ->getReference('chats/' . $chatId)
            ->getValue();

        return response()->json([
            'messages' => $messages ?? [],
        ]);
    }
    
    // chat index
    public function index(Request $request)
    {
        $companion_id = $request->query('companion_id');
        $associate_id = $request->query('associate_id');
        $source = $request->query('source');
        
        $user = auth()->user();
        
    
        // Case 1: From booking page - direct chat open
        if ($companion_id && $associate_id) {
           
            $chatId = $this->generateChatId($companion_id, $associate_id); // 127_135
            
            if($user->user_type == 2) {
                $receiver = User::findOrFail($associate_id);
            }else{
                $receiver = User::findOrFail($companion_id);
            }
            
            return view('chat.chat', compact('chatId', 'receiver','source'));
        }
        
        // Case 2: User clicked on the Messages tab to load all conversations.
        $chatId   = null;
        $receiver = null;
        $source = null;
        
        return view('chat.chat', compact('chatId', 'receiver','source'));
    }

    private function generateChatId($senderId, $receiverId)
    {
        
        return $receiverId . '_' . $senderId;
    }
    
    // blocked users
    public function blockedUsers(Request $request)
    {
        return view('chat.blocked_user');
    }
    
    public function fetchChatList(Request $request)
    {
        $user_id = auth()->id();
        $chatList = $this->getUserChatList($user_id);
        
        return $chatList; die;
    
        return response()->json($chatList);
    }
    
    // get user chat List
    private function getUserChatList($userId)
    {
        $firebase = (new Factory)
            ->withServiceAccount(storage_path('app/firebase/firebase_credentials.json'))
            ->withDatabaseUri(env('FIREBASE_DB_URL'))
            ->createDatabase();
    
        // Reference the chats directory where messages are stored
        $ref = $firebase->getReference("chats"); 
        $snapshot = $ref->getValue(); 
    
        $chatList = [];
    
        if ($snapshot) {
            foreach ($snapshot as $chatId => $messages) {
                $participants = explode('_', $chatId);
                
                if (in_array($userId, $participants)) {
                    // Determine the chat partner's ID
                    $partnerId = ($participants[0] == $userId) ? $participants[1] : $participants[0];
                    $partner = User::find($partnerId);
    
                    if ($partner) {
                        // Get the latest message from this conversation
                        $lastMessage = end($messages);
    
                        $chatList[] = [
                            'id' => $partnerId,
                            'name' => $partner->name,
                            'profile_picture' => $partner->profile_picture ?? 'default.png',
                            'last_message' => $lastMessage['message'] ?? '',
                            'timestamp' => $lastMessage['timestamp'] ?? '',
                        ];
                    }
                }
            }
        }
    
        return $chatList;
    }
}
