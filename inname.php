<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <meta http-equiv="X-UA-Compatible" content="ie=edge">
  <title>Vue Dialog</title>
  <link href="https://fonts.googleapis.com/css?family=Montserrat" rel="stylesheet">
  <link rel="stylesheet" href="css/pop.css">
</head>

<body>
  <div class="container">
    <a class="btn btn-dialog" href="/">Dialog</a>
    <!-- Dialog will be inserted here -->
		<div class="awsm-dialog animated bounceIn">
			<div class="awd-content">
				<p class="awd-message">Are you sure?</p>
				<p class="awd-input">Edit Me?</p>
				<button class="btn awd-ok">Yes</button>
				<button class="btn awd-cancel">No</button>
			</div>
		</div>

  </div>

  <script src="js/pop.js"></script>
</body>
</html>