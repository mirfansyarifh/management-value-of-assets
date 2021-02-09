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

class AktivasExport implements 
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
            $aktivas->barang->properties->merk_type ??  $aktivas->barang->properties->merk ?? 'TIDAK ADA MERK',
            $aktivas->tgl_perolehan,
            $aktivas->kategori->masa_manfaat,
            $aktivas->getUmDariPerolehanSampaiAkhirTahunLalu($year),
            $aktivas->getUmDariAwalTahunSampaiBulanIni($year, $month),
            $aktivas->getUmDariPerolehanSampaiBulanIni($year, $month),
            $aktivas->nilai_perolehan,
            $aktivas->getNilaiResidu($year, $month),
            $aktivas->getAkmPenyusutanDariPerolehanSampaiAkhirTahunLalu($year, $month),
            $aktivas->penurunan_nilai ?? '0',
            $aktivas->koreksi_akum_penurunan_nilai ?? '0',
            $aktivas->getNilaiYangDapatDisusutkan($year, $month) ?? '0',
            $aktivas->getSisaMasaManfaatSampaiAkhirTahunLalu($year) ?? '0',
            $aktivas->getAkmDariAwalTahunSampaiBulanLalu($year, $month) ?? '0',
            $aktivas->getPenyusutanBulanIni($year, $month) ?? '0',
            $aktivas->getAkmDariAwalTahunSampaiBulanIni($year, $month) ?? '0',
            $aktivas->getAkmDariPerolehanSampaiBulanIni($year, $month),
            $aktivas->getNilaiBuku($year, $month),
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
                ' UM ',
                ' UM S.D TAHUN LALU ',
                ' UM S.D TH INI ',
                ' UM TH INI ',
                ' NILAI PEROLEHAN ',
                ' NILAI RESIDU ',
                ' AKUM PENY S.D TAHUN LALU ',
                ' PENURUNAN NILAI ',
                ' KOREKSI AKM. PENYUSUTAN ',
                ' NILAI YG DISUSUTKAN ',
                ' SISA UM TH '.$this->year,
                ' BEBAN PENY. S.D BULAN LALU ',
                ' BEBAN PENY. BULAN INI ',
                ' BEBAN PENY. S.D BULAN INI ',
                ' AKUM PENY S.D BULAN INI ',
                ' NILAI BUKU PER BLN LAPORAN ',
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
            $drawing->setCoordinates('E2');
    
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

                    $event->sheet->getDelegate()->getStyle('N16:S1000')->getNumberFormat()
                    ->setFormatCode(\PhpOffice\PhpSpreadsheet\Style\NumberFormat::FORMAT_NUMBER_COMMA_SEPARATED1);
                
                    $event->sheet->getDelegate()->getStyle('U16:Y1000')->getNumberFormat()
                    ->setFormatCode(\PhpOffice\PhpSpreadsheet\Style\NumberFormat::FORMAT_NUMBER_COMMA_SEPARATED1);
                                        

                    $event->sheet->getStyle('A15:AA15')->applyFromArray([
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
                    
                    $event->sheet->getDelegate()->mergeCells('I1:T3');
                    $event->sheet->getDelegate()
                    ->getCell('I1')
                    ->setValue('FORMULIR');
                    $event->sheet->getStyle('I1:T3')->applyFromArray([
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
                    
                    $event->sheet->getDelegate()->mergeCells('U1:AA8');
                    $event->sheet->getDelegate()
                    ->getCell('U1')
                    ->setValue('DAFTAR ASET TETAP');
                    $event->sheet->getStyle('U1:AA8')->applyFromArray([
                        'font' => [
                                'bold' => true,
                                'size'      =>  '40',
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
                    
                    $event->sheet->getDelegate()->mergeCells('I4:T8');
                    $event->sheet->getDelegate()
                    ->getCell('I4')
                    ->setValue('TANGGAL DI KELUARKAN : '.$this->month.' / '.$this->year);
                    $event->sheet->getStyle('I4:T8')->applyFromArray([
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


                    $event->sheet->getDelegate()->mergeCells('A10:AA11');
                    $event->sheet->getDelegate()
                    ->getCell('A10')
                    ->setValue('DAFTAR ASET TETAP : '.$this->status_guna);
                    $event->sheet->getStyle('A10:AA13')->applyFromArray([
                        'font' => [
                                'bold' => true,
                                'size' =>  '15',
                        ],
                        'alignment' => [
                            'horizontal' => \PhpOffice\PhpSpreadsheet\Style\Alignment::HORIZONTAL_CENTER,
                            'vertical' => \PhpOffice\PhpSpreadsheet\Style\Alignment::VERTICAL_CENTER,
                        ],
                        
                    ]);

                    $event->sheet->getDelegate()->mergeCells('A13:AA13');
                    $event->sheet->getDelegate()
                    ->getCell('A13')
                    ->setValue('BPJS KETENAGAKERJAAN KANTOR WILAYAH JATENG DAN DIY / KELOMPOK ASET '.$this->category);
                    $event->sheet->getStyle('A13:AA13')->applyFromArray([
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
                    $event->sheet->getDelegate()->getCell('N'. (string)$sumStartRow)->setValue($this->aktivas->pluck(['nilai_perolehan'])->sum());

                    // Jumlah RESIDU -> KOLOM 'O'
                    $event->sheet->getDelegate()->getCell('O'. (string)$sumStartRow)->setValue($this->aktivas->sum(fn(Aktiva $aktiva) => $aktiva->getNilaiResidu($this->year, $this->month)));

                    // Jumlah Peny. Tahun Lalu -> KOLOM 'P'
                    $event->sheet->getDelegate()->getCell('P'. (string)$sumStartRow)->setValue($this->aktivas->sum(fn(Aktiva $aktiva) => $aktiva->getAkmPenyusutanDariPerolehanSampaiAkhirTahunLalu($this->year, $this->month)));

                    // Jumlah yg Disusutkan -> KOLOM 'S'
                    $event->sheet->getDelegate()->getCell('S'. (string)$sumStartRow)->setValue($this->aktivas->sum(fn(Aktiva $aktiva) => $aktiva->getNilaiYangDapatDisusutkan($this->year, $this->month)));

                    // Jumlah SISA UM -> KOLOM 'T'
                    $event->sheet->getDelegate()->getCell('T'. (string)$sumStartRow)->setValue($this->aktivas->sum(fn(Aktiva $aktiva) => $aktiva->getSisaMasaManfaatSampaiAkhirTahunLalu($this->year, $this->month)));

                    // Jumlah Nilai Buku -> KOLOM 'Y'
                    $event->sheet->getDelegate()->getCell('Y'. (string)$sumStartRow)->setValue($this->aktivas->sum(fn(Aktiva $aktiva) => $aktiva->getNilaiBuku($this->year, $this->month)));

                    // Jumlah akm. s.d bln lalu
                    $event->sheet->getDelegate()->getCell('U'. (string)$sumStartRow)->setValue($this->aktivas->sum(fn(Aktiva $aktiva) => $aktiva->getAkmDariAwalTahunSampaiBulanLalu($this->year, $this->month)));

                    // Jumlah bulan ini
                    $event->sheet->getDelegate()->getCell('V'. (string)$sumStartRow)->setValue($this->aktivas->sum(fn(Aktiva $aktiva) => $aktiva->getPenyusutanBulanIni($this->year, $this->month)));

                    // Jumlah akm. s.d bulan ini
                    $event->sheet->getDelegate()->getCell('W'. (string)$sumStartRow)->setValue($this->aktivas->sum(fn(Aktiva $aktiva) => $aktiva->getAkmDariAwalTahunSampaiBulanIni($this->year, $this->month)));

                    // Jumlah akm. dari perolehan s.d bulan ini
                    $event->sheet->getDelegate()->getCell('X'. (string)$sumStartRow)->setValue($this->aktivas->sum(fn(Aktiva $aktiva) => $aktiva->getAkmDariPerolehanSampaiBulanIni($this->year, $this->month)));

                    $event->sheet->getStyle('A16:AA'.$sumStartRow)->applyFromArray([
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