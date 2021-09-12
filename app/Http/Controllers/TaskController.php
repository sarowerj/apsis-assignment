<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;
use EllipseSynergie\ApiResponse\Contracts\Response;
use App\Task;
use App\Transformer\TaskTransformer;
use App\User;
use Exception;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;


class TaskController extends Controller
{
    protected $response;

    public function __construct(Response $response)
    {
        $this->response = $response;
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {

        $tasks = DB::table('tasks')->where('tasks.user_id', '=', Auth::user()->id)->join('categories', 'tasks.category', '=', 'categories.id')->select('tasks.*', 'categories.category_slug')->get();
        if (!empty($tasks)) {
            return $this->response->withCollection($tasks, new TaskTransformer());
        }
        return $this->response->errorNotFound('Task Not Found');
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {

        $request->validate([
            'task_title' => 'required',
            'category' => 'required',
            'task_details' => 'required',
            'color' => 'required',
            'task_date' => 'required',
            'task_time' => 'required'
        ]);

        $data = $request->all();
        $data['user_id'] = Auth::user()->id;
        $data['status'] = 1;
        $data['task_deadline'] = $data['task_date'] . ' ' . $data['task_time'];
        try {
            $item = Task::create($data);
            return $this->response->withItem($item, new TaskTransformer());
        } catch (Exception $Exception) {
            return $this->response->errorNotFound('Task creation unsucessfull.');
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $task = Task::find($id);
        if (!$task) {
            return $this->response->errorNotFound('Task Not Found');
        }
        // Return a single task
        return $this->response->withItem($task, new  TaskTransformer());
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
