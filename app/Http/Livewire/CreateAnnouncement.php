<?php

namespace App\Http\Livewire;

use App\Jobs\GoogleVisionLabelImage;
use Livewire\Component;
use App\Models\Category;
use App\Jobs\RemoveFaces;
use App\Jobs\ResizeImage;
use Livewire\WithFileUploads;
use App\Jobs\GoogleVisionSafeSearch;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\File;



class CreateAnnouncement extends Component
{
    use WithFileUploads;
    public $title;
    
    public $description;
    public $price;
    // aggiunta delle categorie degli annunci
    public $category;
    public $message;
    public $validated;
    public $temporary_images;
    public $images =[];
    // public $image;
    public $form_id;
    public $announcement;
    
    
    // array di regole 
    protected $rules = [
        'title'=>'required',
        'description'=>'required|min:15',
        'price'=>'required|numeric',
        // aggiunta delle categorie degli annunci
        'category'=>'required',
        'images.*'=>'image|max:1024',
        'temporary_images.*' =>'image|max:1024',
        'temporary_images'=>'required',
    ];

    // messaggio personalizzato per le regole
    // protected $messages = [
    //     'title'=>'Il campo titolo è obligatorio',
    //     'description'=>'Il campo descrizione è obligatorio',
    //     'price'=>'Il campo prezzo è obligatorio',
    //     'category'=>'Il campo categorie è obligatorio',
    //     'min'=>'Il campo descrizione deve contenere minimo 15 caratteri',
    //     'numeric'=>'Il campo prezzo deve essere numerico',
    //     'temporary_images.required'=> 'L\'immagine è richiesta',
    //     'temporary_images.*.image'=> 'I file devono essere immagini',
    //     'temporary_images.*.max'=> 'L\'immagine deve essere massimo di 1MB',
    //     'images.image'=> 'L\'immagine deve essere un\'immagine',
    //     'images.max'=> 'L\'immagine deve essere massimo 1MB',

    // ];
    public function updatedTemporaryImages(){
        if($this->validate([
            'temporary_images.*'=> 'image|max:1024',
            'temporary_images'=>'required',
        ])) {
            foreach($this->temporary_images as $image){
                $this->images[]= $image;

            }
        }
    }
    public function removeImage($key){
        if(in_array($key, array_keys($this->images))){
            unset($this->images[$key]);
        }
    }

   
    
    public function store(){
        
        // 
        
        //controllo della validazione
        $this->validate();
        $this->announcement = Category::find($this->category)-> announcements()->create ($this->validate());
        if(count($this->images)){
            foreach($this->images as $image){
                // $this-> announcement-> images()->create(['path'=>$image->store('images', 'public')]);
               
                $newFileName = "announcements/{$this->announcement->id}";
                $newImage = $this->announcement->images()->create(['path'=>$image->store($newFileName, 
                 'public')]);
                

                 RemoveFaces::withChain([
                    new ResizeImage($newImage->path, 300, 300),
                    new GoogleVisionSafeSearch($newImage->id),
                 new GoogleVisionLabelImage($newImage->id),
                 ])->dispatch($newImage->id);
                 

            }
        File::deleteDirectory(storage_path('/app/livewire-tmp'));

            
        }
        $this->announcement->user()->associate(Auth::user());
        $this->announcement->save();
        // session()->flash('insert_message',__('ui.articolo__inseritoo'));
           

         
       


        // ci salviamo il record(id) della categoria cosi da prenderci il record intero della categoria e si collegera all'annuncio 
        $category = Category::find($this->category);

   

        //messaggio in sessione di avvenuto inserimento annuncio
        return redirect(route('announcement.create'))->with('message', __('ui.articolo__inseritoo'));

        // richiamo la funzione per la pulizia dei campi del form
        $this->cleanForm();

       
    }
     // funzione Real-time Validation
     public function updated($propertyName){
        $this->validateOnly($propertyName);
    }
   

    

    //funzione di pulizia dei campi del form
    public function cleanForm(){
        $this->title='';
        $this->description='';
        $this->price='';
        $this->category='';
        // $this->image='';
        $this-> images =[];
        $this-> temporary_images=[];
        $this-> form_id=rand();
        
    }

    public function render()
    {
        return view('livewire.create-announcement');
    }
}
