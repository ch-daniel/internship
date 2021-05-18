<!DOCTYPE html>

    <title>Laravel</title>

    <link rel="stylesheet" href="/app.css">


    <body>
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
     <div class="workspace">
          <p>Create a new post:</p>
        <form action="submit" method="POST">
            @csrf
            <input type="text" name="title" placeholder="Post title">
            <input type="text" name="author" placeholder="Author's name">
            <label for="body">Body:</label>
            <textarea class="last" name="body" colls="30" placeholder="Post body"></textarea>
            <button type="submit" name="submit">Submit Post</button>
        </form>
      </div> 
    </body>
