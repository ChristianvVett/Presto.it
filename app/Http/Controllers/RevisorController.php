<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Mail\BecomeRevisor;
use App\Models\Announcement;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Facades\Artisan;

class RevisorController extends Controller
{
    public function index()
    {
        $announcement_to_check = Announcement::where('is_accepted', null)->first();
        $announcement_to_reCheck = Announcement::where('is_accepted','!=',null)->get()->sortByDesc('updated_at')->first();
        $announcement_story = Announcement::where('is_accepted', '!=',null)->orderByDesc('updated_at')->paginate(5);
        // dd($announcement_story);
        
        return view('revisor.index', compact('announcement_to_check', 'announcement_to_reCheck','announcement_story'));
    }

    // accetta annuncio
    public function acceptAnnouncement(Announcement $announcement)
    {
        $announcement->setAccepted(true);
        return redirect()->back()->with('message', __('ui.complim_accettato'));
    }

    // rifiuta annuncio
    public function rejectAnnouncement(Announcement $announcement)
    {
        $announcement->setAccepted(false);
        return redirect()->back()->with('message', __('ui.complim_rifiutato'));
    }

    // annulla revisione annuncio
    public function undoAnnouncement(Announcement $announcement)
    {
        $announcement->setAccepted(null);
        return redirect()->back()->with('message', __('ui.annullaa'));
    }

    // richiesta diventare revisore
    public function becomeRevisor()
    {
        Mail::to('admin@presto.it')->send(new BecomeRevisor(Auth::user()));
        return redirect()->back()->with('message', __('ui.La_richiesta'));
    }

    // accettazione della richiesta revisore
    public function makeRevisor(User $user){
        Artisan::call('presto:makeUserRevisor', ['email'=>$user->email]);
        return redirect('/')->with('message', __('ui.autorizz_revis'));
    }
}