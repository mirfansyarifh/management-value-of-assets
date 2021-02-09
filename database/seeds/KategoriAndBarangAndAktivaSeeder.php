<?php

use App\Models\Auth\User\User;
use App\Models\Resources\Aktiva\Aktiva;
use App\Models\Resources\Barang\Barang;
use App\Models\Resources\Kategori\Kategori;
use Illuminate\Database\Seeder;
use Faker\Factory;
use Bezhanov\Faker\Provider\Commerce;
use Bezhanov\Faker\Provider\Device;
use Bezhanov\Faker\Provider\Space;
use Illuminate\Support\Str;

class KategoriAndBarangAndAktivaSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $faker = Factory::create();
        $faker->addProvider(new Commerce($faker));
        $faker->addProvider(new Space($faker));
        $faker->addProvider(new Device($faker));

        $propertiesByCategory = [
            'tanah' => [
                'status_tanah' => $faker->randomElement(['HM', 'HGB', 'HGU', 'HP']),
                'sertifikat' => [
                    'nomor' => $faker->randomNumber(3),
                    'masa_berlaku' => $faker->randomNumber(2).' tahun',
                    'tgl_berakhir' => $faker->date('d/m/Y'),
                ],
                'luas' => $faker->randomFloat(2, 500, 2000)
            ],
            'kantor' => [
                'imb' => [
                    'tanggal' => $faker->date('d/m/Y'),
                    'nomor' => $faker->numerify('#####'),
                    'instansi' => $faker->sentence() // 32 character
                ]
            ],
            'dinas' => [
                'imb' => [
                    'tanggal' => $faker->date('d/m/Y'),
                    'nomor' => $faker->numerify('#####'),
                    'instansi' => $faker->sentence() // 32 character
                ]
            ],
            'lain' => [
                'imb' => [
                    'tanggal' => $faker->date('d/m/Y'),
                    'nomor' => $faker->numerify('#####'),
                    'instansi' => $faker->sentence() // 32 character
                ]
            ],
            'sedan' => [
                'type' => $faker->randomElement(['mini bus', 'sedan', 'jeep', 'tank']),
                'merk' => $faker->randomElement(['Kijang Inova E.', 'PzkPfw Mk.2', 'Toyota 56', 'Pajero Sport', 'Honda Accord']),
                'nomor' => [
                    'rangka' => $faker->bothify('?????##?#########'),
                    'mesin' => $faker->bothify('#??#######'),
                    'polisi' => $faker->bothify('? #### ??')
                ],
                'tahun_pembuatan' => $faker->year
            ],
            'non-sedan' => [
                'type' => $faker->randomElement(['mini bus', 'sedan', 'jeep', 'tank']),
                'merk' => $faker->randomElement(['Kijang Inova E.', 'PzkPfw Mk.2', 'Toyota 56', 'Pajero Sport', 'Honda Accord']),
                'nomor' => [
                    'rangka' => $faker->bothify('?????##?#########'),
                    'mesin' => $faker->bothify('#??#######'),
                    'polisi' => $faker->bothify('? #### ??')
                ],
                'tahun_pembuatan' => $faker->year
            ],
            'sepeda_motor' => [
                'type' => $faker->randomElement(['mini bus', 'sedan', 'jeep', 'tank']),
                'merk' => $faker->randomElement(['Kijang Inova E.', 'PzkPfw Mk.2', 'Toyota 56', 'Pajero Sport', 'Honda Accord']),
                'nomor' => [
                    'rangka' => $faker->bothify('?????##?#########'),
                    'mesin' => $faker->bothify('#??#######'),
                    'polisi' => $faker->bothify('? #### ??')
                ],
                'tahun_pembuatan' => $faker->year
            ],
            'mesin' => [
                'merk_type' => $faker->deviceModelName
            ],
            'perabot' => [
                'merk_type' => $faker->deviceModelName
            ],
            'komputer' => [
                'merk_type' => $faker->deviceModelName
            ],
            'server' => [
                'merk_type' => $faker->deviceModelName
            ],
            'jaringan' => [
                'merk_type' => $faker->deviceModelName
            ],
            'printer' => [
                'merk_type' => $faker->deviceModelName
            ],
            'interior' => [
                'merk_type' => $faker->deviceModelName
            ],
            'peralatan_lain' => [
                'merk_type' => $faker->deviceModelName
            ]
        ];

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

        // DB::unprepared(file_get_contents(__DIR__.'/barangs.sql'));

        // Barang, 4 barang per kategori
        /*Kategori::whereNotNull(['masa_manfaat', 'persen_residu'])->get()->each(function ($category) use ($propertiesByCategory, $faker) {
            for ($idx=0;$idx<=3;$idx++) {
                \factory(Barang::class, 1)->create([
                    'nama_barang' => Str::contains($category->nama, ['tanah', 'kantor', 'dinas', 'lain']) ? $faker->sentence : $faker->productName,
                    'kategori_id' => $category->id,
                    'properties' => json_encode($propertiesByCategory[$category->nama])
                ]);
            }
        });*/


        /*auth()->loginUsingId(User::whereEmail('keuangan@example.com')->get()->first()->id);
        Barang::all()->each(function ($barang) { // aktiva barang genap oleh keuangan
            if ($barang->id % 2 == 0) {
                $aktiva = \factory(Aktiva::class)->make();
                $barang->aktiva()->save($aktiva);
            }
        });
        auth()->logout();
        auth()->loginUsingId(User::whereEmail('umum@example.com')->get()->first()->id);
        Barang::all()->each(function ($barang) { // aktiva barang ganjil oleh umum
            if ($barang->id % 2 != 0) {
                $aktiva = \factory(Aktiva::class)->make();
                $barang->aktiva()->save($aktiva);
            }
        });
        auth()->logout();

        // Barang tanpa aktiva, 2 barang per subkategori
        Kategori::whereNotNull(['masa_manfaat', 'persen_residu'])->get()->each(function ($category) use ($propertiesByCategory, $faker) {
            for ($idx=0;$idx<=1;$idx++) {
                \factory(Barang::class, 1)->create([
                    'nama_barang' => Str::contains($category->nama, ['tanah', 'kantor', 'dinas', 'lain']) ? $faker->address : $faker->productName,
                    'kategori_id' => $category->id,
                    'properties' => json_encode($propertiesByCategory[$category->nama])
                ]);
            }
        });*/
    }
}
