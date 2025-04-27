<?php

namespace App\Excels;

use App\Models\Form;
use App\Models\Language;
use App\Models\Setting;
use Illuminate\Contracts\View\View;
use Maatwebsite\Excel\Concerns\FromView;
use Maatwebsite\Excel\Concerns\WithEvents;
use Maatwebsite\Excel\Events\AfterSheet;


class RecordExport implements FromView, WithEvents
{

    public function __construct($slug,$records)
    {
        $this->slug = $slug;
        $this->records = $records;

    }
    public function view(): View
    {
        if (view()->exists('admin-panel.my-'.$this->slug.'.export'))
            return view('admin-panel.my-'.$this->slug.'.export', [
                'slug' => $this->slug,
                'records' => $this->records,
            ]);
        else
            return view("admin-panel.record.export", [
                'slug' => $this->slug,
                'records' => $this->records,
            ]);
    }

    public static function afterSheet(AfterSheet $event)
    {
//        $event->sheet->getDelegate()->getStyle('A1:' . $event->sheet->getDelegate()->getHighestColumn() . '1')
//            ->getFill()->setFillType(Fill::FILL_SOLID)->getStartColor()->setARGB('00CFF1');
        $language=Language::where('abbr',getLang())->first();
        $event->sheet->setRightToLeft($language->direction=='rtl');
    }

    /**
     * @return array
     */
    public function registerEvents(): array
    {
        return [
            AfterSheet::class => [self::class, 'afterSheet']
        ];
    }
}
