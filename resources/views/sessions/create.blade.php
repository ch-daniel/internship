<main class="max-w-lg mx-auto">
  <h1>Register</h1>
  <form method="POST" action="/login">
    @csrf

    <label for="email">Email</label>
    <input
        type="email"
        name="email"
        id="email"
        value="{{ old('email')}}"
        required>
    @error('email')
      <p>{{ $message }}</p>
    @enderror
    <label for="password">Password</label>
    <input type="password" name="password" id="password" required>
    @error('password')
      <p>{{ $message }}</p>
    @enderror
    <button type="submit" name="submit">Click to LogIn</button>
  </form>
</main>
