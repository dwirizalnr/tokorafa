<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

use Illuminate\Kavist\Facades\RajaOngkir;
use App\Models\City as ModelsCity;
use App\Models\Province;
use App\Models\Provinci;
use Kavist\RajaOngkir\Facades\RajaOngkir as FacadesRajaOngkir;

class LocationsSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {

        $daftarProvinsi = FacadesRajaOngkir::provinsi()->all();
        foreach ($daftarProvinsi as $provinceRow) {
            Province::create([
                'province_id' => $provinceRow['province_id'],
                'name'        => $provinceRow['province'],
            ]);
            $daftarKota = FacadesRajaOngkir::kota()->dariProvinsi($provinceRow['province_id'])->get();
            foreach ($daftarKota as $cityRow) {
                ModelsCity::create([
                    'province_id'   => $provinceRow['province_id'],
                    'city_id'       => $cityRow['city_id'],
                    'name'          => $cityRow['city_name'],
                ]);
            }
        }
    }
}
