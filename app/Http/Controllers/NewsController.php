<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Helpers\HttpClient;

class NewsController extends Controller
{
    public function index()
    {
        $getNews = HttpClient::fetch("GET", HttpClient::apiUrl());
        $news = $getNews['data'];
        return view('welcome', ['news' => $news]);
    }

    public function create()
    {
        return view('news.create');
    }

    public function store(Request $request)
    {
        $payload = [
            "title" => $request->input("title"),
            "content" => $request->input("content"),
        ];
        $file = [
            "banner" => $request->file('banner')
        ];
        $news = HttpClient::fetch(
            "POST",
            HttpClient::apiUrl()."news/post",
            $payload,
            $file
        );
        if (isset($news['status'])) {
            $msg = "data has been saved";
            $status = "success";
        } else {
            $msg = "failed!";
            $status = "error";
        }

        return redirect()->route('welcome')->with($status, $msg);
    }
    
    public function edit($id)
    {
        $getArticle = HttpClient::fetch("GET", HttpClient::apiUrl()."news/edit/".$id);
        $article = $getArticle['data'];
        return view('news.edit', ['article' => $article]);
        
    }


    public function update(Request $request, $id)
    {
        $payload = $request->only('title','content');
        $file = [
            "banner" => $request->file('banner')
        ];
        $update = HttpClient::fetch(
            "POST",
            HttpClient::apiUrl()."news/update/".$id,
            $payload, $file
        );

        if ($update['status']) {
            $msg = "data updated success";
            $status = "success";
        } else {
            $msg = "failed!";
            $status = "error";
        }
        return redirect()->route('welcome')->with($status, $msg);
    }

    public function destroy($id)
    {
        $delete = HttpClient::fetch(
            "POST",
            HttpClient::apiUrl()."news/delete/".$id
        );

        if ($delete['status']) {
            $msg = "data successfully erased";
            $status = "success";
        } else {
            $msg = "failed!";
            $status = "error";
        }
        return redirect()->route('welcome')->with($status, $msg);
    }
}
