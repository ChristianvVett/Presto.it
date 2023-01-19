<?php

namespace App\Http\Controllers;

use App\Models\Announcement;
use Illuminate\Http\Request;

class PublicController extends Controller
{
    public function __construct()
    {
        $this->middleware('verified');
    }
    
    public function createAnnouncement(){
        return view('announcements.create');
    }
}
