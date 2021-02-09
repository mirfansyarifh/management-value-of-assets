<?php

use App\Models\Resources\Kategori\Kategori;
use Faker\Factory;
use Illuminate\Database\Seeder;

class KategoriSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $faker = Factory::create();

        $categoriesConstraint = [
            'tanah' => [
                'nama' => 'tanah',
                'masa_manfaat' => 240,
                'persen_residu' => 0
            ],
            'bangunan' => [
                'nama' => 'bangunan',
                'children' => [
                    'kantor' => [
                        'nama' => 'kantor',
                        'masa_manfaat' => 48,
                        'persen_residu' => 20
                    ],
                    'dinas' => [
                        'nama' => 'dinas',
                        'masa_manfaat' => 48,
                        'persen_residu' => 20
                    ],
                    'lain' => [
                        'nama' => 'lain',
                        'masa_manfaat' => 240,
                        'persen_residu' => 20
                    ],
                ],
            ],
            'kendaraan' => [
                'nama' => 'kendaraan',
                'children' => [
                    'sedan' => [
                        'nama' => 'sedan',
                        'masa_manfaat' => 60,
                        'persen_residu' => 25
                    ],
                    'non-sedan' => [
                        'nama' => 'non-sedan',
                        'masa_manfaat' => 60,
                        'persen_residu' => 20
                    ],
                    'sepeda_motor' => [
                        'nama' => 'sepeda_motor',
                        'masa_manfaat' => 60,
                        'persen_residu' => 10
                    ]
                ]
            ],
            'peralatan_kantor' => [
                'nama' => 'peralatan_kantor',
                'children' => [
                    'mesin' => [
                        'nama' => 'mesin',
                        'masa_manfaat' => 48,
                        'persen_residu' => 5
                    ],
                    'perabot' => [
                        'nama' => 'perabot',
                        'masa_manfaat' => 48,
                        'persen_residu' => 5
                    ]
                ]
            ],
            'peralatan_komputer' => [
                'nama' => 'peralatan_komputer',
                'children' => [
                    'komputer' => [
                        'nama' => 'komputer',
                        'masa_manfaat' => 48,
                        'persen_residu' => 5
                    ],
                    'server' => [
                        'nama' => 'server',
                        'masa_manfaat' => 48,
                        'persen_residu' => 5
                    ],
                    'jaringan' => [
                        'nama' => 'jaringan',
                        'masa_manfaat' => 48,
                        'persen_residu' => 5
                    ],
                    'printer' => [
                        'nama' => 'printer',
                        'masa_manfaat' => 48,
                        'persen_residu' => 5
                    ]
                ]
            ],
            'lain-lain' => [
                'nama' => 'lain-lain',
                'children' => [
                    'interior' => [
                        'nama' => 'interior',
                        'masa_manfaat' => 48,
                        'persen_residu' => 5
                    ],
                    'peralatan_lain' => [
                        'nama' => 'peralatan_lain',
                        'masa_manfaat' => 48,
                        'persen_residu' => 5
                    ]
                ]
            ]
        ];

        // Kategori
        foreach ($categoriesConstraint as $category) {
            $db_category = Kategori::whereNama($category['nama'])->first();
            if (empty($db_category)) {
                Kategori::create([
                    'nama' => $category['nama'],
                    'masa_manfaat' => $category['masa_manfaat'] ?? null,
                    'persen_residu' => $category['persen_residu'] ?? null
                ]);
                if (array_key_exists('children', $category)) {
                    foreach ($category['children'] as $subcategory) {
                        Kategori::create([
                            'nama' => $subcategory['nama'],
                            'masa_manfaat' => $subcategory['masa_manfaat'],
                            'persen_residu' => $subcategory['persen_residu'],
                            'parent_id' => Kategori::whereNama($category['nama'])->first()->id
                        ]);
                    }
                }
            }
        }
    }
}
