<main class="max-w-lg mx-auto">
  <h1>Register</h1>
  <form method="POST" action="/register">
    @csrf
    <label for="username">Username</label>
    <input
        type="text"
        name="username"
        id="username"
        value="{{ old('username')}}"
        required>
    @error('username')
      <p>{{ $message }}</p>
    @enderror
    <label for="name">Name</label>
    <input
        type="text"
        name="name"
        id="name"
        value="{{ old('name')}}"
        required>
    @error('name')
      <p>{{ $message }}</p>
    @enderror
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
    <button type="submit" name="submit">Click to register</button>
  </form>
</main>
