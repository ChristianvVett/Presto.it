<div class="col-12 col-lg-6 col-xl-5 align-self-center">
        
    @if (session()->has('message_delete'))
        <div class="message-container">
            <p class="create-success-message">
                {{ session('message_delete') }}
            </p>
        </div>
    @endif 

    <form class="p-5 my-3 form2"  wire:submit.prevent='editAnnouncement' enctype="multipart/form-data">

        @csrf

        <div class="mb-3">
            <label for="exampleInputTitle" class="form-label" >{{__('ui.live_titolo')}} <i class="bi bi-search"></i></label>
            <input type="text"  class="form-control @error('title') is-invalid @enderror"  aria-describedby="TitleHelp" placeholder="{{__('ui.live_nome_annuncio')}}" value=""  wire:model='title'>
            {{-- visualizzazione errori real-time --}}
            @error('title') <span class="error text-danger">{{__($message)}}</span> @enderror
        </div>
        <div class="mb-3">
            <label for="exampleInputPrice" class="form-label">{{__('ui.live_prezzo')}} <i class="bi bi-coin"></i></label>
            <input type="text" class="form-control @error('price') is-invalid @enderror"  aria-describedby="priceHelp" placeholder="{{__('ui.live_prezzo_annuncio')}}" value="" wire:model='price'>
           {{-- visualizzazione errori real-time --}}
           @error('price') <span class="error text-danger">{{__($message)}}</span> @enderror
        </div>
        
        <div class="mb-3">
            <label for="exampleInputDescription" class="form-label">{{__('ui.live_descrizione')}} <i class="bi bi-vector-pen"></i></label>
            <textarea type="longtext" class="form-control @error('description') is-invalid @enderror" rows="10" placeholder="{{__('ui.live_descrizione_annuncio')}}" wire:model='description'></textarea>
            {{-- visualizzazione errori real-time --}}
            @error('description') <span class="error text-danger">{{__($message)}}</span> @enderror
        </div>

        <div class="mb-3">
            <input wire:model='temporary_images' type="file" name="images" multiple class="form-control shadow @error('temporary_images.*') is-invalid @enderror  @error('temporary_images') is-invalid @enderror" placeholder="Img"/>
            @error('temporary_images.*')
            <p class="text-danger mt-2">
                {{__($message)}}
            </p>
            @enderror
            @error('temporary_images')
            <p class="text-danger mt-2">
                {{__($message)}}
            </p>
            @enderror
        </div>
        {{-- select per la selezione delle categorie --}}
        @if (!empty($announcementImage))
            <div class="row">
                <div class="col-12">
                    <p>
                    {{__('ui.anteprima_foto_vecchio_annuncio')}}
                    </p>
                    <div class="row border border-4 border-info rounded shadow py-4">
                        @foreach($announcementImage as $anImage)
                        <div class="col my-3">
                            <div class="img-preview mx-auto shadow rounded" ><img src="{{$anImage->getUrl(300, 300)}}"  alt=""></div>
                            <button type="button" class="btw btn-danger shadow d-block text-center mt-2 mx-auto" wire:click.prevent="deleteImage({{$anImage->id}})">{{__('ui.cancella')}}</button>
                        </div>
                        @endforeach   
                    </div>
                </div>
            </div>
        @endif
        @if (!empty($images))
        <div class="row">
            <div class="col-12">
                <p>
                {{__('ui.anteprima_foto')}}
                </p>
                <div class="row border border-4 border-info rounded shadow py-4">
                    @foreach($images as $key => $image)
                    <div class="col my-3">
                        <div class="img-preview mx-auto shadow rounded" style="background-image: url({{$image->temporaryUrl()}});"></div>
                        <button type="button" class="btw btn-danger shadow d-block text-center mt-2 mx-auto" wire:click="removeImage({{$key}})">{{__('ui.cancella')}}</button>
                    </div>
                    @endforeach
                </div>
            </div>
        </div>
        @endif


        <div class="mb-3">
            <label class="category2" for="category">{{__('ui.live_categoria')}} <i class="bi bi-list-columns-reverse category"></i></label>
            {{-- defer per non far andare in conflitto le select con i componenti della pagina--}}
            <select wire:model.defer='category' id="category" class="form-control @error('category') is-invalid @enderror">
                <option value=""></option>
                {{-- <option value="{{$category->id}}">{{$category->name}}</option> --}}
                @foreach ($categories as $category)
                    <option value="{{$category->id}}">{{$category->name}}</option>
                @endforeach
            </select>
            @error('category') <span class="error text-danger">{{__($message)}}</span> @enderror
        </div>
        
      
        <p class="fw-bold">{{__('ui.nota_bene')}} <i class="bi bi-exclamation-triangle"></i></p>
        <p class="text-danger">{{__('ui.campi_obbligatori')}}</i></p>
        <div class="btn-save">
            <button type="submit" class="btn btn-color-text">{{__('ui.salva_annuncio')}}</button>
        </div>
      </form>
</div>
