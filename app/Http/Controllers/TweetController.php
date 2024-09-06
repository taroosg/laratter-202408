<?php

namespace App\Http\Controllers;

use App\Models\Tweet;
use Illuminate\Http\Request;

class TweetController extends Controller
{
  /**
   * Display a listing of the resource.
   */
  public function index()
  {
    // 一覧画面を表示する処理→ツイートを全部取得する→取得したデータをビューのファイルに渡す
    $tweets = Tweet::with('user')->latest()->get();
    return view('tweets.index', compact('tweets'));
  }

  /**
   * Show the form for creating a new resource.
   */
  public function create()
  {
    // 作成画面を表示する処理→作成画面のビューファイルを返す
    return view('tweets.create');
  }

  /**
   * Store a newly created resource in storage.
   */
  public function store(Request $request)
  {
    // dd($request->all());
    // データを保存する処理
    $request->validate([
      'tweet' => 'required|max:255',
    ]);

    $request->user()->tweets()->create($request->only('tweet'));

    return redirect()->route('tweets.index');
  }

  /**
   * Display the specified resource.
   */
  public function show(Tweet $tweet)
  {
    //
  }

  /**
   * Show the form for editing the specified resource.
   */
  public function edit(Tweet $tweet)
  {
    //
  }

  /**
   * Update the specified resource in storage.
   */
  public function update(Request $request, Tweet $tweet)
  {
    //
  }

  /**
   * Remove the specified resource from storage.
   */
  public function destroy(Tweet $tweet)
  {
    //
  }
}
