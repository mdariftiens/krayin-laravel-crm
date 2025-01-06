<?php

namespace Webkul\Campaign\DataGrids;

use Illuminate\Database\Query\Builder;
use Illuminate\Support\Facades\DB;
use Webkul\Contact\Repositories\OrganizationRepository;
use Webkul\DataGrid\DataGrid;

class PersonDataGrid extends DataGrid
{
    /**
     * Create a new class instance.
     *
     * @return void
     */
    public function __construct(protected OrganizationRepository $organizationRepository) {}

    /**
     * Prepare query builder.
     */
    public function prepareQueryBuilder(): Builder
    {
        $queryBuilder = DB::table('campaigns')
            ->addSelect(
                'campaigns.id',
                'campaigns.name',
                'campaigns.type',
                'campaigns.description',
                'campaigns.start_date',
                'campaigns.end_date',
                'campaigns.budget',
            );
//            ->leftJoin('organizations', 'persons.organization_id', '=', 'organizations.id');

//        if ($userIds = bouncer()->getAuthorizedUserIds()) {
//            $queryBuilder->whereIn('persons.user_id', $userIds);
//        }

//        $this->addFilter('id', 'persons.id');
//        $this->addFilter('person_name', 'persons.name');
//        $this->addFilter('organization', 'organizations.name');

        return $queryBuilder;
    }

    /**
     * Add columns.
     */
    public function prepareColumns(): void
    {
        $this->addColumn([
            'index'      => 'name',
            'label'      => trans('Name'),
            'type'       => 'string',
            'sortable'   => true,
            'filterable' => true,
            'searchable' => true,
        ]);
//
        $this->addColumn([
            'index'      => 'type',
            'label'      => trans('Type'),
            'type'       => 'string',
            'sortable'   => false,
            'filterable' => true,
            'searchable' => true,
            //'closure'    => fn ($row) => collect(json_decode($row->type, true) ?? [])->pluck('value')->join(', '),
        ]);
//
        $this->addColumn([
            'index'      => 'description',
            'label'      => trans('Description'),
            'type'       => 'string',
            'sortable'   => false,
            'filterable' => true,
            'searchable' => true,
            //'closure'    => fn ($row) => collect(json_decode($row->description, true) ?? [])->pluck('value')->join(', '),
        ]);
//
        $this->addColumn([
            'index'      => 'start_date',
            'label'      => trans('Start Date'),
            'type'       => 'string',
            'sortable'   => true,
            'filterable' => true,
            'searchable' => true,
            //'closure'    => fn ($row) => collect(json_decode($row->start_date, true) ?? [])->pluck('value')->join(', '),
        ]);
//
        $this->addColumn([
            'index'      => 'end_date',
            'label'      => trans('End Date'),
            'type'       => 'string',
            'sortable'   => true,
            'filterable' => true,
            'searchable' => true,
            //'closure'    => fn ($row) => collect(json_decode($row->end_date, true) ?? [])->pluck('value')->join(', '),
        ]);
//
        $this->addColumn([
            'index'      => 'budget',
            'label'      => trans('Budget'),
            'type'       => 'string',
            'sortable'   => true,
            'filterable' => true,
            'searchable' => true,
            //'closure'    => fn ($row) => collect(json_decode($row->budget, true) ?? [])->pluck('value')->join(', '),
        ]);
//        $this->addColumn([
//            'index'              => 'organization',
//            'label'              => trans('admin::app.contacts.persons.index.datagrid.organization-name'),
//            'type'               => 'string',
//            'searchable'         => true,
//            'filterable'         => true,
//            'sortable'           => true,
//            'filterable_type'    => 'searchable_dropdown',
//            'filterable_options' => [
//                'repository' => OrganizationRepository::class,
//                'column'     => [
//                    'label' => 'name',
//                    'value' => 'name',
//                ],
//            ],
//        ]);
    }

    /**
     * Prepare actions.
     */
    public function prepareActions(): void
    {
        if (bouncer()->hasPermission('contacts.persons.view')) {
//            $this->addAction([
//                'icon'   => 'icon-eye',
//                'title'  => trans('admin::app.contacts.persons.index.datagrid.view'),
//                'method' => 'GET',
//                'url'    => function ($row) {
//                    return route('admin.contacts.persons.view', $row->id);
//                },
//            ]);
        }

//        if (bouncer()->hasPermission('contacts.persons.edit')) {
            $this->addAction([
                'icon'   => 'icon-edit',
                'title'  => trans('admin::app.contacts.persons.index.datagrid.edit'),
                'method' => 'GET',
                'url'    => function ($row) {
                    return route('admin.campaign.edit', $row->id);
                },
            ]);
//        }

        if (bouncer()->hasPermission('contacts.persons.delete')) {
            $this->addAction([
                'icon'   => 'icon-delete',
                'title'  => trans('admin::app.contacts.persons.index.datagrid.delete'),
                'method' => 'DELETE',
                'url'    => function ($row) {
                    return route('admin.campaign.delete', $row->id);
                },
            ]);
        }
    }

    /**
     * Prepare mass actions.
     */
    public function prepareMassActions(): void
    {
//        if (bouncer()->hasPermission('contacts.persons.delete')) {
            $this->addMassAction([
                'icon'   => 'icon-delete',
                'title'  => trans('admin::app.contacts.persons.index.datagrid.delete'),
                'method' => 'POST',
                'url'    => route('admin.campaign.mass_delete'),
            ]);
//        }
    }
}
