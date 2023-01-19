<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Models\Announcement;
use App\Models\Category;
use Illuminate\Support\Facades\Auth;
use Livewire\WithFileUploads;

class UserPageController extends Controller
{
    use WithFileUploads;
    public $category;

    public function index(){
    
      $user_id = Auth::user()->id;
      // dd($user_id);
      $user_announcements_reject = Announcement::where('user_id' , $user_id )->where('is_accepted', false)->orderByDesc('updated_at')->get();

      //  dd($user_announcements);

      return view('userPage.index', compact('user_announcements_reject'));
   }

   public function destroy(Announcement $user_announcement)
   {
    // dd($user_announcement);
    
       $user_announcement->delete();

       return redirect(route('userPage.index'))->with('message_edit', __('ui.hai_eliminato'));
   }

}
