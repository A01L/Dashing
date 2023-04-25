<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<title>push</title>
</head>
<body>
<script type="text/javascript">
	function notifSet () {
		if (!("Notification" in window))
			alert ("Ваш браузер не поддерживает уведомления.");
		else if (Notification.permission === "granted")
			setTimeout(notifyMe, 2000);
		else if (Notification.permission !== "denied") {
			Notification.requestPermission (function (permission) {
				if (!('permission' in Notification))
					Notification.permission = permission;
				if (permission === "granted")
					setTimeout(notifyMe, 2000);
			});
		}
	}
function notifyMe () {
		var notification = new Notification ("Dashing", {
			tag : "ache-mail",
			body : "Время вышло, проверьте статус!"
		});
	}


	notifSet();
	notifyMe();
	window.location.href = "club.php";
</script>
</body>
</html>