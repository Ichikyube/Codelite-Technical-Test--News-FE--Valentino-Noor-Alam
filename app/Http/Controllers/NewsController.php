<?php

namespace App\Http\Controllers;

use App\Http\Requests\ArticleStoreRequest;
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

    public function store(ArticleStoreRequest $request)
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


    public function update(ArticleStoreRequest $request, $id)
    {

    /**
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\News  $post
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id):JsonResponse
    {
        try {
            $validated = $request->validate([
                'title' => ['required'],
                'content' => ['required'],
            ]);
        } catch (\Illuminate\Validation\ValidationException $th) {
            return response()->json([
                'status' => false,
                'message' => $th->validator->errors()
            ], 403);
        }

        try {
            $post = News::where("id", $id)
                    ->firstOrFail();

            // trim title and convert it to title case
            $validated['title'] = Str::of($validated['title'])->trim()->title();
                
            if ($request->hasFile('banner')) {
                $banner = $request->file('banner');
                $storage = Storage::disk('public');

                if($storage->exists($post->banner))
                    $storage->delete($post->banner);

                $banner = $request->file('banner');
                $imageName = date('YmdHis') . "." . $banner->getClientOriginalName();
                $banner->move(public_path('img'),$imageName);
                $path =  $request->getSchemeAndHttpHost() ."/img/" . $imageName;
                $validated['banner'] = $path;

            } else
            {
                return response()->json([
                    'status' => false,
                    'message' => 'Your source is not valid',
                    'data' => null
                ], 403);
            }
            $post->fill($validated);
            //$post->update($validated);
            $post->save();
            return $this->responseSuccess($post, 'Article Updated Successfully !');
        }catch (\Exception $e) {
            return $this->responseError(null, $e->getMessage(), Response::HTTP_INTERNAL_SERVER_ERROR);
        }
    }
        $payload = $request->only('title','content');
        $file = [
            "banner" => $request->file('banner')
        ];
        $update = HttpClient::fetch(
            "POST",
            HttpClient::apiUrl()."news/update/".$id,
            $payload, $file
        );

        if (isset($update['status'])) {
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

        if (isset($delete['status'])) {
            $msg = "data successfully erased";
            $status = "success";
        } else {
            $msg = "failed!";
            $status = "error";
        }
        return redirect()->route('welcome')->with($status, $msg);
    }
}
