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

class NonKapExport implements 
FromQuery, 
WithMapping, 
ShouldAutoSize,
WithHeadings,
WithEvents,
WithCustomStartCell,
WithDrawings

{
    
     
    private $category;
    private $status_guna;
    private $year;
    private $month;

     public function __construct($year, $month, $category, $status_guna)
     {
        $this->category = $category; 
        $this->status_guna = $status_guna; 
        $this->year = $year; 
        $this->month = $month; 
     }
     use Exportable;

     public function query()
     {
        $category = $this->category;
        $status_guna = $this->status_guna;
        
        $categories = getKategoriesNameFromBroadCategory($category);
            $aktivas_non_kap = Aktiva
            ::get()
            ->where('barang.status_guna', $status_guna)
            ->whereIn('kategori.nama', $categories)->toQuery();;
        $aktivas = $aktivas_non_kap;
        return $aktivas;

                
         }

        public function map($aktivas): array
        {
           return [

            $aktivas->id,
            $aktivas->barang->kode_kanwil,
            $aktivas->barang->kode_aset,
            $aktivas->barang->kode_tanggal,
            $aktivas->barang->kode_registrasi,
            $aktivas->barang->nama_barang,
            $aktivas->barang->kategori['nama'],
            $aktivas->barang->properties->merk_type ??  $aktivas->barang->properties->merk ?? 'TIDAK ADA MERK',
            $aktivas->tgl_perolehan,
            $aktivas->nilai_perolehan,
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
                ' MERK/TYPE ',
                ' TGL BELI ',
                ' NILAI PEROLEHAN ',
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

                    $event->sheet->getDelegate()->getStyle('J16')->getNumberFormat()
                    ->setFormatCode(\PhpOffice\PhpSpreadsheet\Style\NumberFormat::FORMAT_NUMBER_COMMA_SEPARATED1);
                
                    $event->sheet->getStyle('A15:L15')->applyFromArray([
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
                    
                    $event->sheet->getDelegate()->mergeCells('H1:I3');
                    $event->sheet->getDelegate()
                    ->getCell('H1')
                    ->setValue('FORMULIR');
                    $event->sheet->getStyle('H1:I3')->applyFromArray([
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
                    
                    $event->sheet->getDelegate()->mergeCells('J1:L8');
                    $event->sheet->getDelegate()
                    ->getCell('J1')
                    ->setValue('DAFTAR ASET TETAP');
                    $event->sheet->getStyle('J1:L8')->applyFromArray([
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
                    
                    $event->sheet->getDelegate()->mergeCells('H4:I8');
                    $event->sheet->getDelegate()
                    ->getCell('H4')
                    ->setValue('TANGGAL DI KELUARKAN : '.$this->month.' / '.$this->year);
                    $event->sheet->getStyle('H4:I8')->applyFromArray([
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
                    ->setValue('DAFTAR ASET TETAP YANG MASIH DIGUNAKAN');
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

                    $event->sheet->getStyle('A16:L1000')->applyFromArray([
                        'font' => [
                                'bold' => false,
                                'size' =>  '11',
                        ],
                        'alignment' => [
                            'horizontal' => \PhpOffice\PhpSpreadsheet\Style\Alignment::HORIZONTAL_CENTER,
                            'vertical' => \PhpOffice\PhpSpreadsheet\Style\Alignment::VERTICAL_CENTER,
                        ],
                        
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