<?php

namespace App\Filament\Widgets;

use App\Enums\DocumentType;
use App\Enums\UserRole;
use App\Models\Document;
use App\Models\User;
use Filament\Widgets\ChartWidget;

class DocumentCompletionChart extends ChartWidget
{
    protected static ?string $heading = 'Kelengkapan Dokumen';

    protected static ?string $description = 'Jumlah dokumen terupload per jenis';

    protected static ?int $sort = 4;

    protected static ?string $maxHeight = '300px';

    protected static ?string $pollingInterval = '60s';

    protected int | string | array $columnSpan = 1;

    protected function getData(): array
    {
        $totalStudents = User::where('role', UserRole::Student)->count();

        $documentTypes = [
            DocumentType::Foto,
            DocumentType::KartuKeluarga,
            DocumentType::Ijazah,
            DocumentType::AktaKelahiran,
        ];

        $labels = [];
        $uploaded = [];
        $missing = [];

        foreach ($documentTypes as $type) {
            $labels[] = $type->getLabel();
            $count = Document::where('document_type', $type->value)->count();
            $uploaded[] = $count;
            $missing[] = max(0, $totalStudents - $count);
        }

        return [
            'datasets' => [
                [
                    'label' => 'Terupload',
                    'data' => $uploaded,
                    'backgroundColor' => 'rgba(2, 132, 199, 0.8)',
                    'borderColor' => '#0284c7',
                    'borderWidth' => 1,
                    'borderRadius' => 4,
                ],
                [
                    'label' => 'Belum Upload',
                    'data' => $missing,
                    'backgroundColor' => 'rgba(226, 232, 240, 0.8)',
                    'borderColor' => '#cbd5e1',
                    'borderWidth' => 1,
                    'borderRadius' => 4,
                ],
            ],
            'labels' => $labels,
        ];
    }

    protected function getType(): string
    {
        return 'bar';
    }

    protected function getOptions(): array
    {
        return [
            'plugins' => [
                'legend' => [
                    'display' => true,
                    'position' => 'top',
                    'labels' => [
                        'usePointStyle' => true,
                        'pointStyle' => 'circle',
                    ],
                ],
            ],
            'scales' => [
                'x' => [
                    'stacked' => true,
                    'grid' => [
                        'display' => false,
                    ],
                ],
                'y' => [
                    'stacked' => true,
                    'beginAtZero' => true,
                    'ticks' => [
                        'stepSize' => 1,
                    ],
                    'grid' => [
                        'color' => 'rgba(0, 0, 0, 0.05)',
                    ],
                ],
            ],
        ];
    }
}
