<!DOCTYPE html>
<html>
<head>
<link href="//netdna.bootstrapcdn.com/font-awesome/4.0.3/css/font-awesome.min.css" rel="stylesheet" type="text/css" />
<link href="https://cdn.rawgit.com/mdehoog/Semantic-UI/6e6d051d47b598ebab05857545f242caf2b4b48c/dist/semantic.min.css" rel="stylesheet" type="text/css" />
<script src="https://code.jquery.com/jquery-2.1.4.js"></script>
<script src="https://cdn.rawgit.com/mdehoog/Semantic-UI/6e6d051d47b598ebab05857545f242caf2b4b48c/dist/semantic.min.js"></script>
  <meta charset="utf-8">
  <title>JS Bin</title>
</head>
<body>

  <h3>Date only</h3>
  <div class="ui calendar" id="example2">
    <div class="ui input left icon">
      <i class="calendar icon"></i>
      <input type="text" placeholder="Date">
    </div>
  </div>
  <br/>
  <script>
    $('#example2').calendar({
  type: 'date'
});

  </script>
</body>
</html>