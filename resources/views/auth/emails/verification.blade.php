<!DOCTYPE html>
<html>
	<head>
		<title>PrintIt</title>
	</head>
	<body>
	{{ $user->remember_token }}
	{{ $user }}
		Click here to confirme verification: <a href="{{ $link = url('register/verify/' . $user->remember_token) }}">sdfdsf</a>

	</body>
</html>                          