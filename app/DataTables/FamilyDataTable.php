<?php

namespace App\DataTables;

use App\Family;
use Yajra\DataTables\Services\DataTable;
use Yajra\DataTables\EloquentDataTable;

class FamilyDataTable extends DataTable {

    /**
     * Build DataTable class.
     * @param mixed $query Results from query() method.
     * @return \Yajra\DataTables\DataTableAbstract
     */
    public function dataTable($query) {
        $dataTable = new EloquentDataTable($query);
        return $dataTable->addColumn('action', 'family.datatables_actions')
            ->editColumn('user', function (Family $family) {
            $user = $family->sourceUser()->first();
            return "<b>".$user->name . "</b> (" . ($user->gender_id == 1 ? "M" : "F") . ")";
        })->rawColumns(['user','action']);
    }

    /**
     * Get query source of dataTable.
     *
     * @param \App\Models\User $model
     * @return \Illuminate\Database\Eloquent\Builder
     */
    public function query(Family $model) {
        return $model->newQuery();
    }

    /**
     * Optional method if you want to use html builder.
     *
     * @return \Yajra\DataTables\Html\Builder
     */
    public function html() {
        return $this->builder()
                ->columns($this->getColumns())
                ->minifiedAjax()
                ->addAction(['printable' => false])
                ->parameters([
                    'dom' => 'Bfrtip',
                    'stateSave' => true,
                    'order' => [[0, 'desc']],
                    'buttons' => [
                        ['extend' => 'export', 'className' => 'btn btn-default btn-sm no-corner',],
                        ['extend' => 'print', 'className' => 'btn btn-default btn-sm no-corner',],
                        ['extend' => 'reset', 'className' => 'btn btn-default btn-sm no-corner',],
                        ['extend' => 'reload', 'className' => 'btn btn-default btn-sm no-corner',],
                    ],
        ]);
    }

    /**
     * Get columns.
     *
     * @return array
     */
    protected function getColumns() {
        return [
            'id',
            'user',
            'description'
        ];
    }

    /**
     * Get filename for export.
     *
     * @return string
     */
    protected function filename() {
        return 'familydatatable_' . time();
    }

}
