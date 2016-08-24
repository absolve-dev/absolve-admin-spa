<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;
use App\Storage;
use App\Catalog;
use App\CatalogSet;
use App\CatalogCard;

class CatalogSyncYgoPrice extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'catalog:sync-ygo-price';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Sync catalog of given library';

    /**
     * Create a new command instance.
     *
     * @return void
     */
    public function __construct()
    {
        parent::__construct();
    }

    /**
     * Execute the console command.
     *
     * @return mixed
     */
    public function handle()
    {
      /* check for/create catalog */
      // find or create
      $ygoCatalogModel = Catalog::firstOrCreate(["name" => "Yu-Gi-Oh!", "default_image_url" => ""]);
      /* check for/create sets */

      // retrieve all sets
      echo "attempt to grab all sets\n";
      $allSetsBody = (new \GuzzleHttp\Client())->request("GET", "http://yugiohprices.com/api/card_sets")->getBody();
      $allSetsArray = json_decode($allSetsBody, true);

      //$counter = 18;
      //$desired = 15;
      foreach($allSetsArray as $_setIndex => $_setName){
        //if($_setIndex == $counter){ break; } // only 5 right now
        //if($_setIndex !== $desired){ continue; }
        $setModel = CatalogSet::firstOrCreate([
          "name" => $_setName,
          "catalog_id" => $ygoCatalogModel->id
        ]);
        $setModelId = $setModel->id;

        if($setModel->default_image_url == ""){
          // grab set image
          echo "attempt to grab set image: $_setName\n";
          $setImageResponse = (new \GuzzleHttp\Client())->request("GET", "http://yugiohprices.com/api/set_image/" . urlencode($_setName));
          $setImageStream = $setImageResponse->getBody()->getContents();

          $setImagePath = "/catalog-set/$setModelId.jpg";
          \Storage::disk("s3")->put($setImagePath, $setImageStream);
          $setModel->default_image_url = $setImagePath;
          $setModel->save();
        }

        // grab set data
        echo "attempt to grab set data: $_setName\n";
        $setBody = (new \GuzzleHttp\Client())->request("GET", "http://yugiohprices.com/api/set_data/" . urlencode($_setName))->getBody();
        $setArray = json_decode($setBody, true);

        foreach($setArray["data"]["cards"] as $_setCardData){
          $cardName = $_setCardData["name"];

          // print tag is the same, rarity is different
          // use uid, unique identification string
          // same name, same set, same string

          $setCardData = $_setCardData["numbers"][0];
          // i only need print_tag and rarity out of here, array merge with fullCardArray

          // retrieve card's data
          echo "attempt to grab card data: $cardName\n";
          $fullCardBody = (new \GuzzleHttp\Client())->request("GET", "http://yugiohprices.com/api/card_data/" . urlencode($cardName))->getBody();
          $fullCardArray = json_decode($fullCardBody, true);
          if($fullCardArray["status"] == "success"){
            $fullCardData = $fullCardArray["data"];

            // also grab the rarity and print_tag
            $outsideData = [
              "rarity" => $setCardData["rarity"],
              "print_tag" => $setCardData["print_tag"]
            ];

            $cardModel = CatalogCard::firstOrCreate([
              "name" => $cardName,
              "catalog_set_id" => $setModelId,
              "uid_string" => $outsideData["rarity"]
            ]);
            $cardModelId = $cardModel->id;

            // now json_encode and dump
            $fullCardData = array_merge($fullCardData, $outsideData);
            //print_r($fullCardData);
            $cardModel->json_data = json_encode($fullCardData);

            // grab that image
            if($cardModel->default_image_url == ""){
              // grab card image
              echo "attempt to grab card image: $cardName\n";
              $cardImageResponse = (new \GuzzleHttp\Client())->request("GET", "http://yugiohprices.com/api/card_image/" . urlencode($cardName));
              $cardImageStream = $cardImageResponse->getBody()->getContents();

              $cardImagePath = "/catalog-card/$setModelId/$cardModelId.jpg";
              \Storage::disk("s3")->put($cardImagePath, $cardImageStream);
              $cardModel->default_image_url = $cardImagePath;
              $cardModel->save();
            }
            $cardModel->save();
          }else{
            echo "Single Card Data error.\n";
          }


          // retrieve card image
        }
      }

      /* check for/create/update cards */
      //

    }
}
