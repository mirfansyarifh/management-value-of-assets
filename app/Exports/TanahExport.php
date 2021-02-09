<?php 
namespace App\Exports;

use Illuminate\Contracts\View\View;
use Illuminate\Database\Eloquent\Collection;
use Illuminate\Contracts\Support\Responsable;
use Maatwebsite\Excel\Concerns\Exportable;

use Maatwebsite\Excel\Concerns\FromArray;
use Maatwebsite\Excel\Concerns\FromQuery;
use Maatwebsite\Excel\Concerns\FromCollection;
use Maatwebsite\Excel\Concerns\FromView;
use Maatwebsite\Excel\Concerns\ShouldAutoSize;
use Maatwebsite\Excel\Concerns\WithMapping;
use Maatwebsite\Excel\Concerns\WithHeadings;
use Maatwebsite\Excel\Concerns\WithEvents;
use Maatwebsite\Excel\Concerns\WithDrawings;
use PhpOffice\PhpSpreadsheet\Worksheet\Drawing;
use Maatwebsite\Excel\Events\BeforeExport;
use Maatwebsite\Excel\Events\BeforeWriting;
use Maatwebsite\Excel\Events\BeforeSheet;
use Maatwebsite\Excel\Events\AfterSheet;
use Maatwebsite\Excel\Concerns\WithCustomStartCell;
use App\Http\Requests\Aktiva\ShowAktivaRequest;
use App\Models\Resources\Aktiva\Aktiva;
use App\Models\Resources\Barang\Barang;
use App\Models\Resources\Kategori\Kategori;
use Illuminate\Support\Carbon;

class TanahExport implements 
FromQuery, 
WithMapping, 
ShouldAutoSize,
WithHeadings,
WithEvents,
WithCustomStartCell,
WithDrawings

{
    
     
    private $year;
    private $month;
    private $category;
    private $status_guna;
    private int $aktiva_count;
    private \Illuminate\Support\Collection $aktivas;

    public function __construct($year, $month, $category, $status_guna)
     {
        
        $this->year = $year; 
        $this->month = $month; 
        $this->category = $category; 
        $this->status_guna = $status_guna; 
        $this->aktiva_count = $this->query()->get()->count();
        $this->aktivas = $this->query()->get();
     }
     use Exportable;

     public function query()
     {
        $year = $this->year;
        $month = $this->month;
        $category = $this->category;
        $status_guna = $this->status_guna;

        $categories = getKategoriesNameFromBroadCategory($category);
        $aktivas = Aktiva
                ::where('tgl_perolehan', '<=', Carbon::createFromDate($year, $month)->lastOfMonth()) // #1: ambil data yg telah ada saat tsb
                ->get()
                ->whereIn('kategori.nama', $categories) // #2: filter data sesuai dg broadcategory
                ->where('barang.status_guna', $status_guna)->toQuery(); // #3: filter data status guna = guna
                return $aktivas;
                // dd($aktivas);
                
         }

        public function map($aktivas): array
        {
            $year = $this->year;
            $month = $this->month;
           return [

            $aktivas->id,
            $aktivas->barang->kode_kanwil,
            $aktivas->barang->kode_aset,
            $aktivas->barang->kode_tanggal,
            $aktivas->barang->kode_registrasi,
            $aktivas->barang->nama_barang,
            $aktivas->barang->kategori['nama'],
            $aktivas->tgl_perolehan,
            $aktivas->nilai_perolehan,
            $aktivas->kategori->masa_manfaat,
            $aktivas->barang->properties->status_tanah,
            $aktivas->barang->properties->sertifikat->nomor,
            $aktivas->barang->properties->sertifikat->masa_berlaku,
            $aktivas->barang->properties->sertifikat->tanggal_berakhir,
            $aktivas->barang->kondisi,
            $aktivas->barang->keterangan,
           ];
            
        }
        

        public function headings():array
        {
            return[
                '# ',
                '1 ',
                '2 ',
                '3 ',
                '4 ',
                ' NAMA ASET TETAP ',
                ' SUB-KATEGORI ',
                ' TGL BELI ',
                ' NILAI PEROLEHAN ',
                ' UM ',
                ' STATUS TANAH ',
                ' SERTIFIKAT NOMOR ',
                ' SERTIFIKAT MASA BERLAKU ',
                ' SERTIFIKAT TGL BERAKHIR ',
                ' KONDISI ',
                ' KETERANGAN '               

            ];
        }

        public function drawings()
        {
            $drawing = new Drawing();
            $drawing->setName('Logo');
            $drawing->setDescription('cover-export');
            $drawing->setPath(public_path('cover-export.png'));
            $drawing->setHeight(90);
            $drawing->setCoordinates('A2');
    
            return $drawing;
        }

        public function startCell(): string
        {
            return 'A15';
        }

        public function registerEvents(): array 
        {
                return [
                AfterSheet::class => function (AfterSheet $event) {

                    $event->sheet->getDelegate()->getStyle('I')->getNumberFormat()
                    ->setFormatCode(\PhpOffice\PhpSpreadsheet\Style\NumberFormat::FORMAT_NUMBER_COMMA_SEPARATED1);
                
                    $event->sheet->getStyle('A15:P15')->applyFromArray([
                        'font' => [
                                'bold' => true
                        ],
                        'alignment' => [
                            'horizontal' => \PhpOffice\PhpSpreadsheet\Style\Alignment::HORIZONTAL_CENTER,
                        ],
                        'borders' => [
                            'allBorders' => [
                                'borderStyle' => \PhpOffice\PhpSpreadsheet\Style\Border::BORDER_THIN,
                            ],
                        ]
                    ]);
                    
                    $event->sheet->getDelegate()->mergeCells('G1:L3');
                    $event->sheet->getDelegate()
                    ->getCell('G1')
                    ->setValue('FORMULIR');
                    $event->sheet->getStyle('G1:L3')->applyFromArray([
                        'font' => [
                                'bold' => true,
                                'size'      =>  '20',
                        ],
                        'alignment' => [
                            'horizontal' => \PhpOffice\PhpSpreadsheet\Style\Alignment::HORIZONTAL_CENTER,
                            'vertical' => \PhpOffice\PhpSpreadsheet\Style\Alignment::VERTICAL_CENTER,
                        ],
                        'borders' => [
                            'allBorders' => [
                                'borderStyle' => \PhpOffice\PhpSpreadsheet\Style\Border::BORDER_THIN,
                            ],
                        ]
                    ]);
                    
                    $event->sheet->getDelegate()->mergeCells('M1:P8');
                    $event->sheet->getDelegate()
                    ->getCell('M1')
                    ->setValue('DAFTAR ASET TETAP');
                    $event->sheet->getStyle('M1:P8')->applyFromArray([
                        'font' => [
                                'bold' => true,
                                'size'      =>  '20',
                        ],
                        'alignment' => [
                            'horizontal' => \PhpOffice\PhpSpreadsheet\Style\Alignment::HORIZONTAL_CENTER,
                            'vertical' => \PhpOffice\PhpSpreadsheet\Style\Alignment::VERTICAL_CENTER,
                        ],
                        'borders' => [
                            'allBorders' => [
                                'borderStyle' => \PhpOffice\PhpSpreadsheet\Style\Border::BORDER_THIN,
                            ],
                        ]
                    ]);
                    
                    $event->sheet->getDelegate()->mergeCells('G4:L8');
                    $event->sheet->getDelegate()
                    ->getCell('G4')
                    ->setValue('TANGGAL DI KELUARKAN : '.$this->month.' / '.$this->year);
                    $event->sheet->getStyle('G4:L8')->applyFromArray([
                        'font' => [
                                'bold' => true,
                                'size'      =>  '12',
                        ],
                        'alignment' => [
                            'horizontal' => \PhpOffice\PhpSpreadsheet\Style\Alignment::HORIZONTAL_LEFT,
                            'vertical' => \PhpOffice\PhpSpreadsheet\Style\Alignment::VERTICAL_CENTER,
                        ],
                        'borders' => [
                            'allBorders' => [
                                'borderStyle' => \PhpOffice\PhpSpreadsheet\Style\Border::BORDER_THIN,
                            ],
                        ]
                    ]);


                    $event->sheet->getDelegate()->mergeCells('A10:L11');
                    $event->sheet->getDelegate()
                    ->getCell('A10')
                    ->setValue('DAFTAR ASET TETAP : '.$this->status_guna);
                    $event->sheet->getStyle('A10:L11')->applyFromArray([
                        'font' => [
                                'bold' => true,
                                'size' =>  '15',
                        ],
                        'alignment' => [
                            'horizontal' => \PhpOffice\PhpSpreadsheet\Style\Alignment::HORIZONTAL_CENTER,
                            'vertical' => \PhpOffice\PhpSpreadsheet\Style\Alignment::VERTICAL_CENTER,
                        ],
                        
                    ]);

                    $event->sheet->getDelegate()->mergeCells('A13:L13');
                    $event->sheet->getDelegate()
                    ->getCell('A13')
                    ->setValue('BPJS KETENAGAKERJAAN KANTOR WILAYAH JATENG DAN DIY / KELOMPOK ASET '.$this->category);
                    $event->sheet->getStyle('A13:L13')->applyFromArray([
                        'font' => [
                                'bold' => false,
                                'size' =>  '12',
                        ],
                        'alignment' => [
                            'horizontal' => \PhpOffice\PhpSpreadsheet\Style\Alignment::HORIZONTAL_LEFT,
                            'vertical' => \PhpOffice\PhpSpreadsheet\Style\Alignment::VERTICAL_CENTER,
                        ],
                        
                    ]);

                    $event->sheet->getStyle('A16:M1000')->applyFromArray([
                        'font' => [
                                'bold' => false,
                                'size' =>  '11',
                        ],
                        'alignment' => [
                            'horizontal' => \PhpOffice\PhpSpreadsheet\Style\Alignment::HORIZONTAL_CENTER,
                            'vertical' => \PhpOffice\PhpSpreadsheet\Style\Alignment::VERTICAL_CENTER,
                        ],
                        
                    ]);

                    // Get nomer row setelah row terakhir
                    $sumStartRow = (getNumberFromString($this->startCell()) + $this->aktiva_count + 1);

                    // Jumlah Nilai Perolehan -> KOLOM 'N'
                    $event->sheet->getDelegate()->getCell('I'. (string)$sumStartRow)->setValue($this->aktivas->pluck(['nilai_perolehan'])->sum());

                    
                    $event->sheet->getStyle('A16:P'.$sumStartRow)->applyFromArray([
                        'font' => [
                                'bold' => false
                        ],
                        'alignment' => [
                            'horizontal' => \PhpOffice\PhpSpreadsheet\Style\Alignment::HORIZONTAL_CENTER,
                        ],
                        'borders' => [
                            'allBorders' => [
                                'borderStyle' => \PhpOffice\PhpSpreadsheet\Style\Border::BORDER_THIN,
                            ],
                        ]
                    ]);
                }

            ];
        }

        
           //  public function view(): View
        //  {
        //     return view('resources.aktivas.export', [
        //          'aktivas' => $this->aktivas,
        //          'year' => $this->year,
        //          'month' => $this->month,
        //          'category' => $this->category,
        //          'status_guna' => $this->status_guna
        //      ]);
        //  }
    
    
}


?>