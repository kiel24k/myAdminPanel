<?php

namespace App\Http\Controllers;

use App\Events\messageEvent;
use App\Events\PrivateEvent;
use App\Events\testingEvent;
use App\Models\Chat;
use App\Models\Item;
use App\Models\message;
use App\Models\Sorting;
use App\Models\StudentProfile;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use Illuminate\Validation\ValidationException;

class AdminController extends Controller
{
    public function adminItems()
    {
        return response()->json(Item::orderBy('id', 'asc')->get());
    }
    public function login(Request $request)
    {
        $request->validate([
            'email' => 'required',
            'password' => 'required',
        ]);

        $user = User::where('email', $request->email)->first();

        if (!$user || !Hash::check($request->password, $user->password)) {
            throw ValidationException::withMessages([
                'email' => ['The provided credentials are incorrect.'],
            ]);
        }
        return $user->createToken($request->email)->plainTextToken;
    }

    public function chat(Request $request)
    {
        $message = new message();
        $message->room_with = $request->room_with;
        $message->sender_id = $request->sender_id;
        $message->receiver_id = $request->receiver_id;
        $message->message = $request->message;
        $message->save();

        broadcast(new messageEvent($message));
        return $message;
    }

    public function listMessage()
    {
        return response()->json(message::orderBy('id', 'DESC')->get());
    }
    public function signup(Request $request)
    {
        $user = User::create([
            'name' => $request->name,
            'email' => $request->email,
            'password' => Hash::make($request->password)
        ]);
        return response()->json($user);
    }

    public function allUsers()
    {
        $users = User::get();
        return response()->json($users);
    }

    public function getUserMessage($senderID, $receiverID)
    {
        $chat = Chat::where(function ($query) use ($senderID, $receiverID) {
            $query->where('message_from_id', $senderID)
                ->where('message_receiver_id', $receiverID);
        })->orWhere(function ($query) use ($senderID, $receiverID) {
            $query->where('message_from_id', $receiverID)
                ->where('message_receiver_id', $senderID);
        })->get();

        return response()->json($chat);
    }

    public function userMessage(Request $request)
    {
        $chat = new Chat();
        $chat->message_from_id = $request->message_from_id;
        $chat->message_receiver_id = $request->message_receiver_id;
        $chat->messages = $request->messages;
        $chat->save();
        return response()->json($chat);
    }

    public function tableSort(Request $request)
    {
        $sortBy = $request->query('sort_by', 'name'); // Default sorting field
        $sortOrder = $request->query('sort_order', 'asc'); // Default sorting order
        // Apply sorting
        $data = Sorting::orderBy($sortBy, $sortOrder)->paginate(2);
        return response()->json($data);
    }


    public function testChat($text, $id)
    {
        event(new PrivateEvent($text, $id));
        return "true";
    }




    public function axiosTest(Request $req)
    {
        
        foreach ($req->country as $country) {
            # code...
           $item = StudentProfile::create([
                'student_id' => $req->student_id,
                'country' => $country
            ]);
        }
        return response()->json($item);

    }
}