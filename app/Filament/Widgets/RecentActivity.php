<?php

namespace App\Filament\Widgets;

use Filament\Tables;
use Filament\Widgets\Widget;
use Illuminate\Database\Eloquent\Builder;
use App\Models\Activity;
use Squire\Models\Currency;

class RecentActivity extends Widget implements Tables\Contracts\HasTable
{
    use Tables\Concerns\InteractsWithTable;

    protected static string $view = 'filament.widgets.recent-activity';

    protected int | string | array $columnSpan = 'full';

    protected function formatAmount($value)
    {
        $currency = auth()->user()->currency ? auth()->user()->currency : 'idr'; // Default currency set to IDR
        return Currency::find($currency)->format($value, true);
    }

    protected function getTableQuery(): Builder
    {
        return Activity::latest()->take(10);
    }

    protected function getTableColumns(): array
    {
        return [
            Tables\Columns\TextColumn::make('subject.title')
                ->label('Judul'), // Changed to Indonesian
            Tables\Columns\BadgeColumn::make('subject_type')
                ->enum([
                    'expense' => 'Pengeluaran', // Changed to Indonesian
                    'income' => 'Pemasukan',   // Changed to Indonesian
                ])
                ->colors([
                    'danger' => 'expense',
                    'success' => 'income',
                ])
                ->label('Tipe'), // Changed to Indonesian
            Tables\Columns\TextColumn::make('subject.category.name')
                ->label('Kategori'), // Changed to Indonesian
            Tables\Columns\TextColumn::make('subject.amount')
                ->getStateUsing(fn ($record): string => $this->formatAmount($record->subject->amount))
                ->label('Jumlah'), // Changed to Indonesian
            Tables\Columns\TextColumn::make('subject.entry_date')
                ->label('Tanggal Masuk') // Changed to Indonesian
                ->date(),
        ];
    }

    protected function isTablePaginationEnabled(): bool
    {
        return false;
    }
}
