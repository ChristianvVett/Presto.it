<?php

namespace App\Jobs;

use App\Models\Image;
use Google\Cloud\Vision\V1\ImageAnnotatorClient;
use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldBeUnique;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Foundation\Bus\Dispatchable;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Queue\SerializesModels;

class GoogleVisionSafeSearch implements ShouldQueue
{
    use Dispatchable, InteractsWithQueue, Queueable, SerializesModels;

    private $announcement_image_id;

    /**
     * Create a new job instance.
     *
     * @return void
     */
    public function __construct($announcement_image_id)
    {
        $this->announcement_image_id = $announcement_image_id;
    }

    /**
     * Execute the job.
     *
     * @return void
     */
    public function handle()
    {
        $i = Image::find($this->announcement_image_id);
        if(!$i) {
            return;
        }

        $image = file_get_contents(storage_path('app/public/' . $i->path));

        putenv('GOOGLE_APPLICATION_CREDENTIALS=' . base_path('google_credentials.json'));

        $imageAnnotator = new ImageAnnotatorClient();
        $response = $imageAnnotator->safeSearchDetection($image);
        $imageAnnotator->close();

        $safe = $response->getSafeSearchAnnotation();

        $adult = $safe->getAdult();
        $medical = $safe->getMedical();
        $spoof = $safe->getSpoof();
        $violence = $safe->getViolence();
        $racy = $safe->getRacy();


        $likelihoodName = [
            'text-secondary fa-regular fa-face-smile fs-3 fa-beat', 'text-success fa-regular fa-face-smile fs-3 fa-beat', 'text-success fa-regular fa-face-smile fs-3 fa-beat',
            'text-warning fa-regular fa-face-meh fs-3 fa-beat' , 'text-warning fa-regular fa-face-meh fs-3 fa-beat' , 'text-danger fa-regular fa-face-frown fs-3 fa-beat'
        ];

        $i->adult = $likelihoodName[$adult];
        $i->medical = $likelihoodName[$medical];
        $i->spoof = $likelihoodName[$spoof];
        $i->violence = $likelihoodName[$violence];
        $i->racy = $likelihoodName[$racy];

        $i->save();
    }
}
