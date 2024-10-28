<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Authorize Application</title>
</head>
<body>
    <h1>Authorize Application</h1>
    <p><strong>{{ $client->name }}</strong> is requesting permission to access your account.</p>

    <form method="post" action="{{ route('passport.authorizations.approve') }}">
        @csrf
        <input type="hidden" name="state" value="{{ $request->state }}">
        <input type="hidden" name="client_id" value="{{ $client->id }}">
        <input type="hidden" name="auth_token" value="{{ $authToken }}">

        <button type="submit">Approve</button>
    </form>

    <form method="post" action="{{ route('passport.authorizations.deny') }}">
        @csrf
        <input type="hidden" name="state" value="{{ $request->state }}">
        <input type="hidden" name="client_id" value="{{ $client->id }}">

        <button type="submit">Deny</button>
    </form>
</body>
</html>
