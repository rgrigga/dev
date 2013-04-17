<form>
    {{-- $errors variable passed via with_errors --}}
    @if ($errors->has('email'))
    @foreach ($errors->get('email', '<p class="error-message">:message</p>') as $email_error)
    {{ $email_error }}
    @endforeach
    @endif

    <label for="email">Email:</label>
    <input type="email" name="email" placeholder="Enter your email address here" />
 
    @if ($errors->has('password'))
    @foreach ($errors->get('password', '<p class="error-message">:message</p>') as $password_error)
    {{ $password_error }}
    @endforeach
    @endif

    <label for="password">Password:</label>
    <input type="password" name="password" placeholder="Enter your password here" />
     
    <label for="password_confirmation">Confirm Password:</label>
    <input type="password" name="password_confirmation" placeholder="Re-type your password here" />
</form>