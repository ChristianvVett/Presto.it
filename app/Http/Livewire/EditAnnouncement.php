<?php

namespace App\Http\Livewire;

use App\Models\Image;
use Livewire\Component;
use App\Models\Category;
use App\Jobs\RemoveFaces;
use App\Jobs\ResizeImage;
use App\Models\Announcement;
use Livewire\WithFileUploads;
use App\Jobs\GoogleVisionLabelImage;
use App\Jobs\GoogleVisionSafeSearch;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\File;

class EditAnnouncement extends Component
{
    use WithFileUploads;
    public $title;
    public $description;
    public $price;
    public $category;
    public $message;
    public $validated;
    public $temporary_images;
    public $images =[];
    public $form_id;
    public $announcement;
    public $announcementId;

    protected $rules = [
        'title'=>'required',
        'description'=>'required|min:15',
        'price'=>'required|numeric',
        // aggiunta delle categorie degli annunci
        'category'=>'required',
        'images.*'=>'image|max:1024',
        'temporary_images.*' =>'image|max:1024',
        // 'temporary_images'=>'required',
    ];
    
    
    public function updatedTemporaryImages(){
        
        if($this->validate ([
            'temporary_images.*'=> 'image|max:1024',
            // 'temporary_images'=>'required',
        ]))
         {
            foreach($this->temporary_images as $image)
            {
                $this->images[]= $image;
            }
            }
    }

    // funzione per eliminare un immagine scelta con il caricamento
    public function removeImage($key){
        if(in_array($key, array_keys($this->images))){
            unset($this->images[$key]);
        }
   }
    // funzione per ripopolare i campi dell'annuncio 
    public function mount($announcementId){
        $announcement = Announcement::find($announcementId);
        
        
        // dd($this->announcementImage);
        $this->title = $announcement->title;
        $this->price = $announcement->price;
        $this->description = $announcement->description;
        $this->category = $announcement->category_id;  
    }

    public function editAnnouncement(){
    
        //controllo della validazione
        $this->validate();

        $announcement =Announcement::where('id',$this->announcementId)->first();
        $announcement->title = $this->title;
        $announcement->price = $this->price;
        $announcement->description = $this->description;
        // $announcement->category_id = Category::find($this->category)->announcements()->create($this->validate());
        // dd($this->category);
        $announcement->category_id = $this->category;
        $announcement->setAccepted(null);
        
        
        // modifica delle immagini inserite
        if(count($this->images)){
            foreach($this->images as $image){
                // $this-> announcement-> images()->create(['path'=>$image->store('images', 'public')]);
               
                $newFileName = "announcements/{$this->announcementId}";
                // dd($announcement);
                $newImage = $announcement->images()->create(['path'=>$image->store($newFileName, 
                 'public')]);
                

                 RemoveFaces::withChain([
                    new ResizeImage($newImage->path, 300, 300),
                    new GoogleVisionSafeSearch($newImage->id),
                 new GoogleVisionLabelImage($newImage->id),
                 ])->dispatch($newImage->id);
        }
        //pulizia della directori temporanea delle immagini da salvare 
        File::deleteDirectory(storage_path('/app/livewire-tmp'));
        }
        // $this->images = '';
        // $this->announcement->user()->associate(Auth::user());
        
        $announcement->save();
        //messaggio in sessione di avvenuto inserimento annuncio
        return redirect(route('userPage.index'))->with('message_edit', __('ui.articolo_modificatoo'));
            
       
    }

     // funzione Real-time Validation
     public function updated($propertyName){
        $this->validateOnly($propertyName);
    }


    // funzione per la rimozione di un immagine già esistente nel annuncio
    public function deleteImage($id)
    {
        // dd($id);
        Image::where('id',$id)->delete();

        session()->flash('message_delete',__('ui.immagine_cancellata'));
    }


    public function render()
    {
        $announcementImage = Image::where('announcement_id',$this->announcementId)->get();
        

        return view('livewire.edit-announcement',compact('announcementImage'));
    }
}
