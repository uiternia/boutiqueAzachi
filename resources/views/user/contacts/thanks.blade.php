<title>title</title>
<body>
  <p>以下の内容でお問い合わせを受け付けました。</p>
  <p>お名前:{{$data['name']}}様</p>
  <p>メールアドレス:{{$data['email']}}</p>
  <p>お問い合わせ内容</p>
  <p>{!!nl2br(htmlspecialchars($data['message']))!!}</p>
</body>