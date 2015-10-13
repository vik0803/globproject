<?php

namespace GlobProject\Http\Controllers;


use GlobProject\Repositories\ProjectTasksRepository;
use GlobProject\Services\ProjectTasksService;
use Illuminate\Http\Request;
use GlobProject\Http\Requests;
use GlobProject\Http\Controllers\Controller;

class ProjectTasksController extends Controller
{

    /**
     * @var ProjectTasksRepository
     */
    private $repository;

    /**
     * @var ProjectTasksService
     */
    private $service;

    /**
     * @param ProjectTasksRepository $repository
     * @param ProjectTasksService $service
     */
    public function __construct(ProjectTasksRepository $repository, ProjectTasksService $service) {
        $this->repository = $repository;
        $this->service = $service;
    }


    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index($id)
    {
        $userId = \Authorizer::getResourceOwnerId();
        return $this->repository->findWhere([
            'project_id' => $id
        ]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        return $this->service->create($request->all());
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id, $taskID)
    {
        return $this->repository->findWhere([
            'project_id' => $id,
            'id' => $taskID
        ]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id, $taskID)
    {
        return $this->service->update($request->all(), $taskID);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id, $taskID)
    {
        if ($client = $this->repository->find($taskID)) {
            $client->delete();
        }
    }
}
