<?php

namespace App\Http\Controllers;

use App\Block;
use App\Topic;
use Illuminate\Http\Request;

class TopicController extends Controller
{
    /**
     *
        Показать список ресурсов.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $topics = Topic::all(); // select * from topics
        $id = 0;
        return view('topic.index', [
            'page' => 'Home',
            'topics'=>$topics,
            'id'=>$id,
        ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $topic = new Topic();
        return view('topic.create', ['topic'=>$topic, 'page'=>'Add Topic']);
    }

    /**
     * Сохраните вновь созданный ресурс в хранилище
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $topic = new Topic;
        $topic->topicname = $request->topicname;
        $topic->save();
        return redirect()->action('BlockController@create');
    }

    /**
     * Показать указанный ресурс.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $blocks = Block::where('topicid', '=', $id)->get();
        $topics = Topic::all();
        return view('topic.index', [
            'page'=>'Home',
            'topics' => $topics,
            'blocks' => $blocks,
            'id' => $id,
        ]);
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
