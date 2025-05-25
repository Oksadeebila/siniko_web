<?php

namespace App\Filament\Pages;

use Filament\Pages\Page;

class DashboardAdmin extends Page
{
    protected static ?string $navigationIcon = 'heroicon-o-document-text';

    protected static string $view = 'filament.pages.dashboard-admin';
// hanya admin yang akses dashboard ini 
    public static function canAccess(): bool
    {
        return auth()->user()->hasRole('admin');
    }

    public function mount(): void
{
    $this->tahun = TahunAnggaran::where('is_active', true)->first();

    $this->rincianOutputs = RincianOutput::with(['program', 'penanggungJawab'])
        ->where('tahun_anggaran_id', $this->tahun->id)
        ->get()
        ->map(function ($ro) {
            $ro->realisasi_total = $ro->realisasiBulanan->sum('anggaran_realisasi');
            return $ro;
        });

    $this->roCount = $this->rincianOutputs->count();
    $this->totalAnggaran = $this->rincianOutputs->sum('anggaran');
    $this->totalRealisasi = $this->rincianOutputs->sum('realisasi_total');
}
}
