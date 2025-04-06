<?php

namespace App\Filament\Pages\Finance;

use App\Models\Entity;
use App\Models\Transaction;
use Filament\Forms\Components\CheckboxList;
use Filament\Forms\Components\DatePicker;
use Filament\Forms\Components\MultiSelect;
use Filament\Forms\Concerns\InteractsWithForms;
use Filament\Forms\Contracts\HasForms;
use Filament\Pages\Page;
use Filament\Tables\Columns\TextColumn;
use Filament\Tables\Concerns\InteractsWithTable;
use Filament\Tables\Contracts\HasTable;
use Filament\Tables\Table;
use Illuminate\Support\Carbon;

class ConsolidatedPanel extends Page implements HasForms, HasTable
{
    use InteractsWithForms;
    use InteractsWithTable;

    protected static string $view = 'filament.pages.finance.consolidated-panel';

    protected static ?string $navigationIcon = 'heroicon-o-table-cells';

    protected static ?string $navigationLabel = 'Painel Consolidado';

    protected static ?int $navigationSort = 1;

    protected static ?string $navigationGroup = 'Financeiro';

    // Campos públicos para o binding com o formulário
    public ?string $start_date = null;

    public ?string $end_date = null;

    public array $entities = [];

    public array $transaction_types = [];

    public function mount(): void
    {
        $this->start_date = now()->startOfMonth()->toDateString();
        $this->end_date = now()->endOfMonth()->toDateString();
    }

    public function filter(): void
    {
        // Este método é chamado no submit do formulário
        // Pode estar vazio se a tabela já está reagindo ao state do form
    }

    protected function getFormSchema(): array
    {
        return [
            DatePicker::make('start_date')
                ->label('Data Inicial')
                ->default(fn (self $livewire) => $livewire->start_date),

            DatePicker::make('end_date')
                ->label('Data Final')
                ->default(fn (self $livewire) => $livewire->end_date),

            MultiSelect::make('entities')
                ->label('Entidades')
                ->options(fn () => Entity::where('user_id', auth()->id())->pluck('name', 'id')),

            CheckboxList::make('transaction_types')
                ->label('Tipos de Transação')
                ->options([
                    'income' => 'Entradas',
                    'expense' => 'Saídas',
                ]),
        ];
    }

    public function table(Table $table): Table
    {
        return $table
            ->columns([
                TextColumn::make('date')->date()->sortable(),
                TextColumn::make('description')->searchable(),
                TextColumn::make('entity.name')->label('Entidade')->searchable(),
                TextColumn::make('amount')->money('BRL')->sortable(),
                TextColumn::make('type')->label('Tipo')->sortable(),
            ])
            ->filters([])
            ->defaultSort('date', 'desc')
            ->query($this->getTableQuery());
    }

    public function getTableQuery(): \Illuminate\Database\Eloquent\Builder
    {
        $startDate = Carbon::parse($this->start_date)->startOfDay();
        $endDate = Carbon::parse($this->end_date)->endOfDay();
        $entities = $this->entities ?? [];
        $transactionTypes = $this->transaction_types ?? [];

        $query = Transaction::query()
            ->where('user_id', auth()->id())
            ->whereBetween('date', [$startDate, $endDate])
            ->with('entity');

        if (! empty($entities)) {
            $query->whereIn('entity_id', $entities);
        }

        if (! empty($transactionTypes)) {
            $query->whereIn('type', $transactionTypes);
        }

        return $query;
    }
}
