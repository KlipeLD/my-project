<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Services\ServiceService;
use App\Models\Service;
use App\Http\Requests\Service\StoreRequest;
use App\Http\Requests\Service\UpdateRequest;
use App\Http\Requests\Service\DestroyRequest;

class ServiceController extends Controller
{
    protected $service;
    protected $serviceService;

    public function __construct(Service $service, ServiceService $serviceService)
    {
        $this->service = $service;
        $this->serviceService = $serviceService;
    }

    public function index()
    {
        return view('service.index', ['services' => $this->service->getServices()]);
    }

    public function create()
    {
        return view('service.create');
    }

    public function store(StoreRequest $request)
    {
        $data = $request->validated();
        if($request->hasFile('img'))
        {
            $data['img'] = $this->serviceService->uploadedImage($request->file('img'));
        }
        $service = $this->service->create($data);

        return redirect(route('service.index',['service' => $service->id]));
    }

    public function edit(string $url)
    {
        return view('service.edit',[
            'service' => $this->service->getServiceByUrl($url)
        ]);
    }

    public function update(Service $service, UpdateRequest $request)
    {
        $service->update(($request->except('img')));
        if($request->hasFile('img'))
        {
            $this->serviceService->deletedImage($service->img);
            $service->img = $this->serviceService->uploadedImage($request->file('img'));
            $service->save();
        }
      
        return redirect(route('service.index'));
    }

    public function destroy(Service $service, DestroyRequest $request)
    {
        $this->serviceService->deletedImage($service->img);
        $service->delete();

        return redirect(route('service.index'));
    }
}
