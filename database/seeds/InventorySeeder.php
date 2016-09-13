<?php

use Illuminate\Database\Seeder;
use Illuminate\Database\Eloquent\Model;
use App\Catalog;
use App\CatalogSet;
use App\CatalogItem;
use App\Inventory;
use App\InventorySet;
use App\InventoryItem;
use App\InventoryListing;


class InventorySeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        // requires a catalog to have been downloaded
        $firstCatalog = Catalog::all()->first();
        if($firstCatalog){
          // grab the first catalog and back it with first item in each nesting layer
          $seedInventory = Inventory::firstOrCreate([
            "catalog_id" => $firstCatalog->id,
            "name" => "Inventory Seed"
          ]);
          $seedInventory->save();

          $firstCatalogSet = $firstCatalog->catalogSets->first();
          if($firstCatalogSet){
            $seedInventorySet = InventorySet::firstOrCreate([
              "catalog_set_id" => $firstCatalogSet->id,
              "inventory_id" => $seedInventory->id,
              "name" => "Inventory Set Seed"
            ]);

            $firstCatalogItem = $firstCatalogSet->catalogItems->first();
            if($firstCatalogItem){
              $seedInventoryItem = InventoryItem::firstOrCreate([
                "catalog_item_id" => $firstCatalogItem->id,
                "inventory_set_id" => $seedInventorySet->id,
                "name" => "Inventory Item Seed",
                "default_price" => 1.0
              ]);

              $seedInventoryListing = InventoryListing::firstOrCreate([
                "inventory_item_id" => $seedInventoryItem->id,
                "name" => "Inventory Listing Seed",
                "price" => 1.0
              ]);

            }

          }
        }
    }
}
