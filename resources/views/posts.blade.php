<!DOCTYPE html>

    <title>Laravel</title>

    <link rel="stylesheet" href="/app.css">


    <body>
      @guest
        <a href="/register">Register</a>
        <a href="/login">LogIn</a>
      @endguest

      @auth
        <span>Welcome, {{ auth()->user()->name}}</span>
        <form method="post" action="/logout">
          @csrf
          <button type="submit">Log Out</button>

        </form>
      @endauth

      @if (session()->has('success'))
        <div class="fixed bg-blue-500 text-white py-2 px-4 rounded-xl bottom-3 right-3 text-sm">
          <p>{{ session('success')}}</p>
        </div>
      @endif
        <h1 style="color: green;">
        @if(session('message'))
            {{session('message')}}

        @endif
        </h1>


      <?php foreach ($posts as $post) : ?>
      <article>
        <h1>
          <a href="/posts/{{ $post->slug }}">
            <?= $post->title; ?>
          </a>
        </h1>

        <p>
          By {{ $post->author }}
        </p>

        <div>
          <?= $post->body; ?>
        </div>
      </article>
        <?php endforeach; ?>
      @auth  
     <div class="workspace">
          <p>Create a new post:</p>
        <form action="/createpost" method="POST">
            @csrf
            <input
            type="text"
            name="title"
            value="{{ old('title')}}"
            id="title"
            placeholder="Post title">
            @error('title')
              <p>{{ $message }}</p>
            @enderror
            <label for="body">Body:</label>
            <textarea
            class="last"
            name="body"
            colls="30"
            id="body"
            value="{{ old('body')}}"
            placeholder="Post body (max 1024 characters)"></textarea>
            @error('body')
              <p>{{ $message }}</p>
            @enderror
            <button type="submit" name="submit">Submit Post</button>
        </form>
      </div>
      @endauth
    </body>
