<?php

namespace App\Http\Controllers\Admin;

use Backpack\CRUD\app\Http\Controllers\CrudController;

// VALIDATION: change the requests to match your own file names if you need form validation
use App\Http\Requests\NewsAndUpdatesRequest as StoreRequest;
use App\Http\Requests\NewsAndUpdatesRequest as UpdateRequest;
use Backpack\CRUD\CrudPanel;


/**
 * Class NewsAndUpdatesCrudController
 * @package App\Http\Controllers\Admin
 * @property-read CrudPanel $crud
 */

class NewsAndUpdatesCrudController extends CrudController
{
    public function setup()
    {
        /*
        |--------------------------------------------------------------------------
        | CrudPanel Basic Information
        |--------------------------------------------------------------------------
        */
        $this->crud->setModel('App\Models\NewsAndUpdates');
        $this->crud->setRoute(config('backpack.base.route_prefix') . '/newsandupdates');
        $this->crud->setEntityNameStrings('newsandupdates', 'News and Updates');

        /*
        |--------------------------------------------------------------------------
        | CrudPanel Configuration
        |--------------------------------------------------------------------------
        */

        // TODO: remove setFromDb() and manually define Fields and Columns
        $this->crud->setFromDb();
        $this->crud->addField([
            'name' => 'body',
            'type' => 'simplemde',
            'label' => "Body"
        ]);
        $this->crud->addField([
            'name' => 'type',
            'type' => 'select_from_array',
            'label' => 'Type',
            'options' => [ 'app' => 'App', 'plugin' => 'Plugin']
        ]);
        

        // add asterisk for fields that are required in NewsAndUpdatesRequest
        $this->crud->setRequiredFields(StoreRequest::class, 'create');
        $this->crud->setRequiredFields(UpdateRequest::class, 'edit');
    }

    public function store(StoreRequest $request)
    {
        // your additional operations before save here
        $redirect_location = parent::storeCrud($request);
        // your additional operations after save here
        // use $this->data['entry'] or $this->crud->entry
        return $redirect_location;
    }

    public function update(UpdateRequest $request)
    {
        // your additional operations before save here
        $redirect_location = parent::updateCrud($request);
        // your additional operations after save here
        // use $this->data['entry'] or $this->crud->entry
        return $redirect_location;
    }
}
