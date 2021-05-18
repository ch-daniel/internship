
<link rel="stylesheet" href="/app.css">

<body>
  <article>
    <h1>{!! $post->title !!}</h1>
    <p>
      By {{ $post->author }}
    </p>

    <div>
      {!! $post->body; !!}
    </div>
  </article>

  <a href="/">Go back --></a>
</body>
