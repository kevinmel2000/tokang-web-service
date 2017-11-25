<?php

namespace App\Http\Controllers;

use App\Worker;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class WorkersController extends Controller
{
    public function add(Request $request) {
        $user_id = $request->input('user_id');
        $worker_type = $request->input('worker_type');
        $worker_status = $request->input('worker_status');

        $worker = Worker::create([
            'user_id' => $user_id,
            'worker_type' => $worker_type,
            'worker_status' => $worker_status
        ]);

        if($worker) {
            $res['success'] = true;
            $res['message'] = 'Success add Worker';

            return response($res);
        } else {
            $res['success'] = false;
            $res['message'] = 'Failed add Worker';

            return response($res);
        }
    }

    public function edit(Request $request, $id) {
        $worker = Worker::find($id);
        $worker->update($request->all());

        return response()->json($user);
    }

    public function delete($id) {
        $worker = Worker::find($id);
        $worker->delete();

        return response()->json('Removed Successfully');
    }

    public function view($id) {
        $worker = Worker::find($id);
        if($worker) {
            $res['success'] = true;
            $res['message'] = $worker;

            return response($res);
        } else {
            $res['success'] = false;
            $res['message'] = 'Cannot find worker';

            return response($res);
        }        
    }

    public function index() {
        $worker = Worker::all();

        return response()->json($worker);
    }
}