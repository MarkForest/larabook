<?php

namespace App\Http\Controllers;

use App\Block;
use App\Topic;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Symfony\Component\Translation\Tests\Catalogue\TargetOperationTest;

class BlockController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        if (!Auth::check()) {
            return redirect('login');
        }
        $block = new Block();
        $topics = Topic::pluck('topicname', 'id');
        return view('block.create', [
           'block'=>$block,
           'topics'=>$topics,
           'page'=>'Forms',
        ]);
    }

    /**
     * Сохраните вновь созданный ресурс в хранилище.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $block = new Block();
        $fname = $request->file('imagepath');
        if ($fname != null) {
            $originalname = $request->file('imagepath')->getClientOriginalName();
            $request->file('imagepath')->move(public_path().'/images', $originalname);
            $block->imagepath = '/images/'.$originalname;
        } else {
            $block->imagepath = '';
        }
        $block->title = $request->title;
        $block->topicid = $request->topicid;
        $block->content = $request->content;
        $block->save();
        return redirect()->action('BlockController@create')->with('message', 'New block has been added!');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $block = Block::find($id);
        $topics = Topic::pluck('topicname', 'id');
        return view('block.edit', [
            'topics' => $topics,
            'block' => $block,
            'page' => 'Home',
        ]);


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
        $block = Block::find($id);
        $block->title = $request->title;
        $block->content = $request->content;
        $block->topicid = $request->topicid;
        $fname = $request->file('imagepath');
        if ($fname != null) {
            $originalname = $request->file('imagepath')->getClientOriginalName();
            $request->file('imagepath')->move(public_path().'/images', $originalname);
            $block->imagepath = '/images/'.$originalname;
        } else {
            $block->imagepath = '';
        }
        $block->save();
        return redirect('topic/'.$block->topicid);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $block = Block::find($id);
        $block->delete();
        return redirect('topic');
    }
}
