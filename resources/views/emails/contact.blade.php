<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <title>Pesan Baru</title>
</head>
<body style="font-family: Arial, sans-serif; color: #333;">
    <h2>Pesan Baru dari {{ $data['name'] }}</h2>

    <p><strong>Email:</strong> {{ $data['email'] }}</p>

    @if(!empty($data['subject']))
        <p><strong>Subject:</strong> {{ $data['subject'] }}</p>
    @endif

    <p><strong>Pesan:</strong></p>
    <p>{{ $data['message'] }}</p>
</body>
</html>
