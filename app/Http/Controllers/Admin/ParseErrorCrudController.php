<?php

namespace App\Http\Controllers\Admin;

use Backpack\CRUD\app\Http\Controllers\CrudController;

// VALIDATION: change the requests to match your own file names if you need form validation
use App\Http\Requests\ParseErrorRequest as StoreRequest;
use App\Http\Requests\ParseErrorRequest as UpdateRequest;
use Backpack\CRUD\CrudPanel;

/**
 * Class ParseErrorCrudController
 * @package App\Http\Controllers\Admin
 * @property-read CrudPanel $crud
 */
class parseerrorcrudcontroller extends CrudController
{
    public function setup()
    {
        /*
        |--------------------------------------------------------------------------
        | CrudPanel Basic Information
        |--------------------------------------------------------------------------
        */
        $this->crud->setModel('App\Models\ParseError');
        $this->crud->setRoute(config('backpack.base.route_prefix') . '/parseerror');
        $this->crud->setEntityNameStrings('Parse Error', 'Parsing Errors');

        /*
        |--------------------------------------------------------------------------
        | CrudPanel Configuration
        |--------------------------------------------------------------------------
        */

        // TODO: remove setFromDb() and manually define Fields and Columns
        // $this->crud->setFromDb();

          $this->crud->setColumns(['created_at', 'url', 'missingFields', 'caughtErrors']);
          // $this->crud->addField([
          //   'name' => 'name',
          //   'type' => 'text',
          //   'label' => "Tag name"
          // ]);
          // $this->crud->addField([
          //   'name' => 'slug',
          //   'type' => 'text',
          //   'label' => "URL Segment (slug)"
          // ]);

        // add asterisk for fields that are required in ParseErrorRequest
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
