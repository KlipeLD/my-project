<?php

namespace App\Http\Controllers;


use Illuminate\Http\Request;
use App\Services\ContactService;
use App\Http\Requests\Contact\StoreRequest;


class ContactController extends Controller
{
    protected $contactService;

    public function __construct(ContactService $contactService)
    {
        $this->contactService = $contactService;
    }

    public function index()
    {
        return view( 'contact.index');
    }

    public function store(StoreRequest $request)
    {
        $this->contactService->sendContact($request);
        $request->session()->flash('textOnTop', __('messages.contactTextOnTop'));

        return redirect(route('contact.index'));
    }
}
