<?php

namespace App\Http\Controllers;

use App\Models\BlogPost;
use App\Models\Participant;
use Illuminate\Http\Request;
use Redirect;
use Mail;

class BlogPostController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
      $pageTitle = "Blog-Posts";

      $participant = Participant::where("id", session("participant_id"))->first();

      $blogPosts = BlogPost::all();

      return view("blog_post.index", ["pageTitle" => $pageTitle, "blogPosts" => $blogPosts, "participant" => $participant]);
    }

    public function indexDefault()
    {
      $pageTitle = "Blog-Posts";

      $participant = Participant::where("id", session("participant_id"))->first();

      $blogPosts = BlogPost::all();

      return view("blog_post.index", ["pageTitle" => $pageTitle, "blogPosts" => $blogPosts, "participant" => $participant]);
    }

    public function participantIndex(Participant $participant)
    {
      $pageTitle = "Blog-Posts";

      $blogPosts = BlogPost::where("participant_id", $participant->id)->get();

      return view("blog_post.participant_index", ["pageTitle" => $pageTitle, "blogPosts" => $blogPosts, "participant" => $participant]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
      if(ParticipantLoginController::checkIfParticipantIsLoggedIn()){
        return view("blog_post.create");
      } else {
        return Redirect::back()->with(['message' => "You must be logged in to create a post."]);
      }
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
      if(ParticipantLoginController::checkIfParticipantIsLoggedIn()){
        $validated = $request->validate([
          'content' => 'required|string|min:3|max:255',
        ]);

        if(session("participant_id") == NULL){
          session(["participant_id" => 1]);
        }

        $blogPost = new BlogPost;
        $blogPost->participant_id = session("participant_id");
        $blogPost->content = $request->input("content");
        $blogPost->save();

        $participant = Participant::where("id", session("participant_id"))->first();
        if($participant != NULL){
          $this->postCreatedEmail($blogPost, $participant);
          session()->flash('message', 'The blog-post was successfully created.');
        } else {
          session()->flash('message', 'The blog-post was successfully created but just an FYI, the related notification email failed to send.');
        }

        return redirect()->route('blog_post_show', ["blogPost" => $blogPost]);
      } else {
        return Redirect::back()->with(['message' => "You must be logged in to create a post."]);
      }
    }

    /**
     * Display the specified resource.
     */
    public function show(BlogPost $blogPost)
    {
      return view("blog_post.show", ["blogPost" => $blogPost]);
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(BlogPost $blogPost)
    {
      return view("blog_post.edit", ["blogPost" => $blogPost]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, BlogPost $blogPost)
    {
      $validated = $request->validate([
        'content' => 'required|string|min:3|max:255',
      ]);

      $blogPost->participant_id = session("participant_id");
      $blogPost->content = $request->input("content");
      $blogPost->save();

      session()->flash('message', 'The post was successfully updated.');
      return redirect()->route('blog_post_show', ["blogPost" => $blogPost]);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(BlogPost $blogPost)
    {
        $participant = Participant::where("id", session("participant_id"))->first();

        if($participant != NULL){
          $blogPost->delete();

          session()->flash('message', 'The post was successfully deleted.');
          return redirect()->route('blog_post_participant_index', ["participant" => $participant]);
        }

        session()->flash('message', 'There was an error deleting the post.');
        return redirect()->route('blog_post_show', ["blogPost" => $blogPost]);

    }

    public function postCreatedEmail(BlogPost $blogPost, Participant $participant)
    {
        Mail::to('beruldsenj@gmail.com')->send(new \App\Mail\PostCreated($blogPost, $participant));
    }
}
