<?php

namespace App\Http\Controllers;
use App\Post;
use Illuminate\Contracts\Logging\Log;
use Illuminate\Http\Request;
use Illuminate\View\View;

class PostController extends Controller
{
   //列表页面
    public  function index(\Illuminate\Log\Writer $log){
        //容器
        //$app = app();
        //$log =   $app->make('log');
        //依赖注入
       // $log->info('post_index',['data'=>'is data']);
        //门脸模式
        \Log::info('post_index',['data'=>'is data']);



       //$a =  \Request::all();
       // dd($a);
      // $posts  =  Post::orderBy('created_at', 'desc')->paginate(6);
      // return view('post/index',compact('posts'));
   }

   //详情页面
    public function show(Post $post) {
        return view('post/show',compact('post'));
   }

   //创建文章页面
    public function create() {
        return view('post/create');
   }

    public function store() {
        //所有表单提交都要过这三道逻辑
        //1.验证
        $this->validate(request(),[
            'title' =>'required|string|max:100|min:5',
             'content'=>'required|string',
        ],[
            'title.required'=>'该字段不能为空',
        ]);

         //2.逻辑
         $re = Post::create(request(['title','content']));
          //渲染
        return redirect('/posts');
   }

    public function update() {
        return;
    }

    //编辑
    public function edit() {
        return view('post/edit');
    }

    //删除
    public function delete() {
        return;
    }

    //上传图片
    public function upload(){
       //TODO
        dd(request()->all());

    }
}
